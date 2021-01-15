<h2 class="boxwrap__type meaning">강사 / 스케줄</h2>
<div class="boxwrap__info">
  <div class="info--tit">
    <a href="#" class="tit_theme" id="teacher_mgr">
      강사 관리
      <div class="theme_arrow">
        <img src="<?php echo base_url().'template/back/center'; ?>/imgs/icon_next.png" width="6" height="auto">
        <img src="<?php echo base_url().'template/back/center'; ?>/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">
      </div>
    </a>
    <a href="#" class="tit_theme" id="schedule_mgr">
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
        <div class="schedule_register ticket_name shadow_md" style="position: relative;">
          <button class="btn_save btn_val btn_rg" style="top: 28px; right: 20px;" onclick="register_schedule()">저장</button>
          <p class="schedule_tit1 register_tit tit-lg">스케줄 등록</p>
          <dl class="register_area clearfix" style="margin: 0;">
            <dt class="area_tit">날짜</dt>
            <dd class="area_data clearfix">
              <div class="data_box">
                <div class="data_function">
                  <div class="container">
                    <div class="form-group">
                      <div class='input-group date datetimepicker1' id='start_date'>
                        <input type='text' class="form-control" />
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <span class="data_hyphen">-</span>
                <div class="data_function">
                  <div class="container">
                    <div class="form-group">
                      <div class='input-group date datetimepicker1' id='end_date'>
                        <input type='text' class="form-control" />
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                      </div>
                    </div>
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
                          <div class='input-group date datetimepicker3' id='start_time'>
                            <input type='text' class="form-control" />
                            <span class="input-group-addon">
                              <span class="glyphicon glyphicon-time"></span>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <span class="data_hyphen">-</span>
                <div class="data_function">
                  <div class="container">
                    <div class="row">
                      <div class='col-sm-6'>
                        <div class="form-group">
                          <div class='input-group date datetimepicker3' id='end_time'>
                            <input type='text' class="form-control" />
                            <span class="input-group-addon">
                              <span class="glyphicon glyphicon-time"></span>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </dd>
            <dt class="area_tit">반복</dt>
            <dd class="area_data" style="height: 34px">
              <div class="data_box">
                <div class="chkbox_line" id="weekly">
                  <label class="form-chk col_sp">
                    <input type="checkbox" name="number" data-target="1">
                    월요일
                  </label>
                  <label class="form-chk col_sp">
                    <input type="checkbox" name="number" data-target="2">
                    화요일
                  </label>
                  <label class="form-chk col_sp">
                    <input type="checkbox" name="number" data-target="3">
                    수요일
                  </label>
                  <label class="form-chk col_sp">
                    <input type="checkbox" name="number" data-target="4">
                    목요일
                  </label>
                  <label class="form-chk col_sp">
                    <input type="checkbox" name="number" data-target="5">
                    금요일
                  </label>
                  <label class="form-chk col_sp">
                    <input type="checkbox" name="number" data-target="6">
                    토요일
                  </label>
                  <label class="form-chk col_sp">
                    <input type="checkbox" name="number" data-target="0">
                    일요일
                  </label>
                </div>
              </div>
           </dd>
            <dt class="area_tit">강사</dt>
            <dd class="area_data">
              <div class="data_box">
                <div class="teacher_select clearfix" id="teach">
                  <div class="selbox-wrap">
                    <select id="selbox">
                      <? foreach ($teachers as $teacher) { ?>
                        <option value="<?= $teacher->teacher_id; ?>"><?= $teacher->name; ?></option>
                      <? } ?>
                      <option value="-1" class="direct">직접입력</option>
                    </select>
                    <div class="selbox-arrow">
                      <img src="<?php echo base_url().'template/back/center'; ?>/imgs/icon_down.png" width="12" class="arrow_down">
                      <img src="<?php echo base_url().'template/back/center'; ?>/imgs/icon_up.png" width="12" style="display: none;" class="arrow_up">
                    </div>
                    <input type="text" id="selboxDirect" placeholder="강사명 입력" style="display: none; padding: 0 10px;">
                  </div>
                  <div class="selbox-name">
                    <p>수업명</p>
                    <input type="text" placeholder="" class="name_form" id="schedule_title">
                  </div>
                </div>
              </div>
            </dd>
            <dt class="area_tit tit_ex">예약기능</dt>
            <dd class="area_data">
              <div class="data_box">
                <div class="teacher_book clearfix">
                  <label class="book-chk form-chk">
                    <input checked="" type="checkbox" id="schedule-reservable" name="number">
                    회원 예약기능 사용
                  </label>
                  <div class="book-function" style="">
                    <div class="book-ticket">
                      <p style="line-height: 1.5;">예약가능 수강권</p>
                      <div class="book-select" id="ticket_candidate" style="height: auto">
                        <div class="book_type">운영 중인 수강권</div>
                        <select name="tickets[]" multiple="multiple" size="6" style="height: 100px;">
                          <? foreach ($tickets as $ticket) { ?>
                            <option value="<?= $ticket->ticket_id; ?>"><?= $ticket->ticket_title; ?></option>
                          <? } ?>
                        </select>
                      </div>
                      <div class="book-btn">
                        <button class="btn_select">
                          <img src="https://dev.foundy.me/template/back/center/icon_next.png" width="6" height="auto">
                        </button>
                        <button class="btn_delete">
                          <img src="https://dev.foundy.me/template/back/center/icon_prev.png" width="6" height="auto">
                        </button>
                      </div>
                      <div class="book-move" id="ticket_choice" style="height: auto;">
                        <div class="book_type">예약 가능 수강권</div>
                        <select name="tickets[]" multiple="multiple" size="6" style="height: 100px;" class="move-sel">
                        </select>
                      </div>
                      <!-- 스타일 추가 -->
                      <style>
                        #whole a {
                          text-decoration: none;
                          color: inherit;
                        }
                        #whole a:hover {
                          text-decoration: none;
                          font-weight: bold;
                        }
                        #whole .id_current {
                          border-bottom: 1px solid #f3efee;
                          box-sizing: border-box;
                        }
                        #whole .header {
                          border-bottom: 1px solid #f3efee;
                        }
                        #whole .header h1 {
                          margin: 5px 16px 0 0;
                        }
                        #whole .header .logo_home {
                          text-align: center;
                        }
                        #whole .header .logo_home img {
                          padding: 0;
                        }
                        .book_type {
                          height: 28px;
                          border-bottom: 1px solid #ccc;
                          background: #fcfafa;
                          color: #757575;
                          text-align: center;
                          font-size: 10px;
                          line-height: 28px;
                          box-sizing: border-box;
                        }
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
              
                        /* ================= !!! 스타일 추가 및 수정 !!! ================= */
                        .gray_txt {
                          color: #bdbdbd !important;
                        }
                        .book-function,
                        /*.a1box, .a2box,*/
                        dt[class^="centerBook"],
                        dd[class^="centerBook"] {
                          display: none;
                        }
                        .selbox-name p {
                          margin-right: 22px;
                        }
                        .name_form {
                          width: 78%;
                        }
                        .tit_ex {
                          line-height: 1.5;
                          margin: 1px 0 0;
                        }
                        #center_time {
                          width: 132%;
                          margin: 20px 0;
                        }
                        #center_time .ready-chk {
                          width: 31.8%;
                        }
                        .ready-chk {
                          color: #333;
                          float: left;
                          width: 42%;
                          height: 32px;
                          line-height: 32px;
                        }
                        .timebox_a {
                          float: left;
                          width: auto;
                          line-height: 32px;
                        }
                        .set-chk {
                          width: 120px;
                          color: #333;
                          float: left;
                          margin-right: 0;
                        }
                        .start_time {
                          width: 80px;
                          margin: 0 4px;
                        }
                        .timewrap p {
                          margin-bottom: 8px;
                        }
                        .timewrap p:last-child {
                          margin-bottom: 0;
                        }
                        .book_wd {
                          display: inline-block;
                          width: 107px;
                        }
                        .book-limit p {
                          height: 32px;
                          line-height: 32px;
                        }
                        .book-limit input {
                          margin-right: 8px;
                        }
                        .book-select select, .book-move select {
                          padding: 4px 8px;
                        }
              
                        /* 태블릿 698 */
                        @media(min-width: 600px){
                          .book-function > div > p {
                            width: 48px;
                          }
                          .book-start p:last-child {
                            width: 300px;
                          }
                          .book-select, .book-move {
                            width: 80px !important;
                          }
                          .timewrap p {
                            font-size: 13.5px;
                          }
                          .time_sp {
                            font-size: 13.5px;
                            word-break: keep-all;
                            width: 80%;
                          }
                          .time_sp span:last-child {
                            margin-top: 6px;
                          }
                          .book-function > div > p,
                          .book-function .book-limit p {
                            font-size: 13.5px;
                          }
                        }
              
                        @media(min-width:888px){
                          .name_form {
                            width: 82%;
                          }
                          .book-select, .book-move {
                            width: 90px !important;
                          }
                          .book-function > div > p {
                            width: 20.4%;
                            margin: 0;
                          }
                          .book-function .book-limit p {
                            width: 35.9%;
                            margin: 0;
                          }
                        }
              
                        /* 태블릿 968 */
                        @media(min-width: 968px){
                          .book-function > div > p {
                            line-height: 1.5;
                            width: 18.8%;
                          }
                          .book-select, .book-move {
                            width: 96px !important;
                          }
                          .book-function .book-limit p {
                            width: 33.1%;
                          }
                          .book_wd {
                            width: 111px;
                          }
                          .time_sp {
                            width: auto;
                            font-size: 14px;
                          }
                          .timewrap p,
                          .book-function > div > p,
                          .book-function .book-limit p {
                            font-size: 14px;
                          }
                          .time_sp span:last-child {
                            margin-top: 0;
                          }
                        }
              
                        @media(min-width: 1025px){
                          .book_type {
                            font-size: 12px;
                          }
                          .area_tit {
                            width: 12%;
                          }
                          .area_data {
                            width: 88%;
                          }
                          .data_box {
                            width: 82.5%;
                          }
                          .book-function > div > p {
                            width: 21.4%;
                          }
                          .book-limit {
                            width: 104%;
                          }
                          .book-function .book-limit p {
                            width: 36%;
                            line-height: 32px;
                          }
                          .book-select, .book-move {
                            width: 140px !important;
                          }
                          .book-ticket {
                            max-width: 590px;
                          }
                          .book-limit {
                            max-width: 351px;
                          }
                          .a1box {
                            max-width: 282px;
                          }
                          .a2box {
                            max-width: 392px;
                          }
                          .wait_type {
                            max-width: 338px;
                          }
                        }
                      </style>
          
                    </div>
                    <!--                    <div class="book-start">-->
                    <!--                      <p>예약 / 취소 가능 시간 : 수업 시작-->
                    <!--                        <span class="start_time" style="width: 80px;">-->
                    <!--                          <input type="number" min="1" max="48" placeholder="" value="1" class="form_time" id="reservable_hour">-->
                    <!--                        </span> 시간-->
                    <!--                        <span class="start_time" style="width: 80px;">-->
                    <!--                          <input type="number" min="0" max="60" placeholder="" value="0" class="form_time" id="reservable_min">-->
                    <!--                        </span> 분 이전까지-->
                    <!--                      </p>-->
                    <!--                    </div>-->
                    <div class="book-limit">
                      <p>예약정원</p>
                      <input type="number" min="1" max="100" id="reservable_number" value="1" style="width: 80px;">
                      <p class="limit_count">명</p>
                    </div>
                  </div>
                </div>
              </div>
            </dd>
            <dt class="centerBook area_tit tit_ex" style="margin-top: 8px; word-break: keep-all;">예약가능 시간</dt>
            <dd class="centerBook area_data clearfix">
              <!-- 태그 클래스 추가 -->
              <div class="data_box">
                <!-- 스케줄 등록 즉시 예약 오픈 -->
                <div id="center_schedule" class="clearfix">
                  <label class="wait_chk form-chk ready-chk" id="ready-soon">
                    <input checked type="checkbox" id="open-immediate" data-role="immediate" name="number">
                    스케줄 등록 즉시 예약 오픈
                  </label>
                  <div class="timebox_a a1box clearfix">
                    <div class="timewrap">
                      <p id="sch_bookEnd">예약 마감 시간 : 수업
                        <span class="start_time">
                          <input type="number" min="0" max="12" class="form_time" id="reserve_close_hour_0" value="0">
                        </span>
                        시간 전까지
                      </p>
                      <p id="sch_cancelActive">취소 가능 시간 : 수업
                        <span class="start_time">
                          <input type="number" min="0" max="12" class="form_time" id="reserve_cancel_close_hour_0" value="0">
                        </span>
                        시간 전까지
                      </p>
                    </div>
                  </div>
                </div>
                <!-- 예약 시간 설정 -->
                <div id="center_time" class="clearfix">
                  <label class="wait_chk form-chk ready-chk gray_txt" id="ready-time">
                    <input type="checkbox" id="open-immediate2" data-role="immediate" name="number">
                    예약 시간 설정
                  </label>
                  <div class="timebox_a a2box clearfix" style="display: none;">
                    <div class="timewrap">
                      <p id="time_bookStart" class="time_sp">예약 시작 시간 : 수업
                        <span class="start_time">
                          <input type="number" min="0" max="30" class="form_time" id="reserve_open_day_1" value="0">
                        </span>일
                        <span class="start_time">
                          <input type="number" min="0" max="23" class="form_time" id="reserve_open_hour_1" value="0">
                        </span>시간 전까지
                      </p>
                      <p id="time_bookEnd">예약 마감 시간 : 수업
                        <span class="start_time">
                          <input type="number" min="0" max="48" class="form_time" id="reserve_close_hour_1" value="0">
                        </span>시간 전까지
                      </p>
                      <p id="time_cancelActive" class="time_sp">취소 시작 시간 : 수업
                        <span class="start_time">
                          <input type="number" min="0" max="30" class="form_time" id="reserve_cancel_open_day_1" value="0">
                        </span>일
                        <span class="start_time">
                          <input type="number" min="0" max="23" class="form_time" id="reserve_cancel_open_hour_1" value="0">
                        </span>시간 전까지
                      </p>
                      <p id="time_bookEnd">취소 마감 시간 : 수업
                        <span class="start_time">
                          <input type="number" min="0" max="48" class="form_time" id="reserve_cancel_close_hour_1" value="0">
                        </span>시간 전까지
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </dd>
            <!-- 예약대기 -->
            <dt class="centerBook area_tit">예약대기</dt>
            <dd class="centerBook area_data">
              <div class="data_box">
                <div class="wait_wrap clearfix" style="width: 100%; font-size: 0; height: 32px; line-height: 32px;">
                  <label class="wait_chk book-chk form-chk" style="color: #333; float: left;">
                    <input type="checkbox" id="schedule-wait" name="number">
                    예약대기
                  </label>
                  <div class="wait_type" style="width: 58%; float: left; display: none;">
                    <p style="display: inline-block; color: #616161; font-size: 14px; font-weight: normal; line-height: 32px;"><span class="book_wd">예약대기 인원</span>
                      <span style="display: inline-block; margin: 0 12px;">
                        <input type="number" min="1" max="100" class="name_form" id="waitable_number" value="1" style="width: 80px;">
                      </span>명
                    </p>
                  </div>
                </div>
              </div>
            </dd>
            <!-- 예약기능 클릭 script -->
            <script>
              $(document).ready(function(){
                $('#schedule-reservable').removeAttr('checked');
      
                $('#schedule-reservable').click(function(){
                  let chk = $('#schedule-reservable').prop('checked');
                  // console.log(chk);
        
                  if(chk == true){
                    $('.book-function').show();
                    $('dt[class^=centerBook]').show();
                    $('dd[class^=centerBook]').show();
                  }
                  else {
                    $('.book-function').hide();
                    $('dt[class^=centerBook]').hide();
                    $('dd[class^=centerBook]').hide();
                  }
                })
      
                $('#open-immediate').click(function(){
                  let open = $('#open-immediate').prop('checked');
                  // console.log(open);
        
                  if(open === true){
                    $('.a1box').show();
                    $('.a2box').hide();
                    $('#open-immediate2').prop('checked',false);
                    // $('#open-immediate2').attr('disabled',true);
                    $('#center_time #ready-time').addClass('gray_txt');
                    $('#center_schedule #ready-soon').removeClass('gray_txt');
                  }
                  else {
                    $('.a1box').hide();
                    $('.a2box').show();
                    $('#open-immediate2').prop('checked',true);
                    // $('#open-immediate2').attr('disabled',false);
                    $('#center_time #ready-time').removeClass('gray_txt');
                    $('#center_schedule #ready-soon').addClass('gray_txt');
                  }
                })
      
                $('#open-immediate2').click(function(){
                  let open = $('#open-immediate2').prop('checked');
                  // console.log(open);
        
                  if(open === true){
                    $('.a1box').hide();
                    $('.a2box').show();
                    $('#open-immediate').prop('checked',false);
                    // $('#open-immediate').attr('disabled',true);
                    $('#center_schedule #ready-soon').addClass('gray_txt');
                    $('#center_time #ready-time').removeClass('gray_txt');
                  }
                  else {
                    $('.a1box').show();
                    $('.a2box').hide();
                    $('#open-immediate').prop('checked',true);
                    // $('#open-immediate').attr('disabled',false);
                    $('#center_time #ready-time').addClass('gray_txt');
                    $('#center_schedule #ready-soon').removeClass('gray_txt');
                  }
                })
              })
            </script>
          </dl>
        </div>
        <div class="schefule_status ticket_name shadow_md">
          <p class="schedule_tit1 register_tit tit-lg">스케줄 현황</p>
          <div class="schedule_detail" id="schedule_list" style="display: none;">
           <!-- schedule list -->
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
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<div class="popup-box" style="display: none">
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
  <div class="popup theme:schedule scroll-y" id="popSchedule" style="display: none; border-radius: 4px">
    <!-- schedule edit -->
  </div>
  
  <div class="popup theme:alert_remove_this" id="popScheduleRemove">
    <div class="popup_cnt">
      <div class="guide_box confirm_box" style="padding-top: 36px; margin-bottom: 16px;">
        <img src="<?php echo base_url(); ?>template/back/center/imgs/exclamation_mark.png" alt="" width="40" height="40" class="guide_icon">
        <p class="confirm_message" style="line-height: 40px">해당 스케줄을 <strong>취소</strong>하시겠습니까?</p>
      </div>
      <p class="confirm_message" style="line-height: 1.75;width: 250px;font-size: 13px;margin: 0 auto;color: #9e9e9e; padding: 0;">
        현재 클래스 예약/대기를 포함해서 지난 클래스 참석이 취소될 수 있습니다!
      </p>
      <div class="confirm_btn">
        <button class="btn_cancel font-futura" onclick="close_schedule_remove_popup()">CANCEL</button>
        <button class="btn_ok font-futura" onclick="unregister_schedule()">OK</button>
      </div>
    </div>
  </div>
  <div class="popup theme:alert_remove_this" id="popScheduleEdit">
    <div class="popup_cnt">
      <div class="guide_box confirm_box" style="padding-top: 36px; margin-bottom: 16px;">
        <img src="<?php echo base_url(); ?>template/back/center/imgs/information_mark.png" alt="" width="40" height="40" class="guide_icon">
        <p class="confirm_message" style="line-height: 40px">해당 스케줄을 <strong>수정</strong>하시겠습니까?</p>
      </div>
      <p class="confirm_message" style="line-height: 1.75;width: 250px;font-size: 13px;margin: 0 auto;color: #9e9e9e; padding: 0;">
        예약정원/대기인원 수정 시 예약현황이 변경될 수 있습니다!
      </p>
      <div class="confirm_btn">
        <button class="btn_cancel font-futura" onclick="close_popScheduleEdit()">CANCEL</button>
        <button class="btn_ok font-futura" onclick="schedule_edit()">OK</button>
      </div>
    </div>
  </div>
  <!--
  <div class="popup theme:alert_remove_repeat">
    <div class="popup_cnt">
      <div class="guide_box confirm_box">
        <img src="<?php //echo base_url(); ?>template/back/center/imgs/exclamation_mark.png" alt="" width="40" height="40" class="guide_icon">
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
  -->
  <!-- 예약현황 클릭 팝업 -->
  <div class="popup theme:alert_situation pop:situation scroll-y" id="schedule_status" style="display: none; height: 534px !important; margin-top: -267px !important; width: 736px !important; margin-left: -368px !important;">
    <!-- schedule status -->
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
 
  /*
  .theme\:schedule {
    width: 656px;
    height: 592px;
    position: absolute;
    
    left: 50%;
    top: 50%;
    margin-left: -328px;
    margin-top: -296px;
  }
   */
  
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
  let day = <?php echo $day; ?>;
  let last_day = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
  function get_schedule_calendar(where) {
    month += where;
    if (month > 12) {
      year += 1;
      month = 1;
    } else if (month < 1) {
      year -= 1;
      month = 12;
    }
    if (day > last_day[month - 1]) {
      day = last_day[month - 1];
    }
    let date = year + '-' + (month < 10 ? '0' + month : month) + '-' + (day < 10 ? '0' + day: day);
    let text_date = year + '.' + (month < 10 ? '0' + month : month) + '.' + (day < 10 ? '0' + day: day);
    $('#month_no').text(text_date.substr(0, 7));
    $('#focus_date').text(text_date);
    get_page('schedule_calendar', '<?php echo base_url(); ?>center/teacher/schedule/calendar?y=' + year + '&m=' + month + '&d=' + date, false);
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
    
    <? if ($tab == 'schedule') { ?>
    $('#schedule_mgr').click();
    <? } else { ?>
    $('#teacher_mgr').click();
    <? } ?>
    
    // selbox-wrap 이벤트
    $(function(){
      $("#selboxDirect").hide();
      $("#selbox").change(function() {
        if($("#selbox").val() === "-1") {
          // $("#selboxDirect").val('');
          $("#selboxDirect").show();
          $("#teach").css("margin-bottom", "48px");
        }
        else {
          $("#selboxDirect").hide();
          $("#teach").css("margin-bottom", "24px");
        }
      })
      /* ================= change 이벤트 추가 ================= */
      // // selcnt 전환 이벤트
      // $(".selDirect").hide();
      // $(".selcnt").change(function() {
      //   if($(".selcnt").val() == "direct") {
      //     $(".selDirect").show();
      //     $("#teach").css("margin-bottom", "48px");
      //   }
      //   else {
      //     $(".selDirect").hide();
      //     $("#teach").css("margin-bottom", "24px");
      //   }
      // })
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
        // console.log(reservable);
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
      <? if ($tab == 'schedule') { ?>
      <? } else { ?>
      // 첫번째 목록의 콘텐츠만 보이게!
      $('.tit_theme:first').addClass('reverse_color');
      $('.tit_theme:first').find('.next_white').show().prev().hide();
      $('.info--contents > section').hide();
      $('.info--contents > section:first').show();
      
      // 첫번째 목록의 테이블만 보이게!
      $('.table-list').hide();
      $('.table-list:first').show();
      $('.no-indicator:first').addClass('btn_click');
      <? } ?>
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
    // $('.popup-box').children().hide();
    
    /* 팝업창 닫기이벤트 */
    // 윈도우 ESC버튼 팝업닫기
    // $(window).keyup(function(e){
    //   if(e.keyCode === 27){
    //     $(".popup-box").fadeOut();
    //     $('.popup-box').children().hide();
    //   }
    // })
    
    // 윈도우 클릭시 팝업닫기
    // $(window).click(function(e){
    //   var target = e.target.className;
    //
    //   if(target === 'popup-box'){
    //     $('.popup-box').fadeOut();
    //     $('.popup-box').children().hide();
    //   }
    // })
  
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
      let $selected = $('#ticket_candidate option:selected');
      let clone = $selected.clone();
      $selected.remove();
      $('#ticket_choice select').append(clone);
    })
    // btn_delete 클릭 이벤트
    $('.btn_delete').on('click',function(){
      let $selected = $('#ticket_choice option:selected');
      let clone = $selected.clone();
      $selected.remove();
      $('#ticket_candidate select').append(clone);
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
    // $('.btn_close').click(function(){
    //   $(this).closest('div[class$=_complete]').hide();
    //   $('.popup-box').hide();
    // })
  
    // btn_ok, cancel 클릭 이벤트
    // $('button[class^=btn_ok]').click(function(){
    //   $(this).closest('div[class*=alert_]').hide();
    //   $('div[class*=alert_]').hide();
    //   $('div[class$=schedule]').hide();
    //   $('.popup-box').hide();
    // })
    // $('button[class^=btn_cancel]').click(function(){
    //   $(this).closest('div[class*=alert_]').hide();
    //   $('div[class*=alert_]').hide();
    //   $('div[class$=schedule]').hide();
    //   $('.popup-box').hide();
    // })
    
    $('#open-immediate, #open-wait').click(function() {
      let role = $(this).data('role');
      let checked = $(this).prop('checked');
      let immediate = $('#open-immediate');
      let wait = $('#open-wait');
      let reserve_open = $('#reserve_open_hour');
      let reserve_close = $('#reserve_close_hour');
      
      if (role === 'wait') {
        if (checked) {
          immediate.prop('checked', false);
          wait.prop('checked', true);
          reserve_open.prop('disabled', false);
          reserve_open.removeClass('bg_grey');
          reserve_close.prop('disabled', false);
          reserve_close.removeClass('bg_grey');
        } else {
          immediate.prop('checked', true);
          wait.prop('checked', false);
          reserve_open.prop('disabled', true);
          reserve_open.addClass('bg_grey');
          reserve_close.prop('disabled', true);
          reserve_close.addClass('bg_grey');
        }
      } else {
        if (checked) {
          immediate.prop('checked', true);
          wait.prop('checked', false);
          reserve_open.prop('disabled', true);
          reserve_open.addClass('bg_grey');
          reserve_close.prop('disabled', true);
          reserve_close.addClass('bg_grey');
        } else {
          immediate.prop('checked', false);
          wait.prop('checked', true);
          reserve_open.prop('disabled', false);
          reserve_open.removeClass('bg_grey');
          reserve_close.prop('disabled', false);
          reserve_close.removeClass('bg_grey');
        }
      }
    });
  
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
  
  $('#start_date').datepicker({
    format: "yyyy-mm-dd",
    autoclose: true,
    todayHighlight: true, // 오늘에 하이라이트
    language: "ko",
    title: '스케줄 시작일자',
  }).on('changeDate', function(e) {
    let start_date = $(this).datepicker('getDate');
    let end_date = new Date();
    // console.log(e.format());
    // console.log(start_date.getDate() + reservable_duration - 1);
    end_date.setDate(start_date.getDate() + 365);
    $('#end_date').datepicker('setDate', start_date);
    $('#end_date').datepicker('setStartDate', start_date);
    $('#end_date').datepicker('setEndDate', end_date);
  });
  $('#end_date').datepicker({
    format: "yyyy-mm-dd",
    autoclose: true,
    todayHighlight: true, // 오늘에 하이라이트
    language: "ko",
    title: '스케줄 종료일자',
  });
  $('#start_time').datetimepicker({
    format: "LT",
    // title: '스케줄 시작시간',
  }).on('changeTime', function(e) {
  });
  $('#end_time').datetimepicker({
    format: "LT",
    // title: '스케줄 종료시간',
  });
  
  function register_schedule(id) {
    let url = '<?php echo base_url()."center/teacher/schedule/register"; ?>';
    
    let tickets = [];
    $.each($('#ticket_choice').find('option'), function(i,v){
      // console.log($(v).val());
      // console.log($(v).text());
      tickets[i] = $(v).val();
    });
  
    // let weekly = [0,0,0,0,0,0,0];
    let weekly = [];
    $.each($('#weekly').find('input[type=checkbox]:checked'), function(i,v){
      console.log($(v).data('target'));
      // weekly[$('v').data('target')] = 1;
      weekly[i] = $(v).data('target');
    });
    
    let data = [];
    data['start_date'] = $('#start_date').find('input').val();
    data['end_date'] = $('#end_date').find('input').val();
    data['weeklys'] = JSON.stringify(weekly);
    data['start_time'] = $('#start_time').find('input').val();
    data['end_time'] = $('#end_time').find('input').val();
    data['teacher_id'] = parseInt($('#selbox').find('option:selected').val());
    data['teacher_name'] = $('#selboxDirect').val();
    data['schedule_title'] = $('#schedule_title').val();
    data['reservable'] = $('#schedule-reservable').prop('checked') ? 1 : 0;
    data['reservable_number'] = parseInt($('#reservable_number').val());
    data['tickets'] = JSON.stringify(tickets);
    data['open_immediate'] = $('#open-immediate').prop('checked') ? 1 : 0;
    if (data['open_immediate']) {
      data['reserve_open_hour'] = 0;
      data['reserve_close_hour'] = parseInt($('#reserve_close_hour_0').val());
      data['reserve_cancel_open_hour'] = 0;
      data['reserve_cancel_close_hour'] = parseInt($('#reserve_cancel_close_hour_0').val());
    } else {
      data['reserve_open_hour'] = parseInt($('#reserve_open_day_1').val()) * 24 + parseInt($('#reserve_open_hour_1').val());
      data['reserve_close_hour'] = $('#reserve_close_hour_1').val();
      data['reserve_cancel_open_hour'] = parseInt($('#reserve_cancel_open_day_1').val()) * 24 + parseInt($('#reserve_cancel_open_hour_1').val());
      data['reserve_cancel_close_hour'] = $('#reserve_cancel_close_hour_1').val();
    }
    data['waitable'] = $('#schedule-wait').prop('checked') ? 1 : 0;
    data['waitable_number'] = $('#waitable_number').val();
    
    // console.log(data);
  
    let start_date = data['start_date'];
    send_post_data(data, url, function() {
      $.notify({
        message: '성공하였습니다.',
        icon: 'fa fa-check'
      }, {
        type: 'success',
        timer: 1000,
        delay: 2000,
        animate: {
          enter: 'animated lightSpeedIn',
          exit: 'animated lightSpeedOut'
        }
      });
      let _y = start_date.substr(0, 4);
      let _m = start_date.substr(5, 2);
      let _d = start_date.substr(8, 2);
      setTimeout(function() {window.location = '<?= base_url(); ?>center/teacher?t=schedule&y=' + _y + '&m=' + _m + '&d=' + _d;}, 1000);
    });
  }
</script>
