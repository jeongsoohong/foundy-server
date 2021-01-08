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

//$today = date('Y-m-d H:i:s');
//$beta_service = $this->db->get_where('server_settings', array('type' => SERVER_SETTINGS_TYPE_BETA_SERVICE))->row();
//
//$is_admin = false;
//if ($this->session->userdata('user_login') == "yes") {
//  $user = json_decode($this->session->userdata('user_data'));
//  if ($user->user_type & USER_TYPE_ADMIN) {
//    $is_admin = true;
//  }
//}
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
    width: 20%;
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
        <a href="javascript:void(0)" onclick="getLink('<?php echo base_url(); ?>home/user')" style="color: #A5A3A0; font-size: 21px">MY PAGE</a>
      </h3>
      <h3>
        <a href="javascript:void(0)" onclick="getLink('<?php echo base_url(); ?>home/coupon')" style="color: #A5A3A0; font-size: 21px">COUPON BOX</a>
      </h3>
      <article class="main_shop">
        <h3 style="color: #845B4C; font-size: 21px">SHOP</h3>
        <section class="shop_theme">
          <h4>
            <a href="javascript:void(0)" onclick="getLink('<?php echo base_url(); ?>home/shop/main')" style="color: #A5A3A0; font-size: 18px;">main</a>
          </h4>
          <h4>
            <a href="javascript:void(0)" onclick="getLink('<?php echo base_url().'home/shop?cat=all&col=product_id&order=desc'; ?>')" style="color: #A5A3A0; font-size: 18px;">new</a>
          </h4>
          <div class="sld_wrap">
            <h4 class="sld_tit highlight" style="color: #A5A3A0; font-size: 18px;">yoga</h4>
            <div class="sld_li" style="display: none;">
              <a href="#" class="li_theme li_focus" style="color: #939393; font-size: 18px">Yoga wear</a>
              <div style="display: none;" class="li_cnt">
                <a href="javascript:void(0)" onclick="getLink('<?php echo base_url().'home/shop?cat=010101&col=product_id&order=desc'; ?>')" style="color:#111111; font-size: 18px;">TOP</a>
                <a href="javascript:void(0)" onclick="getLink('<?php echo base_url().'home/shop?cat=010102&col=product_id&order=desc'; ?>')" style="color:#111111; font-size: 18px;">BOTTOM</a>
                <a href="javascript:void(0)" onclick="getLink('<?php echo base_url().'home/shop?cat=010103&col=product_id&order=desc'; ?>')" style="color:#111111; font-size: 18px;">OUTER</a>
              </div>
              <a href="#" class="li_theme li_focus" style="color: #939393; font-size: 18px">Yoga mat</a>
              <div style="display: none;" class="li_cnt">
                <a href="javascript:void(0)" onclick="getLink('<?php echo base_url().'home/shop?cat=010201&col=product_id&order=desc'; ?>')" style="color:#111111; font-size: 18px;">Mat</a>
                <a href="javascript:void(0)" onclick="getLink('<?php echo base_url().'home/shop?cat=010202&col=product_id&order=desc'; ?>')" style="color:#111111; font-size: 18px;">Towel</a>
              </div>
              <a href="javascript:void(0)" onclick="getLink('<?php echo base_url().'home/shop?cat=010203&col=product_id&order=desc'; ?>')" class="li_focus" style="color: #939393; font-size: 18px">Prop</a>
              <a href="javascript:void(0)" onclick="getLink('<?php echo base_url().'home/shop?cat=010301&col=product_id&order=desc'; ?>')" class="li_focus" style="color: #939393; font-size: 18px">Accessories</a>
            </div>
            <h4 class="sld_tit highlight" style="color: #A5A3A0; font-size: 18px;">vegan</h4>
            <div class="sld_li" style="display: none;">
              <a href="javascript:void(0)" onclick="getLink('<?php echo base_url().'home/shop?cat=020100&col=product_id&order=desc'; ?>')" class="li_focus" style="color: #939393; font-size: 18px">Cosmetic</a>
              <a href="javascript:void(0)" onclick="getLink('<?php echo base_url().'home/shop?cat=020200&col=product_id&order=desc'; ?>')" class="li_focus" style="color: #939393; font-size: 18px">Foods</a>
            </div>
            <h4 class="sld_tit highlight" style="color: #A5A3A0; font-size: 18px;">healing</h4>
            <div class="sld_li" style="display: none;">
              <a href="#" class="li_theme li_focus" style="color: #939393; font-size: 18px">Tea</a>
              <div style="display: none;" class="li_cnt">
                <a href="javascript:void(0)" onclick="getLink('<?php echo base_url().'home/shop?cat=030101&col=product_id&order=desc'; ?>')" style="color:#111111; font-size: 18px;">차</a>
                <a href="javascript:void(0)" onclick="getLink('<?php echo base_url().'home/shop?cat=030102&col=product_id&order=desc'; ?>')" style="color:#111111; font-size: 18px;">다도용품</a>
              </div>
              <a href="#" class="li_theme li_focus" style="color: #939393; font-size: 18px">Fragrance</a>
              <div style="display: none;" class="li_cnt">
                <a href="javascript:void(0)" onclick="getLink('<?php echo base_url().'home/shop?cat=030201&col=product_id&order=desc'; ?>')" style="color:#111111; font-size: 18px;">향</a>
                <a href="javascript:void(0)" onclick="getLink('<?php echo base_url().'home/shop?cat=030202&col=product_id&order=desc'; ?>')" style="color:#111111; font-size: 18px;">아로마</a>
                <a href="javascript:void(0)" onclick="getLink('<?php echo base_url().'home/shop?cat=030203&col=product_id&order=desc'; ?>')" style="color:#111111; font-size: 18px;">향꽂이</a>
              </div>
              <a href="javascript:void(0)" onclick="getLink('<?php echo base_url().'home/shop?cat=030301&col=product_id&order=desc'; ?>')" class="li_focus" style="color: #939393; font-size: 18px">Meditation</a>
              <a href="javascript:void(0)" onclick="getLink('<?php echo base_url().'home/shop?cat=030302&col=product_id&order=desc'; ?>')" class="li_focus" style="color: #939393; font-size: 18px">Book</a>
            </div>
          </div>
        </section>
      </article>
      <h3 >
        <a href="javascript:void(0)" onclick="getLink('<?php echo base_url(); ?>home/find')" style="color: #845B4C; font-size: 21px">FIND</a>
      </h3>
      <h3>
        <a href="javascript:void(0)" onclick="getLink('<?php echo base_url(); ?>home/blog')" style="color: #845B4C; font-size: 21px">LIFE</a>
      </h3>
    </div>
    <div class="menu_sub">
      <?php if ($this->app_model->is_app()) { ?>
        <h3 class="sub_work work_set">
          <button href="javascript:void(0)" onclick="open_setting_menu()" style="color: #845B4C;">SETTINGS</button>
        </h3>
      <?php } ?>
      <h3 class="sub_work">
        <?php if ($this->session->userdata('user_login') == 'yes') { ?>
          <a href="javascript:void(0)" onclick="_logout();" style="color: #845B4C;">LOGOUT</a>
        <?php } else { ?>
          <a onclick="getLink('<?php echo base_url(); ?>home/login');" style="color: #845B4C;">LOGIN</a>
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

<?php if ($this->app_model->is_app()) { ?>
  <?php if ($page_name == 'home') {  // only home ?>
    <header class="header header-logo-left" id="fd-header" style="position: fixed; width: 100%; height: 56px; z-index: 15;">
      <div class="header-wrapper" style="padding: 0 !important; position: relative; width: inherit; height: inherit; background-color: transparent;">
        <div class="container" style="padding: 0; border: 0; margin: 0; width: 100% !important;">
          <div class="flex-row" style="display: block; margin: 0">
            <div class="flex-col-8" style="text-align: center; width: 100%; height: 56px; padding: 0; flex: none; max-width: none;">
              <a href="<?php echo base_url(); ?>" style="display: block; line-height: 56px;">
                <img src="<?php echo base_url(); ?>template/icon/logo_foundy_white.png" alt="home" style="height: 23px; width: auto; margin-top: -1px;">
              </a>
            </div>
            <div class="flex-col-2" id="cart-on" style="text-align: center; padding: 0; display: block; width: 40px; height: 40px; position: absolute; top: 8px; right: 0; z-index: 12">
              <a id="go-cart" href="<?php echo base_url(); ?>home/shop/cart" style="display: block; width: 40px; height: 40px;">
                <img src="<?php echo base_url(); ?>template/icon/icon_basket_white.png" alt="cart" style="width: 20px; height: 22px; margin-top: 8px;">
                <?php if ($this->crud_model->cart_on()) {?>
                  <img src="<?php echo base_url(); ?>template/front/header/imgs/basket_badge.png" alt="cart" style="width: 18px; height: 18px; margin-top: -8px; margin-left: -8px;">
                <?php } else { ?>
                  <img src="<?php echo base_url(); ?>template/front/header/imgs/basket_badge.png" alt="cart" style="display:none; width: 18px; height: 18px; margin-top: -8px; margin-left: -8px;">
                <?php } ?>
              </a>
            </div>
          </div>
        </div>
      </div>
    </header>
  <?php } else if (!strncasecmp($page_name,'shop',4)) { // shop category ?>
    <header class="header header-logo-left" id="fd-header">
      <div class="header-wrapper" style="padding: 0 !important; background-color: #533a30;">
        <div class="container" style="padding: 0; border: 0; margin: 0; width: 100% !important;">
          <div class="flex-row" style="display: block; margin: 0">
            <div class="flex-col-2" style="text-align: center; padding: 0; display: block; width: 40px; height: 40px; position: absolute; top: 8px; left: 0; z-index: 12;">
              <a href="javascript:void(0)" onclick="getBack()" style="display: block; width: inherit; height: inherit; text-align: center; line-height: 40px;">
                <img src="<?php echo base_url(); ?>template/icon/ic_back_white.png" alt="back" style="width: auto; height: 18px; margin-top: -3px; margin-left: -4px;" class="ic_white">
              </a>
            </div>
            <div class="flex-col-8" style="text-align: center; width: 100%; height: 56px; padding: 0; flex: none; max-width: none;">
              <a href="<?php echo base_url(); ?>" style="display: block; line-height: 56px;">
                <img src="<?php echo base_url(); ?>template/icon/logo_foundy_white.png" alt="home" style="height: 23px; width: auto; margin-top: -1px;">
              </a>
            </div>
            <div class="flex-col-2" id="cart-on" style="text-align: center; padding: 0; display: block; width: 40px; height: 40px; position: absolute; top: 8px; right: 0; z-index: 12">
              <a id="go-cart" href="<?php echo base_url(); ?>home/shop/cart" style="display: block; width: 40px; height: 40px;">
                <img src="<?php echo base_url(); ?>template/icon/icon_basket_white.png" alt="cart" style="width: 20px; height: 22px; margin-top: 8px;">
                <?php if ($this->crud_model->cart_on()) {?>
                  <img src="<?php echo base_url(); ?>template/front/header/imgs/basket_badge.png" alt="cart" style="width: 18px; height: 18px; margin-top: -8px; margin-left: -8px;">
                <?php } else { ?>
                  <img src="<?php echo base_url(); ?>template/front/header/imgs/basket_badge.png" alt="cart" style="display:none; width: 18px; height: 18px; margin-top: -8px; margin-left: -8px;">
                <?php } ?>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="navigation-wrapper" id="navbar" style="background-color: #FFFFFF; height: 45px;">
        <div class="container" style="height: 44px; width: 100%; padding: 0; margin: 0">
          <nav class="navigation clearfix" style="height: 44px;">
            <ul class="nav sf-menu" style="height: 44px;">
              <li class="shop-nav main active_under" style="height: 44px;">
                <a href="<?php echo base_url(); ?>home/shop/main" style="padding: 0; line-height: 44px;">MAIN</a>
              </li>
              <li class="shop-nav new" style="height: 44px;">
                <a href="<?php echo base_url(); ?>home/shop?cat=all&col=product_id&order=desc" style="padding: 0; line-height: 44px;">NEW</a>
              </li>
              <li class="shop-nav yoga" style="height: 44px;">
                <a href="<?php echo base_url(); ?>home/shop?cat=010000&col=product_id&order=desc" style="padding: 0; line-height: 44px;">YOGA</a>
              </li>
              <li class="shop-nav vegan" style="height: 44px;">
                <a href="<?php echo base_url(); ?>home/shop?cat=020000&col=product_id&order=desc" style="padding: 0; line-height: 44px;">VEGAN</a>
              </li>
              <li class="shop-nav healing" style="height: 44px;">
                <a href="<?php echo base_url(); ?>home/shop?cat=030000&col=product_id&order=desc" style="padding: 0; line-height: 44px;">HEALING</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
  <?php } else { // find, life ?>
    <header class="header header-logo-left" id="fd-header" style=" /* position: fixed; z-index: 15; */ width: 100%; height: 56px; ">
      <div class="header-wrapper" style="/* position: relative; */ padding: 0 !important; background-color: #533a30; width: inherit; height: inherit;">
        <div class="container" style="padding: 0; border: 0; margin: 0; width: 100% !important;">
          <div class="flex-row" style="display: block; margin: 0">
            <div class="flex-col-2" style="text-align: center; padding: 0; display: block; width: 40px; height: 40px; position: absolute; top: 8px; left: 0; z-index: 12;">
              <a href="javascript:void(0)" onclick="getBack()" style="display: block; width: inherit; height: inherit; text-align: center; line-height: 40px;">
                <img src="<?php echo base_url(); ?>template/icon/ic_back_white.png" alt="back" style="width: auto; height: 18px; margin-top: -3px; margin-left: -4px;" class="ic_white">
              </a>
            </div>
            <div class="flex-col-8" style="text-align: center; width: 100%; height: 56px; padding: 0; flex: none; max-width: none;">
              <a href="<?php echo base_url(); ?>" style="display: block; line-height: 56px;">
                <img src="<?php echo base_url(); ?>template/icon/logo_foundy_white.png" alt="home" style="height: 23px; width: auto; margin-top: -1px;">
              </a>
            </div>
            <div class="flex-col-2" id="cart-on" style="text-align: center; padding: 0; display: block; width: 40px; height: 40px; position: absolute; top: 8px; right: 0; z-index: 12">
              <a id="go-cart" href="<?php echo base_url(); ?>home/shop/cart" style="display: block; width: 40px; height: 40px;">
                <img src="<?php echo base_url(); ?>template/icon/icon_basket_white.png" alt="cart" style="width: 20px; height: 22px; margin-top: 8px;">
                <?php if ($this->crud_model->cart_on()) {?>
                  <img src="<?php echo base_url(); ?>template/front/header/imgs/basket_badge.png" alt="cart" style="width: 18px; height: 18px; margin-top: -8px; margin-left: -8px;">
                <?php } else { ?>
                  <img src="<?php echo base_url(); ?>template/front/header/imgs/basket_badge.png" alt="cart" style="display:none; width: 18px; height: 18px; margin-top: -8px; margin-left: -8px;">
                <?php } ?>
              </a>
            </div>
          </div>
        </div>
      </div>
    </header>
  <?php } ?>
<?php } else { ?>
  <?php if (!strncasecmp($page_name,'shop',4)) { // shop category ?>
    <header class="header header-logo-left" id="fd-header">
      <div class="header-wrapper" style="padding: 0 !important;">
        <div class="container" style="padding: 0; border: 0; margin: 0; width: 100% !important;">
          <div class="flex-row" style="display: block; margin: 0">
            <div class="flex-col-2" style="text-align: center; padding: 0; display: block; width: 40px; height: 40px; position: absolute; top: 8px; left: 0; z-index: 12;">
              <a href="javascript:void(0)" onclick="open_menu()" style="display: block; width: inherit; height: inherit; text-align: center; line-height: 40px;">
                <img src="<?php echo base_url(); ?>template/front/header/imgs/icon_menu_black.png" alt="menu" style="width: 19px; height: 13px; margin-top: -3px; margin-left: -1px;">
              </a>
            </div>
            <div class="flex-col-8" style="text-align: center; width: 100%; height: 56px; padding: 0; flex: none; max-width: none;">
              <a href="<?php echo base_url(); ?>" style="display: block; line-height: 56px;">
                <img src="<?php echo base_url(); ?>template/front/header/imgs/logo_foundy.png" alt="home" style="height: 23px; width: auto; margin-top: -1px;">
              </a>
            </div>
            <div class="flex-col-2" id="cart-on" style="text-align: center; padding: 0; display: block; width: 40px; height: 40px; position: absolute; top: 8px; right: 0; z-index: 12">
              <a id="go-cart" href="<?php echo base_url(); ?>home/shop/cart" style="display: block; width: 40px; height: 40px;">
                <img src="<?php echo base_url(); ?>template/front/header/imgs/icon_basket_black.png" alt="cart" style="width: 20px; height: 22px; margin-top: 8px;">
                <?php if ($this->crud_model->cart_on()) {?>
                  <img src="<?php echo base_url(); ?>template/front/header/imgs/basket_badge.png" alt="cart" style="width: 18px; height: 18px; margin-top: -8px; margin-left: -8px;">
                <?php } else { ?>
                  <img src="<?php echo base_url(); ?>template/front/header/imgs/basket_badge.png" alt="cart" style="display:none; width: 18px; height: 18px; margin-top: -8px; margin-left: -8px;">
                <?php } ?>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="navigation-wrapper" id="navbar" style="background-color: #FFFFFF; height: 45px;">
        <div class="container" style="height: 44px; width: 100%; padding: 0; margin: 0">
          <nav class="navigation clearfix" style="height: 44px;">
            <ul class="nav sf-menu" style="height: 44px;">
              <li class="shop-nav main active_under" style="height: 44px;">
                <a href="<?php echo base_url(); ?>home/shop/main" style="padding: 0; line-height: 44px;">MAIN</a>
              </li>
              <li class="shop-nav new" style="height: 44px;">
                <a href="<?php echo base_url(); ?>home/shop?cat=all&col=product_id&order=desc" style="padding: 0; line-height: 44px;">NEW</a>
              </li>
              <li class="shop-nav yoga" style="height: 44px;">
                <a href="<?php echo base_url(); ?>home/shop?cat=010000&col=product_id&order=desc" style="padding: 0; line-height: 44px;">YOGA</a>
              </li>
              <li class="shop-nav vegan" style="height: 44px;">
                <a href="<?php echo base_url(); ?>home/shop?cat=020000&col=product_id&order=desc" style="padding: 0; line-height: 44px;">VEGAN</a>
              </li>
              <li class="shop-nav healing" style="height: 44px;">
                <a href="<?php echo base_url(); ?>home/shop?cat=030000&col=product_id&order=desc" style="padding: 0; line-height: 44px;">HEALING</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
  <?php } else { // main category ?>
    <header class="header header-logo-left" id="fd-header">
      <div class="header-wrapper" style="padding: 0 !important;">
        <div class="container" style="padding: 0; border: 0; margin: 0; width: 100% !important;">
          <div class="flex-row" style="display: block; margin: 0">
            <div class="flex-col-2" style="text-align: center; padding: 0; display: block; width: 40px; height: 40px; position: absolute; top: 8px; left: 0; z-index: 12;">
              <a href="javascript:void(0)" onclick="open_menu()" style="display: block; width: inherit; height: inherit; text-align: center; line-height: 40px;">
                <img src="<?php echo base_url(); ?>template/front/header/imgs/icon_menu_black.png" alt="menu" style="width: 19px; height: 13px; margin-top: -3px; margin-left: -1px;">
              </a>
            </div>
            <div class="flex-col-8" style="text-align: center; width: 100%; height: 56px; padding: 0; flex: none; max-width: none;">
              <a href="<?php echo base_url(); ?>" style="display: block; line-height: 56px;">
                <img src="<?php echo base_url(); ?>template/front/header/imgs/logo_foundy.png" alt="home" style="height: 23px; width: auto; margin-top: -1px;">
              </a>
            </div>
            <div class="flex-col-2" id="cart-on" style="text-align: center; padding: 0; display: block; width: 40px; height: 40px; position: absolute; top: 8px; right: 0; z-index: 12">
              <a id="go-cart" href="<?php echo base_url(); ?>home/shop/cart" style="display: block; width: 40px; height: 40px;">
                <img src="<?php echo base_url(); ?>template/front/header/imgs/icon_basket_black.png" alt="cart" style="width: 20px; height: 22px; margin-top: 8px;">
                <?php if ($this->crud_model->cart_on()) {?>
                  <img src="<?php echo base_url(); ?>template/front/header/imgs/basket_badge.png" alt="cart" style="width: 18px; height: 18px; margin-top: -8px; margin-left: -8px;">
                <?php } else { ?>
                  <img src="<?php echo base_url(); ?>template/front/header/imgs/basket_badge.png" alt="cart" style="display:none; width: 18px; height: 18px; margin-top: -8px; margin-left: -8px;">
                <?php } ?>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="navigation-wrapper" id="navbar" style="background-color: #FFFFFF; height: 45px;">
        <div class="container" style="height: 44px; width: 100%; padding: 0; margin: 0">
          <nav class="navigation clearfix" style="height: 44px;">
            <ul class="nav sf-menu sf-js-enabled sf-arrows" style="height: 44px;">
              <li class="main-nav home active-under" style="height: 44px;">
                <a href="<?php echo base_url(); ?>" style="padding: 0; line-height: 44px;">HOME</a>
              </li>
              <li class="main-nav find" style="height: 44px;">
                <a href="<?php echo base_url(); ?>home/find" style="padding: 0; line-height: 44px;">FIND</a>
              </li>
              <li class="main-nav earth" style="height: 44px;">
                <a href="<?php echo base_url(); ?>home/blog" style="padding: 0; line-height: 44px;">LIFE</a>
              </li>
              <li class="main-nav shop" style="height: 44px;">
                <a id="go-shop" href="<?php echo base_url(); ?>home/shop/main" style="padding: 0; line-height: 44px;">SHOP</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
  <?php } ?>
<?php } ?>
<style>
  .popup-box {
    /*display: none;*/
    background-color: rgba(0,0,0,0.3);
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 10;
  }
  div[class*='theme'] {
    font-size: 0;
    background-color: #fff;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    border-radius: 4px;
    z-index: 11;
    width: 268px;
    position: fixed;
    left: 50%;
    top: 50%;
    margin-left: -134px;
    text-align: center;
  }
  
  div[class*='theme'] p {
    margin: 0;
  }
  .theme\:book {
    height: 212px;
    margin-top: -106px;
  }
  .theme\:alt_cancel {
    height: 184px;
    margin-top: -92px;
  }
  .theme\:alt_cancel_detail {
    height: 176px;
    margin-top: -88px;
  }
  
  .popup_tit {
    padding-top: 32px;
  }
  .topic_icon {
    display: inline-block;
    width: 44px;
    height: 44px;
    line-height: 44px;
    background-color: #B0957A;
    margin-right: 16px;
    border-radius: 50%;
  }
  .topic_icon img {
    margin-bottom: 2px;
  }
  .topic_message {
    display: inline-block;
    color: #B0957A;
    font-size: 14px;
    text-align: left;
    vertical-align: top;
    
  }
  .topic_message .font-futura {
    font-size: 16px;
    font-weight: bold !important;
    line-height: 1.5;
  }
  .popup_guide {
    margin-top: 20px !important;
    color: #757575;
    font-size: 11px;
    line-height: 1.75;
  }
  
  .confirm_btn {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 48px;
  }
  .confirm_btn button {
    box-sizing: border-box;
    border-top: 1px solid #eee !important;
    border: 0;
    color: #0091ea;
    font-size: 16px;
    width: 50%;
    height: inherit;
    padding: 0;
    background-color: transparent;
    font-family: futura-pt !important;
  }
  .btn_no {
    width: calc(50% - 1px) !important;
    border-right: 1px solid #eee !important;
  }
  
  .btn_info {
    padding: 0;
    margin: 0;
  }
  .btn_fn {
    float: left;
    height: 30px;
  }
  .btn_fn:nth-child(2) {
    margin: 0 12px;
    height: 30px;
  }
  .btn_fn:nth-child(2) span {
    display: inline-block;
    width: 1px;
    height: 20px;
    margin: 5px 0;
    background-color: #bdbdbd;
  }
  .btn_fn a, .btn_fn div {
    text-align: center;
  }
  .btn_fn a {
    float: left;
    display: block;
    width: 30px;
    height: 30px;
    margin-right: 8px;
    line-height: 30px;
    background-color: #F7D47C;
    border-radius: 50%;
  }
  .btn_fn a:last-child {
    margin-right: 0;
  }
  .btn_fn div {
    font-size: 0;
  }
  .btn_fn div img {
    margin-right: 8px;
  }
  .btn_fn div img:last-child {
    margin: 0;
  }
  .favorite_close {
    width: 44px;
    height: 44px;
    position: absolute;
    top: 0;
    right: 0;
    border: 0;
    padding: 0;
    background-color: transparent;
  }
</style>
<div class="popup-box" id="star_favorite_popup" style="display: none;">
  <div class="popup theme:alt_cancel_detail" style="height: 204px; margin-top: -102px;">
    <div class="popup_tit">
      <button class="favorite_close" onclick="close_star_favorite_popup();">
        <img src="<?= base_url(); ?>template/back/center/imgs/icon_close_black.png" alt="" width="12" height="12" style="opacity: 0.5;">
      </button>
      <div class="popup_topic" style="text-align: center;">
        <div class="topic_icon" style="background-color: #1ba9e4;">
          <img src="<?= base_url(); ?>template/icon/information_white.png" alt="" width="16" height="16">
        </div>
        <p class="topic_message font-futura" style="font-weight: bold !important; color: #1ba9e4; margin: 0 !important; line-height: 44px;">
          My Favorite !
        </p>
      </div>
      <div>
        <p class="popup_guide" style="letter-spacing: -0.05em; width: 226px; margin: 0 auto;">
          <strong id="star_favorite_val"></strong> <span id="star_favorite_type"></span>의 스케줄 / 예약 및 관련 소식을 카카오톡과 문자로 받아보실 수 있습니다.</p>
      </div>
    </div>
    <div class="confirm_btn" style="border-top: 1px solid #eee !important;">
      <button class="btn_yes" style="border:none !important;" onclick="close_star_favorite_popup()">OK</button>
    </div>
  </div>
</div>
<script type="text/javascript">
  let close_star_favorite_action = '';
  let close_star_favorite_redirect = '<?= base_url(); ?>';
  function close_star_favorite_popup() {
    $('#star_favorite_popup').hide();
    $('body').css('overflow-y', 'auto');
    if (close_star_favorite_action === 'reload') {
      setTimeout(function() {window.location.reload(); }, 300);
    } else if (close_star_favorite_action === 'redirect') {
      setTimeout(function() {window.location.href = close_star_favorite_redirect; }, 300);
    }
  }
  function open_star_favorite_popup() {
    $('#star_favorite_popup').show();
    $('body').css('overflow-y', 'hidden');
  }
  
  <?php if ($this->app_model->is_app()) { ?>
  <?php  if ($page_name == 'home') {  // only home ?>
  $(window).scroll(function(){
    let scrollTop = $(this).scrollTop();
    let height = $('.header-wrapper').height();
    height = Number(height);
    if(scrollTop >= height){
      $('.header .header-wrapper').css({
        'background' : 'rgba(83,58,48,0.8)'
      });
    }
    else {
      $('.header .header-wrapper').css('background','transparent');
    }
  });

  let pageY = 0;
  window.onscroll = function() {
    var _pY = window.pageYOffset;
    let bottomPos = $(window).height() + _pY;
    let pageHeight = $(document).height();
  
    if (_pY >= 56 && bottomPos < pageHeight - 56 && _pY > pageY) { // scroll down
      $('.header .header-wrapper').hide();
    } else if (_pY >= 56 && _pY < pageY) { // scroll up
      $('.header .header-wrapper').show();
    } else {
    }
    pageY = _pY;
  }
  <?php } else if (!strncasecmp($page_name,'shop',4)) { // shop category ?>
  window.onscroll = function() {
    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;
    var _pY = window.pageYOffset;

    if (_pY > sticky) {
      navbar.classList.add("navigation-sticky");
    } else {
      navbar.classList.remove("navigation-sticky");
    }
  }
  <?php } else { // find, life, etc?>
  $(window).scroll(function(){
    let scrollTop = $(this).scrollTop();
    let height = $('.header-wrapper').height();
    height = Number(height);
    if(scrollTop >= height){
      // alert(scrollTop + '.' + height);
      $('.header').css('position', 'fixed').css('z-index', '15');
      $('.header .header-wrapper').css('position', 'relative');
    } else {
      // alert(2);
      $('.header').css('position', 'static').css('z-index', 'none');
      $('.header .header-wrapper').css('position', 'static');
    }
  });
  <?php } ?>
  <?php } else { ?>
  window.onscroll = function() {
    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;
    var _pY = window.pageYOffset;
    
    if (_pY > sticky) {
      navbar.classList.add("navigation-sticky");
    } else {
      navbar.classList.remove("navigation-sticky");
    }
  }
  <?php } ?>
  
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
  
  function getLink(url) {
    close_setting_menu();
    close_menu();
    location.href = url;
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
      $('.highlight').css('color', '#A5A3A0');
      $(this).css('color', '#8C8A86');
    })
    // li_cnt > a 클릭시 다른 Lv 폰트색상 연하게
    $('.li_focus').click(function(){
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
  nav ul li a {
    font-family: 'Quicksand' !important;
  }
</style>
<!-- /HEADER -->
