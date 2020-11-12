<style>
  .purchase-content {
    width: 100%;
    padding-left: 15px;
    padding-right: 15px;
    margin-bottom: 70px;
  }
  .cart-header, .shipping-info-header, .total-balance-header, .pay-agree, .coupon-header {
    border-bottom: 1px solid #EAEAEA;
    height: 40px;
    line-height: 40px;
    /*display: flex;*/
  }
  .total-balance-header {
    border-bottom: 1px solid #353535;
  }
  .total-balance-header span h6 {
    font-size: 18px;
    font-weight: 700;
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
  .shipping-info-tab {
    height: 50px;
    line-height: 50px;
    width: 100%;
    display: flex;
    text-align: center;
  }
  .shipping-base-tab, .shipping-new-tab {
    width: 50%;
    background-color: #BDBDBD;
    color: white;
    /*border-top: 1px solid #BDBDBD;*/
    /*border-left: 1px solid #BDBDBD;*/
    /*border-right: 1px solid #BDBDBD;*/
  }
  .shipping-base-tab.active, .shipping-new-tab.active {
    background-color: white;
    color: #353535;
  }
  .shipping-base-info, .shipping-new-info, .user-info {
    background-color: white;
    width: 100%;
  }
  .shipping-address-btn {
    width: 15px;
    line-height: 15px;
    margin: auto;
  }
  .shipping-address, .shipping-req {
    width: 90%;
    padding: 10px 10px 10px 0;
  }
  .shipping-address-wrap {
    width: 90%;
    padding: 10px 10px 10px 0;
  }
  .shipping-req-direct-input {
    width: 100%;
    padding: 0 10px 10px 0;
  }
  .shipping-info {
    display: flex;
    width: 100%;
  }
  select, .shipping-req-direct-input input {
    height: 35px !important;
    font-size: 12px !important;
  }
  .shipping-new-info, .user-info {
    padding: 10px;
  }
  .shipping-new-info table, .user-info table {
    width: 100%;
  }
  .shipping-new-info table th, .user-info table th {
    width: 20%;
    padding-bottom: 10px;
    vertical-align: top;
  }
  .shipping-new-info table td, .user-info table td {
    width: 80%;
    padding-bottom: 10px;
  }
  .shipping-new-info table td div, .user-info table td div {
    padding-bottom: 10px;
  }
  .shipping-new-info table td input, .user-info table td input {
    height: 35px;
    font-size: 12px;
  }
  .shipping-new-postcode-blk, .shipping-new-address-1, .shipping-new-address-2 {
    width: 100%;
  }
  .shipping-new-postcode-blk {
    display: flex;
  }
  .shipping-new-postcode, .shipping-new-postcode-btn {
    width: 50%;
    padding: 0 !important;
  }
  .user-postcode-blk, .user-address-1, .user-address-2 {
    width: 100%;
  }
  .user-postcode-blk {
    display: flex;
  }
  .user-postcode, .user-postcode-btn {
    width: 50%;
    padding: 0 !important;
  }
  .shipping-new-postcode-btn a, .user-postcode-btn a {
    background-color: black;
    color: white;
    text-align: center;
    margin: 0 15px !important;
    border-radius: 10px;
    font-size: 12px;
    height: 35px;
    line-height: 35px;
    display: inline-block;
    width: auto;
    padding: 0 10px;
  }
  .shipping-new-btn {
    width: 100%;
    height: 40px;
    bottom: 0;
    padding: 0 !important;
    text-align: center;
  }
  .shipping-new-btn a button {
    background-color: black;
    font-size: 14px;
    text-align: center;
    height: 40px;
    line-height: 40px;
    color: white;
    margin: auto;
    width: 100px;
  }
  .del-address {
    font-size:12px;
    margin: 0 5px;
    padding: 0 5px;
    color: grey;
    border: 1px solid #EAEAEA;
  }
  .require {
    color: red;
  }
   .coupon-choice {
     width: 100%;
     padding: 10px;
   }
   .total-balance-detail {
     padding: 10px;
     font-size: 14px;
     text-align: center;
   }
</style>
<section class="page-section">
  <div class="container">
    <div class="row">
      <div class="purchase-content">
        <div class="cart-header">
          주문상품 정보
        </div>
        <div class="cart-item-all">
          <?php foreach ($cart_items as $item) { ?>
            <div class="cart-item" data-id="<?php echo $item->cart_id; ?>" data-price="<?php echo $item->item_sell_price; ?>" data-additional-price="<?php echo $item->additional_price;?>" data-shipping-fee="<?php echo $item->shipping_fee; ?>" data-purchase-cnt="<?php echo $item->total_purchase_cnt;?>" data-status="<?php echo $item->product_id->status; ?>"
              <?php if ($item->product_id->status != SHOP_PRODUCT_STATUS_ON_SALE) echo 'style="color: grey;"'; ?>>
              <div class="cart-item-info">
                <div class="item-name">
                  <span class="item-brand"><?php echo $item->shop->shop_name.' '; ?></span><?php echo $item->product->item_name; ?>
                </div>
<!--                <div class="item-name"></div>-->
                <div class="item-price" >
                  [가격]
                  <?php echo $this->crud_model->get_price_str($item->total_price); ?>원
                  <?php echo '('.$this->crud_model->get_price_str($item->item_sell_price).'원*'.$item->total_purchase_cnt.'개)'; ?>
                </div>
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
                  $opt_str .= '[배송비]';
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
        <div class="shipping-info-header">
          구매자 정보
        </div>
        <div class="user-info" id="user-info">
          <p style="color: saddlebrown; text-align: center;">
            <span style="color:red;">*</span>
            <span style="font-size: 10px"> 구매 취소 / 배송 조회 / 알림 등을 위해서 정확히 입력바랍니다.</span>
            <span style="color:red;">*</span>
          </p>
          <?php include 'purchase_user_info.php'; ?>
        </div>
        <div class="shipping-info-header">
          배송정보
        </div>
        <div class="shipping-info-tab">
          <div class="shipping-base-tab <?php if ($shipping_info_cnt) echo 'active'; ?>">
            <a href="javascript:void(0);" id="shipping-base-tab" onclick="change_shipping_info_tab($(this))" data-target="base">
              기존 배송지
            </a>
          </div>
          <div class="shipping-new-tab <?php if (!$shipping_info_cnt) echo 'active'; ?>">
            <a href="javascript:void(0);" id="shipping-new-tab" onclick="change_shipping_info_tab($(this))" data-target="new">
              신규 배송지
            </a>
          </div>
        </div>
        <div class="shipping-base-info" id="shipping-base-info" style="display: none">
          <?php include 'shipping_address.php'; ?>
        </div>
        <div class="shipping-new-info" id="shipping-new-info" style="display: none">
          <?php include 'shipping_address_new.php'; ?>
        </div>
        <div class="coupon-header">
          쿠폰
        </div>
        <div class="coupon-choice">
          <select class="form-control" id="coupon-select" onchange="get_coupon_info()">
            <option value="0">선택안함</option>
            <?php foreach ($coupons as $coupon) { ?>
              <option value="<?php echo $coupon->user_coupon_id; ?>">
                <?php echo $coupon->coupon_benefit; ?><?php echo ($coupon->coupon_type == COUPON_TYPE_SHOP_DISCOUNT_PERCENT ? '%' : '원'); ?> 할인
                (<?php echo $coupon->coupon_title; ?>)
              </option>
            <?php } ?>
          </select>
        </div>
        <div class="total-balance-header">
          결제금액<span class="pull-right"><h6 id="total-balance"><?php echo $this->crud_model->get_price_str($purchase_info->total_balance); ?>원</h6></span>
        </div>
        <div class="total-balance-detail">
          <span id="total-balance-detail"><?php echo $this->crud_model->get_price_str($purchase_info->total_balance); ?>원</span> - <span id="coupon-discount">0원</span>
        </div>
        <div class="pay-agree">
          <label style="text-align:left">
            <input class='form-checkbox' id="pay-agree-checkbox" name="pay-agree" type="checkbox" value="1">
            주문하실 상품 및 결제/주문정보를 확인하였으며, 이에 동의합니다(필수)
          </label>
        </div>
      </div>
      <div class="col-md-12 item-purchase-btn" id="item-purchase-btn">
        <a href="javascript:void(0)" onclick="make_payment()">
          <h6>결제하기</h6>
        </a>
      </div>
    </div>
  </div>
</section>
<div id="layer" style="display:none;position:fixed;overflow:hidden;z-index:1000;-webkit-overflow-scrolling:touch;">
<!--<img src="//i1.daumcdn.net/localimg/localimages/07/postcode/320/close.png" id="btnCloseLayer" style="cursor:pointer;position:absolute;left:0px;top:0px;z-index:1" onclick="closeDaumPostcode()" alt="닫기 버튼">-->
  <button id="btnCloseLayer" style="cursor:pointer;position:absolute;width:20vw;height:40px;color:white;background-color:black;border:none;left:40vw;bottom:30px;z-index:1" onclick="closeDaumPostcode()" alt="닫기 버튼">닫기</button>
</div>

<script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script src="https://cdn.bootpay.co.kr/js/bootpay-3.2.6.min.js" type="application/javascript"></script>
<script>
  //let total_balance = '<?php //echo $total_balance; ?>//';
  let address_cnt = <?php echo $shipping_info_cnt; ?>;
  let total_balance = '<?php echo $purchase_info->total_balance; ?>';
  let purchase_code = '<?php echo $purchase_info->purchase_code; ?>';
  let is_canceled = false;
  let is_done = false;
  let discount_type = <?php echo COUPON_TYPE_DEFAULT; ?>;
  let discount = 0;
  let user_coupon_id = 0;

  function del_address(e) {
    $('#loading_set').show();
    let id = e.data('id');
    let formData = new FormData();
    formData.append('id', id);
    $.ajax({
      url: '<?php echo base_url(); ?>home/shop/shipping/del', // form action url
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

          let loading_set = '<div style="text-align:center;width:100%;height:'+(top*2)+'px; position:relative;top:'+top+'px;"><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i></div>';
          $("#shipping-base-info").html(loading_set);
          $('#shipping-base-info').load("<?php echo base_url().'home/shop/shipping';?>");

          address_cnt -= 1;
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

  function change_shipping_info_tab(e) {
    let target = e.data('target');
    let max_cnt = <?php echo SHOP_SHIPPING_ADDRESS_MAX_CNT; ?>;

    if (target === 'new' && address_cnt >= max_cnt) {
      alert('최대 3개까지 등록가능합니다.');
      return false;
    }

    if (target === 'base' && address_cnt === 0) {
      alert('저장된 배송지가 없습니다.');
      return false;
    }

    $('.shipping-info-tab').find('div').removeClass('active');
    $('.shipping-' + target + '-tab').addClass('active');
    if (target === 'base') {
      $('#shipping-base-info').show();
      $('#shipping-new-info').hide();
    } else {
      $('#shipping-base-info').hide();
      $('#shipping-new-info').show();
    }

    return true;
  }

  // 우편번호 찾기 화면을 넣을 element
  var element_layer = document.getElementById('layer');
  function closeDaumPostcode() {
    // iframe을 넣은 element를 안보이게 한다.
    element_layer.style.display = 'none';
  }
  
  function search_address(target) {
    
    new daum.Postcode({
      oncomplete: function(data) {
        // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.
      
        // 각 주소의 노출 규칙에 따라 주소를 조합한다.
        // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
        var addr = ''; // 주소 변수
        var extraAddr = ''; // 참고항목 변수
      
        //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
        if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
          addr = data.roadAddress;
        } else { // 사용자가 지번 주소를 선택했을 경우(J)
          addr = data.jibunAddress;
        }
      
        // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
        if(data.userSelectedType === 'R'){
          // 법정동명이 있을 경우 추가한다. (법정리는 제외)
          // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
          if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
            extraAddr += data.bname;
          }
          // 건물명이 있고, 공동주택일 경우 추가한다.
          if(data.buildingName !== '' && data.apartment === 'Y'){
            extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
          }
          // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
          if(extraAddr !== ''){
            extraAddr = ' (' + extraAddr + ')';
          }
          // 조합된 참고항목을 해당 필드에 넣는다.
          // document.getElementById("return-info-extra-address").value = extraAddr;
        
        } else {
          // document.getElementById("return-info-extra-address").value = '';
        }
      
        // 우편번호와 주소 정보를 해당 필드에 넣는다.
        $('#' + target + 'postcode').attr('value', data.zonecode);
        $('#' + target + 'address-1').attr('value', addr + extraAddr);
        $('#' + target + 'address-2').attr('readonly', false);
        $('#' + target + 'address-2').attr('value','');
        // 커서를 상세주소 필드로 이동한다.
        $('#' + target + 'address-2').focus();
  
        // iframe을 넣은 element를 안보이게 한다.
        // (autoClose:false 기능을 이용한다면, 아래 코드를 제거해야 화면에서 사라지지 않는다.)
        element_layer.style.display = 'none';
      },
      width: '100%',
      height: '100%'
    }).embed(element_layer);
    
    // iframe을 넣은 element를 보이게 한다.
    element_layer.style.display = 'block';
  
    // iframe을 넣은 element의 위치를 화면의 가운데로 이동시킨다.
    initLayerPosition();
  }

  // 브라우저의 크기 변경에 따라 레이어를 가운데로 이동시키고자 하실때에는
  // resize이벤트나, orientationchange이벤트를 이용하여 값이 변경될때마다 아래 함수를 실행 시켜 주시거나,
  // 직접 element_layer의 top,left값을 수정해 주시면 됩니다.
  function initLayerPosition(){
    let width = 100; //우편번호 서비스가 들어갈 element의 width
    let height = 100; //우편번호 서비스가 들어갈 element의 height
    // let borderWidth = 5; //샘플에서 사용하는 border의 두께
  
    // 위에서 선언한 값들을 실제 element에 넣는다.
    element_layer.style.width = width + '%';
    element_layer.style.height = height + '%';
    // element_layer.style.border = borderWidth + 'px solid';
    // 실행되는 순간의 화면 너비와 높이 값을 가져와서 중앙에 뜰 수 있도록 위치를 계산한다.
    // element_layer.style.left = (((window.innerWidth || document.documentElement.clientWidth) - width)/2 - borderWidth) + 'px';
    // element_layer.style.top = (((window.innerHeight || document.documentElement.clientHeight) - height)/2 - borderWidth) + 'px';
    element_layer.style.left = 0;
    element_layer.style.top = 0;
  }
  
  function check_direct_input(e) {
    if (e.find('option:selected').val() === '<?php echo SHOP_SHIPPING_REQ_DIRECT_INPUT; ?>') {
      e.closest('.shipping-address-wrap').find('.shipping-req-direct-input').css('display', 'flex');
      e.prop('disabled', true);
    } else {
      e.closest('.shipping-address-wrap').find('.shipping-req-direct-input').hide();
    }
  }
  function hide_direct_input(e) {
    e.closest('.shipping-req-direct-input').hide();
    e.closest('.shipping-address-wrap').find('.shipping-req select').prop('disabled', false);
    e.closest('.shipping-address-wrap').find('.shipping-req select option:selected').prop('selected', false);
  }
  function check_direct_input_new(e) {
    if (e.find('option:selected').val() === '<?php echo SHOP_SHIPPING_REQ_DIRECT_INPUT; ?>') {
      e.closest('table').find('.shipping-new-req-direct-input').css('display', 'flex');
      e.prop('disabled', true);
    } else {
      e.closest('table').find('.shipping-new-req-direct-input').hide();
    }
  }
  function hide_direct_input_new(e) {
    e.closest('.shipping-new-req-direct-input').hide();
    e.closest('table').find('.shipping-new-req select').prop('disabled', false);
    e.closest('table').find('.shipping-new-req select option:selected').prop('selected', false);
  }

  function submit_new_address() {
    let address_name = $('#address-name').val();
    let receiver_name = $('#receiver-name').val();
    let postcode = $('#postcode').val();
    let address_1 = $('#address-1').val();
    let address_2 = $('#address-2').val();
    let phone_1 = $('#phone-1').val();
    let phone_2 = $('#phone-2').val();
    let shipping_req = $('#shipping-new-req').find('option:selected').text();
    let shipping_req_code = $('#shipping-new-req').find('option:selected').val();

    if (address_name === '' || receiver_name === '' ||
      postcode === '' || address_1 === '' ||
      address_2 === '' || phone_1 === '') {
      alert('배송지 필수 정보를 입력해주세요.');
      return false;
    }

    if (shipping_req_code === '<?php echo SHOP_SHIPPING_REQ_DIRECT_INPUT; ?>') {
      // console.log($('#shipping-new-req-direct-input').val());
      shipping_req = $('#shipping-new-req-direct-input').val();
    }
    
    $('#loading_set').show();

    let formData = new FormData();
    formData.append('address_name', address_name);
    formData.append('receiver_name', receiver_name);
    formData.append('postcode', postcode);
    formData.append('address_1', address_1);
    formData.append('address_2', address_2);
    formData.append('phone_1', phone_1);
    formData.append('phone_2', phone_2);
    formData.append('shipping_req', shipping_req);
    formData.append('shipping_req_code', shipping_req_code);

    $.ajax({
      url: '<?php echo base_url(); ?>home/shop/shipping/add', // form action url
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        $("#loading_set").fadeOut(500);
        if (data === 'done' || data.search('done') !== -1) {
          // let text = '<strong>성공하였습니다</strong>';
          // notify(text,'success','bottom','right');

          let loading_set = '<div style="text-align:center;width:100%;height:'+(top*2)+'px; position:relative;top:'+top+'px;"><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i></div>';
          $("#shipping-base-info").html(loading_set);
          $('#shipping-base-info').load("<?php echo base_url().'home/shop/shipping';?>");
          $("#shipping-new-info").html(loading_set);
          $('#shipping-new-info').load("<?php echo base_url().'home/shop/shipping/new';?>");

          $('#shipping-new-info').hide();
          $('#shipping-base-info').show();

          $('.shipping-new-tab').removeClass('active');
          $('.shipping-base-tab').addClass('active');

          address_cnt += 1;

        } else {
          let text = '<strong>실패하였습니다</strong>' + data;
          notify(text,'warning','bottom','right');
        }
      },
      error: function (e) {
        console.log(e)
      }
    });

    return true;
  }

  function make_payment() {

    let user_name = $('#user-name').val();
    let user_phone = $('#user-phone').val();
    let user_email = $('#user-email').val();
    let user_postcode = $('#user-postcode').val();
    let user_address_1 = $('#user-address-1').val();
    let user_address_2 = $('#user-address-2').val();
    let user_save = $('#purchase-user-agree-checkbox').prop('checked');
    let user_address = '';

    if (user_postcode !== '' && user_address_1 !== '') {
      user_address = '(' + user_postcode + ')' + ' ' + user_address_1 + ' ' + user_address_2;
    }

    if (user_name === '' || user_phone === '' || user_email === '') {
      alert('구매자 필수 정보(이름/연락처/이메일)를 입력해주세요.');
      return false;
    }

    if (isValidEmailAddress(user_email) === false) {
      alert('구매자 이메일 정보를 정확히 입력해주세요.');
      return false;
    }

    if ($('#pay-agree-checkbox').prop('checked') === false) {
      alert('결제/주문정보를 확인하고 동의해 주십시요.');
      return false;
    }

    let checked = false;
    $.each($('#shipping-base-info').find('input:radio'), function(idx,item) {
      // console.log($(item).prop('checked'));
      if ($(item).prop('checked') === true) {
        checked = true;
      }
    });

    if (checked === false) {
      alert('배송지를 선택해 주세요.');
      return false;
    }
  
    function purchase_cancel() {
      if (is_canceled === true || is_done === true) {
        return false;
      }
      
      $('#loading_set').show();

      let formData = new FormData();
      formData.append('purchase_code', purchase_code);
      $.ajax({
        url: '<?php echo base_url(); ?>home/shop/purchase/canceled', // form action url
        type: 'POST', // form submit method get/post
        dataType: 'html', // request type html/json/xml
        data: formData, // serialize form data
        cache: false,
        contentType: false,
        processData: false,
        success: function (msg) {
          $("#loading_set").fadeOut(500);
          if (msg === 'done' || msg.search('done') !== -1) {
            console.log(msg);
          } else {
            console.log(msg);
          }

          alert('결제가 취소되었습니다');
          window.location.href = '<?php echo base_url();?>home/shop/purchase';

        },
        error: function (e) {
          console.log(e)
        }
      });
      is_canceled = true;
    }
  
    let items = [
      <?php foreach ($cart_items as $item) {
      echo "{
          item_name: '{$item->product->item_name}',
          qty: {$item->total_purchase_cnt},
          unique: '{$item->product->product_code}',
          price: {$item->product->item_sell_price},
          cat1: '{$this->crud_model->get_product_category_str($item->product->item_cat, 1)}',
          cat2: '{$this->crud_model->get_product_category_str($item->product->item_cat, 2)}',
          cat3: '{$this->crud_model->get_product_category_str($item->product->item_cat, 3)}'
          },";
    }?>
    ];
  
    let user_info = {
      username: user_name,
      email: user_email,
      addr: user_address,
      phone: user_phone
    }
  
    $('#loading_set').show();
  
    let formData = new FormData();
    formData.append('purchase_code', purchase_code);
    formData.append('username', user_name);
    formData.append('phone', user_phone);
    formData.append('email', user_email);
    formData.append('postcode', user_postcode);
    formData.append('address_1', user_address_1);
    formData.append('address_2', user_address_2);
    formData.append('user_save', user_save === true ? '1' : '0');
    formData.append('discount', discount);
    formData.append('user_coupon_id', user_coupon_id);

    let ret = true;
    $.ajax({
      url: '<?php echo base_url(); ?>home/shop/purchase/paying', // form action url
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function (msg) {
        is_canceled = false;
        if (msg === 'done' || msg.search('done') !== -1) {
          console.log(msg);
        } else {
          $("#loading_set").fadeOut(500);
          alert(msg);
          window.location.href = '<?php echo base_url();?>home/shop/cart';
          return false;
        }
      },
      error: function (e) {
        console.log(e)
      }
    });

    let shipping_info = $('.shipping-base-info').find('input:checked').closest('.shipping-info');
    let shipping_address_id = shipping_info.find('.shipping-address a').data('id');
    let shipping_req_code = shipping_info.find('select option:selected').val();
    let shipping_req = shipping_info.find('select option:selected').text();

    if (shipping_req_code === '<?php echo SHOP_SHIPPING_REQ_DIRECT_INPUT; ?>') {
      // console.log($('#shipping-new-req-direct-input').val());
      shipping_req = shipping_info.find('.shipping-req-direct-input input').val();
    } else if (shipping_req_code === '<?php echo SHOP_SHIPPING_REQ_DEFAULT;?>') {
      shipping_req = '';
    }

    let receiver_info = {
      address_id : shipping_address_id,
      shipping_req_code : shipping_req_code,
      shipping_req: shipping_req,
    }

    let sender_info = {
      username: user_name,
      email: user_email,
      phone: user_phone,
      address_1: user_address_1,
      address_2: user_address_2,
      postcode: user_postcode,
    }

    let purchase_info = {
      purchase_code : purchase_code,
      total_balance : total_balance,
      discount : discount,
      user_coupon_id : user_coupon_id
    }

    // console.log(shipping_info);
    // console.log(shipping_address_id);
    // console.log(shipping_req_code);
    // console.log(shipping_req);

    BootPay.request({
      price: total_balance - discount,
      application_id: "5ee197af8f0751001e4f2562",
      name: '<?php echo $cart_items[0]->product->item_name.' 등 '.count($cart_items).' 건'; ?>',
      pg: 'inicis',
      method: 'card',
      show_agree_window: 0,
      items: items,
      user_info: user_info,
      order_id: purchase_code, //고유 주문번호로, 생성하신 값을 보내주셔야 합니다.
      params: {purchase_info: purchase_info, receiver_info: receiver_info, sender_info: sender_info},
      account_expire_at: '',
      extra: {
        start_at: '',
        end_at: '',
        vbank_result: 0,
        quota: '0,2,3,4,5,6'
      }
    }).error(function (data) {
      $("#loading_set").fadeOut(500);
      alert('문제가 발생했습니다 - ' + data);
      console.log('error : ' + data);
    }).cancel(function (data) {
      $("#loading_set").fadeOut(500);
      console.log('cancel : ' + data);
      purchase_cancel();
    }).ready(function (data) {
      console.log('ready :' + data);
    }).confirm(function (data) {

      //결제가 실행되기 전에 수행되며, 주로 재고를 확인하는 로직이 들어갑니다.
      //주의 - 카드 수기결제일 경우 이 부분이 실행되지 않습니다.

      var enable = true; // 재고 수량 관리 로직 혹은 다른 처리
      if (data.params.purchase_info.total_balance !== total_balance) {
        enable = false;
      } else if (data.params.purchase_info.discount !== discount) {
          enable = false;
      } else if (data.params.purchase_info.purchase_code !== purchase_code) {
        enable = false;
      }

      // console.log('confirm : ' + data);

      if (enable) {

        let formData = new FormData();
        formData.append('purchase_code', purchase_code);
        formData.append('bootpay_confirmed_data', JSON.stringify(data));

        $.ajax({
          url: '<?php echo base_url(); ?>home/shop/purchase/confirm', // form action url
          type: 'POST', // form submit method get/post
          dataType: 'html', // request type html/json/xml
          data: formData, // serialize form data
          cache: false,
          contentType: false,
          processData: false,
          success: function (msg) {
            if (msg === 'done' || msg.search('done') !== -1) {
              BootPay.transactionConfirm(data);
            } else {
              BootPay.removePaymentWindow();

              let text = '<strong>결제를 실패하였습니다. 관리자에게 문의 바랍니다.</strong>' + msg;
              notify(text,'warning','bottom','right');
            }
          },
          error: function (e) {
            console.log(e)
          }
        });

      } else {
        BootPay.removePaymentWindow();
        let text = '<strong>결제를 실패하였습니다. 관리자에게 문의 바랍니다.</strong>';
        notify(text,'warning','bottom','right');
      }

    }).close(function (data) {
      // 결제창이 닫힐때 수행됩니다. (성공,실패,취소에 상관없이 모두 수행됨)
      $("#loading_set").fadeOut(500);
      console.log('close : ' + data);
      if (is_done === false) {
        purchase_cancel();
      }
    }).done(function (data) {
      // console.log('done : ' + data);
  
      //결제가 정상적으로 완료되면 수행됩니다
      //비즈니스 로직을 수행하기 전에 결제 유효성 검증을 하시길 추천합니다.
      let formData = new FormData();
      formData.append('purchase_code', purchase_code);
      formData.append('bootpay_done_data', JSON.stringify(data));

      $.ajax({
        url: '<?php echo base_url(); ?>home/shop/purchase/done', // form action url
        type: 'POST', // form submit method get/post
        dataType: 'html', // request type html/json/xml
        data: formData, // serialize form data
        cache: false,
        contentType: false,
        processData: false,
        success: function (msg) {
          $("#loading_set").fadeOut(500);
          if (msg=== 'done' || msg.search('done') !== -1) {
            window.location.href = '<?php echo base_url();?>home/shop/purchase/complete?c=<?php echo $purchase_info->purchase_code; ?>';
          } else {
            // alert('결제 도중 문제가 발생하였습니다. 관리자에게 문의 바랍니다')
            let text = '<strong>실패하였습니다</strong>' + msg;
            notify(text,'warning','bottom','right');
          }
        },
        error: function (e) {
          console.log(e)
        }
      });

      is_done = true;
    });
  }
  
  function get_coupon_info() {
    let id = $('#coupon-select').find('option:selected').val();
    // console.log(user_coupon_id);
    
    $.ajax({
      url: '<?php echo base_url(); ?>home/coupon/get?id=' + id, // form action url
      type: 'GET', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      cache: false,
      contentType: false,
      processData: false,
      success: function (msg) {
        // console.log(msg);
        msg = JSON.parse(msg);
        if (msg.status === 'success') {
          discount_type = msg.coupon.coupon_type;
          if (discount_type === <?php echo COUPON_TYPE_SHOP_DISCOUNT_PRICE; ?>) {
            discount = msg.coupon.coupon_benefit;
          } else {
            discount = parseInt(parseInt(total_balance * msg.coupon.coupon_benefit / 100) / 10) * 10;
          }
          user_coupon_id = id;
          // console.log(discount_type);
          // console.log(discount);
          
          $('#coupon-discount').text(get_price_str(discount) + '원');
          $('#total-balance').text(get_price_str(total_balance - discount) + '원');
        } else {
          alert(msg.message);
          $('#coupon-select').find('option:selected').prop('selected', false);
        }
      },
      error: function (e) {
        console.log(e)
      }
    });
  }

  $(document).ready(function() {
    <?php if ($shipping_info_cnt) { ?>
    $('#shipping-base-tab').click();
    <?php } else { ?>
    $('#shipping-new-tab').click();
    <?php } ?>
  });
</script>
