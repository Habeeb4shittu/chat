<?php
session_start();
require_once __DIR__ . '/Database.php';
try {
    $db = new Database;
    $connect = $db->connect();
    $fetch = $connect->prepare('SELECT
    m.*
FROM
    messages m
        JOIN
    (SELECT
        message_id, MAX(messages.send_time) latest_time
    FROM
        messages
    WHERE
        sender = :id OR receiver = :id
    GROUP BY message_id) lm ON lm.latest_time = m.send_time
ORDER BY m.send_time DESC  ');
    $fetch->execute([
        ':id' => $_SESSION['user_id'],
    ]);
    $result = $fetch->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
} catch (PDOException $e) {

}