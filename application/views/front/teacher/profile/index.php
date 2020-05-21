<script src="https://checkout.stripe.com/checkout.js"></script>
<style>
  @media (min-width: 1200px){
    .cus_cont {
      width: 1290px;
    }
  }
</style>
<section class="page-section">
  <div class="wrap container">
    <!-- <div id="profile-content"> -->
    <div class="row profile">
      <div class="col-lg-12 col-md-12" style="padding-left: 0 !important; padding-right: 0 !important;">
        <div id="profile_content">

          <!--<div class="information-title" style="margin-bottom: 0px;">프로필</div>-->
          <div class="profile" style="font-family: 'Quicksand' !important; font-size: 15px; text-align: center; padding-bottom:
 5px; !important;"><b>profile</b></div>
          <div class="row">
            <div class="col-md-12" style="padding: 0px 0px 10px 0px !important; ">
              <div class="recent-post" style="background: #fff;border: 1px solid #e0e0e0;">
                <div class="media">
                  <div class="pull-left media-link" href="#" style="height: 60px; float:left !important; padding: 0 !important; margin: 10px 30px 10px 30px !important; pointer-events: none;">
                    <div class="media-object img-bg" id="blah" style="background-size: cover; background-position-x: center; background-position-y: top; width: 60px; height: 60px; border-radius: 30px; background-image: url('<?php
                    if (empty($user_data->profile_image_url)) {
                      echo base_url() . 'uploads/icon/profile_icon.png';
                    } else {
                      echo $user_data->profile_image_url;
                    }
                    ?>'); "></div>
                    <!--                    <span id="inppic" class="set_image" >-->
                    <!--                      <label class="" for="imgInp" >-->
                    <!--                        <span><i class="fa fa-pencil" style="cursor: pointer;"></i></span>-->
                    <!--                      </label>-->
                    <!--                      <input type="file" style="display:none;" id="imgInp" name="img" />-->
                    <!--                    </span>-->
                    <!--                    <span id="savepic" style="display:none;">-->
                    <!--                      <span class="signup_btn" onclick="abnv('inppic'); change_state('normal');"  data-ing="saving..." data-success="profile_picture_saved_successfully!" data-unsuccessful="edit_failed! try again!" data-reload="no" >-->
                    <!--                        <span><i class="fa fa-save" style="cursor: pointer;"></i></span>-->
                    <!--                      </span>-->
                    <!--                    </span>-->
                  </div>
                  <div class="media-body" style="padding-right: 10px">
                    <div class="col-md-12" style="margin: 10px 0 10px 0 !important; padding-left: 20px !important; text-align: left; !important; font-size: 12px !important;">
                      <?php if ($iam_this_teacher == true) { ?>
                        <p>
                          <?php echo $teacher_data->name; ?>
                          &nbsp;&nbsp;&nbsp;<a class="profile-edit pull-right" href="#">
                            <span style="color: gray;">수정 &nbsp; > &nbsp;</span>
                          </a>
                        </p>

                      <?php } ?>
                      <p>
                        <?php
                        $cat = '';
                        $categories = $this->db->get_where('teacher_category', array('teacher_id' => $teacher_data->teacher_id))->result();
                        foreach($categories as $category) {
                          $cat .= $category->category . '/';
                        }
                        $cat[strlen($cat) - 1] = "\0";
                        ?>
                        <span style="color: saddlebrown;"><?php echo $cat; ?></span><br>
                      </p>
                      <?php
                      if (isset($teacher_data->youtube) && strlen($teacher_data->youtube) > 0) {
                        ?>
                        <a href="<?php echo $teacher_data->youtube; ?>" onclick="window.open(this.href, '_blank'); return false;">
                          <span><img src="<?php echo base_url(); ?>uploads/icon/youtube_icon.png"></span>
                        </a>
                        <?php
                      }
                      if (isset($teacher_data->instagram) && strlen($teacher_data->instagram) > 0) {
                        ?>
                        <a href="<?php echo $teacher_data->instagram; ?>" onclick="window.open(this.href, '_blank'); return false;">
                          <span><img src="<?php echo base_url(); ?>uploads/icon/insta_icon.png"></span>
                        </a>
                        <?php
                      }
                      //                      if (isset($homepage) && strlen($homepage) > 0) {
                      //                        ?>
                      <!--                        <a href="--><?php //echo $homepage; ?><!--" onclick="window.open(this.href, '_blank'); return false;">-->
                      <!--                          <span><img src="--><?php //echo base_url(); ?><!--uploads/icon/icon-6.png"></span>-->
                      <!--                        </a>-->
                      <!--                        --><?php
                      //                      }
                      //                      ?>
                      <span class="text-xl pull-right" id="bookmark" style="font-size: 12px; padding-right: 10px ">
                        <?php echo $this->crud_model->sns_func_html('bookmark', 'teacher', $bookmarked, $teacher_data->teacher_id, 15, 15); ?>
                      </span>
                      <span class="text-xl pull-right" id="like" style="font-size: 12px; padding-right: 10px ">
                        <?php echo $this->crud_model->sns_func_html('like', 'teacher', $liked, $teacher_data->teacher_id, 15, 15); ?>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-6">
                  <div class="profile" style="font-family: 'Quicksand' !important; font-size: 15px; text-align: center;
                 padding-bottom: 5px; !important;"><b>about</b></div>
                  <div class="widget widget-categories" style="padding-bottom:10px; ">
                    <ul class="profile_ul" style="text-align: center">
                      <li><?php echo $teacher_data->about?>
                      </li>
                    </ul>
                  </div>
                </div>
                <?php if ($iam_this_teacher) { ?>
                <div class="col-md-6">
                  <div class="profile" style="font-family: 'Quicksand' !important; font-size: 15px; text-align: center;
                 padding-bottom: 5px; !important;"><b>manage class</b></div>
                  <div class="widget widget-categories" style="padding-bottom:10px; ">
                    <ul class="profile_ul" style="text-align: center">
                      <a class="pnav_add_video" href="<?php echo base_url()."home/teacher/video/add/{$user_data->user_id}"; ?>">
                        <li>
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
                    <div class="profile" style="font-family: 'Quicksand' !important; font-size: 15px; text-align: center;
                 padding-bottom: 5px; !important;"><b>class</b></div>
                    <div class="widget widget-categories" style="padding-bottom:10px; overflow: hidden; height: auto;">
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
          <style>
            .page-section {
              padding-top: 10px !important;
            }
            .media-body div p {
              margin: 0 0 5px 0 !important;
            }
            .media-body div span img {
              width : 20px !important;
              height: 20px !important;
              margin-right: 5px;
            }
            .profile_ul {
              padding: 0 10px 0 10px !important;
              border-radius: 0 !important;
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
          </style>
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


            window.addEventListener("keydown", checkKeyPressed, false);

            function checkKeyPressed(e) {
              if (e.keyCode == "13") {
                $(":focus").closest('form').find('.page-section').click();
              }
            }

            $(document).ready(function() {
              $('html').animate({scrollTop:$('html, body').offset().top}, 100);
            });
          </script>
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
