<h2 class="boxwrap__type meaning">강사 / 스케줄</h2>
<div class="boxwrap__info">
  <div class="info--tit">
    <a href="#" class="tit_theme">
      강사 관리
      <div class="theme_arrow">
        <img src="<?php echo base_url().'template/back/center'; ?>/imgs/icon_next.png" width="6" height="auto">
        <img src="<?php echo base_url().'template/back/center'; ?>/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">
      </div>
    </a>
    <a href="#" class="tit_theme">
      스케줄 관리
      <div class="theme_arrow">
        <img src="<?php echo base_url().'template/back/center'; ?>/imgs/icon_next.png" width="6" height="auto">
        <img src="<?php echo base_url().'template/back/center'; ?>/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">
      </div>
    </a>
  </div>
  <div class="info--contents scroll-y_hidden">
    <section class="contents_teacher contents_enroll scroll-y">
      <h3 class="meaning">강사 관리</h3>
      <div class="center_detailbox">
        <div class="teacher_register shadow_md">
          <p class="register_tit tit-lg">강사등록</p>
          <div class="register_confirm">
            <input type="text" placeholder="강사이름을 입력해주세요" class="confirm_name" id="search_email">
            <button class="confirm_search">
              <img src="<?php echo base_url().'template/back/center'; ?>/imgs/icon_find.png" width="24">
            </button>
          </div>
<!--          <p class="register_reading">-->
<!--            jsoohong90@naver.com <span>(정수)</span>-->
<!--          </p>-->
        </div>
        <div class="teacher_data shadow_md">
          <div class="table_tit clearfix" style="position: relative">
            <button class="id_remove">삭제</button>
            <p class="teacher_tit tit-lg tit-normal">강사정보</p>
            <div class="teacher_table table_data" id="teacher_list">
              <!-- teacher list -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="contents_schedule contents_modify scroll-y">
      <h3 class="meaning">스케줄 관리</h3>
      <div class="schedule_detailbox modify_detailbox">
        <div class="schedule_register ticket_name shadow_md">
          <p class="schedule_tit1 register_tit tit-lg">스케줄 등록</p>
          <dl class="register_area clearfix">
            <dt class="area_tit">날짜</dt>
            <dd class="area_data clearfix">
              <div class="data_box">
                <div class="data_function">
                  <div class="container">
                    <div class="form-group">
                      <div class='input-group date datetimepicker1' id='datetimepicker1'>
                        <input type='text' class="form-control" />
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                      </div>
                    </div>
                    <script type="text/javascript">
                      $(function() {
                        $('.datetimepicker1').datepicker();
                      });
                    </script>
                  </div>
                </div>
                <span class="data_hyphen">-</span>
                <div class="data_function">
                  <div class="container">
                    <div class="form-group">
                      <div class='input-group date datetimepicker1' id='datetimepicker1'>
                        <input type='text' class="form-control" />
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                      </div>
                    </div>
                    <script type="text/javascript">
                      $(function() {
                        $('.datetimepicker1').datepicker();
                      });
                    </script>
                  </div>
                </div>
              </div>
            </dd>
            <dt class="area_tit">시간</dt>
            <dd class="area_data">
              <div class="data_box">
                <div class="data_function">
                  <div class="container">
                    <div class="row">
                      <div class='col-sm-6'>
                        <div class="form-group">
                          <div class='input-group date datetimepicker3' id='datetimepicker3'>
                            <input type='text' class="form-control" />
                            <span class="input-group-addon">
                              <span class="glyphicon glyphicon-time"></span>
                            </span>
                          </div>
                        </div>
                      </div>
                      <script type="text/javascript">
                        $(function () {
                          $('.datetimepicker3').datetimepicker({
                            format: 'LT'
                          });
                        });
                      </script>
                    </div>
                  </div>
                </div>
                <span class="data_hyphen">-</span>
                <div class="data_function">
                  <div class="container">
                    <div class="row">
                      <div class='col-sm-6'>
                        <div class="form-group">
                          <div class='input-group date datetimepicker3' id='datetimepicker3'>
                            <input type='text' class="form-control" />
                            <span class="input-group-addon">
                              <span class="glyphicon glyphicon-time"></span>
                            </span>
                          </div>
                        </div>
                      </div>
                      <script type="text/javascript">
                        $(function () {
                          $('.datetimepicker3').datetimepicker({
                            format: 'LT'
                          });
                        });
                      </script>
                    </div>
                  </div>
                </div>
              </div>
            </dd>
            <dt class="area_tit">반복</dt>
            <dd class="area_data" style="height: 34px">
              <div class="data_box">
                <div class="chkbox_line">
                  <label class="form-chk col_sp">
                    <input type="checkbox" name="number">
                    월요일
                  </label>
                  <label class="form-chk col_sp">
                    <input type="checkbox" name="number">
                    화요일
                  </label>
                  <label class="form-chk col_sp">
                    <input type="checkbox" name="number">
                    수요일
                  </label>
                  <label class="form-chk col_sp">
                    <input type="checkbox" name="number">
                    목요일
                  </label>
                  <label class="form-chk col_sp">
                    <input type="checkbox" name="number">
                    금요일
                  </label>
                  <label class="form-chk col_sp">
                    <input type="checkbox" name="number">
                    토요일
                  </label>
                  <label class="form-chk col_sp">
                    <input type="checkbox" name="number">
                    일요일
                  </label>
                </div>
              </div>
           </dd>
            <dt class="area_tit">강사</dt>
            <dd class="area_data">
              <div class="data_box">
                <div class="teacher_select clearfix">
                  <div class="selbox-wrap">
                    <select id="selbox">
                      <option value="1">강사 A</option>
                      <option value="2">강사 B</option>
                      <option value="direct" class="direct">직접입력</option>
                    </select>
                    <div class="selbox-arrow">
                      <img src="<?php echo base_url().'template/back/center'; ?>/imgs/icon_down.png" width="12" class="arrow_down">
                      <img src="<?php echo base_url().'template/back/center'; ?>/imgs/icon_up.png" width="12" style="display: none;" class="arrow_up">
                    </div>
                    <input type="text" id="selboxDirect">
                  </div>
                  <div class="selbox-name">
                    <p>수업명</p>
                    <input type="text" placeholder="text box" class="name_form">
                  </div>
                </div>
                <div class="teacher_book clearfix">
                  <label class="book-chk form-chk">
                    <input type="checkbox" id="schedule-reservable" name="number">
                    회원 예약기능 사용
                  </label>
                  <div class="book-function" style="display: none;">
                    <div class="book-ticket">
                      <p>예약가능 수강권</p>
                      <div class="book-select" style="height: 110px">
                        <select name="tickets[]" multiple="multiple" size="6" style="height: 100px;">
                          <option value="1">3개월권</option>
                          <option value="2">6개월권</option>
                          <option value="3">1년권</option>
                          <option value="3">1년권</option>
                          <option value="3">1년권</option>
                          <option value="3">1년권</option>
                        </select>
                      </div>
                      <!-- 태그 추가 -->
                      <div class="book-btn">
                        <button class="btn_select">
                          <img src="<?php echo base_url(); ?>template/back/center/icon_next.png" width="6" height="auto">
                        </button>
                        <button class="btn_delete">
                          <img src="<?php echo base_url(); ?>template/back/center/icon_prev.png" width="6" height="auto">
                        </button>
  
                      </div>
                      <div class="book-move">
                        <select name="tickets[]" multiple="multiple" size="6" style="height: 100px;" class="move-sel">
    
                        </select>
                      </div>
                      <!-- 스타일 추가 -->
                      <style>
                        #whole {
                          padding: 0;
                        }
                        .book-btn {
                          margin: 0 8px;
                          display: inline-block;
                          width: 24px;
                          vertical-align: top;
                        }
                        .book-btn button {
                          display: block;
                          width: 24px;
                          height: 24px;
                          border-radius: 4px;
                          border: 1px solid #ccc;
      
                        }
                        .btn_select {
                          margin-bottom: 8px;
                        }
                        .book-move {
                          height: 110px;
                          border: 1px solid #ccc;
                          display: inline-block;
                          vertical-align: top;
                        }
                        @media(min-width:1025px){
                          .book-select, .book-move {
                            width: 156px;
                          }
                        }
    
                        .start_time {
                          display: inline-block;
                          width: 44px;
                        }
                        .form_time {
                          width: inherit;
                          height: inherit;
                          padding: 0 10px;
                        }
                        .book-ticket, .book-start {
                          width: 176%;
                        }
                        .book-start p:last-child {
                          margin-left: 0;
                        }
                        .book-function > div {
                          margin-bottom: 20px;
                        }
                      </style>

                    </div>
                    <div class="book-start">
                      <p>예약 / 취소 가능 시간 : 수업 시작
                        <span class="start_time">
                          <input type="text" placeholder="00" class="form_time">
                        </span> 시간
                        <span class="start_time">
                          <input type="text" placeholder="00" class="form_time">
                        </span> 분 이전까지
                      </p>
                    </div>
                    <div class="book-limit">
                      <p>예약정원</p>
                      <input type="text">
                      <p class="limit_count">명</p>
                    </div>
                  </div>
                </div>
                <!-- 예약기능 추가 -->
                <div class="wait_wrap clearfix" style="width: 100%; margin-top: 4px; font-size: 0;">
                  <label class="wait_chk book-chk form-chk" style="color: #333; float: left;">
                    <input type="checkbox" id="schedule-wait" name="number">
                    예약대기
                  </label>
                  <div class="wait_type" style="width: 58%; float: left; display: none;">
                    <p style="display: inline-block; color: #616161; font-size: 14px; font-weight: normal; line-height: 32px;">예약대기 인원
                      <span style="display: inline-block; margin: 0 12px;"><input type="text" class="name_form" style="width: 100%;"></span>명
                    </p>
                  </div>
                </div>
              </div>
            </dd>
          </dl>
        </div>
        <div class="schefule_status ticket_name shadow_md">
          <p class="schedule_tit1 register_tit tit-lg">스케줄 현황</p>
          <div class="schedule_detail" style="display: none;">
            <div class="detail_status clearfix">
              <div class="status_course">
                <p class="course_time">11:00~12:00</p>
                <p class="course_teacher">(강사) 수업명</p>
              </div>
              <div class="status_book">
                <p class="book_proceed">예약현황 5/10</p>
                <div class="book_btn">
                  <button class="book_modify btn_val btn_sm">수정</button>
                  <button class="book_remove btn_val btn_sm">삭제</button>
                </div>
              </div>
            </div>
            <div class="detail_status clearfix">
              <div class="status_course">
                <p class="course_time">11:00~12:00</p>
                <p class="course_teacher">(강사) 수업명</p>
              </div>
              <div class="status_book">
                <p class="book_proceed">예약현황 5/10</p>
                <div class="book_btn">
                  <button class="book_modify btn_val btn_sm">수정</button>
                  <button class="book_remove btn_val btn_sm">삭제</button>
                </div>
              </div>
            </div>
            <div class="detail_status clearfix">
              <div class="status_course">
                <p class="course_time">11:00~12:00</p>
                <p class="course_teacher">(강사) 수업명</p>
              </div>
              <div class="status_book">
                <p class="book_proceed">예약현황 5/10</p>
                <div class="book_btn">
                  <button class="book_modify btn_val btn_sm">수정</button>
                  <button class="book_remove btn_val btn_sm">삭제</button>
                </div>
              </div>
            </div>
            <div class="detail_status clearfix">
              <div class="status_course">
                <p class="course_time">11:00~12:00</p>
                <p class="course_teacher">(강사) 수업명</p>
              </div>
              <div class="status_book">
                <p class="book_proceed">예약현황 5/10</p>
                <div class="book_btn">
                  <button class="book_modify btn_val btn_sm">수정</button>
                  <button class="book_remove btn_val btn_sm">삭제</button>
                </div>
              </div>
            </div>
            <div class="detail_status clearfix">
              <div class="status_course">
                <p class="course_time">11:00~12:00</p>
                <p class="course_teacher">(강사) 수업명</p>
              </div>
              <div class="status_book">
                <p class="book_proceed">예약현황 5/10</p>
                <div class="book_btn">
                  <button class="book_modify btn_val btn_sm">수정</button>
                  <button class="book_remove btn_val btn_sm">삭제</button>
                </div>
              </div>
            </div>
            <div class="detail_status clearfix">
              <div class="status_course">
                <p class="course_time">11:00~12:00</p>
                <p class="course_teacher">(강사) 수업명</p>
              </div>
              <div class="status_book">
                <p class="book_proceed">예약현황 5/10</p>
                <div class="book_btn">
                  <button class="book_modify btn_val btn_sm">수정</button>
                  <button class="book_remove btn_val btn_sm">삭제</button>
                </div>
              </div>
            </div>
            <div class="detail_status clearfix">
              <div class="status_course">
                <p class="course_time">11:00~12:00</p>
                <p class="course_teacher">(강사) 수업명</p>
              </div>
              <div class="status_book">
                <p class="book_proceed">예약현황 5/10</p>
                <div class="book_btn">
                  <button class="book_modify btn_val btn_sm">수정</button>
                  <button class="book_remove btn_val btn_sm">삭제</button>
                </div>
              </div>
            </div>
          </div>
          <div class="schedule_date">
            <div class="date_month">
              <p class="month_no" id="month_no"><?php echo substr($date, 0, 7); ?></p>
              <div class="month_btns">
                <button class="btn_prev" onclick="get_schedule_calendar(-1)">
                  <img src="<?php echo base_url().'template/back/center'; ?>/imgs/icon_prev.png" width="6">
                </button>
                <button class="btn_next"  onclick="get_schedule_calendar(1)">
                  <img src="<?php echo base_url().'template/back/center'; ?>/imgs/icon_next.png" width="6">
                </button>
              </div>
            </div>
            <p class="date_today" id="focus_date"><?php echo $date; ?></p>
          </div>
          <div class="schedule_table" id="schedule_calendar">
            <!-- schedule calendar -->
<!--            --><?php //include 'schedule_calendar.php'; ?>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<div class="popup-box">
  <div class="popup theme:alert_complete">
    <div class="popup_cnt">
      <button class="btn_close">
        <img src="<?php echo base_url(); ?>template/back/center/imgs/icon_close_black.png" alt="" width="12" height="12" style="opacity: 0.5;">
      </button>
      <div class="guide_box confirm_box">
        <img src="<?php echo base_url(); ?>template/back/center/imgs/information_mark.png" alt="" width="40" height="40" class="guide_icon">
        <p class="confirm_message" style="font-size: 13px; line-height: 1.75;"><span id="search_info"></span>님을
          <br>센터 강사로 <strong>추가</strong>하시겠습니까?</p>
      </div>
      <div class="confirm_btn">
        <button class="btn_cancel font-futura">CANCEL</button>
        <button class="btn_ok font-futura">OK</button>
      </div>
    </div>
  </div>
  <div class="popup theme:schedule">
    <div class="popup_cnt">
      <div class="schedule_register ticket_name shadow_md">
        <p class="schedule_tit1 register_tit tit-lg">스케줄 등록</p>
        <dl class="register_area clearfix">
          <dt class="area_tit" style="width: 60px;">날짜</dt>
          <dd class="area_data clearfix" style="width: 542px;">
            <div class="data_box" style="width: 100%;">
              <div class="data_function" style="width: 196px;">
                <div class="container">
                  <div class="form-group">
                    <div class="input-group date datetimepicker1" id="datetimepicker1">
                      <input type="text" class="form-control">
                      <span class="input-group-addon">
                                      <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                    </div>
                  </div>
                  <script type="text/javascript">
                    $(function() {
                      $('.datetimepicker1').datepicker();
                    });
                  </script>
                </div>
              </div>
              <span class="data_hyphen">-</span>
              <div class="data_function" style="width: 196px;">
                <div class="container">
                  <div class="form-group">
                    <div class="input-group date datetimepicker1" id="datetimepicker1">
                      <input type="text" class="form-control">
                      <span class="input-group-addon">
                                      <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                    </div>
                  </div>
                  <script type="text/javascript">
                    $(function() {
                      $('.datetimepicker1').datepicker();
                    });
                  </script>
                </div>
              </div>
            </div>
          </dd>
          <dt class="area_tit" style="width: 60px;">시간</dt>
          <dd class="area_data" style="width: 542px;">
            <div class="data_box" style="width: 100%;">
              <div class="data_function" style="width: 196px;">
                <div class="container">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <div class="input-group date datetimepicker3" id="datetimepicker3">
                          <input type="text" class="form-control">
                          <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-time"></span>
                                        </span>
                        </div>
                      </div>
                    </div>
                    <script type="text/javascript">
                      $(function () {
                        $('.datetimepicker3').datetimepicker({
                          format: 'LT'
                        });
                      });
                    </script>
                  </div>
                </div>
              </div>
              <span class="data_hyphen">-</span>
              <div class="data_function" style="width: 196px;">
                <div class="container">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <div class="input-group date datetimepicker3" id="datetimepicker3">
                          <input type="text" class="form-control">
                          <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-time"></span>
                                        </span>
                        </div>
                      </div>
                    </div>
                    <script type="text/javascript">
                      $(function () {
                        $('.datetimepicker3').datetimepicker({
                          format: 'LT'
                        });
                      });
                    </script>
                  </div>
                </div>
              </div>
            </div>
          </dd>
          <dt class="area_tit" style="width: 60px;">반복</dt>
          <dd class="area_data" style="height: 34px; width: 542px;">
            <div class="data_box" style="width: 100%;">
              <div class="chkbox_line">
                <label class="form-chk col_sp" style="width: 60px;">
                  <input type="checkbox" name="number">
                  월요일
                </label>
                <label class="form-chk col_sp" style="width: 60px;">
                  <input type="checkbox" name="number">
                  화요일
                </label>
                <label class="form-chk col_sp" style="width: 60px;">
                  <input type="checkbox" name="number">
                  수요일
                </label>
                <label class="form-chk col_sp" style="width: 60px;">
                  <input type="checkbox" name="number">
                  목요일
                </label>
                <label class="form-chk col_sp" style="width: 60px;">
                  <input type="checkbox" name="number">
                  금요일
                </label>
                <label class="form-chk col_sp" style="width: 60px;">
                  <input type="checkbox" name="number">
                  토요일
                </label>
                <label class="form-chk col_sp" style="width: 60px;">
                  <input type="checkbox" name="number">
                  일요일
                </label>
              </div>
            </div>
          </dd>
          <dt class="area_tit" style="width: 60px;">강사</dt>
          <dd class="area_data" style="width: 542px;">
            <div class="data_box" style="width: 100%;">
              <div class="teacher_select clearfix" id="teach">
                <div class="selbox-wrap" style="width: 128px;" id="selwrap">
                  <select id="selbox" class="selcnt">
                    <option value="1">강사 A</option>
                    <option value="2">강사 B</option>
                    <option value="direct" class="direct">직접입력</option>
                  </select>
                  <div class="selbox-arrow">
                    <img src="<?php echo base_url(); ?>template/back/center/imgs/icon_down.png" width="12" class="arrow_down">
                    <img src="<?php echo base_url(); ?>template/back/center/imgs/icon_up.png" width="12" style="display: none;" class="arrow_up">
                  </div>
                  <input type="text" id="selboxDirect" style="display: none;" class="selDirect">
                </div>
                <div class="selbox-name" style="width: 264px;">
                  <p>수업명</p>
                  <input type="text" placeholder="text box" class="name_form">
                </div>
              </div>
              <div class="teacher_book clearfix">
                <label class="book-chk form-chk" style="width: 128px;">
                  <input type="checkbox" id="schedule-reservable2" name="number">
                  회원 예약기능 사용
                </label>
                <div class="book-function" id="book_fn">
                  <!-- width 값 수정 -->
                  <div class="book-ticket">
                    <p>예약가능 수강권</p>
                    <!-- height 값 수정 -->
                    <div style="height: 110px; width: 120px; display: inline-block; box-sizing: border-box; border: 1px solid #ccc;" id="book-sel">
                      <select name="tickets[]" multiple="multiple" size="6" style="height: 100px;" id="move-org">
                        <option value="1">3개월권</option>
                        <option value="2">6개월권</option>
                        <option value="3">1년권</option>
                        <option value="3">1년권</option>
                        <option value="3">1년권</option>
                        <option value="3">1년권</option>
                      </select>
                    </div>
                    
                    <!-- 태그 추가 -->
                    <div class="book-btn">
                      <button id="btn_sel" style="display: block; width: 24px; height: 24px; border-radius: 4px; border: 1px solid #ccc; margin-bottom: 8px;">
                        <img src="<?php echo base_url(); ?>template/back/center/imgs/icon_next.png" width="6" height="auto">
                      </button>
                      <button id=btn_del style="display: block; width: 24px; height: 24px; border-radius: 4px; border: 1px solid #ccc;">
                        <img src="<?php echo base_url(); ?>template/back/center/imgs/icon_prev.png" width="6" height="auto">
                      </button>
                    
                    </div>
                    <div style="width: 120px; height: 110px; border: 1px solid #ccc; display: inline-block; vertical-align: top;" id="book-left">
                      <select name="tickets[]" multiple="multiple" size="6" style="height: 100px;" id="left-sel">
                      
                      </select>
                    </div>
                    <!-- 스타일 추가 -->
                    <style>
                      .book-btn {
                        margin: 0 8px;
                        display: inline-block;
                        width: 24px;
                        vertical-align: top;
                      }
                      .book-btn button {
                        display: block;
                        width: 24px;
                        height: 24px;
                        border-radius: 4px;
                        border: 1px solid #ccc;
                        
                      }
                      .btn_select {
                        margin-bottom: 8px;
                      }
                      .book-select, .book-move {
                        width: 96px;
                      }
                      @media(min-width:1025px){
                        .book-select, .book-move {
                          width: 156px;
                        }
                      }
                      .book-move {
                        height: 110px;
                        border: 1px solid #ccc;
                        display: inline-block;
                        vertical-align: top;
                      }
                      .start_time {
                        display: inline-block;
                        width: 44px;
                      }
                      .form_time {
                        width: inherit;
                        height: inherit;
                        padding: 0 10px;
                      }
                      .book-ticket, .book-start {
                        width: 176%;
                      }
                      .book-start p:last-child {
                        margin-left: 0;
                      }
                      .book-function > div {
                        margin-bottom: 20px;
                      }
                    </style>
                  
                  </div>
                  <div class="book-start">
                    <p>예약 / 취소 가능 시간 : 수업 시작 <span class="start_time"><input type="text" placeholder="00" class="form_time"></span> 시간 <span class="start_time"><input type="text" placeholder="00" class="form_time"></span> 분 이전까지</p>
                  </div>
                  <div class="book-limit">
                    <p>예약정원</p>
                    <input type="text">
                    <p class="limit_count">명</p>
                  </div>
                </div>
              </div>
              <div class="wait_wrap clearfix" style="width: 100%; margin-top: 4px; font-size: 0;">
                <label class="wait_chk book-chk form-chk" style="color: #333; float: left;">
                  <input type="checkbox" id="schedule-wait2" name="number">
                  예약대기
                </label>
                <div class="wait_type2" style="width: 58%; float: left; display: none;">
                  <p style="display: inline-block; color: #616161; font-size: 14px; font-weight: normal; line-height: 32px;">예약대기 인원
                    <span style="display: inline-block; margin: 0 12px;"><input type="text" class="name_form" style="width: 100%;"></span>명
                  </p>
                </div>
              </div>
            </div>
          </dd>
        </dl>
      </div>
      <div class="btn_wrap">
        <button class="btn_wth btn_val btn_rg theme:fn_save">저장</button>
        <button class="btn_wth btn_val btn_rg theme:fn_cancel">취소</button>
        <button class="btn_wth btn_val btn_rg theme:fn_remove">삭제</button>
      </div>
    </div>
  </div>
  
  <div class="popup theme:alert_remove_this">
    <div class="popup_cnt">
      <div class="guide_box confirm_box">
        <img src="<?php echo base_url(); ?>template/back/center/imgs/exclamation_mark.png" alt="" width="40" height="40" class="guide_icon">
        <p class="confirm_message" style="line-height: 40px">해당 스케줄을 <strong>삭제</strong>하시겠습니까?</p>
      </div>
      <div class="confirm_btn">
        <button class="btn_cancel font-futura">CANCEL</button>
        <button class="btn_ok font-futura">OK</button>
      </div>
    </div>
  </div>
  <div class="popup theme:alert_remove_repeat">
    <div class="popup_cnt">
      <div class="guide_box confirm_box">
        <img src="<?php echo base_url(); ?>template/back/center/imgs/exclamation_mark.png" alt="" width="40" height="40" class="guide_icon">
        <p class="confirm_message">반복되는 스케줄이 있습니다.
          <br>모든 스케줄을 <strong>삭제</strong>하시겠습니까?</p>
      </div>
      <div class="confirm_btn">
        <button class="btn_cancel font-futura" style="width: 33.1%;">CANCEL</button>
        <button class="btn_ok_all" style="width: 33.1%; border-radius: 0;">모두 삭제</button>
        <button class="btn_ok" style="width: 33.1%;">이 수업만 삭제</button>
      </div>
    </div>
  </div>
</div>

<style>
  div[class*="alert_"] {
    display: none;
    width: 360px;
    height: 212px;
    text-align: center;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-top: -106px;
    margin-left: -180px;
    z-index: 10;
    background-color: #fff;
    border-radius: 4px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.08);
  }
  .popup_cnt {
    position: relative;
    width: 100%;
    height: 100%;
  }
  .btn_close {
    width: 44px;
    height: 44px;
    position: absolute;
    top: 0;
    right: 0;
  }
  .guide {
    padding-top: 52px;
  }
  
  .confirm_box {
    padding-top: 64px;
  }
  .guide_box {
    margin-bottom: 24px;
  }
  .guide_box .confirm_message {
    padding: 0;
    text-align: left;
  }
  .guide_icon {
    margin-right: 12px;
    vertical-align: top;
  }
  
  .confirm_message {
    padding-top: 64px;
  }
  .guide_exist, .confirm_message {
    display: inline-block;
    color: #616161;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.5;
    text-align: left;
  }
  strong {
    color: #111;
  }
  .confirm_message span {
    display: inline-block;
    color: #111;
    font-weight: bold;
  }
  .email_exist {
    width: 76%;
    height: 32px;
    position: relative;
    margin: 0 auto;
  }
  .form_email {
    width: 100%;
    height: inherit;
    padding: 0 16px;
  }
  .exist_find {
    position: absolute;
    top: 0;
    right: 0;
    width: 32px;
    height: 32px;
    background-color: #eee;
    border: 1px solid #ccc;
    box-sizing: border-box;
  }
  
  .theme\:alert_error {
    top: 0;
  }
  .theme\:alert_complete {
    top: 200px;
  }
  .confirm_btn {
    width: 100%;
    height: 48px;
    box-sizing: border-box;
    border-top: 1px solid #eee;
    position: absolute;
    bottom: 0;
    left: 0;
    font-size: 0;
  }
  .confirm_btn button:hover {
    background-color: #eee;
  }
  .confirm_btn button {
    display: inline-block;
    width: 50%;
    height: calc(48px - 1px);
    font-size: 14px;
    vertical-align: top;
  }
  .register_reading {
    color: #111 !important;
  }
  button[class^="btn_ok"] {
    color: #0091ea;
    border-left: 1px solid #eee;
    border-bottom-right-radius: 4px;
  }
  button[class^="btn_cancel"] {
    color: #d32f2f;
    border-bottom-left-radius: 4px;
  }
  .btn_ok {
    border-bottom-right-radius: 4px;
  }
  
  .theme\:schedule {
    width: 656px;
    height: 592px;
    position: absolute;
    
    left: 50%;
    top: 50%;
    margin-left: -328px;
    margin-top: -296px;
  }
  .btn_wrap {
    position: absolute;
    top: 28px;
    right: 28px;
  }
  button[class*=":fn_"] {
    width: 60px;
    margin-right: 4px;
  }
  button[class$="_remove"] {
    margin-right: 0;
  }
  .register_tit {
    padding: 4px 0 24px;
  }
  #book_fn {
    display: none;
  }
</style>
<script type="text/javascript">
  // schedule
  let year = <?php echo $year; ?>;
  let month = <?php echo $month; ?>;
  function get_schedule_calendar(where) {
    month += where;
    if (month > 12) {
      year += 1;
      month = 1;
    } else if (month < 1) {
      year -= 1;
      month = 12;
    }
    $('#month_no').text(year + '.' + (month < 10 ? '0' + month : month));
    if (where !== 0) {
      $('#focus_date').text(year + '.' + (month < 10 ? '0' + month : month) + '.01');
    }
    get_page('schedule_calendar', '<?php echo base_url(); ?>center/teacher/schedule/calendar?y=' + year + '&m=' + month, false);
  }
  $(function() {
    get_schedule_calendar(0);
  });
  
  $(function(){
    // nav--id 클릭이벤트
    $('.id_list').css('display','none');
    $('.nav--id').click(function(){
      $('.id_list').toggle();
      var display = $('.arrow_up').css('display');
      // console.log(display);
      if(display == 'none'){
        $('.arrow_up').show().prev().hide();
      }
      else {
        $('.arrow_up').hide().prev().show();
      }
    })
    $('.list_child').hover(function(){
      $('.list_child').css('background','#fff');
      $(this).css('background','#eee');
    },function(){
      $('.list_child').css('background','#fff');
    })
    
    // list_child 클릭이벤트
    $('.list_child').click(function(){
      var origin = $('.current_accessed').text();
      var current = $(this).text();
      $('.current_accessed').text(current);
      $(this).text(origin);
    })
    
    
    // tit_theme 클릭이벤트
    $('.tit_theme').click(function(){
      $('.tit_theme').removeClass('reverse_color');
      $(this).addClass('reverse_color');
      $(this).find('.next_white').show().prev().hide();
      $(this).siblings().find('.next_white').hide().prev().show();
      
      var index = $('.tit_theme').index(this);
      $('.info--contents > section').hide();
      $('.info--contents > section').eq(index).show();
    })
    
    // selbox-wrap 이벤트
    $(function(){
      $("#selboxDirect").hide();
      $("#selbox").change(function() {
        if($("#selbox").val() == "direct") {
          $("#selboxDirect").show();
          $(".teacher_select").css("margin-bottom", "48px");
        }
        else {
          $("#selboxDirect").hide();
          $(".teacher_select").css("margin-bottom", "24px");
        }
      })
      /* ================= change 이벤트 추가 ================= */
      // selcnt 전환 이벤트
      $(".selDirect").hide();
      $(".selcnt").change(function() {
        if($(".selcnt").val() == "direct") {
          $(".selDirect").show();
          $("#teach").css("margin-bottom", "48px");
        }
        else {
          $(".selDirect").hide();
          $("#teach").css("margin-bottom", "24px");
        }
      })
      // $('#selboxDirect').on('keyup',function(){
      //   let val = $('#selboxDirect').val();
      //   $('.direct').text(val);
      // })
      // $('#selboxDirect').mouseout(function(){
      //   $('#selboxDirect').hide();
      // })
      // $('#selbox').mouseover(function(){
      //   $('#selboxDirect').show();
      // })
    });
    
    $(function() {
      $('#schedule-reservable').change(function() {
        let reservable = $(this).prop('checked');
        console.log(reservable);
        if (reservable === true) {
          $('.book-function').show();
        } else {
          $('.book-function').hide();
        }
      });
      /* ================== change 이벤트 추가  ================== */
      $('#schedule-reservable2').change(function() {
        let reservable = $(this).prop('checked');
        // console.log(reservable);
        if (reservable === true) {
          $('#book_fn').show();
        } else {
          $('#book_fn').hide();
        }
      });
  
      /* ================== change 이벤트 추가  ================== */
      $('#schedule-wait').change(function() {
        let wait = $(this).prop('checked');
        // console.log(reservable);
        if (wait === true) {
          $('.wait_type').show();
        } else {
          $('.wait_type').hide();
        }
      });
      $('#schedule-wait2').change(function() {
        let wait = $(this).prop('checked');
        // console.log(reservable);
        if (wait === true) {
          $('.wait_type2').show();
        } else {
          $('.wait_type2').hide();
        }
      });
    });
  
  
    /* 테이블 show/hide 클릭이벤트 */
    $(function(){
      var index = $('.no-indicator').index(this);
      // 페이지 번호 클릭
      
      $('.no-indicator').click(function(){
        // $sel_btn.off('mouseover');
        
        index = $('.no-indicator').index(this);
        $('.table-list').hide();
        $('.no-indicator').removeClass('btn_click');
        
        $('.table-list').eq(index).show();
        $(this).addClass('btn_click');
      })
      
      // 페이지 버튼 호버
      let $sel_btn = $('.table_nav_btns button');
      $sel_btn.mouseover(function(){
        $sel_btn.removeClass('btn_hover');
        $(this).addClass('btn_hover');
      }).mouseleave(function(){
        $sel_btn.removeClass('btn_hover');
      })
      
      // 페이지 화살표 버튼
      $('.prev_first').on('click',function(){
        index = 0;
        $('.table-list').hide();
        $('.table-list:first').show();
        $('.no-indicator').removeClass('btn_click');
        $('.no-indicator:first').addClass('btn_click');
      })
      $('.next_last').on('click',function(){
        index = 3;
        $('.table-list').hide();
        $('.table-list:last').show();
        $('.no-indicator').removeClass('btn_click');
        $('.no-indicator:last').addClass('btn_click');
      })
      $('.prev_before').on('click',function(){
        index = index - 1;
        // console.log(index);
        $('.table-list').hide();
        $('.table-list').eq(index).show();
        $('.no-indicator').removeClass('btn_click');
        $('.no-indicator').eq(index).addClass('btn_click');
        
      })
      $('.next_after').on('click',function(){
        index = index + 1;
        // console.log(index);
        $('.table-list').hide();
        $('.table-list').eq(index).show();
        $('.no-indicator').removeClass('btn_click');
        $('.no-indicator').eq(index).addClass('btn_click');
        
      })
    })
    
    // window 로드이벤트
    $(window).load(function(){
      // 첫번째 목록의 콘텐츠만 보이게!
      $('.tit_theme:first').addClass('reverse_color');
      $('.tit_theme:first').find('.next_white').show().prev().hide();
      $('.info--contents > section').hide();
      $('.info--contents > section:first').show();
      
      // 첫번째 목록의 테이블만 보이게!
      $('.table-list').hide();
      $('.table-list:first').show();
      $('.no-indicator:first').addClass('btn_click');
    })
    
    // id_remove 클릭이벤트
    $('.id_remove').click(function(){
      get_teacher_ids();
      if (teacher_ids.length === 0) {
        alert('강사를 선택해주세요.');
        return false;
      }
      let url = '<?php echo base_url(); ?>center/teacher/leave';
      let data = [];
      data['teacher_ids'] = JSON.stringify(teacher_ids);
      send_post(data, url);
      // $('.ticket_chk').each(function(index){
      //   $('.ticket_chk:checked').closest('tr').remove();
      // })
    })
    
    // 센터강사 chk_btn 클릭이벤트
    $('.main_chk').click(function(){
      var chk = $('.main_chk').prop('checked');
      if(chk){
        $('input[class^=ticket_]').prop('checked',true);
      }
      else {
        $('input[class^=ticket_]').prop('checked',false);
      }
    })
    
    /* 팝업창 오픈이벤트 */
    $('.popup-box').children().hide();
    
    // confirm_name 클릭시 아이디창 열람 / 팝업
    $('.confirm_name').click(function(){
    
    })
    
    /* 팝업창 닫기이벤트 */
    // 윈도우 ESC버튼 팝업닫기
    $(window).keyup(function(e){
      if(e.keyCode == 27){
        $(".popup-box").fadeOut();
        $('.popup-box').children().hide();
      }
    })
    
    // 윈도우 클릭시 팝업닫기
    $(window).click(function(e){
      var target = e.target.className;
      
      if(target == 'popup-box'){
        $('.popup-box').fadeOut();
        $('.popup-box').children().hide();
      }
    })
  
    // onoff-btn 애니메이션
    // $('.onoff').click(function(){
    //   let point = $(this).find('.onoff_point');
    //   let left = point.css('left');
    //   // console.log(left)
    //   if(left === '32px') {
    //     point.animate({
    //       left : '4px'
    //     });
    //     $(this).addClass('onoff_on');
    //   }
    //   else if(left === '4px') {
    //     point.animate({
    //       left : '32px'
    //     });
    //     $(this).removeClass('onoff_on');
    //   }
    // })

    // confirm_name 클릭 이벤트
    // $('.register_reading').hide();
    $(function(){
      
      var id = $('.confirm_name').val();
      var name = $('.register_reading').text();
      
      $('.confirm_name').on('keyup',function(){
        id = $('.confirm_name').val();
        // console.log(id);
      })
  
      // confirm_search 클릭 이벤트
      $('.confirm_search').click(function(){
        // 강사등록 검색버튼 클릭시 팝업 하나로 통일, 조건에 따라 텍스트만 바꿔주세요.
        let search_email = $('#search_email').val();
        if (search_email === '') {
          alert('이메일을 정확히 입력해 주십시요');
          return false;
        }
        
        let url = '<?php echo base_url(); ?>center/teacher/search';
        let data = [];
        data['email'] = search_email;
        send_post_data(data, url, function(res) {
          $('#search_info').text(res.teacher_email + ' (' + res.teacher_name + ')');
          $('#search_info').data('id', res.teacher_id);
          $('.popup-box').show();
          $('div[class*=alert_complete]').show();
          // console.log($('#search_info').text());
          // console.log($('#search_info').data('id'));
        })
        // '검색후 팝업창 > 오류시'에만 해당 내용으로 바꿔주시기 바랍니다.
        // $('.confirm_message') 안에 '존재하지 않는 이메일입니다. 다시 검색해 주세요.'문구 변경 바랍니다.
      })
    })
    
    $('.popup-box div[class*=alert_complete] .btn_ok').click(function() {
      let teacher_id = $('#search_info').data('id');
      let url = '<?php echo base_url(); ?>center/teacher/join';
      let data = [];
      data['teacher_id'] = teacher_id;
      send_post(data, url, true, '', null)
    })
    
    // case-time 클릭 이벤트
    $('.case-time').click(function(){
      $('.schedule_detail').toggle();
    })
  
    add_menu_active('teacher');
    get_page('teacher_list', '<?php echo base_url(); ?>center/teacher/list?page=1', false);
    
    // btn_select 클릭 이벤트
    $('.btn_select').on('click',function(){
      let $selected = $('.move-origin option:selected');
      let clone = $selected.clone();
      $selected.remove();
      $('.move-sel').append(clone);
    })
    // btn_delete 클릭 이벤트
    $('.btn_delete').on('click',function(){
      let $selected = $('.move-sel option:selected');
      let clone = $selected.clone();
      $selected.remove();
      $('.move-origin').append(clone);
    })
  
    /* ======= 활성/비활성화 기능 Error 개선 + 활성 select 선택시 비활성 select 배경색 제거 도움 부탁드립니다. */
    // btn_delete 비활성화
    $('.move-origin option').click(function(){
      //$('.btn_select').on('click').css('background','transparent');
      let $selected = $('.move-origin option:selected');
      let point = $selected.prop('selected');
      $('.btn_delete').css('background','#e0e0e0');
    })
    // btn_select 비활성화
    $('.move-sel option').click(function(){
      //$('.btn_delete').on('click').css('background','transparent');
      let $selected = $('.move-sel option:selected');
      let point = $selected.prop('selected');
      $('.btn_select').css('background','#e0e0e0');
    })
  
    // 팝업 btn_sel 클릭 이벤트
    $('#btn_sel').on('click',function(){
      let $selected = $('#move-org option:selected');
      let clone = $selected.clone();
      $selected.remove();
      $('#left-sel').append(clone);
    })
    // 팝업 btn_del 클릭 이벤트
    $('#btn_del').on('click',function(){
      let $selected = $('#left-sel option:selected');
      let clone = $selected.clone();
      $selected.remove();
      $('#move-org').append(clone);
    })
  
    // 팝업 btn_del 비활성화
    $('#move-org option').click(function(){
      //$('.btn_select').on('click').css('background','transparent');
      let $selected = $('#move-org option:selected');
      let point = $selected.prop('selected');
      $('#btn_del').css('background','#e0e0e0');
    })
    // 팝업 btn_sel 비활성화
    $('#left-sel option').click(function(){
      //$('.btn_delete').on('click').css('background','transparent');
      let $selected = $('#left-sel option:selected');
      let point = $selected.prop('selected');
      $('#btn_sel').css('background','#e0e0e0');
    })
  
    // book_modify 클릭 이벤트
    $('.book_modify').click(function(){
      $('.popup-box').show();
      $('div[class$=schedule]').show();
    })
  
    // book_modify button[class*=":fn_"] 클릭 이벤트
    $('.button[class*=":fn_"]').click(function(){
//        $('div[class$=schedule]').hide();
//        $('.popup-box').hide();
      $('div[class*=alert_]').show();
    })
  
    // book_remove 클릭 이벤트
    $('.book_remove').click(function(){
      var index = $('.book_remove').index(this);
      $(this).closest('.detail_status').remove();
      $('.case-time .time-class').eq(index).remove();
    })
  
    // fn_remove 클릭시 팝업 호출
    $('button[class$=fn_remove]').click(function(){
    
      /*
          두 팝업 중 서버에서 내용에 따라
          한 가지만 수정하는 것이면 remove_this를,
          중복 내용 수정이면 remove_repeat만 열리도록 수정 부탁드립니다.
      */
    
      $('div[class$=this]').show();
      $('div[class$=repeat]').show();
    })
  
    // fn_save 클릭시 팝업 호출
    $('button[class$=fn_save]').click(function(){
    
      /*
          두 팝업 중 서버에서 내용에 따라
          한 가지만 수정하는 것이면 remove_this를,
          중복 내용 수정이면 remove_repeat만 열리도록 수정 부탁드립니다.
      */
    
      $('div[class$=this]').show();
      $('div[class$=repeat]').show();
    
      /*
         // theme:alert_remove_this 팝업 글귀
         삭제 -> 수정으로 변경
         // theme:alert_remove_repeat 팝업 글귀
         삭제 -> 수정으로 변경
      */
    })
  
    // btn_close 클릭 이벤트
    $('.btn_close').click(function(){
      $(this).closest('div[class$=_complete]').hide();
      $('.popup-box').hide();
    })
  
    // btn_ok, cancel 클릭 이벤트
    $('button[class^=btn_ok]').click(function(){
      $(this).closest('div[class*=alert_]').hide();
      $('div[class*=alert_]').hide();
      $('div[class$=schedule]').hide();
      $('.popup-box').hide();
    })
    $('button[class^=btn_cancel]').click(function(){
      $(this).closest('div[class*=alert_]').hide();
      $('div[class*=alert_]').hide();
      $('div[class$=schedule]').hide();
      $('.popup-box').hide();
    })
  
  });
 
  let teacher_ids = [];
  function get_teacher_ids() {
    let idx = 0;
    teacher_ids = [];
    $.each($('#teacher_list .table_body').find('input[type=checkbox]'), function(i, v) {
      if ($(v).prop('checked')) {
        teacher_ids[idx] = $(v).data('id');
        console.log(teacher_ids[idx]);
        idx++;
      }
    });
  }
</script>
