<?php
session_start();
require_once __DIR__ . '/Database.php';
try {
    $db = new Database;
    $connect = $db->connect();
    $fetch = $connect->prepare('SELECT UNIQUE(message_id)  FROM messages WHERE sender = :id OR receiver= :id ORDER BY DATE');
    $fetch->execute([
        ':id' => $_SESSION['user_id']
    ]);
    $result = $fetch->fetchAll(PDO::FETCH_COLUMN);
    echo json_encode($result);
} catch (PDOException $th) {

}