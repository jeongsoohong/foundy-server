<?php $i = 0; foreach ($shipping_info as $info) { ?>
  <div class="shipping-info">
    <div class="shipping-address-btn">
      <input <?php if($i == 0) echo 'checked';?> type="radio" name="address-check" value="<?php echo $info->address_id; ?>">
    </div>
    <div class="shipping-address-wrap">
      <div class="shipping-address">
        <?php echo $info->receiver_name; ?> (<?php echo $info->address_name; ?>)
        <a href="javascript:void(0);" onclick="del_address($(this))" data-id="<?php echo $info->address_id; ?>">
          <span class="del-address" >삭제</span>
        </a>
        <br>
        (<?php echo $info->postcode; ?>) <?php echo $info->address_1.' '.$info->address_2; ?><br>
        <?php echo $info->phone_1.'/'.$info->phone_2; ?>
      </div>
      <div class="shipping-req">
        <select <?php if ($info->shipping_req_code == SHOP_SHIPPING_REQ_DIRECT_INPUT) echo 'disabled';?> class="form-control" onchange="check_direct_input($(this))">
          <?php for ($i = SHOP_SHIPPING_REQ_DEFAULT; $i <= SHOP_SHIPPING_REQ_DIRECT_INPUT; $i++) { ?>
            <option <?php if ($i == $info->shipping_req_code) { echo 'selected';} ?> value="<?php echo $i; ?>"><?php echo $this->crud_model->get_shipping_req_str($i); ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="shipping-req-direct-input" style="display: <?php echo ($info->shipping_req_code == SHOP_SHIPPING_REQ_DIRECT_INPUT ? 'flex' : 'none'); ?>">
        <input value="<?php if ($info->shipping_req_code == SHOP_SHIPPING_REQ_DIRECT_INPUT) echo $info->shipping_req;?>" type="text" class="form-control" placeholder="직접입력" maxlength="32"/>
        <a href="javascript:void(0);" onclick="hide_direct_input($(this));"><span class="fa fa-times"></span></a>
      </div>
    </div>
  </div>
<?php $i++; } ?>
<?php if ($shipping_info_cnt == 0) {?>
  <div class="shipping-info" style="height: 100px; text-align: center; line-height: 100px; font-size: 20px">
    등록된 배송지가 없습니다 ㅠ
  </div>
<?php } ?>
