<style>
  .navbar-header .navbar-brand {
    width: 120px !important;
    background-color: white;
  }
  .brand-icon {
    width: 100px !important;
    margin: 0 10px;
  }
  .navbar-content {
    margin-left: 120px !important;
  }
  .navbar-content ul li {
    margin: 0 10px;
  }
  .navbar-content ul li a {
    width: 100px !important;
    text-align: center;
    font-size: 16px;
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
      <ul class="nav navbar-top-links pull-right">
        <li><a href="<?php echo base_url();?>shop/logout">로그아웃</a></li>
      </ul>
      <ul class="nav navbar-top-links pull-right">
        <li>
          <div class="shop-select">
            <select class="form-control shop-ids" id="shop-selector" onchange="change_shop()" style="border:none; height: 50px; font-size: 16px;">
              <?php foreach ($shops as $shop) { ?>
                <option <?php if ($this->session->userdata('shop_id') == $shop->shop_id) echo 'selected'; ?>
                  value="<?php echo $shop->shop_id; ?>"><?php echo $shop->shop_name; ?></option>
              <?php } ?>
            </select>
          </div>
        </li>
      </ul>
  </div>
</header>
<script>
  function change_shop() {
    let shop_id = $('#shop-selector').find('option:selected').val();
    console.log(shop_id);

    $.ajax({
      url: '<?php echo base_url(); ?>shop/change?id=' + shop_id, // form action url
      type: 'GET', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        if (data === 'done' || data.search('done') !== -1) {
          // $.notify({
          //   message: '변경되었습니다.',
          //   icon: 'fa fa-check'
          // }, {
          //   type: 'success',
          //   timer: 1000,
          //   delay: 1000,
          //   animate: {
          //     enter: 'animated lightSpeedIn',
          //     exit: 'animated lightSpeedOut'
          //   }
          // });
          window.location.reload(true);
        } else {
          var title = '<strong>실패하였습니다</strong>';
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
</script>
