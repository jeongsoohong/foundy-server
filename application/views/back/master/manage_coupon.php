<h3 class="meaning">쿠폰 관리</h3>
<div class="type_wrap">
  <p class="type_tit slide_tit font-futura">Manage Coupon</p>
  <div class="type_box shadow">
    <div class="type_named">
      <div class="namedBtn clearfix">
        <button class="named-fn addBtn addCoupon" style="/* margin-right: 28px; */">+ 추가</button>
        <span class="named-txt font-futura">or</span>
        <button class="named-fn removeBtn">- 삭제</button>
      </div>
      <script>
        $('.addCoupon').click(function(){
          get_coupon_mod(0, 'add');
        })
      </script>
      <div class="named-wrap">
        <!-- 리스트 보기 클릭시 내용 -->
        <div class="named-list">
          <div class="list-tool clearfix">
            <div class="tool-box">
              <input type="text" placeholder="Search" class="tool__txt">
              <div class="tool__btn">
                <button class="btn--fn btn--refresh">
                  <img src="<?= base_url(); ?>template/back/master/icon/ic_refresh.png" width="auto" height="16">
                </button>
                <button class="btn--fn">pdf</button>
                <button class="btn--fn">csv</button>
                <button class="btn--fn">xls</button>
              </div>
            </div>
          </div>
          <div class="list-table">
            <div class="table-media tableBody">
              <table class="table-box manage_table">
                <colgroup>
                  <col width="4%">
                  <col width="8%">
                  <col width="9%">
                  <col width="9%">
                  <col width="6%">
                  <col width="19%">
                  <col width="18%">
                  <col width="7%">
                  <col width="20%">
                </colgroup>
                <thead>
                <tr>
                  <th class="td-label chkTh">
                    <input class="chkAll chkAll_3" type="checkbox" name="chkAll" id="coupon_chk_all" data-id="coupon">
                    <label class="chkLabel"></label>
                  </th>
                  <th>
                    <span class="th-span">쿠폰명</span>
                  </th>
                  <th>
                    <span class="th-span">혜택회원</span>
                  </th>
                  <th>
                    <span class="th-span">쿠폰수</span>
                  </th>
                  <th>
                    <span class="th-span">할인</span>
                  </th>
                  <th>
                    <span class="th-span">발급시간</span>
                  </th>
                  <th>
                    <span class="th-span">사용종료시간</span>
                  </th>
                  <th>
                    <span class="th-span">상태</span>
                  </th>
                  <th>
                    <span class="th-span">옵션</span>
                  </th>
                </tr>
                </thead>
              </table>
              <div class="table-scroll scroll-y">
                <table>
                  <colgroup>
                    <col width="4%">
                    <col width="8%">
                    <col width="9%">
                    <col width="9%">
                    <col width="6%">
                    <col width="19%">
                    <col width="18%">
                    <col width="7%">
                    <col width="20%">
                  </colgroup>
                  <tbody id="coupon_tbody_list">
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="list-btns-wrap clearfix">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  // 상태변경 버튼 클릭
  var coupon_req;
  var coupon_id;
  var coupon_ids;
  var copon_req_type;
  
  $('.chkAll').click(function(e) {
    let type = $(e.target).data('id');
    get_check_list(type, check_all(type, $(e.target).prop('checked')));
  });
  // addBtn 호버이벤트
  $('.named-fn').on({
    mousemove: function(e){
      if ($(this).hasClass('addBtn')) {
        $(this).next().next().addClass('disabledBtn').attr('disabled',true);
      } else {
        $(this).prev().prev().addClass('disabledBtn').attr('disabled',true);
      }
    },
    mouseout: function(e){
      $(this).closest('.namedBtn').find('.named-fn').removeClass('disabledBtn').attr('disabled',false);
    }
  });
  // removeBtn 클릭이벤트
  $('.removeBtn').click(function(){
    req_type = 'remove';
    coupon_ids = get_check_list('coupon');
    
    console.log(coupon_ids);
    
    if (coupon_ids.length === 0) {
      alert('쿠폰을 선택해주세요!');
      return false;
    }
    
    $('.boxwrap__pop').show().children('div[class*=question]').show()
      .find('.cnt_tit').text('정말 삭제하시겠습니까?');
  });
 
  function get_coupon_list(page) {
    get_page2('coupon_tbody_list', "<?= base_url().'master/manage/coupon/list?page='; ?>" + page, true, function() {
      get_page2('manage_coupon .list-btns-wrap', "<?= base_url().'master/manage/page/btn?tab=coupon&page='; ?>" + page);
    });
  }
  
  function get_coupon_view(id) {
    console.log(id);
    get_page2('coupon_view', "<?= base_url().'master/manage/coupon/view?id='; ?>" + id, true, function() {
      $('.boxwrap__pop').show().children('div[class*="frame:coupon"]').show();
    });
  }
  function close_coupon_view() {
    $('.boxwrap__pop').hide().children('div[class*="frame:coupon"]').hide();
  }
  function get_coupon_mod(id, type) {
    console.log(id);
    console.log(type);
    get_page2('coupon_mod', "<?= base_url().'master/manage/coupon/'; ?>" + type + '?id=' + id, true, function() {
      $('.boxwrap__pop').show().children('div[class$=add-wrap]').show().find('.add-coupon').show();
    });
  }
  function close_coupon_mod() {
    $('.boxwrap__pop').hide().children('div[class$=add-wrap]').hide().find('.add-coupon').hide();
  }
  $(function() {
    get_coupon_list(1);
  });
</script>
