<section class="boxwrap main">
  <h2 class="boxwrap__type meaning">관리자</h2>
  <section class="boxwrap__info">
    <div class="info--tit">
      <a href="#" class="tit_theme" data-role="unapproved">
        <span class="theme_txt">온라인스튜디오 승인</span>
        <div class="theme_arrow">
          <img src="<?= base_url(); ?>template/back/center/imgs/icon_next.png" width="6" height="auto">
          <img src="<?= base_url(); ?>template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">
        </div>
      </a>
      <a href="#" class="tit_theme" data-role="approval">
        <span class="theme_txt">온라인스튜디오 관리</span>
        <div class="theme_arrow">
          <img src="<?= base_url(); ?>template/back/center/imgs/icon_next.png" width="6" height="auto">
          <img src="<?= base_url(); ?>template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">
        </div>
      </a>
      <a href="#" class="tit_theme" data-role="class">
        <span class="theme_txt">온라인 클래스 관리</span>
        <div class="theme_arrow">
          <img src="<?= base_url(); ?>template/back/center/imgs/icon_next.png" width="6" height="auto">
          <img src="<?= base_url(); ?>template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">
        </div>
      </a>
<!--      <a href="#" class="tit_theme" data-role="reserve">-->
<!--        <span class="theme_txt">온라인 스케줄 예약현황</span>-->
<!--        <div class="theme_arrow">-->
<!--          <img src="--><?//= base_url(); ?><!--template/back/center/imgs/icon_next.png" width="6" height="auto">-->
<!--          <img src="--><?//= base_url(); ?><!--template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">-->
<!--        </div>-->
<!--      </a>-->
    </div>
    <div class="info--contents scroll-y_hidden">
      <section class="contents_type contents_studio scroll-y" id="studio_unapproved">
      </section>
      <section class="contents_type contents_studio scroll-y" id="studio_approval">
      </section>
      <section class="contents_type contents_master scroll-y" id="studio_class">
      </section>
      <!-- 온라인 스케줄 예약현황 -->
      <section class="contents_type contents_schedule scroll-y" id="studio_reserve">
      </section>
    </div>
  </section>
  <div class="boxwrap__pop pop:box">
    <!-- 클래스 그룹 추가 팝업 -->
    <div class="pop:type pop:frame pop:quest pop-plus">
      <div class="popup_cnt">
        <div class="guide_box confirm_box" style="padding-top: 36px; margin-bottom: 16px;">
          <img src="<?= base_url(); ?>template/back/center/imgs/information_mark.png" alt="" width="40" height="40" class="guide_icon">
          <p class="confirm_message" style="line-height: 40px">클래스 그룹을 <strong>추가</strong>하시겠습니까?</p>
        </div>
        <p class="confirm_message message-tip" style="line-height: 1.75;width: 250px;font-size: 13px;margin: 0 auto;color: #9e9e9e;">온라인 클래스 그룹은 최대 5개 까지 추가할 수 있습니다.</p>
        <div class="confirm_btn">
          <button class="btn_cancel font-futura confirm_cancel create_cancel">CANCEL</button>
          <button class="btn_ok font-futura confirm_ok create_ok">OK</button>
        </div>
      </div>
    </div>
    <!-- 클래스 그룹 삭제 팝업 -->
    <div class="pop:type pop:frame pop:quest pop-delete">
      <div class="popup_cnt">
        <div class="guide_box confirm_box" style="padding-top: 36px; margin-bottom: 16px;">
          <img src="<?= base_url(); ?>template/back/center/imgs/exclamation_mark.png" alt="" width="40" height="40" class="guide_icon">
          <p class="confirm_message" style="line-height: 40px">해당 그룹을 <strong>삭제</strong>하시겠습니까?</p>
        </div>
        <p class="confirm_message message-tip" style="line-height: 1.75;width: 250px;font-size: 13px;margin: 0 auto;color: #9e9e9e;">현재 클래스 예약/대기를 포함해서 지난 클래스 참석이 취소될 수 있습니다!</p>
        <div class="confirm_btn">
          <button class="btn_cancel font-futura" onclick="close_schedule_remove_popup()">CANCEL</button>
          <button class="btn_ok font-futura" onclick="unregister_schedule()">OK</button>
        </div>
      </div>
    </div>
    <!-- 신청,승인,반려 셀렉트 팝업 -->
    <div class="pop:type pop:frame frame:blog frame:choice">
      <button class="frame_close">
        <img src="<?= base_url(); ?>template/back/center/imgs/icon_close_black.png" alt="" width="12" height="12" style="opacity: 0.5;">
      </button>
      <div class="frame_cnt">
        <div class="frame_type clearfix">
          <p class="frame_tit choice-tit">상태변경</p>
          <div class="choice-box">
            <!-- 결과값 -->
            <div class="choice__result">
              <input type="button" value="신청" class="result--val result--data">
              <span class="result--arrow file_arrow"></span>
            </div>
            <!-- 선택 : 신청,승인,반려 -->
            <div class="choice__cnt choice__info" style="display: none;">
              <span class="file_arrow cnt_arrow"></span>
              <div class="cnt--button">
                <input type="button" value="신청" class="box--btn box--val">
                <input type="button" value="승인" class="box--btn box--val">
                <input type="button" value="반려" class="box--btn box--val">
              </div>
            </div>
            <script>
              // result--data 클릭
              $('.result--data').click(function(){
                $('.choice__info').show();
                let enroll = $(this).val().indexOf("신청");
                let approve = $(this).val().indexOf("승인");
                let reject = $(this).val().indexOf("반려");
                
                if(enroll !== -1){
                  $('.choice__info').css('top','0');
                  $(this).parent().next().find('.cnt_arrow').css('top','12px');
                }
                else if(approve !== -1){
                  $('.choice__info').css('top','-36px');
                  $(this).parent().next().find('.cnt_arrow').css('top','48px');
                }
                else if(reject !== -1){
                  $('.choice__info').css('top','-72px');
                  $(this).parent().next().find('.cnt_arrow').css('top','84px');
                }
              })
              // box--val 클릭
              $('.box--val').click(function(){
                let option = $(this).val();
                $(this).closest('.choice__info').hide().prev().find('.result--data').val(option);
              })
            
            </script>
          </div>
        </div>
      </div>
      <div class="cnt_btns confirm_btn">
        <button class="btn_cancel font-futura">CANCEL</button>
        <button class="btn_ok btn_save font-futura">SAVE</button>
      </div>
    </div>
    <!-- 그룹 추가 확인 팝업 -->
    <div class="pop:type pop:frame frame:blog frame:choice frame:group">
      <button class="frame_close">
        <img src="<?= base_url(); ?>template/back/center/imgs/icon_close_black.png" alt="" width="12" height="12" style="opacity: 0.5;">
      </button>
      <div class="frame_cnt">
        <div class="frame_type clearfix">
          <p class="frame_tit choice-tit">수업추가</p>
          <div class="choice-box">
            <!-- 결과값 -->
            <div class="choice__result">
<!--              <input type="button" value="온라인 클래스 그룹 1" class="result--val group--val">-->
              <span class="result--arrow file_arrow"></span>
              <select class="result--val group--val result-type-slct" id="classGroupSelect">
              </select>
            </div>
            <!-- 선택 : 신청,승인,반려 -->
            <!-- <div class="choice__cnt choice__group" style="display: none;">
              <input type="button" value="" class="box--btn boxes--btn">
              <input type="button" value="" class="box--btn boxes--btn">
              <input type="button" value="" class="box--btn boxes--btn">
              <input type="button" value="" class="box--btn boxes--btn">
            </div> -->
          </div>
        </div>
      </div>
      <div class="cnt_btns confirm_btn">
        <button class="btn_cancel font-futura">CANCEL</button>
        <button class="btn_ok push_tr_td font-futura confirmOk" onclick="addClass();">OK</button>
      </div>
    </div>
    <!-- 상태변경,삭제 클릭 팝업 -->
    <div class="pop:frame frame:question" id="approval_popup">
    </div>
    <!-- 스튜디오 프로필 팝업 -->
    <div class="pop:type pop:frame frame:studio" id="approval_profile">
    </div>
    <!-- 스튜디오 예약현황 팝업 -->
    <div class="popup theme:alert_situation pop:situation sch_status scroll-y" id="schedule_status" style="width: 862px !important; margin-left: -431px !important;">
      <p class="situation_tit">예약 현황</p>
      <button class="situation_close" onclick="fn_close();">
        <img src="<?= base_url(); ?>template/front/header/imgs/icon_close_black.png" width="12" height="12" alt="닫기" style="opacity: 0.2;">
        <!-- popup_box, pop:history 닫기 -->
        <script>
          function fn_close() {
            $('.boxwrap__pop').hide().children('.sch_status').hide();
          }
        </script>
      </button>
      <div class="situation_detail" id="schedule_status_detail"><div class="detail_table table_main situation_table" style="padding-bottom: 8px;">
          <table class="table_head">
            <colgroup>
              <col width="10%">
              <col width="6%">
              <col width="16%">
              <col width="12%">
              <col width="10%">
              <col width="11%">
              <col width="10%">
              <col width="10%">
              <col width="15%">
            </colgroup>
            <thead>
            <tr>
              <th>티켓팅 일시</th>
              <th>이름</th>
              <th>아이디</th>
              <th>전화번호</th>
              <th>결제자정보</th>
              <th>상태</th>
              <th>확정</th>
              <th>취소</th>
              <th>수업링크발송</th>
            </tr>
            </thead>
          </table>
          <div class="table_body_wrap">
            <div class="table_body main_case scroll-y" id="ticket_member_list" style="border: 1px solid #EAEAEA;">
              <table class="table-list" style="display: table;">
                <colgroup>
                  <col width="10%">
                  <col width="6%">
                  <col width="16%">
                  <col width="12%">
                  <col width="10%">
                  <col width="11%">
                  <col width="10%">
                  <col width="10%">
                  <col width="15%">
                </colgroup>
                <tbody>
                <!-- tr x 10개 -->
                <tr>
                  <td>2021.03.17 16:33:52</td>
                  <td>김평호</td>
                  <td>apple09470@naver.com</td>
                  <td>01099819804</td>
                  <td>김평호</td>
                  <td class="data_txt">
                    <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                    <!-- 상태 -->
                    <span class="receive wait">입금대기</span>
                  </td>
                  <td class="data_formset">
                    <button class="td_send" data-id="60">
                      <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                      <!-- 버튼 폼 -->
                      <span class="send shadow"></span>
                    </button>
                  </td>
                  <td>
                    <button class="td_perforce" data-id="60">
                      <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                      <!-- 버튼 폼 -->
                      <span class="perforce shadow"></span>
                    </button>
                  </td>
                  <td>
                    <button class="send_link" onclick="send_link(303, 60)">발송</button>
                  </td>
                </tr>
                <tr>
                  <td>2021.03.17 16:33:52</td>
                  <td>김평호</td>
                  <td>apple09470@naver.com</td>
                  <td>01099819804</td>
                  <td>김평호</td>
                  <td class="data_txt">
                    <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                    <!-- 상태 -->
                    <span class="receive wait">입금대기</span>
                  </td>
                  <td class="data_formset">
                    <button class="td_send" data-id="60">
                      <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                      <!-- 버튼 폼 -->
                      <span class="send shadow"></span>
                    </button>
                  </td>
                  <td>
                    <button class="td_perforce" data-id="60">
                      <!-- 확정X -> 입금 요청 / 확정O -> 티켓팅 확정   -->
                      <!-- 버튼 폼 -->
                      <span class="perforce shadow"></span>
                    </button>
                  </td>
                  <td>
                    <button class="send_link" onclick="send_link(303, 60)">발송</button>
                  </td>
                </tr>
                </tbody>
              </table>
              <style>
                .receive.reserve {
                  color: #0091ea;
                }
                .receive.wait {
                  color: #9e9e9e;
                }
                .receive.cancel{
                  color: #ff6633;
                }
                .send, .perforce {
                  left: 3px;
                }
                .send.active, .perforce.active {
                  left: 35px;
                }
                .send, .perforce {
                  -webkit-transition: all 0.5s ease;
                  -moz-transition: all 0.5s ease;
                  -o-transition: all 0.5s ease;
                  transition: all 0.5s ease;
                }
                #stu .red_sign {
                  background-color: #ff6633;
                }
              </style>
              <script>
                // 입금 요청, 티켓팅 확정 클릭이벤트
                let RESERVE_STR = '티켓팅확정';
                let WAIT_STR = '입금대기';
                let CANCEL_STR = '티켓팅취소';
                
                function set_reserve(target) {
                  target.removeClass('wait');
                  target.removeClass('cancel');
                  target.addClass('reserve');
                  target.text(RESERVE_STR);
                }
                function set_wait(target) {
                  target.removeClass('reserve');
                  target.removeClass('cancel');
                  target.addClass('wait');
                  target.text(WAIT_STR);
                }
                function set_cancel(target) {
                  target.removeClass('reserve');
                  target.removeClass('cancel');
                  target.addClass('cancel');
                  target.text(CANCEL_STR);
                }
                
                function set_reserve_active(target) {
                  let active = target.hasClass('ok_sign');
                  let receive_target = target.parent().prev().find('.receive');
                  // console.log(active);
                  if (active === true) {
                    target.removeClass('ok_sign');
                    target.find('.send').removeClass('active');
                    target.parent().next().find('.td_perforce').removeClass('red_sign');
                    target.parent().next().find('.perforce').removeClass('active');
                    set_wait(receive_target);
                  } else {
                    target.addClass('ok_sign');
                    target.find('.send').addClass('active');
                    target.parent().next().find('.td_perforce').removeClass('red_sign');
                    target.parent().next().find('.perforce').removeClass('active');
                    set_reserve(receive_target);
                  }
                }
                
                function set_cancel_active(target) {
                  let active = target.hasClass('red_sign');
                  let receive_target = target.parent().prev().prev().find('.receive');
                  // console.log(active);
                  if (active === true) {
                    target.removeClass('red_sign');
                    target.find('.perforce').removeClass('active');
                    target.parent().prev().find('.send').removeClass('active');
                    target.parent().prev().find('.td_send').removeClass('ok_sign');
                    set_wait(receive_target);
                  } else {
                    target.addClass('red_sign');
                    target.find('.perforce').addClass('active');
                    target.parent().prev().find('.send').removeClass('active');
                    target.parent().prev().find('.td_send').removeClass('ok_sign');
                    set_cancel(receive_target);
                  }
                }
                
                $(function(){
                  $('.td_send').click(function(e) {
                    let target = $(this);
                    let url = '<?= base_url(); ?>studio/schedule/status/update';
                    let rid = target.data('id');
                    let status = 0;
                    let data = [];
                    
                    if (target.hasClass('ok_sign')) {
                      status = 2;
                    } else {
                      status = 1;
                    }
                    
                    data['rid'] = rid;
                    data['status'] = status;
                    
                    // console.log(data);
                    
                    send_post_data(data, url, function() {
                      set_reserve_active(target);
                    });
                  });
                  
                  $('.td_perforce').click(function(e) {
                    let target = $(this);
                    let url = '<?= base_url(); ?>studio/schedule/status/update';
                    let rid = target.data('id');
                    let status = 0;
                    let data = [];
                    
                    if (target.hasClass('red_sign')) {
                      status = 2;
                    } else {
                      status = 3;
                    }
                    
                    data['rid'] = rid;
                    data['status'] = status;
                    
                    // console.log(data);
                    
                    send_post_data(data, url, function() {
                      set_cancel_active(target);
                    });
                  });
                  
                })
              </script>
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
        <div class="detail_zoom" id="zoom">
          <p class="zoom_tit">수업 링크 등록</p>
          <div class="zoom_cnt">
            <div class="cnt_url clearfix">
              <div class="url_box">
                <input type="url" placeholder="zoom 회의 링크를 입력해 주세요" class="url_write" id="class_link">
              </div>
              <button class="url_enroll" onclick="set_class_link(303)">등록</button>
            </div>
            <div class="cnt_sendTime">
              <div class="sendTime_sendChk clearfix">
                <p class="sendChk_tit">링크 자동 발송 시간 설정</p>
                <div class="sendChk_chks">
                  <label class="chk_style style_start">
                    <input type="checkbox" class="chk_start">
                    수업 시작
                    <input value="0" type="text" class="chk_data" id="send_link_hour"> 시간 전
                  </label>
                  <label class="chk_style style_immediate gray_txt">
                    <input type="checkbox" class="chk_immediate" id="send_link_immediate">
                    링크 등록 즉시 발송
                  </label>
                </div>
              </div>
              <div class="sendTime_sendIdentity clearfix">
                <p class="sendChk_tit">ZOOM 회의 ID / 비밀번호</p>
                <div class="sendChk_chks">
                                  <span class="start_time zoom_form" name="zoom-id" style="width: 100%;">
                                    <input id="class_id" type="text" class="form_time" placeholder="id" value="">
                                  </span>
                  <span class="start_time zoom_form" name="zoom-pw" style="width: 100%;">
                                    <input id="class_pw" type="text" class="form_time" placeholder="pw" value="">
                                  </span>
                </div>
              </div>
              <!-- 수업 전 안내 카톡 -->
              <div class="detail_guideTalk" id="guideTalk">
                <p class="guideTalk_tit">수업 전 안내 카톡</p>
                <div class="guideTalk_conts">
                  <div class="conts__txtBox">
                    <div class="txtBox-territory">
                      <div class="txtBox--area">
                        <div class="area_letterBox">
                          <p class="area_letterCount">남은 글자 수
                            <span class="letter_remain">
                                                              <strong class="remain_number">1000</strong>자
                                                          </span>
                          </p>
                        </div>
                        <form class="area_letterForm">
                          <textarea class="area_letterZone" id="letterZone1" placeholder="1,000자 이내"></textarea>
                        </form>
                      </div>
                    </div>
                    <div class="textBox--timer clearfix">
                      <label class="chk_next immediate_kaTalk">
                        <input checked="checked" type="checkbox" id="send_talk_since1"> 다음에도 사용하기
                      </label>
                    </div>
                  </div>
                  <script>
                    $('#send_talk_since1').click(function(){
                      let chk = $(this).prop('checked');
                      if(chk === true) {
                        $(this).parent().removeClass('gray_txt');
                      }
                      else {
                        $(this).parent().addClass('gray_txt');
                      }
                    })
                    $('#guideTalk .area_letterZone').on('keyup',function(){
                      let input = $(this).val().length;
                      let left = 1000 - input;
                      $('#guideTalk .remain_number').text(left);
          
                      if($(this).val().length > 1000) {
                        alert("글자수는 1,000자 이내로 제한됩니다.");
                        $(this).val($(this).val().substring(0,1000));
                        $('#guideTalk .remain_number').text(0);
                        // left = 0;
                      }
                    })
                  </script>
                </div>
              </div>
              <p class="sendTime_message">*수업 링크는 티켓팅 확정된 회원들에게 카카오 알림톡으로 발송됩니다.</p>
            </div>
          </div>
        </div>
        <script>
          $(function(){
            $('.chk_start').click(function(){
              let chk_data = $('.chk_start').prop('checked');
              
              // console.log(chk_data);
              
              if(chk_data === true){
                $('.chk_start').prop('checked',true);
                $('.chk_data').attr('disabled',false)
                  .removeClass('gray_bg');
                $('.chk_immediate').prop('checked',false);
                $('.style_immediate').addClass('gray_txt');
                $('.style_start').removeClass('gray_txt');
              }
              else {
                $('.chk_start').prop('checked',false);
                $('.chk_data').attr('disabled',true)
                  .addClass('gray_bg');
                $('.chk_immediate').prop('checked',true);
                $('.style_immediate').removeClass('gray_txt');
                $('.style_start').addClass('gray_txt');
              }
            });
            $('.chk_immediate').click(function(){
              let chk_data2 = $('.chk_immediate').prop('checked');
              
              // console.log(chk_data2);
              
              if(chk_data2 === true){
                $('.chk_immediate').prop('checked',true);
                $('.chk_data').attr('disabled',true)
                  .addClass('gray_bg');
                $('.chk_start').prop('checked',false);
                $('.style_start').addClass('gray_txt');
                $('.style_immediate').removeClass('gray_txt');
              }
              else {
                $('.chk_immediate').prop('checked',false);
                $('.chk_data').attr('disabled',false)
                  .removeClass('gray_bg');
                $('.chk_start').prop('checked',true);
                $('.style_start').removeClass('gray_txt');
                $('.style_immediate').addClass('gray_txt');
              }
            });
            $('.chk_start').click();
          });
        </script>
      </div>
    </div>
    <!-- 스튜디오 스케줄 수정 팝업 -->
    <div class="popup theme:schedule scroll-y" id="popScheduleRewrite">
      <div class="popup_cnt">
        <div class="type_box sch_register shadow">
          <p class="type_tit sch_tit">스케줄 수정</p>
          <!-- <button class="sch_btn btn_save">저장</button> -->
          <dl class="type_detail sch_enroll clearfix">
            <dt class="area_tit">시간</dt>
            <dd class="area_data">
              <div class="data_box clearfix">
                <div class="data_function">
                  <div class="container">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <div class="input-group date datetimepicker3" id="start_time2">
                            <input type="text" class="form-control" value="07:00 PM">
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                          </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <span class="data_hyphen">-</span>
                <div class="data_function">
                  <div class="container">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <div class="input-group date datetimepicker3" id="end_time2">
                            <input type="text" class="form-control" value="09:00 PM">
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                          </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </dd>
            <dt class="area_tit">강사</dt>
            <dd class="area_data" style="margin-bottom: 24px;">
              <div class="data_box">
                <div class="teacher_select clearfix" id="teach2">
                  <div class="selbox-wrap">
                    <input type="text" id="selboxDirect2" value="김평호" style="padding: 0 10px; width: 100%; height: inherit;">
                  </div>
                  <div class="selbox-name">
                    <p>수업명</p>
                    <input type="text" value="테스트 7/12_1" class="name_form" id="schedule_title2">
                  </div>
                </div>
              </div>
            </dd>
            <dt class="area_tit">클래스 분류</dt>
            <dd class="area_data class_data" style="height: 336px">
              <p class="data_limit" style="line-height: 34px;">클래스 분류는 최대 3개 까지 선택 가능합니다. 기타 카테고리를 여러개 등록시 공백(스페이스)로 구분해 주세요.</p>
              <div class="data_box" style="height: inherit;">
                <div class="stu_yoga" id="stu_yoga" style="margin-bottom: 16px; height: 196px;">
                  <div class="class_chkbox">
                    <p class="tit_sm class_name">요가 클래스</p>
                    <div class="chkbox_line clearfix">
                      <label class="form-chk col_sp ">
                        <input name="category_yoga" type="checkbox" value="CP" id="19">
                        CP                </label>
                      <label class="form-chk col_sp clip">
                        <input name="category_yoga" type="checkbox" value="레스토레이티브" id="7">
                        레스토레이티브                </label>
                      <label class="form-chk col_sp clip">
                        <input name="category_yoga" type="checkbox" value="리프레쉬릴렉스" id="6">
                        리프레쉬릴렉스                </label>
                      <label class="form-chk col_sp ">
                        <input name="category_yoga" type="checkbox" value="마이링" id="9">
                        마이링                </label>
                      <label class="form-chk col_sp ">
                        <input name="category_yoga" type="checkbox" value="마이솔" id="4">
                        마이솔                </label>
                    </div>
                    <div class="chkbox_line clearfix">
                      <label class="form-chk col_sp ">
                        <input name="category_yoga" type="checkbox" value="명상" id="13">
                        명상                </label>
                      <label class="form-chk col_sp ">
                        <input name="category_yoga" type="checkbox" value="비트" id="21">
                        비트                </label>
                      <label class="form-chk col_sp ">
                        <input name="category_yoga" type="checkbox" value="빈야사" id="1">
                        빈야사                </label>
                      <label class="form-chk col_sp clip">
                        <input name="category_yoga" type="checkbox" value="소마요가" id="8">
                        소마요가                </label>
                      <label class="form-chk col_sp clip">
                        <input name="category_yoga" type="checkbox" value="시바난다" id="17">
                        시바난다                </label>
                    </div>
                    <div class="chkbox_line clearfix">
                      <label class="form-chk col_sp ">
                        <input name="category_yoga" type="checkbox" value="아로마" id="22">
                        아로마                </label>
                      <label class="form-chk col_sp clip">
                        <input name="category_yoga" type="checkbox" value="아쉬탕가" id="2">
                        아쉬탕가                </label>
                      <label class="form-chk col_sp ">
                        <input name="category_yoga" type="checkbox" value="아헹가" id="18">
                        아헹가                </label>
                      <label class="form-chk col_sp clip">
                        <input name="category_yoga" type="checkbox" value="인사이드 플로우" id="16">
                        인사이드 플로우                </label>
                      <label class="form-chk col_sp ">
                        <input name="category_yoga" type="checkbox" value="인요가" id="5">
                        인요가                </label>
                    </div>
                    <div class="chkbox_line clearfix">
                      <label class="form-chk col_sp ">
                        <input name="category_yoga" type="checkbox" value="테라피" id="11">
                        테라피                </label>
                      <label class="form-chk col_sp ">
                        <input name="category_yoga" type="checkbox" value="플라잉" id="10">
                        플라잉                </label>
                      <label class="form-chk col_sp ">
                        <input name="category_yoga" type="checkbox" value="하타" id="3" checked="">
                        하타                </label>
                      <label class="form-chk col_sp ">
                        <input name="category_yoga" type="checkbox" value="핫요가" id="20">
                        핫요가                </label>
                      <label class="form-chk col_sp ">
                        <input name="category_yoga" type="checkbox" value="힐링" id="12">
                        힐링                </label>
                    </div>
                    <div class="chkbox_line clearfix">
                      <label class="form-chk col_sp" id="chk_other2">
                        <input id="chkbox_yoga_etc2" type="checkbox" name="number">
                        기타
                        <span class="write_padding">
                        <input type="text" class="chk_write" id="category_yoga_etc2" name="category_yoga_etc" value="">
                      </span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="stu_pilates" id="stu_pilates">
                  <p class="tit_sm">필라테스 클래스</p>
                  <div class="class_chkbox">
                    <div class="chkbox_line clearfix">
                      <label class="form-chk col_sp ">
                        <input name="category_pilates" type="checkbox" value="기구" id="25">
                        기구                </label>
                      <label class="form-chk col_sp ">
                        <input name="category_pilates" type="checkbox" value="매트" id="23">
                        매트                </label>
                      <label class="form-chk col_sp ">
                        <input name="category_pilates" type="checkbox" value="소도구" id="24">
                        소도구                </label>
                      <label class="form-chk col_sp" id="chk_other3">
                        <input id="chkbox_pilates_etc2" type="checkbox" name="number">
                        기타
                        <span class="write_padding">
                        <input type="text" class="chk_write" id="category_pilates_etc2" name="category_pilates_etc" value="">
                      </span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </dd>
            <dt class="area_tit" style="line-height: 1.5; margin: 1px 0 0;">티켓팅 기능</dt>
            <dd class="area_data" style="margin-bottom: 24px;">
              <div class="data_box">
                <div class="go_ticket clearfix">
                  <label class="ticket-chk form-chk">
                    <input checked="" type="checkbox" id="ticketing2" name="number" disabled="">
                    티켓팅 기능 사용
                  </label>
                  <div class="ticket-option2">
                    <div class="option__account clearfix">
                      <label class="accountLabel2">
                        <input type="checkbox" id="accountChk2"> 입금계좌
                      </label>
                      <div class="ticket-send" id="send2" style="display: none;">
                        <div class="sendInfo-account">
                          <p class="send-txt account-txt">무통장입금 입금은행</p>
                          <div class="account-how">
                            <p class="how_wrap clearfix">
                            <span class="how_bank">
                              <input type="text" value="" style="width: 76px; margin-right: 8px;" id="bank_name2">은행
                            </span>
                              <span class="how_account">
                              <input type="text" value="" placeholder="계좌번호" id="bank_account_number2">
                            </span>
                              <span class="how_holder">
                              <input type="text" value="" placeholder="예금주명" id="bank_depositor2">
                            </span>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="option__pay clearfix">
                      <label class="urlLabel2 gray_txt">
                        <input checked="" type="checkbox" id="urlChk2"> 결제 URL
                      </label>
                      <p class="payGuide">현재 온라인 수업 결제를 별도 진행하는 곳 (N사 페이, P사 페이)이 있다면 사용가능합니다.</p>
                      <div class="pay--url" id="url2" style="display: block;">
                        <input type="text" class="form_time" value="https://nid.naver.com/nidlogin.login?svctype=1&amp;url=https%3A%2F%2Forder.pay.naver.com%2Fhome" id="payment_page2" style="width: 100%;">
                      </div>
                    </div>
                    <div class="sendinfo-poptxt" id="popSch2" style="margin-top: 20px;">
                      <p class="send-txt announce-txt">티켓팅 시 팝업 상세 문구</p>
                      <form class="addinfo_textbox" id="addinfo_textbox_2" style="display: none;">
                        <div class="remain_textarea">
                          <p>남은 글자 수 <span class="remain_text"><strong class="remain_val" id="remain_val_2">78</strong>자</span></p>
                        </div>
                        <textarea class="about_textarea2" id="reserve_popup2" placeholder="'예약 후 00시간 이내 미입금 시 예약 취소됩니다' 혹은 '입금 순서대로 예약 확정 마감됩니다' 등 온라인 스튜디오의 예약 마감 및 정원에 대한 문구를 간단히 기재해주세요! (최대 100자)">티켓팅 확정 후 예약 취소는 불가합니다.</textarea>
                      </form>
                      <div class="choice__wrap" style="border-top: 1px solid #eee;">
                        <div class="choice">
                          <select class="choice--slc slcNo2">
                            <option selected="" value="qna--1">티켓팅 확정 후 예약 취소는 불가합니다.</option>
                            <option value="qna--2">티켓팅 후 4시간 이내 미입금 시 예약이 취소됩니다.</option>
                            <option value="qna--3">다회권을 가지셨다면, 중복결제 하지 않게 주의해 주세요.</option>
                            <option value="qna--direct2" class="qna--write">직접입력</option>
                          </select>
                          <!--                    <input type="text" placeholder="티켓팅 시 팝업 상세 문구를 직접 입력해주세요" class="choice--write writebox2" style="display: none;">-->
                          <script>
                            $(function(){
                              // alert('준비되었습니다!');
                              $('.slcNo2').change(function(){
                                let state = $('.slcNo2 option:selected').val();
                                // console.log(state);
                                // alert('sss');
                                if(state === 'qna--direct2'){
                                  // alert('성공');
                                  $('#remain_val_2').text('100');
                                  $('#reserve_popup2').val('');
                                  $('#addinfo_textbox_2').show();
                                }
                                else {
                                  $('#reserve_popup2').val($('.slcNo2 option:selected').text());
                                  $('#addinfo_textbox_2').hide();
                                }
                              })
                              $('.about_textarea2').on('keyup',function(){
                                var input = $(this).val().length;
                                var left = 100 - input;
                                $('#remain_val_2').text(left);
                              
                                if($(this).val().length > 100) {
                                  alert("글자수는 100자 이내로 제한됩니다.");
                                  $(this).val($(this).val().substring(0,100));
                                  $('#remain_val_2').text(0);
                                  // left = 0;
                                }
                              })
                            })
                          </script>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </dd>
            <dt class="centerBook2 area_tit" style="line-height: 1.5; margin: 8px 0px 0px; word-break: keep-all;">수업료</dt>
            <dd class="centerBook2 area_data clearfix" style="">
              <div class="data_box">
                <div class="clearfix">
                  <div class="timewrap personnel" id="tuition2">
                    <p>
                    <span class="start_time" style="margin-left: 0; width: 160px;">
                      <input type="number" class="form_time" value="1000" id="class_price2">
                    </span>
                      원
                    </p>
                  </div>
                </div>
              </div>
            </dd>
            <dt class="centerBook2 area_tit" style="line-height: 1.5; margin: 1px 0 0; margin-top: 8px; word-break: keep-all; display: block;">티켓팅 가능시간</dt>
            <dd class="centerBook2 area_data clearfix" style="display: block;">
              <!-- 태그 클래스 추가 -->
              <div class="data_box">
                <!-- 스케줄 등록 즉시 티켓팅 오픈 -->
                <div id="online_schedule2" class="clearfix">
                  <label class="wait_chk form-chk ready-chk" id="ready-soon2">
                    <input type="checkbox" id="open-immediateA" data-role="immediate" name="number">
                    스케줄 등록 즉시 티켓팅 오픈
                  </label>
                  <div class="timebox_a a1boxT clearfix">
                    <div class="timewrap">
                      <p>예약 마감 시간 : 수업
                        <span class="start_time">
                        <input type="number" min="0" max="12" class="form_time" id="reserve_close_hour_00" value="0">
                      </span>
                        시간 전까지
                      </p>
                    </div>
                  </div>
                </div>
                <!-- 티켓팅 시간 설정 -->
                <div id="online_time2" class="clearfix">
                  <label class="wait_chk form-chk ready-chk gray_txt" id="ready-time2">
                    <input type="checkbox" id="open-immediateB" data-role="immediate" name="number">
                    티켓팅 시간 설정
                  </label>
                  <div class="timebox_a a2boxT clearfix" style="display: none;">
                    <div class="timewrap">
                      <p class="time_sp">예약 시작 시간 : 수업
                        <span class="start_time">
                        <input type="number" min="0" max="30" class="form_time" id="reserve_open_day_11" value="7">
                      </span>일
                        <span class="start_time">
                        <input type="number" min="0" max="23" class="form_time" id="reserve_open_hour_11" value="6">
                      </span>시간 전까지
                      </p>
                      <p>예약 마감 시간 : 수업
                        <span class="start_time">
                        <input type="number" min="0" max="48" class="form_time" id="reserve_close_hour_11" value="12">
                      </span>시간 전까지
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </dd>
            <dt class="centerBook2 area_tit" style="line-height: 1.5; margin: 0; word-break: keep-all;">티켓팅 확정인원
              <span class="txtGuide">최대 수업 정원</span>
            </dt>
            <dd class="centerBook2 area_data clearfix">
              <!-- 태그 클래스 추가 -->
              <div class="data_box">
                <!-- 티켓팅 확정 인원 -->
                <div id="online_personnel2" class="clearfix">
                  <div class="timewrap personnel" id="personnel2">
                    <p>
                    <span class="start_time" style="margin-left: 0; width: 160px;">
                      <input type="number" class="form_time" id="reservable_number2" value="1" style="width: 100%;">
                    </span>
                      명
                    </p>
                  </div>
                </div>
              </div>
            </dd>
            <dt class="centerBook2 area_tit" style="line-height: 1.5; margin: 0; word-break: keep-all; letter-spacing: -0.03em;">입금 요청 최대 인원
              <span class="txtGuide">수업신청 가능한 최대 인원</span>
            </dt>
            <dd class="centerBook2 area_data clearfix">
              <!-- 태그 클래스 추가 -->
              <div class="data_box">
                <!-- 입금 요청 최대 인원 -->
                <div id="online_maxPersonnel2" class="clearfix">
                  <div class="timewrap personnel" id="maxPersonnel2">
                    <p>
                    <span class="start_time" style="margin-left: 0; width: 160px;">
                      <input type="number" class="form_time" id="waitable_number2" value="1" style="width: 100%;">
                    </span>
                      명
                    </p>
                  </div>
                </div>
              </div>
            </dd>
            <dt class="centerBook2 area_tit stu_name">수업 이미지 등록</dt>
            <dd class="centerBook2 area_data name_data add_photo add_photo2 photo_class" style="width: 800px;">
              <p class="data_limit img_guide">권장 이미지 사이즈는 1000 * 500 px, 이미지 용량은 최대 16MB까지 업로드 가능합니다.
                <br>노출되는 위치에 따라 이미지가 잘려 보일 수 있으므로 인물이 중앙에 위치한 사진을 추천드립니다.</p>
              <span class="img_guideTip">세로형 이미지는 이미지가 많이 잘리게 되어 가로형 이미지 혹은 정사각형 이미지를 올려주세요!</span>
              <label type="file" class="data_form file_form" style="min-width: 410px;">파일열기
                <span class="file_alert" style="color: #bdbdbd;">(사진 추가를 하지 않으면 온라인 스튜디오 메인이미지로 반영됩니다.)</span>
                <span class="file_arrow file_arrow2" style="transform: rotate(45deg);"></span>
                <input type="file" value="파일열기" id="imgInp2" onchange="profile_image_preview2(this);">
                <script>
                  function preview_img(input, target) {
                    if (input.files && input.files[0]) {
                      $("#" + target).html('');
                      $(input.files).each(function () {
                        var reader = new FileReader();
                        reader.readAsDataURL(this);
                        reader.onload = function (e) {
                          $("#" + target).append("<img class='thumb_img' alt='' src='" + e.target.result + "'>");
                        }
                      });
                      $('#' + target).show();
                    }
                  }
                  function profile_image_preview2(target) {
                    preview_img(target, 'previewImg2');
                    target = $('#use_teacher_image2');
                    if (target.prop('checked') === true) {
                      target.click();
                    }
                  }
                  $(function(){
                    // file_arrow 호버 이벤트
                    $('.add_photo2').hover(function(){
                      $(this).find('.file_arrow2').css('transform','rotate(225deg)')
                        .addClass('arrow_hover');
                    },function(){
                      $(this).find('.file_arrow2').css('transform','rotate(45deg)')
                        .removeClass('arrow_hover');
                    });
                  
                    // 강사 기본 이미지 사용 클릭시
                    $('#use_teacher_image2').click(function(){
                      let checked = $(this).prop('checked');
                      if(checked === true){
                        $('.file_thumb2').hide();
                      } else {
                        $('.file_thumb2').show();
                      }
                    })
                  })
                </script>
              </label>
              <div class="file_thumb file_thumb2" id="previewImg2" style="display: none;">
                <img src="" alt="" class="thumb_img thumb_img2" style="display: none;">
              </div>
              <label class="form-chk col_sp form_teacher_image" style="width: 100%; margin-top: 20px;">
                <input checked="" name="use_teacher_image" id="use_teacher_image2" type="checkbox">
                강사 기본 이미지 사용
              </label>
            </dd>
          </dl>
        </div>
        <div class="btn_wrap">
          <button class="btn_save2 theme:fn_save" id="rewrite_yes">저장</button>
          <button class="btn_cancel2 theme:fn_cancel" id="rewrite_no" style="margin: 0;">취소</button>
          <script>
            $(function(){
              $('#rewrite_no').click(function(){
                $('.boxwrap__pop').hide().children('#popScheduleRewrite').hide();
              })
              $('#rewrite_yes').click(function(){
                $('#popScheduleEdit').show();
              })
            })
          </script>
        </div>
      </div>
      <script>
        $(function() {
          // $('#start_time2').datetimepicker({
          //   format: 'LT'
          // });
          // $('#end_time2').datetimepicker({
          //   format: 'LT'
          // });
          $('#accountChk2').click(function(){
            let open = $('#accountChk2').prop('checked');
            // console.log(open);
          
            if(open === true){
              $('#send2').show();
              $('#url2').hide();
              $('#accountChk2').prop('checked',true);
              $('#urlChk2').prop('checked',false);
            
              $('.urlLabel2').addClass('gray_txt');
              $('.accountLabel2').removeClass('gray_txt');
            }
            else {
              $('#send2').hide();
              $('#url2').show();
              $('#accountChk2').prop('checked',false);
              $('#urlChk2').prop('checked',true);
            
              $('.urlLabel2').removeClass('gray_txt');
              $('.accountLabel2').addClass('gray_txt');
            }
          })
          $('#urlChk2').click(function(){
            let open = $('#urlChk2').prop('checked');
            // console.log(open);
          
            if(open === true){
              $('#send2').hide();
              $('#url2').show();
              $('#urlChk2').prop('checked',true);
              $('#accountChk2').prop('checked',false);
            
              $('.urlLabel2').removeClass('gray_txt');
              $('.accountLabel2').addClass('gray_txt');
            }
            else {
              $('#send2').show();
              $('#url2').hide();
              $('#urlChk2').prop('checked',false);
              $('#accountChk2').prop('checked',true);
            
              $('.urlLabel2').addClass('gray_txt');
              $('.accountLabel2').removeClass('gray_txt');
            }
          })
        
          $('#open-immediateA').click(function(){
            let open = $(this).prop('checked');
            // console.log(open);
          
            if(open === true){
              $('.a1boxT').show();
              $('.a2boxT').hide();
              $('#open-immediateB').prop('checked',false);
              // $('#open-immediate2').attr('disabled',true);
              $('#online_time2 #ready-time2').addClass('gray_txt');
              $('#online_schedule2 #ready-soon2').removeClass('gray_txt');
            }
            else {
              $('.a1boxT').hide();
              $('.a2boxT').show();
              $('#open-immediateB').prop('checked',true);
              // $('#open-immediate2').attr('disabled',false);
              $('#online_time2 #ready-time2').removeClass('gray_txt');
              $('#online_schedule2 #ready-soon2').addClass('gray_txt');
            }
          })
        
          $('#open-immediateB').click(function(){
            let open = $(this).prop('checked');
            // console.log(open);
          
            if(open === true){
              $('.a1boxT').hide();
              $('.a2boxT').show();
              $('#open-immediateA').prop('checked',false);
              // $('#open-immediate2').attr('disabled',true);
              $('#online_time2 #ready-time2').removeClass('gray_txt');
              $('#online_schedule2 #ready-soon2').addClass('gray_txt');
            }
            else {
              $('.a1boxT').show();
              $('.a2boxT').hide();
              $('#open-immediateA').prop('checked',true);
              // $('#open-immediate2').attr('disabled',false);
              $('#online_time2 #ready-time2').addClass('gray_txt');
              $('#online_schedule2 #ready-soon2').removeClass('gray_txt');
            }
          })
        
          $('#chk_tuition2').click(function(){
            let display = $('#tuition2').css('display');
            if(display === 'none'){
              $('#tuition2').show();
            }
            else {
              $('#tuition2').hide();
            }
          })
          $('.ticket-option2').show();
          $('.centerBook2').show();
          $('#popScheduleRewrite').addClass('scroll-y');
        
          $('#send2').hide();
          $('#url2').show();
        
          $('#open-immediateA').click();
        
        });
      </script>
    </div>
    <!-- 스케줄 삭제 팝업 -->
    <div class="popup theme:alert_remove_this" id="popScheduleRemove">
      <div class="popup_cnt">
        <div class="guide_box confirm_box" style="padding-top: 36px; margin-bottom: 16px;">
          <img src="https://dev.foundy.me/template/back/center/imgs/exclamation_mark.png" alt="" width="40" height="40" class="guide_icon">
          <p class="confirm_message" style="line-height: 40px">해당 스케줄을 <strong>취소</strong>하시겠습니까?</p>
        </div>
        <p class="confirm_message" style="line-height: 1.75;width: 250px;font-size: 13px;margin: 0 auto;color: #9e9e9e;">현재 클래스 예약/대기를 포함해서 지난 클래스 참석이 취소될 수 있습니다!</p>
        <div class="lessonEdit_btn">
          <button class="btn_cancel font-futura" id="remove_no">CANCEL</button>
          <button class="btn_ok font-futura" id="remove_ok">OK</button>
        </div>
        <script>
          $(function(){
            $('#remove_no').click(function(){
              $('#popScheduleRemove').hide().parent().hide();
            })
            $('#remove_ok').click(function(){
              $('#popScheduleRemove').hide().parent().hide();
            })
          })
        </script>
      </div>
    </div>
    <!-- 스케줄 수정 저장 팝업 -->
    <div class="popup theme:alert_remove_this" id="popScheduleEdit">
      <div class="popup_cnt">
        <div class="guide_box confirm_box" style="padding-top: 36px; margin-bottom: 16px;">
          <img src="https://dev.foundy.me/template/back/center/imgs/information_mark.png" alt="" width="40" height="40" class="guide_icon">
          <p class="confirm_message" style="line-height: 40px">해당 스케줄을 <strong>수정</strong>하시겠습니까?</p>
        </div>
        <p class="confirm_message" style="line-height: 1.75;width: 250px;font-size: 13px;margin: 0 auto;color: #9e9e9e;">예약정원/대기인원 수정 시 예약현황이 변경될 수 있습니다!</p>
        <div class="lessonEdit_btn">
          <button class="btn_cancel font-futura" id="confirm_cancel">CANCEL</button>
          <button class="btn_ok font-futura" id="confirm_ok">OK</button>
          <script>
            $(function(){
              $('#confirm_cancel').click(function(){
                $('#popScheduleEdit').hide();
                // alert('success');
              });
              $('#confirm_ok').click(function(){
                $('#popScheduleRewrite').hide();
                $('#popScheduleEdit').hide().parent().hide();
                // update_schedule();
              })
            })
          </script>
        </div>
      </div>
    </div>
    <!-- 실시간 예약현황 수업링크발송 '발송' 클릭 팝업 -->
    <div class="popup theme:sendZoom" id="send-zoom-link">
      <div class="sendConts sendZoomBox" style="height: 620px;">
        <button class="situation_close" onclick="fn_close_zoom2();">
          <img src="https://dev.foundy.me/template/front/header/imgs/icon_close_black.png" width="12" height="12" alt="닫기" style="opacity: 0.2;">
          <!-- popup_box, pop:history 닫기 -->
          <script>
            function fn_close_zoom2() {
              $(this).closest('.boxwrap__pop').hide().children('#send-zoom-link').hide();
            }
          </script>
        </button>
        <div class="detail_zoom" id="zoom2">
          <p class="zoom_tit">수업 링크 등록</p>
          <div class="zoom_cnt" style="padding: 20px; height: 518px; overflow-y: scroll;">
            <div class="cnt_url clearfix">
              <div class="url_box">
                <input type="url" placeholder="zoom 회의 링크를 입력해 주세요" class="url_write" id="class_link2">
                <input type="url" class="url_show" title="기존 회의 링크" placeholder="기존 회의 링크" value="www.naver.com" disabled="">
              </div>
              <button class="url_enroll">
                수정
              </button>
            </div>
            <div class="cnt_sendTime">
              <div class="sendTime_sendChk clearfix">
                <p class="sendChk_tit" style="vertical-align: top; line-height: 32px;">링크 자동 발송 시간 설정</p>
                <div class="sendChk_chks">
                  <label class="chk_style style_start">
                    <input type="checkbox" class="chk_start">
                    수업 시작
                    <input value="1" type="text" class="chk_data" id="send_link_hour2" style="width: 84px;"> 시간 전
                  </label>
                  <label class="chk_style style_immediate gray_txt">
                    <input type="checkbox" class="chk_immediate" id="send_link_immediate2">
                    링크 등록 즉시 발송
                  </label>
                </div>
                <script>
                  $(function(){
                    $('#zoom2 .chk_start').click(function(){
                      // alert('ok');
                      let chk = $(this).prop('checked');
                    
                      if(chk === true) {
                        $(this).parent().removeClass('gray_txt');
                        $(this).next().removeClass('gray_txt');
                        $(this).parent().next().addClass('gray_txt');
                        $(this).parent().next().children().prop('checked',false);
                      }
                      else {
                        $(this).parent().addClass('gray_txt');
                        $(this).next().addClass('gray_txt');
                        $(this).parent().next().removeClass('gray_txt');
                        $(this).parent().next().children().prop('checked',true);
                      }
                    })
                    $('#zoom2 .chk_immediate').click(function(){
                      let chk = $(this).prop('checked');
                    
                      if(chk === true) {
                        $(this).parent().removeClass('gray_txt');
                        $(this).parent().prev().find('#send_link_hour2').addClass('gray_txt');
                        $(this).parent().prev().addClass('gray_txt');
                        $(this).parent().prev().children().prop('checked',false);
                      }
                      else {
                        $(this).parent().addClass('gray_txt');
                        $(this).parent().prev().find('#send_link_hour2').removeClass('gray_txt');
                        $(this).parent().prev().removeClass('gray_txt');
                        $(this).parent().prev().children().prop('checked',true);
                      }
                    })
                  })
                </script>
              </div>
              <div class="sendTime_sendIdentity clearfix">
                <p class="sendChk_tit">ZOOM 회의 ID / 비밀번호</p>
                <div class="sendChk_chks">
                                                <span class="start_time zoom_form" style="width: 100%;">
                                                    <input id="class_id2" type="text" class="form_time" placeholder="id" value="pyeongho35">
                                                </span>
                  <span class="start_time zoom_form" style="width: 100%;">
                                                    <input id="class_pw2" type="text" class="form_time" placeholder="pw" value="orange">
                                                </span>
                </div>
              </div>
              <div class="popup theme:sendTalk" id="send-kaTalk-link">
                <div class="sendTalkBox">
                  <div class="detail_guideTalk" id="guideTalk2" style="padding-top: 24px;">
                    <p class="guideTalk_tit" style="padding: 0 0 16px;">수업 전 안내 카톡</p>
                    <div class="guideTalk_conts">
                      <div class="conts__txtBox">
                        <div class="txtBox-territory">
                          <div class="txtBox--area">
                            <div class="area_letterBox">
                              <p class="area_letterCount">남은 글자 수
                                <span class="letter_remain">
                                                                        <strong class="remain_number">1000</strong>자
                                                                    </span>
                              </p>
                            </div>
                            <form class="area_letterForm">
                              <textarea class="area_letterZone" id="letterZone2" placeholder="1,000자 이내"></textarea>
                            </form>
                          </div>
                        </div>
                        <div class="textBox--timer clearfix">
                          <label class="chk_next immediate_kaTalk">
                            <input checked="checked" type="checkbox" id="send_talk_since2"> 다음에도 사용하기
                          </label>
                          <script>
                            $(function(){
                              $('#send_talk_since2').click(function(){
                                let chk = $(this).prop('checked');
                                if(chk === true) {
                                  $(this).parent().removeClass('gray_txt');
                                }
                                else {
                                  $(this).parent().addClass('gray_txt');
                                }
                              })
                            })
                          </script>
                        </div>
                      </div>
                  
                    </div>
                  </div>
                </div>
              </div>
              <p class="sendTime_message">*수업 링크는 티켓팅 확정된 회원들에게 카카오 알림톡으로 발송됩니다.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    function checkPiece(e) {
      // 전체 체크박스
      let chkBoxes =
        $(e).closest('tbody').find('input[name="chkPiece"]');
      // 선택된 체크박스
      let chkPiece = $(e).closest('.table-media').find('input[name="chkPiece"]:checked');
  
      // ChkAll 체크박스
      let chkAll = $(e).closest('.table-media').find('input[name="chkAll"]');
  
      console.log(chkBoxes.length,chkPiece.length); //ok
  
      $(e).next().toggleClass('toggleChk');
  
      if(chkBoxes.length === chkPiece.length){
        chkAll.prop('checked',true)
          .next().addClass('toggleChk');
      }
      else {
        chkAll.prop('checked',false)
          .next().removeClass('toggleChk');
        // $(e).next().removeClass('toggleChk');
      }
    }
    function checkAll(e) {
      let thischk = $(e).prop('checked');
  
      console.log(thischk);
  
      if(thischk === true){
        $(e).prop('checked',true)
          .next().addClass('toggleChk');
        $(e).closest('.manage_table').next().find('.chkPiece').prop('checked',true);
        $(e).closest('.manage_table').next().find('.chkPiece').next().addClass('toggleChk');
      }
      else {
        $(e).prop('checked',false)
          .next().removeClass('toggleChk');
        $(e).closest('.manage_table').next().find('.chkPiece').prop('checked',false)
        $(e).closest('.manage_table').next().find('.chkPiece').next().removeClass('toggleChk');
      }
    }
    $(document).ready(function(){
      $(document).on('click','.chkPiece',function(){
        checkPiece(this);
      });
    })
  </script>
  <!-- 각 팝업창 닫기 이벤트 -->
  <script>
    // frame_close
    $('.frame_close').click(function(){
      $('.boxwrap__pop').hide().children('div[class*=pop]').hide();
    })
    // btn_cancel, btn_ok 클릭
    $('.confirm_btn button').click(function(){
      $(this).closest('div[class^=pop]').hide().parent().hide();
    })
    // ESC keyup
    $(window).keyup(function(e){
      if(e.keyCode === 27){
        $('.boxwrap__pop').hide().children('div[class*=pop]').hide();
      }
    })
    // 팝업창 클릭
    $(window).click(function(e){
      let target = e.target.className;
      // alert(target);
      if(target === 'boxwrap__pop pop:box' || target === 'pop:type pop:add-wrap'){
        $('.boxwrap__pop').hide().children('div[class^=pop]').hide()
          .children('.named-add').hide();
      }
    })
  </script>
  <script>
    // tit_theme 클릭이벤트
    $('.tit_theme').click(function(){
      let role = $(this).data('role');
      
      // console.log(role);
      
      $('.tit_theme').removeClass('reverse_color');
      $(this).addClass('reverse_color');
      $(this).find('.next_white').show().prev().hide();
      $(this).siblings().find('.next_white').hide().prev().show();
      
      var index = $('.tit_theme').index(this);
      $('.info--contents > section').hide();
      $('.info--contents > section').eq(index).show();
      
      get_page2('studio_' + role, "<?= base_url().'master/studio/page?tab='; ?>" + role);
    });
    // window 로드이벤트
    $(window).load(function(){
      $('.tit_theme:first').click();
    });
  </script>
</section>