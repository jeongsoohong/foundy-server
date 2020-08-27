<style>
  .brand-icon {
    width: 100px !important;
    margin: 0 10px;
  }
  .navbar-header {
    display: flex;
  }
  .navbar-content {
    margin-left: auto !important;
    /*display: flex;*/
  }
  .navbar-content ul li {
    margin: 0 10px;
  }
  .navbar-content ul li a {
    /*width: 80px !important;*/
    text-align: center;
  }
  .navbar-header {
    background-color: white;
  }

  @media(min-width: 800px) {
    .navbar-header, .navbar-header:before {
      height: 50px;
    }
    .navbar-header .navbar-brand {
      background-color: white;
      width: 120px !important;
      height: 50px !important;
    }
    .navbar-brand img {
      width: 100px !important;
      height: 50px;
    }
    .navbar-content ul li a {
      font-size: 14px;
      padding: 0 12px;
      height: 40px;
    }
    .mypage-header {
      font-size: 14px;
      padding: 0 12px;
      height: 50px;
      line-height: 50px;
    }
  }

  @media(max-width: 800px) {
    .navbar-header, .navbar-header:before {
      height: 40px;
    }
    .navbar-header .navbar-brand {
      background-color: white;
      width: 96px;
      height: 40px !important;
    }
    .navbar-brand img {
      width: 80px !important;
      height: 40px;
    }
    .navbar-content ul li a {
      font-size: 12px;
      padding: 0 6px;
      height: 40px;
    }
    .mypage-header {
      font-size: 12px;
      padding: 0 12px;
      height: 40px;
      line-height: 40px;
    }
  }
  .mypage-header {
    /*width: 150px !important;*/
    text-align: center;
    background-color: white;
    /*height: 50px;*/
    /*line-height: 50px;*/
  }
  .mypage {
    display: none;
    /*width: 150px;*/
    z-index: 10;
    position: absolute;
    top: 50px;
    right: 20px;
    background-color: white;
    padding-right: 25px;
  }
  .mypage div {
    width: 100%;
    height: 30px;
    line-height: 30px;
    text-align: right;
  }
</style>
<header id="navbar">
  <div id="navbar-container" class="boxed">
    <!--Brand logo & name-->
    <div class="navbar-header">
      <a href="<?php echo base_url(); ?>shop" class="navbar-brand">
        <img src="<?php echo base_url(); ?>uploads/logo_image/foundy logo_0507.png" alt="<?php echo $system_name;?>" class="brand-icon">
      </a>
    </div>
    <!--End brand logo & name-->

    <!--Navbar -->
    <div class="navbar-content clearfix">
      <ul class="nav navbar-top-links pull-left">
        <li><a href="<?php echo base_url(); ?>shop">홈</a></li>
        <li><a href="<?php echo base_url(); ?>shop/notice">공지사항</a></li>
        <li><a href="<?php echo base_url(); ?>shop/product">상품관리</a></li>
        <li><a href="<?php echo base_url(); ?>shop/order">주문관리</a></li>
        <li><a href="<?php echo base_url(); ?>shop/income">정산관리</a></li>
        <li><a href="<?php echo base_url(); ?>shop/account">공급사관리</a></li>
      </ul>
      <div class="mypage-header pull-right" style="position: static;">
        <div style="text-align: right">
          <a href="javascript:void(0)" onclick="open_mypage()">
            <?php echo $shop->shop_name; ?>
            <span class="fa fa-angle-down" id="mypage-angle" style="margin-left: 10px"></span>
          </a>
        </div>
        <div class="mypage" style="">
          <div><a href="javascript:void(0);" onclick="open_change_shop()">브랜드 변경</a></div>
          <div><a href="javascript:void(0);" onclick="open_password()">비밀번호 변경</a></div>
          <div><a href="<?php echo base_url();?>shop/logout">로그아웃</a></div>
        </div>
      </div>
  </div>
</header>
<div class="modal fade" id="brandModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="width: 5px; padding: 0 15px">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="qna-title">브랜드 변경</h4>
      </div>
      <div class="modal-body" style="padding-top: 0 !important;">
        <div class="shop-select" style="width: 200px; margin: auto">
          <select class="form-control shop-ids" id="shop-selector" style="border:none; height: 50px; font-size: 14px;">
            <?php foreach ($shops as $shop) { ?>
              <option <?php if ($this->session->userdata('shop_id') == $shop->shop_id) echo 'selected'; ?>
                value="<?php echo $shop->shop_id; ?>"><?php echo $shop->shop_name; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="modal-footer" style="display: block;">
        <button type="button" class="btn btn-theme btn-theme-sm" style="text-transform: none; background-color: black; color:white; width:20%; font-weight: 400;"
                onclick="change_shop();">확인</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="pwModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">비밀번호 변경</h4>
      </div>
      <div class="modal-body">
        <div style="text-align: center; font-size: 12px; color: grey; margin: 20px;">
          비밀번호는 영문, 숫자를 혼합하여<br>
          최소 8자리 ~ 최대 30자리 이내로 입력해주세요.
        </div>
        <div class="pw">
          <input type="password" class="form-control" id="password" name="password" placeholder="비밀번호">
        </div>
        <div class="pw1">
          <input type="password" class="form-control" id="password1" name="password1" placeholder="새 비밀번호">
        </div>
        <div class="pw2">
          <input type="password" class="form-control" id="password2" name="password2" placeholder="새 비밀번호 확인">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-theme-sm" data-dismiss="modal" onclick="clear_password();">취소</button>
        <button type="button" class="btn btn-theme btn-theme-sm"style="background-color: black; color: white; text-transform: none; font-weight: 400;"
                onclick="change_password();">확인</button>
      </div>
    </div>
  </div>
</div>
<style>
  .pw, .pw1, .pw2 {
    width: 300px;
    margin: 10px auto;
  }
  .alert {
    z-index: 1050 !important;
  }
</style>
<script>
  
  function clear_password() {
    // console.log($('#password1').val());
    // console.log($('#password2').val());
    
    $('#password1').val('');
    $('#password2').val('');
    $('#pwModal').modal('hide');
  }
  
  let shop_id = 0;
  function open_password(id) {
    clear_password();
    
    // console.log('shop_id : ' + shop_id);
    
    shop_id = id;
    $('#pwModal').modal('show');
  }
  
  function change_password() {
    let password = $('#password').val();
    let password1 = $('#password1').val();
    let password2 = $('#password2').val();
    
    // console.log(shop_id);
    // console.log(password1);
    // console.log(password2);
  
    $('#loading_set').show();
    
    let formData = new FormData();
    formData.append('password', password);
    formData.append('password1', password1);
    formData.append('password2', password2);
    
    $.ajax({
      url : '<?php echo base_url().'shop/account/password'; ?>',
      type: 'post', // form submit method get/post
      dataType: 'html',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success : function(res) {
        $("#loading_set").fadeOut(500);
        // console.log(res);
        res = JSON.parse(res);
        if (res.status === 'success') {
          console.log(res.message);
          let text = '<strong>' + res.message + '</strong>';
          $.notify({
            message: text,
            icon: 'fa fa-check'
          }, {
            type: 'success',
            timer: 1000,
            delay: 2000,
            animate: {
              enter: 'animated lightSpeedIn',
              exit: 'animated lightSpeedOut'
            }
          });
          setTimeout(function(){location.reload();}, 1000);
        } else {
          let title = '<strong>실패하였습니다</strong><br>';
          $.notify({
            title: title,
            message: res.message,
            icon: 'fa fa-check'
          }, {
            type: 'warning',
            timer: 1000,
            delay: 5000,
            animate: {
              enter: 'animated lightSpeedIn',
              exit: 'animated lightSpeedOut'
            }
          });
        }
      },
      error: function(xhr, status, error){
        // console.log(xhr);
        // console.log(status);
        // console.log(error);
        alert('fail : ' + error);
        // window.location.href = base_url + 'home/login';
      }
    });
  }
  let mypage = 'down';
  function open_mypage() {
    if (mypage === 'down') {
      $('#mypage-angle').removeClass('fa-angle-down');
      $('#mypage-angle').addClass('fa-angle-up');
      $('.mypage').show();
      mypage = 'up';
    } else {
      $('#mypage-angle').removeClass('fa-angle-up');
      $('#mypage-angle').addClass('fa-angle-down');
      $('.mypage').hide();
      mypage = 'down';
    }
  }
 
  function open_change_shop() {
    $('#brandModal').modal('show');
  }
  function change_shop() {
    let shop_id = $('#shop-selector').find('option:selected').val();
    // console.log(shop_id);
  
    $('#loading_set').show();
    
    $.ajax({
      url: '<?php echo base_url(); ?>shop/change?id=' + shop_id, // form action url
      type: 'GET', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        $("#loading_set").fadeOut(500);
        if (data === 'done' || data.search('done') !== -1) {
          $.notify({
            message: '변경되었습니다.',
            icon: 'fa fa-check'
          }, {
            type: 'success',
            timer: 1000,
            delay: 1000,
            animate: {
              enter: 'animated lightSpeedIn',
              exit: 'animated lightSpeedOut'
            }
          });
          window.location.reload(true);
        } else {
          var title = '<strong>실패하였습니다 : </strong>';
          $.notify({
            title: title,
            message: data,
            icon: 'fa fa-check'
          }, {
            type: 'warning',
            timer: 1000,
            delay: 1000,
            animate: {
              enter: 'animated lightSpeedIn',
              exit: 'animated lightSpeedOut'
            }
          });
        }
      },
      error: function (e) {
        console.log(e)
      }
    });
  }
  
  // $(document).ready(function() {
  //
  //   let text = '<strong>성공</strong>';
  //   $.notify({
  //     message: text,
  //     icon: 'fa fa-check'
  //   }, {
  //     type: 'success',
  //     timer: 100000,
  //     delay: 200000,
  //     animate: {
  //       enter: 'animated lightSpeedIn',
  //       exit: 'animated lightSpeedOut'
  //     }
  //   });
  //   // setTimeout(function(){location.reload();}, 1000);
  // })
</script>
