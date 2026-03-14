<?php 
require_once "header.php";

if (!isset($_SESSION['user'])) {
    echo "<script>alert('잘못된 접근입니다.'); location.href='index.php';</script>";
    exit;
}

$user_id = $_SESSION['user']->id;

$sql = "
    SELECT 
        b.*,
        c.id AS checkout_id,
        c.chekout_data,
        c.status
    FROM book_checkouts c
    INNER JOIN books b
        ON b.id = c.book_id
    WHERE c.user_id = $user_id
    ORDER BY c.id DESC
";

$stmt = $db->prepare($sql);
$stmt->execute();
$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>내 대출 현황</title>
</head>
<body>
    <p><?= $_SESSION['user']->name ?>님의 페이지</p>
    <h1>대출 현황</h1>

    <ul>
        <?php if ($list): ?>
            <?php foreach ($list as $row): ?>
                <?php
                    $return_date = date("Y-m-d", strtotime($row['chekout_data'] . " +9 days"));
                    $remain = ceil((strtotime($return_date) - time()) / 86400);
                ?>
                <li style="margin-bottom:20px; border:1px solid #000; padding:10px; list-style:none;">
                    <img src="uploads/bookimg/<?= $row['image'] ?>" alt="" width="120">

                    <p>도서명 : <?= $row['name'] ?></p>
                    <p>저자명 : <?= $row['author'] ?></p>
                    <p>대출일자 : <?= $row['chekout_data'] ?></p>
                    <p>반납일 : <?= $return_date ?></p>
                    <p>
                        남은기간 :
                        <?= $remain >= 0 ? $remain . '일' : '연체 ' . abs($remain) . '일' ?>
                    </p>
                    <p>상태 : <?= $row['status'] ?></p>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li style="list-style:none;">대출한 도서가 없습니다.</li>
        <?php endif; ?>
    </ul>
</body>
</html>
<?php require_once "footer.php"?>