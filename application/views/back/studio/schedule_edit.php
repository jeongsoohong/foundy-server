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
  <div class="type_box sch_register shadow">
    <p class="type_tit sch_tit">스케줄 수정</p>
    <!-- <button class="sch_btn btn_save">저장</button> -->
    <dl class="type_detail sch_enroll clearfix">
      <dt class="area_tit">시간</dt>
      <dd class="area_data">
        <div class="data_box clearfix">
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
      <dd class="area_data" style="margin-bottom: 24px;">
        <div class="data_box">
          <div class="teacher_select clearfix" id="teach2">
            <div class="selbox-wrap">
              <input type="text" id="selboxDirect2" value="<?= $schedule_info->teacher_name; ?>" style="padding: 0 10px; width: 100%; height: inherit;">
            </div>
            <div class="selbox-name">
              <p>수업명</p>
              <input type="text" value="<?= $schedule_info->schedule_title; ?>" class="name_form" id="schedule_title2">
            </div>
          </div>
        </div>
      </dd>
      <dt class="area_tit">클래스 분류</dt>
      <dd class="area_data class_data" style="height: 336px">
        <p class="data_limit" style="line-height: 34px;">클래스 분류는 최대 3개 까지 선택 가능합니다. 기타 카테고리를 여러개 등록시 공백(스페이스)로 구분해 주세요.</p>
        <div class="data_box" style="height: inherit;">
          <div class="stu_yoga" id="stu_yoga" style="margin-bottom: 16px; height: 196px;">
            <div class="class_chkbox">
              <p class="tit_sm class_name">요가 클래스</p>
              <div class="chkbox_line clearfix">
                <?php
                $count = 0;
                $categories = $this->db->order_by('name', 'asc')->get_where('category_studio', array('type' => STUDIO_TYPE_YOGA, 'activate' => 1))->result();
                foreach ($categories as $category) {
                $category_id = $category->category_id;
                $name = $category->name;
                $count++;
                ?>
                <label class="form-chk col_sp <?= (mb_strlen($name) >= 4 ? 'clip' : ''); ?>">
                  <input name="category_yoga" type="checkbox" value="<?php echo $name;?>" id="<?php echo $category_id; ?>"
                    <?php if(in_array($name,$category_yoga_data)){ echo 'checked'; }?> id="<?php echo $category_id; ?>"/>
                  <?php echo $name; ?>
                </label>
                <?php if ($count % 5 == 0) { ?>
              </div>
              <div class="chkbox_line clearfix">
                <?php } ?>
                <?php } ?>
                <label class="form-chk col_sp" id="chk_other2">
                  <input id="chkbox_yoga_etc2" <?php if (empty($category_yoga_etc) == false) echo 'checked'; ?> type="checkbox" name="number">
                  기타
                  <span class="write_padding">
                    <input type="text" class="chk_write" id="category_yoga_etc2" name="category_yoga_etc" value="<?= $category_yoga_etc; ?>">
                  </span>
                </label>
              </div>
            </div>
          </div>
          <div class="stu_pilates" id="stu_pilates">
            <p class="tit_sm">필라테스 클래스</p>
            <div class="class_chkbox">
              <div class="chkbox_line clearfix">
                <?php
                $count = 0;
                $categories = $this->db->order_by('name', 'asc')->get_where('category_studio', array('type' => STUDIO_TYPE_PILATES, 'activate' => 1))->result();
                foreach ($categories as $category) {
                $category_id = $category->category_id;
                $name = $category->name;
                $count++;
                ?>
                <label class="form-chk col_sp <?= (mb_strlen($name) >= 4 ? 'clip' : ''); ?>">
                  <input name="category_pilates" type="checkbox" value="<?php echo $name;?>"
                    <?php if(in_array($name,$category_pilates_data)){ echo 'checked'; }?> id="<?php echo $category_id; ?>"/>
                  <?php echo $name; ?>
                </label>
                <?php if ($count % 5 == 0) { ?>
              </div>
              <div class="chkbox_line clearfix">
                <?php } ?>
                <?php } ?>
                <label class="form-chk col_sp" id="chk_other3">
                  <input id="chkbox_pilates_etc2" <?php if (empty($category_pilates_etc) == false) echo 'checked'; ?> type="checkbox" name="number">
                  기타
                  <span class="write_padding">
                    <input type="text" class="chk_write" id="category_pilates_etc2" name="category_pilates_etc" value="<?= $category_pilates_etc; ?>">
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
            <label class="ticket-chk form-chk">
              <input <? if ($schedule_info->ticketing) echo 'checked'; ?> type="checkbox" id="ticketing2" name="number" disabled>
              티켓팅 기능 사용
            </label>
            <div class="ticket-option2">
              <div class="option__account clearfix">
                <label class="accountLabel2">
                  <input <? if ($schedule_info->use_bank == 1) echo 'checked'; ?> type="checkbox" id="accountChk2"> 입금계좌
                </label>
                <div class="ticket-send" id="send2" style="display: block;">
                  <div class="sendInfo-account">
                    <p class="send-txt account-txt">무통장입금 입금은행</p>
                    <div class="account-how">
                      <p class="how_wrap clearfix">
                        <span class="how_bank">
                          <input type="text" value="<?= $schedule_info->bank_name; ?>" style="width: 76px; margin-right: 8px;" id="bank_name2">은행
                        </span>
                        <span class="how_account">
                          <input type="text" value="<?= $schedule_info->bank_account_number; ?>" placeholder="계좌번호" id="bank_account_number2">
                        </span>
                        <span class="how_holder">
                          <input type="text" value="<?= $schedule_info->bank_depositor; ?>" placeholder="예금주명" id="bank_depositor2">
                        </span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="option__pay clearfix">
                <label class="urlLabel2 gray_txt">
                  <input <? if ($schedule_info->use_bank == 0) echo 'checked'; ?> type="checkbox" id="urlChk2"> 결제 URL
                </label>
                <p class="payGuide">현재 온라인 수업 결제를 별도 진행하는 곳 (N사 페이, P사 페이)이 있다면 사용가능합니다.</p>
                <div class="pay--url" id="url2">
                  <input type="text" class="form_time" value="<?= $schedule_info->payment_page; ?>" id="payment_page2" style="width: 100%;">
                </div>
              </div>
              <div class="sendinfo-poptxt" id="popSch2" style="margin-top: 20px;">
                <p class="send-txt announce-txt">티켓팅 시 팝업 상세 문구</p>
                <?
                if (!strcmp($schedule_info->reserve_popup, STUDIO_RESERVE_POPUP_QA1)) {
                  $qa_num = 1;
                  ?>
                <form class="addinfo_textbox" id="addinfo_textbox_2" style="display: none;">
                <? } else if (!strcmp($schedule_info->reserve_popup, STUDIO_RESERVE_POPUP_QA2)) {
                  $qa_num = 2;
                  ?>
                <form class="addinfo_textbox" id="addinfo_textbox_2" style="display: none;">
                <? } else if (!strcmp($schedule_info->reserve_popup, STUDIO_RESERVE_POPUP_QA3)) {
                  $qa_num = 3;
                  ?>
                <form class="addinfo_textbox" id="addinfo_textbox_2" style="display: none;">
                <? } else {
                  $qa_num = 0;
                  ?>
                <form class="addinfo_textbox" id="addinfo_textbox_2">
                <? } ?>
                  <div class="remain_textarea">
                    <p>남은 글자 수 <span class="remain_text"><strong class="remain_val" id="remain_val_2"><?= (100 - mb_strlen($schedule_info->reserve_popup)); ?></strong>자</span></p>
                  </div>
                  <textarea class="about_textarea2" id="reserve_popup2"
                            placeholder="'예약 후 00시간 이내 미입금 시 예약 취소됩니다' 혹은 '입금 순서대로 예약 확정 마감됩니다' 등 온라인 스튜디오의 예약 마감 및 정원에 대한 문구를 간단히 기재해주세요! (최대 100자)"><?= $schedule_info->reserve_popup; ?></textarea>
                </form>
                <div class="choice__wrap" style="border-top: 1px solid #eee;">
                  <div class="choice">
                    <select class="choice--slc slcNo2">
                      <option <? if ($qa_num == 1) echo 'selected'; ?> value="qna--1"><?= STUDIO_RESERVE_POPUP_QA1; ?></option>
                      <option <? if ($qa_num == 2) echo 'selected'; ?> value="qna--2"><?= STUDIO_RESERVE_POPUP_QA2; ?></option>
                      <option <? if ($qa_num == 3) echo 'selected'; ?> value="qna--3"><?= STUDIO_RESERVE_POPUP_QA3; ?></option>
                      <option <? if ($qa_num == 0) echo 'selected'; ?> value="qna--direct2" class="qna--write">직접입력</option>
                    </select>
<!--                    <input type="text" placeholder="티켓팅 시 팝업 상세 문구를 직접 입력해주세요" class="choice--write writebox2" style="display: none;">-->
                    <script>
                      $(function(){
                        // alert('준비되었습니다!');
                        $('.slcNo2').change(function(){
                          let state = $('.slcNo2 option:selected').val();
                          // console.log(state);
                          // alert('sss');
                          if(state === 'qna--direct2'){
                            // alert('성공');
                            $('#remain_val_2').text('100');
                            $('#reserve_popup2').val('');
                            $('#addinfo_textbox_2').show();
                          }
                          else {
                            $('#reserve_popup2').val($('.slcNo2 option:selected').text());
                            $('#addinfo_textbox_2').hide();
                          }
                        })
                        $('.about_textarea2').on('keyup',function(){
                          var input = $(this).val().length;
                          var left = 100 - input;
                          $('#remain_val_2').text(left);
    
                          if($(this).val().length > 100) {
                            alert("글자수는 100자 이내로 제한됩니다.");
                            $(this).val($(this).val().substring(0,100));
                            $('#remain_val_2').text(0);
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
      </dd>
      <dt class="centerBook2 area_tit" style="line-height: 1.5; margin: 1px 0 0; margin-top: 8px; word-break: keep-all; display: none;">수업료</dt>
      <dd class="centerBook2 area_data clearfix" style="display: none;">
        <div class="data_box">
          <div class="clearfix">
            <div class="timewrap personnel" id="tuition2">
              <p>
                <span class="start_time" style="margin-left: 0; width: 160px;">
                  <input type="number" class="form_time" value="<?= $schedule_info->class_price; ?>" id="class_price2">
                </span>
                원
              </p>
            </div>
          </div>
        </div>
      </dd>
      <dt class="centerBook2 area_tit" style="line-height: 1.5; margin: 1px 0 0; margin-top: 8px; word-break: keep-all; display: block;">티켓팅 가능시간</dt>
      <dd class="centerBook2 area_data clearfix" style="display: block;">
        <!-- 태그 클래스 추가 -->
        <div class="data_box">
          <!-- 스케줄 등록 즉시 티켓팅 오픈 -->
          <div id="online_schedule2" class="clearfix">
            <label class="wait_chk form-chk ready-chk" id="ready-soon2">
              <input <? //if ($schedule_info->open_immediate) echo 'checked'; ?> type="checkbox" id="open-immediateA" data-role="immediate" name="number">
              스케줄 등록 즉시 티켓팅 오픈
            </label>
            <div class="timebox_a a1boxT clearfix">
              <div class="timewrap">
                <p>예약 마감 시간 : 수업
                  <span class="start_time">
                    <input type="number" min="0" max="12" class="form_time" id="reserve_close_hour_00"
                           value="<?= $schedule_info->open_immediate ? $schedule_info->reserve_close_hour : 12; ?>">
                  </span>
                  시간 전까지
                </p>
              </div>
            </div>
          </div>
          <!-- 티켓팅 시간 설정 -->
          <div id="online_time2" class="clearfix">
            <label class="wait_chk form-chk ready-chk gray_txt" id="ready-time2">
              <input <? //if (!$schedule_info->open_immediate) echo 'checked'; ?> type="checkbox" id="open-immediateB" data-role="immediate" name="number">
              티켓팅 시간 설정
            </label>
            <div class="timebox_a a2boxT clearfix" style="display: none;">
              <div class="timewrap">
                <p class="time_sp">예약 시작 시간 : 수업
                  <span class="start_time">
                    <input type="number" min="0" max="30" class="form_time" id="reserve_open_day_11"
                           value="<?= $schedule_info->open_immediate == false ? (int)($schedule_info->reserve_open_hour / 24) : 7; ?>">
                  </span>일
                  <span class="start_time">
                    <input type="number" min="0" max="23" class="form_time" id="reserve_open_hour_11"
                           value="<?= $schedule_info->open_immediate == false ? $schedule_info->reserve_open_hour % 24 : 6; ?>">
                  </span>시간 전까지
                </p>
                <p>예약 마감 시간 : 수업
                  <span class="start_time">
                    <input type="number" min="0" max="48" class="form_time" id="reserve_close_hour_11"
                           value="<?= $schedule_info->open_immediate == false ? $schedule_info->reserve_close_hour : 12; ?>">
                  </span>시간 전까지
                </p>
              </div>
            </div>
          </div>
        </div>
      </dd>
      <dt class="centerBook2 area_tit" style="line-height: 1.5; margin: 0; word-break: keep-all;">티켓팅 확정인원
        <span class="txtGuide">최대 수업 정원</span>
      </dt>
      <dd class="centerBook2 area_data clearfix">
        <!-- 태그 클래스 추가 -->
        <div class="data_box">
          <!-- 티켓팅 확정 인원 -->
          <div id="online_personnel2" class="clearfix">
            <div class="timewrap personnel" id="personnel2">
              <p>
                <span class="start_time" style="margin-left: 0; width: 160px;">
                  <input type="number" class="form_time" id="reservable_number2"
                         value="<?= $schedule_info->reservable_number; ?>" style="width: 100%;">
                </span>
                명
              </p>
            </div>
          </div>
        </div>
      </dd>
      <dt class="centerBook2 area_tit" style="line-height: 1.5; margin: 0; word-break: keep-all; letter-spacing: -0.03em;">입금 요청 최대 인원
        <span class="txtGuide">수업신청 가능한 최대 인원</span>
      </dt>
      <dd class="centerBook2 area_data clearfix">
        <!-- 태그 클래스 추가 -->
        <div class="data_box">
          <!-- 입금 요청 최대 인원 -->
          <div id="online_maxPersonnel2" class="clearfix">
            <div class="timewrap personnel" id="maxPersonnel2">
              <p>
                <span class="start_time" style="margin-left: 0; width: 160px;">
                  <input type="number" class="form_time" id="waitable_number2"
                         value="<?= $schedule_info->waitable_number; ?>" style="width: 100%;">
                </span>
                명
              </p>
            </div>
          </div>
        </div>
      </dd>
      <dt class="centerBook2 area_tit stu_name">수업 이미지 등록</dt>
      <dd class="centerBook2 area_data name_data add_photo add_photo2 photo_class" style="width: 800px;">
        <p class="data_limit img_guide">권장 이미지 사이즈는 1000 * 500 px, 이미지 용량은 최대 16MB까지 업로드 가능합니다.
          <br>노출되는 위치에 따라 이미지가 잘려 보일 수 있으므로 인물이 중앙에 위치한 사진을 추천드립니다.</p>
          <span class="img_guideTip">세로형 이미지는 이미지가 많이 잘리게 되어 가로형 이미지 혹은 정사각형 이미지를 올려주세요!</span>
        <label type="file" class="data_form file_form" style="min-width: 410px;">파일열기
          <span class="file_alert" style="color: #bdbdbd;">(사진 추가를 하지 않으면 온라인 스튜디오 메인이미지로 반영됩니다.)</span>
          <span class="file_arrow file_arrow2" style="transform: rotate(45deg);"></span>
          <input type="file" value="파일열기" id="imgInp2" onchange="profile_image_preview2(this);">
          <script>
            function profile_image_preview2(target) {
              preview_img(target, 'previewImg2');
              target = $('#use_teacher_image2');
              if (target.prop('checked') === true) {
                target.click();
              }
            }
            $(function(){
              // file_arrow 호버 이벤트
              $('.add_photo2').hover(function(){
                $(this).find('.file_arrow2').css('transform','rotate(225deg)')
                  .addClass('arrow_hover');
              },function(){
                $(this).find('.file_arrow2').css('transform','rotate(45deg)')
                  .removeClass('arrow_hover');
              });
              
              // 강사 기본 이미지 사용 클릭시
              $('#use_teacher_image2').click(function(){
                let checked = $(this).prop('checked');
                if(checked === true){
                  $('.file_thumb2').hide();
                } else {
                  $('.file_thumb2').show();
                }
              })
            })
          </script>
        </label>
        <? if (empty($schedule_info->class_image_url)) { ?>
          <div class="file_thumb file_thumb2" id="previewImg2" style="display: none;">
            <img src="" alt="" class="thumb_img thumb_img2" style="display: none;">
          </div>
          <label class="form-chk col_sp" style="width: 100%; margin-top: 20px;">
            <input checked name="use_teacher_image" id="use_teacher_image2" type="checkbox">
            강사 기본 이미지 사용
          </label>
        <? } else { ?>
          <div class="file_thumb file_thumb2" id="previewImg2" style="display: block;">
            <img src="<?= $schedule_info->class_image_url; ?>" alt="" class="thumb_img thumb_img2" style="display: block;">
          </div>
          <label class="form-chk col_sp" style="width: 100%; margin-top: 20px;">
            <input name="use_teacher_image" id="use_teacher_image2" type="checkbox">
            강사 기본 이미지 사용
          </label>
        <? } ?>
      </dd>
    </dl>
  </div>
  <div class="btn_wrap">
    <button class="btn_save2 theme:fn_save">저장</button>
    <button class="btn_cancel2 theme:fn_cancel" style="margin: 0;">취소</button>
    <script>
      $(function(){
        $('.btn_cancel2').click(function(){
          $('.popup-box').hide().children('#popScheduleRewrite').hide();
          $('#popScheduleEdit').hide();
        })
        $('.btn_save2').click(function(){
          $('.popup-box').show().children('#popScheduleEdit').show();
        })
      })
    </script>
  </div>
</div>
<script>
  $(function() {
    $('#start_time2').datetimepicker({
      format: 'LT'
    });
    $('#end_time2').datetimepicker({
      format: 'LT'
    });
    $('#accountChk2').click(function(){
      let open = $('#accountChk2').prop('checked');
      // console.log(open);
    
      if(open === true){
        $('#send2').show();
        $('#url2').hide();
        $('#accountChk2').prop('checked',true);
        $('#urlChk2').prop('checked',false);
      
        $('.urlLabel2').addClass('gray_txt');
        $('.accountLabel2').removeClass('gray_txt');
      }
      else {
        $('#send2').hide();
        $('#url2').show();
        $('#accountChk2').prop('checked',false);
        $('#urlChk2').prop('checked',true);
      
        $('.urlLabel2').removeClass('gray_txt');
        $('.accountLabel2').addClass('gray_txt');
      }
    })
    $('#urlChk2').click(function(){
      let open = $('#urlChk2').prop('checked');
      // console.log(open);
    
      if(open === true){
        $('#send2').hide();
        $('#url2').show();
        $('#urlChk2').prop('checked',true);
        $('#accountChk2').prop('checked',false);
      
        $('.urlLabel2').removeClass('gray_txt');
        $('.accountLabel2').addClass('gray_txt');
      }
      else {
        $('#send2').show();
        $('#url2').hide();
        $('#urlChk2').prop('checked',false);
        $('#accountChk2').prop('checked',true);
      
        $('.urlLabel2').addClass('gray_txt');
        $('.accountLabel2').removeClass('gray_txt');
      }
    })
  
    $('#open-immediateA').click(function(){
      let open = $('#open-immediateA').prop('checked');
      // console.log(open);
    
      if(open === true){
        $('.a1boxT').show();
        $('.a2boxT').hide();
        $('#open-immediateB').prop('checked',false);
        // $('#open-immediate2').attr('disabled',true);
        $('#online_time2 #ready-time2').addClass('gray_txt');
        $('#online_schedule2 #ready-soon2').removeClass('gray_txt');
      }
      else {
        $('.a1boxT').hide();
        $('.a2boxT').show();
        $('#open-immediateB').prop('checked',true);
        // $('#open-immediate2').attr('disabled',false);
        $('#online_time2 #ready-time2').removeClass('gray_txt');
        $('#online_schedule2 #ready-soon2').addClass('gray_txt');
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
        $('#online_time2 #ready-time2').removeClass('gray_txt');
        $('#online_schedule2 #ready-soon2').addClass('gray_txt');
      }
      else {
        $('.a1boxT').show();
        $('.a2boxT').hide();
        $('#open-immediateA').prop('checked',true);
        // $('#open-immediate2').attr('disabled',false);
        $('#online_time2 #ready-time2').addClass('gray_txt');
        $('#online_schedule2 #ready-soon2').removeClass('gray_txt');
      }
    })
  
    $('#chk_tuition2').click(function(){
      let display = $('#tuition2').css('display');
      if(display === 'none'){
        $('#tuition2').show();
      }
      else {
        $('#tuition2').hide();
      }
    })
    <? if ($schedule_info->ticketing) { ?>
    $('.ticket-option2').show();
    $('.centerBook2').show();
    $('#popScheduleRewrite').addClass('scroll-y');
    
    <? if ($schedule_info->use_bank) { ?>
    $('#send2').show();
    $('#url2').hide();
    <? } else { ?>
    $('#send2').hide();
    $('#url2').show();
    <? } ?>
    
    <? if ($schedule_info->open_immediate) { ?>
    $('#open-immediateA').click();
    <? } else { ?>
    $('#open-immediateB').click();
    <? } ?>
    
    <? } else { ?>
    $('.ticket-option2').hide();
    $('.centerBook2').hide();
    $('#popScheduleRewrite').removeClass('scroll-y');
    <? } ?>
  });
  
  update_id = <?= $schedule_info->schedule_info_id; ?>;
  update_start_date = '<?= $schedule_info->schedule_date.' '.$schedule_info->start_time; ?>';
</script>
