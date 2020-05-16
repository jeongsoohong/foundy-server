<table class="col-md-12" style="width: 100%">
  <?php
  foreach ($schedule_data as $schedule) {
  $schedule_id = $schedule->schedule_id;
  $start_time = substr($schedule->start_time, 0, 5);
  $end_time = substr($schedule->end_time, 0, 5);
  $teacher_name = $schedule->teacher_name;
  $title = $schedule->title;
  ?>
  <tbody style="margin-bottom: 10px">
  <tr style="height: 40px !important;">
    <th class="col-md-3" style="padding-left: 0; padding-right: 0; width: 22%"><?php echo $start_time; ?>-<?php echo $end_time; ?></th>
    <td class="col-md-7" style="padding-left: 0px; padding-right: 0; width: auto">(<?php echo $teacher_name; ?>) <?php echo $title; ?></td>
    <td class="col-md-2" style="padding-left: 5px; padding-right: 5px; width: 40px !important;">
      <a href="<?php echo base_url().'home/center/schedule/mod?cid='.$center_data->center_id.'&sid='.$schedule_id; ?>">
        <span class="schedule-edit pull-right" id="<?php echo $schedule_id; ?>">수정></span>
      </a>
    </td>
  </tr>
  </tbody>
  <?php
}
?>
</table>
