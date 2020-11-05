<style>
  .panel {
    height: 200px;
  }
  .panel-body table {
    height: 100px;
    text-align: center;
  }
  .panel-body table thead th {
    text-align: center;
  }
  .panel-body table thead tr {
    height: 20px;
    font-size: 16px;
  }
  .panel-body table tbody tr {
    font-size: 40px;
  }
  .panel-title {
    text-align: center;
  }
</style>
<div id="content-container">
  <div id="page-title">
    <h1 class="page-header text-overflow">대시보드</h1>
  </div>
  <div id="page-content">
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-6">
        <div class="panel panel-bordered panel-dark">
          <div class="panel-heading">
            <h3 class="panel-title">주문관리</h3>
          </div>
          <div class="panel-body">
            <div class="text-center">
              <table class="col-md-12 col-sm-12 col-xs-12">
                <thead>
                <tr>
                    <?php
                  for ($i = SHOP_SHIPPING_STATUS_ORDER_COMPLETED; $i <= SHOP_SHIPPING_STATUS_PURCHASE_COMPLETED; $i++) {
                    if ($i == SHOP_SHIPPING_STATUS_ORDER_CANCELED) continue;
                    ?>
                    <th class="col-md-2 col-sm-2 col-xs-2">
                      <?php echo $this->crud_model->get_shipping_status_str($i); ?>
                    </th>
                  <?php } ?>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <?php
                  for ($i = SHOP_SHIPPING_STATUS_ORDER_COMPLETED; $i <= SHOP_SHIPPING_STATUS_PURCHASE_COMPLETED; $i++) {
                  if ($i == SHOP_SHIPPING_STATUS_ORDER_CANCELED) continue;
                  ?>
                    <td class="col-md-2 col-sm-2 col-xs-2">
                      <?php echo $shipping_status_cnt[$i]; ?>
                    </td>
                  <?php } ?>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-6">
        <div class="panel panel-bordered panel-dark">
          <div class="panel-heading">
            <h3 class="panel-title">교환 / 반품</h3>
          </div>
          <div class="panel-body">
            <div class="text-center">
              <table class="col-md-12 col-sm-12 col-xs-12">
                <thead>
                <tr>
                  <th class="col-md-2 col-sm-2 col-xs-2">
                    <?php echo $this->crud_model->get_shipping_status_str(SHOP_SHIPPING_STATUS_ORDER_CANCELED); ?>
                  </th>
                  <?php for ($i = SHOP_SHIPPING_STATUS_PURCHASE_CANCELED; $i <= SHOP_SHIPPING_STATUS_PURCHASE_CHANGING; $i++) { ?>
                    <th class="col-md-2 col-sm-2 col-xs-2">
                      <?php echo $this->crud_model->get_shipping_status_str($i); ?>
                    </th>
                  <?php } ?>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td class="col-md-2 col-sm-2 col-xs-2">
                    <?php echo $shipping_status_cnt[SHOP_SHIPPING_STATUS_ORDER_CANCELED]; ?>
                  </td>
                  <?php for ($i = SHOP_SHIPPING_STATUS_PURCHASE_CANCELED; $i <= SHOP_SHIPPING_STATUS_PURCHASE_CHANGING; $i++) { ?>
                    <td class="col-md-2 col-sm-2 col-xs-2">
                      <?php echo $shipping_status_cnt[$i]; ?>
                    </td>
                  <?php } ?>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-6">
        <div class="panel panel-bordered panel-dark">
          <div class="panel-heading">
            <h3 class="panel-title">상품관리</h3>
          </div>
          <div class="panel-body">
            <div class="text-center">
              <table class="col-md-12 col-sm-12 col-xs-12">
                <thead>
                <tr>
                  <?php for ($i = SHOP_PRODUCT_STATUS_REQUEST; $i <= SHOP_PRODUCT_STATUS_FINISH_SALE; $i++) { ?>
                    <th class="col-md-2 col-sm-2 col-xs-2">
                      <?php echo $this->crud_model->get_product_status_str($i); ?>
                    </th>
                  <?php } ?>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <?php for ($i = SHOP_PRODUCT_STATUS_REQUEST; $i <= SHOP_PRODUCT_STATUS_FINISH_SALE; $i++) { ?>
                    <td class="col-md-2 col-sm-2 col-xs-2">
                      <?php echo $product_status_cnt[$i]; ?>
                    </td>
                  <?php } ?>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-6">
        <div class="panel panel-bordered panel-dark">
          <div class="panel-heading">
            <h3 class="panel-title">상품문의</h3>
          </div>
          <div class="panel-body">
            <div class="text-center">
              <table class="col-md-12 col-sm-12 col-xs-12">
                <thead>
                <tr>
                  <th class="col-md-4 col-sm-4 col-xs-4">상품문의</th>
                  <th class="col-md-4 col-sm-4 col-xs-4">답변</th>
                  <th class="col-md-4 col-sm-4 col-xs-4">미답변</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td class="col-md-4 col-sm-4 col-xs-4">
                    <?php echo ($product_qna_cnt[0] + $product_qna_cnt[1]); ?>
                  </td>
                  <?php for ($i = 0; $i <= 1; $i++) { ?>
                    <td class="col-md-4 col-sm-4 col-xs-4">
                      <?php echo $product_qna_cnt[$i]; ?>
                    </td>
                  <?php } ?>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document" style="width: 50%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="width: 5%">
          <span class="pull-right" aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        <h4>** 상품 고시정보 등록 탭 변경에 따른 고시정보 수정 협조요청 (필수) **</h4>
        <div style="line-height: 30px;">
          안녕하세요 파운디 입니다.<br>
          상품 고시정보 등록 탭이 개별 텍스트 박스로 수정되어,<br>
          번거로우시겠지만 등록해주신 상품의 고시정보를 모두 해당 항목에 맞게 재 업로드 부탁 드립니다.<br>
          온라인 상품 판매시 법에 접촉되는 부분이 있으니 가급적 빠르게 상품 수정을 완료해주시면 감사하겠습니다!
<!--          <span style="color:red">승인요청 / 판매중 / 판매중지 / 판매종료 등 반려된 상품을 제외한 모든 제품을 확인해주세요!!</span>-->
        </div>
        <div style="margin: 30px 0">
          <img width="100%" height="auto" src="<?php echo base_url(); ?>uploads/others/shop_admin_popup_for_product_notice.png" alt="popup">
        </div>
      </div>
      <div class="modal-footer" style="display: block;">
        <button type="button" class="btn btn-theme btn-theme-sm" style="text-transform: none; background-color: black; color:white; width:20%; font-weight: 400;"
        onclick="close_popup();">확인</button>
      </div>
    </div>
  </div>
</div>
<script>
  function open_popup() {
    let modal = $('#popupModal');
    modal.modal('show');
  }
  function close_popup() {
    let modal = $('#popupModal');
    modal.modal('hide');
  }
  function go_product() {
    window.location.href = '<?php echo base_url(); ?>shop/product';
  }
  
  $(function() {
    <?php //if ($need_popup) { ?>
    open_popup();
    <?php //} ?>
  });
</script>


