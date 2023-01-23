<?php
require_once __DIR__ . '/Database.php';
try {
    $db = new Database;
    $connect = $db->connect();
    $fetch = $connect->prepare('SELECT  *  FROM users WHERE id = :id ');
    $fetch->execute([
        ':id' => $_POST['id'],
    ]);
    $result = $fetch->fetch(PDO::FETCH_ASSOC);
    echo json_encode($result);
} catch (PDOException $th) {

}