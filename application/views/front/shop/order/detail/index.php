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
          <h6>주문번호 :
            <span style="color:saddlebrown;"><?php echo $purchase_code; ?></span>
<!--            <span class="pull-right"><u>주문취소</u></span>-->
          </h6>
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
              <div class="item-price" ><?php echo $this->crud_model->get_price_str($item->item_sell_price + $item->total_shipping_fee); ?>원(배송비:<?php echo $this->crud_model->get_price_str($item->total_shipping_fee); ?>원)</div>
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
              <div class="item-status">
                <?php echo $this->crud_model->get_shipping_status_str($item->shipping_status); ?>
                <?php if ($item->shipping_status == SHOP_SHIPPING_STATUS_ORDER_COMPLETED || $item->shipping_status == SHOP_SHIPPING_STATUS_PREPARE) { ?>
                  <a href="javascript:void(0)" onclick="open_cancel_order(<?php echo $item->purchase_product_id; ?>)" >
                    <u>[주문취소]</u>
                  </a>
                <?php } ?>
              </div>
              <?php if (empty($item->shipping_data) == false) { ?>
                <div class="item-shipping-search">
                  <a href="<?php echo base_url(); ?>home/shop/shipping/search?id=<?php echo $item->purchase_product_id; ?>" target="_blank">
                    배송조회
                  </a>
                </div>
              <?php } ?>
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
            <td>
              <?php echo $this->crud_model->get_price_str($purchase_info->total_balance);?>원 -
              <?php echo $this->crud_model->get_price_str($purchase_info->discount);?>원(할인) -
              <?php echo $this->crud_model->get_price_str($purchase_info->cancel_price);?>원(취소) =
              <?php echo $this->crud_model->get_price_str($purchase_info->total_balance - $purchase_info->discount - $purchase_info->cancel_price);?>원
            </td>
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
<div class="modal fade" id="cancelOrderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="width: 5px; padding: 0 15px">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="req-title">주문취소</h4>
      </div>
      <div class="modal-body" style="padding-top: 0 !important;">
        <div class="cancel-reason-body">
          <label style="width: 100%; font-size: 16px;">
            사유
            <textarea rows="10" data-height="500" name='cancel_reason' id='cancel-reason' class="form-control" wrap="hard"></textarea>
          </label>
        </div>
      </div>
      <div class="modal-footer" style="display: block;">
        <button type="button" class="btn btn-theme btn-theme-sm" style="text-transform: none; background-color: black; color:white; width:20%; font-weight: 400; border: none"
                onclick="purchase_product_cancel();">확인</button>
      </div>
    </div>
  </div>
</div>
<script>
  let cancel_id = 0;
  function open_cancel_order(id) {
    cancel_id = id;
    $('#cancelOrderModal').modal('show');
  }
  function purchase_product_cancel(id) {
    let cancel_reason = $('#cancel-reason').val();
    
    console.log(id);
    console.log(cancel_reason);
    
    if (cancel_reason.length < 5) {
      alert('최소 5자 이상 적어주세요.');
      return false;
    }
    
    event.preventDefault();
    
    let formData = new FormData();
    formData.append('id', cancel_id);
    formData.append('reason', cancel_reason);
    $.ajax({
      url: '<?php echo base_url(); ?>home/shop/purchase/cancel', // form action url
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        if (data === 'done' || data.search('done') !== -1) {
          let text = '<strong>성공하였습니다</strong>';
          notify(text,'success','bottom','right');
          setTimeout(function() {location.reload();}, 1000);
        } else {
          var text = '<strong>실패하였습니다</strong>' + data;
          notify(text,'warning','bottom','right');
        }
      },
      error: function (e) {
        console.log(e)
      }
    });
  }
</script>