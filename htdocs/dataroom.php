<?php
require_once "db.php";

$sql = "
    SELECT 
        b.*,
        c.id AS checkout_id,
        c.chekout_data,
        c.status
    FROM books b
    LEFT JOIN book_checkouts c
        ON b.id = c.book_id
    ORDER BY b.id DESC
";

$stmt = $db->prepare($sql);
$stmt->execute();
$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>도서목록</title>
</head>
<body>
    <h1>도서목록</h1>

    <ul>
        <?php foreach($list as $row): ?>
            <li style="margin-bottom:20px; border:1px solid #000; padding:10px; list-style:none;">
                <img src="uploads/bookimg/<?= ($row['image']) ?>" alt="" width="120">

                <p>도서명 : <?= ($row['name']) ?></p>
                <p>저자명 : <?= ($row['author']) ?></p>
                <p>발행년 : <?= ($row['published_year']) ?></p>
                <p>가격 : <?= ($row['price']) ?>원</p>

                <p>
                    대출가능상태 :
                    <?php if($row['checkout_id'] && $row['status'] == '대출중'): ?>
                        대출중
                    <?php else: ?>
                        대출가능
                    <?php endif; ?>
                </p>

                <p>
                    대출기간 :
                    <?php if($row['checkout_id'] && $row['status'] == '대출중'): ?>
                        <?= date("Y-m-d", strtotime($row['chekout_data']." +9 days")) ?>
                    <?php else: ?>
                        <?= date("Y-m-d") ?> ~ <?= date("Y-m-d", strtotime("+9 days")) ?>
                    <?php endif; ?>
                </p>

                <?php if(!$row['checkout_id'] || $row['status'] != '대출중'): ?>
                    <form action="/library/action.php" method="post">
                        <input type="hidden" name="mode" value="checkin">
                        <input type="hidden" name="book_id" value="<?= $row['id'] ?>">
                        <button type="submit">대출하기</button>
                    </form>
                <?php else: ?>
                    <button type="button" disabled>대출불가</button>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>