<section class="page-section color get_into" style="background-color: #ffffff">
    <div class="container" id="login">
        <div class="row margin-top-0">
            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                <div class="row">
                    <div class="title" style="background-color: #ffffff">
                        <!-- 로그인 -->
                        <div class="option" style="text-align: center !important; ">
                        간편하게 로그인하고<br>
                            균형잡힌 삶을 찾아보세요
                        </div>
                    </div>
<!--                    <hr>-->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <span class="btn btn-theme-sm btn-block btn-theme-transparent pull-center kakao-login btn-kakao-login">
                                카카오 로그인
                            </span>
                    </div>
                    <div class="title" style="margin-top:70px !important; background-color: #FFFFFF">
                        <!-- 센터회원 / 강사회원 신청 설명 -->
                        <div class="option" style="font-size: 10px !important; ">
                            * 강사회원/센터회원은 간편로그인 후 마이페이지에서 신청해주세요
                        </div>
                    </div>
<!--                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin: 0px;">
                        <h2 class="login_divider"><span>or</span></h2>
                    </div>-->
<!--                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <span class="btn btn-theme-sm btn-block btn-theme-transparent pull-right naver-login" style="background-color:#2DB400; ">
                                네이버 로그인
                            </span>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .content-area {
        background-color: #FFFFFF;
    }
    footer {
        background-color: #FFFFFF;
        padding-top: 15px;
        margin-top: 0px !important;
    }
</style>

<script type="text/javascript" src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
<script type="text/javascript">

    document.addEventListener("DOMContentLoaded", function() {
        Kakao.init('8ee901a556539927d58b30a6bf21a781');
        // @breif 카카오 로그인 버튼을 생성합니다.
        Kakao.Auth.createLoginButton({

            container : ".btn-kakao-login",
            size : 'medium',
            lang : 'kr',
            success : function( authObj ) {
                //console.log( 'auth : ' + JSON.stringify(authObj) );
                // UI code below
                //console.log('token : ' + getToken())

                Kakao.API.request({
                    url: "/v2/user/me",
                    success: function(user_data) {

                        var base_url = '<?php echo base_url(); ?>';

                        $.ajax({
                            url : base_url + '/home/login/kakao',
                            type : 'post',
                            data : user_data,
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

                        //console.log(Kakao.Auth.getAccessToken());
                        //alert(JSON.stringify(res));
                    },
                    fail: function(error) {
                        alert(JSON.stringify(error));
                    }
                });
            },
            fail : function( error ) {
                alert( 'login fail : ' + JSON.stringify(error));
            }
        });
    });

    $(document).ready(function() {
        active_menu_bar('login');
    });

</script>

<style>
    .btn-kakao-login {
       border: none;
    }
    .btn-kakao-login:hover {
        background-color: transparent;
    }
</style>
