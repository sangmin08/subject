<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>신규 도서 등록</title>
</head>
<body>

    <h1>신규 도서 등록</h1>

    <form action="action.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="mode" value="create">

        <p>
            도서명
            <input type="text" name="title" required>
        </p>

        <p>
            저자명
            <input type="text" name="author" required>
        </p>

        <p>
            출판사
            <input type="text" name="publisher" required>
        </p>

        <p>
            도서사진
            <input type="file" name="image" accept="image/*" required>
        </p>

        <p>
            발행년
            <input type="date" name="publish_year"required>
        </p>

        <p>
            가격
            <input type="number" name="price"required>
        </p>

        <button type="submit">등록</button>
        <a href="list.php">목록</a>

    </form>

</body>
</html>