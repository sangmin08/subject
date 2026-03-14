<?php
require_once "../../db.php";

$id = $_GET['id'] ?? '';

$stmt = $db->prepare("SELECT * FROM modals WHERE id=?");
$stmt->execute([$id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$row){
    die("존재하지 않는 팝업입니다.");
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>팝업 수정</title>
</head>
<body>
    <h1>팝업 수정</h1>

    <form action="action.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="mode" value="update">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <input type="hidden" name="old_image" value="<?= htmlspecialchars($row['image']) ?>">

        <p>
            제목
            <input type="text" name="title" value="<?= htmlspecialchars($row['title']) ?>" required>
        </p>

        <p>
            내용
            <textarea name="content" required><?= htmlspecialchars($row['content']) ?></textarea>
        </p>

        <p>
            현재 이미지<br>
            <?php if($row['image']) { ?>
                <img src="../../uploads/popimg/<?= htmlspecialchars($row['image']) ?>" width="120"><br>
            <?php } ?>
            새 이미지
            <input type="file" name="image">
        </p>

        <p>
            시작일
            <input type="date" name="start_date" value="<?= $row['start_date'] ?>" required>
        </p>

        <p>
            종료일
            <input type="date" name="end_date" value="<?= $row['end_date'] ?>" required>
        </p>

        <button type="submit">수정</button>
        <a href="list.php">목록</a>
    </form>
</body>
</html>