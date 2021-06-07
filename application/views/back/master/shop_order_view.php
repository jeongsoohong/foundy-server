<?php
$status_str = $this->shop_model->get_shipping_status_str($purchase_product->shipping_status);
?>
<div class="pop:type pop:frame frame:mail frame:item" style="display: block;">
  <button class="frame_close">
    <img src="<?= base_url(); ?>template/back/center/imgs/icon_close_black.png" alt="" width="12" height="12" style="opacity: 0.5;">
    <script>
      // .frame_close 클릭시 팝업창 닫기
      $(function(){
        $('#fd-itemStatus .frame_close').click(function(){
          $(this).closest('#fd-itemStatus').hide();
        })
      })
    </script>
  </button>
  <div class="cnt_btns confirm_btn" style="background-color: #fff;">
    <button class="btn_ok font-futura" style="width: 100%;">OK</button>
    <script>
      // .btn_ok 클릭시 팝업창 닫기
      $(function(){
        $('#fd-itemStatus .btn_ok').click(function(){
          $(this).closest('#fd-itemStatus').hide();
        })
      })
    </script>
  </div>
  <div class="frame_wrap">
    <div class="frame_tit">
      <p class="tit_name font-futura">order_info</p>
      <div class="tit_display">
        <span class="display_centerImg">
          <img src="<?php echo $product_info->item_image_url_0; ?>" alt="" width="46" height="46" class="span-img">
        </span>
        <p class="display-type">
          <span class="brandNaming"><?= $shop_info->shop_name; ?></span><br>
          <span class="type-name" style="padding: 0;"><?= $product_info->item_name; ?></span>
        </p>
        <? if ($purchase_product->shipping_status == SHOP_SHIPPING_STATUS_ORDER_CANCELED || $purchase_product->shipping_status == SHOP_SHIPPING_STATUS_PURCHASE_CANCELED) { ?>
          <div class="display-cpnStopped orderDisplay"><?= $status_str; ?></div>
        <? } else { ?>
          <div class="display-now"><?= $status_str; ?></div>
        <? } ?>
      </div>
      <div class="tit_table table_form:mail">
        <div class="table_scroll scroll-y" style="height: 299px;">
          <table class="mail_table">
            <colgroup>
              <col width="16%">
              <col width="84%">
            </colgroup>
            <tbody>
            <tr>
              <th>상품코드</th>
              <td class="order__code"><?= $product_info->product_code; ?></td>
            </tr>
            
            <tr>
              <th>상품명</th>
              <td class="order__itemName"><?= $product_info->item_name; ?></td>
            </tr>
            <tr>
              <th>상품이미지(필수)</th>
              <td class="view__regOrder">
                <img class="span-img" src="<?= $product_info->item_image_url_0; ?>" alt="상품이미지(필수)" style="width: 100%; height: auto;">
              </td>
            </tr>
            <tr>
              <th>주문정보</th>
              <td class="order__priceInfo">
                [가격] <?php echo $this->crud_model->get_price_str($purchase_product->total_balance - $purchase_product->discount).'원 = '; ?>
                <?php echo $this->crud_model->get_price_str($purchase_product->total_price); ?>원
                <?php echo '('.$this->crud_model->get_price_str($purchase_product->item_sell_price).'원*'.$purchase_product->total_purchase_cnt.'개) + '; ?>
                <?php echo $this->crud_model->get_price_str($purchase_product->total_shipping_fee).'원(배송비) -'; ?>
                <?php echo $this->crud_model->get_price_str($purchase_product->discount).'원(할인)'; ?>
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
              <th>구매번호</th>
              <td class="order__buyingNumber">
                <?php echo $purchase_info->purchase_code; ?>
              </td>
            </tr>
            <tr>
              <th>구매자정보</th>
              <td class="view__reg view__noticeInfo view__deliveryFee">
                [이름] <?php echo $purchase_info->sender_name; ?><br>
                [이메일] <?php echo $purchase_info->sender_email; ?><br>
                [연락처] <?php echo $purchase_info->sender_phone; ?>
              </td>
            </tr>
            <tr>
              <th>배송지정보</th>
              <td class="view__reg view__noticeInfo order__deliveryDestination">
                [받는분] <?php echo $purchase_info->receiver_name; ?><br>
                [연락처] <?php echo $purchase_info->receiver_phone_1.' / '.$purchase_info->receiver_phone_2; ?><br>
                [주소] <?php echo '('.$purchase_info->receiver_postcode.') '.$purchase_info->receiver_address_1.' '.$purchase_info->receiver_address_2; ?><br>
                [요청사항] <?php echo $purchase_info->receiver_req; ?>
              </td>
            </tr>
            <tr>
              <th>상태정보</th>
              <td class="view__reg view__noticeInfo order__steps">
                <?php foreach ($purchase_status as $status) {
                  echo '['.$status->modified_at.'] '.$status->shipping_status_code.'<br>';
                }?>
              </td>
            </tr>
            <!-- 배송정보는 배송중에만 나타나게 -->
            <?php if (empty($purchase_product->shipping_data) == false) {
            $shipping_data = json_decode($purchase_product->shipping_data);
            $shipping_company_name = $this->db->get_where('shipping_company', array('company_code' => $shipping_data->shipping_company))->row()->company_name;
            ?>
              <tr>
                <th>배송정보</th>
                <td class="view__deliveryAlert">
                  <?php echo '[송장정보] '.$shipping_company_name.'('.$shipping_data->shipping_code.') '; ?>
                  <a href="<?php echo base_url().'home/shop/shipping/search?id='.$purchase_product->purchase_product_id; ?>" target="_blank" style="color: #ad796d;font-weight: bold;display: inline-block;margin-left: 16px;">
                    배송조회
                  </a>
                </td>
              </tr>
            <? } ?>
            <!-- 취소정보는 주문취소/반품(중,완료) 정보 팝업에만 나타나게 -->
            <?php if ($purchase_product->canceled == 1) { ?>
              <tr>
                <th>취소정보</th>
                <td class="view__reg view__noticeInfo order__steps">
                  [취소가격] <?php echo $purchase_product->cancel_price; ?><br>
                  [취소사유] <?php echo $purchase_product->cancel_reason; ?>
                </td>
              </tr>
            <? } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
