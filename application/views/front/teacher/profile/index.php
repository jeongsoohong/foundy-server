<script src="https://checkout.stripe.com/checkout.js"></script>
<style>
  @media (min-width: 1200px){
    .cus_cont {
      width: 1290px;
    }
  }
  .media-body div p {
    margin: 0 0 5px 0 !important;
  }
  .img-youtube img, .img-insta img {
    width : 25px !important;
    height: 25px !important;
    margin-right: 5px;
  }
  .profile_ul {
    padding: 0 10px 0 10px !important;
    /*border-radius: 0 !important;*/
    box-shadow: none;
    border: none;
  }
  .profile_ul li {
    padding: 10px 10px 10px 10px !important;
  }
  .profile_ul li span.pull-right {
    margin: 0 5px 0 0 !important;
    padding: 0 5px 0 5px !important;
  }
  .profile_ul li span.pull-right.schedule {
    border: 1px solid #8e8e8e !important;
  }
  .profile_ul li span.pull-right img {
    width: 20px !important;
    height: 20px !important;
  }
  #teacher-edit {
    background-color: white;
    height: 40px;
    width: 50px;
    position: absolute;
    left: 78%;
    z-index: 10;
    display: none;
    text-align: center;
  }
  #teacher-edit a {
    color: grey;
    font-size: 12px;
    line-height: 40px;
  }
  .col-md-12 .profile {
    font-size: 15px;
    text-align: center;
    height: 50px;
    line-height: 50px;
    background-color: #F3EFEB;
  }
</style>
<div id="teacher-edit">
</div>
<section class="page-section" style="padding-top: 0 !important; padding-bottom: 0 !important; background-color: white">
  <div class="wrap container">
    <!-- <div id="profile-content"> -->
    <div class="row profile">
      <div class="col-lg-12 col-md-12" style="padding-left: 0 !important; padding-right: 0 !important;">
        <div id="profile_content">
          <!--<div class="information-title" style="margin-bottom: 0px;">프로필</div>-->
          <div class="profile">
            <b class="font-futura">profile</b>
          </div>
          <div class="row">
            <div class="col-md-12" style="margin: 0 15px 0 15px; padding: 10px 0 10px 0">
              <div class="recent-post" style="background: #fff; padding: 0">
                <div class="media">
                  <table class="col-md-12" style="width: 100%">
                    <tbody>
                    <tr style="height: 20px;">
                      <td rowspan="3" style="text-align: center">
                        <div class="media-object img-bg" id="blah" style="margin: auto; background-size: cover; background-position-x: center; background-position-y: top; width: 60px; height: 60px; border-radius: 30px; background-image: url('<?php
                        if (empty($user_data->profile_image_url)) {
                          echo base_url() . 'uploads/icon/profile_icon.png';
                        } else {
                          echo $user_data->profile_image_url;
                        }
                        ?>'); "></div>
                      </td>
                      <td style="width: 65%; padding-left: 3px;">
                        <?php echo $teacher_data->name; ?>
                      </td>
                      <td style="width: 15%; text-align: center">
                        <?php if ($iam_this_teacher == true) { ?>
                          <a href="javascript:void(0);">
                            <span class="teacher-edit" style="color: grey;">
<!--                              <i class="fa fa-ellipsis-v"></i>-->
                              <img src="<?php echo base_url(); ?>uploads/icon/dots.png" alt="" style="width: 10px; height: 10px">
                            </span>
                          </a>
                        <?php } else {?>
                          <?php echo $this->crud_model->sns_func_html('bookmark', 'teacher', $bookmarked, $teacher_data->teacher_id, 20, 20); ?>
                        <?php } ?>
                      </td>
                    </tr>
                    <tr style="height: 20px;">
                      <td style="width: 65%; padding-left: 3px;">
                        <?php
                        $cat = '';
                        $categories = $this->db->get_where('teacher_category', array('teacher_id' => $teacher_data->teacher_id))->result();
                        foreach($categories as $category) {
                          $cat .= $category->category . '/';
                        }
                        $cat[strlen($cat) - 1] = "\0";
                        ?>
                        <span style="color: saddlebrown;"><?php echo $cat; ?></span>
                      </td>
                      <td>
                      </td>
                    </tr>
                    <tr style="height: 30px;">
                      <td style="width: 65%">
                        <?php
                        if (isset($teacher_data->youtube) && strlen($teacher_data->youtube) > 0) {
                          ?>
                          <a href="<?php echo $teacher_data->youtube; ?>" onclick="window.open(this.href, '_blank'); return false;">
                            <span class="img-youtube"><img src="<?php echo base_url(); ?>uploads/icon/youtube_icon.png"></span>
                          </a>
                          <?php
                        }
                        if (isset($teacher_data->instagram) && strlen($teacher_data->instagram) > 0) {
                          ?>
                          <a href="<?php echo $teacher_data->instagram; ?>" onclick="window.open(this.href, '_blank'); return false;">
                            <span class="img-insta"><img src="<?php echo base_url(); ?>uploads/icon/insta_icon.png"></span>
                          </a>
                        <?php } ?>
                      </td>
                      <td>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <div class="profile">
                    <b class="font-futura">about</b>
                  </div>
                  <div class="widget">
                    <ul class="profile_ul" style="text-align: center">
                      <li><?php echo $teacher_data->about?>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <?php if ($iam_this_teacher && empty($video_data)) { ?>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-12">
                    <div class="profile">
                      <b class="font-futura">class</b>
                    </div>
                    <div class="widget" style="padding: 10px">
                      <ul class="profile_ul" style="text-align: center;background-color: black;">
                        <a class="pnav_add_video" href="<?php echo base_url()."home/teacher/video/add/{$user_data->user_id}"; ?>">
                          <li style="color: white">
                            <b>+</b>&nbsp;&nbsp;클래스 올리기
                          </li>
                        </a>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            <?php }
            if (!empty($video_data)) {
              ?>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-12">
                    <div class="profile">
                      <b class="font-futura">class</b>
                    </div>
                    <?php if ($iam_this_teacher) { ?>
                      <div class="widget" style="padding: 10px;">
                        <ul class="profile_ul" style="text-align: center;background-color: black;">
                          <a class="pnav_add_video" href="<?php echo base_url()."home/teacher/video/add/{$user_data->user_id}"; ?>">
                            <li style="color: white">
                              <b>+</b>&nbsp;&nbsp;클래스 올리기
                            </li>
                          </a>
                        </ul>
                      </div>
                    <?php } ?>
                    <div class="widget" style="overflow: hidden; height: auto;">
                      <ul class="profile_ul" style="overflow: inherit;">
                        <?php foreach ($video_data as $video) {
                          $cat = '';
                          $categories = $this->db->get_where('teacher_video_category', array('video_id' => $video->video_id))->result();
                          foreach($categories as $category) {
                            $cat .= $category->category . '/';
                          }
                          $cat[strlen($cat) - 1] = "\0";
                          ?>
                          <a href="<?php echo base_url(); ?>home/teacher/video/view/<?php echo $video->video_id; ?>">
                            <li style="padding-left: 0 !important; padding-right: 0
                                                    !important;">
                              <div class="col-md-12 media" style="padding: 0 5px 0 5px !important;">
                                <div class="col-md-6 pull-left media-link" style="width:
                                                            190px; height: 120px; padding: 0 5px 0 5px !important;">
                                  <img src="<?php echo $video->thumbnail_image_url; ?>" width="180" height="120" alt="" style="padding:
                                                                     0 0 0 0 !important;">
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
              <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
    <!-- </div> -->
  </div>
</section>

<style type="text/css">
  .pagination_box a{
    cursor: pointer;
  }
  .pleft_nav li.active {
    background-color: #ebebeb!important;
  }
</style>
<script type="text/javascript">

  $(document).ready(function(){
    // active_menu_bar('find');
  });
</script>
<script type="text/javascript">
  function abnv(thiss){
    $('#savepic').hide();
    $('#inppic').hide();
    $('#'+thiss).show();
  }
  function change_state(va){
    $('#state').val(va);
  }

  $('.user-profile-img').on('mouseenter',function(){
    //$('.pic_changer').show('fast');
  });

  //$('.set_image').on('click',function(){
  //    $('#imgInp').click();
  //});

  $('.user-profile-img').on('mouseleave',function(){
    if($('#state').val() == 'normal'){
      //$('.pic_changer').hide('fast');
    }
  });
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#blah').css('backgroundImage', "url('"+e.target.result+"')");
        $('#blah').css('backgroundSize', "cover");
      }
      reader.readAsDataURL(input.files[0]);
      abnv('savepic');
      change_state('saving');
    }
  }

  $("#imgInp").change(function() {
    readURL(this);
  });


  function openPop(elem) {
    if ($('#teacher-edit').css('display') === 'none') {
      // var divTop = e.pageY; //상단 좌표 위치 안맞을시 e.pageY
      // var divLeft = e.pageX; //좌측 좌표 위치 안맞을시 e.pageX
      var divTop = elem.offset().top;
      var divLeft = elem.offset().left - 60; // posY - width - 10(padding)

      var base_url = '<?php echo base_url(); ?>';
      var href = base_url + 'home/teacher/edit_profile/<?php echo $teacher_data->teacher_id; ?>';
      var text = '수정';

      $('#teacher-edit').empty().append('<a href="' + href + '">' + text + '</a>');
      $('#teacher-edit').css({
        "top": divTop ,
        "left": divLeft,
        "position": "absolute"
      }).show();
    } else {
      $('#teacher-edit').hide();
    }
  }

  window.addEventListener("keydown", checkKeyPressed, false);

  function checkKeyPressed(e) {
    if (e.keyCode == "13") {
      $(":focus").closest('form').find('.page-section').click();
    }
  }

  $(document).ready(function() {
    $('html').animate({scrollTop:$('html, body').offset().top}, 100);
    $('.teacher-edit').click(function(e) {
      openPop($(this));
    });
  });
</script>
<style type="text/css">
  .pagination_box a {
    cursor: pointer;
  }
  .pleft_nav li.active {
    background-color: #ebebeb !important;
  }
  .fa-angle-up,.fa-angle-down {
    font-family: FontAwesome !important;
  }
</style>
