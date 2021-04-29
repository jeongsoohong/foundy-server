<section class="boxwrap main">
  <h2 class="boxwrap__type meaning">관리자</h2>
  <section class="boxwrap__info">
    <div class="info--tit">
      <a href="#" class="tit_theme">
        <span class="theme_txt">슬라이더 관리</span>
        <div class="theme_arrow">
          <img src="<?= base_url(); ?>template/back/center/imgs/icon_next.png" width="6" height="auto">
          <img src="<?= base_url(); ?>template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">
        </div>
      </a>
      <a href="#" class="tit_theme">
        <span class="theme_txt">자동발송 이메일</span>
        <div class="theme_arrow">
          <img src="<?= base_url(); ?>template/back/center/imgs/icon_next.png" width="6" height="auto">
          <img src="<?= base_url(); ?>template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">
        </div>
      </a>
      <a href="#" class="tit_theme">
        <span class="theme_txt">쿠폰 관리</span>
        <div class="theme_arrow">
          <img src="<?= base_url(); ?>template/back/center/imgs/icon_next.png" width="6" height="auto">
          <img src="<?= base_url(); ?>template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">
        </div>
      </a>
      <a href="#" class="tit_theme">
        <span class="theme_txt">샵 메인 관리</span>
        <div class="theme_arrow">
          <img src="<?= base_url(); ?>template/back/center/imgs/icon_next.png" width="6" height="auto">
          <img src="<?= base_url(); ?>template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">
        </div>
      </a>
      <a href="#" class="tit_theme">
        <span class="theme_txt">카테고리 메인 관리</span>
        <div class="theme_arrow">
          <img src="<?= base_url(); ?>template/back/center/imgs/icon_next.png" width="6" height="auto">
          <img src="<?= base_url(); ?>template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">
        </div>
      </a>
      <a href="#" class="tit_theme">
        <span class="theme_txt">문자 발송 관리</span>
        <div class="theme_arrow">
          <img src="<?= base_url(); ?>template/back/center/imgs/icon_next.png" width="6" height="auto">
          <img src="<?= base_url(); ?>template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">
        </div>
      </a>
      <!--
                        <a href="#" class="tit_theme">
                          <span class="theme_txt">푸시 발송</span>
                          <div class="theme_arrow">
                            <img src="<?= base_url(); ?>template/back/center/imgs/icon_next.png" width="6" height="auto">
                            <img src="<?= base_url(); ?>template/back/center/imgs/icon_next_white.png" width="6" height="auto" style="display: none;" class="next_white">
                          </div>
                        </a>
-->
      <script>
        // window 로드이벤트
        $(window).load(function(){
          // 첫번째 목록의 콘텐츠만 보이게!
          $('.tit_theme:first').addClass('reverse_color');
          $('.tit_theme:first').find('.next_white').show().prev().hide();
          $('.info--contents > section').hide();
          $('.info--contents > section:first').show();
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
      </script>
    </div>
    <div class="info--contents scroll-y_hidden">
      <section class="contents_type contents_master scroll-y">
        <h3 class="meaning">슬라이더 관리</h3>
        <div class="type_wrap">
          <p class="type_tit slide_tit font-futura">Main Slider</p>
          <div class="type_box shadow">
            <div class="type_named">
              <div class="namedBtn clearfix">
                <button class="named-fn addBtn addSlider" style="/* margin-right: 28px; */">+ 추가</button>
                <span class="named-txt font-futura">or</span>
                <button class="named-fn removeBtn">- 삭제</button>
              </div>
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
                    <div class="table-media table-slide tableBody">
                      <table class="table-box manage_table">
                        <colgroup>
                          <col width="4%">
                          <col width="9%">
                          <col width="9%">
                          <col width="9%">
                          <col width="15%">
                          <col width="16%">
                          <col width="10%">
                          <col width="10%">
                          <col width="18%">
                        </colgroup>
                        <thead>
                        <tr>
                          <th class="td-label chkTh">
                            <input class="chkAll chkAll_1" type="checkbox" name="chkAll">
                            <label class="chkLabel"></label>
                          </th>
                          <th>
                            <span class="th-span">이미지</span>
                          </th>
                          <th>
                            <span class="th-span">제목</span>
                          </th>
                          <th>
                            <span class="th-span">카테고리</span>
                          </th>
                          <th>
                            <span class="th-span">설명</span>
                          </th>
                          <th>
                            <span class="th-span">링크</span>
                          </th>
                          <th>
                            <span class="th-span">위치</span>
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
                            <col width="9%">
                            <col width="9%">
                            <col width="9%">
                            <col width="15%">
                            <col width="16%">
                            <col width="10%">
                            <col width="10%">
                            <col width="18%">
                          </colgroup>
                          <tbody>
                          <tr>
                            <td class="td-label chkTd">
                              <input class="chkPiece" type="checkbox" name="chkPiece">
                              <label class="chkLabel"></label>
                            </td>
                            <td>
                                                                            <span class="td-span">
                                                                                <img class="span-img" src="<?= base_url(); ?>uploads/slider_image/slider_6_thumb.jpg?id=1598330672?random=1611135310800" alt="" width="46" height="46">
                                                                            </span>
                            </td>
                            <td>
                              <span class="td-span">테스트</span>
                            </td>
                            <td>
                              <span class="td-span">테스트</span>
                            </td>
                            <td>
                              <span class="td-span">test	</span>
                            </td>
                            <td>
                              <span class="td-span td-link"><?= base_url(); ?>home/shop/product?id=80</span>
                            </td>
                            <td>
                              <span class="td-span td-status td-locate font-futura locate_shop">shop</span>
                            </td>
                            <td class="posture">
                              <span class="td-span td-status td-playing font-futura inactivate">inactivate</span>
                            </td>
                            <td class="fn-td-btn clearfix">
                              <div class="td-btn-wrap">
                                <p class="td-span td-btn td-revise">
                                  <span class="btn-ic btn--modify">
                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                  </span>
                                  수정
                                </p>
                                <p class="td-span td-btn td-posture">
                                  <span class="btn-ic btn--display">
                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                  </span>
                                  상태변경
                                </p>
                                <!--
                                                                                <p class="td-span td-btn">
                                                                                    <span class="btn-ic btn--remove">
                                                                                        <img src="./<?= base_url(); ?>template/back/master/icon/ic_trash.png" class="ic-img" width="10" height="auto" alt="">
                                                                                    </span>
삭제
                                                                                </p>
-->
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td class="td-label chkTd">
                              <input class="chkPiece" type="checkbox" name="chkPiece">
                              <label class="chkLabel"></label>
                            </td>
                            <td>
                              <span class="td-span">
                                <img class="span-img" src="<?= base_url(); ?>uploads/slider_image/slider_5_thumb.jpg?id=1598330283?random=1611135310801" alt="" width="46" height="46">
                              </span>
                            </td>
                            <td>
                              <span class="td-span">테스트</span>
                            </td>
                            <td>
                              <span class="td-span">테스트</span>
                            </td>
                            <td>
                              <span class="td-span">test	</span>
                            </td>
                            <td>
                              <span class="td-span td-link"><?= base_url(); ?>home/shop/product?id=80</span>
                            </td>
                            <td>
                              <span class="td-span td-status td-locate font-futura locate_home">home</span>
                            </td>
                            <td class="posture">
                              <span class="td-span td-status td-playing font-futura activate">activate</span>
                            </td>
                            <td class="fn-td-btn clearfix">
                              <div class="td-btn-wrap">
                                <p class="td-span td-btn td-revise">
                                  <span class="btn-ic btn--modify">
                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                  </span>
                                  수정
                                </p>
                                <p class="td-span td-btn td-posture">
                                  <span class="btn-ic btn--display">
                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                  </span>
                                  상태변경
                                </p>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td class="td-label chkTd">
                              <input class="chkPiece" type="checkbox" name="chkPiece">
                              <label class="chkLabel"></label>
                            </td>
                            <td>
                              <span class="td-span">
                                <img class="span-img" src="<?= base_url(); ?>uploads/slider_image/slider_4_thumb.jpg?id=1593782796?random=1611135310801" alt="" width="46" height="46">
                              </span>
                            </td>
                            <td>
                              <span class="td-span">Welcome, FOUNDY!</span>
                            </td>
                            <td>
                              <span class="td-span">PROMOTION	</span>
                            </td>
                            <td>
                              <span class="td-span">지금 파운디에 요가&#38;필라테스 스튜디오 등록하고, <br>다양한 서비스를 무료로 이용해보세요.	</span>
                            </td>
                            <td>
                              <span class="td-span td-link"><?= base_url(); ?>view?id=8</span>
                            </td>
                            <td>
                              <span class="td-span td-status td-locate font-futura locate_shop">home</span>
                            </td>
                            <td class="posture">
                              <span class="td-span td-status td-playing font-futura activate">activate</span>
                            </td>
                            <td class="fn-td-btn clearfix">
                              <div class="td-btn-wrap">
                                <p class="td-span td-btn td-revise">
                                  <span class="btn-ic btn--modify">
                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                  </span>
                                  수정
                                </p>
                                <p class="td-span td-btn td-posture">
                                  <span class="btn-ic btn--display">
                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                  </span>
                                  상태변경
                                </p>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td class="td-label chkTd">
                              <input class="chkPiece" type="checkbox" name="chkPiece">
                              <label class="chkLabel"></label>
                            </td>
                            <td>
                              <span class="td-span">
                                <img class="span-img" src="<?= base_url(); ?>uploads/slider_image/slider_2_thumb.jpg?id=1593138517?random=1611135310801" alt="" width="44" height="44">
                              </span>
                            </td>
                            <td>
                              <span class="td-span">Meet Yoga &#38; Vegan brands,</span>
                            </td>
                            <td>
                              <span class="td-span">PROMOTION</span>
                            </td>
                            <td>
                              <span class="td-span">라이프스타일 셀렉트샵, 파운디 스토어가 오픈합니다. <br>건강한 브랜드 제품들을 한번에 모아서 만나보세요!	</span>
                            </td>
                            <td>
                              <span class="td-span td-link">없음</span>
                            </td>
                            <td>
                              <span class="td-span td-status td-locate font-futura locate_home">home</span>
                            </td>
                            <td class="posture">
                              <span class="td-span td-status td-playing font-futura activate">activate</span>
                            </td>
                            <td class="fn-td-btn clearfix">
                              <div class="td-btn-wrap">
                                <p class="td-span td-btn td-revise">
                                  <span class="btn-ic btn--modify">
                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                  </span>
                                  수정
                                </p>
                                <p class="td-span td-btn td-posture">
                                  <span class="btn-ic btn--display">
                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                  </span>
                                  상태변경
                                </p>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td class="td-label chkTd">
                              <input class="chkPiece" type="checkbox" name="chkPiece">
                              <label class="chkLabel"></label>
                            </td>
                            <td>
                              <span class="td-span">
                                <img class="span-img" src="<?= base_url(); ?>uploads/slider_image/slider_1_thumb.jpg?id=1593138379?random=1611135310801" alt="" width="46" height="46">
                              </span>
                            </td>
                            <td>
                              <span class="td-span">Hello, FOUNDY!</span>
                            </td>
                            <td>
                              <span class="td-span">PROMOTION	</span>
                            </td>
                            <td>
                              <span class="td-span">Holistic health &#38; healing lifestyle platform <br>건강한 삶의 시작은 파운디에서</span>
                            </td>
                            <td>
                              <span class="td-span td-link"><?= base_url(); ?>home/shop/product?id=80</span>
                            </td>
                            <td>
                              <span class="td-span td-status td-locate font-futura locate_shop">shop</span>
                            </td>
                            <td class="posture">
                              <span class="td-span td-status td-playing font-futura inactivate">inactivate</span>
                            </td>
                            <td class="fn-td-btn clearfix">
                              <div class="td-btn-wrap">
                                <p class="td-span td-btn td-revise">
                                  <span class="btn-ic btn--modify">
                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                  </span>
                                  수정
                                </p>
                                <p class="td-span td-btn td-posture">
                                  <span class="btn-ic btn--display">
                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                  </span>
                                  상태변경
                                </p>
                              </div>
                            </td>
                          </tr>
                          </tbody>
                        </table>
                      </div>
                      <script>
                        $(document).ready(function(){
                          $('.chkPiece').click(function(){
                            // 전체 체크박스
                            let chkBoxes =
                              $(this).closest('tbody').find('input[name="chkPiece"]');
                            // 선택된 체크박스
                            let chkPiece = $(this).closest('.table-media').find('input[name="chkPiece"]:checked');
                            
                            // ChkAll 체크박스
                            let chkAll = $(this).closest('.table-media').find('input[name="chkAll"]');
                            
                            // console.log(chkBoxes.length,chkPiece.length); ok
                            
                            $(this).next().toggleClass('toggleChk');
                            
                            if(chkBoxes.length === chkPiece.length){
                              chkAll.prop('checked',true)
                                .next().addClass('toggleChk');
                            }
                            else {
                              chkAll.prop('checked',false)
                                .next().removeClass('toggleChk');
                              // $(this).next().removeClass('toggleChk');
                            }
                          })
                          $('.chkAll_1').click(function(){
                            let thischk = $(this).prop('checked');
                            
                            if(thischk === true){
                              $(this).prop('checked',true)
                                .next().addClass('toggleChk');
                              $(this).closest('.manage_table').next().find('.chkPiece').prop('checked',true);
                              $(this).closest('.manage_table').next().find('.chkPiece').next().addClass('toggleChk');
                            }
                            else {
                              $(this).prop('checked',false)
                                .next().removeClass('toggleChk');
                              $(this).closest('.manage_table').next().find('.chkPiece').prop('checked',false)
                              $(this).closest('.manage_table').next().find('.chkPiece').next().removeClass('toggleChk');
                            }
                          })
                          $('.chkAll_2').click(function(){
                            let thischk = $(this).prop('checked');
                            
                            if(thischk === true){
                              $(this).prop('checked',true)
                                .next().addClass('toggleChk');
                              $(this).closest('.manage_table').next().find('.chkPiece').prop('checked',true);
                              $(this).closest('.manage_table').next().find('.chkPiece').next().addClass('toggleChk');
                            }
                            else {
                              $(this).prop('checked',false)
                                .next().removeClass('toggleChk');
                              $(this).closest('.manage_table').next().find('.chkPiece').prop('checked',false);
                              $(this).closest('.manage_table').next().find('.chkPiece').next().removeClass('toggleChk');
                            }
                          })
                          $('.chkAll_3').click(function(){
                            let thischk = $(this).prop('checked');
                            
                            if(thischk === true){
                              $(this).prop('checked',true)
                                .next().addClass('toggleChk');
                              $(this).closest('.manage_table').next().find('.chkPiece').prop('checked',true);
                              $(this).closest('.manage_table').next().find('.chkPiece').next().addClass('toggleChk');
                            }
                            else {
                              $(this).prop('checked',false)
                                .next().removeClass('toggleChk');
                              $(this).closest('.manage_table').next().find('.chkPiece').prop('checked',false);
                              $(this).closest('.manage_table').next().find('.chkPiece').next().removeClass('toggleChk');
                            }
                          })
                        })
                      </script>
                    </div>
                  </div>
                  <div class="list-btns-wrap clearfix">
                    <p class="list_tableList font-futura">
                      <!-- Showing 1 to 10 of 'N' rows, 1:start 10: max 'N':all -->
                      Showing 1 to <span class="tableList-Max">5</span> of <span class="tableList-All">5</span> rows
                    </p>
                    <div class="list_tableBtns clearfix">
                      <button class="btn__front">
                        <span class="frontDirection front1"></span>
                        <span class="frontDirection front1"></span>
                      </button>
                      <button class="btn__bringToFront">
                        <span class="frontDirection front2"></span>
                      </button>
                      
                      <!-- 버튼 클릭시 넘버링 바뀌면서 다음 테이블 순번으로 넘기기 -->
                      <button class="btn__listNo">1</button>
                      
                      <button class="btn__sendToBack">
                        <span class="backDirection back1"></span>
                      </button>
                      <button class="btn__back">
                        <span class="backDirection back2"></span>
                        <span class="backDirection back2"></span>
                      </button>
                    </div>
                    <script>
                      $(function(){
                        $('.list_tableBtns button').hover(function(){
                          // btn__front,back
                          $(this).addClass('listActive');
                          $(this).children('span[class*=front]').css({
                            border : '1px solid #433532',
                            'border-width' : '0 2px 2px 0'
                          });
                          $(this).children('span[class*=back]').css({
                            border : '1px solid #433532',
                            'border-width' : '0 2px 2px 0'
                          });
                          $(this).next().css('border-left','0');
                        },function(){
                          // btn__front,back
                          $(this).removeClass('listActive');
                          $(this).children('span[class*=front]').css({
                            border : '1px solid #e0e0e0',
                            'border-width' : '0 2px 2px 0'
                          });
                          $(this).children('span[class*=back]').css({
                            border : '1px solid #e0e0e0',
                            'border-width' : '0 2px 2px 0'
                          });
                          $(this).next().css('border-left','1px solid #e0e0e0');
                          $(this).next('.btn__listNo').css('border','0');
                        })
                      })
                    </script>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="contents_type contents_master scroll-y">
        <h3 class="meaning">이메일 관리</h3>
        <div class="type_wrap">
          <p class="type_tit slide_tit font-futura">Manage Email</p>
          <div class="type_box shadow">
            <div class="type_named">
              <script>
                $('.addMail').click(function(){
                  $('.boxwrap__pop').show().children('div[class$=add-wrap]').show().find('.add-mail').show();
                })
              </script>
              <div class="namedBtn clearfix">
                <button class="named-fn addBtn addMail" style="/* margin-right: 28px; */">+ 추가</button>
                <span class="named-txt font-futura">or</span>
                <button class="named-fn removeBtn">- 삭제</button>
              </div>
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
                  <div class="list-table" style="/*height: 724px;*/">
                    <div class="table-media tableBody">
                      <table class="table-box manage_table">
                        <colgroup>
                          <col width="4%">
                          <col width="22%">
                          <col width="9%">
                          <col width="15%">
                          <col width="8%">
                          <col width="19%">
                          <col width="9%">
                          <col width="14%">
                        </colgroup>
                        <thead>
                        <tr>
                          <th class="td-label chkTh">
                            <input class="chkAll chkAll_2" type="checkbox" name="chkAll">
                            <label class="chkLabel"></label>
                          </th>
                          <th>
                            <span class="th-span">타입</span>
                          </th>
                          <th>
                            <span class="th-span">발신자명</span>
                          </th>
                          <th>
                            <span class="th-span">발신자</span>
                          </th>
                          <th>
                            <span class="th-span">메일타입</span>
                          </th>
                          <th>
                            <span class="th-span">제목</span>
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
                            <col width="22%">
                            <col width="9%">
                            <col width="15%">
                            <col width="8%">
                            <col width="19%">
                            <col width="9%">
                            <col width="14%">
                          </colgroup>
                          <tbody>
                          <tr>
                            <td class="td-label chkTd">
                              <input class="chkPiece" type="checkbox" name="chkPiece">
                              <label class="chkLabel"></label>
                            </td>
                            <td>
                              <span class="td-span">온라인 클래스 예약자 확인 요청</span>
                            </td>
                            <td>
                              <span class="td-span">FOUNDY</span>
                            </td>
                            <td>
                              <span class="td-span">hello@foundy.me</span>
                            </td>
                            <td>
                              <span class="td-span">html</span>
                            </td>
                            <td>
                              <span class="td-span td-link">[FOUNDY] 온라인 클래스 예약자 확인 요청</span>
                            </td>
                            <td class="posture">
                              <span class="td-span td-status td-locate font-futura activate">activate</span>
                            </td>
                            <td class="fn-td-btn clearfix">
                              <div class="td-btn-wrap">
                                <p class="td-span td-btn td-seeing">
                                  <span class="btn-ic btn--seeProfile">
                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                  </span>
                                  보기
                                </p>
                                <p class="td-span td-btn td-revise">
                                  <span class="btn-ic btn--modify">
                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                  </span>
                                  수정
                                </p>
                                <p class="td-span td-btn td-posture">
                                  <span class="btn-ic btn--display">
                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                  </span>
                                  상태변경
                                </p>
                              </div>
                            </td>
                            <td class="hidden_data">
                              <span class="change_letter">{{날짜}},{{시간}},{{수업명}},{{COUNT}}</span>
                              <div class="mail_tag">
                                <div style="word-break: break-word;font-family: 'Apple SD Gothic Neo', 'Malgun Gothic', '맑은 고딕', sans-serif;background-color: #fff;padding: 10px 0 40px;">
                                  <header style="height: 56px;background-color: #fcfafa;border-radius: 0 20px;max-width: 414px;margin: 0 auto;">
                                    <nav style="display: table;width: 100%;height: inherit;background-color: inherit;text-align: center;border-radius: inherit;">
                                      <h1 style="display: table-cell;vertical-align: middle;margin: 0;color: #111;font-size: 15px;font-weight: bold;letter-spacing: -0.03em;">[ 온라인 클래스 티켓팅 확인 요청 ]</h1>
                                    </nav>
                                  </header>
                                  <section style="padding: 40px 12px 0;box-sizing: border-box;max-width: 414px;margin: 0 auto;">
                                    <h2 style="margin: 0 0 24px 0;color: #333;font-size: 14px;font-weight: normal;line-height: 1.75;text-align: center;">
                                      <p style="font-size: 13px; font-weight: normal; margin: 0;"><span style="-webkit-text-fill-color: #333;text-decoration-line: none !important;">{{날짜}} {{시간}} {{수업명}}</span> 수업에 새로운 신청자가 있습니다.<br>신청자의 결제가 확인 되셨다면 예약 확정 버튼을 눌러주세요!</p>
                                    </h2>
                                    <div style="width: 100%;border-top: 1px dashed #f3eee8;margin: 0 0 28px;"></div>
                                    <div>
                                      <div style="width: 252px;margin: 0 auto;font-size: 0;">
                                        <div style="display: inline-block;width: 72%;vertical-align: middle;">
                                          <div style="width: 100%; font-size: 0;">
                                            <div style="display: inline-block;width: 100%;">
                                              <p style="display: inline-block;width: 72px;margin: 0 6px 9px 0;color: #fff;font-size: 10px;letter-spacing: -0.05em;font-weight: bold;height: 20px;background-color: #b89bbc;text-align: center;box-sizing: border-box;padding: 1.5% 0;border-radius: 12px;vertical-align: top;">미확인 예약건</p>
                                              <p style="display: inline-block;margin: 0;font-size: 10px;line-height: 1.85;color: #757575;width: calc(100% - 78px);vertical-align: top;padding-top: 1px;box-sizing: border-box;letter-spacing: -0.06em;"><span>{{COUNT}}</span> 건</p>
                                            </div>
                                          </div>
                                        </div>
                                        <button style="display: inline-block;width: 28%;height: 30px;line-height: 30px;margin: 0 0 7px;text-align: center;background-color: #616161;border-radius: 4px;color: #fff;font-size: 10px;font-weight: bold;text-decoration: none;vertical-align: middle;border: 0;outline: none;">예약 확정</button>
                                        <p style="border-top: 1px dotted #eee;padding-top: 24px;margin: 16px 0 0 0;color: #9e9e9e !important;-webkit-text-fill-color: #9e9e9e;text-decoration-line: none !important;font-size: 12px;font-weight: bold;text-align: center;">www.foundy.me/studio</p>
                                      </div>
                                    </div>
                                  </section>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td class="td-label chkTd">
                              <input class="chkPiece" type="checkbox" name="chkPiece">
                              <label class="chkLabel"></label>
                            </td>
                            <td>
                              <span class="td-span">온라인 클래스 티켓팅 취소 안내</span>
                            </td>
                            <td>
                              <span class="td-span">FOUNDY</span>
                            </td>
                            <td>
                              <span class="td-span">hello@foundy.me</span>
                            </td>
                            <td>
                              <span class="td-span">html</span>
                            </td>
                            <td>
                              <span class="td-span td-link">[FOUNDY] 온라인 클래스 티켓팅 취소 안내</span>
                            </td>
                            <td class="posture">
                              <span class="td-span td-status td-locate font-futura activate">activate</span>
                            </td>
                            <td class="fn-td-btn clearfix">
                              <div class="td-btn-wrap">
                                <p class="td-span td-btn td-seeing">
                                  <span class="btn-ic btn--seeProfile">
                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                  </span>
                                  보기
                                </p>
                                <p class="td-span td-btn td-revise">
                                  <span class="btn-ic btn--modify">
                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                  </span>
                                  수정
                                </p>
                                <p class="td-span td-btn td-posture">
                                  <span class="btn-ic btn--display">
                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                  </span>
                                  상태변경
                                </p>
                              </div>
                            </td>
                            <td class="hidden_data">
                              <span class="change_letter">{{강사명}},{{수업명}},{{예약일자}},{{시간}}</span>
                              <div class="mail_tag">
                                <div style="word-break: break-word;font-family: 'Apple SD Gothic Neo', 'Malgun Gothic', '맑은 고딕', sans-serif;background-color: #fff;padding: 10px 0 30px;">
                                  <header style="height: 56px;background-color: #fcfafa;border-radius: 0 20px;max-width: 414px;margin: 0 auto;">
                                    <nav style="display: table;width: 100%;height: inherit;background-color: inherit;text-align: center;box-sizing: border-box;border-radius: inherit;">
                                      <h1 style="display: table-cell;vertical-align: middle;margin: 0;color: #111;font-size: 16px;font-weight: bold;">[ FOUNDY Online class Ticketing ]</h1>
                                    </nav>
                                  </header>
                                  <section style="padding: 40px 16px 0;box-sizing: border-box;max-width: 414px;margin: 0 auto;">
                                    <h2 style="margin: 0 0 20px 0; color: #333; font-size: 14px; font-weight: normal; line-height: 1.75;">신청하신 온라인 클래스의 티켓팅이 취소 되었습니다.</h2>
                                    <div>
                                      <div style="width: 100%; border-top: 1px dashed #e0e0e0; margin: 0 0 24px;"></div>
                                      <div>
                                        <div>
                                          <div>
                                            <p style="display: inline-block;margin: 0 6px 8px 0;color: #fff;font-size: 10px;font-weight: bold;width: 88px;height: 20px;background-color: #b89bbc;text-align: center;box-sizing: border-box;padding: 3px 0;border-radius: 12px;vertical-align: top;">예약내역</p>
                                            <p style="display: inline-block; margin: 0; font-size: 12px; line-height: 20px; color: #ad796d; width: 50%; vertical-align: top; padding-top: 1px; box-sizing: border-box;"> {{강사명}} {{수업명}}</p>
                                          </div>
                                        </div>
                                        <div>
                                          <div>
                                            <p style="display: inline-block;margin: 0 6px 8px 0;color: #fff;font-size: 10px;font-weight: bold;width: 88px;height: 20px;background-color: #b89bbc;text-align: center;box-sizing: border-box;padding: 3px 0;border-radius: 12px;vertical-align: top;">예약일자</p>
                                            <p style="display: inline-block;margin: 0;font-size: 12px;line-height: 20px;color: #757575;width: 50%;vertical-align: top;padding-top: 1px;box-sizing: border-box;-webkit-text-fill-color: #757575;text-decoration: none !important;"> {{예약일자}} {{시간}}</p>
                                          </div>
                                        </div>
                                      </div>
                                      <div>
                                        <div>
                                          <p style="line-height: 1.75;color: #757575;font-size: 12px;font-weight: normal;margin: 0; word-break: keep-all;"><br>*입금 혹은 결제 시간이 초과되어 취소가 된 경우, 재신청은 파운디에서 부탁 드립니다.<br>*입금 혹은 결제가 완료된 상태에서 강사의 고지 없이 취소된 경우, 파운디로 문의 주시기 바랍니다.</p>
                                        </div>
                                      </div>
                                    </div>
                                  </section>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td class="td-label chkTd">
                              <input class="chkPiece" type="checkbox" name="chkPiece">
                              <label class="chkLabel"></label>
                            </td>
                            <td>
                              <span class="td-span">온라인 클래스 링크 발송</span>
                            </td>
                            <td>
                              <span class="td-span">FOUNDY</span>
                            </td>
                            <td>
                              <span class="td-span">hello@foundy.me</span>
                            </td>
                            <td>
                              <span class="td-span">html</span>
                            </td>
                            <td>
                              <span class="td-span td-link">[FOUNDY] 온라인 클래스 링크 정보 안내</span>
                            </td>
                            <td class="posture">
                              <span class="td-span td-status td-locate font-futura activate">activate</span>
                            </td>
                            <td class="fn-td-btn clearfix">
                              <div class="td-btn-wrap">
                                <p class="td-span td-btn td-seeing">
                                  <span class="btn-ic btn--seeProfile">
                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                  </span>
                                  보기
                                </p>
                                <p class="td-span td-btn td-revise">
                                  <span class="btn-ic btn--modify">
                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                  </span>
                                  수정
                                </p>
                                <p class="td-span td-btn td-posture">
                                  <span class="btn-ic btn--display">
                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                  </span>
                                  상태변경
                                </p>
                              </div>
                            </td>
                            <td class="hidden_data">
                              <span class="change_letter">{{강사명}},{{수업명}},{{예약일자}},{{시간}},{{링크}},{{id}},{{pw}}</span>
                              <div class="mail_tag">
                                <div style="word-break: break-word;font-family: 'Apple SD Gothic Neo', 'Malgun Gothic', '맑은 고딕', sans-serif;background-color: #fff;padding: 10px 0 30px;">
                                  <header style="height: 56px;background-color: #fcfafa;border-radius: 0 20px;max-width: 414px;margin: 0 auto;">
                                    <nav style="display: table;width: 100%;height: inherit;background-color: inherit;text-align: center;box-sizing: border-box;border-radius: inherit;">
                                      <h1 style="display: table-cell;vertical-align: middle;margin: 0;color: #111;font-size: 16px;font-weight: bold;">[ FOUNDY Online class Ticketing ]</h1>
                                    </nav>
                                  </header>
                                  <section style="padding: 40px 16px 0;box-sizing: border-box;max-width: 414px;margin: 0 auto;">
                                    <h2 style="margin: 0 0 20px 0; color: #333; font-size: 14px; font-weight: normal; line-height: 1.75;">신청하신 온라인 클래스 수업이 곧 오픈합니다.</h2>
                                    <div>
                                      <div style="width: 100%; border-top: 1px dashed #e0e0e0; margin: 0 0 24px;"></div>
                                      <div>
                                        <div>
                                          <div>
                                            <p style="display: inline-block;margin: 0 6px 8px 0;color: #fff;font-size: 10px;font-weight: bold;width: 88px;height: 20px;background-color: #b89bbc;text-align: center;box-sizing: border-box;padding: 3px 0;border-radius: 12px;vertical-align: top;">예약내역</p>
                                            <p style="display: inline-block; margin: 0; font-size: 12px; line-height: 20px; color: #ad796d; width: 50%; vertical-align: top; padding-top: 1px; box-sizing: border-box;"> {{강사명}} {{수업명}}</p>
                                          </div>
                                        </div>
                                        <div>
                                          <div>
                                            <p style="display: inline-block;margin: 0 6px 8px 0;color: #fff;font-size: 10px;font-weight: bold;width: 88px;height: 20px;background-color: #b89bbc;text-align: center;box-sizing: border-box;padding: 3px 0;border-radius: 12px;vertical-align: top;">예약일자</p>
                                            <p style="display: inline-block;margin: 0;font-size: 12px;line-height: 20px;color: #757575;width: 50%;vertical-align: top;padding-top: 1px;box-sizing: border-box;-webkit-text-fill-color: #757575;text-decoration: none !important;"> {{예약일자}} {{시간}}</p>
                                          </div>
                                        </div>
                                        <div>
                                          <div>
                                            <p style="display: inline-block;margin: 0 6px 8px 0;color: #fff;font-size: 10px;font-weight: bold;width: 88px;height: 20px;background-color: #b89bbc;text-align: center;box-sizing: border-box;padding: 3px 0;border-radius: 12px;vertical-align: top;">수업링크</p><p style="display: inline-block;margin: 0;font-size: 12px;line-height: 20px;color: #757575;width: 50%;vertical-align: top;padding-top: 1px;box-sizing: border-box;-webkit-text-fill-color: #757575;text-decoration: none !important;"> {{링크}}</p>
                                          </div>
                                        </div>
                                        <div>
                                          <div>
                                            <p style="display: inline-block;margin: 0 6px 8px 0;color: #fff;font-size: 10px;font-weight: bold;width: 88px;height: 20px;background-color: #b89bbc;text-align: center;box-sizing: border-box;padding: 3px 0;border-radius: 12px;vertical-align: top;">회의ID</p><p style="display: inline-block;margin: 0;font-size: 12px;line-height: 20px;color: #757575;width: 50%;vertical-align: top;padding-top: 1px;box-sizing: border-box;-webkit-text-fill-color: #757575;text-decoration: none !important;"> {{id}}</p>
                                          </div>
                                        </div>
                                        <div>
                                          <div>
                                            <p style="display: inline-block;margin: 0 6px 8px 0;color: #fff;font-size: 10px;font-weight: bold;width: 88px;height: 20px;background-color: #b89bbc;text-align: center;box-sizing: border-box;padding: 3px 0;border-radius: 12px;vertical-align: top;">비밀번호</p><p style="display: inline-block;margin: 0;font-size: 12px;line-height: 20px;color: #757575;width: 50%;vertical-align: top;padding-top: 1px;box-sizing: border-box;-webkit-text-fill-color: #757575;text-decoration: none !important;"> {{pw}}</p>
                                          </div>
                                        </div>
                                      </div>
                                      <div>
                                        <div>
                                          <p style="line-height: 1.75;color: #757575;font-size: 12px;font-weight: normal;margin: 0; word-break: keep-all;"><br>- 수업 전 기기의 스피커가 정상 작동하는지 확인해 주세요.<br>- 입장 후 비디오는 ON, 마이크는 OFF 해주세요.<br>- 불가피한 사유로 취소를 원하실 경우나 입금자명 변동이 있을 경우 아래 선생님의 이메일 주소로 직접 문의 주세요!</p><p style="margin: 8px 0 0;color: #ad796d;font-size: 12px;font-weight: bold;-webkit-text-fill-color: #ad796d;text-decoration: none !important;">{{강사이메일}}</p>
                                        </div>
                                      </div>
                                    </div>
                                  </section>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td class="td-label chkTd">
                              <input class="chkPiece" type="checkbox" name="chkPiece">
                              <label class="chkLabel"></label>
                            </td>
                            <td>
                              <span class="td-span">온라인 클래스 티켓팅 확정 안내</span>
                            </td>
                            <td>
                              <span class="td-span">FOUNDY</span>
                            </td>
                            <td>
                              <span class="td-span">hello@foundy.me</span>
                            </td>
                            <td>
                              <span class="td-span">html</span>
                            </td>
                            <td>
                              <span class="td-span td-link">[FOUNDY] 온라인 클래스 티켓팅 확정 안내</span>
                            </td>
                            <td class="posture">
                              <span class="td-span td-status td-locate font-futura activate">activate</span>
                            </td>
                            <td class="fn-td-btn clearfix">
                              <div class="td-btn-wrap">
                                <p class="td-span td-btn td-seeing">
                                  <span class="btn-ic btn--seeProfile">
                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                  </span>
                                  보기
                                </p>
                                <p class="td-span td-btn td-revise">
                                  <span class="btn-ic btn--modify">
                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                  </span>
                                  수정
                                </p>
                                <p class="td-span td-btn td-posture">
                                  <span class="btn-ic btn--display">
                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                  </span>
                                  상태변경
                                </p>
                              </div>
                            </td>
                            <td class="hidden_data">
                              <span class="change_letter">{{강사명}},{{수업명}},{{예약일자}},{{시간}}</span>
                              <div class="mail_tag">
                                <div style="word-break: break-word;font-family: 'Apple SD Gothic Neo', 'Malgun Gothic', '맑은 고딕', sans-serif;background-color: #fff;padding: 10px 0 30px;">
                                  <header style="height: 56px;background-color: #fcfafa;border-radius: 0 20px;max-width: 414px;margin: 0 auto;">
                                    <nav style="display: table;width: 100%;height: inherit;background-color: inherit;text-align: center;box-sizing: border-box;border-radius: inherit;">
                                      <h1 style="display: table-cell;vertical-align: middle;margin: 0;color: #111;font-size: 16px;font-weight: bold;">[ FOUNDY Online class Ticketing ]</h1>
                                    </nav>
                                  </header>
                                  <section style="padding: 40px 16px 0;box-sizing: border-box;max-width: 414px;margin: 0 auto;">
                                    <h2 style="margin: 0 0 20px 0; color: #333; font-size: 14px; font-weight: normal; line-height: 1.75;">신청하신 온라인 클래스 티켓팅이 확정 되었습니다!</h2>
                                    <div>
                                      <div style="width: 100%; border-top: 1px dashed #e0e0e0; margin: 0 0 24px;"></div>
                                      <div>
                                        <div>
                                          <div>
                                            <p style="display: inline-block;margin: 0 6px 8px 0;color: #fff;font-size: 10px;font-weight: bold;width: 88px;height: 20px;background-color: #b89bbc;text-align: center;box-sizing: border-box;padding: 3px 0;border-radius: 12px;vertical-align: top;">예약내역</p>
                                            <p style="display: inline-block; margin: 0; font-size: 12px; line-height: 20px; color: #ad796d; width: 50%; vertical-align: top; padding-top: 1px; box-sizing: border-box;"> {{강사명}} {{수업명}}</p>
                                          </div>
                                        </div>
                                        <div>
                                          <div>
                                            <p style="display: inline-block;margin: 0 6px 8px 0;color: #fff;font-size: 10px;font-weight: bold;width: 88px;height: 20px;background-color: #b89bbc;text-align: center;box-sizing: border-box;padding: 3px 0;border-radius: 12px;vertical-align: top;">예약일자</p>
                                            <p style="display: inline-block;margin: 0;font-size: 12px;line-height: 20px;color: #757575;width: 50%;vertical-align: top;padding-top: 1px;box-sizing: border-box;-webkit-text-fill-color: #757575;text-decoration: none !important;"> {{예약일자}} {{시간}}</p>
                                          </div>
                                        </div>
                                      </div>
                                      <div>
                                        <div>
                                          <p style="line-height: 1.75;color: #757575;font-size: 12px;font-weight: normal;margin: 0; word-break: keep-all;"><br>- 수업 링크가 개설되면 알림톡과 메일이 발송됩니다. 잠시만 기다려 주세요!<br>- 링크 생성 후, 파운디에서도 확인 가능하며, 바로 온라인 클래스로 이동하실 수 있어요.</p>
                                        </div>
                                      </div>
                                    </div>
                                  </section>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td class="td-label chkTd">
                              <input class="chkPiece" type="checkbox" name="chkPiece">
                              <label class="chkLabel"></label>
                            </td>
                            <td>
                              <span class="td-span">온라인 클래스 티켓팅 신청 안내</span>
                            </td>
                            <td>
                              <span class="td-span">FOUNDY</span>
                            </td>
                            <td>
                              <span class="td-span">hello@foundy.me</span>
                            </td>
                            <td>
                              <span class="td-span">html</span>
                            </td>
                            <td>
                              <span class="td-span td-link">[FOUNDY] 온라인 클래스 티켓팅 신청 안내</span>
                            </td>
                            <td class="posture">
                              <span class="td-span td-status td-locate font-futura activate">activate</span>
                            </td>
                            <td class="fn-td-btn clearfix">
                              <div class="td-btn-wrap">
                                <p class="td-span td-btn td-seeing">
                                  <span class="btn-ic btn--seeProfile">
                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                  </span>
                                  보기
                                </p>
                                <p class="td-span td-btn td-revise">
                                  <span class="btn-ic btn--modify">
                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                  </span>
                                  수정
                                </p>
                                <p class="td-span td-btn td-posture">
                                  <span class="btn-ic btn--display">
                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                  </span>
                                  상태변경
                                </p>
                              </div>
                            </td>
                            <td class="hidden_data">
                              <span class="change_letter">{{강사명}},{{수업명}},{{예약일자}},{{시간}},{{결제정보}},{{주의사항}},{{강사이메일}}</span>
                              <div class="mail_tag">
                                <div style="word-break: break-word;font-family: 'Apple SD Gothic Neo', 'Malgun Gothic', '맑은 고딕', sans-serif;background-color: #fff;padding: 10px 0 30px;">
                                  <header style="height: 56px;background-color: #fcfafa;border-radius: 0 20px;max-width: 414px;margin: 0 auto;">
                                    <nav style="display: table;width: 100%;height: inherit;background-color: inherit;text-align: center;box-sizing: border-box;border-radius: inherit;">
                                      <h1 style="display: table-cell;vertical-align: middle;margin: 0;color: #111;font-size: 16px;font-weight: bold;">[ FOUNDY Online class Ticketing ]</h1>
                                    </nav>
                                  </header>
                                  <section style="padding: 40px 16px 0;box-sizing: border-box;max-width: 414px;margin: 0 auto;">
                                    <h2 style="margin: 0 0 20px 0; color: #333; font-size: 14px; font-weight: normal; line-height: 1.75;">온라인 클래스 티켓팅 신청 내역을 알려 드립니다.</h2>
                                    <div>
                                      <div style="width: 100%; border-top: 1px dashed #e0e0e0; margin: 0 0 24px;"></div>
                                      <div>
                                        <div>
                                          <div>
                                            <p style="display: inline-block;margin: 0 6px 8px 0;color: #fff;font-size: 10px;font-weight: bold;width: 88px;height: 20px;background-color: #b89bbc;text-align: center;box-sizing: border-box;padding: 3px 0;border-radius: 12px;vertical-align: top;">예약내역</p>
                                            <p style="display: inline-block; margin: 0; font-size: 12px; line-height: 20px; color: #ad796d; width: 50%; vertical-align: top; padding-top: 1px; box-sizing: border-box;"> {{강사명}} {{수업명}}</p>
                                          </div>
                                        </div>
                                        <div>
                                          <div>
                                            <p style="display: inline-block;margin: 0 6px 8px 0;color: #fff;font-size: 10px;font-weight: bold;width: 88px;height: 20px;background-color: #b89bbc;text-align: center;box-sizing: border-box;padding: 3px 0;border-radius: 12px;vertical-align: top;">예약일자</p>
                                            <p style="display: inline-block;margin: 0;font-size: 12px;line-height: 20px;color: #757575;width: 50%;vertical-align: top;padding-top: 1px;box-sizing: border-box;-webkit-text-fill-color: #757575;text-decoration: none !important;"> {{예약일자}} {{시간}}</p>
                                          </div>
                                        </div>
                                        <div>
                                          <div>
                                            <p style="display: inline-block;margin: 0 6px 8px 0;color: #fff;font-size: 10px;font-weight: bold;width: 88px;height: 20px;background-color: #b89bbc;text-align: center;box-sizing: border-box;padding: 3px 0;border-radius: 12px;vertical-align: top;">결제방법</p>
                                            <p style="display: inline-block;margin: 0;font-size: 12px;line-height: 20px;color: #757575;width: 50%;vertical-align: top;padding-top: 1px;box-sizing: border-box;-webkit-text-fill-color: #757575;text-decoration: none !important;"> {{결제정보}}</p>
                                          </div>
                                        </div>
                                      </div>
                                      <div style="margin-top: 28px;">
                                        <div style="margin-bottom: 16px;">
                                          <p style="margin: 0; color: #bdbdbd; font-size: 12px; font-weight: bold;">*티켓팅 관련 주의사항</p>
                                          <p style="margin: 8px 0 0; color: #616161; font-size: 12px; font-weight: normal;">{{주의사항}}</p>
                                        </div>
                                        <div style="margin-bottom: 16px;">
                                          <p style="line-height: 1.75; color: #757575; font-size: 12px; font-weight: normal; word-break: keep-all;">- 수업료 입금 후 티켓팅 취소는 불가합니다.<br>- 티켓팅 신청 후 일정 시간 수업료 입금이 되지 않을 경우 자동 취소될 수 있습니다.<br>- 입금자 확인 후 티켓팅 확정과 함께 수업 링크가 알림톡으로 발송됩니다.<br>- 불가피한 사유로 취소를 원하실 경우나 입금자명 변동이 있을 경우 아래 선생님의 이메일 주소로 직접 문의 주세요!</p>
                                          <p style="margin: 8px 0 0;color: #ad796d;font-size: 12px;font-weight: bold;-webkit-text-fill-color: #ad796d;text-decoration: none !important;">{{강사이메일}}</p>
                                        </div>
                                      </div>
                                    </div>
                                  </section>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td class="td-label chkTd">
                              <input class="chkPiece" type="checkbox" name="chkPiece">
                              <label class="chkLabel"></label>
                            </td>
                            <td>
                              <span class="td-span">온라인 스튜디오 반려 안내</span>
                            </td>
                            <td>
                              <span class="td-span">FOUNDY</span>
                            </td>
                            <td>
                              <span class="td-span">hello@foundy.me</span>
                            </td>
                            <td>
                              <span class="td-span">html</span>
                            </td>
                            <td>
                              <span class="td-span td-link">[FOUNDY] 온라인 스튜디오 회원 신청 반려 안내</span>
                            </td>
                            <td class="posture">
                              <span class="td-span td-status td-locate font-futura activate">activate</span>
                            </td>
                            <td class="fn-td-btn clearfix">
                              <div class="td-btn-wrap">
                                <p class="td-span td-btn td-seeing">
                                  <span class="btn-ic btn--seeProfile">
                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                  </span>
                                  보기
                                </p>
                                <p class="td-span td-btn td-revise">
                                  <span class="btn-ic btn--modify">
                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                  </span>
                                  수정
                                </p>
                                <p class="td-span td-btn td-posture">
                                  <span class="btn-ic btn--display">
                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                  </span>
                                  상태변경
                                </p>
                              </div>
                            </td>
                            <td class="hidden_data">
                              <span class="change_letter"></span>
                              <div class="mail_tag">
                                <div style="word-break: break-word;font-family: 'Apple SD Gothic Neo', 'Malgun Gothic', '맑은 고딕', sans-serif;background-color: #fff;padding: 10px 0 20px;">
                                  <header style="height: 56px;background-color: #fcfafa;border-radius: 0 20px;max-width: 414px;margin: 0 auto;">
                                    <nav style="display: table;width: 100%;height: inherit;background-color: inherit;text-align: center;box-sizing: border-box;border-radius: inherit;">
                                      <h1 style="display: table-cell;vertical-align: middle;margin: 0;color: #111;font-size: 16px;font-weight: bold;">[ FOUNDY 강사회원 승인 현황 ]</h1>
                                    </nav>
                                  </header>
                                  <section style="padding: 40px 16px 0;box-sizing: border-box;max-width: 414px;margin: 0 auto;">
                                    <h2 style="margin: 0 0 20px 0; color: #333; font-size: 14px; font-weight: normal; line-height: 1.75;">안녕하세요 파운디입니다.
                                      <p style="font-size: 18px; font-weight: bold; color: #333; line-height: 1.45; margin: 16px 0 28px;">파운디 온라인 스튜디오 신청이 <strong style="color: #ad796d; font-size: 24px;">반려</strong> 되었습니다.</p>
                                      <span>입력해주신 정보에 오류가 있는 경우, 카카오톡 ‘파운디’로 문의 주시거나 재신청 해주세요.</span>
                                    </h2>
                                  </section>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td class="td-label chkTd">
                              <input class="chkPiece" type="checkbox" name="chkPiece">
                              <label class="chkLabel"></label>
                            </td>
                            <td>
                              <span class="td-span">온라인 스튜디오 승인 안내</span>
                            </td>
                            <td>
                              <span class="td-span">FOUNDY</span>
                            </td>
                            <td>
                              <span class="td-span">hello@foundy.me</span>
                            </td>
                            <td>
                              <span class="td-span">html	</span>
                            </td>
                            <td>
                              <span class="td-span td-link">[FOUNDY] 온라인 스튜디오 회원 신청 승인 안내</span>
                            </td>
                            <td class="posture">
                              <span class="td-span td-status td-locate font-futura activate">activate</span>
                            </td>
                            <td class="fn-td-btn clearfix">
                              <div class="td-btn-wrap">
                                <p class="td-span td-btn td-seeing">
                                  <span class="btn-ic btn--seeProfile">
                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                  </span>
                                  보기
                                </p>
                                <p class="td-span td-btn td-revise">
                                                                                <span class="btn-ic btn--modify">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                                                                </span>
                                  수정
                                </p>
                                <p class="td-span td-btn td-posture">
                                                                                <span class="btn-ic btn--display">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                                                                </span>
                                  상태변경
                                </p>
                              </div>
                            </td>
                            <td class="hidden_data">
                              <span class="change_letter"></span>
                              <div class="mail_tag">
                                <div style="word-break: break-word;font-family: 'Apple SD Gothic Neo', 'Malgun Gothic', '맑은 고딕', sans-serif;background-color: #fff;padding: 10px 0 20px;">
                                  <header style="height: 56px;line-height: 56px;background-color: #fcfafa;border-radius: 0 20px;max-width: 414px;margin: auto;top: 8px;left: 0;right: 0;">
                                    <nav style="display: table;width: 100%;height: inherit;background-color: inherit;text-align: center;box-sizing: border-box;border-radius: inherit;">
                                      <h1 style="display: table-cell;vertical-align: middle;margin: 0;color: #111;font-size: 16px;font-weight: bold;">[ FOUNDY 강사회원 승인 현황 ]</h1>
                                    </nav>
                                  </header>
                                  <section style="padding: 40px 16px 0;box-sizing: border-box;max-width: 414px;margin: 0 auto;">
                                    <h2 style="margin: 0 0 20px 0; color: #333; font-size: 14px; font-weight: normal; line-height: 1.75;">안녕하세요 파운디입니다.
                                      <p style="font-size: 18px; font-weight: bold; color: #333; line-height: 1.45; margin: 16px 0 28px;">파운디 온라인 스튜디오 신청이 <strong style="color: #ad796d; font-size: 24px;">완료</strong> 되었습니다.</p>
                                      <span>지금 바로 선생님의 소중한 수업을 파운디에서 나누어주세요!</span>
                                      <br>
                                    </h2>
                                    <div>
                                      <div style="width: 100%; border-top: 1px dashed #e0e0e0; margin: 0 0 32px;"></div>
                                      <div>
                                        <div>
                                          <div style="margin: 0 12px 20px;">
                                            <p style="display: block; margin-bottom: 8px; color: #757575; font-size: 12px; font-weight: normal; background-color: transparent; text-align: center; box-sizing: border-box;">접속 URL</p>
                                            <a href="https://www.foundy.me/studio" style="display: block; text-decoration: none; box-sizing: border-box; height: auto;">
                                              <input value="www.foundy.me/studio" style="width: 100%; display: block; font-size: 16px; font-weight: normal; letter-spacing: 0.2em; background-color: #F5F5F5; color: #9e9e9e; height: 48px; line-height: 48px; text-align: center; padding: 0 16px; box-sizing: border-box; border-radius: 4px; border: 0;" disabled="">
                                            </a>
                                          </div>
                                        </div>
                                        <p style="margin: 0 16px; color: #d32f2f; font-size: 10px; font-weight: bold; line-height: 1.75;">*회원가입 당시 id / pw와 동일하며, 일반 로그인이 아닌 카카오톡 로그인, 애플로그인 등을 사용하여 비밀번호를 설정하지 않으신 경우, 파운디 &gt; MY PAGE 에서 비밀번호 설정을 해주시기 바랍니다.</p>
                                      </div>
                                      <p style="margin: 24px 0 0 16px; color: #333; font-size: 12px; font-weight: normal; line-height: 1.75;">프로그램 사용에 어려움이 있으시면, 카카오톡 "파운디"로 문의 주세요!</p>
                                    </div>
                                  </section>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td class="td-label chkTd">
                              <input class="chkPiece" type="checkbox" name="chkPiece">
                              <label class="chkLabel"></label>
                            </td>
                            <td>
                              <span class="td-span">샵 미확인 주문 / 배송지연 안내</span>
                            </td>
                            <td>
                              <span class="td-span">FOUNDY</span>
                            </td>
                            <td>
                              <span class="td-span">hello@foundy.me</span>
                            </td>
                            <td>
                              <span class="td-span">html</span>
                            </td>
                            <td>
                              <span class="td-span td-link">[FOUNDY] 미확인 주문 / 배송지연 안내</span>
                            </td>
                            <td class="posture">
                              <span class="td-span td-status td-locate font-futura activate">activate</span>
                            </td>
                            <td class="fn-td-btn clearfix">
                              <div class="td-btn-wrap">
                                <p class="td-span td-btn td-seeing">
                                                                                <span class="btn-ic btn--seeProfile">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                                                                </span>
                                  보기
                                </p>
                                <p class="td-span td-btn td-revise">
                                                                                <span class="btn-ic btn--modify">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                                                                </span>
                                  수정
                                </p>
                                <p class="td-span td-btn td-posture">
                                                                                <span class="btn-ic btn--display">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                                                                </span>
                                  상태변경
                                </p>
                              </div>
                            </td>
                            <td class="hidden_data">
                              <span class="change_letter">{{BRAND_NAME}},{{CONFIRM_STATUS}},{{COUNT}}</span>
                              <div class="mail_tag">
                                <div style="word-break: break-word;font-family: 'Apple SD Gothic Neo', 'Malgun Gothic', '맑은 고딕', sans-serif;background-color: #fff;padding: 10px 0 40px;">
                                  <header style="height: 56px;background-color: #fcfafa;border-radius: 0 20px;max-width: 414px;margin: 0 auto;">
                                    <nav style="display: table;width: 100%;height: inherit;background-color: inherit;text-align: center;box-sizing: border-box;border-radius: inherit;">
                                      <h1 style="display: table-cell;vertical-align: middle;margin: 0;color: #111;font-size: 15px;font-weight: bold;letter-spacing: -0.03em;">[ FOUNDY <span style="color: #ad796d;">{{CONFIRM_STATUS}} 확인요청</span> ]</h1>
                                    </nav>
                                  </header>
                                  <section style="padding: 40px 12px 0;box-sizing: border-box;max-width: 414px;margin: 0 auto;">
                                    <h2 style="margin: 0 0 36px 0; color: #333; font-size: 14px; font-weight: normal; line-height: 1.75; text-align: center;">
                                      <p style="font-size: 15px;font-weight: normal;margin: 0;padding-bottom: 12px;"><strong style="color: #ad796d;">{{BRAND_NAME}}</strong> 비즈니스 알림 메일입니다.</p>
                                      <p style="font-size: 13px; font-weight: normal; margin: 0;"><span>{{CONFIRM_STATUS}}</span> 건이 아래와 같이 있습니다.<br>어드민에서 확인하시고 빠르게 배송해 주세요!</p>
                                    </h2>
                                    <div style="width: 100%; border-top: 1px dashed #e0e0e0; margin: 0 0 28px;"></div>
                                    <div>
                                      <div style="width: 252px;margin: 0 auto;font-size: 0;">
                                        <div style="display: inline-block;width: 65%;vertical-align: middle;">
                                          <div style="width: 100%; font-size: 0;">
                                            <div style="display: inline-block;width: 100%;">
                                              <p style="display: inline-block;width: 60px;margin: 0 6px 9px 0;color: #fff;font-size: 10px;letter-spacing: -0.05em;font-weight: bold;height: 20px;background-color: #b89bbc;text-align: center;box-sizing: border-box;padding: 3px 0;border-radius: 12px;vertical-align: top;">미확인 내역</p>
                                              <p style="display: inline-block;margin: 0;font-size: 10px;line-height: 1.85;color: #757575;width: calc(100% - 72px);vertical-align: top;padding-top: 1px;box-sizing: border-box;letter-spacing: -0.06em;"><!-- 미확인 주문 or 배송지연 --><span>{{CONFIRM_STATUS}}</span> <span style="padding: 0 1px;">ㅣ</span><strong style="color: #433532;">{{COUNT}}</strong> 건</p>
                                            </div>
                                          </div>
                                        </div>
                                        <div style="display: inline-block;width: 35%;height: 30px;margin: 0 0 7px;text-align: center;background-color: #616161;border-radius: 4px;vertical-align: middle;">
                                          <div style="display: table; width: 100%;height: inherit;">
                                            <a href="https://www.foundy.me/shop" style="display: table-cell;vertical-align: middle;box-sizing: border-box;color: #fff;font-size: 10px;font-weight: bold;-webkit-text-fill-color: #fff;text-decoration: none !important;">어드민 바로가기</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </section>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td class="td-label chkTd">
                              <input class="chkPiece" type="checkbox" name="chkPiece">
                              <label class="chkLabel"></label>
                            </td>
                            <td>
                              <span class="td-span">샵 회원 신규 주문 / 취소 안내</span>
                            </td>
                            <td>
                              <span class="td-span">FOUNDY</span>
                            </td>
                            <td>
                              <span class="td-span">hello@foundy.me</span>
                            </td>
                            <td>
                              <span class="td-span">html</span>
                            </td>
                            <td>
                              <span class="td-span td-link">[FOUNDY] 신규 주문 / 취소 안내</span>
                            </td>
                            <td class="posture">
                              <span class="td-span td-status td-locate font-futura activate">activate</span>
                            </td>
                            <td class="fn-td-btn clearfix">
                              <div class="td-btn-wrap">
                                <p class="td-span td-btn td-seeing">
                                                                                <span class="btn-ic btn--seeProfile">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                                                                </span>
                                  보기
                                </p>
                                <p class="td-span td-btn td-revise">
                                                                                <span class="btn-ic btn--modify">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                                                                </span>
                                  수정
                                </p>
                                <p class="td-span td-btn td-posture">
                                                                                <span class="btn-ic btn--display">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                                                                </span>
                                  상태변경
                                </p>
                              </div>
                            </td>
                            <td class="hidden_data">
                              <span class="change_letter">{{BRAND_NAME}},{{ORDER_STATUS}}</span>
                              <div class="mail_tag">
                                <div style="word-break: break-word;font-family: 'Apple SD Gothic Neo', 'Malgun Gothic', '맑은 고딕', sans-serif;background-color: #fff;padding: 10px 0 40px;">
                                  <header style="height: 56px;background-color: #fcfafa;border-radius: 0 20px;max-width: 414px;margin: 0 auto;">
                                    <nav style="display: table;width: 100%;height: inherit;background-color: inherit;text-align: center;box-sizing: border-box;border-radius: inherit;">
                                      <h1 style="display: table-cell;vertical-align: middle;margin: 0;color: #111;font-size: 16px;font-weight: bold;">[ FOUNDY <span style="color: #ad796d;">{{ORDER_STATUS}}</span> ]</h1>
                                    </nav>
                                  </header>
                                  <section style="padding: 40px 16px 0;box-sizing: border-box;max-width: 414px;margin: 0 auto;">
                                    <h2 style="margin: 0 0 20px 0; color: #333; font-size: 14px; font-weight: normal; line-height: 1.75;">
                                      <strong style="color: #ad796d;">{{BRAND_NAME}}</strong> 비즈니스 알림 메일입니다. 아래의 건을 확인 후 처리해 주세요!
                                    </h2>
                                    <div style="width: 100%; border-top: 1px dashed #e0e0e0; margin: 0 0 28px;"></div>
                                    <div>
                                      <div style="width: 85%; margin: 0 auto; font-size: 0;">
                                        <div style="display: inline-block;width: 60%;vertical-align: middle;">
                                          <div style="width: 100%; font-size: 0;">
                                            <div style="display: inline-block;width: 100%;">
                                              <p style="display: inline-block;width: 66px;margin: 0 6px 0 0;color: #fff;font-size: 10px;font-weight: bold;height: 20px;background-color: #b89bbc;text-align: center;box-sizing: border-box;padding: 3px 0;border-radius: 12px;vertical-align: top;">미확인 내역</p>
                                              <p style="display: inline-block; margin: 0; font-size: 12px; line-height: 20px; color: #757575; width: calc(100% - 94px); vertical-align: top; padding-top: 1px; box-sizing: border-box;">{{ORDER_STATUS}}</p>
                                            </div>
                                          </div>
                                        </div>
                                        <div style="display: inline-block;width: 40%;height: 30px;text-align: center;background-color: #616161;border-radius: 4px;vertical-align: middle;">
                                          <div style="display: table;width: 100%;height: inherit;">
                                            <a href="https://www.foundy.me/shop" style="display: table-cell;vertical-align: middle;color: #fff;font-size: 11px;font-weight: bold;-webkit-text-fill-color: #fff;text-decoration: none !important;">어드민 바로가기</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </section>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td class="td-label chkTd">
                              <input class="chkPiece" type="checkbox" name="chkPiece">
                              <label class="chkLabel"></label>
                            </td>
                            <td>
                              <span class="td-span">센터 회원 신청 반려 안내</span>
                            </td>
                            <td>
                              <span class="td-span">FOUNDY</span>
                            </td>
                            <td>
                              <span class="td-span">hello@foundy.me</span>
                            </td>
                            <td>
                              <span class="td-span">html</span>
                            </td>
                            <td>
                              <span class="td-span td-link">[FOUNDY] 센터 회원 신청 반려 안내	</span>
                            </td>
                            <td class="posture">
                              <span class="td-span td-status td-locate font-futura activate">activate</span>
                            </td>
                            <td class="fn-td-btn clearfix">
                              <div class="td-btn-wrap">
                                <p class="td-span td-btn td-seeing">
                                                                                <span class="btn-ic btn--seeProfile">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                                                                </span>
                                  보기
                                </p>
                                <p class="td-span td-btn td-revise">
                                                                                <span class="btn-ic btn--modify">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                                                                </span>
                                  수정
                                </p>
                                <p class="td-span td-btn td-posture">
                                                                                <span class="btn-ic btn--display">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                                                                </span>
                                  상태변경
                                </p>
                              </div>
                            </td>
                            <td class="hidden_data">
                              <span class="change_letter"></span>
                              <div class="mail_tag">
                                <div style="word-break: break-word;font-family: 'Apple SD Gothic Neo', 'Malgun Gothic', '맑은 고딕', sans-serif;background-color: #fff;padding: 10px 0 20px;">
                                  <header style="height: 56px;background-color: #fcfafa;border-radius: 0 20px;max-width: 414px;margin: 0 auto;position: relative;">
                                    <nav style="display: table;width: 100%;height: inherit;background-color: inherit;text-align: center;box-sizing: border-box;border-radius: inherit;">
                                      <h1 style="display: table-cell;vertical-align: middle;margin: 0;color: #111;font-size: 16px;font-weight: bold;">[ FOUNDY 센터 승인 반려 ]</h1>
                                    </nav>
                                  </header>
                                  <section style="padding: 40px 16px 0;box-sizing: border-box;max-width: 414px; margin: 0 auto;">
                                    <h2 style="margin: 0 0 20px 0; color: #333; font-size: 14px; font-weight: normal; line-height: 1.75;">
                                      <p style="margin: 0 0 12px 0;">안녕하세요 파운디입니다.</p>
                                      센터회원 신청 내용 중, 정보가 부족하여 <strong style="color: #ad796d;">센터 승인이 반려</strong>되었습니다. 정확한 상호와 연락처, 주소 등을 입력하셨는지 확인 부탁드립니다.
                                      <p style="margin: 12px 0 0 0;">기타 문의사항은 카카오톡 "파운디"로 문의 주세요!                파운디 센터회원 신청을 해주셔서 감사드립니다.</p>
                                    </h2>
                                  </section>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td class="td-label chkTd">
                              <input class="chkPiece" type="checkbox" name="chkPiece">
                              <label class="chkLabel"></label>
                            </td>
                            <td>
                              <span class="td-span">센터 회원 신청 승인 안내</span>
                            </td>
                            <td>
                              <span class="td-span">FOUNDY</span>
                            </td>
                            <td>
                              <span class="td-span">hello@foundy.me</span>
                            </td>
                            <td>
                              <span class="td-span">html</span>
                            </td>
                            <td>
                              <span class="td-span td-link">[FOUNDY] 센터 회원 신청 승인 안내	</span>
                            </td>
                            <td class="posture">
                              <span class="td-span td-status td-locate font-futura activate">activate</span>
                            </td>
                            <td class="fn-td-btn clearfix">
                              <div class="td-btn-wrap">
                                <p class="td-span td-btn td-seeing">
                                                                                <span class="btn-ic btn--seeProfile">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                                                                </span>
                                  보기
                                </p>
                                <p class="td-span td-btn td-revise">
                                                                                <span class="btn-ic btn--modify">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                                                                </span>
                                  수정
                                </p>
                                <p class="td-span td-btn td-posture">
                                                                                <span class="btn-ic btn--display">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                                                                </span>
                                  상태변경
                                </p>
                              </div>
                            </td>
                            <td class="hidden_data">
                              <span class="change_letter"></span>
                              <div class="mail_tag">
                                <div style="word-break: break-word;font-family: 'Apple SD Gothic Neo', 'Malgun Gothic', '맑은 고딕', sans-serif;background-color: #fff;padding: 10px 0 20px;">
                                  <header style="height: 56px;background-color: #fcfafa;border-radius: 0 20px;max-width: 414px;margin: auto;">
                                    <nav style="display: table;width: 100%;height: inherit;background-color: inherit;text-align: center;box-sizing: border-box;border-radius: inherit;">
                                      <h1 style="display: table-cell;vertical-align: middle;margin: 0;color: #111;font-size: 16px;font-weight: bold;">[ FOUNDY 센터회원 승인 완료 ]</h1>
                                    </nav>
                                  </header>
                                  <section style="padding: 40px 16px 0;box-sizing: border-box;max-width: 440px;margin: 0 auto;">
                                    <h2 style="margin: 0 0 20px 0; color: #333; font-size: 14px; font-weight: normal; line-height: 1.75;">안녕하세요 파운디입니다.
                                      <p style="font-size: 16px; font-weight: bold; color: #333; line-height: 1.45; margin: 16px 0 24px;">파운디 센터회원 승인이 <strong style="color: #ad796d; font-size: 21px;">완료</strong>되었습니다.</p>
                                      지금 센터 어드민에 접속하셔서,            운영중이신 센터 상세 정보와 전자시간표 예약 서비스를 만나보세요!        </h2>
                                    <div>
                                      <div style="width: 100%; border-top: 1px dashed #e0e0e0; margin: 0 0 32px;"></div>
                                      <div>
                                        <div>
                                          <div style="margin: 0 12px 20px;">
                                            <p style="display: block; margin-bottom: 8px; color: #757575; font-size: 12px; font-weight: normal; background-color: transparent; text-align: center; box-sizing: border-box;">접속 URL</p>
                                            <a href="https://www.foundy.me/center" style="display: block; box-sizing: border-box; height: 48px; line-height: 48px;">
                                              <input value="www.foundy.me/center" style="width: 100%; display: block; font-size: 16px; font-weight: normal; letter-spacing: 0.2em; background-color: #f5f5f5; color: #9e9e9e; height: inherit; line-height: inherit; text-align: left; padding: 0 16px; box-sizing: border-box; border-radius: 4px; border: 0;" disabled="">
                                            </a>
                                          </div>
                                        </div>
                                        <p style="margin: 0 16px; color: #d32f2f; font-size: 10px; font-weight: bold; line-height: 1.75;">*회원가입 당시 id / pw와 동일하며, 일반 로그인이 아닌 카카오톡 로그인, 애플로그인 등을 사용하여 비밀번호를 설정하지 않으신 경우, 파운디 &gt; MY PAGE 에서 비밀번호 설정을 해주시기 바랍니다.</p>
                                      </div>
                                      <p style="margin: 24px 0 0 16px; color: #333; font-size: 12px; font-weight: normal; line-height: 1.75;">프로그램 사용에 어려움이 있으시면, 카카오톡 "파운디"로 문의 주세요!</p>
                                    </div>
                                  </section>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td class="td-label chkTd">
                              <input class="chkPiece" type="checkbox" name="chkPiece">
                              <label class="chkLabel"></label>
                            </td>
                            <td>
                              <span class="td-span">강사 회원 신청 반려 안내</span>
                            </td>
                            <td>
                              <span class="td-span">FOUNDY</span>
                            </td>
                            <td>
                              <span class="td-span">hello@foundy.me</span>
                            </td>
                            <td>
                              <span class="td-span">html</span>
                            </td>
                            <td>
                              <span class="td-span td-link">[FOUNDY] 강사 회원 신청 반려 안내	</span>
                            </td>
                            <td class="posture">
                              <span class="td-span td-status td-locate font-futura activate">activate</span>
                            </td>
                            <td class="fn-td-btn clearfix">
                              <div class="td-btn-wrap">
                                <p class="td-span td-btn td-seeing">
                                                                                <span class="btn-ic btn--seeProfile">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                                                                </span>
                                  보기
                                </p>
                                <p class="td-span td-btn td-revise">
                                                                                <span class="btn-ic btn--modify">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                                                                </span>
                                  수정
                                </p>
                                <p class="td-span td-btn td-posture">
                                                                                <span class="btn-ic btn--display">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                                                                </span>
                                  상태변경
                                </p>
                              </div>
                            </td>
                            <td class="hidden_data">
                              <span class="change_letter"></span>
                              <div class="mail_tag">
                                <div style="word-break: break-word;font-family: 'Apple SD Gothic Neo', 'Malgun Gothic', '맑은 고딕', sans-serif;background-color: #fff;padding: 10px 0 20px;">
                                  <header style="height: 56px;background-color: #fcfafa;border-radius: 0 20px;max-width: 414px;margin: 0 auto;">
                                    <nav style="display: table;width: 100%;height: inherit;background-color: inherit;text-align: center;box-sizing: border-box;border-radius: inherit;">
                                      <h1 style="display: table-cell;vertical-align: middle;margin: 0;color: #111;font-size: 16px;font-weight: bold;">[ FOUNDY 강사회원 승인 현황 ]</h1>
                                    </nav>
                                  </header>
                                  <section style="padding: 40px 16px 0;box-sizing: border-box;max-width: 414px;margin: 0 auto;">
                                    <h2 style="margin: 0 0 20px 0; color: #333; font-size: 14px; font-weight: normal; line-height: 1.75;">
                                      안녕하세요 파운디입니다.
                                      <p style="font-size: 18px; font-weight: bold; color: #333; line-height: 1.45; margin: 16px 0 28px;">파운디 강사회원 승인이 <strong style="color: #ad796d; font-size: 24px;">반려</strong> 되었습니다.</p>
                                      <span>추가 증빙자료(강사 자격증)가 있으시면 카카오톡 ‘파운디’로 문의 주세요!</span>
                                    </h2>
                                  </section>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td class="td-label chkTd">
                              <input class="chkPiece" type="checkbox" name="chkPiece">
                              <label class="chkLabel"></label>
                            </td>
                            <td>
                              <span class="td-span">강사 회원 신청 승인 안내</span>
                            </td>
                            <td>
                              <span class="td-span">FOUNDY</span>
                            </td>
                            <td>
                              <span class="td-span">hello@foundy.me</span>
                            </td>
                            <td>
                              <span class="td-span">html</span>
                            </td>
                            <td>
                              <span class="td-span td-link">[FOUNDY] 강사 회원 신청 승인 안내	</span>
                            </td>
                            <td class="posture">
                              <span class="td-span td-status td-locate font-futura activate">activate</span>
                            </td>
                            <td class="fn-td-btn clearfix">
                              <div class="td-btn-wrap">
                                <p class="td-span td-btn td-seeing">
                                                                                <span class="btn-ic btn--seeProfile">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                                                                </span>
                                  보기
                                </p>
                                <p class="td-span td-btn td-revise">
                                                                                <span class="btn-ic btn--modify">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                                                                </span>
                                  수정
                                </p>
                                <p class="td-span td-btn td-posture">
                                                                                <span class="btn-ic btn--display">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                                                                </span>
                                  상태변경
                                </p>
                              </div>
                            </td>
                            <td class="hidden_data">
                              <span class="change_letter"></span>
                              <div class="mail_tag">
                                <div style="word-break: break-word;font-family: 'Apple SD Gothic Neo', 'Malgun Gothic', '맑은 고딕', sans-serif;background-color: #fff;padding: 10px 0 20px;">
                                  <header style="height: 56px;background-color: #fcfafa;border-radius: 0 20px;max-width: 414px;margin: auto;top: 8px;left: 0;right: 0;">
                                    <nav style="display: table;width: 100%;height: inherit;background-color: inherit;text-align: center;box-sizing: border-box;border-radius: inherit;">
                                      <h1 style="display: table-cell;vertical-align: middle;margin: 0;color: #111;font-size: 16px;font-weight: bold;">[ FOUNDY 강사회원 승인 현황 ]</h1>
                                    </nav>
                                  </header>
                                  <section style="padding: 40px 16px 0;box-sizing: border-box;max-width: 414px;margin: 0 auto;">
                                    <h2 style="margin: 0 0 20px 0; color: #333; font-size: 14px; font-weight: normal; line-height: 1.75;">
                                      안녕하세요 파운디입니다. <p style="font-size: 18px; font-weight: bold; color: #333; line-height: 1.45; margin: 16px 0 28px;">파운디 강사회원 승인이 <strong style="color: #ad796d; font-size: 24px;">완료</strong> 되었습니다.</p>
                                      <span>지금 바로 선생님의 소중한 수업을 파운디에서 나누어주세요!</span>
                                      <br><span>온라인 클래스 예약 및 알림톡 서비스를 이용 하시려면,<br> 강사 어드민 우측 상단의 ‘온라인 스튜디오 신청’을 클릭해 주세요.</span>
                                    </h2>
                                    <div>
                                      <div style="width: 100%; border-top: 1px dashed #e0e0e0; margin: 0 0 32px;"></div>
                                      <div>
                                        <div>
                                          <div style="margin: 0 12px 20px;">
                                            <p style="display: block; margin-bottom: 8px; color: #757575; font-size: 12px; font-weight: normal; background-color: transparent; text-align: center; box-sizing: border-box;">접속 URL</p>
                                            <div style="box-sizing: border-box; height: auto;">
                                              <a href="https://www.foundy.me/studio" style="display: block;">
                                                <input value="www.foundy.me/studio" style="width: 100%; display: block; font-size: 16px; font-weight: normal; letter-spacing: 0.2em; background-color: #F5F5F5; color: #9e9e9e; height: 48px; line-height: 48px; text-align: center; padding: 0 16px; box-sizing: border-box; border-radius: 4px; border: 0;" disabled="">
                                              </a>
                                              <button style="display: block;width: 100%;height: 48px;line-height: 48px;margin-top: 8px;background-color: #fff;color: #2D8CFF;font-size: 16px;font-weight: bold;box-sizing: border-box;border: 1px solid #2D8CFF;border-radius: 4px;">온라인 스튜디오 신청 </button>
                                            </div>
                                          </div>
                                        </div>
                                        <p style="margin: 0 16px; color: #d32f2f; font-size: 10px; font-weight: bold; line-height: 1.75;">*회원가입 당시 id / pw와 동일하며, 일반 로그인이 아닌 카카오톡 로그인, 애플로그인 등을 사용하여 비밀번호를 설정하지 않으신 경우, 파운디 &gt; MY PAGE 에서 비밀번호 설정을 해주시기 바랍니다.</p>
                                      </div>
                                      <p style="margin: 24px 0 0 16px; color: #333; font-size: 12px; font-weight: normal; line-height: 1.75;">프로그램 사용에 어려움이 있으시면, 카카오톡 "파운디"로 문의 주세요!</p>
                                    </div>
                                  </section>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td class="td-label chkTd">
                              <input class="chkPiece" type="checkbox" name="chkPiece">
                              <label class="chkLabel"></label>
                            </td>
                            <td>
                              <span class="td-span">유저 요청에 따른 비밀번호 리셋 안내</span>
                            </td>
                            <td>
                              <span class="td-span">FOUNDY</span>
                            </td>
                            <td>
                              <span class="td-span">hello@foundy.me</span>
                            </td>
                            <td>
                              <span class="td-span">html</span>
                            </td>
                            <td>
                              <span class="td-span td-link">[FOUNDY] 비밀번호 리셋 안내</span>
                            </td>
                            <td class="posture">
                              <span class="td-span td-status td-locate font-futura activate">activate</span>
                            </td>
                            <td class="fn-td-btn clearfix">
                              <div class="td-btn-wrap">
                                <p class="td-span td-btn td-seeing">
                                                                                <span class="btn-ic btn--seeProfile">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                                                                </span>
                                  보기
                                </p>
                                <p class="td-span td-btn td-revise">
                                                                                <span class="btn-ic btn--modify">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                                                                </span>
                                  수정
                                </p>
                                <p class="td-span td-btn td-posture">
                                                                                <span class="btn-ic btn--display">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                                                                </span>
                                  상태변경
                                </p>
                              </div>
                            </td>
                            <td class="hidden_data">
                              <span class="change_letter">{{EMAIL}},{{PW}}</span>
                              <div class="mail_tag">
                                <div style="word-break: break-word;font-family: 'Apple SD Gothic Neo', 'Malgun Gothic', '맑은 고딕', sans-serif;background-color: #fff;padding: 10px 0 20px;">
                                  <header style="height: 56px;background-color: #fcfafa;border-radius: 0 20px;max-width: 414px;margin: 0 auto;">
                                    <nav style="display: table;width: 100%;height: inherit;background-color: inherit;text-align: center;box-sizing: border-box;border-radius: inherit;">
                                      <h1 style="display: table-cell;vertical-align: middle;margin: 0;color: #111;font-size: 16px;font-weight: bold;">[ FOUNDY 비밀번호 재설정 완료 ]</h1>
                                    </nav>
                                  </header>
                                  <section style="padding: 40px 16px 0;box-sizing: border-box;max-width: 414px;margin: 0 auto;">
                                    <h2 style="margin: 0 0 20px 0; color: #333; font-size: 14px; font-weight: normal; line-height: 1.75; word-break: keep-all;">
                                      안녕하세요 파운디입니다.
                                      비밀번호가 아래와 같이 재설정 되었습니다.
                                      <br>로그인 후에 꼭 비밀번호를 재변경 해두시기 바랍니다.
                                    </h2>
                                    <div>
                                      <div style="width: 100%; border-top: 1px dashed #e0e0e0; margin: 0 0 32px;"></div>
                                      <div>
                                        <div style="margin: 0 12px 20px;">
                                          <p style="display: block; margin-bottom: 8px; color: #757575; font-size: 12px; font-weight: normal; background-color: transparent; text-align: center; box-sizing: border-box;">아이디</p>
                                          <div style="box-sizing: border-box; height: 48px; line-height: 48px;">
                                            <input value="{{EMAIL}}" style="width: 100%; display: block; font-size: 16px; font-weight: normal; letter-spacing: 0.2em; background-color: #f5f5f5; color: #9e9e9e; height: inherit; line-height: inherit; text-align: left; padding: 0 16px; box-sizing: border-box; border-radius: 4px; border: 0;" disabled="">
                                          </div>
                                        </div>
                                        <div style="margin: 0 12px 20px;">
                                          <p style="display: block; margin-bottom: 8px; color: #757575; font-size: 12px; font-weight: normal; background-color: transparent; text-align: center; box-sizing: border-box;">비밀번호</p>
                                          <div style="box-sizing: border-box; height: 48px; line-height: 48px;">
                                            <input value="{{PW}}" style="width: 100%; display: block; font-size: 16px; font-weight: normal; letter-spacing: 0.2em; background-color: #f5f5f5; color: #9e9e9e; height: inherit; line-height: inherit; text-align: left; padding: 0 16px; box-sizing: border-box; border-radius: 4px; border: 0;" disabled="">
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </section>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td class="td-label chkTd">
                              <input class="chkPiece" type="checkbox" name="chkPiece">
                              <label class="chkLabel"></label>
                            </td>
                            <td>
                              <span class="td-span">유저 요청에 따른 인증코드 안내</span>
                            </td>
                            <td>
                              <span class="td-span">FOUNDY</span>
                            </td>
                            <td>
                              <span class="td-span">hello@foundy.me</span>
                            </td>
                            <td>
                              <span class="td-span">html</span>
                            </td>
                            <td>
                              <span class="td-span td-link">[FOUNDY] 인증코드 안내</span>
                            </td>
                            <td class="posture">
                              <span class="td-span td-status td-locate font-futura activate">activate</span>
                            </td>
                            <td class="fn-td-btn clearfix">
                              <div class="td-btn-wrap">
                                <p class="td-span td-btn td-seeing">
                                                                                <span class="btn-ic btn--seeProfile">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                                                                </span>
                                  보기
                                </p>
                                <p class="td-span td-btn td-revise">
                                                                                <span class="btn-ic btn--modify">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                                                                </span>
                                  수정
                                </p>
                                <p class="td-span td-btn td-posture">
                                                                                <span class="btn-ic btn--display">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                                                                </span>
                                  상태변경
                                </p>
                              </div>
                            </td>
                            <td class="hidden_data">
                              <span class="change_letter">{{APPROVAL_CODE}}</span>
                              <div class="mail_tag">
                                <div style="word-break: break-word;font-family: 'Apple SD Gothic Neo', 'Malgun Gothic', '맑은 고딕', sans-serif;background-color: #fff;padding: 10px 0 40px;">
                                  <header style="height: 56px;background-color: #fcfafa;border-radius: 0 20px;max-width: 414px;margin: 0 auto;">
                                    <nav style="display: table;width: 100%;height: inherit;background-color: inherit;text-align: center;box-sizing: border-box;border-radius: inherit;">
                                      <h1 style="display: table-cell;vertical-align: middle;margin: 0;color: #111;font-size: 16px;font-weight: bold;">[ FOUNDY 본인인증 ]</h1>
                                    </nav>
                                  </header>
                                  <section style="padding: 40px 16px 0;box-sizing: border-box;max-width: 414px;margin: 0 auto;">
                                    <h2 style="margin: 0 0 20px 0; color: #333; font-size: 14px; font-weight: normal; line-height: 1.75;">
                                      안녕하세요 파운디입니다.
                                      본인인증을 위해서 아래의 인증번호를 정확하게 입력해주세요.
                                    </h2>
                                    <div>
                                      <div style="width: 100%; border-top: 1px dashed #e0e0e0; margin: 0 0 32px;"></div>
                                      <div>
                                        <div style="margin: 0 12px;">
                                          <p style="display: block; margin-bottom: 8px; color: #757575; font-size: 12px; font-weight: normal; background-color: transparent; text-align: center; box-sizing: border-box;">인증번호</p>
                                          <div style="box-sizing: border-box; height: 48px; line-height: 48px;">
                                            <input value="{{APPROVAL_CODE}}" style="width: 100%; display: block; font-size: 16px; font-weight: normal; letter-spacing: 0.2em; background-color: #f5f5f5; color: #9e9e9e; height: inherit; line-height: inherit; text-align: center; box-sizing: border-box; border-radius: 4px; border: 0;" disabled="">
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </section>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td class="td-label chkTd">
                              <input class="chkPiece" type="checkbox" name="chkPiece">
                              <label class="chkLabel"></label>
                            </td>
                            <td>
                              <span class="td-span">유저 쿠폰 지급 안내</span>
                            </td>
                            <td>
                              <span class="td-span">FOUNDY</span>
                            </td>
                            <td>
                              <span class="td-span">hello@foundy.me</span>
                            </td>
                            <td>
                              <span class="td-span">html</span>
                            </td>
                            <td>
                              <span class="td-span td-link">[FOUNDY] 쿠폰 지급 안내</span>
                            </td>
                            <td class="posture">
                              <span class="td-span td-status td-locate font-futura activate">activate</span>
                            </td>
                            <td class="fn-td-btn clearfix">
                              <div class="td-btn-wrap">
                                <p class="td-span td-btn td-seeing">
                                                                                <span class="btn-ic btn--seeProfile">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                                                                </span>
                                  보기
                                </p>
                                <p class="td-span td-btn td-revise">
                                                                                <span class="btn-ic btn--modify">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                                                                </span>
                                  수정
                                </p>
                                <p class="td-span td-btn td-posture">
                                                                                <span class="btn-ic btn--display">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                                                                </span>
                                  상태변경
                                </p>
                              </div>
                            </td>
                            <td class="hidden_data">
                              <span class="change_letter">{{USER_NAME}},{{COUPON_NAME}},{EXPIRATION_DATE}</span>
                              <div class="mail_tag">
                                <div style="word-break: break-word;font-family: 'Apple SD Gothic Neo', 'Malgun Gothic', '맑은 고딕', sans-serif;background-color: #fff;padding: 10px 0 30px;">
                                  <header style="height: 56px;background-color: #fcfafa;border-radius: 0 20px;max-width: 414px;margin: 0 auto;">
                                    <nav style="display: table;width: 100%;height: inherit;background-color: inherit;text-align: center;box-sizing: border-box;border-radius: inherit;">
                                      <h1 style="display: table-cell;vertical-align: middle;margin: 0;color: #111;font-size: 16px;font-weight: bold;">[ FOUNDY coupon ]</h1>
                                    </nav>
                                  </header>
                                  <section style="padding: 40px 16px 0;box-sizing: border-box;max-width: 414px;margin: 0 auto;">
                                    <h2 style="margin: 0 0 20px 0; color: #333; font-size: 14px; font-weight: normal; line-height: 1.75;">
                                      <strong>{{USER_NAME}}</strong> 고객님께 <sapn style="color: #ad796d;">{{COUPON_NAME}}</sapn> 쿠폰이 지금 발급되었습니다!        </h2>
                                    <div>
                                      <div style="width: 100%; border-top: 1px dashed #e0e0e0; margin: 0 0 24px;"></div>
                                      <div>
                                        <div>
                                          <div>
                                            <p style="display: inline-block;margin: 0 6px 8px 0;color: #fff;font-size: 10px;font-weight: bold;width: 88px;height: 20px;background-color: #b89bbc;text-align: center;box-sizing: border-box;padding: 3px 0;border-radius: 12px;vertical-align: top;">쿠폰명</p>
                                            <p style="display: inline-block; margin: 0; font-size: 12px; line-height: 20px; color: #ad796d; width: 50%; vertical-align: top; padding-top: 1px; box-sizing: border-box;">{{COUPON_NAME}}</p>
                                          </div>
                                        </div>
                                        <div>
                                          <div>
                                            <p style="display: inline-block;margin: 0 6px 8px 0;color: #fff;font-size: 10px;font-weight: bold;width: 88px;height: 20px;background-color: #b89bbc;text-align: center;box-sizing: border-box;padding: 3px 0;border-radius: 12px;vertical-align: top;">쿠폰 유효기간</p>
                                            <p style="display: inline-block;margin: 0;font-size: 12px;line-height: 20px;color: #757575;width: 50%;vertical-align: top;padding-top: 1px;box-sizing: border-box;-webkit-text-fill-color: #757575;text-decoration: none !important;"> {{EXPIRATION_DATE}}</p>
                                          </div>
                                        </div>
                                      </div>
                                      <p style="margin: 28px 0 0 0;color: #9e9e9e;font-size: 12px;font-weight: bold;-webkit-text-fill-color: #9e9e9e;text-decoration: none !important;">www.foundy.me</p>
                                    </div>
                                  </section>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td class="td-label chkTd">
                              <input class="chkPiece" type="checkbox" name="chkPiece">
                              <label class="chkLabel"></label>
                            </td>
                            <td>
                              <span class="td-span">유저 주문 완료 / 배송준비중 / 취소 등 상태 안내</span>
                            </td>
                            <td>
                              <span class="td-span">FOUNDY</span>
                            </td>
                            <td>
                              <span class="td-span">hello@foundy.me</span>
                            </td>
                            <td>
                              <span class="td-span">html</span>
                            </td>
                            <td>
                              <span class="td-span td-link">[FOUNDY] 상품 주문상태 안내</span>
                            </td>
                            <td class="posture">
                              <span class="td-span td-status td-locate font-futura activate">activate</span>
                            </td>
                            <td class="fn-td-btn clearfix">
                              <div class="td-btn-wrap">
                                <p class="td-span td-btn td-seeing">
                                                                                <span class="btn-ic btn--seeProfile">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                                                                </span>
                                  보기
                                </p>
                                <p class="td-span td-btn td-revise">
                                                                                <span class="btn-ic btn--modify">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                                                                </span>
                                  수정
                                </p>
                                <p class="td-span td-btn td-posture">
                                                                                <span class="btn-ic btn--display">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                                                                </span>
                                  상태변경
                                </p>
                              </div>
                            </td>
                            <td class="hidden_data">
                              <span class="change_letter">{{ORDER_STATUS}},{{ITEM_NAME}},{{PURCHASE_DATE}},{{PURCHASE_CODE}},{{REDIRECT_URL}},{{ITEM_IMG_URL}}</span>
                              <div class="mail_tag">
                                <div style="word-break: break-word;font-family: 'Apple SD Gothic Neo', 'Malgun Gothic', '맑은 고딕', sans-serif;background-color: #fff;padding: 10px 0 40px;">
                                  <header style="height: 56px;background-color: #fcfafa;border-radius: 0 20px;max-width: 414px;margin: 0 auto;">
                                    <nav style="display: table;width: 100%;height: inherit;background-color: inherit;text-align: center;box-sizing: border-box;border-radius: inherit;">
                                      <h1 style="display: table-cell;vertical-align: middle;margin: 0;color: #111;font-size: 16px;font-weight: bold;">[ FOUNDY <span style="color: #ad796d;">{{ORDER_STATUS}}</span> ]</h1>
                                    </nav>
                                  </header>
                                  <section style="padding: 40px 16px 0;box-sizing: border-box;max-width: 414px;margin: 0 auto;">
                                    <h2 style="margin: 0 0 20px 0; color: #333; font-size: 14px; font-weight: normal; line-height: 1.75; word-break: keep-all;">주문하신 <strong style="color: #ad796d;">{{ITEM_NAME}}</strong>의 세부 주문상태는 아래 버튼을 클릭하여 확인해주세요!</h2>
                                    <div>
                                      <div style="width: 100%; border-top: 1px dashed #e0e0e0; margin: 0 0 24px;"></div>
                                      <div style="font-size: 0;">
                                        <div style="display: inline-block; width: 58.6%; max-width: 274px; vertical-align: top;">
                                          <div>
                                            <p style="display: inline-block;margin: 0 6px 8px 0;color: #fff;font-size: 10px;font-weight: bold;width: 60px;height: 20px;background-color: #b89bbc;text-align: center;box-sizing: border-box;padding: 3px 0;border-radius: 12px;vertical-align: top;">주문일자</p>
                                            <p style="display: inline-block;margin: 0;font-size: 12px;line-height: 20px;color: #757575;width: 50%;vertical-align: top;padding-top: 1px;box-sizing: border-box;-webkit-text-fill-color: #757575;text-decoration: none !important;">{{PURCHASE_DATE}}</p>
                                          </div>
                                          <div>
                                            <p style="display: inline-block;margin: 0 6px 8px 0;color: #fff;font-size: 10px;font-weight: bold;width: 60px;height: 20px;background-color: #b89bbc;text-align: center;box-sizing: border-box;padding: 3px 0;border-radius: 12px;vertical-align: top;">주문번호</p>
                                            <p style="display: inline-block;margin: 0;font-size: 12px;line-height: 20px;color: #757575;width: 50%;vertical-align: top;padding-top: 1px;box-sizing: border-box;-webkit-text-fill-color: #757575;text-decoration: none !important;">{{PURCHASE_CODE}}</p>
                                          </div>
                                          <div>
                                            <p style="display: inline-block;margin: 0 6px 8px 0;color: #fff;font-size: 10px;font-weight: bold;width: 60px;height: 20px;background-color: #b89bbc;text-align: center;box-sizing: border-box;padding: 3px 0;border-radius: 12px;vertical-align: top;">상품명</p>
                                            <p style="display: inline-block;margin: 0;font-size: 12px;line-height: 20px;color: #757575;width: 50%;vertical-align: top;padding-top: 1px;box-sizing: border-box;-webkit-text-fill-color: #757575;text-decoration: none !important;">{{ITEM_NAME}}</p>
                                          </div>
                                        </div>
                                        <img src="{{ITEM_IMG_URL}}" style="display: inline-block; box-sizing: border-box;  border: 1px solid #eee; border-radius: 4px; max-width: 104px;">
                                      </div>
                                      <div style="display: table;width: 100%;margin: 32px auto 0;height: 48px;text-align: center;background-color: #616161;border-radius: 4px;">
                                        <a href="{{REDIRECT_URL}}" style="display: table-cell; vertical-align: middle; color: #fff; font-size: 16px; font-weight: bold; text-decoration: none !important; letter-spacing: 0.1em;">주문상세 확인하기</a>
                                      </div>
                                    </div>
                                  </section>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td class="td-label chkTd">
                              <input class="chkPiece" type="checkbox" name="chkPiece">
                              <label class="chkLabel"></label>
                            </td>
                            <td>
                              <span class="td-span">유저 배송시작 / 송장번호 안내</span>
                            </td>
                            <td>
                              <span class="td-span">FOUNDY</span>
                            </td>
                            <td>
                              <span class="td-span">hello@foundy.me</span>
                            </td>
                            <td>
                              <span class="td-span">html</span>
                            </td>
                            <td>
                              <span class="td-span td-link">[FOUNDY] 상품 배송상태 안내</span>
                            </td>
                            <td class="posture">
                              <span class="td-span td-status td-locate font-futura activate">activate</span>
                            </td>
                            <td class="fn-td-btn clearfix">
                              <div class="td-btn-wrap">
                                <p class="td-span td-btn td-seeing">
                                                                                <span class="btn-ic btn--seeProfile">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                                                                </span>
                                  보기
                                </p>
                                <p class="td-span td-btn td-revise">
                                                                                <span class="btn-ic btn--modify">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                                                                </span>
                                  수정
                                </p>
                                <p class="td-span td-btn td-posture">
                                                                                <span class="btn-ic btn--display">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                                                                </span>
                                  상태변경
                                </p>
                              </div>
                            </td>
                            <td class="hidden_data">
                              <span class="change_letter">{{SHIPPING_STATUS}},{{PURCHASE_CODE}},{{PURCHASE_TITLE}},{{SHIPPING_COMPANY}},{{SHIPPING_CODE}},{{ITEM_IMG_URL}}</span>
                              <div class="mail_tag">
                                <div style="word-break: break-word;font-family: 'Apple SD Gothic Neo', 'Malgun Gothic', '맑은 고딕', sans-serif;background-color: #fff;padding: 10px 0 40px;">
                                  <header style="height: 56px;background-color: #fcfafa;border-radius: 0 20px;max-width: 414px;margin: 0 auto;">
                                    <nav style="display: table;width: 100%;height: inherit;background-color: inherit;text-align: center;box-sizing: border-box;border-radius: inherit;">
                                      <h1 style="display: table-cell;vertical-align: middle;margin: 0;color: #111;font-size: 16px;font-weight: bold;">[ FOUNDY <span style="color: #ad796d;">{{SHIPPING_STATUS}}</span> ]
                                      </h1>
                                    </nav>
                                  </header>
                                  <section style="padding: 40px 16px 0;box-sizing: border-box;max-width: 414px;margin: 0 auto;">
                                    <h2 style="margin: 0 0 20px 0; color: #333; font-size: 14px; font-weight: normal; line-height: 1.75; word-break: keep-all;">주문하신 상품이 <strong style="color: #ad796d;">{{SHIPPING_STATUS}}</strong> 되었습니다.
                                      <span>파운디를 이용해주셔서 감사합니다!</span>
                                    </h2>
                                    <div>
                                      <div style="width: 100%; border-top: 1px dashed #e0e0e0; margin: 0 0 24px;"></div>
                                      <div style="font-size: 0;">
                                        <div style="display: inline-block; width: 60%; max-width: 218px; vertical-align: top;">
                                          <div>
                                            <p style="display: inline-block;margin: 0 6px 8px 0;color: #fff;font-size: 10px;font-weight: bold;width: 60px;height: 20px;background-color: #b89bbc;text-align: center;box-sizing: border-box;padding: 3px 0;border-radius: 12px;vertical-align: top;">주문번호</p>
                                            <p style="display: inline-block;margin: 0;font-size: 12px;line-height: 20px;color: #757575;width: 50%;vertical-align: top;padding-top: 1px;box-sizing: border-box;-webkit-text-fill-color: #757575;text-decoration: none !important;">{{PURCHASE_CODE}}</p>
                                          </div>
                                          <div>
                                            <p style="display: inline-block;margin: 0 6px 8px 0;color: #fff;font-size: 10px;font-weight: bold;width: 60px;height: 20px;background-color: #b89bbc;text-align: center;box-sizing: border-box;padding: 3px 0;border-radius: 12px;vertical-align: top;">상품명</p>
                                            <p style="display: inline-block;margin: 0;font-size: 12px;line-height: 20px;color: #757575;width: 50%;vertical-align: top;padding-top: 1px;box-sizing: border-box;-webkit-text-fill-color: #757575;text-decoration: none !important;">{{PURCHASE_TITLE}}</p>
                                          </div>
                                          <div>
                                            <p style="display: inline-block;margin: 0 6px 8px 0;color: #fff;font-size: 10px;font-weight: bold;width: 60px;height: 20px;background-color: #b89bbc;text-align: center;box-sizing: border-box;padding: 3px 0;border-radius: 12px;vertical-align: top;">택배사</p>
                                            <p style="display: inline-block;margin: 0;font-size: 12px;line-height: 20px;color: #757575;width: 50%;vertical-align: top;padding-top: 1px;box-sizing: border-box;-webkit-text-fill-color: #757575;text-decoration: none !important;">{{SHIPPING_COMPANY}}</p>
                                          </div>
                                          <div>
                                            <p style="display: inline-block;margin: 0 6px 8px 0;color: #fff;font-size: 10px;font-weight: bold;width: 60px;height: 20px;background-color: #b89bbc;text-align: center;box-sizing: border-box;padding: 3px 0;border-radius: 12px;vertical-align: top;">송장번호</p>
                                            <p style="display: inline-block;margin: 0;font-size: 12px;line-height: 20px;color: #757575;width: 50%;vertical-align: top;padding-top: 1px;box-sizing: border-box;-webkit-text-fill-color: #757575;text-decoration: none !important;">{{SHIPPING_CODE}}</p>
                                          </div>
                                        </div>
                                        <img src="{{ITEM_IMG_URL}}" style="display: inline-block; box-sizing: border-box;  border: 1px solid #eee; border-radius: 4px; max-width: 104px;">
                                      </div>
                                    </div>
                                  </section>
                                </div>
                              </div>
                            </td>
                          </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="list-btns-wrap clearfix">
                    <p class="list_tableList font-futura">
                      <!-- Showing 1 to 10 of 'N' rows, 1:start 10: max 'N':all -->
                      Showing 1 to <span class="tableList-Max">5</span> of <span class="tableList-All">5</span> rows
                    </p>
                    <div class="list_tableBtns clearfix">
                      <button class="btn__front">
                        <span class="frontDirection front1"></span>
                        <span class="frontDirection front1"></span>
                      </button>
                      <button class="btn__bringToFront">
                        <span class="frontDirection front2"></span>
                      </button>
                      
                      <!-- 버튼 클릭시 넘버링 바뀌면서 다음 테이블 순번으로 넘기기 -->
                      <button class="btn__listNo">1</button>
                      
                      <button class="btn__sendToBack">
                        <span class="backDirection back1"></span>
                      </button>
                      <button class="btn__back">
                        <span class="backDirection back2"></span>
                        <span class="backDirection back2"></span>
                      </button>
                    </div>
                    <script>
                      $(function(){
                        $('.list_tableBtns button').hover(function(){
                          // btn__front,back
                          $(this).addClass('listActive');
                          $(this).children('span[class*=front]').css({
                            border : '1px solid #433532',
                            'border-width' : '0 2px 2px 0'
                          });
                          $(this).children('span[class*=back]').css({
                            border : '1px solid #433532',
                            'border-width' : '0 2px 2px 0'
                          });
                          $(this).next().css('border-left','0');
                        },function(){
                          // btn__front,back
                          $(this).removeClass('listActive');
                          $(this).children('span[class*=front]').css({
                            border : '1px solid #e0e0e0',
                            'border-width' : '0 2px 2px 0'
                          });
                          $(this).children('span[class*=back]').css({
                            border : '1px solid #e0e0e0',
                            'border-width' : '0 2px 2px 0'
                          });
                          $(this).next().css('border-left','1px solid #e0e0e0');
                          $(this).next('.btn__listNo').css('border','0');
                        })
                      })
                    </script>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="contents_type contents_master scroll-y">
        <h3 class="meaning">쿠폰 관리</h3>
        <div class="type_wrap">
          <p class="type_tit slide_tit font-futura">Manage Coupon</p>
          <div class="type_box shadow">
            <div class="type_named">
              <script>
                $('.addCoupon').click(function(){
                  $('.boxwrap__pop').show().children('div[class$=add-wrap]').show().find('.add-coupon').show();
                })
              </script>
              <div class="namedBtn clearfix">
                <button class="named-fn addBtn addCoupon" style="/* margin-right: 28px; */">+ 추가</button>
                <span class="named-txt font-futura">or</span>
                <button class="named-fn removeBtn">- 삭제</button>
              </div>
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
                            <input class="chkAll chkAll_3" type="checkbox" name="chkAll">
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
                          <tbody>
                          <tr>
                            <td class="td-label chkTd">
                              <input class="chkPiece" type="checkbox" name="chkPiece">
                              <label class="chkLabel"></label>
                            </td>
                            <td>
                                                                        <span class="td-span">
강사회원 1월 할인쿠폰
</span>
                            </td>
                            <td>
                              <span class="td-span">강사회원쿠폰</span>
                            </td>
                            <td>
                              <span class="td-span">무제한</span>
                            </td>
                            <td>
                              <span class="td-span">10%</span>
                            </td>
                            <td>
                              <span class="td-span td-link">2021-01-21 00:00:00 ~ 2021-01-31 00:00:00</span>
                            </td>
                            <td>
                              <span class="td-span">2021-01-31 00:00:00</span>
                            </td>
                            <td class="posture">
                              <span class="td-span cpn-completed">발급완료</span>
                            </td>
                            <td class="fn-td-btn clearfix">
                              <div class="td-btn-wrap">
                                <p class="td-span td-btn td-seeing">
                                                                                <span class="btn-ic btn--seeProfile">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                                                                </span>
                                  보기
                                </p>
                                <p class="td-span td-btn td-revise">
                                                                                <span class="btn-ic btn--modify">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                                                                </span>
                                  수정
                                </p>
                                <p class="td-span td-btn td-posture">
                                                                                <span class="btn-ic btn--display">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                                                                </span>
                                  상태변경
                                </p>
                              </div>
                            </td>
                            <td class="hidden_data">
                              <span class="cp--id">8</span>
                              <span class="cp--name">강사회원 1월 할인쿠폰</span>
                              <span class="cp--guide">강사회원쿠폰 (쿠폰수는 0만 세팅 가능)</span>
                              <span class="cp--benefit">강사회원쿠폰</span>
                              <span class="cp--count">0</span>
                              <span class="cp--type">샵할인율</span>
                              <span class="cp--dc">10%</span>
                              <span class="issue--start">2021-01-21 12:00 AM</span>
                              <span class="issue--end">2021-01-31 12:00 AM</span>
                              <span class="cp--terminate">2021-01-31 12:00 AM</span>
                            </td>
                          </tr>
                          <tr>
                            <td class="td-label chkTd">
                              <input class="chkPiece" type="checkbox" name="chkPiece">
                              <label class="chkLabel"></label>
                            </td>
                            <td>
                                                                        <span class="td-span">
강사회원쿠폰
                                                                        </span>
                            </td>
                            <td>
                              <span class="td-span">강사회원쿠폰</span>
                            </td>
                            <td>
                              <span class="td-span">무제한</span>
                            </td>
                            <td>
                              <span class="td-span">10%</span>
                            </td>
                            <td>
                              <span class="td-span td-link">2021-01-21 00:00:00 ~ 2021-01-31 00:00:00</span>
                            </td>
                            <td>
                              <span class="td-span">2021-01-31 00:00:00</span>
                            </td>
                            <td class="posture">
                              <span class="td-span cpn-stopped">발급중지</span>
                            </td>
                            <td class="fn-td-btn clearfix">
                              <div class="td-btn-wrap">
                                <p class="td-span td-btn td-seeing">
                                                                                <span class="btn-ic btn--seeProfile">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                                                                </span>
                                  보기
                                </p>
                                <p class="td-span td-btn td-revise">
                                                                                <span class="btn-ic btn--modify">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                                                                </span>
                                  수정
                                </p>
                                <p class="td-span td-btn td-posture">
                                                                                <span class="btn-ic btn--display">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                                                                </span>
                                  상태변경
                                </p>
                              </div>
                            </td>
                            <td class="hidden_data">
                              <span class="cp--id">7</span>
                              <span class="cp--name">강사회원쿠폰</span>
                              <span class="cp--guide">강사회원쿠폰 (쿠폰수는 0만 세팅 가능)</span>
                              <span class="cp--benefit">강사회원쿠폰</span>
                              <span class="cp--count">0</span>
                              <span class="cp--type">샵할인율</span>
                              <span class="cp--dc">10%</span>
                              <span class="issue--start">2021-01-21 12:00 AM</span>
                              <span class="issue--end">2021-01-31 12:00 AM</span>
                              <span class="cp--terminate">2021-01-31 12:00 AM</span>
                            </td>
                          </tr>
                          <tr>
                            <td class="td-label chkTd">
                              <input class="chkPiece" type="checkbox" name="chkPiece">
                              <label class="chkLabel"></label>
                            </td>
                            <td>
                                                                        <span class="td-span">
센터회원쿠폰
                                                                        </span>
                            </td>
                            <td>
                              <span class="td-span">센터회원쿠폰</span>
                            </td>
                            <td>
                              <span class="td-span">무제한</span>
                            </td>
                            <td>
                              <span class="td-span">10000원</span>
                            </td>
                            <td>
                              <span class="td-span td-link">2021-01-21 00:00:00 ~ 2021-01-31 00:00:00</span>
                            </td>
                            <td>
                              <span class="td-span">2021-01-31 00:00:00</span>
                            </td>
                            <td class="posture">
                              <span class="td-span cpn-completed">발급완료</span>
                            </td>
                            <td class="fn-td-btn clearfix">
                              <div class="td-btn-wrap">
                                <p class="td-span td-btn td-seeing">
                                                                                <span class="btn-ic btn--seeProfile">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                                                                </span>
                                  보기
                                </p>
                                <p class="td-span td-btn td-revise">
                                                                                <span class="btn-ic btn--modify">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                                                                </span>
                                  수정
                                </p>
                                <p class="td-span td-btn td-posture">
                                                                                <span class="btn-ic btn--display">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                                                                </span>
                                  상태변경
                                </p>
                              </div>
                            </td>
                            <td class="hidden_data">
                              <span class="cp--id">6</span>
                              <span class="cp--name">센터회원쿠폰</span>
                              <span class="cp--guide">센터회원쿠폰 (쿠폰수는 0만 세팅 가능, 신규 회원 승인 시 알림톡 전송, 기존 회원은 쿠폰박스에서 발급가능)</span>
                              <span class="cp--benefit">센터회원쿠폰</span>
                              <span class="cp--count">0</span>
                              <span class="cp--type">샵할인금액</span>
                              <span class="cp--dc">10000원</span>
                              <span class="issue-start">2021-01-21 12:00 AM</span>
                              <span class="issue-end">2021-01-31 12:00 AM</span>
                              <span class="cp--terminate">2021-01-31 12:00 AM</span>
                            </td>
                          </tr>
                          <tr>
                            <td class="td-label chkTd">
                              <input class="chkPiece" type="checkbox" name="chkPiece">
                              <label class="chkLabel"></label>
                            </td>
                            <td>
                                                                        <span class="td-span">
회원가입쿠폰
                                                                        </span>
                            </td>
                            <td>
                              <span class="td-span">회원가입쿠폰</span>
                            </td>
                            <td>
                              <span class="td-span">무제한</span>
                            </td>
                            <td>
                              <span class="td-span">2000원</span>
                            </td>
                            <td>
                              <span class="td-span td-link">2021-01-19 23:00:00 ~ 2021-01-27 00:00:00</span>
                            </td>
                            <td>
                              <span class="td-span">2021-01-31 00:00:00</span>
                            </td>
                            <td class="posture">
                              <span class="td-span cpn-completed">발급완료</span>
                            </td>
                            <td class="fn-td-btn clearfix">
                              <div class="td-btn-wrap">
                                <p class="td-span td-btn td-seeing">
                                                                                <span class="btn-ic btn--seeProfile">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                                                                </span>
                                  보기
                                </p>
                                <p class="td-span td-btn td-revise">
                                                                                <span class="btn-ic btn--modify">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                                                                </span>
                                  수정
                                </p>
                                <p class="td-span td-btn td-posture">
                                                                                <span class="btn-ic btn--display">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                                                                </span>
                                  상태변경
                                </p>
                              </div>
                            </td>
                            <td class="hidden_data">
                              <span class="cp--id">5</span>
                              <span class="cp--name">회원가입쿠폰</span>
                              <span class="cp--guide">회원가입쿠폰 (쿠폰수가 0인 경우 해당기간동안 회원가입한 모든 유저에게 지급, 0보다 큰 경우 해당 기간동안에 선착순 지급)</span>
                              <span class="cp--benefit">회원가입쿠폰</span>
                              <span class="cp--count">0</span>
                              <span class="cp--type">샵할인금액</span>
                              <span class="cp--dc">2000원</span>
                              <span class="issue--start">2021-01-19 11:00 PM</span>
                              <span class="issue--end">2021-01-27 12:00 AM</span>
                              <span class="cp--terminate">2021-01-31 12:00 AM</span>
                            </td>
                          </tr>
                          <tr>
                            <td class="td-label chkTd">
                              <input class="chkPiece" type="checkbox" name="chkPiece">
                              <label class="chkLabel"></label>
                            </td>
                            <td>
                                                                        <span class="td-span">
무료배송쿠폰
                                                                        </span>
                            </td>
                            <td>
                              <span class="td-span">구매유도쿠폰</span>
                            </td>
                            <td>
                              <span class="td-span">무제한</span>
                            </td>
                            <td>
                              <span class="td-span">무료배송</span>
                            </td>
                            <td>
                              <span class="td-span td-link">2021-01-20 00:00:00 ~ 2021-03-31 00:00:00</span>
                            </td>
                            <td>
                              <span class="td-span">2021-01-30 00:00:00	</span>
                            </td>
                            <td class="posture">
                              <span class="td-span cpn-completed">발급완료</span>
                            </td>
                            <td class="fn-td-btn clearfix">
                              <div class="td-btn-wrap">
                                <p class="td-span td-btn td-seeing">
                                                                                <span class="btn-ic btn--seeProfile">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                                                                </span>
                                  보기
                                </p>
                                <p class="td-span td-btn td-revise">
                                                                                <span class="btn-ic btn--modify">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                                                                </span>
                                  수정
                                </p>
                                <p class="td-span td-btn td-posture">
                                                                                <span class="btn-ic btn--display">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                                                                </span>
                                  상태변경
                                </p>
                              </div>
                            </td>
                            <td class="hidden_data">
                              <span class="cp--id">4</span>
                              <span class="cp--name">무료배송쿠폰</span>
                              <span class="cp--guide">구매유도쿠폰 (쿠폰수는 0만 세팅 가능, 구매페이지 접속 시 해당 쿠폰 지급)</span>
                              <span class="cp--benefit">구매유도쿠폰</span>
                              <span class="cp--count">0</span>
                              <span class="cp--type">무료배송</span>
                              <span class="cp--dc">0</span>
                              <span class="issue--start">2021-01-20 12:00 AM</span>
                              <span class="issut--end">2021-01-31 12:00 AM</span>
                              <span class="cp--terminate">2021-01-30 12:00 AM</span>
                            </td>
                          </tr>
                          <tr>
                            <td class="td-label chkTd">
                              <input class="chkPiece" type="checkbox" name="chkPiece">
                              <label class="chkLabel"></label>
                            </td>
                            <td>
                                                                        <span class="td-span">
무료배송쿠폰
                                                                        </span>
                            </td>
                            <td>
                              <span class="td-span">구매유도쿠폰</span>
                            </td>
                            <td>
                              <span class="td-span">무제한</span>
                            </td>
                            <td>
                              <span class="td-span">무료배송</span>
                            </td>
                            <td>
                              <span class="td-span td-link">2021-01-19 00:00:00 ~ 2021-03-31 00:00:00</span>
                            </td>
                            <td>
                              <span class="td-span">2021-08-31 00:00:00</span>
                            </td>
                            <td class="posture">
                              <span class="td-span cpn-stopped">발급중지</span>
                            </td>
                            <td class="fn-td-btn clearfix">
                              <div class="td-btn-wrap">
                                <p class="td-span td-btn td-seeing">
                                                                                <span class="btn-ic btn--seeProfile">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                                                                </span>
                                  보기
                                </p>
                                <p class="td-span td-btn td-revise">
                                                                                <span class="btn-ic btn--modify">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                                                                </span>
                                  수정
                                </p>
                                <p class="td-span td-btn td-posture">
                                                                                <span class="btn-ic btn--display">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                                                                </span>
                                  상태변경
                                </p>
                              </div>
                            </td>
                            <td class="hidden_data">
                              <span class="cp--id">3</span>
                              <span class="cp--name">무료배송쿠폰</span>
                              <span class="cp--guide">무료배송쿠폰</span>
                              <span class="cp--benefit">구매유도쿠폰</span>
                              <span class="cp--count">0</span>
                              <span class="cp--type">무료배송</span>
                              <span class="cp--dc">0</span>
                              <span class="issue--start">2021-01-19 12:00 AM</span>
                              <span class="issue--end">2021-03-31 12:00 AM</span>
                              <span class="cp--terminate">2021-08-31 12:00 AM</span>
                            </td>
                          </tr>
                          <tr>
                            <td class="td-label chkTd">
                              <input class="chkPiece" type="checkbox" name="chkPiece">
                              <label class="chkLabel"></label>
                            </td>
                            <td>
                                                                        <span class="td-span">
회원가입 쿠폰2
</span>
                            </td>
                            <td>
                              <span class="td-span">회원가입</span>
                            </td>
                            <td>
                              <span class="td-span">무제한</span>
                            </td>
                            <td>
                              <span class="td-span">5%</span>
                            </td>
                            <td>
                              <span class="td-span td-link">2020-08-01 00:00:00 ~ 2021-12-31 00:00:00</span>
                            </td>
                            <td>
                              <span class="td-span">2022-01-31 00:00:00</span>
                            </td>
                            <td class="posture">
                              <span class="td-span cpn-stopped">발급중지</span>
                            </td>
                            <td class="fn-td-btn clearfix">
                              <div class="td-btn-wrap">
                                <p class="td-span td-btn td-seeing">
                                                                                <span class="btn-ic btn--seeProfile">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                                                                </span>
                                  보기
                                </p>
                                <p class="td-span td-btn td-revise">
                                                                                <span class="btn-ic btn--modify">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                                                                </span>
                                  수정
                                </p>
                                <p class="td-span td-btn td-posture">
                                                                                <span class="btn-ic btn--display">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                                                                </span>
                                  상태변경
                                </p>
                              </div>
                            </td>
                            <td class="hidden_data">
                              <span class="cp--id">2</span>
                              <span class="cp--name">회원가입 쿠폰2</span>
                              <span class="cp--guide">그랜드 오픈 기념 쿠폰</span>
                              <span class="cp--benefit">회원가입쿠폰</span>
                              <span class="cp--count">0</span>
                              <span class="cp--type">샵할인율</span>
                              <span class="cp--dc">5%</span>
                              <span class="issue--start">2020-08-01 12:00 AM</span>
                              <span class="issue--end">2021-12-31 12:00 AM</span>
                              <span class="cp--terminate">2022-01-31 12:00 AM</span>
                            </td>
                          </tr>
                          <tr>
                            <td class="td-label chkTd">
                              <input class="chkPiece" type="checkbox" name="chkPiece">
                              <label class="chkLabel"></label>
                            </td>
                            <td>
                                                                        <span class="td-span">
회원가입 쿠폰
</span>
                            </td>
                            <td>
                              <span class="td-span">회원가입</span>
                            </td>
                            <td>
                              <span class="td-span">300</span>
                            </td>
                            <td>
                              <span class="td-span">10%</span>
                            </td>
                            <td>
                              <span class="td-span td-link">2020-08-01 00:00:00 ~ 2020-08-31 00:00:00</span>
                            </td>
                            <td>
                              <span class="td-span">2020-09-30 00:00:00</span>
                            </td>
                            <td class="posture">
                              <span class="td-span cpn-completed">발급완료</span>
                            </td>
                            <td class="fn-td-btn clearfix">
                              <div class="td-btn-wrap">
                                <p class="td-span td-btn td-seeing">
                                                                                <span class="btn-ic btn--seeProfile">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                                                                </span>
                                  보기
                                </p>
                                <p class="td-span td-btn td-revise">
                                                                                <span class="btn-ic btn--modify">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                                                                </span>
                                  수정
                                </p>
                                <p class="td-span td-btn td-posture">
                                                                                <span class="btn-ic btn--display">
                                                                                    <img src="<?= base_url(); ?>template/back/master/icon/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                                                                </span>
                                  상태변경
                                </p>
                              </div>
                            </td>
                            <td class="hidden_data">
                              <span class="cp--id">1</span>
                              <span class="cp--name">회원가입쿠폰</span>
                              <span class="cp--guide">그랜드 오픈 기념 쿠폰</span>
                              <span class="cp--benefit">회원가입쿠폰</span>
                              <span class="cp--count">300</span>
                              <span class="cp--type">샵할인율</span>
                              <span class="cp--dc">10%</span>
                              <span class="issue--start">2020-08-01 12:00 AM</span>
                              <span class="issue--end">2020-08-31 12:00 AM</span>
                              <span class="cp--terminate">2020-09-30 12:00 AM</span>
                            </td>
                          </tr>
                          </tbody>
                        </table>
                        <script>
                          $(function(){
                            // 보기 버튼 클릭
                            $('.td-seeing').click(function(){
                              let initial =$(this).closest('.type_box').prev().text();
                              // alert(initial);
                              
                              let exist_m = initial.indexOf('m');
                              let exist_c = initial.indexOf('ou');
                              
                              if(exist_m !== -1){
                                // 메일 보기 팝업
                                $('.boxwrap__pop').show().children('div[class*="frame:mail"]').show();
                                
                                /* 메일 수정 팝업에 있는 내용 메일 보기 팝업에도 동시적용 */
                                let table_type = $(this).closest('tr').find('td:eq(1)').find('.td-span').text();
                                let table_tit = $(this).closest('tr').find('td:eq(5)').find('.td-span').text();
                                let table_address = $(this).closest('tr').find('td:eq(3)').find('.td-span').text();
                                let table_sender = $(this).closest('tr').find('td:eq(2)').find('.td-span').text();
                                let table_form = $(this).closest('tr').find('td:eq(4)').find('.td-span').text();
                                let table_letter = $(this).closest('.fn-td-btn').next().find('.change_letter').text();
                                let table_mail = $(this).closest('.fn-td-btn').next().find('.mail_tag').html();
                                
                                $('.typeE-Tit').text(table_type);
                                $('.see__tit').text(table_tit);
                                $('.see__address').text(table_address);
                                $('.see__sender').text(table_sender);
                                $('.see__letter').text(table_letter);
                                $('.see__html').html(table_mail);
                              }
                              
                              else if(exist_c !== -1){
                                // 쿠폰 보기 팝업
                                $('.boxwrap__pop').show().children('div[class*="frame:coupon"]').show();
                                
                                /* 쿠폰 수정 팝업에 있는 내용 쿠폰 보기 팝업에도 동시적용 */
                                let table_id = $(this).closest('.fn-td-btn').next().find('.cp--id').text();
                                let table_name = $(this).closest('.fn-td-btn').next().find('.cp--name').text();
                                let table_guide = $(this).closest('.fn-td-btn').next().find('.cp--guide').text();
                                let table_benefit = $(this).closest('.fn-td-btn').next().find('.cp--benefit').text();
                                let table_count = $(this).closest('.fn-td-btn').next().find('.cp--count').text();
                                let table_type = $(this).closest('.fn-td-btn').next().find('.cp--type').text();
                                let table_dc = $(this).closest('.fn-td-btn').next().find('.cp--dc').text();
                                let table_start = $(this).closest('.fn-td-btn').next().find('.issue--start').text();
                                let table_end = $(this).closest('.fn-td-btn').next().find('.issue--end').text();
                                let table_terminate = $(this).closest('.fn-td-btn').next().find('.cp--terminate').text();
                                
                                $('.typeC-Tit').text(table_name);
                                $('.see__id').text(table_id);
                                $('.see__name').text(table_name);
                                $('.see__guide').text(table_guide);
                                $('.see__benefit').text(table_benefit);
                                if(table_count === 0){
                                  $('.see__count').text('무제한');
                                }
                                $('.see__type').text(table_type);
                                $('.see__dc').text(table_dc);
                                $('.see__start').text(table_start);
                                $('.see__end').text(table_end);
                                $('.see__terminate').text(table_terminate);
                              }
                            })
                            
                            
                            
                            // 수정 버튼 클릭
                            $('.td-revise').click(function(){
                              let name = $(this).closest('.named-wrap').prev().find('.addBtn').attr('class');
                              // console.log(name);
                              
                              
                              let split = name.split('');
                              // console.log(split);
                              
                              // split 으로 'S','M','C' 값 가져오기
                              let exist_S = split.indexOf('S');
                              let exist_M = split.indexOf('M');
                              let exist_C = split.indexOf('C');
                              // console.log(exist_1,exist_2,exist_3);
                              
                              if(exist_S != -1){
                                // console.log(1); ok
                                // 슬라이더 수정
                                $('.boxwrap__pop').show().children('div[class$=add-wrap]').show()
                                  .find('.add-slider').show().find('.add-contents').css('padding-bottom','60px');
                                
                                /* 테이블 데이터 값 가져오기 */
                                
                                let table_tit = $(this).closest('tr').find('td:eq(2)').find('.td-span').text();
                                let table_cat = $(this).closest('tr').find('td:eq(3)').find('.td-span').text();
                                let table_loc = $(this).closest('tr').find('td:eq(6)').find('.td-span').text();
                                let table_imgSrc = $(this).closest('tr').find('td:eq(1)').find('img').attr('src');
                                let table_description = $(this).closest('tr').find('td:eq(4)').find('.td-span').text();
                                let table_link = $(this).closest('tr').find('td:eq(5)').find('.td-span').text();
                                
                                $('.revise_tit').val(table_tit);
                                $('.revise_cat').val(table_cat);
                                $('.locate_sel option[value='+ table_loc +']').attr('selected','selected');
                                $('.file_thumb').css('display','block').find('img').attr('src',table_imgSrc);
                                $('.description_form').val(table_description);
                                $('.revise_link').val(table_link);
                                
                              }
                              else if(exist_M != -1){
                                // 이메일 수정
                                $('.boxwrap__pop').show().children('div[class$=add-wrap]').show().find('.add-mail').show();
                                
                                /* 테이블 데이터 값 가져오기 */
                                let table_type = $(this).closest('tr').find('td:eq(1)').find('.td-span').text();
                                let table_tit = $(this).closest('tr').find('td:eq(5)').find('.td-span').text();
                                let table_address = $(this).closest('tr').find('td:eq(3)').find('.td-span').text();
                                let table_sender = $(this).closest('tr').find('td:eq(2)').find('.td-span').text();
                                let table_form = $(this).closest('tr').find('td:eq(4)').find('.td-span').text();
                                let table_letter = $(this).closest('.fn-td-btn').next().find('.change_letter').text();
                                let table_mail = $(this).closest('.fn-td-btn').next().find('.mail_tag').html();
                                
                                $('.add-mail .val-input').val(table_type);
                                $('.revise_mailTit').val(table_tit);
                                $('.revise_address').val(table_address);
                                $('.revise_sender').val(table_sender);
                                $('.revise_letter').val(table_letter);
                                $('.mail__html').html(table_mail);
                              }
                              else if(exist_C != -1){
                                // 쿠폰 수정
                                $('.boxwrap__pop').show().children('div[class$=add-wrap]').show().find('.add-coupon').show();
                                
                                /* 테이블 데이터 값 가져오기 */
                                let table_id = $(this).closest('.fn-td-btn').next().find('.cp--id').text();
                                let table_name = $(this).closest('.fn-td-btn').next().find('.cp--name').text();
                                let table_guide = $(this).closest('.fn-td-btn').next().find('.cp--guide').text();
                                let table_benefit = $(this).closest('.fn-td-btn').next().find('.cp--benefit').text();
                                let table_count = $(this).closest('.fn-td-btn').next().find('.cp--count').text();
                                let table_type = $(this).closest('.fn-td-btn').next().find('.cp--type').text();
                                let table_dc = $(this).closest('.fn-td-btn').next().find('.cp--dc').text();
                                let table_start = $(this).closest('.fn-td-btn').next().find('.issue--start').text();
                                let table_end = $(this).closest('.fn-td-btn').next().find('.issue--end').text();
                                let table_terminate = $(this).closest('.fn-td-btn').next().find('.cp--terminate').text();
                                
                                $('.revise_id').val(table_id);
                                $('.revise_cpName').val(table_name);
                                $('.revise_cpDc').val(table_dc);
                                $('.revise_cpGuide').val(table_guide);
                                
                                // 적용(혜택)회원
                                if(table_benefit === '적용회원'){
                                  $('.revise_cpBenefit:eq(0)').prop('selected',true);
                                }
                                else if(table_benefit === '회원가입쿠폰'){
                                  $('.revise_cpBenefit:eq(1)').prop('selected',true);
                                }
                                else if(table_benefit === '구매유도쿠폰'){
                                  $('.revise_cpBenefit:eq(2)').prop('selected',true);
                                }
                                else if(table_benefit === '센터회원쿠폰'){
                                  $('.revise_cpBenefit:eq(3)').prop('selected',true);
                                }
                                else if(table_benefit === '강사회원쿠폰'){
                                  $('.revise_cpBenefit:eq(4)').prop('selected',true);
                                }
                                
                                // 쿠폰수
                                if(table_count === '0'){
                                  $('.revise_cpCount').val('무제한');
                                }
                                
                                // 쿠폰타입
                                if(table_type === '쿠폰타입'){
                                  $('.revise_cpType:eq(0)').prop('selected',true);
                                }
                                else if(table_type === '샵할인금액'){
                                  $('.revise_cpType:eq(1)').prop('selected',true);
                                }
                                else if(table_type === '샵할인율'){
                                  $('.revise_cpType:eq(2)').prop('selected',true);
                                }
                                else if(table_type === '무료배송'){
                                  $('.revise_cpType:eq(3)').prop('selected',true);
                                }
                              }
                            })
                            
                            
                            // 상태변경 버튼 클릭
                            $('.td-posture').click(function(){
                              $('.boxwrap__pop').show().children('div[class*=question]').show();
                              
                              var origin = $(this).closest('td').siblings('.posture').children().text();
                              // console.log(origin);    activate inactivate   발급중/발급중지/발급완료   메인 노출/메인미노출,샵 메인노출/샵메인미노출
                              var data = '';
                              
                              // 가짓수가 2가지일 때
                              /* activate inactivate     발급중/발급중지/발급완료     메인 노출/메인미노출 , 샵 메인노출/샵메인미노출 */
                              
                              /* activate 상태 */
                              if(origin === 'activate'){
                                data = 'inactivate';
                                var txt = data + ' 상태로 변경하시겠습니까?';
                                $(this).closest('#master').find('div[class*=question]').find('.cnt_tit').text(txt);
                              }
                              else if(origin === 'inactivate') {
                                data = 'activate';
                                var txt = data + ' 상태로 변경하시겠습니까?';
                                $(this).closest('#master').find('div[class*=question]').find('.cnt_tit').text(txt);
                              }
                              
                              /* 쿠폰 발급 상태 */
                              else if(origin === '발급중지'){
                                data = '발급중';
                                var txt = data + ' 상태로 변경하시겠습니까?';
                                $(this).closest('#master').find('div[class*=question]').find('.cnt_tit').text(txt);
                              }
                              else if(origin === '발급중' || origin === '발급완료'){
                                data = '발급중지';
                                var txt = data + ' 상태로 변경하시겠습니까?';
                                $(this).closest('#master').find('div[class*=question]').find('.cnt_tit').text(txt);
                              }
                              
                              /* 메인 노출/미노출 , 샵 메인노출/미노출*/
                              else if(origin === '메인노출'){
                                data = '메인에 게시를 하시겠습니까?';
                                var txt = data;
                                $(this).closest('#master').find('div[class*=question]').find('.cnt_tit').text(txt);
                              }
                              else if(origin === '메인미노출'){
                                data = '메인에 게시를 취소하시겠습니까?';
                                var txt = data;
                                $(this).closest('#master').find('div[class*=question]').find('.cnt_tit').text(txt);
                              }
                              else if(origin === '샵메인노출'){
                                data = '샵메인에 게시를 하시겠습니까?';
                                var txt = data;
                                $(this).closest('#master').find('div[class*=question]').find('.cnt_tit').text(txt);
                              }
                              else if(origin === '샵메인미노출'){
                                data = '샵메인에 게시를 취소하시겠습니까?';
                                var txt = data;
                                $(this).closest('#master').find('div[class*=question]').find('.cnt_tit').text(txt);
                              }
                              
                              
                              // 가짓수가 3가지일 때 셀렉트 박스 show/hide
                              
                            })
                          })
                        </script>
                      </div>
                    </div>
                  </div>
                  <div class="list-btns-wrap clearfix">
                    <p class="list_tableList font-futura">
                      <!-- Showing 1 to 10 of 'N' rows, 1:start 10: max 'N':all -->
                      Showing 1 to <span class="tableList-Max">5</span> of <span class="tableList-All">5</span> rows
                    </p>
                    <div class="list_tableBtns clearfix">
                      <button class="btn__front">
                        <span class="frontDirection front1"></span>
                        <span class="frontDirection front1"></span>
                      </button>
                      <button class="btn__bringToFront">
                        <span class="frontDirection front2"></span>
                      </button>
                      
                      <!-- 버튼 클릭시 넘버링 바뀌면서 다음 테이블 순번으로 넘기기 -->
                      <button class="btn__listNo">1</button>
                      
                      <button class="btn__sendToBack">
                        <span class="backDirection back1"></span>
                      </button>
                      <button class="btn__back">
                        <span class="backDirection back2"></span>
                        <span class="backDirection back2"></span>
                      </button>
                    </div>
                    <script>
                      $(function(){
                        $('.list_tableBtns button').hover(function(){
                          // btn__front,back
                          $(this).addClass('listActive');
                          $(this).children('span[class*=front]').css({
                            border : '1px solid #433532',
                            'border-width' : '0 2px 2px 0'
                          });
                          $(this).children('span[class*=back]').css({
                            border : '1px solid #433532',
                            'border-width' : '0 2px 2px 0'
                          });
                          $(this).next().css('border-left','0');
                        },function(){
                          // btn__front,back
                          $(this).removeClass('listActive');
                          $(this).children('span[class*=front]').css({
                            border : '1px solid #e0e0e0',
                            'border-width' : '0 2px 2px 0'
                          });
                          $(this).children('span[class*=back]').css({
                            border : '1px solid #e0e0e0',
                            'border-width' : '0 2px 2px 0'
                          });
                          $(this).next().css('border-left','1px solid #e0e0e0');
                          $(this).next('.btn__listNo').css('border','0');
                        })
                      })
                    </script>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="contents_type contents_master scroll-y">
        <h3 class="meaning">샵 메인관리</h3>
        <div class="type_wrap">
          <p class="type_tit slide_tit font-futura">Manage Shop-main</p>
          <div class="type_box_wrap">
            <!-- BEST ITEM -->
            <div class="type_box shadow">
              <p class="type__shopTit font-futura">BEST ITEM</p>
              <div class="type__shopCnt shop-best">
                <div class="shop--search shop--add form_val">
                  <input class="search-input val-input" value="">
                  <!-- 검색 -->
                  <button class="search-btn val-search">
                    <img src="<?= base_url(); ?>template/back/master/icon/ic_search.png" alt="검색" width="auto" height="16">
                  </button>
                  <script>
                    $(function(){
                      $(window).on('click',function(e){
                        let target = e.target.className;
                        // console.log(target);
                        
                        let letter_1 = 'shop';
                        let letter_2 = 'type';
                        
                        let letter_shop = target.indexOf('shop');
                        let letter_type = target.indexOf('type');
                        // console.log(type_shop);
                        
                        if(letter_shop != '-1' || letter_type != '-1') {
                          $('.type__shopCnt .val-input').removeClass('shadow_sm');
                          $('.shop--searchBox').hide().prev().prev().hide();
                          
                          $('.type__shopCnt').find('.addBtn').attr('disabled',true).addClass('disabledBtn');
                          $('.type__shopCnt').find('.removeBtn').attr('disabled',false).removeClass('disabledBtn');  $('.type__shopCnt').find('button[class*=go__to]').attr('disabled',false).removeClass('disabledBtn3');
                          
                          // shop--tbale 비활성화 해제
                          $('.type__shopCnt').find('.shop--table th').removeClass('gray_bg');
                          $('.type__shopCnt').find('.shop--table .th-span').removeClass('gray_txt');
                          
                          $('.type__shopCnt').find('.shop--table .chkAll').attr('disabled',false)
                            .next().removeClass('toggleChkDisabled');
                          $('.type__shopCnt').find('.shop--table .chkPiece').attr('disabled',false)
                            .next().removeClass('toggleChkDisabled');
                        }
                      })
                      $('.search-btn').click(function(){
                        let val = $('.val-input').val();
                        
                        if(val === ''){
                          alert('검색어를 입력해주세요!');
                        }
                        else {
                          $(this).closest('.type__shopCnt').find('.shop--searchBox').show().prev().prev().show();
                        }
                      })
                      $('.type__shopCnt .val-input').click(function(){
                        $(this).closest('.type__shopCnt').find('.shop--searchBox').show().prev().prev().show();
                        
                        $(this).closest('.type__shopCnt').find('.addBtn').attr('disabled',false).removeClass('disabledBtn');
                        $(this).closest('.type__shopCnt').find('.removeBtn').attr('disabled',true).addClass('disabledBtn');
                        $(this).closest('.type__shopCnt').find('button[class*=go__to]').attr('disabled',true).addClass('disabledBtn3');
                        
                        // shop--tbale 비활성화
                        $(this).closest('.type__shopCnt').find('.shop--table th').addClass('gray_bg');
                        $(this).closest('.type__shopCnt').find('.shop--table .th-span').addClass('gray_txt');
                        
                        $(this).closest('.type__shopCnt').find('.shop--table .chkAll').attr('disabled','disabled')
                          .next().addClass('toggleChkDisabled');
                        $(this).closest('.type__shopCnt').find('.shop--table .chkPiece').attr('disabled','disabled')
                          .next().addClass('toggleChkDisabled');
                      })
                    })
                  </script>
                </div>
                <div class="shop--chkTip" style="display: none;">
                  <label class="chkTip_salesRate">
                    <input type="checkbox" class="salseRateChk" checked="checked"> 판매량순
                  </label>
                  <label class="chkTip_recent gray_txt">
                    <input type="checkbox" class="recentChk"> 최신순
                  </label>
                  <script>
                    $(function(){
                      // console.log(1);
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
                </div>
                <div class="namedBtn clearfix">
                  <button class="named-fn addBtn addSlider disabledBtn" style="/* margin-right: 28px; */">+ 추가</button>
                  <span class="named-txt font-futura">or</span>
                  <button class="named-fn removeBtn">- 삭제</button>
                  <script>
                    $(function(){
                      // 기존 호버 이벤트 막기
                      $('.type__shopCnt .named-fn').off('mousemove mouseout');
                      // 기존 클릭 이벤트 막고 다시  on 이벤트로 연결하기
                      $('.type__shopCnt .named-fn').off('click');
                      // addBtn 클릭 후
                      
                      // removeBtn 클릭 후
                      
                    })
                  </script>
                </div>
                <!-- 검색 시 나오는 정보(팝업) 영역 -->
                <div class="shop--searchBox" style="display: none;">BEST ITEM 리스트에 상품 등록하기</div>
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
                          <input class="chkAll chkAll_3" type="checkbox" name="chkAll">
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
                        <tbody>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">1</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <div class="td-span">
                              <button class="go__toUp"></button>
                              <button class="go__toDown"></button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">2</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <div class="td-span">
                              <button class="go__toUp"></button>
                              <button class="go__toDown"></button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">3</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <div class="td-span">
                              <button class="go__toUp"></button>
                              <button class="go__toDown"></button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">4</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <div class="td-span">
                              <button class="go__toUp"></button>
                              <button class="go__toDown"></button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">5</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <div class="td-span">
                              <button class="go__toUp"></button>
                              <button class="go__toDown"></button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">6</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <div class="td-span">
                              <button class="go__toUp"></button>
                              <button class="go__toDown"></button>
                            </div>
                          </td>
                        </tr>
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
              <div class="type__shopCnt shop-best">
                <div class="shop--search shop--add form_val">
                  <input class="search-input val-input" value="">
                  <!-- 검색 -->
                  <button class="search-btn val-search">
                    <img src="<?= base_url(); ?>template/back/master/icon/ic_search.png" alt="검색" width="auto" height="16">
                  </button>
                </div>
                <div class="shop--chkTip" style="display: none;">
                  <label class="chkTip_salesRate">
                    <input type="checkbox" class="salseRateChk" checked="checked"> 판매량순
                  </label>
                  <label class="chkTip_recent gray_txt">
                    <input type="checkbox" class="recentChk"> 최신순
                  </label>
                </div>
                <div class="namedBtn clearfix">
                  <button class="named-fn addBtn addSlider disabledBtn" style="/* margin-right: 28px; */">+ 추가</button>
                  <span class="named-txt font-futura">or</span>
                  <button class="named-fn removeBtn">- 삭제</button>
                </div>
                <!-- 검색 시 나오는 정보(팝업) 영역 -->
                <div class="shop--searchBox" style="display: none;">NEW IN 리스트에 상품 등록하기</div>
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
                          <input class="chkAll chkAll_3" type="checkbox" name="chkAll">
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
                        <tbody>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">1</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <div class="td-span">
                              <button class="go__toUp"></button>
                              <button class="go__toDown"></button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">2</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <div class="td-span">
                              <button class="go__toUp"></button>
                              <button class="go__toDown"></button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">3</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <div class="td-span">
                              <button class="go__toUp"></button>
                              <button class="go__toDown"></button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">4</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <div class="td-span">
                              <button class="go__toUp"></button>
                              <button class="go__toDown"></button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">5</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <div class="td-span">
                              <button class="go__toUp"></button>
                              <button class="go__toDown"></button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">6</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <div class="td-span">
                              <button class="go__toUp"></button>
                              <button class="go__toDown"></button>
                            </div>
                          </td>
                        </tr>
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
              <div class="type__shopCnt shop-best">
                <div class="shop--search shop--add form_val">
                  <input class="search-input val-input" value="">
                  <!-- 검색 -->
                  <button class="search-btn val-search">
                    <img src="<?= base_url(); ?>template/back/master/icon/ic_search.png" alt="검색" width="auto" height="16">
                  </button>
                </div>
                <div class="shop--chkTip" style="display: none;">
                  <label class="chkTip_salesRate">
                    <input type="checkbox" class="salseRateChk" checked="checked"> 판매량순
                  </label>
                  <label class="chkTip_recent gray_txt">
                    <input type="checkbox" class="recentChk"> 최신순
                  </label>
                </div>
                <div class="namedBtn clearfix">
                  <button class="named-fn addBtn addSlider disabledBtn" style="/* margin-right: 28px; */">+ 추가</button>
                  <span class="named-txt font-futura">or</span>
                  <button class="named-fn removeBtn">- 삭제</button>
                </div>
                <!-- 검색 시 나오는 정보(팝업) 영역 -->
                <div class="shop--searchBox" style="display: none;">FOUNDY pick 리스트에 상품 등록하기</div>
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
                          <input class="chkAll chkAll_3" type="checkbox" name="chkAll">
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
                        <tbody>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">1</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                        </tr>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">2</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                        </tr>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">3</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                        </tr>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">4</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                        </tr>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">5</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                        </tr>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">6</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
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
        </div>
      </section>
      <section class="contents_type contents_master scroll-y">
        <h3 class="meaning">카테고리 메인 관리</h3>
        <div class="type_wrap">
          <p class="type_tit slide_tit font-futura">Manage Category-main</p>
          <div class="type_box_wrap">
            <!-- YOGA BEST ITEM -->
            <div class="type_box shadow">
              <p class="type__shopTit font-futura">YOGA BEST ITEM</p>
              <div class="type__shopCnt shop-best">
                <div class="shop--search shop--add form_val">
                  <input class="search-input val-input" value="">
                  <!-- 검색 -->
                  <button class="search-btn val-search">
                    <img src="<?= base_url(); ?>template/back/master/icon/ic_search.png" alt="검색" width="auto" height="16">
                  </button>
                </div>
                <div class="shop--chkTip" style="display: none;">
                  <label class="chkTip_salesRate">
                    <input type="checkbox" class="salseRateChk" checked="checked"> 판매량순
                  </label>
                  <label class="chkTip_recent gray_txt">
                    <input type="checkbox" class="recentChk"> 최신순
                  </label>
                </div>
                <div class="namedBtn clearfix">
                  <button class="named-fn addBtn addSlider disabledBtn" style="/* margin-right: 28px; */">+ 추가</button>
                  <span class="named-txt font-futura">or</span>
                  <button class="named-fn removeBtn">- 삭제</button>
                </div>
                <!-- 검색 시 나오는 정보(팝업) 영역 -->
                <div class="shop--searchBox" style="display: none;">BEST ITEM 리스트에 상품 등록하기</div>
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
                          <input class="chkAll chkAll_3" type="checkbox" name="chkAll">
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
                        <tbody>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">1</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <div class="td-span">
                              <button class="go__toUp"></button>
                              <button class="go__toDown"></button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">2</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <div class="td-span">
                              <button class="go__toUp"></button>
                              <button class="go__toDown"></button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">3</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <div class="td-span">
                              <button class="go__toUp"></button>
                              <button class="go__toDown"></button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">4</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <div class="td-span">
                              <button class="go__toUp"></button>
                              <button class="go__toDown"></button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">5</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <div class="td-span">
                              <button class="go__toUp"></button>
                              <button class="go__toDown"></button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">6</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <div class="td-span">
                              <button class="go__toUp"></button>
                              <button class="go__toDown"></button>
                            </div>
                          </td>
                        </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- VEGAN BEST ITEM -->
            <div class="type_box shadow">
              <p class="type__shopTit font-futura">VEGAN BEST ITEM</p>
              <div class="type__shopCnt shop-best">
                <div class="shop--search shop--add form_val">
                  <input class="search-input val-input" value="">
                  <!-- 검색 -->
                  <button class="search-btn val-search">
                    <img src="<?= base_url(); ?>template/back/master/icon/ic_search.png" alt="검색" width="auto" height="16">
                  </button>
                </div>
                <div class="shop--chkTip" style="display: none;">
                  <label class="chkTip_salesRate">
                    <input type="checkbox" class="salseRateChk" checked="checked"> 판매량순
                  </label>
                  <label class="chkTip_recent gray_txt">
                    <input type="checkbox" class="recentChk"> 최신순
                  </label>
                </div>
                <div class="namedBtn clearfix">
                  <button class="named-fn addBtn addSlider disabledBtn" style="/* margin-right: 28px; */">+ 추가</button>
                  <span class="named-txt font-futura">or</span>
                  <button class="named-fn removeBtn">- 삭제</button>
                </div>
                <!-- 검색 시 나오는 정보(팝업) 영역 -->
                <div class="shop--searchBox" style="display: none;">BEST ITEM 리스트에 상품 등록하기</div>
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
                          <input class="chkAll chkAll_3" type="checkbox" name="chkAll">
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
                        <tbody>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">1</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <div class="td-span">
                              <button class="go__toUp"></button>
                              <button class="go__toDown"></button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">2</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <div class="td-span">
                              <button class="go__toUp"></button>
                              <button class="go__toDown"></button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">3</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <div class="td-span">
                              <button class="go__toUp"></button>
                              <button class="go__toDown"></button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">4</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <div class="td-span">
                              <button class="go__toUp"></button>
                              <button class="go__toDown"></button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">5</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <div class="td-span">
                              <button class="go__toUp"></button>
                              <button class="go__toDown"></button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">6</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <div class="td-span">
                              <button class="go__toUp"></button>
                              <button class="go__toDown"></button>
                            </div>
                          </td>
                        </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- HEALING BEST ITEM -->
            <div class="type_box shadow">
              <p class="type__shopTit font-futura">HEALING BEST ITEM</p>
              <div class="type__shopCnt shop-best">
                <div class="shop--search shop--add form_val">
                  <input class="search-input val-input" value="">
                  <!-- 검색 -->
                  <button class="search-btn val-search">
                    <img src="<?= base_url(); ?>template/back/master/icon/ic_search.png" alt="검색" width="auto" height="16">
                  </button>
                </div>
                <div class="shop--chkTip" style="display: none;">
                  <label class="chkTip_salesRate">
                    <input type="checkbox" class="salseRateChk" checked="checked"> 판매량순
                  </label>
                  <label class="chkTip_recent gray_txt">
                    <input type="checkbox" class="recentChk"> 최신순
                  </label>
                </div>
                <div class="namedBtn clearfix">
                  <button class="named-fn addBtn addSlider disabledBtn" style="/* margin-right: 28px; */">+ 추가</button>
                  <span class="named-txt font-futura">or</span>
                  <button class="named-fn removeBtn">- 삭제</button>
                </div>
                <!-- 검색 시 나오는 정보(팝업) 영역 -->
                <div class="shop--searchBox" style="display: none;">BEST ITEM 리스트에 상품 등록하기</div>
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
                          <input class="chkAll chkAll_3" type="checkbox" name="chkAll">
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
                        <tbody>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">1</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <div class="td-span">
                              <button class="go__toUp"></button>
                              <button class="go__toDown"></button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">2</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <div class="td-span">
                              <button class="go__toUp"></button>
                              <button class="go__toDown"></button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">3</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <div class="td-span">
                              <button class="go__toUp"></button>
                              <button class="go__toDown"></button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">4</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <div class="td-span">
                              <button class="go__toUp"></button>
                              <button class="go__toDown"></button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">5</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <div class="td-span">
                              <button class="go__toUp"></button>
                              <button class="go__toDown"></button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="td-label chkTd">
                            <input class="chkPiece" type="checkbox" name="chkPiece">
                            <label class="chkLabel"></label>
                          </td>
                          <td>
                            <span class="td-span">6</span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <span class="td-span"></span>
                          </td>
                          <td>
                            <div class="td-span">
                              <button class="go__toUp"></button>
                              <button class="go__toDown"></button>
                            </div>
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
        </div>
      </section>
      <section class="contents_type contents_master scroll-y">
        <h3 class="meaning">문자 발송 관리</h3>
        <!--
                            <script>
                                $(function(){
                                  $(window).load(function(){
                                    // chkbox 초기화
                                    $('.type__sendBox .chkPiece').prop('checked',false);
                                    $('.type__sendBox .chkLabel').removeClass('toggleChk');
                                  })
                                })
                                </script>
-->
        <div class="type_wrap">
          <p class="type_tit slide_tit font-futura">Manage Send-message</p>
          <div class="type_box_wrap">
            <div class="type_box shadow">
              <p class="type__shopTit sendTit">문자 발송 관리</p>
              <div class="type__sendBoxWrap clearfix">
                <div class="type__sendBox">
                  <dl class="sendBox--detail clearfix">
                    <dt class="detailTit firstTit">전송타입</dt>
                    <dd class="detailCnt firstCnt font_sm sendType">
                      <div class="sendType__chkmsgType">
                        <div class="file_msgType clearfix">
                          <div class="tip_chkImg chkTd">
                            <input checked="checked" class="thmbChk msgSendChk chkPiece msgType-sms" type="checkbox" name="chkPiece">
                            <label class="thmbLabel chkLabel"></label>
                          </div>
                          <div class="tip_imgBox">
                            <p class="form_imgName font-futura">SMS</p>
                          </div>
                        </div>
                        <div class="file_msgType clearfix">
                          <div class="tip_chkImg chkTd">
                            <input class="thmbChk msgSendChk chkPiece msgType-mms" type="checkbox" name="chkPiece">
                            <label class="thmbLabel chkLabel"></label>
                          </div>
                          <div class="tip_imgBox">
                            <p class="form_imgName font-futura">MMS</p>
                          </div>
                        </div>
                      </div>
                      <script>
                        // SMS, MMS 체크
                        $(function(){
                          // window load 시
                          $(window).load(function(){
                            $('.msgType-sms').attr('checked',true).next().addClass('toggleChk');
                            $('.msgType-mms').attr('checked',false).next().removeClass('toggleChk');
                            
                            // file_multiForm 스타일 변경 적용
                            $('.file_multiForm').addClass('disabledLabel');
                            
                            // form_imgOpen 클릭 비활성화
                            $('.form_imgOpen').attr('disabled',true);
                            
                            // 체크박스 비활성화
                            $('.pictureAll').next().addClass('toggleChkDisabled');
                            $('.pictureChk').next().addClass('toggleChkDisabled');
                            
                            // 이미지 삭제 버튼 비활성화
                            $('.view_imgRemove').addClass('disabledBtn');
                            
                            // 파일첨부 문구, 이미지 문구 비활성화
                            $('.secondTit').addClass('gray_txt');
                            $('#master .tip_imgBox').addClass('gray_txt');
                          })
                          
                          // SMS 체크시
                          $('.msgType-sms').click(function(){
                            let chk_sms = $(this).prop('checked');
                            // console.log(chk_sms)
                            if(chk_sms === true) {
                              $(this).next().addClass('toggleChk');
                              $(this).closest('.file_msgType').next().find('.msgType-mms').prop('checked',false)
                                .next().removeClass('toggleChk');
                              
                              // file_multiForm 스타일 변경 적용
                              $(this).closest('.sendBox--detail').next().find('.file_multiForm').addClass('disabledLabel');
                              
                              // form_imgOpen 클릭 비활성화
                              $(this).closest('.sendBox--detail').next().find('.form_imgOpen').attr('disabled',true);
                              
                              // 체크박스 비활성화
                              $(this).closest('.sendBox--detail').next().find('.pictureAll').next().addClass('toggleChkDisabled');
                              $(this).closest('.sendBox--detail').next().find('.pictureChk').next().addClass('toggleChkDisabled');
                              
                              // 이미지 삭제 버튼 비활성화
                              $(this).closest('.sendBox--detail').next().find('.view_imgRemove').addClass('disabledBtn');
                              
                              // 파일첨부 문구, 이미지 문구 비활성화
                              $(this).closest('.sendBox--detail').next().find('.secondTit').addClass('gray_txt');
                              $(this).closest('.sendBox--detail').next().find('#master .tip_imgBox').addClass('gray_txt');
                            }
                            else {
                              $(this).next().removeClass('toggleChk');
                              $(this).closest('.file_msgType').next().find('.msgType-mms').prop('checked',true)
                                .next().addClass('toggleChk');
                              
                              // file_multiForm 스타일 변경 해제
                              $(this).closest('.sendBox--detail').next().find('.file_multiForm').removeClass('disabledLabel');
                              
                              // form_imgOpen 클릭 비활성화
                              $(this).closest('.sendBox--detail').next().find('.form_imgOpen').attr('disabled',false);
                              
                              // 체크박스 활성화
                              $(this).closest('.sendBox--detail').next().find('.pictureAll').next().removeClass('toggleChkDisabled');
                              $(this).closest('.sendBox--detail').next().find('.pictureChk').next().removeClass('toggleChkDisabled');
                              
                              // 이미지 삭제 버튼 비활성화
                              $(this).closest('.sendBox--detail').next().find('.view_imgRemove').removeClass('disabledBtn');
                              
                              // 파일첨부 문구, 이미지 문구 활성화
                              $(this).closest('.sendBox--detail').next().find('.secondTit').removeClass('gray_txt');
                              $(this).closest('.sendBox--detail').next().find('#master .tip_imgBox').removeClass('gray_txt');
                            }
                          })
                          
                          // MMS 체크시
                          $('.msgType-mms').click(function(){
                            let chk_mms = $(this).prop('checked');
                            // console.log(chk_mms)
                            if(chk_mms === true) {
                              $(this).next().addClass('toggleChk');
                              $(this).closest('.file_msgType').prev().find('.msgType-sms').prop('checked',false)
                                .next().removeClass('toggleChk');
                              
                              // file_multiForm 스타일 변경 해제
                              $(this).closest('.sendBox--detail').next().find('.file_multiForm').removeClass('disabledLabel');
                              
                              // form_imgOpen 클릭 비활성화
                              $(this).closest('.sendBox--detail').next().find('.form_imgOpen').attr('disabled',false);
                              
                              // 체크박스 활성화
                              $(this).closest('.sendBox--detail').next().find('.pictureAll').next().removeClass('toggleChkDisabled');
                              $(this).closest('.sendBox--detail').next().find('.pictureChk').next().removeClass('toggleChkDisabled');
                              
                              // 이미지 삭제 버튼 비활성화
                              $(this).closest('.sendBox--detail').next().find('.view_imgRemove').removeClass('disabledBtn');
                              
                              // 파일첨부 문구, 이미지 문구 활성화
                              $(this).closest('.sendBox--detail').next().find('.secondTit').removeClass('gray_txt');
                              $(this).closest('.sendBox--detail').next().find('#master .tip_imgBox').removeClass('gray_txt');
                            }
                            else {
                              $(this).next().removeClass('toggleChk');
                              $(this).closest('.file_msgType').prev().find('.msgType-sms').prop('checked',true)
                                .next().addClass('toggleChk');
                              
                              // file_multiForm 스타일 변경 적용
                              $(this).closest('.sendBox--detail').next().find('.file_multiForm').addClass('disabledLabel');
                              
                              // form_imgOpen 클릭 비활성화
                              $(this).closest('.sendBox--detail').next().find('.form_imgOpen').attr('disabled',true);
                              
                              // 체크박스 비활성화
                              $(this).closest('.sendBox--detail').next().find('.pictureAll').next().addClass('toggleChkDisabled');
                              $(this).closest('.sendBox--detail').next().find('.pictureChk').next().addClass('toggleChkDisabled');
                              
                              // 이미지 삭제 버튼 비활성화
                              $(this).closest('.sendBox--detail').next().find('.view_imgRemove').addClass('disabledBtn');
                              
                              // 파일첨부 문구, 이미지 문구 비활성화
                              $(this).closest('.sendBox--detail').next().find('.secondTit').addClass('gray_txt');
                              $(this).closest('.sendBox--detail').next().find('#master .tip_imgBox').addClass('gray_txt');
                            }
                          })
                        })
                      </script>
                    </dd>
                  </dl>
                  <dl class="clearfix">
                    <dt class="detailTit secondTit">파일첨부<p class="fileSize">
                        <!-- <span class="fileSize__no">N</span> KB</p> -->
                    </dt>
                    <dd class="detailCnt secondCnt file_form_open openType">
                      <label class="file_multiForm">파일열기
                        <span class="slct_arrow multi_arrow"></span>
                        <input type="file" value="파일열기" class="form_imgOpen" style="height: inherit;">
                      </label>
                      <script>
                        $(function(){
                          /* 멀티 이미지 넣기 */
                          
                          let sel_files = [];
                          // $('.file_imgWrap').find('.form_imgSpace').empty();
                          
                          $(document).ready(function(){
                            $('.form_imgOpen').on('change',handleImgsFilesSelect);
                          })
                          
                          //function fileUploadAction() {
                          //    console.log('fileUploadAction');
                          //    $('.form_imgOpen').trigger('click');
                          //}
                          
                          let count = 0;
                          
                          function handleImgsFilesSelect(e) {
                            // set img info
                            sel_files = [];
                            
                            let files = e.target.files;
                            let filesArray = Array.prototype.slice.call(files);
                            
                            $('#master .form_imgSpace').addClass('auto-h-emphasize');
                            
                            filesArray.forEach(function(f) {
                              if(!f.type.match('image.*')) {
                                // 확장자 점검 및 jpg, jpeg 확인 요청
                                alert('확장자는 jpg 이미지 확장자만 가능합니다.')
                                return;
                              }
                              
                              sel_files.push(f);
                              
                              let reader = new FileReader();
                              reader.onload = function(e) {
                                let html = "<img src=\"" + e.target.result + "\" >";
                                let result = $('.file_imgWrap').eq(count).find('.form_imgSpace').append(html);
                                count++;
                                // console.log(count);
                                
                                if(count >= 4) {
                                  alert('이미지는 3장 까지 업로드 가능합니다.');
                                  return;
                                }
                              }
                              reader.readAsDataURL(f);
                            });
                          }
                        })
                      </script>
                      <script>
                        $(function(){
                          /* 이미지 (낱개/전체) 삭제 */
                          $('.view_imgRemove').click(function(){
                            // 전체 삭제
                            let chkAll = $('.pictureAll').prop('checked');
                            
                            let all = $('.pictureChk');
                            let piece = $('.pictureChk:checked');
                            
                            // 낱개 삭제
                            let chkPiece = $('.pictureChk').prop('checked');
                            
                            
                            if( chkAll === true && (all.length === piece.length) ) {
                              $('.file_imgWrap').find('.form_imgSpace').empty().removeClass('auto-h-emphasize');
                            }
                            
                            else if(chkPiece === true) {
                              $(this).closest('.file_imgDisplay').next().find('.pictureChk:checked').parent().next().find('.form_imgSpace').empty().removeClass('auto-h-emphasize');
                            }
                            // $('.file_imgWrap').find('.form_imgSpace').empty();
                          })
                        })
                      </script>
                      <script>
                        $(function(){
                          // alert('');
                          $('.file_multiForm').hover(function(){
                            $(this).css({
                              'border-color' : 'transparent',
                              'color' : '#ff6633',
                              'box-shadow' : '0 2px 4px rgba(255,102,51,30%)'
                            }).find('.multi_arrow').css('transform','rotate(225deg)')
                              .addClass('arrow_hover');
                          },function(){
                            $(this).css({
                              'border-color' : '#e0e0e0',
                              'color' : '#333',
                              'box-shadow' : 'none'
                            }).find('.multi_arrow').css('transform','rotate(45deg)')
                              .removeClass('arrow_hover');
                          })
                        })
                      </script>
                      <div class="file_imgDisplay clearfix">
                        <div class="view_imgList">
                          <div class="tip_chkImg chkTd">
                            <input class="thmbChk pictureAll chkPiece" type="checkbox" name="chkPiece">
                            <label class="thmbLabel chkLabel"></label>
                          </div>
                          <script>
                            $(function(){
                              // 이미지 선택 전체 체크
                              // alert('ok');
                              $('.pictureAll').click(function(){
                                let chk =  $(this).prop('checked');
                                
                                if(chk === true){
                                  $(this).next().addClass('toggleChk');
                                  $(this).closest('.file_imgDisplay').next().find('.pictureChk').prop('checked',true).next().addClass('toggleChk');
                                }
                                else {
                                  $(this).next().removeClass('toggleChk');
                                  $(this).closest('.file_imgDisplay').next().find('.pictureChk').prop('checked',false).next().removeClass('toggleChk');
                                }
                              })
                            })
                          </script>
                          <div class="tip_imgBox">
                            <p class="form_imgName">이미지 전체 선택</p>
                          </div>
                        </div>
                        <button class="view_imgRemove">삭제</button>
                      </div>
                      <div class="file_imgView scroll-y">
                        <div class="file_imgWrap clearfix">
                          <script>
                            $(function(){
                              // 이미지 선택 낱개 체크
                              $('.pictureChk').click(function(){
                                let all = $('.pictureChk');
                                let chk = $('.pictureChk:checked');
                                
                                if(all.length === chk.length) {
                                  $(this).closest('.file_imgView').prev().find('.pictureAll').next().addClass('toggleChk');
                                }
                                else {
                                  $(this).closest('.file_imgView').prev().find('.pictureAll').next().removeClass('toggleChk');
                                }
                              })
                            })
                          </script>
                          <div class="tip_chkImg chkTd">
                            <input class="thmbChk pictureChk chkPiece" type="checkbox" name="chkPiece">
                            <label class="thmbLabel chkLabel"></label>
                          </div>
                          <div class="tip_imgBox">
                            <p class="form_imgName">이미지명</p>
                            <div class="form_imgSpace">
                              <!-- 이미지 들어갈 공간 -->
                            </div>
                          </div>
                        </div>
                        <div class="file_imgWrap clearfix">
                          <div class="tip_chkImg chkTd">
                            <input class="thmbChk pictureChk chkPiece" type="checkbox" name="chkPiece">
                            <label class="thmbLabel chkLabel"></label>
                          </div>
                          <div class="tip_imgBox">
                            <p class="form_imgName">이미지명</p>
                            <div class="form_imgSpace">
                              <!-- 이미지 들어갈 공간 -->
                            </div>
                          </div>
                        </div>
                        <div class="file_imgWrap clearfix">
                          <div class="tip_chkImg chkTd">
                            <input class="thmbChk pictureChk chkPiece" type="checkbox" name="chkPiece">
                            <label class="thmbLabel chkLabel"></label>
                          </div>
                          <div class="tip_imgBox">
                            <p class="form_imgName">이미지명</p>
                            <div class="form_imgSpace">
                              <!-- 이미지 들어갈 공간 -->
                            </div>
                          </div>
                        </div>
                      </div>
                      <p class="file_volume">이미지(.jpg) 3장 이내 장당 300KB 까지</p>
                    </dd>
                    <!--
                                                    <dt class="detailTit">파일목록</dt>
                                                    <dd class="detailCnt">
                                                        <p class="font_sm">3개 까지 전송 가능</p>
                                                        <div class="deatilCnt_fileList scroll-y"></div>
                                                        <button class="fileList_remove">삭제</button>
                                                    </dd>
                                                    <dt class="detailTit">미리보기</dt>
                                                    <dd class="detailCnt">
                                                        <div class="file_multiThumb">
                                                            <img src="" alt="" class="thumb_img">
                                                        </div>
                                                    </dd>
-->
                  </dl>
                </div>
                <div class="type__sendBox">
                  <div class="sendBox--frame">
                    <div class="frame--wrap">
                      <div class="frame--box" style="background-image: url(<?= base_url(); ?>template/back/master/icon/sendTxt.png)">
                        <!-- msgSendChk 체크박스 체크시 limitbyte="90" placeholder="한글 45자 / 영문 90자로 변경"  -->
                        <textarea class="frame--write byteLimit" limitbyte="2000" placeholder="한글 1000자 / 영문 2000자"></textarea>
                        <script>
                          $(function(){
                            //글자 byte 수 제한
                            $(document).ready(function() {
                              // document.oncontextmenu = new Function('return false');
                              // document.ondragstart = new Function('return false');
                              // document.onselectstart = new Function('return false');
                              
                              // let msgType_SMS = $('.msgType-sms').prop('checked');
                              // let msgType_MMS = $('.msgType-mms').prop('checked');
                              
                              $(function()
                                {function updateInputCount() {
                                  $(".byteLimit").each(function(i){
                                    
                                    var totalByte = 0;              // 총 byte 수
                                    var savaMsg = "";               // 최대 byte수 초과시 textarea에 담아줄 값
                                    var message = $(this).val();    // 현재 입력된 값
                                    
                                    let typeByte = 0;
                                    let msgType_SMS = $('.msgType-sms').prop('checked');
                                    
                                    if(msgType_SMS === true){
                                      typeByte = 90;
                                      $('.txt_limit').text('90');
                                      $('.byteLimit').attr('placeholder','한글 45자 / 영문 90자');
                                    }
                                    else {
                                      typeByte = 2000;
                                      $('.txt_limit').text('2000');
                                      $('.byteLimit').attr('placeholder','한글 1000자 / 영문 2000자');
                                    }
                                    
                                    // 현재 입력된 값의 글자수 만큼 for문을 돌린다.
                                    for(var i =0; i < message.length; i++) {
                                      // 해당 글자의 code를 가져온다
                                      var currentByte = message.charCodeAt(i);
                                      
                                      // 한글은 2자, 그외는 1자를 추가해준다
                                      if(currentByte > 128) {totalByte += 2;}
                                      else {totalByte++;}
                                      
                                      // 최대 Byte가 되기 전까지 메시지를 저장한다.
                                      if(totalByte <= typeByte) {
                                        savaMsg += message.charAt(i);
                                        $('.txt_txtCount').text(totalByte);
                                      }
                                    }
                                    
                                    var cnt = totalByte;
                                    $(this).next().children().first().text(cnt);
                                    
                                    if(cnt > typeByte) {
                                      // 최대 Byte 수를 넘은 경우 textarea에 저장한 msg를 담아준다.
                                      $(this).val(savaMsg);
                                      alert('글자수 입력은 최대' + typeByte + 'byte 까지 제한됩니다');
                                    }
                                  });
                                }
                                  
                                  $('textarea')
                                    .focus(updateInputCount)
                                    .blur(updateInputCount)
                                    .keypress(updateInputCount);
                                  window.setInterval(updateInputCount, 100);
                                  updateInputCount();
                                }
                              );
                            });
                          })
                        </script>
                      </div>
                      <div class="frame--letterByte">
                        <p class="letterByte_txt"><span class="txt_txtCount">0</span> / <span class="txt_limit">2000</span> Byte</p>
                      </div>
                      <div class="frame--msgChk clearfix">
                        <div class="msgChk_addService">
                          <div class="tip_chkMsg chkTd">
                            <input class="thmbChk chkPiece" type="checkbox" name="chkPiece">
                            <label class="thmbLabel chkLabel toggleChk"></label>
                          </div>
                          <p class="tip_msgAdd add:ad">광고성 문자 알림 추가</p>
                        </div>
                        <div class="msgChk_addService">
                          <div class="tip_chkMsg chkTd">
                            <input class="thmbChk chkPiece" type="checkbox" name="chkPiece">
                            <label class="thmbLabel chkLabel toggleChk"></label>
                          </div>
                          <p class="tip_msgAdd add:reject">080 수신거부 메시지 추가</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="type__sendBox">
                  <!-- 수신 설정 -->
                  <div class="sendBox--person">
                    <!-- 받는 사람 -->
                    <div class="person_receiver">
                      <p class="receiver_tit option__tit-style">받는 사람</p>
                      <div class="receiver__typing">
                        <div class="typing--search">
                          <input type="text" placeholder="받는 사람" class="search-form-ask">
                          <button class="search-tool-magnify">
                            <img width="16" height="15.52" src="<?= base_url(); ?>template/back/master/icon/ic_search.png" class="magnify-glass">
                          </button>
                        </div>
                        <div class="typing--result" style="display: none;">
                          <input class="result-form-answer" type="text" value="search_result">
                          <!-- 검색한 정보와 일치한다면 아래 plus 버튼 show -->
                          <button class="search_result_plus">
                            <span class="icStyle-ic-plus">+</span>
                          </button>
                        </div>
                        <script>
                          $(function(){
                            // 받는 사람 입력창 검색
                            $('.search-form-ask').click(function(){
                              $(this).parent().next().toggle();
                            })
                            
                            // plus 버튼 클릭
                            $('.search_result_plus').click(function(){
                              
                              let val = $(this).prev().val();
                              let plusBtn_html = '<div class="chkNames--btnStyle">'+
                                '<span class="btnStyle-name">'+ val +'</span>' +
                                '<button class="btnStyle-btn-close">' +
                                '<span class="icStyle-ic-minus">-</span>' +
                                '</button>' +
                                '</div>';
                              // alert('ok');
                              
                              $('.chkNames--confirmed').prepend( plusBtn_html );
                            })
                          })
                        </script>
                      </div>
                      <div class="receiver__chkNames">
                        <script>
                          $(function(){
                            // alert('ok');
                            $('.btnStyle-btn-close').on('click',function(){
                              $(this).closest('.chkNames--btnStyle').remove();
                            })
                          })
                        </script>
                        <div class="chkNames--confirmed scroll-y">
                          <div class="chkNames--btnStyle">
                            <span class="btnStyle-name">이름</span>
                            <button class="btnStyle-btn-close">
                              <span class="icStyle-ic-minus">-</span>
                            </button>
                          </div>
                        </div>
                        <div class="chkNames--batch-transfer">
                          <div class="batch-transfer-allChk clearfix">
                            <script>
                              // 일괄 전송 체크 기능 (전송 체크박스 전부 선택)
                              $(function(){
                                $('.memberAll').click(function(){
                                  let chk = $(this).prop('checked');
                                  
                                  if(chk === true) {
                                    $(this).closest('.batch-transfer-allChk').next().find('.memberChk').prop('checked',true).next().addClass('toggleChk');
                                  }
                                  else {
                                    $(this).closest('.batch-transfer-allChk').next().find('.memberChk').prop('checked',false).next().removeClass('toggleChk');
                                  }
                                })
                              })
                            </script>
                            <div class="tip_chkMsg chkTd">
                              <input class="thmbChk memberAll chkPiece" type="checkbox" name="chkPiece">
                              <label class="thmbLabel chkLabel"></label>
                            </div>
                            <p class="tip_msgAdd add:ad">일괄 전송</p>
                          </div>
                          <div class="batch-transfer-pieceChk clearfix">
                            <div class="msgChk_addService msgChk-width">
                              <script>
                                $(function(){
                                  // 전송 체크 박스 낱개 선택
                                  $('.memberChk').click(function(){
                                    // alert('ok');
                                    let all = $('.memberChk');
                                    let chk = $('.memberChk:checked');
                                    
                                    if(all.length === chk.length) {
                                      $(this).closest('.batch-transfer-pieceChk').prev().find('.memberAll').prop('checked',true).next().addClass('toggleChk');
                                    }
                                    else {
                                      $(this).closest('.batch-transfer-pieceChk').prev().find('.memberAll').prop('checked',false).next().removeClass('toggleChk');
                                      
                                    }
                                  })
                                })
                              </script>
                              <div class="tip_chkMsg chkTd">
                                <input class="thmbChk memberChk chkPiece" type="checkbox" name="chkPiece">
                                <label class="thmbLabel chkLabel"></label>
                              </div>
                              <p class="tip_msgAdd add:ad" style="">강사 회원 전용</p>
                            </div>
                            <div class="msgChk_addService msgChk-width" style="
">
                              <div class="tip_chkMsg chkTd">
                                <input class="thmbChk memberChk chkPiece" type="checkbox" name="chkPiece">
                                <label class="thmbLabel chkLabel"></label>
                              </div>
                              <p class="tip_msgAdd add:ad">센터 회원 전용</p>
                            </div>
                            <div class="msgChk_addService msgChk-width" style="
">
                              <div class="tip_chkMsg chkTd">
                                <input class="thmbChk memberChk chkPiece" type="checkbox" name="chkPiece">
                                <label class="thmbLabel chkLabel"></label>
                              </div>
                              <p class="tip_msgAdd add:ad">스튜디오 회원 전용</p>
                            </div>
                            <div class="msgChk_addService msgChk-width">
                              <div class="tip_chkMsg chkTd">
                                <input class="thmbChk memberChk chkPiece" type="checkbox" name="chkPiece">
                                <label class="thmbLabel chkLabel"></label>
                              </div>
                              <p class="tip_msgAdd add:ad">전체 유저</p>
                            </div>
                            <div class="msgChk_addService msgChk-width">
                              <div class="tip_chkMsg chkTd">
                                <input class="thmbChk memberChk chkPiece" type="checkbox" name="chkPiece">
                                <label class="thmbLabel chkLabel"></label>
                              </div>
                              <p class="tip_msgAdd add:ad">샵 유저</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- 보내는 사람 -->
                    <div class="person_sender">
                      <div class="sender_wrap">
                        <p class="sender_tit option__tit-style">보내는 사람</p>
                        <!-- <a href="#">발신번호 사전등록하기</a> -->
                      </div>
                      <script>
                        $(document).ready(function(){
                          // alert('ok');
                          $('.slc-main-val').click(function(){
                            $('.slctBox__opts').toggle();
                          })
                          
                          $('.slc-sub-val').click(function(){
                            let val = $(this).val();
                            
                            $(this).parent().hide();
                            $(this).parent().prev().find('.slc-main-val').val(val);
                          })
                        })
                      </script>
                      <div class="sender_slctBox">
                        <div class="slctBox__btn">
                          <input type="text" value="01063200544" class="btn--basic-val slc-main-val" readonly>
                          <span class="btn--arrow slct_arrow" style="border-color: #333;"></span>
                        </div>
                        <div class="slctBox__opts scroll-y" style="display: none;">
                          <input type="text" value="전화번호1" class="btn--basic-val slc-sub-val" readonly>
                          <input type="text" value="전화번호2" class="btn--basic-val slc-sub-val" readonly>
                          <input type="text" value="전화번호3" class="btn--basic-val slc-sub-val" readonly>
                        </div>
                      </div>
                    </div>
                    <!-- 예약 발송 -->
                    <div class="person_form form:typeBooking">
                      <div class="form_headline clearfix">
                        <p class="option__tit-style option:tit-book">예약발송</p>
                        <div class="msgChk_addService msgChk-width msgChk-book">
                          <div class="tip_chkMsg chkTd">
                            <input class="thmbChk chkPiece chkBookTime" type="checkbox" name="chkPiece">
                            <label class="thmbLabel chkLabel"></label>
                          </div>
                          <p class="tip_msgAdd add:ad">사용</p>
                          <script>
                            $(function(){
                              $('.chkBookTime').click(function(){
                                let chk = $(this).prop('checked');
                                
                                if(chk === true){
                                  $('.chkBook-control').attr('readOnly',false).removeClass('gray_bg');
                                  $('.chkBook-control').removeClass('gray_txt');
                                }
                                else {
                                  $('.chkBook-control').attr('readOnly',true).addClass('gray_bg');
                                  $('.chkBook-control').addClass('gray_txt');
                                }
                              })
                            })
                          </script>
                        </div>
                      </div>
                      <div class="form_dateSet">
                        <!-- 연,월,일 date-picker -->
                        <div class="data_function" style="width: 100%; height: 32px; margin-bottom: 8px;">
                          <div class="container" style="width: 100%; height: inherit;">
                            <div class="row">
                              <div class="col-sm-6" style="width: 100%;">
                                <div class="form-group" style="height: inherit;">
                                  <div class="input-group date" id="datetimepicker1" style="width: 100%; height: 32px;">
                                    <input type="text" class="form-control chkBook-control gray_bg gray_txt" style="height: 32px; border-radius: 4px;" readonly>
                                    <span class="input-group-addon">
                                                                                      <span class="glyphicon glyphicon-calendar" style="top: 3px;"></span>
                                                                                    </span>
                                  </div>
                                </div>
                              </div>
                              <script type="text/javascript">
                                $(function () {
                                  $('#datetimepicker1').datetimepicker();
                                });
                              </script>
                            </div>
                          </div>
                        </div>
                        <!-- 시,분 date-picker -->
                        <!-- <div class="data_function" style="width: 100%; height: 32px;">
                                                                <div class="container" style="width: 100%; height: inherit;">
                                                                    <div class="row">
                                                                        <div class="col-sm-6" style="width: 100%;">
                                                                            <div class="form-group" style="height: inherit; border-radius: 4px;">
                                                                                <div class="input-group date" id="datetimepicker3" style="width: 100%; height: 32px;">
                                                                                    <input type="text" class="form-control" style="height: 32px; border-radius: 4px;">
                                                                                    <span class="input-group-addon">
                                                                                        <span class="glyphicon glyphicon-time"></span>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <script type="text/javascript">
  $(function () {
    $('#datetimepicker3').datetimepicker({
                                                                                    format: 'LT'
                                                                                });
                                                                            });
                                                                        </script>
                                                                    </div>
                                                                </div>
                                                            </div> -->
                      </div>
                    </div>
                  </div>
                  <!-- 보내기 / 취소 -->
                  <div class="senBox--action clearfix">
                    <button class="action-send-ok">보내기</button>
                    <button class="action-send-cancel">취소</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
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
      <div class="named-add add-coupon" style="display: none;">
        <p class="add-tit">
          <span class="">쿠폰</span> 상세
        </p>
        <div class="add-box scroll-y" style="height: 464px;">
          <button class="frame_close">
            <img src="<?= base_url(); ?>template/back/center/imgs/icon_close_black.png" alt="" width="12" height="12" style="opacity: 0.5;">
          </button>
          <dl class="add-contents clearfix">
            <dt class="contents__tit">아이디</dt>
            <dd class="contents__data">
              <input type="text" placeholder="아이디를 입력해주세요" class="data_form revise_id">
            </dd>
            <dt class="contents__tit">쿠폰명</dt>
            <dd class="contents__data">
              <input type="text" placeholder="쿠폰명을 입력해주세요" class="data_form revise_cpName">
            </dd>
            <dt class="contents__tit">혜택회원</dt>
            <dd class="contents__data">
              <div class="data_form">
                <select style="width: 100%;">
                  <option class="revise_cpBenefit" value="adopt">적용회원</option>
                  <option class="revise_cpBenefit" value="member">회원가입쿠폰</option>
                  <option class="revise_cpBenefit" value="buying">구매유도쿠폰</option>
                  <option class="revise_cpBenefit" value="center">센터회원쿠폰</option>
                  <option class="revise_cpBenefit" value="teacher">강사회원쿠폰</option>
                </select>
              </div>
            </dd>
            <dt class="contents__tit">쿠폰수</dt>
            <dd class="contents__data">
              <input type="text" placeholder="쿠폰수 (0: 무제한)" class="data_form revise_cpCount">
            </dd>
            <dt class="contents__tit">쿠폰타입</dt>
            <dd class="contents__data">
              <div class="data_form">
                <select style="width: 100%;">
                  <option class="revise_cpType" value="dc-type">쿠폰타입</option>
                  <option class="revise_cpType" value="dc-money">샵할인금액</option>
                  <option class="revise_cpType" value="dc-percent">샵할인율</option>
                  <option class="revise_cpType" value="dc-delivery">무료배송</option>
                </select>
              </div>
            </dd>
            <dt class="contents__tit">할인가격(율)</dt>
            <dd class="contents__data">
              <input type="text" placeholder="할인 가격(원) 또는 할일율(%) 또는 무료배송" class="data_form revise_cpDc">
            </dd>
            <dt class="contents__tit">쿠폰설명</dt>
            <dd class="contents__data">
              <input type="text" placeholder="쿠폰설명" class="data_form revise_cpGuide">
            </dd>
            <!--
                                    <dt class="contents__tit" style="margin-bottom: 20px;">쿠폰설명</dt>
                                    <dd class="contents__data description__data" style="margin-bottom: 20px;">
                                        <form>
                                            <textarea placeholder="쿠폰설명" class="data_form description_form"></textarea>
                                        </form>
                                    </dd>
-->
            <dt class="contents__tit">발급시작시간</dt>
            <dd class="contents__data">
              <div class="data_function">
                <div class="container">
                  <div class="form-group">
                    <div class="input-group date datetimepicker1 start_date">
                      <input type="text" class="form-control revise_issueStart" value="발급시작시간">
                      <span class="input-group-addon">
                                                  <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                    </div>
                  </div>
                </div>
              </div>
            </dd>
            <dt class="contents__tit">발급종료시간</dt>
            <dd class="contents__data">
              <div class="data_function">
                <div class="container">
                  <div class="form-group">
                    <div class="input-group date datetimepicker1 start_date">
                      <input type="text" class="form-control revise_issueEnd" value="발급종료시간">
                      <span class="input-group-addon">
                                                  <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                    </div>
                  </div>
                </div>
              </div>
            </dd>
            <dt class="contents__tit">사용종료시간</dt>
            <dd class="contents__data">
              <div class="data_function">
                <div class="container">
                  <div class="form-group">
                    <div class="input-group date datetimepicker1 start_date">
                      <input type="text" class="form-control revise_cpTerminate" value="사용종료시간">
                      <span class="input-group-addon">
                                                  <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                    </div>
                  </div>
                </div>
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
    </div>
    <!-- 상태변경,삭제 클릭 팝업 -->
    <div class="pop:type pop:frame frame:question">
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
          <button class="btn_ok font-futura">OK</button>
        </div>
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
    <div class="pop:type pop:frame frame:coupon">
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
              <span class="typeC-Tit">회원가입 쿠폰2</span>
              <br><span class="type-name">coupon</span>
            </p>
            <div class="display-now">발급중</div>
          </div>
          <div class="tit_table table_form:coupon">
            <div class="table_scroll scroll-y" style="height: 243px;">
              <table class="mail_table">
                <colgroup>
                  <col width="16%">
                  <col width="84%">
                </colgroup>
                <tbody>
                <tr>
                  <th>아이디</th>
                  <td class="see__id">2</td>
                </tr>
                <tr>
                  <th>쿠폰명</th>
                  <td class="see__name"></td>
                </tr>
                <tr>
                  <!-- 내용 = 쿠폰설명  -->
                  <th>내용</th>
                  <td class="see__guide">그랜드 오픈 기념 쿠폰</td>
                </tr>
                <tr>
                  <!-- 적용 회원 = 혜택 회원 -->
                  <th>적용 회원</th>
                  <td class="see__benefit">회원가입</td>
                </tr>
                <tr>
                  <th>쿠폰수</th>
                  <td class="see__count">무제한</td>
                </tr>
                <tr>
                  <th>쿠폰타입</th>
                  <td class="see__type"></td>
                </tr>
                <tr>
                  <!-- 할인 = 할인가격(율) -->
                  <th>할인</th>
                  <td class="see__dc">5%</td>
                </tr>
                <tr>
                  <!-- 발급 [ 시작 ~ 종료 ] 시간 -->
                  <th>발급시간</th>
                  <td>
                    <div class="space:layer">
                      <div class="layer--position scroll-x">
                        <span class="see__start">2020-08-01 00:00:00</span> ~ <span class="see__end">2021-12-31 00:00:00</span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>사용종료시간</th>
                  <td class="see__terminate">2022-01-31 00:00:00</td>
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
          // $(this).closest('.namedBtn').find('.named-fn').removeClass('disabledBtn').attr('disabled',false);
          // $(this).next().next().removeClass('disabledBtn').attr('disabled',false);
          // }
          // else {
          $(this).closest('.namedBtn').find('.named-fn').removeClass('disabledBtn').attr('disabled',false);
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
      let name = $(this).attr('class');
      // console.log(name);
      
      let split = name.split('');
      // console.log(split);
      
      // split 으로 'S','M','C' 값 가져오기
      let exist_S = split.indexOf('S');
      let exist_M = split.indexOf('M');
      let exist_C = split.indexOf('C');
      // console.log(exist_1,exist_2,exist_3);
      
      if(exist_S != -1){
        // console.log(1); ok
        $('.boxwrap__pop').show().children('div[class$=add-wrap]').show().find('.add-slider').show();
      }
      else if(exist_M != -1){
        $('.boxwrap__pop').show().children('div[class$=add-wrap]').show().find('.add-mail').show();
      }
      else if(exist_C != -1){
        $('.boxwrap__pop').show().children('div[class$=add-wrap]').show().find('.add-coupon').show();
      }
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
      if(e.keyCode == 27) {
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
    })
    // 팝업창 클릭
    $(window).click(function(e){
      let target = e.target.className;
      // console.log(target);
      
      if(target == 'boxwrap__pop pop:box' || target == 'pop:type pop:add-wrap'){
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
    })
  </script>
</section>
