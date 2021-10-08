<h3 class="meaning">샵 메인관리</h3>
<div class="type_wrap">
  <p class="type_tit slide_tit font-futura">Manage Shop-main</p>
  <div class="type_box_wrap">
    <!-- BEST ITEM -->
    <div class="type_box shadow">
      <p class="type__shopTit font-futura">BEST ITEM</p>
      <div class="type__shopCnt shop-best" id="best_shopCnt">
        <div class="shop--search shop--add form_val category--search">
          <input class="search-input val-input" id="best_brand_input" value="" placeholder="브랜드명을 입력해주세요">
          <!-- 검색 -->
          <button class="search-btn val-search" onclick="get_product_search('best')">
            <img src="<?= base_url(); ?>template/back/master/icon/ic_search.png" alt="검색" width="auto" height="16">
          </button>
        </div>
        <button class="toggle-seeList" onclick="reset_list('best')">리스트보기</button>
        <div class="shop--chkTip" style="display: none;">
          <label class="chkTip_salesRate">
            <input type="checkbox" class="salseRateChk" id="best_order_sell" checked="checked"> 판매량순
          </label>
          <label class="chkTip_recent gray_txt">
            <input type="checkbox" class="recentChk" id="best_order_new"> 최신순
          </label>
        </div>
        <div class="namedBtn catNamedBtn clearfix" data-type="best">
          <button class="named-fn addBtn addSlider disabledBtn" style="/* margin-right: 28px; */">+ 추가</button>
          <span class="named-txt font-futura">or</span>
          <button class="named-fn removeBtn">- 삭제</button>
        </div>
        <button class="named-fn saveLesson" onclick="save_order('best')">
          <div class="saveLesson-div">
            <p class="btn-tip-detail tip-detail-case detail-fontStyle" style="width: auto;">저장</p>
          </div>
          <div class="saveLesson-btn">
            <img src="<?= base_url(); ?>template/back/master/icon/ic_btnSave.png" class="margin-auto" alt="스케줄 전체 보기" width="16" height="15">
          </div>
        </button>
        <!-- 검색 시 나오는 정보(팝업) 영역 -->
        <div class="shop--searchBox"><spen id="best_list">BEST ITEM 리스트</spen><span id="best_brand_list" style="display: none;">브랜드 검색 결과</span></div>
        <!-- 테이블 -->
        <div class="shop--table list-table">
          <div class="table-media tableBody">
            <table class="table-box manage_table">
              <colgroup>
                <col width="4%">
                <col width="4%">
                <col width="24%">
                <col width="28%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
              </colgroup>
              <thead>
              <tr>
                <th class="td-label chkTh">
                  <input class="chkAll chkAll_3" type="checkbox" name="chkAll" id="best_chk_all" data-id="best">
                  <label class="chkLabel"></label>
                </th>
                <th>
                  <span class="th-span">no.</span>
                </th>
                <th>
                  <span class="th-span">상품코드</span>
                </th>
                <th>
                  <span class="th-span">제품명</span>
                </th>
                <th>
                  <span class="th-span">브랜드</span>
                </th>
                <th>
                  <span class="th-span">판매가</span>
                </th>
                <th>
                  <span class="th-span">할인</span>
                </th>
                <th>
                  <span class="th-span">순서</span>
                </th>
              </tr>
              </thead>
            </table>
            <div class="table-scroll scroll-y">
              <table>
                <colgroup>
                  <col width="4%">
                  <col width="4%">
                  <col width="24%">
                  <col width="28%">
                  <col width="10%">
                  <col width="10%">
                  <col width="10%">
                  <col width="10%">
                </colgroup>
                <tbody id="best_tbody_list">
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- NEW IN -->
    <div class="type_box shadow">
      <p class="type__shopTit font-futura">NEW IN</p>
      <div class="type__shopCnt shop-best" id="new_shopCnt">
        <div class="shop--search shop--add form_val category--search">
          <input class="search-input val-input" id="new_brand_input" value="" placeholder="브랜드명을 입력해주세요">
          <!-- 검색 -->
          <button class="search-btn val-search" onclick="get_product_search('new')">
            <img src="<?= base_url(); ?>template/back/master/icon/ic_search.png" alt="검색" width="auto" height="16">
          </button>
        </div>
        <button class="toggle-seeList" onclick="reset_list('new')">리스트보기</button>
        <div class="shop--chkTip" style="display: none;">
          <label class="chkTip_salesRate">
            <input type="checkbox" class="salseRateChk" id="new_order_sell" checked="checked"> 판매량순
          </label>
          <label class="chkTip_recent gray_txt">
            <input type="checkbox" class="recentChk" id="new_order_new"> 최신순
          </label>
        </div>
        <div class="namedBtn catNamedBtn clearfix" data-type="new">
          <button class="named-fn addBtn addSlider disabledBtn" style="/* margin-right: 28px; */">+ 추가</button>
          <span class="named-txt font-futura">or</span>
          <button class="named-fn removeBtn">- 삭제</button>
        </div>
        <button class="named-fn saveLesson" onclick="save_order('new')">
          <div class="saveLesson-div">
            <p class="btn-tip-detail tip-detail-case detail-fontStyle" style="width: auto;">저장</p>
          </div>
          <div class="saveLesson-btn">
            <img src="<?= base_url(); ?>template/back/master/icon/ic_btnSave.png" class="margin-auto" alt="스케줄 전체 보기" width="16" height="15">
          </div>
        </button>
        <!-- 검색 시 나오는 정보(팝업) 영역 -->
        <div class="shop--searchBox"><spen id="new_list">NEW IN 리스트</spen><span id="new_brand_list" style="display: none;">브랜드 검색 결과</span></div>
        <!-- 테이블 -->
        <div class="shop--table list-table">
          <div class="table-media tableBody">
            <table class="table-box manage_table">
              <colgroup>
                <col width="4%">
                <col width="4%">
                <col width="24%">
                <col width="28%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
              </colgroup>
              <thead>
              <tr>
                <th class="td-label chkTh">
                  <input class="chkAll chkAll_3" type="checkbox" name="chkAll" id="new_chk_all" data-id="new">
                  <label class="chkLabel"></label>
                </th>
                <th>
                  <span class="th-span">no.</span>
                </th>
                <th>
                  <span class="th-span">상품코드</span>
                </th>
                <th>
                  <span class="th-span">제품명</span>
                </th>
                <th>
                  <span class="th-span">브랜드</span>
                </th>
                <th>
                  <span class="th-span">판매가</span>
                </th>
                <th>
                  <span class="th-span">할인</span>
                </th>
                <th>
                  <span class="th-span">순서</span>
                </th>
              </tr>
              </thead>
            </table>
            <div class="table-scroll scroll-y">
              <table>
                <colgroup>
                  <col width="4%">
                  <col width="4%">
                  <col width="24%">
                  <col width="28%">
                  <col width="10%">
                  <col width="10%">
                  <col width="10%">
                  <col width="10%">
                </colgroup>
                <tbody id="new_tbody_list">
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- FOUNDY pick -->
    <div class="type_box shadow">
      <p class="type__shopTit font-futura">FOUNDY pick</p>
      <div class="type__shopCnt shop-best" id="recommend_shopCnt">
        <div class="shop--search shop--add form_val category--search">
          <input class="search-input val-input" id="recommend_brand_input" value="" placeholder="브랜드명을 입력해주세요">
          <!-- 검색 -->
          <button class="search-btn val-search" onclick="get_product_search('recommend')">
            <img src="<?= base_url(); ?>template/back/master/icon/ic_search.png" alt="검색" width="auto" height="16">
          </button>
        </div>
        <button class="toggle-seeList" onclick="reset_list('recommend')">리스트보기</button>
        <div class="shop--chkTip" style="display: none;">
          <label class="chkTip_salesRate">
            <input type="checkbox" class="salseRateChk" id="recommend_order_sell" checked="checked"> 판매량순
          </label>
          <label class="chkTip_recent gray_txt">
            <input type="checkbox" class="recentChk" id="recommend_order_new"> 최신순
          </label>
        </div>
        <div class="namedBtn catNamedBtn clearfix" data-type="recommend">
          <button class="named-fn addBtn addSlider disabledBtn" style="/* margin-right: 28px; */">+ 추가</button>
          <span class="named-txt font-futura">or</span>
          <button class="named-fn removeBtn">- 삭제</button>
        </div>
        <button class="named-fn saveLesson" onclick="save_order('recommend')">
          <div class="saveLesson-div">
            <p class="btn-tip-detail tip-detail-case detail-fontStyle" style="width: auto;">저장</p>
          </div>
          <div class="saveLesson-btn">
            <img src="<?= base_url(); ?>template/back/master/icon/ic_btnSave.png" class="margin-auto" alt="스케줄 전체 보기" width="16" height="15">
          </div>
        </button>
        <!-- 검색 시 나오는 정보(팝업) 영역 -->
        <div class="shop--searchBox"><spen id="recommend_list">FOUNDY pick 리스트</spen><span id="recommend_brand_list" style="display: none;">브랜드 검색 결과</span></div>
        <!-- 테이블 -->
        <div class="shop--table list-table">
          <div class="table-media tableBody">
            <table class="table-box manage_table">
              <colgroup>
                <col width="4%">
                <col width="4%">
                <col width="24%">
                <col width="28%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
              </colgroup>
              <thead>
              <tr>
                <th class="td-label chkTh">
                  <input class="chkAll chkAll_3" type="checkbox" name="chkAll" id="recommend_chk_all" data-id="recommend">
                  <label class="chkLabel"></label>
                </th>
                <th>
                  <span class="th-span">no.</span>
                </th>
                <th>
                  <span class="th-span">상품코드</span>
                </th>
                <th>
                  <span class="th-span">제품명</span>
                </th>
                <th>
                  <span class="th-span">브랜드</span>
                </th>
                <th>
                  <span class="th-span">판매가</span>
                </th>
                <th>
                  <span class="th-span">할인</span>
                </th>
                <th>
                  <span class="th-span">순서</span>
                </th>
              </tr>
              </thead>
            </table>
            <div class="table-scroll scroll-y">
              <table>
                <colgroup>
                  <col width="4%">
                  <col width="4%">
                  <col width="24%">
                  <col width="28%">
                  <col width="10%">
                  <col width="10%">
                  <col width="10%">
                  <col width="10%">
                </colgroup>
                <tbody id="recommend_tbody_list">
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  // $(function(){
  //   $(window).on('click',function(e){
  //     let target = e.target.className;
  //     // console.log(target);
  //     let letter_shop = target.indexOf('shop');
  //     let letter_type = target.indexOf('type');
  //     if(letter_shop !== -1 || letter_type !== -1) {
  //       $('.shop--searchBox').prev().prev().hide();
  //     }
  //   });
  //   $('.type__shopCnt .val-input').click(function(){
  //     $(this).closest('.type__shopCnt').find('.shop--searchBox').prev().prev().show();
  //   })
  // })
  $(function(){
    $('.salseRateChk').click(function(){
      let chk = $(this).prop('checked');
      if(chk === true){
        $(this).prop('checked',true);
        $(this).parent().removeClass('gray_txt');
        $(this).parent().next().find('input').prop('checked',false);
        $(this).parent().next().addClass('gray_txt');
      }
      else {
        $(this).prop('checked',false);
        $(this).parent().addClass('gray_txt');
        $(this).parent().next().find('input').prop('checked',true);
        $(this).parent().next().removeClass('gray_txt');
      }
    })
    $('.recentChk').click(function(){
      let chk = $(this).prop('checked');
      if(chk === true){
        $(this).prop('checked',true);
        $(this).parent().removeClass('gray_txt');
        $(this).parent().prev().find('input').prop('checked',false);
        $(this).parent().prev().addClass('gray_txt');
      }
      else {
        $(this).prop('checked',false);
        $(this).parent().addClass('gray_txt');
        $(this).parent().prev().find('input').prop('checked',true);
        $(this).parent().prev().removeClass('gray_txt');
      }
    })
  })
</script>
<script>
  // check all
  $('.chkAll').click(function(e) {
    let type = $(e.target).data('id');
    get_check_list(type, check_all(type, $(e.target).prop('checked')));
  });
  $('.addBtn, .removeBtn').click(function(e) {
    let target = e.target;
    let type = $(target).closest('.namedBtn').data('type');
    // console.log(type);
    // console.log(target.className);
    if (target.className.indexOf('removeBtn') >= 0) {
      mod_list(type,'del');
    } else if (target.className.indexOf('addBtn') >= 0) {
      mod_list(type,'add');
    } else {
      return;
    }
  });
  function mod_list(type,mode) {
    let url = '<?php echo base_url()."master/manage/shop/join"; ?>';
    let data = [];
    let ids = get_check_list(type);
    
    if (ids.length <= 0) {
      return false;
    }
  
    data['mode'] = mode;
    data['ids'] = JSON.stringify(ids);
    data['type'] = type;
    
    // console.log(data);
    // console.log(shop_tbody_html.get(type));
  
    send_post_data(data, url, function(html) {
      if (mode === 'add') {
        let new_html = shop_tbody_html.get(type) + html;
        shop_tbody_html.set(type, new_html);
        $('#' + type + '_tbody_list').html(shop_tbody_html.get(type));
      } else {
        let i;
        for (i = 0; i < ids.length; i++) {
          $('#' + type + '_tbody_list').find('#tr-' + ids[i]).remove();
        }
        shop_tbody_html.set(type, $('#' + type + '_tbody_list').html());
      }
      reset_button(type, false);
      reorder_number(type);
    }, true, true);
  }
  //function reorder_list(type, mode, pid) {
  //  let url = '<?php //echo base_url()."master/manage/shop/order"; ?>//';
  //  let data = [];
  //
  //  data['mode'] = mode;
  //  data['type'] = type;
  //  data['pid'] = pid;
  //
  //  // console.log(data);
  //
  //  send_post_data(data, url, function() {
  //    get_product_list(type, true);
  //  }, true);
  //}
  
  function reorder_number(type) {
    $('#' + type + '_tbody_list').find('tr').each(function(i,e) {
      // console.log(i + ':' + $(e).find('#span-no').text());
      $(e).find('#span-no').text(i + 1);
    })
  }
  function swap_list(e, mode, type) {
    if (mode === 'up') {
      if ($(e).prev().length > 0) {
        $(e).swapWith($(e).prev());
      }
    } else if (mode === 'down') {
      if ($(e).next().length > 0) {
        $(e).swapWith($(e).next());
      }
    }
    reorder_number(type);
    shop_tbody_html.set(type, $('#' + type + '_tbody_list').html());
  }
  
  function reset_list(type) {
    $('#' + type +'_tbody_list').html(shop_tbody_html.get(type));
    reset_button(type, false);
  }
  
  function reset_button(type, search) {
    if (search === true) {
      $('#'+type+'_shopCnt').find('.addBtn').prop('disabled',false).removeClass('disabledBtn');
      $('#'+type+'_shopCnt').find('.removeBtn').prop('disabled',true).addClass('disabledBtn');
      $('#'+type+'_shopCnt').find('button[class*=go__to]').prop('disabled',true).addClass('disabledBtn3');
      $('#'+type+'_list').hide();
      $('#'+type+'_brand_list').show();
    } else {
      $('#'+type+'_shopCnt').find('.addBtn').prop('disabled',true).addClass('disabledBtn');
      $('#'+type+'_shopCnt').find('.removeBtn').prop('disabled',false).removeClass('disabledBtn');
      $('#'+type+'_shopCnt').find('button[class*=go__to]').prop('disabled',false).removeClass('disabledBtn3');
      $('#'+type+'_list').show();
      $('#'+type+'_brand_list').hide();
    }
  }

  function get_product_search(type) {
    let brand = $('#'+type+'_brand_input').val();
    let order = $('#'+type+'_order_sell').prop('checked') === true ? 'sell' : 'new';
    get_page2(type+ '_tbody_list', '<?= base_url().'master/manage/shop/search?order='; ?>' + order + '&brand=' + brand + '&type=' + type, true, function() {
      reset_button(type, true);
    });
  }
  
  function get_product_list(type, loading) {
    get_page2(type + '_tbody_list', '<?= base_url().'master/manage/shop/list?type='; ?>' + type, loading, function() {
      // $('#'+type+'_shopCnt').find('.shop--searchBox').hide();
      reset_button(type, false);
      shop_tbody_html.set(type, $('#' + type + '_tbody_list').html());
    });
  }
  
  function save_order(type) {
    let url = '<?php echo base_url()."master/manage/shop/reorder"; ?>';
    let data = [];
    
    let pids = [];
    $('#' + type + '_tbody_list').find('tr').each(function(i,e) {
      pids[i] = $(e).find('.chkPiece').data('id');
    });
    
    if (pids.length === 0) {
      alert('저장할 리스트가 없습니다');
      return false;
    }
  
    data['type'] = type;
    data['pids'] = JSON.stringify(pids);
  
    console.log(data);
  
    send_post_data(data, url, null, true, false);
    return true;
  }
  
  $(function() {
    get_product_list('best', false);
    get_product_list('new', false);
    get_product_list('recommend', false);
  });
</script>
