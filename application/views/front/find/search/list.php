<!--<style>-->
<!--  .img-youtube img, .img-insta img {-->
<!--    width : 20px !important;-->
<!--    height: 20px !important;-->
<!--    margin-right: 5px;-->
<!--  }-->
<!--</style>-->
<?php
if ($type == FIND_TYPE_CENTER) {
  foreach ($center_data as $center) {
    $cat = '';
    $categories = $this->db->get_where('center_category', array('center_id' => $center->center_id))->result();
    foreach($categories as $category) {
      $cat .= $category->category . '/';
    }
    $cat[strlen($cat) - 1] = "\0";
    ?>
    <li style="padding: 10px 0 10px 0 !important;">
      <a href="<?php echo base_url(); ?>home/center/profile/<?php echo $center->center_id; ?>">
        <div class="col-md-12 " style="padding: 0 20px 0 20px !important; height: 75px">
          <table class="col-md-12" style="background-color: white; width: 100%">
            <tbody>
            <tr style="height: 25px">
              <td style="width: 85%">
                <h5 class="center-title" style="margin: 0 !important;"><b><?= $center->title; ?></b></h5>
              </td>
              <td style="text-align: right">
                <?php echo $this->crud_model->sns_func_html('bookmark', 'center', $center->bookmark, $center->center_id, 20, 20); ?>
              </td>
            </tr>
            <tr style="height: 23px">
              <td style="width: 85%; padding-top: 8px;">
                <?php echo "{$center->address} {$center->address_detail}"; ?>
              </td>
              <td></td>
            </tr>
            <tr style="height: 23px">
              <td style="width: 85%">
                <span style="color: saddlebrown;"><?php echo $cat; ?></span><br>
              </td>
              <td></td>
            </tr>
            </tbody>
          </table>
        </div>
      </a>
    </li>
  <?php }
} else if ($type == FIND_TYPE_TEACHER) {
  foreach ($teacher_data as $teacher) {
    $cat = '';
    $categories = $this->db->get_where('teacher_category', array('teacher_id' => $teacher->teacher_id))->result();
    foreach($categories as $category) {
      $cat .= $category->category . '/';
    }
    $cat[strlen($cat) - 1] = "\0";
    ?>
    <div class="data--profile detail--profile clearfix">
      <a href="<?php echo base_url(); ?>home/teacher/profile/<?php echo $teacher->teacher_id; ?>" class="clearfix">
        <div class="profile_info">
          <? if (isset($teacher->profile_image_url) && !empty($teacher->profile_image_url)) { ?>
            <div class="profile_circle info_photo" style="background-image: url(<?= $teacher->profile_image_url; ?>)"></div>
          <? } else { ?>
            <div class="profile_circle info_photo" style="background-image: url(<?= $this->teacher_model->get_teacher_image(); ?>)"></div>
          <? } ?>
          <div class="info_teacher">
            <p class="teacher-name"><?= $teacher->name; ?></p>
            <p class="teacher-class"><?= $cat; ?></p>
          </div>
        </div>
      </a>
      <button class="profile_favorite">
        <?php echo $this->crud_model->sns_func_html('bookmark', 'teacher', $teacher->bookmark, $teacher->teacher_id, 20, 20); ?>
      </button>
    </div>
  <?php }
} ?>
