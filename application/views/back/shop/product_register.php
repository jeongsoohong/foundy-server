<style>
  button {
    border: none;
  }
  select {
    width: 100%;
    height: 32px;
    font-size: 14px;
  }
  .shop-category-1, .shop-category-2, .shop-category-3 {
    padding: 0 5px !important;
  }
  .item-content table tr {
    height: 40px;
    font-size: 14px;
    text-align: center;
  }
  .item-content table tr th {
    text-align: right;
  }
  .item-content table tr td {
    padding: 5px 15px;
  }
  .item-content table tr td div {
    padding-left: 0;
    padding-right: 0;
    line-height: 32px;
    margin: 5px 0;
  }
  .item-content input[type='checkbox'] {
    width: auto !important;
  }
  .item-list input[type='checkbox'] {
    width: auto !important;
    margin: auto;
    text-align: center;
  }
  span.required, .header-required {
    color: red;
  }
  .item-option, .item-option table tr th {
    text-align: center;
  }
  .item-option span {
    width: 20px;
    height: 20px;
    line-height: 20px;
    background-color: #EAEAEA;
  }
  .item-option-header {
    text-align: center;
  }
  .item-option-val-detail, .item-option-header div a, .item-option-val-detail div a {
    margin: 0 2px !important;
  }
  .item-option-val-detail div {
    padding: 0 1px !important;
    text-align: center;
  }
  .note-editable{
    resize: none !important;
    *overflow-y: hidden !important; /* 스크롤이 생성되는것을 막아준다. */
    padding-top: .8em !important; /*엔터키로 인한 상단의 텍스트 깨짐 현상을 막아준다. */
    padding-bottom: 0.2em !important;
    padding-left: .25em !important;
    padding-right: .25em !important;
    line-height: 1.6 !important;
    min-height: 300px !important;
  }
  .note-editable iframe, .note-editable img {
    width: 100% !important;
    height: auto !important;
  }
  .note-toolbar {
    height: auto;
  }
</style>
<div class="col-md-12 col-sm-12 col-xs-12 product-meta">
<!--  <div id="page-title">-->
<!--    <h1 class="page-header text-overflow">상품관리 <span class="fa fa-angle-right"></span> 상품등록</h1>-->
<!--  </div>-->
  <div class="item-content" id="page-content">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12 item-info">
        <div class="panel panel-bordered">
          <div class="panel-heading">
            <h3 class="panel-title">상품카테고리/기본정보</h3>
          </div>
          <div class="panel-body">
            <div class="text-center">
              <table class="col-md-12 col-sm-12 col-xs-12">
                <tbody>
                <tr>
                  <th class="col-md-2 col-sm-2 col-xs-2 item-cat-header">진열카테고리<span class="required">*</span></th>
                  <td colspan="5" class="col-md-10 col-sm-10 col-xs-10">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <?php if ($edit == true) { ?>
                        <div class="col-md-4 col-sm-4 col-xs-4 shop-category-1">
                          <select disabled id="item-cat-1" class="form-control" onchange="get_product_category($(this));" data-id="1">
                            <option value="0">대분류</option>
                            <?php foreach ($cat_1 as $cat) { ?>
                              <option <?php if (!strncmp($cat->cat_code, $product_data->item_cat, 2)) echo 'selected'; ?> value="<?php echo $cat->cat_code; ?>"><?php echo $cat->cat_name; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 shop-category-2">
                          <select disabled id="item-cat-2" class="form-control" onchange="get_product_category($(this));" data-id="2">
                            <option value="0">중분류</option>
                            <?php foreach ($cat_2 as $cat) { ?>
                              <option <?php if (!strncmp($cat->cat_code, $product_data->item_cat, 4)) echo 'selected'; ?> value="<?php echo $cat->cat_code; ?>"><?php echo $cat->cat_name; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 shop-category-3">
                          <select disabled id="item-cat-3" class="form-control" data-id="3">
                            <option value="0">소분류</option>
                            <?php foreach ($cat_3 as $cat) { ?>
                              <option <?php if (!strncmp($cat->cat_code, $product_data->item_cat, 6)) echo 'selected'; ?> value="<?php echo $cat->cat_code; ?>"><?php echo $cat->cat_name; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      <?php } else { ?>
                        <div class="col-md-4 col-sm-4 col-xs-4 shop-category-1">
                          <select id="item-cat-1" class="form-control" onchange="get_product_category($(this));" data-id="1">
                            <option value="0">대분류</option>
                            <?php foreach ($shop_product_category as $cat) { ?>
                              <option value="<?php echo $cat->cat_code; ?>"><?php echo $cat->cat_name; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 shop-category-2">
                          <select id="item-cat-2" class="form-control" onchange="get_product_category($(this));" data-id="2">
                            <option value="0">중분류</option>
                          </select>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 shop-category-3">
                          <select id="item-cat-3" class="form-control" data-id="3">
                            <option value="0">소분류</option>
                          </select>
                        </div>
                      <?php } ?>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th class="col-md-2 col-sm-2 col-xs-2 item-name-header">상품명<span class="required">*</span></th>
                  <td colspan="5" class="col-md-10 col-sm-10 col-xs-10">
                    <?php if ($edit == true) { ?>
                      <input class='form-control' id="item-name" name="item_name" type="text" value="<?php echo $product->item_name; ?>" />
                    <?php } else { ?>
                      <input class='form-control' id="item-name" name="item_name" type="text" value="" />
                    <?php } ?>
                  </td>
                </tr>
                <tr>
                  <th class="col-md-2 col-sm-2 col-xs-2 item-type-header">상품유형<span class="required">*</span></th>
                  <td colspan="2" class="col-md-4 col-sm-4 col-xs-4">
                    <?php if ($edit == true) { ?>
                      <select id="item-type" class="form-control">
                        <option <?php if ($product_data->item_type == SHOP_PRODUCT_ITEM_TYPE_GENERAL) echo 'selected'; ?>
                          value="<?php echo SHOP_PRODUCT_ITEM_TYPE_GENERAL; ?>">
                          <?php echo $this->crud_model->get_product_item_type_str(SHOP_PRODUCT_ITEM_TYPE_GENERAL);?>
                        </option>
                        <option <?php if ($product_data->item_type == SHOP_PRODUCT_ITEM_TYPE_CUSTOM) echo 'selected'; ?>
                          value="<?php echo SHOP_PRODUCT_ITEM_TYPE_CUSTOM; ?>">
                          <?php echo $this->crud_model->get_product_item_type_str(SHOP_PRODUCT_ITEM_TYPE_CUSTOM);?>
                        </option>
                      </select>
                    <?php } else { ?>
                      <select id="item-type" class="form-control">
                        <option value="<?php echo SHOP_PRODUCT_ITEM_TYPE_GENERAL; ?>">
                          <?php echo $this->crud_model->get_product_item_type_str(SHOP_PRODUCT_ITEM_TYPE_GENERAL);?>
                        </option>
                        <option value="<?php echo SHOP_PRODUCT_ITEM_TYPE_CUSTOM; ?>">
                          <?php echo $this->crud_model->get_product_item_type_str(SHOP_PRODUCT_ITEM_TYPE_CUSTOM);?>
                        </option>
                      </select>
                    <?php } ?>
                  </td>
                  <th class="col-md-2 col-sm-2 col-xs-2 item-tax-header">과세여부<span class="required">*</span></th>
                  <td colspan="2" class="col-md-4 col-sm-4 col-xs-4">
                    <select id="item-tax" class="form-control">
                      <?php if ($edit == true) { ?>
                        <option <?php if ($product_data->item_tax == SHOP_PRODUCT_ITEM_TAX) echo 'selected'; ?>
                          value="<?php echo SHOP_PRODUCT_ITEM_TAX; ?>">
                          <?php echo $this->crud_model->get_product_item_tax_str(SHOP_PRODUCT_ITEM_TAX);?>
                        </option>
                        <option <?php if ($product_data->item_tax == SHOP_PRODUCT_ITEM_NO_TAX) echo 'selected'; ?>
                          value="<?php echo SHOP_PRODUCT_ITEM_NO_TAX; ?>">
                          <?php echo $this->crud_model->get_product_item_tax_str(SHOP_PRODUCT_ITEM_NO_TAX);?>
                        </option>
                      <?php } else { ?>
                        <option value="<?php echo SHOP_PRODUCT_ITEM_TAX; ?>">
                          <?php echo $this->crud_model->get_product_item_tax_str(SHOP_PRODUCT_ITEM_TAX);?>
                        </option>
                        <option value="<?php echo SHOP_PRODUCT_ITEM_NO_TAX; ?>">
                          <?php echo $this->crud_model->get_product_item_tax_str(SHOP_PRODUCT_ITEM_NO_TAX);?>
                        </option>
                      <?php } ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <th class="col-md-2 col-sm-2 col-xs-2 item-shipping-days-header">배송소요일<span class="required">*</span></th>
                  <td colspan="2" class="col-md-4 col-sm-4 col-xs-4">
                    <select id="item-shipping-days" class="form-control">
                      <?php if ($edit == true) { ?>
                        <option <?php if ($product_data->item_shipping_days == SHOP_PRODUCT_SHIPPING_2_DAYS) echo 'selected'; ?>
                          value="<?php echo SHOP_PRODUCT_SHIPPING_2_DAYS; ?>">
                          <?php echo $this->crud_model->get_product_item_shipping_days_str(SHOP_PRODUCT_SHIPPING_2_DAYS);?>
                        </option>
                        <option <?php if ($product_data->item_shipping_days == SHOP_PRODUCT_SHIPPING_3_DAYS) echo 'selected'; ?>
                          value="<?php echo SHOP_PRODUCT_SHIPPING_3_DAYS; ?>">
                          <?php echo $this->crud_model->get_product_item_shipping_days_str(SHOP_PRODUCT_SHIPPING_3_DAYS);?>
                        </option>
                        <option <?php if ($product_data->item_shipping_days == SHOP_PRODUCT_SHIPPING_CUSTOM) echo 'selected'; ?>
                          value="<?php echo SHOP_PRODUCT_SHIPPING_CUSTOM; ?>">
                          <?php echo $this->crud_model->get_product_item_shipping_days_str(SHOP_PRODUCT_SHIPPING_CUSTOM);?>
                        </option>
                      <?php } else { ?>
                        <option value="<?php echo SHOP_PRODUCT_SHIPPING_2_DAYS; ?>">
                          <?php echo $this->crud_model->get_product_item_shipping_days_str(SHOP_PRODUCT_SHIPPING_2_DAYS);?>
                        </option>
                        <option value="<?php echo SHOP_PRODUCT_SHIPPING_3_DAYS; ?>">
                          <?php echo $this->crud_model->get_product_item_shipping_days_str(SHOP_PRODUCT_SHIPPING_3_DAYS);?>
                        </option>
                        <option value="<?php echo SHOP_PRODUCT_SHIPPING_CUSTOM; ?>">
                          <?php echo $this->crud_model->get_product_item_shipping_days_str(SHOP_PRODUCT_SHIPPING_CUSTOM);?>
                        </option>
                      <?php } ?>
                    </select>
                  </td>
                  <th class="col-md-2 col-sm-2 col-xs-2 item-shipping-free-header">배송비유형<span class="required">*</span></th>
                  <td colspan="2" class="col-md-4 col-sm-4 col-xs-4">
                    <select id="item-shipping-free" class="form-control">
                      <option value="<?php echo $shop_shipping->free_shipping; ?>">
                        <?php echo $this->crud_model->get_product_shipping_free_str($shop_shipping->free_shipping);?>
                      </option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <th class="col-md-2 col-sm-2 col-xs-2 item-base-info-header">상품기본설명<span class="required">*</span></th>
                  <td colspan="5" class="col-md-10 col-sm-10 col-xs-10">
                    <?php if ($edit == true) { ?>
                      <input id="item-base-info" class='form-control' name="item_info" type="text" value="<?php echo $product_data->item_base_info; ?>" />
                    <?php } else { ?>
                      <input id="item-base-info" class='form-control' name="item_info" type="text" value="" />
                    <?php } ?>
                  </td>
                </tr>
                <tr>
                  <th class="col-md-2 col-sm-2 col-xs-2 item-attention-point-header">상품유의사항</th>
                  <td class="col-md-2 col-sm-2 col-xs-2">
                    <select id="item-attention-point-select" class="form-control" onchange="change_attention_point($(this))">
                      <?php if ($edit == true) { ?>
                        <option <?php if ($product_data->item_attention_point == '') echo 'selected'; ?> value="0">사용안함</option>
                        <option <?php if ($product_data->item_attention_point != '') echo 'selected'; ?> value="1">사용</option>
                    <?php } else { ?>
                        <option value="0">사용안함</option>
                        <option value="1">사용</option>
                    <?php } ?>
                    </select>
                  </td>
                  <td colspan="4" class="col-md-8 col-sm-8 col-xs-8">
                    <?php if ($edit == true) { ?>
                      <?php if ($product_data->item_attention_point == '') { ?>
                        <input disabled id="item-attention-point" class='form-control' name="item_attention_point" type="text" value="" />
                      <?php } else { ?>
                        <input id="item-attention-point" class='form-control' name="item_attention_point" type="text"
                               value="<?php echo $product_data->item_attention_point; ?>" />
                      <?php } ?>
                    <?php } else { ?>
                      <input disabled id="item-attention-point" class='form-control' name="item_attention_point" type="text" value="" />
                    <?php } ?>
                  </td>
                </tr>
                <tr>
                  <th class="col-md-2 col-sm-2 col-xs-2 order-attention-point-header">주문유의사항</th>
                  <td class="col-md-2 col-sm-2 col-xs-2">
                    <select id="order-attention-point-select" class="form-control" onchange="change_attention_point($(this))">
                      <?php if ($edit == true) { ?>
                        <option <?php if ($product_data->order_attention_point == '') echo 'selected'; ?> value="0">사용안함</option>
                        <option <?php if ($product_data->order_attention_point != '') echo 'selected'; ?> value="1">사용</option>
                      <?php } else { ?>
                        <option value="0">사용안함</option>
                        <option value="1">사용</option>
                      <?php } ?>
                    </select>
                  </td>
                  <td colspan="4" class="col-md-8 col-sm-8 col-xs-8">
                    <?php if ($edit == true) { ?>
                      <?php if ($product_data->order_attention_point == '') { ?>
                        <input disabled id="order-attention-point" class='form-control' name="order_attention_point" type="text" value="" />
                      <?php } else { ?>
                        <input id="order-attention-point" class='form-control' name="order_attention_point" type="text"
                               value="<?php echo $product_data->order_attention_point; ?>" />
                      <?php } ?>
                    <?php } else { ?>
                      <input disabled id="order-attention-point" class='form-control' name="order_attention_point" type="text" value="" />
                    <?php } ?>
                  </td>
                </tr>
                <tr>
                  <th class="col-md-2 col-sm-2 col-xs-2 shipping-attention-point-header">배송유의사항</th>
                  <td class="col-md-2 col-sm-2 col-xs-2">
                    <select id="shipping-attention-point-select" class="form-control" onchange="change_attention_point($(this))">
                      <?php if ($edit == true) { ?>
                        <option <?php if ($product_data->shipping_attention_point == '') echo 'selected'; ?> value="0">사용안함</option>
                        <option <?php if ($product_data->shipping_attention_point != '') echo 'selected'; ?> value="1">사용</option>
                      <?php } else { ?>
                        <option value="0">사용안함</option>
                        <option value="1">사용</option>
                      <?php } ?>
                    </select>
                  </td>
                  <td colspan="4" class="col-md-8 col-sm-8 col-xs-8">
                    <?php if ($edit == true) { ?>
                      <?php if ($product_data->shipping_attention_point == '') { ?>
                        <input disabled id="shipping-attention-point" class='form-control' name="shipping_attention_point" type="text" value="" />
                      <?php } else { ?>
                        <input id="shipping-attention-point" class='form-control' name="shipping_attention_point" type="text"
                               value="<?php echo $product_data->shipping_attention_point; ?>" />
                      <?php } ?>
                    <?php } else { ?>
                      <input disabled id="shipping-attention-point" class='form-control' name="shipping_attention_point" type="text" value="" />
                    <?php } ?>
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-bordered">
          <div class="panel-heading">
            <h3 class="panel-title">상품고시/인증정보</h3>
          </div>
          <div class="panel-body">
            <table class="col-md-12 col-sm-12 col-xs-12">
              <tbody>
              <tr>
                <th class="col-md-2 col-sm-2 col-xs-2 item-noti-info-header">상품고시정보<span class="required">*</span></th>
                <td colspan="4" class="col-md-10 col-sm-10 col-xs-10" id="item-noti-info">
                  <?php if ($edit == true) { ?>
                    <?php if ($product_data->item_noti_info_need) { ?>
<!--                      <textarea id="item-noti-info" rows="20" class="form-control" data-height="500">--><?php //echo str_replace("<br />", "\n", $product_data->item_noti_info); ?><!--</textarea>-->
                    <?php } else { ?>
<!--                      <textarea disabled id="item-noti-info" rows="20" class="form-control" data-height="500"></textarea>-->
                    <?php } ?>
                  <?php } else { ?>
<!--                    <textarea disabled id="item-noti-info" rows="20" class="form-control" data-height="500"></textarea>-->
                  <?php } ?>
                </td>
              </tr>
              <tr>
                <th class="col-md-2 col-sm-2 col-xs-2 item-cert-header">인증정보</th>
                <td colspan="4" class="col-md-10 col-sm-10 col-xs-10">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php if ($edit == false || $product_data->item_cert_need == false) { ?>
                    <div class="col-md-2 col-sm-2 col-xs-2" style="text-align: center">
                      KC인증번호
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <input disabled class='form-control' id="item-kc-cert-number" name="item_kc_permit_number" type="text" value="" />
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2" style="text-align: center">
                      제품명
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <input disabled class='form-control' id="item-cert-name" name="item_permit_name" type="text" value="" />
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="col-md-2 col-sm-2 col-xs-2" style="text-align: center">
                      모델명
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                      <input disabled class='form-control' id="item-model-name" name="item_model_name" type="text" value="" />
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2" style="text-align: center">
                      제조업자명
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                      <input disabled class='form-control' id="item-manufacturer-name" name="item_manufacturer_name" type="text" value="" />
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2" style="text-align: center">
                      수업업자명
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                      <input disabled class='form-control' id="item-importer-name" name="item_importer_name" type="text" value="" />
                    </div>
                    <?php } else { ?>
                    <div class="col-md-2 col-sm-2 col-xs-2" style="text-align: center">
                      KC인증번호
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <input class='form-control' id="item-kc-cert-number" name="item_kc_permit_number" type="text"
                             value="<?php echo $product_data->item_kc_cert_number; ?>" />
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2" style="text-align: center">
                      제품명
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <input class='form-control' id="item-cert-name" name="item_permit_name" type="text"
                             value="<?php echo $product_data->item_cert_name; ?>" />
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="col-md-2 col-sm-2 col-xs-2" style="text-align: center">
                      모델명
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                      <input class='form-control' id="item-model-name" name="item_model_name" type="text"
                             value="<?php echo $product_data->item_model_name; ?>" />
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2" style="text-align: center">
                      제조업자명
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                      <input class='form-control' id="item-manufacturer-name" name="item_manufacturer_name" type="text"
                             value="<?php echo $product_data->item_manufacturer_name; ?>" />
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2" style="text-align: center">
                      수업업자명
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                      <input class='form-control' id="item-importer-name" name="item_importer_name" type="text"
                             value="<?php echo $product_data->item_importer_name; ?>" />
                    </div>
                    <?php } ?>
                  </div>
                </td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-bordered">
          <div class="panel-heading">
            <h3 class="panel-title">상품가격정보</h3>
          </div>
          <div class="panel-body">
            <table class="col-md-12 col-sm-12 col-xs-12">
              <tbody>
              <tr>
                <th class="col-md-1 col-sm-1 col-xs-1 item-general-price-header">정상가<span class="required">*</span></th>
                <td class="col-md-2 col-sm-2 col-xs-2">
                  <?php if ($edit) { ?>
                    <input onchange="change_general_price();" class='form-control' id="item-general-price" name="item_general_price" type="text"
                           value="<?php echo $product_data->item_general_price; ?>" />
                  <?php } else { ?>
                    <input onchange="change_general_price();" class='form-control' id="item-general-price" name="item_general_price" type="text" value="0" />
                  <?php } ?>
                </td>
                <th class="col-md-1 col-sm-1 col-xs-1 item-discount-rate-header">할인율<span class="required">*</span></th>
                <td class="col-md-2 col-sm-2 col-xs-2">
                  <select class="form-control" id="item-discount-rate" onchange="change_discount_rate()">
                    <?php if ($edit) { ?>
                      <option <?php if ($product_data->item_discount_rate == 0) echo 'selected'; ?> value="0" selected>0%</option>
                      <option <?php if ($product_data->item_discount_rate == 5) echo 'selected'; ?> value="5">5%</option>
                      <option <?php if ($product_data->item_discount_rate == 10) echo 'selected'; ?> value="10">10%</option>
                      <option <?php if ($product_data->item_discount_rate == 15) echo 'selected'; ?> value="15">15%</option>
                      <option <?php if ($product_data->item_discount_rate == 20) echo 'selected'; ?> value="20">20%</option>
                      <option <?php if ($product_data->item_discount_rate == 25) echo 'selected'; ?> value="25">25%</option>
                      <option <?php if ($product_data->item_discount_rate == 30) echo 'selected'; ?> value="30">30%</option>
                      <option <?php if ($product_data->item_discount_rate == 35) echo 'selected'; ?> value="35">35%</option>
                      <option <?php if ($product_data->item_discount_rate == 40) echo 'selected'; ?> value="40">40%</option>
                    <?php } else { ?>
                      <option value="0" selected>0%</option>
                      <option value="5">5%</option>
                      <option value="10">10%</option>
                      <option value="15">15%</option>
                      <option value="20">20%</option>
                      <option value="25">25%</option>
                      <option value="30">30%</option>
                      <option value="35">35%</option>
                      <option value="40">40%</option>
                    <?php } ?>
                  </select>
                </td>
                <th class="col-md-1 col-sm-1 col-xs-1"></th>
                <td class="col-md-2 col-sm-2 col-xs-2"></td>
                <th class="col-md-1 col-sm-1 col-xs-1"></th>
                <td class="col-md-2 col-sm-2 col-xs-2"></td>
              </tr>
              <tr>
                <th class="col-md-1 col-sm-1 col-xs-1 item-sell-price-header">판매가</th>
                <td class="col-md-2 col-sm-2 col-xs-2">
                  <?php if ($edit) { ?>
                    <input class='form-control' id="item-sell-price" name="item_sell_price" type="text" value="<?php echo $product_data->item_sell_price; ?>" />
                  <?php } else { ?>
                    <input readonly class='form-control' id="item-sell-price" name="item_sell_price" type="text" value="0" />
                  <?php } ?>
                </td>
                <th class="col-md-1 col-sm-1 col-xs-1 item-margin-header">마진율</th>
                <td class="col-md-2 col-sm-2 col-xs-2">
                  <?php if ($edit) { ?>
                    <input readonly class='form-control' id="item-margin" name="item_margin" type="text" value="<?php echo $product_data->item_margin; ?>%" />
                  <?php } else { ?>
                    <input readonly class='form-control' id="item-margin" name="item_margin" type="text" value="<?php echo $shop_data->commission_rate; ?>%" />
                  <?php } ?>
                </td>
                <th class="col-md-1 col-sm-1 col-xs-1 item-supply-price-header">공급가</th>
                <td class="col-md-2 col-sm-2 col-xs-2">
                  <?php if ($edit) { ?>
                    <input readonly class='form-control' id="item-supply-price" name="item_supply_price" type="text"
                           value="<?php echo $product_data->item_supply_price; ?>" />
                  <?php } else { ?>
                    <input readonly class='form-control' id="item-supply-price" name="item_supply_price" type="text" value="0" />
                  <?php } ?>
                </td>
                <th class="col-md-1 col-sm-1 col-xs-1"></th>
                <td class="col-md-2 col-sm-2 col-xs-2"></td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-bordered">
          <div class="panel-heading">
            <h3 class="panel-title">상품옵션</h3>
          </div>
          <div class="panel-body">
            <table class="col-md-12 col-sm-12 col-xs-12">
              <tbody>
              <tr>
                <th class="col-md-2 col-sm-2 col-xs-2 item-option-base-header">기본옵션<span class="required">*</span></th>
                <td class="col-md-10 col-sm-10 col-xs-10">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="col-md-2 col-sm-2 col-xs-2" style="text-align: center">
                      구매최대갯수
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                      <?php if ($edit) { ?>
                        <input class='form-control' id="purchase-max-cnt" name="purchase_max_cnt" type="number" min="0" max="100"
                               value="<?php echo $product_data->purchase_max_cnt; ?>" />
                      <?php } else { ?>
                        <input class='form-control' id="purchase-max-cnt" name="purchase_max_cnt" type="number" value="0" min="0" max="100"/>
                      <?php } ?>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2" style="text-align: center">
                      묶음배송갯수
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                      <?php if ($edit) { ?>
                        <input class='form-control' id="bundle-shipping-cnt" name="bundle_shipping_cnt" type="number"
                               value="<?php echo $product_data->bundle_shipping_cnt; ?>" />
                      <?php } else { ?>
                        <input class='form-control' id="bundle-shipping-cnt" name="bundle_shipping_cnt" type="number" value="0" />
                      <?php } ?>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <th class="col-md-2 col-sm-2 col-xs-2 item-option-header">옵션여부선택<span class="required">*</span></th>
                <td class="col-md-10 col-sm-10 col-xs-10">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php if ($edit) { ?>
                      <div class="col-md-2 col-sm-2 col-xs-2">
                        <?php $option_cnt = $product_data->item_option_requires_cnt + $product_data->item_option_others_cnt; ?>
                        <label style="text-align:left">
                          <input <?php if ($option_cnt == 0) echo 'checked'; ?> onchange="change_option($(this));" class='form-checkbox' data-action="no_option" id="item-no-option" name="item_no_option" type="checkbox" value="2" />
                          옵션없음(단품)
                        </label>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-2">
                        <label style="text-align:left">
                          <input <?php if ($option_cnt > 0) echo 'checked'; ?> onchange="change_option($(this));" class='form-checkbox' data-action="has_option" id="item-has-option" name="item_has_option" type="checkbox" value="1" />
                          옵션있음
                        </label>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-2">
                        <select onchange="set_option_html();" class="form-control" id="item-option-count">
                          <option <?php if ($option_cnt == 0) echo 'selected'; ?> value="0">옵션갯수</option>
                          <option <?php if ($option_cnt == 1) echo 'selected'; ?> value="1">1개</option>
                          <option <?php if ($option_cnt == 2) echo 'selected'; ?> value="2">2개</option>
                          <option <?php if ($option_cnt == 3) echo 'selected'; ?> value="3">3개</option>
                          <option <?php if ($option_cnt == 4) echo 'selected'; ?> value="4">4개</option>
                          <option <?php if ($option_cnt == 5) echo 'selected'; ?> value="5">5개</option>
                        </select>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-6">
                      </div>
                    <?php } else { ?>
                      <div class="col-md-2 col-sm-2 col-xs-2">
                        <label style="text-align:left">
                          <input checked onchange="change_option($(this));" class='form-checkbox' data-action="no_option" id="item-no-option" name="item_no_option" type="checkbox" value="2" />
                          옵션없음(단품)
                        </label>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-2">
                        <label style="text-align:left">
                          <input onchange="change_option($(this));" class='form-checkbox' data-action="has_option" id="item-has-option" name="item_has_option" type="checkbox" value="1" />
                          옵션있음
                        </label>
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-2">
                        <select disabled onchange="set_option_html();" class="form-control" id="item-option-count">
                          <option value="0">옵션갯수</option>
                          <option value="1">1개</option>
                          <option value="2">2개</option>
                          <option value="3">3개</option>
                          <option value="4">4개</option>
                          <option value="5">5개</option>
                        </select>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-6">
                      </div>
                    <?php } ?>
                  </div>
                </td>
              </tr>
              <tr class="item-option" id="item-option-row">
                <th class="col-md-1 col-sm-1 col-xs-1">옵션</th>
                <td class="col-md-11 col-sm-11 col-xs-1">
                  <table border="1" bordercolor="#EAEAEA" class="col-md-12 col-sm-12 col-xs-12">
                    <thead>
                    <tr>
                      <th class="col-md-2 col-sm-2 col-xs-2">옵셥편집</th>
                      <th class="col-md-2 col-sm-2 col-xs-2">옵션명</th>
                      <th class="col-md-8 col-sm-8 col-xs-8">옵션값</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if ($edit) { ?>
                      <?php
                      $option_idx = 1;
                      foreach ($product_data->item_option_requires as $option) { ?>
                        <tr id="item-option-row-<?php echo $option_idx; ?>">
                          <td class="col-md-2 col-sm-2 col-xs-2 item-option-header">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <a href="javascript:void(0);" onclick="move_option($(this),'up');"><span class="fa fa-caret-up"></span></a>
                              <a href="javascript:void(0);" onclick="move_option($(this),'down');"><span class="fa fa-caret-down"></span></a>
                              <a href="javascript:void(0);" onclick="add_option_val($(this));"><span class="fa fa-plus"></span></a>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <label style="text-align:left">
                                <input <?php if ($option->item_option_require == true) echo 'checked'; ?>
                                  class="form-checkbox item-require" name="item_require" type="checkbox" value="1"/>필수</label>
                            </div>
                          </td>
                          <td class="col-md-2 col-sm-2 col-xs-2">
                            <input value="<?php echo $option->item_option_name; ?>"
                                   class="form-control item-option-name" name="item_option_name" type="text" placeholder="옵션명"/>
                          </td>
                          <td class="col-md-8 col-sm-8 col-xs-8 item-option-val">
                            <?php foreach ($option->item_option_vals as $val) { ?>
                              <div class="col-md-12 col-sm-12 col-xs-12 item-option-val-detail">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                  <input value="<?php echo $val->value; ?>" class="form-control item-option-value" name="item_option_value" type="text" placeholder="옵션" />
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                  <input value="<?php if ($val->price > 0) echo $val->price; ?>"
                                         class="form-control item-option-price" name="item_option_price" type="text" placeholder='추가가격' />
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                  <a href="javascript:void(0);" onclick="move_option_val($(this),'up');"><span class="fa fa-caret-up"></span></a>
                                  <a href="javascript:void(0);" onclick="move_option_val($(this),'down');"><span class="fa fa-caret-down"></span></a>
                                  <a href="javascript:void(0);" onclick="del_option_val($(this));"><span class="fa fa-times"></span></a>
                                </div>
                              </div>
                            <?php } ?>
                          </td>
                        </tr>
                        <?php $option_idx++; } ?>
                      <?php foreach ($product_data->item_option_others as $option) { ?>
                        <tr id="item-option-row-<?php echo $option_idx; ?>">
                          <td class="col-md-2 col-sm-2 col-xs-2 item-option-header">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <a href="javascript:void(0);" onclick="move_option($(this),'up');"><span class="fa fa-caret-up"></span></a>
                              <a href="javascript:void(0);" onclick="move_option($(this),'down');"><span class="fa fa-caret-down"></span></a>
                              <a href="javascript:void(0);" onclick="add_option_val($(this));"><span class="fa fa-plus"></span></a>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <label style="text-align:left">
                                <input <?php if ($option->item_option_require == true) echo 'checked'; ?>
                                  class="form-checkbox item-require" name="item_require" type="checkbox" value="1"/>필수</label>
                            </div>
                          </td>
                          <td class="col-md-2 col-sm-2 col-xs-2">
                            <input value="<?php echo $option->item_option_name; ?>"
                                   class="form-control item-option-name" name="item_option_name" type="text" placeholder="옵션명"/>
                          </td>
                          <td class="col-md-8 col-sm-8 col-xs-8 item-option-val">
                            <?php foreach ($option->item_option_vals as $val) { ?>
                              <div class="col-md-12 col-sm-12 col-xs-12 item-option-val-detail">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                  <input value="<?php echo $val->value; ?>"
                                         class="form-control item-option-value" name="item_option_value" type="text" placeholder="옵션" />
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                  <input value="<?php if ($val->price > 0) echo $val->price; ?>"
                                    class="form-control item-option-price" name="item_option_price" type="text" placeholder='추가가격' />
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                  <a href="javascript:void(0);" onclick="move_option_val($(this),'up');"><span class="fa fa-caret-up"></span></a>
                                  <a href="javascript:void(0);" onclick="move_option_val($(this),'down');"><span class="fa fa-caret-down"></span></a>
                                  <a href="javascript:void(0);" onclick="del_option_val($(this));"><span class="fa fa-times"></span></a>
                                </div>
                              </div>
                            <?php } ?>
                          </td>
                        </tr>
                        <?php $option_idx++; } ?>
                    <?php } ?>
                    </tbody>
                  </table>
                </td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-bordered">
          <div class="panel-heading">
            <h3 class="panel-title">
              상품이미지
              <span class="col-md-1 col-sm-1 col-xs-1 pull-right">
                <button class="shipping-info-save btn-info" onclick="add_item_image();" style="line-height:32px; width:100%; height:32px; font-size: 14px">추가</button>
              </span>
            </h3>
          </div>
          <div class="panel-body">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="col-md-2 col-sm-2 col-xs-2"></div>
              <div class="col-md-10 col-sm-10 col-xs-10">
                <p>- 권장사이즈 : 가로 800px * 세로 800px (정사각형) </p>
                <p>- 이미지가 잘리거나 비정상적으로 보여질 수 있으므로, 권장사이즈를 준수하여 주시기 바랍니다.</p>
                <p>- 대표이미지는 필수 1장 - 최대 5장까지 등록 가능합니다.</p>
              </div>
            </div>
            <table class="col-md-12 col-sm-12 col-xs-12" id="item-image-table">
              <tbody>
              <?php if ($edit) { ?>
                <tr>
                  <th class="col-md-2 col-sm-2 col-xs-2 item-image-header">필수이미지<span class="required">*</span></th>
                  <td class="col-md-6 col-sm-6 col-xs-6">
                    <input class='form-control item-image' data-target="<?php echo $product_data->item_image_url_0 ; ?>"
                           onchange="preview(this);" name="item_image[]" type="file"
                           value="<?php echo $product_data->item_image_url_0; ?>" />
                  </td>
                  <th class="col-md-2 col-sm-2 col-xs-2">
                    <span class="preview-img" >
                      <div style='float:left;border:4px solid #303641;padding:5px;margin:5px;'>
                        <img height='50' width='50' src='<?php echo $product_data->item_image_url_0; ?>'>
                      </div>
                    </span>
                  </th>
                  <th class="col-md-2 col-sm-2 col-xs-2">
                    <!--                  <span class="fa fa-times" onclick="del_item_image($(this));"></span>-->
                  </th>
                  <?php for ($i = 1; $i < $product_data->item_image_count; $i++) {
                    $item_image_url = 'item_image_url_'.$i;
                    ?>
                  <tr>
                  <th class="col-md-2 col-sm-2 col-xs-2 item-image-header">추가이미지<span class="required">*</span></th>
                  <td class="col-md-6 col-sm-6 col-xs-6">
                    <input class='form-control item-image' data-target="<?php echo $product_data->{$item_image_url}; ?>"
                           onchange="preview(this);" name="item_image[]" type="file"
                           value="<?php echo $product_data->{$item_image_url}; ?>" />
                  </td>
                  <th class="col-md-2 col-sm-2 col-xs-2">
                    <span class="preview-img" >
                      <div style='float:left;border:4px solid #303641;padding:5px;margin:5px;'>
                        <img height='50' width='50' src='<?php echo $product_data->{$item_image_url}; ?>'>
                      </div>
                    </span>
                  </th>
                  <th class="col-md-2 col-sm-2 col-xs-2">
                    <span class="fa fa-times" onclick="del_item_image($(this));"></span>
                  </th>
                  <?php } ?>
                </tr>
              <?php } else { ?>
                <tr>
                  <th class="col-md-2 col-sm-2 col-xs-2 item-image-header">필수이미지<span class="required">*</span></th>
                  <td class="col-md-6 col-sm-6 col-xs-6" data-target="addition">
                    <input class='form-control item-image' data-target="empty" onchange="preview(this);" name="item_image[]" type="file" value="" />
                  </td>
                  <th class="col-md-2 col-sm-2 col-xs-2">
                    <span class="preview-img" >
                    </span>
                  </th>
                  <th class="col-md-2 col-sm-2 col-xs-2">
                    <!--                  <span class="fa fa-times" onclick="del_item_image($(this));"></span>-->
                  </th>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-bordered">
          <div class="panel-heading">
            <h3 class="panel-title item-desc-header">상품상세페이지</h3>
          </div>
          <div class="panel-body">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <!-- <p>- 화면(에디터) 크기는 모바일 환경에 맞도록 고정(가로 400px) 되어있습니다. </p>-->
              <p>- 권장 이미지 사이즈 : 가로 800px </p>
              <p>- 이미지가 비정상적으로 보여질 수 있으므로, 권장사이즈를 준수하여 주시기 바랍니다.</p>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12" style="width: 600px">
              <?php if ($edit) { ?>
                <textarea class="summernotes" id='summernotes' data-height="500" data-name="item-desc"><?php echo $product_data->item_desc; ?></textarea>
              <?php } else { ?>
                <textarea class="summernotes" id='summernotes' data-height="500" data-name="item-desc"></textarea>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-10 col-sm-10 col-xs-10"></div>
        <div class="col-md-2 col-sm-2 col-xs-2">
          <button class="item-info-save btn-dark" onclick="save_item(event);" style="line-height:32px; width:100%; height:32px; font-size: 14px">저장하기</button>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  let product_id = <?php echo $product_id; ?>;
  let item_option_cnt = <?php if ($edit) echo $product_data->item_option_requires_cnt + $product_data->item_option_others_cnt; else echo 0; ?>;
  let remain_item_option_cnt = <?php if ($edit) echo $product_data->item_option_requires_cnt + $product_data->item_option_others_cnt; else echo 0; ?>;
  
  function change_option(elem) {
    let action = elem.data('action');
  
    // console.log('--------------------');
    // console.log(action);
    // console.log(elem.is(':checked'));
  
    if (action === 'no_option') {
      if (elem.is(':checked') === true) {
        $('#item-has-option').prop('checked', false);
        $('#item-option-count option:eq(0)').prop('selected', true);
        $('#item-option-count').attr('disabled', true);
        $('#item-option-row').hide();
      } else {
        $('#item-has-option').prop('checked', true);
        $('#item-option-count option:eq(' + item_option_cnt + ')').prop('selected', true);
        $('#item-option-count').attr('disabled', false);
        $('#item-option-row').show();
      }
    } else {
      if (elem.is(':checked') === true) {
        $('#item-no-option').prop('checked', false);
        $('#item-option-count').attr('disabled', false);
        $('#item-option-count option:eq(' + item_option_cnt + ')').prop('selected', true);
        $('#item-option-row').show();
      } else {
        $('#item-no-option').prop('checked', true);
        $('#item-option-count option:eq(0)').prop('selected', true);
        $('#item-option-count').attr('disabled', true);
        $('#item-option-row').hide();
      }
    }
  }
  function add_option_val(elem) {
    var td = elem.closest('tr').find('td.item-option-val');
    var item_option_html = "<div class=\"col-md-12 col-sm-12 col-xs-12 item-option-val-detail\">" +
      "<div class=\"col-md-4 col-sm-4 col-xs-4\">" +
      "<input class=\"form-control item-option-value\" name=\"item_option_value\" type=\"text\" placeholder='옵션'/>" +
      "</div>" +
      "<div class=\"col-md-4 col-sm-4 col-xs-4\">" +
      "<input class=\"form-control item-option-price\" name=\"item_option_price\" type=\"text\" placeholder='추가가격' />" +
      "</div>" +
      "<div class=\"col-md-4 col-sm-4 col-xs-4\">" +
      "<a href=\"javascript:void(0);\" onclick=\"move_option_val($(this),'up');\" style=\"margin: 0 2px;\">" +
      "<span class=\"fa fa-caret-up\"></span></a>" +
      "<a href=\"javascript:void(0);\" onclick=\"move_option_val($(this),'down');\" style=\"margin: 0 2px;\">" +
      "<span class=\"fa fa-caret-down\"></span></a>" +
      "<a href=\"javascript:void(0);\" onclick=\"del_option_val($(this));\" style=\"margin: 0 2px;\">" +
      "<span class=\"fa fa-times\"></span></a>" +
      "</div>" +
      "</div>";
    td.append(item_option_html);
  }
  function set_option_html() {
    let option_count = $('#item-option-count').find('option:selected').val();
    if (item_option_cnt === option_count) {
      return false;
    }
    if (item_option_cnt < option_count) {
      let expand_cnt = (remain_item_option_cnt > option_count ? option_count : remain_item_option_cnt);
      for (let i = parseInt(item_option_cnt) + 1; i <= expand_cnt; i++) {
        $('#item-option-row-' + i).show();
      }
      for (let i = remain_item_option_cnt; i < option_count; i++) {
        let option_html = '<tr id="item-option-row-' + (parseInt(i)+1) + '"><td class="col-md-2 col-sm-2 col-xs-2 item-option-header"><div class="col-md-12 col-sm-12 col-xs-12">' +
          '<a href="javascript:void(0);" onclick="move_option($(this),\'up\');"><span class="fa fa-caret-up"></span></a>' +
          '<a href="javascript:void(0);" onclick="move_option($(this),\'down\');"><span class="fa fa-caret-down"></span></a>' +
          '<a href="javascript:void(0);" onclick="add_option_val($(this));"><span class="fa fa-plus"></span></a>' +
          '</div><div class="col-md-12 col-sm-12 col-xs-12"><label style="text-align:left">' +
          '<input class="form-checkbox item-require" name="item_require" type="checkbox" value="1"/>필수</label>' +
          '</div></td><td class="col-md-2 col-sm-2 col-xs-2">' +
          '<input class="form-control item-option-name" name="item_option_name" type="text" placeholder="옵션명"/>' +
          '</td><td class="col-md-8 col-sm-8 col-xs-8 item-option-val"><div class="col-md-12 col-sm-12 col-xs-12 item-option-val-detail"><div class="col-md-4 col-sm-4 col-xs-4">' +
          '<input class="form-control item-option-value" name="item_option_value" type="text" placeholder="옵션" />' +
          '</div>' +
          "<div class=\"col-md-4 col-sm-4 col-xs-4\">" +
          "<input class=\"form-control item-option-price\" name=\"item_option_price\" type=\"text\" placeholder='추가가격' />" +
          "</div>" +
          '<div class="col-md-4 col-sm-4 col-xs-4"><a href="javascript:void(0);" onclick="move_option_val($(this),\'up\');">' +
          '<span class="fa fa-caret-up"></span></a>' +
          '<a href="javascript:void(0);" onclick="move_option_val($(this),\'down\');"><span class="fa fa-caret-down"></span></a>' +
          '<a href="javascript:void(0);" onclick="del_option_val($(this));"><span class="fa fa-times"></span></a>' +
          '</div></div><div class="col-md-12 col-sm-12 col-xs-12 item-option-val-detail"><div class="col-md-4 col-sm-4 col-xs-4">' +
          '<input class="form-control item-option-value" name="item_option_value" type="text" placeholder="옵션" />' +
          '</div>' +
          "<div class=\"col-md-4 col-sm-4 col-xs-4\">" +
          "<input class=\"form-control item-option-price\" name=\"item_option_price\" type=\"text\" placeholder='추가가격' />" +
          "</div>" +
          '<div class="col-md-4 col-sm-4 col-xs-4"><a href="javascript:void(0);" onclick="move_option_val($(this),\'up\');">' +
          '<span class="fa fa-caret-up"></span></a>' +
          '<a href="javascript:void(0);" onclick="move_option_val($(this),\'down\');"><span class="fa fa-caret-down"></span></a>' +
          '<a href="javascript:void(0);" onclick="del_option_val($(this));"><span class="fa fa-times"></span></a>' +
          '</div></div></td></tr>';
        $('#item-option-row table tbody').append(option_html);
      }
    } else {
      for (let i = item_option_cnt; i > option_count; i--) {
        $('#item-option-row-' + i).hide();
      }
    }
    $('#item-option-row').show();
  
    item_option_cnt = option_count;
    if (item_option_cnt > remain_item_option_cnt) {
      remain_item_option_cnt = item_option_cnt;
    }
  }

  function move_option(elem,updown) {
    var tr = elem.parent().parent().parent();
    // console.log(tr);
    // console.log(updown);
    if (updown === 'up') {
      tr.prev().before(tr);
    } else {
      tr.next().after(tr);
    }
  }
  function move_option_val(elem,updown) {
    var div = elem.parent().parent();
    // console.log(div);
    // console.log(updown);
    // console.log(div.prev());
    // console.log(div.next());
    if (updown === 'up') {
      div.prev().before(div);
    } else {
      div.next().after(div);
    }
  }
  function del_option_val(elem) {
    var td = elem.closest('td');
    var div = elem.closest('div.item-option-val-detail');
    // console.log(elem);
    // console.log(td.children().length);
    // console.log(div);
    if (td.children().length > 1) {
      div.remove();
    }
  }
  function preview(input) {
    if (input.files && input.files[0]) {
      $("#previewImg").html('');
      $(input.files).each(function () {
        var reader = new FileReader();
        reader.readAsDataURL(this);
        reader.onload = function (e) {
          $(input).closest('tr').find('.preview-img div').remove();
          $(input).closest('tr').find('.preview-img').append("<div style='float:left;border:4px solid #303641;padding:5px;margin:5px;'>" +
            "<img height='50' width='50' src='" + e.target.result + "'></div>");
          $(input).data('target', 'file');
        }
      });
    }
  }

  let item_image_count = <?php if ($edit) { echo $product_data->item_image_count - 1; } else { echo 0; } ?>;
  function add_item_image() {
    // console.log(item_image_count);
    if (item_image_count >= 5) {
      alert('최대 5장까지 이미지 추가 가능합니다.');
      return false;
    }
    $('#item-image-table').append('<tr>' +
      '<th class="col-md-2 col-sm-2 col-xs-2">추가이미지</th><td class="col-md-6">' +
      '<input class="form-control item-image" data-target="empty" onchange="preview(this);" name="item_image[]" type="file" value="" />' +
      '</td><th class="col-md-2 col-sm-2 col-xs-2"><span class="preview-img"></span>' +
      '</th><th class="col-md-2 col-sm-2 col-xs-2"><span class="fa fa-times" onclick="del_item_image($(this));"></span>' +
      '</th></tr>'
    );
    item_image_count += 1;
    // console.log(item_image_count);
  }
  function del_item_image(elem) {
    // console.log(elem);
    elem.closest('tr').remove();
    item_image_count -= 1;
    console.log(item_image_count);
  }
  function set_summer(){
    $('#summernotes').each(function() {
      var now = $(this);
      var h = now.data('height');
      var n = now.data('name');
      // $(this).closest('div').append('<input type="hidden" class="val" name="description">');
      now.closest('div').append('<input type="hidden" class="val" name="'+n+'">');

      $('#summernotes').summernote({
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['fontsize', ['fontsize']],
          // ['fontname', ['fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']], // 추가
          ['insert', ['link', 'picture', 'video']], // 추가
          // ['view', ['codeview', 'help']],
          // ['view', ['fullscreen', 'codeview', 'help']],
        ],
        // fontNames: ['Noto Sans KR', 'Quicksand', 'Patua One'],
        height: h,
        lang: "ko-KR",
        dialogsInBody: true,
        dialogsFade: true,
        disableDragAndDrop: false,
        callbacks: {
          onImageUpload : function(files) {
            // console.log('image upload:', files);
            for (var i = 0; i < files.length; i++) {
              sendFile(files[i]);
            }
          },
          onChange: function(contents, $editable) {
            // console.log('onChange:', contents, $editable);
            now.closest('div').find('.val').val(now.summernote('code'));
          }
          // onMediaDelete : function(target) {
          //   // console.log('delete');
          //   deleteImage(target[0].src);
          // },
        },
      });
      <?php if ($edit) {?>
      now.closest('div').find('.val').val('<?php echo $product_data->item_desc; ?>');
      <?php } else { ?>
      now.closest('div').find('.val').val('');
      <?php } ?>
      // console.log(now.closest('div').find('.val').val());
      // now.closest('div').find('.val').val(now.summernote('code'));
      // console.log($('#summernotes').summernote('fullscreen.isFullscreen'));
    });
  }

  // summernote.image.upload
  function sendFile(file) {
    var upload_path = '<?php echo IMG_WEB_PATH_SHOP; ?>';
    var data = new FormData();
    data.append("file", file);
    // console.log('image upload:', file);
    // console.log(data);
    $('#loading_set').show();
    $.ajax({
      url: "<?php echo base_url() . 'shop/product/upload_image/'; ?>" + product_id,
      data: data,
      cache: false,
      contentType: false,
      enctype: 'multipart/form-data',
      processData: false,
      type: 'POST',
      success: function(data){
        $("#loading_set").fadeOut(500);
        // console.log(data);
        var obj = JSON.parse(data);
        if (obj.success) {
          // var image = $('<img>').attr('src', '' + obj.save_url); // 에디터에 img 태그로 저장
          // alert(obj.save_url);
          // $('.summernotes').summernote("insertNode", image[0]); // summernote 에디터에 img 태그를 보여줌
          $('#summernotes').summernote("insertImage", upload_path + obj.filename);
          $('.note-editable').keyup();
        } else {
          switch(parseInt(obj.error)) {
            case 1: alert('업로드 용량 제한에 걸렸습니다.'); break;
            case 2: alert('MAX_FILE_SIZE 보다 큰 파일은 업로드할 수 없습니다.'); break;
            case 3: alert('파일이 일부분만 전송되었습니다.'); break;
            case 4: alert('파일이 전송되지 않았습니다.'); break;
            case 6: alert('임시 폴더가 없습니다.'); break;
            case 7: alert('파일 쓰기 실패'); break;
            case 8: alert('알수 없는 오류입니다.'); break;
            case 100: alert('허용된 파일이 아닙니다.'); break;
            case 101: alert('0 byte 파일은 업로드할 수 없습니다.'); break;
          }
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus+" "+errorThrown);
      }
    });
  };
  $('.note-editable').keyup(function(e) {
    // $(this).css('height', 'auto' );
    // $(this).height(this.scrollHeight);
    $(this).scrollTop(this.scrollHeight);
  });
  function get_product_category(elem) {
    var cat_code = elem.find('option:selected').val();
    var cat_level = elem.data('id') + 1;

    // console.log(cat_code);
    // console.log(cat_level);

    if (cat_code === '0') {
      $('#item-noti-info').html('');
      return false;
    }

    if (cat_level <= 3) {
      $('#loading_set').show();
      $('.shop-category-' + cat_level).load('<?php echo base_url(); ?>shop/product/category?cat_level=' + cat_level + '&cat_code=' + cat_code);
      $("#loading_set").fadeOut(500);
    }

    if (cat_level === 2) {
      $('.shop-category-3').html('<select class="form-control" onchange="get_product_category($(this));" data-id="3"><option value="0">소분류</option></select>');
    }
    
    if (elem.data('id') === 3) { // 소분류 선택시
     
      // console.log(elem.data('id'));
      <?php if (!$edit) { ?>
      $('#item-noti-info').load('<?php echo base_url(); ?>shop/product/noti_info?cat_code=' + cat_code);
      <?php } ?>
      
      $('#loading_set').show();
      $.ajax({
        url: "<?php echo base_url() . 'shop/product/kc_cert_info?cat_code='?>" + cat_code,
        type: 'GET',
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
          $("#loading_set").fadeOut(500);
          var obj = JSON.parse(data);
          // console.log(obj);
          // if (obj.need_noti === true) {
          //   $('#item-noti-info').attr('disabled', false);
          //   $('#item-noti-info').val(obj.noti_info);
          // } else {
          //   $('#item-noti-info').attr('disabled', true);
          // }
          // console.log($('#item-noti-info').is(':disabled'));
          if (obj.need_kc_cert === true) {
            $('#item-kc-cert-number').attr('disabled', false);
            $('#item-cert-name').attr('disabled', false);
            $('#item-model-name').attr('disabled', false);
            $('#item-manufacturer-name').attr('disabled', false);
            $('#item-importer-name').attr('disabled', false);
          } else {
            $('#item-kc-cert-number').attr('disabled', true);
            $('#item-cert-name').attr('disabled', true);
            $('#item-model-name').attr('disabled', true);
            $('#item-manufacturer-name').attr('disabled', true);
            $('#item-importer-name').attr('disabled', true);
          }
          // console.log($('#item-kc-cert-number').is(':disabled'));

        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus+" "+errorThrown);
        }
      });
    } else {
      // console.log(elem.data('id'));
      $('#item-').value = '';
      $('#item-kc-cert-number').value = '';
      $('#item-cert-name').value = '';
      $('#item-model-name').value = '';
      $('#item-manufacturer-name').value = '';
      $('#item-importer-name').value = '';
      // $('#item-noti-info').attr('disabled', true);
      $('#item-kc-cert-number').attr('disabled', true);
      $('#item-cert-name').attr('disabled', true);
      $('#item-model-name').attr('disabled', true);
      $('#item-manufacturer-name').attr('disabled', true);
      $('#item-importer-name').attr('disabled', true);
    }
  }

  function change_attention_point(elem) {
    var val = elem.find('option:selected').val();
    if (val === '1') {
      elem.closest('tr').find('input').attr('disabled', false);
    } else {
      elem.closest('tr').find('input').attr('disabled', true);
    }
  }

  function get_price_str(p) {
    return p.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }

  function get_price_int(p) {
    return parseInt(p.replace(/,/g,""));
  }

  function change_general_price() {
    var commission_rate = <?php echo $shop_data->commission_rate; ?>;
    var general_price = get_price_int($('#item-general-price').val());
    var sell_price = get_price_int($('#item-sell-price').val());
    var discount_rate = $('#item-discount-rate').find('option:selected').val();

    sell_price = parseInt(general_price * (100 - discount_rate) / 10000) * 100;

    if (discount_rate >= 10 && discount_rate < 15) {
      commission_rate -= 1;
    } else if (discount_rate >= 15 && discount_rate < 20) {
      commission_rate -= 2;
    } else if (discount_rate >= 20 && discount_rate < 25) {
      commission_rate -= 3;
    } else if (discount_rate >= 25 && discount_rate < 30) {
      commission_rate -= 4;
    } else if (discount_rate >= 30) {
      commission_rate -= 5;
    }

    var supply_price = sell_price * ((100 - commission_rate) / 100);

    // console.log('--------------------');
    // console.log(commission_rate);
    // console.log(general_price);
    // console.log(sell_price);
    // console.log(discount_rate);
    // console.log(supply_price);

    $('#item-general-price').val(get_price_str(general_price));
    $('#item-sell-price').val(get_price_str(sell_price));
    $('#item-margin').val(commission_rate + '%');
    $('#item-supply-price').val(get_price_str(parseInt(supply_price/100) * 100));
  }

  function change_discount_rate() {
    change_general_price();
  }

  function save_item(e) {
    e.preventDefault();

    var item_cat_1 = $('#item-cat-1').find('option:selected').val();
    var item_cat_2 = $('#item-cat-2').find('option:selected').val();
    var item_cat_3 = $('#item-cat-3').find('option:selected').val();
    var item_name = $('#item-name').val();
    var item_type = $('#item-type').find('option:selected').val();
    var item_tax = $('#item-tax').find('option:selected').val();
    var item_shipping_days = $('#item-shipping-days').find('option:selected').val();
    var item_shipping_free = $('#item-shipping-free').find('option:selected').val();
    var item_base_info = $('#item-base-info').val();
    var item_attention_point_select = $('#item-attention-point-select').find('option:selected').val();
    var item_attention_point = $('#item-attention-point').val();
    var order_attention_point_select = $('#order-attention-point-select').find('option:selected').val();
    var order_attention_point = $('#order-attention-point').val();
    var shipping_attention_point_select = $('#shipping-attention-point-select').find('option:selected').val();
    var shipping_attention_point = $('#shipping-attention-point').val();
    var item_cert_disabled = $('#item-kc-cert-number').is(':disabled');
    var item_kc_cert_number = $('#item-kc-cert-number').val();
    var item_cert_name = $('#item-cert-name').val();
    var item_model_name = $('#item-model-name').val();
    var item_manufacturer_name = $('#item-manufacturer-name').val();
    var item_importer_name = $('#item-importer-name').val();
    var item_general_price = get_price_int($('#item-general-price').val());
    var item_sell_price = get_price_int($('#item-sell-price').val());
    var item_margin = $('#item-margin').val();
    var item_discount_rate = $('#item-discount-rate').find('option:selected').val();
    var item_supply_price = get_price_int($('#item-supply-price').val());
    var item_option_checked = $('#item-has-option').is(':checked');
    var item_option_count = parseInt($('#item-option-count').find('option:selected').val());
    var item_desc = $('#summernotes').closest('div').find('.val').val();
    var purchase_max_cnt = $('#purchase-max-cnt').val();
    var bundle_shipping_cnt = $('#bundle-shipping-cnt').val();

    $('.item-cat-header').removeClass('header-required');
    $('.item-name-header').removeClass('header-required');
    $('.item-type-header').removeClass('header-required');
    $('.item-tax-header').removeClass('header-required');
    $('.item-shipping-days-header').removeClass('header-required');
    $('.item-shipping-free-header').removeClass('header-required');
    $('.item-base-info-header').removeClass('header-required');
    $('.item-attention-point-header').removeClass('header-required');
    $('.order-attention-point-header').removeClass('header-required');
    $('.shipping-attention-point-header').removeClass('header-required');
    $('.item-noti-info-header').removeClass('header-required');
    $('.item-cert-header').removeClass('header-required');
    $('.item-general-price-header').removeClass('header-required');
    $('.item-discount-rate-header').removeClass('header-required');
    $('.item-margin-header').removeClass('header-required');
    $('.item-supply-price-header').removeClass('header-required');
    $('.item-option-base-header').removeClass('header-required');
    $('.item-option-header').removeClass('header-required');
    $('.item-image-header').removeClass('header-required');
    $('.item-desc-header').removeClass('header-required');

    if (item_cat_1 === '0' || item_cat_2 === '0' || item_cat_3 === '0') {
      alert('진열카테고리를 정확히 입력해주세요.');
      $('.item-cat-header').addClass('header-required');
      return false;
    }
    if (item_name === '') {
      alert('상품명 정확히 입력해주세요.');
      $('.item-name-header').addClass('header-required');
      return false;
    }
    if (item_type === '') {
      alert('상품유형을 정확히 입력해주세요.');
      $('.item-type-header').addClass('header-required');
      return false;
    }
    if (item_tax === '') {
      alert('과세여부를 정확히 입력해주세요.');
      $('.item-tax-header').addClass('header-required');
      return false;
    }
    if (item_shipping_days === '') {
      alert('배송소요일을 정확히 입력해주세요.');
      $('.item-shipping-days-header').addClass('header-required');
      return false;
    }
    if (item_shipping_free === '') {
      alert('배송비유형을 정확히 입력해주세요.');
      $('.item-shipping-free-header').addClass('header-required');
      return false;
    }
    if (item_base_info === '') {
      alert('상품기본설명을 정확히 입력해주세요.');
      $('.item-base-info-header').addClass('header-required');
      return false;
    }
    if (item_attention_point_select === '1' && item_attention_point === '') {
      alert('상품유의사항을 정확히 입력해주세요.');
      $('.item-attention-point-header').addClass('header-required');
      return false;
    }
    if (order_attention_point_select === '1' && order_attention_point === '') {
      alert('주문유의사항을 정확히 입력해주세요.');
      $('.order-attention-point-header').addClass('header-required');
      return false;
    }
    if (shipping_attention_point_select === '1' && shipping_attention_point === '') {
      alert('배송유의사항을 정확히 입력해주세요.');
      $('.shipping-attention-point-header').addClass('header-required');
      return false;
    }
  
    var item_noti_info_need = false;
    // var item_noti_info = $('#item-noti-info').val().replace(/\r\n|\r|\n/g,"<br />");
    var item_noti_info = [];
    var ret = true;
  
    $.each($('#item-noti-info').find('.noti-info'), function(index,item) {
      var field = $(item).find('#noti-field-' + index);
      var info = $(item).find('#noti-info-' + index);
      var noti_field_id = field.data('id');
      var noti_field = trim(field.text());
      var noti_info = trim(info.val());
    
      if (noti_info === '') {
        alert('상품고시정보를 정확히 입력해주세요.');
        $('.item-noti-info-header').addClass('header-required');
        ret = false;
        return false;
      }
      
      item_noti_info[index] = Object();
      item_noti_info[index].noti_field_id = noti_field_id;
      item_noti_info[index].noti_field = noti_field;
      item_noti_info[index].noti_info = noti_info;
  
      // console.log(index);
      // console.log(item);
      // console.log(noti_field_id);
      // console.log(noti_field);
      // console.log(noti_info);
      // console.log(item_noti_info);
      
      ret = true;
      item_noti_info_need = true;
    });
    
    if (ret === false) {
      return false;
    }
  
    if (item_cert_disabled === false && (item_kc_cert_number === '' || item_cert_name === '' || item_model_name === '' || (item_manufacturer_name === '' && item_importer_name === ''))) {
      alert('인증정보를 정확히 입력해주세요.');
      $('.item-cert-header').addClass('header-required');
      return false;
    }
    if (item_general_price === '' || item_general_price === '0') {
      alert('정상가를 정확히 입력해주세요.');
      $('.item-general-price-header').addClass('header-required');
      return false;
    }
    if (purchase_max_cnt === '' || purchase_max_cnt === '0') {
      alert('구매최대갯수를 정확히 입력해주세요.');
      $('.item-option-base-header').addClass('header-required');
      return false;
    }
    if (bundle_shipping_cnt === '' || bundle_shipping_cnt === '0') {
      alert('묶음배송갯수를 정확히 입력해주세요.');
      $('.item-option-base-header').addClass('header-required');
      return false;
    }
    // if (item_sell_price === '' || item_sell_price === '0') {
    //   alert('판매가를 정확히 입력해주세요.');
    //   $('.item-sell-price-header').addClass('header-required');
    //   return false;
    // }
    // if (item_margin === '') {
    //   alert('마진율을 정확히 입력해주세요.');
    //   $('.item-margin-header').addClass('header-required');
    //   return false;
    // }
    // if (item_supply_price === '' || item_supply_price === '0') {
    //   alert('공급가를 정확히 입력해주세요.');
    //   $('.item-supply-price-header').addClass('header-required');
    //   return false;
    // }
    if (item_option_checked === true && item_option_count === 0) {
      alert('옵션여부를 정확히 입력해주세요.');
      $('.item-option-header').addClass('header-required');
      return false;
    }
  
    var item_option_requires = Array();
    var item_option_others = Array();
    var item_option_requires_cnt = 0;
    var item_option_others_cnt = 0;
    
    ret = true;
    if (item_option_checked === true) {
      $.each($('#item-option-row').find('tbody').find('tr'), function(index,item) {

        // console.log(index);
        // console.log($(item).css('display'));
  
        if (index >= item_option_count) {
          return false;
        } else {
          if ($(item).find('.item-option-name').val() === '') {
            alert('옵션명을 정확히 입력해 주세요.');
            $('.item-option-header').addClass('header-required');
            ret = false;
            return false;
          }
          if ($(item).find('.item-require').is(':checked') === true) {
            item_option_requires[item_option_requires_cnt] = Object();
            item_option_requires[item_option_requires_cnt].idx = item_option_requires_cnt;
            item_option_requires[item_option_requires_cnt].item_option_require = $(item).find('.item-require').is(':checked');
            item_option_requires[item_option_requires_cnt].item_option_name = $(item).find('.item-option-name').val();
            item_option_requires[item_option_requires_cnt].item_option_vals = Array();
            $.each($(item).find('.item-option-val-detail'), function(idx, val) {
              if ($(val).find('.item-option-value').val() === '') {
                alert('옵션값을 정확히 입력해 주세요.');
                $('.item-option-header').addClass('header-required');
                ret = false;
                return false;
              }
              item_option_requires[item_option_requires_cnt].item_option_vals[idx] = Object();
              item_option_requires[item_option_requires_cnt].item_option_vals[idx].idx = idx;
              item_option_requires[item_option_requires_cnt].item_option_vals[idx].value = $(val).find('.item-option-value').val();
              item_option_requires[item_option_requires_cnt].item_option_vals[idx].price = $(val).find('.item-option-price').val();
              if (item_option_requires[item_option_requires_cnt].item_option_vals[idx].price === '') {
                item_option_requires[item_option_requires_cnt].item_option_vals[idx].price = 0;
              }
            });
            item_option_requires_cnt += 1;
          } else {
            item_option_others[item_option_others_cnt] = Object();
            item_option_others[item_option_others_cnt].idx = item_option_others_cnt;
            item_option_others[item_option_others_cnt].item_option_require = $(item).find('.item-require').is(':checked');
            item_option_others[item_option_others_cnt].item_option_name = $(item).find('.item-option-name').val();
            item_option_others[item_option_others_cnt].item_option_vals = Array();
            $.each($(item).find('.item-option-val-detail'), function(idx, val) {
              if ($(val).find('.item-option-value').val() === '') {
                alert('옵션값을 정확히 입력해 주세요.');
                $('.item-option-header').addClass('header-required');
                ret = false;
                return false;
              }
              item_option_others[item_option_others_cnt].item_option_vals[idx] = Object();
              item_option_others[item_option_others_cnt].item_option_vals[idx].idx = idx;
              item_option_others[item_option_others_cnt].item_option_vals[idx].value = $(val).find('.item-option-value').val();
              item_option_others[item_option_others_cnt].item_option_vals[idx].price = $(val).find('.item-option-price').val();
              if (item_option_others[item_option_others_cnt].item_option_vals[idx].price === '') {
                item_option_others[item_option_others_cnt].item_option_vals[idx].price = 0;
              }
            });
            item_option_others_cnt += 1;
          }
        }
      });
    }
    if (ret === false) {
      return false;
    }

    var item_image_files = Array();
    var item_image_file_count = 0;
    $.each($('#item-image-table').find('input.item-image'), function(idx,file){
      if (idx === 0 && $(file).data('target') === 'empty') {
        alert('필수이미지는 꼭 첨부해주세요.');
        $('.item-image-header').addClass('header-required');
        ret = false;
        return false;
      }
      if ($(file).data('target') === 'file') {
        item_image_files[item_image_file_count] = $(file)[0].files[0];
        item_image_file_count += 1;
      } else if ($(file).data('target') !== 'empty') {
        item_image_files[item_image_file_count] = $(file).data('target');
        item_image_file_count += 1;
      } else {
        // empty file
      }
      // console.log('item_image_file_count : ' + item_image_file_count);
      // console.log('data-target : ' + $(file).data('target'));
      // console.log('val : ' + $(file).val());
    });
    if (ret === false) {
      return false;
    }

    // console.log(item_image_files);
    // console.log(item_desc);

    if (item_desc === '') {
      alert('상품상세페이지를 정확히 입력해주세요.');
      $('.item-desc-header').addClass('header-required');
      return false;
    }
  
    $('#loading_set').show();
    
    let formData = new FormData();
    formData.append('product_id', product_id);
    formData.append('item_name', item_name);
    formData.append('item_cat', item_cat_3);
    formData.append('item_type', item_type);
    formData.append('item_tax', item_tax);
    formData.append('item_shipping_days', item_shipping_days);
    formData.append('item_shipping_free', item_shipping_free);
    formData.append('item_base_info', item_base_info);
    formData.append('item_attention_point_select', item_attention_point_select);
    formData.append('item_attention_point', item_attention_point);
    formData.append('order_attention_point_select', order_attention_point_select);
    formData.append('order_attention_point', order_attention_point);
    formData.append('shipping_attention_point_select', shipping_attention_point_select);
    formData.append('shipping_attention_point', shipping_attention_point);
    formData.append('item_noti_info_need', item_noti_info_need === true ? '1' : '0');
    formData.append('item_noti_info', JSON.stringify(item_noti_info));
    formData.append('item_cert_disabled', item_cert_disabled === true ? '0' : '1');
    formData.append('item_kc_cert_number', item_kc_cert_number);
    formData.append('item_cert_name', item_cert_name);
    formData.append('item_model_name', item_model_name);
    formData.append('item_manufacturer_name', item_manufacturer_name);
    formData.append('item_importer_name', item_importer_name);
    formData.append('item_general_price', item_general_price.toString());
    formData.append('item_sell_price', item_sell_price.toString());
    formData.append('item_discount_rate', item_discount_rate);
    formData.append('item_margin', item_margin.substring(0,item_margin.length-1));
    formData.append('item_supply_price', item_supply_price.toString());
    formData.append('item_option_requires_cnt', item_option_requires_cnt);
    formData.append('item_option_requires', JSON.stringify(item_option_requires));
    formData.append('item_option_others_cnt', item_option_others_cnt);
    formData.append('item_option_others', JSON.stringify(item_option_others));
    formData.append('item_image_file_count', item_image_file_count);
    for (let i = 0; i < item_image_file_count; i++) {
      formData.append('item_image_file_' + i, item_image_files[i]);
    }
    formData.append('item_desc', item_desc);
    formData.append('purchase_max_cnt', purchase_max_cnt);
    formData.append('bundle_shipping_cnt', bundle_shipping_cnt);
    
    // console.log(item_option_requires_cnt);
    // console.log(item_option_requires);
    // console.log(item_option_others_cnt);
    // console.log(item_option_others);
  
    // $("#loading_set").fadeOut(500);
    // return false;

    $.ajax({
      url: '<?php echo base_url()."shop/product/do_register/$edit"; ?>', // form action url
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        $("#loading_set").fadeOut(500);
        // console.log(data);
        if (data === 'done' || data.search('done') !== -1) {
          $.notify({
            message: '저장되었습니다.',
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
          setTimeout(function(){location.href='<?php echo base_url(); ?>shop/product';}, 1000);
        } else {
          var title = '<strong>실패하였습니다</strong>';
          $.notify({
            title: title,
            message: data,
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
      error: function (e) {
        console.log(e)
      }
    });

  }

  $(document).ready(function(){
    set_summer();
    if (item_option_cnt > 0) {
      $('#item-option-row').show();
    } else {
      $('#item-option-row').hide();
    }
    <?php if ($edit) { ?>
    $('#item-noti-info').load('<?php echo base_url()."shop/product/noti_info?edit=&cat_code={$product_data->item_cat}&id={$product_data->product_id}"; ?>');
    <?php } ?>
  });
</script>
