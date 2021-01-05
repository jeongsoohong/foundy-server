<?
function get_ampm($time) {
  return ($time < '12:00:00' ? 'am' : 'pm');
}
function get_time($time) {
  return ($time <= '12:00:00' ? substr($time, 0, 5) : substr(date('H:i:s', strtotime($time) - 12 * ONE_HOUR), 0, 5));
}
$test = true;
if ($test || empty($schedules) == false) { ?>
  <style>
    .type_info {
      margin: 0 !important;
      letter-spacing: -0.05em;
      font-size: 13.5px;
    }
    .type_info .font-futura {
      font-weight: 400 !important;
    }
    .type_class {
      position: absolute;
      top: 19px;
      left: 86px;
    }
    #waitClass {
      position: absolute;
      bottom: 12px;
      right: 13px;
      margin: 0;
      font-size: 11px;
      font-weight: bold;
      color: #d32f2f;
      z-index: 2;
    }
    .disabled .type_info,
    .disabled .class_name,
    .disabled .calss_teacher {
      color: #9e9e9e;
    }
    #card .card_class {
      padding: 0 20px;
      height: 80px;
      display: table;
      width: 100%;
    }
    #card .type_info {
      font-size: 12.5px;
      line-height: 1.5;
    }
    #card .type_class {
      position: unset;
      width: 50%;
      margin-left: 12px;
    }
    #card .class_name {
      font-size: 12px;
      margin: 0 !important;
    }
    #card .class_box {
      position: relative;
      display: table-cell;
      vertical-align: middle;
    }
    #card .type_btn {
      margin: auto;
      top: -13px;
      bottom: 0;
    }
  </style>
  <div class="col-md-12 card_plan" style="padding: 0;" id="card">
    <div class="card_wrap">
      <? foreach ($schedules as $schedule) { ?>
        <? if (empty($schedule->reserve_info) == false) { ?>
          <!-- 예약/대기중 -->
          <div class="card_class">
            <div class="class_box">
              <p class="type_info">
              <span class="font-futura day_morning">
                <?= get_ampm($schedule->start_time); ?>
              </span>
                <span class="font-futura time_start">
                <?= get_time($schedule->start_time); ?>
              </span>
                <br>~
                <span class="font-futura day_afternoon">
                <?= get_ampm($schedule->end_time); ?>
              </span>
                <span class="font-futura time_end">
                <?= get_time($schedule->end_time); ?>
              </span>
              </p>
              <div class="type_class">
                <p class="class_name"><?= $schedule->schedule_title; ?></p>
                <p class="class_teacher"><?= $schedule->teacher_name; ?></p>
              </div>
            </div>
            <button class="type_btn btn_off" onclick="open_cancel_popup(<?= $schedule->schedule_info_id; ?>)">
              <img src="<?= base_url(); ?>template/icon/ic_wait.png" width="40" height="40">
            </button>
            <? if ($schedule->reserve_info->wait) { ?>
              <p id="waitClass">대기 <span><?= $schedule->reserve_info->wait_cnt; ?></span></p>
            <? } ?>
          </div>
        <? } else if($schedule->reservable) { ?>
          <!-- 예약하기 -->
          <div class="card_class">
            <div class="class_box">
              <p class="type_info">
              <span class="font-futura day_morning">
                <?= get_ampm($schedule->start_time); ?>
              </span>
                <span class="font-futura time_start">
                <?= get_time($schedule->start_time); ?>
              </span>
                <br>~
                <span class="font-futura day_afternoon">
                <?= get_ampm($schedule->end_time); ?>
              </span>
                <span class="font-futura time_end">
                <?= get_time($schedule->end_time); ?>
              </span>
              </p>
              <div class="type_class">
                <p class="class_name"><?= $schedule->schedule_title; ?></p>
                <p class="class_teacher"><?= $schedule->teacher_name; ?></p>
              </div>
            </div>
            <button class="type_btn btn_on" onclick="open_reserve_popup(<?= $schedule->schedule_info_id; ?>)">
              <img src="<?= base_url(); ?>template/icon/ic_book.png" width="40" height="40">
            </button>
          </div>
        <? } else { ?>
          <!-- 예약불가 -->
          <div class="card_class disabled">
            <div class="class_box">
              <p class="type_info">
              <span class="font-futura day_morning">
                <?= get_ampm($schedule->start_time); ?>
              </span>
                <span class="font-futura time_start">
                <?= get_time($schedule->start_time); ?>
              </span>
                <br>~
                <span class="font-futura day_afternoon">
                <?= get_ampm($schedule->end_time); ?>
              </span>
                <span class="font-futura time_end">
                <?= get_time($schedule->end_time); ?>
              </span>
              </p>
              <div class="type_class">
                <p class="class_name"><?= $schedule->schedule_title; ?></p>
                <p class="class_teacher"><?= $schedule->teacher_name; ?></p>
              </div>
            </div>
            <button class="type_btn btn_on" onclick="unreservable_schedule()">
              <img src="<?= base_url(); ?>template/icon/ic_disabled.png" width="40" height="40">
            </button>
          </div>
        <? } ?>
      <? } ?>
    </div>
    <? if (false) {  // more가 필요할 때 ?>
      <div class="card_hide hide_1" style="display: none;">
        <div class="card_class">
          <p class="type_info">
            <span class="font-futura day_part">pm</span> <span class="font-futura time_no">7:00 <br>~ 8:00</span>
          </p>
          <div class="type_class">
            <p class="class_name">빈야사</p>
            <p class="class_teacher">샤일라</p>
          </div>
          <button class="type_btn btn_on">
            <img src="<?php echo base_url(); ?>template/icon/ic_cancel_on.png" width="40" height="40">
          </button>
        </div>
        <div class="card_class">
          <p class="type_info">
            <span class="font-futura day_part">pm</span> <span class="font-futura time_no">7:00 <br>~ 8:00</span>
          </p>
          <div class="type_class">
            <p class="class_name">리프레쉬 릴렉스</p>
            <p class="class_teacher">샤일라</p>
          </div>
          <button class="type_btn btn_off">
            <img src="<?php echo base_url(); ?>template/icon/ic_cancel_off.png" width="40" height="40">
          </button>
        </div>
      </div>
    <? } ?>
    <? if (false) { ?>
      <button class="font-futura btn_more">MORE</button>
    <? } ?>
  </div>
<? } ?>
