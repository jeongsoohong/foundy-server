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
                <div class="col-lg-9 col-md-9">
                    <div id="profile_content">
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
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <input type="hidden" id="state" value="normal" />
                    <div class="widget account-details">
                        <div class="information-title" style="margin-bottom: 0px; margin-top: 0px;">더보기</div>
                        <ul class="pleft_nav">
                            <a class="pnav_info" href="#"><li class="active">프로필 수정</li></a>
                            <a class="pnav_info" href="#"><li class="active">공지사항</li></a>
                            <a class="pnav_info" href="#"><li class="active">포잇 소개</li></a>
                            <a class="pnav_info" href="#"><li class="active">자주하는 질문</li></a>
                            <a class="pnav_info" href="#"><li class="active">고객센터</li></a>
                            <a class="pnav_info" href="#"><li class="active">서비스 이용 약관</li></a>
                            <a class="pnav_info" href="#"><li class="active">개인정보 보호정책</li></a>
                            <a class="pnav_info" href="#"><li class="active">버전 정보</li></a>
                            <a class="pnav_info logout" href="#"><li class="active">로그아웃</li></a>
                            <a class="pnav_info unregister" href="#"><li class="active">회원탈퇴</li></a>
                        </ul>
                        <div class="information-title" style="margin-bottom: 0px; margin-top: 0px;">문의</div>
                        <ul class="pleft_nav">
                            <a class="pnav_info" href="#"><li class="active">센터 문의</li></a>
                            <a class="pnav_info" href="#"><li class="active">샵 문의</li></a>
                        </ul>
                    </div>
                </div>
            </div>
        <!-- </div> -->
    </div>
</section>

<!-- Modal For C-C Post confirm -->
<div class="modal fade" id="prodPostModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">confirm_your_upload</h4>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <div>your_remaining_product_upload_amount:_
                        <b><span class="post_amount">0</span></b><br>
                        uploading_a_product_will_cost_you_1_upload_amount</br>
                        <b class="text-danger">After_uploading_a_product_you_can_not_edit_it_again</b>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger post_confirm_close" data-dismiss="modal">close</button>
                <button type="button" class="btn btn-theme btn-theme-sm post_confirm" style="text-transform: none;font-weight: 400;">confirm</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal For C-C Post confirm -->

<!-- Modal For C-C Status change -->
<div class="modal fade" id="statusChange" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">change_availability_status</h4>
            </div>
            <div class="modal-body">
                <div class="text-center content_body" id="content_body">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal For C-C Status change -->
<style type="text/css">
    .pagination_box a{
        cursor: pointer;
    }
    .pleft_nav li.active {
        background-color: #ebebeb!important;
    }
</style>
<script type="text/javascript" src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
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
            $(":focus").closest('form').find('.submit_button').click();
        }
    }
    $('.logout').click(function(e) {
        Kakao.init('a7e336b59aed62d0e46dae8a8c55da21');
        if (!Kakao.Auth.getAccessToken()) {
            alert('Not logged in.');
        } else {
            Kakao.Auth.logout(function() {

                var base_url = '<?php echo base_url(); ?>';

                //alert('logout: ' + Kakao.Auth.getAccessToken());

                $.ajax({
                    url : base_url + '/home/logout',
                    //type : 'post',
                    //data : user_data,
                    // contentType: "application/json; charset=utf-8",//보낼 데이터 방식
                    //CI에서 POST방식으로 할 경우에는 이것을 체크하면 안된다.
                    //왜냐하면, json 방식은 body 안으로 전송되므로 body 를 통해 읽어들여야 한다. 그러므로
                    //이방식으로 체크 되면 URLencoded format이 아닌 post로 받아올 수 없다
                    //contentType: 'application/json',
                    dataType : 'json', // 받을 데이터 방식
                    success : function(res) {
                        if (res.status === 'success') {
                            alert(res.message);
                            window.location.href = res.redirect_url;
                        } else {
                            alert(res.message);
                            window.location.href = res.redirect_url;
                        }
                    },
                    error: function(xhr, status, error){
                        alert(error);
                        window.location.href = base_url + 'home/login';
                    }
                });

            });
        }
    })

    $('.unregister').click(function(e) {
        Kakao.init('a7e336b59aed62d0e46dae8a8c55da21');
        Kakao.API.request({
            url: '/v1/user/unlink',
            success: function(response) {
                console.log(response);

                var base_url = '<?php echo base_url(); ?>';

                //alert('logout: ' + Kakao.Auth.getAccessToken());

                $.ajax({
                    url : base_url + '/home/unregister',
                    //type : 'post',
                    //data : user_data,
                    // contentType: "application/json; charset=utf-8",//보낼 데이터 방식
                    //CI에서 POST방식으로 할 경우에는 이것을 체크하면 안된다.
                    //왜냐하면, json 방식은 body 안으로 전송되므로 body 를 통해 읽어들여야 한다. 그러므로
                    //이방식으로 체크 되면 URLencoded format이 아닌 post로 받아올 수 없다
                    //contentType: 'application/json',
                    dataType : 'json', // 받을 데이터 방식
                    success : function(res) {
                        if (res.status === 'success') {
                            alert(res.message);
                            window.location.href = res.redirect_url;
                        } else {
                            alert(res.message);
                            window.location.href = res.redirect_url;
                        }
                    },
                    error: function(xhr, status, error){
                        alert(error);
                        window.location.href = base_url + 'home/login';
                    }
                });

            },
            fail: function(error) {
                console.log(error);
            },
        });
    })

</script>
