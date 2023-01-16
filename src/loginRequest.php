<?php
require_once __DIR__ . '/Database.php';
session_start();
if (isset($_POST['login'])) {
    $logins = $_POST;
    array_pop($logins);
    $empty = [];
    $db = new Database;
    $login = $db->connect();
    $checkExist = $login->prepare('SELECT  *  FROM users WHERE email = :email');
    $checkExist->execute([
        ":email" => $logins['email'],
    ]);
    $val = $checkExist->fetch(PDO::FETCH_ASSOC);
    // print_r($val);
    foreach ($logins as $key => $value) {
        if (empty($value)) {
            $empty[$key] = "The $key field is required";
        }
    }
    if (count($empty) > 0) {
        $error = $empty;
    } else if ($val && $val['user_password'] == password_verify($logins['password'], $val['user_password'])) {
        $_SESSION['user_id'] = $val['id'];
        header('location: chat.php');

    } else {
        $error["exists"] = "Invalid Login Details";
        return;
    }

}
if (isset($_SESSION['user_id'])) {
    header('location: ../chat.php');
}
