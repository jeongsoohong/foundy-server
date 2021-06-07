<div class="table--tip clearfix">
  <!--        <p class="tipStatus">주문목록 [ 총 <span>0</span>건 ]</p>-->
  <div class="tipBtns">
    <?php if ($ship_status == SHOP_SHIPPING_STATUS_ORDER_COMPLETED ||
    $ship_status == SHOP_SHIPPING_STATUS_PREPARE) { ?>
    <button class="btn_elements" id="order-cancel-btn" onclick="get_cancel_info();">주문취소</button>
    <?php }
    if ($ship_status == SHOP_SHIPPING_STATUS_ORDER_COMPLETED ||
      $ship_status == SHOP_SHIPPING_STATUS_PREPARE ||
      $ship_status == SHOP_SHIPPING_STATUS_IN_PROGRESS ||
      $ship_status == SHOP_SHIPPING_STATUS_PURCHASE_CANCELING ||
      $ship_status == SHOP_SHIPPING_STATUS_PURCHASE_CHANGING) { ?>
    <button class="btn_elements" id="order-status-change-btn" onclick="change_status();">
      <<?= $this->shop_model->get_shipping_status_str($next_status); ?>>으로 변경
    </button>
    <?php } ?>
  </div>
</div>
<div class="list-table view-table" id="order_table_list">
  <?php if ($ship_status == SHOP_SHIPPING_STATUS_ORDER_COMPLETED) { ?>
    <!-- 배송관련_주문완료 -->
    <div class="table-media tableBody" style="min-width: 1080px;">
      <table class="table-box manage_table">
        <colgroup>
          <col width="4%">
          <col width="15%">
          <col width="7%">
          <col width="17%">
          <col width="16%">
          <col width="6%">
          <col width="9%">
          <col width="11%">
          <col width="14%">
        </colgroup>
        <thead>
        <tr>
          <th class="td-label chkTh">
            <input class="chkAll chkAll_1" type="checkbox" name="chkAll" id="order_chk_all" data-id="order">
            <label class="chkLabel"></label>
          </th>
          <th>
            <span class="th-span">구매날짜</span>
          </th>
          <th>
            <span class="th-span">구매번호</span>
          </th>
          <th>
            <span class="th-span">주문자</span>
          </th>
          <th>
            <span class="th-span">상품명/옵션</span>
          </th>
          <th>
            <span class="th-span">수량</span>
          </th>
          <th>
            <span class="th-span">주문상태</span>
          </th>
          <th>
            <span class="th-span">상품배송유형</span>
          </th>
          <th>
            <span class="th-span">기타</span>
          </th>
        </tr>
        </thead>
      </table>
      <div class="table-scroll auto-height scroll-y">
        <table>
          <colgroup>
            <col width="4%">
            <col width="15%">
            <col width="7%">
            <col width="17%">
            <col width="16%">
            <col width="6%">
            <col width="9%">
            <col width="11%">
            <col width="14%">
          </colgroup>
          <tbody>
          <? foreach ($order_data as $order) { ?>
            <tr>
              <td class="td-label chkTd">
                <input class="chkPiece" type="checkbox" name="chkPiece"  onclick="check_piece('order')" data-id="<?= $order->purchase_product_id; ?>">
                <label class="chkLabel"></label>
              </td>
              <td>
                <!-- 구매날짜: 시간 (년-월-일 시:분:초) -->
                <span class="td-span">
                  <?= date('Y.m.d H:i:s', strtotime($order->purchase_at)); ?>
                </span>
              </td>
              <td>
                <!-- 구매번호 -->
                <span class="td-span purchase-code" data-code="<?php echo $order->purchase_code; ?>">
                  <?= $order->purchase_code; ?>
                </span>
              </td>
              <td>
                <!-- 주문자 이메일 -->
                <span class="td-span">
                  <?php
                  if ($order->user_id == 0) {
                    echo '비회원주문';
                  } else {
                    echo $this->db->get_where('user', array('user_id' => $order->user_id))->row()->email;
                  }
                  ?>
                </span>
              </td>
              <td>
                <!-- 상품명 (옵션) -->
                <span class="td-span">
                  <?= $order->item_name; ?>
                </span>
              </td>
              <td>
                <!-- 수량 -->
                <span class="td-span">
                  <?= $order->total_purchase_cnt; ?>
                </span>
              </td>
              <td>
                <!-- 주문완료 -->
                <span class="td-span">
                  <?php echo $this->shop_model->get_shipping_status_str($order->shipping_status); ?>
                </span>
              </td>
              <td>
                <!-- 무료배송 / 조건부 무료배송 -->
                <span class="td-span">
                  <?php echo $this->crud_model->get_product_shipping_free_str($order->free_shipping); ?>
                </span>
              </td>
              <td>
                <!-- 정보 -->
                <span class="td-span td-depth">
                  <button class="td-depth__info see-item-step" onclick="get_order_info(<?= $order->purchase_product_id; ?>)">정보</button>
                </span>
              </td>
            </tr>
          <? } ?>
          </tbody>
        </table>
      </div>
    </div>
  <? } ?>
  <? if ($ship_status == SHOP_SHIPPING_STATUS_PREPARE) { ?>
    <!-- 배송관련_배송준비중 -->
    <div class="table-media tableBody" style="min-width: 1080px;">
      <table class="table-box manage_table">
        <colgroup>
          <col width="4%">
          <col width="12%">
          <col width="12%">
          <col width="15%">
          <col width="6%">
          <col width="7%">
          <col width="11%">
          <col width="11%">
          <col width="12%">
          <col width="10%">
        </colgroup>
        <thead>
        <tr>
          <th class="td-label chkTh">
            <input class="chkAll chkAll_1" type="checkbox" name="chkAll" id="order_chk_all" data-id="order">
            <label class="chkLabel"></label>
          </th>
          <th>
            <span class="th-span">구매번호/날짜</span>
          </th>
          <th>
            <span class="th-span">주문자</span>
          </th>
          <th>
            <span class="th-span">상품명/옵션</span>
          </th>
          <th>
            <span class="th-span">수량</span>
          </th>
          <th>
            <span class="th-span">주문상태</span>
          </th>
          <th>
            <span class="th-span">상품배송유형</span>
          </th>
          <th>
            <span class="th-span">배송사</span>
          </th>
          <th>
            <span class="th-span">운송장번호</span>
          </th>
          <th>
            <span class="th-span">기타</span>
          </th>
        </tr>
        </thead>
      </table>
      <div class="table-scroll auto-height scroll-y">
        <table>
          <colgroup>
            <col width="4%">
            <col width="10%">
            <col width="12%">
            <col width="15%">
            <col width="6%">
            <col width="9%">
            <col width="11%">
            <col width="11%">
            <col width="12%">
            <col width="10%">
          </colgroup>
          <tbody>
          <? foreach ($order_data as $order) { ?>
            <tr>
              <td class="td-label chkTd">
                <input class="chkPiece" type="checkbox" name="chkPiece"  onclick="check_piece('order')" data-id="<?= $order->purchase_product_id; ?>">
                <label class="chkLabel"></label>
              </td>
              <td>
                <!-- 구매번호 / 시간 (년-월-일 시:분:초) -->
                <span class="td-span purchase-code"  data-code="<?php echo $order->purchase_code; ?>">
                  <?= $order->purchase_code; ?>
                  <br>/<br>
                  <?= date('Y.m.d H:i:s', strtotime($order->purchase_at)); ?>
                </span>
              </td>
              <td>
                <!-- 주문자 이메일 -->
                <span class="td-span">
                  <?php
                  if ($order->user_id == 0) {
                    echo '비회원주문';
                  } else {
                    echo $this->db->get_where('user', array('user_id' => $order->user_id))->row()->email;
                  }
                  ?>
                </span>
              </td>
              <td>
                <!-- 상품명 (옵션) -->
                <span class="td-span">
                  <?= $order->item_name; ?>
                </span>
              </td>
              <td>
                <!-- 수량 -->
                <span class="td-span">
                  <?= $order->total_purchase_cnt; ?>
                </span>
              </td>
              <td>
                <!-- 배송준비중 -->
                <span class="td-span">
                  <?php echo $this->shop_model->get_shipping_status_str($order->shipping_status); ?>
                </span>
              </td>
              <td>
                <!-- 무료배송 / 조건부 무료배송 -->
                <span class="td-span">
                  <?php echo $this->crud_model->get_product_shipping_free_str($order->free_shipping); ?>
                </span>
              </td>
              <td>
                <!-- 배송사 -->
                <span class="td-span">
                  <select class="deliver__slct shipping-company">
                      <!-- option 수: 지정한 배송사 개수만큼  -->
                    <?php foreach ($shop_shipping_company as $company) { ?>
                      <option value="<?php echo $company->shipping_company_code; ?>"><?php echo $company->shipping_company_name; ?></option>
                    <?php } ?>
                  </select>
                </span>
              </td>
              <td>
                <!-- 운송장 번호 -->
                <span class="td-span">
                  <input type="text" placeholder="운송장번호" class="td-waybill-number shipping-code" style="background-color: #fcfafa;">
                </span>
              </td>
              <td>
                <!-- 정보 -->
                <span class="td-span td-depth">
                    <button class="td-depth__info see-item-step" onclick="get_order_info(<?= $order->purchase_product_id; ?>)">정보</button>
                  </span>
              </td>
            </tr>
          <? } ?>
          </tbody>
        </table>
      </div>
    </div>
  <? } ?>
  
  <? if ($ship_status == SHOP_SHIPPING_STATUS_IN_PROGRESS) { ?>
    <!-- 배송관련_배송중 -->
    <div class="table-media tableBody" style="min-width: 1080px;">
      <table class="table-box manage_table">
        <colgroup>
          <col width="4%">
          <col width="12%">
          <col width="12%">
          <col width="15%">
          <col width="6%">
          <col width="7%">
          <col width="11%">
          <col width="11%">
          <col width="12%">
          <col width="10%">
        </colgroup>
        <thead>
        <tr>
          <th class="td-label chkTh">
            <input class="chkAll chkAll_1" type="checkbox" name="chkAll" id="order_chk_all" data-id="order">
            <label class="chkLabel"></label>
          </th>
          <th>
            <span class="th-span">구매번호/날짜</span>
          </th>
          <th>
            <span class="th-span">주문자</span>
          </th>
          <th>
            <span class="th-span">상품명/옵션</span>
          </th>
          <th>
            <span class="th-span">수량</span>
          </th>
          <th>
            <span class="th-span">주문상태</span>
          </th>
          <th>
            <span class="th-span">상품배송유형</span>
          </th>
          <th>
            <span class="th-span">배송사</span>
          </th>
          <th>
            <span class="th-span">운송장번호</span>
          </th>
          <th>
            <span class="th-span">기타</span>
          </th>
        </tr>
        </thead>
      </table>
      <div class="table-scroll auto-height scroll-y">
        <table>
          <colgroup>
            <col width="4%">
            <col width="10%">
            <col width="12%">
            <col width="15%">
            <col width="6%">
            <col width="9%">
            <col width="11%">
            <col width="11%">
            <col width="12%">
            <col width="10%">
          </colgroup>
          <tbody>
          <? foreach ($order_data as $order) {
            $order->shipping_data = json_decode($order->shipping_data);
            ?>
            <tr>
              <td class="td-label chkTd">
                <input class="chkPiece" type="checkbox" name="chkPiece"  onclick="check_piece('order')" data-id="<?= $order->purchase_product_id; ?>">
                <label class="chkLabel"></label>
              </td>
              <td>
                <!-- 구매번호 / 시간 (년-월-일 시:분:초) -->
                <span class="td-span purchase-code"  data-code="<?php echo $order->purchase_code; ?>">
                  <?= $order->purchase_code; ?>
                  <br>/<br>
                  <?= date('Y.m.d H:i:s', strtotime($order->purchase_at)); ?>
                </span>
              </td>
              <td>
                <!-- 주문자 이메일 -->
                <span class="td-span">
                  <?php
                  if ($order->user_id == 0) {
                    echo '비회원주문';
                  } else {
                    echo $this->db->get_where('user', array('user_id' => $order->user_id))->row()->email;
                  }
                  ?>
                </span>
              </td>
              <td>
                <!-- 상품명 (옵션) -->
                <span class="td-span">
                  <?= $order->item_name; ?>
                </span>
              </td>
              <td>
                <!-- 수량 -->
                <span class="td-span">
                  <?= $order->total_purchase_cnt; ?>
                </span>
              </td>
              <td>
                <!-- 배송중 -->
                <span class="td-span">
                  <?php echo $this->shop_model->get_shipping_status_str($order->shipping_status); ?>
                </span>
              </td>
              <td>
                <!-- 무료배송 / 조건부 무료배송 -->
                <span class="td-span">
                  <?php echo $this->crud_model->get_product_shipping_free_str($order->free_shipping); ?>
                </span>
              </td>
              <td>
                <!-- 배송사 -->
                <span class="td-span">
                  <select class="deliver__slct shipping-company">
                    <!-- option 수: 지정한 배송사 개수만큼  -->
                    <?php foreach ($shop_shipping_company as $company) { ?>
                      <option <?php if ($company->shipping_company_code == $order->shipping_data->shipping_company) echo 'selected'; ?>
                      value="<?php echo $company->shipping_company_code; ?>"><?php echo $company->shipping_company_name; ?></option>
                    <?php } ?>
                  </select>
                </span>
              </td>
              <td>
                <!-- 운송장 번호 -->
                <span class="td-span">
                  <input type="text" placeholder="운송장번호" value="<?php echo $order->shipping_data->shipping_code; ?>"
                         class="td-waybill-number shipping-code" style="background-color: #fcfafa;">
                </span>
              </td>
              <td>
                <!-- 정보 -->
                <span class="td-span td-depth">
                    <button class="td-depth__info see-item-step" onclick="get_order_info(<?= $order->purchase_product_id; ?>)">정보</button>
                    <button class="td-depth__info depth__tracking" onclick="change_shipping_data(this)" data-id="<?php echo $order->purchase_product_id; ?>" style="width: 62px;">
                      송장수정
                    </button>
                  </span>
              </td>
            </tr>
          <? } ?>
          </tbody>
        </table>
      </div>
    </div>
  <? } ?>
  <? if ($ship_status == SHOP_SHIPPING_STATUS_COMPLETED || $ship_status == SHOP_SHIPPING_STATUS_PURCHASE_COMPLETED) { ?>
    <!-- 배송관련_배송완료 -->
    <div class="table-media tableBody" style="min-width: 1080px;">
      <table class="table-box manage_table">
        <colgroup>
          <col width="4%">
          <col width="12%">
          <col width="12%">
          <col width="15%">
          <col width="6%">
          <col width="7%">
          <col width="11%">
          <col width="11%">
          <col width="12%">
          <col width="10%">
        </colgroup>
        <thead>
        <tr>
          <th class="td-label chkTh">
            <input class="chkAll chkAll_1" type="checkbox" name="chkAll" id="order_chk_all" data-id="order">
            <label class="chkLabel"></label>
          </th>
          <th>
            <span class="th-span">구매번호/날짜</span>
          </th>
          <th>
            <span class="th-span">주문자</span>
          </th>
          <th>
            <span class="th-span">상품명/옵션</span>
          </th>
          <th>
            <span class="th-span">수량</span>
          </th>
          <th>
            <span class="th-span">주문상태</span>
          </th>
          <th>
            <span class="th-span">상품배송유형</span>
          </th>
          <th>
            <span class="th-span">배송사</span>
          </th>
          <th>
            <span class="th-span">운송장번호</span>
          </th>
          <th>
            <span class="th-span">기타</span>
          </th>
        </tr>
        </thead>
      </table>
      <div class="table-scroll auto-height scroll-y">
        <table>
          <colgroup>
            <col width="4%">
            <col width="12%">
            <col width="12%">
            <col width="15%">
            <col width="6%">
            <col width="7%">
            <col width="11%">
            <col width="11%">
            <col width="12%">
            <col width="10%">
          </colgroup>
          <tbody>
          <? foreach ($order_data as $order) {
            $order->shipping_data = json_decode($order->shipping_data);
            ?>
            <tr>
              <td class="td-label chkTd">
                <input class="chkPiece" type="checkbox" name="chkPiece"  onclick="check_piece('order')" data-id="<?= $order->purchase_product_id; ?>">
                <label class="chkLabel"></label>
              </td>
              <td>
                <!-- 구매번호 / 시간 (년-월-일 시:분:초) -->
                <span class="td-span purchase-code" data-code="<?php echo $order->purchase_code; ?>">
                  <?= $order->purchase_code; ?>
                  <br>/<br>
                  <?= date('Y.m.d H:i:s', strtotime($order->purchase_at)); ?>
                </span>
              </td>
              <td>
                <!-- 주문자 이메일 -->
                <span class="td-span">
                  <?php
                  if ($order->user_id == 0) {
                    echo '비회원주문';
                  } else {
                    echo $this->db->get_where('user', array('user_id' => $order->user_id))->row()->email;
                  }
                  ?>
                </span>
              </td>
              <td>
                <!-- 상품명 (옵션) -->
                <span class="td-span">
                  <?= $order->item_name; ?>
                </span>
              </td>
              <td>
                <!-- 수량 -->
                <span class="td-span">
                  <?= $order->total_purchase_cnt; ?>
                </span>
              </td>
              <td>
                <!-- 배송완료 -->
                <span class="td-span">
                  <?php echo $this->shop_model->get_shipping_status_str($order->shipping_status); ?>
                </span>
              </td>
              <td>
                <!-- 무료배송 / 조건부 무료배송 -->
                <span class="td-span">
                  <?php echo $this->crud_model->get_product_shipping_free_str($order->free_shipping); ?>
                </span>
              </td>
              <td>
                <!-- 배송사 -->
                <span class="td-span">
                  <select class="deliver__slct gray_bg gray_txt shipping-company" disabled>
                    <!-- option 수: 지정한 배송사 개수만큼  -->
                    <?php foreach ($shop_shipping_company as $company) { ?>
                      <option <?php if ($company->shipping_company_code == $order->shipping_data->shipping_company) echo 'selected'; ?>
                        value="<?php echo $company->shipping_company_code; ?>"><?php echo $company->shipping_company_name; ?></option>
                    <?php } ?>
                  </select>
                  </span>
              </td>
              <td>
                <!-- 운송장 번호 -->
                <span class="td-span">
                  <input readonly type="text" placeholder="운송장번호" value="<?php echo $order->shipping_data->shipping_code; ?>"
                           class="td-waybill-number gray_bg gray_txt shipping-code" style="background-color: #fcfafa;">
                </span>
              </td>
              <td>
                <!-- 정보 -->
                <span class="td-span td-depth scroll-y">
                  <button class="td-depth__info see-item-step" onclick="get_order_info(<?= $order->purchase_product_id; ?>)">정보</button>
                  <? if ($ship_status == SHOP_SHIPPING_STATUS_COMPLETED) { ?>
                    <button class="td-depth__info depth__tracking depth__change" id="depthChange"
                            onclick="open_req_order(<?= $order->purchase_product_id; ?>, <?= SHOP_ORDER_REQ_TYPE_CHANGE; ?>);">
                      <?php echo $this->shop_model->get_order_req_type_str(SHOP_ORDER_REQ_TYPE_CHANGE); ?>
                    </button>
                    <button class="td-depth__info depth__return" id="depthReturn"
                            onclick="open_req_order(<?= $order->purchase_product_id; ?>, <?= SHOP_ORDER_REQ_TYPE_RETURN; ?>);">
                      <?php echo $this->shop_model->get_order_req_type_str(SHOP_ORDER_REQ_TYPE_RETURN); ?>
                    </button>
                  <? } ?>
                </span>
              </td>
            </tr>
          <? } ?>
          </tbody>
        </table>
      </div>
    </div>
  <? } ?>
  
  <?php
  if ($ship_status == SHOP_SHIPPING_STATUS_ORDER_CANCELED ||
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
    <!-- 클레임관련_주문취소 -->
    <div class="table-media tableBody" style="min-width: 1080px;">
      <table class="table-box manage_table">
        <colgroup>
          <col width="4%">
          <col width="10%">
          <col width="12%">
          <col width="15%">
          <col width="6%">
          <col width="9%">
          <col width="11%">
          <col width="11%">
          <col width="10%">
        </colgroup>
        <thead>
        <tr>
          <th class="td-label chkTh">
            <input class="chkAll chkAll_1" type="checkbox" name="chkAll" id="order_chk_all" data-id="order">
            <label class="chkLabel"></label>
          </th>
          <th>
            <span class="th-span">구매번호/날짜</span>
          </th>
          <th>
            <span class="th-span">주문자</span>
          </th>
          <th>
            <span class="th-span">상품명/옵션</span>
          </th>
          <th>
            <span class="th-span">수량</span>
          </th>
          <th>
            <span class="th-span">주문상태</span>
          </th>
          <th>
            <span class="th-span"><?php echo $this->shop_model->get_order_req_type_str($req_type); ?> 일자</span>
          </th>
          <th>
            <span class="th-span"><?php echo $this->shop_model->get_order_req_type_str($req_type); ?> 사유</span>
          </th>
          <th>
            <span class="th-span">기타</span>
          </th>
        </tr>
        </thead>
      </table>
      <div class="table-scroll auto-height scroll-y">
        <table>
          <colgroup>
            <col width="4%">
            <col width="10%">
            <col width="12%">
            <col width="15%">
            <col width="6%">
            <col width="9%">
            <col width="11%">
            <col width="11%">
            <col width="10%">
          </colgroup>
          <tbody>
          <? foreach ($order_data as $order) { ?>
            <tr>
              <td class="td-label chkTd">
                <input class="chkPiece" type="checkbox" name="chkPiece"  onclick="check_piece('order')" data-id="<?= $order->purchase_product_id; ?>">
                <label class="chkLabel"></label>
              </td>
              <td>
                <!-- 구매번호 / 시간 (년-월-일 시:분:초) -->
                <span class="td-span purchase-code" data-code="<?php echo $order->purchase_code; ?>">
                  <?= $order->purchase_code; ?>
                  <br>/<br>
                  <?= date('Y.m.d H:i:s', strtotime($order->purchase_at)); ?>
                </span>
              </td>
              <td>
                <!-- 주문자 이메일 -->
                <span class="td-span">
                  <?php
                  if ($order->user_id == 0) {
                    echo '비회원주문';
                  } else {
                    echo $this->db->get_where('user', array('user_id' => $order->user_id))->row()->email;
                  }
                  ?>
                </span>
              </td>
              <td>
                <!-- 상품명 (옵션) -->
                <span class="td-span">
                  <?= $order->item_name; ?>
                </span>
              </td>
              <td>
                <!-- 수량 -->
                <span class="td-span">
                  <?= $order->total_purchase_cnt; ?>
                </span>
              </td>
              <td>
                <!-- 주문상태 -->
                <span class="td-span">
                  <?php echo $this->shop_model->get_shipping_status_str($order->shipping_status); ?>
                </span>
              </td>
              <td>
                <!-- 주문취소 일자 -->
                <span class="td-span">
                  <?php echo date('Y.m.d H:i:s', strtotime($order->canceled_at)); ?>
                </span>
              </td>
              <td>
                <!-- 주문취소 사유 -->
                <span class="td-span">
                  <?php echo $order->cancel_reason; ?>
                </span>
              </td>
              <td>
                <!-- 정보 -->
                <span class="td-span td-depth scroll-y">
                  <button class="td-depth__info see-item-step" onclick="get_order_info(<?= $order->purchase_product_id; ?>)">정보</button>
                </span>
              </td>
            </tr>
          <? } ?>
          </tbody>
        </table>
      </div>
    </div>
  <? } ?>
</div>
<div class="list-btns-wrap clearfix">
  <? include 'manage_page_btn.php'; ?>
</div>
<script>
  $('.chkAll').click(function(e) {
    let type = $(e.target).data('id');
    get_check_list(type, check_all(type, $(e.target).prop('checked')));
  });
  $(function() {
    shop_id = <?php echo $shop_id; ?>;
    ship_status = <?php echo $ship_status; ?>;
    next_status = <?php echo $next_status; ?>;
    start_date = '<?php echo $start_date; ?>';
    end_date = '<?php echo $end_date; ?>';
    confirm_delay = <?php echo $confirm_delay; ?>;
    cur_page = <?= $page; ?>
  })
</script>
