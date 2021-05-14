<section class="boxwrap main">
  <h2 class="boxwrap__type meaning">홈 대시보드</h2>
  <section class="boxwrap__info home__info scroll-y clearfix">
    <h2 class="home--tit font-futura">Dashboard</h2>
    <div class="home--info">
      <div class="info_namebox clearfix">
        <article class="info_name info:user">
          <h3 class="meaning">유저 현황</h3>
          <div class="user_area">
            <div class="area_box area:all">
              <p class="box_tit">유저 현황</p>
              <ul class="box_cnt clearfix">
                <li class="cnt_li">
                  <div class="li-tit">
                    <p class="tit-compo">현재 접속자(1hour)</p>
                  </div>
                  <p class="li-no"><?= $user1; ?></p>
                </li>
                <li class="cnt_li">
                  <div class="li-tit">
                    <p class="tit-compo">일일 접속자</p>
                  </div>
                  <p class="li-no"><?= $user2; ?></p>
                </li>
                <li class="cnt_li">
                  <div class="li-tit">
                    <p class="tit-compo">이달 접속자</p>
                  </div>
                  <p class="li-no"><?= $user3; ?></p>
                </li>
              </ul>
            </div>
            <div class="area_box area:all">
              <p class="box_tit">온라인클래스 예약 현황</p>
              <ul class="box_cnt clearfix">
                <li class="cnt_li">
                  <div class="li-tit">
                    <p class="tit-compo">당일 예약 신청 현황</p>
                  </div>
                  <p class="li-no"><?= $online_reserve1; ?></p>
                </li>
                <li class="cnt_li">
                  <div class="li-tit">
                    <p class="tit-compo">당일 예약 확정 현황</p>
                  </div>
                  <p class="li-no"><?= $online_reserve2; ?></p>
                </li>
                <li class="cnt_li">
                  <div class="li-tit">
                    <p class="tit-compo">당월 누적 신청 현황</p>
                  </div>
                  <p class="li-no"><?= $online_reserve3; ?></p>
                </li>
              </ul>
            </div>
            <!-- <div class="area_box area:admin">
                <div class="box-user-bg">
                    <ul class="box-user user_detail clearfix">
                        <li class="assemble">당일 누적</li>
                        <li class="assemble">당월 누적</li>
                        <li class="assemble">전월 누적</li>
                    </ul>
                </div>
                <div class="box-vals vals_detail">
                    <ul class="box_cnt named_cnt clearfix">
                        <li class="cnt_li">
                            <p class="li-tit">센터 가입수</p>
                            <p class="li-no">00</p>
                        </li>
                        <li class="cnt_li">
                            <p class="li-tit">센터 가입수</p>
                            <p class="li-no">00</p>
                        </li>
                        <li class="cnt_li">
                            <p class="li-tit">센터 가입수</p>
                            <p class="li-no">00</p>
                        </li>
                    </ul>
                    <ul class="box_cnt clearfix" style="padding-bottom: 40px;">
                        <li class="cnt_li">
                            <p class="li-tit onlineTit">온라인스튜디오 가입수</p>
                            <p class="li-no">00</p>
                        </li>
                        <li class="cnt_li">
                            <p class="li-tit onlineTit">온라인스튜디오 가입수</p>
                            <p class="li-no">00</p>
                        </li>
                        <li class="cnt_li">
                            <p class="li-tit onlineTit">온라인스튜디오 가입수</p>
                            <p class="li-no">00</p>
                        </li>
                    </ul>
                </div>
            </div> -->
          </div>
        </article>
        <article class="info_name info:circumstances">
          <h3 class="meaning">어드민 현황</h3>
          <div class="circumstances_area">
            <div class="area_box area:center">
              <p class="box_tit">센터 현황</p>
              <ul class="box_cnt clearfix">
                <li class="cnt_li">
                  <div class="li-tit">
                    <p class="tit-compo">승인대기 센터</p>
                  </div>
                  <p class="li-no"><?= $center1; ?></p>
                </li>
                <li class="cnt_li">
                  <div class="li-tit">
                    <p class="tit-compo">등록완료 (당일)</p>
                  </div>
                  <p class="li-no"><?= $center2; ?></p>
                </li>
                <li class="cnt_li">
                  <div class="li-tit">
                    <p class="tit-compo">누적 센터 수</p>
                  </div>
                  <p class="li-no"><?= $center3; ?></p>
                </li>
              </ul>
            </div>
            <div class="area_box area:teacher">
              <p class="box_tit">강사 현황</p>
              <ul class="box_cnt clearfix">
                <li class="cnt_li">
                  <div class="li-tit">
                    <p class="tit-compo">승인대기 강사</p>
                  </div>
                  <p class="li-no"><?= $teacher1; ?></p>
                </li>
                <li class="cnt_li">
                  <div class="li-tit">
                    <p class="tit-compo">등록완료 (당일)</p>
                  </div>
                  <p class="li-no"><?= $teacher2; ?></p>
                </li>
                <li class="cnt_li">
                  <div class="li-tit">
                    <p class="tit-compo">누적 강사 수</p>
                  </div>
                  <p class="li-no"><?= $teacher3; ?></p>
                </li>
              </ul>
            </div>
            <div class="area_box area:studio">
              <p class="box_tit">온라인스튜디오 현황</p>
              <ul class="box_cnt clearfix">
                <li class="cnt_li">
                  <div class="li-tit">
                    <p class="tit-compo">승인대기 스튜디오</p>
                  </div>
                  <p class="li-no"><?= $studio1; ?></p>
                </li>
                <li class="cnt_li">
                  <div class="li-tit">
                    <p class="tit-compo">등록완료 (당일)</p>
                  </div>
                  <p class="li-no"><?= $studio2; ?></p>
                </li>
                <li class="cnt_li">
                  <div class="li-tit">
                    <p class="tit-compo">누적 스튜디오 수</p>
                  </div>
                  <p class="li-no"><?= $studio3; ?></p>
                </li>
              </ul>
            </div>
          </div>
        </article>
        <article class="info_name info:sales">
          <h3 class="meaning">샵 및 매출 현황</h3>
          <div class="sales_area">
            <div class="area_box area:today">
              <p class="box_tit">주문 / 매출 현황</p>
              <ul class="box_cnt clearfix">
                <li class="cnt_li">
                  <div class="li-tit">
                    <p class="tit-compo">일일 주문건수</p>
                  </div>
                  <p class="li-no"><?= $sales1; ?></p>
                </li>
                <li class="cnt_li">
                  <div class="li-tit">
                    <p class="tit-compo">당월 주문건수</p>
                  </div>
                  <p class="li-no"><?= $sales2; ?></p>
                </li>
                <li class="cnt_li">
                  <div class="li-tit">
                    <p class="tit-compo">월 발생매출</p>
                  </div>
                  <p class="li-no"><?= $this->crud_model->get_price_str($sales3); ?></p>
                </li>
              </ul>
            </div>
            <div class="area_box area:shop">
              <p class="box_tit">샵 현황</p>
              <ul class="box_cnt named_cnt clearfix">
                <li class="cnt_li">
                  <div class="li-tit">
                    <p class="tit-compo">승인대기 제품</p>
                  </div>
                  <p class="li-no"><?= $shop1; ?></p>
                </li>
                <li class="cnt_li">
                  <div class="li-tit">
                    <p class="tit-compo">판매중 상품</p>
                  </div>
                  <p class="li-no"><?= $shop2; ?></p>
                </li>
                <li class="cnt_li">
                  <div class="li-tit">
                    <p class="tit-compo">판매중지 상품</p>
                  </div>
                  <p class="li-no"><?= $shop3; ?></p>
                </li>
              </ul>
              <ul class="box_cnt clearfix">
                <li class="cnt_li">
                  <div class="li-tit">
                    <p class="tit-compo">브랜드 미확인 주문건</p>
                  </div>
                  <p class="li-no"><?= $shop4; ?></p>
                </li>
                <li class="cnt_li">
                  <div class="li-tit">
                    <p class="tit-compo">브랜드 미확인 C/S(문의미답변)</p>
                  </div>
                  <p class="li-no"><?= $shop5; ?></p>
                </li>
                <li class="cnt_li">
                  <div class="li-tit font-futura">
                    <p class="tit-compo">1:1 문의</p>
                  </div>
                  <p class="li-no"><?= $shop6; ?></p>
                </li>
              </ul>
            </div>
          </div>
        </article>
      </div>
      <div class="info_sale">
        <h3 class="sale__tit">매출 상세 현황</h3>
        <div class="sale__detail">
          <table class="detail__head">
            <colgroup>
              <col width="14.28%">
              <col width="28.56%">
              <col width="28.56%">
              <col width="28.56%">
            </colgroup>
            <thead>
            <tr>
              <th class="head--tit">구분</th>
              <th class="head--tit">
                <p class="tit-kind">당일 누적</p>
                <div class="tit-kind clearfix">
                  <span class="half kind-child">금액</span>
                  <span class="half kind-child">건수</span>
                </div>
              </th>
              <th class="head--tit">
                <p class="tit-kind">당월 누적</p>
                <div class="tit-kind clearfix">
                  <span class="half kind-child">금액</span>
                  <span class="half kind-child">건수</span>
                </div>
              </th>
              <th class="head--tit">
                <p class="tit-kind">전월 누적</p>
                <div class="tit-kind clearfix">
                  <span class="half kind-child">금액</span>
                  <span class="half kind-child">건수</span>
                </div>
              </th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td class="body--tit">결제완료</td>
              <td class="body--data clearfix">
                <span class="half"><?= $this->crud_model->get_price_str($balances1[SHOP_SHIPPING_STATUS_ORDER_COMPLETED]); ?>원</span>
                <span class="half"><?= $sales_cnt1[SHOP_SHIPPING_STATUS_ORDER_COMPLETED]; ?>건</span>
              </td>
              <td class="body--data clearfix">
                <span class="half"><?= $this->crud_model->get_price_str($balances2[SHOP_SHIPPING_STATUS_ORDER_COMPLETED]); ?>원</span>
                <span class="half"><?= $sales_cnt2[SHOP_SHIPPING_STATUS_ORDER_COMPLETED]; ?>건</span>
              </td>
              <td class="body--data clearfix">
                <span class="half"><?= $this->crud_model->get_price_str($balances3[SHOP_SHIPPING_STATUS_ORDER_COMPLETED]); ?>원</span>
                <span class="half"><?= $sales_cnt3[SHOP_SHIPPING_STATUS_ORDER_COMPLETED]; ?>건</span>
              </td>
            </tr>
            <tr>
              <td class="body--tit">상품준비중</td>
              <td class="body--data clearfix">
                <span class="half"><?= $this->crud_model->get_price_str($balances1[SHOP_SHIPPING_STATUS_PREPARE]); ?>원</span>
                <span class="half"><?= $sales_cnt1[SHOP_SHIPPING_STATUS_PREPARE]; ?>건</span>
              </td>
              <td class="body--data clearfix">
                <span class="half"><?= $this->crud_model->get_price_str($balances2[SHOP_SHIPPING_STATUS_PREPARE]); ?>원</span>
                <span class="half"><?= $sales_cnt2[SHOP_SHIPPING_STATUS_PREPARE]; ?>건</span>
              </td>
              <td class="body--data clearfix">
                <span class="half"><?= $this->crud_model->get_price_str($balances3[SHOP_SHIPPING_STATUS_PREPARE]); ?>원</span>
                <span class="half"><?= $sales_cnt3[SHOP_SHIPPING_STATUS_PREPARE]; ?>건</span>
              </td>
            </tr>
            <tr>
              <td class="body--tit">배송중</td>
              <td class="body--data clearfix">
                <span class="half"><?= $this->crud_model->get_price_str($balances1[SHOP_SHIPPING_STATUS_IN_PROGRESS]); ?>원</span>
                <span class="half"><?= $sales_cnt1[SHOP_SHIPPING_STATUS_IN_PROGRESS]; ?>건</span>
              </td>
              <td class="body--data clearfix">
                <span class="half"><?= $this->crud_model->get_price_str($balances2[SHOP_SHIPPING_STATUS_IN_PROGRESS]); ?>원</span>
                <span class="half"><?= $sales_cnt2[SHOP_SHIPPING_STATUS_IN_PROGRESS]; ?>건</span>
              </td>
              <td class="body--data clearfix">
                <span class="half"><?= $this->crud_model->get_price_str($balances3[SHOP_SHIPPING_STATUS_IN_PROGRESS]); ?>원</span>
                <span class="half"><?= $sales_cnt3[SHOP_SHIPPING_STATUS_IN_PROGRESS]; ?>건</span>
              </td>
            </tr>
            <tr>
              <td class="body--tit">배송완료</td>
              <td class="body--data clearfix">
                <span class="half"><?= $this->crud_model->get_price_str($balances1[SHOP_SHIPPING_STATUS_COMPLETED]); ?>원</span>
                <span class="half"><?= $sales_cnt1[SHOP_SHIPPING_STATUS_COMPLETED]; ?>건</span>
              </td>
              <td class="body--data clearfix">
                <span class="half"><?= $this->crud_model->get_price_str($balances2[SHOP_SHIPPING_STATUS_COMPLETED]); ?>원</span>
                <span class="half"><?= $sales_cnt2[SHOP_SHIPPING_STATUS_COMPLETED]; ?>건</span>
              </td>
              <td class="body--data clearfix">
                <span class="half"><?= $this->crud_model->get_price_str($balances3[SHOP_SHIPPING_STATUS_COMPLETED]); ?>원</span>
                <span class="half"><?= $sales_cnt3[SHOP_SHIPPING_STATUS_COMPLETED]; ?>건</span>
              </td>
            </tr>
            <tr>
              <td class="body--tit">주문취소</td>
              <td class="body--data clearfix">
                <span class="half"><?= $this->crud_model->get_price_str($balances1[SHOP_SHIPPING_STATUS_ORDER_CANCELED]); ?>원</span>
                <span class="half"><?= $sales_cnt1[SHOP_SHIPPING_STATUS_ORDER_CANCELED]; ?>건</span>
              </td>
              <td class="body--data clearfix">
                <span class="half"><?= $this->crud_model->get_price_str($balances2[SHOP_SHIPPING_STATUS_ORDER_CANCELED]); ?>원</span>
                <span class="half"><?= $sales_cnt2[SHOP_SHIPPING_STATUS_ORDER_CANCELED]; ?>건</span>
              </td>
              <td class="body--data clearfix">
                <span class="half"><?= $this->crud_model->get_price_str($balances3[SHOP_SHIPPING_STATUS_ORDER_CANCELED]); ?>원</span>
                <span class="half"><?= $sales_cnt3[SHOP_SHIPPING_STATUS_ORDER_CANCELED]; ?>건</span>
              </td>
            </tr>
            <tr>
              <td class="body--tit">구매확정</td>
              <td class="body--data clearfix">
                <span class="half"><?= $this->crud_model->get_price_str($balances1[SHOP_SHIPPING_STATUS_PURCHASE_COMPLETED]); ?>원</span>
                <span class="half"><?= $sales_cnt1[SHOP_SHIPPING_STATUS_PURCHASE_COMPLETED]; ?>건</span>
              </td>
              <td class="body--data clearfix">
                <span class="half"><?= $this->crud_model->get_price_str($balances2[SHOP_SHIPPING_STATUS_PURCHASE_COMPLETED]); ?>원</span>
                <span class="half"><?= $sales_cnt2[SHOP_SHIPPING_STATUS_PURCHASE_COMPLETED]; ?>건</span>
              </td>
              <td class="body--data clearfix">
                <span class="half"><?= $this->crud_model->get_price_str($balances3[SHOP_SHIPPING_STATUS_PURCHASE_COMPLETED]); ?>원</span>
                <span class="half"><?= $sales_cnt3[SHOP_SHIPPING_STATUS_PURCHASE_COMPLETED]; ?>건</span>
              </td>
            </tr>
            <tr>
              <td class="body--tit">교환중</td>
              <td class="body--data clearfix">
                <span class="half"><?= $this->crud_model->get_price_str($balances1[SHOP_SHIPPING_STATUS_PURCHASE_CHANGING]); ?>원</span>
                <span class="half"><?= $sales_cnt1[SHOP_SHIPPING_STATUS_PURCHASE_CHANGING]; ?>건</span>
              </td>
              <td class="body--data clearfix">
                <span class="half"><?= $this->crud_model->get_price_str($balances2[SHOP_SHIPPING_STATUS_PURCHASE_CHANGING]); ?>원</span>
                <span class="half"><?= $sales_cnt2[SHOP_SHIPPING_STATUS_PURCHASE_CHANGING]; ?>건</span>
              </td>
              <td class="body--data clearfix">
                <span class="half"><?= $this->crud_model->get_price_str($balances3[SHOP_SHIPPING_STATUS_PURCHASE_CHANGING]); ?>원</span>
                <span class="half"><?= $sales_cnt3[SHOP_SHIPPING_STATUS_PURCHASE_CHANGING]; ?>건</span>
              </td>
            </tr>
            <tr>
              <td class="body--tit">교환완료</td>
              <td class="body--data clearfix">
                <span class="half"><?= $this->crud_model->get_price_str($balances1[SHOP_SHIPPING_STATUS_PURCHASE_CHANGED]); ?>원</span>
                <span class="half"><?= $sales_cnt1[SHOP_SHIPPING_STATUS_PURCHASE_CHANGED]; ?>건</span>
              </td>
              <td class="body--data clearfix">
                <span class="half"><?= $this->crud_model->get_price_str($balances2[SHOP_SHIPPING_STATUS_PURCHASE_CHANGED]); ?>원</span>
                <span class="half"><?= $sales_cnt2[SHOP_SHIPPING_STATUS_PURCHASE_CHANGED]; ?>건</span>
              </td>
              <td class="body--data clearfix">
                <span class="half"><?= $this->crud_model->get_price_str($balances3[SHOP_SHIPPING_STATUS_PURCHASE_CHANGED]); ?>원</span>
                <span class="half"><?= $sales_cnt3[SHOP_SHIPPING_STATUS_PURCHASE_CHANGED]; ?>건</span>
              </td>
            </tr>
            <tr>
              <td class="body--tit">반품중</td>
              <td class="body--data clearfix">
                <span class="half"><?= $this->crud_model->get_price_str($balances1[SHOP_SHIPPING_STATUS_PURCHASE_CANCELING]); ?>원</span>
                <span class="half"><?= $sales_cnt1[SHOP_SHIPPING_STATUS_PURCHASE_CANCELING]; ?>건</span>
              </td>
              <td class="body--data clearfix">
                <span class="half"><?= $this->crud_model->get_price_str($balances2[SHOP_SHIPPING_STATUS_PURCHASE_CANCELING]); ?>원</span>
                <span class="half"><?= $sales_cnt2[SHOP_SHIPPING_STATUS_PURCHASE_CANCELING]; ?>건</span>
              </td>
              <td class="body--data clearfix">
                <span class="half"><?= $this->crud_model->get_price_str($balances3[SHOP_SHIPPING_STATUS_PURCHASE_CANCELING]); ?>원</span>
                <span class="half"><?= $sales_cnt3[SHOP_SHIPPING_STATUS_PURCHASE_CANCELING]; ?>건</span>
              </td>
            </tr>
            <tr>
              <td class="body--tit">반품완료</td>
              <td class="body--data clearfix">
                <span class="half"><?= $this->crud_model->get_price_str($balances1[SHOP_SHIPPING_STATUS_PURCHASE_CANCELED]); ?>원</span>
                <span class="half"><?= $sales_cnt1[SHOP_SHIPPING_STATUS_PURCHASE_CANCELED]; ?>건</span>
              </td>
              <td class="body--data clearfix">
                <span class="half"><?= $this->crud_model->get_price_str($balances2[SHOP_SHIPPING_STATUS_PURCHASE_CANCELED]); ?>원</span>
                <span class="half"><?= $sales_cnt2[SHOP_SHIPPING_STATUS_PURCHASE_CANCELED]; ?>건</span>
              </td>
              <td class="body--data clearfix">
                <span class="half"><?= $this->crud_model->get_price_str($balances3[SHOP_SHIPPING_STATUS_PURCHASE_CANCELED]); ?>원</span>
                <span class="half"><?= $sales_cnt3[SHOP_SHIPPING_STATUS_PURCHASE_CANCELED]; ?>건</span>
              </td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</section>
<script>
  $(function(){
    // console.log(1);
    let offset = $('.area_box').offset();
    let w = $('.area_box').width();
    let h = offset.top + $('.area_box').height();
    
    $('.area_box').hover(function(e){
      // if($("html").is(':animated')){}
      // 호버이벤트 중복 해결점 찾기
      if(e.pageX >= offset.left || e.pageX <= w || e.pageY >= offset.top || e.pageY <= h) {
        $(this).animate({
          top : '-60px'
        },400).find('.box_tit').addClass('boxHover')
        $(this).addClass('boxShadow');
        $(this).find('.box-user-bg').addClass('boxHover');
        $(this).find('.assemble').addClass('txtColor');
      }
    },function(e){
      if(e.pageX <= offset.left || e.pageX >= w || e.pageY <= offset.top || e.pageY >= h) {
        $(this).animate({
          top : '0'
        },400).find('.box_tit').removeClass('boxHover')
        $(this).removeClass('boxShadow');
        $(this).find('.box-user-bg').removeClass('boxHover');
        $(this).find('.assemble').removeClass('txtColor');
      }
    })
  })
</script>
<!-- / CONTENT AREA-->
