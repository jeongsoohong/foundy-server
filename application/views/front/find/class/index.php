<!-- PAGE -->
<section class="page-section with-sidebar">
  <div class="container">
    <div class="row">
      <!-- CONTENT -->
      <div class="col-md-12 content" id="content">
        <div id="blog-content">

          <!-- online class -->
          <div class="col-md-12" style="padding: 0 0 0 0 !important;">
            <div class="row">
              <div class="col-md-12" style="padding: 0 0 0 0 !important;">
                <div class="profile" style="font-size: 15px; padding: 5px 10px 5px 10px !important;">
                  <span>포잇 추천 클래스</span>
                  <div class="pull-right">명상</div>
                </div>
                <div class="widget widget-categories" style="padding-bottom:10px; ">
                  <ul class="video_ul">
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
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- /online class -->
          <p id = "view_more" style="text-align: center;">
            <a class="btn btn-lg btn-primary" href="#none" onclick="ajax_class_list(); return false;" role="button" style="font-family: 'Quicksand' !important; font-size: 15px; color: gray; background-color: inherit; border: 1px solid #d3d3d3">
              view more
            </a>
          </p>
      </div>
      <!-- /CONTENT -->
    </div>
  </div>
</section>
<!-- /PAGE -->
<label>
  <input id="page_num" type="hidden" value="1"/>
</label>
<script>
  function ajax_class_list() {

    var page = Number($('#page_num').val());
    page = page + 1;

    $.ajax({
      url: "<?php echo base_url().'home/find/class/list?page='; ?>" + page,
      type: 'GET', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      success: function(data) {
        $('.video_ul').append(data);
        // console.log($(".video_ul a li").length % 10);

        if ($(".video_ul a li").length % 10 !== 0) {
          $('#view_more').hide();
        }
      },
      error: function(e) {
        console.log(e)
      }
    });

    $('#page_num').val(page);

  }

  $(document).ready(function(){
    active_menu_bar('find');
  });
</script>
