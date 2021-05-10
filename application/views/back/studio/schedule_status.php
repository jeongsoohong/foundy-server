<div class="detail_table table_main situation_table" style="padding-bottom: 8px;">
  <table class="table_head">
    <colgroup>
      <col width="10%">
      <col width="6%">
      <col width="16%">
      <col width="12%">
      <col width="10%">
      <col width="11%">
      <col width="10%">
      <col width="10%">
      <col width="15%">
    </colgroup>
    <thead>
    <tr>
      <th>티켓팅 일시</th>
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
    <div class="table_body main_case scroll-y" id="ticket_member_list" style="border: 1px solid #EAEAEA;">
      <table class="table-list" style="display: table;">
        <colgroup>
          <col width="10%">
          <col width="6%">
          <col width="16%">
          <col width="12%">
          <col width="10%">
          <col width="11%">
          <col width="10%">
          <col width="10%">
          <col width="15%">
        </colgroup>
        <tbody>
        <!-- tr x 10개 -->
        <? foreach ($reserve_list as $reserve) { ?>
          <tr>
            <td><?= date('Y.m.d H:i:s', strtotime($reserve->register_at)); ?></td>
            <td><?= $reserve->user->username; ?></td>
            <td><?= $reserve->user->email; ?></td>
            <td><?= $reserve->user->phone; ?></td>
            <td><?= $reserve->payer_info; ?></td>
            <td class="data_txt">
              <span class="receive reserve"><?= $this->studio_model->get_reserve_str(); ?></span>
            </td>
            <td class="data_form">
              <button class="td_send ok_sign" data-id="<?= $reserve->reserve_id; ?>" onclick="schedule_reserve_active($(this))">
                <span class="send shadow active"></span>
              </button>
            </td>
            <td>
              <button class="td_perforce" data-id="<?= $reserve->reserve_id; ?>" onclick="schedule_cancel_active($(this))">
                <span class="perforce shadow"></span>
              </button>
            </td>
            <td>
              <button class="send_link" onclick="send_link(<?= $reserve->schedule_info_id; ?>, <?= $reserve->reserve_id ?>)">발송</button>
            </td>
          </tr>
        <? } ?>
        <? foreach ($wait_list as $wait) { ?>
          <tr>
            <td><?= date('Y.m.d H:i:s', strtotime($wait->register_at)); ?></td>
            <td><?= $wait->user->username; ?></td>
            <td><?= $wait->user->email; ?></td>
            <td><?= $wait->user->phone; ?></td>
            <td><?= $wait->payer_info; ?></td>
            <td class="data_txt">
              <span class="receive wait"><?= $this->studio_model->get_wait_str(); ?></span>
            </td>
            <td class="data_form">
              <button class="td_send" data-id="<?= $wait->reserve_id; ?>" onclick="schedule_reserve_active($(this))">
                <span class="send shadow"></span>
              </button>
            </td>
            <td>
              <button class="td_perforce" data-id="<?= $wait->reserve_id; ?>" onclick="schedule_cancel_active($(this))">
                <span class="perforce shadow"></span>
              </button>
            </td>
            <td>
              <button class="send_link" onclick="send_link(<?= $wait->schedule_info_id; ?>, <?= $wait->reserve_id ?>)">발송</button>
            </td>
          </tr>
        <? } ?>
        <? foreach ($cancel_list as $cancel) { ?>
          <tr>
            <td><?= date('Y.m.d H:i:s', strtotime($cancel->register_at)); ?></td>
            <td><?= $cancel->user->username; ?></td>
            <td><?= $cancel->user->email; ?></td>
            <td><?= $cancel->user->phone; ?></td>
            <td><?= $cancel->payer_info; ?></td>
            <td class="data_txt">
              <span class="receive cancel"><?= $this->studio_model->get_cancel_str(); ?></span>
            </td>
            <td class="data_form">
              <button class="td_send" data-id="<?= $cancel->reserve_id; ?>" onclick="schedule_reserve_active($(this))">
                <span class="send shadow"></span>
              </button>
            </td>
            <td>
              <button class="td_perforce red_sign" data-id="<?= $cancel->reserve_id; ?>" onclick="schedule_cancel_active($(this))">
                <span class="perforce shadow active"></span>
              </button>
            </td>
            <td>
              <button class="send_link" onclick="send_link(<?= $cancel->schedule_info_id; ?>, <?= $cancel->reserve_id ?>)">발송</button>
            </td>
          </tr>
        <? } ?>
        </tbody>
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
    <div class="table_nav_btns" style="margin: 20px 0;">
      <div class="btns_prev"></div>
      <div class="btns_no">
<!--        <button class="no-indicator btn_click" onclick="get_list(5,1,'a5j8i7j6p5@privaterelay.appleid.com')">1</button>-->
      </div>
      <div class="btns_next"></div>
    </div>
  </div>
</div>
<div class="detail_zoom" id="zoom">
  <p class="zoom_tit">수업 링크 등록</p>
  <div class="zoom_cnt">
    <div class="cnt_url clearfix">
      <div class="url_box">
        <input type="url" placeholder="zoom 회의 링크를 입력해 주세요" class="url_write" id="class_link">
        <? if (isset($schedule_info->class_link) == true && empty($schedule_info->class_link) == false) { ?>
          <input type="url" class="url_show" title="기존 회의 링크" placeholder="기존 회의 링크" value="<?= $schedule_info->class_link; ?>" disabled>
        <? } ?>
      </div>
      <button class="url_enroll" onclick="set_class_link(<?= $schedule_info->schedule_info_id; ?>)">
        <? if (isset($schedule_info->class_link) == true && empty($schedule_info->class_link) == false) { ?>
          수정
        <? } else { ?>
          등록
        <? } ?>
      </button>
    </div>
    <div class="cnt_sendTime">
      <div class="sendTime_sendChk clearfix">
        <p class="sendChk_tit">링크 자동 발송 시간 설정</p>
        <div class="sendChk_chks">
          <label class="chk_style style_start">
            <input type="checkbox" class="chk_start">
            수업 시작
            <input value="<?= ($schedule_info->send_link_immediate == 1 ? '' : $schedule_info->send_link_hour); ?>"
                   type="text" class="chk_data" id="send_link_hour"> 시간 전
          </label>
          <label class="chk_style style_immediate gray_txt">
            <input type="checkbox" class="chk_immediate" id="send_link_immediate">
            링크 등록 즉시 발송
          </label>
        </div>
      </div>
      <div class="sendTime_sendIdentity clearfix">
        <p class="sendChk_tit">ZOOM 회의 ID / 비밀번호</p>
        <div class="sendChk_chks">
          <span class="start_time zoom_form" name="zoom-id" style="width: 100%;">
            <input id="class_id" type="text" class="form_time" placeholder="id" value="<?= $schedule_info->class_id; ?>">
          </span>
          <span class="start_time zoom_form" name="zoom-pw" style="width: 100%;">
            <input id="class_pw" type="text" class="form_time" placeholder="pw" value="<?= $schedule_info->class_pw; ?>">
          </span>
        </div>
      </div>
      <!-- 수업 전 안내 카톡 -->
      <div class="detail_guideTalk" id="guideTalk">
        <p class="guideTalk_tit">수업 전 안내 카톡</p>
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
                    <textarea class="area_letterZone" id="letterZone" placeholder="1,000자 이내"><?= $schedule_info->class_info; ?></textarea>
                  <? } else if (isset($studio->class_info) == true && empty($studio->class_info) == false) { ?>
                    <textarea class="area_letterZone" id="letterZone" placeholder="1,000자 이내"><?= $studio->class_info; ?></textarea>
                  <? } else { ?>
                    <textarea class="area_letterZone" id="letterZone" placeholder="1,000자 이내"></textarea>
                  <? } ?>
                </form>
              </div>
            </div>
            <div class="textBox--timer clearfix">
              <label class="chk_style immediate_kaTalk gray_txt">
                <input type="checkbox" id="send_talk_since"> 다음에도 사용하기
              </label>
            </div>
          </div>
          <script>
            $('#send_talk_since').click(function(){
              let chk = $(this).prop('checked');
              if(chk === true) {
                $(this).parent().removeClass('gray_txt');
              }
              else {
                $(this).parent().addClass('gray_txt');
              }
            })
            $('#guideTalk .area_letterZone').on('keyup',function(){
              let input = $(this).val().length;
              let left = 1000 - input;
              $('#guideTalk .remain_number').text(left);
          
              if($(this).val().length > 1000) {
                alert("글자수는 1,000자 이내로 제한됩니다.");
                $(this).val($(this).val().substring(0,1000));
                $('#guideTalk .remain_number').text(0);
                // left = 0;
              }
            })
          </script>
        </div>
      </div>
      <p class="sendTime_message">* '수업 링크'와 '수업 전 안내 카톡'은 티켓팅 확정된 회원들에게 카카오 알림톡으로 발송됩니다.</p>
    </div>
  </div>
</div>
<script>
  $(function(){
    $('.chk_start').click(function(){
      let chk_data = $('.chk_start').prop('checked');
      
      // console.log(chk_data);
      
      if(chk_data === true){
        $('.chk_start').prop('checked',true);
        $('.chk_data').attr('disabled',false)
          .removeClass('gray_bg');
        $('.chk_immediate').prop('checked',false);
        $('.style_immediate').addClass('gray_txt');
        $('.style_start').removeClass('gray_txt');
      }
      else {
        $('.chk_start').prop('checked',false);
        $('.chk_data').attr('disabled',true)
          .addClass('gray_bg');
        $('.chk_immediate').prop('checked',true);
        $('.style_immediate').removeClass('gray_txt');
        $('.style_start').addClass('gray_txt');
      }
    });
    $('.chk_immediate').click(function(){
      let chk_data2 = $('.chk_immediate').prop('checked');
      
      // console.log(chk_data2);
      
      if(chk_data2 === true){
        $('.chk_immediate').prop('checked',true);
        $('.chk_data').attr('disabled',true)
          .addClass('gray_bg');
        $('.chk_start').prop('checked',false);
        $('.style_start').addClass('gray_txt');
        $('.style_immediate').removeClass('gray_txt');
      }
      else {
        $('.chk_immediate').prop('checked',false);
        $('.chk_data').attr('disabled',false)
          .removeClass('gray_bg');
        $('.chk_start').prop('checked',true);
        $('.style_start').removeClass('gray_txt');
        $('.style_immediate').addClass('gray_txt');
      }
    });
    
    <? if ($schedule_info->send_link_immediate == 1) { ?>
    $('.chk_immediate').click();
    <? } else { ?>
    $('.chk_start').click();
    <? } ?>
  });
</script>
