<table border="1" bordercolor="#EAEAEA" class="return-info-table col-md-12 col-sm-12 col-xs-12">
  <tbody>
  <tr>
    <th class="col-md-2 col-sm-2 col-xs-2 return-info-header">반송지 정보<span class="required">*</span></th>
    <td class="col-md-10 col-sm-10 col-xs-10 return-info">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-1 col-sm-1 col-xs-1 return-info-search">
          <button class="return-info-postcode-search-btn btn-edit" onclick="search_address('return')" style="padding: 0; font-size:12px;">주소찾기</button>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-1 return-info-postcode">
          <input readonly class="form-control" id="return-info-postcode" type="text" name="postcode" alt="" placeholder="우편번호" value="<?php echo $shop_shipping->return_info_postcode; ?>" />
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4 return-info-address-1">
          <input readonly class="form-control" id="return-info-address-1" type="text" name="address-1" alt="" placeholder="기본주소" value="<?php echo $shop_shipping->return_info_address_1; ?>" />
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4 return-info-address-2">
          <input readonly class="form-control" id="return-info-address-2" type="text" name="address-2" alt="" placeholder="상세주소" value="<?php echo $shop_shipping->return_info_address_2; ?>" />
        </div>
        <div class="col-md-2 col-sm-2 col-xs-2 return-info-checkbox">
          <label style="text-align:left">
            <input class='form-checkbox' id="return-info-base-address" name="base-address" type="checkbox" value="1" onchange="check_base_address($(this),'return');"/>
            사업자 주소와 동일
          </label>
        </div>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-1 col-sm-1 col-xs-1" style="text-align: right">
          전화번호
        </div>
        <div class="col-md-2 col-sm-2 col-xs-2 return-info-phone" style="text-align: left">
          <input class="form-control" id="return-info-phone" type="tel" name="return-info-phone" alt="" placeholder="전화번호" value="<?php echo $shop_shipping->return_info_phone; ?>"/>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-9">
        </div>
      </div>
    </td>
  </tr>
  <tr>
    <th class="col-md-2 col-sm-2 col-xs-2 return-price-info-header">교환/반품 정책<span class="required">*</span></th>
    <td class="col-md-10 col-sm-10 col-xs-10 return-policy">
      <div class="col-md-6 col-sm-6 col-xs-6 return-policy-price">
        <div class="col-md-7 col-sm-7 col-xs-7" style="text-align: right">
          회수택배비
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4">
          <input class="form-control" id="return-shipping-price" type="number" name="return-shipping-price" alt="회수택배비" placeholder="" value="<?php echo $shop_shipping->return_shipping_price; ?>"/>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-1">
          원
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-6 return-policy-ship-price">
        <div class="col-md-7 col-sm-7 col-xs-7" style="text-align: right">
          배송택배비
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4">
          <input class="form-control" id="return-send-shipping-price" type="number" name="return-send-shipping-price" alt="배송택배비" placeholder="" value="<?php echo $shop_shipping->return_send_shipping_price; ?>"/>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-1">
          원
        </div>
      </div>
    </td>
  </tr>
  </tbody>
</table>
