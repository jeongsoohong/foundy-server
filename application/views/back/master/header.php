<header class="header">
  <nav class="header__nav clearfix">
    <h1 class="nav--logo">
      <a href="<?= base_url(); ?>master" class="logo_home">
        <img src="<?= base_url(); ?>template/back/center/imgs/logo_foundy_modiy.png" alt="홈" width="76" height="24">
      </a>
    </h1>
    <section class="nav--menu clearfix">
      <h2 class="menu_tit meaning">메인메뉴</h2>
      <div class="menu_wrap clearfix">
        <a href="<?= base_url(); ?>master" class="menu_home">홈</a>
        <a href="<?= base_url(); ?>master/manage" class="menu_manage">관리자</a>
<!--        <a href="#" class="menu_posting">포스팅</a>-->
<!--        <a href="#" class="menu_center">센터관리</a>-->
<!--        <a href="#" class="menu_online">온라인관리</a>-->
<!--        <a href="#" class="menu_teacher">강사관리</a>-->
        <a href="<?= base_url(); ?>master/shop" class="menu_shop">샵관리</a>
<!--        <a href="#" class="menu_user">유저관리</a>-->
<!--        <a href="#" class="menu_calculate">정산관리</a>-->
      </div>
      <script>
        // 페이지에 해당되는 menu_wrap a addClass 이벤트
        $(function(){
          let page_name = '<?= $page_name; ?>';
          $('.menu_'+page_name).addClass('loadActive');
        })
      </script>
    </section>
    <article class="nav--site">
      <a href="<?= base_url(); ?>" target="_blank" class="site_link">
        <img src="<?= base_url(); ?>template/back/master/icon/ic_website.png" width="auto" height="24" alt="" class="link_icon">
        <p class="link_homepage">홈페이지 바로가기</p>
        <div class="link_deco"><span>|</span></div>
      </a>
    </article>
    <article class="nav--id">
      <h2 class="id_name meaning">접속 아이디</h2>
      <div class="id_current">
        <button class="current_accessed"><?= $master_email ; ?></button>
        <div class="current_arrow">
          <img src="<?= base_url(); ?>template/back/center/imgs/icon_down.png" width="12" class="arrow_down">
          <img src="<?= base_url(); ?>template/back/center/imgs/icon_up.png" width="12" style="display: none;" class="arrow_up">
        </div>
      </div>
      <div class="id_list shadow" style="display: none; height: 60px;">
        <div class="list_child">
          <a href="<?= base_url(); ?>master/logout" style="color: #616161">로그아웃</a>
        </div>
      </div>
    </article>
    <script>
      // nav--id 클릭이벤트
      $('.id_list').css('display','none');
      $('.nav--id').click(function(){
        // console.log(1);
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
    </script>
  </nav>
</header>
