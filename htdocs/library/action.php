<?php
require_once "../db.php";

$mode = $_POST['mode'] ?? $_GET['mode'] ?? '';

switch ($mode) {
    case "checkin":
        if (!isset($_SESSION['user']->id)) {
            echo "<script>alert('로그인 후 이용 가능합니다.'); location.href='../index.php';</script>";
            exit;
        }

        $user_id = $_SESSION['user']->id;
        $book_id = $_POST['book_id'] ?? '';
        $chekout_data = date("Y-m-d");
        $status = "대출중";

        if ($book_id == '') {
            echo "<script>alert('잘못된 접근입니다.'); location.href='../dataroom.php';</script>";
            exit;
        }

        // 이미 대출중인지 확인
        $stmt = $db->prepare("SELECT * FROM book_checkouts WHERE book_id = ? AND status = ?");
        $stmt->execute([$book_id, $status]);
        $check = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($check) {
            echo "<script>alert('이미 대출중인 도서입니다.'); location.href='../dataroom.php';</script>";
            exit;
        }

        // 대출 등록
        $stmt = $db->prepare("INSERT INTO book_checkouts (book_id, user_id, chekout_data, status) VALUES (?, ?, ?, ?)");
        $stmt->execute([$book_id, $user_id, $chekout_data, $status]);

        echo "<script>alert('대출이 완료되었습니다.'); location.href='../dataroom.php';</script>";
        exit;
        break;

    case "return":
        $checkout_id = $_POST['checkout_id'] ?? '';

        if ($checkout_id == '') {
            echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
            exit;
        }

        $stmt = $db->prepare("UPDATE book_checkouts SET status = '반납완료' WHERE id = ?");
        $stmt->execute([$checkout_id]);

        echo "<script>alert('반납이 완료되었습니다.'); location.href='/library/mypage.php';</script>";
        exit;
        break;

    default:
        echo "<script>alert('잘못된 접근입니다.'); location.href='../dataroom.php';</script>";
        exit;
}