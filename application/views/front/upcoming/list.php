<?php
function get_week_str($week) {
  switch($week) {
    case 0 : return 'SUN';
    case 1 : return 'MON';
    case 2 : return 'TUE';
    case 3 : return 'WED';
    case 4 : return 'THU';
    case 5 : return 'FRI';
    case 6 : return 'SAT';
  }
  return '';
}
function get_ampm($time) {
  return ($time < '12:00:00' ? 'am' : 'pm');
}
function get_time($time) {
  return ($time <= '12:00:00' ? substr($time, 0, 5) : substr(date('H:i:s', strtotime($time) - 12 * ONE_HOUR), 0, 5));
}
?>
<? if ($type == FIND_TYPE_CENTER) { ?>
  <?php foreach ($upcoming_class as $class) {?>
    <? if ($class->reserve == 1) { ?>
      <div class="upcoming_schedule">
        <div class="schedule_type">
          <div class="type_today" style="background-color: #000 !important;">
            <p class="font-futura today_date"><?= get_week_str($class->schedule_info->week); ?><br><span class="date_no"><?= date('j', strtotime($class->schedule_info->schedule_date)); ?></span>일</p>
          </div>
          <p class="type_info">
            <span class="font-futura day_morning">
              <?= get_ampm($class->schedule_info->start_time); ?>
            </span>
            <span class="font-futura time_start">
              <?= get_time($class->schedule_info->start_time); ?>
            </span>
            <br>~
            <span class="font-futura day_afternoon">
              <?= get_ampm($class->schedule_info->end_time); ?>
            </span>
            <span class="font-futura time_end">
              <?= get_time($class->schedule_info->end_time); ?>
            </span>
          </p>
          <div class="type_name clearfix">
            <p class="name_class">
              <?= $class->schedule_info->schedule_title; ?>
            </p>
            <p class="name_center">
              <?= $class->center_info->title; ?>
            </p>
          </div>
        </div>
        <button class="type_cancel" onclick="open_cancel_popup(<?= $class->schedule_info_id; ?>)">
          <img src="<?= base_url(); ?>template/icon/ic_cancel_v2.png" width="40" height="40">
        </button>
      </div>
    <? } else { ?>
      <div class="upcoming_schedule wait_schedule">
        <div class="schedule_type">
          <div class="type_today">
            <p class="font-futura today_date"><?= get_week_str($class->schedule_info->week); ?><br><span class="date_no"><?= date('j', strtotime($class->schedule_info->schedule_date)); ?></span>일</p>
          </div>
          <p class="type_info">
            <span class="font-futura day_morning">
              <?= get_ampm($class->schedule_info->start_time); ?>
            </span>
            <span class="font-futura time_start">
              <?= get_time($class->schedule_info->start_time); ?>
            </span>
            <br>~
            <span class="font-futura day_afternoon">
              <?= get_ampm($class->schedule_info->end_time); ?>
            </span>
            <span class="font-futura time_end">
              <?= get_time($class->schedule_info->end_time); ?>
            </span>
          </p>
          <div class="type_name clearfix">
            <p class="name_class">
              <?= $class->schedule_info->schedule_title; ?>
            </p>
            <p class="name_center">
              <?= $class->center_info->title; ?>
            </p>
          </div>
        </div>
        <button class="type_cancel" onclick="open_cancel_popup(<?= $class->schedule_info_id; ?>)">
          <img src="<?= base_url(); ?>template/icon/ic_cancel_v2.png" width="40" height="40">
        </button>
        <p id="waitClass">대기 <span><?= $class->wait_number; ?></span></p>
      </div>
    <? } ?>
  <?php } ?>
<? } else if ($type == FIND_TYPE_TEACHER) { ?>
  <?php foreach ($upcoming_class as $class) {?>
    <div class="upcoming_schedule">
      <div class="schedule_type">
        <div class="type_today" style="background-color: #000 !important;">
          <p class="font-futura today_date"><?= get_week_str($class->schedule_info->week); ?><br><span class="date_no"><?= date('j', strtotime($class->schedule_info->schedule_date)); ?></span>일</p>
        </div>
        <p class="type_info">
          <span class="font-futura day_morning">
            <?= get_ampm($class->schedule_info->start_time); ?>
          </span>
          <span class="font-futura time_start">
            <?= get_time($class->schedule_info->start_time); ?>
          </span>
          <br>~
          <span class="font-futura day_afternoon">
            <?= get_ampm($class->schedule_info->end_time); ?>
          </span>
          <span class="font-futura time_end">
            <?= get_time($class->schedule_info->end_time); ?>
          </span>
        </p>
        <div class="type_name clearfix">
          <p class="name_class">
            <?= $class->schedule_info->schedule_title; ?>
          </p>
          <p class="name_center">
            <?= $class->studio_info->title; ?>
          </p>
        </div>
      </div>
      <button class="type_cancel" onclick="open_link_popup(<?= $class->schedule_info->schedule_info_id; ?>)">
        <? if (isset($class->schedule_info->class_link) && empty($class->schedule_info->class_link) == false) { ?>
          <img src="<?= base_url(); ?>template/icon/ic_upcoming_linked.png" width="40" height="40">
        <? } else { ?>
          <img src="<?= base_url(); ?>template/icon/ic_upcoming_confirmed.png" width="40" height="40">
        <? } ?>
      </button>
    </div>
  <?php } ?>
<? } ?>
