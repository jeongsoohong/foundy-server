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

    Kakao.init('a7e336b59aed62d0e46dae8a8c55da21');

    $('.kakao-login').click(function(e) {

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
    })

    document.addEventListener("DOMContentLoaded", function() {
        // @details 카카오톡 Developer API 사이트에서 발급받은 JavaScript Key
        console.log("DOMContentLoaded : " +  Kakao.isInitialized());

        // @breif 카카오 로그인 버튼을 생성합니다.
        Kakao.Auth.createLoginButton({

            container : ".btn-kakao-login",
            size : 'medium',
            lang : 'kr',
            success : function( authObj ) {
                console.log( 'auth : ' + JSON.stringify(authObj) );
            },
            fail : function( error ) {
                alert( 'fail : ' + JSON.stringify( error ));
            }
        });
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
