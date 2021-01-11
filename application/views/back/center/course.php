<style type="text/css">
  /* 전체 수정 */
  #whole {
    padding: 0;
  }
  #whole a:hover {
    text-decoration: none !important;
    font-weight: bold !important;
  }
  
  /* =============== '수강권 관리' 수정 =============== */
  div[class^="type:"] {
    padding-bottom: 16px;
    border-bottom: 1px dashed #eee;
    margin-bottom: 12px;
  }
  /*
div[class^="type:active"] .slider {
    background-color: #0091ea;
}
div[class^="type:active"] .slider:before {
    left: 28px;
}
div[class^="type:active"]
input:checked + .slider:before {
    -webkit-transform: translateX(0px);
    -ms-transform: translateX(0px);
    transform: translateX(0px);
}
  */
  
  .contents_tit {
    float: left;
    padding: 0 !important;
    border: 0 !important;
    margin: 0 !important;
  }
  .agree_btn {
    float: right;
  }
  /* The switch - the box around the slider */
  .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 28px;
    vertical-align:middle;
    margin: 0;
  }
  
  /* Hide default HTML checkbox */
  .switch input {display:none;}
  
  /* The slider */
  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #e0e0e0;
    -webkit-transition: .4s;
    transition: .4s;
  }
  
  .slider:before {
    position: absolute;
    content: "";
    height: 20px;
    width: 20px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }
  
  input:checked + .slider {
    background-color: #2196F3;
  }
  
  input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
  }
  
  input:checked + .slider:before {
    -webkit-transform: translateX(32px);
    -ms-transform: translateX(32px);
    transform: translateX(32px);
  }
  
  /* Rounded sliders */
  .slider.round {
    border-radius: 32px;
  }
  
  .slider.round:before {
    border-radius: 50%;
  }
  
  /* '수강권 수정' 수정 */
  .table_head tr th,
  .table_body tr td {
    text-align: center !important;
  }
  .type_join {
    width: 294px;
  }
  @media(min-width:888px){
    .type_join {
      width: 412px;
    }
  }
  @media(min-width:936px){
    .type_join {
      width: 432px;
    }
  }
  .join_guide {
    display: inline-block;
    width: 90px;
    color: #816661;
    font-size: 13px;
  }
  @media(min-width:888px){
    .join_guide {
      width: 92px;
    }
  }
  @media(min-width:936px){
    .join_guide {
      width: 100px;
    }
  }
  .type_join input {
    width: 168px;
  }
  @media(min-width:888px){
    .type_join input {
      width: 288px;
    }
  }
  @media(min-width:936px){
    .type_join input {
      width: 328px;
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
  .contents_info {
    position: relative;
  }
  .card_contents {
    box-sizing: border-box;
    height: 160px;
  }
  .contents_tit {
    color: #111;
  }
  .info_tit, .info_data {
    float: left;
  }
  .info_tit {
    width: 56px;
  }
  .info_deadline {
    float: right;
    color: #111;
    font-size: 12px;
    font-weight: bold;
  }
  .edit_btn, .info_btn {
    position: absolute;
    right: 0;
    top: 28px;
    width: 60px;
    height: 32px;
    border-radius: 0 8px 8px 8px;
    box-sizing: border-box;
    border: 2px solid #0091ea;
    color: #0091ea;
    font-size: 12px;
    font-weight: 700;
  }
  .info_btn {
    right: 0;
  }
  .edit_btn {
    right: 70px;
  }
  .admin_detailbox, .enroll_detailbox {
    margin-bottom: 28px;
  }
  .table_head tr th, .table_body tr td {
    word-break: break-all;
  }
  .btn_valid {
    box-sizing: border-box;
    width: 52px;
    height: 32px;
    border-radius: 4px;
    color: #fff;
    font-size: 10px;
    font-weight: bold;
  }
  .btn_valid.change_info{
    background-color: #0091ea;
  }
  .btn_valid.view_info{
    background-color: #da6547;
  }
  .member--guide .guide_id {
    font-size: 18px;
  }
  .agree_btn, div[class$="card"] {
    position: relative;
  }
  .ticketHover {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 16;
    box-shadow: 0 4px 8px rgba(0,0,0,0.12);
  
    height: auto;
    width: 360px;
    padding: 28px 28px 32px;
    background-color: #fff;
    border-radius: 4px;
  }
  .table_head tr th:first-child {
    border-top-left-radius: 4px;
  }
  .table_head tr th:last-child {
    border-top-right-radius: 4px;
  }
  #table_bottom tr th:first-child {
    border-top-left-radius: 0;
  }
  #table_bottom tr th:last-child {
    border-top-right-radius: 0;
  }
  .ticketHover_tit {
    text-align: center;
    color: #845b4c;
    font-size: 21px;
    font-weight: normal;
    padding-bottom: 16px;
  }
  .table_body {
    border: 0;
  }
  .table-list {
    border-bottom: 1px solid #f5f5f5 !important;
  }
  .ticket_hover_member_list td {
    height: 68px;
  }
  .member--guide .guide_id {
    font-size: 18px;
  }
</style>
<h2 class="boxwrap__type meaning">수강권 관리</h2>
<div class="boxwrap__info">
  <div class="info--tit">
    <a href="#" class="tit_theme theme_admin reverse_color" data-role="admin">
      수강권 관리
      <div class="theme_arrow">
        <img src="<?php echo base_url(); ?>template/back/center/imgs/icon_next.png" width="6" height="auto" style="display: none;">
        <img src="<?php echo base_url(); ?>template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="" class="next_white">
      </div>
    </a>
    <a href="#" class="tit_theme theme_enroll" data-role="enroll">
      수강권 등록
      <div class="theme_arrow">
        <img src="<?php echo base_url(); ?>template/back/center/imgs/icon_next.png" width="6" height="auto">
        <img src="<?php echo base_url(); ?>template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">
      </div>
    </a>
    <a href="#" class="tit_theme theme_modify" data-role="modify" style="display: none">
      수강권 수정
      <div class="theme_arrow">
        <img src="<?php echo base_url(); ?>template/back/center/imgs/icon_next.png" width="6" height="auto">
        <img src="<?php echo base_url(); ?>template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">
      </div>
    </a>
  </div>
  <div class="info--contents scroll-y_hidden">
    <section class="contents_admin scroll-y" style="display: block;">
      <h3 class="meaning">수강권 관리</h3>
      <div class="admin_detailbox shadow_md">
        <p class="enroll_tit tit-lg">수강권 관리</p>
        <ul class="admin_wrap">
          <li class="admin_progress clearfix">
            <?php foreach ($tickets[1] as $ticket) { ?>
              <div class="progress_card">
                <div class="card_contents" data-id="<?php echo $ticket->ticket_id; ?>" data-target="<?php echo $ticket->ticket_title; ?>">
                  <div class="type:active clearfix">
                    <p class="contents_tit tit-md"><?php echo $ticket->ticket_title; ?></p>
                    <div class="agree_btn">
                      <label class="switch">
                        <input type="checkbox" <?php if ($ticket->activate) echo 'checked'; ?> onclick="activate_ticket($(this));">
                        <span class="slider round"></span>
                      </label>
                    </div>
                  </div>
                  <div class="contents_info clearfix">
                    <div class="info_ration">
                      <p class="info_tit"><?php echo $this->center_model->get_ticket_type_str($ticket->ticket_type); ?></p>
                      <p class="info_data"><?php if ($ticket->ticket_type == CENTER_TICKET_TYPE_COUNT) echo $ticket->reservable_count.'회'; ?></p><!-- 유효기간 추가 -->
                      <p class="info_deadline">유효기간 <span><?php echo $ticket->reservable_duration; ?></span>일</p>
                    </div>
                    <button class="edit_btn clearfix" id="edit_btn_<?=$ticket->ticket_id; ?>">수정</button>
                    <button class="info_btn clearfix">관리</button>
                  </div>
                </div>
                <div class="card_ticket clearfix">
                  <p class="ticket_price"><?php echo $this->crud_model->get_price_str($ticket->ticket_price); ?>원</p>
                  <p class="ticket_expired">
                    <span id="enroll_member_count_<?php echo $ticket->ticket_id; ?>">
                      <?php echo $ticket->enroll_member_count; ?>
                    </span> /
                    <span class="expired_amount">
                      <?php echo $ticket->limit_enroll_member_count; ?>매
                    </span>
                  </p>
                </div>
                <div class="ticketHover" id="ticket_hover_<?= $ticket->ticket_id; ?>" style="display: none;">
                  <p class="ticketHover_tit">수강권</p>
                  <div class="table_main ticketHover_table">
                    <div class="table_wrap">
                      <div class="table_top">
                        <table class="table_head">
                          <colgroup>
                            <col width="33.33%">
                            <col width="33.33%">
                            <col width="33.33%">
                          </colgroup>
                          <thead>
                          <tr>
                            <th>이름</th>
                            <th>종류</th>
                            <th>가격</th>
                          </tr>
                          </thead>
                        </table>
                        <div class="table_body_wrap">
                          <div class="table_body ticket_hover_member_list">
                            <table class="table-list" style="display: table;">
                              <colgroup>
                                <col width="33.33%">
                                <col width="33.33%">
                                <col width="33.33%">
                              </colgroup>
                              <tbody>
                              <tr>
                                <td class="ticket_form"><?= $ticket->ticket_title; ?></td>
                                <td>
                                  <? if ($ticket->ticket_type == CENTER_TICKET_TYPE_COUNT) { ?>
                                    정액권 <span class="formal_no"><?= $ticket->reservable_count; ?></span>회,
                                    <br>유효기간 <span class="formal_date"><?= $ticket->reservable_duration; ?></span>일
                                  <? } else { ?>
                                    <!-- (기간제 회원권일 시 아래의 내용으로) -->
                                    기간제 회원권<br><span class="term_no"><?= $ticket->reservable_duration; ?></span>일
                                  <? } ?>
                                </td>
                                <td>
                                <span class="formal_price"><?= $this->crud_model->get_price_str($ticket->ticket_price); ?>
                                </span>원
                                </td>
                              </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="table_bottom" id="table_bottom">
                        <table class="table_head">
                          <colgroup>
                            <col width="36%">
                            <col width="32%">
                            <col width="32%">
                          </colgroup>
                          <thead>
                          <tr>
                            <th>1일예약<br>가능횟수</th>
                            <th>취소횟수<br>제한</th>
                            <th>지급가능<br>최대인원</th>
                          </tr>
                          </thead>
                        </table>
                        <div class="table_body_wrap">
                          <div class="table_body ticket_hover_member_list">
                            <table class="table-list" style="display: table;">
                              <colgroup>
                                <col width="36%">
                                <col width="32%">
                                <col width="32%">
                              </colgroup>
                              <tbody>
                              <tr>
                                <td>
                                  <? if ($ticket->reservable_count_oneday) { ?>
                                  <span class="formal_book"><?= $ticket->reservable_count_oneday; ?></span>회
                                  <? } else { ?>
                                    -
                                  <? } ?>
                                </td>
                                <td>
                                  <? if ($ticket->limit_cancel_count_oneday) { ?>
                                    1일<span class="formal_cancel"><?= $ticket->limit_cancel_count_oneday; ?></span>회<br>
                                  <? } ?>
                                  <? if ($ticket->limit_cancel_count_total) { ?>
                                  최대<span class="formal_cancel"><?= $ticket->limit_cancel_count_total; ?></span>회
                                  <? } ?>
                                  <? if ($ticket->limit_cancel_count_oneday == 0 && $ticket->limit_cancel_count_total == 0) { ?>
                                    -
                                  <? } ?>
                                </td>
                                <td><span class="formal_person"><?= $ticket->limit_enroll_member_count; ?></span>명</td>
                              </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
            <div class="progress_card plusMember" style="border: 2px dotted rgb(155, 127, 122);">
              <div class="plus_btn" style="background: rgb(155, 127, 122);">
                <img src="<?php echo base_url(); ?>template/back/center/imgs/icon_plus_white.png" class="plus_icon" width="16" height="16">
              </div>
            </div>
          </li>
          <li class="admin_stop clearfix">
            <?php foreach ($tickets[0] as $ticket) { ?>
              <div class="stop_card">
                <div class="card_contents" data-id="<?php echo $ticket->ticket_id; ?>" data-target="<?php echo $ticket->ticket_title; ?>">
                  <div class="type:disabled clearfix">
                    <p class="contents_tit tit-md"><?php echo $ticket->ticket_title; ?></p>
                    <div class="agree_btn">
                      <label class="switch">
                        <input type="checkbox" <?php if ($ticket->activate) echo 'checked'; ?> onclick="activate_ticket($(this));">
                        <span class="slider round"></span>
                      </label>
                    </div>
                  </div>
                  <div class="contents_info clearfix">
                    <div class="info_ration">
                      <p class="info_tit"><?php echo $this->center_model->get_ticket_type_str($ticket->ticket_type); ?></p>
                      <p class="info_data"><?php if ($ticket->ticket_type == CENTER_TICKET_TYPE_COUNT) echo $ticket->reservable_count.'회'; ?></p><!-- 유효기간 추가 -->
                      <p class="info_deadline">유효기간 <span><?php echo $ticket->reservable_duration; ?></span>일</p>
                    </div>
                    <button class="edit_btn clearfix" id="edit_btn_<?= $ticket->ticket_id; ?>" style="color: #bdbdbd; border: 2px solid #bdbdbd;">수정</button>
                    <button class="info_btn clearfix" style="color: #bdbdbd; border: 2px solid #bdbdbd;">관리</button>
                  </div>
                </div>
                <div class="card_ticket clearfix">
                  <p class="ticket_price"><?php echo $this->crud_model->get_price_str($ticket->ticket_price); ?>원</p>
                  <p class="ticket_expired">
                    <span id="enroll_member_count_<?php echo $ticket->ticket_id; ?>">
                      <?php echo $ticket->enroll_member_count; ?>
                    </span> /
                    <span class="expired_amount">
                      <?php echo $ticket->limit_enroll_member_count; ?>매
                    </span>
                  </p>
                </div>
                <div class="ticketHover" id="ticket_hover_<?= $ticket->ticket_id; ?>" style="display: none;">
                  <p class="ticketHover_tit">수강권</p>
                  <div class="table_main ticketHover_table">
                    <div class="table_wrap">
                      <div class="table_top">
                        <table class="table_head">
                          <colgroup>
                            <col width="33.33%">
                            <col width="33.33%">
                            <col width="33.33%">
                          </colgroup>
                          <thead>
                          <tr>
                            <th>이름</th>
                            <th>종류</th>
                            <th>가격</th>
                          </tr>
                          </thead>
                        </table>
                        <div class="table_body_wrap">
                          <div class="table_body ticket_hover_member_list">
                            <table class="table-list" style="display: table;">
                              <colgroup>
                                <col width="33.33%">
                                <col width="33.33%">
                                <col width="33.33%">
                              </colgroup>
                              <tbody>
                              <tr>
                                <td class="ticket_form"><?= $ticket->ticket_title; ?></td>
                                <td>
                                  <? if ($ticket->ticket_type == CENTER_TICKET_TYPE_COUNT) { ?>
                                    정액권 <span class="formal_no"><?= $ticket->reservable_count; ?></span>회,
                                    <br>유효기간 <span class="formal_date"><?= $ticket->reservable_duration; ?></span>일
                                  <? } else { ?>
                                    <!-- (기간제 회원권일 시 아래의 내용으로) -->
                                    기간제 회원권<br><span class="term_no"><?= $ticket->reservable_duration; ?></span>일
                                  <? } ?>
                                </td>
                                <td>
                                <span class="formal_price"><?= $this->crud_model->get_price_str($ticket->ticket_price); ?>
                                </span>원
                                </td>
                              </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="table_bottom" id="table_bottom">
                        <table class="table_head">
                          <colgroup>
                            <col width="36%">
                            <col width="32%">
                            <col width="32%">
                          </colgroup>
                          <thead>
                          <tr>
                            <th>1일예약<br>가능횟수</th>
                            <th>취소횟수<br>제한</th>
                            <th>지급가능<br>최대인원</th>
                          </tr>
                          </thead>
                        </table>
                        <div class="table_body_wrap">
                          <div class="table_body ticket_hover_member_list">
                            <table class="table-list" style="display: table;">
                              <colgroup>
                                <col width="36%">
                                <col width="32%">
                                <col width="32%">
                              </colgroup>
                              <tbody>
                              <tr>
                                <td>
                                  <? if ($ticket->reservable_count_oneday) { ?>
                                    <span class="formal_book"><?= $ticket->reservable_count_oneday; ?></span>회
                                  <? } else { ?>
                                    -
                                  <? } ?>
                                </td>
                                <td>
                                  <? if ($ticket->limit_cancel_count_oneday) { ?>
                                    1일<span class="formal_cancel"><?= $ticket->limit_cancel_count_oneday; ?></span>회<br>
                                  <? } ?>
                                  <? if ($ticket->limit_cancel_count_total) { ?>
                                    최대<span class="formal_cancel"><?= $ticket->limit_cancel_count_total; ?></span>회
                                  <? } ?>
                                  <? if ($ticket->limit_cancel_count_oneday == 0 && $ticket->limit_cancel_count_total == 0) { ?>
                                    -
                                  <? } ?>
                                </td>
                                <td><span class="formal_person"><?= $ticket->limit_enroll_member_count; ?></span>명</td>
                              </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          </li>
        </ul>
      </div>
      <div class="ticket_current status_table shadow_md" id="ticket_current" style="display: none">
        <div class="table_tit clearfix">
          <p class="type_name tit-lg tit-normal"><<span id="ticket_current_title"></span>> 수강권 관리</p>
          <!-- type_join 수정 -->
          <div class="type_join">
            <p class="join_guide" style="display: inline-block;">회원검색</p>
            <input type="text" id="search_filter" placeholder="회원가입 시 이메일 / 전화번호 / 이름 검색">
            <button class="join_search">
              <img src="<?php echo base_url(); ?>template/back/center/imgs/icon_find.png" width="24">
            </button>
          </div>
          <div class="type_btn">
            <style type="text/css">
              .type_btn button {
                width: 40px;
                font-size: 10px;
              }
              @media(min-width: 962px){
                .type_btn button {
                  width: 52px;
                }
              }
              @media(min-width: 1025px){
                .type_btn button {
                  width: 64px;
                  font-size: 12px;
                }
              }
            </style>
            <? if ($ticket->ticket_type == CENTER_TICKET_TYPE_COUNT) { ?>
              <button class="btn_addition btn_val btn_rg">횟수추가</button>
            <? } ?>
            <button class="btn_stop btn_val btn_rg">정지설정</button>
            <button class="btn_extend btn_val btn_rg">기간연장</button>
            <button class="btn_change btn_val btn_rg">회원환불</button>
            <button class="btn_remove btn_val btn_rg">회원삭제</button>
          </div>
        </div>
        <div class="table_data">
          <!-- tr-count 숫자 세기 -->
          <p class="tr-data">총 <span class="tr-count" id="ticket_members"></span>개</p>
          <div class="table_main">
            <table class="table_head">
              <colgroup>
                <col width="5%">
                <col width="16.5%">
                <col width="12.5%">
                <col width="12.5%">
                <col width="15.5%">
                <col width="5.5%">
                <col width="5.5%">
                <col width="5%">
                <col width="5.5%">
                <col width="16.5%">
              </colgroup>
              <thead>
              <tr>
                <th>
                  <!-- no. 삭제 -->
                  <!-- no. -->
                  <input type="checkbox" class="main_chk">
                </th>
                <th>아이디</th>
                <th>연락처</th>
                <th>이름</th>
                <th>시작일자-종료일자</th>
                <th>정지</th>
                <th>추가연장</th>
                <th>환불</th>
                <th>예약정보</th>
                <th>기타</th>
              </tr>
              </thead>
            </table>
            <div class="table_body_wrap">
              <div class="table_body" id="ticket_member_list">
                <!-- 팝업에서 테이블정보 추가시 현재 테이블에만 적용되게 -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="contents_enroll scroll-y" style="display: none;">
      <h3 class="meaning">수강권 등록</h3>
      <div class="enroll_detailbox shadow_md">
        <button class="btn_save btn_val btn_rg" onclick="ticket_add()">저장</button>
        <p class="enroll_tit tit-lg">수강권 등록</p>
        <dl class="enroll_detail clearfix">
          <dt>수강권 이름</dt>
          <dd class="detail_name">
            <input class="name_space" id="enroll_ticket_title" type="text" style="height: 32px;">
          </dd>
          <dt>수강권 종류</dt>
          <dd class="detail_type" id="enroll_ticket_type">
            <!-- 체크박스 활성화/비활성화 기능 전체 적용 -->
            <label class="form_chk only_chk">
              <input checked type="checkbox" id="c1" data-id="c1" class="chk_ration">
              정액권 (<span><input type="number" id="i1" class="chk_no"></span>
              회 / 유효기간 <span><input id="i2" type="number" class="chk_no"></span> 일)
            </label>
            <label class="form-chk only_chk">
              <input type="checkbox" id="c2" data-id="c2" class="chk_term">
              기간제 회원권 (<span><input disabled type="number" id="i3" class="chk_date bg_grey"></span>일)
            </label>
          </dd><br>
          <dt>가격</dt>
          <dd class="detail_price">
            <div class="count_wrap clearfix">
              <p class="count_limit">
                <input type="number" id="enroll_ticket_price" class="form_price" style="width: 67%"> 원
              </p>
            </div>
          </dd><br>
          <dt style="line-height: 1.5;">1일예약 가능횟수</dt>
          <dd class="book-count">
            <div class="count_wrap clearfix">
              <p class="count_limit">
               <input type="number" id="reservable_count_oneday" class="form_count"> 회
              </p>
              <!-- count_cancel 이동 -->
            </div>
            <!-- cancel_option 이동 -->
          </dd><br>
          <dt style="line-height: 1.5;">수강권 지급가능 최대인원</dt>
          <dd>
            <p class="count_limit">
              <input type="number" id="enroll_max_ticket_count" class="form_people form_person" style="width: 67%"> 명
            </p>
          </dd>
          <dt style="width: 93px; margin-right: 13px;">
            <!-- count_cancel 스타일 수정 -->
            <label class="count_cancel form-chk" id="count_cancel" style="float: none;">
              <p class="count_limit">
                <input type="checkbox" id="enroll_limit_cancel_count" name="count_limit">
                취소횟수 제한
              </p>
            </label>
          </dt>
          <!-- dd 스타일 추가 -->
          <dd style="height: 32px;">
            <!-- cancel_option 스타일 수정 -->
            <div class="cancel_option" id="cancel_option" style="display: none; margin: 0;">
              <p class="option_oneday">1일 최대 <input type="number" id="enroll_cancel_count_oneday" class="form_count count_oneday"> 회 또는</p>
              <p class="option_term">회원권 기간내 최대 <input type="number" id="enroll_cancel_count_total" class="form_count count_term"> 회</p>
            </div>
          </dd>
        </dl>
      </div>
    </section>
    <section class="contents_modify scroll-y" style="display: none;">
        <!-- ajax -->
    </section>
  </div>
</div>
<style type="text/css">
  #whole a {
    text-decoration: none;
    color: inherit;
  }
  #whole a:hover {
    text-decoration: none;
    font-weight: bold;
  }
  #whole .id_current {
    border-bottom: 1px solid #f3efee;
    box-sizing: border-box;
  }
  #whole .header h1 {
    margin: 5px 16px 0 0;
  }
  #whole .header .logo_home {
    text-align: center;
  }
  #whole .header .logo_home img {
    padding: 0;
  }
  .btn_valid.change_info,
  .btn_valid.view_info {
    width: 27px;
    height: 36px;
  }
  @media(min-width: 920px) {
    .btn_valid.change_info,
    .btn_valid.view_info {
      width: 52px;
      height: 32px;
    }
  }
</style>
<div class="popup-box">
  <div class="popup__member popup_layout shadow_sm" style="display: none;">
    <div class="member-party">
      <div class="member--guide">
        <p class="guide_id" id="member_id"></p>
        <span class="guide_txt"> 님</span>
      </div>
      <div class="member--join clearfix">
        <button class="join_no btn_val btn_md">취소</button>
        <button class="join_ok btn_val btn_md">추가</button>
      </div>
    </div>
    <div class="member--data">
      <dl class="data-box clearfix" style="/*display: none;*/">
        <dt>아이디</dt>
        <dd class="data_email">
          <input disabled id="member_email" class="bg_grey" type="text" value="">
        </dd>
        <dt>이름</dt>
        <dd class="data_name">
          <input disabled id="member_name" class="bg_grey" type="text" value="">
        </dd>
        <dt>연락처</dt>
        <dd class="data_phone">
          <input disabled id="member_phone" class="bg_grey" type="text" value="">
        </dd>
        <dt>기간</dt>
        <dd class="data_period">
          <div class="container">
            <div class="form-group">
              <div class="input-group date datetimepicker1" id="start_datepicker">
                <input type="text" class="form-control control1" id="enable_start_at">
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>
          </div>
          <span class="period_hypen">-</span>
          <div class="container">
            <div class="form-group">
              <div class="input-group date datetimepicker1" id="end_datepicker">
                <input type="text" class="form-control control2" id = enable_end_at>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>
          </div>
        </dd>
        <dt>예약횟수</dt>
        <dd class="data_stop">
          <input type="number" id="reservable_count" value="" placeholder="회원이 예약 가능한 최대 횟수">
        </dd>
      </dl>
      <button class="data-save btn_md">저장</button>
    </div>
  </div>
  <div class="popup__stop popup_layout theme:extend_ shadow_sm" style="display: none;">
    <div class="member--guide">
      <img src="<?php echo base_url(); ?>template/back/center/imgs/information_mark.png" alt="" class="message_icon" width="40" height="40" style="margin: 4px 12px 0 0">
      <p class="guide_question" style="text-align: left;">선택한 회원의 수강권을
        <br><strong>정지</strong>하시겠습니까?</p>
    </div>
    <div class="member--dates" style="width: 324px; margin: 0 auto;">
      <dl class="data-box" style="display: block !important; width: inherit; height: inherit;">
        <dt style="display: none;"></dt>
        <dd class="data_period" style="width: inherit; font-size: 0;">
          <div class="container" style="width:144px; vertical-align: top;">
            <div class="form-group">
              <div class="input-group date datetimepicker1" id="stop_datepicker1">
                <input type="text" class="form-control control1" id="stop_start_at" style="width: 108px; margin-right: 0; font-size:12px">
                <span class="input-group-addon" style="display: inline-block; width: 36px; height: 36px; vertical-align: top;">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>
            <script type="text/javascript">
            </script>
          </div>
          <span class="period_hypen">-</span>
          <div class="container" style="width:144px; vertical-align: top;">
            <div class="form-group">
              <div class="input-group date datetimepicker1" id="stop_datepicker2">
                <input type="text" class="form-control control1" id="stop_end_at" style="width: 108px; margin-right: 0; font-size:12px;">
                <span class="input-group-addon" style="display: inline-block; width: 36px; height: 36px; vertical-align: top;">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>
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
      <img src="<?php echo base_url(); ?>template/back/center/imgs/information_mark.png" alt="" class="message_icon" width="40" height="40" style="margin: 4px 12px 0 0">
      <p class="guide_question" style="text-align: left;">선택한 회원의 수강권을
        <br><strong>연장</strong>하시겠습니까?</p>
    </div>
    <div class="member--dates">
      <input type="number" id="extend_duration" style="width: 80px">
      <span class="tit-md">일 연장</span>
    </div>
    <div class="member--how">
      <button class="how_no btn_val btn_rg">아니오</button>
      <button class="how_ok btn_val btn_rg">예</button>
    </div>
  </div>
<!--  <div class="popup__extend extend_premium popup_layout shadow_sm" style="display: none;">-->
<!--    <div class="member--guide">-->
<!--      <img src="--><?php //echo base_url(); ?><!--template/back/center/imgs/information_mark.png" alt="" class="message_icon" width="40" height="40" style="margin: 4px 12px 0 0">-->
<!--      <p class="guide_question" style="text-align: left;">선택한 회원의 수강권을-->
<!--        <br><strong>연장</strong>하시겠습니까?</p>-->
<!--    </div>-->
<!--    <div class="member--dates">-->
<!--      <p>-->
<!--        <input type="number" style="width: 80px; height: 36px;">-->
<!--        <span class="tit-md"> 회 (유효기간 </span>-->
<!--        <input type="number" style="width: 80px; height: 36px;">-->
<!--        <span class="tit-md"> 일)</span>-->
<!--      </p>-->
<!--    </div>-->
<!--    <div class="member--how">-->
<!--      <button class="how_no btn_val btn_rg">아니오</button>-->
<!--      <button class="how_ok btn_val btn_rg">예</button>-->
<!--    </div>-->
<!--  </div>-->
  
  <div class="popup__addition extend_term popup_layout shadow_sm" style="display: none;">
    <div class="member--guide">
      <img src="<?php echo base_url(); ?>template/back/center/imgs/information_mark.png" alt="" class="message_icon" width="40" height="40" style="margin: 4px 12px 0 0">
      <p class="guide_question" style="text-align: left;">선택한 회원의 수업 횟수를
        <br><strong>추가</strong>하시겠습니까?</p>
    </div>
    <div class="member--dates">
      <input type="number" id="addition_count" style="width: 80px">
      <span class="tit-md">회 추가</span>
    </div>
    <div class="member--how">
      <button class="how_no btn_val btn_rg">아니오</button>
      <button class="how_ok btn_val btn_rg">예</button>
    </div>
  </div>
  <div class="popup__change popup_extend extend_layout popup_layout shadow_sm" style="display: none; height: 208px; padding-top: 44px;">
    <div class="member--guide">
      <img src="<?php echo base_url(); ?>template/back/center/imgs/information_mark.png" alt="" class="message_icon" width="40" height="40" style="margin: 4px 12px 0 0;">
      <p class="guide_question" style="text-align: left;">선택한 회원의 수강권을
        <br><strong>환불 처리</strong>하시겠습니까?</p>
    </div>
    <div class="member--how" style="margin-top: 12px;">
      <button class="how_no btn_val btn_rg">아니오</button>
      <button class="how_ok btn_val btn_rg">예</button>
    </div>
  </div>
  
  <div class="popup__remove popup_extend extend_layout popup_layout shadow_sm" style="display: none; height: 208px; padding-top: 44px;">
    <div class="member--guide">
      <img src="<?php echo base_url(); ?>template/back/center/imgs/information_mark.png" alt="" class="message_icon" width="40" height="40" style="margin: 4px 12px 0 0;">
      <p class="guide_question" style="text-align: left;">선택한 회원의 수강권을
        <br><strong>삭제 처리</strong>하시겠습니까?</p>
    </div>
    <div class="member--how" style="margin-top: 12px;">
      <button class="how_no btn_val btn_rg">아니오</button>
      <button class="how_ok btn_val btn_rg">예</button>
    </div>
  </div>
  
  
  <div class="popup__alert popup_layout shadow_sm" style="display: none; width: 400px; margin-left: -200px;">
    <div class="member--guide">
      <p class="guide_alert">저장되었습니다!</p>
    </div>
  </div>
  
  <!-- 수강권 수정 버튼 클릭시 popup 추가 -->
  <div class="popup theme:alert_modify">
    <div class="popup_cnt">
      <div class="confirm_message">
        <img src="<?php echo base_url(); ?>template/back/center/imgs/information_mark.png" alt="" class="message_icon" width="40" height="40">
        <p class="message_txt">변경된 수강권 정보를
          <br>기존 발급된 수강권에도
          <br><strong>모두 적용</strong>하시나요?</p>
      </div>
      <div class="confirm_btn">
        <button class="btn_cancel font-futura" style="width: 33.1%;">CANCEL</button>
        <button class="btn_ok_all" style="width: 33.1%;">모두 수정</button>
        <button class="btn_ok" style="width: 33.1%;">추후 발급 수강권부터<br>수정 적용</button>
      </div>
    </div>
  </div>
  
  <!-- 활동내역 클릭 팝업 -->
  <div class="popup theme:alert_history pop:history" style="display: none; top: 60%;">
    <p class="history_tit">활동내역</p>
    <button class="history_close" onclick="fn_close();">
      <img src="https://dev.foundy.me/template/front/header/imgs/icon_close_black.png" width="12" height="12" alt="닫기" style="opacity: 0.2;">
      <!-- popup_box, pop:history 닫기 -->
      <script>
        function fn_close() {
          $('.popup-box').hide();
          $('div[class*=history]').hide();
        }
      </script>
    </button>
    <div class="table_main history_table">
      <table class="table_head">
        <colgroup>
          <col width="18%">
          <col width="22%">
          <col width="60%">
        </colgroup>
        <thead>
        <tr>
          <th>날짜</th>
          <th>활동내역</th>
          <th>상세정보</th>
        </tr>
        </thead>
      </table>
      <style type="text/css">
        .table_head tr th:first-child {
          border-top-left-radius: 4px;
        }
        .table_head tr th:last-child {
          border-top-right-radius: 4px;
        }
        .history_close {
          position: absolute;
          top: 4px;
          right: 4px;
          width: 40px;
          height: 40px;
        }
        .history_tit {
          color: #845b4c;
          font-size: 21px;
          font-weight: normal;
          padding-bottom: 20px;
        }
        div[class*=":history"] {
          height: auto;
          width: 624px;
          margin-top: -347px;
          margin-left: -312px;
          padding: 28px 28px 16px;
        }
        .table_body {
          border: 0;
        }
        .table-list {
          border-bottom: 1px solid #ccc;
        }
        div[class*=":history"] tr td:nth-child(2) {
          border-left: 1px dashed #eee;
        }
        div[class*=":history"] tr td:nth-child(2) {
          border-right: 1px dashed #eee;
        }
        div[class*=":history"] tr td:last-child {
          text-align: left !important;
          box-sizing: border-box;
          padding: 0 20px;
        }
      </style>
      <div class="table_body_wrap" id="ticket_member_history">
        <!-- ticket_member_history -->
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  let page;
  let filter = '';
  let ticket_id;
  let ticket_type = <?php echo CENTER_TICKET_TYPE_DEFAULT; ?>;
  let ticket_member_total_cnt = 0;
  let reservable_count = 0;
  let reservable_duration = 0;
  let user_id = 0;
  let user_name = '';
  let user_email = '';
  let user_phone = '';
  let member_ids = [];
  let member_id = 0;
  function ticket_add() {
    let url = '<?php echo base_url()."center/course/ticket/add"; ?>';
    let data = [];
    data['ticket_title'] = $('#enroll_ticket_title').val();
    data['ticket_price'] = $('#enroll_ticket_price').val();
    data['ticket_type'] = $('#enroll_ticket_type').find("input[type='checkbox']:checked").data('id') === 'c1' ? <?php echo CENTER_TICKET_TYPE_COUNT; ?> : <?php echo CENTER_TICKET_TYPE_DURATION; ?>;
    data['reservable_count'] = 0;
    data['reservable_count_oneday'] = $('#reservable_count_oneday').val();
    data['reservable_duration'] = 0;
    data['limit_cancel_count_enable'] = $('#enroll_limit_cancel_count').prop('checked') ? 1 : 0;
    data['limit_cancel_count_oneday'] = 0;
    data['limit_cancel_count_total'] = 0;
    data['limit_enroll_member_count'] = $('#enroll_max_ticket_count').val();
    if (data['ticket_type'] === <?php echo CENTER_TICKET_TYPE_COUNT; ?>) {
      data['reservable_count'] = $('#i1').val();
      data['reservable_duration'] = $('#i2').val();
    } else {
      data['reservable_count'] = 0;
      data['reservable_duration'] = $('#i3').val();
    }
    if (data['limit_cancel_count_enable'] === 1) {
      data['limit_cancel_count_oneday'] = $('#enroll_cancel_count_oneday').val();
      data['limit_cancel_count_total'] = $('#enroll_cancel_count_total').val();
    }
    // console.log(data);
    send_post(data, url, true, '');
  }
  function activate_ticket(target) {
    let url = '<?php echo base_url()."center/course/ticket/activate"; ?>';
    let data = [];
    data['ticket_id'] = target.closest('.card_contents').data('id');
    data['activate'] = target.prop('checked') ? 1 : 0;
    send_post(data, url, true, '');
  }
  function get_ticket_id(target) {
    ticket_id = target.closest('.card_contents').data('id');
    return ticket_id;
  }
  function get_ticket_title(target) {
    return target.closest('.card_contents').data('target');
  }
  function get_ticket_modify(target) {
    $('.tit_theme').removeClass('reverse_color');
    $('.theme_modify').show();
    $('.theme_modify').addClass('reverse_color');
    $('.theme_modify .next_white').show().prev().hide();
    $('.info--contents > section').hide();
    $('.contents_modify').show();
    ticket_id = get_ticket_id(target);
    $('.contents_modify').html('');
    $('.contents_modify').load('<?php echo base_url(); ?>center/course/ticket/modify?id=' + ticket_id);
  }
  function get_list(id, page, filter = '') {
    // console.log(id);
    let url = '<?php echo base_url(); ?>center/course/ticket/list?id=' + id + '&page=' +page + '&filter=' + filter;
    get_page('ticket_member_list', url);
    $('#ticket_current').show();
  }
  let history_member_id = 0;
  function get_history(id, page) {
    console.log(id);
    let url = '<?php echo base_url(); ?>center/course/ticket/member/history?id=' + id + '&page=' +page;
    get_page('ticket_member_history', url);
    $(".popup .history_table").show();
    
  }
  // member action
  function get_member_ids() {
    let idx = 0;
    member_ids = [];
    $.each($('#ticket_current #ticket_member_list').find('input[type=checkbox]'), function(i, v) {
      if ($(v).prop('checked')) {
        member_ids[idx] = $(v).data('id');
        idx++;
      }
    });
  }
  function send_action(action, popup_id, action_duration, stop_start_at, stop_end_at) {
    let url = '<?php echo base_url()."center/course/ticket/member/action"; ?>';
    let data = [];
  
    data['ticket_id'] = ticket_id;
    data['member_ids'] = JSON.stringify(member_ids);
    data['action'] = action;
    data['action_duration'] = action_duration;
    data['stop_start_at'] = stop_start_at;
    data['stop_end_at'] = stop_end_at;
  
    // console.log(data);
    send_post_data(data, url, function(res) {
      get_list(ticket_id, 1);
      let msg = '저장하였습니다! (total : ' + res.total + ', success : ' + res.success + ', failure : ' + res.failure + ')';
      $('.popup__'+popup_id).hide();
      $('.popup__alert .guide_alert').text(msg);
      $('.popup__alert').show();
      $('#enroll_member_count_'+ticket_id).text(res.enroll_member_count);
      $('.main_chk').prop('checked', false);
    });
  }
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
      if ($(this).data('role') === 'modify') {
        return false;
      }
      $('.theme_modify').hide();
    
      $('.tit_theme').removeClass('reverse_color');
      $(this).addClass('reverse_color');
      $(this).find('.next_white').show().prev().hide();
      $(this).siblings().find('.next_white').hide().prev().show();
    
      var index = $('.tit_theme').index(this);
      $('.info--contents > section').hide();
      $('.info--contents > section').eq(index).show();
    })
    // plusMember 클릭이벤트
    $('.plusMember').click(function(){
      $('.tit_theme').removeClass('reverse_color');
      $('.theme_enroll').addClass('reverse_color');
      $('.theme_enroll .next_white').show().prev().hide();
    
      $('.info--contents > section').hide();
      $('.contents_enroll').show();
    })
    // 수강권 card 클릭이벤트
    $('.progress_card .contents_info .edit_btn').not('.plusMember').click(function(){
      get_ticket_modify($(this))
    })
    $('.stop_card .contents_info .edit_btn').not('.plusMember').click(function(){
      get_ticket_modify($(this))
    })
    $('.progress_card .contents_info .info_btn').not('.plusMember').click(function(){
      $('#ticket_current_title').text(get_ticket_title($(this)));
      get_list(get_ticket_id($(this)), 1);
    })
    $('.stop_card .contents_info .info_btn').not('.plusMember').click(function(){
      $('#ticket_current_title').text(get_ticket_title($(this)));
      get_list(get_ticket_id($(this)), 1);
    })
    // plusMember 호버이벤트
    $('.plusMember').hover(function(){
      $('.plusMember').css({
        border : '2px dotted #0091ea'
      })
      $('.plus_btn').css('background','#0091ea');
    },function(){
      $('.plusMember').css({
        border : '2px dotted #9b7f7a'
      })
      $('.plus_btn').css('background','#9b7f7a');
    })
    // count_cancel 클릭 이벤트
    $('#count_cancel').click(function(){
      // console.log($(this).find('input').prop('checked'));
      if ($(this).find('input').prop('checked') === true) {
        $('#cancel_option').show();
      } else {
        $('#cancel_option').hide();
      }
      // $('.cancel_option').toggle();
      /* 테이블 show/hide 클릭이벤트 */
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
    $('.enroll_detail .detail_type input[type=checkbox]').click(function(){
      let chk_id = $(this).data('id');
      let checked = $(this).prop('checked');
      if(chk_id === 'c1'){
        if (checked === true) {
          $('#i1').prop('disabled', false);
          $('#i2').prop('disabled', false);
          $('#i3').prop('disabled', true);
          $('#i1').removeClass('bg_grey');
          $('#i2').removeClass('bg_grey');
          $('#i3').addClass('bg_grey');
          $('#c2').prop('checked', false);
        } else {
          $('#i1').prop('disabled', true);
          $('#i2').prop('disabled', true);
          $('#i3').prop('disabled', false);
          $('#i1').addClass('bg_grey');
          $('#i2').addClass('bg_grey');
          $('#i3').removeClass('bg_grey');
          $('#c2').prop('checked', true);
        }
      }
      else {
        if (checked === true) {
          $('#i1').prop('disabled', true);
          $('#i2').prop('disabled', true);
          $('#i3').prop('disabled', false);
          $('#i1').addClass('bg_grey');
          $('#i2').addClass('bg_grey');
          $('#i3').removeClass('bg_grey');
          $('#c1').prop('checked', false);
        } else {
          $('#i1').prop('disabled', false);
          $('#i2').prop('disabled', false);
          $('#i3').prop('disabled', true);
          $('#i1').removeClass('bg_grey');
          $('#i2').removeClass('bg_grey');
          $('#i3').addClass('bg_grey');
          $('#c1').prop('checked', true);
        }
      }
    })
    // 수강권 현황 chk_btn 클릭이벤트
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
      let filter = $('#search_filter').val();
      if (filter === '') {
        alert('검색할 정보를 입력바랍니다.');
        return false;
      }
      get_list(ticket_id, 1, filter);
      $('#loading_set').show();
      setTimeout(function() {
        $("#loading_set").delay(500).fadeOut(500);
        if (ticket_member_total_cnt === 0) {
          if (user_id === 0) {
            alert('회원을 찾을 수 없습니다.');
          } else {
            member_id = 0;
            $('#member_id').text(user_email);
            $('#member_email').val(user_email);
            $('#member_name').val(user_name);
            $('#member_phone').val(user_phone);
            let target = $('#reservable_count');
            if (ticket_type === <?php echo CENTER_TICKET_TYPE_COUNT; ?>) {
              target.val(reservable_count);
              target.prop('disabled', false);
            } else {
              target.val(0);
              target.prop('disabled', true);
            }
            $('#start_datepicker').datepicker('setDate', new Date());
            $('.popup-box').show();
            $('.popup__member').show();
            $('.popup__member .data-box').show();
            $('.popup__member').show();
            $('.popup__member .member--join').show();
            $('.popup__member .member--data').hide();
            $('.popup__member .member-party').css('margin-bottom', '40px');
          }
        }
      }, 500);
    })
    // join_ok 클릭이벤트
    $('.data-box').hide();
    $('.join_ok').click(function(){
      // $('.popup__member .member--data').show();
      $('.popup__member .member--data').slideDown();
      $('.popup__member .member--data button.data-save').show();
      // $('.p').slideDown();
    })
    // data-save 클릭이벤트
    $('.data-save').on('click',function(){
      let url;
      let data = [];
      data['enable_start_at'] = $('#enable_start_at').val();
      data['enable_end_at'] = $('#enable_end_at').val();
      data['reservable_count'] = $('#reservable_count').val();
      if (data['enable_end_at'] < data['enable_start_at']) {
        alert('날짜를 정확히 입력해주세요!')
        return false;
      }
      if (member_id === 0) {
        url = '<?php echo base_url()."center/course/ticket/member/join"; ?>';
        data['ticket_id'] = ticket_id;
        data['user_id'] = user_id;
        send_post_data(data, url, function(res) {
          get_list(ticket_id, 1);
          $('.popup__member .member--data .data-box').hide();
          $('.popup__member').hide();
          $('.popup__alert .guide_alert').text('등록되었습니다!');
          $('.popup__alert').show();
          $('#enroll_member_count_'+ticket_id).text(res.enroll_member_count);
          $('#search_filter').val();
    
          $('#member_id').text('');
          $('#member_email').val('');
          $('#member_name').val('');
          $('#member_phone').val('');
          $('#enable_start_at').val('');
          $('#enable_end_at').val('');
    
          let target = $('#reservable_count');
          target.val('');
          target.prop('disabled', true);
        });
      } else {
        url = '<?php echo base_url()."center/course/ticket/member/modify"; ?>';
        data['member_id'] = member_id;
        send_post(data, url, false, '', function() {
          $('.popup__member .member--data .data-box').hide();
          $('.popup__member').hide();
          $('.popup__alert').show();
          $('#search_filter').val();
  
          $('#member_id').text('');
          $('#member_email').val('');
          $('#member_name').val('');
          $('#member_phone').val('');
          $('#enable_start_at').val('');
          $('#enable_end_at').val('');
  
          let target = $('#reservable_count');
          target.val('');
          target.prop('disabled', true);

          get_list(ticket_id,page,filter);
        });
      }
    })
    // '추가' 버튼 클릭이벤트
    $('.btn_addition').click(function(){
      get_member_ids();
      if (member_ids.length === 0) {
        alert('멤버를 선택해주세요.');
        return false;
      }
      $('.popup-box').show();
      $('.popup__addition').show();
    })
    // '정지' 버튼 클릭이벤트
    $('.btn_stop').click(function(){
      get_member_ids();
      if (member_ids.length === 0) {
        alert('멤버를 선택해주세요.');
        return false;
      }
      $('.popup-box').show();
      $('.popup__stop').show();
      $('.data-box').show();
    })
    // '연장' 버튼 클릭이벤트
    $('.btn_extend').click(function(){
      get_member_ids();
      if (member_ids.length === 0) {
        alert('멤버를 선택해주세요.');
        return false;
      }
      $('.popup-box').show();
      $('.popup__extend').show();
    })
    /* ===== 환불(삭제) 팝업 추가 ===== */
    // '환불' 버튼 클릭시 팝업
    $('.btn_change').click(function(){
      get_member_ids();
      if (member_ids.length === 0) {
        alert('멤버를 선택해주세요.');
        return false;
      }
      $('.popup-box').show();
      $('.popup__change').show();
    })
    /* 결제 기능 없이 안내용으로 쓰일 것이라
       환불 팝업으로 삭제 버튼 클릭시 '환불 처리' -> '삭제' 로 변경 바랍니다. ===== */
    $('.btn_remove').click(function(){
      get_member_ids();
      if (member_ids.length === 0) {
        alert('멤버를 선택해주세요.');
        return false;
      }
      $('.popup-box').show();
      $('.popup__remove').show();
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
    // 연장,정지 팝업창 취소 버튼
    $('.how_no').click(function(){
      $('.popup-box').fadeOut();
      $('.popup-box').children().hide();
    })
    // 추가 팝업창 저장 버튼
    $('.popup__addition .how_ok').click(function(){
      let action_duration = $('#addition_count').val();
      if(action_duration === ""){
        alert('횟수를 입력해주세요!')
        return false;
      }
      action_duration = parseInt(action_duration);
      if(action_duration <= 0){
        alert('횟수를 정확히 입력해주세요!')
        return false;
      }
      let today = '<?php echo date('Y-m-d'); ?>';
      send_action(<?php echo CENTER_TICKET_MEMBER_ACTION_ADDITION; ?>, 'addition', action_duration, today, today);
    })
    // 연장 팝업창 저장 버튼
    $('.popup__extend .how_ok').click(function(){
      let action_duration = $('#extend_duration').val();
      if(action_duration === ""){
        alert('일수를 입력해주세요!')
        return false;
      }
      action_duration = parseInt(action_duration);
      if(action_duration <= 0){
        alert('일수를 정확히 입력해주세요!')
        return false;
      }
      let today = '<?php echo date('Y-m-d'); ?>';
      send_action(<?php echo CENTER_TICKET_MEMBER_ACTION_RENEWAL; ?>, 'extend', action_duration, today, today);
    })
    // 정지 팝업창 저장 버튼
    $('.popup__stop .how_ok').click(function(){
      let stop_start_at = $('#stop_start_at').val();
      let stop_end_at = $('#stop_end_at').val();
      if(stop_start_at === "" || stop_end_at === '') {
        alert('일수를 입력해주세요!')
        return false;
      }
      if (stop_end_at < stop_start_at) {
        alert('날짜를 정확히 입력해주세요!')
        return false;
      }
      send_action(<?php echo CENTER_TICKET_MEMBER_ACTION_STOP; ?>, 'stop', 0, stop_start_at, stop_end_at);
    })
    /* ========== 환불 팝업과 삭제 팝업은 하나의 틀에 텍스트만 변화시켜 쓰기로 했습니다. ========== */
    // 환불 팝업 'ok' 버튼
    $('.popup__change .how_ok').click(function(){
      let today = '<?php echo date('Y-m-d'); ?>';
      send_action(<?php echo CENTER_TICKET_MEMBER_ACTION_REFUND; ?>, 'change', 0, today, today);
    })
    $('.popup__remove .how_ok').click(function(){
      let today = '<?php echo date('Y-m-d'); ?>';
      send_action(<?php echo CENTER_TICKET_MEMBER_ACTION_DELETE; ?>, 'remove', 0, today, today);
    })
    // 수강권 수정 '수정' 버튼 클릭시 팝업 호출
    // $('.btn_rewrite').click(function(){
    //   $('.popup-box').show();
    //   $('div[class*=alert_]').show();
    // })
    // 수강권 수정 '수정' 팝업 닫기
    // $('.confirm_btn button[class^=btn_]').click(function(){
    //   $('div[class*=alert_]').hide();
    //   $('.popup-box').hide();
    // })
    add_menu_active('course');
   
    $('#start_datepicker').datepicker({
      format: "yyyy-mm-dd",
      autoclose: true,
      todayHighlight: true, // 오늘에 하이라이트
      language: "ko",
      title: '수강권 시작일자',
    }).on('changeDate', function(e) {
      let start_date = $(this).datepicker('getDate');
      let end_date = new Date();
      // console.log(e.format());
      // console.log(start_date.getDate() + reservable_duration - 1);
      end_date.setDate(start_date.getDate() + reservable_duration - 1);
      $('#end_datepicker').datepicker('setStartDate', start_date);
      $('#end_datepicker').datepicker('setDate', end_date);
    });
    $('#end_datepicker').datepicker({
      format: "yyyy-mm-dd",
      autoclose: true,
      todayHighlight: true, // 오늘에 하이라이트
      language: "ko",
      title: '수강권 종료일자',
    });
    $('#stop_datepicker1').datepicker({
      format: "yyyy-mm-dd",
      autoclose: true,
      todayHighlight: true, // 오늘에 하이라이트
      language: "ko",
      title: '정지 시작일자',
    }).on('changeDate', function(e) {
      let start_date = $(this).datepicker('getDate');
      // let end_date = new Date();
      $('#stop_datepicker2').datepicker('setStartDate', start_date);
      $('#stop_datepicker2').datepicker('setDate', start_date);
    });
    $('#stop_datepicker2').datepicker({
      format: "yyyy-mm-dd",
      autoclose: true,
      todayHighlight: true, // 오늘에 하이라이트
      language: "ko",
      title: '정지 종료일자',
    });
  });
  function show_ticket_info(ticket, e) {
    if (ticket.hasClass('plusMember')) {
      return false;
    }
    let ticket_id = ticket.find('.card_contents').data('id');
    let target = $('#ticket_hover_'+ticket_id);
    let offset = ticket.offset();
    // 너비값 261px, offset.left 176px
    let w = ticket.width();
    // 높이값 215px, offset.top 166px
    let h = ticket.height();
    let x = offset.left + w;
    let y = offset.top + h;
    // relativeX 261px
    // let relativeX = x - offset.left;
    // relativeY 215px
    // let relativeY = y - offset.top;
    
    let offset_e = $('#edit_btn_' + ticket_id).offset();
    // let ex = offset_e.left + $('.edit_btn').width();
    let ey = offset_e.top + $('#edit_btn_' + ticket_id).height();
  
    // 438px 394px
    // console.log(e.pageX,e.pageY);
    // // 437px 381px
    // // console.log(x,y);
    // console.log(offset.left,offset.top);
    if(e.pageX < x && e.pageX > offset.left && e.pageY < y && e.pageY > offset.top){
      // console.log(e.pageX,offset_e.left);
      // console.log(e.pageY,ey);
      if(e.pageX < offset_e.left || e.pageY > ey){
        $(".ticketHover").hide();
        target.show().css({
          left : e.pageX - offset.left,
          top : e.pageY - offset.top
        });
        target.find('table').show();
        // console.log('show');
      }
      else {
        $(".ticketHover").hide();
        // console.log('hide');
      }
    }
    else {
      $(".ticketHover").hide();
      // console.log('hide2');
    }
  }
  $(function(){
    $('.progress_card').mousemove(function(e){
      show_ticket_info($(this), e);
    });
    $('.stop_card').mousemove(function(e){
      show_ticket_info($(this), e);
    })
  })
</script>
