<table class="shipping-info-table col-md-12 col-sm-12 col-xs-12" border="1" bordercolor="#EAEAEA">
  <tbody>
  <tr>
    <th class="col-md-2 col-sm-2 col-xs-2 send-info-header">발송지 정보<span class="required">*</span></th>
    <td class="col-md-10 col-sm-10 col-xs-10 send-info">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-1 col-sm-1 col-xs-1 send-info-postcode-search">
          <button class="send-info-postcode-search-btn btn-edit" onclick="search_address('send')" style="padding: 0; font-size:12px">주소찾기</button>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-1 send-info-postcode">
          <input readonly class="form-control" id="send-info-postcode" type="text" name="postcode" alt="" placeholder="우편번호" value="<?php echo $shop_shipping->send_info_postcode; ?>" />
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4 send-info-address-1">
          <input readonly class="form-control" id="send-info-address-1" type="text" name="address-1" alt="" placeholder="기본주소" value="<?php echo $shop_shipping->send_info_address_1; ?>" />
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4 send-info-address-2">
          <input readonly class="form-control" id="send-info-address-2" type="text" name="address-2" alt="" placeholder="상세주소" value="<?php echo $shop_shipping->send_info_address_2; ?>" />
        </div>
        <div class="col-md-2 col-sm-2 col-xs-2 send-info-checkbox">
          <label style="text-align:left">
            <input class='form-checkbox' id="send-info-base-address" name="base-address" type="checkbox" value="1" onchange="check_base_address($(this),'send');"/>
            사업자 주소와 동일
          </label>
        </div>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-1 col-sm-1 col-xs-1" style="text-align: right">
          전화번호
        </div>
        <div class="col-md-2 col-sm-2 col-xs-2 send-info-phone" style="text-align: left">
          <input class="form-control" id="send-info-phone" type="tel" name="send_info_phone" alt="" placeholder="전화번호" value="<?php echo $shop_shipping->send_info_phone; ?>"/>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-9">
        </div>
      </div>
    </td>
  </tr>
  <tr>
    <th class="col-md-2 col-sm-2 col-xs-2 shipping-info-header">배송지 정책<span class="required">*</span></th>
    <td class="col-md-10 col-sm-10 col-xs-10 shipping-info">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-6 col-sm-6 col-xs-6 shipping-info-checkbox" style="text-align: right">
          <label style="text-align:right">
            <input <?php if ($shop_shipping->free_shipping == true) { echo 'checked'; }?> class='form-checkbox' id="free-shipping-1" name="free-shipping-cond" type="checkbox" value="1" onclick="free_shipping_check($(this));"/>
            <?php echo $this->crud_model->get_product_shipping_free_str(true); ?>
          </label>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6 shipping-info-checkbox" style="text-align: right">
          <label style="text-align:right">
            <input <?php if ($shop_shipping->free_shipping == false) { echo 'checked'; }?> class='form-checkbox' id="free-shipping-0" name="free-shipping-cond" type="checkbox" value="0" onclick="free_shipping_check($(this));"/>
            <?php echo $this->crud_model->get_product_shipping_free_str(false); ?>
          </label>
        </div>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-6 col-sm-6 col-xs-6 shipping-info-total-price">
          <div class="col-md-7 col-sm-7 col-xs-7" style="text-align: right">
            총 사용금액
          </div>
          <div class="col-md-4 col-sm-4 col-xs-4">
            <input <?php if ($shop_shipping->free_shipping == true) { echo 'readonly'; }?> class="form-control" id="shipping-info-total-price" type="number" name="shipping-info-total-price" alt="총사용금액" placeholder="" value="<?php echo $shop_shipping->free_shipping_total_price; ?>"/>
          </div>
          <div class="col-md-1 col-sm-1 col-xs-1">
            원
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6 shipping-info-cond-price">
          <div class="col-md-7 col-sm-7 col-xs-7" style="text-align: right">
            미만 구매시 배송비
          </div>
          <div class="col-md-4 col-sm-4 col-xs-4">
            <input <?php if ($shop_shipping->free_shipping == true) { echo 'readonly'; }?> class="form-control" id="shipping-info-cond-price" type="number" name="shipping-info-cond-price" alt="배송비" placeholder="" value="<?php echo $shop_shipping->free_shipping_cond_price; ?>"/>
          </div>
          <div class="col-md-1 col-sm-1 col-xs-1">
            원
          </div>
        </div>
      </div>
    </td>
  </tr>
  <tr>
    <th class="col-md-2 col-sm-2 col-xs-2 shipping-company-header">출고 택배사 관리<span class="required">*</span></th>
    <td class="col-md-10 col-sm-10 col-xs-10 shipping-company">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-4 col-sm-4 col-xs-4">
          택배사 전체리스트
        </div>
        <div class="col-md-1 col-sm-1 col-xs-1">
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4">
          이용택배사
        </div>
        <div class="col-md-3 col-sm-3 col-xs-3">
        </div>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12 shipping-company-info">
        <div class="col-md-4 col-sm-4 col-xs-4 shipping-company-left">
          <!-- loading -->
        </div>
        <div class="col-md-1 col-sm-1 col-xs-1">
          <a href="javascript:void(0);">
            <p><span class="fa fa-angle-right" onclick="move_shipping_company('left','right');"></span></p>
          </a>
          <a href="javascript:void(0);">
            <p> <span class="fa fa-angle-left" onclick="move_shipping_company('right','left');"></span> </p>
          </a>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4 shipping-company-right">
          <?php foreach ($shop_shipping_company as $c) { ?>
            <a class="shipping-company-right-item" href="javascript:void(0);">
              <p data-id="<?php echo $c->shipping_company_code; ?>" data-target="<?php echo $c->shipping_company_name;?>" onclick="shipping_company_select($(this),'right');"><?php echo $c->shipping_company_name; ?></p>
            </a>
          <?php }?>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-3">
        </div>
      </div>
    </td>
  </tr>
  </tbody>
</table>
<script>
  var shipping_company_codes = [<?php foreach ($shop_shipping_company as $c) { echo "'".$c->shipping_company_code."',";} ?>];
  function get_shipping_company() {
    $.ajax({
      url: 'https://info.sweettracker.co.kr/api/v1/companylist?t_key=9PKYs9QJEOo9Ebvu4I95Ww',
      type: 'GET', // form submit method get/post
      cache: false,
      contentType: 'application/json',
      processData: false,
      success: function (res) {
        $.each(res.Company, function(index,item) {
          // console.log('code:' + item.Code + ',name:' + item.Name)
          if (shipping_company_codes.includes(item.Code) === false) {
            $('.shipping-company-left').append(get_shipping_item_html(item.Code,item.Name,'left'));
          }
        });
      },
      error: function (e) {
        console.log(e);
      }
    });
  }
  $(document).ready(function() {
    get_shipping_company();
  });
</script>
