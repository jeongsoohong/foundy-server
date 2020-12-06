<style>
  .modify_detailbox {
    background-color: #fff;
    box-sizing: border-box;
    border-radius: 4px;
    position: relative;
  }
  .modify_detail, .name_detail {
    width: 100%;
    height: auto;
  }
  .modify_detail input, .name_detail input {
    text-align: left;
    font-size: 12px;
    font-weight: normal;
    padding: 0 10px;
  }
  .btn_rewrite{
    width: 100px;
    position: absolute;
  }
  .modify_detailbox .btn_rewrite {
    top: 28px;
    right: 20px;
  }
</style>
<h3 class="meaning">수강권 수정</h3>
<div class="modify_detailbox">
  <div class="ticket_name shadow_md">
    <button class="btn_rewrite btn_val btn_rg" onclick="ticket_modify()">수정</button>
    <p class="enroll_tit tit-lg">수강권 수정</p>
    <dl class="enroll_detail clearfix">
      <dt>수강권 이름</dt>
      <dd class="detail_name">
        <input value="<? echo $ticket->ticket_title; ?>" class="name_space" id="enroll_ticket_title2" type="text" style="height: 32px;">
      </dd>
      <dt>수강권 종류</dt>
      <dd class="detail_type" id="enroll_ticket_type2">
        <!-- 체크박스 활성화/비활성화 기능 전체 적용 -->
        <label class="form_chk only_chk">
          <? if ($ticket->ticket_type == CENTER_TICKET_TYPE_COUNT) { ?>
            <input disabled checked type="checkbox" id="c1m" data-id="c1m" class="chk_ration">
            정액권 (<span><input value="<? echo $ticket->reservable_count; ?>" type="number" id="i1m" class="chk_no"></span>
            회 / 유효기간 <span><input value="<? echo $ticket->reservable_duration; ?>" id="i2m" type="number" class="chk_no"></span>일)
          <? } else { ?>
            <input disabled type="checkbox" id="c1m" data-id="c1m" class="chk_ration">
            정액권 (<span><input disabled type="number" id="i1m" class="chk_no bg_grey"></span>
            회 / 유효기간 <span><input disabled id="i2m" type="number" class="chk_no bg_grey"></span>일)
          <? } ?>
        </label>
        <label class="form-chk only_chk">
          <? if ($ticket->ticket_type == CENTER_TICKET_TYPE_DURATION) { ?>
            <input disabled checked type="checkbox" id="c2m" data-id="c2m" class="chk_term">
            기간제 회원권  (<span><input value="<? echo $ticket->reservable_duration; ?>" type="number" id="i3m" class="chk_date"></span>일)
          <? } else { ?>
            <input disabled type="checkbox" id="c2m" data-id="c2m" class="chk_term">
            기간제 회원권 (<span><input disabled type="number" id="i3m" class="chk_date bg_grey"></span>일)
          <? } ?>
        </label>
      </dd><br>
      <dt>가격</dt>
      <dd class="detail_price">
        <div class="count_wrap clearfix">
          <p class="count_limit">
            <input value="<? echo $ticket->ticket_price; ?>" type="number" id="enroll_ticket_price2" class="form_price" style="width: 67%"> 원
          </p>
        </div>
      </dd><br>
      <dt style="line-height: 1.5;">1일예약 가능횟수</dt>
      <dd class="book-count">
        <div class="count_wrap clearfix">
          <p class="count_limit">
            <input value="<? echo $ticket->reservable_count_oneday; ?>" type="number" id="reservable_count_oneday2" class="form_count"> 회
          </p>
          <!-- count_cancel 이동 -->
        </div>
        <!-- cancel_option 이동 -->
      </dd><br>
      <dt>
        <!-- count_cancel 스타일 수정 -->
        <label class="count_cancel form-chk" id="count_cancel2" style="float: none;">
          <p class="count_limit">
            <? if ($ticket->limit_cancel_count_enable) { ?>
              <input checked type="checkbox" id="enroll_limit_cancel_count2" name="count_limit">
            <? } else { ?>
              <input type="checkbox" id="enroll_limit_cancel_count2" name="count_limit">
            <? } ?>
            취소횟수 제한
          </p>
        </label>
      </dt>
      <!-- dd 스타일 추가 -->
      <dd style="height: 32px;">
        <!-- cancel_option 스타일 수정 -->
        <div class="cancel_option" id="cancel_option2" style="display: none; margin: 0;">
          <p class="option_oneday">1일 최대
            <input value="<? if ($ticket->limit_cancel_count_enable) echo $ticket->limit_cancel_count_oneday; ?>"
                   type="number" id="enroll_cancel_count_oneday2" class="form_count count_oneday"> 회 또는</p>
          <p class="option_term">회원권 기간내 최대
            <input value="<? if ($ticket->limit_cancel_count_enable) echo $ticket->limit_cancel_count_total; ?>"
                   type="number" id="enroll_cancel_count_total2" class="form_count count_term"> 회</p>
        </div>
      </dd>
      <dt style="line-height: 1.5;">수강권 지급가능 최대인원</dt>
      <dd>
        <p class="count_limit">
          <input value="<? echo $ticket->limit_enroll_member_count; ?>" type="number" id="enroll_max_ticket_count2" class="form_people form_person2" style="width: 67%"> 명
        </p>
      </dd>
    </dl>
  </div>
</div>
<script>
  function ticket_modify() {
    console.log('aksdjfkajskj');
    let url = '<? echo base_url()."center/course/ticket/modify/do"; ?>';
    let data = [];
    data['ticket_id'] = ticket_id;
    data['ticket_title'] = $('#enroll_ticket_title2').val();
    data['ticket_price'] = $('#enroll_ticket_price2').val();
    data['ticket_type'] = $('#enroll_ticket_type2').find("input[type='checkbox']:checked").data('id') === 'c1m' ? <? echo CENTER_TICKET_TYPE_COUNT; ?> : <? echo CENTER_TICKET_TYPE_DURATION; ?>;
    data['reservable_count'] = 0;
    data['reservable_count_oneday'] = $('#reservable_count_oneday2').val();
    data['reservable_duration'] = 0;
    data['limit_cancel_count_enable'] = $('#enroll_limit_cancel_count2').prop('checked') ? 1 : 0;
    data['limit_cancel_count_oneday'] = 0;
    data['limit_cancel_count_total'] = 0;
    data['limit_enroll_member_count'] = $('#enroll_max_ticket_count2').val();
    if (data['ticket_type'] === <? echo CENTER_TICKET_TYPE_COUNT; ?>) {
      data['reservable_count'] = $('#i1m').val();
      data['reservable_duration'] = $('#i2m').val();
    } else {
      data['reservable_count'] = 0;
      data['reservable_duration'] = $('#i3m').val();
    }
    if (data['limit_cancel_count_enable'] === 1) {
      data['limit_cancel_count_oneday'] = $('#enroll_cancel_count_oneday2').val();
      data['limit_cancel_count_total'] = $('#enroll_cancel_count_total2').val();
    }
    send_post(data, url, true, '');
  }
  $(function() {
    // 수강권 수정 '수정' 버튼 클릭시 팝업 호출
    // $('.btn_rewrite').click(function(){
    //   $('.popup-box').show();
    //   $('div[class*=alert_]').show();
    // })
    // count_cancel 클릭 이벤트
    $('#count_cancel2').click(function() {
      // console.log($(this).find('input').prop('checked'));
      if ($(this).find('input').prop('checked') === true) {
        $('#cancel_option2').show();
      } else {
        $('#cancel_option2').hide();
      }
    })
    <? if ($ticket->limit_cancel_count_enable) { ?>
    $('#cancel_option2').show();
    <? } ?>
  })
</script>