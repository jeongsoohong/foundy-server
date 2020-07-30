<table>
  <tbody>
  <tr>
    <th>구매자<span class="require">*</span></th>
    <td class="user-name">
      <input type="text" class="form-control" value="<?php echo $user_info->username; ?>" id="user-name" name="user_name">
    </td>
  </tr>
  <tr>
    <th>연락처<span class="require">*</span></th>
    <td class="user-phone">
      <input type="tel" class="form-control" value="<?php echo $user_info->phone; ?>" id="user-phone" name="user_phone">
    </td>
  </tr>
  <tr>
    <th>이메일</th>
    <td class="user-email">
      <input type="email" class="form-control" value="<?php echo $user_info->email; ?>" id="user-email" name="user_email">
    </td>
  </tr>
  <tr>
    <th>주소</th>
    <td class="user-address">
      <div class="user-postcode-blk">
        <div class="user-postcode">
          <input type="text" class="form-control" value="<?php echo $user_info->postcode; ?>" id="user-postcode" name="user_postcode" placeholder="우편번호" readonly>
        </div>
        <div class="user-postcode-btn">
          <a href="javascript:void(0)" id="user-postcode-btn" onclick="search_address('user-')">우편번호 검색</a>
        </div>
      </div>
      <div class="user-address-1">
        <input type="text" class="form-control" value="<?php echo $user_info->address_1; ?>" id="user-address-1" name="address_1" placeholder="기본주소" readonly>
      </div>
      <div class="user-address-2">
        <input type="text" class="form-control" value="<?php echo $user_info->address_2; ?>" id="user-address-2" name="address_2" placeholder="상세주소" readonly>
      </div>
    </td>
  </tr>
  </tbody>
</table>
<div class="purchase-user-agree">
  <label style="text-align:left">
    <input class='form-checkbox' id="purchase-user-agree-checkbox" name="purchase_user_agree" type="checkbox" value="1">
    구매자 정보를 저장합니다.
  </label>
</div>
