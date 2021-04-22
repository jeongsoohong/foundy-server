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
<section class="page-section" id="order">
  <div class="container">
    <div class="purchase-content">
      <style type="text/css">
        /* 체크박스 디자인 & 클릭,해제 */
        .type_label {
          padding-left: 28px;
          height: inherit;
          line-height: inherit;
          color: #111;
          font-size: 14px;
          font-weight: 400;
          margin: 0;
          z-index: 0;
        }
        .confirm_chk {
          position: relative;
        }
        #all_select,
        .piece_select {
          border: 0;
          border-radius: 0;
          background: transparent;
          -webkit-appearance: none;
          -moz-appearance: none;
          appearance: none;
          position: absolute;
          top: 12px;
          left: 3px;
          z-index: 10;
          width: 14px;
          height: 14px;
          margin-top: 2px !important;
          cursor: pointer;
        }
        .type_label:before,
        .type_label:after {
          position: absolute;
          content: "";
          cursor: pointer;
        }
        .type_label:before {
          z-index: 12;
          top: 10px;
          left: 0;
          width: 20px;
          height: 20px;
          border-radius: 3px;
          background-color: #fff;
          border: 1px solid #ccc;
          box-sizing: border-box;
          text-align: center;
        }
        .type_label:after {
          z-index: 13;
          top: 14px;
          left: 8px;
          width: 5px;
          height: 10px;
          border: 1px solid #ccc;
          border-width: 0 1px 1px 0;
          transform: rotate(45deg);
        }
        .type_label.changed:after {
          border: 1px solid #fff;
          border-width: 0 1px 1px 0;
        }
        .type_label.changed:before  {
          border: 1px solid #ff6633;
          background-color: #ff6633;
          cursor: pointer;
        }
        
        #order .container {
          padding: 0 16px;
        }
        #order .cart-all {
          height: 52px;
          line-height: 52px;
          border-bottom: 1px dashed #111;
        }
        #order .cart-item-choice {
          display: block;
          float: right;
          height: 52px;
          line-height: 52px;
          color: #ad796d;
          font-size: 14px;
          font-weight: bold;
          background: none;
          border: 0;
          padding: 0;
        }
        #order .cart-no {
          height: 52px;
          line-height: 52px;
        }
        #order .item-tit {
          color: #333;
          font-size: 13px;
          font-weight: bold;
          margin-bottom: 12px;
        }
        #order .item-price,
        #order .item-option {
          color: #757575;
          font-weight: bold;
          padding-bottom: 4px;
        }
        #order .item-list-cart {
          padding-bottom: 20px;
        }
        
        #order .item-list-cart:last-child {
          border-bottom: 0;
        }
        
        #all_wrap {
          float: left;
          position: relative;
          line-height: 40px;
          height: 40px !important;
          top: 6px;
        }
        #all_chk {
          position: relative;
        }
        .chk--piece {
          position: relative;
          float: left;
          height: 20px;
          line-height: 20px;
          top: 2px;
        }
        #order .orderList .type_label:before {
          top: 0;
        }
        #order .orderList .type_label:after {
          top: 4px;
        }
        
        #order .cart-brand-tit {
          color: #111;
          font-size: 16px;
          font-weight: bold;
          height: 24px;
          line-height: 24px;
        }
        /*
                    #order .cart-item-info {
                        width: 64%;
                    }
                    #order .cart-item-image {
                        width: 36%;
                    }
        */
        #order .item-name {
          font-size: 14px !important;
          padding-bottom: 4px;
        }
        #order .item-price,
        #order .item-option {
          color: #757575;
          font-size: 11px !important;
          font-weight: bold;
        }
        #order .cart-brand-wrap {
          padding: 16px 0 20px;
          border-top: 1px dashed #ccc;
        }
        #order .cart-item {
          padding: 12px 0;
          border-bottom: 1px dashed #ccc;
        }
        #order .cart-item:last-child {
          padding-bottom: 0;
          border-bottom: 0;
        }
        #order .cart-item-all {
          border: 0;
          margin: 0;
        }
        #order .btn_cancel {
          border: 0;
          display: block;
          height: 44px;
          background-color: #111;
          /* border-radius: 4px; */
          width: 100%;
          color: #fff;
          font-size: 14px;
          font-weight: bold;
          margin-bottom: 8px;
        }
        #order .alert_txt {
          color: #757575;
          font-size: 11px;
          font-weight: bold;
          text-align: center;
          margin: 0;
        }
      </style>
      <div class="cart-all clearfix" id="all-wrap">
        <div class="cart-item-checkbox" id="all_wrap">
<!--          <input type="checkbox" id="all_select">-->
          
<!--          <label class="type_label" id="all_chk">-->
<!--            전체주문취소-->
<!--          </label>-->
        </div>
<!--        <button class="cart-item-choice">선택취소</button>-->
        <button class="cart-item-choice" onclick="open_cancel_order(<?= $purchase_code; ?>, 0);">전체주문취소</button>
      </div>
      <ul class="orderList">
        <style type="text/css">
          #order .infoBtn {
            width: 100%;
            height: 40px;
            line-height: 40px;
            background-color: #fff;
            color: #111;
            font-size: 12px;
            font-weight: bold;
            border: 0;
            margin: 0;
            text-align: left;
            padding-left: 14px;
            box-sizing: border-box;
            border-bottom: 1px solid #f3efeb;
            position: relative;
          }
          
          #order .infoWrap {
            box-sizing: border-box;
            padding: 18px 14px;
            background-color: #fff;
          }
          #order .clearfix::after {
            content: "";
            display: block;
            clear: both;
          }
          #order .infoL,
          #order .infoR {
            float: left;
            font-size: 12px;
            margin: 0 0 12px 0;
          }
          #order .infoHow:last-child {
            margin: 0;
          }
          #order .infoL {
            width: 88px;
            font-weight: bold;
          }
          #order .width {
            word-break: keep-all;
            line-height: 1.75;
            box-sizing: border-box;
            width: calc(100% - 88px);
          }
          #order .cart-info {
            position: relative;
            margin-bottom: 4px;
          }
          #order .cart-info:last-child {
            margin-bottom: 0;
          }
          .touch .arrow {
            display: block;
            position: absolute;
            top: 12px;
            right: 12px;
            width: 8px;
            height: 8px;
            border: 2px solid #9e9e9e;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
          }
          #order .orderList {
            margin: 0;
          }
          
          #order .brand-delivery {
            float: right;
            width: 40%;
            height: 20px;
            line-height: 20px;
            margin: 2px 0;
          }
          #order .delivery-txt {
            display: block;
            float: left;
            width: 40px;
            height: 20px;
            line-height: 20px;
            border-radius: 14px;
            text-align: center;
            margin-right: 3px;
            color: #fff;
            background-color: saddlebrown;
            font-size: 10px;
            font-weight: bold;
            border-radius: 10px;
          }
          #order .delivery-price {
            float: right;
            height: 20px;
            line-height: 20px;
            color: saddlebrown;
            font-size: 12px;
            font-weight: bold;
          }
        </style>
        <?
        $idx = 0;
        $all_cancelable = true;
        foreach ($shop_items as $shop_id => $shop_item) {
          $idx++;
          ?>
        <li class="item-list-cart">
          <div class="cart-wrap">
            <? if ($idx == 1) { ?>
              <div class="cart-no">
                <p>주문번호
                  <span style="color: saddlebrown;"><?= $purchase_code; ?></span>
                </p>
              </div>
            <? } ?>
            <div class="cart-box">
              <div class="cart-item-all">
                <div class="cart-brand-wrap">
                  <div class="cart-brand-tit clearfix">
                    <div class="brand-select chk--piece">
<!--                      <input type="checkbox" class="piece_select" style="top: 1px;">-->
                      <label class="confirm_chk"><?= $shop_item->shop->shop_name; ?></label>
                    </div>
                    <p class="brand-delivery clearfix">
                      <span class="delivery-txt">배송비</span>
                      <span class="delivery-price">
                        <?
                        if ($shop_item->total_shipping_fee == 0) echo '무료';
                        else echo $this->crud_model->get_price_str($shop_item->total_shipping_fee).'원';
                        ?>
                      </span>
                    </p>
                  </div>
                  <?
                  foreach ($shop_item->items as $product_id => $product_item) {
                    foreach ($product_item->purchase_items as $purchase_product_id => $purchase_item) {
                      ?>
                      <div class="cart-item"
                           data-id="<?= $purchase_item->purchase_product_id; ?>"
                           data-price="<?= $purchase_item->item_sell_price; ?>"
                           data-additional-price="<?= $purchase_item->total_additional_price;?>"
                           data-shipping-fee="<?= $purchase_item->total_shipping_fee; ?>"
                           data-purchase-cnt="<?= $purchase_item->total_purchase_cnt;?>">
                        <div class="cart-item-info" id="cart-cnt">
                          <div class="item-name"><?= $product_item->product->item_name; ?></div>
                          <div class="item-price">
                            [가격]
                            <?= $this->crud_model->get_price_str($purchase_item->total_price); ?>원
                            <?= '('.$this->crud_model->get_price_str($purchase_item->item_sell_price).'원*'.$purchase_item->total_purchase_cnt.'개)'; ?>
                          </div>
                          <div class="item-option" >
                            <?php
                            $opt_str = '';
                            foreach ($purchase_item->item_option_requires as $opt) {
                              if ($opt->val != -1) {
                                $opt_str .= "[$opt->name]$opt->option / ";
                              }
                            }
                            foreach ($purchase_item->item_option_others as $opt) {
                              if ($opt->val != -1) {
                                $opt_str .= "[$opt->name]$opt->option / ";
                              }
                            }
                            if (empty($opt_str) == false) {
                              $opt_str[strlen($opt_str) - 2] = "\0";
                              echo $opt_str;
                            }
                            echo $opt_str;
                            ?>
                          </div>
                          <div class="item-status">
                            주문상태 : <?= $this->shop_model->get_shipping_status_str($purchase_item->shipping_status); ?>
                          </div>
                          <div class="item-btn" style="display: flex; width: 100%; padding: 10px 0;">
                            <?php if ($purchase_item->shipping_status == SHOP_SHIPPING_STATUS_COMPLETED) { ?>
                              <div class="item-complete-ship" style="width: 30%; background-color: black; height: 30px; margin-right: 10px; line-height: 30px; text-align: center">
                                <a href="javascript:void(0)" onclick="open_purchase_complete(<?= $purchase_item->purchase_product_id; ?>,<?= $purchase_item->product_id; ?>)" style="font-size: 12px; color: white;">
                                  구매확정
                                </a>
                              </div>
                            <?php } ?>
                            <?php if (empty($purchase_item->shipping_data) == false) { ?>
                              <div class="item-shipping-search" style="width: 30%; background-color: black; font-size: 14px; height: 30px; margin-right: 10px; line-height: 30px; text-align: center">
                                <a href="<?= base_url().'home/shop/shipping/search?id='.$purchase_item->purchase_product_id; ?>" style="font-size: 12px; color: white;" <?php if (empty($purchase_item->shipping_data) == false) echo 'target="_blank"'; ?>>
                                  배송조회
                                </a>
                              </div>
                            <?php } ?>
                          </div>
                        </div>
                        <div class="cart-item-image">
                          <a href="<?= base_url().'home/shop/product?id='.$product_item->product->product_id; ?>">
                            <img src="<?= $product_item->product->item_image_url_0; ?>" alt="">
                          </a>
                        </div>
                      </div>
                    <? }
                  } ?>
                </div>
              </div>
            </div>
            <!-- 배송시작되면 '주문취소' -> '반품신청' 으로 문구변경 -->
            <? if ($shop_item->cancelable == true) { ?>
              <button class="btn_cancel order_status orderCancel_status" onclick="open_cancel_order(<?= $purchase_code; ?>,<?= $shop_item->shop->shop_id; ?>);">주문취소</button>
              <p class="alert_txt">부분취소는 1:1 문의를 통하여 요청 부탁드립니다.</p>
            <? } else {
              $all_cancelable = false;
              ?>
              <p class="alert_txt">반품신청은 1:1 문의를 통하여 요청 부탁드립니다.</p>
            <? } ?>
          </div>
        </li>
        <? } ?>
      </ul>
      <div class="cart-infoBox">
        <div class="cart-info touch">
          <p class="infoBtn">
            결제정보<span class="arrow"></span>
          </p>
          <div class="infoWrap" style="display: none;">
            <div class="infoHow clearfix">
              <p class="infoL">결제방법</p>
              <p><?= $payment_info->payment_group_name.'('.$payment_info->payment_name.')'; ?></p>
            </div>
            <div class="infoHow clearfix">
              <p class="infoL">주문상태</p>
              <p><?= $this->shop_model->get_purchase_status_str($purchase_info->status); ?></p>
            </div>
            <div class="infoHow clearfix">
              <p class="infoL">주문접수일시</p>
              <p><?= date('Y.m.d H:i:s', strtotime($payment_info->requested_at));?></p>
            </div>
            <div class="infoHow clearfix">
              <p class="infoL">주문완료일시</p>
              <p><?= date('Y.m.d H:i:s', strtotime($payment_info->purchased_at));?></p>
            </div>
            <div class="infoHow clearfix">
              <p class="infoL">배송비</p>
              <p>
                <?
                if ($total_shipping_fee == 0) echo '무료';
                else echo $this->crud_model->get_price_str($total_shipping_fee).'원';
                ?>
              </p>
            </div>
            <div class="infoHow clearfix">
              <p class="infoL">결제금액</p>
              <p class="infoR width">
                <?= $this->crud_model->get_price_str($purchase_info->total_balance);?>원 -
                <?= $this->crud_model->get_price_str($purchase_info->discount);?>원(할인) -
                <?= $this->crud_model->get_price_str($purchase_info->cancel_price);?>원(취소) =
                <?= $this->crud_model->get_price_str($purchase_info->total_balance - $purchase_info->discount - $purchase_info->cancel_price);?>원
              </p>
            </div>
          </div>
        </div>
        <div class="cart-info touch">
          <p class="infoBtn">
            구매자 정보<span class="arrow"></span>
          </p>
          <div class="infoWrap" style="display: none;">
            <div class="infoHow clearfix">
              <p class="infoL">구매자</p>
              <p class="infoR"><?= $purchase_info->sender_name; ?></p>
            </div>
            <div class="infoHow clearfix">
              <p class="infoL">연락처</p>
              <p class="infoR"><?= $purchase_info->sender_phone; ?></p>
            </div>
            <div class="infoHow clearfix">
              <p class="infoL">이메일</p>
              <p class="infoR"><?= $purchase_info->sender_email; ?></p>
            </div>
            <div class="infoHow clearfix">
              <p class="infoL">주소</p>
              <?php if (empty($purchase_info->sender_postcode) == true) {?>
                <p class="infoR width"></p>
              <?php } else { ?>
                <p class="infoR width"><?= '('.$purchase_info->sender_postcode.') '.$purchase_info->sender_address_1.' '.$purchase_info->sender_address_2; ?></p>
              <?php }?>
            </div>
          </div>
        </div>
        <div class="cart-info touch">
          <p class="infoBtn">
            배송지 정보<span class="arrow"></span>
          </p>
          <div class="infoWrap" style="display: none;">
            <div class="infoHow clearfix">
              <p class="infoL">받는 분</p>
              <p class="infoR"><?= $purchase_info->receiver_name; ?></p>
            </div>
            <div class="infoHow clearfix">
              <p class="infoL">연락처</p>
              <p class="infoR"><?= $purchase_info->receiver_phone_1.' / '.$purchase_info->receiver_phone_2; ?></p>
            </div>
            <div class="infoHow clearfix">
              <p class="infoL">주소</p>
              <p class="infoR width"><?='('.$purchase_info->receiver_postcode.') '.$purchase_info->receiver_address_1.' '.$purchase_info->receiver_address_2; ?></p>
            </div>
            <div class="infoHow clearfix">
              <p class="infoL">배송요청사항</p>
              <p class="infoR"><?= $purchase_info->receiver_req; ?></p>
            </div>
          </div>
        </div>
      </div>
      <script>
        //체크박스 클릭이벤트
        //console.log(1);
        
        /*
        $('#all_chk').click(function(){
            //console.log(1);
            $(this).toggleClass('changed');
            let allChk = $('#all_chk').hasClass('changed');
            if(allChk === true) {
                $('.no-select .type_label').addClass('changed');
            }
            else {
                $('.no-select .type_label').removeClass('changed');
            }
        })
        */
        $('#all_select').click(function(){
          let all = $(this).prop('checked');
          
          if(all === true){
            $('.orderList .piece_select').prop('checked',true);
            $('.piece_select').prop('checked',true);
            $('#all_chk').addClass('changed');
            $('.confirm_chk').addClass('changed');
          }
          else {
            // console.log(all); false
            $('.orderList .piece_select').prop('checked',false);
            $('.piece_select').prop('checked',false);
            $('#all_chk').removeClass('changed');
            $('.confirm_chk').removeClass('changed');
          }
        })
      </script>
      <script>
        //체크박스 클릭이벤트
        //console.log(1);
        
        // 체크 박스 전체 선택/해제 기능 수정부탁드립니다.
        /*
          $('.piece_select').click(function(){
                let piece_chk = $('.piece_select').prop('checked');
                let all_length = $('.piece_select').length;
                let t_length = $('.piece_select').prop('checked',true).length;

                // console.log(all_length,t_length); 1 1

                if(piece_chk === true){
                    $('.piece_select').prop('checked',true);
                    $('.confirm_chk').addClass('changed');
                    // console.log(all_length,t_length);

                    if(t_length === all_length){
                        $('#all_select').prop('checked',true);
                        $('#all_chk').addClass('changed');
                    }
                }
                else {
                    $('.piece_select').prop('checked',false);
                    $('.confirm_chk').removeClass('changed');

                    if(t_length !== all_length){
                        // console.log(all_length,t_length); x
                        $('#all_select').prop('checked',false);
                        $('#all_chk').removeClass('changed');
                    }
                }
            })
        */
        
        $('.piece_select').click(function(){
          let piece_chk = $(this).prop('checked');
          if(piece_chk === true){
            $(this).prop('checked',true);
            $(this).next('.confirm_chk').addClass('changed');
          }
          else {
            $(this).prop('checked',false);
            $(this).next('.confirm_chk').removeClass('changed');
          }
        })
      </script>
      <script>
        //#touch arrow 회전
        $('.cart-info').click(function(){
          //console.log(1);
          
          // display 변수
          let display = $(this).find('.infoWrap').css('display');
          // slideUp,infoWrap 초기화
          $('.cart-info').find('.infoWrap').slideUp();
          $('.infoWrap').find('.arrow').css({
            transform : 'rotate(45deg)',
            top : '12px'
          })
          // console.log(display);
          if(display === 'none'){
            $(this).find('.arrow').css({
              transform : 'rotate(225deg)',
              top : '16px'
            })
            $(this).find('.infoWrap').slideDown();
          }
          else {
            $(this).find('.arrow').css({
              transform : 'rotate(45deg)',
              top : '12px'
            })
            $(this).find('.infoWrap').slideUp();
          }
        })
      </script>
      <div style="color: grey; margin: 32px 0;">
        상품이 품절되는 경우 주문이 자동으로 취소되며, 주문하신 분의 SMS/이메일로 관련 안내를 발송해 드립니다.
      </div>
    </div>
  </div>
</section>
<? if (false) { ?>
  <section class="page-section" id="order">
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
      </div>
      <div class="purchase-content">
        <div class="cart-header">
          주문상품 정보
        </div>
        <div class="cart-item-all">
          <?php foreach ($purchase_items as $item) { ?>
            <div class="cart-item"
                 data-id="<?php echo $item->purchase_product_id; ?>"
                 data-price="<?php echo $item->item_sell_price; ?>"
                 data-additional-price="<?php echo $item->total_additional_price;?>"
                 data-shipping-fee="<?php echo $item->total_shipping_fee; ?>"
                 data-purchase-cnt="<?php echo $item->total_purchase_cnt;?>">
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
                  주문상태 : <?php echo $this->shop_model->get_shipping_status_str($item->shipping_status); ?>
                </div>
                <div class="item-btn" style="display: flex; width: 100%; padding: 10px 0;">
                  <?php if ($item->shipping_status == SHOP_SHIPPING_STATUS_ORDER_COMPLETED || $item->shipping_status == SHOP_SHIPPING_STATUS_PREPARE) { ?>
                    <div class="item-cancel-order" style="width: 30%; background-color: black; height: 30px; margin-right: 10px; line-height: 30px; text-align: center">
                      <a href="javascript:void(0)" onclick="open_cancel_order(<?php echo $item->purchase_product_id; ?>)" style="font-size: 12px; color: white;">
                        주문취소
                      </a>
                    </div>
                  <?php }  else if ($item->shipping_status == SHOP_SHIPPING_STATUS_COMPLETED) { ?>
                    <div class="item-complete-ship" style="width: 30%; background-color: black; height: 30px; margin-right: 10px; line-height: 30px; text-align: center">
                      <a href="javascript:void(0)" onclick="open_purchase_complete(<?= $item->purchase_product_id; ?>,<?= $item->product->product_id; ?>)" style="font-size: 12px; color: white;">
                        구매확정
                      </a>
                    </div>
                  <?php } ?>
                  <?php if (empty($item->shipping_data) == false) { ?>
                    <div class="item-shipping-search" style="width: 30%; background-color: black; font-size: 14px; height: 30px; margin-right: 10px; line-height: 30px; text-align: center">
                      <a href="<?php echo base_url().'home/shop/shipping/search?id='.$item->purchase_product_id; ?>" style="font-size: 12px; color: white;" <?php if (empty($item->shipping_data) == false) echo 'target="_blank"'; ?>>
                        배송조회
                      </a>
                    </div>
                  <?php } ?>
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
        <? } ?>
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
              <td><?php echo $this->shop_model->get_purchase_status_str($purchase_info->status); ?></td>
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
<?php }?>
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
        <button type="button" class="btn btn-dark btn-theme-sm" style="background-color: black; color:white; width:20%;"
                onclick="purchase_product_cancel();">확인</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="completePurchaseModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="width: 5px; padding: 0 15px">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="req-title">구매확정</h4>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <div>구매를 확정하겠습니까?
          </div>
        </div>
      </div>
      <div class="modal-footer" style="display: block;">
        <button type="button" class="btn btn-dark btn-theme-sm" data-dismiss="modal" style="background-color: black; color: white; width: 20%"
                onclick="purchase_complete();">확인</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="reviewPurchaseModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="width: 5px; padding: 0 15px">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="req-title">리뷰</h4>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <div>구매가 확정되었습니다!<br>
            리뷰를 쓰시겠습니까?
          </div>
        </div>
      </div>
      <div class="modal-footer" style="display: block;">
        <button type="button" class="btn btn-danger btn-theme-sm" data-dismiss="modal" style="color:white; width:20%;"
                onclick="set_reload()">아니요</button>
        <button type="button" class="btn btn-dark btn-theme-sm" data-dismiss="modal" style="background-color: black; color:white; width:20%;"
                onclick="go_review();">네</button>
      </div>
    </div>
  </div>
</div>
<script>
  let purchase_code = 0;
  let cancel_shop_id = 0;
  function open_cancel_order(code,sid) {
    // if (sid === 0) {
    //   alert('배송이 시작되면 주문취소할 수 없습니다. 관리자에게 문의바랍니다.');
    //   return false;
    // }
    purchase_code = code;
    cancel_shop_id = sid;
    $('#cancelOrderModal').modal('show');
  }
  function purchase_product_cancel() {
    let cancel_reason = $('#cancel-reason').val();
    let auth_code = '<?php echo $auth_code; ?>';
    // console.log(id);
    // console.log(cancel_reason);
    
    if (cancel_reason.length < 5) {
      alert('최소 5자 이상 적어주세요.');
      return false;
    }
    
    // alert('purchase_code:' + purchase_code + ',shop:'+cancel_shop_id);
    // return false;
    
    $('#loading_set').show();
    
    let formData = new FormData();
    formData.append('purchase_code', purchase_code);
    formData.append('sid', cancel_shop_id);
    formData.append('reason', cancel_reason);
    formData.append('auth_code', auth_code);
    $.ajax({
      url: '<?php echo base_url(); ?>home/shop/purchase/cancel', // form action url
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        $("#loading_set").fadeOut(500);
        if (data === 'done' || data.search('done') !== -1) {
          let text = '<strong>성공하였습니다</strong>';
          notify(text,'success','bottom','right');
          setTimeout(function() {location.reload();}, 1000);
        } else {
          let text = '<strong>실패하였습니다</strong>' + data;
          notify(text,'warning','bottom','right');
        }
      },
      error: function (e) {
        console.log(e)
      }
    });
  }
  let purchase_product_id = 0;
  let product_id = 0;
  function open_purchase_complete(id, pid) {
    purchase_product_id = id;
    product_id = pid;
    $('#completePurchaseModal').modal('show');
  }
  function purchase_complete() {
    let auth_code = '<?php echo $auth_code; ?>';
    // console.log(id);
    // console.log(cancel_reason);
  
    $('#loading_set').show();
  
    let formData = new FormData();
    formData.append('id', purchase_product_id);
    formData.append('auth_code', auth_code);
    $.ajax({
      url: '<?php echo base_url(); ?>home/shop/purchase/final', // form action url
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        $("#loading_set").fadeOut(500);
        if (data === 'done' || data.search('done') !== -1) {
          let text = '<strong>성공하였습니다</strong>';
          notify(text,'success','bottom','right');
          open_review(product_id);
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
  let review_id = 0;
  function open_review(id) {
    review_id = id;
    $('#reviewPurchaseModal').modal('show');
  }
  function go_review() {
    window.location = '<?= base_url().'home/shop/product?tab=review&id='; ?>' + review_id;
  }
  function set_reload() {
    setTimeout(function() {location.reload();}, 500);
  }
  
  $(function() {
    <? if ($all_cancelable) { ?>
    $('#all-wrap').show();
    <? } else { ?>
    $('#all-wrap').hide();
    <? } ?>
  });
</script>