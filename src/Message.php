<?php
session_start();
require_once __DIR__ . '/Database.php';
try {
    $db = new Database;
    $connect = $db->connect();
    $insert = $connect->prepare('INSERT  INTO  messages(message_id, message, sender, receiver) VALUES( :id, :message,:sender, :receiver )');
    $insert->execute([
        ':id' => $_POST['id'] . $_SESSION['user_id'],
        ':message' => $_POST['message'],
        ':sender' => $_SESSION['user_id'],
        ':receiver' => $_POST['id'],
    ]);
    // print_r($result);
} catch (PDOException $th) {

}