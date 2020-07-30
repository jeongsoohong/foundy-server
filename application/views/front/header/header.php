<?php
$find_url = '';
$life_url = '';
$earth_url = '';
$shop_url = '';

$category_names = array('find', 'life', 'earth', 'shop');
foreach ($category_names as $category_name) {
  $category_info = $this->db->get_where('category_blog', array('name' => $category_name, 'activate' => 1))->row();
  if (empty($category_info)) {
    ${"{$category_name}_url"} = base_url();
  } else {
    $this->db->order_by('blog_id', 'desc');
    $this->db->limit(1);
    $blog_info = $this->db->get_where('blog', array('blog_category' => $category_info->category_id))->row();
    if (empty($blog_info)) {
      ${"{$category_name}_url"} = base_url();
    } else {
      ${"{$category_name}_url"} = base_url() . "home/blog/view?id=" . $blog_info->blog_id;
    }
  }
}

//if (ENVIRONMENT == 'production') {
//    echo 'production';
//} else {
//    echo 'development';
//
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
<header class="header header-logo-left">
  <div class="header-wrapper">
    <div class="container">
      <div class="flex-row">
        <div class="flex-col-2" style="text-align: center;">
        </div>
        <div class="flex-col-8" style="text-align: center;">
          <!-- Logo -->
          <a href="<?php echo base_url();?>">
            <img src="<?php echo base_url(); ?>uploads/logo_image/foundy logo_0507.png" alt="foit" style="height: 40px; width: 100px; "/>
          </a>
          <!-- /Logo -->
        </div>
        <div class="flex-col-2" id="cart-on" style="text-align: center;">
          <?php if (!strncasecmp($page_name,'shop',4)) { ?>
            <a id="go-cart" href="<?php echo base_url().'home/shop/cart';?>">
              <?php if ($this->crud_model->cart_on()) {?>
                <img src="<?php echo base_url(); ?>uploads/shop/cart02.png" alt="cart" style="height:30px; width:30px; margin-top:5px"/>
              <?php } else { ?>
                <img src="<?php echo base_url(); ?>uploads/shop/cart01.png" alt="cart" style="height:30px; width:30px; margin-top:5px"/>
              <?php } ?>
            </a>
          <?php } else { ?>
          <a href="<?php echo base_url(); if ($this->session->userdata('user_login') == 'yes') { echo ('home/user'); } else { echo ('home/login'); } ?>">
            <?php
            if ($this->session->userdata('user_login') == 'yes') {
              ?>
              <img src="<?php echo base_url(); ?>uploads/icon/mypage_icon.png" alt="foit" style="height:30px; width: 30px; margin-top: 5px"/>
              <?php
            } else {
              ?>
              <img src="<?php echo base_url(); ?>uploads/icon/join_icon.png" alt="foit" style="height:30px; width: 30px; margin-top: 5px"/>
              <?php
            }
            ?>
          </a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <div class="navigation-wrapper" id="navbar" style="background-color: #FFFFFF;">
    <div class="container" style="height: 40px; padding: 0px;">
      <!-- Navigation -->
      <nav class="navigation clearfix">
        <ul class="nav sf-menu">
          <?php if (!strncasecmp($page_name,'shop',4)) { ?>
            <li class="shop-nav main">
              <a href="<?php echo base_url().'home/shop/main'; ?>" >MAIN</a>
            </li>
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
              <a id="go-shop" href="<?php echo base_url().'home/shop/main'; ?>" >SHOP</a>
            </li>
          <?php } ?>
        </ul>
      </nav>
      <!-- /Navigation -->
    </div>
  </div>
</header>

<script type="text/javascript">

  window.onscroll = function() {
    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;

    //console.log('sticky : ' + sticky + ', pageYOffset : ' + window.pageYOffset);

    if (window.pageYOffset > sticky) {
      navbar.classList.add("navigation-sticky");
    } else {
      navbar.classList.remove("navigation-sticky");
    }
  }

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
