<?php
require_once __DIR__ . '/Database.php';
// class User {
//     function
// }
if (isset($_POST['submit'])) {
    $db = new Database;
    $add = $db->connect();
    $details = $_POST;
    array_pop($details);
    $empty = [];
    $checkExist = $add->prepare('SELECT COUNT(*) FROM users WHERE email = :email ');
    $checkExist->execute([":email" => $details['email']]);
    $val = $checkExist->fetch(PDO::FETCH_COLUMN);
    foreach ($details as $key => $value) {
        if (empty($value)) {
            $empty[$key] = "The $key field is required";
        }
    }
    if ($val > 0) {
        $error["exists"] = "Email Already Exists";
        return;
    }
    if (count($empty) > 0) {
        $error = $empty;
    } else if (strlen($details["password"]) < 8) {
        $error["length"] = "Password is too short";
    } else if ($details["password"] !== $details["conpassword"]) {
        $error["mismatch"] = "Password mismatch";
    } else {
        $stmt = $add->prepare('INSERT INTO users(firstname, lastname, email, gender, image,  user_password) VALUES(:firstname, :lastname, :email, :gender,  :image,:user_password)');
        $stmt->execute([
            ":firstname" => $details['firstname'],
            ":lastname" => $details['lastname'],
            ":email" => $details['email'],
            ":gender" => $details['gender'],
            ":image" => $details['gender'],
            ":user_password" => password_hash($details['password'], PASSWORD_DEFAULT),
        ]);
        header('location: index.php');
    }
}