<?php
function get_ampm($time)
{
  return ($time < '12:00:00' ? 'AM' : 'PM');
}
function get_time($time)
{
  return ($time <= '12:00:00' ? substr($time, 0, 5) : substr(date('H:i:s', strtotime($time) - 12 * ONE_HOUR), 0, 5));
}
?>
<div class="popup_cnt">
  <div class="schedule_register ticket_name shadow_md">
    <p class="schedule_tit1 register_tit tit-lg">스케줄 수정</p>
    <dl class="register_area clearfix">
      <dt class="area_tit">시간</dt>
      <dd class="area_data" style="margin-bottom: 28px;">
        <div class="data_box" style="width: 100%;">
          <div class="data_function">
            <div class="container">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="input-group date datetimepicker3" id="start_time2">
                      <input type="text" class="form-control"
                      value="<?= get_time($schedule_info->start_time); ?> <?= get_ampm($schedule_info->start_time); ?>">
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
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="input-group date datetimepicker3" id="end_time2">
                      <input type="text" class="form-control"
                      value="<?= get_time($schedule_info->end_time); ?> <?= get_ampm($schedule_info->end_time); ?>">
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
      <dt class="area_tit">강사</dt>
      <dd class="area_data">
        <div class="data_box" style="width: 100%;">
          <div class="teacher_select t_select clearfix" id="teach2" style="margin-bottom: 14px;">
            <div class="selbox-wrap" id="selwrap2" style="width: 27%; margin-right: 7%;">
              <select id="selbox2" class="selcnt" style="width:100%; height: 32px; padding: 0 10px; line-height: 32px;">
                <? foreach ($teachers as $teacher) { ?>
                  <option <? if ($schedule_info->teacher_id == $teacher->teacher_id) echo 'selected'; ?>
                    value="<?= $teacher->teacher_id; ?>">
                    <?= $teacher->name; ?>
                  </option>
                <? } ?>
                <option <? if ($schedule_info->teacher_id == -1) echo 'selected'; ?>
                  value="-1" class="direct">
                  직접입력
                </option>
              </select>
              <div class="selbox-arrow">
                <img src="https://dev.foundy.me/template/back/center/imgs/icon_down.png" width="12" class="arrow_down">
                <img src="https://dev.foundy.me/template/back/center/imgs/icon_up.png" width="12" style="display: none;" class="arrow_up">
              </div>
              <input type="text" id="selboxDirect2" placeholder="강사명 입력" value="<? if($schedule_info->teacher_id == -1) echo $schedule_info->teacher_name; ?>"
                     style="padding: 0px 10px; height: 32px; line-height: 32px; margin: 6px 0;" class="selDirect">
            </div>
            <div class="selbox-name" style="width: 66%;">
              <p>수업명</p>
              <input value="<?= $schedule_info->schedule_title; ?>"
                     id="schedule_title2" type="text" placeholder="text box" class="name_form" style="width: 85%;">
            </div>
          </div>
        </div>
      </dd>
      <style type="text/css">
        .theme\:schedule {
          width: 656px;
          height: 592px;
          position: absolute;
          
          left: 50%;
          top: 50%;
          margin-left: -328px;
          margin-top: -296px;
        }
        .theme\:schedule {
          width: 750px;
          margin-left: -375px;
        }
        .theme\:schedule .area_tit {
          width: 68px;
          margin-bottom: 0;
        }
        .theme\:schedule .register_area {
          margin: 0;
        }
        .theme\:schedule dd {
          width: calc(100% - 76px);
        }
        .theme\:schedule .data-function {
          width: 47%;
        }
        .theme\:schedule .area_data .col_sp {
          width: 14.28%;
        }
        .theme\:schedule .form-chk {
          width: 34%;
        }
        .theme\:schedule .book-chk {
          margin-right: 0;
        }
        .theme\:schedule .book-function > div,
        .theme\:schedule .data_box {
          width: 100%;
        }
        .theme\:schedule .book-function > div > p {
          width: 30.3%;
        }
        .theme\:schedule .book-function .book-limit p {
          width: 36.1%;
        }
        .theme\:schedule .book-select,
        .theme\:schedule .book-move {
          width: 125px !important;
        }
        .theme\:schedule .book-function,
        .theme\:schedule .a1box,
        .theme\:schedule .a2box {
          width: 66%;
        }
      </style>
      <dt class="area_tit tit_ex">예약기능</dt>
      <dd class="area_data">
        <div class="data_box">
          <div class="teacher_book clearfix">
            <label class="book-chk form-chk">
              <input type="checkbox" id="schedule-reservable2" name="number">
              회원 예약기능 사용
            </label>
            <div class="book-function" style="">
              <div class="book-ticket">
                <p style="line-height: 1.5;">예약가능 수강권</p>
                <div class="book-select" id="ticket_candidate2" style="height: auto">
                  <div class="book_type">운영 중인 수강권</div>
                  <select name="tickets[]" multiple="multiple" size="6" style="height: 100px;">
                    <? foreach ($tickets as $ticket) {
                    if (in_array($ticket->ticket_id, $schedule_info->tickets) == false) {
                      ?>
                      <option value="<?= $ticket->ticket_id; ?>"><?= $ticket->ticket_title; ?></option>
                    <? }
                    } ?>
                  </select>
                </div>
                <div class="book-btn">
                  <button class="btn_select2" style="margin-bottom: 8px;">
                    <img src="https://dev.foundy.me/template/back/center/icon_next.png" width="6" height="auto">
                  </button>
                  <button class="btn_delete2" style="background-color: #e0e0e0;" disabled>
                    <img src="https://dev.foundy.me/template/back/center/icon_prev.png" width="6" height="auto">
                  </button>
                </div>
                <div class="book-move" id="ticket_choice2" style="height: auto;">
                  <div class="book_type">예약 가능 수강권</div>
                  <select name="tickets[]" multiple="multiple" size="6" style="height: 100px;" class="move-sel">
                    <? foreach ($tickets as $ticket) {
                      if (in_array($ticket->ticket_id, $schedule_info->tickets) == true) {
                      ?>
                        <option value="<?= $ticket->ticket_id; ?>"><?= $ticket->ticket_title; ?></option>
                    <? }
                    } ?>
                  </select>
                </div>
              </div>
              <div class="book-limit">
                <p>예약정원</p>
                <input type="number" min="1" max="100" id="reservable_number2"
                       value="<?= $schedule_info->reservable_number; ?>" style="width: 80px;">
                <p class="limit_count">명</p>
              </div>
            </div>
          </div>
        </div>
      </dd>
      <dt class="centerBook area_tit tit_ex" style="margin-top: 8px; word-break: keep-all;">예약가능 시간</dt>
      <dd class="centerBook area_data clearfix">
        <div class="data_box">
          <div id="center_schedule2" class="clearfix">
            <label class="wait_chk form-chk ready-chk" id="ready-soon2">
              <input type="checkbox" id="open-immediateA" data-role="immediate" name="number">
              스케줄 등록 즉시 예약 오픈
            </label>
            <div class="timebox_a a1box a1boxT clearfix">
              <div class="timewrap">
                <p id="sch_bookEnd">예약 마감 시간 : 수업
                  <span class="start_time">
                    <input type="number" min="0" max="12" class="form_time" id="reserve_close_hour_00"
                           value="<?= $schedule_info->open_immediate ? $schedule_info->reserve_close_hour : 12; ?>">
                  </span>
                  시간 전까지
                </p>
                <p id="sch_cancelActive">취소 가능 시간 : 수업
                  <span class="start_time">
                    <input type="number" min="0" max="12" class="form_time" id="reserve_cancel_close_hour_00"
                           value="<?= $schedule_info->open_immediate ? $schedule_info->reserve_cancel_close_hour : 12; ?>">
                  </span>
                  시간 전까지
                </p>
              </div>
            </div>
          </div>
          <!-- 예약 시간 설정 -->
          <div id="center_time2" class="clearfix" style="width: 100%;">
            <label class="wait_chk form-chk ready-chk gray_txt" id="ready-time2" style="width: 34%;">
              <input type="checkbox" id="open-immediateB" data-role="immediate" name="number">
              예약 시간 설정
            </label>
            <div class="timebox_a a2box a2boxT clearfix" style="display: none;">
              <div class="timewrap">
                <p id="time_bookStart" class="time_sp">예약 시작 시간 : 수업
                  <span class="start_time">
                    <input type="number" min="0" max="30" class="form_time" id="reserve_open_day_11"
                           value="<?= $schedule_info->open_immediate == false ? (int)($schedule_info->reserve_open_hour / 24) : 7; ?>">
                  </span>일
                  <span class="start_time">
                    <input type="number" min="0" max="23" class="form_time" id="reserve_open_hour_11"
                           value="<?= $schedule_info->open_immediate == false ? $schedule_info->reserve_open_hour % 24 : 6; ?>">
                  </span>시간 전까지
                </p>
                <p id="time_bookEnd">예약 마감 시간 : 수업
                  <span class="start_time">
                    <input type="number" min="0" max="48" class="form_time" id="reserve_close_hour_11"
                           value="<?= $schedule_info->open_immediate == false ? $schedule_info->reserve_close_hour : 12; ?>">
                  </span>시간 전까지
                </p>
                <p id="time_cancelActive" class="time_sp">취소 시작 시간 : 수업
                  <span class="start_time">
                    <input type="number" min="0" max="30" class="form_time" id="reserve_cancel_open_day_11"
                           value="<?= $schedule_info->open_immediate == false ? (int)($schedule_info->reserve_cancel_open_hour / 24) : 7; ?>">
                  </span>일
                  <span class="start_time">
                    <input type="number" min="0" max="23" class="form_time" id="reserve_cancel_open_hour_11"
                           value="<?= $schedule_info->open_immediate == false ? $schedule_info->reserve_cancel_open_hour % 24 : 6; ?>">
                  </span>시간 전까지
                </p>
                <p id="time_bookEnd">취소 마감 시간 : 수업
                  <span class="start_time">
                    <input type="number" min="0" max="48" class="form_time" id="reserve_cancel_close_hour_11"
                           value="<?= $schedule_info->open_immediate == false ? $schedule_info->reserve_cancel_close_hour : 12; ?>">
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
            <label class="wait_chk book-chk form-chk" style="color: #333; float: left; margin-right: 0;">
              <input type="checkbox" id="schedule-wait2" name="number">
              예약대기
            </label>
            <div class="wait_type" id="wait_type2" style="width: 58%; float: left; display: none;">
              <p style="display: inline-block; color: #616161; font-size: 14px; font-weight: normal; line-height: 32px;"><span class="book_wd">예약대기 인원</span>
                <span style="display: inline-block; margin: 0 12px;">
                  <input type="number" min="1" max="100" class="name_form" id="waitable_number2"
                         value="<?= $schedule_info->waitable ? $schedule_info->waitable_number : 1; ?>" style="width: 80px;">
                </span>명
              </p>
            </div>
          </div>
        </div>
      </dd>
    </dl>
  </div>
  <div class="btn_wrap">
    <button class="btn_wth btn_val btn_rg theme:fn_save" onclick="open_popScheduleEdit()">저장</button>
    <button class="btn_wth btn_val btn_rg theme:fn_cancel" onclick="close_popSchedule()">취소</button>
  </div>
</div>
<script>
  $(function(){
    $('#schedule-reservable2').removeAttr('checked');
    
    $('#schedule-reservable2').click(function(){
      let chk = $('#schedule-reservable2').prop('checked');
      // console.log(chk);
      
      if(chk === true){
        // console.log(1);
        $('#popSchedule .book-function').show();
        $('#popSchedule dt[class^=centerBook]').show();
        $('#popSchedule dd[class^=centerBook]').show();
        
        $('.popup-box').css('overflow-y','scroll');
      }
      else {
        $('#popSchedule .book-function').hide();
        $('#popSchedule dt[class^=centerBook]').hide();
        $('#popSchedule dd[class^=centerBook]').hide();
        
        $('.popup-box').css('overflow-y','auto');
      }
    })
  
    <? if ($schedule_info->teacher_id == -1) { ?>
    $("#selboxDirect2").show();
    $("#teach2").css("margin-bottom", "48px");
    <? } else { ?>
    $("#selboxDirect2").hide();
    $("#teach2").css("margin-bottom", "14px");
    <? } ?>
    $("#selbox2").change(function() {
      if($("#selbox2").val() === "-1") {
        // $("#selboxDirect2").val('');
        $("#selboxDirect2").show();
        $("#teach2").css("margin-bottom", "48px");
      }
      else {
        $("#selboxDirect2").hide();
        $("#teach2").css("margin-bottom", "14px");
      }
    })
    <? if ($schedule_info->reservable) { ?>
    $('#schedule-reservable2').click();
    <? } ?>
    $('#schedule-reservable2').prop('disabled', true);
  
    // btn_select2 클릭 이벤트
    $('.btn_select2').on('click',function(){
      let $selected = $('#ticket_candidate2 option:selected');
      let clone = $selected.clone();
      $selected.remove();
      $('#ticket_choice2 select').append(clone);
    })
  
    $('#open-immediateA').click(function(){
      let open = $('#open-immediateA').prop('checked');
      // console.log(open);
      
      if(open === true){
        $('.a1boxT').show();
        $('.a2boxT').hide();
        $('#open-immediateB').prop('checked',false);
        // $('#open-immediate2').attr('disabled',true);
        $('#center_time2 #ready-time2').addClass('gray_txt');
        $('#center_schedule2 #ready-soon2').removeClass('gray_txt');
      }
      else {
        $('.a1boxT').hide();
        $('.a2boxT').show();
        $('#open-immediateB').prop('checked',true);
        // $('#open-immediate2').attr('disabled',false);
        $('#center_time2 #ready-time2').removeClass('gray_txt');
        $('#center_schedule2 #ready-soon2').addClass('gray_txt');
      }
    })
    
    $('#open-immediateB').click(function(){
      let open = $('#open-immediateB').prop('checked');
      // console.log(open);
      
      if(open === true){
        $('.a1boxT').hide();
        $('.a2boxT').show();
        $('#open-immediateA').prop('checked',false);
        // $('#open-immediate2').attr('disabled',true);
        $('#center_time2 #ready-time2').removeClass('gray_txt');
        $('#center_schedule2 #ready-soon2').addClass('gray_txt');
      }
      else {
        $('.a1boxT').show();
        $('.a2boxT').hide();
        $('#open-immediateA').prop('checked',true);
        // $('#open-immediate2').attr('disabled',false);
        $('#center_time2 #ready-time2').addClass('gray_txt');
        $('#center_schedule2 #ready-soon2').removeClass('gray_txt');
      }
    })
    <? if ($schedule_info->open_immediate) { ?>
    $('#open-immediateA').click();
    <? } else { ?>
    $('#open-immediateB').click();
    <? } ?>
    
    $('#schedule-wait2').click(function(){
      let display = $('#wait_type2').css('display');
      if(display === 'none'){
        $('#wait_type2').show();
      }
      else {
        $('#wait_type2').hide();
      }
    })
    <? if ($schedule_info->waitable) { ?>
    $('#schedule-wait2').click();
    <? } ?>
    
    $('#start_time2').datetimepicker({
      format: 'LT'
    });
    $('#end_time2').datetimepicker({
      format: 'LT'
    });
  })

  function open_popScheduleEdit(id) {
    $('.popup-box').show();
    $('#popScheduleEdit').show();
  }
  function close_popScheduleEdit() {
    $('.popup-box').hide();
    $('#popScheduleEdit').hide();
  }
  function close_popSchedule() {
    $('.popup-box').hide();
    $('div[class$=schedule]').hide();
  }
  function schedule_edit() {
    let id = <?= $schedule_info->schedule_info_id; ?>;
    let url = '<?php echo base_url()."center/teacher/schedule/edit/do"; ?>';
    
    // console.log(id);
  
    let tickets = [];
    $.each($('#ticket_choice2').find('option'), function(i,v){
      // console.log($(v).val());
      // console.log($(v).text());
      tickets[i] = $(v).val();
    });
  
    let data = [];
    data['id'] = id;
    data['start_time'] = $('#start_time2').find('input').val();
    data['end_time'] = $('#end_time2').find('input').val();
    data['teacher_id'] = parseInt($('#selbox2').find('option:selected').val());
    data['teacher_name'] = $('#selboxDirect2').val();
    data['schedule_title'] = $('#schedule_title2').val();
    data['reservable'] = $('#schedule-reservable2').prop('checked') ? 1 : 0;
    data['reservable_number'] = parseInt($('#reservable_number2').val());
    data['tickets'] = JSON.stringify(tickets);
    data['open_immediate'] = $('#open-immediateA').prop('checked') ? 1 : 0;
    if (data['open_immediate']) {
      data['reserve_open_hour'] = 0;
      data['reserve_close_hour'] = parseInt($('#reserve_close_hour_00').val());
      data['reserve_cancel_open_hour'] = 0;
      data['reserve_cancel_close_hour'] = parseInt($('#reserve_cancel_close_hour_00').val());
    } else {
      data['reserve_open_hour'] = parseInt($('#reserve_open_day_11').val()) * 24 + parseInt($('#reserve_open_hour_11').val());
      data['reserve_close_hour'] = $('#reserve_close_hour_11').val();
      data['reserve_cancel_open_hour'] = parseInt($('#reserve_cancel_open_day_11').val()) * 24 + parseInt($('#reserve_cancel_open_hour_11').val());
      data['reserve_cancel_close_hour'] = $('#reserve_cancel_close_hour_11').val();
    }
    data['waitable'] = $('#schedule-wait2').prop('checked') ? 1 : 0;
    data['waitable_number'] = $('#waitable_number2').val();
  
    // console.log(data);
    //
    send_post_data(data, url, function(data) {
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
      // console.log(data);
      
      // let target_reserve_status = $('#reserve_status_' + id)
      // let target_wait_status = $('#wait_status_' + id)
      // let reservable = parseInt(data.class.reservable);
      // let reservable_number = parseInt(data.class.reservable_number);
      // let reserve_count = parseInt(data.class.reserve_count);
      // let waitable = parseInt(data.class.waitable);
      // let waitable_number = parseInt(data.class.waitable_number);
      // let wait_count = parseInt(data.class.wait_count);
      // if (reservable === 1) {
      //   target_reserve_status.text('예약 ' + reserve_count + ' / ' + reservable_number);
      //   target_reserve_status.show();
      // } else {
      //   target_reserve_status.text('');
      //   target_reserve_status.hide();
      // }
      // if (waitable === 1) {
      //   target_wait_status.text('대기 ' + wait_count + ' / ' + waitable_number);
      //   target_wait_status.show();
      // } else {
      //   target_wait_status.text('');
      //   target_wait_status.hide();
      // }
      close_popSchedule();
     
      let start_date = '<?= $schedule_info->schedule_date; ?>?';
      let _y = start_date.substr(0, 4);
      let _m = start_date.substr(5, 2);
      let _d = start_date.substr(8, 2);
      setTimeout(function() {window.location = '<?= base_url(); ?>center/teacher?t=schedule&y=' + _y + '&m=' + _m + '&d=' + _d;}, 1000);
    });
  }
</script>
