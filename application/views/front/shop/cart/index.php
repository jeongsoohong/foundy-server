<style>
  .cart-content {
    width: 100%;
    padding-left: 15px;
    padding-right: 15px;
    margin-bottom: 70px;
  }
  .cart-header {
    border-bottom: 1px solid #EAEAEA;
    height: 40px;
    line-height: 40px;
    display: flex;
  }
  .cart-item-checkbox {
    width: 80%;
    height: inherit;
  }
  .cart-item-delete {
    width: 20%;
    height: inherit;
    text-align: right;
  }
  .cart-item-all {
    border-bottom: 1px solid #353535;
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
  .item-name, .item-price, .item-option, .item-purchase-cnt {
    padding: 3px 10px 3px 20px;
    font-size: 12px !important;
  }
  .item-option, .item-purchase-cnt {
    display: flex;
  }
  .item-option-header, .item-purchase-cnt-header {
    width: 30%;
  }
  .item-option-select, .item-purchase-cnt-select {
    width: 70%;
  }
  .item-option-select select, .item-purchase-cnt-select select {
    height: 30px;
    width: auto;
    font-size:12px;
    margin: 0;
    padding-top: 0;
    padding-bottom: 0;
    background-color: #F3EFEB;
  }
  select {
    height: 20px;
    background-color: #F3EFEB;
  }
  .cart-balance {
    width: 100%;
  }
  .cart-balance table {
    margin: 0;
    width: 100%;
  }
  .cart-balance table tr th {
    width: 20%;
  }
  .cart-balance table tr td {
    width: 80%;
    text-align: right;
    font-size: 20px;
  }
  .item-purchase-btn {
    width: 100%;
    background-color: black;
    height: 50px;
    left: 0;
    bottom: 0;
    z-index: 100;
    position: fixed;
  }
  .item-purchase-btn a h6 {
    font-size: 18px;
    text-align: center;
    line-height: 50px;
    color: white;
    margin: 0;
  }
</style>
<section class="page-section" id="buying">
  <div class="container">
    <div class="row">
      <div class="cart-content">
        <div class="cart-header">
          <style type="text/css">
            #buying .cart-header {
              border-bottom: 1px solid #ccc;
              height: 52px;
              line-height: 52px;
            }
            #buying .cart-header u {
              text-decoration: none;
              color: #ad796d;
              font-size: 14px;
              font-weight: bold;
            }
            #buying .cart-item-all {
              border: 0;
            }
            #buying .cart-item {
              padding: 16px 0;
              border: 0;
              border-bottom: 1px dashed #ccc;
            }
            #buying .item-brand {
              margin-bottom: 12px;
            }
            #buying .item-name {
              padding: 0 0 8px 0;
              color: #333;
              font-size: 13px !important;
            }
            #buying .item-price {
              padding: 0 0 4px 0;
              color: #757575;
              font-size: 11px !important;
              font-weight: 900;
            }
            #buying .item-option {
              color: #757575;
              padding: 0 0 0 0;
              font-size: 11px !important;
              font-weight: 900;
            }
            #buying .cart-item-info {
              width: 64%;
            }
            #buying .cart-item-image {
              width: 36%;
            }
            #buying .cart-balance tr {
              height: 28px;
            }
            #buying .cart-balance tr th {
              width: 24%;
              color: #333;
              font-size: 13px;
              font-weight: 600;
            }
            #buying .cart-balance tr td {
              color: #333;
              font-size: 14px;
            }
            #buying .space {
              height: 8px !important;
            }
    
    
            /* 체크박스 디자인 & 클릭,해제 */
            .type_label {
              padding-left: 28px;
              height: inherit;
              line-height: inherit;
              color: #111;
              font-size: 14px;
              font-weight: 400;
              margin: 0;
            }
            .chk_style {
              border: 0;
              border-radius: 0;
              background: transparent;
              -webkit-appearance: none;
              -moz-appearance: none;
              appearance: none;
              position: absolute;
              top: 12px;
              left: 3px;
              z-index: -1;
              width: 14px;
              height: 14px;
              margin-top: 2px !important;
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
            }
    
            /* 낱개 포지션 relative */
            #all_wrap {
              position: relative;
              line-height: 40px;
              height: 40px !important;
              top: 6px;
            }
            #chk--only {
              position: relative;
              line-height: 20px;
            }
            #chk--only .type_label:before {
              top: 0;
            }
            #chk--only .type_label:after {
              top: 4px;
            }
          </style>
          <div class="cart-item-checkbox" id="all_wrap">
            <input checked type="checkbox" id="cart-item-check-all" name="cart_item_check_all" class="chk_style"
                   onchange="check_all()">
            <label class="type_label changed" id="all_chk">
              전체선택
            </label>
            <!--
            <label style="text-align:left">
              <input checked class='form-checkbox' id="cart-item-check-all" name="cart_item_check_all"
              type="checkbox" value="1" onchange="check_all();"/>
              전체선택
            </label>
            -->
          </div>
          <div class="cart-item-delete">
            <a href="javascript:void(0);" onclick="cart_item_del()">
              <u>선택삭제</u>
            </a>
          </div>
        </div>
        <div class="cart-item-all">
          <?php foreach ($cart_items as $item) { ?>
            <div class="cart-item" data-id="<?php echo $item->cart_id; ?>" data-price="<?php echo $item->item_sell_price; ?>" data-additional-price="<?php echo $item->additional_price;?>" data-shipping-fee="<?php echo $item->shipping_fee; ?>" data-purchase-cnt="<?php echo $item->total_purchase_cnt;?>" data-status="<?php echo $item->product_id->status; ?>"
              <?php if ($item->product_id->status != SHOP_PRODUCT_STATUS_ON_SALE) echo 'style="color: grey;"'; ?>>
              <div class="cart-item-info">
<!--                <div class="item-brand">-->
                <div class="item-brand" id="chk--only">
                  <input <?php if ($item->product_id->status == SHOP_PRODUCT_STATUS_ON_SALE) echo 'checked'; ?>
                    class='chk_style' name="cart_item_check_all" type="checkbox"
                    data-status="<?php echo $item->product_id->status; ?>" style="top: 1px;"/>
                  <label class="type_label changed confirm_chk">
                    <?php echo $item->shop->shop_name; ?>
                  </label>
                  <!--
                  <label style="text-align:left">
                    <input <?php //if ($item->product_id->status == SHOP_PRODUCT_STATUS_ON_SALE) echo 'checked'; ?> onchange="change_balance()" class='form-checkbox' id="cart-item-check-all" name="cart_item_check_all" type="checkbox" value="1" data-status="<?php //echo $item->product_id->status; ?>"/>
                    <?php //echo $item->shop->shop_name; ?>
                  </label>
                  -->
                </div>
                <div class="item-name"><?php echo $item->product->item_name; ?></div>
                <div class="item-price">
                  [가격]
                  <?php echo $this->crud_model->get_price_str($item->total_price); ?>원
                  <?php echo '('.$this->crud_model->get_price_str($item->item_sell_price).'원*'.$item->total_purchase_cnt.'개)'; ?>
                </div>
                <div class="item-option">
                  <?php
                  $opt_str = '';
                  foreach ($item->item_option_requires as $opt) {
                    if ($opt->val != -1) {
                      $opt_str .= "[$opt->name] $opt->option / ";
                    }
                  }
                  foreach ($item->item_option_others as $opt) {
                    if ($opt->val != -1) {
                      $opt_str .= "[$opt->name] $opt->option / ";
                    }
                  }
                  $opt_str .= '[배송비] ';
                  if ($item->shipping_fee == 0) $opt_str .= '무료';
                  else $opt_str .= $this->crud_model->get_price_str($item->shipping_fee).'원';
                  
                  echo $opt_str;
                  if ($item->product_id->status != SHOP_PRODUCT_STATUS_ON_SALE) {
                    echo ' / 판매중지상품';
                  }
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
        <div class="cart-balance">
          <table>
            <tbody>
            <tr>
              <th>주문상품수</th>
              <td id="total-purchase-cnt"><?php echo $total_purchase_cnt; ?>개</td>
            </tr>
            <tr>
              <th>주문금액</th>
              <td id="total-price"><?php echo $this->crud_model->get_price_str($total_price); ?>원</td>
            </tr>
            <tr>
              <th>추가금액</th>
              <td id="total-additional-price"><?php echo $this->crud_model->get_price_str($total_additional_price); ?>원</td>
            </tr>
            <tr>
              <th>배송비</th>
              <td id="total-shipping-fee"><?php echo $this->crud_model->get_price_str($total_shipping_fee); ?>원</td>
            </tr>
            <tr class="space"></tr>
            <tr style="height: 52px; border-top: 1px dashed;">
              <th style="font-size: 16px; font-weight: 900;">결제금액</th>
              <td id="total-balance" style="font-size: 20px; font-weight: 900;"><?php echo $this->crud_model->get_price_str($total_balance); ?></td>
            </tr>
            <!--
            <tr>
              <th>결제금액</th>
              <td id="total-balance"><b><?php //echo $this->crud_model->get_price_str($total_balance); ?>원</b></td>
            </tr>
            -->
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-md-12 item-purchase-btn" id="item-purchase-btn">
        <a href="javascript:void(0)" onclick="go_purchase()">
          <h6>구매하기</h6>
        </a>
      </div>
    </div>
  </div>
</section>
<div class="modal fade" id="betaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">내 주변 스튜디오 찾기</h4>
      </div>
      <div class="modal-body">
        <div style="text-align: center">
          Sorry! <br>
          결제는 본 서비스 오픈인 8/26일 부터 가능합니다.
        </div>
      </div>
      <div class="modal-footer">
        <!--        <button type="button" class="btn btn-danger btn-theme-sm" data-dismiss="modal"">취소</button>-->
        <button type="button" class="btn btn-danger btn-theme-sm" onclick="close_beta_modal()" style="text-transform: none; font-weight: 400;">확인</button>
      </div>
    </div>
  </div>
</div>
<script>
  let cart_item_cnt = <?php echo count($cart_items); ?>;
  let total_purchase_cnt = <?php echo $total_purchase_cnt; ?>;
  let total_price = <?php echo $total_price; ?>;
  let total_shipping_fee = <?php echo $total_shipping_fee; ?>;
  let total_additional_price = <?php echo $total_additional_price; ?>;
  let total_balance = <?php echo $total_balance; ?>;

  function check_all() {
    let checked = $('#cart-item-check-all').prop('checked');
    $.each($('.cart-item-all').find('input:checkbox'),function(idx,item) {
      // console.log(item);
      $(item).prop('checked', checked);
      if (checked === true) {
        $(item).closest('.item-brand').find('.confirm_chk').addClass('changed')
      } else {
        $(item).closest('.item-brand').find('.confirm_chk').removeClass('changed')
      }
    });
    change_balance();
  }

  function cart_item_del() {
    $.each($('.cart-item-all').find('input:checkbox'),function(idx,item) {
      let checked = $(item).prop('checked');
      if (checked === true) {
        $('#loading_set').show();
        let cart_item = $(item).closest('.cart-item');
        let cart_id = cart_item.data('id');
        let price = cart_item.data('price');
        let additional_price = cart_item.data('additional-price');
        let shipping_fee = cart_item.data('shipping-fee');
        let purchase_cnt = cart_item.data('purchase-cnt');
        let purchable = cart_item.data('status') === <?php echo SHOP_PRODUCT_STATUS_ON_SALE; ?>;
        
        // console.log(purchable);
        let formData = new FormData();
        formData.append('cart_id', cart_id);
        $.ajax({
          url: '<?php echo base_url(); ?>home/shop/cart/del', // form action url
          type: 'POST', // form submit method get/post
          dataType: 'html', // request type html/json/xml
          data: formData, // serialize form data
          cache: false,
          contentType: false,
          processData: false,
          success: function (data) {
            $("#loading_set").fadeOut(500);
            if (data === 'done' || data.search('done') !== -1) {
              
              if (purchable === true) {
                total_purchase_cnt -= purchase_cnt;
                total_price -= (price * purchase_cnt);
                total_shipping_fee -= shipping_fee;
                total_additional_price -= additional_price;
                total_balance = total_price + total_shipping_fee + total_additional_price;
  
                $('#total-purchase-cnt').text(total_purchase_cnt + '개');
                $('#total-price').text(get_price_str(total_price) + '원');
                $('#total-additional-price').text(get_price_str(total_additional_price) + '원');
                $('#total-shipping-fee').text(get_price_str(total_shipping_fee) + '원');
                $('#total-balance').text(get_price_str(total_balance) + '원');
              }

              cart_item.remove();

              cart_item_cnt -= 1;

              // console.log(cart_item_cnt);
              if (cart_item_cnt === 0) {
                cart_on(false);
              }

              let text = '<strong>성공하였습니다</strong>';
              notify(text,'success','bottom','right');
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
    });
  }

  function change_balance() {
    total_purchase_cnt = 0;
    total_price = 0;
    total_shipping_fee = 0;
    total_additional_price = 0;
    total_balance = 0;

    let all_checked = true;
    $.each($('.cart-item-all').find('input:checkbox'),function(idx,item) {
      let checked = $(item).prop('checked');
      if (checked === true) {
        if ($(item).data('status') === <?php echo SHOP_PRODUCT_STATUS_ON_SALE; ?>) {
          let cart_item = $(item).closest('.cart-item');
          let cart_id = cart_item.data('id');
          let price = cart_item.data('price');
          let additional_price = cart_item.data('additional-price');
          let shipping_fee = cart_item.data('shipping-fee');
          let purchase_cnt = cart_item.data('purchase-cnt');
  
          total_purchase_cnt += purchase_cnt;
          total_price += (price * purchase_cnt);
          total_shipping_fee += shipping_fee;
          total_additional_price += additional_price;
        }
      } else {
        all_checked = false;
      }
    });

    if (all_checked === true) {
      $('#cart-item-check-all').prop('checked', true);
      $('#all_chk').addClass('changed');
    } else {
      $('#cart-item-check-all').prop('checked', false);
      $('#all_chk').removeClass('changed');
    }

    total_balance = total_price + total_shipping_fee + total_additional_price;

    $('#total-purchase-cnt').text(total_purchase_cnt + '개');
    $('#total-price').text(get_price_str(total_price) + '원');
    $('#total-additional-price').text(get_price_str(total_additional_price) + '원');
    $('#total-shipping-fee').text(get_price_str(total_shipping_fee) + '원');
    $('#total-balance').text(get_price_str(total_balance) + '원');
  }

  function open_beta_modal() {
    $('#betaModal').modal('show');
  }

  function close_beta_modal() {
    $('#betaModal').modal('hide');
  }

  function go_purchase() {
    // for beta service
    <?php
    $today = date('Y-m-d H:i:s');
    $beta_service = $this->db->get_where('server_settings', array('type' => SERVER_SETTINGS_TYPE_BETA_SERVICE))->row();
    $is_admin = false;
    if ($this->session->userdata('user_login') == "yes") {
      $user_data = json_decode($this->session->userdata('user_data'));
      if ($user_data->user_type & USER_TYPE_ADMIN) {
        $is_admin = true;
      }
    }
    ?>
    <?php if ($beta_service->start_at < $today && $today < $beta_service->end_at && $is_admin == false) { ?>
    open_beta_modal();
    return false;
    <?php } ?>
  
    // grand open
    let formData = new FormData();
    let item_cnt = 0;
    let purchable = true;

    $.each($('.cart-item-all').find('input:checkbox'),function(idx,item) {
      let checked = $(item).prop('checked');
      if (checked === true) {
        if ($(item).data('status') !== <?php echo SHOP_PRODUCT_STATUS_ON_SALE; ?>) {
          alert('판매중지상품은 구매하실 수 없습니다.');
          purchable = false;
          return false;
        }
        let cart_item = $(item).closest('.cart-item');
        let cart_id = cart_item.data('id');
        formData.append('cart_ids[]', cart_id);
        item_cnt += 1;
      }
    });
    
    // console.log(purchable);
    if (purchable === false) {
      return false;
    }

    if (item_cnt === 0) {
      alert('상품을 선택해주세요.');
      return false;
    }
    
    $('#loading_set').show();
  
    $.ajax({
      url: '<?php echo base_url(); ?>home/shop/purchase/add', // form action url
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        $("#loading_set").fadeOut(500);
        if (data === 'done' || data.search('done') !== -1) {
          window.location.href = '<?php echo base_url().'home/shop/purchase'; ?>';
        }
        console.log(data)
      },
      error: function (e) {
        console.log(e)
      }
    });

  }
  
  $(document).ready(function() {
    $('#all_chk').click(function(){
      let target = $('#cart-item-check-all');
      let checked = target.prop('checked');
      // console.log(target);
      // console.log(checked);
      if (checked === true) {
        target.prop('checked', false);
        // $(this).removeClass('changed');
      } else {
        target.prop('checked', true);
        // $(this).addClass('changed');
      }
      // console.log($(this).hasClass('changed'));
      check_all();
    })
    $('.confirm_chk').click(function(){
      let target = $(this).closest('.item-brand').find('input[type=checkbox]');
      let checked = target.prop('checked');
      // console.log(target);
      // console.log(checked);
      if (checked === true) {
        target.prop('checked', false);
        $(this).removeClass('changed');
      } else {
        target.prop('checked', true);
        $(this).addClass('changed');
      }
      change_balance();
    })
    change_balance();
  });

</script>
