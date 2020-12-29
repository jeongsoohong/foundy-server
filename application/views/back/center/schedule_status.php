<p class="situation_tit">예약 현황</p>
<button class="situation_close" onclick="fn_close();">
  <img src="<?= base_url(); ?>template/front/header/imgs/icon_close_black.png" width="12" height="12" alt="닫기" style="opacity: 0.2;">
  <!-- popup_box, pop:history 닫기 -->
  <script>
    function fn_close() {
      $('.popup-box').hide();
      $('div[class*=situation]').hide();
    }
  </script>
</button>
<style type="text/css">
  .member--guide .guide_id {
    font-size: 18px;
  }
  .table_head tr th, .table_body tr td {
    word-break: break-all;
    text-align: center;
  }
  .table_head tr th:first-child {
    border-top-left-radius: 4px;
  }
  .table_head tr th:last-child {
    border-top-right-radius: 4px;
  }
  .btn_valid {
    box-sizing: border-box;
    width: 52px;
    height: 32px;
    border-radius: 4px;
    color: #fff;
    font-size: 10px;
    font-weight: bold;
    display: inline-block;
    line-height: 32px;
  }
  .btn_valid.change_info{
    background-color: #0091ea;
  }
  .btn_valid.view_info{
    background-color: #da6547;
  }
  .main_case {
    height: 240px;
  }
  .sub_case {
    height: 144px;
  }
  .situation_close {
    position: absolute;
    top: 4px;
    right: 4px;
    width: 40px;
    height: 40px;
  }
  .situation_tit {
    color: #845b4c;
    font-size: 21px;
    font-weight: normal;
    padding-bottom: 20px;
  }
  div[class*=":situation"] {
    height: auto !important;
    width: 624px !important;
    margin-top: -359px !important;
    margin-left: -312px !important;
    padding: 28px 28px 16px !important;
  }
  .table_body {
    border: 0;
  }
  .table-list {
    border-bottom: 1px solid #ccc;
  }
  .subscribe {
    display: inline-block;
    line-height: 32px;
    background-color: #4caf50;
  }
  .subscribe_area {
    border-left: 1px dashed #eee;
    box-sizing: border-box;
  }
  .subscribeWait {
    background-color: #e0e0e0;
  }
</style>

<div class="table_main situation_table">
  <table class="table_head">
    <colgroup>
      <col width="22%">
      <col width="26%">
      <col width="24%">
      <col width="12%">
      <col width="16%">
    </colgroup>
    <thead>
    <tr>
      <th>이름</th>
      <th>아이디</th>
      <th>전화번호</th>
      <th>수강권</th>
      <th class="subscribe_th">상태</th>
    </tr>
    </thead>
  </table>
  <div class="table_body_wrap">
    <div class="table_body main_case scroll-y" id="ticket_member_list">
      <table class="table-list" style="display: table;">
        <colgroup>
          <col width="22%">
          <col width="26%">
          <col width="24%">
          <col width="12%">
          <col width="16%">
        </colgroup>
        <tbody>
        <? foreach ($reserve_list as $reserve_info) { ?>
          <tr>
            <td><?= $reserve_info->member->username; ?></td>
            <td><?= $reserve_info->member->email; ?></td>
            <td><?= $reserve_info->member->phone; ?></td>
            <td><?= $reserve_info->member->ticket_title; ?></td>
            <td class="subscribe_area">
              <div class="btn_valid subscribe">예약</div>
            </td>
          </tr>
        <? } ?>
        </tbody>
      </table>
    </div>
    <div class="table_nav_btns" style="margin: 20px 0;">
      <div class="btns_prev"></div>
      <div class="btns_no">
<!--        <button class="no-indicator btn_click" onclick="get_list(5,1,'a5j8i7j6p5@privaterelay.appleid.com')">1</button>-->
      </div>
      <div class="btns_next"></div>
    </div>
  </div>
</div>
<div class="table_main situation-wait_table">
  <table class="table_head">
    <colgroup>
      <col width="22%">
      <col width="26%">
      <col width="24%">
      <col width="12%">
      <col width="16%">
    </colgroup>
    <thead>
    <tr>
      <th>이름</th>
      <th>아이디</th>
      <th>전화번호</th>
      <th>수강권</th>
      <th class="subscribe_th">상태</th>
    </tr>
    </thead>
  </table>
  <div class="table_body_wrap">
    <div class="table_body sub_case scroll-y" id="ticket_member_list">
      <table class="table-list" style="display: table;">
        <colgroup>
          <col width="22%">
          <col width="26%">
          <col width="24%">
          <col width="12%">
          <col width="16%">
        </colgroup>
        <tbody>
        <? foreach ($wait_list as $wait_info) { ?>
          <tr>
            <td><?= $wait_info->member->username; ?></td>
            <td><?= $wait_info->member->email; ?></td>
            <td><?= $wait_info->member->phone; ?></td>
            <td><?= $wait_info->member->ticket_title; ?></td>
            <td class="subscribe_area">
              <div class="btn_valid subscribeWait">대기</div>
            </td>
          </tr>
        <? } ?>
        </tbody>
      </table>
    </div>
    <div class="table_nav_btns" style="margin: 20px 0;">
      <div class="btns_prev"></div>
      <div class="btns_no">
<!--        <button class="no-indicator btn_click" onclick="get_list(5,1,'a5j8i7j6p5@privaterelay.appleid.com')">1</button>-->
      </div>
      <div class="btns_next"></div>
    </div>
  </div>
</div>
