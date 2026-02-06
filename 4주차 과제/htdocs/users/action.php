<?php

// echo '<pre>';
// print_r($_POST);
// exit;

require_once "../db.php";

$mode = $_POST['mode'] ?? $_GET['mode'] ?? "";

switch ($mode) {
    case 'create':
        $pstmt = $db->prepare("INSERT INTO users (email, name, password) VALUES (:email, :name, :password)");
        $pstmt->execute([
            "email" => $_POST['userid'],
            "name" => $_POST['username'],
            "password" => $_POST['userpass']
        ]);

        header("Location: ../index.php");
        exit;
        break;
    
    case 'login':
        $pstmt = $db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");

        $pstmt->execute([
            "email" => $_POST['userid'],
            "password" => $_POST['userpass']
        ]);

        $user = $pstmt->fetch();

        if (!$user){
            header("Location: ../index.php");
            exit;
        }

        $_SESSION["user"] = $user;

        header("Location: ../index.php");
        exit;
        break;
    
    case 'logout':
        unset($_SESSION['user']);
        header("Location: ../index.php");
        exit;
        break;
}
?>