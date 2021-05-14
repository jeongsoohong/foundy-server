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
