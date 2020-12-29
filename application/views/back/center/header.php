<header class="header">
  <div class="header__nav clearfix">
    <h1 class="nav--logo">
      <a href="<?php echo base_url().'center'; ?>" class="logo_home">
        <img src="<?php echo base_url().'template/back/center/imgs/logo_foundy_modiy.png'; ?>" alt="홈" width="76" height="24">
      </a>
    </h1>
    <section class="nav--menu clearfix">
      <h2 class="menu_tit meaning">메인메뉴</h2>
      <div class="menu_wrap clearfix">
<!--        <a href="--><?php //echo base_url().'center'; ?><!--">홈</a>-->
<!--        <a href="--><?php //echo base_url().'center'; ?><!--">공지사항</a>-->
        <a href="<?php echo base_url().'center/account'; ?>" class="selected" id="menu_account">센터정보</a>
        <a href="<?php echo base_url().'center/teacher'; ?>" id="menu_teacher">강사 / 스케줄</a>
        <a href="<?php echo base_url().'center/course'; ?>" id="menu_course">수강권 관리</a>
<!--        <a href="--><?php //echo base_url().'center/member'; ?><!--" id="menu_member">회원 관리</a>-->
<!--        <a href="#">온라인클래스</a>-->
<!--        <a href="#">정산</a>-->
      </div>
    </section>
    <article class="nav--id">
      <h2 class="id_name meaning">접속 아이디</h2>
      <div class="id_current">
        <button class="current_accessed"><?php echo $center->title; ?></button>
        <div class="current_arrow">
          <img src="<?php echo base_url().'template/back/center/imgs/icon_down.png'; ?>" width="12" class="arrow_down">
          <img src="<?php echo base_url().'template/back/center/imgs/icon_up.png'; ?>" width="12" style="display: none;" class="arrow_up">
        </div>
      </div>
      <div class="id_list shadow_md" style="display: none;">
        <?php
        for ($i = 0; $i < count($centers); $i++) {
          if ($centers[$i]->center_id == $center->center_id) continue;
          ?>
          <button class="list_child" onclick="change_center(<?php echo $centers[$i]->center_id; ?>);"><?php echo $centers[$i]->title; ?></button>
        <?php } ?>
        <button class="list_child"><a href="<?php echo base_url();?>center/logout" style="color: #616161">로그아웃</a></button>
      </div>
    </article>
  </div>
</header>
<script>
  function add_menu_active(id) {
    $('.nav--menu .menu_wrap a').removeClass('selected');
    if (id === 'account') {
      $('#menu_account').addClass('selected');
    } else if (id === 'teacher') {
      $('#menu_teacher').addClass('selected');
    } else if (id === 'course') {
      $('#menu_course').addClass('selected');
    } else if (id === 'member') {
      $('#menu_member').addClass('selected');
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

  function change_center(center_id) {
    console.log(center_id);
  
    $('#loading_set').show();
  
    $.ajax({
      url: '<?php echo base_url(); ?>center/change?id=' + center_id, // form action url
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
  $(function() {
    $('.id_list').css('height', '<?php echo ((count($centers) * 60).'px'); ?>');
  });
</script>
