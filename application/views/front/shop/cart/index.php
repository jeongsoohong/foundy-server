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
<section class="page-section">
  <div class="container">
    <div class="row">
      <div class="cart-content">
        <div class="cart-header">
          <div class="cart-item-checkbox">
            <label style="text-align:left">
              <input checked class='form-checkbox' id="cart-item-check-all" name="cart_item_check_all" type="checkbox" value="1" onchange="check_all();"/>
              전체선택
            </label>
          </div>
          <div class="cart-item-delete">
            <a href="javascript:void(0);" onclick="cart_item_del()">
              <u>선택삭제</u>
            </a>
          </div>
        </div>
        <div class="cart-item-all">
          <?php foreach ($cart_items as $item) { ?>
            <div class="cart-item" data-id="<?php echo $item->cart_id; ?>" data-price="<?php echo $item->item_sell_price; ?>" data-additional-price="<?php echo $item->additional_price;?>" data-shipping-fee="<?php echo $item->shipping_fee; ?>" data-purchase-cnt="<?php echo $item->total_purchase_cnt;?>">
              <div class="cart-item-info">
                <div class="item-brand">
                  <label style="text-align:left">
                    <input checked onchange="change_balance()" class='form-checkbox' id="cart-item-check-all" name="cart_item_check_all" type="checkbox" value="1">
                    <?php echo $item->shop->shop_name; ?>
                  </label>
                </div>
                <div class="item-name"><?php echo $item->product->item_name; ?></div>
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
            <tr>
              <th>결제금액</th>
              <td id="total-balance"><b><?php echo $this->crud_model->get_price_str($total_balance); ?>원</b></td>
            </tr>
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
<script>
  let cart_item_cnt = <?php echo $total_purchase_cnt; ?>;
  let total_purchase_cnt = <?php echo $total_purchase_cnt; ?>;
  let total_price = <?php echo $total_price; ?>;
  let total_shipping_fee = <?php echo $total_shipping_fee; ?>;
  let total_additional_price = <?php echo $total_additional_price; ?>;
  let total_balance = <?php echo $total_balance; ?>;

  function check_all() {
    let checked = $('#cart-item-check-all').prop('checked');
    // console.log(checked);
    $.each($('.cart-item-all').find('input:checkbox'),function(idx,item) {
      // console.log(item);
      $(item).prop('checked', checked);
    });
    change_balance();
  }

  function cart_item_del() {
    $.each($('.cart-item-all').find('input:checkbox'),function(idx,item) {
      let checked = $(item).prop('checked');
      if (checked === true) {
        let cart_item = $(item).closest('.cart-item');
        let cart_id = cart_item.data('id');
        let price = cart_item.data('price');
        let additional_price = cart_item.data('additional-price');
        let shipping_fee = cart_item.data('shipping-fee');
        let purchase_cnt = cart_item.data('purchase-cnt');

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
            if (data === 'done' || data.search('done') !== -1) {

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

              cart_item.remove();

              cart_item_cnt -= 1;

              console.log(cart_item_cnt);
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
      } else {
        all_checked = false;
      }
    });

    if (all_checked === true) {
      $('#cart-item-check-all').prop('checked', true);
    } else {
      $('#cart-item-check-all').prop('checked', false);
    }

    total_balance = total_price + total_shipping_fee + total_additional_price;

    $('#total-purchase-cnt').text(total_purchase_cnt + '개');
    $('#total-price').text(get_price_str(total_price) + '원');
    $('#total-additional-price').text(get_price_str(total_additional_price) + '원');
    $('#total-shipping-fee').text(get_price_str(total_shipping_fee) + '원');
    $('#total-balance').text(get_price_str(total_balance) + '원');

  }

  function go_purchase() {
    let formData = new FormData();
    let item_cnt = 0;

    $.each($('.cart-item-all').find('input:checkbox'),function(idx,item) {
      let checked = $(item).prop('checked');
      if (checked === true) {
        let cart_item = $(item).closest('.cart-item');
        let cart_id = cart_item.data('id');
        formData.append('cart_ids[]', cart_id);
        item_cnt += 1;
      }
    });

    if (item_cnt === 0) {
      alert('상품을 선택해주세요.');
      return false;
    }

    $.ajax({
      url: '<?php echo base_url(); ?>home/shop/purchase/add', // form action url
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
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

</script>