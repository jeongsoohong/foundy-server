<div class="main-shop__tit">
  <p class="font-futura">BEST ITEM</p>
  <ul class="clearfix" style="margin: 0;">
    <li class="tit--detail titActive" data-id="yoga">YOGA</li>
    <li class="tit--detail" data-id="vegan">VEGAN</li>
    <li class="tit--detail" data-id="healing">HEALING</li>
  </ul>
</div>
<div class="main-shop__cnts" id="best_item_tab_yoga">
  <div class="cnt-box">
    <? foreach ($best_items_1 as $item) { ?>
      <div class="items-thumb">
        <a href="<?= base_url().'home/shop/product?id='.$item->product_id; ?>">
          <div class="thumb-photo">
            <img src="<?= $item->item_image_url_0; ?>">
          </div>
          <div class="thumb-price">
            <p class="price-name"><?= $item->brand_name; ?></p>
            <p class="price-detail"><?= $this->crud_model->get_price_str($item->item_general_price); ?><span>원</span></p>
          </div>
        </a>
      </div>
    <? } ?>
  </div>
</div>
<div class="main-shop__cnts" id="best_item_tab_vegan" style="display: none;">
  <div class="cnt-box">
    <? foreach ($best_items_2 as $item) { ?>
      <div class="items-thumb">
        <a href="<?= base_url().'home/shop/product?id='.$item->product_id; ?>">
          <div class="thumb-photo">
            <img src="<?= $item->item_image_url_0; ?>">
          </div>
          <div class="thumb-price">
            <p class="price-name"><?= $item->brand_name; ?></p>
            <p class="price-detail"><?= $this->crud_model->get_price_str($item->item_general_price); ?><span>원</span></p>
          </div>
        </a>
      </div>
    <? } ?>
  </div>
</div>
<div class="main-shop__cnts" id="best_item_tab_healing" style="display:none;">
  <div class="cnt-box">
    <? foreach ($best_items_3 as $item) { ?>
      <div class="items-thumb">
        <a href="<?= base_url().'home/shop/product?id='.$item->product_id; ?>">
          <div class="thumb-photo">
            <img src="<?= $item->item_image_url_0; ?>">
          </div>
          <div class="thumb-price">
            <p class="price-name"><?= $item->brand_name; ?></p>
            <p class="price-detail"><?= $this->crud_model->get_price_str($item->item_general_price); ?><span>원</span></p>
          </div>
        </a>
      </div>
    <? } ?>
  </div>
</div>
<script>
  $(function(){
    $('.tit--detail').click(function() {
      let id =$(this).data('id');
      console.log(id);
      $('.tit--detail').removeClass('titActive');
      $(this).addClass('titActive');
      $('.main-shop__cnts').hide();
      $('#best_item_tab_'+id).show();
    })
  })
</script>
<style type="text/css">
  .main-shop {
    margin-bottom: 52px;
  }
  .main-shop__tit p {
    text-align: center;
    height: 40px;
    line-height: 40px;
    margin: 0;
    font-size: 13px;
    color: #000;
  }
  .main-shop .clearfix::after {
    content: "";
    display: block;
    clear: both;
  }
  .tit--detail {
    display: block;
    float: left;
    width: 33.33%;
    text-align: center;
    cursor: pointer;
    color: #9e9e9e;
    font-size: 13px;
    font-weight: normal;
    height: 36px;
    line-height: 32px;
    font-family: futura-pt !important;
  }
  .titActive {
    color: #ff6633;
    font-weight: bold;
    /* text-decoration-color: #ff6633; */
  }
  /*.cnt--items {*/
  /*  width: 100%;*/
  /*  display: inline-block;*/
  /*}*/
  
  .main-shop__cnts {
    overflow-x: scroll;
  }
  .main-shop__cnts::-webkit-scrollbar {
    display: none;
  }
  .cnt-box {
    white-space: nowrap;
  }
  .items-thumb {
    display: inline-block;
    width: 31.1%;
    margin-right: 3.33%;
    text-align: center;
  }
  .items-thumb:last-child {
    margin: 0;
  }
  .items-thumb a {
    display: block;
  }
  .thumb-photo {
    position: relative;
    width: 100%;
    /*width: 30vw;*/
    padding-bottom: 100%;
  }
  .thumb-photo img {
    position: absolute;
    width: 100%;
    height: 100%;
    left: 0;
  }
  .thumb-price {
    padding: 8px 0 0;
  }
  .thumb-price p {
    margin: 0;
  }
  .price-name {
    color: #616161;
    font-size: 11px;
    font-weight: normal;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  .price-name::-webkit-scrollbar {
    display: none;
  }
  .price-detail {
    color: #000;
    font-size: 11.5px;
    font-weight: bold;
  }
  .price-detail span {
    font-size: 11.5px;
  }
  .main-discovery a {
    width: 22%;
  }
  .main-discovery a img {
    width: 100%;
  }
</style>
