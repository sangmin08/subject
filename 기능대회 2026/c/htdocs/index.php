<?php require_once "header.php"?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>

    <input id="close" type="checkbox">
    <div class="popups">
        <div class="popup">
            <div>
                <h1 class="title">제목</h1>
                <p>내용</p>
                <div class="img">
                    <img src="images/images (2).jpg" alt="이미지.jpg">
                </div>
                <label for="close">닫기</label>
            </div>
        </div>
    </div>

    <div class="slider-container">
        <div class="slide-wrapper">
            <div class="slide">
                <img src="images/images (44).jpg" alt="슬라이드1">
                <div class="slide-text">
                    <h2>지식이 시작되는 공간</h2>
                    <p>배움과 휴식이 함께하는 우리 도서관에 오신 것을 환영합니다.</p>
                </div>
            </div>
            <div class="slide">
                <img src="images/images (43).jpg" alt="슬라이드2">
                <div class="slide-text">
                    <h2>모두에게 열린 도서관</h2>
                    <p>누구나 편안하게 이용할 수 있는 배움과 휴식의 공간입니다.</p>
                </div>
            </div>
            <div class="slide">
                <img src="images/images (53).jpg" alt="슬라이드3">
                <div class="slide-text">
                    <h2>책과 함께하는 하루</h2>
                    <p>조용하고 쾌적한 환경에서 독서의 즐거움을 느껴보세요.</p>
                </div>
            </div>
            <div class="slide">
                <img src="images/images (44).jpg" alt="슬라이드1">
                <div class="slide-text">
                    <h2>지식이 시작되는 공간</h2>
                    <p>배움과 휴식이 함께하는 우리 도서관에 오신 것을 환영합니다.</p>
                </div>
            </div>
        </div>

        <div class="progress-container">
            <div class="progress-bar"></div>
        </div>
    </div>

    <section>
        <div class="notice">
            <h1 class="title">도서관 소식</h1>

            <input type="radio" name="news" id="news1" checked>
            <input type="radio" name="news" id="news2">
            <input type="radio" name="news" id="news3">

            <div class="tag">
                <label for="news1">일반공지</label>
                <label for="news2">행사안내</label>
                <label for="news3">채용안내</label>
            </div>

            <div class="news">
                <div class="news1">
                    <div class="new">
                        <p>더운 여름 힘내요 – 연구정보실 개실 6주년 기념이벤트 당첨자 발표</p>
                        <p>2024-08-08</p>
                    </div>
                    <div class="new">
                        <p>더운 여름 힘내요 – 연구정보실 개실 6주년 기념이벤트</p>
                        <p>2024-07-24</p>
                    </div>
                    <div class="new">
                        <p>연구자를 위한 텍스트 마이닝(심화) 교육생 모집 안내</p>
                        <p>2024-07-17</p>
                    </div>
                    <div class="new">
                        <p>「실감체험관」 전국민 소문내기 이벤트 당첨자 발표</p>
                        <p>2024-06-10</p>
                    </div>
                    <div class="new">
                        <p>디지털인문학과 네트워크 분석 교육생 모집 안내</p>
                        <p>2024-05-14</p>
                    </div>
                    <div class="new">
                        <p>스킬스북도서관 -「청년 디지털 봉사단 ‘잇(IT)다’5기」- 최종 합격자 발표</p>
                        <p>2024-05-10</p>
                    </div>
                </div>
                <div class="news2">
                    <div class="new">
                        <p>2024년 제9회 「월간 인문학을 만나다」 강연 안내</p>
                        <p>2024-08-08</p>
                    </div>
                    <div class="new">
                        <p>「스킬스북도서관이 간식박스 쏩니다!」7월 당첨 발표</p>
                        <p>2024-08-07</p>
                    </div>
                    <div class="new">
                        <p>별 헤는 「실감체험관」이벤트</p>
                        <p>2024-07-25</p>
                    </div>
                    <div class="new">
                        <p>2024년 제8회 「월간 인문학을 만나다」 강연 안내</p>
                        <p>2024-07-15</p>
                    </div>
                    <div class="new">
                        <p>스킬스북도서관이 간식박스 쏩니다!</p>
                        <p>2024-07-02</p>
                    </div>
                    <div class="new">
                        <p>2024년 제7회 「월간 인문학을 만나다」 강연 안내</p>
                        <p>2024-07-01</p>
                    </div>
                </div>
                <div class="news3">
                    <div class="new">
                        <p>2024년 사서직 공무원 경력경쟁채용 필기시험 정답가안 공개 및 이의제기 안내</p>
                        <p>2024-08-03</p>
                    </div>
                    <div class="new">
                        <p>스킬스북도서관 공무직 근로자(미화) 채용 서류전형 합격자 및 면접전형 공고</p>
                        <p>2024-08-02</p>
                    </div>
                    <div class="new">
                        <p>2024년도 사서직 공무원 경력경쟁채용 필기시험 일정 ‧ 장소 및 응시자 준수사항 공고</p>
                        <p>2024-07-26</p>
                    </div>
                    <div class="new">
                        <p>스킬스북도서관 공무직 근로자(미화) 채용공고(재재공고)</p>
                        <p>2024-07-24</p>
                    </div>
                    <div class="new">
                        <p>스킬스북도서관 국가서지과 공무직 근로자 채용 최종 합격자 공고</p>
                        <p>2024-07-18</p>
                    </div>
                    <div class="new">
                        <p>스킬스북도서관 국가서지과 기간제 근로자(휴직대체) 채용 최종합격자 공고</p>
                        <p>2024-07-16</p>
                    </div>
                    <div class="new">
                        <p>스킬스북도서관 국가서지과 공무직 근로자 채용 서류전형(1차) 합격자 발표 및 면접시험(2차) 계획 공고</p>
                        <p>2024-07-05</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section >
        <div class="program-section">

        <h1 class="title">이달의 개최 프로그램</h1>
            
            <!-- 라디오 버튼들을 section 바로 아래에 배치 -->
        <input type="radio" name="modal-group" id="modal-close" class="modal-state" checked />
        <input type="radio" name="modal-group" id="modal-1" class="modal-state" />
        <input type="radio" name="modal-group" id="modal-2" class="modal-state" />
        <input type="radio" name="modal-group" id="modal-3" class="modal-state" />
        <input type="radio" name="modal-group" id="modal-4" class="modal-state" />
        <input type="radio" name="modal-group" id="modal-5" class="modal-state" />
        <input type="radio" name="modal-group" id="modal-6" class="modal-state" />
        <input type="radio" name="modal-group" id="modal-7" class="modal-state" />
        <input type="radio" name="modal-group" id="modal-8" class="modal-state" />

        <!-- 모달들도 section 바로 아래에 배치 (transform 영향 받지 않음) -->
        <div class="modal-overlay" data-modal="1">
            <div class="modal-content">
                <img src="프로그램/1.jpg" alt="">
                <label for="modal-close" class="close-btn">[닫기]</label>
            </div>
        </div>
        
        <div class="modal-overlay" data-modal="2">
            <div class="modal-content">
                <img src="프로그램/2.png" alt="">
                <label for="modal-close" class="close-btn">[닫기]</label>
            </div>
        </div>
        
        <div class="modal-overlay" data-modal="3">
            <div class="modal-content">
                <img src="프로그램/3.jpg" alt="">
                <label for="modal-close" class="close-btn">[닫기]</label>
            </div>
        </div>
        
        <div class="modal-overlay" data-modal="4">
            <div class="modal-content">
                <img src="프로그램/4.png" alt="">
                <label for="modal-close" class="close-btn">[닫기]</label>
            </div>
        </div>
        
        <div class="modal-overlay" data-modal="5">
            <div class="modal-content">
                <img src="프로그램/5.jpg" alt="">
                <label for="modal-close" class="close-btn">[닫기]</label>
            </div>
        </div>

        <div class="modal-overlay" data-modal="6">
            <div class="modal-content">
                <img src="프로그램/6.jpg" alt="">
                <label for="modal-close" class="close-btn">[닫기]</label>
            </div>
        </div>
        
        <div class="modal-overlay" data-modal="7">
            <div class="modal-content">
                <img src="프로그램/7.jpg" alt="">
                <label for="modal-close" class="close-btn">[닫기]</label>
            </div>
        </div>
        
        <div class="modal-overlay" data-modal="8">
            <div class="modal-content">
                <img src="프로그램/8.jpg" alt="">
                <label for="modal-close" class="close-btn">[닫기]</label>
            </div>
        </div>
        
        <div class="program-container">
            <div class="program-item">
                <label for="modal-1" class="item-card">
                    <img src="프로그램/1.jpg" alt="P1">
                    <span class="program-name">피아니스트 김미정과 함께하는 힐링 클래식</span>
                </label>
            </div>
            
            <div class="program-item">
                <label for="modal-2" class="item-card">
                    <img src="프로그램/2.png" alt="P2" />
                    <span class="program-name">[도란도란] 나를 찾아가는 마음챙김 그림책테라피</span>
                </label>
            </div>
            
            <div class="program-item">
                <label for="modal-3" class="item-card">
                    <img src="프로그램/3.jpg" alt="P3" />
                    <span class="program-name">[신흥어울마당작은]2024년 하반기 프로그램 ' 뚝딱 한국사'</span>
                </label>
            </div>
            
            <div class="program-item">
                <label for="modal-4" class="item-card">
                    <img src="프로그램/4.png" alt="P4" />
                    <span class="program-name">[수주](성인)마을미디어 교육생 모집</span>
                </label>
            </div>
            
            <div class="program-item">
                <label for="modal-5" class="item-card">
                    <img src="프로그램/5.jpg" alt="P5" />
                    <span class="program-name">나를 치유하는 명화</span>
                </label>
            </div>
            
            <div class="program-item">
                <label for="modal-6" class="item-card">
                    <img src="프로그램/6.jpg" alt="P6" />
                    <span class="program-name">[문화가 있는 날] 푸른 하늘이 좋아요!</span>
                </label>
            </div>
            
            <div class="program-item">
                <label for="modal-7" class="item-card">
                    <img src="프로그램/7.jpg" alt="P7" />
                    <span class="program-name">책 속에서 사람을 만나다</span>
                </label>
            </div>
            
            <div class="program-item">
                <label for="modal-8" class="item-card">
                    <img src="프로그램/8.jpg" alt="P8" />
                    <span class="program-name">서울 문화의 밤(8월) 행사 - 국지승 그림책 작가와 방구석 북토크</span>
                </label>
            </div>
        </div>
    </div>
    </section>
    <section>
        <h1 class="title">행사달력</h1>
        <div class="calendar-wrapper">
        <input type="radio" name="y" id="y25">
        <input type="radio" name="y" id="y26" checked>
        <input type="radio" name="y" id="y27">
        
        <input type="radio" name="m" id="m1">
        <input type="radio" name="m" id="m2">
        <input type="radio" name="m" id="m3">
        <input type="radio" name="m" id="m4" checked>
        <input type="radio" name="m" id="m5">
        <input type="radio" name="m" id="m6">
        <input type="radio" name="m" id="m7">
        <input type="radio" name="m" id="m8">
        <input type="radio" name="m" id="m9">
        <input type="radio" name="m" id="m10">
        <input type="radio" name="m" id="m11">
        <input type="radio" name="m" id="m12">
        
        <div class="labels">

            <div class="years">
                <label for="y25">2025</label>
                <label for="y26">2026</label>
                <label for="y27">2027</label>
            </div>
            <div class="months">
                <label for="m1">1월</label>
                <label for="m2">2월</label>
                <label for="m3">3월</label>
                <label for="m4">4월</label>
                <label for="m5">5월</label>
                <label for="m6">6월</label>
                <label for="m7">7월</label>
                <label for="m8">8월</label>
                <label for="m9">9월</label>
                <label for="m10">10월</label>
                <label for="m11">11월</label>
                <label for="m12">12월</label>
            </div>
        </div>

        <div class="calendar-grid">
            <div class="month">일</div><div class="month">월</div><div class="month">화</div><div class="month">수</div><div class="month">목</div><div class="month">금</div><div class="month">토</div>
            <div class="d1">1<span class="e2026m4">전시[책피는숙련도서관] 4월 북큐레이션</span></div><div>2</div><div>3<span class="e2026m4">전시[책피는숙련도서관] 4월 북큐레이션</span></div><div>4</div><div>5</div><div>6<span class="e2026m4">휴관 정기휴관일</span></div><div>7</div><div>8</div><div>9</div><div>10<span class="e2026m4">숙련기술인과의 만남</span></div>
            <div>11</div><div>12</div><div>13<span class="e2026m4">휴관정기휴관일</span></div><div>14</div><div>15</div><div>16</div><div>17<span class="e2026m4">행사 책읽는 숙련광장</span><span class="e2026m4">행사 기능 책마당</span><span class="e2026m4">행사 책읽는 숙련기술</span><span class="e2026m4">전시 [책피는 숙련기술도서관] 4월 북큐레이션</span></div><div>18</div><div>19</div><div>20<span class="e2026m4">휴관정기휴관일</span></div>
            <div>21<span class="e2026m4">행사 숙련기술 책마당</span><span class="e2026m4">행사 책읽는 맑은냇가</span><span class="e2026m4">행사 책읽는 숙련광장</span><span class="e2026m4">전시 [책피는 숙련기술도서관] 4월 북큐레이션</span></div><div>22</div><div>23</div><div>24</div><div>25</div><div>26</div><div>27</div><div>28</div><div>29</div><div>30</div><div>31</div>
        </div>
    </div>
    </section>
    <section>
        <h1 class="title">추천도서</h1>
        <div class="book-slider">
      <input type="radio" name="slider" id="r1-def" checked />
      <input type="radio" name="slider" id="r1-next" /><input
        type="radio"
        name="slider"
        id="r1-prev"
      />
      <input type="radio" name="slider" id="r2-next" /><input
        type="radio"
        name="slider"
        id="r2-prev"
      />
      <input type="radio" name="slider" id="r3-next" /><input
        type="radio"
        name="slider"
        id="r3-prev"
      />
      <input type="radio" name="slider" id="r4-next" /><input
        type="radio"
        name="slider"
        id="r4-prev"
      />
      <input type="radio" name="slider" id="r5-next" /><input
        type="radio"
        name="slider"
        id="r5-prev"
      />
      <input type="radio" name="slider" id="r6-next" /><input
        type="radio"
        name="slider"
        id="r6-prev"
      />
      <input type="radio" name="slider" id="r7-next" /><input
        type="radio"
        name="slider"
        id="r7-prev"
      />
      <div class="slides-container">
        <div class="slider slide1"><img src="추천도서/추천도서1.jpg" /></div>
        <div class="slider slide2"><img src="추천도서/추천도서2.jpg" /></div>
        <div class="slider slide3"><img src="추천도서/추천도서3.jpg" /></div>
        <div class="slider slide4"><img src="추천도서/추천도서4.jpg" /></div>
        <div class="slider slide5"><img src="추천도서/추천도서5.jpg" /></div>
        <div class="slider slide6"><img src="추천도서/추천도서6.jpg" /></div>
        <div class="slider slide7"><img src="추천도서/추천도서7.jpg" /></div>
      </div>

      <div class="controls controls-1">
        <label for="r7-prev" class="btn-prev">이전</label> <span>1 / 7</span>
        <label for="r2-next" class="btn-next">다음</label>
      </div>
      <div class="controls controls-2">
        <label for="r1-prev" class="btn-prev">이전</label> <span>2 / 7</span>
        <label for="r3-next" class="btn-next">다음</label>
      </div>
      <div class="controls controls-3">
        <label for="r2-prev" class="btn-prev">이전</label> <span>3 / 7</span>
        <label for="r4-next" class="btn-next">다음</label>
      </div>
      <div class="controls controls-4">
        <label for="r3-prev" class="btn-prev">이전</label> <span>4 / 7</span>
        <label for="r5-next" class="btn-next">다음</label>
      </div>
      <div class="controls controls-5">
        <label for="r4-prev" class="btn-prev">이전</label> <span>5 / 7</span>
        <label for="r6-next" class="btn-next">다음</label>
      </div>
      <div class="controls controls-6">
        <label for="r5-prev" class="btn-prev">이전</label> <span>6 / 7</span>
        <label for="r7-next" class="btn-next">다음</label>
      </div>
      <div class="controls controls-7">
        <label for="r6-prev" class="btn-prev">이전</label> <span>7 / 7</span>
        <label for="r1-next" class="btn-next">다음</label>
      </div>
    </div>
    </section>
    
<?php require_once "footer.php"?>