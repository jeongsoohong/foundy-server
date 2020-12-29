<table class="table_weeks">
  <colgroup>
    <col width="14.28%">
    <col width="14.28%">
    <col width="14.28%">
    <col width="14.28%">
    <col width="14.28%">
    <col width="14.28%">
    <col width="14.28%">
  </colgroup>
  <thead>
  <tr class="clearfix">
    <th class="sun">일</th>
    <th>월</th>
    <th>화</th>
    <th>수</th>
    <th>목</th>
    <th>금</th>
    <th>토</th>
  </tr>
  </thead>
</table>
</table>
<table class="table_days">
  <colgroup>
    <col width="14.28%">
    <col width="14.28%">
    <col width="14.28%">
    <col width="14.28%">
    <col width="14.28%">
    <col width="14.28%">
    <col width="14.28%">
  </colgroup>
  <tbody>
  <style>
    .grey {
      color: #EAEAEA !important;
    }
  </style>
  <!-- 총 주차를 반복합니다. -->
  <?php
  for ($day = 1, $i = 0; $i < $total_week; $i++) { ?>
    <tr>
      <!-- 1일부터 7일 (한 주) -->
      <?php for ($week = 0; $week < 7; $week++) { ?>
        <td>
          <div class="days-wrap clearfix">
            <?php
            if ($i == 0 && $week < $start_week) {
              $d = ($last_month_total_day - ($start_week - $week) + 1);
              $m = $month - 1;  $y = $year;
              if ($m <= 0) { $m = 12; $y = $year - 1; }
              $grey = true;
            } else if ($day <= $total_day) {
              $d = $day; $m = $month; $y = $year;
              $day += 1;
              $grey = false;
            } else {
              $d = $day % $total_day;
              $m = $month + 1; $y = $year;
              if ($m >= 13) { $m = 1; $y = $year + 1; }
              $day += 1;
              $grey = true;
            }
            ?>
            <p class="<?php if ($grey) {echo 'grey'; } elseif ($week == 0) { echo 'sun'; } ?>">
              <?php
              echo $d;
              ?>
            </p>
            <?php if ($week == 0) { ?>
              <p class="holiday"></p>
            <?php } ?>
          </div>
          <?
          $where = array('center_id' => $center_id, 'schedule_date' => "{$y}-{$m}-{$d}", 'activate' => 1);
          $schedules = $this->db->order_by('start_time', 'asc')->get_where('center_schedule_info', $where)->result();
          ?>
          <? if (empty($schedules) == false) { ?>
            <div class="case-time" data-id="<?= $schedules[0]->schedule_date ?>" id="schedule_info_<?= $schedules[0]->schedule_date; ?>">
              <? foreach ($schedules as $schedule) { ?>
                <p class="time-class <? if ($grey) echo 'grey'; ?>">
                  <?= substr($schedule->start_time, 0, 5); ?>
                  ~
                  <?= substr($schedule->end_time, 0, 5); ?></p>
              <? } ?>
            </div>
          <? } ?>
        </td>
      <?php
      } ?>
    </tr>
  <?php
  } ?>
  </tbody>
</table>
<script>
  $('#schedule_list').html('');
  $(function() {
    // case-time 클릭 이벤트
    $('.case-time').click(function(){
      let date = $(this).data('id');
      let _y = date.substr(0, 4);
      let _m = date.substr(5, 2);
      let _d = date.substr(8, 2);
      day = parseInt(_d);
      if (parseInt(_m) !== month) {
        let w = 0;
        if (parseInt(_m) > month) {
          if (parseInt(_y) !== year) {
            w = -1;
          } else {
            w = 1;
          }
        } else {
          if (parseInt(_y) !== year) {
            w = 1;
          } else {
            w = -1;
          }
        }
        get_schedule_calendar(w);
      } else {
        let target = $('#schedule_list');
        get_page('schedule_list', '<?= base_url(); ?>center/teacher/schedule/list?date=' + date , true);
        target.show();
        $('#focus_date').text(_y+ '.' + _m + '.' + _d);
      }
      // console.log(day);
    })
    <? if ($open_date != null) { ?>
    $('#schedule_info_<?= $open_date; ?>').click();
    <? } ?>
  });
</script>
