<?php
session_start();
require_once __DIR__ . '/Database.php';
try {
    $db = new Database;
    $connect = $db->connect();
    $insert = $connect->prepare('INSERT  INTO  messages(message_id, message, sender, receiver) VALUES( :id, :message,:sender, :receiver )');
    $msg_id = [$_POST['id'], $_SESSION['user_id']];
    sort($msg_id);
    $msg_id = implode("", $msg_id);
    $insert->execute([
        ':id' => $msg_id,
        ':message' => $_POST['message'],
        ':sender' => $_SESSION['user_id'],
        ':receiver' => $_POST['id'],
    ]);
} catch (PDOException $th) {

}