<style>
  .order-complete-info {
    text-align: center;
  }
  .order-complete-info, .order-detail-info {
    width: 100%;
    padding: 10px 15px;
  }
  /*.order-detail-info {*/
  /*  display: flex;*/
  /*}*/
  .order-complete-btn a button {
    border-radius: 16px;
    padding: 10px !important;
    height: 32px;
    line-height: 12px;
    font-size: 12px
  }
  button.shopping{
    background-color: white;
    color: black;
  }
  button.order-list{
    background-color: black;
    color: white;
  }
  .purchase-content {
    width: 100%;
    padding-left: 0;
    padding-right: 0;
  }
  .cart-header, .sender-info-header, .receiver-info-header, .payment-info-header, .receiver-info-header {
    border-bottom: 1px solid #EAEAEA;
    height: 40px;
    line-height: 40px;
    /*display: flex;*/
  }
  .cart-item-all {
    border-bottom: 1px solid #EAEAEA;
    margin-bottom: 20px;
  }
  .cart-item {
    padding: 10px 0;
    display: flex;
    border-bottom: 1px solid #EAEAEA;
  }
  .cart-item-info {
    width: 60%;
  }
  .cart-item-image{
    width: 40%;
  }
  .cart-item-image img {
    width: 100%;
    height: auto;
  }
  .item-brand {
    color: saddlebrown;
  }
  .item-brand, .item-name, .item-price, .item-option, .item-purchase-cnt {
    font-size: 12px !important;
  }
  .item-option, .item-purchase-cnt {
    display: flex;
  }
  .cart-balance {
    width: 100%;
  }
  table {
    margin: 0;
    width: 100%;
    padding: 5px 0;
  }
  table tr th {
    padding: 5px 0;
    width: 30%;
    text-align: left;
  }
  table tr td {
    padding: 5px 5px;
    width: 70%;
    text-align: left;
  }
  .payment-info, .sender_info, .receiver-info {
    border-bottom: 1px solid #EAEAEA;
    margin-bottom: 20px;
  }
</style>
<section class="page-section">
  <div class="container">
    <div class="row">
      <?php if ($page_type == 'complete') {?>
        <div class="order-complete-info">
          <h4>주문이 완료되었습니다</h4>
          <h6>주문번호 : <span style="color:saddlebrown;"><?php echo $purchase_code; ?></span></h6>
          <div class="order-complete-btn">
            <a href="<?php echo base_url(); ?>home/shop/main">
              <button class="shopping" type="button">쇼핑 계속하기</button>
            </a>
            <a href="<?php echo base_url(); ?>home/shop/order">
              <button class="order-list" type="button">주문내역 보기</button>
            </a>
          </div>
        </div>
      <?php } else { ?>
        <div class="order-detail-info">
          <h6>주문번호 : <span style="color:saddlebrown;"><?php echo $purchase_code; ?></span><span class="pull-right"><u>주문취소</u></span></h6>

        </div>
      <?php }?>
    </div>
    <div class="purchase-content">
      <div class="cart-header">
        주문상품 정보
      </div>
      <div class="cart-item-all">
        <?php foreach ($purchase_items as $item) { ?>
          <div class="cart-item" data-id="<?php echo $item->purchase_product_id; ?>" data-price="<?php echo $item->item_sell_price; ?>" data-additional-price="<?php echo $item->total_additional_price;?>" data-shipping-fee="<?php echo $item->total_shipping_fee; ?>" data-purchase-cnt="<?php echo $item->total_purchase_cnt;?>">
            <div class="cart-item-info">
              <div class="item-name">
                <span class="item-brand"><?php echo $item->shop->shop_name.' '; ?></span><?php echo $item->product->item_name; ?>
              </div>
              <!--                <div class="item-name"></div>-->
              <div class="item-price" ><?php echo $this->crud_model->get_price_str($item->item_sell_price); ?>원</div>
              <div class="item-option" >
                <?php
                $opt_str = '';
                foreach ($item->item_option_requires as $opt) {
                  if ($opt->val != -1) {
                    $opt_str .= "[$opt->name]$opt->option / ";
                  }
                }
                foreach ($item->item_option_others as $opt) {
                  if ($opt->val != -1) {
                    $opt_str .= "[$opt->name]$opt->option / ";
                  }
                }
                $opt_str .= "수량 $item->total_purchase_cnt 개";
                echo $opt_str;
                ?>
              </div>
            </div>
            <div class="cart-item-image">
              <a href="<?php echo base_url().'home/shop/product?id='.$item->product->product_id; ?>">
                <img src="<?php echo $item->product->item_image_url_0; ?>" alt="">
              </a>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="payment-info-header">
        결제정보
      </div>
      <div class="payment-info">
        <table>
          <tbody>
          <tr>
            <th>결제방법</th>
            <td><?php echo $payment_info->payment_group_name.'('.$payment_info->payment_name.')'; ?></td>
          </tr>
          <tr>
            <th>주문상태</th>
            <td><?php echo $this->crud_model->get_purchase_status_str($purchase_info->status); ?></td>
          </tr>
          <tr>
            <th>주문접수일시</th>
            <td><?php echo $payment_info->requested_at;?>
          </tr>
          <tr>
            <th>주문완료일시</th>
            <td><?php echo $payment_info->purchased_at;?>
          </tr>
          <tr>
            <th>배송비</th>
            <td><?php echo $this->crud_model->get_price_str($purchase_info->total_shipping_fee);?></td>
          </tr>
          <tr>
            <th>결제금액</th>
            <td><?php echo $this->crud_model->get_price_str($purchase_info->total_balance);?></td>
          </tr>
          </tbody>
        </table>
      </div>
      <div class="sender-info-header">
        구매자 정보
      </div>
      <div class="sender_info">
        <table>
          <tr>
            <th>구매자</th>
            <td><?php echo $purchase_info->sender_name; ?></td>
          </tr>
          <tr>
            <th>연락처</th>
            <td><?php echo $purchase_info->sender_phone; ?></td>
          </tr>
          <tr>
            <th>이메일</th>
            <td><?php echo $purchase_info->sender_email; ?></td>
          </tr>
          <tr>
            <th>주소</th>
            <?php if (empty($purchase_info->sender_postcode) == true) {?>
              <td></td>
            <?php } else { ?>
              <td><?php echo '('.$purchase_info->sender_postcode.') '.$purchase_info->sender_address_1.' '.$purchase_info->sender_address_2; ?></td>
            <?php }?>
          </tr>
        </table>
      </div>
      <div class="receiver-info-header">
        배송지 정보
      </div>
      <div class="receiver-info">
        <table>
          <tr>
            <th>받는분</th>
            <td><?php echo $purchase_info->receiver_name; ?></td>
          </tr>
          <tr>
            <th>연락처</th>
            <td><?php echo $purchase_info->receiver_phone_1.' / '.$purchase_info->receiver_phone_2; ?></td>
          </tr>
          <tr>
            <th>주소</th>
            <td><?php echo '('.$purchase_info->receiver_postcode.') '.$purchase_info->receiver_address_1.' '.$purchase_info->receiver_address_2; ?></td>
          </tr>
          <tr>
            <th>배송요청사항</th>
            <td><?php echo $purchase_info->receiver_req; ?></td>
          </tr>
        </table>
      </div>
      <div style="color:grey">
        상품이 품절되는 경우 주문이 자동으로 취소되며, 주문하신 분의 SMS/이메일로 관련 안내를 발송해 드립니다.
      </div>
    </div>
  </div>
</section>
