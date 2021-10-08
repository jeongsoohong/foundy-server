<div class="step_wrap">
  <? foreach ($schedule_infos as $schedule) { ?>
    <div class="detail_step clearfix">
      <div class="step_course modify_course clearfix">
        <p class="course_lessonDate">
          <?= date('Y.m.d', strtotime($schedule->schedule_date)); ?>
        </p>
        <p class="course_time">
          <?= date('H:i', strtotime($schedule->start_time)); ?>
          ~
          <?= date('H:i', strtotime($schedule->end_time)); ?>
        </p>
        <p class="course_teacher">
          (
          <span class="teacher--txt">
          <?= $schedule->teacher_name; ?>
        </span>
          )
          <span class="lesson--txt">
          <?= $schedule->schedule_title; ?>
        </span>
        </p>
        <button class="named-fn addLesson" onclick="makeGroupSelect(<?= $schedule->schedule_info_id; ?>, this)">
          <span>
            +
          </span>
          클래스 추가
        </button>
        <div class="course_hidden_info" id="schedule-<?= $schedule->schedule_info_id; ?>">
          <p>
            <?= date('Y.m.d', strtotime($schedule->schedule_date)); ?>
          </p>
          <p>
            <?= date('H:i', strtotime($schedule->start_time)); ?>
            ~
            <?= date('H:i', strtotime($schedule->end_time)); ?>
          </p>
          <p>
            <?= $schedule->schedule_title; ?>
          </p>
          <p>
            <?= $schedule->teacher_name; ?>
          </p>
          <p>
            <?= $schedule->reservable_number; ?>
          </p>
        </div>
      </div>
    </div>
  <? } ?>
  <script>
    $(document).ready(function(){
      // 예약현황 클릭
      $('button[class*="book:proceed"]').click(function(){
        $('.boxwrap__pop').css({
          'overflow' : 'scroll'
        }).show().children('.sch_status').show();
      })
      // select 클릭
      // $('.zoom-table tr').html('');
      
      $(document).on('click','.step__select',function(){
        
        let date = $('.date--txt').text();
        let time = $('.time--txt').text();
        let lesson = $('.lesson--txt').text();
        let teacher = $('.teacher--txt').text();
        let book = $('.book--txt').text();
        // let wait = $('.wait--txt).text();
        
        // 테이블 내용에 변수 삽입
        var or_html = '<tr>' +
          '<td class="td-label chkTd">' +
          '<input class="chkPiece" type="checkbox" name="chkPiece" disabled="disabled">' +
          '<label class="chkLabel toggleChkDisabled"></label>' +
          '</td>' +
          '<td>' +
          '<span class="td-span">' + date + '</span>' +
          '</td>' +
          '<td>' +
          '<span class="td-span">' + time + '</span>' +
          '</td>' +
          '<td>' +
          '<span class="td-span">' + lesson + '</span>' +
          '</td>' +
          '<td>' +
          '<span class="td-span">' + teacher + '</span>' +
          '</td>' +
          '<td>' +
          '<span class="td-span">' + book + '</span>' +
          '</td>' +
          '<td>' +
          '<div class="td-span">' +
          '<button class="go__toUp"></button>' +
          '<button class="go__toDown"></button>' +
          '</div>' +
          '</td>' +
          '</tr>'
        
        $('.shop--searchBox').hide();
        // 몇 번째 테이블 그룹에 추가할 것인지 묻는 양식 추가
        let length = $('.zoom--cnts').length;
        
        
        // 그룹이 1개일 때 조건문
        if(length === 1){
          $('.zoom-table tbody').html(or_html);
          // $('div[class$="frame:group"]').hide();
        }
        // 그룹이 2개 이상일 때 조건문 : 팝업 셀렉트 바 띄우고 html 삽입
        else if(length >= 2){
          $('.boxwrap__pop').show().children('div[class$="frame:group"]').show();
          // alert('2');
        }
        
        // named-fn, rewrite 비활성화 해제
        $('.type__shopCnt').find('.named-fn').attr('disabled',false).removeClass('disabledBtn');
        $('.type__shopCnt').find('.named-txt').removeClass('gray_txt');
        $('.type__shopCnt').find('.type__zoomTit').removeClass('gray_txt');
        $('.type__shopCnt').find('.btn__rewrite').attr('disabled',false).removeClass('disabledBtn2');
        $('.type__shopCnt').find('button[class*=go__to]').attr('disabled',false).removeClass('disabledBtn3');
        
        // shop--table 비활성화 해제
        $('.type__shopCnt').find('.shop--table th').removeClass('gray_bg');
        $('.type__shopCnt').find('.shop--table .th-span').removeClass('gray_txt');
        $('.type__shopCnt').find('.shop--table .td-span').removeClass('gray_txt');
        $('.type__shopCnt').find('.shop--table .chkAll').attr('disabled',false)
          .next().removeClass('toggleChkDisabled');
        $('.type__shopCnt').find('.shop--table .chkPiece').attr('disabled',false)
          .next().removeClass('toggleChkDisabled');
      })
    })
  </script>
</div>
