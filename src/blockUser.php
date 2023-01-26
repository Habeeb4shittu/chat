<?php
session_start();
require_once __DIR__ . '/Database.php';
try {
    $db = new Database;
    $connect = $db->connect();
    $fetch = $connect->prepare('SELECT * FROM friends WHERE sender = :id OR receiver = :id');
    $fetch->execute([
        ':id' => $_POST['id'],
    ]);
    $result = $fetch->fetch(PDO::FETCH_ASSOC);
    $block = $connect->prepare('INSERT INTO blocked VALUES(:friend_id, :status)');
    $block->execute([
        ':friend_id' => $result['friend_id'],
        ':status' => 1,
    ]);
    $update = $connect->prepare('UPDATE friends SET status = "BLocked" WHERE friend_id = :id');
    $update->execute([
        ':id' => $result['friend_id'],
    ]);
    echo json_encode($result);
} catch (PDOException $th) {

}