<style>
  .main-fav-content {
    margin: 0 0 10px 0;
    padding-left: 15px;
    padding-right: 15px;
  }
  .main-fav-content .view,.schedule {
    margin-top: 6px;
    margin-bottom: 6px;
    padding-left: 5px;
    padding-right: 5px;
    height: 26px;
    line-height: 26px !important;
    border: 1px solid grey;
  }
  .main-nav div:hover {
    background-color: #6E6360;
  }
</style>
<table class="col-md-12" style="background-color: white; width: 100%">
  <tbody>
  <?php if (empty($bookmark_centers) && empty($bookmark_teachers)) { ?>
    <tr style="height: 60px">
      <td style="padding: 0 20px 0 20px; width: 85%">
        당신의 건강한 라이프를 시작해보세요!<br>
        <a href="<?php echo base_url(); ?>home/find"><u>지금 찾으러 가기 ></u></a>
      </td>
      <td style="text-align: center">
        <img src="<?php echo base_url().'uploads/icon_0504/icon12_star.png'; ?>" alt='' style="width:20px !important; height: 20px !important;">
      </td>
    </tr>
    <?php
  } else {
    foreach ($bookmark_centers as $center) {
      ?>
      <tr style="height: 68px" class="favorite_studio">
        <td style="padding: 14px 16px; font-size: 11px; font-weight: bold; line-height: 1.75; color: #9e9e9e;">
          스튜디오
          <br><span style="display: block; font-size: 13px; color: #333;"><?php echo $center->title; ?></span>
        </td>
        <td style="width: 32px; text-align: right;">
          <a href="<?php echo base_url().'home/center/profile/'.$center->center_id.'?nav=schedule'; ?>">
            <div style="width: 32px; height: 32px; border-radius: 50%; background-color: #8B5949; line-height: 32px; text-align: center;">
              <img src="<?php echo base_url(); ?>template/icon/ic_calendar.png" width="16" height="16" style="margin-bottom: 6px;">
            </div>
          </a>
        </td>
        <td style="text-align: center;">
          <?php echo $this->crud_model->sns_func_html('bookmark', 'center', true, $center->center_id, 20, 20); ?>
        </td>
      </tr>
    <?php }
    foreach ($bookmark_teachers as $teacher) {
      ?>
      <tr style="height: 68px" class="favorite_studio">
        <td style="padding: 14px 16px; font-size: 11px; font-weight: bold; line-height: 1.75; color: #9e9e9e;">
          강사
          <br><span style="display: block; font-size: 13px; color: #333;"><?php echo $teacher->name; ?></span>
        </td>
        <td style="width: 32px; text-align: right;">
          <a href="<?php echo base_url().'home/teacher/profile/'.$teacher->user_id.'?nav=schedule'; ?>">
            <div style="width: 32px; height: 32px; border-radius: 50%; background-color: #8B5949; line-height: 32px; text-align: center;">
              <img src="<?php echo base_url(); ?>template/icon/ic_calendar.png" width="16" height="16" style="margin-bottom: 6px;">
            </div>
          </a>
        </td>
        <td style="text-align: center;">
          <?php echo $this->crud_model->sns_func_html('bookmark', 'teacher', true, $teacher->teacher_id, 20, 20); ?>
        </td>
      </tr>
      <?php
    }
  }
  ?>
  </tbody>
</table>
