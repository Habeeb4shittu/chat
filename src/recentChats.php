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
    $friends = [];
    foreach ($result as $key => $item) {
        // echo ($item['receiver']);
        $query = $connect->prepare('SELECT  *  FROM users WHERE id = :id');
        $query->execute([
            ':id' => $item['receiver'],
        ]);
        $query2 = $connect->prepare('SELECT  *  FROM users WHERE id = :u_id');
        $query2->execute([
            ':u_id' => $item['sender'],
        ]);
        $result2 = $query2->fetch(PDO::FETCH_ASSOC);
        array_push($friends, $result2);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        array_push($friends, $result);
    }
    echo json_encode($friends);
} catch (PDOException $e) {

}