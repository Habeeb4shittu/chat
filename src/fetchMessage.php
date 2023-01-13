<?php
session_start();
require_once __DIR__ . '/Database.php';
try {
    $db = new Database;
    $connect = $db->connect();
    $fetch = $connect->prepare('SELECT  *  FROM messages WHERE message_id = :id OR message_id = :user_id');
    $fetch->execute([
        ':id' => $_SESSION['user_id'] . $_POST['id'],
        ':user_id' => $_POST['id'] . $_SESSION['user_id'],
    ]);
    $result = $fetch->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
} catch (PDOException $th) {

}