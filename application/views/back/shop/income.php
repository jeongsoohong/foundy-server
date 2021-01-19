<style>
  button,select {
    width: 100%;
    height: 32px;
    font-size: 12px;
  }
  .income-content table tr {
    height: 40px;
    font-size: 12px;
    text-align: center;
  }
  .income-content table tr th {
    text-align: center;
  }
  .income-content table tr td {
    padding: 5px 15px;
  }
  .income-content table tr td div {
    padding-left: 0;
    padding-right: 0;
    line-height: 32px;
  }
  .income-list table tr {
    border-bottom: 1px solid #EAEAEA;
  }
  .income-list table thead,.income-list table tbody {
    border: 1px solid #EAEAEA;
  }
</style>
<div id="content-container">
  <div id="page-title">
    <h1 class="page-header text-overflow">정산관리</h1>
  </div>
  <div class="income-content" id="page-content">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <table class="col-md-12 col-sm-12 col-xs-12">
          <tbody>
          <tr>
            <th class="col-md-1 col-sm-1 col-xs-1">정산월별기준</th>
            <td class="col-md-4 col-sm-4 col-xs-4">
              <div class='input-group date' id='datepicker1'>
                <input value="<?php echo $start_date; ?>" id="start-date" type='text' class="form-control" name="start_date" placeholder="시작날짜"/>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </td>
            <td class="col-md-1 col-sm-1 col-xs-1">
              ~
            </td>
            <td class="col-md-4 col-sm-4 col-xs-4">
              <div class='input-group date' id='datepicker2'>
                <input value="<?php echo $end_date; ?>" id="end-date" type='text' class="form-control" name="end_date" placeholder="종료날짜"/>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </td>
            <td class="col-md-2 col-sm-2 col-xs-2">
              <button class="notice-search-btn btn-dark" onclick="search_income_page()">검색</button>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12">
        <hr style="width: 100%; bnotice: 1px solid #EAEAEA">
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12 income-list">
        <table class="col-md-12 col-sm-12 col-xs-12">
          <thead>
          <tr>
            <th class="col-md-1 col-sm-1 col-xs-1">구매번호</th>
            <th class="col-md-1 col-sm-1 col-xs-1">구매자</th>
            <th class="col-md-1 col-sm-1 col-xs-1">수령인</th>
            <th class="col-md-1 col-sm-1 col-xs-1">샹품명</th>
            <th class="col-md-1 col-sm-1 col-xs-1">옵션명</th>
            <th class="col-md-1 col-sm-1 col-xs-1">판매단가</th>
            <th class="col-md-1 col-sm-1 col-xs-1">공급단가</th>
            <th class="col-md-1 col-sm-1 col-xs-1">수량</th>
            <th class="col-md-1 col-sm-1 col-xs-1">실판매액</th>
            <th class="col-md-1 col-sm-1 col-xs-1">공급액</th>
            <th class="col-md-1 col-sm-1 col-xs-1">수수료</th>
            <th class="col-md-1 col-sm-1 col-xs-1">쿠폰/할인내역/부담율</th>
          </tr>
          </thead>
          <tbody>
          <?php foreach ($income_data as $income) { ?>
            <tr>
              <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $income->purchase_code; ?></td>
              <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $income->email; ?></td>
              <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $income->receiver_name; ?></td>
              <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $income->item_name; ?></td>
              <td class="col-md-1 col-sm-1 col-xs-1">
                <?php
                $opt_str = '';
                foreach ($income->item_option_requires as $opt) {
                  if ($opt->val != -1) {
                    $opt_str .= "[$opt->name]$opt->option / ";
                  }
                }
                foreach ($income->item_option_others as $opt) {
                  if ($opt->val != -1) {
                    $opt_str .= "[$opt->name]$opt->option / ";
                  }
                }
                ?>
              </td>
              <?
              $total_price = $income->total_price + $income->total_additional_price;
              $total_supply_price = (int)((int)($total_price * ((100-$income->item_margin)/100))/100)*100;
              ?>
              <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $this->crud_model->get_price_str($income->item_general_price); ?></td>
              <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $this->crud_model->get_price_str($income->item_supply_price); ?></td>
              <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $income->total_purchase_cnt; ?></td>
              <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $this->crud_model->get_price_str($total_price); ?></td>
              <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $this->crud_model->get_price_str($total_supply_price); ?></td>
              <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $this->crud_model->get_price_str($total_price - $total_supply_price); ?></td>
              <? if ($income->user_coupon_id > 0) { ?>
                <td class="col-md-1 col-sm-1 col-xs-1">
                <?= $income->coupon->coupon_title; ?>/<?= $this->coupon_model->get_coupon_type_str($income->coupon->coupon_type); ?>/0원
                </td>
              <? } else { ?>
                <td class="col-md-1 col-sm-1 col-xs-1">-/-/-</td>
              <? } ?>
            </tr>
            <tr>
              <?
              if ($income->total_purchase_cnt % $income->bundle_shipping_cnt) {
                $total_package_cnt = (int)($income->total_purchase_cnt / $income->bundle_shipping_cnt) + 1;
              } else {
                $total_package_cnt = (int)($income->total_purchase_cnt / $income->bundle_shipping_cnt);
              }
              ?>
              <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $income->purchase_code; ?></td>
              <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $income->email; ?></td>
              <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $income->receiver_name; ?></td>
              <td class="col-md-1 col-sm-1 col-xs-1">배송비</td>
              <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $this->crud_model->get_product_shipping_free_str($income->free_shipping); ?></td>
              <td class="col-md-1 col-sm-1 col-xs-1"><?= $this->crud_model->get_price_str($income->free_shipping_cond_price); ?></td>
              <td class="col-md-1 col-sm-1 col-xs-1"><?= $this->crud_model->get_price_str($income->free_shipping_cond_price); ?></td>
              <td class="col-md-1 col-sm-1 col-xs-1"><?= $total_package_cnt; ?></td>
              <td class="col-md-1 col-sm-1 col-xs-1"><?= $this->crud_model->get_price_str($income->total_shipping_fee); ?></td>
              <td class="col-md-1 col-sm-1 col-xs-1"><?= $this->crud_model->get_price_str($income->total_shipping_fee); ?></td>
              <td class="col-md-1 col-sm-1 col-xs-1">0</td>
              <td class="col-md-1 col-sm-1 col-xs-1"></td>
            </tr>
          <?php } ?>
          </tbody>
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
          <a href="javascript:void(0);" onclick="get_income_page('1');"><li class="col-md-1 col-sm-1 col-xs-1"><span class="fa fa-angle-double-left"></span></li></a>
          <a href="javascript:void(0);" onclick="get_income_page('<?php echo $prev - 1; ?>');"><li class="col-md-1 col-sm-1 col-xs-1"><span class="fa fa-angle-left"></span></li></a>
        <?php } else { ?>
          <li class="col-md-1 col-sm-1 col-xs-1 li-empty"></li>
          <li class="col-md-1 col-sm-1 col-xs-1 li-empty"></li>
        <?php }?>
        <?php if ($prev == '') { ?>
          <li class="col-md-1 col-sm-1 col-xs-1 li-empty"></li>
        <?php } else { ?>
          <a href="javascript:void(0);" onclick="get_income_page('<?php echo $prev; ?>');"><li class="col-md-1 col-sm-1 col-xs-1 "><?php echo $prev; ?></li></a>
        <?php }?>
        <li class="col-md-1 col-sm-1 col-xs-1 active"><?php echo $page; ?></li>
        <?php if ($next == '') { ?>
          <li class="col-md-1 col-sm-1 col-xs-1 li-empty"></li>
        <?php } else { ?>
          <a href="javascript:void(0);" onclick="get_income_page('<?php echo $next; ?>');"><li class="col-md-1 col-sm-1 col-xs-1 "><?php echo $next; ?></li></a>
        <?php }?>
        <?php if ($total - $page >= 2) { ?>
          <a href="javascript:void(0);" onclick="get_income_page('<?php echo $next + 1; ?>');"><li class="col-md-1 col-sm-1 col-xs-1 "><span class="fa fa-angle-right"></span></li></a>
          <a href="javascript:void(0);" onclick="get_income_page('<?php echo $total; ?>');"><li class="col-md-1 col-sm-1 col-xs-1 "><span class="fa fa-angle-double-right"></span></li></a>
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
  let start_date = '<?php echo $start_date; ?>';
  let end_date = '<?php echo $end_date; ?>';

  function get_income_page(page) {
    // console.log(start_date);
    // console.log(end_date);
    $('#loading_set').show();
    window.location.href = encodeURI("<?php echo base_url();?>shop/income?page=" + page +"&start_date=" + start_date + "&end_date=" + end_date);
  }
  function search_income_page() {
    let _start_date = $('#start-date').val();
    let _end_date = $('#end-date').val();

    // console.log(_start_date);
    // console.log(_end_date);
  
    $('#loading_set').show();
    window.location.href = encodeURI("<?php echo base_url();?>shop/income?page=1&start_date=" + _start_date + "&end_date=" + _end_date);
  }
  $(document).ready(function(){
    $('#datepicker1').datepicker();
    $('#datepicker2').datepicker();
  });
</script>
