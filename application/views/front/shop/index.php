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
    /*padding: 0 10px 10px 10px !important;*/
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
  .img-responsive {
    width: 100%;
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
    height: 50px !important;
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
  .shop-best-items {
    padding: 0;
    margin: 0 15px;
    border-bottom: 1px solid #EAEAEA;
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
  .shop-item {
    padding: 0 10px 24px !important;
    height: 340px;
  }
  @media(min-width: 428px) {
    .shop-item {
      height: auto;
    }
  }
  .shop-best-items {
    border: 0;
  }
  .shop-content {
    border-bottom: 1px solid #e0e0e0;
  }
  .shop-content:last-child {
    padding-bottom: 0;
    border: 0;
  }
  .sub_thm, .sub_thm a {
    color: #757575;
  }
  .brand-name {
    margin: 12px 0 2px;
  }
  .item-title {
    height: auto !important;
    line-height: 1.5 !important;
    padding-bottom: 4px;
  }
  .item-price {
    height: 14px;
  }
  .item-price-bold {
    margin: 2px 0 12px;
  }
  .item-img .item-banner {
    width: 30px !important;
    height: 30px !important;
    right: 6px;
    bottom: 6px;
  }
</style>
<section class="page-section" style="margin-top: 0px !important; margin-bottom: 0px !important; padding-top: 0px
    !important; padding-bottom: 0px !important;">
  <div id="content-container">
    <div id="page-content">
      <div class="row">
        <?php if ($category != 'all' && $category != 'ALL' && $category != 'wish' && $category != 'WISH') { ?>
          <div class="col-md-12" style="text-align: center; font-size: 16px;height: 40px; line-height: 30px; padding-top: 10px">
            <?php
            $cnt = 0;
            if ($cat_level > 1) {
              foreach ($cats as $cat) {
              ?>
                <a class="font-futura"
                  <?php if (!strcmp($cat->cat_code, $category)) { ?>
                    style="color: #FF6633; font-size: 12px; padding-top: 12px;"
                  <?php } ?>
                   style="font-size: 12px; padding-top: 12px;"
                   href="<?php echo base_url(); ?>home/shop?col=product_id&order=desc&cat=<?php echo $cat->cat_code; ?>">
                  <?php
                  echo $cat->cat_name;
                  $cnt++;
                  ?>
                </a>
                <?php if ($cnt == 1) { ?>
                  &nbsp;&nbsp;>&nbsp;&nbsp;
                <?php } else if ($cnt < count($cats)) { ?>
                  &nbsp;&nbsp;/&nbsp;&nbsp;
                <?php }  ?>
                <?php
              }
            } else { // 1 level
            foreach ($cats as $cat) {
              ?>
              <a class="font-futura"
                <?php if (!strcmp($cat->cat_code, $category)) { ?>
                  style="color: #FF6633; font-size: 12px; padding-top: 12px;"
                <?php } ?>
                 style="font-size: 12px; padding-top: 12px;"
                 href="<?php echo base_url(); ?>home/shop?col=product_id&order=desc&cat=<?php echo $cat->cat_code; ?>">
                <?php
                echo $cat->cat_name;
                $cnt++;
                ?>
              </a>
              <?php if ($cnt < count($cats)) { ?>
                &nbsp;&nbsp;/&nbsp;&nbsp;
              <?php }  ?>
              <?php
            }
            }
            ?>
          </div>
        <?php } ?>
        <?php if (isset($best_items) && !empty($best_items)) { ?>
          <div class="col-md-12 shop-best shop-content">
            <div class="col-md-12 shop-header">
              <h6 class="text-overflow text-center font-futura">BEST ITEM</h6>
            </div>
            <div class="col-md-12 shop-best-items" style="margin: 0 !important;">
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
                      </a>
                    </div>
                    <div class="col-md-12 brand-name">
                      <?php echo $item->brand_name; ?>
                    </div>
                    <div class="col-md-12 item-title">
                      <?php echo $item->item_name; ?>
                    </div>
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
                    <style>
                      .item-like a {
                        width: 20px;
                        height: 20px;
                        line-height: 20px;
                      }
                    </style>
                    <div class="col-md-12 item-like">
                      <?php echo $this->crud_model->sns_func_html('like', 'product', $item->like, $item->product_id, 20, 17.41); ?>
                    </div>
                  </div>
                </div>
                <?php
                $i++;
              }?>
            </div>
          </div>
        <?php } ?>
        <div class="col-md-12 shop-content">
          <?php if ($category == 'all' || $category == 'ALL') { ?>
            <div class="col-md-12 shop-header">
              <h6 class="text-overflow text-center font-futura">NEW IN</h6>
            </div>
          <?php } elseif ($category == 'wish' || $category == 'WISH') { ?>
            <div class="col-md-12 shop-header">
              <h6 class="text-overflow text-center font-futura">WISH LIST</h6>
            </div>
          <?php } else { ?>
            <div class="col-md-12 shop-header">
              <!--            <h6 class="text-overflow text-center">BEST ITEM</h6>-->
              <div class="col-md-6" style="width: 65%;">
              </div>
              <div class="pull-right" style="width: 25%">
                <select class="form-control select-arrow" id="shop-category" onchange="change_order();" name="shop_category" style="padding: 0 0; border: none">
                  <option value="0">신상품순</option>
                  <option value="1">낮은가격순</option>
                  <option value="2">높은가격순</option>
                </select>
              </div>
              <div class="pull-right" style="width: 5%; text-align: right; line-height: 50px; color: grey">
                <i class="fa fa-angle-down"></i>
              </div>
            </div>
          <?php } ?>
          <div class="col-md-12 shop-items">
            <!-- shop items -->
          </div>
          <div id="view_more">
            <a class="btn btn-lg btn-primary" href="javascript:void(0)" onclick="load_list();" role="button">
              view more
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>-->
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
  var page = 0;
  var category = '<?php echo $category; ?>';
  var col = '<?php echo $col; ?>';
  var order = '<?php echo $order; ?>';
  var limit = <?php echo SHOP_PRODUCT_LIST_PAGE_SIZE; ?>;

  var loading_set = '<div style="text-align:center;width:100%;height:'+(top*2)+'px; position:relative;top:'+top+'px;"><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i></div>';

  function change_order() {
    var val = parseInt($('#shop-category').find('option:checked').val());
    if (val === 0) {
      col = 'product_id';
      order = 'desc';
    } else if (val === 1) {
      col = 'item_sell_price';
      order = 'asc';
    } else if (val === 2) {
      col = 'item_sell_price';
      order = 'desc';
    } else {
      return false;
    }

    page = 0;
    $('#view_more').hide();
    $('.shop-items .shop-item').remove();
    load_list();
    return true;
  }

  function load_list() {
    page = page + 1;
    $.ajax({
      url: '<?php echo base_url(); ?>home/shop/list?cat=' + category + '&page=' + page + '&col=' + col + '&order=' + order,
      type: 'GET', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      success: function(data) {
        var prevCnt = $(".shop-items .shop-item").length;

        // console.log(data);
        $('.shop-items').append(data);
        // console.log($(".center_ul a li").length % 10);

        var listCnt = $(".shop-items .shop-item").length;
        if ( listCnt === 0 || listCnt % limit !== 0 || prevCnt === listCnt) {
          $('#view_more').hide();
        } else {
          $('#view_more').show();
        }
        // console.log(prevCnt);
        // console.log(listCnt);
      },
      error: function(e) {
        console.log(e)
      }
    });

    return true;
  }

  $(document).ready(function() { $('.shop-best-items').slick({
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
    active_menu_bar('<?php
      echo $this->crud_model->get_product_category_str($category);
      ?>');
    load_list();
  });
</script>
