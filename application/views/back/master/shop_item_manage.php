<h3 class="meaning">등록 상품 보기</h3>
<div class="type_wrap">
  <p class="type_tit slide_tit font-futura">Manage Products</p>
  <div class="type_box shadow">
    <div class="type_named">
      <div class="namedBtn clearfix">
        <button class="named-fn addBtn addSlider" style="margin-right: 28px;">+ 추가</button>
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
                  <img src="imgs/ic_refresh.png" width="auto" height="16">
                </button>
                <button class="btn--fn">pdf</button>
                <button class="btn--fn">csv</button>
                <button class="btn--fn">xls</button>
              </div>
            </div>
          </div>
          <div class="list-table">
            <div class="table-media tableBody" style="min-width: 1080px;">
              <table class="table-box manage_table">
                <colgroup>
                  <col width="4%">
                  <col width="6%">
                  <col width="13%">
                  <col width="6%">
                  <col width="12%">
                  <col width="19%">
                  <col width="10%">
                  <col width="11%">
                  <col width="23%">
                </colgroup>
                <thead>
                <tr>
                  <th class="td-label chkTh">
                    <input class="chkAll chkAll_3" type="checkbox" name="chkAll">
                    <label class="chkLabel"></label>
                  </th>
                  <th>
                    <span class="th-span">브랜드명</span>
                  </th>
                  <th>
                    <span class="th-span">상품코드</span>
                  </th>
                  <th>
                    <span class="th-span">카테고리</span>
                  </th>
                  <th>
                    <span class="th-span">이미지</span>
                  </th>
                  <th>
                    <span class="th-span">상품명</span>
                  </th>
                  <th>
                    <span class="th-span">판매가</span>
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
                    <col width="6%">
                    <col width="13%">
                    <col width="6%">
                    <col width="12%">
                    <col width="19%">
                    <col width="10%">
                    <col width="11%">
                    <col width="23%">
                  </colgroup>
                  <tbody>
                  <tr>
                    <td class="td-label chkTd">
                      <input class="chkPiece" type="checkbox" name="chkPiece">
                      <label class="chkLabel"></label>
                    </td>
                    <td>
                      <span class="td-span">서율이네</span>
                    </td>
                    <td>
                      <span class="td-span">0101010000000069</span>
                    </td>
                    <td>
                      <span class="td-span">010102</span>
                    </td>
                    <td>
                                                                        <span class="td-span">
                                                                            <img class="span-img" src="<?= base_url(); ?>uploads/shop_image/product_69_0_thumb.jpg?id=1610691330?random=1614821329148" alt="" width="46" height="46">
                                                                        </span>
                    </td>
                    <td>
                      <span class="td-span">아로마블리스 스페셜에디션 쿨온+로즈쿼츠엔젤괄사+파우치세트</span>
                    </td>
                    <td>
                      <span class="td-span">100,000</span>
                    </td>
                    <td>
                      <span class="td-span td-status td-playing font-futura locate_home">판매중</span>
                    </td>
                    <td class="fn-td-btn clearfix">
                      <div class="td-btn-wrap">
                        <p class="td-span td-btn td-item">
                                                                                <span class="btn-ic btn--seeProfile">
                                                                                    <img src="imgs/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                                                                </span>
                          아이템정보
                        </p>
                        <p class="td-span td-btn">
                                                                                <span class="btn-ic btn--modify">
                                                                                    <img src="imgs/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                                                                </span>
                          수정
                        </p>
                        <p class="td-span td-btn td-showType">
                                                                                <span class="btn-ic btn--display">
                                                                                    <img src="imgs/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                                                                </span>
                          상태변경
                        </p>
                        <p class="td-span td-btn td-category">
                                                                                <span class="btn-ic btn--exposure">
                                                                                    <img src="imgs/ic_post.png" class="ic-img" width="8" height="8" alt="">
                                                                                </span>
                          <span class="font-futura">Shop-main</span> 추가
                        </p>
                        <p class="td-span td-btn td-category">
                                                                                <span class="btn-ic btn--exposure">
                                                                                    <img src="imgs/ic_post.png" class="ic-img" width="8" height="8" alt="">
                                                                                </span>
                          <span class="font-futura">Category-main</span> 추가
                        </p>
                      </div>
                    </td>
                    <td class="hidden_data">
                      <!-- 브랜드명 --><span class="it--brand">서율이네</span>
                      <!-- 상품코드 --><span class="it--code">0101010000000069</span>
                      <!-- 카테고리 --><span class="it--cat">010101</span>
                      <!-- 상품기본설명 --><span class="it--explain">요가복이 한정판매됩니다</span>
                      <!-- 상품유형 --><span class="it--goodType">일반상품</span>
                      <!-- 과세여부 --><span class="it--taxation">과세상품</span>
                      <!-- 배송소요일 --><span class="it--deliveryDates">2일</span>
                      <!-- 배송비유형 --><span class="it--deliveryFee">조건부 무료배송</span>
                      <!-- 상품유의사항 --><span class="it--goodAlert"></span>
                      <!-- 주문유의사항 --><span class="it--orderAlert"></span>
                      <!-- 배송유의사항 --><span class="it--deliveryAlert"></span>
                      <!-- 상품고시정보 --><div class="it--noticeInfo">[{"noti_field_id":1,"noti_field":"제품소재","noti_info":"1"},{"noti_field_id":2,"noti_field":"색상","noti_info":"1"},{"noti_field_id":3,"noti_field":"치수","noti_info":"1"},{"noti_field_id":4,"noti_field":"제조자","noti_info":"1"},{"noti_field_id":5,"noti_field":"제조국","noti_info":"1"},{"noti_field_id":6,"noti_field":"세탁방법 및 취급시 주의사항","noti_info":"1"},{"noti_field_id":7,"noti_field":"제조연월","noti_info":"1"},{"noti_field_id":8,"noti_field":"품질보증기준","noti_info":"1"},{"noti_field_id":9,"noti_field":"A/S 책임자와 전화번호","noti_info":"1"}]</div>
                      <!-- 인증정보 --><span class="it--certiInfo">1/1/1/1/1</span>
                      <!-- 상품가격정보 --><span class="it--priceInfo">정상가:100,000, 판매가:100,000, 마진율:20%, 공급가:80,000,</span>
                      <!-- 옵션 --><span class="it--option">[](필수),[]</span>
                      <!-- 등록일 --><span class="it--enrollDate">2020-07-05 18:16:42</span>
                      <!-- 승인일자 --><span>2020-11-05 20:39:21</span>
                      <!-- 상품이미지(필수) --><span class="it--registration-main"><img src="<?= base_url(); ?>uploads/shop_image/product_69_0_thumb.jpg?id=1610691330" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지1 --><span class="it--registration1"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지2 --><span class="it--registration2"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지3 --><span class="it--registration3"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지4 --><span class="it--registration4"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지5 --><span class="it--registration5"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품상세페이지 --><div class="it--registration-detail">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_69_1593940656403662.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_69_1593940656555106.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_69_1593940662543886.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_69_1593940663704822.jpg" alt="" style="width: 100%; height: auto;">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="td-label chkTd">
                      <input class="chkPiece" type="checkbox" name="chkPiece">
                      <label class="chkLabel"></label>
                    </td>
                    <td>
                      <span class="td-span">서율이네</span>
                    </td>
                    <td>
                      <span class="td-span">0102030000000074</span>
                    </td>
                    <td>
                      <span class="td-span">010203</span>
                    </td>
                    <td>
                                                                        <span class="td-span">
                                                                            <img class="span-img" src="<?= base_url(); ?>uploads/shop_image/product_74_0_thumb.jpg?id=1604576293?random=1614821329148" alt="" width="46" height="46">
                                                                        </span>
                    </td>
                    <td>
                      <span class="td-span">서율이네 매트리스</span>
                    </td>
                    <td>
                      <span class="td-span">9,000</span>
                    </td>
                    <td>
                      <span class="td-span td-status td-playing font-futura inactivate">판매종료</span>
                    </td>
                    <td class="fn-td-btn clearfix">
                      <div class="td-btn-wrap">
                        <p class="td-span td-btn td-item">
                                                                                <span class="btn-ic btn--seeProfile">
                                                                                    <img src="imgs/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                                                                </span>
                          아이템정보
                        </p>
                        <p class="td-span td-btn">
                                                                                <span class="btn-ic btn--modify">
                                                                                    <img src="imgs/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                                                                </span>
                          수정
                        </p>
                        <p class="td-span td-btn td-showType">
                                                                                <span class="btn-ic btn--display">
                                                                                    <img src="imgs/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                                                                </span>
                          상태변경
                        </p>
                        <p class="td-span td-btn td-category">
                                                                                <span class="btn-ic btn--exposure">
                                                                                    <img src="imgs/ic_post.png" class="ic-img" width="8" height="8" alt="">
                                                                                </span>
                          <span class="font-futura">Shop-main</span> 추가
                        </p>
                        <p class="td-span td-btn td-category">
                                                                                <span class="btn-ic btn--exposure">
                                                                                    <img src="imgs/ic_post.png" class="ic-img" width="8" height="8" alt="">
                                                                                </span>
                          <span class="font-futura">Category-main</span> 추가
                        </p>
                      </div>
                    </td>
                    <td class="hidden_data">
                      <!-- 브랜드명 --><span class="it--brand">서율이네</span>
                      <!-- 상품코드 --><span class="it--code">0102030000000074</span>
                      <!-- 카테고리 --><span class="it--cat">010203</span>
                      <!-- 상품기본설명 --><span class="it--explain">서율이네 매트리스.. 후회하지 않으실거애요!!</span>
                      <!-- 상품유형 --><span class="it--goodType">일반상품</span>
                      <!-- 과세여부 --><span class="it--taxation">과세상품</span>
                      <!-- 배송소요일 --><span class="it--deliveryDates">2일</span>
                      <!-- 배송비유형 --><span class="it--deliveryFee">조건부 무료배송</span>
                      <!-- 상품유의사항 --><span class="it--goodAlert"></span>
                      <!-- 주문유의사항 --><span class="it--orderAlert"></span>
                      <!-- 배송유의사항 --><span class="it--deliveryAlert"></span>
                      <!-- 상품고시정보 --><div class="it--noticeInfo">[{"noti_field_id":48,"noti_field":"품명 및 모델명","noti_info":"1"},{"noti_field_id":49,"noti_field":"크기, 중량","noti_info":"1"},{"noti_field_id":50,"noti_field":"색상","noti_info":"1"},{"noti_field_id":51,"noti_field":"재질","noti_info":"1"},{"noti_field_id":52,"noti_field":"제품 구성","noti_info":"1"},{"noti_field_id":53,"noti_field":"동일모델의 출시년월","noti_info":"1"},{"noti_field_id":54,"noti_field":"제조자(수입자)","noti_info":"1"},{"noti_field_id":55,"noti_field":"제조국","noti_info":"1"},{"noti_field_id":56,"noti_field":"상품별 세부사양","noti_info":"1"},{"noti_field_id":57,"noti_field":"품질보증기준","noti_info":"1"},{"noti_field_id":58,"noti_field":"A/S 책임자와 전화번호","noti_info":"1"}]</div>
                      <!-- 인증정보 --><span class="it--certiInfo">1/1/1/1/1</span>
                      <!-- 상품가격정보 --><span class="it--priceInfo">정상가:9,500, 판매가:9,000, 마진율:20%, 공급가:7,200,</span>
                      <!-- 옵션 --><span class="it--option">[](필수),[]</span>
                      <!-- 등록일 --><span class="it--enrollDate">2020-07-06 11:15:08</span>
                      <!-- 승인일자 --><span>2020-08-07 21:45:03</span>
                      <!-- 상품이미지(필수) --><span class="it--registration-main"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지1 --><span class="it--registration1"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지2 --><span class="it--registration2"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지3 --><span class="it--registration3"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지4 --><span class="it--registration4"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지5 --><span class="it--registration5"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품상세페이지 --><div class="it--registration-detail">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_74_1594036972235228.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_74_1594036972239156.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_74_1594036972243350.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_74_1594036972247651.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_74_1594036972251540.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_74_1594036972260082.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_74_1594036972148748.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_74_1594036972151802.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_74_1594036972158265.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_74_1594036972155017.jpg" alt="" style="width: 100%; height: auto;">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="td-label chkTd">
                      <input class="chkPiece" type="checkbox" name="chkPiece">
                      <label class="chkLabel"></label>
                    </td>
                    <td>
                      <span class="td-span">레클레스레드옴</span>
                    </td>
                    <td>
                      <span class="td-span">0102010000000077</span>
                    </td>
                    <td>
                      <span class="td-span">010201</span>
                    </td>
                    <td>
                                                                        <span class="td-span">
                                                                            <img class="span-img" src="<?= base_url(); ?>uploads/shop_image/product_77_0_thumb.jpg?id=1594077428?random=1614821329148" alt="" width="46" height="46">
                                                                        </span>
                    </td>
                    <td>
                      <span class="td-span">Rose Quartz</span>
                    </td>
                    <td>
                      <span class="td-span">169,000</span>
                    </td>
                    <td>
                      <span class="td-span td-status td-playing font-futura locate_home">판매중</span>
                    </td>
                    <td class="fn-td-btn clearfix">
                      <div class="td-btn-wrap">
                        <p class="td-span td-btn td-item">
                                                                                <span class="btn-ic btn--seeProfile">
                                                                                    <img src="imgs/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                                                                </span>
                          아이템정보
                        </p>
                        <p class="td-span td-btn">
                                                                                <span class="btn-ic btn--modify">
                                                                                    <img src="imgs/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                                                                </span>
                          수정
                        </p>
                        <p class="td-span td-btn td-showType">
                                                                                <span class="btn-ic btn--display">
                                                                                    <img src="imgs/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                                                                </span>
                          상태변경
                        </p>
                        <p class="td-span td-btn td-category">
                                                                                <span class="btn-ic btn--exposure">
                                                                                    <img src="imgs/ic_post.png" class="ic-img" width="8" height="8" alt="">
                                                                                </span>
                          <span class="font-futura">Shop-main</span> 추가
                        </p>
                        <p class="td-span td-btn td-category">
                                                                                <span class="btn-ic btn--exposure">
                                                                                    <img src="imgs/ic_post.png" class="ic-img" width="8" height="8" alt="">
                                                                                </span>
                          <span class="font-futura">Category-main</span> 추가
                        </p>
                      </div>
                    </td>
                    <td class="hidden_data">
                      <!-- 브랜드명 --><span class="it--brand">레클레스레드옴</span>
                      <!-- 상품코드 --><span class="it--code">0102010000000077</span>
                      <!-- 카테고리 --><span class="it--cat">010201</span>
                      <!-- 상품기본설명 --><span class="it--explain">바르셀로나에서 온 비건스웨이드 요가매트</span>
                      <!-- 상품유형 --><span class="it--goodType">일반상품</span>
                      <!-- 과세여부 --><span class="it--taxation">과세상품</span>
                      <!-- 배송소요일 --><span class="it--deliveryDates">3일</span>
                      <!-- 배송비유형 --><span class="it--deliveryFee">무료배송</span>
                      <!-- 상품유의사항 --><span class="it--goodAlert"></span>
                      <!-- 주문유의사항 --><span class="it--orderAlert"></span>
                      <!-- 배송유의사항 --><span class="it--deliveryAlert"></span>
                      <!-- 상품고시정보 --><div class="it--noticeInfo">-품명 및 모델명 : 비건스웨이드 요가매트
                        -크기, 중량 : 66*188mm / 2kg
                        -색상 : rose quartz&#38;serenity
                        -재질 : vegan suede
                        -제품 구성 : 요가매트+스트랩
                        -동일모델의 출시년월 : 2018.12
                        -제조자(수입자) : 파이브앤다임
                        -제조국 : 중국OEM
                        -상품별 세부 사양 : 상세페이지 참고
                        - 품질보증기준(>품질보증기간 및 수리/교환/반품 등의 보상방법 정보) : 관련 분쟁해결법에 따름
                        -A/S 책임자와 전화번호 : 07086568895 파이브앤다임</div>
                      <!-- 인증정보 --><span class="it--certiInfo">해당사항 없음/비건스웨이드 요가매트/Rose Quartz&#38;Serenity/Recklessred-om/파이브앤다임</span>
                      <!-- 상품가격정보 --><span class="it--priceInfo">정상가:169,000, 판매가:169,000, 마진율:20%, 공급가:135,200,</span>
                      <!-- 옵션 --><span class="it--option">[](필수),[]</span>
                      <!-- 등록일 --><span class="it--enrollDate">2020-07-06 22:02:10</span>
                      <!-- 승인일자 --><span>2020-11-05 21:45:37</span>
                      <!-- 상품이미지(필수) --><span class="it--registration-main"><img src="<?= base_url(); ?>uploads/shop_image/product_77_0_thumb.jpg?id=1594077428" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지1 --><span class="it--registration1"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지2 --><span class="it--registration2"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지3 --><span class="it--registration3"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지4 --><span class="it--registration4"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지5 --><span class="it--registration5"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품상세페이지 --><div class="it--registration-detail">
                        <!-- clone 텍스트 문구 삽입 -->
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="td-label chkTd">
                      <input class="chkPiece" type="checkbox" name="chkPiece">
                      <label class="chkLabel"></label>
                    </td>
                    <td>
                      <span class="td-span">레클레스레드옴</span>
                    </td>
                    <td>
                      <span class="td-span">0102010000000078</span>
                    </td>
                    <td>
                      <span class="td-span">010201</span>
                    </td>
                    <td>
                                                                        <span class="td-span">
                                                                            <img class="span-img" src="<?= base_url(); ?>uploads/shop_image/product_78_0_thumb.jpg?id=1594086400?random=1614822380490" alt="" width="46" height="46">
                                                                        </span>
                    </td>
                    <td>
                      <span class="td-span">Tropic Hues</span>
                    </td>
                    <td>
                      <span class="td-span">169,000</span>
                    </td>
                    <td>
                      <span class="td-span td-status td-playing font-futura locate_home">판매중</span>
                    </td>
                    <td class="fn-td-btn clearfix">
                      <div class="td-btn-wrap">
                        <p class="td-span td-btn td-item">
                                                                                <span class="btn-ic btn--seeProfile">
                                                                                    <img src="imgs/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                                                                </span>
                          아이템정보
                        </p>
                        <p class="td-span td-btn">
                                                                                <span class="btn-ic btn--modify">
                                                                                    <img src="imgs/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                                                                </span>
                          수정
                        </p>
                        <p class="td-span td-btn td-showType">
                                                                                <span class="btn-ic btn--display">
                                                                                    <img src="imgs/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                                                                </span>
                          상태변경
                        </p>
                        <p class="td-span td-btn td-category">
                                                                                <span class="btn-ic btn--exposure">
                                                                                    <img src="imgs/ic_post.png" class="ic-img" width="8" height="8" alt="">
                                                                                </span>
                          <span class="font-futura">Shop-main</span> 추가
                        </p>
                        <p class="td-span td-btn td-category">
                                                                                <span class="btn-ic btn--exposure">
                                                                                    <img src="imgs/ic_post.png" class="ic-img" width="8" height="8" alt="">
                                                                                </span>
                          <span class="font-futura">Category-main</span> 추가
                        </p>
                      </div>
                    </td>
                    <td class="hidden_data">
                      <!-- 브랜드명 --><span class="it--brand">레클레스레드옴</span>
                      <!-- 상품코드 --><span class="it--code">0102010000000077</span>
                      <!-- 카테고리 --><span class="it--cat">010201</span>
                      <!-- 상품기본설명 --><span class="it--explain">바르셀로나에서 온 비건스웨이드 요가매트</span>
                      <!-- 상품유형 --><span class="it--goodType">일반상품</span>
                      <!-- 과세여부 --><span class="it--taxation">과세상품</span>
                      <!-- 배송소요일 --><span class="it--deliveryDates">3일</span>
                      <!-- 배송비유형 --><span class="it--deliveryFee">무료배송</span>
                      <!-- 상품유의사항 --><span class="it--goodAlert"></span>
                      <!-- 주문유의사항 --><span class="it--orderAlert"></span>
                      <!-- 배송유의사항 --><span class="it--deliveryAlert"></span>
                      <!-- 상품고시정보 --><div class="it--noticeInfo">-품명 및 모델명 : 비건스웨이드 요가매트
                        -크기, 중량 : 66*188mm / 2kg
                        -색상 : rose quartz&#38;serenity
                        -재질 : vegan suede
                        -제품 구성 : 요가매트+스트랩
                        -동일모델의 출시년월 : 2018.12
                        -제조자(수입자) : 파이브앤다임
                        -제조국 : 중국OEM
                        -상품별 세부 사양 : 상세페이지 참고
                        - 품질보증기준(>품질보증기간 및 수리/교환/반품 등의 보상방법 정보) : 관련 분쟁해결법에 따름
                        -A/S 책임자와 전화번호 : 07086568895 파이브앤다임</div>
                      <!-- 인증정보 --><span class="it--certiInfo">해당사항 없음/비건스웨이드 요가매트/Rose Quartz&#38;Serenity/Recklessred-om/파이브앤다임</span>
                      <!-- 상품가격정보 --><span class="it--priceInfo">정상가:169,000, 판매가:169,000, 마진율:20%, 공급가:135,200,</span>
                      <!-- 옵션 --><span class="it--option">[](필수),[]</span>
                      <!-- 등록일 --><span class="it--enrollDate">2020-07-06 22:02:10</span>
                      <!-- 승인일자 --><span>2020-11-05 21:45:37</span>
                      <!-- 상품이미지(필수) --><span class="it--registration-main"><img src="<?= base_url(); ?>uploads/shop_image/product_77_0_thumb.jpg?id=1594077428" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지1 --><span class="it--registration1"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지2 --><span class="it--registration2"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지3 --><span class="it--registration3"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지4 --><span class="it--registration4"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지5 --><span class="it--registration5"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품상세페이지 --><div class="it--registration-detail">
                        <!-- clone 텍스트 문구 삽입 -->
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="td-label chkTd">
                      <input class="chkPiece" type="checkbox" name="chkPiece">
                      <label class="chkLabel"></label>
                    </td>
                    <td>
                      <span class="td-span">서율이네</span>
                    </td>
                    <td>
                      <span class="td-span">0103010000000079</span>
                    </td>
                    <td>
                      <span class="td-span">010301</span>
                    </td>
                    <td>
                                                                        <span class="td-span">
                                                                            <img class="span-img" src="<?= base_url(); ?>uploads/shop_image/product_79_0_thumb.jpg?id=1604576254?random=1614822380490" alt="" width="46" height="46">
                                                                        </span>
                    </td>
                    <td>
                      <span class="td-span">상품 악세사리~~~~~~</span>
                    </td>
                    <td>
                      <span class="td-span">7,500</span>
                    </td>
                    <td>
                      <span class="td-span td-status td-playing font-futura locate_home">판매중</span>
                    </td>
                    <td class="fn-td-btn clearfix">
                      <div class="td-btn-wrap">
                        <p class="td-span td-btn td-item">
                                                                                <span class="btn-ic btn--seeProfile">
                                                                                    <img src="imgs/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                                                                </span>
                          아이템정보
                        </p>
                        <p class="td-span td-btn">
                                                                                <span class="btn-ic btn--modify">
                                                                                    <img src="imgs/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                                                                </span>
                          수정
                        </p>
                        <p class="td-span td-btn td-showType">
                                                                                <span class="btn-ic btn--display">
                                                                                    <img src="imgs/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                                                                </span>
                          상태변경
                        </p>
                        <p class="td-span td-btn td-category">
                                                                                <span class="btn-ic btn--exposure">
                                                                                    <img src="imgs/ic_post.png" class="ic-img" width="8" height="8" alt="">
                                                                                </span>
                          <span class="font-futura">Shop-main</span> 추가
                        </p>
                        <p class="td-span td-btn td-category">
                                                                                <span class="btn-ic btn--exposure">
                                                                                    <img src="imgs/ic_post.png" class="ic-img" width="8" height="8" alt="">
                                                                                </span>
                          <span class="font-futura">Category-main</span> 추가
                        </p>
                      </div>
                    </td>
                    <td class="hidden_data">
                      <!-- 브랜드명 --><span class="it--brand">서율이네</span>
                      <!-- 상품코드 --><span class="it--code">0103010000000079</span>
                      <!-- 카테고리 --><span class="it--cat">010301</span>
                      <!-- 상품기본설명 --><span class="it--explain">상품 악세사리~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~</span>
                      <!-- 상품유형 --><span class="it--goodType">일반상품</span>
                      <!-- 과세여부 --><span class="it--taxation">과세상품</span>
                      <!-- 배송소요일 --><span class="it--deliveryDates">2일</span>
                      <!-- 배송비유형 --><span class="it--deliveryFee">조건부 무료배송</span>
                      <!-- 상품유의사항 --><span class="it--goodAlert"></span>
                      <!-- 주문유의사항 --><span class="it--orderAlert"></span>
                      <!-- 배송유의사항 --><span class="it--deliveryAlert"></span>
                      <!-- 상품고시정보 --><div class="it--noticeInfo">[{"noti_field_id":59,"noti_field":"품명 및 모델명","noti_info":"1"},{"noti_field_id":60,"noti_field":"법에의한 인증.허가 등을 받았음을 확인할 수 있는 경우 그에대한 사항","noti_info":"1"},{"noti_field_id":61,"noti_field":"제조국 또는 원산지","noti_info":"1"},{"noti_field_id":62,"noti_field":"제조사","noti_info":"1"},{"noti_field_id":63,"noti_field":"A/S 책임자와 전화번호","noti_info":"1"}]</div>
                      <!-- 인증정보 --><span class="it--certiInfo">1/1/1/1/1</span>
                      <!-- 상품가격정보 --><span class="it--priceInfo">정상가:10,000, 판매가:7,500, 마진율:16%, 공급가:6,300,</span>
                      <!-- 옵션 --><span class="it--option">[{"idx":0,"item_option_require":true,"item_option_name":"색상","item_option_vals":[{"idx":0,"value":"블루","price":0}]}](필수),[]</span>
                      <!-- 등록일 --><span class="it--enrollDate">2020-07-07 21:46:15</span>
                      <!-- 승인일자 --><span>2020-08-07 21:45:08</span>
                      <!-- 상품이미지(필수) --><span class="it--registration-main"><img src="<?= base_url(); ?>uploads/shop_image/product_79_0_thumb.jpg?id=1604576254" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지1 --><span class="it--registration1"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지2 --><span class="it--registration2"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지3 --><span class="it--registration3"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지4 --><span class="it--registration4"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지5 --><span class="it--registration5"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품상세페이지 --><div class="it--registration-detail">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_79_1594138364674856.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_79_1594138364685537.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_79_1594138364695072.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_79_1594138364698228.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_79_1594138364781542.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_79_1594138364785634.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_79_1594138364789093.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_79_1594138364793462.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_79_1594138364798625.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_79_1594138364803621.jpg" alt="" style="width: 100%; height: auto;">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="td-label chkTd">
                      <input class="chkPiece" type="checkbox" name="chkPiece">
                      <label class="chkLabel"></label>
                    </td>
                    <td>
                      <span class="td-span">서율이네</span>
                    </td>
                    <td>
                      <span class="td-span">0102010000000080</span>
                    </td>
                    <td>
                      <span class="td-span">010201</span>
                    </td>
                    <td>
                                                                        <span class="td-span">
                                                                            <img class="span-img" src="<?= base_url(); ?>uploads/shop_image/product_80_0_thumb.jpg?id=1604576230?random=1614822380490" alt="" width="46" height="46">
                                                                        </span>
                    </td>
                    <td>
                      <span class="td-span">요가매트~~~~~~~~~~</span>
                    </td>
                    <td>
                      <span class="td-span">45,000</span>
                    </td>
                    <td>
                      <span class="td-span td-status td-playing font-futura locate_home">판매중</span>
                    </td>
                    <td class="fn-td-btn clearfix">
                      <div class="td-btn-wrap">
                        <p class="td-span td-btn td-item">
                                                                                <span class="btn-ic btn--seeProfile">
                                                                                    <img src="imgs/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                                                                </span>
                          아이템정보
                        </p>
                        <p class="td-span td-btn">
                                                                                <span class="btn-ic btn--modify">
                                                                                    <img src="imgs/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                                                                </span>
                          수정
                        </p>
                        <p class="td-span td-btn td-showType">
                                                                                <span class="btn-ic btn--display">
                                                                                    <img src="imgs/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                                                                </span>
                          상태변경
                        </p>
                        <p class="td-span td-btn td-category">
                                                                                <span class="btn-ic btn--exposure">
                                                                                    <img src="imgs/ic_post.png" class="ic-img" width="8" height="8" alt="">
                                                                                </span>
                          <span class="font-futura">Shop-main</span> 추가
                        </p>
                        <p class="td-span td-btn td-category">
                                                                                <span class="btn-ic btn--exposure">
                                                                                    <img src="imgs/ic_post.png" class="ic-img" width="8" height="8" alt="">
                                                                                </span>
                          <span class="font-futura">Category-main</span> 추가
                        </p>
                      </div>
                    </td>
                    <td class="hidden_data">
                      <!-- 브랜드명 --><span class="it--brand">서율이네</span>
                      <!-- 상품코드 --><span class="it--code">0102010000000080</span>
                      <!-- 카테고리 --><span class="it--cat">010201</span>
                      <!-- 상품기본설명 --><span class="it--explain">요가매트~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~</span>
                      <!-- 상품유형 --><span class="it--goodType">일반상품</span>
                      <!-- 과세여부 --><span class="it--taxation">과세상품</span>
                      <!-- 배송소요일 --><span class="it--deliveryDates">2일</span>
                      <!-- 배송비유형 --><span class="it--deliveryFee">조건부 무료배송</span>
                      <!-- 상품유의사항 --><span class="it--goodAlert"></span>
                      <!-- 주문유의사항 --><span class="it--orderAlert"></span>
                      <!-- 배송유의사항 --><span class="it--deliveryAlert"></span>
                      <!-- 상품고시정보 --><div class="it--noticeInfo">[{"noti_field_id":48,"noti_field":"품명 및 모델명","noti_info":"1"},{"noti_field_id":49,"noti_field":"크기, 중량","noti_info":"1"},{"noti_field_id":50,"noti_field":"색상","noti_info":"1"},{"noti_field_id":51,"noti_field":"재질","noti_info":"1"},{"noti_field_id":52,"noti_field":"제품 구성","noti_info":"1"},{"noti_field_id":53,"noti_field":"동일모델의 출시년월","noti_info":"1"},{"noti_field_id":54,"noti_field":"제조자(수입자)","noti_info":"1"},{"noti_field_id":55,"noti_field":"제조국","noti_info":"1"},{"noti_field_id":56,"noti_field":"상품별 세부사양","noti_info":"1"},{"noti_field_id":57,"noti_field":"품질보증기준","noti_info":"1"},{"noti_field_id":58,"noti_field":"A/S 책임자와 전화번호","noti_info":"1"}]</div>
                      <!-- 인증정보 --><span class="it--certiInfo">1/1/1/1/1</span>
                      <!-- 상품가격정보 --><span class="it--priceInfo">정상가:50,000, 판매가:45,000, 마진율:19%, 공급가:36,400,</span>
                      <!-- 옵션 --><span class="it--option">[](필수),[{"idx":0,"item_option_require":false,"item_option_name":"운남백차 ","item_option_vals":[{"idx":0,"value":"15g(미니틴케이스)","price":0},{"idx":1,"value":"40g(지관틴케이스)","price":"16800"}]}]</span>
                      <!-- 등록일 --><span class="it--enrollDate">2020-07-08 01:16:16</span>
                      <!-- 승인일자 --><span>2020-07-15 11:47:30</span>
                      <!-- 상품이미지(필수) --><span class="it--registration-main"><img src="<?= base_url(); ?>uploads/shop_image/product_80_0_thumb.jpg?id=1604576230" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지1 --><span class="it--registration1"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지2 --><span class="it--registration2"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지3 --><span class="it--registration3"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지4 --><span class="it--registration4"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지5 --><span class="it--registration5"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품상세페이지 --><div class="it--registration-detail">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_80_1594138672553358.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_80_1594138672563892.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_80_1594138672566112.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_80_1594138672568122.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_80_1594138672570016.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_80_1594138672574306.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_80_1594138672576633.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_80_1594138672572177.jpg" alt="" style="width: 100%; height: auto;">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="td-label chkTd">
                      <input class="chkPiece" type="checkbox" name="chkPiece">
                      <label class="chkLabel"></label>
                    </td>
                    <td>
                      <span class="td-span">서율이네</span>
                    </td>
                    <td>
                      <span class="td-span">0101010000000081</span>
                    </td>
                    <td>
                      <span class="td-span">010101</span>
                    </td>
                    <td>
                                                                        <span class="td-span">
                                                                            <img class="span-img" src="<?= base_url(); ?>uploads/shop_image/product_81_0_thumb.jpg?id=1604576204?random=1614822380490" alt="" width="46" height="46">
                                                                        </span>
                    </td>
                    <td>
                      <span class="td-span">요가상의</span>
                    </td>
                    <td>
                      <span class="td-span">80,000</span>
                    </td>
                    <td>
                      <span class="td-span td-status td-playing font-futura locate_home">판매중</span>
                    </td>
                    <td class="fn-td-btn clearfix">
                      <div class="td-btn-wrap">
                        <p class="td-span td-btn td-item">
                                                                                <span class="btn-ic btn--seeProfile">
                                                                                    <img src="imgs/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                                                                </span>
                          아이템정보
                        </p>
                        <p class="td-span td-btn">
                                                                                <span class="btn-ic btn--modify">
                                                                                    <img src="imgs/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                                                                </span>
                          수정
                        </p>
                        <p class="td-span td-btn td-showType">
                                                                                <span class="btn-ic btn--display">
                                                                                    <img src="imgs/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                                                                </span>
                          상태변경
                        </p>
                        <p class="td-span td-btn td-category">
                                                                                <span class="btn-ic btn--exposure">
                                                                                    <img src="imgs/ic_post.png" class="ic-img" width="8" height="8" alt="">
                                                                                </span>
                          <span class="font-futura">Shop-main</span> 추가
                        </p>
                        <p class="td-span td-btn td-category">
                                                                                <span class="btn-ic btn--exposure">
                                                                                    <img src="imgs/ic_post.png" class="ic-img" width="8" height="8" alt="">
                                                                                </span>
                          <span class="font-futura">Category-main</span> 추가
                        </p>
                      </div>
                    </td>
                    <td class="hidden_data">
                      <!-- 브랜드명 --><span class="it--brand">서율이네</span>
                      <!-- 상품코드 --><span class="it--code">0101010000000081</span>
                      <!-- 카테고리 --><span class="it--cat">010101</span>
                      <!-- 상품기본설명 --><span class="it--explain">요가상의</span>
                      <!-- 상품유형 --><span class="it--goodType">일반상품</span>
                      <!-- 과세여부 --><span class="it--taxation">과세상품</span>
                      <!-- 배송소요일 --><span class="it--deliveryDates">2일</span>
                      <!-- 배송비유형 --><span class="it--deliveryFee">조건부 무료배송</span>
                      <!-- 상품유의사항 --><span class="it--goodAlert"></span>
                      <!-- 주문유의사항 --><span class="it--orderAlert"></span>
                      <!-- 배송유의사항 --><span class="it--deliveryAlert"></span>
                      <!-- 상품고시정보 --><div class="it--noticeInfo">[{"noti_field_id":1,"noti_field":"제품소재","noti_info":"1"},{"noti_field_id":2,"noti_field":"색상","noti_info":"1"},{"noti_field_id":3,"noti_field":"치수","noti_info":"1"},{"noti_field_id":4,"noti_field":"제조자","noti_info":"1"},{"noti_field_id":5,"noti_field":"제조국","noti_info":"1"},{"noti_field_id":6,"noti_field":"세탁방법 및 취급시 주의사항","noti_info":"1"},{"noti_field_id":7,"noti_field":"제조연월","noti_info":"1"},{"noti_field_id":8,"noti_field":"품질보증기준","noti_info":"1"},{"noti_field_id":9,"noti_field":"A/S 책임자와 전화번호","noti_info":"1"}]</div>
                      <!-- 인증정보 --><span class="it--certiInfo">1/1/1/11/1</span>
                      <!-- 상품가격정보 --><span class="it--priceInfo">정상가:100,000, 판매가:80,000, 마진율:17%, 공급가:66,400,</span>
                      <!-- 옵션 --><span class="it--option">[](필수),[]</span>
                      <!-- 등록일 --><span class="it--enrollDate">2020-07-08 01:30:00</span>
                      <!-- 승인일자 --><span>2020-07-15 11:47:33</span>
                      <!-- 상품이미지(필수) --><span class="it--registration-main"><img src="<?= base_url(); ?>uploads/shop_image/product_81_0_thumb.jpg?id=1604576204" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지1 --><span class="it--registration1"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지2 --><span class="it--registration2"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지3 --><span class="it--registration3"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지4 --><span class="it--registration4"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지5 --><span class="it--registration5"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품상세페이지 --><div class="it--registration-detail">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_81_1594609421285009.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_81_1594609421336973.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_81_1594609421415063.jpg" alt="" style="width: 100%; height: auto;">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="td-label chkTd">
                      <input class="chkPiece" type="checkbox" name="chkPiece">
                      <label class="chkLabel"></label>
                    </td>
                    <td>
                      <span class="td-span">서율이네</span>
                    </td>
                    <td>
                      <span class="td-span">0101010000000091</span>
                    </td>
                    <td>
                      <span class="td-span">010101</span>
                    </td>
                    <td>
                                                                        <span class="td-span">
                                                                            <img class="span-img" src="<?= base_url(); ?>uploads/shop_image/product_91_0_thumb.jpg?id=1610691368?random=1614822380490" alt="" width="46" height="46">
                                                                        </span>
                    </td>
                    <td>
                      <span class="td-span">아로마블리스 스페셜에디션 쿨온+로즈쿼츠엔젤괄사+파우치세트</span>
                    </td>
                    <td>
                      <span class="td-span">22,000</span>
                    </td>
                    <td>
                      <span class="td-span td-status td-playing font-futura locate_home">판매중</span>
                    </td>
                    <td class="fn-td-btn clearfix">
                      <div class="td-btn-wrap">
                        <p class="td-span td-btn td-item">
                                                                                <span class="btn-ic btn--seeProfile">
                                                                                    <img src="imgs/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                                                                </span>
                          아이템정보
                        </p>
                        <p class="td-span td-btn">
                                                                                <span class="btn-ic btn--modify">
                                                                                    <img src="imgs/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                                                                </span>
                          수정
                        </p>
                        <p class="td-span td-btn td-showType">
                                                                                <span class="btn-ic btn--display">
                                                                                    <img src="imgs/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                                                                </span>
                          상태변경
                        </p>
                        <p class="td-span td-btn td-category">
                                                                                <span class="btn-ic btn--exposure">
                                                                                    <img src="imgs/ic_post.png" class="ic-img" width="8" height="8" alt="">
                                                                                </span>
                          <span class="font-futura">Shop-main</span> 추가
                        </p>
                        <p class="td-span td-btn td-category">
                                                                                <span class="btn-ic btn--exposure">
                                                                                    <img src="imgs/ic_post.png" class="ic-img" width="8" height="8" alt="">
                                                                                </span>
                          <span class="font-futura">Category-main</span> 추가
                        </p>
                      </div>
                    </td>
                    <td class="hidden_data">
                      <!-- 브랜드명 --><span class="it--brand">서율이네</span>
                      <!-- 상품코드 --><span class="it--code">0101010000000091</span>
                      <!-- 카테고리 --><span class="it--cat">010101</span>
                      <!-- 상품기본설명 --><span class="it--explain">단정한 요가복</span>
                      <!-- 상품유형 --><span class="it--goodType">일반상품</span>
                      <!-- 과세여부 --><span class="it--taxation">과세상품</span>
                      <!-- 배송소요일 --><span class="it--deliveryDates">2일</span>
                      <!-- 배송비유형 --><span class="it--deliveryFee">조건부 무료배송</span>
                      <!-- 상품유의사항 --><span class="it--goodAlert"></span>
                      <!-- 주문유의사항 --><span class="it--orderAlert"></span>
                      <!-- 배송유의사항 --><span class="it--deliveryAlert"></span>
                      <!-- 상품고시정보 --><div class="it--noticeInfo">[{"noti_field_id":1,"noti_field":"제품소재","noti_info":"1"},{"noti_field_id":2,"noti_field":"색상","noti_info":"1"},{"noti_field_id":3,"noti_field":"치수","noti_info":"1"},{"noti_field_id":4,"noti_field":"제조자","noti_info":"1"},{"noti_field_id":5,"noti_field":"제조국","noti_info":"1"},{"noti_field_id":6,"noti_field":"세탁방법 및 취급시 주의사항","noti_info":"1"},{"noti_field_id":7,"noti_field":"제조연월","noti_info":"1"},{"noti_field_id":8,"noti_field":"품질보증기준","noti_info":"1"},{"noti_field_id":9,"noti_field":"A/S 책임자와 전화번호","noti_info":"1"}]</div>
                      <!-- 인증정보 --><span class="it--certiInfo">1/1/1/1/</span>
                      <!-- 상품가격정보 --><span class="it--priceInfo">정상가:22,050, 판매가:22,000, 마진율:20%, 공급가:17,600,</span>
                      <!-- 옵션 --><span class="it--option">[](필수),[]</span>
                      <!-- 등록일 --><span class="it--enrollDate">2020-08-02 21:24:49</span>
                      <!-- 승인일자 --><span>2020-08-07 21:45:21</span>
                      <!-- 상품이미지(필수) --><span class="it--registration-main"><img src="<?= base_url(); ?>uploads/shop_image/product_91_0_thumb.jpg?id=1610691368" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지1 --><span class="it--registration1"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지2 --><span class="it--registration2"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지3 --><span class="it--registration3"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지4 --><span class="it--registration4"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지5 --><span class="it--registration5"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품상세페이지 --><div class="it--registration-detail">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_91_1596371210532449.jpg" alt="" style="width: 100%; height: auto;">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="td-label chkTd">
                      <input class="chkPiece" type="checkbox" name="chkPiece">
                      <label class="chkLabel"></label>
                    </td>
                    <td>
                      <span class="td-span">제혁이네322</span>
                    </td>
                    <td>
                      <span class="td-span">0101020000000092</span>
                    </td>
                    <td>
                      <span class="td-span">010102</span>
                    </td>
                    <td>
                                                                        <span class="td-span">
                                                                            <img class="span-img" src="<?= base_url(); ?>uploads/shop_image/product_92_0_thumb.jpg?id=1596372883?random=1614822380490" alt="" width="46" height="46">
                                                                        </span>
                    </td>
                    <td>
                      <span class="td-span">요가복</span>
                    </td>
                    <td>
                      <span class="td-span">9,000</span>
                    </td>
                    <td>
                      <span class="td-span td-status td-playing font-futura locate_home">판매중</span>
                    </td>
                    <td class="fn-td-btn clearfix">
                      <div class="td-btn-wrap">
                        <p class="td-span td-btn td-item">
                                                                                <span class="btn-ic btn--seeProfile">
                                                                                    <img src="imgs/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                                                                </span>
                          아이템정보
                        </p>
                        <p class="td-span td-btn">
                                                                                <span class="btn-ic btn--modify">
                                                                                    <img src="imgs/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                                                                </span>
                          수정
                        </p>
                        <p class="td-span td-btn td-showType">
                                                                                <span class="btn-ic btn--display">
                                                                                    <img src="imgs/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                                                                </span>
                          상태변경
                        </p>
                        <p class="td-span td-btn td-category">
                                                                                <span class="btn-ic btn--exposure">
                                                                                    <img src="imgs/ic_post.png" class="ic-img" width="8" height="8" alt="">
                                                                                </span>
                          <span class="font-futura">Shop-main</span> 추가
                        </p>
                        <p class="td-span td-btn td-category">
                                                                                <span class="btn-ic btn--exposure">
                                                                                    <img src="imgs/ic_post.png" class="ic-img" width="8" height="8" alt="">
                                                                                </span>
                          <span class="font-futura">Category-main</span> 추가
                        </p>
                      </div>
                    </td>
                    <td class="hidden_data">
                      <!-- 브랜드명 --><span class="it--brand">제혁이네322</span>
                      <!-- 상품코드 --><span class="it--code">0101020000000092</span>
                      <!-- 카테고리 --><span class="it--cat">010102</span>
                      <!-- 상품기본설명 --><span class="it--explain">요가복입니다</span>
                      <!-- 상품유형 --><span class="it--goodType">일반상품</span>
                      <!-- 과세여부 --><span class="it--taxation">과세상품</span>
                      <!-- 배송소요일 --><span class="it--deliveryDates">2일</span>
                      <!-- 배송비유형 --><span class="it--deliveryFee">무료배송</span>
                      <!-- 상품유의사항 --><span class="it--goodAlert"></span>
                      <!-- 주문유의사항 --><span class="it--orderAlert"></span>
                      <!-- 배송유의사항 --><span class="it--deliveryAlert"></span>
                      <!-- 상품고시정보 --><div class="it--noticeInfo">-제품소재 (섬유의 조성 또는 혼용률을 백분율로 표시, 기능성인 경우 성적서 혹은 허가서)
                        -색상
                        -치수
                        -제조자 (수입품 아님:N/제조자 표기, 수입품:Y/수입자 표기, 병행수입의 경우 병행수입 여부로 대체 가능)
                        -제조국 (제조국은 법률상 중요정보이니 정확히 입력해주세요)
                        -세탁방법 및 취급시 주의사항
                        -제조연월
                        -품질보증기준 (품질보증기간 및 수리/교환/반품 등의 보상방법 정보)
                        -A/S 책임자와 전화번호</div>
                      <!-- 인증정보 --><span class="it--certiInfo">3/3/3//3</span>
                      <!-- 상품가격정보 --><span class="it--priceInfo">정상가:10,000, 판매가:9,000, 마진율:19%, 공급가:7,200,</span>
                      <!-- 옵션 --><span class="it--option">[](필수),[]</span>
                      <!-- 등록일 --><span class="it--enrollDate">2020-08-02 21:53:20</span>
                      <!-- 승인일자 --><span>2020-08-02 21:55:19</span>
                      <!-- 상품이미지(필수) --><span class="it--registration-main"><img src="<?= base_url(); ?>uploads/shop_image/product_92_0_thumb.jpg?id=1596372883" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지1 --><span class="it--registration1"><img src="<?= base_url(); ?>uploads/shop_image/product_92_1_thumb.jpg?id=1596372883" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지2 --><span class="it--registration2"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지3 --><span class="it--registration3"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지4 --><span class="it--registration4"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지5 --><span class="it--registration5"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품상세페이지 --><div class="it--registration-detail">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_92_1596372868924394.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_92_1596372869187728.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_92_1596372869540548.jpg" alt="" style="width: 100%; height: auto;">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="td-label chkTd">
                      <input class="chkPiece" type="checkbox" name="chkPiece">
                      <label class="chkLabel"></label>
                    </td>
                    <td>
                      <span class="td-span">서율이네</span>
                    </td>
                    <td>
                      <span class="td-span">0103010000000102</span>
                    </td>
                    <td>
                      <span class="td-span">010301</span>
                    </td>
                    <td>
                                                                        <span class="td-span">
                                                                            <img class="span-img" src="<?= base_url(); ?>uploads/shop_image/product_102_0_thumb.jpg?id=1604492674?random=1614822380490" alt="" width="46" height="46">
                                                                        </span>
                    </td>
                    <td>
                      <span class="td-span">액세서리</span>
                    </td>
                    <td>
                      <span class="td-span">142,500</span>
                    </td>
                    <td>
                      <span class="td-span td-status td-playing font-futura locate_home">판매중</span>
                    </td>
                    <td class="fn-td-btn clearfix">
                      <div class="td-btn-wrap">
                        <p class="td-span td-btn td-item">
                                                                                <span class="btn-ic btn--seeProfile">
                                                                                    <img src="imgs/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                                                                </span>
                          아이템정보
                        </p>
                        <p class="td-span td-btn">
                                                                                <span class="btn-ic btn--modify">
                                                                                    <img src="imgs/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                                                                </span>
                          수정
                        </p>
                        <p class="td-span td-btn td-showType">
                                                                                <span class="btn-ic btn--display">
                                                                                    <img src="imgs/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                                                                </span>
                          상태변경
                        </p>
                        <p class="td-span td-btn td-category">
                                                                                <span class="btn-ic btn--exposure">
                                                                                    <img src="imgs/ic_post.png" class="ic-img" width="8" height="8" alt="">
                                                                                </span>
                          <span class="font-futura">Shop-main</span> 추가
                        </p>
                        <p class="td-span td-btn td-category">
                                                                                <span class="btn-ic btn--exposure">
                                                                                    <img src="imgs/ic_post.png" class="ic-img" width="8" height="8" alt="">
                                                                                </span>
                          <span class="font-futura">Category-main</span> 추가
                        </p>
                      </div>
                    </td>
                    <td class="hidden_data">
                      <!-- 브랜드명 --><span class="it--brand">서율이네</span>
                      <!-- 상품코드 --><span class="it--code">0103010000000102</span>
                      <!-- 카테고리 --><span class="it--cat">010301</span>
                      <!-- 상품기본설명 --><span class="it--explain">액세서리</span>
                      <!-- 상품유형 --><span class="it--goodType">일반상품</span>
                      <!-- 과세여부 --><span class="it--taxation">과세상품</span>
                      <!-- 배송소요일 --><span class="it--deliveryDates">2일</span>
                      <!-- 배송비유형 --><span class="it--deliveryFee">조건부 무료배송</span>
                      <!-- 상품유의사항 --><span class="it--goodAlert"></span>
                      <!-- 주문유의사항 --><span class="it--orderAlert"></span>
                      <!-- 배송유의사항 --><span class="it--deliveryAlert"></span>
                      <!-- 상품고시정보 --><div class="it--noticeInfo">[{"noti_field_id":59,"noti_field":"품명 및 모델명","noti_info":"1"},{"noti_field_id":60,"noti_field":"법에의한 인증.허가 등을 받았음을 확인할 수 있는 경우 그에대한 사항","noti_info":"2"},{"noti_field_id":61,"noti_field":"제조국 또는 원산지","noti_info":"3"},{"noti_field_id":62,"noti_field":"제조사","noti_info":"4"},{"noti_field_id":63,"noti_field":"A/S 책임자와 전화번호","noti_info":"5"}]</div>
                      <!-- 인증정보 --><span class="it--certiInfo">11/11/11/11/11</span>
                      <!-- 상품가격정보 --><span class="it--priceInfo">정상가:150,000, 판매가:142,500, 마진율:20%, 공급가:114,000,</span>
                      <!-- 옵션 --><span class="it--option">[](필수),[]</span>
                      <!-- 등록일 --><span class="it--enrollDate">2020-11-04 21:24:34</span>
                      <!-- 승인일자 --><span>2020-11-04 21:28:02</span>
                      <!-- 상품이미지(필수) --><span class="it--registration-main"><img src="<?= base_url(); ?>uploads/shop_image/product_102_0_thumb.jpg?id=1604492674" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지1 --><span class="it--registration1"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지2 --><span class="it--registration2"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지3 --><span class="it--registration3"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지4 --><span class="it--registration4"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지5 --><span class="it--registration5"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품상세페이지 --><div class="it--registration-detail">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_102_1604492672614501.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_102_1604492672617808.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_102_1604492672621063.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_102_1604492672624454.jpg" alt="" style="width: 100%; height: auto;">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="td-label chkTd">
                      <input class="chkPiece" type="checkbox" name="chkPiece">
                      <label class="chkLabel"></label>
                    </td>
                    <td>
                      <span class="td-span">서율이네</span>
                    </td>
                    <td>
                      <span class="td-span">0202010000000103</span>
                    </td>
                    <td>
                      <span class="td-span">020201</span>
                    </td>
                    <td>
                                                                        <span class="td-span">
                                                                            <img class="span-img" src="<?= base_url(); ?>uploads/shop_image/product_103_0_thumb.jpg?id=1604495104" alt="" width="46" height="46">
                                                                        </span>
                    </td>
                    <td>
                      <span class="td-span">샐러드 간편식</span>
                    </td>
                    <td>
                      <span class="td-span">60,000</span>
                    </td>
                    <td>
                      <span class="td-span td-status td-playing font-futura locate_home">판매중</span>
                    </td>
                    <td class="fn-td-btn clearfix">
                      <div class="td-btn-wrap">
                        <p class="td-span td-btn td-item">
                                                                                <span class="btn-ic btn--seeProfile">
                                                                                    <img src="imgs/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                                                                </span>
                          아이템정보
                        </p>
                        <p class="td-span td-btn">
                                                                                <span class="btn-ic btn--modify">
                                                                                    <img src="imgs/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                                                                </span>
                          수정
                        </p>
                        <p class="td-span td-btn td-showType">
                                                                                <span class="btn-ic btn--display">
                                                                                    <img src="imgs/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                                                                </span>
                          상태변경
                        </p>
                        <p class="td-span td-btn td-category">
                                                                                <span class="btn-ic btn--exposure">
                                                                                    <img src="imgs/ic_post.png" class="ic-img" width="8" height="8" alt="">
                                                                                </span>
                          <span class="font-futura">Shop-main</span> 추가
                        </p>
                        <p class="td-span td-btn td-category">
                                                                                <span class="btn-ic btn--exposure">
                                                                                    <img src="imgs/ic_post.png" class="ic-img" width="8" height="8" alt="">
                                                                                </span>
                          <span class="font-futura">Category-main</span> 추가
                        </p>
                      </div>
                    </td>
                    <td class="hidden_data">
                      <!-- 브랜드명 --><span class="it--brand">서율이네</span>
                      <!-- 상품코드 --><span class="it--code">0202010000000103</span>
                      <!-- 카테고리 --><span class="it--cat">020201</span>
                      <!-- 상품기본설명 --><span class="it--explain">샐러드 간편식</span>
                      <!-- 상품유형 --><span class="it--goodType">일반상품</span>
                      <!-- 과세여부 --><span class="it--taxation">과세상품</span>
                      <!-- 배송소요일 --><span class="it--deliveryDates">2일</span>
                      <!-- 배송비유형 --><span class="it--deliveryFee">조건부 무료배송</span>
                      <!-- 상품유의사항 --><span class="it--goodAlert"></span>
                      <!-- 주문유의사항 --><span class="it--orderAlert"></span>
                      <!-- 배송유의사항 --><span class="it--deliveryAlert"></span>
                      <!-- 상품고시정보 --><div class="it--noticeInfo">[{"noti_field_id":74,"noti_field":"포장 단위별 용량(중량), 수량, 크기","noti_info":"1"},{"noti_field_id":75,"noti_field":"생산자","noti_info":"2"},{"noti_field_id":76,"noti_field":"원산지","noti_info":"3"},{"noti_field_id":77,"noti_field":"제조연월일, 유통기한 또는 품질 유지기한","noti_info":"4"},{"noti_field_id":78,"noti_field":"관련법상 표시사항","noti_info":"5"},{"noti_field_id":79,"noti_field":"1)농수산물인 경우, 농수산물품질관리법상 유전자변형 농산물 표시, 지리적 표시","noti_info":"6"},{"noti_field_id":80,"noti_field":"2)축산물인 경우, 축산법에 따른 등급 표시 (쇠고기는 이력관리에 따른 표시 유무)","noti_info":"7"},{"noti_field_id":81,"noti_field":"3)수산물인 경우, 농수산물품질관리법상 유전자변형수산물 표시, 지리적 표시","noti_info":"8"},{"noti_field_id":82,"noti_field":"4)수입식품인 경우, &#60;식품위생법에 따른 수입신고를 필함&#62;문구 입력","noti_info":"9"},{"noti_field_id":83,"noti_field":"상품 구성","noti_info":"10"},{"noti_field_id":84,"noti_field":"보관방법 또는 취급방법","noti_info":"11"},{"noti_field_id":85,"noti_field":"소비자상담 관련 전화번호","noti_info":"12"},{"noti_field_id":86,"noti_field":"창작자 소재지","noti_info":"13"},{"noti_field_id":87,"noti_field":"사업자등록번호","noti_info":"14"},{"noti_field_id":88,"noti_field":"사업자등록증상의 업종","noti_info":"15"}]</div>
                      <!-- 인증정보 --><span class="it--certiInfo"></span>
                      <!-- 상품가격정보 --><span class="it--priceInfo">정상가:100,000, 판매가:60,000, 마진율:15%, 공급가:51,000,</span>
                      <!-- 옵션 --><span class="it--option">[](필수),[]</span>
                      <!-- 등록일 --><span class="it--enrollDate">2020-11-04 21:26:08</span>
                      <!-- 승인일자 --><span>2020-11-04 21:28:12</span>
                      <!-- 상품이미지(필수) --><span class="it--registration-main"><img src="<?= base_url(); ?>uploads/shop_image/product_103_0_thumb.jpg?id=1604495104" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지1 --><span class="it--registration1"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지2 --><span class="it--registration2"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지3 --><span class="it--registration3"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지4 --><span class="it--registration4"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지5 --><span class="it--registration5"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품상세페이지 --><div class="it--registration-detail">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_103_1604492766944644.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_103_1604492766947811.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_103_1604492766951028.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_103_1604492766954100.jpg" alt="" style="width: 100%; height: auto;">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="td-label chkTd">
                      <input class="chkPiece" type="checkbox" name="chkPiece">
                      <label class="chkLabel"></label>
                    </td>
                    <td>
                      <span class="td-span">서율이네</span>
                    </td>
                    <td>
                      <span class="td-span">0101010000000104</span>
                    </td>
                    <td>
                      <span class="td-span">010101</span>
                    </td>
                    <td>
                                                                        <span class="td-span">
                                                                            <img class="span-img" src="<?= base_url(); ?>uploads/shop_image/product_104_0_thumb.jpg?id=1612876204" alt="" width="46" height="46">
                                                                        </span>
                    </td>
                    <td>
                      <span class="td-span">Signature top in cream	</span>
                    </td>
                    <td>
                      <span class="td-span">68,400</span>
                    </td>
                    <td>
                      <span class="td-span td-status td-playing font-futura locate_home">판매중</span>
                    </td>
                    <td class="fn-td-btn clearfix">
                      <div class="td-btn-wrap">
                        <p class="td-span td-btn td-item">
                                                                                <span class="btn-ic btn--seeProfile">
                                                                                    <img src="imgs/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                                                                </span>
                          아이템정보
                        </p>
                        <p class="td-span td-btn">
                                                                                <span class="btn-ic btn--modify">
                                                                                    <img src="imgs/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                                                                </span>
                          수정
                        </p>
                        <p class="td-span td-btn td-showType">
                                                                                <span class="btn-ic btn--display">
                                                                                    <img src="imgs/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                                                                </span>
                          상태변경
                        </p>
                        <p class="td-span td-btn td-category">
                                                                                <span class="btn-ic btn--exposure">
                                                                                    <img src="imgs/ic_post.png" class="ic-img" width="8" height="8" alt="">
                                                                                </span>
                          <span class="font-futura">Shop-main</span> 추가
                        </p>
                        <p class="td-span td-btn td-category">
                                                                                <span class="btn-ic btn--exposure">
                                                                                    <img src="imgs/ic_post.png" class="ic-img" width="8" height="8" alt="">
                                                                                </span>
                          <span class="font-futura">Category-main</span> 추가
                        </p>
                      </div>
                    </td>
                    <td class="hidden_data">
                      <!-- 브랜드명 --><span class="it--brand">서율이네</span>
                      <!-- 상품코드 --><span class="it--code">0101010000000104</span>
                      <!-- 카테고리 --><span class="it--cat">010101</span>
                      <!-- 상품기본설명 --><span class="it--explain">최고급 친환경 원단으로 만든 감각적인 디자인의 탑입니다.</span>
                      <!-- 상품유형 --><span class="it--goodType">일반상품</span>
                      <!-- 과세여부 --><span class="it--taxation">과세상품</span>
                      <!-- 배송소요일 --><span class="it--deliveryDates">2일</span>
                      <!-- 배송비유형 --><span class="it--deliveryFee">조건부 무료배송</span>
                      <!-- 상품유의사항 --><span class="it--goodAlert"></span>
                      <!-- 주문유의사항 --><span class="it--orderAlert"></span>
                      <!-- 배송유의사항 --><span class="it--deliveryAlert"></span>
                      <!-- 상품고시정보 --><div class="it--noticeInfo">[{"noti_field_id":1,"noti_field":"제품소재","noti_info":"Nylon6.6 87%, Elastano 13%"},{"noti_field_id":2,"noti_field":"색상","noti_info":"cream"},{"noti_field_id":3,"noti_field":"치수","noti_info":"상세 설명 참조"},{"noti_field_id":4,"noti_field":"제조자","noti_info":"PAUZE"},{"noti_field_id":5,"noti_field":"제조국","noti_info":"korea"},{"noti_field_id":6,"noti_field":"세탁방법 및 취급시 주의사항","noti_info":"상세 설명 참조"},{"noti_field_id":7,"noti_field":"제조연월","noti_info":"2021.01"},{"noti_field_id":8,"noti_field":"품질보증기준","noti_info":"상품 수령 후 7일이내 교환/환불 가능"},{"noti_field_id":9,"noti_field":"A/S 책임자와 전화번호","noti_info":"02-921-2021"}]</div>
                      <!-- 인증정보 --><span class="it--certiInfo">해당 없음/시그니처탑/Signature top in cream/PAUZE/해당 없음</span>
                      <!-- 상품가격정보 --><span class="it--priceInfo">정상가:76,000, 판매가:68,400, 마진율:19%, 공급가:55,400,</span>
                      <!-- 옵션 --><span class="it--option">[{"idx":0,"item_option_require":true,"item_option_name":"size","item_option_vals":[{"idx":0,"value":"0","price":0},{"idx":1,"value":"1","price":0},{"idx":2,"value":"2","price":0}]}](필수),[]</span>
                      <!-- 등록일 --><span class="it--enrollDate">2021-02-09 21:50:15</span>
                      <!-- 승인일자 --><span>2021-02-09 22:11:08</span>
                      <!-- 상품이미지(필수) --><span class="it--registration-main"><img src="<?= base_url(); ?>uploads/shop_image/product_104_0_thumb.jpg?id=1612876204" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지1 --><span class="it--registration1"><img src="<?= base_url(); ?>uploads/shop_image/product_104_1_thumb.jpg?id=1612876204" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지2 --><span class="it--registration2"><img src="<?= base_url(); ?>uploads/shop_image/product_104_2_thumb.jpg?id=1612876204" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지3 --><span class="it--registration3"><img src="<?= base_url(); ?>uploads/shop_image/product_104_3_thumb.jpg?id=1612876204" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지4 --><span class="it--registration4"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지5 --><span class="it--registration5"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품상세페이지 --><div class="it--registration-detail">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_104_1612875010436424.jpg" alt="" style="width: 100%; height: auto;">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="td-label chkTd">
                      <input class="chkPiece" type="checkbox" name="chkPiece">
                      <label class="chkLabel"></label>
                    </td>
                    <td>
                      <span class="td-span">제혁</span>
                    </td>
                    <td>
                      <span class="td-span">0101010000000105</span>
                    </td>
                    <td>
                      <span class="td-span">010101</span>
                    </td>
                    <td>
                                                                        <span class="td-span">
                                                                            <img class="span-img" src="<?= base_url(); ?>uploads/shop_image/product_105_0_thumb.jpg?id=1609937478" alt="" width="46" height="46">
                                                                        </span>
                    </td>
                    <td>
                      <span class="td-span">지메일</span>
                    </td>
                    <td>
                      <span class="td-span">4,200</span>
                    </td>
                    <td>
                      <span class="td-span td-status td-playing font-futura locate_home">판매중</span>
                    </td>
                    <td class="fn-td-btn clearfix">
                      <div class="td-btn-wrap">
                        <p class="td-span td-btn td-item">
                                                                                <span class="btn-ic btn--seeProfile">
                                                                                    <img src="imgs/ic_person.png" class="ic-img" width="12" height="11" alt="">
                                                                                </span>
                          아이템정보
                        </p>
                        <p class="td-span td-btn">
                                                                                <span class="btn-ic btn--modify">
                                                                                    <img src="imgs/ic_spanner.png" class="ic-img" width="13" height="13" alt="">
                                                                                </span>
                          수정
                        </p>
                        <p class="td-span td-btn td-showType">
                                                                                <span class="btn-ic btn--display">
                                                                                    <img src="imgs/ic_check.png" class="ic-img" width="9" height="auto" alt="">
                                                                                </span>
                          상태변경
                        </p>
                        <p class="td-span td-btn td-category">
                                                                                <span class="btn-ic btn--exposure">
                                                                                    <img src="imgs/ic_post.png" class="ic-img" width="8" height="8" alt="">
                                                                                </span>
                          <span class="font-futura">Shop-main</span> 추가
                        </p>
                        <p class="td-span td-btn td-category">
                                                                                <span class="btn-ic btn--exposure">
                                                                                    <img src="imgs/ic_post.png" class="ic-img" width="8" height="8" alt="">
                                                                                </span>
                          <span class="font-futura">Category-main</span> 추가
                        </p>
                      </div>
                    </td>
                    <td class="hidden_data">
                      <!-- 브랜드명 --><span class="it--brand">제혁</span>
                      <!-- 상품코드 --><span class="it--code">0101010000000105</span>
                      <!-- 카테고리 --><span class="it--cat">010101</span>
                      <!-- 상품기본설명 --><span class="it--explain">요가복 2탄이 나왔어요~</span>
                      <!-- 상품유형 --><span class="it--goodType">일반상품</span>
                      <!-- 과세여부 --><span class="it--taxation">과세상품</span>
                      <!-- 배송소요일 --><span class="it--deliveryDates">2일</span>
                      <!-- 배송비유형 --><span class="it--deliveryFee">무료배송</span>
                      <!-- 상품유의사항 --><span class="it--goodAlert"></span>
                      <!-- 주문유의사항 --><span class="it--orderAlert"></span>
                      <!-- 배송유의사항 --><span class="it--deliveryAlert"></span>
                      <!-- 상품고시정보 --><div class="it--noticeInfo">[{"noti_field_id":1,"noti_field":"제품소재","noti_info":"1"},{"noti_field_id":2,"noti_field":"색상","noti_info":"1"},{"noti_field_id":3,"noti_field":"치수","noti_info":"1"},{"noti_field_id":4,"noti_field":"제조자","noti_info":"1"},{"noti_field_id":5,"noti_field":"제조국","noti_info":"1"},{"noti_field_id":6,"noti_field":"세탁방법 및 취급시 주의사항","noti_info":"1"},{"noti_field_id":7,"noti_field":"제조연월","noti_info":"1"},{"noti_field_id":8,"noti_field":"품질보증기준","noti_info":"1"},{"noti_field_id":9,"noti_field":"A/S 책임자와 전화번호","noti_info":"1"}]</div>
                      <!-- 인증정보 --><span class="it--certiInfo">1/1/1/1/1</span>
                      <!-- 상품가격정보 --><span class="it--priceInfo">정상가:5,000, 판매가:4,200, 마진율:18%, 공급가:3,400,</span>
                      <!-- 옵션 --><span class="it--option">[](필수),[]</span>
                      <!-- 등록일 --><span class="it--enrollDate">2021-01-06 21:51:18</span>
                      <!-- 승인일자 --><span>2021-01-06 21:51:48</span>
                      <!-- 상품이미지(필수) --><span class="it--registration-main"><img src="<?= base_url(); ?>uploads/shop_image/product_105_0_thumb.jpg?id=1609937478" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지1 --><span class="it--registration1"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지2 --><span class="it--registration2"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지3 --><span class="it--registration3"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지4 --><span class="it--registration4"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지5 --><span class="it--registration5"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품상세페이지 --><div class="it--registration-detail">
                        <p>ㅅㄷㄴㅅ</p>
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
