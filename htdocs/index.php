<?php require_once "db.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        *{
            box-sizing: border-box;
        }
        form {
            height: 400px;
            width: 400px;
            text-align : center;
            background-color : #fff;
            display : flex;
            align-items : center;
            justify-content: center;
            border-radius : 50px;
            position: relative;
        }
        
        input,button {
            width: 250px;
            padding: 5px;
            margin-bottom: 5px;
        }
        
        header {
            display : flex;
            align-items : center;
            justify-content: space-around;
            background-color: #eee
        }
        
        .login {
            display : flex;
            gap: 20px;
        }

        #login,#create {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-color: rgba(0,0,0,.5);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #login:not(:target){
            visibility: hidden;
            opacity: 0;
        }

        #create:not(:target){
            visibility: hidden;
            opacity: 0;
        }

        .cancel {
            position: absolute;
            top: 10%;
            right: 10%;
            text-decoration: none;
            color: #000;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <h1>로고</h1>
        </div>
        <div class="menu">
            <h3>메뉴</h3>
        </div>
        <div class="user">
            <?php if (isset($_SESSION['user'])) : ?>
                <div class="login">
                    <p><?=$_SESSION['user']->name?>(<?=$_SESSION['user']->account_id?>)</p>
                    <a href="/user/action.php?mode=logout">로그아웃</a>
                </div>
            <?php else :?>
                <div class="login">
                    <a href="#login">로그인</a>
                    <a href="#create">회원가입</a>
                </div>
            <?php endif ;?>
            </div>
        </header>
        <div id="login">
            <form action="/user/action.php" method="POST">
                <a class="cancel" href="index.php">X</a>
                <div>
                    <h2>로그인</h2>
                    <input type="hidden" name="mode" value="login">
                    
                    <input type="text" name="id" placeholder="아이디를 입력하세요">
                    <input type="password" name="password" placeholder="비밀번호를 입력하세요">
                    <button type="submit">로그인</button>
                </div>
            </form>
        </div>

        <div id="create">
            <form action="/user/action.php" method="POST">
                <a class="cancel" href="index.php">X</a>
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


</body>
</html>