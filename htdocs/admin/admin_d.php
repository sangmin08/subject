<?php
require_once "../db.php";

$sql = "
    SELECT
        c.id AS checkout_id,
        b.name,
        b.author,
        b.publisher,
        c.chekout_data,
        DATE_ADD(c.chekout_data, INTERVAL 9 DAY) AS return_date,
        DATEDIFF(DATE_ADD(c.chekout_data, INTERVAL 9 DAY), CURDATE()) AS remain_days,
        u.account_id
        FROM book_checkouts c
        JOIN books b
            ON c.book_id = b.id
        JOIN user u
            ON c.user_id = u.id
        WHERE c.status = '대출중'
        ORDER BY c.id DESC
";

$stmt = $db->prepare($sql);
$stmt->execute();
$book_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>도서대출현황</h1>

<table border="1" cellpadding="10">
    <tr>
        <th>도서명</th>
        <th>저자명</th>
        <th>출판사</th>
        <th>대출일자</th>
        <th>반납일</th>
        <th>남은기간</th>
        <th>대출자아이디</th>
        <th>관리</th>
    </tr>

    <?php foreach($book_list as $row): ?>
    <tr>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['author']) ?></td>
        <td><?= htmlspecialchars($row['publisher']) ?></td>
        <td><?= htmlspecialchars($row['chekout_data']) ?></td>
        <td><?= htmlspecialchars($row['return_date']) ?></td>
        <td><?= $row['remain_days'] ?>일</td>
        <td><?= htmlspecialchars($row['account_id']) ?></td>
        <td>
            <?php if($row['remain_days'] < 0): ?>
                <form action="action.php" method="post">
                    <input type="hidden" name="mode" value="admin_return">
                    <input type="hidden" name="checkout_id" value="<?= $row['checkout_id'] ?>">
                    <button type="submit">반납처리</button>
                </form>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>

    <?php
        $reserveSql = "
            SELECT
                r.id,
                r.room_id,
                r.start_date,
                r.end_date,
                u.user_id AS reserver_id
            FROM room_reservations r
            JOIN users u
                ON r.user_id = u.id
            WHERE r.end_date >= NOW()
            ORDER BY r.start_date ASC, r.room_id ASC
        ";

        $stmt = $db->prepare($reserveSql);
        $stmt->execute();
        $reserveList = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <h2>열람실예약현황</h2>

    <?php if(count($reserveList) > 0): ?>
        <table>
            <tr>
                <th>좌석번호</th>
                <th>시작일시</th>
                <th>종료일시</th>
                <th>예약자아이디</th>
                <th>관리</th>
            </tr>

            <?php foreach($reserveList as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['room_id']) ?></td>
                    <td><?= htmlspecialchars($row['start_date']) ?></td>
                    <td><?= htmlspecialchars($row['end_date']) ?></td>
                    <td><?= htmlspecialchars($row['reserver_id']) ?></td>
                    <td>
                        <form action="action.php" method="post" onsubmit="return confirm('해당 예약을 취소하시겠습니까?');">
                            <input type="hidden" name="mode" value="cancel_reservation">
                            <input type="hidden" name="reservation_id" value="<?= $row['id'] ?>">
                            <button type="submit">취소</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <div class="empty">현재 유효한 열람실 예약이 없습니다.</div>
    <?php endif; ?>
</table>