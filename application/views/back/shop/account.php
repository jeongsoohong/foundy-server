<style>
  button {
    border: none;
  }
  span.required {
    color: red;
  }
  .panel-body table tr {
    height: 40px;
    font-size: 14px;
    text-align: center;
  }
  .panel-body table tr th {
    text-align: center;
  }
  .panel-body table tr td {
    padding: 3px 5px;
  }
  .panel-body table tr td div {
    padding-left: 5px;
    padding-right: 5px;
    line-height: 32px;
  }
  .worker-info input {
    width: 100%;
  }
  .send-info,.shipping-info {
    text-align: left;
  }
  .send-info input,.send-info button {
    width: 100%;
    height: 32px;
  }
  .send-info input[type='checkbox'] {
    width: auto !important;
    min-width: 10px !important;
  }
  .return-info {
    text-align: left;
  }
  .return-info input,.return-info button {
    width: 100%;
    height: 32px;
  }
  .return-info input[type='checkbox'] {
    width: auto !important;
    min-width: 10px !important;
  }
  .shipping-info input {
    width: 100%;
    height: 32px;
  }
  .shipping-info input[type='checkbox'] {
    width: auto !important;
    min-width: 10px !important;
  }
  .shipping-company-left,.shipping-company-right {
    overflow: auto;
    height: 200px;
    border: 1px solid #EAEAEA;
    padding: 0 !important;
  }
  .shipping-company div div p {
    margin: 0;
    height: 25px;
    line-height: 25px;
  }
  .shipping-company-info .fa {
    width: 20px;
    height: 20px;
    border: 1px solid #EAEAEA;
  }
  .shipping-company-left-item p.selected {
    background-color: #EAEAEA;
  }
  .shipping-company-right-item p.selected {
    background-color: #EAEAEA;
  }
  .header-required {
    color: red;
  }
  .brand-text-base,.brand-text-date {
    text-align: left;
  }
</style>
<div id="content-container">
  <div id="page-title">
    <h1 class="page-header text-overflow">공급사관리</h1>
  </div>
  <div id="page-content">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-bordered">
          <div class="panel-heading">
            <h3 class="panel-title">기본정보</h3>
          </div>
          <div class="panel-body">
            <div class="text-center">
              <table border="1" bordercolor="#EAEAEA" class="col-md-12 col-sm-12 col-xs-12">
                <tbody>
                <tr>
                  <th class="col-md-1 col-sm-1 col-xs-1">이메일</th>
                  <td class="col-md-2 col-sm-2 col-xs-2"><?php echo $shop_data->email; ?></td>
                  <th class="col-md-1 col-sm-1 col-xs-1">브랜드명</th>
                  <td class="col-md-2 col-sm-2 col-xs-2"><?php echo $shop_data->shop_name; ?></td>
                  <th class="col-md-1 col-sm-1 col-xs-1">사업자번호</th>
                  <td class="col-md-2 col-sm-2 col-xs-2"><?php echo $shop_data->business_license_num; ?></td>
                  <th class="col-md-1 col-sm-1 col-xs-1">대표자명</th>
                  <td class="col-md-2 col-sm-2 col-xs-2"><?php echo $shop_data->representative_name; ?></td>
                </tr>
                <tr>
                  <th class="col-md-1 col-sm-1 col-xs-1">업태</th>
                  <td class="col-md-2 col-sm-2 col-xs-2"><?php echo $shop_data->business_conditions; ?></td>
                  <th class="col-md-1 col-sm-1 col-xs-1">업종</th>
                  <td class="col-md-2 col-sm-2 col-xs-2"><?php echo $shop_data->business_type; ?></td>
                  <th class="col-md-1 col-sm-1 col-xs-1">수수료율</th>
                  <td class="col-md-2 col-sm-2 col-xs-2"><?php echo $shop_data->commission_rate; ?>%</td>
                  <th class="col-md-1 col-sm-1 col-xs-1">계약체결일</th>
                  <td class="col-md-2 col-sm-2 col-xs-2"><?php echo $shop_data->contract_at; ?></td>
                </tr>
                <tr>
                  <th class="col-md-1 col-sm-1 col-xs-1">주소</th>
                  <td colspan="7" class="col-md-11 col-sm-11 col-xs-11"><?php echo '('.$shop_data->postcode.')'.' '.$shop_data->address_1.' '.$shop_data->address_2; ?></td>
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
            <h3 class="panel-title">계좌정보</h3>
          </div>
          <div class="panel-body">
            <table border="1" bordercolor="#EAEAEA" class="col-md-12 col-sm-12 col-xs-12">
              <tbody>
              <tr>
                <th class="col-md-2 col-sm-2 col-xs-2">은행</th>
                <td class="col-md-2 col-sm-2 col-xs-2"><?php echo $shop_data->bank_name; ?></td>
                <th class="col-md-2 col-sm-2 col-xs-2">계좌번호</th>
                <td class="col-md-2 col-sm-2 col-xs-2"><?php echo $shop_data->bank_account_num; ?></td>
                <th class="col-md-2 col-sm-2 col-xs-2">예금주</th>
                <td class="col-md-2 col-sm-2 col-xs-2"><?php echo $shop_data->bank_depositor; ?></td>
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
            <h3 class="panel-title">담당자 정보</h3>
          </div>
          <div class="panel-body" id="shop_worker">
            <?php include 'shop_worker.php'; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-bordered">
          <div class="panel-heading">
            <h3 class="panel-title">
              배송정보
              <span class="col-md-1 col-sm-1 col-xs-1 pull-right">
                <button class="shipping-info-save btn-info" onclick="save_send_info();" style="line-height:32px; width:100%; height:32px; font-size: 14px">저장</button>
              </span>
            </h3>
          </div>
          <div class="panel-body" id="shipping_info">
            <?php include 'shop_shipping.php'; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-bordered">
          <div class="panel-heading">
            <h3 class="panel-title">
              반품정보
              <span class="col-md-1 col-sm-1 col-xs-1 pull-right">
                <button class="return-info-save btn-info" onclick="save_return_info();" style="line-height:32px; width:100%; height:32px; font-size: 14px">저장</button>
              </span>
            </h3>
          </div>
          <div class="panel-body" id="return_info">
            <?php include 'shop_return.php'; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-bordered">
          <div class="panel-heading">
            <h3 class="panel-title">
              브랜드 추가설정
              <span class="col-md-1 col-sm-1 col-xs-1 pull-right">
                <button class="brand-info-save btn-info" onclick="save_brand_info()" style="line-height:32px; width:100%; height:32px; font-size: 14px">저장</button>
              </span>
            </h3>
          </div>
          <div class="panel-body" id="brand_info">
            <?php include 'shop_brand_info.php'; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  function worker_info_update(action,elem,id) {
    var worker;
    var url;
    var msg;
    if (action === 'add') {
      worker = elem.closest('tr');
      url = '<?php echo base_url(); ?>shop/account/worker/add';
      msg = '추가되었습니다';
    } else if (action === 'upd') {
      worker = elem.closest('tr');
      url = '<?php echo base_url(); ?>shop/account/worker/upd';
      msg = '수정되었습니다';
    } else {
      worker = elem.closest('tr');
      url = '<?php echo base_url(); ?>shop/account/worker/del';
      msg = '삭제되었습니다';
    }
  
    $('#loading_set').show();
    
    var formData = new FormData();
    formData.append('worker_id', id);
    formData.append('worker_category', worker.find('.worker_category').val());
    formData.append('worker_name', worker.find('.worker_name').val());
    formData.append('phone', worker.find('.phone').val());
    formData.append('mobile', worker.find('.mobile').val());
    formData.append('email', worker.find('.email').val());

    $.ajax({
      url: url, // form action url
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        $("#loading_set").fadeOut(500);
        if (data == 'done' || data.search('done') !== -1) {
          $.notify({
            message: msg,
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
          $("#shop_worker").html(loading_set);
          $("#shop_worker").load("<?php echo base_url()?>shop/account/worker");
        } else {
          // alert(data);
          //$("#shop_worker").load("<?php //echo base_url()?>//shop/account/worker");
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
  function move_shipping_company(from,to) {
    var elem  = $('.shipping-company-'+from).find('.selected');
    var code = elem.attr('data-id');
    var name = elem.attr('data-target');
    // console.log(elem.length);
    if (elem.length > 0) {
      elem.remove();
      $('.shipping-company-'+to).prepend(get_shipping_item_html(code,name,'right'));
    }
  }
  function shipping_company_select(e,lr) {
    // console.log('id: ' + e.attr('data-id') + 'name:' + e.attr('data-target'));
    $('.shipping-company-' + lr).find('p').removeClass('selected');
    e.addClass('selected');
  }
  function get_shipping_item_html(code,name,lr) {
    var item = "<a class=\"shipping-company-" + lr + "-item\" href=\"javascript:void(0);\" >" +
      "<p data-id=\"" + code + "\" data-target=\"" + name + "\" onclick=\"shipping_company_select($(this),'" + lr + "');\">" + name + "</p>" +
      "</a>";
    return item;
  }

  function free_shipping_check(elem) {
    // console.log(elem.attr('id'));
    // console.log(elem.is(':checked'));
    if (elem.attr('id') === 'free-shipping-0') {
      if (elem.is(':checked') === true) {
        $('#free-shipping-1').prop('checked', false);
      } else {
        $('#free-shipping-1').prop('checked', true);
      }
    } else {
      if (elem.is(':checked') === true) {
        $('#free-shipping-0').prop('checked', false);
      } else {
        $('#free-shipping-0').prop('checked', true);
      }
    }

    if ($('#free-shipping-0').is(':checked') === true) {
      $('#shipping-info-total-price').attr('readonly', false);
      $('#shipping-info-cond-price').attr('readonly', false);
    } else {
      $('#shipping-info-total-price').attr('readonly', true);
      $('#shipping-info-cond-price').attr('readonly', true);
    }
  }
  function save_send_info() {
    var send_info_postcode = $('#send-info-postcode').val();
    var send_info_address_1 = $('#send-info-address-1').val();
    var send_info_address_2 = $('#send-info-address-2').val();
    var send_info_phone = $('#send-info-phone').val();
    var free_shipping = $('#free-shipping-1').is(':checked');
    var free_shipping_total_price = $('#shipping-info-total-price').val();
    var free_shipping_cond_price = $('#shipping-info-cond-price').val();
    var shipping_company_list = $('.shipping-company-right').find('p');

    // console.log('(' + send_info_postcode + ') ' + send_info_address_1 + ' ' + send_info_address_2);
    // console.log(send_info_phone);
    // console.log(free_shipping);
    // console.log(shipping_company_list.length);

    $('.send-info-header').removeClass('header-required');
    $('.shipping-info-header').removeClass('header-required');
    $('.shipping-company-header').removeClass('header-required');

    if (send_info_address_2 === '') {
      alert('발송지 주소를 정확히 입력해주세요');
      $('.send-info-header').addClass('header-required');
      return false;
    }
    if (send_info_phone === '') {
      alert('발송지 전화번호를 정확히 입력해주세요');
      $('.send-info-header').addClass('header-required');
      return false;
    }
    if (free_shipping === false) {
      // console.log(free_shipping_total_price);
      // console.log(free_shipping_cond_price);
      if (free_shipping_total_price === '' || free_shipping_total_price === 0) {
        alert('총 사용금액을 입력해주세요');
        $('.shipping-info-header').addClass('header-required');
        $('#shipping-info-total-price').focus();
        return false;
      }
      if (free_shipping_cond_price === '' || free_shipping_cond_price === 0) {
        alert('조건부 무료배송 금액을 입력해주세요');
        $('.shipping-info-header').addClass('header-required');
        $('#shipping-info-cond-price').focus();
        return false;
      }
      // if (free_shipping_total_price < 1000) {
      //   alert('총 사용금액은 최소 1000원 이상으로 입력해주세요');
      //   $('.shipping-info-header').addClass('header-required');
      //   $('#shipping-info-total-price').focus();
      //   return false;
      // }
      // if (free_shipping_cond_price < 100) {
      //   alert('조건부 무료배송 금액은 최소 100원 이상으로 입력해주세요');
      //   $('.shipping-info-header').addClass('header-required');
      //   $('#shipping-info-total-price').focus();
      //   return false;
      // }
    }
    if (shipping_company_list.length === 0) {
      alert('이용택배사를 선택해주세요.');
      $('.shipping-company-header').addClass('header-required');
      return false;
    }

    // console.log(free_shipping);
    if (free_shipping === true) {
      free_shipping = 1;
    } else {
      free_shipping = 0;
    }
  
    $('#loading_set').show();
    
    var formData = new FormData();
    formData.append('send_info_postcode', send_info_postcode);
    formData.append('send_info_address_1', send_info_address_1);
    formData.append('send_info_address_2', send_info_address_2);
    formData.append('send_info_phone', send_info_phone);
    formData.append('free_shipping', free_shipping);
    formData.append('free_shipping_total_price', free_shipping_total_price);
    formData.append('free_shipping_cond_price', free_shipping_cond_price);
    formData.append('shipping_company_count', shipping_company_list.length);

    $.each(shipping_company_list, function(index,item){
      formData.append('shipping_company_code_' + index, $(item).data('id'));
      formData.append('shipping_company_name_' + index, $(item).data('target'));
    });

    $.ajax({
      url: '<?php echo base_url(); ?>shop/account/ship/upd', // form action url
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        $("#loading_set").fadeOut(500);
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
          $("#shipping_info").html(loading_set);
          $("#shipping_info").load("<?php echo base_url()?>shop/account/ship");
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
  function save_return_info() {
    var return_info_postcode = $('#return-info-postcode').val();
    var return_info_address_1 = $('#return-info-address-1').val();
    var return_info_address_2 = $('#return-info-address-2').val();
    var return_info_phone = $('#return-info-phone').val();
    var return_shipping_price = $('#return-shipping-price').val();
    var return_send_shipping_price = $('#return-send-shipping-price').val();

    // console.log('(' + return_info_postcode + ') ' + return_info_address_1 + ' ' + return_info_address_2);
    // console.log(return_info_phone);
    // console.log(return_shipping_price);
    // console.log(return_send_shipping_price);

    if (return_info_address_2 === '') {
      alert('반송지 주소를 정확히 입력해주세요.')
      $('.return-info-header').addClass('header-required');
      return false;
    }
    if (return_info_phone === '') {
      alert('반송지 전화번호를 정확히 입력해주세요.')
      $('.return-info-header').addClass('header-required');
      return false;
    }
    if (return_shipping_price === '') {
      alert('회수택배비를 정확히 입력해주세요.')
      $('.return-price-info-header').addClass('header-required');
      return false;
    }
    if (return_send_shipping_price === '') {
      alert('교환/반품 배송택배비를 정확히 입력해주세요.')
      $('.return-price-info-header').addClass('header-required');
      return false;
    }
    
    $('#loading_set').show();
    
    var formData = new FormData();
    formData.append('return_info_postcode', return_info_postcode);
    formData.append('return_info_address_1', return_info_address_1);
    formData.append('return_info_address_2', return_info_address_2);
    formData.append('return_info_phone', return_info_phone);
    formData.append('return_shipping_price', return_shipping_price);
    formData.append('return_send_shipping_price', return_send_shipping_price);

    $.ajax({
      url: '<?php echo base_url(); ?>shop/account/return/upd', // form action url
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        $("#loading_set").fadeOut(500);
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
          $("#return_info").html(loading_set);
          $("#return_info").load("<?php echo base_url()?>shop/account/return");
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
  function save_brand_info() {
    let brand_text_base = $('#brand_text_base').val();
    if (brand_text_base === '') {
      alert('브랜드 문구를 정확히 입력해주세요.')
      $('.brand-text-base-header').addClass('header-required');
      return false;
    }
    
    $('#loading_set').show();
    
    let formData = new FormData();
    formData.append('brand_text_base', brand_text_base);
    $.ajax({
      url: '<?php echo base_url(); ?>shop/account/brand/upd', // form action url
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        $("#loading_set").fadeOut(500);
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
          $("#brand_info").html(loading_set);
          $("#brand_info").load("<?php echo base_url()?>shop/account/brand");
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
</script>
<script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script>
  var postcode = '<?php echo $shop_data->postcode; ?>';
  var address_1 = '<?php echo $shop_data->address_1; ?>';
  var address_2 = '<?php echo $shop_data->address_2; ?>';

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

        // 사업자 주소와 동일 체크박스를 해제
        $('#' + target + '-info-base-address').prop('checked', false);

        // 우편번호와 주소 정보를 해당 필드에 넣는다.
        $('#' + target + '-info-postcode').attr('value', data.zonecode);
        $('#' + target + '-info-address-1').attr('value', addr + extraAddr);
        $('#' + target + '-info-address-2').attr('readonly', false);
        $('#' + target + '-info-address-2').attr('value','');
        // 커서를 상세주소 필드로 이동한다.
        $('#' + target + '-info-address-2').focus();
      }
    }).open();
  }

  function check_base_address(elem,target) {
    // console.log(elem.is(':checked'));
    if (elem.is(':checked') === true) {
      $('#' + target + '-info-postcode').attr('value',postcode);
      $('#' + target + '-info-address-1').attr('value',address_1);
      $('#' + target + '-info-address-2').attr('value',address_2);
      $('#' + target + '-info-address-2').attr('readonly', true);
    } else {
      $('#' + target + '-info-postcode').attr('value','');
      $('#' + target + '-info-address-1').attr('value','');
      $('#' + target + '-info-address-2').attr('value','');
    }
  }

  $(document).ready(function(){
    $('#datetimepicker1').datetimepicker();
    $('#datetimepicker2').datetimepicker();
  });
</script>

