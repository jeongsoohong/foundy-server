<style>
  button,select {
    width: 100%;
    height: 32px;
    font-size: 12px;
  }
  .order-content table tr {
    height: 40px;
    font-size: 12px;
    text-align: center;
  }
  .order-content table tr th {
    text-align: center;
  }
  .order-content table tr td {
    text-align: center;
    padding: 5px 15px;
  }
  .order-content table tr td div {
    padding-left: 0;
    padding-right: 0;
    line-height: 32px;
  }
  .order-content input[type='checkbox'] {
    width: auto !important;
  }
  .bootstrap-datetimepicker-widget.dropdown-menu {
    width: auto !important;
  }
  .order-list table thead,.order-list table tbody {
    border: 1px solid #EAEAEA;
  }
  .order-list input[type='checkbox'] {
    width: auto !important;
    margin: auto;
    text-align: center;
  }
</style>
<div id="content-container">
  <div id="page-title">
    <h1 class="page-header text-overflow">주문관리</h1>
  </div>
  <div class="order-content" id="page-content">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <table class="col-md-12 col-sm-12 col-xs-12">
          <tbody>
          <tr>
            <th class="col-md-1 col-sm-1 col-xs-1">배송/클레임</th>
            <td class="col-md-2 col-sm-2 col-xs-2">
              <select id='shipping-status' class="form-control">
                <optgroup label="배송관련">
<!--                  <option --><?php //if ($ship_status == SHOP_SHIPPING_STATUS_WAIT) echo 'selected'; ?>
<!--                    value="--><?php //echo SHOP_SHIPPING_STATUS_WAIT; ?><!--">-->
<!--                  --><?php //echo $this->shop_model->get_shipping_status_str(SHOP_SHIPPING_STATUS_WAIT); ?>
<!--                  </option>-->
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
            </td>
            <th class="col-md-1 col-sm-1 col-xs-1">검색정보</th>
            <td class="col-md-2 col-sm-2 col-xs-2">
              <select disabled id="qeury-opt" class="form-control">
                <option value="1">주문번호</option>
                <option value="2">주문자명</option>
                <option value="3">수취인명</option>
                <option value="4">상품코드</option>
                <option value="5">상품명</option>
                <option value="6">주문자번화번호</option>
                <option value="7">수취인전화번호</option>
              </select>
            </td>
            <td colspan="3" class="col-md-5 col-sm-5 col-xs-5">
              <input disabled id="query" class="form-control" value="" type="text" name="order-search" alt="" maxlength="32" placeholder="검색정보를 입력하세요"/>
            </td>
            <td class="col-md-1 col-sm-1 col-xs-1">
              <button class="product-search btn-dark" onclick="search_order_page()">검색</button>
            </td>
          </tr>
          <tr>
            <th class="col-md-1 col-sm-1 col-xs-1">브랜드</th>
            <td class="col-md-2 col-sm-2 col-xs-2">
              <select id="shop-brand" class="form-control">
                <option value="1"><?php echo $shop_data->shop_name; ?></option>
              </select>
            </td>
            <th class="col-md-1 col-sm-1 col-xs-1">결제/출고일</th>
            <td class="col-md-2 col-sm-2 col-xs-2">
              <div class='input-group date' id='datetimepicker1'>
                <input value="<?php echo $start_date; ?>" id="start-date" type='text' class="form-control" name="start_date" placeholder="시작날짜"/>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </td>
            <td class="col-md-1 col-sm-1 col-xs-1">
              ~
            </td>
            <td class="col-md-2 col-sm-2 col-xs-2">
              <div class='input-group date' id='datetimepicker2'>
                <input value="<?php echo $end_date; ?>" id="end-date" type='text' class="form-control" name="end_date" placeholder="종료날짜"/>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </td>
            <td class="col-md-2 col-sm-2 col-xs-2">
              <label style="text-align:left">
                <input <?php if ($confirm_delay) echo 'checked'; ?> id="confirm-delay" class='form-checkbox' name="order-delay" type="checkbox" value="1"/>
                <span style="padding-left: 10px;">주문확인지연</span>
              </label>
            </td>
            <td class="col-md-1 col-sm-1 col-xs-1">
            </td>
          </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12">
        <hr style="width: 100%; border: 1px solid #EAEAEA">
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12 item-status" style="padding-bottom: 16px;">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="col-md-4 col-sm-4 col-xs-4">
            <h5 style="padding-left: 15px">주문목록 [ 총 <?php echo $total_cnt; ?>건 ]</h5>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-4">
          </div>
          <div class="col-md-2 col-sm-2 col-xs-2">
          </div>
          <div class="col-md-2 col-sm-2 col-xs-2 shop-fn-wrap">
            <?php if ($ship_status == SHOP_SHIPPING_STATUS_ORDER_COMPLETED) { ?>
              <button class="order-change-status btn-danger fn-tip-cancel" id="order-cancel-btn" onclick="get_cancel_info();">
                주문취소
              </button>
              <button class="order-change-status btn-dark fn-tip-status" id="order-status-change-btn" onclick="change_status();">
                <<?php echo $this->shop_model->get_shipping_status_str(SHOP_SHIPPING_STATUS_PREPARE); ?>>으로 변경
              </button>
            <?php } else if ($ship_status == SHOP_SHIPPING_STATUS_PREPARE) { ?>
              <button class="order-change-status btn-danger fn-tip-cancel" id="order-cancel-btn" onclick="get_cancel_info();">
                주문취소
              </button>
              <button class="order-change-status btn-dark fn-tip-status" id="order-status-change-btn" onclick="change_status();">
                <<?php echo $this->shop_model->get_shipping_status_str(SHOP_SHIPPING_STATUS_IN_PROGRESS); ?>>으로 변경
              </button>
            <?php } else if ($ship_status == SHOP_SHIPPING_STATUS_IN_PROGRESS) { ?>
              <button class="order-change-status btn-dark fn-tip-status" id="order-status-change-btn" style="margin-left: 48%;" onclick="change_status();">
                <<?php echo $this->shop_model->get_shipping_status_str(SHOP_SHIPPING_STATUS_COMPLETED); ?>>으로 변경
              </button>
            <?php } else if ($ship_status == SHOP_SHIPPING_STATUS_PURCHASE_CANCELING) { ?>
              <button class="order-change-status btn-dark fn-tip-status" id="order-status-change-btn" style="margin-left: 48%;" onclick="change_status();">
                <<?php echo $this->shop_model->get_shipping_status_str(SHOP_SHIPPING_STATUS_PURCHASE_CANCELED); ?>>으로 변경
              </button>
            <?php } else if ($ship_status == SHOP_SHIPPING_STATUS_PURCHASE_CHANGING) { ?>
              <button class="order-change-status btn-dark fn-tip-status" id="order-status-change-btn" style="margin-left: 48%;" onclick="change_status();">
                <<?php echo $this->shop_model->get_shipping_status_str(SHOP_SHIPPING_STATUS_PURCHASE_CHANGED); ?>>으로 변경
              </button>
            <?php } else { ?>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12 order-list">
        <table class="col-md-12 col-sm-12 col-xs-12">
          <?php if ($ship_status == SHOP_SHIPPING_STATUS_ORDER_COMPLETED) { ?>
            <thead>
            <tr>
              <th class="col-md-1 col-sm-1 col-xs-1">
                <input class="form-control" id="item-list-all" type="checkbox" name="list_all" onchange="check_all()"/>
              </th>
              <th class="col-md-2 col-sm-2 col-xs-2">구매날짜</th>
              <th class="col-md-1 col-sm-2 col-xs-2">구매번호</th>
              <th class="col-md-1 col-sm-1 col-xs-1">주문자</th>
              <th class="col-md-2 col-sm-2 col-xs-2">상품명/옵션</th>
              <th class="col-md-1 col-sm-1 col-xs-1">수량</th>
              <th class="col-md-1 col-sm-1 col-xs-1">주문상태</th>
              <th class="col-md-1 col-sm-1 col-xs-1">상품배송유형</th>
              <th class="col-md-2 col-sm-2 col-xs-2">기타</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($order_data as $order) { ?>
              <tr>
                <td class="col-md-1 col-sm-1 col-xs-1">
                  <input class="form-control item-list-checkbox" data-id="<?php echo $order->purchase_product_id; ?>"
                         type="checkbox" name="list[]" onclick="check_change();" value="1"/>
                </td>
                <td class="col-md-2 col-sm-2 col-xs-2"><?php echo $order->purchase_at; ?></td>
                <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $order->purchase_code; ?></td>
                <td class="col-md-1 col-sm-1 col-xs-1">
                  <?php
                  if ($order->user_id == 0) {
                    echo '비회원주문';
                  } else {
                    echo $this->db->get_where('user', array('user_id' => $order->user_id))->row()->email;
                  }
                  ?>
                </td>
                <td class="col-md-2 col-sm-2 col-xs-2"><?php echo $order->item_name; ?></td>
                <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $order->total_purchase_cnt; ?></td>
                <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $this->shop_model->get_shipping_status_str($order->shipping_status); ?></td>
                <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $this->crud_model->get_product_shipping_free_str($order->free_shipping); ?></td>
                <td class="col-md-2 col-sm-2 col-xs-2" style="width: 100%; margin: auto">
                  <button class="btn btn-info" onclick="get_info(<?php echo $order->purchase_product_id; ?>)"
                          style="font-size: 10px; width: auto; height: 30px; margin: auto">정보</button>
                  <? if (false) { ?>
                    <button class="btn btn-danger" onclick="open_req_order_modal(<?php echo $order->purchase_product_id; ?>, <?php echo SHOP_ORDER_REQ_TYPE_CANCEL; ?>)"
                            style="font-size: 10px; width: auto; height: 30px; margin: auto"><?php echo $this->shop_model->get_order_req_type_str(SHOP_ORDER_REQ_TYPE_CANCEL); ?></button>
                  <? } ?>
                </td>
              </tr>
            <?php }?>
            </tbody>
          <?php } else if ($ship_status == SHOP_SHIPPING_STATUS_PREPARE) { ?>
            <thead>
            <tr>
              <th class="col-md-1 col-sm-1 col-xs-1">
                <input class="form-control" id="item-list-all" type="checkbox" name="list_all" onchange="check_all()"/>
              </th>
              <th class="col-md-1 col-sm-1 col-xs-1">구매번호/날짜</th>
              <th class="col-md-1 col-sm-1 col-xs-1">주문자</th>
              <th class="col-md-2 col-sm-2 col-xs-2">상품명/옵션</th>
              <th class="col-md-1 col-sm-1 col-xs-1">수량</th>
              <th class="col-md-1 col-sm-1 col-xs-1">주문상태</th>
              <th class="col-md-1 col-sm-1 col-xs-1">상품배송유형</th>
              <th class="col-md-1 col-sm-1 col-xs-1">배송사</th>
              <th class="col-md-1 col-sm-1 col-xs-1">운송장번호</th>
              <th class="col-md-1 col-sm-1 col-xs-1">기타</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($order_data as $order) { ?>
              <tr>
                <td class="col-md-1 col-sm-1 col-xs-1">
                  <input class="form-control item-list-checkbox" data-id="<?php echo $order->purchase_product_id; ?>"
                         type="checkbox" name="list[]" onclick="check_change();" value="1"/>
                </td>
                <td class="col-md-1 col-sm-1 col-xs-1 purchase-code" data-code="<?php echo $order->purchase_code; ?>">
                  <?php echo $order->purchase_code; ?> /<br><?php echo $order->purchase_at; ?>
                </td>
                <td class="col-md-1 col-sm-1 col-xs-1">
                  <?php
                  if ($order->user_id == 0) {
                    echo '비회원주문';
                  } else {
                    echo $this->db->get_where('user', array('user_id' => $order->user_id))->row()->email;
                  }
                  ?>
                </td>
                <td class="col-md-2 col-sm-1 col-xs-1"><?php echo $order->item_name; ?></td>
                <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $order->total_purchase_cnt; ?></td>
                <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $this->shop_model->get_shipping_status_str($order->shipping_status); ?></td>
                <td class="col-md-1 col-sm-1 col-xs-1 "><?php echo $this->crud_model->get_product_shipping_free_str($order->free_shipping); ?></td>
                <td class="col-md-1 col-sm-1 col-xs-1">
                  <select class="form-control shipping-company">
                    <option value="0">배송사</option>
                    <?php foreach ($shop_shipping_company as $company) { ?>
                      <option value="<?php echo $company->shipping_company_code; ?>"><?php echo $company->shipping_company_name; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td class="col-md-1 col-sm-1 col-xs-1">
                  <input class="form-control shipping-code" name="shipping-code" style="font-size: 10px; width: auto; height: 30px; border: none;" placeholder="운송장번호"/>
                </td>
                <td class="col-md-1 col-sm-1 col-xs-1" style="width: 100%; margin: auto">
                  <button class="btn btn-info" onclick="get_info(<?php echo $order->purchase_product_id; ?>)"
                          style="font-size: 10px; width: auto; height: 30px; margin: auto">정보</button>
                  <? if (false) { ?>
                    <button class="btn btn-danger" onclick="open_req_order_modal(<?php echo $order->purchase_product_id; ?>, <?php echo SHOP_ORDER_REQ_TYPE_CANCEL; ?>)"
                            style="font-size: 10px; width: auto; height: 30px; margin: auto"><?php echo $this->shop_model->get_order_req_type_str(SHOP_ORDER_REQ_TYPE_CANCEL); ?></button>
                  <? } ?>
                </td>
              </tr>
            <?php }?>
            </tbody>
          <?php } else if ($ship_status == SHOP_SHIPPING_STATUS_IN_PROGRESS) { ?>
          <thead>
          <tr>
            <th class="col-md-1 col-sm-1 col-xs-1">
              <input class="form-control" id="item-list-all" type="checkbox" name="list_all" onchange="check_all()"/>
            </th>
            <th class="col-md-1 col-sm-1 col-xs-1">구매번호/날짜</th>
            <th class="col-md-1 col-sm-1 col-xs-1">주문자</th>
            <th class="col-md-2 col-sm-2 col-xs-2">상품명/옵션</th>
            <th class="col-md-1 col-sm-1 col-xs-1">수량</th>
            <th class="col-md-1 col-sm-1 col-xs-1">주문상태</th>
            <th class="col-md-1 col-sm-1 col-xs-1">상품배송유형</th>
            <th class="col-md-1 col-sm-1 col-xs-1">배송사</th>
            <th class="col-md-1 col-sm-1 col-xs-1">운송장번호</th>
            <th class="col-md-1 col-sm-1 col-xs-1">기타</th>
          </tr>
          </thead>
          <tbody>
          <?php foreach ($order_data as $order) {
            $order->shipping_data = json_decode($order->shipping_data);
            ?>
            <tr>
              <td class="col-md-1 col-sm-1 col-xs-1">
                <input class="form-control item-list-checkbox" data-id="<?php echo $order->purchase_product_id; ?>"
                       type="checkbox" name="list[]" onclick="check_change();" value="1"/>
              </td>
              <td class="col-md-1 col-sm-1 col-xs-1 purchase-code" data-code="<?php echo $order->purchase_code; ?>">
                <?php echo $order->purchase_code; ?> /<br><?php echo $order->purchase_at; ?>
              </td>
              <td class="col-md-1 col-sm-1 col-xs-1">
                <?php
                if ($order->user_id == 0) {
                  echo '비회원주문';
                } else {
                  echo $this->db->get_where('user', array('user_id' => $order->user_id))->row()->email;
                }
                ?>
              </td>
              <td class="col-md-2 col-sm-2 col-xs-2"><?php echo $order->item_name; ?></td>
              <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $order->total_purchase_cnt; ?></td>
              <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $this->shop_model->get_shipping_status_str($order->shipping_status); ?></td>
              <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $this->crud_model->get_product_shipping_free_str($order->free_shipping); ?></td>
              <td class="col-md-1 col-sm-1 col-xs-1">
                <select class="form-control shipping-company">
                  <option value="0">배송사</option>
                  <?php foreach ($shop_shipping_company as $company) { ?>
                    <option <?php if ($company->shipping_company_code == $order->shipping_data->shipping_company) echo 'selected'; ?>
                      value="<?php echo $company->shipping_company_code; ?>"><?php echo $company->shipping_company_name; ?></option>
                  <?php } ?>
                </select>
              </td>
              <td class="col-md-1 col-sm-1 col-xs-1">
                <input class="form-control shipping-code" name="shipping-code" style="font-size: 10px; width: auto; height: 30px; border: none;" placeholder="운송장번호"
                value="<?php echo $order->shipping_data->shipping_code; ?>"/>
              </td>
              <td class="col-md-1 col-sm-1 col-xs-1" style="width: 100%; margin: auto">
                <button class="btn btn-info" onclick="get_info(<?php echo $order->purchase_product_id; ?>)"
                        style="font-size: 10px; width: auto; height: 30px; margin: auto">정보</button>
                <button class="btn btn-mint" onclick="change_shipping_data(this)" data-id="<?php echo $order->purchase_product_id; ?>"
                        style="font-size: 10px; width: auto; height: 30px;margin: auto;">송장수정</button>
<!--                <button class="btn btn-danger" style="font-size: 10px; width: auto; height: 30px; margin: auto">반품</button>-->
              </td>
            </tr>
          <?php }?>
          </tbody>
          <?php } else if ($ship_status == SHOP_SHIPPING_STATUS_COMPLETED || $ship_status == SHOP_SHIPPING_STATUS_PURCHASE_COMPLETED) { ?>
            <thead>
            <tr>
              <th class="col-md-1 col-sm-1 col-xs-1">
                <input class="form-control" id="item-list-all" type="checkbox" name="list_all" onchange="check_all()"/>
              </th>
              <th class="col-md-1 col-sm-1 col-xs-1">구매번호/날짜</th>
              <th class="col-md-1 col-sm-1 col-xs-1">주문자</th>
              <th class="col-md-2 col-sm-2 col-xs-2">상품명/옵션</th>
              <th class="col-md-1 col-sm-1 col-xs-1">수량</th>
              <th class="col-md-1 col-sm-1 col-xs-1">주문상태</th>
              <th class="col-md-1 col-sm-1 col-xs-1">상품배송유형</th>
              <th class="col-md-1 col-sm-1 col-xs-1">배송사</th>
              <th class="col-md-1 col-sm-1 col-xs-1">운송장번호</th>
              <th class="col-md-1 col-sm-1 col-xs-1">기타</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($order_data as $order) {
              $order->shipping_data = json_decode($order->shipping_data);
              ?>
              <tr>
                <td class="col-md-1 col-sm-1 col-xs-1">
                  <input class="form-control item-list-checkbox" data-id="<?php echo $order->purchase_product_id; ?>"
                         type="checkbox" name="list[]" onclick="check_change();" value="1"/>
                </td>
                <td class="col-md-1 col-sm-1 col-xs-1 purchase-code" data-code="<?php echo $order->purchase_code; ?>">
                  <?php echo $order->purchase_code; ?> /<br><?php echo $order->purchase_at; ?>
                </td>
                <td class="col-md-1 col-sm-1 col-xs-1">
                  <?php
                  if ($order->user_id == 0) {
                    echo '비회원주문';
                  } else {
                    echo $this->db->get_where('user', array('user_id' => $order->user_id))->row()->email;
                  }
                  ?>
                </td>
                <td class="col-md-2 col-sm-1 col-xs-1"><?php echo $order->item_name; ?></td>
                <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $order->total_purchase_cnt; ?></td>
                <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $this->shop_model->get_shipping_status_str($order->shipping_status); ?></td>
                <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $this->crud_model->get_product_shipping_free_str($order->free_shipping); ?></td>
                <td class="col-md-1 col-sm-1 col-xs-1">
                  <select disabled class="form-control shipping-company">
                    <option value="0">배송사</option>
                    <?php foreach ($shop_shipping_company as $company) { ?>
                      <option <?php if ($company->shipping_company_code == $order->shipping_data->shipping_company) echo 'selected'; ?>
                        value="<?php echo $company->shipping_company_code; ?>"><?php echo $company->shipping_company_name; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td class="col-md-1 col-sm-1 col-xs-1">
                  <input readonly class="form-control shipping-code" name="shipping-code" style="font-size: 10px; width: auto; height: 30px; border: none;" placeholder="운송장번호"
                  value="<?php echo $order->shipping_data->shipping_code; ?>"/>
                </td>
                <td class="col-md-1 col-sm-1 col-xs-1" style="width: 100%; margin: auto">
                  <button class="btn btn-info" onclick="get_info(<?php echo $order->purchase_product_id; ?>)"
                          style="font-size: 10px; width: auto; height: 30px; margin: auto">정보</button>
                  <? if ($ship_status == SHOP_SHIPPING_STATUS_COMPLETED) { ?>
                    <button class="btn btn-mint" onclick="open_req_order_modal(<?php echo $order->purchase_product_id; ?>, <?php echo SHOP_ORDER_REQ_TYPE_CHANGE; ?>)"
                            style="font-size: 10px; width: auto; height: 30px; margin: auto"><?php echo $this->shop_model->get_order_req_type_str(SHOP_ORDER_REQ_TYPE_CHANGE); ?></button>
                    <button class="btn btn-danger" onclick="open_req_order_modal(<?php echo $order->purchase_product_id; ?>, <?php echo SHOP_ORDER_REQ_TYPE_RETURN; ?>)"
                            style="font-size: 10px; width: auto; height: 30px; margin: auto"><?php echo $this->shop_model->get_order_req_type_str(SHOP_ORDER_REQ_TYPE_RETURN); ?></button>
                  <? } ?>
                </td>
              </tr>
            <?php }?>
            </tbody>
          <?php } else if ($ship_status == SHOP_SHIPPING_STATUS_ORDER_CANCELED ||
            $ship_status == SHOP_SHIPPING_STATUS_PURCHASE_CHANGING ||
            $ship_status == SHOP_SHIPPING_STATUS_PURCHASE_CHANGED ||
            $ship_status == SHOP_SHIPPING_STATUS_PURCHASE_CANCELED ||
            $ship_status == SHOP_SHIPPING_STATUS_PURCHASE_CANCELING) {
            if ($ship_status == SHOP_SHIPPING_STATUS_ORDER_CANCELED) {
              $req_type = SHOP_ORDER_REQ_TYPE_CANCEL;
            } else if ($ship_status == SHOP_SHIPPING_STATUS_PURCHASE_CHANGING ||
              $ship_status == SHOP_SHIPPING_STATUS_PURCHASE_CHANGED) {
              $req_type = SHOP_ORDER_REQ_TYPE_CHANGE;
            } else if ($ship_status == SHOP_SHIPPING_STATUS_PURCHASE_CANCELING ||
              $ship_status == SHOP_SHIPPING_STATUS_PURCHASE_CANCELED) {
              $req_type = SHOP_ORDER_REQ_TYPE_RETURN;
            }
            ?>
            <thead>
            <tr>
              <th class="col-md-1 col-sm-1 col-xs-1">
                <input class="form-control" id="item-list-all" type="checkbox" name="list_all" onchange="check_all()"/>
              </th>
              <th class="col-md-1 col-sm-1 col-xs-1">구매번호/날짜</th>
              <th class="col-md-1 col-sm-1 col-xs-1">주문자</th>
              <th class="col-md-2 col-sm-2 col-xs-2">상품명/옵션</th>
              <th class="col-md-1 col-sm-1 col-xs-1">수량</th>
              <th class="col-md-1 col-sm-1 col-xs-1">주문상태</th>
              <th class="col-md-1 col-sm-1 col-xs-1"><?php echo $this->shop_model->get_order_req_type_str($req_type); ?> 일자</th>
              <th class="col-md-2 col-sm-2 col-xs-2"><?php echo $this->shop_model->get_order_req_type_str($req_type); ?> 사유</th>
              <th class="col-md-1 col-sm-1 col-xs-1">기타</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($order_data as $order) {
              $order->shipping_data = json_decode($order->shipping_data);
              ?>
              <tr>
                <td class="col-md-1 col-sm-1 col-xs-1">
                  <input class="form-control item-list-checkbox" data-id="<?php echo $order->purchase_product_id; ?>"
                         type="checkbox" name="list[]" onclick="check_change();" value="1"/>
                </td>
                <td class="col-md-1 col-sm-1 col-xs-1 purchase-code" data-code="<?php echo $order->purchase_code; ?>">
                  <?php echo $order->purchase_code; ?> /<br><?php echo $order->purchase_at; ?>
                </td>
                <td class="col-md-1 col-sm-1 col-xs-1">
                  <?php
                  if ($order->user_id == 0) {
                    echo '비회원주문';
                  } else {
                    echo $this->db->get_where('user', array('user_id' => $order->user_id))->row()->email;
                  }
                  ?>
                </td>
                <td class="col-md-2 col-sm-2 col-xs-2"><?php echo $order->item_name; ?></td>
                <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $order->total_purchase_cnt; ?></td>
                <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $this->shop_model->get_shipping_status_str($order->shipping_status); ?></td>
                <td class="col-md-1 col-sm-1 col-xs-1">
                  <?php echo $order->canceled_at; ?>
                </td>
                <td class="col-md-2 col-sm-2 col-xs-2">
                  <?php echo $order->cancel_reason; ?>
                </td>
                <td class="col-md-1 col-sm-1 col-xs-1" style="width: 100%; margin: auto">
                  <button class="btn btn-info" onclick="get_info(<?php echo $order->purchase_product_id; ?>)"
                          style="font-size: 10px; width: auto; height: 30px; margin: auto">정보</button>
              </tr>
            <?php }?>
            </tbody>
          <?php } ?>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-12 col-sm-12 col-xs-12 item-list-pagination">
    <div class="col-md-4 col-sm-4 col-xs-4">
    </div>
    <div class="col-md-4 col-sm-4 col-xs-4">
      <ul class="nav">
        <li class="col-md-1 col-sm-1 col-xs-1 li-empty"></li>
        <li class="col-md-1 col-sm-1 col-xs-1 li-empty"></li>
        <li class="col-md-1 col-sm-1 col-xs-1 li-empty"></li>
        <?php if ($prev>= 2) { ?>
          <a href="javascript:void(0);" onclick="get_order_page('1');"><li class="col-md-1 col-sm-1 col-xs-1"><span class="fa fa-angle-double-left"></span></li></a>
          <a href="javascript:void(0);" onclick="get_order_page('<?php echo $prev - 1; ?>');"><li class="col-md-1 col-sm-1 col-xs-1"><span class="fa fa-angle-left"></span></li></a>
        <?php } else { ?>
          <li class="col-md-1 col-sm-1 col-xs-1 li-empty"></li>
          <li class="col-md-1 col-sm-1 col-xs-1 li-empty"></li>
        <?php }?>
        <?php if ($prev == '') { ?>
          <li class="col-md-1 col-sm-1 col-xs-1 li-empty"></li>
        <?php } else { ?>
          <a href="javascript:void(0);" onclick="get_order_page('<?php echo $prev; ?>');"><li class="col-md-1 col-sm-1 col-xs-1 "><?php echo $prev; ?></li></a>
        <?php }?>
        <li class="col-md-1 col-sm-1 col-xs-1 active"><?php echo $page; ?></li>
        <?php if ($next == '') { ?>
          <li class="col-md-1 col-sm-1 col-xs-1 li-empty"></li>
        <?php } else { ?>
          <a href="javascript:void(0);" onclick="get_order_page('<?php echo $next; ?>');"><li class="col-md-1 col-sm-1 col-xs-1 "><?php echo $next; ?></li></a>
        <?php }?>
        <?php if ($total - $page >= 2) { ?>
          <a href="javascript:void(0);" onclick="get_order_page('<?php echo $next + 1; ?>');"><li class="col-md-1 col-sm-1 col-xs-1 "><span class="fa fa-angle-right"></span></li></a>
          <a href="javascript:void(0);" onclick="get_order_page('<?php echo $total; ?>');"><li class="col-md-1 col-sm-1 col-xs-1 "><span class="fa fa-angle-double-right"></span></li></a>
        <?php } else { ?>
          <li class="col-md-1 col-sm-1 col-xs-1  li-empty"></li>
          <li class="col-md-1 col-sm-1 col-xs-1  li-empty"></li>
        <?php }?>
        <li class="col-md-1 col-sm-1 col-xs-1 li-empty"></li>
        <li class="col-md-1 col-sm-1 col-xs-1 li-empty"></li>
        <li class="col-md-1 col-sm-1 col-xs-1 li-empty"></li>
      </ul>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-4">
    </div>
  </div>
</div>
<div class="modal fade" id="reqOrderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="width: 5px; padding: 0 15px">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="req-title">
        </h4>
      </div>
      <div class="modal-body" style="padding-top: 0 !important;">
        <div class="req-reason-body">
          <label style="width: 100%; font-size: 16px;">
            사유
            <textarea rows="10" data-height="500" name='req_reason' id='req-reason' class="form-control" wrap="hard"></textarea>
          </label>
        </div>
      </div>
      <div class="modal-footer" style="display: block;">
        <button type="button" class="btn btn-theme btn-theme-sm" style="text-transform: none; background-color: black; color:white; width:20%; font-weight: 400;"
                onclick="order_req();">확인</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="orderInfoModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" style="padding-top: 50px;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="width: 5%">
          <span class="pull-right" aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">주문정보</h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer" style="display: block;">
        <button type="button" class="btn btn-theme btn-theme-sm" onclick="close_info()"
                style="text-transform: none; width: 20%; font-weight: 400; color: #fff; background-color: black">확인</button>
      </div>
    </div>
  </div>
</div>
<div class="pop-wrap" id="fd-shop" style="display: none;">
  <div class="pop__cnt">
    <div class="cnt-wrap" id="cancel-popup-wrap">
    </div>
    <button class="pop__close" onclick="close_cancel_popup()">
      <img class="close--symbol" src="<?= base_url(); ?>template/front/header/imgs/icon_close_black.png" width="12" height="12" alt="닫기" style="opacity: 0.2;">
    </button>
  </div>
</div>
<style>
  .item-list-pagination {
    padding: 15px;
    text-align: center;
  }
  .item-list-pagination div ul {
    display: flex;
  }
  .item-list-pagination div ul li {
    width: 30px;
    height: 30px;
    line-height: 30px;
    color: #DBDBDB;
    text-align: center;
    font-size: 14px;
  }
  .item-list-pagination div ul li.li-empty {
    border: none;
  }
  .item-list-pagination div ul li.active {
    color: #353535;
  }
</style>
<script>

  let page = <?php echo $page; ?>;
  let ship_status = <?php echo $ship_status; ?>;
  let start_date = '<?php echo $start_date; ?>';
  let end_date = '<?php echo $end_date; ?>';
  let confirm_delay = <?php echo $confirm_delay; ?>;

  function close_info() {
    $('#orderInfoModal').modal('hide');
  }

  function get_info(id) {
    let modal = $('#orderInfoModal');
    let info = $('#orderInfoModal .modal-body');
  
    modal.modal('show');
    modal.appendTo('body');
    info.html(loading_set);
    info.load("<?php echo base_url()?>shop/order/view/" + id);
  }
  
  function get_order_page(page) {
    // console.log(ship_status);
    // console.log(start_date);
    // console.log(end_date);
    // console.log(confirm_delay);
    $('#loading_set').show();
    window.location.href = encodeURI("<?php echo base_url();?>shop/order?page=" + page + "&ship_status=" + ship_status
    + "&start_date=" + start_date + "&end_date=" + end_date + "&confirm_delay=" + confirm_delay);
  }

  function search_order_page() {
    let _ship_status = $('#shipping-status').find('option:selected').val();
    let _start_date = $('#start-date').val();
    let _end_date = $('#end-date').val();
    let _confirm_delay = ($('#confirm-delay').prop('checked') === true ? '1' : '0');

    // console.log(_ship_status);
    // console.log(_start_date);
    // console.log(_end_date);
    // console.log(_confirm_delay);
  
    $('#loading_set').show();
    window.location.href = encodeURI("<?php echo base_url();?>shop/order?page=1" + "&ship_status=" + _ship_status
      + "&start_date=" + _start_date + "&end_date=" + _end_date + "&confirm_delay=" + _confirm_delay);
  }
  
  function check_all() {
    if ($('#item-list-all').is(':checked') === true) {
      $('.order-list').find('input:checkbox').prop('checked', true);
      // $('#order-status-change').attr('disabled', false);
      // $('#order-status-change-btn').attr('disabled', false);
    } else {
      $('.order-list').find('input:checkbox').prop('checked', false);
      // $('#order-status-change').attr('disabled', true);
      // $('#order-status-change-btn').attr('disabled', true);
    }
  }

  function check_change() {
    let all_checked = true;
    let checked_cnt = 0;
    $.each($('.item-list-checkbox'), function (i,e) {
      if ($(e).prop('checked') === false) {
        all_checked = false;
      } else {
        checked_cnt++;
      }
    });
  
    if (all_checked === true) {
      $('#item-list-all').prop('checked', true);
    } else {
      $('#item-list-all').prop('checked', false);
    }
  
    // console.log(checked_cnt);
  
    if (checked_cnt === 0) {
      // $('#order-status-change').attr('disabled', true);
      // $('#order-status-change-btn').attr('disabled', true);
      // $('#order-cancel-btn').attr('disabled', true);
    } else {
      // $('#order-status-change').attr('disabled', false);
      // $('#order-status-change-btn').attr('disabled', false);
      // $('#order-cancel-btn').attr('disabled', false);
    }
  }

  function get_shipping_infos(check) {
    let shipping_infos = Array();
    let idx = 0;
    let validate = true;
  
    $.each($('.item-list-checkbox'), function(i,e) {
      if ($(e).prop('checked') === true) {
        let purchase_product_id = $(e).data('id');
      
        shipping_infos[idx] = Object();
        shipping_infos[idx].purchase_product_id = purchase_product_id;
      
        if (check === true && ship_status === <?php echo SHOP_SHIPPING_STATUS_PREPARE; ?>) {
          let purchase_code = $(e).closest('tr').find('.purchase-code').data('code');
          let shipping_company = $(e).closest('tr').find('.shipping-company option:selected').val();
          let shipping_code = $(e).closest('tr').find('.shipping-code').val();
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
      }
    });
  
    if (validate === false) {
      return null;
    }
    
    if (shipping_infos.length === 0) {
      alert('상품을 선택해 주세요!');
      return null;
    }
  
    return shipping_infos;
  }

  function change_status() {
    let next_status = <?php echo $next_status; ?>;
  
    /*
    let shipping_infos = Array();
    let idx = 0;
    let validate = true;
 
    $.each($('.item-list-checkbox'), function(i,e) {
      if ($(e).prop('checked') === true) {
        let purchase_product_id = $(e).data('id');
  
        shipping_infos[idx] = Object();
        shipping_infos[idx].purchase_product_id = purchase_product_id;
        
        if (ship_status === <?php //echo SHOP_SHIPPING_STATUS_PREPARE; ?>) {
          let purchase_code = $(e).closest('tr').find('.purchase-code').data('code');
          let shipping_company = $(e).closest('tr').find('.shipping-company option:selected').val();
          let shipping_code = $(e).closest('tr').find('.shipping-code').val();
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
      }
    });
    
    if (validate === false) {
      return false;
    }
    */
    
    let shipping_infos = get_shipping_infos(true);
    if (shipping_infos === null) {
      return false;
    }
  
    // console.log(ship_status);
    // console.log(next_status);
    // console.log(shipping_infos);
    
    $('#loading_set').show();
    
    let formData = new FormData();
    formData.append('ship_status', ship_status);
    formData.append('next_status', next_status);
    formData.append('shipping_infos', JSON.stringify(shipping_infos));
  
    $.ajax({
      url: '<?php echo base_url(); ?>shop/order/update', // form action url
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        $('#loading_set').fadeOut(500);
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
          setTimeout(function(){location.href='<?php echo base_url(); ?>shop/order?ship_status=' + next_status;}, 1000);
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
  
  function close_cancel_popup() {
    $('#fd-shop').hide();
  }

  function process_cancel(only_info, cancel_reason = '') {
    let next_status = <?php echo SHOP_SHIPPING_STATUS_ORDER_CANCELED; ?>;
    let shipping_infos = get_shipping_infos(false);
    if (shipping_infos === null) {
      return false;
    }
  
    // console.log(ship_status);
    // console.log(next_status);
    // console.log(only_info);
    // console.log(shipping_infos);
    // console.log(cancel_reason);
  
    $('#loading_set').show();
  
    let formData = new FormData();
    formData.append('ship_status', ship_status);
    formData.append('next_status', next_status);
    formData.append('cancel_reason', cancel_reason);
    formData.append('only_info', only_info === true ? '1' : '0');
    formData.append('shipping_infos', JSON.stringify(shipping_infos));
    
    $.ajax({
      url: '<?php echo base_url(); ?>shop/order/update', // form action url
      type: 'POST', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      data: formData, // serialize form data
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        $('#loading_set').fadeOut(500);
        if (only_info) {
          if (data === 'fail' || data.search('alert') !== -1) {
            let title = '<strong>실패하였습니다</strong>';
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
          } else {
            $('#cancel-popup-wrap').html(data);
            $('#fd-shop').show();
          }
        } else {
          if (data === 'done' || data.search('done') !== -1) {
            $.notify({
              message: '취소되었습니다.',
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
            setTimeout(function(){location.href='<?php echo base_url(); ?>shop/order?ship_status=' + next_status;}, 1000);
          } else {
            let title = '<strong>실패하였습니다</strong>';
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
        }
      },
      error: function (e) {
        console.log(e)
      }
    });
  }

  function get_cancel_info() {
    return process_cancel(true);
  }

  function do_cancel() {
    let cancel_reason = $('#cancel-reason').val();
    return process_cancel(false, cancel_reason);
  }

  let req_id = 0;
  let req_type = <?php echo SHOP_ORDER_REQ_TYPE_DEFAULT; ?>;
  function open_req_order_modal(id, type) {
    // console.log(id);
    req_id = id;
    req_type = type;
    
    if (type === <?php echo SHOP_ORDER_REQ_TYPE_CANCEL; ?>) {
      $('#req-title').text('<?php echo $this->shop_model->get_order_req_type_str(SHOP_ORDER_REQ_TYPE_CANCEL); ?> 신청')
    } else if (type === <?php echo SHOP_ORDER_REQ_TYPE_CHANGE; ?>) {
      $('#req-title').text('<?php echo $this->shop_model->get_order_req_type_str(SHOP_ORDER_REQ_TYPE_CHANGE); ?> 신청')
    } else if (type === <?php echo SHOP_ORDER_REQ_TYPE_RETURN; ?>) {
      $('#req-title').text('<?php echo $this->shop_model->get_order_req_type_str(SHOP_ORDER_REQ_TYPE_RETURN); ?> 신청')
    } else {
      return false;
    }
    
    $('#reqOrderModal').modal('show');
    return true;
  }
  function order_req() {
    let req_reason = $('#req-reason').val();
    
    // console.log(req_id);
    // console.log(req_type);
    // console.log(req_reason);
  
    $('#loading_set').show();
    
    let formData = new FormData();
    formData.append('req_id', req_id);
    formData.append('req_type', req_type);
    formData.append('req_reason', req_reason);
  
    $.ajax({
      url: '<?php echo base_url(); ?>shop/order/req',
      type: 'post', // form submit method get/post
      dataType: 'html',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        $("#loading_set").fadeOut(500);
        // console.log(data);
        if (data === 'done' || data.search('done') !== -1) {
          $.notify({
            message: '신청되었습니다.',
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
          setTimeout(function(){location.reload();}, 1000);
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
        console.log(e);
      }
    });
  
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
  
    // console.log(purchase_product_id);
    // console.log(shipping_data);
  
    $('#loading_set').show();
    
    let formData = new FormData();
    formData.append('purchase_product_id', purchase_product_id);
    formData.append('shipping_data', JSON.stringify(shipping_data));
  
    $.ajax({
      url: '<?php echo base_url(); ?>shop/order/update/ship', // form action url
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
          setTimeout(function(){location.reload(true);}, 1000);
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
  
  $(document).ready(function(){
    $('#datetimepicker1').datetimepicker();
    $('#datetimepicker2').datetimepicker();
  });
</script>
