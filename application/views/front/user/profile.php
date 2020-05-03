<!--<div class="information-title" style="margin-bottom: 0px;">프로필</div>-->
<div class="profile" style="font-family: 'Quicksand' !important; font-size: 15px; text-align: center; padding-bottom:
 5px; !important;"><b>profile</b></div>
<div class="row">
    <div class="col-md-12" style="padding: 0px 0px 10px 0px !important; ">
        <div class="recent-post" style="background: #fff;border: 1px solid #e0e0e0;">
            <div class="media">
                <a class="pull-left media-link" href="#" style="height: 60px; float:left !important; padding: 0 !important; margin: 10px 30px 10px 30px !important; ">
                    <div class="media-object img-bg" id="blah" style="background-image: url('<?php
                    if (empty($custom_image_url)) {
                        echo base_url() . 'uploads/icon/profile_icon.png';
                    } else {
                        echo $custom_image_url;
                    }
                    ?>'); background-size: cover; background-position-x: center; background-position-y: top; width: 60px; height: 60px;"></div>
                    <span id="inppic" class="set_image" >
                                    <label class="" for="imgInp" >
                                        <span><i class="fa fa-pencil" style="cursor: pointer;"></i></span>
                                    </label>
                                    <input type="file" style="display:none;" id="imgInp" name="img" />
                                </span>
                    <span id="savepic" style="display:none;">
                                    <span class="signup_btn" onclick="abnv('inppic'); change_state('normal');"  data-ing="saving..." data-success="profile_picture_saved_successfully!" data-unsuccessful="edit_failed! try again!" data-reload="no" >
                                        <span><i class="fa fa-save" style="cursor: pointer;"></i></span>
                                    </span>
                                </span>
                </a>
                <div class="media-body" style="padding-right: 10px">
                    <div class="col-md-12" style="margin: 10px 0 10px 0 !important; padding-left: 20px !important; text-align: left; !important; font-size: 12px !important;">
                        <p>
                        <?php echo $nickname; ?>
                            &nbsp;&nbsp;&nbsp;
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
                        } else if ($user_type & USER_TYPE_GENERAL > 0) {
                            $user .= '일반회원';
                        } else {
                            $user .= '비회원';
                        }
                        if ($user_type & USER_TYPE_SHOP) {
                            $user .= ' | 점주';
                        }
                        echo $user;
                        ?>
                        </p>
                        <p>
                            팔로워 0
                            &nbsp;/&nbsp;
                            팔로잉 0
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row">
            <?php if ($user_type & USER_TYPE_TEACHER && $activate == 1) { ?>
            <div class="col-md-6">
                <div class="profile" style="font-family: 'Quicksand' !important; font-size: 15px; text-align: center; padding-bottom: 5px; !important;"><b>my class</b></div>
                <div class="widget widget-categories" style="padding-bottom:10px; ">
                    <ul class="profile_ul" style="text-align: center">
                        <li>
                            <a href="<?php echo base_url(); ?>home/teacher/profile/<?php echo $user_id ?>"
                               style="position:
                            inherit;">
                            <b>+</b>&nbsp;&nbsp;온라인 클래스 바로가기
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <?php } ?>
            <div class="col-md-6">
                <div class="profile" style="font-family: 'Quicksand' !important; font-size: 15px; text-align: center;
                 padding-bottom: 5px; !important;"><b>my studio</b></div>
                <div class="widget widget-categories" style="padding-bottom:10px; ">
                    <ul class="profile_ul">
                        <li>&nbsp;&nbsp;>&nbsp;&nbsp;자이요가 한남점
                            <span class="pull-right">
                                <img src="<?php echo base_url(); ?>uploads/icon/icon-4.png">
                            </span>
                            <span class="pull-right schedule" style="font-size: 10px;">SCHEDULE</span>
                        </li>
                        <li>&nbsp;&nbsp;>&nbsp;&nbsp;청담요가
                            <span class="pull-right">
                                <img src="<?php echo base_url(); ?>uploads/icon/icon-4.png">
                            </span>
                            <span class="pull-right schedule" style="font-size: 10px;">SCHEDULE</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile" style="font-family: 'Quicksand' !important; font-size: 15px; text-align: center;
                 padding-bottom: 5px; !important;"><b>online class</b></div>
                <div class="widget widget-categories" style="padding-bottom:10px; ">
                    <ul class="profile_ul">
                        <li>&nbsp;&nbsp;>&nbsp;&nbsp;부진/숨쉬는 고래 (요가%영상)
                            <span class="pull-right">
                                <img src="<?php echo base_url(); ?>uploads/icon/icon-4.png">
                            </span>
                        </li>
                        <li>&nbsp;&nbsp;>&nbsp;&nbsp;춤추는 필라테스 (필라테스&영상)
                            <span class="pull-right">
                                <img src="<?php echo base_url(); ?>uploads/icon/icon-4.png">
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
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
