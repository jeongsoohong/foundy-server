<header class="header">
  <div class="header__nav clearfix">
    <h1 class="nav--logo">
      <a href="<?= base_url().'studio'; ?>" class="logo_home">
        <img src="<?= base_url().'template/back/center/imgs/logo_foundy_modiy.png'; ?>" alt="홈" width="76" height="24">
      </a>
    </h1>
    <section class="nav--menu clearfix">
      <h2 class="menu_tit meaning">메인메뉴</h2>
      <div class="menu_wrap clearfix">
        <a href="<?= base_url().'studio/teacher'; ?>" id="menu_teacher">강사 정보</a>
        <a href="<?= base_url().'studio/youtube'; ?>" id="menu_youtube">유튜브 클래스</a>
        <? if ($register == true && $studio_id > 0) { ?>
          <a href="<?= base_url().'studio/account'; ?>" id="menu_account" style="display: none;">스튜디오 정보</a>
        <? } ?>
        <a href="<?= base_url().'studio/schedule'; ?>" id="menu_schedule" style="display: none;">스튜디오 스케줄</a>
      </div>
    </section>
    <!-- 온라인 스튜디오 신청 -->
    <article class="nav--stu">
      <button class="stu-apply" id="btn_apply_studio" style="display: none;" onclick="go_register_studio()">온라인 스튜디오 신청</button>
    </article>
    <article class="nav--id">
      <h2 class="id_name meaning">접속 아이디</h2>
      <div class="id_current">
        <button class="current_accessed"><?= $teacher->name; ?></button>
        <div class="current_arrow">
          <img src="<?= base_url().'template/back/center/imgs/icon_down.png'; ?>" width="12" class="arrow_down">
          <img src="<?= base_url().'template/back/center/imgs/icon_up.png'; ?>" width="12" style="display: none;" class="arrow_up">
        </div>
      </div>
      <div class="id_list shadow_md" style="display: none;">
        <button class="list_child"><a href="<?= base_url();?>studio/logout" style="color: #616161">로그아웃</a></button>
      </div>
    </article>
  </div>
</header>
<script>
  function add_menu_active(id) {
    $('.nav--menu .menu_wrap a').removeClass('loadActive');
    if (id === 'account') {
      $('#menu_account').addClass('loadActive');
    } else if (id === 'schedule') {
      $('#menu_schedule').addClass('loadActive');
    } else if (id === 'teacher') {
      $('#menu_teacher').addClass('loadActive');
    } else if (id === 'youtube') {
      $('#menu_youtube').addClass('loadActive');
    }
  }

  // 윈도우 클릭시 팝업닫기
  $(window).click(function(e){
    let target = $('header .id_list.shadow_md');
    if (e.target.className !== 'current_accessed' && target.css('display') !== 'none') {
      target.css('display', 'none');
      $('header .current_arrow .arrow_down').show();
      $('header .current_arrow .arrow_up').hide();
    }
  });

  function change_studio(studio_id) {
    console.log(studio_id);
  
    $('#loading_set').show();
  
    $.ajax({
      url: '<?= base_url(); ?>studio/change?id=' + studio_id, // form action url
      type: 'GET', // form submit method get/post
      dataType: 'html', // request type html/json/xml
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        $("#loading_set").fadeOut(500);
        if (data === 'done' || data.search('done') !== -1) {
          $.notify({
            message: '변경되었습니다.',
            icon: 'fa fa-check'
          }, {
            type: 'success',
            timer: 1000,
            delay: 1000,
            animate: {
              enter: 'animated lightSpeedIn',
              exit: 'animated lightSpeedOut'
            }
          });
          window.location.reload(true);
        } else {
          var title = '<strong>실패하였습니다 : </strong>';
          $.notify({
            title: title,
            message: data,
            icon: 'fa fa-check'
          }, {
            type: 'warning',
            timer: 1000,
            delay: 1000,
            animate: {
              enter: 'animated lightSpeedIn',
              exit: 'animated lightSpeedOut'
            }
          });
        }
      },
      error: function (e) {
        console.log(e)
      }
    });
  }
  
  function go_register_studio() {
    window.location.href = '<?= base_url(); ?>studio/account?r=';
  }
  
  $(function() {
    // nav--id 클릭이벤트
    $('.id_list').css('display','none');
    $('.nav--id').click(function(){
      $('.id_list').toggle();
      var display = $('.arrow_up').css('display');
      // console.log(display);
      if(display === 'none'){
        $('.arrow_up').show().prev().hide();
      }
      else {
        $('.arrow_up').hide().prev().show();
      }
    })
    $('.list_child').hover(function(){
      $('.list_child').css('background','#fff');
      $(this).css('background','#eee');
    },function(){
      $('.list_child').css('background','#fff');
    })
  
    // list_child 클릭이벤트
    $('.list_child').click(function(){
      var origin = $('.current_accessed').text();
      var current = $(this).text();
      $('.current_accessed').text(current);
      $(this).text(origin);
    })
  });
  
  <? if ($studio_id > 0) { ?>
  <? if ($studio->activate == 1) { ?>
  $('#menu_account').show();
  $('#menu_schedule').show();
  $('#btn_apply_studio').hide();
  <? } else { ?>
  $('#menu_account').hide();
  $('#menu_schedule').hide();
  $('#btn_apply_studio').hide();
  <? } ?>
  <? } else if ($register) { ?>
  $('#menu_account').show();
  $('#menu_schedule').hide();
  $('#btn_apply_studio').hide();
  <? } else { ?>
  $('#menu_account').hide();
  $('#menu_schedule').hide();
  $('#btn_apply_studio').show();
  <? } ?>
  //alert('<?//= $register; ?>//');
  //alert('<?//= $studio_id; ?>//');
</script>
