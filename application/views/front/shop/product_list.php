<?php
if (isset($shop_items)) {
  $i = 0;
  foreach ($shop_items as $item) {
    $lr = $i % 2 == 0 ? 'left' : 'right';
    ?>
    <div class="col-md-6 col-sm-6 col-xs-6 item-<?php echo $lr; ?> shop-item">
      <div class="col-md-12 item-content">
        <div class="col-md-12 item-img">
          <a href="<?php echo base_url().'home/shop/product?id='.$item->product_id; ?>">
            <img class="img-responsive" src="<?php echo $item->item_image_url_0; ?>" alt=""/>
            <?php if ($item->item_discount_rate > 0) { ?>
              <img class="img-responsive item-banner" src="<?php echo base_url().'uploads/shop/sale.png'; ?>" alt=""/>
            <?php } elseif ($item->status == SHOP_PRODUCT_STATUS_STOP_SALE) { ?>
              <img class="img-responsive item-banner" src="<?php echo base_url().'uploads/shop/sold out.png'; ?>" alt=""/>
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
          <div class="col-md-12 item-price-bold" style="color: #FF6633">
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
  }
}?>