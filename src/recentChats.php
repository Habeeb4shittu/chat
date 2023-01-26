<?php
session_start();
require_once __DIR__ . '/Database.php';
try {
    $db = new Database;
    $connect = $db->connect();
    $fetch = $connect->prepare('SELECT
    m.*, friends.status
FROM
    messages m
        JOIN
    (SELECT
        message_id, MAX(messages.send_time) latest_time
    FROM
        messages
    WHERE
        sender = :id OR receiver = :id
    GROUP BY message_id) lm ON lm.latest_time = m.send_time  JOIN friends ON m.message_id = friends.friend_id WHERE friends.status <> "Blocked"
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
    $stmt = $connect->prepare("SELECT * FROM blocked");
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $blockedId = array_map(fn($el) => $el['friend_id'], $res);
    $unblockedFriends = array_filter($friends, function ($el) {
        global $blockedId;
        $msg_id = [$el['id'], $_SESSION['user_id']];
        sort($msg_id);
        $msg_id = implode("", $msg_id);
        return !in_array($msg_id, $blockedId);
    });
    // print_r($blockedId);
    // echo "<pre>";
    // print_r($unblockedFriends);
    echo json_encode($unblockedFriends);
} catch (PDOException $e) {

}