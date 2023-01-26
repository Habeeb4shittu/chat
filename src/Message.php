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
    
    $exists = $connect->prepare("SELECT COUNT(*) FROM friends WHERE friend_id = :id");
    $exists->execute(["id"=>$msg_id]);
    $result = $exists->fetch(PDO::FETCH_COLUMN);
    
    if ($result <= 0) {
        $friend = $connect->prepare('INSERT INTO friends (friend_id, sender, receiver) VALUES(:id, :sender, :receiver)');
        $friend->execute([
            ':id' => $msg_id,
            ':sender' => $_SESSION['user_id'],
            ':receiver' => $_POST['id'],
        ]);
    }
    
} catch (PDOException $th) {

}