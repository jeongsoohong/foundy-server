<?php
$redirect = base_url().'home/teacher/profile/'.$studio_data->teacher_id.'?sdate='.$class->schedule_date;
?>
<div class="popup theme:online" id="online" style="overflow-x: hidden; height: 560px; margin-top: -280px;">
  <div class="online_pop">
    <div class="popup_tit" style="padding-bottom: 68px;">
      <div class="popup_topic">
        <div class="topic_icon">
          <img src="https://dev.foundy.me/template/icon/ic_calendar.png" alt="" width="16" height="16">
        </div>
        <p class="topic_message" style="font-weight: bold !important; vertical-align: middle;">
          <span class="font-futura">
            <?= $this->studio_model->get_ampm($class->start_time); ?>
            <span class="set_time">
              <?= $this->studio_model->get_time($class->start_time); ?>
            </span>
            -
            <span class="set_time">
              <?= $this->studio_model->get_time($class->end_time); ?>
            </span>
          </span>
        </p>
      </div>
      <p style="font-weight: bold !important; color: #B0957A; font-size: 12px; letter-spacing: -0.025em; text-align: left; width: 228px; margin: 16px auto 0;">
        <span id="topic_class">
          [<?= $class->schedule_title; ?>]
        </span> 수업을 예약하시겠습니까?
      </p>
      <div class="online_wrap">
        <div class="online_box" style="height: 112px;">
          <p class="online_price">
            1 class
            <span id="price" class="font-futura">
              <?= $this->crud_model->get_price_str($class->class_price); ?>원
            </span>
          </p>
          <p class="online_talk">
            <? if ($class->use_bank == 1) { ?>
              입금계좌는 카카오 알림톡과 메일로 발송됩니다.
            <? } else { ?>
              결제 페이지는 카카오 알림톡과 메일로 발송됩니다.
            <? } ?>
          </p>
        </div>
        <dl class="online_data clearfix">
          <dt class="data_name">
            <!-- 결제URL 받을시 '결제자 정보' 로 문구변경 부탁드립니다 -->
            <? if ($class->use_bank == 1) { ?>
              입금자명
            <? } else { ?>
              결제자정보
            <? } ?>
          </dt>
          <dd class="user_info">
            <input class="info_box" id="payer_info" style="border: 1px solid #eee; background-color: #fff;">
          </dd>
        </dl>
        <div class="announce">
          <div class="announce_tit">티켓팅 유의사항</div>
          <div class="announce_cnt">
            <?= $class->reserve_popup; ?>
          </div>
        </div>
      </div>
      <p class="popup_guide" style="text-align: left; width: 228px; margin: 0 auto;">
        예약 취소는 온라인 스튜디오로 직접 문의 주세요!
      </p>
    </div>
  </div>
  <div class="confirm_btn" style="border-top: 1px solid #eee !important; box-sizing: content-box; background-color: #fff; border-radius: 0 0 4px 4px;">
    <button class="btn_no" onclick="close_reserve_popup_online()">CANCEL</button>
    <button class="btn_yes" onclick="reserve_schedule_online(<?= $class->schedule_info_id; ?>, '<?= $redirect; ?>')">OK</button>
  </div>
</div>
