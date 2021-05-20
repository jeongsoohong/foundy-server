<section class="boxwrap main">
  <h2 class="boxwrap__type meaning">관리자</h2>
  <section class="boxwrap__info">
    <div class="info--tit">
<!--      <a href="#" class="tit_theme" data-role="slider">-->
<!--        <span class="theme_txt">슬라이더 관리</span>-->
<!--        <div class="theme_arrow">-->
<!--          <img src="--><?//= base_url(); ?><!--template/back/center/imgs/icon_next.png" width="6" height="auto">-->
<!--          <img src="--><?//= base_url(); ?><!--template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">-->
<!--        </div>-->
<!--      </a>-->
<!--      <a href="#" class="tit_theme" data-role="email">-->
<!--        <span class="theme_txt">자동발송 이메일</span>-->
<!--        <div class="theme_arrow">-->
<!--          <img src="--><?//= base_url(); ?><!--template/back/center/imgs/icon_next.png" width="6" height="auto">-->
<!--          <img src="--><?//= base_url(); ?><!--template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">-->
<!--        </div>-->
<!--      </a>-->
      <a href="#" class="tit_theme" data-role="coupon">
        <span class="theme_txt">쿠폰 관리</span>
        <div class="theme_arrow">
          <img src="<?= base_url(); ?>template/back/center/imgs/icon_next.png" width="6" height="auto">
          <img src="<?= base_url(); ?>template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">
        </div>
      </a>
      <a href="#" class="tit_theme" data-role="shop_main">
        <span class="theme_txt">샵 메인 관리</span>
        <div class="theme_arrow">
          <img src="<?= base_url(); ?>template/back/center/imgs/icon_next.png" width="6" height="auto">
          <img src="<?= base_url(); ?>template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">
        </div>
      </a>
      <a href="#" class="tit_theme" data-role="shop_category">
        <span class="theme_txt">샵 카테고리 메인 관리</span>
        <div class="theme_arrow">
          <img src="<?= base_url(); ?>template/back/center/imgs/icon_next.png" width="6" height="auto">
          <img src="<?= base_url(); ?>template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">
        </div>
      </a>
<!--      <a href="#" class="tit_theme" data-role="send_message">-->
<!--        <span class="theme_txt">문자 발송 관리</span>-->
<!--        <div class="theme_arrow">-->
<!--          <img src="--><?//= base_url(); ?><!--template/back/center/imgs/icon_next.png" width="6" height="auto">-->
<!--          <img src="--><?//= base_url(); ?><!--template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">-->
<!--        </div>-->
<!--      </a>-->
      <!--
                        <a href="#" class="tit_theme">
                          <span class="theme_txt">푸시 발송</span>
                          <div class="theme_arrow">
                            <img src="<?= base_url(); ?>template/back/center/imgs/icon_next.png" width="6" height="auto">
                            <img src="<?= base_url(); ?>template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">
                          </div>
                        </a>
-->
    </div>
    <div class="info--contents scroll-y_hidden">
<!--      <section class="contents_type contents_master scroll-y" id="manage_slider">-->
<!--      </section>-->
<!--      <section class="contents_type contents_master scroll-y" id="manage_email">-->
<!--      </section>-->
      <section class="contents_type contents_master scroll-y" id="manage_coupon">
      </section>
      <section class="contents_type contents_master scroll-y" id="manage_shop_main">
      </section>
      <section class="contents_type contents_master scroll-y" id="manage_shop_category">
      </section>
<!--      <section class="contents_type contents_master scroll-y" id="manage_send_message">-->
<!--      </section>-->
    </div>
  </section>
  <div class="boxwrap__pop pop:box">
    <!-- 추가,수정 버튼 클릭시 -->
    <div class="pop:type pop:add-wrap">
      <div class="named-add add-slider">
        <p class="add-tit">
          <span class="font-futura">Slider</span> 상세
        </p>
        <div class="add-box scroll-y">
          <button class="frame_close">
            <img src="<?= base_url(); ?>template/back/center/imgs/icon_close_black.png" alt="" width="12" height="12" style="opacity: 0.5;">
          </button>
          <dl class="add-contents clearfix">
            <dt class="contents__tit">제목</dt>
            <dd class="contents__data">
              <input type="text" placeholder="제목을 입력해주세요" class="data_form revise_tit">
            </dd>
            <dt class="contents__tit">카테고리</dt>
            <dd class="contents__data">
              <input type="text" placeholder="카테고리를 입력해주세요" class="data_form revise_cat">
            </dd>
            <dt class="contents__tit">위치</dt>
            <dd class="contents__data">
              <div class="data_form">
                <select style="width: 100%;" class="locate_sel">
                  <option value="home">home</option>
                  <option value="shop">shop</option>
                </select>
              </div>
            </dd>
            <dt class="contents__tit">링크</dt>
            <dd class="contents__data">
              <input type="text" placeholder="링크 연결시 입력해주세요" class="data_form revise_link">
            </dd>
            <dt class="contents__tit">slider image</dt>
            <dd class="contents__data file_form_open">
              <label class="data_form file_form">파일열기
                <span class="file_arrow"></span>
                <input type="file" value="파일열기" class="imgOpen">
              </label>
              <div class="file_thumb clearfix">
                <img src="" width="100" alt="" class="thumb_img thumb_fixed">
              </div>
              <!-- input type="file" 이미지 미리 보기 -->
              <script>
                // img src값 넣기
                function readURL(input) {
                  if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                      $('.thumb_img').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                  }
                }
                
                $('.imgOpen').change(function() {
                  readURL(this);
                  $(this).parent().next('.file_thumb').show();
                });
                
                
                // file_arrow 호버 이벤트
                $('.file_form_open').hover(function(){
                  $(this).find('.file_arrow').css('transform','rotate(225deg)')
                    .addClass('arrow_hover');
                },function(){
                  $(this).find('.file_arrow').css('transform','rotate(45deg)')
                    .removeClass('arrow_hover');
                })
              </script>
            </dd>
            <dt class="contents__tit" style="margin-bottom: 20px;">설명</dt>
            <dd class="contents__data description__data" style="margin-bottom: 20px;">
              <form>
                <textarea class="data_form description_form"></textarea>
              </form>
            </dd>
          </dl>
        </div>
        <div class="add-fn clearfix">
          <button class="fn__upload">
            <span class="upload--span"><img src="<?= base_url(); ?>template/back/master/icon/pop_ic_upload.png" height="16" width="auto"></span>
            업로드
          </button>
          <button class="fn__refresh">
            <span class="refresh--span"><img src="<?= base_url(); ?>template/back/master/icon/pop_ic_refresh.png" height="16" width="auto"></span>
            리셋
          </button>
        </div>
      </div>
      <div class="named-add add-mail" style="display: none;">
        <p class="add-tit">
          <span class="font-futura">이메일</span> 상세
        </p>
        <div class="add-box scroll-y" style="height: 468px;">
          <button class="frame_close">
            <img src="<?= base_url(); ?>template/back/center/imgs/icon_close_black.png" alt="" width="12" height="12" style="opacity: 0.5;">
          </button>
          <dl class="add-contents clearfix">
            <dt class="contents__tit">타입</dt>
            <dd class="contents__data">
              <div class="data--search">
                <div class="data_form form_val">
                  <button style="display: none;" class="val-search">
                    <img src="<?= base_url(); ?>template/back/master/icon/ic_search.png" alt="검색" width="auto" height="16">
                  </button>
                  <input class="val-input" value="" placeholder="이메일 타입을 선택해주세요" style="border: 0;">
                </div>
                <div class="data_form form_box" style="display: none;">
                  <!-- 검색 목록 -->
                  <ul class="fn:list scroll-y">
                    <li>유저 배송시작 / 송장번호 안내</li>
                    <li>유저 주문 완료 / 배송준비중 / 취소 등 상태 안내</li>
                    <li>유저 쿠폰 지급 안내</li>
                    <li>유저 요청에 따른 인증코드 안내</li>
                    <li>유저 요청에 따른 리셋 비밀번호 안내</li>
                    <li>강사 회원 신청 승인 안내</li>
                    <li>센터 회원 신청 승인 안내</li>
                    <li>센터 회원 신청 반려 안내</li>
                    <li>샵 회원 신규 주문 / 취소 안내</li>
                    <li>강사 회원 신청 반려 안내</li>
                    <li>샵미확인 주문 / 배송지연 안내</li>
                    <li>온라인 스튜디오 승인 안내</li>
                    <li>온라인 스튜디오 반려 안내</li>
                    <li>온라인 클래스 티켓팅 신청 안내</li>
                    <li>온라인 클래스 티켓팅 확정 안내</li>
                    <li>온라인 클래스 링크 발송</li>
                    <li>온라인 클래스 티켓팅 취소 안내</li>
                    <li>온라인 클래스 예약자 확인 요청</li>
                  </ul>
                </div>
                <script>
                  /*
$(function(){

$('ul[class^=fn] li').click(function(){
    let li_txt = $(this).text();
    // console.log(li_txt);     OK
    $(this).closest('.form_box').prev().find('.val-input').val(li_txt);
    $(this).parent('ul[class^=fn]').hide();

    $(this).closest('.form_box').prev().find('.val-input').prev().hide();
    $(this).closest('.form_box').prev().find('.val-input').removeClass('shadow_sm');
    $(this).closest('.form_box').prev().css({
                                            'border' : '1px dotted #ccc',
                                            'border-width' : '0 0 1px 0'
                                        }).next('.form_box')
                                        .hide();
    $('.val-input').on({
        // val-input 클릭 이벤트
        click: function(){
            $(this).prev().show();
            $(this).addClass('shadow_sm');
            $(this).closest('.form_val').css({
                                            'border' : 0
                                        }).next('.form_box')
                                        .show();
        }
    });
})
})
*/
                  
                  // val-input focusout 이벤트
                  /*
$('.val-input').focusout(function(){
    $(this).prev().hide();
    $(this).removeClass('shadow_sm');
    $(this).closest('.form_val').css({
                                    'border' : '1px dotted #ccc',
                                    'border-width' : '0 0 1px 0'
                                }).next('.form_box')
                                .hide();
})
*/
                  
                  $(function(){
                    $('.val-input').click(function(){
                      // val-input 클릭 이벤트
                      $(this).prev().show();
                      $(this).addClass('shadow_sm');
                      $(this).closest('.form_val').css('border','0').next('.form_box')
                        .css('border','0').show()
                        .children().show();
                      
                      $('ul[class^=fn] li').on('click',function(){
                        let li_txt = $(this).text();
                        // console.log(li_txt);     OK
                        $(this).closest('.form_box').prev().find('.val-input').val(li_txt);
                        $(this).parent('ul[class^=fn]').hide();
                        
                        $(this).closest('.form_box').prev().find('.val-input').prev().hide();
                        $(this).closest('.form_box').prev().find('.val-input').removeClass('shadow_sm');
                        $(this).closest('.form_box').prev().css({
                          'border' : '1px dotted #ccc',
                          'border-width' : '0 0 1px 0'
                        }).next('.form_box')
                          .hide();
                      })
                    })
                  })
                </script>
              </div>
            </dd>
            <dt class="contents__tit">이메일 제목</dt>
            <dd class="contents__data">
              <input type="text" placeholder="제목을 입력해주세요" class="data_form revise_mailTit">
            </dd>
            <dt class="contents__tit">보내는 주소</dt>
            <dd class="contents__data">
              <input type="text" value="hello@foundy.me" class="data_form gray_bg data_disabled revise_address" disabled>
            </dd>
            <dt class="contents__tit">보내는 사람</dt>
            <dd class="contents__data">
              <input type="text" placeholder="보내는 사람 (FOUNDY)" class="data_form revise_sender">
            </dd>
            <dt class="contents__tit">메일 타입</dt>
            <dd class="contents__data">
              <input type="text" value="html" class="data_form gray_bg data_disabled revise_mailType" disabled>
            </dd>
            <dt class="contents__tit" style="margin: 0 0 12px; line-height: 1.75;">메일 본문에서<br>치환할 문자열</dt>
            <dd class="contents__data" style="margin-bottom: 28px;">
              <input type="text" value="{{EMAIL}}, {{PW}}, {{BRAND}} 등" class="data_form revise_letter">
            </dd>
            <!--
                                    <dd class="contents__data description__data" style="margin-bottom: 20px;">
                                        <form>
                                            <textarea type="text" placeholder="{{EMAIL}}, {{PW}}, {{BRAND}} 등" class="data_form description_form">
                                            </textarea>
                                        </form>
                                    </dd>
-->
            <dt class="contents__tit">이메일 본문</dt>
            <dd class="contents__data mail__data-wrap">
              <!-- 블로그 편집기 영역 -->
              <div class="mail__html">
              
              </div>
            </dd>
          </dl>
        </div>
        <div class="add-fn clearfix">
          <button class="fn__upload">
            <span class="upload--span"><img src="<?= base_url(); ?>template/back/master/icon/pop_ic_upload.png" height="16" width="auto"></span>
            업로드
          </button>
          <button class="fn__refresh">
            <span class="refresh--span"><img src="<?= base_url(); ?>template/back/master/icon/pop_ic_refresh.png" height="16" width="auto"></span>
            리셋
          </button>
        </div>
      </div>
      <div class="named-add add-coupon" style="display: none;" id="coupon_mod">
      </div>
    </div>
    <!-- 상태변경,삭제 클릭 팝업 -->
    <div class="pop:type pop:frame frame:question">
      <button class="frame_close" onclick="close_question_popup()">
        <img src="<?= base_url(); ?>template/back/center/imgs/icon_close_black.png" alt="" width="12" height="12" style="opacity: 0.5;">
      </button>
      <div class="frame_cnt">
        <p class="cnt_tit">
          <!-- inactivate 상태로 변경하시겠습니까? / 정말 삭제하시겠습니까? -->
          inactivate 상태로 변경하시겠습니까?
        </p>
        <div class="cnt_btns confirm_btn">
          <button class="btn_cancel font-futura" onclick="close_question_popup()">CANCEL</button>
          <button class="btn_ok font-futura" onclick="req_posture()">OK</button>
        </div>
        <script>
          function close_question_popup() {
            $('.boxwrap__pop').hide().children('div[class*=question]').hide();
          }
        </script>
      </div>
    </div>
    <!-- 이메일 보기 팝업 -->
    <div class="pop:type pop:frame frame:mail">
      <button class="frame_close">
        <img src="<?= base_url(); ?>template/back/center/imgs/icon_close_black.png" alt="" width="12" height="12" style="opacity: 0.5;">
      </button>
      <div class="cnt_btns confirm_btn" style="background-color: #fff;">
        <button class="btn_cancel font-futura">CANCEL</button>
      </div>
      <div class="frame_wrap">
        <div class="frame_tit">
          <p class="tit_name font-futura">view_profile</p>
          <div class="tit_display">
            <p class="display-type">
              <span class="typeE-Tit">샵 회원 신규 주문 / 취소 안내</span>
              <br><span class="type-name">email</span>
            </p>
            <div class="display-now">승인</div>
          </div>
          <div class="tit_table table_form:mail">
            <div class="table_scroll scroll-y" style="height: 276px;">
              <table class="mail_table">
                <colgroup>
                  <col width="16%">
                  <col width="84%">
                </colgroup>
                <tbody>
                <tr>
                  <th>보내는 주소</th>
                  <td class="see__address">hello@foundy.me</td>
                </tr>
                <tr>
                  <th>보내는 사람</th>
                  <td class="see__sender">FOUNDY</td>
                </tr>
                <tr>
                  <th>메일 타입</th>
                  <td class="see__type">html</td>
                </tr>
                <tr>
                  <th>이메일 제목</th>
                  <td class="see__tit">[FOUNDY] 신규 주문 / 취소 안내</td>
                </tr>
                <tr>
                  <th>치환 문자열</th>
                  <td>
                    <div class="space:layer">
                      <div class="layer--position see__letter scroll-x">{{BRAND_NAME}},{{ORDER_STATUS}}</div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>이메일 본문</th>
                  <td class="see__html mail_layout">
                    <!-- 이메일 내용 -->
                  
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- 쿠폰 보기 팝업 -->
    <div class="pop:type pop:frame frame:coupon" id="coupon_view">
    </div>
  </div>
</section>
<!-- addBtn 호버이벤트 -->
<!--  <script>-->
<!--    $('.named-fn').on({-->
<!--      mousemove: function(e){-->
<!--        // console.log(e.pageX);-->
<!--        let offset = $(this).offset();-->
<!--        // 174     848, 964-->
<!--        // console.log(offset.top,offset.left);-->
<!--        -->
<!--        // named-fn width-->
<!--        let w = $(this).width();-->
<!--        // console.log(w);   76-->
<!--        let h = offset.top + $(this).height();-->
<!--        // console.log( w + offset.left );    936, 1052-->
<!--        // console.log(h);                    210-->
<!--        -->
<!--        if(e.pageX >= offset.left || e.pageX <= w || e.pageY >= offset.top || e.pageY <= h) {-->
<!--          let has = $(this).hasClass('addBtn');-->
<!--          if(has === true){-->
<!--            $(this).next().next().addClass('disabledBtn').attr('disabled',true);-->
<!--          }-->
<!--          else {-->
<!--            $(this).prev().prev().addClass('disabledBtn').attr('disabled',true);-->
<!--          }-->
<!--        }-->
<!--      },-->
<!--      mouseout: function(e){-->
<!--        let offset = $(this).offset();-->
<!--        let w = $(this).width();-->
<!--        let h = offset.top + $(this).height();-->
<!--        -->
<!--        -->
<!--        if(e.pageX <= offset.left || e.pageX >= w || e.pageY <= offset.top || e.pageY >= h) {-->
<!--          // if(e.pageX < 964){-->
<!--          // $(this).closest('.namedBtn').find('.named-fn').removeClass('disabledBtn').attr('disabled',false);-->
<!--          // $(this).next().next().removeClass('disabledBtn').attr('disabled',false);-->
<!--          // }-->
<!--          // else {-->
<!--          $(this).closest('.namedBtn').find('.named-fn').removeClass('disabledBtn').attr('disabled',false);-->
<!--          // }-->
<!--        }-->
<!--      }-->
<!--    })-->
<!--  </script>-->
<!-- addBtn 클릭이벤트 -->
<!--  <script>-->
<!--    $('.addBtn').click(function(){-->
<!--      let name = $(this).attr('class');-->
<!--      // console.log(name);-->
<!--      -->
<!--      let split = name.split('');-->
<!--      // console.log(split);-->
<!--      -->
<!--      // split 으로 'S','M','C' 값 가져오기-->
<!--      let exist_S = split.indexOf('S');-->
<!--      let exist_M = split.indexOf('M');-->
<!--      let exist_C = split.indexOf('C');-->
<!--      // console.log(exist_1,exist_2,exist_3);-->
<!--      -->
<!--      if(exist_S !== -1){-->
<!--        console.log(1);-->
<!--        $('.boxwrap__pop').show().children('div[class$=add-wrap]').show().find('.add-slider').show();-->
<!--      }-->
<!--      else if(exist_M !== -1){-->
<!--        console.log(2);-->
<!--        $('.boxwrap__pop').show().children('div[class$=add-wrap]').show().find('.add-mail').show();-->
<!--      }-->
<!--      else if(exist_C !== -1){-->
<!--        console.log(3);-->
<!--        $('.boxwrap__pop').show().children('div[class$=add-wrap]').show().find('.add-coupon').show();-->
<!--      }-->
<!--    })-->
<!--  </script>-->
<!-- removeBtn 클릭이벤트 -->
<!--  <script>-->
<!--    $('.removeBtn').click(function(){-->
<!--      let txt = '정말 삭제하시겠습니까?'-->
<!--      $('.boxwrap__pop').show().children('div[class*=question]').show()-->
<!--        .find('.cnt_tit').text(txt);-->
<!--    });-->
<!--  </script>-->
<!-- 각 팝업창 닫기 이벤트 -->
<script>
  // // 보기 버튼 클릭
  // $('.td-seeing').click(function(){
  //   let initial =$(this).closest('.type_box').prev().text();
  //   // alert(initial);
  //
  //   let exist_m = initial.indexOf('m');
  //   let exist_c = initial.indexOf('ou');
  //
  //   if(exist_m !== -1){
  //     // 메일 보기 팝업
  //     $('.boxwrap__pop').show().children('div[class*="frame:mail"]').show();
  //
  //     /* 메일 수정 팝업에 있는 내용 메일 보기 팝업에도 동시적용 */
  //     let table_type = $(this).closest('tr').find('td:eq(1)').find('.td-span').text();
  //     let table_tit = $(this).closest('tr').find('td:eq(5)').find('.td-span').text();
  //     let table_address = $(this).closest('tr').find('td:eq(3)').find('.td-span').text();
  //     let table_sender = $(this).closest('tr').find('td:eq(2)').find('.td-span').text();
  //     let table_form = $(this).closest('tr').find('td:eq(4)').find('.td-span').text();
  //     let table_letter = $(this).closest('.fn-td-btn').next().find('.change_letter').text();
  //     let table_mail = $(this).closest('.fn-td-btn').next().find('.mail_tag').html();
  //
  //     $('.typeE-Tit').text(table_type);
  //     $('.see__tit').text(table_tit);
  //     $('.see__address').text(table_address);
  //     $('.see__sender').text(table_sender);
  //     $('.see__letter').text(table_letter);
  //     $('.see__html').html(table_mail);
  //   }
  //
  //   else if(exist_c !== -1){
  //     // 쿠폰 보기 팝업
  //     $('.boxwrap__pop').show().children('div[class*="frame:coupon"]').show();
  //
  //     /* 쿠폰 수정 팝업에 있는 내용 쿠폰 보기 팝업에도 동시적용 */
  //     let table_id = $(this).closest('.fn-td-btn').next().find('.cp--id').text();
  //     let table_name = $(this).closest('.fn-td-btn').next().find('.cp--name').text();
  //     let table_guide = $(this).closest('.fn-td-btn').next().find('.cp--guide').text();
  //     let table_benefit = $(this).closest('.fn-td-btn').next().find('.cp--benefit').text();
  //     let table_count = $(this).closest('.fn-td-btn').next().find('.cp--count').text();
  //     let table_type = $(this).closest('.fn-td-btn').next().find('.cp--type').text();
  //     let table_dc = $(this).closest('.fn-td-btn').next().find('.cp--dc').text();
  //     let table_start = $(this).closest('.fn-td-btn').next().find('.issue--start').text();
  //     let table_end = $(this).closest('.fn-td-btn').next().find('.issue--end').text();
  //     let table_terminate = $(this).closest('.fn-td-btn').next().find('.cp--terminate').text();
  //
  //     $('.typeC-Tit').text(table_name);
  //     $('.see__id').text(table_id);
  //     $('.see__name').text(table_name);
  //     $('.see__guide').text(table_guide);
  //     $('.see__benefit').text(table_benefit);
  //     if(table_count === 0){
  //       $('.see__count').text('무제한');
  //     }
  //     $('.see__type').text(table_type);
  //     $('.see__dc').text(table_dc);
  //     $('.see__start').text(table_start);
  //     $('.see__end').text(table_end);
  //     $('.see__terminate').text(table_terminate);
  //   }
  // })
  
  // 수정 버튼 클릭
  // $('.td-revise').click(function(){
  //   let name = $(this).closest('.named-wrap').prev().find('.addBtn').attr('class');
  //   // console.log(name);
  //
  //
  //   let split = name.split('');
  //   // console.log(split);
  //
  //   // split 으로 'S','M','C' 값 가져오기
  //   let exist_S = split.indexOf('S');
  //   let exist_M = split.indexOf('M');
  //   let exist_C = split.indexOf('C');
  //   // console.log(exist_1,exist_2,exist_3);
  //
  //   if(exist_S != -1){
  //     // console.log(1); ok
  //     // 슬라이더 수정
  //     $('.boxwrap__pop').show().children('div[class$=add-wrap]').show()
  //       .find('.add-slider').show().find('.add-contents').css('padding-bottom','60px');
  //
  //     /* 테이블 데이터 값 가져오기 */
  //
  //     let table_tit = $(this).closest('tr').find('td:eq(2)').find('.td-span').text();
  //     let table_cat = $(this).closest('tr').find('td:eq(3)').find('.td-span').text();
  //     let table_loc = $(this).closest('tr').find('td:eq(6)').find('.td-span').text();
  //     let table_imgSrc = $(this).closest('tr').find('td:eq(1)').find('img').attr('src');
  //     let table_description = $(this).closest('tr').find('td:eq(4)').find('.td-span').text();
  //     let table_link = $(this).closest('tr').find('td:eq(5)').find('.td-span').text();
  //
  //     $('.revise_tit').val(table_tit);
  //     $('.revise_cat').val(table_cat);
  //     $('.locate_sel option[value='+ table_loc +']').attr('selected','selected');
  //     $('.file_thumb').css('display','block').find('img').attr('src',table_imgSrc);
  //     $('.description_form').val(table_description);
  //     $('.revise_link').val(table_link);
  //
  //   }
  //   else if(exist_M != -1){
  //     // 이메일 수정
  //     $('.boxwrap__pop').show().children('div[class$=add-wrap]').show().find('.add-mail').show();
  //
  //     /* 테이블 데이터 값 가져오기 */
  //     let table_type = $(this).closest('tr').find('td:eq(1)').find('.td-span').text();
  //     let table_tit = $(this).closest('tr').find('td:eq(5)').find('.td-span').text();
  //     let table_address = $(this).closest('tr').find('td:eq(3)').find('.td-span').text();
  //     let table_sender = $(this).closest('tr').find('td:eq(2)').find('.td-span').text();
  //     let table_form = $(this).closest('tr').find('td:eq(4)').find('.td-span').text();
  //     let table_letter = $(this).closest('.fn-td-btn').next().find('.change_letter').text();
  //     let table_mail = $(this).closest('.fn-td-btn').next().find('.mail_tag').html();
  //
  //     $('.add-mail .val-input').val(table_type);
  //     $('.revise_mailTit').val(table_tit);
  //     $('.revise_address').val(table_address);
  //     $('.revise_sender').val(table_sender);
  //     $('.revise_letter').val(table_letter);
  //     $('.mail__html').html(table_mail);
  //   }
  //   else if(exist_C != -1){
  //     // 쿠폰 수정
  //     $('.boxwrap__pop').show().children('div[class$=add-wrap]').show().find('.add-coupon').show();
  //
  //     /* 테이블 데이터 값 가져오기 */
  //     let table_id = $(this).closest('.fn-td-btn').next().find('.cp--id').text();
  //     let table_name = $(this).closest('.fn-td-btn').next().find('.cp--name').text();
  //     let table_guide = $(this).closest('.fn-td-btn').next().find('.cp--guide').text();
  //     let table_benefit = $(this).closest('.fn-td-btn').next().find('.cp--benefit').text();
  //     let table_count = $(this).closest('.fn-td-btn').next().find('.cp--count').text();
  //     let table_type = $(this).closest('.fn-td-btn').next().find('.cp--type').text();
  //     let table_dc = $(this).closest('.fn-td-btn').next().find('.cp--dc').text();
  //     let table_start = $(this).closest('.fn-td-btn').next().find('.issue--start').text();
  //     let table_end = $(this).closest('.fn-td-btn').next().find('.issue--end').text();
  //     let table_terminate = $(this).closest('.fn-td-btn').next().find('.cp--terminate').text();
  //
  //     $('.revise_id').val(table_id);
  //     $('.revise_cpName').val(table_name);
  //     $('.revise_cpDc').val(table_dc);
  //     $('.revise_cpGuide').val(table_guide);
  //
  //     // 적용(혜택)회원
  //     if(table_benefit === '적용회원'){
  //       $('.revise_cpBenefit:eq(0)').prop('selected',true);
  //     }
  //     else if(table_benefit === '회원가입쿠폰'){
  //       $('.revise_cpBenefit:eq(1)').prop('selected',true);
  //     }
  //     else if(table_benefit === '구매유도쿠폰'){
  //       $('.revise_cpBenefit:eq(2)').prop('selected',true);
  //     }
  //     else if(table_benefit === '센터회원쿠폰'){
  //       $('.revise_cpBenefit:eq(3)').prop('selected',true);
  //     }
  //     else if(table_benefit === '강사회원쿠폰'){
  //       $('.revise_cpBenefit:eq(4)').prop('selected',true);
  //     }
  //
  //     // 쿠폰수
  //     if(table_count === '0'){
  //       $('.revise_cpCount').val('무제한');
  //     }
  //
  //     // 쿠폰타입
  //     if(table_type === '쿠폰타입'){
  //       $('.revise_cpType:eq(0)').prop('selected',true);
  //     }
  //     else if(table_type === '샵할인금액'){
  //       $('.revise_cpType:eq(1)').prop('selected',true);
  //     }
  //     else if(table_type === '샵할인율'){
  //       $('.revise_cpType:eq(2)').prop('selected',true);
  //     }
  //     else if(table_type === '무료배송'){
  //       $('.revise_cpType:eq(3)').prop('selected',true);
  //     }
  //   }
  // })
  
  // 상태변경 버튼 클릭
  // $('.td-posture').click(function(){
  //   $('.boxwrap__pop').show().children('div[class*=question]').show();
  //
  //   var origin = $(this).closest('td').siblings('.posture').children().text();
  //   // console.log(origin);    activate inactivate   발급중/발급중지/발급완료   메인 노출/메인미노출,샵 메인노출/샵메인미노출
  //   var data = '';
  //
  //   // 가짓수가 2가지일 때
  //   /* activate inactivate     발급중/발급중지/발급완료     메인 노출/메인미노출 , 샵 메인노출/샵메인미노출 */
  //
  //   console.log(origin);
  //   /* activate 상태 */
  //   if(origin === 'activate'){
  //     data = 'inactivate';
  //     var txt = data + ' 상태로 변경하시겠습니까?';
  //     $(this).closest('#master').find('div[class*=question]').find('.cnt_tit').text(txt);
  //   }
  //   else if(origin === 'inactivate') {
  //     data = 'activate';
  //     var txt = data + ' 상태로 변경하시겠습니까?';
  //     $(this).closest('#master').find('div[class*=question]').find('.cnt_tit').text(txt);
  //   }
  //
  //   /* 쿠폰 발급 상태 */
  //   else if(origin === '발급중지'){
  //     data = '발급중';
  //     var txt = data + ' 상태로 변경하시겠습니까?';
  //     $(this).closest('#master').find('div[class*=question]').find('.cnt_tit').text(txt);
  //   }
  //   else if(origin === '발급중' || origin === '발급완료'){
  //     data = '발급중지';
  //     var txt = data + ' 상태로 변경하시겠습니까?';
  //     $(this).closest('#master').find('div[class*=question]').find('.cnt_tit').text(txt);
  //   }
  //
  //   /* 메인 노출/미노출 , 샵 메인노출/미노출*/
  //   else if(origin === '메인노출'){
  //     data = '메인에 게시를 하시겠습니까?';
  //     var txt = data;
  //     $(this).closest('#master').find('div[class*=question]').find('.cnt_tit').text(txt);
  //   }
  //   else if(origin === '메인미노출'){
  //     data = '메인에 게시를 취소하시겠습니까?';
  //     var txt = data;
  //     $(this).closest('#master').find('div[class*=question]').find('.cnt_tit').text(txt);
  //   }
  //   else if(origin === '샵메인노출'){
  //     data = '샵메인에 게시를 하시겠습니까?';
  //     var txt = data;
  //     $(this).closest('#master').find('div[class*=question]').find('.cnt_tit').text(txt);
  //   }
  //   else if(origin === '샵메인미노출'){
  //     data = '샵메인에 게시를 취소하시겠습니까?';
  //     var txt = data;
  //     $(this).closest('#master').find('div[class*=question]').find('.cnt_tit').text(txt);
  //   }
  //   // 가짓수가 3가지일 때 셀렉트 박스 show/hide
  // })
</script>
<script>
  // frame_close 클릭
  $('.frame_close').click(function(){
    $(this).closest('.named-add').hide().parent('div[class*=type]').hide().parent('.boxwrap__pop').hide();
    $(this).closest('div[class*=pop\:frame]').hide().parent('.boxwrap__pop').hide();
    
    /* 슬라이드 내용 초기화 */
    $('.revise_tit').val('');
    // 카테고리
    $('.revise_cat').val('');
    // 위치
    $('.locate_sel option').removeAttr('selected');
    // 이미지
    let noneSrc = '';
    $('.file_thumb').css('display','none')
      .find('img').attr('src',noneSrc);
    // 링크
    $('.description_form').val('');
    
    // named-fn disabledBtn 클래스 제거
    $('.named-fn').removeClass('disabledBtn').attr('disabled',false);
    
    /* 이메일 내용 초기화 */
    $('.add-mail .val-input').val('');
    $('.revise_mailTit').val('');
    $('.revise_address').val('');
    $('.revise_sender').val('');
    $('.revise_letter').val('');
    $('.mail__html').html('');
    
    
    /* 쿠폰 내용 초기화 */
    $('.revise_id').val('');
    $('.revise_cpName').val('');
    $('.revise_cpDc').val('');
    $('.revise_cpGuide').val('');
    $('.revise_cpBenefit:eq(0)').prop('selected',true);
    $('.revise_cpType:eq(0)').prop('selected',true);
  })
  // btn_cancel, btn_ok 클릭
  $('.confirm_btn button').on({
    click: function(){
      $(this).closest('div[class*=add]').hide().parent('.boxwrap__pop').hide();
      // console.log(1) ok;
      $(this).closest('div[class*=pop\:frame]').hide().parent('.boxwrap__pop').hide();
      
      /* 슬라이드 내용 초기화 */
      $('.revise_tit').val('');
      // 카테고리
      $('.revise_cat').val('');
      // 위치
      $('.locate_sel option').removeAttr('selected');
      // 이미지
      let noneSrc = '';
      $('.file_thumb').css('display','block')
        .find('img').attr('src',noneSrc);
      // 링크
      $('.description_form').val('');
      
      // named-fn disabledBtn 클래스 제거
      $('.named-fn').removeClass('disabledBtn').attr('disabled',false);
      
      
      /* 이메일 내용 초기화 */
      $('.add-mail .val-input').val('');
      $('.revise_mailTit').val('');
      $('.revise_address').val('');
      $('.revise_sender').val('');
      $('.revise_letter').val('');
      $('.mail__html').html('');
      
      
      /* 쿠폰 내용 초기화 */
      $('.revise_id').val('');
      $('.revise_cpName').val('');
      $('.revise_cpDc').val('');
      $('.revise_cpGuide').val('');
      $('.revise_cpBenefit:eq(0)').prop('selected',true);
      $('.revise_cpType:eq(0)').prop('selected',true);
    }
  })
  
  // ESC 키업
  $(window).keyup(function(e){
    if(e.keyCode === 27) {
      $('.boxwrap__pop').hide().children('div[class*=type]').hide()
        .children('.named-add').hide();
      
      /* 슬라이드 내용 초기화 */
      $('.revise_tit').val('');
      // 카테고리
      $('.revise_cat').val('');
      // 링크
      $('.revise_link').val('');
      // 위치
      $('.locate_sel option').removeAttr('selected');
      // 이미지
      let noneSrc = '';
      $('.file_thumb').css('display','block')
        .find('img').attr('src',noneSrc);
      // 링크
      $('.description_form').val('');
      
      // named-fn disabledBtn 클래스 제거
      $('.named-fn').removeClass('disabledBtn').attr('disabled',false);
      
      // 샵 메인 관리 & 샵 카테고리 메인 관리 esc 안 먹게
      $('#manage_shop_main .addBtn').addClass('disabledBtn').attr('disabled',true);
      $('#manage_shop_category .addBtn').addClass('disabledBtn').attr('disabled',true);
      
      /* 이메일 내용 초기화 */
      $('.add-mail .val-input').val('');
      $('.revise_mailTit').val('');
      $('.revise_address').val('');
      $('.revise_sender').val('');
      $('.revise_letter').val('');
      $('.mail__html').html('');
      
      
      /* 쿠폰 내용 초기화 */
      $('.revise_id').val('');
      $('.revise_cpName').val('');
      $('.revise_cpDc').val('');
      $('.revise_cpGuide').val('');
      $('.revise_cpBenefit:eq(0)').prop('selected',true);
      $('.revise_cpType:eq(0)').prop('selected',true);
    }
  })
  // 팝업창 클릭
  $(window).click(function(e){
    let target = e.target.className;
    // console.log(target);
    
    if(target === 'boxwrap__pop pop:box' || target === 'pop:type pop:add-wrap'){
      $('.boxwrap__pop').hide().children('div[class*=type]').hide()
        .children('.named-add').hide();
      
      /* 슬라이드 내용 초기화 */
      $('.revise_tit').val('');
      // 카테고리
      $('.revise_cat').val('');
      // 링크
      $('.revise_link').val('');
      // 위치
      $('.locate_sel option').removeAttr('selected');
      // 이미지
      let noneSrc = '';
      $('.file_thumb').css('display','block')
        .find('img').attr('src',noneSrc);
      // 링크
      $('.description_form').val('');
      
      // named-fn disabledBtn 클래스 제거
      $('.named-fn').removeClass('disabledBtn').attr('disabled',false);
      
      
      /* 이메일 내용 초기화 */
      $('.add-mail .val-input').val('');
      $('.revise_mailTit').val('');
      $('.revise_address').val('');
      $('.revise_sender').val('');
      $('.revise_letter').val('');
      $('.mail__html').html('');
      
      
      /* 쿠폰 내용 초기화 */
      $('.revise_id').val('');
      $('.revise_cpName').val('');
      $('.revise_cpDc').val('');
      $('.revise_cpGuide').val('');
      $('.revise_cpBenefit:eq(0)').prop('selected',true);
      $('.revise_cpType:eq(0)').prop('selected',true);
    }
  });
  
  function check_all(type, checked) {
    let target = $('#'+type+'_chk_all');
    if (checked === true) {
      target.prop('checked', true);
      target.next().addClass('toggleChk')
    } else {
      target.prop('checked', false);
      target.next().removeClass('toggleChk')
    }
    return checked;
  }
  function check_piece(type) {
    let l = get_check_list(type);
    console.log(type);
    console.log(l);
    console.log($('#'+type+'_tbody_list .chkPiece').length);
    if ($('#'+type+'_tbody_list .chkPiece').length === l.length) {
      check_all(type, true);
    } else {
      check_all(type, false);
    }
  }
  function get_check_list(type, force = null) {
    let l = [];
    let cnt = 0;
    $('#'+type+'_tbody_list').find('.chkPiece').each(function(i,e) {
      if (force !== null) {
        $(e).prop('checked', force);
      }
      // console.log('i:' + i + ', checked:' + $(e).prop('checked'));
      if ($(e).prop('checked') === true) {
        l[cnt++] = $(e).data('id');
        $(e).next().addClass('toggleChk');
      } else {
        $(e).next().removeClass('toggleChk');
      }
    });
    return l;
  }
  
  // tit_theme 클릭이벤트
  $('.tit_theme').click(function(){
    let role = $(this).data('role');
    // console.log(role);
    $('.tit_theme').removeClass('reverse_color');
    $(this).addClass('reverse_color');
    $(this).find('.next_white').show().prev().hide();
    $(this).siblings().find('.next_white').hide().prev().show();
    
    let index = $('.tit_theme').index(this);
    $('.info--contents > section').hide();
    $('.info--contents > section').eq(index).show();
    
    get_page2('manage_' + role, "<?= base_url().'master/manage/page?tab='; ?>" + role);
  });
  // window 로드이벤트
  $(window).load(function(){
    $('.tit_theme:first').click();
  });
</script>
