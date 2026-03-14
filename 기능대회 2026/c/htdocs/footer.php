<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        footer {
            padding: 60px;
            background-color: #000;
            color: #aaa;
        }
    
        footer hr {
            background: #222;
            height: 1px;
            border: 0;
        }
    
        .top-footer {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
    
        .top-footer img {
            width: 100px;
            margin-bottom: 10px;
        }
    
        .top-footer .left {
            line-height: 10px;
        }
    
        .top-footer .right div{
            display: flex;
            gap: 20px;
        }
    
        .top-footer .circle {
            width: 64px;
            height: 64px;
            border: 1px solid #aaa;
            border-radius: 40px;
        }
    
        .bottom-footer {
            display: flex;
            justify-content: space-between;
        }
    
    </style>
</head>
<body>
    <footer>
        <div class="top-footer">
            <div class="left">
                <img src="images/images (1).png" alt="">
                <p>인천시 부평구 무네미로 448번길 77</p>
                <p>한국산업인력공단 글로벌숙련기술진흥원</p>
            </div>
            <div class="right">
                <div>
                    <div class="circle"></div>
                    <div class="circle"></div>
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <hr>
        <div class="bottom-footer">
            <p>문의전화안내 1644-8000 | 운영시간(평일) 09:00~18:00</p>
            <p>COPYRIGHTⓒ 2016 HRDKOREA</p>
        </div>
    </footer>
</body>
</html>

