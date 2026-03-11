<?php
require_once "../../db.php";

$today = date("Y-m-d");

$stmt = $db->prepare("SELECT * FROM modals WHERE start_date <= ? AND end_date >= ?");
$stmt->execute([$today, $today]);
$popups = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>메인페이지</title>
    <style>
        .popup {
            width: 300px;
            border: 1px solid #000;
            background: #fff;
            padding: 15px;
            position: fixed;
            top: 50px;
            left: 50px;
            margin-bottom: 10px;
        }
        .popup img {
            width: 100%;
        }
    </style>
    <script>
        function closePopup(id){
            document.getElementById("popup" + id).style.display = "none";
        }
    </script>
</head>
<body>
    <h1>메인페이지</h1>

    <?php foreach($popups as $row): ?>
        <div class="popup" id="popup<?= $row['id'] ?>">
            <button onclick="closePopup(<?= $row['id'] ?>)">닫기</button>
            <h3><?= $row['title'] ?></h3>
            <p><?= $row['content'] ?></p>
            <?php if($row['image']) { ?>
                <img src="../../uploads/popimg/<?=($row['image']) ?>">
            <?php } ?>
        </div>
    <?php endforeach; ?>
</body>
</html>