<?php
$status_str = $this->crud_model->get_product_status_str($product->status);
?>
<style>
  table tbody tr th {
    width: 20%;
    text-align: right;
  }
  table tbody tr td {
    width: 80%;
    text-align: left;
  }
  .custom_td img, .custom_td iframe {
    width: 100% !important;
    height: auto !important;
  }
</style>
<div id="content-container" style="padding-top:0px !important;">
  <div class="text-center pad-all">
    <div class="pad-ver">
      <img class="img-sm img-border" src="<?php echo $product->item_image_url_0; ?>" alt="">
    </div>
    <h4 class="text-lg text-overflow mar-no"><?php echo $product->item_name; ?></h4>
    <p class="text-sm"><?php echo $product->item_base_info; ?></p>
    <div class="pad-ver btn-group">
      <button class="btn <?php echo ($status_str === '승인요청' ? 'btn-success' : 'btn-danger'); ?>">
        <?php echo $status_str; ?></button>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="panel-body">
        <table class="table table-striped" style="border-radius:3px;">
          <tbody>
          <tr>
            <th class="custom_td">브랜드명</th>
            <td class="custom_td"><?php echo $product->shop_name; ?></td>
          </tr>
          <tr>
            <th class="custom_td">상품코드</th>
            <td class="custom_td"><?php echo $product->product_code; ?></td>
          </tr>
          <tr>
            <th class="custom_td">카테고리</th>
            <td class="custom_td"><?php echo $product->item_cat; ?></td>
          </tr>
<!--          <tr>-->
<!--            <th class="custom_td">상품기본설명</th>-->
<!--            <td class="custom_td">--><?php //echo $product->item_base_info; ?><!--</td>-->
<!--          </tr>-->
          <tr>
            <th class="custom_td">상품유형</th>
            <td class="custom_td"><?php echo $this->crud_model->get_product_item_type_str($product->item_type); ?></td>
          </tr>
          <tr>
            <th class="custom_td">과세여부</th>
            <td class="custom_td"><?php echo $this->crud_model->get_product_item_tax_str($product->item_type); ?></td>
          </tr>
          <tr>
            <th class="custom_td">배송소요일</th>
            <td class="custom_td"><?php echo $this->crud_model->get_product_item_shipping_days_str($product->item_shipping_days); ?></td>
          </tr>
          <tr>
            <th class="custom_td">배송비유형</th>
            <td class="custom_td"><?php echo $this->crud_model->get_product_shipping_free_str($product->item_shipping_free); ?></td>
          </tr>
          <tr>
            <th class="custom_td">상품유의사항</th>
            <td class="custom_td"><?php echo $product->item_attention_point; ?></td>
          </tr>
          <tr>
            <th class="custom_td">주문유의사항</th>
            <td class="custom_td"><?php echo $product->order_attention_point; ?></td>
          </tr>
          <tr>
            <th class="custom_td">배송유의사항</th>
            <td class="custom_td"><?php echo $product->shipping_attention_point; ?></td>
          </tr>
          <tr>
            <th class="custom_td">상품고시정보</th>
            <td class="custom_td" id="item-noti-info"><?php echo $product->item_noti_info; ?></td>
          </tr>
          <tr>
            <th class="custom_td">인증정보</th>
            <td class="custom_td">
              <?php echo $product->item_cert_need ? $product->item_kc_cert_number.'/'.$product->item_cert_name.'/'.$product->item_model_name.'/'.$product->item_manufacturer_name.'/'.$product->item_importer_name : ''; ?>
            </td>
          </tr>
          <tr>
            <th class="custom_td">상품가격정보</th>
            <td class="custom_td">
              <?php echo '정상가:'.$this->crud_model->get_price_str($product->item_general_price).','; ?>
              <?php echo '판매가:'.$this->crud_model->get_price_str($product->item_sell_price).','; ?>
              <?php echo '마진율:'.$product->item_margin.'%,'; ?>
              <?php echo '공급가:'.$this->crud_model->get_price_str($product->item_supply_price).','; ?>
            </td>
          </tr>
          <tr>
            <th class="custom_td">옵션</th>
            <td class="custom_td"><?php echo $product->item_option_requires.'(필수),'.$product->item_option_others; ?></td>
          </tr>
          <tr>
            <th class="custom_td">등록일</th>
            <td class="custom_td"><?php echo $product->register_at; ?></td>
          </tr>
          <tr>
            <th class="custom_td">승인일자</th>
            <td class="custom_td"><?php echo ($product->status != SHOP_PRODUCT_STATUS_REQUEST ? $product->approval_at : ''); ?></td>
          </tr>
          <tr>
            <th class="custom_td">상품이미지(필수)</th>
            <td class="custom_td">
              <img class="img-lg img-border" src="<?php echo $product->item_image_url_0; ?>" alt="" style="width:400px;height: auto;">
            </td>
          </tr>
          <tr>
            <th class="custom_td">상품이미지1</th>
            <td class="custom_td">
              <img class="img-lg img-border" src="<?php echo $product->item_image_url_1; ?>" alt="" style="width:400px;height: auto;">
            </td>
          </tr>
          <tr>
            <th class="custom_td">상품이미지2</th>
            <td class="custom_td">
              <img class="img-lg img-border" src="<?php echo $product->item_image_url_2; ?>" alt="" style="width:400px;height: auto;">
            </td>
          </tr>
          <tr>
            <th class="custom_td">상품이미지3</th>
            <td class="custom_td">
              <img class="img-lg img-border" src="<?php echo $product->item_image_url_3; ?>" alt="" style="width:400px;height: auto;">
            </td>
          </tr>
          <tr>
            <th class="custom_td">상품이미지4</th>
            <td class="custom_td">
              <img class="img-lg img-border" src="<?php echo $product->item_image_url_4; ?>" alt="" style="width:400px;height: auto;">
            </td>
          </tr>
          <tr>
            <th class="custom_td">상품이미지5</th>
            <td class="custom_td">
              <img class="img-lg img-border" src="<?php echo $product->item_image_url_5; ?>" alt="" style="width:400px;height: auto;">
            </td>
          </tr>
          <tr>
            <th class="custom_td">상품상세페이지</th>
            <td class="custom_td"><?php echo $product->item_desc; ?></td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<style>
  .custom_td{
    border-left: 1px solid #ddd;
    border-right: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
  }
</style>
<script type="text/javascript">
  $(document).ready(function(){
    $('.enterer').hide();
    // postDesc('item-noti-info');
  });
</script>
