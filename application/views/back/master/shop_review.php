<h3 class="meaning">상품 리뷰</h3>
<div class="type_wrap">
  <p class="type_tit slide_tit font-futura">Item Review</p>
  <div class="type_box shadow">
    <div class="type__speciesData clearfix">
      <div class="type__line qna-tip clearfix" style="margin: 0;">
        <div class="qna-cnts clearfix">
          <div class="line--component goods--component clearfix" style="width: auto; margin-right: 20px;">
            <span class="file_arrow"></span>
            <select class="component-slcwrap form-control">
              <option selected="" value="1">상품명</option>
            </select>
          </div>
          <div class="line--component search--compo">
            <input class="form-control">
          </div>
        </div>
      </div>
      <button class="qna-search slcsearch">검색</button>
    </div>
    <div class="type__table">
      <div class="table--tip clearfix">
        <p class="tipStatus">리뷰내역 [ 총 <span>0</span>건 ]</p>
      </div>
      <div class="list-table">
        <div class="table-media tableBody" style="min-width: 1080px;">
          <table class="table-box manage_table">
            <colgroup>
              <!-- <col width="4%"> -->
              <col width="10%">
              <col width="9%">
              <col width="16%">
              <col width="11%">
              <col width="26%">
              <col width="15%">
              <col width="13%">
            </colgroup>
            <thead>
            <tr>
              <!--
                                                <th class="td-label chkTh">
                                                    <input class="chkAll chkAll_1" type="checkbox" name="chkAll">
                                                    <label class="chkLabel"></label>
                                                </th>
                                                -->
              <th>
                <span class="th-span">아이디</span>
              </th>
              <th>
                <span class="th-span">주문번호</span>
              </th>
              <th>
                <span class="th-span">상품명</span>
              </th>
              <th>
                <span class="th-span">점수</span>
              </th>
              <th>
                <span class="th-span">후기내용</span>
              </th>
              <th>
                <span class="th-span">작성자ID</span>
              </th>
              <th>
                <span class="th-span">등록일</span>
              </th>
            </tr>
            </thead>
          </table>
          <div class="table-scroll auto-height scroll-y">
            <table>
              <colgroup>
                <!-- <col width="4%"> -->
                <col width="10%">
                <col width="9%">
                <col width="16%">
                <col width="11%">
                <col width="26%">
                <col width="15%">
                <col width="13%">
              </colgroup>
              <tbody>
              <tr>
                <!--
                                                    <td class="td-label chkTd">
                                                        <input class="chkPiece" type="checkbox" name="chkPiece">
                                                        <label class="chkLabel"></label>
                                                    </td>
                                                    -->
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
                <td>
                  <span class="td-span"></span>
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
