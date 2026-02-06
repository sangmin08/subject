<?php   
    require_once "../db.php";
    $mode = $_POST['mode'] ?? $_GET['mode'] ?? "";
    $boardId = (int)($_GET['id'] ?? $_POST['id'] ?? 0);
    
    
    switch ($mode) {
        case 'comment':
            $pstmt = $db->prepare("INSERT INTO comments (user_id, user_name, board_id, text, date) VALUES (:user_id, :user_name, :board_id,  :text, NOW())");
            $pstmt->execute([
                "user_id" => $_SESSION['user']->email,
                "user_name" => $_SESSION['user']->name,
                "board_id" => $boardId,
                "text" => $_POST['comment']
            ]);

            header("Location: ../view.php");
            exit;
            break;
    
        case 'delete':
            $pstmt = $db->prepare("DELETE FROM comments WHERE comment_id = :id");
            $pstmt->execute([
                "id" => $_GET['id']
            ]);

            header("Location: ../view.php");
            exit;

            break;
    }
?>