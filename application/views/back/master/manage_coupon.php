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
