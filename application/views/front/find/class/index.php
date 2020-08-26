<style>
  .profile div select.form-control {
    width: 100% !important;
    height: 30px !important;
    font-size: 12px !important;
    padding: 0 0 0 0 !important;
    text-align-last: right;
    border: none;
    direction: rtl;
  }
  select option {
    direction: ltr;
  }
  .img-youtube img, .img-insta img {
    width : 20px !important;
    height: 20px !important;
    margin-right: 5px;
  }
</style>
<!-- PAGE -->
<section class="page-section with-sidebar" style="padding-top: 0 !important; padding-bottom: 0 !important; background-color: white">
  <!-- /CONTENT -->
  <div class="container">
    <div class="row">

      <?php if (!empty($bookmarks) && count($bookmarks) > 0) { ?>
        <!-- bookmark -->
        <div class="col-md-12 content" id="content" style="margin-bottom: 0 !important; background-color: white !important; border-bottom: 1px solid #F5F5F5">
          <div id="blog-content">
            <div class="col-md-12" style="padding: 0 0 0 0 !important; ">
              <div class="row">
                <div class="col-md-12" style="padding: 0 0 0 0 !important; height: 50px">
                  <div class="profile" style="font-size: 15px; height: 50px; line-height: 50px; padding: 5px 20px 5px 20px !important; text-align: center">
                    <span class="font-futura">My Favorite</span>
                  </div>
                </div>
                <div class="col-md-12" style="padding: 10px 0px 10px 0px !important; border: none;">
                  <div class="recent-post" style="background: #fff;/* border: 1px solid #e0e0e0; */">
                    <div class="media">
                      <div class="instructor slick" style="height: 100px; /* padding-bottom: 10px; */">
                        <?php
                        foreach ($bookmarks as $teacher) {
                          $teacher = $this->db->get_where('teacher', array('teacher_id' => $teacher->teacher_id))->row();
                          $teacher_name = $teacher->name;
                          $user_data = $this->db->get_where('user', array('user_id' => $teacher->user_id))->row();
                          $profile_image_url = $user_data->profile_image_url;
                          if (empty($profile_image_url) or strlen($profile_image_url) == 0) {
                            $profile_image_url = base_url().'uploads/icon/profile_icon.png';
                          }
                          ?>
                          <div class="instructor slick-content active" id="1" style="margin-top: 10px; text-align: center">
                            <a href="<?php echo base_url().'home/teacher/profile/'.$user_data->user_id; ?>">
                              <p>
                                <span><img src="<?php echo $profile_image_url; ?>" style="width:60px; height: 60px; margin: auto; border-radius: 30px"></span>
                                <span><?php echo $teacher_name; ?></span>
                              </p>
                            </a>
                          </div>
                          <?php
                        }
                        ?>
                      </div>
                    </div>
                  </div>
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
              <div class="col-md-12" style="padding: 0 0 0 0 !important; ">
                <div class="profile" style="display: flex; font-size: 15px; height: 50px; line-height: 50px; padding: 5px 20px 5px 20px !important; text-align: center">
                  <div style="width: 70%; height: 50px; line-height: 50px;">
                    <span style="position: absolute; left: 36%">파운디 추천 클래스</span>
                  </div>
                  <div class="pull-right" style="width: 25%; height: 50px; line-height: 50px;">
                    <select class="form-control select-arrow" id="class_category" name="class_category" style="height: 50px !important; line-height: 50px !important;">
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
                  <div class="pull-right" style="width: 5%; text-align: right; height: 50px; line-height: 50px; color: grey">
                    <i class="fa fa-angle-down"></i>
                  </div>
                </div>
                <div class="widget" style="padding-bottom:10px; ">
                  <ul class="video_ul">

                    <!-- ajax_class_list() -->
                    <!-- /ajax_class_list() -->

                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div style="margin-bottom: 10px !important;">
            <p style="text-align: center; margin-bottom: 0">
              <a class="btn btn-lg btn-primary" id="view_more" href="#none" onclick="ajax_class_list(); return false;" role="button" style="display: none; font-family: 'Quicksand' !important; font-size: 15px; color: gray; background-color: inherit; border: 1px solid #d3d3d3">
                view more
              </a>
            </p>
          </div>
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
  let page = 0;
  let filter = '';

  function ajax_class_list() {
    page = page + 1;
    // console.log('page : ' + page + ', filter : ' + filter);
    $.ajax({
      url: "<?php echo base_url().'home/find/class/list?page='; ?>" + page + '&filter=' + filter,
      type: 'GET', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      success: function(data) {
        let prevCnt = $(".video_ul a li").length;
        $('.video_ul').append(data);
        // console.log($(".video_ul a li").length % 10);
        let listCnt = $(".video_ul a li").length;
        if ( listCnt === 0 || listCnt % 10 !== 0 || prevCnt === listCnt) {
          $('#view_more').hide();
        } else {
          $('#view_more').show();
        }
        // console.log(prevCnt);
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
      console.log(this.value);
      page = 0;
      filter = this.value;
      $('#view_more').hide();
      $('.video_ul li').remove();
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

<?php
if (!empty($bookmarks) && count($bookmarks) > 0) {
  ?>
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

  <style>
  .slick-content:focus {
    outline: none !important;
  }
</style>
  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script type="text/javascript">
    // $(function() {
    //   $('.instructor-add').click(function () {
    //     console.log('instructor-add');
    //   });
    // });

    $(document).ready(function(){
      $('.instructor.slick').slick({
        centerMode: false,
        centerPadding: '20px',
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: false,
        arrows: false,
        focusOnSelect: false,
        infinite: false,
        swipe: true,
        swipeToSlide: true,
        speed: 100,
        waitForAnimate: false,
        easing: 'swing',
        responsive: [
          {
            breakpoint: 768,
            settings: {
              centerPadding: '15px',
              slidesToShow: 5
            }
          },
          {
            breakpoint: 480,
            settings: {
              centerPadding: '10px',
              slidesToShow: 3
            }
          }
        ]
      });
    });
  </script>
  <?php
}
?>
