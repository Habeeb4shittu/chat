<?php
session_start();
require_once __DIR__ . '/Database.php';
try {
    $db = new Database;
    $connect = $db->connect();
    $insert = $connect->prepare('UPDATE users SET theme = :theme WHERE id = :id');
    $insert->execute([
        ':id' => $_SESSION['user_id'],
        ':theme' => $_POST['theme'],
    ]);
    if ($insert) {
        $theme = $_POST['theme'];
        echo "<div class='success'>Theme updated successfully</div>";
    } else {
        echo "<div class='error'>Failed</div>";
    }
} catch (PDOException $th) {

}