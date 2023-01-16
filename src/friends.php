<?php
session_start();
require_once __DIR__ . '/Database.php';
try {
    $db = new Database;
    $connect = $db->connect();
    $fetch = $connect->prepare('SELECT  *  FROM users WHERE id <> :id');
    $fetch->execute([
        ':id' => $_SESSION['user_id'],
    ]);
    $result = $fetch->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
} catch (PDOException $th) {

}