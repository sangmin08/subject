<?php 

    require_once "../db.php";
    $mode = $_POST['mode'] ?? $_GET['mode'] ?? "";

    switch ($mode) {
        case 'write':
            $pstmt = $db->prepare("INSERT INTO boards (user_id, user_name, category, title, text, date) VALUES (:user_id, :user_name, :category, :title, :text, NOW())");
            $pstmt->execute([
                "user_id" => $_SESSION['user']->email,
                "user_name" => $_SESSION['user']->name,
                "category" => $_POST['category'],
                "title" => $_POST['title'],
                "text" => $_POST['comment']
            ]);

            header("Location: ../index.php");
            exit;
            break;
        case 'delete':
            $pstmt = $db->prepare("DELETE FROM boards WHERE board_id = :id");
            $pstmt->execute([
                "id" => $_GET['id']
            ]);

            header("Location: ../index.php");
            exit;

            break;
    }