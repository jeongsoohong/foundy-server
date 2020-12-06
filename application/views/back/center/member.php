<style type="text/css">
  #whole {
    padding: 0;
  }
  .table_head tr th, .table_body tr td {
    text-align: center;
  }
  .type_select {
    display: inline-block;
    width: 108px;
    height: 36px;
    margin-right: 6px;
    vertical-align: top;
    box-sizing: border-box;
    border-radius: 4px;
    border: 1px solid #ccc;
    position: relative;
  }
  .sel_box {
    padding: 0 10px;
    vertical-align: top;
    position: absolute;
    z-index: 1;
  }
  .selbtn {
    width: 36px;
    height: 36px;
    position: absolute;
    top: 0;
    right: 0;
    z-index: 0;
  }
  .type_select option {
    color: #757575;
  }
  .type_join {
    display: inline-block;
    width: 168px;
  }
  @media(min-width:888px){
    .type_join {
      width: 268px;
    }
  }
  div[class*="alert_"] {
    display: none;
    width: 440px;
    height: 280px;
    text-align: center;
    position: absolute;
    left: 0;
    z-index: 10;
    background-color: #fff;
    border-radius: 4px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.08);
    
    top: 50%;
    left: 50%;
    margin-top: -140px;
    margin-left: -220px;
  }
  
  .popup_layout {
    width: 480px;
    margin-left: -240px;
  }
  .popup_cnt {
    position: relative;
    width: 100%;
    height: 100%;
  }
  
  .confirm_message {
    padding-top: 60px;
  }
  .message_icon, .message_txt  {
    display: inline-block;
    vertical-align: top;
  }
  .message_icon {
    margin-right: 24px;
    margin-top: 6px;
  }
  .message_txt {
    color: #616161;
    font-size: 18px;
    font-weight: 400;
    line-height: 1.75;
    text-align: left;
  }
  .message_txt strong {
    color: #111;
  }
  .confirm_btn {
    width: 100%;
    height: 68px;
    position: absolute;
    bottom: 0;
    left: 0;
    font-size: 0;
  }
  .confirm_btn button:hover {
    background-color: #eee;
  }
  .confirm_btn button {
    display: inline-block;
    width: 50%;
    height: inherit;
    font-size: 13px;
    vertical-align: top;
    border-top: 1px solid #eee;
  }
  button[class^="btn_ok"] {
    border-left: 1px solid #eee;
    color: #0091ea;
    border-bottom-right-radius: 4px;
  }
  .btn_cancel {
    color: #d32f2f;
    border-bottom-left-radius: 4px;
  }
  .popup_layout:first-child {
    margin-left: -240px;
  }
  div[class*="extend_"] {
    width: 400px;
    height: 228px;
    margin-left: -200px;
    text-align: center;
  }
  div[class*="extend_"] .member--dates input {
    width: 200px;
  }
  div[class*="extend_"] .member--guide {
    padding-bottom: 24px;
  }
  div[class*="extend_"] .member--guide p {
    font-size: 16px;
  }
  div[class*="extend_"] .member--dates span {
    font-size: 14px;
  }
  div[class*="extend_"] .member--how {
    position: static;
    font-size: 0;
    margin-top: 20px;
  }
  .member--guide p {
    color: #616161;
  }
  .member--guide p strong {
    color: #111;
  }
</style>
<h2 class="boxwrap__type meaning">회원관리</h2>
<div class="boxwrap__info">
  <div class="info--tit">
    <a href="https://dev.foundy.me/center/member#" class="tit_theme reverse_color">
      회원 관리
      <div class="theme_arrow">
        <img src="<?php echo base_url(); ?>template/back/center/imgs/icon_next.png" width="6" height="auto" style="display: none;">
        <img src="<?php echo base_url(); ?>template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="" class="next_white">
      </div>
    </a>
  </div>
  <div class="info--contents scroll-y_hidden">
    <section class="contents_modify scroll-y" style="">
      <h3 class="meaning">회원관리</h3>
      <div class="modify_detailbox">
        <div class="ticket_current status_table shadow_md">
          <div class="table_tit clearfix">
            <p class="type_name tit-lg tit-normal">회원관리</p>
            <div class="type_wrap" style="float: left;">
              <div class="type_select">
                <select class="sel_box" style="width: 100%; height: inherit;">
                  <option value="<? echo CENTER_TICKET_TYPE_DEFAULT; ?>">
                    <? echo $this->center_model->get_ticket_type_str(CENTER_TICKET_TYPE_DEFAULT); ?>
                  </option>
                  <option value="<? echo CENTER_TICKET_TYPE_COUNT; ?>">
                    <? echo $this->center_model->get_ticket_type_str(CENTER_TICKET_TYPE_COUNT); ?>
                  </option>
                  <option value="<? echo CENTER_TICKET_TYPE_DURATION; ?>">
                    <? echo $this->center_model->get_ticket_type_str(CENTER_TICKET_TYPE_DURATION); ?>
                  </option>
                </select>
                <button class="selbtn">
                  <img src="<?php echo base_url(); ?>template/back/center/imgs/icon_down.png" width="12" height="auto" style="margin-bottom: 4px;">
                </button>
              </div>
              <div class="type_join" style="float: none;">
                <input type="email" placeholder="회원가입 시 이메일 검색">
                <button class="join_search">
                  <img src="<?php echo base_url(); ?>template/back/center/imgs/icon_find.png" width="24">
                </button>
              </div>
            </div>
            <div class="type_btn">
              <button class="btn_stop btn_val btn_rg">정지</button>
              <button class="btn_extend btn_val btn_rg">연장</button>
              <button class="btn_change btn_val btn_rg">환불</button>
              <button class="btn_remove btn_val btn_rg">삭제</button>
            </div>
          </div>
          <div class="teacher_table table_data">
            <!-- tr-count 숫자 세기 -->
            <p class="tr-data">회원목록 총 <span class="tr-count" id="ticket_members"></span>개</p>
            <div class="table_main">
              <table class="table_head">
                <colgroup>
                  <col width="11%">
                  <col width="11%">
                  <col width="11%">
                  <col width="10%">
                  <col width="12%">
                  <col width="15.5%">
                  <col width="8%">
                  <col width="8%">
                  <col width="11%">
                </colgroup>
                <thead>
                <tr>
                  <th>
                    <input type="checkbox" class="main_chk">
                  </th>
                  <th>아이디</th>
                  <th>연락처</th>
                  <th>이름</th>
                  <th>수강권 종류</th>
                  <th>시작일자-종료일자</th>
                  <th>정지</th>
                  <th>추가연장</th>
                  <th>환불</th>
                </tr>
                </thead>
              </table>
              <div class="table_body_wrap">
                <div class="table_body">
                  <? include 'member_list.php'; ?>
                </div>
              </div>
            </div>
<!--            <div class="table_nav_btns">-->
<!--              <div class="btns_prev">-->
<!--                <button class="prev_first">-->
<!--                  <img src="--><?php //echo base_url(); ?><!--template/back/center/imgs/icon_dbPrev.png" height="12" width="auto">-->
<!--                </button>-->
<!--                <button class="prev_before">-->
<!--                  <img src="--><?php //echo base_url(); ?><!--template/back/center/imgs/icon_prev.png" height="12" width="auto">-->
<!--                </button>-->
<!--              </div>-->
<!--              <div class="btns_no">-->
<!--                <button class="no-indicator btn_click">1</button>-->
<!--                <button class="no-indicator">2</button>-->
<!--                <button class="no-indicator">3</button>-->
<!--                <button class="no-indicator">4</button>-->
<!--              </div>-->
<!--              <div class="btns_next">-->
<!--                <button class="next_after">-->
<!--                  <img src="--><?php //echo base_url(); ?><!--template/back/center/imgs/icon_next.png" height="12" width="auto">-->
<!--                </button>-->
<!--                <button class="next_last">-->
<!--                  <img src="--><?php //echo base_url(); ?><!--template/back/center/imgs/icon_dbNext.png" height="12" width="auto">-->
<!--                </button>-->
<!--              </div>-->
<!--            </div>-->
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<div class="popup-box">
  <div class="popup__member popup_layout shadow_sm" style="display: none;">
    <div class="member-party">
      <div class="member--guide">
        <p class="guide_id">test</p>
        <span class="guide_txt">님</span>
      </div>
      <div class="member--join clearfix">
        <button class="join_no btn_val btn_md">취소</button>
        <button class="join_ok btn_val btn_md">추가</button>
      </div>
    </div>
    <div class="member--data">
      <dl class="data-box clearfix" style="display: none;">
        <dt>이름</dt>
        <dd class="data_name">
          <input type="text" value="홍길동" disabled="">
        </dd>
        <dt>연락처</dt>
        <dd class="data_phone">
          <input type="text" value="010-1234-5678" disabled="">
        </dd>
        <dt>수강권</dt>
        <dd class="data_ticket">
          <input type="text" value="3개월권" disabled="">
        </dd>
        <dt>기간</dt>
        <dd class="data_period">
          <div class="container">
            <div class="form-group">
              <div class="input-group date datetimepicker1" id="datetimepicker1">
                <input type="text" class="form-control contorl1">
                <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
              </div>
            </div>
            <script type="text/javascript">
              $(function() {
                $('.datetimepicker1').datetimepicker();
              });
            </script>
          </div>
          <span class="period_hypen">-</span>
          <div class="container">
            <div class="form-group">
              <div class="input-group date datetimepicker1" id="datetimepicker1">
                <input type="text" class="form-control control2">
                <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
              </div>
            </div>
            <script type="text/javascript">
              $(function() {
                $('.datetimepicker1').datetimepicker();
              });
            </script>
          </div>
        </dd>
        <dt>정지</dt>
        <dd class="data_stop">
          <input type="text" value="30일" disabled="">
        </dd>
        <dt>추가연장</dt>
        <dd class="data_extend">
          <input type="text" value="30일" disabled="">
        </dd>
        <dt>환불</dt>
        <dd class="data_change">X</dd>
      </dl>
      <button class="data-save btn_md">저장</button>
    </div>
  </div>
  
  <div class="popup__stop popup_layout theme:extend_ shadow_sm" style="display: none;">
    <div class="member--guide">
      <img src="<? echo base_url(); ?>template/back/center/imgs/information_mark.png" alt="" class="message_icon" width="40" height="40" style="margin: 4px 12px 0 0">
      <p class="guide_question" style="text-align: left;">선택한 회원의 수강권을
        <br><strong>정지</strong>하시겠습니까?</p>
    </div>
    <div class="member--dates" style="width: 324px; margin: 0 auto;">
      <dl class="data-box" style="display: block !important; width: inherit; height: inherit;">
        <dt style="display: none;"></dt>
        <dd class="data_period" style="width: inherit; font-size: 0;">
          <div class="container" style="width:144px; vertical-align: top;">
            <div class="form-group">
              <div class="input-group date datetimepicker1" id="datetimepicker1">
                <input type="text" class="form-control control1" style="width: 108px; margin-right: 0;">
                <span class="input-group-addon" style="display: inline-block; width: 36px; height: 36px; vertical-align: top;">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>
            <script type="text/javascript">
              $(function() {
                $('.datetimepicker1').datetimepicker();
              });
            </script>
          </div>
          <span class="period_hypen">-</span>
          <div class="container" style="width:144px; vertical-align: top;">
            <div class="form-group">
              <div class="input-group date datetimepicker1" id="datetimepicker1">
                <input type="text" class="form-control control1" style="width: 108px; margin-right: 0;">
                <span class="input-group-addon" style="display: inline-block; width: 36px; height: 36px; vertical-align: top;">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>
            <script type="text/javascript">
              $(function() {
                $('.datetimepicker1').datetimepicker();
              });
            </script>
          </div>
        </dd>
      </dl>
    </div>
    <div class="member--how">
      <button class="how_no btn_val btn_rg">아니오</button>
      <button class="how_ok btn_val btn_rg">예</button>
    </div>
  </div>
  <div class="popup__extend extend_term popup_layout shadow_sm" style="display: none;">
    <div class="member--guide">
      <img src="<? echo base_url(); ?>template/back/center/imgs/information_mark.png" alt="" class="message_icon" width="40" height="40" style="margin: 4px 12px 0 0">
      <p class="guide_question" style="text-align: left;">선택한 회원의 수강권을
        <br><strong>연장</strong>하시겠습니까?</p>
    </div>
    <div class="member--dates">
      <input type="number">
      <span class="tit-md">일 연장</span>
    </div>
    <div class="member--how">
      <button class="how_no btn_val btn_rg">아니오</button>
      <button class="how_ok btn_val btn_rg">예</button>
    </div>
  </div>
  <div class="popup__extend extend_premium popup_layout shadow_sm" style="display: none;">
    <div class="member--guide">
      <img src="<? echo base_url(); ?>template/back/center/imgs/information_mark.png" alt="" class="message_icon" width="40" height="40" style="margin: 4px 12px 0 0">
      <p class="guide_question" style="text-align: left;">선택한 회원의 수강권을
        <br><strong>연장</strong>하시겠습니까?</p>
    </div>
    <div class="member--dates">
      <p>
        <input type="number" style="width: 80px; height: 36px;">
        <span class="tit-md"> 회 (유효기간 </span>
        <input type="number" style="width: 80px; height: 36px;">
        <span class="tit-md"> 일)</span>
      </p>
    </div>
    <div class="member--how">
      <button class="how_no btn_val btn_rg">아니오</button>
      <button class="how_ok btn_val btn_rg">예</button>
    </div>
  </div>
  
  <div class="popup__change popup_extend extend_layout popup_layout shadow_sm" style="display: none; height: 208px; padding-top: 44px;">
    <div class="member--guide">
      <img src="<? echo base_url(); ?>template/back/center/imgs/information_mark.png" alt="" class="message_icon" width="40" height="40" style="margin: 4px 12px 0 0;">
      <p class="guide_question" style="text-align: left;">OOO회원의 수강권을
        <br><strong>환불 처리</strong>하시겠습니까?</p>
    </div>
    <div class="member--how" style="margin-top: 12px;">
      <button class="how_no btn_val btn_rg">아니오</button>
      <button class="how_ok btn_val btn_rg">예</button>
    </div>
  </div>
  
  
  
  <div class="popup__alert popup_layout shadow_sm" style="display: none; width: 400px; height: 180px; margin-left: -200px;">
    <div class="member--guide">
      <p class="guide_alert">저장되었습니다!</p>
    </div>
  </div>
</div>
</section></div>
<script type="text/javascript">
  let ticket_id = <? echo $ticket_id; ?>;
  let page = <? echo $page; ?>;
  let filter = '<? echo $filter; ?>';
  $(function(){
    // nav--id 클릭이벤트
    $('.id_list').css('display','none');
    $('.nav--id').click(function(){
      $('.id_list').toggle();
      var display = $('.arrow_up').css('display');
      // console.log(display);
      if(display == 'none'){
        $('.arrow_up').show().prev().hide();
      }
      else {
        $('.arrow_up').hide().prev().show();
      }
    })
    $('.list_child').hover(function(){
      $('.list_child').css('background','#fff');
      $(this).css('background','#eee');
    },function(){
      $('.list_child').css('background','#fff');
    })
    
    // list_child 클릭이벤트
    $('.list_child').click(function(){
      var origin = $('.current_accessed').text();
      var current = $(this).text();
      $('.current_accessed').text(current);
      $(this).text(origin);
    })
    
    // tit_theme 클릭이벤트
    $('.tit_theme').click(function(){
      $('.tit_theme').removeClass('reverse_color');
      $(this).addClass('reverse_color');
      $(this).find('.next_white').show().prev().hide();
      $(this).siblings().find('.next_white').hide().prev().show();
      
      var index = $('.tit_theme').index(this);
      $('.info--contents > section').hide();
      $('.info--contents > section').eq(index).show();
    })
    
    
    /* 테이블 show/hide 클릭이벤트 */
    $(function(){
      var index = $('.no-indicator').index(this);
      // 페이지 번호 클릭
      
      $('.no-indicator').click(function(){
        // $sel_btn.off('mouseover');
        
        index = $('.no-indicator').index(this);
        $('.table-list').hide();
        $('.no-indicator').removeClass('btn_click');
        
        $('.table-list').eq(index).show();
        $(this).addClass('btn_click');
      })
      
      // 페이지 버튼 호버
      let $sel_btn = $('.table_nav_btns button');
      $sel_btn.mouseover(function(){
        $sel_btn.removeClass('btn_hover');
        $(this).addClass('btn_hover');
      }).mouseleave(function(){
        $sel_btn.removeClass('btn_hover');
      })
      
      // 페이지 화살표 버튼
      $('.prev_first').on('click',function(){
        index = 0;
        $('.table-list').hide();
        $('.table-list:first').show();
        $('.no-indicator').removeClass('btn_click');
        $('.no-indicator:first').addClass('btn_click');
      })
      $('.next_last').on('click',function(){
        index = 3;
        $('.table-list').hide();
        $('.table-list:last').show();
        $('.no-indicator').removeClass('btn_click');
        $('.no-indicator:last').addClass('btn_click');
      })
      $('.prev_before').on('click',function(){
        index = index - 1;
        // console.log(index);
        $('.table-list').hide();
        $('.table-list').eq(index).show();
        $('.no-indicator').removeClass('btn_click');
        $('.no-indicator').eq(index).addClass('btn_click');
        
      })
      $('.next_after').on('click',function(){
        index = index + 1;
        // console.log(index);
        $('.table-list').hide();
        $('.table-list').eq(index).show();
        $('.no-indicator').removeClass('btn_click');
        $('.no-indicator').eq(index).addClass('btn_click');
        
      })
    })
    
    
    // window 로드이벤트
    $(window).load(function(){
      // 첫번째 목록의 콘텐츠만 보이게!
      $('.tit_theme:first').addClass('reverse_color');
      $('.tit_theme:first').find('.next_white').show().prev().hide();
      $('.info--contents > section').hide();
      $('.info--contents > section:first').show();
      
      // 첫번째 목록의 테이블만 보이게!
      $('.table-list').hide();
      $('.table-list:first').show();
      $('.no-indicator:first').addClass('btn_click');
    })
    
    /*
    // remove 클릭이벤트
    $('.btn_remove').click(function(){
      $('.ticket_chk').each(function(index){
        $('.ticket_chk:checked').closest('tr').remove();
      })
    })
    */
    
    
    
    
    // chk_btn 클릭이벤트
    $('.main_chk').click(function(){
      var chk = $('.main_chk').prop('checked');
      if(chk){
        $('input[class^=ticket_]').prop('checked',true);
      }
      else {
        $('input[class^=ticket_]').prop('checked',false);
      }
    })
    
    /* 팝업창 오픈이벤트 */
    $('.popup-box').children('div[class^=popup__]').hide();
    $('.popup-box').children('div[class*=alert_]').hide();
    
    // join_search 클릭이벤트
    $('.join_search').click(function(){
      $('.popup-box').show();
      $('.popup__member').show();
    })
    
    // join_ok 클릭이벤트
    $('.data-box').hide();
    $('.join_ok').click(function(){
      $('.data-box').slideDown();
    })
    
    // tr-count 데이터값
    $(function(){
      let length = $('.table_body tr').length;
      // console.log(length);
      
      $('.tr-count').text(length);
    })
    
    // data-save 클릭이벤트
    $('.data-save').on('click',function(){
      /*
      var input = $('input[type=text]').val();
      var space = "";
      console.log(input);
      if(input.indexOf(space) != -1){
          alert('내용을 입력해주세요!');
      }
      */
      
      $('.popup__member').hide();
      $('.popup__alert').show();
      
      // 변수 설정
      let id = $('.guide_id').text();
      let name = $('.data_name input').val();
      let phone = $('.data_phone input').val();
      let ticket = $('.data_ticket input').val();
      let month = $('.control1').val(); + '-' + $('.control2').val();
      let stop = $('.data_stop input').val();
      let extend = $('.data_extend input').val();
      let change = $('.data_change').text();
      
      let tag = '<tr>'+
        '<td><input type="checkbox" class="ticket_chk"></td>'+
        '<td>'+ id +'</td>'+
        '<td>'+ phone +'</td>'+
        '<td>'+ name +'</td>'+
        '<td>'+ ticket +'</td>'+
        '<td>'+ month +'</td>'+
        '<td>'+ stop +'</td>'+
        '<td>'+ extend +'</td>'+
        '<td>'+ change +'</td>'+
        '</tr>'
      
      // 현재 테이블에만 적용시키고 싶은데 중복적용이 됨
      $('.table-list tbody').prepend(tag);
      
    })
    
    // '정지' 버튼 클릭이벤트
    $('.btn_stop').click(function(){
      $('.popup-box').show();
      $('.popup__stop').show();
      // data-box 보이게
      $('.data-box').show();
    })
    
    // '연장' 버튼 클릭이벤트
    $('.btn_extend').click(function(){
      $('.popup-box').show();
      $('.popup__extend').show();
    })
    
    /* ===== 환불(삭제) 팝업 추가 ===== */
    // '환불' 버튼 클릭시 팝업 호출
    $('.btn_change').click(function(){
      $('.popup-box').show();
      $('.popup__change').show();
    })
    
    /* 결제 기능 없이 안내용으로 쓰일 것이라
       환불 팝업으로 삭제 버튼 클릭시 '환불 처리' -> '삭제' 로 변경 바랍니다. ===== */
    $('.btn_remove').click(function(){
      $('.popup-box').show();
      $('.popup__change').show();
    })
    
    
    
    /* 팝업창 닫기이벤트 */
    // 윈도우 ESC버튼 팝업닫기
    $(window).keyup(function(e){
      if(e.keyCode == 27){
        $(".popup-box").fadeOut();
        $('.popup-box').children().hide();
      }
    })
    
    // 윈도우 클릭시 팝업닫기
    $(window).click(function(e){
      var target = e.target.className;
      
      if(target == 'popup-box'){
        $('.popup-box').fadeOut();
        $('.popup-box').children().hide();
      }
    })
    
    /* 취소 버튼 클릭시 팝업창 닫기 */
    // 회원가입창 취소 버튼
    $('.join_no').click(function(){
      $('.popup-box').fadeOut();
      $('.popup-box').children().hide();
    })
    
    // 정지,연장 팝업창 취소 버튼
    $('.how_no').click(function(){
      $('.popup-box').fadeOut();
      $('.popup-box').children().hide();
    })
    
    // 연장 팝업창 저장 버튼
    $('.popup__extend .how_ok').click(function(){
      let data = $('.member--dates input').val();
      if(data == ""){
        alert('일수를 입력해주세요!')
      }
      else {
        $('.popup__extend').hide();
        $('.popup__alert').show();
      }
    })
    
    // 정지 팝업창 저장 버튼
    $('.popup__stop .how_ok').click(function(){
      let data = $('.member--dates input').val();
      if(data == ""){
        alert('일수를 입력해주세요!')
      }
      else {
        $('.popup__stop').hide();
        $('.popup__alert').show();
      }
    })
    
    add_menu_active('member');
    
    /* ========== 환불 팝업과 삭제 팝업은 하나의 틀에 텍스트만 변화시켜 쓰기로 했습니다. ========== */
    // 환불 팝업 'ok' 버튼
    $('.popup__change .how_ok').click(function(){
      $('.popup__change').hide();
      $('.popup__alert').show();
      
      // 서버에서 환불 기능과 삭제 기능이 분류될 수 있도록 조정이 필요합니다.
      
      // 환불 팝업 클릭 기능
      $('.ticket_chk').each(function(index){
        $('.ticket_chk:checked').closest('tr').find('td:last-child').text("O");
      })
      
      // 삭제 팝업 클릭 기능
      $('.ticket_chk').each(function(index){
        $('.ticket_chk:checked').closest('tr').remove();
      })
    })
    
    // 수강권 수정 '수정' 버튼 클릭시 팝업 호출
    $('.btn_rewrite').click(function(){
      $('.popup-box').show();
      $('div[class*=alert_]').show();
    })
    
    // 수강권 수정 '수정' 팝업 닫기
    $('.confirm_btn button[class^=btn_]').click(function(){
      $('div[class*=alert_]').hide();
      $('.popup-box').hide();
    })
    
  });
</script>
