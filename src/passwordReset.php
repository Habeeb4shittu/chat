<?php
session_start();
require_once __DIR__ . '/Database.php';
try {
    $db = new Database;
    $connect = $db->connect();
    $fetch = $connect->prepare('SELECT  *  FROM users WHERE id = :id ');
    $fetch->execute([
        ':id' => $_SESSION['user_id'],
    ]);
    $result = $fetch->fetch(PDO::FETCH_ASSOC);
    $oldPword = $_POST['password'];
    $password = $_POST['newpass'];
    $conpassword = $_POST['confirm_newpass'];
    if (empty($password) || empty($conpassword)) {
        echo "<div class='error'>Input fields cant be empty</div>";
    } elseif (strlen($password) < 8) {
        echo "<div class='error'>Password is too short</div>";

    } elseif ($oldPword == password_verify($oldPword, $result['user_password'])) {
        if ($password == $conpassword) {
            $query = $connect->prepare('UPDATE users SET user_password = :password WHERE id = :id');
            $query->execute([
                ':id' => $_SESSION['user_id'],
                ':password' => password_hash($password, PASSWORD_DEFAULT),
            ]);
            if ($query) {
                echo "<div class='success'>Password Updated successfully</div>";
            }
        } else {
            echo "<div class='error'>Password Mismatch</div>";
        }
    } else {
        echo "<div class='error'>Incorrect Old password</div>";
    }
} catch (PDOException $th) {

}