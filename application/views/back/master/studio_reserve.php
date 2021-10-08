<h3 class="meaning">스케줄 관리</h3>
<div class="type_wrap sch_wrap">
  <div class="type_box sch_status shadow">
    <div class="status_type_tit">
      <p class="type_tit" style="font-size: 21px; color: #9e9e9e; line-height: 34px; padding-bottom: 36px;">스케줄 예약현황</p>
      <div class="type_fn_sch fn_sch_wrap">
        <button class="sch__btn sch-filter-btn">
          <div class="seeAll-btn-div type:btn-div">
            <p class="btn-tip-detail tip-detail-case detail-fontStyle">수업별 현황</p>
          </div>
          <div class="filter-class-icon txt-tip-icon">
            <img src="https://dev.foundy.me/template/icon/ic_filter_class.png" alt="스케줄 전체 보기" width="19" height="13">
          </div>
          <script>
            $(function(){
              $('.sch-filter-btn').click(function(){
                // filter-class-type 호출
                let target = $('#sch-filter-btn');
                if (target.css('top') === '0px') {
                  target.css('top', '35px');
                }
                target.toggle();
              })
            })
          </script>
        </button>
      </div>
      <div class="filter-class-type shadow_sp" id="sch-filter-btn" style="display: none; top: 35px;">
        <button class="type-chkArrow" style="top: 0px; display: none;">
          <img src="https://dev.foundy.me/template/icon/ic_display_Arrow.png" width="11" height="9">
        </button>
        <input type="text" value="수업별 현황" class="type-cat-val type-cat-class" readonly="">
        <input type="text" value="실시간 현황" class="type-cat-val type-cat-time" readonly="">
      </div>
      <script>
        $(function(){
          // type-cat-class 호버
          $('.type-cat-val').hover(function(){
            let val = $(this).val();
            // console.log(val);
            let set_spot = 0;
            
            if(val === "수업별 현황") {
              set_spot = 0;
            }
            else if(val === "실시간 현황") {
              set_spot = '32px';
            }
            
            $(this).closest('.filter-class-type').find('.type-chkArrow').show().css({
              top : set_spot
            })
          },function(){
            $(this).closest('.filter-class-type').find('.type-chkArrow').hide();
          })
          // type-cat-val 클릭
          $('.type-cat-val').click(function(){
            $(this).parent().hide();
            
            let val = $(this).val();
            
            $('div[class^="stuBook__"]').hide();
            
            if(val === "수업별 현황") {
              $('#stuBook .stuBook__class').show();
              $(this).parent().prev().find('.tip-detail-case').text(val);
            }
            else if(val === "실시간 현황") {
              $('#stuBook .stuBook__realTime').show();
              $(this).parent().prev().find('.tip-detail-case').text(val);
            }
          })
        })
      </script>
    </div>
    <div class="stuBook" id="stuBook">
      <!-- 수업별 현황 -->
      <div class="stuBook__class" style="display: block;">
        <p class="class--inStatus">수업별 현황</p>
        <div class="class--inOpt type_fn_sch">
          <button class="sch__btn sch-search-btn" onclick="fn_searchSch();">
            <div class="search-btn-wrap">
              <div class="search-btn-div type:btn-div">
                <p class="btn-tip-detail">스케줄 검색</p>
              </div>
              <div class="search-btn-icon txt-tip-icon">
                <img src="https://dev.foundy.me/template/icon/ic_search_sch.png" alt="스케줄 검색" width="17" height="16">
              </div>
            </div>
            <script>
              function fn_searchSch() {
                // Upcoming Zoom 15개 숨김, 검색결과 호출
                // .search-btn-pop 보이게
                $('.search-btn-pop').toggle();
              }
            </script>
          </button>
          <button class="sch__btn sch-seeAll-btn" onclick="fn_seeAll();">
            <div class="seeAll-btn-div type:btn-div">
              <p class="btn-tip-detail">전체보기</p>
            </div>
            <div class="seeAll-btn-icon txt-tip-icon">
              <img src="https://dev.foundy.me/template/icon/ic_see_allSch.png" alt="스케줄 전체 보기" width="15" height="16">
            </div>
            <script>
              function fn_seeAll() {
                //  검색결과 숨김, Upcoming Zoom 15개 호출
                
              }
            </script>
          </button>
        </div>
        <!-- 스케줄 검색 팝업 -->
        <div class="class--inSearch search-btn-pop pop:searchSch" style="display: none;">
          <p class="searchSch_example">‘ 연/월/일 ’의 6자리로 검색해주세요.</p>
          <div class="searchSch_term">
            <input type="number" id="schedule_date2" placeholder="ex) 21년 4월 5일 -> 210405" class="term_search_tip">
            <button class="term_search_btn">
              <img src="https://dev.foundy.me/template/icon/ic_pop_searchSch.png" alt="스케줄 검색" width="16" height="16">
            </button>
          </div>
        </div>
        <div class="class--inList sch_detail" id="schedule_list2">  <div class="detail_step clearfix">
            <div class="step_course">
              <div class="course-wrap">
                <p class="course_time">
                  19:00          ~
                  21:00        </p>
                <p class="course_teacher">
                  (김평호)
                  테스트 7/12_1        </p>
              </div>
              <p class="course-date-detail">수업일 | 2021.07.12</p>
            </div>
            <div class="step_book">
              <p class="book_proceed">
                예약
                1          /
                1        </p>
              <p class="book_proceed">
                대기
                0          /
                1        </p>
              <div class="book_btn">
                <button class="book_proceed book:proceed btn_val btn_sm">
                  예약현황
                </button>
                <button class="book_modify btn_val btn_sm">수정</button>
                <button class="book_remove btn_val btn_sm">취소</button>
              </div>
            </div>
          </div>
          <div class="detail_step clearfix">
            <div class="step_course">
              <div class="course-wrap">
                <p class="course_time">
                  20:00          ~
                  21:00        </p>
                <p class="course_teacher">
                  (김평호)
                  테스트 7/12_2        </p>
              </div>
              <p class="course-date-detail">수업일 | 2021.07.12</p>
            </div>
            <div class="step_book">
              <p class="book_proceed">
                예약
                1          /
                1        </p>
              <p class="book_proceed">
                대기
                0          /
                1        </p>
              <div class="book_btn">
                <button class="book_proceed book:proceed btn_val btn_sm">
                  예약현황
                </button>
                <button class="book_modify btn_val btn_sm">수정</button>
                <button class="book_remove btn_val btn_sm">취소</button>
              </div>
            </div>
            <script>
              $(function(){
                $('button[class*="book_modify"]').click(function(){
                  $('.boxwrap__pop').show().children('#popScheduleRewrite').show();
                })
                $('button[class*="book:proceed"]').click(function(){
                  $('.boxwrap__pop').show().children('#schedule_status').show();
                })
                $('button[class^=book_remove').click(function(){
                  $('.boxwrap__pop').show().children('#popScheduleRemove').show();
                })
              })
            </script>
          </div>
        </div>
      </div>
      <!-- 실시간 현황 -->
      <div class="stuBook__realTime" style="display: none;">
        <p class="realTime--inStatus">실시간 현황</p>
        <div class="realTime--inView">
          <div class="detail_table table_main situation_table">
            <table class="table_head">
              <colgroup>
                <col width="8%">
                <col width="8%">
                <col width="15%">
                <col width="7%">
                <col width="10%">
                <col width="10%">
                <col width="5%">
                <col width="9%">
                <col width="9%">
                <col width="9%">
                <col width="10%">
              </colgroup>
              <thead>
              <tr>
                <th>티켓팅 일시</th>
                <th>수업 일시</th>
                <th>수업명</th>
                <th>이름</th>
                <th>아이디</th>
                <th>전화번호</th>
                <th>결제자정보</th>
                <th>상태</th>
                <th>확정</th>
                <th>취소</th>
                <th>수업링크발송</th>
              </tr>
              </thead>
            </table>
            <div class="table_body_wrap">
              <div class="table_body main_case scroll-y" id="ticket_member_list2" style="border: 1px solid #EAEAEA;height: auto; border-radius: 0 0 4px 4px;">
                <table class="table-list" style="display: table; border: 0px;">
                  <colgroup>
                    <col width="8%">
                    <col width="8%">
                    <col width="15%">
                    <col width="7%">
                    <col width="10%">
                    <col width="10%">
                    <col width="5%">
                    <col width="9%">
                    <col width="9%">
                    <col width="9%">
                    <col width="10%">
                  </colgroup>
                  <tbody id="schedule_status_detail2">
                  <!-- tr x 15개, 16개 이상부터 more 버튼 -->
                  <tr>
                    <td>2021.03.09 10:34:29</td>
                    <td>2021.04.17 00:00:29</td>
                    <td>이브닝 명상</td>
                    <td>김승훈</td>
                    <td>apple09470@naver.com</td>
                    <td>01099819804</td>
                    <td>정지희</td>
                    <td class="data_txt">
                      <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                      <!-- 상태 -->
                      <span class="receive reserve">티켓팅확정</span>
                    </td>
                    <td class="data_form">
                      <button class="td_send ok_sign">
                        <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                        <!-- 버튼 폼 -->
                        <span class="send shadow active"></span>
                      </button>
                    </td>
                    <td>
                      <button class="td_perforce">
                        <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                        <!-- 버튼 폼 -->
                        <span class="perforce shadow"></span>
                      </button>
                    </td>
                    <td>
                      <button class="send_link">발송</button>
                    </td>
                  </tr>
                  <tr>
                    <td>2021.03.09 10:34:29</td>
                    <td>2021.04.17 00:00:29</td>
                    <td>이브닝 명상</td>
                    <td>김승훈</td>
                    <td>apple09470@naver.com</td>
                    <td>01099819804</td>
                    <td>정지희</td>
                    <td class="data_txt">
                      <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                      <!-- 상태 -->
                      <span class="receive reserve">티켓팅확정</span>
                    </td>
                    <td class="data_form">
                      <button class="td_send ok_sign">
                        <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                        <!-- 버튼 폼 -->
                        <span class="send shadow active"></span>
                      </button>
                    </td>
                    <td>
                      <button class="td_perforce">
                        <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                        <!-- 버튼 폼 -->
                        <span class="perforce shadow"></span>
                      </button>
                    </td>
                    <td>
                      <button class="send_link">발송</button>
                    </td>
                  </tr>
                  <tr>
                    <td>2021.03.09 10:34:29</td>
                    <td>2021.04.17 00:00:29</td>
                    <td>이브닝 명상</td>
                    <td>김승훈</td>
                    <td>apple09470@naver.com</td>
                    <td>01099819804</td>
                    <td>정지희</td>
                    <td class="data_txt">
                      <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                      <!-- 상태 -->
                      <span class="receive reserve">티켓팅확정</span>
                    </td>
                    <td class="data_form">
                      <button class="td_send ok_sign">
                        <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                        <!-- 버튼 폼 -->
                        <span class="send shadow active"></span>
                      </button>
                    </td>
                    <td>
                      <button class="td_perforce">
                        <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                        <!-- 버튼 폼 -->
                        <span class="perforce shadow"></span>
                      </button>
                    </td>
                    <td>
                      <button class="send_link">발송</button>
                    </td>
                  </tr>
                  <tr>
                    <td>2021.03.09 10:34:29</td>
                    <td>2021.04.17 00:00:29</td>
                    <td>이브닝 명상</td>
                    <td>김승훈</td>
                    <td>apple09470@naver.com</td>
                    <td>01099819804</td>
                    <td>정지희</td>
                    <td class="data_txt">
                      <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                      <!-- 상태 -->
                      <span class="receive reserve">티켓팅확정</span>
                    </td>
                    <td class="data_form">
                      <button class="td_send ok_sign">
                        <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                        <!-- 버튼 폼 -->
                        <span class="send shadow active"></span>
                      </button>
                    </td>
                    <td>
                      <button class="td_perforce">
                        <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                        <!-- 버튼 폼 -->
                        <span class="perforce shadow"></span>
                      </button>
                    </td>
                    <td>
                      <button class="send_link">발송</button>
                    </td>
                  </tr>
                  <tr>
                    <td>2021.03.09 10:34:29</td>
                    <td>2021.04.17 00:00:29</td>
                    <td>이브닝 명상</td>
                    <td>김승훈</td>
                    <td>apple09470@naver.com</td>
                    <td>01099819804</td>
                    <td>정지희</td>
                    <td class="data_txt">
                      <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                      <!-- 상태 -->
                      <span class="receive reserve">티켓팅확정</span>
                    </td>
                    <td class="data_form">
                      <button class="td_send ok_sign">
                        <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                        <!-- 버튼 폼 -->
                        <span class="send shadow active"></span>
                      </button>
                    </td>
                    <td>
                      <button class="td_perforce">
                        <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                        <!-- 버튼 폼 -->
                        <span class="perforce shadow"></span>
                      </button>
                    </td>
                    <td>
                      <button class="send_link">발송</button>
                    </td>
                  </tr>
                  <tr>
                    <td>2021.03.09 10:34:29</td>
                    <td>2021.04.17 00:00:29</td>
                    <td>이브닝 명상</td>
                    <td>김승훈</td>
                    <td>apple09470@naver.com</td>
                    <td>01099819804</td>
                    <td>정지희</td>
                    <td class="data_txt">
                      <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                      <!-- 상태 -->
                      <span class="receive reserve">티켓팅확정</span>
                    </td>
                    <td class="data_form">
                      <button class="td_send ok_sign">
                        <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                        <!-- 버튼 폼 -->
                        <span class="send shadow active"></span>
                      </button>
                    </td>
                    <td>
                      <button class="td_perforce">
                        <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                        <!-- 버튼 폼 -->
                        <span class="perforce shadow"></span>
                      </button>
                    </td>
                    <td>
                      <button class="send_link">발송</button>
                    </td>
                  </tr>
                  <tr>
                    <td>2021.03.09 10:34:29</td>
                    <td>2021.04.17 00:00:29</td>
                    <td>이브닝 명상</td>
                    <td>김승훈</td>
                    <td>apple09470@naver.com</td>
                    <td>01099819804</td>
                    <td>정지희</td>
                    <td class="data_txt">
                      <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                      <!-- 상태 -->
                      <span class="receive reserve">티켓팅확정</span>
                    </td>
                    <td class="data_form">
                      <button class="td_send ok_sign">
                        <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                        <!-- 버튼 폼 -->
                        <span class="send shadow active"></span>
                      </button>
                    </td>
                    <td>
                      <button class="td_perforce">
                        <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                        <!-- 버튼 폼 -->
                        <span class="perforce shadow"></span>
                      </button>
                    </td>
                    <td>
                      <button class="send_link">발송</button>
                    </td>
                  </tr>
                  <tr>
                    <td>2021.03.09 10:34:29</td>
                    <td>2021.04.17 00:00:29</td>
                    <td>이브닝 명상</td>
                    <td>김승훈</td>
                    <td>apple09470@naver.com</td>
                    <td>01099819804</td>
                    <td>정지희</td>
                    <td class="data_txt">
                      <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                      <!-- 상태 -->
                      <span class="receive reserve">티켓팅확정</span>
                    </td>
                    <td class="data_form">
                      <button class="td_send ok_sign">
                        <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                        <!-- 버튼 폼 -->
                        <span class="send shadow active"></span>
                      </button>
                    </td>
                    <td>
                      <button class="td_perforce">
                        <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                        <!-- 버튼 폼 -->
                        <span class="perforce shadow"></span>
                      </button>
                    </td>
                    <td>
                      <button class="send_link">발송</button>
                    </td>
                  </tr>
                  <tr>
                    <td>2021.03.09 10:34:29</td>
                    <td>2021.04.17 00:00:29</td>
                    <td>이브닝 명상</td>
                    <td>김승훈</td>
                    <td>apple09470@naver.com</td>
                    <td>01099819804</td>
                    <td>정지희</td>
                    <td class="data_txt">
                      <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                      <!-- 상태 -->
                      <span class="receive reserve">티켓팅확정</span>
                    </td>
                    <td class="data_form">
                      <button class="td_send ok_sign">
                        <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                        <!-- 버튼 폼 -->
                        <span class="send shadow active"></span>
                      </button>
                    </td>
                    <td>
                      <button class="td_perforce">
                        <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                        <!-- 버튼 폼 -->
                        <span class="perforce shadow"></span>
                      </button>
                    </td>
                    <td>
                      <button class="send_link">발송</button>
                    </td>
                  </tr>
                  <tr>
                    <td>2021.03.09 10:34:29</td>
                    <td>2021.04.17 00:00:29</td>
                    <td>이브닝 명상</td>
                    <td>김승훈</td>
                    <td>apple09470@naver.com</td>
                    <td>01099819804</td>
                    <td>정지희</td>
                    <td class="data_txt">
                      <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                      <!-- 상태 -->
                      <span class="receive reserve">티켓팅확정</span>
                    </td>
                    <td class="data_form">
                      <button class="td_send ok_sign">
                        <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                        <!-- 버튼 폼 -->
                        <span class="send shadow active"></span>
                      </button>
                    </td>
                    <td>
                      <button class="td_perforce">
                        <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                        <!-- 버튼 폼 -->
                        <span class="perforce shadow"></span>
                      </button>
                    </td>
                    <td>
                      <button class="send_link">발송</button>
                    </td>
                  </tr>
                  <tr>
                    <td>2021.03.09 10:34:29</td>
                    <td>2021.04.17 00:00:29</td>
                    <td>이브닝 명상</td>
                    <td>김승훈</td>
                    <td>apple09470@naver.com</td>
                    <td>01099819804</td>
                    <td>정지희</td>
                    <td class="data_txt">
                      <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                      <!-- 상태 -->
                      <span class="receive reserve">티켓팅확정</span>
                    </td>
                    <td class="data_form">
                      <button class="td_send ok_sign">
                        <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                        <!-- 버튼 폼 -->
                        <span class="send shadow active"></span>
                      </button>
                    </td>
                    <td>
                      <button class="td_perforce">
                        <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                        <!-- 버튼 폼 -->
                        <span class="perforce shadow"></span>
                      </button>
                    </td>
                    <td>
                      <button class="send_link">발송</button>
                    </td>
                  </tr>
                  <tr>
                    <td>2021.03.09 10:34:29</td>
                    <td>2021.04.17 00:00:29</td>
                    <td>이브닝 명상</td>
                    <td>김승훈</td>
                    <td>apple09470@naver.com</td>
                    <td>01099819804</td>
                    <td>정지희</td>
                    <td class="data_txt">
                      <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                      <!-- 상태 -->
                      <span class="receive reserve">티켓팅확정</span>
                    </td>
                    <td class="data_form">
                      <button class="td_send ok_sign">
                        <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                        <!-- 버튼 폼 -->
                        <span class="send shadow active"></span>
                      </button>
                    </td>
                    <td>
                      <button class="td_perforce">
                        <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                        <!-- 버튼 폼 -->
                        <span class="perforce shadow"></span>
                      </button>
                    </td>
                    <td>
                      <button class="send_link">발송</button>
                    </td>
                  </tr>
                  <tr>
                    <td>2021.03.09 10:34:29</td>
                    <td>2021.04.17 00:00:29</td>
                    <td>이브닝 명상</td>
                    <td>김승훈</td>
                    <td>apple09470@naver.com</td>
                    <td>01099819804</td>
                    <td>정지희</td>
                    <td class="data_txt">
                      <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                      <!-- 상태 -->
                      <span class="receive reserve">티켓팅확정</span>
                    </td>
                    <td class="data_form">
                      <button class="td_send ok_sign">
                        <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                        <!-- 버튼 폼 -->
                        <span class="send shadow active"></span>
                      </button>
                    </td>
                    <td>
                      <button class="td_perforce">
                        <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                        <!-- 버튼 폼 -->
                        <span class="perforce shadow"></span>
                      </button>
                    </td>
                    <td>
                      <button class="send_link">발송</button>
                    </td>
                  </tr>
                  <tr>
                    <td>2021.03.09 10:34:29</td>
                    <td>2021.04.17 00:00:29</td>
                    <td>이브닝 명상</td>
                    <td>김승훈</td>
                    <td>apple09470@naver.com</td>
                    <td>01099819804</td>
                    <td>정지희</td>
                    <td class="data_txt">
                      <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                      <!-- 상태 -->
                      <span class="receive reserve">티켓팅확정</span>
                    </td>
                    <td class="data_form">
                      <button class="td_send ok_sign">
                        <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                        <!-- 버튼 폼 -->
                        <span class="send shadow active"></span>
                      </button>
                    </td>
                    <td>
                      <button class="td_perforce">
                        <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                        <!-- 버튼 폼 -->
                        <span class="perforce shadow"></span>
                      </button>
                    </td>
                    <td>
                      <button class="send_link">발송</button>
                    </td>
                  </tr>
                  <tr>
                    <td>2021.03.09 10:34:29</td>
                    <td>2021.04.17 00:00:29</td>
                    <td>이브닝 명상</td>
                    <td>김승훈</td>
                    <td>apple09470@naver.com</td>
                    <td>01099819804</td>
                    <td>정지희</td>
                    <td class="data_txt">
                      <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                      <!-- 상태 -->
                      <span class="receive reserve">티켓팅확정</span>
                    </td>
                    <td class="data_form">
                      <button class="td_send ok_sign">
                        <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                        <!-- 버튼 폼 -->
                        <span class="send shadow active"></span>
                      </button>
                    </td>
                    <td>
                      <button class="td_perforce">
                        <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                        <!-- 버튼 폼 -->
                        <span class="perforce shadow"></span>
                      </button>
                    </td>
                    <td>
                      <button class="send_link">발송</button>
                    </td>
                  </tr>
                  </tbody>
                  <script>
                    $(function() {
                      $('#ticket_member_list2 .send_link').click(function () {
                        // alert('success');
                        $(this).closest('.boxwrap__info').next().show().find('#send-zoom-link').show();
                      })
                    })
                  </script>
                </table>
                <style>
                  .receive.reserve {
                    color: #0091ea;
                  }
                  .receive.wait {
                    color: #9e9e9e;
                  }
                  .receive.cancel{
                    color: #ff6633;
                  }
                  .send, .perforce {
                    left: 3px;
                  }
                  .send.active, .perforce.active {
                    left: 35px;
                  }
                  .send, .perforce {
                    -webkit-transition: all 0.5s ease;
                    -moz-transition: all 0.5s ease;
                    -o-transition: all 0.5s ease;
                    transition: all 0.5s ease;
                  }
                  #stu .red_sign {
                    background-color: #ff6633;
                  }
                </style>
                <script>
                  // 입금 요청, 티켓팅 확정 클릭이벤트
                  $(function(){
                    
                    let left = parseInt( $('.send').css('left') );
                    // console.log(left); 2
                    let left2 = parseInt( $('.perforce').css('left') );
                    
                    $(window).on('load',function(){
                      if(left == 3){
                        $('.receive').text('입금 요청');
                      }
                      else if(left == 35){
                        $('.receive').text('티켓팅 확정');
                      }
                    })
                    
                    let tdata = "";
                    $('.td_send').click(function(){
                      left = parseInt( $(this).find('.send').css('left') );
                      let receive2 = $(this).parent().prev().find('.receive').text();
                      
                      // console.log(receive2); ok
                      
                      if(left == 3){
                        // console.log(1);
                        
                        if(receive2 == '미입금 취소' || receive2 == "강제 취소") {
                          $(this).find('.send').stop();
                          $(this).removeClass('ok_sign');
                        }
                        else {
                          $(this).find('.send').animate({ left : '35px' })
                          $(this).addClass('ok_sign');
                          $(this).parent().prev().find('.receive').css('color','#0091ea')
                            .text('티켓팅 확정');
                        }
                      }
                      else if(left == 35){
                        // console.log(2);
                        $(this).find('.send').animate({ left : '3px' })
                        $(this).removeClass('ok_sign');
                        $(this).parent().prev().find('.receive').css('color','#9e9e9e')
                          .text('입금 요청');
                      }
                      
                      // 입금 요청, 티켓팅 확정
                      // console.log(receive2);
                      
                      tdata = console.log(receive2);
                    })
                    // 입금 요청, 티켓팅 확정
                    // console.log(tdata);    ok
                    
                    $('.td_perforce').click(function(){
                      
                      $(this).parent().prev().find('.send').animate({ left : '3px' });
                      $(this).parent().prev().find('.td_send').removeClass('ok_sign');
                      
                      left = parseInt( $(this).parent().prev().prev().find('.send').css('left') );
                      left2 = parseInt( $(this).find('.perforce').css('left') );
                      let receive = $(this).parent().prev().prev().find('.receive').text();
                      let has = $(this).parent().prev().prev().find('.receive').hasClass('alert_red');
                      
                      // console.log(receive);
                      
                      if(left2 == 3){
                        $(this).find('.perforce').animate({
                          left : '35px' })
                        $(this).addClass('ok_sign');
                        
                        if(receive == '입금 요청' || tdata == '입금요청'){
                          $(this).parent().prev().prev()
                            .find('.receive').text('미입금 취소').addClass('alert_red');
                        }
                        else if(receive == '티켓팅 확정' || tdata == '티켓팅 확정'){
                          $(this).parent().prev().prev()
                            .find('.receive').text('강제취소').addClass('alert_red');
                        }
                      }
                      else if(left2 == 35){
                        $(this).find('.perforce').animate({
                          left : '3px' })
                        $(this).removeClass('ok_sign');
                        
                        if(receive == '미입금 취소'){
                          $(this).parent().prev().prev()
                            .find('.receive').text('입금 요청').removeClass('alert_red');
                        }
                        else if(receive == '강제 취소'){
                          // '강제 취소' 값이 나올시 '티켓팅 확정'이 나오게 해주세요
                          // 이 부분만 마지막으로 기능 적용되면 됩니다.
                          $(this).parent().prev().prev()
                            .find('.receive').text('티켓팅 확정').removeClass('alert_red');
                        }
                      }
                    })
                  })
                </script>
              </div>
            </div>
          </div>
          <button class="detail_table_more">MORE</button>
        </div>
      </div>
    
    </div>
  </div>
</div>
