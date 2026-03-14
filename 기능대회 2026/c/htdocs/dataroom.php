<?php
require_once "db.php";
require_once "header.php";

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
    <style>
        section {
            width: 1200px;   
            margin: 120px auto;
        }

        .title {
            text-align:center;
            font-size:36px;
            margin-bottom:60px;
            font-weight:700;
        }

        section > ul {
            margin: 0;
            padding: 0;
            border-top: 1px solid #243447;
        }
        
        section li {
            box-shadow: 1px 1px 1px black;
            display:flex;
            position: relative;
        }

        .text {
        }

        .state {
            position: absolute;
            top:0
        }

        .state > div {
            padding: 5px 10px;
            border-radius: 20px;
            
            color:#fff;
        }
    </style>
</head>
<body>
<section>

    <h1 class="title">도서목록</h1>
        
    <ul>
        <?php foreach($list as $row): ?>
        <li style="margin-bottom:20px; padding:10px; list-style:none;">
            <div class="img">
                <img src="uploads/bookimg/<?= ($row['image']) ?>" alt="" width="120">
            </div>
            
            <div class="text">
                <p>도서명 : <?= ($row['name']) ?></p>
                <p>저자명 : <?= ($row['author']) ?></p>
                <p>발행년 : <?= ($row['published_year']) ?></p>
                <b>가격 : <?= ($row['price']) ?>원</b>
                
                <div class="state">
                    <?php if($row['checkout_id'] && $row['status'] == '대출중'): ?>
                        <div style="background-color:crimson">대출중</div>
                    <?php else: ?>
                        <div style="background-color: dodgerblue">대출가능</div>
                    <?php endif; ?>
                </div>
                            
            <p>대출기간 :
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
            </div>
        </li>
        <?php endforeach; ?>
    </ul>
</section>
</body>
</html>
                                
<?php require_once "footer.php";?>