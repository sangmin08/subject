<?php
require_once "../../db.php";

$mode = $_POST['mode'] ?? $_GET['mode'] ?? '';

switch ($mode) {

    case "create":
        $name = $_POST['title'];
        $author = $_POST['author'];
        $publisher = $_POST['publisher'];
        $publish_year = $_POST['publish_year'];
        $price = $_POST['price'];

        $image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];

        $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        $allow = ['jpg','jpeg','png'];

        if(!in_array($ext, $allow)){
            echo "JPG, JPEG, PNG 파일만 업로드 가능합니다.";
            exit;
        }

        move_uploaded_file($tmp, "../../uploads/bookimg/".$image);

        $stmt = $db->prepare("INSERT INTO books(name,author,publisher,image,published_year,price) VALUES(?,?,?,?,?,?)");
        $stmt->execute([$name,$author,$publisher,$image,$publish_year,$price]);

        header("Location: list.php");
        exit;
        break;
}
?>