<script src="https://checkout.stripe.com/checkout.js"></script>
<style>
  @media (min-width: 1200px){
    .cus_cont {
      width: 1290px;
    }
  }
</style>
<section class="page-section" style="padding-top: 0 !important;">
  <div class="wrap container">
    <!-- <div id="profile-content"> -->
    <div class="row profile">
      <div class="col-lg-12 col-md-12" style="padding-left: 0 !important; padding-right: 0 !important;">
        <div id="profile_content">

        </div>
      </div>
      <div class="col-lg-12 col-md-12" style="margin-top: 20px !important;">
        <input type="hidden" id="state" value="normal" />
        <div class="widget account-details">
          <div class="information-title" style="margin-bottom: 0px; margin-top: 0px;">더보기</div>
          <ul class="pleft_nav">
            <a class="pnav_info" href="#profile_content" style="display: none;"><li>프로필</li></a>
            <a class="pnav_edit_profile" href="#profile_content" style="display: none"><li>프로필 편집</li></a>
            <a class="pnav_notifination" href="#"><li>공지사항</li></a>
            <a class="pnav_introduce" href="#"><li>파운디 소개</li></a>
            <a class="pnav_faq" href="#"><li>자주하는 질문</li></a>
            <a class="pnav_customer_center" href="http://pf.kakao.com/_xnzxbxaxb/chat"><li>고객센터</li></a>
<!--            <a class="pnav_user_question" href="#"><li>1:1 문의하기</li></a>-->
<!--            <a class="pnav_service" href="#profile_content"><li>서비스 이용 약관</li></a>-->
<!--            <a class="pnav_privacy" href="#profile_content"><li>개인정보 보호정책</li></a>-->
          </ul>
          <div class="information-title" style="margin-bottom: 0px; margin-top: 0px;">샵</div>
          <ul class="pleft_nav">
            <a class="pnav_shop_wishlist" href="<?php echo base_url(); ?>home/shop?cat=wish&col=product_id&order=desc"><li>위시리스트</li></a>
            <a class="pnav_shop_orderlist" href="<?php echo base_url();?>home/shop/order"><li>주문내역</li></a>
            <a class="pnav_coupon_box" href="<?php echo base_url();?>home/coupon"><li>쿠폰박스</li></a>
          </ul>
          <div class="information-title" style="margin-bottom: 0px; margin-top: 0px;">신청</div>
          <ul class="pleft_nav">
            <a class="pnav_center_register" href="#profile_content"><li>센터 신청</li></a>
            <a class="pnav_teacher_register" href="#profile_content"><li>강사 신청</li></a>
<!--            <a class="pnav_shop_register" href="#profile_content"><li>샵 브랜드 신청</li></a>-->
          </ul>
          <div class="information-title" style="margin-bottom: 0px; margin-top: 0px;">계정</div>
          <ul class="pleft_nav">
            <a class="pnav_logout" href="#"><li>로그아웃</li></a>
            <a class="pnav_unregister" href="#"><li>회원탈퇴</li></a>
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

<!-- Modal For C-C Post confirm -->
<div class="modal fade" id="updateProfileModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">프로필</h4>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <div>프로필을 정말 수정하시겠습니까?
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger post_confirm_close" data-dismiss="modal">취소</button>
        <button type="button" class="btn btn-theme btn-theme-sm post_confirm" id="update_profile" style="text-transform: none; font-weight: 400;">확인</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal For C-C Post confirm -->

<!-- Modal For C-C Post confirm -->
<div class="modal fade" id="updatePasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">비밀번호</h4>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <div>비밀번호를 정말 수정하시겠습니까?
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger post_confirm_close" data-dismiss="modal">취소</button>
        <button type="button" class="btn btn-theme btn-theme-sm post_confirm" id="update_password" style="text-transform: none; font-weight: 400;">확인</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal For C-C Post confirm -->

<!-- Modal For C-C Post confirm -->
<div class="modal fade" id="shopRegisterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">샵 회원 신청</h4>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <div>입점 승인까지는 3-4일정도 소요되며, 완료 후 연락드리겠습니다
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

<div class="modal fade" id="userUnregisterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">회원 탈퇴</h4>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <div>정말 탈퇴하시겠습니까?<br>
            탈퇴하시면 7일간 데이터 보존 후 삭제되어<br>
            복원이 불가능하고 로그인이 제한될 수 있습니다.
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger post_confirm_close" data-dismiss="modal">취소</button>
        <button type="button" class="btn btn-theme btn-theme-sm post_confirm" onclick="user_unregister()" style="text-transform: none;
                font-weight: 400;">확인</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="userUnregisterConfirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">회원 탈퇴</h4>
      </div>
      <div class="modal-body">
        <div class="text-center">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger post_confirm_close" data-dismiss="modal">취소</button>
        <button type="button" class="btn btn-theme btn-theme-sm post_confirm" onclick="do_user_unregister()" style="text-transform: none;
                font-weight: 400;">확인</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="qnaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">1:1 문의하기</h4>
      </div>
      <div class="modal-body">
        <div class="qna-email">
          <label style="width: 100%; font-size: 14px">
            이메일
            <input type="email" class="form-control" id="qna-email" name="qna_email" value="<?php echo $user_data->email; ?>">
          </label>
        </div>
        <div class="qna-body-modal">
          <label style="width: 100%; font-size: 14px">
            문의할 내용을 입력해주세요.
            <textarea rows="10" data-height="500" name='qna_body' id='qna-body' class="form-control" wrap="hard"></textarea>
          </label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-theme-sm" data-dismiss="modal" onclick="clear_qna();">취소</button>
        <button type="button" class="btn btn-theme btn-theme-sm"style="text-transform: none; font-weight: 400;" onclick="submit_qna();">확인</button>
      </div>
    </div>
  </div>
</div>

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

  let loading_set = '<div style="text-align:center;width:100%;height:400px; position:relative;top:200px;"><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i></div>';

  $('.pnav_info').on('click',function(){
    $("#profile_content").html(loading_set);
    $("#profile_content").load("<?php echo base_url()?>home/user/info");
    $(".pleft_nav").find("li").removeClass("active");
    $(".pnav_info").find("li").addClass("active");
  });

  $('.pnav_logout').click(function(e) {
    user_logout();
  });
  
  function do_user_unregister() {
    $('#loading_set').show();
    $.ajax({
      url : '<?php echo base_url().'/home/unregister'; ?>',
      dataType : 'json', // 받을 데이터 방식
      success : function(res) {
        $("#loading_set").fadeOut(500);
        if (res.status === 'success') {
          alert(res.message);
          window.location.href = base_url;
        } else {
          console.log(res.message);
          alert(res.message);
          // window.location.href = base_url;
        }
      },
      error: function(xhr, status, error){
        console.log(error);
        // alert(error);
        // window.location.href = base_url + 'home/login';
      }
    });
  }

  function do_kakao_unregister() {
    $('#loading_set').show();
    $.getScript("https://developers.kakao.com/sdk/js/kakao.min.js", function() {
      Kakao.init('8ee901a556539927d58b30a6bf21a781');
      // console.log(Kakao.Auth.getAccessToken());
      if (!Kakao.Auth.getAccessToken()) {
        $("#loading_set").fadeOut(500);
        alert('Not logged in.');
      } else {
        Kakao.API.request({
          url: '/v1/user/unlink',
          success: function(response) {
            $("#loading_set").fadeOut(500);
            // console.log(response);
            do_user_unregister()
          },
          fail: function(error) {
            console.log(error);
          },
        });
      }
    });
  }

  function user_unregister() {
    $('#userUnregisterModal').modal('hide');
    $('#loading_set').show();
    $.ajax({
      url : base_url + '/home/unregister/confirm',
      dataType : 'json',
      success : function(res) {
        $("#loading_set").fadeOut(500);
        if (res.status === 'success') {
          if (res.message === '') {
            $('#userUnregisterConfirmModal').modal('hide');
            if (login_type === 'kakao') {
              do_kakao_unregister();
            } else {
              do_user_unregister();
            }
          } else {
            $('#userUnregisterConfirmModal .modal-body .text-center').text(res.message);
            $('#userUnregisterConfirmModal').modal('show');
          }
        } else {
          alert(res.message);
          window.location.href = base_url;
        }
      },
      error: function(xhr, status, error){
        alert(error);
        window.location.href = base_url + 'home/login';
      }
    });
  }

  $('.pnav_unregister').click(function(e) {
    $('#userUnregisterModal').modal('show');
  });

  $('.pnav_center_register').on('click',function(){
    $("#profile_content").html(loading_set);
    $("#profile_content").load("<?php echo base_url()?>home/user/center_register");
    $(".pleft_nav").find("li").removeClass("active");
    $(".pnav_center_register").find("li").addClass("active");
    $.getScript("//dapi.kakao.com/v2/maps/sdk.js?appkey=8ee901a556539927d58b30a6bf21a781&autoload=false&libraries=services", function() {
      kakao.maps.load(function() {
        // getLocation();
        var mapContainer = document.getElementById('kakao-map'), // 지도를 표시할 div
          mapOption = {
            center: new kakao.maps.LatLng(33.450701, 126.570667), // 지도의 중심좌표
            // center: new kakao.maps.LatLng(coords.longitude, coords.latitude), // 지도의 중심좌표
            level: 3 // 지도의 확대 레벨
          };
        // console.log(mapContainer);
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

  $('.pnav_shop_register').on('click',function(){
    $("#profile_content").html(loading_set);
    $("#profile_content").load("<?php echo base_url()?>home/user/shop_register");
    $(".pleft_nav").find("li").removeClass("active");
    $(".pnav_shop_register").find("li").addClass("active");
  });

  $('.pnav_edit_profile').on('click',function(){
    $("#profile_content").html(loading_set);
    $("#profile_content").load("<?php echo base_url()?>home/user/edit_profile");
    $(".pleft_nav").find("li").removeClass("active");
    $(".pnav_edit_profile").find("li").addClass("active");
  });
  //$('.pnav_service').on('click',function(){
  //  $("#profile_content").html(loading_set);
  //  $("#profile_content").load("<?php //echo base_url()?>//home/user/service");
  //  $(".pleft_nav").find("li").removeClass("active");
  //  $(".pnav_service").find("li").addClass("active");
  //});
  //$('.pnav_privacy').on('click',function(){
  //  $("#profile_content").html(loading_set);
  //  $("#profile_content").load("<?php //echo base_url()?>//home/user/privacy");
  //  $(".pleft_nav").find("li").removeClass("active");
  //  $(".pnav_privacy").find("li").addClass("active");
  //});
  $('.pnav_notifination').on('click',function(){
    window.location.href='<?php echo base_url().'home/notice?type=all'; ?>';
  });
  $('.pnav_faq').on('click',function(){
    window.location.href='<?php echo base_url().'home/notice?type=faq'; ?>';
  });
  $('.pnav_introduce').on('click',function(){
    window.location.href='<?php echo base_url().'home/notice?type=introduce'; ?>';
  });
  $('.pnav_user_question').on('click',function(){
    $('#qnaModal').modal('show');
  });

  function clear_qna() {
    $('#qna-body').val('');
  }
  function submit_qna() {
    let qna_body = trim($('#qna-body').val());
    let qna_email = trim($('#qna-email').val());
  
    // console.log(qna_body);
    // console.log(qna_email);
    
    if (isValidEmailAddress(qna_email) === false) {
      alert('유효한 이메일을 입력바랍니다.');
      return false;
    }
    if (qna_body.toString().length < 10) {
      alert('최소 10자 이상 입력바랍니다.');
      return false;
    }
  
    $('#loading_set').show();
  
    let formData = new FormData();
    formData.append('qna_body', qna_body);
    formData.append('email', qna_email);
  
    $.ajax({
      url: '<?php echo base_url(); ?>home/qna', // form action url
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        $("#loading_set").fadeOut(500);
        if (data === 'done' || data.search('done') !== -1) {
          let text = '<strong>성공하였습니다</strong>';
          notify(text,'success','bottom','right');
          $('#qnaModal').modal('hide');
          window.location.reload(true);
        } else {
          let text = '<strong>실패하였습니다</strong>' + data;
          notify(text,'warning','bottom','right');
        }
      },
      error: function (e) {
        console.log(e)
      }
    });
  }
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
