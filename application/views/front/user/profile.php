<div class="information-title" style="margin-bottom: 0px;">프로필</div>
<div class="row">
    <div class="col-md-12" style="padding-bottom: 10px; ">
        <div class="recent-post" style="background: #fff;border: 1px solid #e0e0e0;">
            <div class="media">
                <a class="pull-left media-link" href="#" style="height: 124px; float:left !important;">
                    <div class="media-object img-bg" id="blah" style="background-image: url('<?php
                    if (empty($profile_image_url) || $profile_image_url == '') {
                        echo base_url() . '/uploads/user/default.jpg';
                    } else {
                        echo $profile_image_url;
                    }
                    ?>'); background-size: cover; background-position-x: center; background-position-y: top; width: 100px; height: 124px;"></div>
                    <span id="inppic" class="set_image">
                                    <label class="" for="imgInp">
                                        <span><i class="fa fa-pencil" style="cursor: pointer;"></i></span>
                                    </label>
                                    <input type="file" style="display:none;" id="imgInp" name="img" />
                                </span>
                    <span id="savepic" style="display:none;">
                                    <span class="signup_btn" onclick="abnv('inppic'); change_state('normal');"  data-ing="saving..." data-success="profile_picture_saved_successfully!" data-unsuccessful="edit_failed! try again!" data-reload="no" >
                                        <span><i class="fa fa-save" style="cursor: pointer;"></i></span>
                                    </span>
                                </span>
                    </form>
                </a>
                <div class="media-body" style="padding-right: 10px">
                    <table class="table table-condensed" style="font-size: 12px; margin-bottom: 0px">
                        <tr>
                            <td><b>별명</b></td>
                            <td align="left"><?php echo $nickname; ?></td>
                            <td><b></b></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><b>구분</b></td>
                            <td><?php if ($user_type == 'general') { echo '일반회원'; } else { echo '비회원'; }?></td>
                            <td><b></b></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><b>팔로워</b></td>
                            <td>0</td>
                            <td><b>팔로잉</b></td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td><b>INSTAGRAM</b></td>
                            <td><b>YouTube</b></td>
                            <td><b></b></td>
                            <td></td>
                        </tr>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6" style="padding-top: 10px; ">
                <h3 class="block-title"><span>MY STUDIO</span></h3>
                <div class="widget widget-categories" style="padding-bottom:10px; ">
                    <ul class="profile_ul">
                        <li><a href="#">자이요가 한남점</b></a></li>
                        <li><a href="#">청담요가</b></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6" style="padding-top: 10px; ">
                <h3 class="block-title"><span>Online Class</span></h3>
                <div class="widget widget-categories" style="padding-bottom:10px; ">
                    <ul class="profile_ul">
                        <li><a href="#">부진 / 숨쉬는 고래 (요가&영상)</a></li>
                        <li><a href="#">춤추는 필라테스 (필라테스&영상)</a></li>
                    </ul>
                </div>
            </div>
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

    $(document).ready(function() {
        $('html').animate({scrollTop:$('html, body').offset().top}, 100);
    });
</script>
