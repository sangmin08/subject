<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>팝업 등록</title>
</head>
<body>
    <h1>팝업 등록</h1>

    <form action="action.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="mode" value="create">

        <p>
            제목
            <input type="text" name="title" required>
        </p>

        <p>
            내용
            <textarea name="content" required></textarea>
        </p>

        <p>
            이미지
            <input type="file" name="image" required>
        </p>

        <p>
            시작일
            <input type="date" name="start_date" required>
        </p>

        <p>
            종료일
            <input type="date" name="end_date" required>
        </p>

        <button type="submit">등록</button>
        <a href="list.php">목록</a>
    </form>
</body>
</html>