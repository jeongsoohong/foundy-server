<?php
//$find_url = '';
//$life_url = '';
//$earth_url = '';
//$shop_url = '';
//
//$category_names = array('find', 'life', 'earth', 'shop');
//foreach ($category_names as $category_name) {
//  $category_info = $this->db->get_where('category_blog', array('name' => $category_name, 'activate' => 1))->row();
//  if (empty($category_info)) {
//    ${"{$category_name}_url"} = base_url();
//  } else {
//    $this->db->order_by('blog_id', 'desc');
//    $this->db->limit(1);
//    $blog_info = $this->db->get_where('blog', array('blog_category' => $category_info->category_id))->row();
//    if (empty($blog_info)) {
//      ${"{$category_name}_url"} = base_url();
//    } else {
//      ${"{$category_name}_url"} = base_url() . "home/blog/view?id=" . $blog_info->blog_id;
//    }
//  }
//}

$today = date('Y-m-d H:i:s');
$beta_service = $this->db->get_where('server_settings', array('type' => SERVER_SETTINGS_TYPE_BETA_SERVICE))->row();

$is_admin = false;
if ($this->session->userdata('user_login') == "yes") {
  $user_data = json_decode($this->session->userdata('user_data'));
  if ($user_data->user_type & USER_TYPE_ADMIN) {
    $is_admin = true;
  }
}
?>
<!-- HEADER -->
<style>
  .navigation-wrapper .container .navigation ul {
    width: 100%;
  }
  .navigation-wrapper .container .navigation ul li.main-nav {
    width: 25%;
  }
  .navigation-wrapper .container .navigation ul li.shop-nav {
  <?php if ($beta_service->start_at < $today && $today < $beta_service->end_at && $is_admin == false) { ?>
    width: 25%;
  <?php } else { ?>
    width: 20%;
  <?php } ?>
  }
  .navigation-wrapper .container .navigation ul li a {
    text-align: center;
  }
  .header-wrapper {
    padding: 8px 0 !important;
  }
</style>

<!-- category menu -->
<style>
  .gloomy {
    color: #424242 !important;
  }
  .dark {
    color: #616161 !important;
  }
  /* CSS RESET */
  #cat_menu * {
    padding: 0;
    border: 0;
    margin: 0;
  }
  #cat_menu a {text-decoration: none;}
  #cat_menu p {word-break: keep-all;}
  #cat_menu li {list-style: none;}
  #cat_menu img {vertical-align: middle;}
  #cat_menu button {
    background: none;
    outline: none !important;
    cursor: pointer;
    border: none;
  }
  #cat_menu input {
    background: none;
    outline: none;
    color: #616161;
    box-sizing: border-box;
    border: 1px solid #ccc;
  }
  #cat_menu input:focus {
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  }
  #cat_menu input[type="checkbox"], input[type="radio"] {
    vertical-align: middle;
  }
  #cat_menu textarea {
    display: block;
    outline: none;
    resize: none;
  }
  #cat_menu table {border-collapse: collapse;}
  #cat_menu select {
    background: none;
    outline: none;
    -moz-appearance: none;
    -webkit-appearance: none;
    border-radius: 0;
    cursor: pointer;
  }
  #cat_menu body {
    font-family: 'Spoqa Han Sans', 'Spoqa Han Sans JP', 'Sans-serif';
    height: 100%;
  }
  #cat_menu .clearfix::after {
    content: "";
    display: block;
    clear: both;
  }
  #cat_menu .scroll-y {
    overflow-y: scroll;
  }
  #cat_menu .keepall {
    word-break: keep-all;
  }
  #cat_menu .meaning {
    overflow: hidden;
    position: absolute;
    width: 0;
    height: 0;
    line-height: 0;
  }
  #cat_menu {
    min-width: 320px;
    width: 100%;
    height: 100%;
  }
  #cat_menu h2, #cat_menu h3, #cat_menu h4, #cat_menu a {
    font-family: futura-pt !important;
    font-style: normal !important;
    font-weight: bold;
  }
  #cat_menu h4 > a {
    font-weight: normal;
  }
  /* menu_box */
  #cat_menu .menu_main a, #cat_menu .menu_sub a {
    display: block;
  }
  #cat_menu .menu_box {
    padding: 24px 16px 40px;
    background-color: #000;
    box-sizing: border-box;
    position: fixed;
    z-index: 3000;
    width: 100%;
    height: 100%;
  }
  #cat_menu .menu_box h3, #cat_menu .menu_box h4, #cat_menu .menu_box a, #cat_menu .menu_box button {
    color: #fff;
  }
  #cat_menu .menu_box h3 {
    font-size: 30px;
    margin-bottom: 12px;
  }
  #cat_menu .menu_box h3:nth-child(2) {
    margin-bottom: 0;
  }
  #cat_menu .menu_box h4 {
    color: #e0e0e0;
    font-size: 24px;
    font-weight: normal;
    margin-bottom: 12px;
    cursor: pointer;
  }
  #cat_menu .main_shop {
    padding-top: 24px;
    border-top: 1px solid #bdbdbd;
    margin: 24px 0;
  }
  #cat_menu .main_shop h3 {
    margin-bottom: 8px;
    color: darkorange;
  }
  #cat_menu .menu_sub {
    /*
        position: absolute;
        bottom: 72px;
        left: 16px;
    */
    margin-top: 60px;
  }
  #cat_menu .menu_box h4 > a {
    color: #e0e0e0;
  }
  #cat_menu .btn_close {
    position: absolute;
    top: 6px;
    right: 0;
    width: 44px;
    height: 44px;
  }
  #cat_menu .sub_work a, #cat_menu .sub_work button {
    display: block;
    font-size: 14px;
  }
  #cat_menu .sld_li > a {
    color: #bdbdbd;
    font-size: 18px;
    font-weight: normal;
    padding-bottom: 10px;
    padding-left: 12px;
  }
  #cat_menu .sld_li > a:last-child {
    margin-bottom: 24px;
  }
  #cat_menu .li_cnt > a {
    color: #fff;
    font-size: 16px;
    padding-bottom: 10px;
    padding-left: 20px;
  }
  #cat_menu .li_cnt > a::before {
    content: "";
    display: inline-block;
    width: 4px;
    height: 4px;
    border-radius: 2px;
    background-color: #111111;
    margin: 4px 8px;
  }
  #cat_menu .li_cnt > a:last-child {
    margin-bottom: 16px;
  }
  #cat_menu .header {
    height: 56px;
    background-color: #fff;
    border-bottom: 1px solid #eee;
  }
  #cat_menu .header__nav {
    position: relative;
    width: 100%;
  }
  #cat_menu .nav__tit {
    width: 100%;
    text-align: center;
    line-height: 56px;
  }
  #cat_menu .header__tit a {
    display: block;
  }
  /* setting_wrap */
  #cat_menu .setting_wrap {
    width: 100%;
    height: 100%;
    position: fixed;
    z-index: 4000;
    background-color: #fff;
  }
  #cat_menu .settings {
    padding: 36px 16px;
    height: calc(100% - 56px);
  }
  #cat_menu .setting__tit {
    color: #000;
    text-align: center;
    padding-bottom: 32px;
    font-size: 18px;
    font-weight: normal;
    letter-spacing: 0.15em;
  }
  #cat_menu .setting__agree {
    padding-bottom: 28px;
    border-bottom: 1px solid #eee;
    margin-bottom: 28px;
  }
  #cat_menu .push_txt, #cat_menu .local_txt, #cat_menu .version_info {
    float: left;
    color: #333;
    font-size: 14px;
    font-weight: normal;
  }
  #cat_menu .push_txt, #cat_menu .local_txt {
    line-height: 32px;
    padding-bottom: 8px;
  }
  #cat_menu .local_txt {
    padding: 0;
  }
  #cat_menu .agree_btn {
    float: right;
  }
  #cat_menu .setting__version p {
    line-height: 1.5;
  }
  #cat_menu .version_info {
    width: 54px;
  }
  #cat_menu .version_recent {
    float: right;
    color: #333;
    font-size: 14px;
    font-weight: normal;
    line-height: 44px;
  }
  /* agree_btn */
  /* The switch - the box around the slider */
  #cat_menu .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 32px;
    vertical-align:middle;
  }
  #cat_menu .message p {
    line-height: 32px;
    font-weight: bold;
    color: #bdbdbd;
  }
  /* Hide default HTML checkbox */
  #cat_menu .switch input {display:none;}
  /* The slider */
  #cat_menu .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #e0e0e0;
    -webkit-transition: .4s;
    transition: .4s;
  }
  #cat_menu .slider:before {
    position: absolute;
    content: "";
    height: 24px;
    width: 24px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }
  #cat_menu input:checked + .slider {
    background-color: #2196F3;
  }
  #cat_menu input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
  }
  #cat_menu input:checked + .slider:before {
    -webkit-transform: translateX(27px);
    -ms-transform: translateX(27px);
    transform: translateX(27px);
  }
  /* Rounded sliders */
  #cat_menu .slider.round {
    border-radius: 32px;
  }
  #cat_menu .slider.round:before {
    border-radius: 50%;
  }
</style>
<div id="cat_menu">
  <article class="menu_box scroll-y" style="display: none; background-color: #F1EEE8">
    <h2 class="meaning">카테고리</h2>
    <button class="btn_close menu_close" onclick="close_menu()">
      <img src="<?php echo base_url(); ?>template/front/header/imgs/icon_close_black.png" width="16" height="16" alt="닫기">
    </button>
    <div class="menu_main">
      <h3>
        <a href="<?php echo base_url(); ?>home/user" style="color: #A5A3A0; font-size: 21px">MY PAGE</a>
      </h3>
      <h3>
        <a href="<?php echo base_url(); ?>home/coupon" style="color: #A5A3A0; font-size: 21px">COUPON BOX</a>
      </h3>
      <article class="main_shop">
        <h3 style="color: #845B4C; font-size: 21px">SHOP</h3>
        <section class="shop_theme">
          <h4>
            <a href="<?php echo base_url(); ?>home/shop/main" style="color: #A5A3A0; font-size: 18px;">main</a>
          </h4>
          <h4>
            <a href="<?php echo base_url().'home/shop?cat=all&col=product_id&order=desc'; ?>" style="color: #A5A3A0; font-size: 18px;">new</a>
          </h4>
          <div class="sld_wrap">
            <h4 class="sld_tit highlight" style="color: #A5A3A0; font-size: 18px;">yoga</h4>
            <div class="sld_li" style="display: none;">
              <a href="#" class="li_theme li_focus" style="color: #939393; font-size: 18px">Yoga wear</a>
              <div style="display: none;" class="li_cnt">
                <a href="<?php echo base_url().'home/shop?cat=010101&col=product_id&order=desc'; ?>" style="color:#111111; font-size: 18px;">TOP</a>
                <a href="<?php echo base_url().'home/shop?cat=010102&col=product_id&order=desc'; ?>" style="color:#111111; font-size: 18px;">BOTTOM</a>
                <a href="<?php echo base_url().'home/shop?cat=010103&col=product_id&order=desc'; ?>" style="color:#111111; font-size: 18px;">OUTER</a>
              </div>
              <a href="#" class="li_theme li_focus" style="color: #939393; font-size: 18px">Yoga mat</a>
              <div style="display: none;" class="li_cnt">
                <a href="<?php echo base_url().'home/shop?cat=010201&col=product_id&order=desc'; ?>" style="color:#111111; font-size: 18px;">Mat</a>
                <a href="<?php echo base_url().'home/shop?cat=010202&col=product_id&order=desc'; ?>" style="color:#111111; font-size: 18px;">Towel</a>
              </div>
              <a href="<?php echo base_url().'home/shop?cat=010203&col=product_id&order=desc'; ?>" class="li_focus" style="color: #939393; font-size: 18px">Prop</a>
              <a href="<?php echo base_url().'home/shop?cat=010301&col=product_id&order=desc'; ?>" class="li_focus" style="color: #939393; font-size: 18px">Accessories</a>
            </div>
            <h4 class="sld_tit highlight" style="color: #A5A3A0; font-size: 18px;">vegan</h4>
            <div class="sld_li" style="display: none;">
              <a href="<?php echo base_url().'home/shop?cat=020100&col=product_id&order=desc'; ?>" class="li_focus" style="color: #939393; font-size: 18px">Cosmetic</a>
              <a href="<?php echo base_url().'home/shop?cat=020200&col=product_id&order=desc'; ?>" class="li_focus" style="color: #939393; font-size: 18px">Foods</a>
            </div>
            <h4 class="sld_tit highlight" style="color: #A5A3A0; font-size: 18px;">healing</h4>
            <div class="sld_li" style="display: none;">
              <a href="#" class="li_theme li_focus" style="color: #939393; font-size: 18px">Tea</a>
              <div style="display: none;" class="li_cnt">
                <a href="<?php echo base_url().'home/shop?cat=030101&col=product_id&order=desc'; ?>" style="color:#111111; font-size: 18px;">차</a>
                <a href="<?php echo base_url().'home/shop?cat=030102&col=product_id&order=desc'; ?>" style="color:#111111; font-size: 18px;">다도용품</a>
              </div>
              <a href="#" class="li_theme li_focus" style="color: #939393; font-size: 18px">Fragrance</a>
              <div style="display: none;" class="li_cnt">
                <a href="<?php echo base_url().'home/shop?cat=030201&col=product_id&order=desc'; ?>" style="color:#111111; font-size: 18px;">향</a>
                <a href="<?php echo base_url().'home/shop?cat=030202&col=product_id&order=desc'; ?>" style="color:#111111; font-size: 18px;">아로마</a>
                <a href="<?php echo base_url().'home/shop?cat=030203&col=product_id&order=desc'; ?>" style="color:#111111; font-size: 18px;">향꽂이</a>
              </div>
              <a href="<?php echo base_url().'home/shop?cat=030301&col=product_id&order=desc'; ?>" class="li_focus" style="color: #939393; font-size: 18px">Meditation</a>
              <a href="<?php echo base_url().'home/shop?cat=030302&col=product_id&order=desc'; ?>" class="li_focus" style="color: #939393; font-size: 18px">Book</a>
            </div>
          </div>
        </section>
      </article>
      <h3 >
        <a href="<?php echo base_url(); ?>home/find" style="color: #845B4C; font-size: 21px">FIND</a>
      </h3>
      <h3>
        <a href="<?php echo base_url(); ?>home/blog" style="color: #845B4C; font-size: 21px">LIFE</a>
      </h3>
    </div>
    <div class="menu_sub">
      <?php if ($this->app_model->is_app()) { ?>
        <h3 class="sub_work work_set">
          <button onclick="open_setting_menu()" style="color: #845B4C;">SETTINGS</button>
        </h3>
      <?php } ?>
      <h3 class="sub_work">
        <?php if ($this->session->userdata('user_login') == 'yes') { ?>
          <a href="javascript:void(0)" onclick="_logout();" style="color: #845B4C;">LOGOUT</a>
        <?php } else { ?>
          <a href="<?php echo base_url(); ?>home/login" style="color: #845B4C;">LOGIN</a>
        <?php } ?>
      </h3>
    </div>
  </article>
  <?php if ($this->app_model->is_app()) { ?>
    <article class="setting_wrap" style="display: none;">
      <h2 class="meaning">설정</h2>
      <header class="header">
        <nav class="header__nav">
          <h3 class="nav__tit">
            <a href="#" class="tit_home">
              <img src="<?php echo base_url(); ?>template/front/header/imgs/logo_foundy.png" height="30" width="auto" alt="홈">
            </a>
          </h3>
          <button class="btn_close set_close" onclick="close_setting_menu()">
            <img src="<?php echo base_url(); ?>template/front/header/imgs/icon_close_black.png" width="16" alt="닫기">
          </button>
        </nav>
      </header>
      <section class="settings scroll-y">
        <h3 class="setting__tit">SETTINGS</h3>
        <div class="setting__agree">
          <div class="agree--push clearfix">
            <p class="push_txt">푸시알림 동의</p>
            <div class="agree_btn">
              <label class="switch">
                <input <?php if ($this->app_model->get_push_setting() == 'ON') echo 'checked';  ?>
                  id="push_setting" type="checkbox" onclick="setPush();">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <div class="agree--local clearfix">
            <p class="local_txt">위치정보 제공 동의</p>
            <div class="agree_btn">
              <label class="switch">
                <input <?php if ($this->app_model->get_gps_setting() == 'ON') echo 'checked';  ?>
                  id="gps_setting" type="checkbox" onclick="setGPS();">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
        </div>
        <div class="setting__version clearfix">
          <p class="version_info keepall">버전 정보 <span id="app_version"></span>
          </p>
          <p class="version_recent">최신 버전입니다.</p>
        </div>
      </section>
    </article>
  <?php } ?>
</div>
<header class="header header-logo-left">
  <div class="header-wrapper">
    <div class="container">
      <div class="flex-row">
        <div class="flex-col-2" style="text-align: center;">
          <?php if ($this->app_model->is_app() == false) { ?>
            <a href="javascript:void(0)" onclick="open_menu()">
              <img src="<?php echo base_url(); ?>template/front/header/imgs/icon_menu_black.png" alt="menu" style="height:15px; width:22px; margin-top:12px">
            </a>
          <?php } else if (strncasecmp($page_name,'home',4)) { ?>
            <a href="javascript:void(0)" onclick="go_prev_page();">
              <img src="<?php echo base_url(); ?>template/front/header/imgs/prev_black.png" alt="menu" style="height:22px; width:15px; margin-top:10px">
            </a>
<!--          --><?php //} else { ?>
<!--            <a href="javascript:void(0)" onclick="categoryMenuToggle()">-->
<!--              <img src="--><?php //echo base_url(); ?><!--template/front/header/imgs/icon_menu_black.png" alt="menu" style="height:15px; width:22px; margin-top:12px">-->
<!--            </a>-->
          <?php } ?>
        </div>
        <div class="flex-col-8" style="text-align: center;">
          <!-- Logo -->
          <a href="<?php echo base_url();?>">
            <img src="<?php echo base_url(); ?>template/front/header/imgs/logo_foundy.png" alt="home" style="height: 30px; width: auto; margin-top: 5px;"/>
          </a>
          <!-- /Logo -->
        </div>
        <div class="flex-col-2" id="cart-on" style="text-align: center;">
<!--          --><?php //if (!strncasecmp($page_name,'shop',4)) { ?>
            <a id="go-cart" href="<?php echo base_url().'home/shop/cart';?>" style="display: flex">
              <?php if ($this->crud_model->cart_on()) {?>
                <img src="<?php echo base_url(); ?>template/front/header/imgs/icon_basket_black.png" alt="cart" style="height:26px;width:24px;margin-top:6px"/>
                <img src="<?php echo base_url(); ?>template/front/header/imgs/basket_badge.png" alt="cart" style="height:10px;width:10px;margin-top:6px;margin-left:-2px;"/>
              <?php } else { ?>
                <img src="<?php echo base_url(); ?>template/front/header/imgs/icon_basket_black.png" alt="cart" style="height:26px;width:24px;margin-top:6px"/>
                <img src="<?php echo base_url(); ?>template/front/header/imgs/basket_badge.png" alt="cart" style="display:none;height:10px;width:10px;margin-top:6px;margin-left:-2px;"/>
              <?php } ?>
            </a>
<!--          --><?php //} else { ?>
<!--          <a href="--><?php //echo base_url(); if ($this->session->userdata('user_login') == 'yes') { echo ('home/user'); } else { echo ('home/login'); } ?><!--">-->
<!--            --><?php
//            if ($this->session->userdata('user_login') == 'yes') {
//              ?>
<!--              <img src="--><?php //echo base_url(); ?><!--uploads/icon/mypage_icon.png" alt="foit" style="height:30px; width: 30px; margin-top: 5px"/>-->
<!--              --><?php
//            } else {
//              ?>
<!--              <img src="--><?php //echo base_url(); ?><!--uploads/icon/join_icon.png" alt="foit" style="height:30px; width: 30px; margin-top: 5px"/>-->
<!--              --><?php
//            }
//            ?>
<!--          </a>-->
<!--          --><?php //} ?>
        </div>
      </div>
    </div>
  </div>
  <div class="navigation-wrapper" id="navbar" style="background-color: #FFFFFF;">
    <div class="container" style="height: 40px; width: 100%; padding: 0; margin: 0">
      <!-- Navigation -->
      <nav class="navigation clearfix">
        <ul class="nav sf-menu">
          <?php if (!strncasecmp($page_name,'shop',4)) { ?>
            <?php if ($beta_service->start_at >= $today || $today >= $beta_service->end_at || $is_admin == true) { ?>
              <li class="shop-nav main">
                <a href="<?php echo base_url().'home/shop/main'; ?>" >MAIN</a>
              </li>
            <?php } ?>
            <li class="shop-nav new">
              <a href="<?php echo base_url().'home/shop?cat=all&col=product_id&order=desc'; ?>" >NEW</a>
            </li>
            <li class="shop-nav yoga">
              <a href="<?php echo base_url().'home/shop?cat=010000&col=product_id&order=desc'; ?>" >YOGA</a>
            </li>
            <li class="shop-nav vegan">
              <a href="<?php echo base_url().'home/shop?cat=020000&col=product_id&order=desc'; ?>" >VEGAN</a>
            </li>
            <li class="shop-nav healing">
              <a href="<?php echo base_url().'home/shop?cat=030000&col=product_id&order=desc'; ?>" >HEALING</a>
            </li>
          <?php } else { ?>
            <li class="main-nav home">
              <a href="<?php echo base_url(); ?>">HOME</a>
            </li>
            <li class="main-nav find">
              <a href="<?php echo base_url().'home/find'; ?>" >FIND</a>
            </li>
            <!--          <li class="life">-->
            <!--            <a href="--><?php //echo $life_url; ?><!--">LIFE</a>-->
            <!--          </li>-->
            <li class="main-nav earth">
              <!--                        <a href="--><?php //echo $earth_url; ?><!--">EARTH</a>-->
              <a href="<?php echo base_url().'home/blog'; ?>" >LIFE</a>
            </li>
            <li class="main-nav shop">
              <?php if ($beta_service->start_at < $today && $today < $beta_service->end_at && $is_admin == false) { ?>
                <a id="go-shop" href="<?php echo base_url().'home/shop?cat=all&col=product_id&order=desc'; ?>" >SHOP</a>
              <?php } else { ?>
                <a id="go-shop" href="<?php echo base_url().'home/shop/main'; ?>" >SHOP</a>
              <?php } ?>
            </li>
          <?php } ?>
        </ul>
      </nav>
      <!-- /Navigation -->
    </div>
  </div>
</header>

<script type="text/javascript">
  
  <?php if ($this->app_model->is_app()) { ?>
  // var pageY = 0;
  // var pageY2 = 0;
  <?php } ?>
  window.onscroll = function() {
    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;
    var _pY = window.pageYOffset;

    // let bottomPos = $(window).height() + _pY;
    // let pageHeight = $(document).height();
  
    // console.log('scrollTop: ' + $(window).scrollTop());
    // console.log('window height : ' + $(window).height());
    // console.log('page height: ' + $(document).height());
    // console.log('bottom position: ' + bottomPos);
  
    // console.log('sticky : ' + sticky + ', pageYOffset : ' + _pY);
    
    if (_pY > sticky) {
      navbar.classList.add("navigation-sticky");
    } else {
      navbar.classList.remove("navigation-sticky");
    }
  
    <?php if ($this->app_model->is_app()) { ?>
    // if (_pY >= 56 && bottomPos < pageHeight - 56 && pageY > pageY2 && _pY > pageY) { // scroll down
    //   toggleBottomBar('OFF');
    //   $('#navbar').hide();
      // } else if (_pY >= 56 && _pY < pageY) { // scroll up
      //   toggleBottomBar('ON');
    // } else {
    //   toggleBottomBar('ON');
    //   $('#navbar').show();
    // }
    // pageY2 = pageY;
    // pageY = _pY;
    <?php } ?>
  }
  
  function go_prev_page() {
    history.back();
  }

  let menu_on = 0;
  let setting_on = 0;
  function open_menu() {
    menu_on = 1;
    $('body').css('overflow-y','hidden');
    $('.menu_box').show().css('left','-100%').animate({ left : '0%'},300);
  }
  function close_menu() {
    menu_on = 0;
    $('body').css('overflow-y','auto');
    $('.menu_box').css('left','0%').animate({left : '-100%'},300);
  }
  function open_setting_menu() {
    setting_on = 1;
    $('body').css('overflow-y','hidden');
    $('.setting_wrap').show().css('left','100%').animate({left : '0%'},300);
  }
  function close_setting_menu() {
    setting_on = 0;
    $('body').css('overflow-y','auto');
    $('.setting_wrap').css('left','0%').animate({left : '100%'},300);
  }
  function _logout() {
    if (menu_on) {
      close_menu();
      setTimeout(function(){user_logout()}, 300);
    } else {
      user_logout();
    }
  }

  $(function(){
    // sld_li 슬라이드 UP/DOWN
    $('.sld_tit').click(function(){
      var index = $('.sld_tit').index(this);
      var display = $('.sld_li').eq(index).css('display');
    
      if(display == 'none') {
        $('.sld_li').slideUp();
        $('.sld_li').eq(index).slideDown();
      }
      else {
        $('.sld_li').slideUp();
      }
    })
  
    // li_theme 슬라이드 UP/DOWN
    $('.li_theme').click(function(){
      var index = $('.li_theme').index(this);
      var display = $('.li_cnt').eq(index).css('display');
    
      if(display == 'none') {
        $('.li_cnt').slideUp();
        $(this).next().slideDown();
      }
      else {
        $('.li_cnt').slideUp();
      }
    
    })
  
    // shop_theme 클릭시 다른 Lv 폰트색상 연하게
    $('.highlight').click(function(){
      // var index = $('.highlight').index(this);
      // console.log(index);
    
      // $('.highlight').addClass('gloomy');
      // $('.highlight > a').addClass('gloomy');
      // $(this).removeClass('gloomy');
      // $(this).find('a').removeClass('gloomy');
      
      $('.highlight').css('color', '#A5A3A0');
      // $('.highlight > a').css('color', '#A5A3A0');
      $(this).css('color', '#8C8A86');
      // $(this).find('a').css('color', '#8C9A86');
    })
  
    // li_cnt > a 클릭시 다른 Lv 폰트색상 연하게
    $('.li_focus').click(function(){
      // var index = $('.li_focus').index(this);
    
      // $('.li_focus').addClass('dark');
      // $(this).removeClass('dark');
      $('.li_focus').css('color', '#939393');
      $(this).css('color', '#757575');
    })
  });
</script>

<style>
.navigation-sticky {
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 100;
}
/*    .navigation-sticky + .content {
        padding-top: 60px;
    }*/
nav ul li a {
  font-family: 'Quicksand' !important;
}
</style>
<!-- /HEADER -->
