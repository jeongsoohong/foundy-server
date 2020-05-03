<?php

$youtube = $teacher_data->youtube;
if (isset($youtube) && strlen($youtube) > 0) {
    if (strncmp($youtube, "http", 4) && strncmp($youtube, '//', 2)) {
        $youtube = '//'.$youtube;
    }
}
$instagram = $teacher_data->instagram;
if (isset($instagram) && strlen($instagram) > 0) {
    if (strncmp($instagram, "http", 4) && strncmp($instagram, '//', 2)) {
        $instagram = '//'.$instagram;
    }
}
$homepage = $teacher_data->homepage;
if (isset($homepage) && strlen($homepage) > 0) {
    if (strncmp($homepage, "http", 4) && strncmp($homepage, "//", 2)) {
        $homepage = '//'.$homepage;
    }
}

?>
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
                                        <a class="pull-left media-link" href="#" style="height: 60px; float:left !important; padding: 0 !important; margin: 10px 30px 10px 30px !important; ">
                                            <div class="media-object img-bg" id="blah" style="background-image: url('<?php
                                            if (empty($user_data->profile_image_url)) {
                                                echo base_url() . 'uploads/icon/profile_icon.png';
                                            } else {
                                                echo $user_data->profile_image_url;
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
                                                    <?php echo $teacher_data->name; ?>
                                                    &nbsp;&nbsp;&nbsp;<a class="profile-edit" href="#"><span style="color: gray;">수정</span></a>
                                                </p>
                                                <p>
                                                    팔로워 0
                                                </p>
                                                <?php
                                                if (isset($youtube) && strlen($youtube) > 0) {
                                                    ?>
                                                    <a href="<?php echo $youtube; ?>" onclick="window.open(this.href, '_blank'); return false;">
                                                        <span><img src="<?php echo base_url(); ?>uploads/icon/youtube_icon.png"></span>
                                                    </a>
                                                    <?php
                                                }
                                                if (isset($instagram) && strlen($instagram) > 0) {
                                                    ?>
                                                    <a href="<?php echo $instagram; ?>" onclick="window.open(this.href, '_blank'); return false;">
                                                        <span><img src="<?php echo base_url(); ?>uploads/icon/insta_icon.png"></span>
                                                    </a>
                                                    <?php
                                                }
                                                if (isset($homepage) && strlen($homepage) > 0) {
                                                    ?>
                                                    <a href="<?php echo $homepage; ?>" onclick="window.open(this.href, '_blank'); return false;">
                                                        <span><img src="<?php echo base_url(); ?>uploads/icon/icon-6.png"></span>
                                                    </a>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="profile" style="font-family: 'Quicksand' !important; font-size: 15px; text-align: center;
                 padding-bottom: 5px; !important;"><b>introduction</b></div>
                                        <div class="widget widget-categories" style="padding-bottom:10px; ">
                                            <ul class="profile_ul" style="text-align: center">
                                                <li><?php echo $teacher_data->introduce ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="profile" style="font-family: 'Quicksand' !important; font-size: 15px; text-align: center;
                 padding-bottom: 5px; !important;"><b>class</b></div>
                                        <div class="widget widget-categories" style="padding-bottom:10px; ">
                                            <ul class="profile_ul">
                                                <?php foreach ($video_data as $video) {
                                                    if (strncmp($video->video_url, 'http', 4) && strncmp
                                                        ($video->video_url, '//', 2)) {
                                                        $video->video_url = '//' . $video->video_url;
                                                    }
                                                    if (strncmp($video->thumbnail_image_url, 'http', 4) && strncmp
                                                        ($video->thumbnail_image_url, '//', 2)) {
                                                        $video->thumbnail_image_url = '//' .
                                                            $video->thumbnail_image_url;
                                                    }
                                                    ?>
                                                    <li>
                                                        <div class="col-md-12 media">
                                                            <div class="col-md-6 pull-left media-link" style="width: 150px; height: 90px;">
                                                                <img src="<?php echo $video->thumbnail_image_url; ?>" width="120"
                                                                height="90" alt="">

                                                            </div>
                                                            <div class="col-md-6 media-body" style="padding: 0 10px 0 10px; width: 300px; height: 90px">
                                                                <div class="col-md-12 video-title" style="font-size: 12px; height:60px; text-align:
                                    center">
                                                                    <h5><?php echo $video->title; ?></h5>
                                                                </div>
                                                                <div class="col-md-12 pull-right video-detail" style="font-size: 12px;
                                    height:20px;">
                                                                    조회수 <?php echo $video->view; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>

                                                <?php } ?>
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
                                    <?php } ?>
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
