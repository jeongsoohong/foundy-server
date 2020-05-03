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
                <div class="col-lg-9 col-md-9" style="padding-left: 0 !important; padding-right: 0 !important;">
                    <div id="profile_content">

                    </div>
                </div>
                <div class="col-lg-3 col-md-3" style="margin-top: 20px !important;">
                    <input type="hidden" id="state" value="normal" />
                    <div class="widget account-details">
                        <div class="information-title" style="margin-bottom: 0px; margin-top: 0px;">더보기</div>
                        <ul class="pleft_nav">
                            <a class="pnav_info" href="#profile_content" style="display: none;"><li>프로필</li></a>
                            <a class="pnav_notifination" href="#"><li>공지사항</li></a>
                            <a class="pnav_introduce" href="#"><li>포잇 소개</li></a>
                            <a class="pnav_faq" href="#"><li>자주하는 질문</li></a>
                            <a class="pnav_customer_center" href="#"><li>고객센터</li></a>
                            <a class="pnav_service" href="#"><li>서비스 이용 약관</li></a>
                            <a class="pnav_privacy" href="#"><li>개인정보 보호정책</li></a>
                            <a class="pnav_info_edit" href="#"><li>프로필 편집</li></a>
                            <a class="pnav_logout" href="#"><li>로그아웃</li></a>
                            <a class="pnav_unregister" href="#"><li>회원탈퇴</li></a>
                        </ul>
                        <div class="information-title" style="margin-bottom: 0px; margin-top: 0px;">문의</div>
                        <ul class="pleft_nav">
                            <a class="pnav_center_register" href="#profile_content"><li>센터 회원 신청</li></a>
                            <a class="pnav_teacher_register" href="#profile_content"><li>강사 회원 신청</li></a>
                            <a class="pnav_shop_register" href="#"><li>샵 회원 신청</li></a>
                        </ul>
                    </div>
                </div>
            </div>
        <!-- </div> -->
    </div>
</section>

<!-- Modal For C-C Post confirm -->
<div class="modal fade" id="centerRegisterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">센터 회원 신청</h4>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <div>센터 승인까지는 3-4일정도 소요되며, 완료 후 연락드리겠습니다
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger post_confirm_close" data-dismiss="modal">취소</button>
                <button type="button" class="btn btn-theme btn-theme-sm post_confirm" style="text-transform: none;
                font-weight: 400;">확인</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal For C-C Post confirm -->

<!-- Modal For C-C Post confirm -->
<div class="modal fade" id="teacherRegisterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">강사 회원 신청</h4>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <div>강사 승인까지는 3-4일정도 소요되며, 완료 후 연락드리겠습니다
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger post_confirm_close" data-dismiss="modal">취소</button>
                <button type="button" class="btn btn-theme btn-theme-sm post_confirm" style="text-transform: none;
                font-weight: 400;">확인</button>
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
<!--<script type="text/javascript" src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>-->
<script type="text/javascript">

    var top = Number(200);
    var loading_set = '<div style="text-align:center;width:100%;height:'+(top*2)+'px; position:relative;top:'+top+'px;"><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i></div>';

    $('.pnav_info').on('click',function(){
        $("#profile_content").html(loading_set);
        $("#profile_content").load("<?php echo base_url()?>home/user/info");
        $(".pleft_nav").find("li").removeClass("active");
        $(".pnav_info").find("li").addClass("active");
    });

    $('.pnav_logout').click(function(e) {
        $.getScript("https://developers.kakao.com/sdk/js/kakao.min.js", function() {
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
        });
    })

    $('.pnav_unregister').click(function(e) {
        $.getScript("https://developers.kakao.com/sdk/js/kakao.min.js", function() {
            Kakao.init('a7e336b59aed62d0e46dae8a8c55da21');
            if (!Kakao.Auth.getAccessToken()) {
                alert('Not logged in.');
            } else {
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
            }
        });
    })

    $('.pnav_center_register').on('click',function(){
        $("#profile_content").html(loading_set);
        $("#profile_content").load("<?php echo base_url()?>home/user/center_register");
        $(".pleft_nav").find("li").removeClass("active");
        $(".pnav_center_register").find("li").addClass("active");
        $.getScript("//dapi.kakao.com/v2/maps/sdk.js?appkey=a7e336b59aed62d0e46dae8a8c55da21&autoload=false&libraries=services", function() {
            kakao.maps.load(function() {
                // getLocation();
                var mapContainer = document.getElementById('kakao-map'), // 지도를 표시할 div
                    mapOption = {
                         center: new kakao.maps.LatLng(33.450701, 126.570667), // 지도의 중심좌표
                        // center: new kakao.maps.LatLng(coords.longitude, coords.latitude), // 지도의 중심좌표
                        level: 3 // 지도의 확대 레벨
                    };
                // 지도를 표시할 div와  지도 옵션으로  지도를 생성합니다
                var map = new kakao.maps.StaticMap(mapContainer, mapOption);
                $('div.kakao-map').hide();
            });
        });
    });

    $('.pnav_teacher_register').on('click',function(){
        $("#profile_content").html(loading_set);
        $("#profile_content").load("<?php echo base_url()?>home/user/teacher_register");
        $(".pleft_nav").find("li").removeClass("active");
        $(".pnav_teacher_register").find("li").addClass("active");
    });

    $(document).ready(function(){
        active_menu_bar('user');

         //$("#<?php //echo $part; ?>//").click();
        $(".pnav_<?php echo $part; ?>").click();
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
