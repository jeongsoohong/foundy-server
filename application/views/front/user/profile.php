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
    box-shadow: none;
    border: none;
    padding: 0 10px 0 10px !important;
    border-radius: 0 !important;
  }
  .profile_ul li {
    height: 40px !important;
    line-height: 40px;
    /*padding: 0 10px 0 10px !important;*/
    padding: 0 !important;
  }
  .profile_ul li span.pull-right {
    /*margin: 0 5px 0 0 !important;*/
    margin: 0 !important;
    padding: 0 5px 0 5px !important;
  }
  .profile_ul li span.pull-right.schedule {
    border: 1px solid #8e8e8e !important;
  }
  .profile_ul li span.pull-right img {
    width: 20px !important;
    height: 20px !important;
  }
  .view,.schedule {
    margin-top: 6px;
    margin-bottom: 6px;
    padding-left: 5px;
    padding-right: 5px;
    height: 26px;
    line-height: 26px !important;
    border: 1px solid grey;
  }
  #profile-edit {
    background-color: white;
    height: 40px;
    width: 50px;
    position: absolute;
    z-index: 10;
    top: -10px;
    left: 80%;
    display: none;
    text-align: center;
  }
  #profile-edit a {
    color: grey;
    font-size: 12px;
    line-height: 40px;
  }
</style>
<div class="profile" style="font-size: 15px; text-align: center; height: 50px; line-height: 50px !important;">
  <b class="font-futura">profile</b>
</div>
<div class="row">
  <div class="col-md-12" style="padding: 0 !important; ">
    <div class="recent-post" style="background: #fff;">
      <div class="media">
        <div class="col-md-12" style="margin: 0 0 0 0; padding: 15px 15px 15px 15px; position: relative">
          <table class="col-md-12" style="width: 100%;">
            <tbody>
            <tr style="height: 20px">
              <td rowspan="3" style="text-align: center">
                <div class="media-object img-bg" id="blah" style="margin: auto; border-radius: 50%;
                  background-size: cover; background-position-x: center; background-position-y: center;
                  width: 60px; height: 60px; background-image: url('<?php
                if (empty($profile_image_url) || strlen($profile_image_url) == 0) {
                  echo base_url() . 'uploads/icon/profile_icon.png';
                } else {
                  echo $profile_image_url;
                }
                ?>');">
                </div>
              </td>
              <td style="padding-left: 10px; width: 70%">
                <?php echo $nickname.' ('.$email.')'; ?>
              </td>
              <td style="width: 10%; text-align: center;">
                <a href="javascript:void(0);">
                  <span class="profile-edit" data-target='profile-edit' style="color: grey;">
<!--                    <i class="fa fa-ellipsis-v"></i>-->
                    <img src="<?php echo base_url(); ?>uploads/icon/dots.png" alt="" style="width: 10px; height: 10px">
                  </span>
                </a>
                <div id="profile-edit">
                </div>
              </td>
            </tr>
            <tr style="height: 20px">
              <td style="padding-left: 10px; width: 70%">
                <?php
                $user = '';
                if ($user_type & USER_TYPE_ADMIN) {
                  echo '어드민';
                } else if ($user_type & USER_TYPE_TEACHER and $user_type & USER_TYPE_CENTER) {
                  $user .= '강사/센터회원';
                } else if ($user_type & USER_TYPE_TEACHER) {
                  $user .= '강사회원';
                } else if ($user_type & USER_TYPE_CENTER) {
                  $user .= '센터회원';
                } else if ($user_type & USER_TYPE_GENERAL) {
                  $user .= '일반회원';
                } else {
                  $user .= '비회원';
                }
                if ($user_type & USER_TYPE_SHOP) {
                  $user .= ' | 점주';
                }
                echo $user;
                ?>
              </td>
              <td style="width: 10%">
              </td>
            </tr>
            <tr style="height: 20px">
              <td style="width: 70%">
              </td>
              <td style="width: 10%">
              </td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12" style="padding: 0 0 0 0">
    <div class="row">
      <?php if ($user_type & USER_TYPE_CENTER && $center_activate == 1) { ?>
        <div class="col-md-12">
          <div class="profile" style="font-size: 15px; text-align: center; height: 50px; line-height: 50px !important;">
            <b class="font-futura">my center</b>
          </div>
          <div class="widget">
            <ul class="profile_ul" style="padding-left: 30px !important; padding-right: 30px !important;">
              <?php
              $i = 0;
              $total_cnt = count($my_centers);
              foreach ($my_centers as $center) {
                $i++;
                ?>
                <li style="<?php echo ($i != $total_cnt ? 'border-bottom: 1px solid #EAEAEA' : ''); ?>">
                  <a href="<?php echo base_url(); ?>home/center/profile/<?php echo $center->center_id; ?>" style="position: inherit;">
                    <?php echo $center->title; ?>&nbsp;페이지 바로가기
                    <span class="pull-right" style="color: grey;">
                      <i class="fa fa-angle-right"></i>
                    </span>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      <?php } ?>
      <?php if ($user_type & USER_TYPE_TEACHER && $teacher_activate == 1) { ?>
        <div class="col-md-12">
          <div class="profile" style="font-size: 15px; text-align: center; height: 50px; line-height: 50px !important;">
            <b class="font-futura">my class</b>
          </div>
          <div class="widget">
            <ul class="profile_ul" style="padding-left: 30px !important; padding-right: 30px !important;">
              <li>
                <a href="<?php echo base_url(); ?>home/teacher/profile/<?php echo $user_id ?>" style="position: inherit;">
                  <?php echo $my_teacher->name; ?>&nbsp;강사님 페이지 바로가기
                  <span class="pull-right" style="color: grey;">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      <?php } ?>
      <?php if (count($bookmark_centers) > 0 || count($bookmark_teachers) > 0) { ?>
        <div class="col-md-12">
          <div class="profile" style="font-size: 15px; text-align: center; height: 50px; line-height: 50px !important;">
            <b class="font-futura">my favorite</b>
          </div>
          <div class="widget" style="padding-bottom:10px; ">
            <ul class="profile_ul" style="padding-left: 30px !important; padding-right: 30px !important;">
              <?php
              $i = 0;
              $total_cnt = count($bookmark_centers) + count($bookmark_teachers);
              if (!empty($bookmark_centers) and count($bookmark_centers) > 0) {
                foreach ($bookmark_centers as $center) {
                  $i++;
                  ?>
                  <li style="<?php echo ($i != $total_cnt ? 'border-bottom: 1px solid #EAEAEA' : ''); ?>">
                    <table class="col-md-12" style="width: 100%">
                      <tbody>
                      <tr style="height: 40px">
                        <td style="width: 65%;">
                          (스튜디오) <?php echo $center->title; ?>
                        </td>
                        <td style="width: 25%; text-align: right;">
                          <a href="<?php echo base_url().'home/center/profile/'.$center->center_id.'?nav=schedule'; ?>">
                            <span class="schedule" style="font-size: 10px;">
                              SCHEDULE
                            </span>
                          </a>
                        </td>
                        <td style="text-align: center;">
                          <?php echo $this->crud_model->sns_func_html('bookmark', 'center', true, $center->center_id, 20, 20); ?>
                        </td>
                      </tr>
                      </tbody>
                    </table>
                  </li>
                  <?php
                }
              }
              ?>
              <?php if (!empty($bookmark_teachers) and count($bookmark_teachers) > 0) {
                foreach ($bookmark_teachers as $teacher) {
                  $i++;
                  ?>
                  <li style="<?php echo ($i != $total_cnt ? 'border-bottom: 1px solid #EAEAEA' : ''); ?>">
                    <table class="col-md-12" style="width: 100%">
                      <tbody>
                      <tr style="height: 40px">
                        <td style="width: 65%;">
                          (강사) <?php echo $teacher->name; ?>
                        </td>
                        <td style="width: 25%; text-align: right;">
                          <a href="<?php echo base_url().'home/teacher/profile/'.$teacher->user_id; ?>">
                            <span class="schedule" style="font-size: 10px;">
                              VIEW
                            </span>
                          </a>
                        </td>
                        <td style="text-align: center;">
                          <?php echo $this->crud_model->sns_func_html('bookmark', 'teacher', true, $teacher->teacher_id, 20, 20); ?>
                        </td>
                      </tr>
                      </tbody>
                    </table>
                  </li>
                  <?php
                }
              }
              ?>
            </ul>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
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

  function openPop() {
    if ($('#profile-edit').css('display') === 'none') {

      $('#profile-edit').empty().append('<a href="javascript:void(0)" onclick="$(\'.pnav_edit_profile\').click();">수정</a>');
      $('#profile-edit').show();
    } else {
      $('#profile-edit').hide();
    }
  }
  $(document).ready(function() {
    $('html').animate({scrollTop:$('html, body').offset().top}, 100);
    $('.profile-edit').click(function(e) {
      openPop();
    });
  });
</script>
