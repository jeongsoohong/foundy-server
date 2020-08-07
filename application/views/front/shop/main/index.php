<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
<style>
  .shop-header, .shop-items, .shop-item {
    width: 100%;
    padding-left: 0;
    padding-right: 0;
    margin: 0;
  }
  .shop-item {
    width: 50%;
    padding: 0 10px !important;
  }
  .item-content, .item-img, .brand-name, .item-title, .item-summery, .item-price, .item-price-bold, .item-like {
    padding-left: 0;
    padding-right: 0;
  }
  .brand-name {
    padding: 0 !important;
    font-size: 12px;
    color: saddlebrown;
    height: 20px;
  }
  .item-title, .item-summery {
    font-size: 11px;
    height: 25px;
    line-height: 12px;
  }
  .item-img {
    position: relative;
  }
  .item-img .item-banner {
    position: absolute;
    z-index: 10;
    right: 10px;
    bottom: 10px;
    width: 30px;
    height: 30px;
  }
  .item-title h5 {
    margin: 0;
  }
  .item-price {
    font-size: 12px;
    height: 15px;
    line-height: 15px;
  }
  .item-price-bold {
    font-size: 15px;
    font-weight: 700;
    height: 20px;
    line-height: 20px;
  }
  .item-like {
    height:20px;
    line-height: 20px;
  }
  .shop-header {
    text-align: center;
    height: 50px;
    padding: 0 0;
    display: flex;
  }
  .shop-header h6 {
    height: 50px;
    line-height: 50px;
    margin: auto;
    font-size: 14px;
    font-weight: 700 !important;
  }
  .shop-header div select.form-control {
    width: 100% !important;
    height: 40px !important;
    font-size: 12px !important;
    padding: 0 0 0 0 !important;
    text-align-last: right;
    border: none;
    direction: rtl;
  }
  select option {
    direction: ltr;
  }
  .form-control {
    background: #F3EFEB;
  }
  #view_more {
    text-align: center;
    height: 40px;
    display: none;
    margin: 10px 0;
  }
  #view_more a {
    font-family: 'Quicksand' !important;
    font-size: 15px;
    color: gray;
    background-color: inherit;
    border: 1px solid #d3d3d3;
    line-height: 40px;
    padding: 0 10px;
  }
  .main-blog-content {
    margin: 0 0 10px 0;
    /*padding-left: 0;*/
    /*padding-right: 0;*/
    /*background-color: white;*/
    padding-bottom: 10px;
  }
  /*.blog-img {*/
  /*  padding-left: 0;*/
  /*  padding-right: 0;*/
  /*}*/
  .blog-img img {
    min-height: 100%;
    min-width: 100%;
  }
  /*.blog-title {*/
  /*  padding-left: 0;*/
  /*  padding-right: 0;*/
  /*}*/
  .blog-title h5 {
    margin: 10px 0 5px 0;
  }
  .blog-summery {
    font-size: 11px;
    /*padding-left: 0;*/
    /*padding-right: 0;*/
  }
  .shop-best-items, .shop-new-items, .shop-recommend-items {
    margin: 0 !important;
    padding-left: 0 !important;
    padding-right: 0 !important;
  }
  .img-responsive {
    width: 100%;
  }
</style>
<section class="page-section" style="margin-top: 0px !important; margin-bottom: 0px !important; padding-top: 0px
    !important; padding-bottom: 0px !important;">
  <div id="content-container">
    <div id="page-content">
      <div class="row">
        <?php if (isset($best_items) && !empty($best_items)) { ?>
          <div class="col-md-12 shop-best shop-content">
            <div class="col-md-12 shop-header">
              <h6 class="text-overflow text-center">BEST ITEM</h6>
            </div>
            <div class="col-md-12 shop-best-items">
              <?php
              $i = 0;
              foreach ($best_items as $item) {
                $lr = $i % 2 == 0 ? 'left' : 'right';
                ?>
                <div class="col-md-6 col-sm-6 col-xs-6 item-<?php echo $lr; ?> shop-item">
                  <div class="col-md-12 item-content">
                    <div class="col-md-12 item-img">
                      <a href="<?php echo base_url().'home/shop/product?id='.$item->product_id; ?>">
                        <img class="img-responsive" src="<?php echo $item->item_image_url_0; ?>" alt=""/>
                        <img class="img-responsive item-banner" src="<?php echo base_url().'uploads/shop/best.png'; ?>" alt=""/>
                      </a>
                    </div>
                    <div class="col-md-12 brand-name">
                      <?php echo $item->brand_name; ?>
                    </div>
                    <div class="col-md-12 item-title">
                      <?php echo $item->item_name; ?>
                    </div>
                    <!--      <div class="col-md-12 item-summery">-->
                    <!--        --><?php //echo $item->item_base_info; ?>
                    <!--      </div>-->
                    <?php if ($item->item_discount_rate == 0) { ?>
                      <div class="col-md-12 item-price-bold">
                        <?php echo $this->crud_model->get_price_str($item->item_sell_price); ?>원
                      </div>
                      <div class="col-md-12 item-price">
                      </div>
                    <?php } else { ?>
                      <div class="col-md-12 item-price" style="color: grey">
                        <?php echo $this->crud_model->get_price_str($item->item_general_price); ?>원
                      </div>
                      <div class="col-md-12 item-price-bold" style="color: #ff6633">
                        <?php echo $item->item_discount_rate.'% '.$this->crud_model->get_price_str($item->item_sell_price); ?>원
                      </div>
                    <?php } ?>
                    <div class="col-md-12 item-like">
                      <?php echo $this->crud_model->sns_func_html('like', 'product', $item->like, $item->product_id, 20, 20); ?>
                    </div>
                  </div>
                </div>
                <?php
                $i++;
              }?>
            </div>
          </div>
        <?php } ?>
        <?php if (isset($new_items) && !empty($new_items)) { ?>
          <div class="col-md-12 shop-new shop-content">
            <div class="col-md-12 shop-header">
              <h6 class="text-overflow text-center">NEW IN</h6>
            </div>
            <div class="col-md-12 shop-new-items">
              <?php
              $i = 0;
              foreach ($new_items as $item) {
                $lr = $i % 2 == 0 ? 'left' : 'right';
                ?>
                <div class="col-md-6 col-sm-6 col-xs-6 item-<?php echo $lr; ?> shop-item">
                  <div class="col-md-12 item-content">
                    <div class="col-md-12 item-img">
                      <a href="<?php echo base_url().'home/shop/product?id='.$item->product_id; ?>">
                        <img class="img-responsive" src="<?php echo $item->item_image_url_0; ?>" alt=""/>
                        <img class="img-responsive item-banner" src="<?php echo base_url().'uploads/shop/new.png'; ?>" alt=""/>
                      </a>
                    </div>
                    <div class="col-md-12 brand-name">
                      <?php echo $item->brand_name; ?>
                    </div>
                    <div class="col-md-12 item-title">
                      <?php echo $item->item_name; ?>
                    </div>
                    <!--      <div class="col-md-12 item-summery">-->
                    <!--        --><?php //echo $item->item_base_info; ?>
                    <!--      </div>-->
                    <?php if ($item->item_discount_rate == 0) { ?>
                      <div class="col-md-12 item-price-bold">
                        <?php echo $this->crud_model->get_price_str($item->item_sell_price); ?>원
                      </div>
                      <div class="col-md-12 item-price">
                      </div>
                    <?php } else { ?>
                      <div class="col-md-12 item-price" style="color: grey">
                        <?php echo $this->crud_model->get_price_str($item->item_general_price); ?>원
                      </div>
                      <div class="col-md-12 item-price-bold" style="color: #ff6633">
                        <?php echo $item->item_discount_rate.'% '.$this->crud_model->get_price_str($item->item_sell_price); ?>원
                      </div>
                    <?php } ?>
                    <div class="col-md-12 item-like">
                      <?php echo $this->crud_model->sns_func_html('like', 'product', $item->like, $item->product_id, 20, 20); ?>
                    </div>
                  </div>
                </div>
                <?php
                $i++;
              }?>
            </div>
          </div>
        <?php } ?>
        <?php if (isset($recommend_items) && !empty($recommend_items)) { ?>
          <div class="col-md-12 shop-recommend shop-content">
            <div class="col-md-12 shop-header">
              <h6 class="text-overflow text-center">파운디 추천</h6>
            </div>
            <div class="col-md-12 shop-recommend-items">
              <?php
              $i = 0;
              foreach ($recommend_items as $item) {
                $lr = $i % 2 == 0 ? 'left' : 'right';
                ?>
                <div class="col-md-6 col-sm-6 col-xs-6 item-<?php echo $lr; ?> shop-item">
                  <div class="col-md-12 item-content">
                    <div class="col-md-12 item-img">
                      <a href="<?php echo base_url().'home/shop/product?id='.$item->product_id; ?>">
                        <img class="img-responsive" src="<?php echo $item->item_image_url_0; ?>" alt=""/>
                        <?php if ($item->item_discount_rate > 0) { ?>
                          <img class="img-responsive item-banner" src="<?php echo base_url().'uploads/shop/sale.png'; ?>" alt=""/>
                        <?php } else { ?>
                          <img class="img-responsive item-banner" src="<?php echo base_url().'uploads/shop/new.png'; ?>" alt=""/>
                        <?php } ?>
                      </a>
                    </div>
                    <div class="col-md-12 brand-name">
                      <?php echo $item->brand_name; ?>
                    </div>
                    <div class="col-md-12 item-title">
                      <?php echo $item->item_name; ?>
                    </div>
                    <!--      <div class="col-md-12 item-summery">-->
                    <!--        --><?php //echo $item->item_base_info; ?>
                    <!--      </div>-->
                    <?php if ($item->item_discount_rate == 0) { ?>
                      <div class="col-md-12 item-price-bold">
                        <?php echo $this->crud_model->get_price_str($item->item_sell_price); ?>원
                      </div>
                      <div class="col-md-12 item-price">
                      </div>
                    <?php } else { ?>
                      <div class="col-md-12 item-price" style="color: grey">
                        <?php echo $this->crud_model->get_price_str($item->item_general_price); ?>원
                      </div>
                      <div class="col-md-12 item-price-bold" style="color: #ff6633">
                        <?php echo $item->item_discount_rate.'% '.$this->crud_model->get_price_str($item->item_sell_price); ?>원
                      </div>
                    <?php } ?>
                    <div class="col-md-12 item-like">
                      <?php echo $this->crud_model->sns_func_html('like', 'product', $item->like, $item->product_id, 20, 20); ?>
                    </div>
                  </div>
                </div>
                <?php
                $i++;
              }?>
            </div>
          </div>
        <?php } ?>
        <?php if (!empty($blogs)) { ?>
          <div class="col-md-12 shop-header">
            <h6 class="text-overflow text-center">THIS WEEK</h6>
          </div>
          <?php foreach ($blogs as $blog) { ?>
            <div class="col-md-12 main-blog-content">
              <div class="col-md-12 blog-img">
                <a href="<?php echo base_url().'home/blog/view?id='.$blog->blog_id; ?>">
                  <img class="img-responsive" src="<?php echo $blog->main_image_url; ?>" alt="" />
                </a>
              </div>
              <div class="col-md-12 blog-title">
                <h5><b><?php echo $blog->title; ?></b></h5>
              </div>
              <div class="col-md-12 blog-summery">
                <?php echo $blog->summery; ?>
              </div>
            </div>
          <?php } ?>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
  $(document).ready(function() {
    $('.shop-best-items').slick({
      slidesToShow: 2,
      slidesToScroll: 2,
      dots: false,
      centerMode: false,
      infinite: false,
      // swipe: true,
      // swipeToSlide: true,
      speed: 500,
      autoplaySpeed: 3000,
      waitForAnimate: false,
      focusOnSelect: false,
      autoplay: false,
      arrows: false,
    });
    $('.shop-new-items').slick({
      slidesToShow: 2,
      slidesToScroll: 2,
      dots: false,
      centerMode: false,
      infinite: false,
      // swipe: true,
      // swipeToSlide: true,
      speed: 500,
      autoplaySpeed: 3000,
      waitForAnimate: false,
      focusOnSelect: false,
      autoplay: false,
      arrows: false,
    });
    $('.shop-recommend-items').slick({
      slidesToShow: 2,
      slidesToScroll: 2,
      dots: false,
      centerMode: false,
      infinite: false,
      // swipe: true,
      // swipeToSlide: true,
      speed: 500,
      autoplaySpeed: 3000,
      waitForAnimate: false,
      focusOnSelect: false,
      autoplay: false,
      arrows: false,
    });
    active_menu_bar('main');
  });
</script>