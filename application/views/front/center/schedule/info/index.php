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
  <tr style="height: 40px !important; padding-left: 15px; padding-right: 15px;">
    <th class="col-md-3" style="padding-left: 0; padding-right: 0; width: 22%"><?php echo $start_time; ?>-<?php echo $end_time; ?></th>
    <td class="col-md-7" style="padding-left: 0px; padding-right: 0; width: auto">(<?php echo $teacher_name; ?>) <?php echo $title; ?></td>
    <?php if ($iam_this_center == true) { ?>
    <td class="col-md-2" style="padding-left: 5px; padding-right: 10px; width: 40px !important;">
      <a href="javascript:void(0);">
        <span class="pull-right center-edit" data-target="schedule-edit" id="<?php echo $schedule_id; ?>" onclick="openPop($(this))">
          <img src="<?php echo base_url(); ?>uploads/icon/dots.png" alt="" style="width: 10px !important; height: 10px !important;">
<!--          <i class="fa fa-ellipsis-v"></i>-->
        </span>
      </a>
    </td>
    <?php } ?>
  </tr>
  </tbody>
  <?php
}
?>
</table>
