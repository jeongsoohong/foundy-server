<? foreach ($teachers as $teacher) { ?>
  <div class="data--profile detail--profile clearfix">
    <a href="<?= base_url().'home/teacher/profile/'.$teacher->teacher_id; ?>" class="clearfix">
      <div class="profile_info">
        <? if (isset($teacher->profile_image_url) && !empty($teacher->profile_image_url)) { ?>
          <div class="profile_circle info_photo" style="background-image: url(<?= $teacher->profile_image_url; ?>)"></div>
        <? } else { ?>
          <div class="profile_circle info_photo" style="background-image: url(<?= $this->teacher_model->get_teacher_image(); ?>)"></div>
        <? } ?>
        <div class="info_teacher">
          <p class="teacher-name"><?= $teacher->name; ?></p>
          <?php
          $cat = '';
          $categories = $this->db->get_where('teacher_category', array('teacher_id' => $teacher->teacher_id))->result();
          foreach($categories as $category) {
            $cat .= $category->category . '/';
          }
          $cat[strlen($cat) - 1] = "\0";
          ?>
          <p class="teacher-class"><?= $cat; ?></p>
        </div>
      </div>
    </a>
    <button class="profile_favorite">
      <!--                      <img class="center-bookmark-13" src="https://dev.foundy.me/uploads/icon_0504/icon13_star.png" alt="" width="24" height="24">-->
      <?php echo $this->crud_model->sns_func_html('bookmark', 'teacher', $teacher->bookmark, $teacher->teacher_id, 24, 24); ?>
    </button>
  </div>
<? } ?>
