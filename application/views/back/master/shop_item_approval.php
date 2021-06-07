<h3 class="meaning">상품 승인</h3>
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
                      <span class="td-span">0101020000000070</span>
                    </td>
                    <td>
                      <span class="td-span">010102</span>
                    </td>
                    <td>
                                                                        <span class="td-span">
                                                                            <img class="span-img" src="<?= base_url(); ?>uploads/shop_image/product_70_0_thumb.jpg?id=1604496016?random=1611627788299" alt="" width="46" height="46">
                                                                        </span>
                    </td>
                    <td>
                      <span class="td-span">요가복 2탄</span>
                    </td>
                    <td>
                      <span class="td-span">120,000</span>
                    </td>
                    <td>
                      <span class="td-span td-status td-playing font-futura td-rejected">반려</span>
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
                      <!-- 상품코드 --><span class="it--code">0101020000000070</span>
                      <!-- 카테고리 --><span class="it--cat">010102</span>
                      <!-- 상품기본설명 --><span class="it--explain">요가복 2탄이 나왔어요</span>
                      <!-- 상품유형 --><span class="it--goodType">일반상품</span>
                      <!-- 과세여부 --><span class="it--taxation">과세상품</span>
                      <!-- 배송소요일 --><span class="it--deliveryDates">2일</span>
                      <!-- 배송비유형 --><span class="it--deliveryFee">조건부 무료배송</span>
                      <!-- 상품유의사항 --><span class="it--goodAlert"></span>
                      <!-- 주문유의사항 --><span class="it--orderAlert"></span>
                      <!-- 배송유의사항 --><span class="it--deliveryAlert"></span>
                      <!-- 상품고시정보 --><div class="it--noticeInfo">[{"noti_field_id":1,"noti_field":"제품소재","noti_info":"ㅇㅁㅁ"},{"noti_field_id":2,"noti_field":"색상","noti_info":"ㅁㅇㄹ"},{"noti_field_id":3,"noti_field":"치수","noti_info":"ㅁㅇㄹ"},{"noti_field_id":4,"noti_field":"제조자","noti_info":"ㅁㅇㄹㅁㄴㄹㄴㅇㄹ"},{"noti_field_id":5,"noti_field":"제조국","noti_info":"ㅁㅇㄴㄹㄴㅁ"},{"noti_field_id":6,"noti_field":"세탁방법 및 취급시 주의사항","noti_info":"ㅁㄴㅇㄹㄴㅁ"},{"noti_field_id":7,"noti_field":"제조연월","noti_info":"ㅁㅇㄹ"},{"noti_field_id":8,"noti_field":"품질보증기준","noti_info":"ㅁㄴㅇㄹ"},{"noti_field_id":9,"noti_field":"A/S 책임자와 전화번호","noti_info":"ㅁㅇㄹ"}]</div>
                      <!-- 인증정보 --><span class="it--certiInfo">1/1/1/1/1</span>
                      <!-- 상품가격정보 --><span class="it--priceInfo">정상가:120,000, 판매가:120,000, 마진율:20%, 공급가:96,000,</span>
                      <!-- 옵션 --><span class="it--option">[](필수),[]</span>
                      <!-- 등록일 --><span class="it--enrollDate">2020-07-05 18:43:03</span>
                      <!-- 승인일자 --><span class="it--approveDate">2020-11-05 20:31:15</span>
                      <!-- 상품이미지(필수) --><span class="it--registration-main"><img src="<?= base_url(); ?>uploads/shop_image/product_70_0_thumb.jpg?id=1604496016" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지1 --><span class="it--registration1"><img src="<?= base_url(); ?>uploads/shop_image/product_70_1_thumb.jpg?id=1604496016" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지2 --><span class="it--registration2"><img src="<?= base_url(); ?>uploads/shop_image/product_70_2_thumb.jpg?id=1604496016" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지3 --><span class="it--registration3"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지4 --><span class="it--registration4"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지5 --><span class="it--registration5"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품상세페이지 --><div class="it--registration-detail"><img src="<?= base_url(); ?>uploads/shop_image/product_info_70_1593942244518828.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_70_1593942244523296.jpg" alt="" style="width: 100%; height: auto;">
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
                      <span class="td-span">0102010000000071</span>
                    </td>
                    <td>
                      <span class="td-span">010201</span>
                    </td>
                    <td>
                                                                        <span class="td-span">
                                                                            <img class="span-img" src="<?= base_url(); ?>uploads/shop_image/product_71_0_thumb.jpg?id=1604495939?random=1611627788299" alt="" width="46" height="46">
                                                                        </span>
                    </td>
                    <td>
                      <span class="td-span">요가 매트가 나와써용! test</span>
                    </td>
                    <td>
                      <span class="td-span">22,000</span>
                    </td>
                    <td>
                      <span class="td-span td-status td-playing font-futura td-rejected">반려</span>
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
                      <!-- 상품코드 --><span class="it--code">0102010000000071</span>
                      <!-- 카테고리 --><span class="it--cat">010201</span>
                      <!-- 상품기본설명 --><span class="it--explain">후회하지 않으실 요가매트</span>
                      <!-- 상품유형 --><span class="it--goodType">일반상품</span>
                      <!-- 과세여부 --><span class="it--taxation">과세상품</span>
                      <!-- 배송소요일 --><span class="it--deliveryDates">2일</span>
                      <!-- 배송비유형 --><span class="it--deliveryFee">조건부 무료배송</span>
                      <!-- 상품유의사항 --><span class="it--goodAlert">주의요함!!</span>
                      <!-- 주문유의사항 --><span class="it--orderAlert">배송이 좀 늦어질 수 있어요!!</span>
                      <!-- 배송유의사항 --><span class="it--deliveryAlert">직배송 가능</span>
                      <!-- 상품고시정보 --><div class="it--noticeInfo">[{"noti_field_id":48,"noti_field":"품명 및 모델명","noti_info":"1"},{"noti_field_id":49,"noti_field":"크기, 중량","noti_info":"2"},{"noti_field_id":50,"noti_field":"색상","noti_info":"3"},{"noti_field_id":51,"noti_field":"재질","noti_info":"4"},{"noti_field_id":52,"noti_field":"제품 구성","noti_info":"5"},{"noti_field_id":53,"noti_field":"동일모델의 출시년월","noti_info":"6"},{"noti_field_id":54,"noti_field":"제조자(수입자)","noti_info":"7"},{"noti_field_id":55,"noti_field":"제조국","noti_info":"8"},{"noti_field_id":56,"noti_field":"상품별 세부사양","noti_info":"9"},{"noti_field_id":57,"noti_field":"품질보증기준","noti_info":"10"},{"noti_field_id":58,"noti_field":"A/S 책임자와 전화번호","noti_info":"11"}]</div>
                      <!-- 인증정보 --><span class="it--certiInfo">3/3/3/3/3</span>
                      <!-- 상품가격정보 --><span class="it--priceInfo">정상가:22,050, 판매가:22,000, 마진율:20%, 공급가:17,600,</span>
                      <!-- 옵션 --><span class="it--option">[](필수),[]</span>
                      <!-- 등록일 --><span class="it--enrollDate">2020-07-05 18:48:22</span>
                      <!-- 승인일자 --><span class="it--approveDate">2020-11-05 20:31:28</span>
                      <!-- 상품이미지(필수) --><span class="it--registration-main"><img src="<?= base_url(); ?>uploads/shop_image/product_71_0_thumb.jpg?id=1604495939" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지1 --><span class="it--registration1"><img src="<?= base_url(); ?>uploads/shop_image/product_71_1_thumb.jpg?id=1604495939" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지2 --><span class="it--registration2"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지3 --><span class="it--registration3"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지4 --><span class="it--registration4"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지5 --><span class="it--registration5"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품상세페이지 --><div class="it--registration-detail">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_71_1593942646123794.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_71_1593942646174331.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_71_1593942646522869.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_71_1593942646530953.jpg" alt="" style="width: 100%; height: auto;">
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
                      <span class="td-span">0103010000000072</span>
                    </td>
                    <td>
                      <span class="td-span">010301</span>
                    </td>
                    <td>
                                                                        <span class="td-span">
                                                                            <img class="span-img" src="<?= base_url(); ?>uploads/shop_image/product_72_0_thumb.jpg?id=1593943203?random=1611627788299" alt="" width="46" height="46">
                                                                        </span>
                    </td>
                    <td>
                      <span class="td-span">요가 스킨 케어</span>
                    </td>
                    <td>
                      <span class="td-span">10,000</span>
                    </td>
                    <td>
                      <span class="td-span td-status td-playing font-futura td-rejected">반려</span>
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
                      <!-- 상품코드 --><span class="it--code">0103010000000072</span>
                      <!-- 카테고리 --><span class="it--cat">010301</span>
                      <!-- 상품기본설명 --><span class="it--explain">당신의 피부는 소중하니깐요!!</span>
                      <!-- 상품유형 --><span class="it--goodType">일반상품</span>
                      <!-- 과세여부 --><span class="it--taxation">과세상품</span>
                      <!-- 배송소요일 --><span class="it--deliveryDates">2일</span>
                      <!-- 배송비유형 --><span class="it--deliveryFee">조건부 무료배송</span>
                      <!-- 상품유의사항 --><span class="it--goodAlert"></span>
                      <!-- 주문유의사항 --><span class="it--orderAlert"></span>
                      <!-- 배송유의사항 --><span class="it--deliveryAlert"></span>
                      <!-- 상품고시정보 --><div class="it--noticeInfo">-품명 및 모델명
                        -법에의한 인증.허가 등을 받았음을 확인할 수 있는 경우 그에 대한 사항 (해당없음)
                        -제조국 또는 원산지
                        -제조사 (수입품의 경우 수입자를 >함께 표기)
                        -A/S 책임자와 전화번호</div>
                      <!-- 인증정보 --><span class="it--certiInfo">1/1/1/1/1</span>
                      <!-- 상품가격정보 --><span class="it--priceInfo">정상가:10,000, 판매가:10,000, 마진율:20%, 공급가:8,000,</span>
                      <!-- 옵션 --><span class="it--option">[](필수),[]</span>
                      <!-- 등록일 --><span class="it--enrollDate">2020-07-05 18:57:07</span>
                      <!-- 승인일자 --><span class="it--approveDate">2020-11-05 20:31:41</span>
                      <!-- 상품이미지(필수) --><span class="it--registration-main"><img src="<?= base_url(); ?>uploads/shop_image/product_72_0_thumb.jpg?id=1593943203" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지1 --><span class="it--registration1"><img src="<?= base_url(); ?>uploads/shop_image/product_72_1_thumb.jpg?id=1593943203" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지2 --><span class="it--registration2"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지3 --><span class="it--registration3"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지4 --><span class="it--registration4"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지5 --><span class="it--registration5"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품상세페이지 --><div class="it--registration-detail">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_72_159394317219079.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_72_159394317214308.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_72_159394317235513.jpg" alt="" style="width: 100%; height: auto;">
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
                      <span class="td-span">0101010000000073</span>
                    </td>
                    <td>
                      <span class="td-span">010101</span>
                    </td>
                    <td>
                                                                        <span class="td-span">
                                                                            <img class="span-img" src="<?= base_url(); ?>uploads/shop_image/product_73_0_thumb.jpg?id=1593967851?random=1611627788299" alt="" width="46" height="46">
                                                                        </span>
                    </td>
                    <td>
                      <span class="td-span">(신상품)요가복</span>
                    </td>
                    <td>
                      <span class="td-span">10,000</span>
                    </td>
                    <td>
                      <span class="td-span td-status td-playing font-futura td-rejected">반려</span>
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
                      <!-- 상품코드 --><span class="it--code">0101010000000073</span>
                      <!-- 카테고리 --><span class="it--cat">010101</span>
                      <!-- 상품기본설명 --><span class="it--explain">(신상품)파이브앤다임 요가복이 왔어요~</span>
                      <!-- 상품유형 --><span class="it--goodType">일반상품</span>
                      <!-- 과세여부 --><span class="it--taxation">과세상품</span>
                      <!-- 배송소요일 --><span class="it--deliveryDates">2일</span>
                      <!-- 배송비유형 --><span class="it--deliveryFee">조건부 무료배송</span>
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
                      <!-- 인증정보 --><span class="it--certiInfo">1/1/1/1/1</span>
                      <!-- 상품가격정보 --><span class="it--priceInfo">정상가:10,000, 판매가:10,000, 마진율:20%, 공급가:8,000,</span>
                      <!-- 옵션 --><span class="it--option">[](필수),[]</span>
                      <!-- 등록일 --><span class="it--enrollDate">2020-07-06 00:49:36</span>
                      <!-- 승인일자 --><span class="it--approveDate">2020-11-05 20:31:47</span>
                      <!-- 상품이미지(필수) --><span class="it--registration-main"><img src="<?= base_url(); ?>uploads/shop_image/product_73_0_thumb.jpg?id=1593967851" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지1 --><span class="it--registration1"><img src="<?= base_url(); ?>uploads/shop_image/product_73_1_thumb.jpg?id=1593967851" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지2 --><span class="it--registration2"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지3 --><span class="it--registration3"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지4 --><span class="it--registration4"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지5 --><span class="it--registration5"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품상세페이지 --><div class="it--registration-detail">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_73_1593967846738144.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_73_1593967846693100.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_73_1593967846674019.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_73_1593967846788208.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_73_1593967846791707.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_73_1593967846812328.jpg" alt="" style="width: 100%; height: auto;">
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
                      <span class="td-span">0102010000000089</span>
                    </td>
                    <td>
                      <span class="td-span">010201</span>
                    </td>
                    <td>
                                                                        <span class="td-span">
                                                                            <img class="span-img" src="<?= base_url(); ?>uploads/shop_image/product_89_0_thumb.jpg?id=1594353616?random=1611627788299" alt="" width="46" height="46">
                                                                        </span>
                    </td>
                    <td>
                      <span class="td-span">More than Blush</span>
                    </td>
                    <td>
                      <span class="td-span">169,000</span>
                    </td>
                    <td>
                      <span class="td-span td-status td-playing font-futura td-rejected">반려</span>
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
                      <!-- 상품코드 --><span class="it--code">0102010000000089</span>
                      <!-- 카테고리 --><span class="it--cat">010201</span>
                      <!-- 상품기본설명 --><span class="it--explain">바르셀로나에서 온 비건스웨이드 요가매트</span>
                      <!-- 상품유형 --><span class="it--goodType">일반상품</span>
                      <!-- 과세여부 --><span class="it--taxation">과세상품</span>
                      <!-- 배송소요일 --><span class="it--deliveryDates">2일</span>
                      <!-- 배송비유형 --><span class="it--deliveryFee">무료배송</span>
                      <!-- 상품유의사항 --><span class="it--goodAlert"></span>
                      <!-- 주문유의사항 --><span class="it--orderAlert"></span>
                      <!-- 배송유의사항 --><span class="it--deliveryAlert"></span>
                      <!-- 상품고시정보 --><div class="it--noticeInfo">-품명 및 모델명 : 비건스웨이드 요가매트
                        -크기, 중량 : 66*188cm / 2kg
                        -색상 : more than blush
                        -재질 : vegan suede, natural rubber
                        -제품 구성 : 요가매트+스트랩
                        -동일모델의 출시년월 : 2018.12
                        -제조자(수입자) : 레클레스레드옴
                        -제조국 : 중국OEM
                        -상품별 세부 사양 : 상세페이지 참고
                        -품질보증기준(>품질보증기간 및 수리/교환/반품 등의 보상방법 정보) : 관련법 분쟁해결 기준에 준함
                        -A/S 책임자와 전화번호 : 07086568895 파이브앤다임</div>
                      <!-- 인증정보 --><span class="it--certiInfo">해당없음/비건스웨이드 요가매트/More than blush/레클레스레드옴/파이브앤다임</span>
                      <!-- 상품가격정보 --><span class="it--priceInfo">정상가:169,000, 판매가:169,000, 마진율:20%, 공급가:135,200,</span>
                      <!-- 옵션 --><span class="it--option">[](필수),[]</span>
                      <!-- 등록일 --><span class="it--enrollDate">2020-07-08 21:23:30</span>
                      <!-- 승인일자 --><span class="it--approveDate">2020-07-10 13:01:15</span>
                      <!-- 상품이미지(필수) --><span class="it--registration-main"><img src="<?= base_url(); ?>uploads/shop_image/product_89_0_thumb.jpg?id=1594353616" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지1 --><span class="it--registration1"><img src="<?= base_url(); ?>uploads/shop_image/product_89_1_thumb.jpg?id=1594353616" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지2 --><span class="it--registration2"><img src="<?= base_url(); ?>uploads/shop_image/product_89_2_thumb.jpg?id=1594353616" alt="" style="width: 100%; height: auto;"></span>
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
                      <span class="td-span"> </span>
                    </td>
                    <td>
                      <span class="td-span">010101</span>
                    </td>
                    <td>
                                                                        <span class="td-span">
                                                                            <img class="span-img" src="<?= base_url(); ?>uploads/shop_image/product_95_0_thumb.jpg?id=1596984220?random=1611627788299" alt="" width="46" height="46">
                                                                        </span>
                    </td>
                    <td>
                      <span class="td-span">요가배경</span>
                    </td>
                    <td>
                      <span class="td-span">900</span>
                    </td>
                    <td>
                      <span class="td-span td-status td-playing font-futura td-rejected">반려</span>
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
                      <!-- 상품코드 --><span class="it--code">0101010000000095</span>
                      <!-- 카테고리 --><span class="it--cat">010101</span>
                      <!-- 상품기본설명 --><span class="it--explain">요가배경</span>
                      <!-- 상품유형 --><span class="it--goodType">일반상품</span>
                      <!-- 과세여부 --><span class="it--taxation">과세상품</span>
                      <!-- 배송소요일 --><span class="it--deliveryDates">2일</span>
                      <!-- 배송비유형 --><span class="it--deliveryFee">조건부 무료배송</span>
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
                      <!-- 인증정보 --><span class="it--certiInfo">2/2/2/2/2</span>
                      <!-- 상품가격정보 --><span class="it--priceInfo">정상가:1,000, 판매가:900, 마진율:20%, 공급가:700,</span>
                      <!-- 옵션 --><span class="it--option">[{"idx":0,"item_option_require":true,"item_option_name":"사이즈","item_option_vals":[{"idx":0,"value":"스몰","price":0},{"idx":1,"value":"미디움","price":0},{"idx":2,"value":"라지","price":0}]}](필수),[{"idx":0,"item_option_require":false,"item_option_name":"추가옵션","item_option_vals":[{"idx":0,"value":"요가상품","price":"1000"}]}]</span>
                      <!-- 등록일 --><span class="it--enrollDate">2020-08-09 23:07:39</span>
                      <!-- 승인일자 --><span class="it--approveDate">2020-11-05 20:32:15</span>
                      <!-- 상품이미지(필수) --><span class="it--registration-main"><img src="<?= base_url(); ?>uploads/shop_image/product_95_0_thumb.jpg?id=1596984220" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지1 --><span class="it--registration1"><img src="<?= base_url(); ?>uploads/shop_image/product_95_1_thumb.jpg?id=1596984221" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지2 --><span class="it--registration2"><img src="<?= base_url(); ?>uploads/shop_image/product_95_2_thumb.jpg?id=1596984221" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지3 --><span class="it--registration3"><img src="<?= base_url(); ?>uploads/shop_image/product_95_3_thumb.jpg?id=1596984221" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지4 --><span class="it--registration4"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지5 --><span class="it--registration5"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품상세페이지 --><div class="it--registration-detail">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_95_1596982137247000.jpg" alt="" style="width: 100%; height: auto;">
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
                      <span class="td-span">0101010000000096</span>
                    </td>
                    <td>
                      <span class="td-span">010101</span>
                    </td>
                    <td>
                                                                        <span class="td-span">
                                                                            <img class="span-img" src="<?= base_url(); ?>uploads/shop_image/product_95_0_thumb.jpg?id=1596984220?random=1611627788299" alt="" width="46" height="46">
                                                                        </span>
                    </td>
                    <td>
                      <span class="td-span">ㄹㅇㅎㅇ</span>
                    </td>
                    <td>
                      <span class="td-span">1,000</span>
                    </td>
                    <td>
                      <span class="td-span td-status td-playing font-futura td-rejected">반려</span>
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
                      <!-- 상품코드 --><span class="it--code">0101010000000096</span>
                      <!-- 카테고리 --><span class="it--cat">010101</span>
                      <!-- 상품기본설명 --><span class="it--explain">ㄴㅇㅀㄹㅇㅎ</span>
                      <!-- 상품유형 --><span class="it--goodType">일반상품</span>
                      <!-- 과세여부 --><span class="it--taxation">과세상품</span>
                      <!-- 배송소요일 --><span class="it--deliveryDates">2일</span>
                      <!-- 배송비유형 --><span class="it--deliveryFee">조건부 무료배송</span>
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
                      <!-- 인증정보 --><span class="it--certiInfo">1/1/1/1/1</span>
                      <!-- 상품가격정보 --><span class="it--priceInfo">정상가:1,000, 판매가:1,000, 마진율:20%, 공급가:800,</span>
                      <!-- 옵션 --><span class="it--option">[](필수),[]</span>
                      <!-- 등록일 --><span class="it--enrollDate">2020-08-28 04:48:46</span>
                      <!-- 승인일자 --><span class="it--approveDate">2020-11-05 20:32:18</span>
                      <!-- 상품이미지(필수) --><span class="it--registration-main"><img src="<?= base_url(); ?>uploads/shop_image/product_96_0_thumb.jpg?id=1598557726" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지1 --><span class="it--registration1"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지2 --><span class="it--registration2"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지3 --><span class="it--registration3"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지4 --><span class="it--registration4"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지5 --><span class="it--registration5"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품상세페이지 --><div class="it--registration-detail">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_96_1598557720684233.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_96_1598557720914278.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_96_15985577215215.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_96_159855772173300.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_96_1598557721101123.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_96_1598557721290950.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_96_1598557721309915.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_96_1598557721451157.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_96_1598557721469532.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_96_1598557721503643.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_96_1598557721620124.jpg" alt="" style="width: 100%; height: auto;">
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
                      <span class="td-span">0101010000000098</span>
                    </td>
                    <td>
                      <span class="td-span">010101</span>
                    </td>
                    <td>
                                                                        <span class="td-span">
                                                                            <img class="span-img" src="<?= base_url(); ?>uploads/shop_image/product_98_0_thumb.jpg?id=1604410949?random=1611627788299" alt="" width="46" height="46">
                                                                        </span>
                    </td>
                    <td>
                      <span class="td-span">Yoga TOP 3rd Edition</span>
                    </td>
                    <td>
                      <span class="td-span">9,500</span>
                    </td>
                    <td>
                      <span class="td-span td-status td-playing font-futura td-rejected">반려</span>
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
                      <!-- 상품코드 --><span class="it--code">0101010000000098</span>
                      <!-- 카테고리 --><span class="it--cat">010101</span>
                      <!-- 상품기본설명 --><span class="it--explain">Yoga TOP 3rd Edition</span>
                      <!-- 상품유형 --><span class="it--goodType">일반상품</span>
                      <!-- 과세여부 --><span class="it--taxation">과세상품</span>
                      <!-- 배송소요일 --><span class="it--deliveryDates">2일</span>
                      <!-- 배송비유형 --><span class="it--deliveryFee">조건부 무료배송</span>
                      <!-- 상품유의사항 --><span class="it--goodAlert"></span>
                      <!-- 주문유의사항 --><span class="it--orderAlert"></span>
                      <!-- 배송유의사항 --><span class="it--deliveryAlert"></span>
                      <!-- 상품고시정보 --><div class="it--noticeInfo">- 제품소재
                        면
                        - 색상
                        블랙
                        - 치수
                        100
                        - 제조자
                        파운디
                        - 제조국
                        한국
                        - 세탁방법 및 취급시 주의사항
                        잘
                        - 제조연월
                        2020.10.10
                        - 품질보증기준
                        마ㅓㅇㄹ
                        - A/S 책임자와 전화번호
                        01045644126</div>
                      <!-- 인증정보 --><span class="it--certiInfo">1/1/1/1/1</span>
                      <!-- 상품가격정보 --><span class="it--priceInfo">정상가:10,000, 판매가:9,500, 마진율:20%, 공급가:7,600,</span>
                      <!-- 옵션 --><span class="it--option">[](필수),[]</span>
                      <!-- 등록일 --><span class="it--enrollDate">2020-11-03 22:42:29</span>
                      <!-- 승인일자 --><span class="it--approveDate">2020-11-05 20:35:20</span>
                      <!-- 상품이미지(필수) --><span class="it--registration-main"><img src="<?= base_url(); ?>uploads/shop_image/product_98_0_thumb.jpg?id=1604410949" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지1 --><span class="it--registration1"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지2 --><span class="it--registration2"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지3 --><span class="it--registration3"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지4 --><span class="it--registration4"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지5 --><span class="it--registration5"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품상세페이지 --><div class="it--registration-detail">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_98_1604410945407380.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_98_1604410945410876.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_98_1604410945414161.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_98_1604410945417875.jpg" alt="" style="width: 100%; height: auto;">
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
                      <span class="td-span">0103010000000099</span>
                    </td>
                    <td>
                      <span class="td-span">010301</span>
                    </td>
                    <td>
                                                                        <span class="td-span">
                                                                            <img class="span-img" src="<?= base_url(); ?>uploads/shop_image/product_98_0_thumb.jpg?id=1604410949?random=1611627788299" alt="" width="46" height="46">
                                                                        </span>
                    </td>
                    <td>
                      <span class="td-span">ㄹ</span>
                    </td>
                    <td>
                      <span class="td-span">10,500</span>
                    </td>
                    <td>
                      <span class="td-span td-status td-playing font-futura td-rejected">반려</span>
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
                      <!-- 상품코드 --><span class="it--code">0103010000000099</span>
                      <!-- 카테고리 --><span class="it--cat">010301</span>
                      <!-- 상품기본설명 --><span class="it--explain">ㅁㅇㄹㄹ</span>
                      <!-- 상품유형 --><span class="it--goodType">일반상품</span>
                      <!-- 과세여부 --><span class="it--taxation">과세상품</span>
                      <!-- 배송소요일 --><span class="it--deliveryDates">2일</span>
                      <!-- 배송비유형 --><span class="it--deliveryFee">조건부 무료배송</span>
                      <!-- 상품유의사항 --><span class="it--goodAlert"></span>
                      <!-- 주문유의사항 --><span class="it--orderAlert"></span>
                      <!-- 배송유의사항 --><span class="it--deliveryAlert"></span>
                      <!-- 상품고시정보 --><div class="it--noticeInfo">- 품명 및 모델명
                        1
                        - 법에의한 인증.허가 등을 받았음을 확인할 수 있는 경우 그에대한 사항
                        2
                        - 제조국 또는 원산지
                        3
                        - 제조사
                        4
                        - A/S 책임자와 전화번호
                        5</div>
                      <!-- 인증정보 --><span class="it--certiInfo">1/1/1/1/1</span>
                      <!-- 상품가격정보 --><span class="it--priceInfo">정상가:11,111, 판매가:10,500, 마진율:20%, 공급가:8,400,</span>
                      <!-- 옵션 --><span class="it--option">[](필수),[]</span>
                      <!-- 등록일 --><span class="it--enrollDate">2020-11-03 22:46:28</span>
                      <!-- 승인일자 --><span class="it--approveDate">2020-11-05 20:35:32</span>
                      <!-- 상품이미지(필수) --><span class="it--registration-main"><img src="<?= base_url(); ?>uploads/shop_image/product_99_0_thumb.jpg?id=1604411188" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지1 --><span class="it--registration1"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지2 --><span class="it--registration2"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지3 --><span class="it--registration3"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지4 --><span class="it--registration4"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지5 --><span class="it--registration5"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품상세페이지 --><div class="it--registration-detail">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_99_1604411186981249.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_99_1604411186985269.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_99_1604411186988666.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_99_1604411186992256.jpg" alt="" style="width: 100%; height: auto;">
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
                      <span class="td-span">0101010000000100</span>
                    </td>
                    <td>
                      <span class="td-span">010101</span>
                    </td>
                    <td>
                                                                        <span class="td-span">
                                                                            <img class="span-img" src="<?= base_url(); ?>uploads/shop_image/product_98_0_thumb.jpg?id=1604410949?random=1611627788299" alt="" width="46" height="46">
                                                                        </span>
                    </td>
                    <td>
                      <span class="td-span">요가복 3탄</span>
                    </td>
                    <td>
                      <span class="td-span">8,500</span>
                    </td>
                    <td>
                      <span class="td-span td-status td-playing font-futura td-rejected">반려</span>
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
                        <p class="td-span td-btn">
                                                                                <span class="btn-ic btn--exposure">
                                                                                    <img src="imgs/ic_post.png" class="ic-img" width="8" height="8" alt="">
                                                                                </span>
                          <span class="font-futura">Shop-main</span> 추가
                        </p>
                        <p class="td-span td-btn">
                                                                                <span class="btn-ic btn--exposure">
                                                                                    <img src="imgs/ic_post.png" class="ic-img" width="8" height="8" alt="">
                                                                                </span>
                          <span class="font-futura">Category-main</span> 추가
                        </p>
                      </div>
                    </td>
                    <td class="hidden_data">
                      <!-- 브랜드명 --><span class="it--brand">서율이네</span>
                      <!-- 상품코드 --><span class="it--code">0101010000000100</span>
                      <!-- 카테고리 --><span class="it--cat">010101</span>
                      <!-- 상품기본설명 --><span class="it--explain">요가복 3탄이 나왔어요~</span>
                      <!-- 상품유형 --><span class="it--goodType">일반상품</span>
                      <!-- 과세여부 --><span class="it--taxation">과세상품</span>
                      <!-- 배송소요일 --><span class="it--deliveryDates">2일</span>
                      <!-- 배송비유형 --><span class="it--deliveryFee">조건부 무료배송</span>
                      <!-- 상품유의사항 --><span class="it--goodAlert"></span>
                      <!-- 주문유의사항 --><span class="it--orderAlert"></span>
                      <!-- 배송유의사항 --><span class="it--deliveryAlert"></span>
                      <!-- 상품고시정보 --><div class="it--noticeInfo">[{"noti_field_id":1,"noti_field":"제품소재","noti_info":"1"},{"noti_field_id":2,"noti_field":"색상","noti_info":"2"},{"noti_field_id":3,"noti_field":"치수","noti_info":"3"},{"noti_field_id":4,"noti_field":"제조자","noti_info":"4"},{"noti_field_id":5,"noti_field":"제조국","noti_info":"5"},{"noti_field_id":6,"noti_field":"세탁방법 및 취급시 주의사항","noti_info":"6"},{"noti_field_id":7,"noti_field":"제조연월","noti_info":"7"},{"noti_field_id":8,"noti_field":"품질보증기준","noti_info":"8"},{"noti_field_id":9,"noti_field":"A/S 책임자와 전화번호","noti_info":"9"}]</div>
                      <!-- 인증정보 --><span class="it--certiInfo">1/1/1/1/1</span>
                      <!-- 상품가격정보 --><span class="it--priceInfo">정상가:10,000, 판매가:8,500, 마진율:18%, 공급가:6,900,</span>
                      <!-- 옵션 --><span class="it--option">[](필수),[]</span>
                      <!-- 등록일 --><span class="it--enrollDate">2020-11-04 21:20:05</span>
                      <!-- 승인일자 --><span class="it--approveDate">2020-11-05 20:35:38</span>
                      <!-- 상품이미지(필수) --><span class="it--registration-main"><img src="<?= base_url(); ?>uploads/shop_image/product_100_0_thumb.jpg?id=1604492405" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지1 --><span class="it--registration1"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지2 --><span class="it--registration2"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지3 --><span class="it--registration3"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지4 --><span class="it--registration4"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지5 --><span class="it--registration5"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품상세페이지 --><div class="it--registration-detail">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_100_1604492039413834.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_100_1604492039417120.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_100_1604492039420284.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_100_1604492039423410.jpg" alt="" style="width: 100%; height: auto;">
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
                      <span class="td-span">0202010000000101</span>
                    </td>
                    <td>
                      <span class="td-span">020201</span>
                    </td>
                    <td>
                                                                        <span class="td-span">
                                                                            <img class="span-img" src="<?= base_url(); ?>uploads/shop_image/product_101_0_thumb.jpg?id=1604492548" alt="" width="46" height="46">
                                                                        </span>
                    </td>
                    <td>
                      <span class="td-span">샐러드 간편식</span>
                    </td>
                    <td>
                      <span class="td-span">12,000</span>
                    </td>
                    <td>
                      <span class="td-span td-status td-playing font-futura td-rejected">반려</span>
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
                      <!-- 상품코드 --><span class="it--code">0202010000000101</span>
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
                      <!-- 인증정보 --><span class="it--certiInfo">1/1/1/1/1</span>
                      <!-- 상품가격정보 --><span class="it--priceInfo">정상가:15,000, 판매가:12,000, 마진율:17%, 공급가:9,900,</span>
                      <!-- 옵션 --><span class="it--option">[](필수),[]</span>
                      <!-- 등록일 --><span class="it--enrollDate">2020-11-04 21:22:28</span>
                      <!-- 승인일자 --><span class="it--approveDate">2020-11-05 20:35:43</span>
                      <!-- 상품이미지(필수) --><span class="it--registration-main"><img src="<?= base_url(); ?>uploads/shop_image/product_101_0_thumb.jpg?id=1604492548" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지1 --><span class="it--registration1"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지2 --><span class="it--registration2"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지3 --><span class="it--registration3"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지4 --><span class="it--registration4"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품이미지5 --><span class="it--registration5"><img src="" alt="" style="width: 100%; height: auto;"></span>
                      <!-- 상품상세페이지 --><div class="it--registration-detail">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_101_1604492547149991.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_101_1604492547153621.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_101_1604492547157102.jpg" alt="" style="width: 100%; height: auto;">
                        <img src="<?= base_url(); ?>uploads/shop_image/product_info_101_1604492547160958.jpg" alt="" style="width: 100%; height: auto;">
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
