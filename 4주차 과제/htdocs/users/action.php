<?php

// echo '<pre>';
// print_r($_POST);
// exit;


require_once "../db.php";


$mode = $_POST['mode'] ?? $_GET['mode'] ?? "";


switch ($mode) {
    case 'create':
        $userid = $_POST['userid'] ?? '';
        $userpw1 = $_POST['userpass'] ?? '';
        $userpw2 = $_POST['userpass2'] ?? '';
        
        if ($userpw1 !== $userpw2) {
            die("비밀번호가 일치하지 않습니다.");
        }
        
        $stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
        $stmt->execute(["email"=>$userid]);
        $count = $stmt->fetchColumn();
        
        if($count > 0){
            die("이미 존재하는 이메일입니다.");
        }
        
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