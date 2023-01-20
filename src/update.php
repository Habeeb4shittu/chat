<?php
session_start();
require_once __DIR__ . '/Database.php';
try {
    $db = new Database;
    $connect = $db->connect();

    // print_r($_FILES);
    $file = $_FILES["image"];
    $filename = $file["name"];
    $filesize = $file["size"];
    $filetype = $file["type"];
    $types = ['image/jpeg', 'image/png', 'image/jpg'];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "../assets/" . $filename;
    if (empty($_POST['firstname']) || empty($_POST['lastname'])) {
        echo "<div class='error'>Input fields cant be empty</div>";
    } else {
        if (!$filename) {
            $fetch = $connect->prepare('UPDATE  users
             SET firstname = :firstname, lastname = :lastname
             WHERE id = :id ');

            $fetch->execute([
                ':firstname' => $_POST['firstname'],
                ':lastname' => $_POST['lastname'],
                ':id' => $_SESSION['user_id'],
            ]);
        } elseif ($filesize > 3000000) {
            echo "<div class='error'>File is too large(3mb Max)</div>";
        } elseif (!in_array($filetype, $types)) {
            echo "<div class='error'>Invalid file type (jpeg, png, jpg supported)</div>";
        } else {
            $fetch = $connect->prepare('UPDATE  users
        SET firstname = :firstname, lastname = :lastname, image = :image
         WHERE id = :id ');
            $fetch->execute([
                ':firstname' => $_POST['firstname'],
                ':lastname' => $_POST['lastname'],
                ':image' => $filename,
                ':id' => $_SESSION['user_id'],
            ]);

            if (move_uploaded_file($tempname, $folder)) {
                echo "";
            } else {
                echo "Failed";
            }
            echo "<div class='success'>Settings updated successfully</div>";
        }
    }
} catch (PDOException $th) {

}