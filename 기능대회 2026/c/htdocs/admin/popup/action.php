<?php
require_once "../../db.php";

$mode = $_POST['mode'] ?? $_GET['mode'] ?? '';

switch ($mode) {

    case "create":
        $title = $_POST['title'];
        $content = $_POST['content'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../../uploads/popimg/".$image);

        $stmt = $db->prepare("INSERT INTO modals(title,content,image,start_date,end_date) VALUES(?,?,?,?,?)");
        $stmt->execute([$title,$content,$image,$start_date,$end_date]);

        header("Location: list.php");
        exit;
        break;


    case "update":
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        $image = $_FILES['image']['name'];

        if($image){
            move_uploaded_file($_FILES['image']['tmp_name'], "../../uploads/popimg/".$image);
        } else {
            $image = $_POST['old_image'];
        }

        $stmt = $db->prepare("UPDATE modals SET title=?,content=?,image=?,start_date=?,end_date=? WHERE id=?");
        $stmt->execute([$title,$content,$image,$start_date,$end_date,$id]);

        header("Location: list.php");
        exit;
        break;


    case "delete":
        $id = $_GET['id'];

        $stmt = $db->prepare("DELETE FROM modals WHERE id=?");
        $stmt->execute([$id]);

        header("Location: list.php");
        exit;
        break;
}
?>