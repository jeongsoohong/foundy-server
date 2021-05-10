<h2 class="boxwrap__type meaning">스케줄</h2>
<div class="boxwrap__info">
  <div class="info--tit">
    <a href="#" class="tit_theme" id="schedule_mgr">
      스케줄 관리
      <div class="theme_arrow">
        <img src="<?= base_url(); ?>template/back/center/imgs/icon_next.png" width="6" height="auto">
        <img src="<?= base_url(); ?>template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">
      </div>
    </a>
    <a href="#" class="tit_theme" id="schedule_bookStatus" style="letter-spacing: -0.03em;">
      스케줄 예약현황
      <div class="theme_arrow">
        <img src="<?= base_url(); ?>template/back/center/imgs/icon_next.png" width="6" height="auto" style="">
        <img src="<?= base_url(); ?>template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">
      </div>
    </a>
  </div>
  <div class="info--contents scroll-y_hidden">
    <section class="contents_type contents_schedule scroll-y" style="display: none;">
      <h3 class="meaning">스케줄 관리</h3>
      <div class="type_wrap sch_wrap">
        <div class="type_box sch_register shadow">
          <p class="type_tit sch_tit">스케줄 등록</p>
          <button class="sch_btn btn_save" onclick="register_schedule()">저장</button>
          <dl class="type_detail sch_enroll clearfix">
            <dt class="area_tit">날짜</dt>
            <dd class="area_data">
              <div class="data_box clearfix">
                <div class="data_function">
                  <div class="container">
                    <div class="form-group">
                      <div class="input-group date datetimepicker1" id="start_date">
                        <input type="text" class="form-control">
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
                      <div class="input-group date datetimepicker1" id="end_date">
                        <input type="text" class="form-control">
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
              <div class="data_box clearfix">
                <div class="data_function">
                  <div class="container">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <div class="input-group date datetimepicker3" id="start_time">
                            <input type="text" class="form-control">
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
                          <div class="input-group date datetimepicker3" id="end_time">
                            <input type="text" class="form-control">
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
              <div class="data_box" style="height: inherit;">
                <div class="chkbox_line" id="weekly" style="height: inherit; line-height: 34px; ">
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
            <dd class="area_data" style="margin-bottom: 24px;">
              <div class="data_box">
                <div class="teacher_select clearfix" id="teach">
                  <div class="selbox-wrap">
                    <input disabled value="<?= $teacher->name; ?>" class="gray_bg" type="text" id="selboxDirect" placeholder="강사명 입력" style="padding: 0 10px;">
                  </div>
                  <div class="selbox-name">
                    <p>수업명</p>
                    <input type="text" placeholder="" class="name_form" id="schedule_title">
                  </div>
                </div>
              </div>
            </dd>
            <dt class="area_tit">클래스 분류</dt>
            <dd class="area_data class_data" style="height: 336px">
              <p class="data_limit" style="line-height: 1.75; padding: 5px 0; max-width: 540px;">사용자들이 원하는 수업을 모아 볼 수 있게 카테고리를 분류합니다. 클래스 분류는 최대 3개 까지 선택 가능합니다. 기타 카테고리를 여러개 등록시 공백(스페이스)로 구분해 주세요.</p>
              <div class="data_box" style="height: inherit;">
                <div class="stu_yoga" style="height: 196px; margin-bottom: 16px;">
                  <div class="class_chkbox">
                    <p class="tit_sm class_name">요가 클래스</p>
                    <div class="chkbox_line clearfix">
                      <?php
                      $count = 0;
                      $categories = $this->db->order_by('name', 'asc')->get_where('category_studio', array('type' => CENTER_TYPE_YOGA, 'activate' => 1))->result();
                      foreach ($categories as $category) {
                      $category_id = $category->category_id;
                      $name = $category->name;
                      $count++;
                      ?>
                      <label class="form-chk col_sp <?= (mb_strlen($name) >= 4 ? 'clip' : ''); ?>">
                        <input name="category_yoga" type="checkbox" value="<?php echo $name;?>" id="<?php echo $category_id; ?>"/>
                        <?php echo $name; ?>
                      </label>
                      <?php if ($count % 5 == 0) { ?>
                    </div>
                    <div class="chkbox_line clearfix">
                      <?php } ?>
                      <?php } ?>
                      <label class="form-chk col_sp" id="chk_other">
                        <input id="chkbox_yoga_etc" type="checkbox" name="number">
                        기타
                        <span class="write_padding">
                          <input type="text" class="chk_write" id="category_yoga_etc" name="category_yoga_etc" value=""/>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="stu_pilates">
                  <p class="tit_sm">필라테스 클래스</p>
                  <div class="class_chkbox">
                    <div class="chkbox_line clearfix">
                      <?php
                      $count = 0;
                      $categories = $this->db->order_by('name', 'asc')->get_where('category_studio', array('type' => CENTER_TYPE_PILATES, 'activate' => 1))->result();
                      foreach ($categories as $category) {
                      $category_id = $category->category_id;
                      $name = $category->name;
                      $count++;
                      ?>
                      <label class="form-chk col_sp <?= (mb_strlen($name) >= 4 ? 'clip' : ''); ?>">
                        <input name="category_pilates" type="checkbox" value="<?php echo $name;?>" id="<?php echo $category_id; ?>"/>
                        <?php echo $name; ?>
                      </label>
                      <?php if ($count % 5 == 0) { ?>
                    </div>
                    <div class="chkbox_line clearfix">
                      <?php } ?>
                      <?php } ?>
                      <label class="form-chk col_sp" id="chk_other">
                        <input id="chkbox_pilates_etc" type="checkbox" name="number">
                        기타
                        <span class="write_padding">
                          <input type="text" class="chk_write" id="category_pilates_etc" name="category_pilates_etc" value=""/>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </dd>
            <dt class="area_tit" style="line-height: 1.5; margin: 1px 0 0;">티켓팅 기능</dt>
            <dd class="area_data" style="margin-bottom: 24px;">
              <div class="data_box">
                <div class="go_ticket clearfix">
                  <label class="ticket-chk form-chk go-chk">
                      <input type="checkbox" id="ticketing" name="number"> 티켓팅 기능 사용
                  </label>
                  <div class="ticket-option">
                    <div class="option__account clearfix">
                      <label class="accountLabel">
                        <input type="checkbox" id="accountChk"> 입금계좌
                      </label>
                      <div class="ticket-send" id="send" style="display: none;">
                        <div class="sendInfo-account">
                          <p class="send-txt account-txt">무통장입금 입금은행</p>
                          <div class="account-how">
                            <p class="how_wrap clearfix">
                              <span class="how_bank">
                                <input type="text" style="width: 76px; margin-right: 8px;" id="bank_name">은행
                              </span>
                              <span class="how_account schAccount">
                                <input type="text" placeholder="계좌번호" id="bank_account_number">
                              </span>
                              <span class="how_holder">
                                <input type="text" placeholder="예금주명" id="bank_depositor">
                              </span>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="option__pay clearfix">
                      <label class="urlLabel gray_txt">
                        <input type="checkbox" id="urlChk"> 결제 URL
                      </label>
                      <p class="payGuide">현재 온라인 수업 결제를 별도 진행하는 곳 (N사 페이, P사 페이)이 있다면 사용가능합니다.</p>
                      <div class="pay--url" id="url">
                        <input type="text" class="form_time" id="payment_page" value="<?= $studio->payment_page; ?>" style="width: 100%;">
                      </div>
                    </div>
                    <div id="send3" style="margin-top: 20px;">
                      <div class="sendinfo-poptxt">
                        <p class="send-txt announce-txt">티켓팅 시 팝업 상세 문구</p>
                        <form class="addinfo_textbox" id="addinfo_textbox_1" style="display: none;">
                          <div class="remain_textarea">
                            <p>남은 글자 수
                              <span class="remain_text">
                                <strong class="remain_val" id="remain_val_1">
                                  100</strong>자
                              </span>
                            </p>
                          </div>
                          <textarea id="reserve_popup" class="about_textarea2" placeholder="'예약 후 00시간 이내 미입금 시 예약 취소됩니다' 혹은 '입금 순서대로 예약 확정 마감됩니다' 등 온라인 스튜디오의 예약 마감 및 정원에 대한 문구를 간단히 기재해주세요! (최대 100자)"><?= STUDIO_RESERVE_POPUP_QA1; ?></textarea>
                        </form>
                        <div class="choice__wrap" style="border-top: 1px solid #eee;">
                          <div class="choice">
                            <select class="choice--slc slcNo1">
                              <option value="qna--1"><?= STUDIO_RESERVE_POPUP_QA1; ?></option>
                              <option value="qna--2"><?= STUDIO_RESERVE_POPUP_QA2; ?></option>
                              <option value="qna--3"><?= STUDIO_RESERVE_POPUP_QA3; ?></option>
                              <option value="qna--direct1" class="qna--write">직접 입력</option>
                            </select>
<!--                            <input type="text" placeholder="티켓팅 시 팝업 상세 문구를 직접 입력해주세요" class="choice--write writebox1" style="display: none;">-->
                            <script>
                              $(function(){
                                // alert('준비되었습니다!');
                                $('.slcNo1').change(function(){
                                  let state = $('.slcNo1 option:selected').val();
                                  // console.log(state);
                                  // alert('sss');
                                  if(state === 'qna--direct1'){
                                    // alert('성공');
                                    $('#remain_val_1').text('100');
                                    $('#reserve_popup').val('');
                                    $('#addinfo_textbox_1').show();
                                  }
                                  else {
                                    $('#reserve_popup').val($('.slcNo1 option:selected').text());
                                    $('#addinfo_textbox_1').hide();
                                  }
                                })
                                $('.about_textarea2').on('keyup',function(){
                                  var input = $(this).val().length;
                                  var left = 100 - input;
                                  $('#remain_val_1').text(left);
    
                                  if($(this).val().length > 100) {
                                    alert("글자수는 100자 이내로 제한됩니다.");
                                    $(this).val($(this).val().substring(0,100));
                                    $('#remain_val_1').text(0);
                                    // left = 0;
                                  }
                                })
                              })
                            </script>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </dd>
            <dt class="centerBook area_tit" style="line-height: 1.5; margin: 1px 0 0; margin-top: 8px; word-break: keep-all; display: none;">수업료</dt>
            <dd class="centerBook area_data clearfix" style="display: none;">
              <div class="data_box">
                <div id="online_personnel" class="clearfix">
                  <div class="timewrap personnel" id="tuition">
                    <p>
                      <span class="start_time" style="width: 160px; margin-left: 0;">
                        <input type="number" class="form_time" id="class_price">
                      </span>
                      원
                    </p>
                  </div>
                </div>
              </div>
            </dd>
            <dt class="centerBook area_tit" style="line-height: 1.5; margin: 1px 0 0; margin-top: 8px; word-break: keep-all; display: none;">티켓팅 가능시간</dt>
            <dd class="centerBook area_data clearfix" id="sch_bookTime" style="display: none;">
              <!-- 태그 클래스 추가 -->
              <div class="data_box">
                <!-- 스케줄 등록 즉시 티켓팅 오픈 -->
                <div id="online_schedule" class="clearfix">
                  <label class="wait_chk form-chk ready-chk" id="ready-soon">
                    <input checked="" type="checkbox" id="open-immediate" data-role="immediate" name="number">
                    스케줄 등록 즉시 티켓팅 오픈
                  </label>
                  <div class="timebox_a a1box clearfix">
                    <div class="timewrap">
                      <p id="sch_bookEnd">예약 마감 시간 : 수업
                        <span class="start_time">
                          <input type="number" min="0" max="12" class="form_time" id="reserve_close_hour_0" value="0">
                        </span>
                        시간 전까지
                      </p>
                    </div>
                  </div>
                </div>
                <!-- 티켓팅 시간 설정 -->
                <div id="online_time" class="clearfix">
                  <label class="wait_chk form-chk ready-chk gray_txt" id="ready-time">
                    <input type="checkbox" id="open-immediate2" data-role="immediate" name="number">
                    티켓팅 시간 설정
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
                    </div>
                  </div>
                </div>
              </div>
            </dd>
            <dt class="centerBook area_tit" style="line-height: 1.5; margin: 0; word-break: keep-all; display: none;">티켓팅 확정인원
              <span class="txtGuide">최대 수업 정원</span>
            </dt>
            <dd class="centerBook area_data clearfix" style="display: none;">
              <!-- 태그 클래스 추가 -->
              <div class="data_box">
                <!-- 티켓팅 확정 인원 -->
                <div id="online_personnel" class="clearfix">
                  <div class="timewrap personnel" id="personnel">
                    <p>
                      <span class="start_time" style="margin-left: 0; width: 160px;">
                        <input type="number" class="form_time" id="reservable_number">
                      </span>
                      명
                    </p>
                  </div>
                </div>
              </div>
            </dd>
            <dt class="centerBook area_tit" style="line-height: 1.5; margin: 0; word-break: keep-all; letter-spacing: -0.03em; display: none;">입금 요청 최대 인원
              <span class="txtGuide">수업신청 가능한 최대 인원</span>
            </dt>
            <dd class="centerBook area_data clearfix" style="display: none;">
              <!-- 태그 클래스 추가 -->
              <div class="data_box">
                <!-- 입금 요청 최대 인원 -->
                <div id="online_maxPersonnel" class="clearfix">
                  <div class="timewrap personnel" id="maxPersonnel">
                    <p>
                      <span class="start_time" style="margin-left: 0; width: 160px;">
                        <input type="number" class="form_time" id="waitable_number">
                      </span>
                      명
                    </p>
                  </div>
                </div>
              </div>
            </dd>
            <dt class="centerBook area_tit stu_name" style="display: none;">수업 이미지 등록</dt>
            <dd class="centerBook area_data name_data add_photo photo_class" style="display: none;">
              <p class="data_limit img_guide">권장 이미지 사이즈는 1000 * 500 px, 이미지 용량은 최대 16MB까지 업로드 가능합니다.
                <br>노출되는 위치에 따라 이미지가 잘려 보일 수 있으므로 인물이 중앙에 위치한 사진을 추천드립니다.</p>
                <span class="img_guideTip">세로형 이미지는 이미지가 많이 잘리게 되어 가로형 이미지 혹은 정사각형 이미지를 올려주세요!</span>
              <label type="file" class="data_form file_form" style="min-width: 410px;">파일열기
                <span class="file_alert" style="color: #bdbdbd;">(사진 추가를 하지 않으면 온라인 스튜디오 메인이미지로 반영됩니다.)</span>
                <span class="file_arrow"></span>
                <input type="file" value="파일열기" id="class_image" onchange="profile_image_preview(this)">
                <script>
                  function profile_image_preview(target) {
                    preview_img(target, 'previewImg');
                    target = $('#use_teacher_image');
                    if (target.prop('checked') === true) {
                      target.click();
                    }
                  }
                  $(function(){
                    // file_arrow 호버 이벤트
                    $('.add_photo').hover(function(){
                      $(this).find('.file_arrow').css('transform','rotate(225deg)')
                        .addClass('arrow_hover');
                    },function(){
                      $(this).find('.file_arrow').css('transform','rotate(45deg)')
                        .removeClass('arrow_hover');
                    })
                    $('#chk_tuition').click(function(){
                      let display = $('#tuition').css('display');
                      if(display === 'none'){
                        $('#tuition').show();
                      }
                      else {
                        $('#tuition').hide();
                      }
                    })
                  })
                </script>
              </label>
              <div class="file_thumb" id="previewImg">
                <img src="" alt="" class="thumb_img">
              </div>
              <label class="form-chk col_sp" style="width: 100%; margin-top: 20px;">
                <input checked name="use_teacher_image" id="use_teacher_image" type="checkbox">
                강사 기본 이미지 사용
              </label>
            </dd>
            <script>
              $(function(){
                $('#use_teacher_image').click(function() {
                  if ($(this).prop('checked') === true) {
                    $('#previewImg').hide();
                  } else {
                    $('#previewImg').show();
                  }
                });
                $('#ticketing').removeAttr('checked');
                $('#ticketing').click(function(){
                  let chk = $('#ticketing').prop('checked');
                  // console.log(chk);
                  if(chk === true){
                    $('.ticket-option').show();
                    $('#send').show();
                    $('#url').hide();
                    <? if (isset($studio->payment_page) == true && empty($studio->payment_page) == false) { ?>
                    $('#urlChk').click();
                    <? } else { ?>
                    $('#accountChk').click();
                    <? } ?>
                    $('dt[class^=centerBook]').show();
                    $('dd[class^=centerBook]').show();
                  }
                  else {
                    $('.ticket-option').hide();
                    $('#send').hide();
                    $('#url').show();
                    $('dt[class^=centerBook]').hide();
                    $('dd[class^=centerBook]').hide();
                  }
                })
                
                $('#accountChk').click(function(){
                  let open = $('#accountChk').prop('checked');
                  // console.log(open);
    
                  if(open === true){
                    $('#send').show();
                    $('#url').hide();
                    $('#accountChk').prop('checked',true);
                    $('#urlChk').prop('checked',false);
      
                    $('.urlLabel').addClass('gray_txt');
                    $('.accountLabel').removeClass('gray_txt');
                  }
                  else {
                    $('#send').hide();
                    $('#url').show();
                    $('#accountChk').prop('checked',false);
                    $('#urlChk').prop('checked',true);
      
                    $('.urlLabel').removeClass('gray_txt');
                    $('.accountLabel').addClass('gray_txt');
                  }
                })
                $('#urlChk').click(function(){
                  let open = $('#urlChk').prop('checked');
                  // console.log(open);
    
                  if(open === true){
                    $('#send').hide();
                    $('#url').show();
                    $('#urlChk').prop('checked',true);
                    $('#accountChk').prop('checked',false);
      
                    $('.urlLabel').removeClass('gray_txt');
                    $('.accountLabel').addClass('gray_txt');
                  }
                  else {
                    $('#send').show();
                    $('#url').hide();
                    $('#urlChk').prop('checked',false);
                    $('#accountChk').prop('checked',true);
      
                    $('.urlLabel').addClass('gray_txt');
                    $('.accountLabel').removeClass('gray_txt');
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
                    $('#online_time #ready-time').addClass('gray_txt');
                    $('#online_schedule #ready-soon').removeClass('gray_txt');
                  }
                  else {
                    $('.a1box').hide();
                    $('.a2box').show();
                    $('#open-immediate2').prop('checked',true);
                    // $('#open-immediate2').attr('disabled',false);
                    $('#online_time #ready-time').removeClass('gray_txt');
                    $('#online_schedule #ready-soon').addClass('gray_txt');
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
                    $('#online_schedule #ready-soon').addClass('gray_txt');
                    $('#online_time #ready-time').removeClass('gray_txt');
                  }
                  else {
                    $('.a1box').show();
                    $('.a2box').hide();
                    $('#open-immediate').prop('checked',true);
                    // $('#open-immediate').attr('disabled',false);
                    $('#online_time #ready-time').addClass('gray_txt');
                    $('#online_schedule #ready-soon').removeClass('gray_txt');
                  }
                })
                // $('#reservable').click(function(){
                //   let display = $('#personnel').css('display');
                //   if(display === 'none'){
                //     $('#personnel').show();
                //   }
                //   else {
                //     $('#personnel').hide();
                //   }
                // })
                // $('#schedule-wait').click(function(){
                //   let display = $('#maxPersonnel').css('display');
                //   if(display === 'none'){
                //     $('#maxPersonnel').show();
                //   }
                //   else {
                //     $('#maxPersonnel').hide();
                //   }
                // })
              })
            </script>
          </dl>
        </div>
        <div class="type_box sch_status shadow">
          <p class="type_tit stu_tit">스케줄 현황</p>
          <div class="sch_detail" id="schedule_list">
            <!-- book_proceed (예약현황 5/10) 클릭 이벤트 -->
          </div>
          <div class="sch_date">
            <div class="date_month">
              <p class="month_no" id="month_no"><?= substr($date, 0, 7); ?></p>
              <div class="month_btns">
                <button class="btn_prev" onclick="get_schedule_calendar(-1)">
                  <img src="<?= base_url(); ?>template/back/center/imgs/icon_prev.png" width="6">
                </button>
                <button class="btn_next" onclick="get_schedule_calendar(1)">
                  <img src="<?= base_url(); ?>template/back/center/imgs/icon_next.png" width="6">
                </button>
              </div>
            </div>
            <p class="date_today" id="focus_date"><?= $date; ?></p>
          </div>
          <div class="sch_table" id="schedule_calendar">
            <!-- schedule calendar -->
          </div>
        </div>
      </div>
    </section>
    <section class="contents_type contents_schedule scroll-y">
      <h3 class="meaning">스케줄 관리</h3>
      <div class="type_wrap sch_wrap">
        <div class="type_box sch_status shadow">
          <div class="status_type_tit">
            <p class="type_tit">스케줄 예약현황</p>
            <div class="type_fn_sch fn_sch_wrap">
              <button class="sch__btn sch-filter-btn">
                <div class="seeAll-btn-div type:btn-div">
                  <p class="btn-tip-detail tip-detail-case detail-fontStyle">수업별 현황</p>
                </div>
                <div class="filter-class-icon txt-tip-icon">
                  <img src="<?= base_url(); ?>template/icon/ic_filter_class.png" alt="스케줄 전체 보기" width="19" height="13">
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
            <div class="filter-class-type shadow_sp" id="sch-filter-btn">
              <button class="type-chkArrow">
                <img src="<?= base_url(); ?>template/icon/ic_display_Arrow.png" width="11" height="9">
              </button>
              <input type="text" value="수업별 현황" data-action="class" class="type-cat-val type-cat-class" readonly>
              <input type="text" value="실시간 현황" data-action="time" class="type-cat-val type-cat-time" readonly>
            </div>
            <script>
              $(function(){
                // type-cat-class 호버
                $('.type-cat-val').hover(function(){
                  let action = $(this).data('action');
                  let set_spot = 0;
                  if(action === "class") {
                    set_spot = 0;
                  }
                  else if(action === "time") {
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
                  let val = $(this).val();
                  let action = $(this).data('action');
  
                  $(this).parent().hide();
                  $('div[class^="stuBook__"]').hide();
                  if(action === "class") {
                    $('#stuBook .stuBook__class').show();
                    $(this).parent().prev().find('.tip-detail-case').text(val);
                  }
                  else if(action === "time") {
                    reserve_list2_page = 0;
                    reserve_list2_date = '';
                    $('#schedule_status_detail2').html('');
                    get_reserve_list2();
                    $('#stuBook .stuBook__realTime').show();
                    $(this).parent().prev().find('.tip-detail-case').text(val);
                  }
                })
              })
            </script>
          </div>
          <div class="stuBook" id="stuBook">
            <!-- 수업별 현황 -->
            <div class="stuBook__class" style="display: none;">
              <p class="class--inStatus">수업별 현황</p>
              <div class="class--inOpt type_fn_sch">
                <button class="sch__btn sch-search-btn" onclick="fn_searchSch();">
                  <div class="search-btn-wrap">
                    <div class="search-btn-div type:btn-div">
                      <p class="btn-tip-detail">스케줄 검색</p>
                    </div>
                    <div class="search-btn-icon txt-tip-icon">
                      <img src="<?= base_url(); ?>template/icon/ic_search_sch.png" alt="스케줄 검색" width="17" height="16">
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
                    <img src="<?= base_url(); ?>template/icon/ic_see_allSch.png" alt="스케줄 전체 보기" width="15" height="16">
                  </div>
                  <script>
                    function fn_seeAll() {
                      //  검색결과 숨김, Upcoming Zoom 15개 호출
                      get_schedule_list2();
                    }
                  </script>
                </button>
              </div>
              <!-- 스케줄 검색 팝업 -->
              <div class="class--inSearch search-btn-pop pop:searchSch" style="display: none;">
                <p class="searchSch_example">‘ 연/월/일 ’의 6자리로 검색해주세요.</p>
                <div class="searchSch_term">
                  <input type="number" id="schedule_date2" placeholder="ex) 21년 4월 5일 -> 210405" class="term_search_tip">
                  <button class="term_search_btn" onclick="get_schedule_list2('d')">
                    <img src="<?= base_url(); ?>template/icon/ic_pop_searchSch.png" alt="스케줄 검색" width="16" height="16">
                  </button>
                </div>
              </div>
              <div class="class--inList sch_detail" id="schedule_list2">
                <!-- class list -->
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
                      <table class="table-list" style="display: table; border: 0;">
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
                        <!-- real time schedule list -->
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
                    </div>
                  </div>
                </div>
                <button class="detail_table_more" onclick="get_reserve_list2();">MORE</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<div class="popup-box" style="overflow: scroll; display: none;">
  <div class="popup theme:alert_remove_this" id="popScheduleRemove" style="display: none;">
    <div class="popup_cnt">
      <div class="guide_box confirm_box" style="padding-top: 36px; margin-bottom: 16px;">
        <img src="<?= base_url(); ?>template/back/center/imgs/exclamation_mark.png" alt="" width="40" height="40" class="guide_icon">
        <p class="confirm_message" style="line-height: 40px">해당 스케줄을 <strong>취소</strong>하시겠습니까?</p>
      </div>
      <p class="confirm_message" style="line-height: 1.75;width: 250px;font-size: 13px;margin: 0 auto;color: #9e9e9e;">현재 클래스 예약/대기를 포함해서 지난 클래스 참석이 취소될 수 있습니다!</p>
      <div class="confirm_btn">
        <button class="btn_cancel font-futura" onclick="close_schedule_remove_popup()">CANCEL</button>
        <button class="btn_ok font-futura" onclick="unregister_schedule()">OK</button>
      </div>
    </div>
  </div>
  <div class="popup theme:alert_remove_this" id="popScheduleEdit" style="display: none;">
    <div class="popup_cnt">
      <div class="guide_box confirm_box" style="padding-top: 36px; margin-bottom: 16px;">
        <img src="<?= base_url(); ?>template/back/center/imgs/information_mark.png" alt="" width="40" height="40" class="guide_icon">
        <p class="confirm_message" style="line-height: 40px">해당 스케줄을 <strong>수정</strong>하시겠습니까?</p>
      </div>
      <p class="confirm_message" style="line-height: 1.75;width: 250px;font-size: 13px;margin: 0 auto;color: #9e9e9e;">예약정원/대기인원 수정 시 예약현황이 변경될 수 있습니다!</p>
      <div class="confirm_btn">
        <button class="btn_cancel font-futura" id="confirm_cancel">CANCEL</button>
        <button class="btn_ok font-futura" id="confirm_ok">OK</button>
        <script>
          $(function(){
            $('#confirm_cancel').click(function(){
              $('#popScheduleEdit').hide();
            });
            $('#confirm_ok').click(function(){
              update_schedule();
            })
          })
        </script>
      </div>
    </div>
  </div>
  <!-- 스케줄 수정 팝업 -->
  <div class="popup theme:schedule scroll-y" id="popScheduleRewrite" style="display: none; width: 900px; margin-left: -450px;">
  </div>
  <!-- 예약현황 클릭 팝업 -->
  <div class="popup theme:alert_situation pop:situation sch_status scroll-y" id="schedule_status" style="display: none;width: 862px !important; margin-left: -431px !important;">
    <p class="situation_tit">예약 현황</p>
    <button class="situation_close" onclick="fn_close();">
      <img src="<?= base_url(); ?>template/front/header/imgs/icon_close_black.png" width="12" height="12" alt="닫기" style="opacity: 0.2;">
      <!-- popup_box, pop:history 닫기 -->
      <script>
        function fn_close() {
          $('.popup-box').hide().children('#schedule_status').hide();
        }
      </script>
    </button>
    <div class="situation_detail" id="schedule_status_detail">
      <!-- 예약 현황 -->
    </div>
  </div>
  <!-- 실시간 예약현황 수업링크발송 '발송' 클릭 팝업 -->
  <div class="popup theme:sendZoom" id="send-zoom-link" style="display: none;">
    <div class="sendConts sendZoomBox" style="height: 620px;">
      <button class="situation_close" onclick="fn_close_zoom2();">
        <img src="<?= base_url(); ?>template/front/header/imgs/icon_close_black.png" width="12" height="12" alt="닫기" style="opacity: 0.2;">
        <!-- popup_box, pop:history 닫기 -->
        <script>
          function fn_close_zoom2() {
            $('.popup-box').hide().children('#send-zoom-link').hide();
          }
          function fn_open_zoom2(id) {
            get_page('zoom2', '<?php echo base_url(); ?>studio/schedule/status3?id='+id, false, function() {
              $('.popup-box').show().children('#send-zoom-link').show();
            });
          }
        </script>
      </button>
      <div class="detail_zoom" id="zoom2">
      </div>
    </div>
  </div>
</div>
<script>
  
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
    get_page('schedule_calendar', '<?php echo base_url(); ?>studio/schedule/calendar?y=' + year + '&m=' + month + '&d=' + date, false);
  }
  $(function() {
    get_schedule_calendar(0);
  });
  

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
  
  function register_schedule() {
    let url = '<?php echo base_url()."studio/schedule/register"; ?>';
  
    let weekly = [];
    $.each($('#weekly').find('input[type=checkbox]:checked'), function(i,v){
      console.log($(v).data('target'));
      weekly[i] = $(v).data('target');
    });
  
    let data = [];
    data['start_date'] = $('#start_date').find('input').val();
    data['end_date'] = $('#end_date').find('input').val();
    data['weeklys'] = JSON.stringify(weekly);
    data['start_time'] = $('#start_time').find('input').val();
    data['end_time'] = $('#end_time').find('input').val();
    data['teacher_name'] = $('#selboxDirect').val();
    data['schedule_title'] = $('#schedule_title').val();
    data['ticketing'] = $('#ticketing').prop('checked') ? 1 : 0;
    // data['reservable'] = $('#reservable').prop('checked') ? 1 : 0;
    data['reservable'] = 1;
    data['reservable_number'] = parseInt($('#reservable_number').val() === '' ? 0 : $('#reservable_number').val());
    data['open_immediate'] = $('#open-immediate').prop('checked') ? 1 : 0;
    if (data['open_immediate']) {
      data['reserve_open_hour'] = 0;
      data['reserve_close_hour'] = parseInt($('#reserve_close_hour_0').val());
      data['reserve_cancel_open_hour'] = 0;
      data['reserve_cancel_close_hour'] = 0;
      // data['reserve_cancel_close_hour'] = parseInt($('#reserve_cancel_close_hour_0').val());
    } else {
      data['reserve_open_hour'] = parseInt($('#reserve_open_day_1').val()) * 24 + parseInt($('#reserve_open_hour_1').val());
      data['reserve_close_hour'] = $('#reserve_close_hour_1').val();
      data['reserve_cancel_open_hour'] = 0;
      // data['reserve_cancel_open_hour'] = parseInt($('#reserve_cancel_open_day_1').val()) * 24 + parseInt($('#reserve_cancel_open_hour_1').val());
      data['reserve_cancel_close_hour'] = 0;
      // data['reserve_cancel_close_hour'] = $('#reserve_cancel_close_hour_1').val();
    }
    // data['waitable'] = $('#schedule-wait').prop('checked') ? 1 : 0;
    data['waitable'] = 1;
    data['waitable_number'] = $('#waitable_number').val();
    
    data['use_bank'] = $('#accountChk').prop('checked') ? 1 : 0;
    data['bank_name'] = $('#bank_name').val();
    data['bank_account_number'] = $('#bank_account_number').val();
    data['bank_depositor'] = $('#bank_depositor').val();
    data['reserve_popup'] = $('#reserve_popup').val();
    data['payment_page'] = $('#payment_page').val();
    // data['use_class_price'] = $('#chk_tuition').prop('checked') ? 1 : 0;
    data['class_price'] = $('#class_price').val();
    
    if (data['class_price'] === '') {
      data['class_price'] = 0;
    }
    
    let class_image = '';
    let use_teacher_image = $('#use_teacher_image').prop('checked') === true ? 1 : 0;
    let target = $('#class_image');
    if (target.val() !== '') {
      class_image = target[0].files[0];
    } else {
      if (use_teacher_image === 0) {
        alert('클래스 이미지 사용을 위해서는 사진파일을 등록해주십시요!!')
        return false;
      }
    }
    data['use_teacher_image'] = use_teacher_image;
    data['class_image'] = class_image;
  
    let category_yoga = [];
    let category_yoga_etc = '';
    let category_pilates = [];
    let category_pilates_etc = '';
  
    $.each($('.stu_yoga').find("[name='category_yoga']"), function(index, item) {
      if ($(item).prop('checked') === true) {
        category_yoga.push($(item).val());
      }
    });
    $.each($('.stu_pilates').find("[name='category_pilates']"), function(index, item) {
      if ($(item).prop('checked') === true) {
        category_pilates.push($(item).val());
      }
    });
  
    if ($('#chkbox_yoga_etc').prop('checked') === true) {
      category_yoga_etc = $('#category_yoga_etc').val();
    }
    if ($('#chkbox_pilates_etc').prop('checked') === true) {
      category_pilates_etc = $('#category_pilates_etc').val();
    }
  
    data['category_yoga'] = JSON.stringify(category_yoga);
    data['category_yoga_etc'] = category_yoga_etc;
    data['category_pilates'] = JSON.stringify(category_pilates);
    data['category_pilates_etc'] = category_pilates_etc;
    
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
      setTimeout(function() {window.location = '<?= base_url(); ?>studio/schedule?t=schedule&y=' + _y + '&m=' + _m + '&d=' + _d;}, 1000);
    });
  }

  let update_id = 0;
  let update_start_date = '';
  function update_schedule() {
   
    if (update_id === 0) {
      alert('비정상 실행입니다!');
      return false;
    }
    
    let url = '<?php echo base_url()."studio/schedule/update"; ?>';
    let data = [];
    data['id'] = update_id;
    data['start_time'] = $('#start_time2').find('input').val();
    data['end_time'] = $('#end_time2').find('input').val();
    data['teacher_name'] = $('#selboxDirect2').val();
    data['schedule_title'] = $('#schedule_title2').val();
    data['ticketing'] = $('#ticketing2').prop('checked') ? 1 : 0;
    // data['reservable'] = $('#reservable2').prop('checked') ? 1 : 0;
    data['reservable'] = 1;
    data['reservable_number'] = parseInt($('#reservable_number2').val() === '' ? 0 : $('#reservable_number2').val());
    data['open_immediate'] = $('#open-immediateA').prop('checked') ? 1 : 0;
    if (data['open_immediate']) {
      data['reserve_open_hour'] = 0;
      data['reserve_close_hour'] = parseInt($('#reserve_close_hour_00').val());
      data['reserve_cancel_open_hour'] = 0;
      data['reserve_cancel_close_hour'] = 0;
      // data['reserve_cancel_close_hour'] = parseInt($('#reserve_cancel_close_hour_0').val());
    } else {
      data['reserve_open_hour'] = parseInt($('#reserve_open_day_11').val()) * 24 + parseInt($('#reserve_open_hour_11').val());
      data['reserve_close_hour'] = $('#reserve_close_hour_11').val();
      data['reserve_cancel_open_hour'] = 0;
      // data['reserve_cancel_open_hour'] = parseInt($('#reserve_cancel_open_day_1').val()) * 24 + parseInt($('#reserve_cancel_open_hour_1').val());
      data['reserve_cancel_close_hour'] = 0;
      // data['reserve_cancel_close_hour'] = $('#reserve_cancel_close_hour_1').val();
    }
    // data['waitable'] = $('#chk_maxPersonnel2').prop('checked') ? 1 : 0;
    data['waitable'] = 1;
    data['waitable_number'] = $('#waitable_number2').val();
  
    data['use_bank'] = $('#accountChk2').prop('checked') ? 1 : 0;
    data['bank_name'] = $('#bank_name2').val();
    data['bank_account_number'] = $('#bank_account_number2').val();
    data['bank_depositor'] = $('#bank_depositor2').val();
    data['reserve_popup'] = $('#reserve_popup2').val();
    data['payment_page'] = $('#payment_page2').val();
    // data['use_class_price'] = $('#chk_tuition').prop('checked') ? 1 : 0;
    data['class_price'] = $('#class_price2').val();
    
    if (data['class_price'] === '') {
      data['class_price'] = 0;
    }
  
    let class_image = '';
    let use_teacher_image = $('#use_teacher_image2').prop('checked') === true ? 1 : 0;
    let target = $('#imgInp2');
    if (target.val() !== '') {
      class_image = target[0].files[0];
    } else {
      if (use_teacher_image === 0) {
        // alert('클래스 이미지 사용을 위해서는 사진파일을 등록해주십시요!!')
        // return false;
      }
    }
    data['use_teacher_image'] = use_teacher_image;
    data['class_image'] = class_image;
  
    let category_yoga = [];
    let category_yoga_etc = '';
    let category_pilates = [];
    let category_pilates_etc = '';
  
    $.each($('#stu_yoga').find("[name='category_yoga']"), function(index, item) {
      if ($(item).prop('checked') === true) {
        category_yoga.push($(item).val());
      }
    });
    $.each($('#stu_pilates').find("[name='category_pilates']"), function(index, item) {
      if ($(item).prop('checked') === true) {
        category_pilates.push($(item).val());
      }
    });
  
    if ($('#chkbox_yoga_etc2').prop('checked') === true) {
      category_yoga_etc = $('#category_yoga_etc2').val();
    }
    if ($('#chkbox_pilates_etc2').prop('checked') === true) {
      category_pilates_etc = $('#category_pilates_etc2').val();
    }
  
    data['category_yoga'] = JSON.stringify(category_yoga);
    data['category_yoga_etc'] = category_yoga_etc;
    data['category_pilates'] = JSON.stringify(category_pilates);
    data['category_pilates_etc'] = category_pilates_etc;
  
    // console.log(data);
    
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
      if (update_start_date !== '') {
        let _y = update_start_date.substr(0, 4);
        let _m = update_start_date.substr(5, 2);
        let _d = update_start_date.substr(8, 2);
        setTimeout(function() {window.location = '<?= base_url(); ?>studio/schedule?t=schedule&y=' + _y + '&m=' + _m + '&d=' + _d;}, 1000);
      }
    });
  }
  function set_class_link(id, post_fix = '') {
    
    // console.log(id);
    
    let data = [];
    let url = '<?php echo base_url()."studio/schedule/link/set"; ?>';
    let sid = id;
    let send_link_immediate = $('#send_link_immediate' + post_fix).prop('checked') ? 1 : 0;
    let send_link_hour = $('#send_link_hour' + post_fix).val();
    let class_link = $('#class_link' + post_fix).val();
    let class_id = $('#class_id' + post_fix).val();
    let class_pw = $('#class_pw' + post_fix).val();
    let class_info = $('#letterZone' + post_fix).val();
    let reuse_class_info = $('#send_talk_since' + post_fix).prop('checked') === true ? 1 : 0;
    
    // console.log(send_link_immediate);
    // console.log(send_link_hour);
    // console.log(class_link);
    // console.log(class_id);
    // console.log(class_pw);
    // console.log(class_info);
    // console.log(reuse_class_info);
    
    if (send_link_immediate === 0) {
      if (send_link_hour < 1) {
        alert('링크 자동 발송 시간은 최소 1시간 전으로 설정되어야 합니다!');
        return false;
      }
    }
    
    if (class_id === '') {
      alert('클래스 아이디를 입력해주세요!');
      return false;
    }
    if (class_pw === '') {
      alert('클래스 비밀번호를 입력해주세요!');
      return false;
    }
  
    data['sid'] = sid;
    data['send_link_immediate'] = send_link_immediate;
    data['send_link_hour'] = send_link_hour;
    data['class_link'] = class_link;
    data['class_id'] = class_id;
    data['class_pw'] = class_pw;
    data['class_info'] = class_info;
    data['reuse_class_info'] = reuse_class_info;
  
    // console.log(data);
  
    send_post_data(data, url);
  }
  function send_link(sid, rid) {
  
    // console.log(sid);
    // console.log(rid);
  
    let data = [];
    let url = '<?php echo base_url()."studio/schedule/link/send"; ?>';
    data['sid'] = sid;
    data['rid'] = rid;
  
    // console.log(data);
  
    send_post_data(data, url);
  }
  $(function() {
    add_menu_active('schedule');
  })
</script>
<script>
  function get_reserve_list(id) {
    $('.popup-box').show();
    get_page('schedule_status_detail', '<?php echo base_url(); ?>studio/schedule/status?id='+id, true);
    $('#schedule_status').show();
    return false;
  }
  function open_popSchedule(id) {
    $('.popup-box').show();
    get_page('popScheduleRewrite', '<?php echo base_url(); ?>studio/schedule/edit?id='+id, true);
    $('#popScheduleRewrite').show();
    return false;
  }
  let remove_date;
  function open_schedule_remove_popup(id, date) {
    remove_date = date;
    $('#popScheduleRemove').data('id',id);
    $('.popup-box').show();
    $('#popScheduleRemove').show();
  }
  function close_schedule_remove_popup() {
    $('#popScheduleRemove').data('id','');
    $('.popup-box').hide();
    $('#popScheduleRemove').hide();
  }
  function unregister_schedule() {
    let url = '<?php echo base_url()."studio/schedule/unregister"; ?>';
    
    let data = [];
    data['id'] = $('#popScheduleRemove').data('id');
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
      console.log(remove_date);
      let _y = remove_date.substr(0, 4);
      let _m = remove_date.substr(5, 2);
      let _d = remove_date.substr(8, 2);
      setTimeout(function() {window.location = '<?= base_url(); ?>studio/schedule?t=schedule&y=' + _y + '&m=' + _m + '&d=' + _d;}, 1000);
    });
  }
  
  function get_schedule_list2(type = '') {
    let date = '';
    if (type === 'd') {
      date = $('#schedule_date2').val();
      if (isNaN(parseInt(date))) {
        alert('숫자만 입력바랍니다!');
        return false;
      }
      if (date.length !== 6) {
        alert('6자리로 정확히 입력바랍니다!');
        return false;
      }
    }
    // console.log(type);
    // console.log(date);
    get_page('schedule_list2', '<?= base_url(); ?>studio/schedule/list2?date=' + date, true);
    $('.search-btn-pop').hide();
  }


  let reserve_list2_page = 0;
  let reserve_list2_date = '';
  function get_reserve_list2(){
    reserve_list2_page++;
    // console.log(reserve_list2_page);
    // console.log(reserve_list2_date);
    $('#loading_set').show();
    $.ajax({
      url: "<?php echo base_url().'studio/schedule/status2?page='; ?>"  + reserve_list2_page + '&date=' + reserve_list2_date,
      type: 'GET', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      success: function(data) {
        $("#loading_set").delay(500).fadeOut(500);
        let prevCnt = $('#schedule_status_detail2 tr').length;
        $('#schedule_status_detail2').append(data);
        let listCnt = $('#schedule_status_detail2 tr').length;
        if ( listCnt === 0 || listCnt % <?= $this->studio_model::RESERVE_LIST2_PAGE_SIZE ?> !== 0 || prevCnt === listCnt) {
          $('.detail_table_more').hide();
        } else {
          $('.detail_table_more').show();
        }
        // console.log(prevCnt);
        // console.log(listCnt);
      },
      error: function(e) {
        console.log(e)
      }
    });
  }
  // $(function() {
  //   get_schedule_list2();
  // })
</script>
<script>
  // 입금 요청, 티켓팅 확정 클릭이벤트
  let RESERVE_STR = '<?= $this->studio_model->get_reserve_str(); ?>';
  let WAIT_STR = '<?= $this->studio_model->get_wait_str(); ?>';
  let CANCEL_STR = '<?= $this->studio_model->get_cancel_str(); ?>';
  
  function set_reserve(target) {
    target.removeClass('wait');
    target.removeClass('cancel');
    target.addClass('reserve');
    target.text(RESERVE_STR);
  }
  function set_wait(target) {
    target.removeClass('reserve');
    target.removeClass('cancel');
    target.addClass('wait');
    target.text(WAIT_STR);
  }
  function set_cancel(target) {
    target.removeClass('reserve');
    target.removeClass('cancel');
    target.addClass('cancel');
    target.text(CANCEL_STR);
  }
  
  function set_reserve_active(target) {
    let active = target.hasClass('ok_sign');
    let receive_target = target.parent().prev().find('.receive');
    // console.log(active);
    if (active === true) {
      target.removeClass('ok_sign');
      target.find('.send').removeClass('active');
      target.parent().next().find('.td_perforce').removeClass('red_sign');
      target.parent().next().find('.perforce').removeClass('active');
      set_wait(receive_target);
    } else {
      target.addClass('ok_sign');
      target.find('.send').addClass('active');
      target.parent().next().find('.td_perforce').removeClass('red_sign');
      target.parent().next().find('.perforce').removeClass('active');
      set_reserve(receive_target);
    }
  }
  
  function set_cancel_active(target) {
    let active = target.hasClass('red_sign');
    let receive_target = target.parent().prev().prev().find('.receive');
    // console.log(active);
    if (active === true) {
      target.removeClass('red_sign');
      target.find('.perforce').removeClass('active');
      target.parent().prev().find('.send').removeClass('active');
      target.parent().prev().find('.td_send').removeClass('ok_sign');
      set_wait(receive_target);
    } else {
      target.addClass('red_sign');
      target.find('.perforce').addClass('active');
      target.parent().prev().find('.send').removeClass('active');
      target.parent().prev().find('.td_send').removeClass('ok_sign');
      set_cancel(receive_target);
    }
  }

  function schedule_reserve_active(target) {
    let url = '<?php echo base_url()."studio/schedule/status/update"; ?>';
    let rid = target.data('id');
    let status = 0;
    let data = [];
  
    if (target.hasClass('ok_sign')) {
      status = <?= $this->studio_model::TICKETING_STATUS_WAIT; ?>;
    } else {
      status = <?= $this->studio_model::TICKETING_STATUS_RESERVE; ?>;
    }
  
    data['rid'] = rid;
    data['status'] = status;
  
    // console.log(data);
  
    send_post_data(data, url, function() {
      set_reserve_active(target);
    });
  }

  function schedule_cancel_active(target) {
    let url = '<?php echo base_url()."studio/schedule/status/update"; ?>';
    let rid = target.data('id');
    let status = 0;
    let data = [];
  
    if (target.hasClass('red_sign')) {
      status = <?= $this->studio_model::TICKETING_STATUS_WAIT; ?>;
    } else {
      status = <?= $this->studio_model::TICKETING_STATUS_CANCEL; ?>;
    }
  
    data['rid'] = rid;
    data['status'] = status;
  
    // console.log(data);
  
    send_post_data(data, url, function() {
      set_cancel_active(target);
    });
  }
</script>
