<? foreach ($classes as $class) { ?>
<div class="detail_step clearfix">
  <div class="step_course">
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
<? } ?>
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
</script>
