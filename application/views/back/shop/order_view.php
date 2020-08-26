<?php
$status_str = $this->crud_model->get_shipping_status_str($purchase_product->shipping_status);
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
      <img class="img-sm img-border" src="<?php echo $product_info->item_image_url_0; ?>" alt="">
    </div>
    <h4 class="text-lg text-overflow mar-no"><?php echo $product_info->item_name; ?></h4>
    <p class="text-sm"><?php echo $product_info->item_base_info; ?></p>
    <div class="pad-ver btn-group">
      <button class="btn <?php if ($purchase_product->shipping_status == SHOP_SHIPPING_STATUS_ORDER_CANCELED  ||
        $purchase_product->shipping_status == SHOP_SHIPPING_STATUS_PURCHASE_CANCELING  ||
        $purchase_product->shipping_status == SHOP_SHIPPING_STATUS_PURCHASE_CANCELED) echo 'btn-danger';
      else  echo 'btn-success'; ?>">
        <?php echo $status_str; ?></button>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-sm-12">
      <div class="panel-body">
        <table class="table table-striped" style="border-radius:3px;">
          <tbody>
          <tr>
            <th class="custom_td">상품코드</th>
            <td class="custom_td"><?php echo $product_info->product_code; ?></td>
          </tr>
          <tr>
            <th class="custom_td">상품명</th>
            <td class="custom_td"><?php echo $product_info->item_name; ?></td>
          </tr>
          <tr>
            <th class="custom_td">상품이미지(필수)</th>
            <td class="custom_td">
              <img class="img-lg img-border" src="<?php echo $product_info->item_image_url_0; ?>" alt="" style="width:400px;height: auto;">
            </td>
          </tr>
          <tr>
            <th class="custom_td">주문정보</th>
            <td class="custom_td">
              [가격] <?php echo $this->crud_model->get_price_str($purchase_product->total_balance).'원 = '; ?>
              <?php echo $this->crud_model->get_price_str($purchase_product->total_price); ?>원
              <?php echo '('.$this->crud_model->get_price_str($purchase_product->item_sell_price).'원*'.$purchase_product->total_purchase_cnt.'개) + '; ?>
              <?php echo $this->crud_model->get_price_str($purchase_product->total_shipping_fee).'원(배송비)'; ?>
              <?php if ($purchase_product->total_additional_price > 0) echo ' + '.$this->crud_model->get_price_str($purchase_product->total_additional_price).'원(추가옵션)'; ?>
              <br>
              <?php if ($purchase_product->item_option_requires_cnt + $purchase_product->item_option_others_cnt > 0) {
                $purchase_product->item_option_requires = json_decode($purchase_product->item_option_requires);
                $purchase_product->item_option_others = json_decode($purchase_product->item_option_others);
                $opt_str = '[옵션] ';
                foreach ($purchase_product->item_option_requires as $opt) {
                  if ($opt->val != -1) {
                    $opt_str .= "($opt->name) $opt->option / ";
                  }
                }
                foreach ($purchase_product->item_option_others as $opt) {
                  if ($opt->val != -1) {
                    $opt_str .= "($opt->name) $opt->option / ";
                  }
                }
                echo $opt_str;
              } ?>
            </td>
          </tr>
          <tr>
            <th class="custom_td">구매번호</th>
            <td class="custom_td">
              <?php echo $purchase_info->purchase_code; ?>
            </td>
          </tr>
          <tr>
            <th class="custom_td">구매자정보</th>
            <td class="custom_td">
              [이름] <?php echo $purchase_info->sender_name; ?><br>
              [이메일] <?php echo $purchase_info->sender_email; ?><br>
              [연락처] <?php echo $purchase_info->sender_phone; ?>
            </td>
          </tr>
          <tr>
            <th class="custom_td">배송지정보</th>
            <td class="custom_td">
              [받는분] <?php echo $purchase_info->receiver_name; ?><br>
              [연락처] <?php echo $purchase_info->receiver_phone_1.' / '.$purchase_info->receiver_phone_2; ?><br>
              [주소] <?php echo '('.$purchase_info->receiver_postcode.') '.$purchase_info->receiver_address_1.' '.$purchase_info->receiver_address_2; ?><br>
              [요청사항] <?php echo $purchase_info->receiver_req; ?>
            </td>
          </tr>
          <tr>
            <th class="custom_td">상태정보</th>
            <td class="custom_td">
              <?php foreach ($purchase_status as $status) {
                echo '['.$status->modified_at.'] '.$status->shipping_status_code.'<br>';
              }?>
            </td>
          </tr>
          <?php if (empty($purchase_product->shipping_data) == false) {
            $shipping_data = json_decode($purchase_product->shipping_data);
            $shipping_company_name = $this->db->get_where('shipping_company', array('company_code' => $shipping_data->shipping_company))->row()->company_name;
            ?>
            <tr>
              <th class="custom_td">배송정보</th>
              <td class="custom_td">
                <?php echo '[송장정보] '.$shipping_company_name.'('.$shipping_data->shipping_code.') '; ?>
                <a href="<?php echo base_url().'home/shop/shipping/search?id='.$purchase_product->purchase_product_id; ?>" target="_blank" style="color: grey;">
                  배송조회
                </a>
              </td>
            </tr>
          <?php } ?>
          <?php if ($purchase_product->canceled == 1) { ?>
            <tr>
              <th class="custom_td">취소정보</th>
              <td class="custom_td">
                [취소가격] <?php echo $purchase_product->cancel_price; ?><br>
                [취소사유] <?php echo $purchase_product->cancel_reason; ?>
              </td>
            </tr>
          <?php } ?>
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
