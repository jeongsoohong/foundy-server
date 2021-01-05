<?php
function get_ampm($time) {
  return ($time < '12:00:00' ? 'am' : 'pm');
}
function get_time($time) {
  return ($time <= '12:00:00' ? substr($time, 0, 5) : substr(date('H:i:s', strtotime($time) - 12 * ONE_HOUR), 0, 5));
}
?>
<!-- 취소가능 시간대에 취소버튼 클릭시 -->
<div class="popup theme:alt_cancel" id="canceling">
  <div class="popup_tit" style="padding-top: 40px;">
    <div class="popup_topic">
      <div class="topic_icon" style="background-color: #9C8F92;">
        <img src="<?= base_url(); ?>template/icon/ic_calendar.png" alt="" width="16" height="16">
      </div>
      <p class="topic_message" style="font-weight: bold !important; color: #9C8F92; vertical-align: middle;">
        <span class="font-futura">
          <?= get_ampm($class->start_time); ?>
          <span class="set_time">
            <?= get_time($class->start_time); ?>
          </span>
          -
          <span class="set_time">
            <?= get_time($class->end_time); ?>
          </span>
        </span>
    </div>
    <p style="font-weight: bold !important; color: #9C8F92; font-size: 12px; letter-spacing: -0.025em; text-align: left; width: 228px; margin: 16px auto 0;">
      <span id="topic_class">
        [<?= $class->schedule_title; ?>]
      </span>
      수업을 취소하시겠습니까?
    </p>
  </div>
  <div class="confirm_btn">
    <button class="btn_no" onclick="close_cancel_popup()">CANCEL</button>
    <button class="btn_yes" onclick="cancel_schedule(<?= $class->schedule_info_id; ?>)">OK</button>
  </div>
</div>
