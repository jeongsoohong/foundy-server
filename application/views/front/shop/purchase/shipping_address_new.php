<table>
  <tbody>
  <tr>
    <th>배송지명<span class="require">*</span></th>
    <td class="shipping-new-name">
      <input type="text" class="form-control" alt="" id="address-name" name="address_name">
    </td>
  </tr>
  <tr>
    <th>받는분<span class="require">*</span></th>
    <td class="shipping-new-receiver">
      <input type="text" class="form-control" alt="" id="receiver-name" name="receiver_name">
    </td>
  </tr>
  <tr>
    <th style="line-height: 35px;">배송지<span class="require">*</span></th>
    <td class="shipping-new-address">
      <div class="shipping-new-postcode-blk">
        <div class="shipping-new-postcode">
          <input type="text" class="form-control" alt="" id="postcode" name="postcode" placeholder="우편번호" readonly>
        </div>
        <div class="shipping-new-postcode-btn">
          <a href="javascript:void(0)" id="postcode-btn" onclick="search_address('')">우편번호 검색</a>
        </div>
      </div>
      <div class="shipping-new-address-1">
        <input type="text" class="form-control" alt="" id="address-1" name="address_1" placeholder="기본주소" readonly>
      </div>
      <div class="shipping-new-address-2">
        <input type="text" class="form-control" alt="" id="address-2" name="address_2" placeholder="상세주소" readonly>
      </div>
    </td>
  </tr>
  <tr>
    <th>연락처 1<span class="require">*</span></th>
    <td class="shipping-new-phone">
      <input type="tel" class="form-control" alt="" id="phone-1" name="phone_1">
    </td>
  </tr>
  <tr>
    <th>연락처 2</th>
    <td class="shipping-new-phone">
      <input type="tel" class="form-control" alt="" id="phone-2" name="phone_2">
    </td>
  </tr>
  <tr>
    <th></th>
    <td class="shipping-new-req">
        <select class="form-control" id="shipping-new-req" onchange="check_direct_input_new($(this))">
        <?php for ($i = SHOP_SHIPPING_REQ_DEFAULT; $i <= SHOP_SHIPPING_REQ_DIRECT_INPUT; $i++) { ?>
          <option value="<?php echo $i; ?>"><?php echo $this->crud_model->get_shipping_req_str($i); ?></option>
        <?php } ?>
      </select>
    </td>
  </tr>
  <tr>
    <th></th>
    <td class="shipping-new-req-direct-input" style="display: none">
      <input type="text" class="form-control" id="shipping-new-req-direct-input" placeholder="직접입력" maxlength="32"/>
      <a href="javascript:void(0);" onclick="hide_direct_input_new($(this));"><span class="fa fa-times"></span></a>
    </td>
  </tr>
  <tr>
    <td colspan="2" class="shipping-new-btn">
      <a href="javascript:void(0)" onclick="submit_new_address()">
        <button type="button">확인</button>
      </a>
    </td>
  </tr>
  </tbody>
</table>
