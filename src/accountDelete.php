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
    $password = $_POST['password'];
    if (empty($password)) {
        echo "<div class='error'>Input field cant be empty</div>";
    } elseif ($password == password_verify($password, $result['user_password'])) {
        $del = $connect->prepare('DELETE  FROM messages WHERE sender = :id OR receiver = :id');
        $del->execute([
            ':id' => $_SESSION['user_id'],
        ]);
        $query = $connect->prepare('DELETE FROM users WHERE id = :id');
        $query->execute([
            ':id' => $_SESSION['user_id'],
        ]);
        session_destroy();
    } else {
        echo "<div class='error'>Incorrect Password</div>";

    }
} catch (PDOException $th) {

}