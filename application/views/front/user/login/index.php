<style>
    .content-area {
        background-color: #FFFFFF;
    }
    .btn-kakao-login {
        border: none;
    }
    .btn-kakao-login:hover {
        background-color: transparent;
    }
    footer {
        background-color: #FFFFFF;
        padding-top: 15px;
        margin-top: 0px !important;
    }
</style>
<section class="page-section color" style="background-color: #ffffff">
  <div class="container" id="login">
    <div class="row margin-top-0">
      <div class="col-sm-12">
        <div class="row">
          <div class="col-sm-12 title" style="background-color: #ffffff; padding: 10px 20px 5px; text-transform: uppercase; font-size: 18px; line-height: 24px; font-weight: 700; color: #232323">
            <!-- 로그인 -->
            <div class="option" style="text-align: center !important; margin: 0 auto 10px; text-transform: none; font-size: 12px; line-height: 14px; font-weight: 400; color: #757575">
              간편하게 로그인하고<br>
              균형잡힌 삶을 찾아보세요
            </div>
          </div>
          <!--                    <hr>-->
          <div class="col-sm-12">
            <span class="btn btn-theme-sm btn-block btn-theme-transparent pull-center kakao-login btn-kakao-login">
              카카오 로그인
            </span>
          </div>
          <div class="col-sm-12 title" style="background-color: #ffffff; padding: 10px 20px 5px; text-transform: uppercase; font-size: 18px; line-height: 24px; font-weight: 700; color: #232323">
            <div class="option" style="text-align: center !important; margin: 0 auto 10px; text-transform: none; font-size: 10px; line-height: 14px; font-weight: 400; color: #757575">
              * 강사회원/센터회원은 간편로그인 후 마이페이지에서 신청해주세요
            </div>
          </div>
          <div class="col-sm-12 title" style="background-color: #ffffff; padding: 10px 20px 5px; text-transform: uppercase; font-size: 18px; line-height: 24px; font-weight: 700; color: #232323">
            <div class="option" style="text-align: center !important; margin: 0 auto 10px; text-transform: none; font-size: 10px; line-height: 14px; font-weight: 400; color: #232323">
              <a class="media-link" href="javascript:void(0);" onclick="search_ship_modal()">
                <u>비회원 배송조회</u>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="modal fade" id="searchShipModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="find-modal-title" id="myModalLabel">비회원 배송조회</h4>
      </div>
      <div class="modal-body">
        <div style="text-align: center">
          Sorry! <br>
          본 서비스는 오픈인 8/24부터 가능합니다.
        </div>
      </div>
      <div class="modal-footer">
        <!--        <button type="button" class="btn btn-danger btn-theme-sm" data-dismiss="modal"">취소</button>-->
        <button type="button" class="btn btn-danger btn-theme-sm" onclick="close_foundy_modal('searchShip')" style="text-transform: none; font-weight: 400;"">확인</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="restoreModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">회원 정보 복원</h4>
      </div>
      <div class="modal-body">
        <div class="text-center">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger " onclick="do_restore(0)">삭제</button>
        <button type="button" class="btn btn-theme btn-theme-sm " onclick="do_restore(1)" style="text-transform: none;
                font-weight: 400;">복원</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
<script type="text/javascript">

  function search_ship_modal() {
    $('#searchShipModal').modal('show');
  }
  function close_foundy_modal(id) {
    $('#' + id + 'Modal').modal('hide');
  }

  function do_restore(restore) {
    let r;
    $('#restoreModal').modal('hide');
    if (restore === 1) {
      r = 'ok';
    } else {
      r = 'no';
    }
    $.ajax({
      url : base_url + '/home/login/restore?r=' + r,
      type : 'GET',
      dataType : 'html', // 받을 데이터 방식
      success : function(data) {
        // console.log(data);
        if(data == 'done' || data.search('done') !== -1){
          var text = '<div>성공하셨습니다.</div>';
          notify(text,'success','bottom','right');
          setTimeout(function(){location.href='<?php echo base_url(); ?>';}, 1000);
        } else {
          var text = '<div>실패하셨습니다.</div>';
          notify(text,'warning','bottom','right');
        }
      },
      error: function(xhr, status, error){
        // console.log(xhr);
        // console.log(status);
        // console.log(error);
        alert('restore fail : ' + error);
        // window.location.href = base_url + 'home/login';
      }
    });
  }

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

            // console.log(user_data);
            $.ajax({
              url : base_url + '/home/login/kakao',
              type : 'post',
              data : user_data,
              dataType : 'json', // 받을 데이터 방식
              success : function(res) {
                // console.log(res);
                if (res.status === 'success') {
                    alert(res.message);
                    window.location.href = '<?php echo base_url(); ?>';
                } else {
                  $('#restoreModal .modal-body .text-center').text(res.message);
                  $('#restoreModal').modal('show');
                }
              },
              error: function(xhr, status, error){
                // console.log(xhr);
                // console.log(status);
                // console.log(error);
                alert('login fail : ' + error);
                // window.location.href = base_url + 'home/login';
              }
            });

            //console.log(Kakao.Auth.getAccessToken());
            //alert(JSON.stringify(res));
          },
          fail: function(error) {
            alert('kakao fail : ' + JSON.stringify(error));
          }
        });
      },
      fail : function( error ) {
        alert( 'login button fail : ' + JSON.stringify(error));
      }
    });
  });

</script>
