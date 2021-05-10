<? foreach ($classes as $class) { ?>
  <div class="detail_step clearfix">
    <div class="step_course">
      <div class="course-wrap">
        <p class="course_time">
          <?= substr($class->start_time, 0, 5); ?>
          ~
          <?= substr($class->end_time, 0, 5); ?>
        </p>
        <p class="course_teacher">
          (<?= $class->teacher_name; ?>)
          <?= $class->schedule_title; ?>
        </p>
      </div>
      <p class="course-date-detail">수업일 | <?= date('Y.m.d', strtotime($class->schedule_date)); ?></p>
    </div>
    <div class="step_book">
      <? if ($class->ticketing) { ?>
        <p class="book_proceed" id="reserve_status_<?= $class->schedule_info_id; ?>">
          예약
          <?= $class->reserve; ?>
          /
          <?= $class->reservable ? $class->reservable_number : '&infin;'; ?>
        </p>
        <p class="book_proceed" id="wait_status_<?= $class->schedule_info_id; ?>">
          대기
          <?= $class->wait; ?>
          /
          <?= $class->waitable ? $class->waitable_number : '&infin;'; ?>
        </p>
      <? } ?>
      <div class="book_btn">
        <? if ($class->ticketing) { ?>
          <button class="book_proceed book:proceed btn_val btn_sm" onclick="get_reserve_list(<?= $class->schedule_info_id; ?>)">
            예약현황
          </button>
        <? } ?>
        <button class="book_modify btn_val btn_sm" onclick="open_popSchedule(<?= $class->schedule_info_id; ?>)">수정</button>
        <button class="book_remove btn_val btn_sm" onclick="open_schedule_remove_popup(<?= $class->schedule_info_id; ?>, '<?= $class->schedule_date; ?>')">취소</button>
      </div>
    </div>
  </div>
<?php } ?>