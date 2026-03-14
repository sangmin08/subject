<?php
    require_once "../db.php";

    $mode = $_POST['mode'] ?? $_GET['mode'] ?? "";

    switch ($mode) {
        case 'create':
            $account_id = $_POST['id'] ?? '';
            $password = $_POST['password'] ?? '';
            $name = $_POST['name'] ?? '';

            $stmt = $db->prepare("SELECT COUNT(*) FROM user WHERE account_id = :account_id");
            $stmt->execute(["account_id"=>$account_id]);
            $count = $stmt->fetchColumn();

            if($count > 0){
                die("이미 가입된 회원입니다");
                header("Location: ../index.php");
            }

            $pstmt = $db->prepare("INSERT INTO user (account_id, password, name) VALUES (:account_id, :password, :name)");
            $pstmt->execute([
                "account_id" => $_POST['id'],
                "password" => $_POST['password'],
                "name" => $_POST['name']
            ]);

            header("Location: ../index.php");
            exit;
            break;

        case 'login':
            $pstmt = $db->prepare("SELECT * FROM user WHERE account_id = :account_id AND password = :password");

            $pstmt->execute([
                "account_id" => $_POST['id'],
                "password" => $_POST['password']
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