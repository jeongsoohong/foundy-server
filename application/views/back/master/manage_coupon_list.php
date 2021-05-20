<? $now = time();
foreach ($coupons as $coupon) { ?>
  <tr>
    <td class="td-label chkTd">
      <input class="chkPiece" type="checkbox" name="chkPiece">
      <input class="chkPiece" type="checkbox" name="chkPiece" onclick="check_piece('coupon')" data-id="<?= $coupon->coupon_id; ?>">
      <label class="chkLabel"></label>
    </td>
    <td>
      <span class="td-span">
        <?= $coupon->coupon_title; ?>
      </span>
    </td>
    <td>
      <span class="td-span">
        <?= $this->coupon_model->get_coupon_user_type_str($coupon->user_type); ?>
      </span>
    </td>
    <td>
      <span class="td-span">
        <?= $coupon->coupon_count == 0 ? '무제한' : $coupon->coupon_count; ?>
      </span>
    </td>
    <td>
      <span class="td-span">
        <? if ($coupon->coupon_type == COUPON_TYPE_SHOP_FREE_SHIPPING) {
          echo '무료배송';
        } else {
          echo $coupon->coupon_benefit;
          echo ($coupon->coupon_type == COUPON_TYPE_SHOP_DISCOUNT_PERCENT ? '%' : '원');
        } ?>
      </span>
    </td>
    <td>
      <span class="td-span td-link">
      <?= $coupon->start_at. ' ~  '. $coupon->end_at; ?>
      </span>
    </td>
    <td>
      <span class="td-span">
        <?= $coupon->use_at; ?>
      </span>
    </td>
    <td class="posture">
      <span class="td-span <?= $coupon->activate == 1 ? (strtotime($coupon->end_at) < $now ? 'cpn-completed' : 'cpn-ing') : 'cpn-stopped'; ?>">
        <?= $coupon->activate == 1 ? (strtotime($coupon->end_at) < $now ? '발급완료' : '발급중') : '발급중지'; ?>
      </span>
    </td>
    <td class="fn-td-btn clearfix">
      <div class="td-btn-wrap">
        <p class="td-span td-btn td-seeing" onclick="get_coupon_view(<?= $coupon->coupon_id; ?>);">
          <span class="btn-ic btn--seeProfile">
            <img src="<?= base_url(); ?>template/back/master/icon/ic_person.png" class="ic-img" width="12" height="11" alt="">
          </span>
          보기
        </p>
        <p class="td-span td-btn td-revise" onclick="get_coupon_mod(<?= $coupon->coupon_id; ?>, 'mod');">
          <span class="btn-ic btn--modify">
            <img src="<?= base_url(); ?>template/back/master/icon/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
          </span>
          수정
        </p>
        <p class="td-span td-btn td-posture" data-id="<?= $coupon->coupon_id; ?>">
          <span class="btn-ic btn--display">
            <img src="<?= base_url(); ?>template/back/master/icon/ic_check.png" class="ic-img" width="9" height="auto" alt="">
          </span>
          상태변경
        </p>
      </div>
    </td>
  </tr>
<? } ?>
<script>
  $(function(){
    $('.td-posture').click(function(e){
      $('.boxwrap__pop').show().children('div[class*=question]').show();
      
      let origin = trim($(this).closest('td').siblings('.posture').children().text());
      
      console.log($(e.target));
      console.log(origin);
      
      /* activate 상태 */
      /* 쿠폰 발급 상태 */
      if(origin === '발급중지'){
        let txt = '발급중 상태로 변경하시겠습니까?';
        coupon_req = 'ok';
        console.log(txt);
        $(this).closest('#master').find('div[class*=question]').find('.cnt_tit').text(txt);
      }
      else if(origin === '발급중' || origin === '발급완료'){
        let txt = '발급중지 상태로 변경하시겠습니까?';
        coupon_req = 'no';
        console.log(txt);
        $(this).closest('#master').find('div[class*=question]').find('.cnt_tit').text(txt);
      } else {
        alert('정상적인 데이터가 아닙니다.(origin:' + origin + ')');
        return;
      }
  
      coupon_id = $(e.target).data('id');
      req_type = 'approval';
  
    })
  });
  
  function req_posture() {
    let data = [];
  
    if (req_type === 'approval') {
      data['id'] = coupon_id;
      data['req'] = coupon_req;
    } else if (req_type === 'remove') {
      data['ids'] = JSON.stringify(coupon_ids);
    }
    
    console.log(data);
  
    let url = "<?= base_url().'master/manage/coupon/'; ?>" + req_type;
    send_post_data(data, url, function() {
      let role = 'coupon';
      // console.log(role);
      setTimeout(function() {get_page2('manage_' + role, "<?= base_url().'master/manage/page?tab='; ?>" + role)}, 1000);
    }, true);
  }
  

</script>
