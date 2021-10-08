<section class="boxwrap main">
  <h2 class="boxwrap__type meaning">관리자</h2>
  <section class="boxwrap__info">
    <div class="info--tit">
<!--      <a href="#" class="tit_theme" data-role="brand_approval">-->
<!--        <span class="theme_txt">브랜드 승인</span>-->
<!--        <div class="theme_arrow">-->
<!--          <img src="--><?//= base_url(); ?><!--template/back/center/imgs/icon_next.png" width="6" height="auto">-->
<!--          <img src="--><?//= base_url(); ?><!--template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">-->
<!--        </div>-->
<!--      </a>-->
<!--      <a href="#" class="tit_theme" data-role="brand_manage">-->
<!--        <span class="theme_txt">브랜드 관리</span>-->
<!--        <div class="theme_arrow">-->
<!--          <img src="--><?//= base_url(); ?><!--template/back/center/imgs/icon_next.png" width="6" height="auto">-->
<!--          <img src="--><?//= base_url(); ?><!--template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">-->
<!--        </div>-->
<!--      </a>-->
<!--      <a href="#" class="tit_theme" data-role="item_approval">-->
<!--        <span class="theme_txt">상품 승인</span>-->
<!--        <div class="theme_arrow">-->
<!--          <img src="--><?//= base_url(); ?><!--template/back/center/imgs/icon_next.png" width="6" height="auto">-->
<!--          <img src="--><?//= base_url(); ?><!--template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">-->
<!--        </div>-->
<!--      </a>-->
<!--      <a href="#" class="tit_theme" data-role="item_manage">-->
<!--        <span class="theme_txt">등록 상품 보기</span>-->
<!--        <div class="theme_arrow">-->
<!--          <img src="--><?//= base_url(); ?><!--template/back/center/imgs/icon_next.png" width="6" height="auto">-->
<!--          <img src="--><?//= base_url(); ?><!--template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">-->
<!--        </div>-->
<!--      </a>-->
      <a href="#" class="tit_theme" data-role="order">
        <span class="theme_txt">전체 주문 보기</span>
        <div class="theme_arrow">
          <img src="<?= base_url(); ?>template/back/center/imgs/icon_next.png" width="6" height="auto">
          <img src="<?= base_url(); ?>template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">
        </div>
      </a>
<!--      <a href="#" class="tit_theme" data-role="qna">-->
<!--        <span class="theme_txt">1:1 문의</span>-->
<!--        <div class="theme_arrow">-->
<!--          <img src="--><?//= base_url(); ?><!--template/back/center/imgs/icon_next.png" width="6" height="auto">-->
<!--          <img src="--><?//= base_url(); ?><!--template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">-->
<!--        </div>-->
<!--      </a>-->
<!--      <a href="#" class="tit_theme" data-role="review">-->
<!--        <span class="theme_txt">상품 리뷰</span>-->
<!--        <div class="theme_arrow">-->
<!--          <img src="--><?//= base_url(); ?><!--template/back/center/imgs/icon_next.png" width="6" height="auto">-->
<!--          <img src="--><?//= base_url(); ?><!--template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">-->
<!--        </div>-->
<!--      </a>-->
    </div>
    <div class="info--contents scroll-y_hidden">
<!--      <section class="contents_type contents_master scroll-y" id="shop_brand_approval">-->
<!--      </section>-->
<!--      <section class="contents_type contents_master scroll-y" id="shop_brand_manage">-->
<!--      </section>-->
<!--      <section class="contents_type contents_master scroll-y" id="shop_item_approval">-->
<!--      </section>-->
<!--      <section class="contents_type contents_master scroll-y" id="shop_item_manage">-->
<!--      </section>-->
      <section class="contents_type contents_master scroll-y" id="shop_order">
      </section>
<!--      <section class="contents_type contents_master scroll-y" id="shop_qna">-->
<!--      </section>-->
<!--      <section class="contents_type contents_master scroll-y" id="shop_review">-->
<!--      </section>-->
    </div>
  </section>
  <div class="boxwrap__pop pop:box">
    <!-- 상태변경,삭제 클릭 팝업 -->
    <div class="pop:frame frame:question">
      <button class="frame_close">
        <img src="<?= base_url(); ?>template/back/center/imgs/icon_close_black.png" alt="" width="12" height="12" style="opacity: 0.5;">
      </button>
      <div class="frame_cnt">
        <p class="cnt_tit">
          <!-- inactivate 상태로 변경하시겠습니까? / 정말 삭제하시겠습니까? -->
          inactivate 상태로 변경하시겠습니까?
        </p>
        <div class="cnt_btns confirm_btn">
          <button class="btn_cancel font-futura">CANCEL</button>
          <button class="btn_ok remove_absolute font-futura">OK</button>
        </div>
        <script>
          $(document).ready(function(){
            // alert("ok");
            $('.remove_absolute').click(function(){
              // chkPiece가 1개 이상 선택됐을 때, 조건문 removeBtn 클릭 이벤트 참고
              $('input[name="chkPiece"]:checked').closest('tr').remove();
            })
          })
        </script>
      </div>
    </div>
    <!-- 브랜드 추가,수정 버튼 클릭시 -->
    <div class="pop:type pop:add-wrap">
      <div class="named-add add-brand">
        <p class="add-tit">
          <span class="font-futura">Brand</span> 상세
        </p>
        <div class="add-box scroll-y">
          <button class="frame_close">
            <img src="<?= base_url(); ?>template/back/center/imgs/icon_close_black.png" alt="" width="12" height="12" style="opacity: 0.5;">
          </button>
          <dl class="add-contents clearfix">
            <dt class="contents__tit">브랜드명</dt>
            <dd class="contents__data">
              <input type="text" placeholder="브랜드명" class="data_form revise-brand">
            </dd>
            <dt class="contents__tit">대표자명</dt>
            <dd class="contents__data">
              <input type="text" placeholder="대표자명" class="data_form revise-agent">
            </dd>
            <dt class="contents__tit">전화번호</dt>
            <dd class="contents__data">
              <input type="text" placeholder="전화번호" class="data_form revise-call">
              <!--
                                        <div class="data_form">
                                            <select style="width: 100%;" class="locate_sel">
                                                <option value="home">home</option>
                                                <option value="shop">shop</option>
                                            </select>
                                        </div>
-->
            </dd>
            <dt class="contents__tit">이메일</dt>
            <dd class="contents__data">
              <input type="text" placeholder="이메일" class="data_form revise-mail">
            </dd>
            <dt class="contents__tit dt__margin">대표담당자</dt>
            <dd class="contents__data dd__margin">
              <div class="data--head clearfix">
                <span class="col-sp">담당자</span>
                <span class="col-sp">전화번호</span>
                <span class="col-sp">핸드폰번호</span>
                <span class="col-sp">이메일</span>
              </div>
              <div class="data--chief clearfix">
                <span class="col-sp represent__person"></span>
                <span class="col-sp represent__tell"></span>
                <span class="col-sp represent__mobile"></span>
                <span class="col-sp represent__mail"></span>
              </div>
            </dd>
            <!-- 배송/정산/CS/기타 -->
            <dt class="contents__tit dt__margin">기타</dt>
            <dd class="contents__data dd__margin">
              <div class="data--head clearfix">
                <span class="col-sp">담당자</span>
                <span class="col-sp">전화번호</span>
                <span class="col-sp">핸드폰번호</span>
                <span class="col-sp">이메일</span>
              </div>
              <div class="data--staff clearfix">
                <span class="col-sp represent__person"></span>
                <span class="col-sp represent__tell"></span>
                <span class="col-sp represent__mobile"></span>
                <span class="col-sp represent__mail"></span>
              </div>
            </dd>
            <dt class="contents__tit">사업자번호</dt>
            <dd class="contents__data">
              <input type="text" placeholder="사업자번호" class="data_form revise-business">
            </dd>
            <dt class="contents__tit">업태</dt>
            <dd class="contents__data">
              <input type="text" placeholder="업태" class="data_form revise-type">
            </dd>
            <dt class="contents__tit">업종</dt>
            <dd class="contents__data">
              <input type="text" placeholder="업종" class="data_form revise-species">
            </dd>
            <dt class="contents__tit">수수료율</dt>
            <dd class="contents__data">
              <input type="text" placeholder="수수료율" class="data_form revise-fees">
            </dd>
            <dt class="contents__tit">계약체결일</dt>
            <dd class="contents__data">
              <input type="text" placeholder="계약체결일" class="data_form revise-contract">
            </dd>
            <dt class="contents__tit dt__margin">주소</dt>
            <dd class="contents__data dd__margin" style="height: 132px;">
              <div class="postBox clearfix">
                <input type="text" placeholder="우편번호" class="data_form gray_bg gray_txt revise:form revise-address" disabled>
                <button class="postNo">우편번호</button>
              </div>
              <input type="text" placeholder="기본주소" class="data_form gray_bg gray_txt revise:form" disabled>
              <input type="text" placeholder="상세주소" class="data_form gray_bg gray_txt revise:form" disabled>
            </dd>
            <dt class="contents__tit">은행</dt>
            <dd class="contents__data">
              <input type="text" placeholder="은행" class="data_form revise-bank">
            </dd>
            <dt class="contents__tit">계좌번호</dt>
            <dd class="contents__data">
              <input type="text" placeholder="계좌번호" class="data_form revise-account">
            </dd>
            <dt class="contents__tit">예금주</dt>
            <dd class="contents__data">
              <input type="text" placeholder="예금주" class="data_form revise-holder">
            </dd>
            <dt class="contents__tit">입점품목</dt>
            <dd class="contents__data">
              <input type="text" placeholder="입점품목" class="data_form revise-goods">
            </dd>
            <dt class="contents__tit">홈페이지</dt>
            <dd class="contents__data">
              <input type="text" placeholder="홈페이지" class="data_form revise-homepage">
            </dd>
            <dt class="contents__tit">인스타</dt>
            <dd class="contents__data">
              <input type="text" placeholder="인스타" class="data_form revise-insta">
            </dd>
            <dt class="contents__tit">사업자등록증</dt>
            <dd class="contents__data file_form_open">
              <label class="data_form file_form">파일열기
                <span class="file_arrow"></span>
                <input type="file" value="파일열기" class="imgOpen">
              </label>
              <div class="file_thumb revise-registration">
                <img src="" alt="" class="thumb_img">
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
            <dt class="contents__tit">등록일</dt>
            <dd class="contents__data">
              <input type="text" placeholder="등록일" class="data_form revise-enrollDate">
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
    </div>
    <!-- 승인요청,반려,판매중,판매중지,판매종료 셀렉트 팝업 -->
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
              <input type="button" value="승인" class="result--val result--data">
              <span class="result--arrow file_arrow"></span>
            </div>
            <!-- 선택 : 신청,승인,반려 -->
            <div class="choice__cnt choice__info" style="top: -36px; display: none;">
              <span class="file_arrow cnt_arrow" style="top: 48px;"></span>
              <div class="cnt--button">
                <input type="button" value="승인요청" class="box--btn box--val">
                <input type="button" value="반려" class="box--btn box--val">
                <input type="button" value="판매중" class="box--btn box--val">
                <input type="button" value="판매 중지" class="box--btn box--val">
                <input type="button" value="판매 종료" class="box--btn box--val">
              </div>
            </div>
            <script>
              // result--data 클릭
              $('.result--data').click(function(){
                $('.choice__info').show();
                let approve = $(this).val().indexOf("승인요청");
                let reject = $(this).val().indexOf("반려");
                let solding = $(this).val().indexOf("판매중");
                let soldStop = $(this).val().indexOf("판매 중지");
                let soldOut = $(this).val().indexOf("판매 종료");
                
                if(approve !== -1){
                  $('.choice__info').css('top','0');
                  $(this).parent().next().find('.cnt_arrow').css('top','12px');
                }
                else if(reject !== -1){
                  $('.choice__info').css('top','-36px');
                  $(this).parent().next().find('.cnt_arrow').css('top','48px');
                }
                else if(solding !== -1){
                  $('.choice__info').css('top','-72px');
                  $(this).parent().next().find('.cnt_arrow').css('top','84px');
                }
                else if(soldStop !== -1){
                  $('.choice__info').css('top','-108px');
                  $(this).parent().next().find('.cnt_arrow').css('top','120px');
                }
                else if(soldOut !== -1){
                  $('.choice__info').css('top','-144px');
                  $(this).parent().next().find('.cnt_arrow').css('top','155px');
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
    <!-- 브랜드 샵보기 팝업 -->
    <div class="pop:type pop:frame frame:mail frame:shop">
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
                                    <span class="display_centerImg">
                                        <img src="<?= base_url(); ?>uploads/vendor_logo_image/default.jpg" alt="" width="46" height="46" class="span-img">
                                    </span>
            <p class="display-type">
              <span class="brandNaming">2</span><br>
              <span class="type-name" style="padding: 0;">shop</span>
            </p>
            <div class="display-now">승인</div>
          </div>
          <div class="tit_table table_form:mail">
            <div class="table_scroll scroll-y" style="height: 299px;">
              <table class="mail_table">
                <colgroup>
                  <col width="16%">
                  <col width="84%">
                </colgroup>
                <tbody>
                <tr>
                  <th>브랜드명</th>
                  <td class="shop__brand"></td>
                </tr>
                <tr>
                  <th>대표자명</th>
                  <td class="shop__agent"></td>
                </tr>
                <tr>
                  <th>전화번호</th>
                  <td class="shop__tel"></td>
                </tr>
                <tr>
                  <th>이메일</th>
                  <td class="shop__mail"></td>
                </tr>
                <tr>
                  <th>대표담당자</th>
                  <td class="shop__chief clearfix">
                    <div class="cell__info clearfix">
                      <span>담당자</span>
                      <span>전화번호</span>
                      <span>핸드폰번호</span>
                      <span>이메일</span>
                    </div>
                    <div class="cell__data clearfix">
                      <span class="data--set"></span>
                      <span class="data--set"></span>
                      <span class="data--set"></span>
                      <span class="data--set"></span>
                    </div>
                  </td>
                </tr>
                <tr>
                  <!-- 배송/정산/CS/기타 -->
                  <th>기타</th>
                  <td class="shop__staff clearfix">
                    <div class="cell__info clearfix">
                      <span>담당자</span>
                      <span>전화번호</span>
                      <span>핸드폰번호</span>
                      <span>이메일</span>
                    </div>
                    <div class="cell__data clearfix">
                      <span class="data--set"></span>
                      <span class="data--set"></span>
                      <span class="data--set"></span>
                      <span class="data--set"></span>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>사업자번호</th>
                  <td class="shop__business"></td>
                </tr>
                <tr>
                  <th>업태</th>
                  <td class="shop__type"></td>
                </tr>
                <tr>
                  <th>업종</th>
                  <td class="shop__species"></td>
                </tr>
                <tr>
                  <th>수수료율</th>
                  <td class="shop__fees"></td>
                </tr>
                <tr>
                  <th>계약체결일</th>
                  <td class="shop__contract"></td>
                </tr>
                <tr>
                  <th>주소</th>
                  <td class="shop__address"></td>
                </tr>
                <tr>
                  <th>은행</th>
                  <td class="shop__bank"></td>
                </tr>
                <tr>
                  <th>계좌번호</th>
                  <td class="shop__account"></td>
                </tr>
                <tr>
                  <th>예금주</th>
                  <td class="shop__holder"></td>
                </tr>
                <tr>
                  <th>입점품목</th>
                  <td class="shop__goods"></td>
                </tr>
                <tr>
                  <th>홈페이지</th>
                  <td>
                    <div class="space:layer">
                      <div class="layer--position shop__homepage scroll-x">
                      
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>인스타</th>
                  <td>
                    <div class="space:layer">
                      <div class="layer--position shop__insta scroll-x">
                      
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>사업자등록증</th>
                  <td class="shop__registration">
                    <a href="#">
                      <img class="span-img" src="" alt="사업자등록증" style="width: 100%; height: auto;">
                    </a>
                  </td>
                </tr>
                <!-- 등록일 유지할 것인지 정수님과 제혁님께 물어볼 것 -->
                <tr>
                  <th>등록일</th>
                  <td class="shop__enrollDate"></td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- 승인/미승인 팝업 -->
    <div class="pop:type pop:frame frame:blog frame:choice frame:approve">
      <button class="frame_close">
        <img src="<?= base_url(); ?>template/back/center/imgs/icon_close_black.png" alt="" width="12" height="12" style="opacity: 0.5;">
      </button>
      <div class="frame_cnt">
        <p class="frame_tit blog_tit approve_tit font-futura">Shop Approval</p>
        <div class="frame_type clearfix" style="padding: 0;">
          <p class="frame_tit choice-tit pull-left">미승인</p>
          <div class="choice-box slideBtn pull-left">
            <span class="slideSpot"></span>
            <script>
              $(function(){
                let left = $('.slideSpot').css('left');
                
                $(document).on('click','.slideBtn',function(){
                  if(left === '4px'){
                    // 승인으로 될 때
                    $(this).children('.slideSpot').animate({left : '36px'});
                    $(this).addClass('slideActiveBtn');
                  }
                  else if(left === '36px'){
                    // 미승인으로 될 때
                    $(this).children('.slideSpot').animate({left : '4px'});
                    $(this).removeClass('slideActiveBtn');
                  }
                })
              })
            </script>
          </div>
          <p class="frame_tit choice-tit pull-left">승인</p>
        </div>
      </div>
      <div class="cnt_btns confirm_btn">
        <button class="btn_cancel font-futura">CANCEL</button>
        <button class="btn_ok btn_save font-futura">SAVE</button>
      </div>
    </div>
    <!-- 비밀번호 변경 -->
    <div class="pop:type pop:frame frame:blog frame:pw">
      <button class="frame_close">
        <img src="<?= base_url(); ?>template/back/center/imgs/icon_close_black.png" alt="" width="12" height="12" style="opacity: 0.5;">
      </button>
      <div class="frame_cnt" style="padding-top: 8px; box-sizing: border-box;">
        <p class="frame_tit blog_tit">
          비밀번호 변경
        </p>
        <div class="cnt_enroll clearfix">
          <div class="enroll_write pw_form">
            <input type="text" class="form_write" placeholder="pw_write">
          </div>
          <div class="enroll_write pw_form">
            <input type="password" class="form_write" placeholder="pw_confirm">
          </div>
        </div>
        <div class="cnt_btns confirm_btn">
          <button class="btn_cancel font-futura">CANCEL</button>
          <button class="btn_ok font-futura">OK</button>
        </div>
      </div>
    </div>
    <!-- 카테고리 추가 팝업 -->
    <div class="pop:type pop:frame frame:blog frame:category">
      <button class="frame_close">
        <img src="<?= base_url(); ?>template/back/center/imgs/icon_close_black.png" alt="" width="12" height="12" style="opacity: 0.5;">
      </button>
      <div class="frame_cnt">
        <div class="cnt__btns clearfix">
          <button id="addShop" class="cnt__button chkBtnStyle"><span class="font-futura">Shop-main</span> 추가</button>
          <button id="addCategory" class="cnt__button"><span class="font-futura">Category</span> 추가</button>
          <script>
            $(function(){
              // alert('ok');
              $('.cnt__button').click(function(){
                let index = $('.cnt__button').index(this);
                $(this).addClass('chkBtnStyle').siblings().removeClass('chkBtnStyle');
                
                $('.box--insert').hide();
                $('.box--insert').eq(index).show();
              })
            })
          </script>
        </div>
        <ul class="cnt__boxes">
          <li class="box--insert" id="shop-main">
            <div class="main-selc">
              <span class="file_arrow cat_arrow"></span>
              <input type="button" value="추가할 메뉴를 선택해주세요" class="main-val">
              <script>
                $('#shop-main .main-val').click(function(){
                  $('#valShop').toggle();
                })
              </script>
            </div>
            <div class="main-btnBox" id="valShop">
              <input type="button" value="BEST ITEM" class="font-futura">
              <input type="button" value="NEW IN" class="font-futura">
              <input type="button" value="FOUNDY pick" class="font-futura">
            </div>
            <script>
              $('#valShop input').click(function(){
                let val = $(this).val();
                $(this).parent().hide().prev().find('.main-val').val(val);
              })
            </script>
          </li>
          <li class="box--insert" id="cat-main" style="display: none;">
            <div class="main-selc">
              <span class="file_arrow cat_arrow"></span>
              <input type="button" value="추가할 메뉴를 선택해주세요" class="main-val">
              <script>
                $('#cat-main .main-val').click(function(){
                  $('#valCategory').toggle();
                })
              </script>
            </div>
            <div class="main-btnBox" id="valCategory">
              <input type="button" value="YOGA BEST ITEM" class="font-futura">
              <input type="button" value="VEGAN BEST ITEM" class="font-futura">
              <input type="button" value="HEALING BEST ITEM" class="font-futura">
            </div>
            <script>
              $('#valCategory input').click(function(){
                let val = $(this).val();
                $(this).parent().hide().prev().find('.main-val').val(val);
              })
            </script>
          </li>
        </ul>
      </div>
      <div class="cnt_btns confirm_btn">
        <button class="btn_cancel font-futura">CANCEL</button>
        <button class="btn_ok btn_save font-futura">SAVE</button>
      </div>
    </div>
    <!-- 아이템정보 팝업 -->
    <div class="pop:type pop:frame frame:mail frame:item">
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
                                    <span class="display_centerImg">
                                        <img src="<?= base_url(); ?>uploads/vendor_logo_image/default.jpg" alt="" width="46" height="46" class="span-img">
                                    </span>
            <p class="display-type">
              <span class="brandNaming">2</span><br>
              <span class="type-name" style="padding: 0;">shop</span>
            </p>
            <div class="display-now">승인</div>
          </div>
          <div class="tit_table table_form:mail">
            <div class="table_scroll scroll-y" style="height: 299px;">
              <table class="mail_table">
                <colgroup>
                  <col width="16%">
                  <col width="84%">
                </colgroup>
                <tbody>
                <tr>
                  <th>브랜드명</th>
                  <td class="view__brand"></td>
                </tr>
                <tr>
                  <th>상품코드</th>
                  <td class="view__code"></td>
                </tr>
                <tr>
                  <th>카테고리</th>
                  <td class="view__cat"></td>
                </tr>
                <tr>
                  <th>상품기본설명</th>
                  <td class="view__ex"></td>
                </tr>
                <tr>
                  <th>상품유형</th>
                  <td class="view__goodType"></td>
                </tr>
                <tr>
                  <th>과세여부</th>
                  <td class="view__taxation"></td>
                </tr>
                <tr>
                  <th>배송소요일</th>
                  <td class="view__deliveryDates"></td>
                </tr>
                <tr>
                  <th>배송비유형</th>
                  <td class="view__deliveryFee"></td>
                </tr>
                <tr>
                  <th>상품유의사항</th>
                  <td class="view__goodAlert"></td>
                </tr>
                <tr>
                  <th>주문유의사항</th>
                  <td class="view__orderAlert"></td>
                </tr>
                <tr>
                  <th>배송유의사항</th>
                  <td class="view__deliveryAlert"></td>
                </tr>
                <tr>
                  <th>상품고시정보</th>
                  <td class="view__padding">
                    <div class="space:layer">
                      <div class="layer--position view__noticeInfo scroll-y">
                      
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>인증정보</th>
                  <td class="view__certiInfo"></td>
                </tr>
                <tr>
                  <th>상품가격정보</th>
                  <td class="view__priceInfo"></td>
                </tr>
                <tr>
                  <th>옵션</th>
                  <td class="view__option"></td>
                </tr>
                <tr>
                  <th>등록일</th>
                  <td class="view__enrollDate"></td>
                </tr>
                <tr>
                  <th>승인일자</th>
                  <td class="view__approveDate"></td>
                </tr>
                <tr>
                  <th>상품이미지(필수)</th>
                  <td class="view__regMain">
                    <img class="span-img" src="" alt="상품이미지(필수)" style="width: 100%; height: auto;">
                  </td>
                </tr>
                <tr>
                  <th>상품이미지1</th>
                  <td class="view__reg1">
                    <img class="span-img" src="" alt="상품이미지(필수)" style="width: 100%; height: auto;">
                  </td>
                </tr>
                <tr>
                  <th>상품이미지2</th>
                  <td class="view__reg2">
                    <img class="span-img" src="" alt="상품이미지(필수)" style="width: 100%; height: auto;">
                  </td>
                </tr>
                <tr>
                  <th>상품이미지3</th>
                  <td class="view__reg3">
                    <img class="span-img" src="" alt="상품이미지(필수)" style="width: 100%; height: auto;">
                  </td>
                </tr>
                <tr>
                  <th>상품이미지4</th>
                  <td class="view__reg4">
                    <img class="span-img" src="" alt="상품이미지(필수)" style="width: 100%; height: auto;">
                  </td>
                </tr>
                <tr>
                  <th>상품이미지5</th>
                  <td class="view__reg5">
                    <img class="span-img" src="" alt="상품이미지(필수)" style="width: 100%; height: auto;">
                  </td>
                </tr>
                <tr>
                  <th>상품상세페이지</th>
                  <td class="view__regDetail">
                    <p style="margin: 0;">
                      <!-- <img class="span-img" src="" alt="상품이미지(필수)" style="width: 100%; height: auto;"> -->
                    </p>
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- addBtn 호버이벤트 -->
  <script>
    $('.named-fn').on({
      mousemove: function(e){
        // console.log(e.pageX);
        let offset = $(this).offset();
        // 174     848, 964
        // console.log(offset.top,offset.left);
        
        // named-fn width
        let w = $(this).width();
        // console.log(w);   76
        let h = offset.top + $(this).height();
        // console.log( w + offset.left );    936, 1052
        // console.log(h);                    210
        
        if(e.pageX >= offset.left || e.pageX <= w || e.pageY >= offset.top || e.pageY <= h) {
          let has = $(this).hasClass('addBtn');
          if(has === true){
            $(this).next().next().addClass('disabledBtn').attr('disabled',true);
          }
          else {
            $(this).prev().prev().addClass('disabledBtn').attr('disabled',true);
          }
        }
      },
      mouseout: function(e){
        let offset = $(this).offset();
        let w = $(this).width();
        let h = offset.top + $(this).height();
        
        
        if(e.pageX <= offset.left || e.pageX >= w || e.pageY <= offset.top || e.pageY >= h) {
          // if(e.pageX < 964){
          $(this).closest('.namedBtn').find('.named-fn').removeClass('disabledBtn').attr('disabled',false);
          // }
          // else {
          // $(this).closest('.namedBtn').find('.addBtn').removeClass('disabledBtn').attr('disabled',false);
          // }
        }
      }
    })
    /* $('.named-fn').hover(function(e){
                          // console.log(e.pageX);
                          let offset = $(this).offset();
                          // 174     848, 964
                          // console.log(offset.top,offset.left);
                          // named-fn width
                          let w = $(this).width();
                          // console.log(w);   76
                          let h = offset.top + $(this).height();
                          // console.log( w + offset.left );    936, 1052
                          // console.log(h);                    210
                          if(e.pageX >= offset.left || e.pageX <= w || e.pageY >= offset.top || e.pageY <= h) {
                              let has = $(this).hasClass('addBtn');
                              if(has === true){
                                  $(this).next().next().addClass('disabledBtn').attr('disabled',true);
                              }
                              else {
                                  $(this).prev().prev().addClass('disabledBtn').attr('disabled',true);
                              }
                          }
                    },function(e){
                          let offset = $(this).offset();
                          let w = $(this).width();
                          let h = offset.top + $(this).height();
                          if(e.pageX <= offset.left || e.pageX >= w || e.pageY <= offset.top || e.pageY >= h) {
                              if(e.pageX < 964){
                                  $(this).closest('.namedBtn').find('.named-fn').removeClass('disabledBtn').attr('disabled',false);
                              }
                              else {
                                  $(this).closest('.namedBtn').find('.addBtn').removeClass('disabledBtn').attr('disabled',false);
                              }
                          }
                     }) */
  </script>
  <!-- addBtn 클릭이벤트 -->
  <script>
    $('.addBtn').click(function(){
      $('.boxwrap__pop').show().children('div[class$=add-wrap]').show().find('.add-brand').show();
      /*
                        let name = $(this).attr('class');
                        // console.log(name);
                        
                        let split = name.split('');
                        // console.log(split);
                        
                        // split 으로 'v','g' 값 가져오기
                        let exist_v = split.indexOf('v');
                        let exist_g = split.indexOf('g');
                        // console.log(exist_1,exist_2,exist_3);
                        
                        if(exist_v != -1){
                            // console.log(1); ok
                            $('.boxwrap__pop').show().children('div[class$=add-wrap]').show().find('.add-brand').show();
                        }
                        else if(exist_g != -1){
                            $('.boxwrap__pop').show().children('div[class$=add-wrap]').show().find('.add-mail').show();
                        }
                        */
    })
  </script>
  <!-- removeBtn 클릭이벤트 -->
  <script>
    $('.removeBtn').click(function(){
      let txt = '정말 삭제하시겠습니까?'
      $('.boxwrap__pop').show().children('div[class*=question]').show()
        .find('.cnt_tit').text(txt);
    })
  </script>
  <!-- 각 팝업창 닫기 이벤트 -->
  <script>
    // frame_close 클릭
    $('.frame_close').click(function(){
      $(this).closest('.named-add').hide().parent('div[class*="pop:type"]').hide().parent('.boxwrap__pop').hide();
      $(this).closest('div[class*=pop\:frame]').hide().parent('.boxwrap__pop').hide();
      
      /* 테이블 내용 초기화 */
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
      
      $('input[class*="revise-brand"]').val('');
      $('input[class*="revise-agent"]').val('');
      $('input[class*="revise-call"]').val('');
      $('input[class*="revise-mail"]').val('');
      $('.data--chief .represent__person').text('');
      $('.data--chief .represent__tell').text('');
      $('.data--chief .represent__mobile').text('');
      $('.data--chief .represent__mail').text('');
      $('.data--staff .represent__person').text('');
      $('.data--staff .represent__tell').text('');
      $('.data--staff .represent__mobile').text('');
      $('.data--staff .represent__mail').text('');
      $('input[class*="revise-business"]').val('');
      $('input[class*="revise-type"]').val('');
      $('input[class*="revise-species"]').val('');
      $('input[class*="revise-fees"]').val('');
      $('input[class*="revise-contract"]').val('');
      $('input[class*="revise-bank"]').val('');
      $('input[class*="revise-account"]').val('');
      $('input[class*="revise-holder"]').val('');
      $('input[class*="revise-goods"]').val('');
      $('input[class*="revise-homepage"]').val('');
      $('input[class*="revise-insta"]').val('');
      $('div[class*="revise-registration img"]').attr('src','');
      $('input[class*="revise-enrollDate"]').val('');
    })
    // btn_cancel, btn_ok 클릭
    $('.confirm_btn button').on({
      click: function(){
        $(this).closest('div[class*=add]').hide().parent('.boxwrap__pop').hide();
        // console.log(1) ok;
        $(this).closest('div[class*="pop:type"]').hide().parent('.boxwrap__pop').hide();
        
        /* 테이블 내용 초기화 */
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
        
        $('input[class*="revise-brand"]').val('');
        $('input[class*="revise-agent"]').val('');
        $('input[class*="revise-call"]').val('');
        $('input[class*="revise-mail"]').val('');
        $('.data--chief .represent__person').text('');
        $('.data--chief .represent__tell').text('');
        $('.data--chief .represent__mobile').text('');
        $('.data--chief .represent__mail').text('');
        $('.data--staff .represent__person').text('');
        $('.data--staff .represent__tell').text('');
        $('.data--staff .represent__mobile').text('');
        $('.data--staff .represent__mail').text('');
        $('input[class*="revise-business"]').val('');
        $('input[class*="revise-type"]').val('');
        $('input[class*="revise-species"]').val('');
        $('input[class*="revise-fees"]').val('');
        $('input[class*="revise-contract"]').val('');
        $('input[class*="revise-bank"]').val('');
        $('input[class*="revise-account"]').val('');
        $('input[class*="revise-holder"]').val('');
        $('input[class*="revise-goods"]').val('');
        $('input[class*="revise-homepage"]').val('');
        $('input[class*="revise-insta"]').val('');
        $('div[class*="revise-registration img"]').attr('src','');
        $('input[class*="revise-enrollDate"]').val('');
      }
    })
    
    // ESC 키업
    $(window).keyup(function(e){
      if(e.keyCode == 27) {
        $('.boxwrap__pop').hide().children('div[class*="pop:type"]').hide()
          .children('.named-add').hide();
        
        /* 테이블 내용 초기화 */
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
        
        $('input[class*="revise-brand"]').val('');
        $('input[class*="revise-agent"]').val('');
        $('input[class*="revise-call"]').val('');
        $('input[class*="revise-mail"]').val('');
        $('.data--chief .represent__person').text('');
        $('.data--chief .represent__tell').text('');
        $('.data--chief .represent__mobile').text('');
        $('.data--chief .represent__mail').text('');
        $('.data--staff .represent__person').text('');
        $('.data--staff .represent__tell').text('');
        $('.data--staff .represent__mobile').text('');
        $('.data--staff .represent__mail').text('');
        $('input[class*="revise-business"]').val('');
        $('input[class*="revise-type"]').val('');
        $('input[class*="revise-species"]').val('');
        $('input[class*="revise-fees"]').val('');
        $('input[class*="revise-contract"]').val('');
        $('input[class*="revise-bank"]').val('');
        $('input[class*="revise-account"]').val('');
        $('input[class*="revise-holder"]').val('');
        $('input[class*="revise-goods"]').val('');
        $('input[class*="revise-homepage"]').val('');
        $('input[class*="revise-insta"]').val('');
        $('div[class*="revise-registration img"]').attr('src','');
        $('input[class*="revise-enrollDate"]').val('');
      }
    })
    // 팝업창 클릭
    $(window).click(function(e){
      let target = e.target.className;
      // console.log(target);
      
      if(target == 'boxwrap__pop' || target == 'pop:type pop:add-wrap'){
        $('.boxwrap__pop').hide().children('div[class*="pop:type"]').hide()
          .children('.named-add').hide();
        
        /* 테이블 내용 초기화 */
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
        
        $('input[class*="revise-brand"]').val('');
        $('input[class*="revise-agent"]').val('');
        $('input[class*="revise-call"]').val('');
        $('input[class*="revise-mail"]').val('');
        $('.data--chief .represent__person').text('');
        $('.data--chief .represent__tell').text('');
        $('.data--chief .represent__mobile').text('');
        $('.data--chief .represent__mail').text('');
        $('.data--staff .represent__person').text('');
        $('.data--staff .represent__tell').text('');
        $('.data--staff .represent__mobile').text('');
        $('.data--staff .represent__mail').text('');
        $('input[class*="revise-business"]').val('');
        $('input[class*="revise-type"]').val('');
        $('input[class*="revise-species"]').val('');
        $('input[class*="revise-fees"]').val('');
        $('input[class*="revise-contract"]').val('');
        $('input[class*="revise-bank"]').val('');
        $('input[class*="revise-account"]').val('');
        $('input[class*="revise-holder"]').val('');
        $('input[class*="revise-goods"]').val('');
        $('input[class*="revise-homepage"]').val('');
        $('input[class*="revise-insta"]').val('');
        $('div[class*="revise-registration img"]').attr('src','');
        $('input[class*="revise-enrollDate"]').val('');
      }
    })
  </script>
</section>
<!-- 부분취소 팝업 -->
<div class="pop-wrap pop-orderRetract" id="fd-shop">
  <div class="pop__cnt">
    <div class="cnt-wrap" id="cancel-popup-wrap">
    </div>
    <button class="cnt-close" onclick="close_cancel_popup()">
      <img class="close--symbol" src="<?= base_url(); ?>template/front/header/imgs/icon_close_black.png" width="12" height="12" alt="닫기" style="opacity: 0.2;">
    </button>
  </div>
</div>
<!-- 교환(반품) 신청 팝업 -->
<div class="pop-wrap pop-changeRecall" id="fd-changeRecall">
  <div class="pop__cnt">
    <!-- 교환(반품) 신청 -->
    <p class="cnt-tit">교환 신청</p>
    <button class="cnt-close">
      <img class="close--symbol" src="<?= base_url(); ?>template/front/header/imgs/icon_close_black.png" width="12" height="12" alt="닫기" style="opacity: 0.2;">
    </button>
    <form class="cnt-txtForm">
      <textarea class="txtForm--area" id="req-reason" placeholder="사유를 작성해주세요."></textarea>
    </form>
    <button class="cnt-confirmEnroll" onclick="order_req();">확인</button>
  </div>
</div>
<!-- 정보 팝업 -->
<div class="pop-wrap pop-itemStatus" id="fd-itemStatus">
</div>
<!-- 엑셀로 다운로드 팝업 -->
<div class="pop-wrap pop-infoExcel" id="fd-infoExcel">
</div>
<script>
  // tit_theme 클릭이벤트
  $('.tit_theme').click(function(){
    let role = $(this).data('role');
  
    // console.log(role);
    
    if (role === 'modify') {
      return false;
    }
    $('.theme_modify').hide();
    
    $('.tit_theme').removeClass('reverse_color');
    $(this).addClass('reverse_color');
    $(this).find('.next_white').show().prev().hide();
    $(this).siblings().find('.next_white').hide().prev().show();
  
    let index = $('.tit_theme').index(this);
    $('.info--contents > section').hide();
    $('.info--contents > section').eq(index).show();
  
    // shop 메뉴 에서만 스크립트 추가
    let type = $(this).find('.theme_txt').text();
    let alphabet = type.indexOf('브랜드');
  
    if(alphabet === '-1'){
      $('.info--contents > section:eq('+ index + ') .namedBtn' ).hide();
    }
   
    get_page2('shop_' + role, "<?= base_url().'master/shop/page?tab='; ?>" + role);
  });
  // window 로드이벤트
  $(window).load(function(){
    $('.tit_theme:first').click();
  });
</script>
