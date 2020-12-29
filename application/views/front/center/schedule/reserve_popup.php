<?php
function get_ampm($time) {
  return ($time < '12:00:00' ? 'am' : 'pm');
}
function get_time($time) {
  return ($time <= '12:00:00' ? substr($time, 0, 5) : substr(date('H:i:s', strtotime($time) - 12 * ONE_HOUR), 0, 5));
}
?>
<div class="popup theme:book">
  <div class="popup_tit">
    <div class="popup_topic">
      <div class="topic_icon">
        <img src="<?= base_url(); ?>template/icon/ic_calendar.png" alt="" width="16" height="16">
      </div>
      <p class="topic_message" style="font-weight: bold !important;">
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
        <br>
        <span id="topic_class">
            [<?= $class->schedule_title; ?>]
          </span>
        수업을
        <br>예약하시겠습니까?
      </p>
    </div>
    <div id="choice">
      <select>
        <? foreach ($tickets as $ticket) { ?>
          <option value="<?= $ticket->ticket_id ?>"><?= $ticket->ticket_title; ?></option>
        <? } ?>
      </select>
    </div>
    <p class="popup_guide" style="text-align: left; width: 220px; margin: 0 auto;">
      예약 취소는 수업 시작
      <span class="font-futura">
        <?= $class->reserve_cancel_close_hour; ?>
      </span>
      시간 전까지만 가능하며, 그 이후의 취소는 센터로 직접 문의 주세요!
    </p>
  </div>
  <div class="confirm_btn">
    <button class="btn_no" onclick="close_reserve_popup()">CANCEL</button>
    <button class="btn_yes" onclick="reserve_schedule(<?= $class->schedule_info_id; ?>, <?= $ticket->member_id; ?>)">OK</button>
  </div>
</div>
