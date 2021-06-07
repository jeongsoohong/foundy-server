<div class="pop__main pop__cnt">
  <p class="main--tit">
    <span class="tit-excel-count"><?= $total; ?></span>건 다운로드 하시겠습니까?</p>
  <div class="main--details">
    <div class="details-compo clearfix">
      <p class="compo-title pull-left">주문상태</p>
      <p class="compo-conts pull-left">
        <?= $this->shop_model->get_shipping_status_str($ship_status); ?>
      </p>
    </div>
    <div class="details-compo clearfix">
      <p class="compo-title pull-left">브랜드</p>
      <p class="compo-conts pull-left"><?= $shop_data->shop_name; ?></p>
    </div>
    <? if (empty($start_date) == false && empty($end_date) == false) { ?>
      <div class="details-compo clearfix">
        <p class="compo-title pull-left">날짜</p>
        <!-- 05/28/2021 12:00 AM - 05/31/2021 12:00 AM -->
        <p class="compo-conts pull-left">
          <?= $start_date; ?>
          -
          <?= $end_date; ?>
        </p>
      </div>
    <? } ?>
    <div class="details-compo clearfix">
      <p class="compo-title pull-left">주문확인지연</p>
      <p class="compo-conts pull-left"><?= ($confirm_delay ? 'yes' : 'no'); ?></p>
    </div>
  </div>
  <button class="main--close frame_close">
    <img src="https://dev.foundy.me/template/back/center/imgs/icon_close_black.png" alt="" width="12" height="12" style="opacity: 0.5;">
    <script>
      // .frame_close 클릭시 팝업창 닫기
      $(function(){
        $('#fd-infoExcel .frame_close').click(function(){
          $(this).closest('#fd-infoExcel').hide();
        })
      })
    </script>
  </button>
  <div class="main--reply cnt_btns confirm_btn">
    <button class="btn_cancel font-futura">CANCEL</button>
    <button class="btn_ok font-futura">OK</button>
    <script>
      // .main--reply button 클릭시 팝업창 닫기
      $(function(){
        $('#fd-infoExcel .main--reply button').click(function(){
          $(this).closest('#fd-infoExcel').hide();
        })
      })
    </script>
  </div>
</div>
