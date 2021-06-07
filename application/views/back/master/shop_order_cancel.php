<div class="cnt--tit">
  <p class="tit-case"><?= ($no_cancel_info->total_balance - $no_cancel_info->total_discount) == 0 ? '전체' : '부분'; ?>취소</p>
</div>
<div class="cnt--table">
  <table class="table-price price-normal">
    <colgroup>
      <col width="64%">
      <col width="36%">
    </colgroup>
    <tbody>
    <tr>
      <th>최초 결제 금액</th>
      <td><?= $this->crud_model->get_price_str($total_balance - $total_discount); ?>원</td>
    </tr>
    <tr>
      <th>취소 금액</th>
      <td><?= $this->crud_model->get_price_str($final_balance); ?>원</td>
    </tr>
    <tr>
      <th>기존 배송비</th>
      <td><?= $this->crud_model->get_price_str($total_shipping_fee); ?>원</td>
    </tr>
    <tr>
      <th>수정 배송</th>
      <td><?= $this->crud_model->get_price_str($no_cancel_info->total_shipping_fee); ?>원</td>
    </tr>
    </tbody>
  </table>
  <div class="table-border-stripe"></div>
  <table class="table-price price-bold">
    <colgroup>
      <col width="64%">
      <col width="36%">
    </colgroup>
    <tbody>
    <tr>
      <th>취소 후 결제 금액</th>
      <td><?= $this->crud_model->get_price_str($no_cancel_info->total_balance - $no_cancel_info->total_discount); ?>원</td>
    </tr>
    </tbody>
  </table>
</div>
<div class="cnt--cancel">
  <p class="cancel-reason-tit">취소 사유</p>
  <form class="cancel-reason-write">
    <!-- 최소 5자 ~ 200자 -->
    <textarea placeholder="최소 5자 ~ 200자" id="cancel-reason" class="write-form"></textarea>
  </form>
</div>
<button class="cnt--cancel-confirm" onclick="do_cancel()">선택 제품 <?= ($no_cancel_info->total_balance - $no_cancel_info->total_discount) == 0 ? '전체' : '부분'; ?> 취소</button>
