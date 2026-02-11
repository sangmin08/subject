<?php 

    require_once "../db.php";
    $mode = $_POST['mode'] ?? $_GET['mode'] ?? "";
        $boardId = (int)($_GET['board_id'] ?? $_POST['board_id'] ?? 0);

    switch ($mode) {
        case 'write':
            $filename = $_FILES['upimg']['name'];
            $pstmt = $db->prepare("INSERT INTO boards (user_id, user_name, category, title, text, img, date) VALUES (:user_id, :user_name, :category, :title, :text, :img, NOW())");
            $pstmt->execute([
                "user_id" => $_SESSION['user']->email,
                "user_name" => $_SESSION['user']->name,
                "category" => $_POST['category'],
                "title" => $_POST['title'],
                "text" => $_POST['comment'],
                "img" => $filename
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
        case 'update':

            $pstmt = $db->prepare("UPDATE boards set category=:category, title=:title, text=:text, img=:img WHERE board_id = :id");
            $pstmt->execute([
                "category" => $_POST['category'],
                "title" => $_POST['title'],
                "text" => $_POST['comment'],
                "img" => $_FILES['upimg']['name'],
                "id" => $boardId
            ]);

            header("Location: ../view.php?id=" . $boardId);
            exit;

            break;
    }