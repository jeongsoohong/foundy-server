<style>
  .profile div select.form-control {
    width: 90px !important;
    height: 30px !important;
    font-size: 12px !important;
    padding: 0 0 0 0 !important;
    text-align-last: center;
    border: none;
  }
  .select-arrow {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    /* Some browsers will not display the caret when using calc, so we put the fallback first */
    background: url("<?php echo base_url(); ?>uploads/icon/arrow_down.png") white no-repeat 100% !important; /* !important used for overriding all other customisations */
  }
  /*For IE*/
  select::-ms-expand { display: none; }
</style>
<!-- PAGE -->
<section class="page-section with-sidebar" style="padding-top: 10px !important;">
  <!-- /CONTENT -->
  <div class="container">
    <div class="row">

      <?php if (!empty($bookmarks) && count($bookmarks) > 0) { ?>
        <!-- bookmark -->
        <div class="col-md-12 content" id="content" style="margin-bottom: 10px !important; background-color: white !important;">
          <div id="blog-content">
            <div class="col-md-12" style="padding: 0 0 0 0 !important; ">
              <div class="row">
                <div class="col-md-12" style="padding: 0 0 0 0 !important;">
                  <div class="profile" style="font-size: 15px; padding: 5px 10px 5px 10px !important;">
                    <span>스크랩</span>
                  </div>
                </div>
                <div class="widget widget-categories" style="padding-bottom:10px; ">
                  <ul class="bookmark_video_ul">
                    <?php
                    foreach ($bookmarks as $video) {
                      $c = '';
                      $cats = $this->db->get_where('teacher_video_category', array('video_id' => $video->video_id))->result();
                      foreach($cats as $cat) {
                        $c .= $cat->category . '/';
                      }
                      $c[strlen($c) - 1] = "\0";
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
                              <span style="color: saddlebrown;"><?php echo $c; ?></span><br>
                              <span style="color: gray;"> <?php echo (int)($video->playtime/60).'분'; printf("%02d",$video->playtime%60);?>초&middot;조회수<?php echo $video->view;?>&middot;좋아요<?php echo $video->like;?>&middot;스크랩<?php echo $video->bookmark;?></span>
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
        </div>
      <?php } ?>

      <!-- online class -->
      <div class="col-md-12 content" id="content" style="background-color: white !important;">
        <div id="blog-content">
          <div class="col-md-12" style="padding: 0 0 0 0 !important; ">
            <div class="row">
              <div class="col-md-12" style="padding: 0 0 0 0 !important;">
                <div class="profile" style="font-size: 15px; padding: 5px 10px 5px 10px !important;">
                  <span>포잇 추천 클래스</span>
                  <div class="pull-right" style="width: 80px; margin-right: 10px;">
                    <!--                    <i class="pull-right fa fa-angle-down" style="color: #737475; font-family: FontAwesome !important; padding-top: 8px;"> </i>-->
                    <select class="form-control select-arrow" id="class_category" name="class_category">
                      <option value="ALL" selected="selected">ALL</option>
                      <?php
                      $categories = $this->db->order_by('category_id', 'asc')->get_where('category_class', array('activate' => 1))->result();
                      foreach ($categories as $cat) {
                        ?>
                        <option value="<?php echo $cat->name; ?>"><?php echo $cat->name; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="widget widget-categories" style="padding-bottom:10px; ">
                  <ul class="video_ul">

                    <!-- ajax_class_list() -->
                    <!-- /ajax_class_list() -->

                  </ul>
                </div>
              </div>
            </div>
          </div>

          <p style="text-align: center;">
            <a class="btn btn-lg btn-primary" id="view_more" href="#none" onclick="ajax_class_list(); return false;" role="button" style="display: none; font-family: 'Quicksand' !important; font-size: 15px; color: gray; background-color: inherit; border: 1px solid #d3d3d3">
              view more
            </a>
          </p>
        </div>
        <!-- /online class -->
      </div>
    </div>
    <!-- /CONTENT -->
</section>
<!-- /PAGE -->
<!--<label>-->
<!--  <input id="page_num" type="hidden" value="0"/>-->
<!--</label>-->
<script>
  var page = 0;
  var filter = '';

  function ajax_class_list() {

    page = page + 1;

    // console.log('page : ' + page + ', filter : ' + filter);

    $.ajax({
      url: "<?php echo base_url().'home/find/class/list?page='; ?>" + page + '&filter=' + filter,
      type: 'GET', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      success: function(data) {
        $('.video_ul').append(data);
        // console.log($(".video_ul a li").length % 10);

        var listCnt = $(".video_ul a li").length;
        if ( listCnt === 0 || listCnt % 10 !== 0) {
          $('#view_more').hide();
        } else {
          $('#view_more').show();
        }
        // console.log(listCnt);
      },
      error: function(e) {
        console.log(e)
      }
    });

    // $('#page_num').val(page);

  }

  $(function() {
    $("#class_category").change(function() {
      // console.log(this.value);
      page = 0;
      filter = this.value;
      $('#view_more').hide();
      $('.video_ul a').remove();
      ajax_class_list();
    });
  })

  $(document).ready(function(){
    page = 0;
    filter = $("#class_category option:selected").val();

    active_menu_bar('find');
    ajax_class_list();
  });
</script>
