<? foreach ($videos as $video) {
  $cat = '';
  $categories = $this->db->get_where('teacher_video_category', array('video_id' => $video->video_id))->result();
  foreach($categories as $category) {
    $cat .= $category->category . '/';
  }
  $cat[strlen($cat) - 1] = "\0";
  ?>
  <div class="video_cnt">
    <a href="<?= base_url(); ?>home/teacher/video/view/<?= $video->video_id; ?>" class="clearfix">
      <div class="col-md-12 media clearfix">
        <div class="col-md-6 pull-left media-link">
          <img src="<?= $video->thumbnail_image_url; ?>" width="180" height="120" alt="">
        </div>
        <div class="col-md-6 media-body">
          <p class="video-title">
            <?= $video->title; ?>
          </p>
          <span class="classType"><?= $video->title; ?></span>
          <span class="footprint">
            <?= (int)($video->playtime/60); ?>분<?= $video->playtime%60;?>초&middot;조회수<?= $video->view; ?>&middot;좋아요<?= $video->like; ?>&middot;스크랩<?= $video->bookmark; ?>
          </span>
        </div>
      </div>
    </a>
    <div class="media-btn">
      <button class="stu_btn btn_revise youtube_revise" onclick="get_youtube(<?= $video->video_id; ?>)">관리</button>
      <button class="stu_btn btn_remove youtube_delete" onclick="open_unregister_youtube(<?= $video->video_id; ?>)">삭제</button>
    </div>
  </div>
<? } ?>
