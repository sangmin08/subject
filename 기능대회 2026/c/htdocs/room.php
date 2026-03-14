<?php require_once "header.php"?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      rel="stylesheet"
      href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css"
    />
    <style>
      #seat-container {
        display: grid;
        grid-template-columns: repeat(15, 40px);
        gap: 10px;
        padding: 20px;
        border: 1px solid #ccc;
        width: fit-content;
      }
      .seat {
        width: 40px;
        height: 40px;
        border: 1px solid #ddd;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        background: #fff;
        font-size: 12px;
        border-radius: 4px;
      }

      /* jQuery UI Selectable 클래스 */
      .seat.ui-selecting {
        background: #feca40;
      }
      .seat.ui-selected {
        background: #f39814;
        color: white;
      }

      /* 예약 완료 상태 */
      .seat.reserved {
        background: #e0e0e0;
        cursor: not-allowed;
        color: #999;
      }

      .booking-form {
        margin-top: 20px;
        padding: 15px;
        border-top: 2px solid #333;
      }
      .tooltip-info {
        font-size: 11px;
        color: #666;
      }
    </style>
  </head>
  <body>
    <div id="booking-app">
      <h3>열람실 좌석 예약 (최대 4석)</h3>
      <div id="seat-container"></div>

      <div class="booking-form">
        <p>선택된 좌석: <span id="selected-seats-display">없음</span></p>
        <label>예약일: <input type="date" id="res-date" /></label>
        <label>시작: <input type="time" id="start-time" /></label>
        <label>종료: <input type="time" id="end-time" /></label>
        <button id="btn-reserve">예약하기</button>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script src="app.js"></script>
  </body>
</html>
