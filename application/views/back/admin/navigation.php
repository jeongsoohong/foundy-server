<nav id="mainnav-container">
  <div id="mainnav">
    <!--Menu-->
    <div id="mainnav-menu-wrap">
      <div class="nano">
        <div class="nano-content" style="overflow-x:auto;">
          <ul id="mainnav-menu" class="list-group">
            <!--Category name-->
            <li class="list-header"></li>
            <!--Menu list item-->
            <li <?php if($page_name=="dashboard"){?> class="active-link" <?php } ?> style="border-top:1px solid rgba(69, 74, 84, 0.7);">
              <a href="<?php echo base_url(); ?>admin/">
                <i class="fa fa-tachometer"></i>
                <span class="menu-title">
                  대시보드
                </span>
              </a>
            </li>
            <li <?php if($page_name=="slider"){?> class="active-sub"<?php } ?> >
              <a href="#">
                <i class="fa fa-user"></i>
                <span class="menu-title">
                  Main
                </span>
                <i class="fa arrow"></i>
              </a>
              <ul class="collapse <?php if($page_name=="blog"){ echo 'in'; } ?>" >
                <!--Menu list item-->
                <li <?php if($page_name=="slider"){?> class="active-link" <?php } ?> >
                  <a href="<?php echo base_url(); ?>admin/slider/">
                    <i class="fa fa-circle fs_i"></i>
                    Slider
                  </a>
                </li>
              </ul>
            </li>
            <li <?php if($page_name=="blog" || $page_name=="blog_category" ){?> class="active-sub"<?php } ?> >
              <a href="#">
                <i class="fa fa-user"></i>
                <span class="menu-title">
                  블로그
                </span>
                <i class="fa arrow"></i>
              </a>
              <ul class="collapse <?php if($page_name=="blog" || $page_name=="blog_category"){ echo 'in'; } ?>" >
                <!--Menu list item-->
                <li <?php if($page_name=="blog_category"){?> class="active-link"<?php } ?>>
                  <a href="<?php echo base_url(); ?>admin/blog_category/">
                    <i class="fa fa-circle fs_i"></i>
                    블로그 카테고리
                  </a>
                </li>
                <li <?php if($page_name=="blog"){?> class="active-link"<?php } ?>>
                  <a href="<?php echo base_url(); ?>admin/blog/">
                    <i class="fa fa-circle fs_i"></i>
                    블로그 보기
                  </a>
                </li>
              </ul>
            </li>
            <li <?php if($page_name=="center"){ ?> class="active-sub"<?php } ?>>
              <a href="#">
                <i class="fa fa-user"></i>
                <span class="menu-title">
                  센터 관리
                </span>
                <i class="fa arrow"></i>
              </a>
              <ul class="collapse <?php if($page_name=="center") { echo'in'; } ?>">
                <!--Menu list item-->
                <li <?php if($page_name == 'center' && $list_type == "approval"){?> class="active-link"<?php } ?>>
                  <a href="<?php echo base_url(); ?>admin/center/approval_list">
                    <i class="fa fa-circle fs_i"></i>
                    센터 승인
                  </a>
                </li>
                <li <?php if($page_name == 'center' && $list_type == ""){?> class="active-link"<?php } ?>>
                  <a href="<?php echo base_url(); ?>admin/center">
                    <i class="fa fa-circle fs_i"></i>
                    센터 보기
                  </a>
                </li>
              </ul>
            </li>
            <li <?php if($page_name=="teacher"){?> class="active-sub"<?php } ?>>
              <a href="#">
                <i class="fa fa-user"></i>
                <span class="menu-title">
                  강사 관리
                </span>
                <i class="fa arrow"></i>
              </a>
              <ul class="collapse <?php if($page_name=="teacher"){ echo 'in'; } ?>" >
                <!--Menu list item-->
                <li <?php if($page_name == 'teacher' && $list_type == "approval"){?> class="active-link" <?php } ?> >
                  <a href="<?php echo base_url(); ?>admin/teacher/approval_list">
                    <i class="fa fa-circle fs_i"></i>
                    강사 승인
                  </a>
                </li>
                <li <?php if($page_name == 'teacher' && $list_type == ""){?> class="active-link" <?php } ?> >
                  <a href="<?php echo base_url(); ?>admin/teacher">
                    <i class="fa fa-circle fs_i"></i>
                    강사 보기
                  </a>
                </li>
              </ul>
            </li>
            <li <?php if($page_name=="shop"){?> class="active-sub"<?php } ?>>
              <a href="#">
                <i class="fa fa-user"></i>
                <span class="menu-title">
                  샵 관리
                </span>
                <i class="fa arrow"></i>
              </a>
              <ul class="collapse <?php if($page_name=="shop"){ echo 'in'; } ?>" >
                <!--Menu list item-->
                <li <?php if($page_name == 'shop' && $list_type == 'shop_approval' ){?> class="active-link" <?php } ?> >
                  <a href="<?php echo base_url(); ?>admin/shop/shop_approval">
                    <i class="fa fa-circle fs_i"></i>
                    샵 승인
                  </a>
                </li>
                <li <?php if($page_name == 'shop' && $list_type == 'shop_list' ){?> class="active-link" <?php } ?> >
                  <a href="<?php echo base_url(); ?>admin/shop">
                    <i class="fa fa-circle fs_i"></i>
                    샵 보기
                  </a>
                </li>
                <li <?php if($page_name == 'shop' && $list_type == 'product_approval'){?> class="active-link" <?php } ?> >
                  <a href="<?php echo base_url(); ?>admin/shop/product/product_approval">
                    <i class="fa fa-circle fs_i"></i>
                    상품 승인
                  </a>
                </li>
                <li <?php if($page_name == 'shop' && $list_type == 'product_list' ){?> class="active-link" <?php } ?> >
                  <a href="<?php echo base_url(); ?>admin/shop/product">
                    <i class="fa fa-circle fs_i"></i>
                    상품 보기
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>
<style>
  .activate_bar{
    border-left: 3px solid #1ACFFC;
    transition: all .6s ease-in-out;
  }
  .activate_bar:hover{
    border-bottom: 3px solid #1ACFFC;
    transition: all .6s ease-in-out;
    background:#1ACFFC !important;
    color:#000 !important;
  }
  ul ul ul li a{
    padding-left:80px !important;
  }
  ul ul ul li a:hover{
    background:#2f343b !important;
  }
</style>
<script>
  function limitLines(obj, e) {
    let n = (obj.value.match(/\r\n|\r|\n/g)||[]).length + 1, maxRows = obj.rows;
    if (e.which === 13 && n === maxRows) {
      return false;
    } else {
      return true;
    }
  }

  function postDesc(input) {
    let desc = document.getElementById(input);
    desc.value = desc.value.replace(/\r\n|\r|\n/g,"<br />");
    return true;
  }

  function preDesc(input) {
    let desc = document.getElementById(input);
    desc.value = desc.value.replace("<br />", "\n");
    return true;
  }

</script>