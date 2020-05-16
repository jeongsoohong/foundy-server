<?php
foreach ($center_data as $center) {
  $cat = '';
  $categories = $this->db->get_where('center_category', array('center_id' => $center->center_id))->result();
  foreach($categories as $category) {
    $cat .= $category->category . '/';
  }
  $cat[strlen($cat) - 1] = "\0";
  ?>
  <a href="<?php echo base_url(); ?>home/center/profile/<?php echo $center->center_id; ?>">
    <li style="padding: 10px 0 10px 0 !important;">
      <div class="col-md-12 " style="padding: 0 5px 0 5px !important; height: 75px">
        <div class="col-md-9 pull-left media-link" style="padding: 0 5px 0 5px; width: 80%;">
          <!--<div class="col-md-12 video-title" style="font-size: 12px; height:60px; text-align: center"> -->
          <h5 class="center-title"><?php echo $center->title; ?></h5>
          <!--</div>-->
          <!--<div class="col-md-12 pull-right video-detail" style="font-size: 12px; height:20px;"> -->
          <span style="color: saddlebrown;"><?php echo $cat; ?></span><br>
          <!--</div>-->
        </div>
        <div class="col-md-3 media-body" style="padding: 0 5px 0 5px !important">
<!--          <span class="pull-right" style="padding: 20px 10px 0 0; ">-->
<!--          <img src="--><?php //echo base_url().'uploads/icon/heart icon_do.png'; ?><!--" width="15" height="15" alt="" style="padding: 0 0 0 0 !important;">-->
<!--          </span>-->
        </div>
      </div>
    </li>
  </a>
<?php } ?>
