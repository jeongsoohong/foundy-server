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
