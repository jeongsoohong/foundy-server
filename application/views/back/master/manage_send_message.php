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
