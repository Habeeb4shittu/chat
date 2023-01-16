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
    // print_r($result);
} catch (PDOException $th) {

}