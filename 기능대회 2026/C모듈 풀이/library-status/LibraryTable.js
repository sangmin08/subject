
class LibraryTable {

  constructor({
    tbody, resultCount, searchInput
  }) {
    // DOM 요소
    this.tbody = tbody;
    this.resultCount = resultCount;
    this.searchInput = searchInput;

    // 데이터
    this.allData = [];
    this.filteredData = [];

    // 상태
    this.searchTerm = '';
    this.sortField = 'region';
    this.sortOrder = 'asc';

    // 검색 디바운스 타이머
    this.searchTimer = null;
  }

  // 데이터 설정
  setData(data) {
    this.allData = data;
    this.filteredData = [...data];
  }

  // 이벤트 연결
  bindEvents() {
    // 검색 입력 이벤트 (디바운싱)
    if (this.searchInput) {
      this.searchInput.addEventListener('input', (e) => {
        clearTimeout(this.searchTimer);
        this.searchTimer = setTimeout(() => {
          this.searchTerm = e.target.value.trim();
          this.filter();
          this.sort();
          this.render();
        }, 150);
      });
    }

    // 정렬 헤더 클릭 이벤트
    document.querySelectorAll('th.sortable').forEach(header => {
      header.addEventListener('click', () => {
        const field = header.dataset.sort;

        if (this.sortField === field) {
          this.sortOrder = this.sortOrder === 'asc' ? 'desc' : 'asc';
        } else {
          this.sortField = field;
          this.sortOrder = "desc";
        }

        this.sort();
        this.render();
        this._updateSortIcons();
      });
    });
  }

  // 데이터 필터링
  filter() {
    if (!this.searchTerm) {
      this.filteredData = [...this.allData];
      return;
    }

    const term = this.searchTerm.toLowerCase();
    this.filteredData = this.allData.filter(item => {
      const name = item['도서관명'] || '';
      return name.toLowerCase().includes(term);
    });
  }

  // 데이터 정렬
  sort() {
    this.filteredData.sort((a, b) => {
      if (this.sortField === 'region') {
        const valA = a['시도명'] || '';
        const valB = b['시도명'] || '';
        const result = valA.localeCompare(valB, 'ko');
        return this.sortOrder === 'asc' ? result : -result;
      } else if (this.sortField === 'books') {
        const valA = a['자료수(도서)'] || 0;
        const valB = b['자료수(도서)'] || 0;
        return this.sortOrder === 'asc' ? valA - valB : valB - valA;
      }
      return 0;
    });
  }

  // 테이블 렌더링
  render() {
    // 결과 개수 표시
    this.resultCount.textContent = `총 ${this.filteredData.length.toLocaleString()}개의 도서관`;

    // 데이터 없음
    if (this.filteredData.length === 0) {
      this.tbody.innerHTML = '<tr><td colspan="12" class="loading">검색 결과가 없습니다.</td></tr>';
      return;
    }

    // DocumentFragment로 성능 최적화
    const fragment = document.createDocumentFragment();

    for (const item of this.filteredData) {
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td>${this._escapeHtml(item['시도명'])}</td>
        <td>${this._highlightText(item['도서관명'])}</td>
        <td>${this._escapeHtml(item['시군구명'])}</td>
        <td>${this._escapeHtml(item['도서관유형'])}</td>
        <td>${this._escapeHtml(item['휴관일'])}</td>
        <td>${this._escapeHtml(item['평일운영시작시각'])}</td>
        <td>${this._escapeHtml(item['평일운영종료시각'])}</td>
        <td class="text-right">${(item['열람좌석수'] || 0).toLocaleString()}</td>
        <td class="text-right">${(item['자료수(도서)'] || 0).toLocaleString()}</td>
        <td class="text-right">${(item['대출가능권수'] || 0).toLocaleString()}</td>
        <td class="text-right">${(item['대출가능일수'] || 0).toLocaleString()}</td>
        <td>${this._escapeHtml(item['소재지도로명주소'])}</td>
      `;
      fragment.appendChild(tr);
    }

    this.tbody.innerHTML = '';
    this.tbody.appendChild(fragment);
  }

  // 정렬 아이콘 업데이트
  _updateSortIcons() {
    document.querySelectorAll('th.sortable').forEach(th => {
      const icon = th.querySelector('.sort-icon');

      if (th.dataset.sort === this.sortField) {
        // 현재 정렬 중인 필드: 정렬 방향에 따라 아이콘 변경
        icon.textContent = this.sortOrder === 'asc' ? '▲' : '▼';
        icon.style.opacity = '1'; // 활성 상태 강조 (선택 사항)
      } else {
        // 기본 상태: 오름차순 아이콘을 보여주되, 시각적으로 흐리게 처리 가능
        icon.textContent = '▲';
        icon.style.opacity = '0.3'; // 비활성 상태임을 암시 (선택 사항)
      }
    });
  }

  // 검색어 하이라이트
  _highlightText(text) {
    const escaped = this._escapeHtml(text);
    if (!this.searchTerm) return escaped;

    const regex = new RegExp(`(${this._escapeRegex(this.searchTerm)})`, 'gi');
    return escaped.replace(regex, '<span class="highlight">$1</span>');
  }

  // HTML 
  // escape 처리는 필요시, 정규식 추가
  _escapeHtml(text) {
    if (text == null) return '';
    const div = document.createElement('div');
    div.textContent = String(text);
    return div.innerHTML;
  }

  // 정규식 특수문자 이스케이프
  _escapeRegex(str) {
    return str.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
  }
}
