<?php
require_once "db.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user'])) {
    echo "<script>alert('로그인 후 이용 가능합니다.'); location.href='index.php';</script>";
    exit;
}

$user = $_SESSION['user'];
$user_id = $user->id;

$sql = "
    SELECT 
        b.*,
        c.id AS checkout_id,
        c.chekout_data,
        c.status
    FROM book_checkouts c
    JOIN books b
        ON b.id = c.book_id
    WHERE c.user_id = ?
      AND c.status = '대출중'
    ORDER BY c.id DESC
";

$stmt = $db->prepare($sql);
$stmt->execute([$user_id]);
$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>마이페이지</title>
</head>
<body>
    <p><?= htmlspecialchars($user->name) ?>님의 페이지</p>

    <h1>대출 현황</h1>

    <ul>
        <?php foreach($list as $row): ?>
            <?php
                $checkout_date = $row['chekout_data'];
                $return_date = date("Y-m-d", strtotime($checkout_date . " +9 days"));

                $today = strtotime(date("Y-m-d"));
                $return_day = strtotime($return_date);

                $remain = floor(($return_day - $today) / 86400);
            ?>
            <li style="margin-bottom:20px; border:1px solid #000; padding:10px; list-style:none;">
                <img src="uploads/bookimg/<?= htmlspecialchars($row['image']) ?>" alt="" width="120">

                <p>도서명 : <?= htmlspecialchars($row['name']) ?></p>
                <p>저자명 : <?= htmlspecialchars($row['author']) ?></p>
                <p>대출일자 : <?= htmlspecialchars($checkout_date) ?></p>
                <p>반납일 : <?= $return_date ?></p>
                <p>남은기간 : <?= $remain ?>일</p>

                <form action="/library/action.php" method="post">
                    <input type="hidden" name="mode" value="return">
                    <input type="hidden" name="checkout_id" value="<?= $row['checkout_id'] ?>">
                    <button type="submit">반납하기</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>