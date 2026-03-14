
class MapChart {
  // 지도 크기 (고정)
  static MAP_WIDTH = 650;
  static MAP_HEIGHT = 850;

  // 막대그래프 설정
  static MAX_BAR_HEIGHT = 45;
  static BAR_WIDTH = 8;
  static BAR_GAP = 1;
  static MIN_BAR_HEIGHT = 3;

  // 막대그래프 색상
  static COLORS = {
    libraries: '#3498db',  // 파란색 - 도서관수
    books: '#2ecc71',      // 초록색 - 자료수
    seats: '#e74c3c'       // 빨간색 - 열람좌석수
  };

  // 지역별 그래프 위치 (650x850 기준 좌표)
  static REGION_POSITIONS = {
    '서울특별시': { x: 150, y: 300 },
    '인천광역시': { x: 100, y: 300 },
    '경기도': { x: 200, y: 300 },
    '강원특별자치도': { x: 300, y: 300 },
    '충청북도': { x: 225, y: 400 },
    '충청남도': { x: 125, y: 400 },
    '대전광역시': { x: 185, y: 440 },
    '세종특별자치시': { x: 175, y: 410 },
    '전라북도': { x: 175, y: 525 },
    '전라남도': { x: 125, y: 600 },
    '광주광역시': { x: 135, y: 570 },
    '경상북도': { x: 300, y: 435 },
    '대구광역시': { x: 300, y: 500 },
    '경상남도': { x: 275, y: 550 },
    '부산광역시': { x: 350, y: 580 },
    '울산광역시': { x: 360, y: 520 },
    '제주특별자치도': { x: 100, y: 770 }
  };

  // 지역명 축약 (라벨용)
  static SHORT_NAMES = {
    '서울특별시': '서울',
    '부산광역시': '부산',
    '대구광역시': '대구',
    '인천광역시': '인천',
    '광주광역시': '광주',
    '대전광역시': '대전',
    '울산광역시': '울산',
    '경기도': '경기',
    '강원특별자치도': '강원',
    '충청북도': '충북',
    '충청남도': '충남',
    '전라북도': '전북',
    '전라남도': '전남',
    '경상북도': '경북',
    '경상남도': '경남',
    '제주특별자치도': '제주',
    '세종특별자치시': '세종'
  };

  constructor({
    container, tooltip
  }) {
    this.container = container;
    this.tooltip = tooltip;
    this.regionStats = {};
    this.mapSvg = null;
    this.overlaySvg = null;
  }

  // svg 지도 설정
  bindSvgText(svgText) {
    // 로딩 메시지 제거
    const loading = this.container.querySelector('.loading');
    if (loading) loading.remove();

    // SVG 삽입
    this.container.insertAdjacentHTML('afterbegin', svgText);
    this.mapSvg = this.container.querySelector('svg');

    // SVG 크기 고정
    if (this.mapSvg) {
      this.mapSvg.style.width = MapChart.MAP_WIDTH + 'px';
      this.mapSvg.style.height = MapChart.MAP_HEIGHT + 'px';
    }

    // 지역 path에 이벤트 연결
    this._bindRegionEvents();
  }

  // 데이터 설정
  bindData(regionStats) {
    this.regionStats = regionStats;
  }

  // 막대 그래프 렌더링
  render() {
    if (!this.mapSvg || !this.regionStats._max) return;

    // 기존 오버레이 제거
    const existingOverlay = this.container.querySelector('.chart-overlay');
    if (existingOverlay) existingOverlay.remove();

    // 오버레이 SVG 생성
    const overlayDiv = document.createElement('div');
    overlayDiv.className = 'chart-overlay';
    overlayDiv.innerHTML = `<svg viewBox="0 0 ${MapChart.MAP_WIDTH} ${MapChart.MAP_HEIGHT}"></svg>`;
    this.container.appendChild(overlayDiv);
    this.overlaySvg = overlayDiv.querySelector('svg');

    // 각 지역에 막대그래프 추가
    const max = this.regionStats._max;

    for (const regionName of Object.keys(MapChart.REGION_POSITIONS)) {
      const pos = MapChart.REGION_POSITIONS[regionName];
      const stat = this.regionStats[regionName];

      if (!stat) continue;

      // 좌표 변환
      const svgX = pos.x;
      const svgY = pos.y;

      // 막대 높이 계산 (각 항목별 최대값 기준)
      const libH = max.libraries > 0 ? Math.max(MapChart.MIN_BAR_HEIGHT, (stat.libraries / max.libraries) * MapChart.MAX_BAR_HEIGHT) : 0;

      const bookH = max.books > 0 ? Math.max(MapChart.MIN_BAR_HEIGHT, (stat.books / max.books) * MapChart.MAX_BAR_HEIGHT) : 0;
      const seatH = max.seats > 0 ? Math.max(MapChart.MIN_BAR_HEIGHT, (stat.seats / max.seats) * MapChart.MAX_BAR_HEIGHT) : 0;

      // 막대그래프 그룹 생성 및 추가
      const group = this._createBarGroup(regionName, svgX, svgY, libH, bookH, seatH, stat);
      this.overlaySvg.appendChild(group);
    }
  }

  // 막대 그래프 그룹 생성
  _createBarGroup(regionName, centerX, centerY, libH, bookH, seatH, stat) {
    const group = document.createElementNS('http://www.w3.org/2000/svg', 'g');
    group.classList.add('bar-group');
    group.setAttribute('data-region', regionName);

    // 막대 위치 계산
    const totalWidth = MapChart.BAR_WIDTH * 3 + MapChart.BAR_GAP * 2;
    const startX = centerX - totalWidth / 2;
    const baseY = centerY;

    // 막대 3개 생성
    group.appendChild(this._createRect(startX, baseY - libH, libH, MapChart.COLORS.libraries));
    group.appendChild(this._createRect(startX + MapChart.BAR_WIDTH + MapChart.BAR_GAP, baseY - bookH, bookH, MapChart.COLORS.books));
    group.appendChild(this._createRect(startX + (MapChart.BAR_WIDTH + MapChart.BAR_GAP) * 2, baseY - seatH, seatH, MapChart.COLORS.seats));

    // 지역명 라벨
    const label = document.createElementNS('http://www.w3.org/2000/svg', 'text');
    label.classList.add('region-label');
    label.setAttribute('x', centerX);
    label.setAttribute('y', baseY + 12);
    label.setAttribute('text-anchor', 'middle');
    label.textContent = MapChart.SHORT_NAMES[regionName] || regionName;
    group.appendChild(label);

    // 툴팁 이벤트
    group.addEventListener('mouseenter', (e) => this._showTooltip(e, regionName, stat));
    group.addEventListener('mousemove', (e) => this._moveTooltip(e));
    group.addEventListener('mouseleave', () => this._hideTooltip());

    return group;
  }

  // svg 사각형 
  _createRect(x, y, height, color) {
    const rect = document.createElementNS('http://www.w3.org/2000/svg', 'rect');
    rect.setAttribute('x', x);
    rect.setAttribute('y', y);
    rect.setAttribute('width', MapChart.BAR_WIDTH);
    rect.setAttribute('height', height);
    rect.setAttribute('fill', color);
    rect.setAttribute('rx', '1');
    return rect;
  }

  // 이벤트 연결
  // 단순 opacity 처리이지만
  // 추후 추가 처리가 필요할 경우 해당 이벤트 참고해서 처리하면 됨.
  // 지금은 당장 필요 X
  _bindRegionEvents() {
    const paths = this.container.querySelectorAll('path.land');

    paths.forEach(path => {
      path.addEventListener('mouseenter', (e) => {
        const regionName = e.target.getAttribute('title');
        const barGroup = document.querySelector(`.bar-group[data-region="${regionName}"]`);
        if (barGroup) {
          barGroup.querySelectorAll('rect').forEach(rect => rect.style.opacity = '0.7');
        }
      });

      path.addEventListener('mouseleave', (e) => {
        const regionName = e.target.getAttribute('title');
        const barGroup = document.querySelector(`.bar-group[data-region="${regionName}"]`);
        if (barGroup) {
          barGroup.querySelectorAll('rect').forEach(rect => rect.style.opacity = '1');
        }
      });
    });
  }

  // 툴팁 표시
  _showTooltip(e, regionName, stat) {
    this.tooltip.innerHTML = `
      <div class="tooltip-title">${regionName}</div>
      <div class="tooltip-item">
        <span class="tooltip-label">도서관수:</span>
        <span class="tooltip-value">${stat.libraries.toLocaleString()}개</span>
      </div>
      <div class="tooltip-item">
        <span class="tooltip-label">자료수(도서):</span>
        <span class="tooltip-value">${stat.books.toLocaleString()}권</span>
      </div>
      <div class="tooltip-item">
        <span class="tooltip-label">열람좌석수:</span>
        <span class="tooltip-value">${stat.seats.toLocaleString()}석</span>
      </div>
    `;
    this.tooltip.classList.add('visible');
    this._moveTooltip(e);

    // 지역 path 강조
    const path = document.querySelector(`path[title="${regionName}"]`);
    if (path) path.classList.add('highlighted');
  }

  // 툴팁 위치 변경
  _moveTooltip(e) {
    let x = e.clientX + 15;
    let y = e.clientY + 15;

    const rect = this.tooltip.getBoundingClientRect();
    if (x + rect.width > window.innerWidth) x = e.clientX - rect.width - 15;
    if (y + rect.height > window.innerHeight) y = e.clientY - rect.height - 15;

    this.tooltip.style.left = x + 'px';
    this.tooltip.style.top = y + 'px';
  }

  // 툴팁 숨기기
  _hideTooltip() {
    this.tooltip.classList.remove('visible');
    document.querySelectorAll('path.land.highlighted').forEach(p => p.classList.remove('highlighted'));
  }
}
