<p class="zoom_tit">수업 링크 등록</p>
<div class="zoom_cnt" style="padding: 20px; height: 518px; overflow-y: scroll;">
  <div class="cnt_url clearfix">
    <div class="url_box">
      <input type="url" placeholder="zoom 회의 링크를 입력해 주세요" class="url_write" id="class_link2">
      <? if (isset($schedule_info->class_link) == true && empty($schedule_info->class_link) == false) { ?>
        <input type="url" class="url_show" title="기존 회의 링크" placeholder="기존 회의 링크" value="<?= $schedule_info->class_link; ?>" disabled>
      <? } ?>
    </div>
    <button class="url_enroll" onclick="set_class_link(<?= $schedule_info->schedule_info_id; ?>, '2')">
      <? if (isset($schedule_info->class_link) == true && empty($schedule_info->class_link) == false) { ?>
        수정
      <? } else { ?>
        등록
      <? } ?>
    </button>
  </div>
  <div class="cnt_sendTime">
    <div class="sendTime_sendChk clearfix">
      <p class="sendChk_tit" style="vertical-align: top; line-height: 32px;">링크 자동 발송 시간 설정</p>
      <div class="sendChk_chks">
        <label class="chk_style style_start">
          <input type="checkbox" class="chk_start">
          수업 시작
          <input value="<?= ($schedule_info->send_link_immediate == 1 ? '' : $schedule_info->send_link_hour); ?>"
                 type="text" class="chk_data" id="send_link_hour2"> 시간 전
        </label>
        <label class="chk_style style_immediate gray_txt">
          <input type="checkbox" class="chk_immediate" id="send_link_immediate2">
          링크 등록 즉시 발송
        </label>
      </div>
      <script>
        $(function(){
          $('#zoom2 .chk_start').click(function(){
            let chk = $(this).prop('checked');
            
            if(chk === true) {
              $(this).parent().removeClass('gray_txt');
              $(this).next().removeClass('gray_txt');
              $(this).parent().next().addClass('gray_txt');
              $(this).parent().next().children().prop('checked',false);
            }
            else {
              $(this).parent().addClass('gray_txt');
              $(this).next().addClass('gray_txt');
              $(this).parent().next().removeClass('gray_txt');
              $(this).parent().next().children().prop('checked',true);
            }
          })
          $('#zoom2 .chk_immediate').click(function(){
            let chk = $(this).prop('checked');
            
            if(chk === true) {
              $(this).parent().removeClass('gray_txt');
              $(this).parent().prev().find('#send_link_hour2').addClass('gray_txt');
              $(this).parent().prev().addClass('gray_txt');
              $(this).parent().prev().children().prop('checked',false);
            }
            else {
              $(this).parent().addClass('gray_txt');
              $(this).parent().prev().find('#send_link_hour2').removeClass('gray_txt');
              $(this).parent().prev().removeClass('gray_txt');
              $(this).parent().prev().children().prop('checked',true);
            }
          })
        })
      </script>
    </div>
    <div class="sendTime_sendIdentity clearfix">
      <p class="sendChk_tit">ZOOM 회의 ID / 비밀번호</p>
      <div class="sendChk_chks">
        <span class="start_time zoom_form" style="width: 100%;">
          <input id="class_id2" type="text" class="form_time" placeholder="id" value="<?= $schedule_info->class_id; ?>">
        </span>
        <span class="start_time zoom_form" style="width: 100%;">
          <input id="class_pw2" type="text" class="form_time" placeholder="pw" value="<?= $schedule_info->class_pw; ?>">
        </span>
      </div>
    </div>
    <div class="popup theme:sendTalk" id="send-kaTalk-link" >
      <div class="sendTalkBox">
        <div class="detail_guideTalk" id="guideTalk2" style="padding-top: 24px;">
          <p class="guideTalk_tit" style="padding: 0 0 16px;">수업 전 안내 카톡</p>
          <div class="guideTalk_conts">
            <div class="conts__txtBox">
              <div class="txtBox-territory">
                <div class="txtBox--area">
                  <div class="area_letterBox">
                    <p class="area_letterCount">남은 글자 수
                      <span class="letter_remain">
                        <strong class="remain_number">1000</strong>자
                      </span>
                    </p>
                  </div>
                  <form class="area_letterForm">
                    <? if (isset($schedule_info->class_info) == true && empty($schedule_info->class_info) == false) { ?>
                      <textarea class="area_letterZone" id="letterZone2" placeholder="1,000자 이내"><?= $schedule_info->class_info; ?></textarea>
                    <? } else if (isset($studio->class_info) == true && empty($studio->class_info) == false) { ?>
                      <textarea class="area_letterZone" id="letterZone2" placeholder="1,000자 이내"><?= $studio->class_info; ?></textarea>
                    <? } else { ?>
                      <textarea class="area_letterZone" id="letterZone2" placeholder="1,000자 이내"></textarea>
                    <? } ?>
                  </form>
                </div>
              </div>
              <div class="textBox--timer clearfix">
                <label class="chk_style immediate_kaTalk gray_txt">
                  <input type="checkbox" id="send_talk_since2"> 다음에도 사용하기
                </label>
              </div>
            </div>
            <script>
              $('#send_talk_since2').click(function(){
                let chk = $(this).prop('checked');
                if(chk === true) {
                  $(this).parent().removeClass('gray_txt');
                }
                else {
                  $(this).parent().addClass('gray_txt');
                }
              })
              $('#guideTalk2 .area_letterZone').on('keyup',function(){
                let input = $(this).val().length;
                let left = 1000 - input;
                $('#guideTalk2 .remain_number').text(left);
                
                if($(this).val().length > 1000) {
                  alert("글자수는 1,000자 이내로 제한됩니다.");
                  $(this).val($(this).val().substring(0,1000));
                  $('#guideTalk2 .remain_number').text(0);
                  // left = 0;
                }
              })
            </script>
          </div>
        </div>
      </div>
    </div>
    <p class="sendTime_message">* '수업 링크'와 '수업 전 안내 카톡'은 티켓팅 확정된 회원들에게 카카오 알림톡으로 발송됩니다.</p>
  </div>
</div>
<script>
  $(function() {
    <? if ($schedule_info->send_link_immediate == 1) { ?>
    $('#zoom2 .chk_immediate').click();
    <? } else { ?>
    $('#zoom2 .chk_start').click();
    <? } ?>
  });
</script>