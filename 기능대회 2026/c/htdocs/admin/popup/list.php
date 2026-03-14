<?php
require_once "../../db.php";

$stmt = $db->prepare("SELECT * FROM modals ORDER BY id DESC");
$stmt->execute();
$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>팝업 목록</title>
</head>
<body>
    <h1>팝업 목록</h1>

    <a href="create.php">팝업 등록</a>

    <table border="1" cellpadding="10">
        <tr>
            <th>번호</th>
            <th>제목</th>
            <th>내용</th>
            <th>이미지</th>
            <th>시작일</th>
            <th>종료일</th>
            <th>관리</th>
        </tr>

        <?php foreach($list as $row): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= ($row['title']) ?></td>
            <td><?= ($row['content']) ?></td>
            <td>
                <?php if($row['image']) { ?>
                    <img src="../../uploads/popimg/<?= $row['image'] ?>" width="100">
                <?php } ?>
            </td>
            <td><?= $row['start_date'] ?></td>
            <td><?= $row['end_date'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">수정</a>
                <a href="action.php?mode=delete&id=<?= $row['id'] ?>" onclick="return confirm('삭제하시겠습니까?')">삭제</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>