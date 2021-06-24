<h3 class="meaning">주문 관리</h3>
<div class="type_wrap">
  <p class="type_tit slide_tit font-futura">Manage Order</p>
  <div class="type_box shadow">
    <div class="type__species">
      <div class="type__line clearfix">
        <div class="line--component media-component">
          <p class="component-name">배송/클레임</p>
          <span class="file_arrow"></span>
          <select class="component-slcwrap form-control media-control" id="shipping-status">
            <optgroup label="배송관련">
              <option disabled hidden <?php if ($ship_status == SHOP_SHIPPING_STATUS_NONE) echo 'selected'; ?>
                value="<?php echo SHOP_SHIPPING_STATUS_NONE; ?>">
                <?php echo $this->shop_model->get_shipping_status_str(SHOP_SHIPPING_STATUS_NONE); ?>
              </option>
              <option <?php if ($ship_status == SHOP_SHIPPING_STATUS_ORDER_COMPLETED) echo 'selected'; ?>
                value="<?php echo SHOP_SHIPPING_STATUS_ORDER_COMPLETED; ?>">
                <?php echo $this->shop_model->get_shipping_status_str(SHOP_SHIPPING_STATUS_ORDER_COMPLETED); ?>
              </option>
              <option <?php if ($ship_status == SHOP_SHIPPING_STATUS_PREPARE) echo 'selected'; ?>
                value="<?php echo SHOP_SHIPPING_STATUS_PREPARE; ?>">
                <?php echo $this->shop_model->get_shipping_status_str(SHOP_SHIPPING_STATUS_PREPARE); ?>
              </option>
              <option <?php if ($ship_status == SHOP_SHIPPING_STATUS_IN_PROGRESS) echo 'selected'; ?>
                value="<?php echo SHOP_SHIPPING_STATUS_IN_PROGRESS; ?>">
                <?php echo $this->shop_model->get_shipping_status_str(SHOP_SHIPPING_STATUS_IN_PROGRESS); ?>
              </option>
              <option <?php if ($ship_status == SHOP_SHIPPING_STATUS_COMPLETED) echo 'selected'; ?>
                value="<?php echo SHOP_SHIPPING_STATUS_COMPLETED; ?>">
                <?php echo $this->shop_model->get_shipping_status_str(SHOP_SHIPPING_STATUS_COMPLETED); ?>
              </option>
              <option <?php if ($ship_status == SHOP_SHIPPING_STATUS_PURCHASE_COMPLETED) echo 'selected'; ?>
                value="<?php echo SHOP_SHIPPING_STATUS_PURCHASE_COMPLETED; ?>">
                <?php echo $this->shop_model->get_shipping_status_str(SHOP_SHIPPING_STATUS_PURCHASE_COMPLETED); ?>
              </option>
            </optgroup>
            <optgroup label="클레임관련">
              <option <?php if ($ship_status == SHOP_SHIPPING_STATUS_ORDER_CANCELED) echo 'selected'; ?>
                value="<?php echo SHOP_SHIPPING_STATUS_ORDER_CANCELED; ?>">
                <?php echo $this->shop_model->get_shipping_status_str(SHOP_SHIPPING_STATUS_ORDER_CANCELED); ?>
              </option>
              <option <?php if ($ship_status == SHOP_SHIPPING_STATUS_PURCHASE_CANCELING) echo 'selected'; ?>
                value="<?php echo SHOP_SHIPPING_STATUS_PURCHASE_CANCELING; ?>">
                <?php echo $this->shop_model->get_shipping_status_str(SHOP_SHIPPING_STATUS_PURCHASE_CANCELING); ?>
              </option>
              <option <?php if ($ship_status == SHOP_SHIPPING_STATUS_PURCHASE_CANCELED) echo 'selected'; ?>
                value="<?php echo SHOP_SHIPPING_STATUS_PURCHASE_CANCELED; ?>">
                <?php echo $this->shop_model->get_shipping_status_str(SHOP_SHIPPING_STATUS_PURCHASE_CANCELED); ?>
              </option>
              <option <?php if ($ship_status == SHOP_SHIPPING_STATUS_PURCHASE_CHANGING) echo 'selected'; ?>
                value="<?php echo SHOP_SHIPPING_STATUS_PURCHASE_CHANGING; ?>">
                <?php echo $this->shop_model->get_shipping_status_str(SHOP_SHIPPING_STATUS_PURCHASE_CHANGING); ?>
              </option>
              <option <?php if ($ship_status == SHOP_SHIPPING_STATUS_PURCHASE_CHANGED) echo 'selected'; ?>
                value="<?php echo SHOP_SHIPPING_STATUS_PURCHASE_CHANGED; ?>">
                <?php echo $this->shop_model->get_shipping_status_str(SHOP_SHIPPING_STATUS_PURCHASE_CHANGED); ?>
              </option>
            </optgroup>
          </select>
        </div>
        <div class="line--component clearfix">
          <p class="component-name">검색정보</p>
          <div class="component-slcwrap component-slcbox" style="float: left;">
            <span class="file_arrow" style="right: unset; left: 84px;"></span>
            <select class="query-opt form-control gray_bg gray_txt" disabled>
              <option value="1">주문번호</option>
              <option value="2">주문자명</option>
              <option value="3">수취인명</option>
              <option value="4">상품코드</option>
              <option value="5">상품명</option>
              <option value="6">주문자번화번호</option>
              <option value="7">수취인전화번호</option>
            </select>
            <input class="query form-control media-search gray_bg gray_txt" value="" type="text" name="order-search" alt="" maxlength="32" placeholder="검색정보를 입력하세요" disabled>
            <button class="slcsearch" id="manageSearch" onclick="search_order_page()">검색</button>
            <button class="btn_elements" id="manageExcel" onclick="download_excel()" style="background-color: #4caf50;">엑셀로 다운로드</button>
          </div>
        </div>
      </div>
      <div class="type__line clearfix">
        <div class="line--component media-component">
          <p class="component-name">브랜드</p>
          <span class="file_arrow"></span>
          <select class="component-slcwrap form-control media-control" id="shop-id">
            <option value="0" disabled selected hidden>브랜드선택</option>
            <? foreach ($shops as $shop) { ?>
              <option value="<?= $shop->shop_id ?>"
                <? if(isset($shop_data) == true && $shop->shop_id == $shop_data->shop_id) echo 'selected'; ?>>
                <?= $shop->shop_name; ?>
              </option>
            <? } ?>
          </select>
        </div>
        <div class="line--component payout--compo" style="position: relative;">
          <p class="component-name">결제 / 출고일</p>
          <div class="data_box payout_box clearfix">
            <div class="data_function">
              <div class="container">
                <div class="form-group">
                  <div class="input-group date start_date" id="datetimepicker1">
                    <input value="<?= $start_date; ?>" type="text" class="form-control" id="start-date" placeholder="시작날짜">
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <span class="data_hyphen">-</span>
            <div class="data_function">
              <div class="container">
                <div class="form-group">
                  <div class="input-group date end_date" id="datetimepicker2">
                    <input value="<?= $end_date; ?>" type="text" class="form-control" id="end-date" placeholder="종료날짜">
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="order_delay">
            <div class="chkType chkTd">
              <input <? if ($confirm_delay) echo 'checked'; ?> class="chkPiece orderPiece" id="confirm-delay" type="checkbox"
              onchange="check_confirm()">
              <label class="chkLabel orderLabel">
              </label>
            </div>
            <span class="order_confirm"> 주문확인지연</span>
          </div>
        </div>
      </div>
    </div>
    <div class="type__table" id="order_table">
    </div>
  </div>
</div>
<script>
  $(function(){
    $('.list_tableBtns button').hover(function(){
      // btn__front,back
      $(this).addClass('listActive');
      $(this).children('span[class*=front]').css({
        border : '1px solid #433532',
        'border-width' : '0 2px 2px 0'
      });
      $(this).children('span[class*=back]').css({
        border : '1px solid #433532',
        'border-width' : '0 2px 2px 0'
      });
      $(this).next().css('border-left','0');
    },function(){
      // btn__front,back
      $(this).removeClass('listActive');
      $(this).children('span[class*=front]').css({
        border : '1px solid #e0e0e0',
        'border-width' : '0 2px 2px 0'
      });
      $(this).children('span[class*=back]').css({
        border : '1px solid #e0e0e0',
        'border-width' : '0 2px 2px 0'
      });
      $(this).next().css('border-left','1px solid #e0e0e0');
      $(this).next('.btn__listNo').css('border','0');
    });
    $('.orderPiece').click(function(){
      let chk = $(this).prop('checked');
    
      if(chk === true) {
        $(this).next().hasClass('toggleChk');
      }
      else {
        $(this).next().removeClass('toggleChk');
      }
    });
    $('#datetimepicker1').datetimepicker();
    $('#datetimepicker2').datetimepicker();
  });
  
  function check_confirm() {
    let target = $('#confirm-delay');
    if (target.prop('checked') === true) {
      target.next().addClass('toggleChk');
    } else {
      target.next().removeClass('toggleChk');
    }
  }

  // shop_order
  var shop_id = 0;
  var ship_status = <?= SHOP_SHIPPING_STATUS_NONE; ?>;
  var next_status = <?= SHOP_SHIPPING_STATUS_NONE; ?>;
  var start_date = '';
  var end_date = '';
  var confirm_delay = 0;
  var cur_page = 0;
  function get_order_list_internal(p,id,st,sd,ed,cd) {
    let url = encodeURI("<?php echo base_url();?>master/shop/order/list?page=" + p + "&ship_status=" + st
      + "&start_date=" + sd + "&end_date=" + ed + "&confirm_delay=" + cd + '&shop_id=' + id);
    if (st <= 0) {
      alert('주문상태를 선택해주세요.');
      return false;
    }
    if (id <= 0) {
      alert('브랜드를 선택해주세요.');
      return false;
    }
    get_page2('order_table', url);
  }

  function get_order_list(page) {
    //console.log(page);
    //console.log(shop_id);
    //console.log(ship_status);
    //console.log(start_date);
    //console.log(end_date);
    //console.log(confirm_delay);
    //let url = encodeURI("<?php //echo base_url();?>//master/shop/order/list?page=" + page + "&ship_status=" + ship_status
    //  + "&start_date=" + start_date + "&end_date=" + end_date + "&confirm_delay=" + confirm_delay + '&shop_id=' + shop_id);
    //get_page2('order_table', url);
    get_order_list_internal(page, shop_id, ship_status, start_date, end_date, confirm_delay);
  }
  
  function download_excel() {
    let _st = parseInt($('#shipping-status').find('option:selected').val());
    let _id = parseInt($('#shop-id').find('option:selected').val());
    let _sd = $('#start-date').val();
    let _ed = $('#end-date').val();
    let _cd = ($('#confirm-delay').prop('checked') === true ? '1' : '0');
    let _url = encodeURI("<?php echo base_url();?>master/shop/order/excel/info?ship_status=" + _st
      + "&start_date=" + _sd + "&end_date=" + _ed + "&confirm_delay=" + _cd + '&shop_id=' + _id);
    if (_st <= 0) {
      alert('주문상태를 선택해주세요.');
      return false;
    }
    if (_id <= 0) {
      alert('브랜드를 선택해주세요.');
      return false;
    }
    get_page2('fd-infoExcel', _url, true, function() {
      $('#fd-infoExcel').show();
    });
  }
  function do_download_excel() {
    let _st = parseInt($('#shipping-status').find('option:selected').val());
    let _id = parseInt($('#shop-id').find('option:selected').val());
    let _sd = $('#start-date').val();
    let _ed = $('#end-date').val();
    let _cd = ($('#confirm-delay').prop('checked') === true ? '1' : '0');
    let _url = encodeURI("<?php echo base_url();?>master/shop/order/excel/download?ship_status=" + _st
      + "&start_date=" + _sd + "&end_date=" + _ed + "&confirm_delay=" + _cd + '&shop_id=' + _id);
    if (_st <= 0) {
      alert('주문상태를 선택해주세요.');
      return false;
    }
    if (_id <= 0) {
      alert('브랜드를 선택해주세요.');
      return false;
    }
    console.log('download');
    // send_post_data(null, _url, true, function() {
    //   $('#fd-infoExcel').hide();
    // });
  }

  function search_order_page() {
    let _ship_status = parseInt($('#shipping-status').find('option:selected').val());
    let _shop_id = parseInt($('#shop-id').find('option:selected').val());
    let _start_date = $('#start-date').val();
    let _end_date = $('#end-date').val();
    let _confirm_delay = ($('#confirm-delay').prop('checked') === true ? '1' : '0');
    get_order_list_internal(1, _shop_id, _ship_status, _start_date, _end_date, _confirm_delay);
  }

  // 정보보기
  function get_order_info(id) {
    get_page2('fd-itemStatus', "<?php echo base_url()?>master/shop/order/view?id=" + id, true, function() {
      $('#fd-itemStatus').show();
    });
  }

  function check_all(type, checked) {
    let target = $('#'+type+'_chk_all');
    if (checked === true) {
      target.prop('checked', true);
      target.next().addClass('toggleChk')
    } else {
      target.prop('checked', false);
      target.next().removeClass('toggleChk')
    }
    return checked;
  }
  function check_piece(type) {
    let l = get_check_list(type);
    console.log(type);
    console.log(l);
    console.log($('#'+type+'_table_list .chkPiece').length);
    if ($('#'+type+'_table_list .chkPiece').length === l.length) {
      check_all(type, true);
    } else {
      check_all(type, false);
    }
  }
  function get_check_list(type, force = null, check = false) {
    let shipping_infos = Array();
    let idx = 0;
    let validate = true;
    $('#'+type+'_table_list').find('.chkPiece').each(function(i,e) {
      if (force !== null) {
        $(e).prop('checked', force);
      }
      // console.log('i:' + i + ', checked:' + $(e).prop('checked'));
      if ($(e).prop('checked') === true) {
        let purchase_product_id = $(e).data('id');
  
        shipping_infos[idx] = Object();
        shipping_infos[idx].purchase_product_id = purchase_product_id;
  
        if (check === true && ship_status === <?php echo SHOP_SHIPPING_STATUS_PREPARE; ?>) {
          let purchase_code = $(e).closest('tr').find('.purchase-code').data('code');
          let shipping_company = $(e).closest('tr').find('.shipping-company option:selected').val();
          let shipping_code = trim($(e).closest('tr').find('.shipping-code').val());

          console.log(purchase_code);
          console.log(shipping_company);
          console.log(shipping_code);
          if (shipping_company === '0' || shipping_code === '') {
            alert('배송정보를 정확히 입력 바랍니다.(구매번호 : ' + purchase_code + ')');
            validate = false;
            return false;
          }
          if (check_number(shipping_code) === false) {
            alert('운송장번호에는 숫자만 입력가능합니다.(구매번호 : ' + purchase_code + ')');
            validate = false;
            return false;
          }
    
          shipping_infos[idx].shipping_company = shipping_company;
          shipping_infos[idx].shipping_code = shipping_code;
        }
        idx++;
        $(e).next().addClass('toggleChk');
      } else {
        $(e).next().removeClass('toggleChk');
      }
    });
    
    if (validate === false) {
      return null;
    }
    
    console.log(shipping_infos);
  
    if (shipping_infos.length === 0) {
      alert('상품을 선택해 주세요!');
      return null;
    }
  
    return shipping_infos;
  }
  
  function change_status() {
    let shipping_infos = get_check_list('order', null, true);
    if (shipping_infos === null) {
      return false;
    }
  
    let url = '<?php echo base_url(); ?>master/shop/order/update';
    let data = [];
    
    // data['shop_id'] = shop_id;
    data['ship_status'] = ship_status;
    data['next_status'] = next_status;
    data['shipping_infos'] = JSON.stringify(shipping_infos);
  
    // console.log(data);
  
    send_post_data(data, url, function() {
      setTimeout(function(){get_order_list(cur_page);}, 1000);
    }, true);
  }

  // 교환 버튼 클릭시 #fd-changeRecall 호출
  $('#depthChange').click(function(){
    let has = $(this).attr('class');
    let hasLetter = has.indexOf('change');
    // console.log(hasLetter);
    if(hasLetter !== '-1') {
    }
  
    $('#fd-changeRecall').show();
  });
  // 반품 버튼 클릭시 #fd-changeRecall 호출
  $('#depthReturn').click(function(){
    let has = $(this).attr('class');
    let hasLetter = has.indexOf('return');
    // console.log(hasLetter);
    if(hasLetter !== '-1') {
      $('#fd-changeRecall').find('.cnt-tit').text('반품 신청');
    }
  
    $('#fd-changeRecall').show();
  });

  let req_id = 0;
  let req_type = <?php echo SHOP_ORDER_REQ_TYPE_DEFAULT; ?>;
  function open_req_order(id, type) {
    req_id = id;
    req_type = type;
  
    console.log(id);
    console.log(req_type);
    
    if (type === <?php echo SHOP_ORDER_REQ_TYPE_CANCEL; ?>) {
      $('#fd-changeRecall').find('.cnt-tit').text('<?php echo $this->shop_model->get_order_req_type_str(SHOP_ORDER_REQ_TYPE_CANCEL); ?> 신청');
    } else if (type === <?php echo SHOP_ORDER_REQ_TYPE_CHANGE; ?>) {
      $('#fd-changeRecall').find('.cnt-tit').text('<?php echo $this->shop_model->get_order_req_type_str(SHOP_ORDER_REQ_TYPE_CHANGE); ?> 신청');
    } else if (type === <?php echo SHOP_ORDER_REQ_TYPE_RETURN; ?>) {
      $('#fd-changeRecall').find('.cnt-tit').text('<?php echo $this->shop_model->get_order_req_type_str(SHOP_ORDER_REQ_TYPE_RETURN); ?> 신청');
    } else {
      return false;
    }
  
    $('#fd-changeRecall').show();
    return true;
  }

  $('#fd-changeRecall .cnt-close').click(function(){
    close_req();
  });
  function close_req() {
    $('#fd-changeRecall').hide();
  }
  function order_req() {
    let req_reason = $('#req-reason').val();
  
    // console.log(req_id);
    // console.log(req_type);
    // console.log(req_reason);
  
    $('#loading_set').show();
 
    let url = '<?= base_url(); ?>master/shop/order/req';
    let data = [];
    data['req_id'] = req_id;
    data['req_type'] = req_type;
    data['req_reason'] = req_reason;
 
    console.log(data);
    
    send_post_data(data, url, function() {
      close_req();
      setTimeout(function(){get_order_list(cur_page);}, 1000);
    }, true);
  }
  function change_shipping_data(e) {
    let purchase_product_id =  $(e).data('id');
  
    let shipping_data = Object();
    let purchase_code = $(e).closest('tr').find('.purchase-code').data('code');
    let shipping_company = $(e).closest('tr').find('.shipping-company option:selected').val();
    let shipping_code = $(e).closest('tr').find('.shipping-code').val();
    if (shipping_company === '0' || shipping_code === '') {
      alert('배송정보를 정확히 입력 바랍니다.(구매번호 : ' + purchase_code + ')');
      return false;
    }
    if (check_number(shipping_code) === false) {
      alert('운송장번호에는 숫자만 입력가능합니다.(구매번호 : ' + purchase_code + ')');
      return false;
    }
  
    shipping_data.shipping_company = shipping_company;
    shipping_data.shipping_code = shipping_code;
  
    let url = '<?= base_url(); ?>master/shop/order/update/ship';
    let data = [];
    
    data['purchase_product_id'] = purchase_product_id;
    data['shipping_data'] = JSON.stringify(shipping_data);
  
    console.log(data);
  
    send_post_data(data, url, function() {
      close_req();
      setTimeout(function(){get_order_list(cur_page);}, 1000);
    }, true);
  }

  function close_cancel_popup() {
    $('#fd-shop').hide();
  }

  function process_cancel(only_info, cancel_reason = '') {
    let shipping_infos = get_check_list('order', null, false);
    if (shipping_infos === null) {
      return false;
    }
  
    let url = '<?php echo base_url(); ?>master/shop/order/update';
    let data = [];
  
    data['ship_status'] = ship_status;
    data['next_status'] = <?php echo SHOP_SHIPPING_STATUS_ORDER_CANCELED; ?>;
    data['cancel_reason'] = cancel_reason;
    data['only_info'] = only_info === true ? '1' : '0';
    data['shipping_infos'] = JSON.stringify(shipping_infos);
    
    console.log(data);
  
    send_post_data(data, url, function(html) {
      if (only_info) {
        console.log(html);
        $('#cancel-popup-wrap').html(html);
        $('#fd-shop').show();
      } else {
        close_cancel_popup();
        setTimeout(function(){get_order_list(cur_page);}, 1000);
      }
    }, true, true);
  }

  function get_cancel_info() {
    return process_cancel(true);
  }

  function do_cancel() {
    let cancel_reason = $('#cancel-reason').val();
    return process_cancel(false, cancel_reason);
  }

</script>
