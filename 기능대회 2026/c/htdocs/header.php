<?php require_once "db.php"?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            box-sizing: border-box;
        }

        body {
            padding: 0;
            margin: 0;
            color: #243447;
            background-color: #f8f6f1;
        }

        a {
            text-decoration: none;
            color: #243447;
        }

        header {
            padding: 20px;
            display: flex;
            justify-content: space-between;
            background-color: #fffdf8;
        }

        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo img {
            width: 100px;
        }

        /*  */
        .gnb {
            display: inline-block;
            border-radius: 8px;
        }

        .main-menu {
            display: flex;
            gap: 15px;
            list-style: none;
        }

        /* 개별 메뉴 아이템 */
        .menu-item {
            position: relative;
            cursor: pointer;
        }

        .menu-label {
            position: relative;
            display: flex;
            align-items: center;
            padding: 12px 16px;
            font-weight: bold;
            border-radius: 6px;
            transition: background-color 0.2s ease, color 0.2s ease;
        }

        .menu-item:hover .menu-label {
            background-color: #e9eef5;
            color: #1f3a5f;
        }

        .menu-item:hover>div>a {
            color: #1f3a5f;
        }

        /* 투명 버튼 */
        .trigger {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
            border: none;
            z-index: 10;
        }

        .icon {
            position: relative;
            width: 12px;
            height: 12px;
            margin-left: 10px;
            transition: transform 0.3s ease;
        }

        .icon::before,
        .icon::after {
            content: '';
            position: absolute;
            background-color: currentColor;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .icon::before {
            width: 12px;
            height: 2px;
        }

        /* 가로선 (-) */
        .icon::after {
            width: 2px;
            height: 12px;
        }

        /* 클릭 시 서브메뉴 애니메이션 및 [+] -> [-] 아이콘 회전 변경 */
        .menu-item:focus-within .icon {
            transform: rotate(180deg);
        }

        .menu-item:focus-within .icon::after {
            transform: translate(-50%, -50%) scaleY(0);
            opacity: 0;
        }

        /* 서브메뉴 기본 상태 */
        .submenu {
            position: absolute;
            top: 100%;
            left: 0;
            min-width: 180px;
            background: #fffdf8;
            border-radius: 6px;
            box-shadow: 0 8px 16px rgba(31, 58, 95, 0.12);
            padding: 8px 0;
            list-style: none;
            z-index: 20;

            visibility: hidden;
            opacity: 0;
            transform: translateY(-10px);
            transition: visibility 0.3s, opacity 0.3s ease, transform 0.3s ease;
        }

        /* 메인메뉴 클릭 시 서브메뉴 애니메이션 */
        .menu-item:focus-within .submenu {
            visibility: visible;
            opacity: 1;
            transform: translateY(0);
        }

        .submenu-item a {
            display: block;
            padding: 10px 20px;
            text-decoration: none;
            color: #4d5d6c;
            font-size: 14px;
            transition: background-color 0.2s, color 0.2s;
        }

        .submenu-item a:hover {
            background-color: #eef3f8;
            color: #243447;
        }

        .menu-item:not(:hover) .trigger,
        .menu-item:not(:hover) .submenu {
            display: none !important;
        }

        /*  */

        .login {
            display: flex;
            gap: 30px;
            margin: 16px 0;
        }

        .login a {
            width: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
            color: #4d5d6c;
            transition: background-color 0.2s, color 0.2s;
        }

        .login a:hover {
            color: #243447;
            background-color: #eef3f8;
        }

        #sign-in , #sign-up {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-color: rgba(20, 30, 48, 0.55);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.5s;
            z-index: 999;
        }

        form {
            height: 400px;
            width: 400px;
            text-align: center;
            background-color: #fffdf8;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50px;
            position: relative;
        }

        input {
            width: 250px;
            padding: 15px;
            margin-bottom: 5px;
            border-radius: 20px;
            border: 1px solid #d9e0e8;
            background-color: #ffffff;
            color: #243447;
        }

        button {
            width: 280px;
            padding: 15px;
            margin-bottom: 5px;
            border-radius: 10px;
            border: none;
            background-color: #d8e4f0;
            color: #1f3a5f;
        }

        #sign-in button:hover {
            cursor: pointer;
            background-color: #1f3a5f;
            color: #fff;
        }

        #sign-up button:hover {
            cursor: pointer;
            background-color: #1f3a5f;
            color: #fff;
        }

        #sign-in:not(:target) {
            visibility: hidden;
            opacity: 0;
        }
        #sign-up:not(:target) {
            visibility: hidden;
            opacity: 0;
        }
        
        .cancel {
            position: absolute;
            top: 10%;
            right: 10%;
            text-decoration: none;
            color: #243447;
        }

    </style>
</head>

<body>
    <header>
        <div class="logo">
            <a href="index.php"><img src="images/images (2).png" alt="logo.jpg"></a>
        </div>
        <nav class="gnb">
            <ul class="main-menu">
                <li class="menu-item has-sub">
                    <div class="menu-label">
                        <button class="trigger"></button>
                        <a href="#">도서관소개</a>
                        <span class="icon"></span>
                    </div>
                    <ul class="submenu">
                        <li class="submenu-item"><a href="intro.php">도서관소개</a></ldiv>
                        <li class="submenu-item"><a href="#">도서관현황</a></ldiv>
                    </ul>
                </ldiv>

                <li class="menu-item has-sub">
                    <div class="menu-label">
                        <button class="trigger"></button>
                        <a href="#">도서자료실</a>
                        <span class="icon"></span>
                    </div>
                    <ul class="submenu">
                        <li class="submenu-item"><a href="dataroom.php">자료실</a></ldiv>
                        <li class="submenu-item"><a href="room.php">열람실 예약</a></ldiv>
                    </ul>
                </ldiv>

                <li class="menu-item has-sub">
                    <div class="menu-label">
                        <button class="trigger"></button>
                        <a href="#">회원서비스</a>
                        <span class="icon"></span>
                    </div>
                    <ul class="submenu">
                        <li class="submenu-item"><a href="#sign-up">회원가입</a></ldiv>
                        <li class="submenu-item"><a href="my.php">마이페이지</a></ldiv>
                    </ul>
                </ldiv>

                <li class="menu-item">
                    <div class="menu-label">
                        <a href="#">도서검색</a>
                    </div>
                </ldiv>

                <li class="menu-item">
                    <div class="menu-label">
                        <a href="#">도서관리자</a>
                    </div>
                </ldiv>
            </ul>
        </nav>
        <div class="login">
            <?php if(isset($_SESSION['user'])) :?>
                <p><?=$_SESSION['user']->name?>(<?=$_SESSION['user']->account_id?>)</p>
                <a href="/user/action.php?mode=logout">로그아웃</a>
            <?php else :?>
                <a href="#sign-in">로그인</a>
                <a href="#sign-up">회원가입</a>
            <?php endif;?>
        </div>
    </header>

    <div id="sign-in">
    <form action="/user/action.php" method="POST">
        <input type="hidden" name="mode" value="login">
        <a class="cancel" href="#">X</a>
        <div>
            <h2>로그인</h2>
            <input type="hidden" name="mode" value="login">
            <input type="text" name="id" placeholder="아이디를 입력하세요">
            <input type="password" name="password" placeholder="비밀번호를 입력하세요">
            <button type="submit">로그인</button>
        </div>
    </form>
    </div>

    <div id="sign-up">
    <form action="/user/action.php" method="POST">
        <input type="hidden" name="mode" value="create">
        <a class="cancel" href="#">X</a>
        <div>
            <h2>회원가입</h2>
            <input type="hidden" name="mode" value="create">
            <input type="text" name="id" placeholder="아이디를 입력하세요">
            <input type="password" name="password" placeholder="비밀번호를 입력하세요">
            <input type="text" name="name" placeholder="이름을 입력하세요">
            <button type="submit">회원가입</button>
        </div>
    </form>
    </div>