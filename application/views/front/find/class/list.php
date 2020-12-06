<?php
foreach ($video_data as $video) {
  $cat = '';
  $categories = $this->db->get_where('teacher_video_category', array('video_id' => $video->video_id))->result();
  foreach($categories as $category) {
    $cat .= $category->category . '/';
  }
  $cat[strlen($cat) - 1] = "\0";
  ?>
  <li>
    <a href="<?php echo base_url(); ?>home/teacher/video/view/<?php echo $video->video_id; ?>">
      <div class="col-md-12 media" style="padding: 0 16px !important;">
        <div class="col-md-6 pull-left media-link" style="width: 55%; padding: 0 0 32.67% 0; position: relative; margin-right: 4%;">
          <img src="<?php echo $video->thumbnail_image_url; ?>" width="180" height="120" alt=""
               style="position: absolute; width: 100%; height: 100%; max-width: 207px; max-height: 123px;">
        </div>
        <div class="col-md-6 media-body" style="width: 46%; padding: 0;">
          <h5 class="video-title" style="margin: 0 0 8px; line-height: 1.5; font-size: 12px; font-weight: bold !important;">
            <?php echo $video->title; ?>
          </h5>
          <span style="color: saddlebrown; display:block; font-size: 10px; line-height: 1.5;"><?php echo $cat; ?></span>
          <span class="footprint" style="color: gray; display: block; color: #bdbdbd; font-size: 10px; font-weight: bold !important; line-height: 1.5 !important; padding-top: 2px;">
            <?php echo (int)($video->playtime/60).'분'; printf("%02d",$video->playtime%60);?>초&middot;조회수<?php echo $video->view;?>&middot;좋아요<?php echo $video->like;?>&middot;스크랩<?php echo $video->bookmark;?>
          </span>
        </div>
      </div>
    </a>
  </li>
<?php } ?>
