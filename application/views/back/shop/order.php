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
      <div class="col-md-12">
        <table class="col-md-12">
          <tbody>
          <tr>
            <th class="col-md-1">배송/클레임</th>
            <td class="col-md-2">
              <select id='shipping-status' class="form-control">
                <optgroup label="배송관련">
                  <option <?php if ($ship_status == SHOP_SHIPPING_STATUS_WAIT) echo 'selected'; ?>
                    value="<?php echo SHOP_SHIPPING_STATUS_WAIT; ?>">
                  <?php echo $this->crud_model->get_shipping_status_str(SHOP_SHIPPING_STATUS_WAIT); ?>
                  </option>
                  <option <?php if ($ship_status == SHOP_SHIPPING_STATUS_ORDER_COMPLETED) echo 'selected'; ?>
                    value="<?php echo SHOP_SHIPPING_STATUS_ORDER_COMPLETED; ?>">
                    <?php echo $this->crud_model->get_shipping_status_str(SHOP_SHIPPING_STATUS_ORDER_COMPLETED); ?>
                  </option>
                  <option <?php if ($ship_status == SHOP_SHIPPING_STATUS_PREPARE) echo 'selected'; ?>
                    value="<?php echo SHOP_SHIPPING_STATUS_PREPARE; ?>">
                    <?php echo $this->crud_model->get_shipping_status_str(SHOP_SHIPPING_STATUS_PREPARE); ?>
                  </option>
                  <option <?php if ($ship_status == SHOP_SHIPPING_STATUS_IN_PROGRESS) echo 'selected'; ?>
                    value="<?php echo SHOP_SHIPPING_STATUS_IN_PROGRESS; ?>">
                    <?php echo $this->crud_model->get_shipping_status_str(SHOP_SHIPPING_STATUS_IN_PROGRESS); ?>
                  </option>
                  <option <?php if ($ship_status == SHOP_SHIPPING_STATUS_COMPLETED) echo 'selected'; ?>
                    value="<?php echo SHOP_SHIPPING_STATUS_COMPLETED; ?>">
                    <?php echo $this->crud_model->get_shipping_status_str(SHOP_SHIPPING_STATUS_COMPLETED); ?>
                  </option>
                </optgroup>
                <optgroup label="클레임관련">
                  <option <?php if ($ship_status == SHOP_SHIPPING_STATUS_ORDER_CANCELED) echo 'selected'; ?>
                    value="<?php echo SHOP_SHIPPING_STATUS_ORDER_CANCELED; ?>">
                    <?php echo $this->crud_model->get_shipping_status_str(SHOP_SHIPPING_STATUS_ORDER_CANCELED); ?>
                  </option>
                  <option <?php if ($ship_status == SHOP_SHIPPING_STATUS_PURCHASE_CANCELING) echo 'selected'; ?>
                    value="<?php echo SHOP_SHIPPING_STATUS_PURCHASE_CANCELING; ?>">
                    <?php echo $this->crud_model->get_shipping_status_str(SHOP_SHIPPING_STATUS_PURCHASE_CANCELING); ?>
                  </option>
                  <option <?php if ($ship_status == SHOP_SHIPPING_STATUS_PURCHASE_CANCELED) echo 'selected'; ?>
                    value="<?php echo SHOP_SHIPPING_STATUS_PURCHASE_CANCELED; ?>">
                    <?php echo $this->crud_model->get_shipping_status_str(SHOP_SHIPPING_STATUS_PURCHASE_CANCELED); ?>
                  </option>
                  <option <?php if ($ship_status == SHOP_SHIPPING_STATUS_PURCHASE_CHANGING) echo 'selected'; ?>
                    value="<?php echo SHOP_SHIPPING_STATUS_PURCHASE_CHANGING; ?>">
                    <?php echo $this->crud_model->get_shipping_status_str(SHOP_SHIPPING_STATUS_PURCHASE_CHANGING); ?>
                  </option>
                  <option <?php if ($ship_status == SHOP_SHIPPING_STATUS_PURCHASE_CHANGED) echo 'selected'; ?>
                    value="<?php echo SHOP_SHIPPING_STATUS_PURCHASE_CHANGED; ?>">
                    <?php echo $this->crud_model->get_shipping_status_str(SHOP_SHIPPING_STATUS_PURCHASE_CHANGED); ?>
                  </option>
                </optgroup>
              </select>
            </td>
            <th class="col-md-1">검색정보</th>
            <td class="col-md-2">
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
            <td colspan="3" class="col-md-5">
              <input disabledi id="query" class="form-control" value="" type="text" name="order-search" alt="" maxlength="32" placeholder="검색정보를 입력하세요"/>
            </td>
            <td class="col-md-1">
              <button class="product-search btn-dark" onclick="search_order_page()">검색</button>
            </td>
          </tr>
          <tr>
            <th class="col-md-1">브랜드</th>
            <td class="col-md-2">
              <select id="shop-brand" class="form-control">
                <option value="1"><?php echo $shop_data->shop_name; ?></option>
              </select>
            </td>
            <th class="col-md-1">결제/출고일</th>
            <td class="col-md-2">
              <div class='input-group date' id='datetimepicker1'>
                <input value="<?php echo $start_date; ?>" id="start-date" type='text' class="form-control" name="start_date" placeholder="시작날짜"/>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </td>
            <td class="col-md-1">
              ~
            </td>
            <td class="col-md-2">
              <div class='input-group date' id='datetimepicker2'>
                <input value="<?php echo $end_date; ?>" id="end-date" type='text' class="form-control" name="end_date" placeholder="종료날짜"/>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </td>
            <td class="col-md-2">
              <label style="text-align:left">
                <input <?php if ($confirm_delay) echo 'checked'; ?> id="confirm-delay" class='form-checkbox' name="order-delay" type="checkbox" value="1"/>
                <span style="padding-left: 10px;">주문확인지연</span>
              </label>
            </td>
            <td class="col-md-1">
            </td>
          </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-12">
        <hr style="width: 100%; border: 1px solid #EAEAEA">
      </div>
      <div class="col-md-12 order-list">
        <table class="col-md-12">
          <thead>
          <tr>
            <th class="col-md-1">
              <input class="form-control" id="list-all" type="checkbox" name="list_all"/>
            </th>
            <th class="col-md-1">구매날짜</th>
            <th class="col-md-1">구매번호</th>
            <th class="col-md-2">주문자</th>
            <th class="col-md-1">브랜드</th>
            <th class="col-md-2">상품명/옵션</th>
            <th class="col-md-1">수량</th>
            <th class="col-md-1">주문상태</th>
            <th class="col-md-1">상품배송유형</th>
            <th class="col-md-1">출고예정일</th>
          </tr>
          </thead>
          <tbody>
          <?php foreach ($order_data as $order) { ?>
            <tr>
              <td class="col-md-1">
                <input class="form-control" id="list-1" type="checkbox" name="list_1"/>
              </td>
              <td class="col-md-1"><?php echo $order->purchase_at; ?></td>
              <td class="col-md-1"><?php echo $order->purchase_code; ?></td>
              <td class="col-md-2"><?php echo $order->email; ?></td>
              <td class="col-md-1"><?php echo $order->shop_name; ?></td>
              <td class="col-md-2"><?php echo $order->item_name; ?></td>
              <td class="col-md-1"><?php echo $order->total_purchase_cnt; ?></td>
              <td class="col-md-1"><?php echo $this->crud_model->get_shipping_status_str($order->shipping_status); ?></td>
              <td class="col-md-1"><?php echo $this->crud_model->get_product_shipping_free_str($order->free_shipping); ?></td>
              <td class="col-md-1">-</td>
            </tr>
          <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-12 item-list-pagination">
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
      <ul class="nav">
        <li class="col-md-1 li-empty"></li>
        <li class="col-md-1 li-empty"></li>
        <li class="col-md-1 li-empty"></li>
        <?php if ($prev>= 2) { ?>
          <a href="javascript:void(0);" onclick="get_order_page('1');"><li class="col-md-1"><span class="fa fa-angle-double-left"></span></li></a>
          <a href="javascript:void(0);" onclick="get_order_page('<?php echo $prev - 1; ?>');"><li class="col-md-1"><span class="fa fa-angle-left"></span></li></a>
        <?php } else { ?>
          <li class="col-md-1 li-empty"></li>
          <li class="col-md-1 li-empty"></li>
        <?php }?>
        <?php if ($prev == '') { ?>
          <li class="col-md-1 li-empty"></li>
        <?php } else { ?>
          <a href="javascript:void(0);" onclick="get_order_page('<?php echo $prev; ?>');"><li class="col-md-1"><?php echo $prev; ?></li></a>
        <?php }?>
        <li class="col-md-1 active"><?php echo $page; ?></li>
        <?php if ($next == '') { ?>
          <li class="col-md-1 li-empty"></li>
        <?php } else { ?>
          <a href="javascript:void(0);" onclick="get_order_page('<?php echo $next; ?>');"><li class="col-md-1"><?php echo $next; ?></li></a>
        <?php }?>
        <?php if ($total - $page >= 2) { ?>
          <a href="javascript:void(0);" onclick="get_order_page('<?php echo $next + 1; ?>');"><li class="col-md-1"><span class="fa fa-angle-right"></span></li></a>
          <a href="javascript:void(0);" onclick="get_order_page('<?php echo $total; ?>');"><li class="col-md-1"><span class="fa fa-angle-double-right"></span></li></a>
        <?php } else { ?>
          <li class="col-md-1 li-empty"></li>
          <li class="col-md-1 li-empty"></li>
        <?php }?>
        <li class="col-md-1 li-empty"></li>
        <li class="col-md-1 li-empty"></li>
        <li class="col-md-1 li-empty"></li>
      </ul>
    </div>
    <div class="col-md-4">
    </div>
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

  function get_order_page(page) {
    console.log(ship_status);
    console.log(start_date);
    console.log(end_date);
    console.log(confirm_delay);

    window.location.href = encodeURI("<?php echo base_url();?>shop/order?page=" + page + "&ship_status=" + ship_status
    + "&start_date=" + start_date + "&end_date=" + end_date + "&confirm_delay=" + confirm_delay);
  }

  function search_order_page() {
    let _ship_status = $('#shipping-status').find('option:selected').val();
    let _start_date = $('#start-date').val();
    let _end_date = $('#end-date').val();
    let _confirm_delay = $('#confirm-delay').val();

    console.log(_ship_status);
    console.log(_start_date);
    console.log(_end_date);
    console.log(_confirm_delay);

    window.location.href = encodeURI("<?php echo base_url();?>shop/order?page=1" + "&ship_status=" + _ship_status
      + "&start_date=" + _start_date + "&end_date=" + _end_date + "&confirm_delay=" + _confirm_delay);
  }
</script>
<script>
  $(document).ready(function(){
    $('#datetimepicker1').datetimepicker();
    $('#datetimepicker2').datetimepicker();
  });
</script>
