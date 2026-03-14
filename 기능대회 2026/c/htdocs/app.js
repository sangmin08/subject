const updateDisplay = () => {
    let selected = [];
    $(".ui-selected").each(function () {
        selected.push($(this).data("seat"));
    });
    $("#selected-seats-display").text(selected.length > 0 ? selected.join(", ") + "번" : "없음");
}

$(function () {
    // 오늘 이전 날짜 선택 불가
    const today = new Date().toISOString().split('T')[0];
    $('#res-date').attr('min', today).val(today);

    // 좌석 동적 생성 (15x5 = 75석)
    const $container = $('#seat-container');

    // 더미 예약 데이터
    const dummyReservations = {
    };

    for (let i = 1; i <= 75; i++) {
        let isReserved = dummyReservations[i] ? 'reserved' : '';
        // let tooltip = dummyReservations[i] ? `최근 예약: ${dummyReservations[i]}` : '예약 가능';

        // $container.append(`<div class="seat ${isReserved}" title="${tooltip}" data-seat="${i}">${i}</div>`);
        $container.append(`<div class="seat ${isReserved}" data-seat="${i}">${i}</div>`);
    }

    // selectable 설정
    $container.selectable({
        filter: ".seat:not(.reserved)", // 예약된 좌석은 선택 제외
        distance: 1,
        selecting: function (event, ui) {
            // 최대 4석 제한
            if ($(".ui-selected, .ui-selecting").length > 4) {
                $(ui.selecting).removeClass("ui-selecting");
            }
        },
        stop: function () {
            updateDisplay();
        }
    });

    // 좌석 클릭 이벤트
    $(".seat:not(.reserved)").on("click", function (e) {
        const $this = $(this);

        if ($this.hasClass("ui-selected")) {
            // 이미 선택된 경우 해제
            $this.removeClass("ui-selected");
        } else {
            // 새로 선택하는 경우 (최대 4개 제한 확인)
            if ($(".ui-selected").length < 4) {
                $this.addClass("ui-selected");
            } else {
                alert("최대 4개까지만 선택 가능합니다.");
            }
        }
        updateDisplay();
    });

    // ESC 키 누를 경우, 해제 처리
    $(document).on("keydown", function (e) {
        if (e.key === "Escape") {
            $(".ui-selected").removeClass("ui-selected");
            updateDisplay();
        }
    });

    // 툴팁 활성화
    $(document).tooltip();

    // 예약 처리
    $("#btn-reserve").click(function () {
        const seats = $(".ui-selected").map(function () { return $(this).data("seat"); }).get();
        const date = $("#res-date").val();
        const start = $("#start-time").val();
        const end = $("#end-time").val();

        if (seats.length === 0) return alert("좌석을 선택해주세요.");
        if (!start || !end) return alert("시간을 입력해주세요.");
        if (start >= end) return alert("종료 시간은 시작 시간보다 늦어야 합니다.");

        // 우리는 selectable filter를 통해, 예약된 좌석은 선택 제외 처리
        // 다만 selectable filter 사용이 안 된다고 가정할 경우, 여기서 중복 체크 로직 추가
        let isDuplicate = false;

        if (isDuplicate) {
            alert("예약중복: 해당 시간에 이미 예약이 있습니다.");
        } else {
            alert(`정상 예약되었습니다!\n좌석: ${seats.join(', ')}\n일시: ${date} ${start}~${end}`);

            $(".ui-selected").addClass("reserved").removeClass("ui-selected");
        }
    });
});