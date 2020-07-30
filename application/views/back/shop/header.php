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
  </div>
</header>
