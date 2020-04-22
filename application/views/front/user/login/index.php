<section class="page-section color get_into">
    <div class="container" id="login">
        <div class="row margin-top-0">
            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                <div class="row box_shape">
                    <div class="title">
                        로그인
                        <div class="option">
                        방문을 환영합니다
                        </div>
                    </div>
                    <hr>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <span class="btn btn-theme-sm btn-block btn-theme-transparent pull-center kakao-login btn-kakao-login">
                                카카오 로그인
                            </span>
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

<script type="text/javascript" src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
<script type="text/javascript">

    document.addEventListener("DOMContentLoaded", function() {
        // @details 카카오톡 Developer API 사이트에서 발급받은 JavaScript Key
        Kakao.init('a7e336b59aed62d0e46dae8a8c55da21');
        //console.log("DOMContentLoaded : " +  Kakao.isInitialized());

/*        function getToken() {
            const token = getCookie('authorize-access-token')
            if(token) {
                Kakao.Auth.setAccessToken(token)
                //console.log('login success. token: ' + Kakao.Auth.getAccessToken());
                alert('login success. token: ' + Kakao.Auth.getAccessToken());
            }
        }
        function getCookie(name) {
            const value = "; " + document.cookie;
            const parts = value.split("; " + name + "=");
            if (parts.length === 2) return parts.pop().split(";").shift();
        }*/

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

    /*
        $('.kakao-login').click(function(e) {

            // rest api 사용 1
            function loginWithKakao() {
                Kakao.Auth.login({
                    success: function(authObj) {
                        Kakao.API.request({
                            url: "https://kapi.kakao.com/v2/user/me",
                            success: function(res) {
                                alert(res);
                            },
                            fail: function(error) {
                                alert(JSON.stringify(error));
                            }
                        });
                        alert(JSON.stringify(authObj));
                    },
                    fail: function(err) {
                        alert(JSON.stringify(err));
                    },
                })
            }

            // rest api 사용 2
            Kakao.Auth.authorize({
                redirectUri: 'http://10.0.4.56/home/login/kakao'
            })

            // UI code below
            console.log('token : ' + getToken())

            function getToken() {
                const token = getCookie('authorize-access-token')
                if(token) {
                    Kakao.Auth.setAccessToken(token)
                    console.log('login success. token: ' + Kakao.Auth.getAccessToken());
                }
            }
            function getCookie(name) {
                const value = "; " + document.cookie;
                const parts = value.split("; " + name + "=");
                if (parts.length === 2) return parts.pop().split(";").shift();
            }
        })*/

</script>

<style>
    .btn-kakao-login {
       border: none;
    }
    .btn-kakao-login:hover {
        background-color: transparent;
    }
</style>
