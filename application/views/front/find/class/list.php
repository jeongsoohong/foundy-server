<?php foreach ($video_data as $video) {
  $cat = '';
  $categories = $this->db->get_where('teacher_video_category', array('video_id' => $video->video_id))->result();
  foreach($categories as $category) {
    $cat .= $category->category . '/';
  }
  $cat[strlen($cat) - 1] = "\0";
  ?>
  <a href="<?php echo base_url(); ?>home/teacher/video/view/<?php echo $video->video_id; ?>">
    <li style="padding: 10px 0 10px 0 !important;">
      <div class="col-md-12 media" style="padding: 0 5px 0 5px !important;">
        <div class="col-md-6 pull-left media-link" style="width: 190px; height: 120px; padding: 0 5px 0 5px !important;">
          <img src="<?php echo $video->thumbnail_image_url; ?>" width="180" height="120" alt="" style="padding: 0 0 0 0 !important;">
        </div>
        <div class="col-md-6 media-body" style="padding: 0 5px 0 5px; width: 300px; height: 120px">
          <!--<div class="col-md-12 video-title" style="font-size: 12px; height:60px; text-align: center"> -->
          <h5 class="video-title"><?php echo $video->title; ?></h5>
          <!--</div>-->
          <!--<div class="col-md-12 pull-right video-detail" style="font-size: 12px; height:20px;"> -->
          <span style="color: saddlebrown;"><?php echo $cat; ?></span><br>
          <span style="color: gray;"> <?php echo (int)($video->playtime/60).'분'; printf("%02d",$video->playtime%60);?>초&middot;조회수<?php echo $video->view;?>&middot;스크랩<?php echo $video->bookmark;?></span>
          <!--</div>-->
        </div>
      </div>
    </li>
  </a>
<?php } ?>
