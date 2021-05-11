<style>
  #serverCheckPopupWrap,
  #serverCheckPopupWrap div,
  #serverCheckPopupWrap article,
  #serverCheckPopupWrap img,
  #serverCheckPopupWrap button,
  #serverCheckPopupWrap p,
  #serverCheckPopupWrap span {
    padding: 0;
    border: 0;
    margin: 0;
  }
  #serverCheckPopupWrap {
    font-family: 'Apple SD Gothic Neo', 'Malgun Gothic', '맑은 고딕', sans-serif;
    word-break: keep-all;
  }
  #serverCheckPopupWrap .clearfix::after {
    content: "";
    display: block;
    clear: both;
  }
  #serverCheckPopupWrap a {
    text-decoration: none;
  }
  #serverCheckPopupWrap li {list-style: none;}
  #serverCheckPopupWrap button {
    border: 0;
    outline: none;
    cursor: pointer;
  }
  #serverCheckPopupWrap img {vertical-align: middle;}
  
  .futura-pt {
    font-family: futura-pt !important;
    font-style: normal !important;
    font-weight: 400 !important;
  }
  .meaning {
    overflow: hidden;
    position: absolute;
    width: 0;
    height: 0;
    line-height: 0;
  }
  
  #serverCheckPopupWrap {
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
    position: fixed;
    top: 0;
    left: 0;
    z-index: 25;
    max-width: 460px;
    margin: 0 auto;
    right: 0;
  }
  #serverCheckPopupWrap .pop_transfer {
    position: absolute;
    width: 288px;
    height: 250px;
    top: 50%;
    left: 50%;
    margin-top: -125px;
    margin-left: -144px;
    border-radius: 4px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0,0,0,0.12);
  }
  #serverCheckPopupWrap .daytime_data span {
    font-family: futura-pt !important;
    font-style: normal !important;
    font-weight: 400 !important;
  }
  
  #serverCheckPopupWrap .transfer_deco {
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
  }
  #serverCheckPopupWrap .deco_warning {
    display: block;
    border-radius: inherit;
  }
  #serverCheckPopupWrap .transfer_cnt {
    position: relative;
    background-color: inherit;
    border-bottom-left-radius: 4px;
    border-bottom-right-radius: 4px;
    height: 238px;
  }
  #serverCheckPopupWrap .cnt_close {
    position: absolute;
    width: 20px;
    height: 20px;
    top: 16px;
    right: 16px;
    background-color: #eee;
    border-radius: 10px;
    z-index: 12;
  }
  #serverCheckPopupWrap .cnt_alert {
    box-sizing: border-box;
    background-color: inherit;
    /* padding: 38px 45px 44px 41px; */
    padding: 38px 38px 44px;
    position: absolute;
    width: 100%;
    height: 100%;
    border-radius: inherit;
  }
  #serverCheckPopupWrap .alert_tit {
    margin-bottom: 20px;
    text-align: center;
  }
  #serverCheckPopupWrap .tit_txt {
    margin-top: 10px;
    color: #0091ea;
    font-size: 21px;
    font-weight: bold;
    line-height: 25px;
  }
  #serverCheckPopupWrap .daytime_data {
    color: #616161;
    font-size: 12px;
    font-weight: bold;
    padding-bottom: 12px;
    line-height: 1.3;
    letter-spacing: -0.05em;
  }
  #serverCheckPopupWrap .daytime_guide {
    color: #757575;
    font-size: 12px;
    font-weight: normal;
    line-height: 1.5;
  }
  @media(min-width: 768px) {
    #serverCheckPopupWrap .deco_warning {
      width: 384px;
      height: 16px;
    }
    #serverCheckPopupWrap .pop_transfer {
      width: 384px;
      height: 272px;
      margin-left: -192px;
      margin-top: -134px;
    }
    #serverCheckPopupWrap .transfer_deco {
      border-top-left-radius: 8px;
      border-top-right-radius: 8px;
    }
    #serverCheckPopupWrap .deco_warning {
      border-top-left-radius: 4px;
      border-top-right-radius: 4px;
    }
    #serverCheckPopupWrap .transfer_cnt {
      height: 256px;
      border-bottom-left-radius: 8px;
      border-bottom-right-radius: 8px;
    }
    #serverCheckPopupWrap .alert_tit {
      margin-bottom: 24px;
    }
    #serverCheckPopupWrap .tit_txt {
      font-size: 27px;
      line-height: 32px;
    }
    #serverCheckPopupWrap .daytime_data {
      font-size: 16px;
      line-height: 1.2;
    }
    #serverCheckPopupWrap .daytime_guide br {
      display: none;
    }
    #serverCheckPopupWrap .daytime_guide {
      font-size: 14px;
      word-break: break-all;
    }
    #serverCheckPopupWrap .cnt_alert {
      box-sizing: border-box;
      background-color: inherit;
      padding: 0;
      position: absolute;
      width: 290px;
      height: 172px;
      margin: auto;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
    }
  }
</style>
<div class="pop_bg" id="serverCheckPopupWrap">
  <article class="pop_transfer">
    <div class="transfer_deco">
      <img src="<?= base_url(); ?>template/icon/warning_bar_lg.png" alt="warning_bar" width="288" height="12" class="deco_warning">
    </div>
    <div class="transfer_cnt">
      <button class="cnt_close" onclick="fn_close();">
        <img src="<?= base_url(); ?>template/icon/transfer_close.png" alt="닫기" width="8" height="8" class="close_ic" style="padding-bottom: 4px;">
        <script>
          function fn_close() {
            let today = new Date();
            $('body').css('overflow-y', 'auto');
            $('#serverCheckPopupWrap').hide().children('.pop_transfer').hide();
            _setCookie('server_check_popup_time_2', parseInt(today.getTime()/1000), 1);
          }
          $(function() {
            $('#serverCheckPopupWrap').show().children('.pop_transfer').show();
            $('body').css('overflow-y', 'hidden');
          });
        </script>
      </button>
      <div class="cnt_alert">
        <div class="alert_tit">
          <img src="<?= base_url(); ?>template/icon/transfer_info.png" alt="정보마크" width="36" height="36" class="tit_exclamation">
          <p class="tit_txt">서버 <span class="status">점검</span> 안내</p>
        </div>
        <div class="alert_daytime">
          <p class="daytime_data">일시 ㅣ
            <span id="start_date">
              <?= date('m.d', strtotime(SERVER_CHECK_START)) ?>
            </span>
            (<?= $this->crud_model->get_week_str(date('w', strtotime(SERVER_CHECK_START))); ?>)
            <span id="start_time">
              <?= date('H:i', strtotime(SERVER_CHECK_START)); ?>
            </span>
            ~
            <span id="end_date">
              <?= date('m.d', strtotime(SERVER_CHECK_END)) ?>
            </span>
            (<?= $this->crud_model->get_week_str(date('w', strtotime(SERVER_CHECK_END))); ?>)
            <span id="end_time">
              <?= date('H:i', strtotime(SERVER_CHECK_END)); ?>
            </span>
          </p>
          <p class="daytime_guide">서버 <span class="status">점검</span>에 대한 일정을 공지하오니 해당 <br>시간대에는 접속이 제한됨을 알려드립니다.</p>
        </div>
      </div>
    </div>
  </article>
</div>
