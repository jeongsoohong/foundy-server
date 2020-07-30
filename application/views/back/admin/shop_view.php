<div id="content-container" style="padding-top:0px !important;">
  <div class="text-center pad-all">
    <div class="pad-ver">
        <img class="img-sm img-border" src="<?php echo base_url(); ?>uploads/vendor_logo_image/default.jpg" alt="">
    </div>
    <h4 class="text-lg text-overflow mar-no"><?php echo $shop->shop_name; ?></h4>
    <p class="text-sm">shop</p>
    <div class="pad-ver btn-group">
      <button class="btn <?php echo ($shop->activate ? 'btn-success' : 'btn-danger'); ?>"><?php echo ($shop->activate ? '승인' : '미승인'); ?></button>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-sm-12">
      <div class="panel-body">
        <table class="table table-striped" style="border-radius:3px;">
          <tbody>
          <tr>
            <th class="custom_td">브랜드명</th>
            <td class="custom_td"><?php echo $shop->shop_name; ?></td>
          </tr>
          <tr>
            <th class="custom_td">대표자명</th>
            <td class="custom_td"><?php echo $shop->representative_name; ?></td>
          </tr>
          <tr>
            <th class="custom_td">전화번호</th>
            <td class="custom_td"><?php echo $shop->shop_phone; ?></td>
          </tr>
          <tr>
            <th class="custom_td">주소</th>
            <td class="custom_td"><?php echo '('.$shop->postcode.')'.' '.$shop->address_1.' '.$shop->address_2; ?></td>
          </tr>
          <tr>
            <th class="custom_td">입점푹목</th>
            <td class="custom_td"><?php echo $shop->shop_items; ?></td>
          </tr>
          <tr>
            <th class="custom_td">홈페이지</th>
            <td class="custom_td"><a href="<?php $shop->shop_homepage_url; ?>"><?php echo $shop->shop_homepage_url; ?></a></td>
          </tr>
          <tr>
            <th class="custom_td">이메일</th>
            <td class="custom_td"><?php echo $shop->email; ?></td>
          </tr>
          <tr>
            <th class="custom_td">사업자등록번호</th>
            <td class="custom_td"><?php echo $shop->business_license_num; ?></td>
          </tr>
          <tr>
            <th class="custom_td">업종</th>
            <td class="custom_td"><?php echo $shop->business_conditions; ?></td>
          </tr>
          <tr>
            <th class="custom_td">업태</th>
            <td class="custom_td"><?php echo $shop->business_type; ?></td>
          </tr>
          <tr>
            <th class="custom_td">수수료율(%)</th>
            <td class="custom_td"><?php echo $shop->commission_rate; ?></td>
          </tr>
          <tr>
            <th class="custom_td">인스타그램 / 페이스북</th>
            <td class="custom_td"><?php echo $shop->sns_url; ?></td>
          </tr>
          <tr>
            <th class="custom_td">등록일</th>
            <td class="custom_td"><?php echo $shop->register_at; ?></td>
          </tr>
          <tr>
            <th class="custom_td">계약체결일</th>
            <td class="custom_td"><?php echo ($shop->activate ? $shop->contract_at : ''); ?></td>
          </tr>
          <tr>
            <th class="custom_td">사업자등록증</th>
            <td class="custom_td">
              <a href="<?php echo $shop->business_license_url; ?>">
                <img class="img-lg img-border" src="<?php echo $shop->business_license_url; ?>" alt="" style="width:100%;height: auto;">
              </a>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<style>
  .custom_td{
    border-left: 1px solid #ddd;
    border-right: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
  }
</style>
<script type="text/javascript">
  $(document).ready(function(){
    $('.enterer').hide();
  });
</script>
