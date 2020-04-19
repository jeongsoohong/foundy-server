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
                        <li <?php if($page_name=="dashboard"){?> class="active-link" <?php } ?>
                                style="border-top:1px solid rgba(69, 74, 84, 0.7);">
                            <a href="<?php echo base_url(); ?>admin/">
                                <i class="fa fa-tachometer"></i>
                                <span class="menu-title">
                                    대시보드
                                </span>
                            </a>
                        </li>
                        <li <?php if($page_name=="blog" || $page_name=="blog_category" ){?>
                            class="active-sub"
                        <?php } ?> >
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <span class="menu-title">
                                    블로그
                                </span>
                                <i class="fa arrow"></i>
                            </a>
                            <ul class="collapse <?php if($page_name=="blog" || $page_name=="blog_category"){ echo 'in'; } ?>" >
                                <!--Menu list item-->
                                <li <?php if($page_name=="blog_category"){?> class="active-link" <?php } ?> >
                                    <a href="<?php echo base_url(); ?>admin/blog_category/">
                                        <i class="fa fa-circle fs_i"></i>
                                        블로그 카테고리
                                    </a>
                                </li>
                                <li <?php if($page_name=="blog"){?> class="active-link" <?php } ?> >
                                    <a href="<?php echo base_url(); ?>admin/blog/">
                                        <i class="fa fa-circle fs_i"></i>
                                        블로그 보기
                                    </a>
                                </li>
                            </ul>
                        </li>
<!--                        <li --><?php //if($page_name=="center" || $page_name=="center_category" ){?>
<!--                            class="active-sub"-->
<!--                        --><?php //} ?><!-- >-->
<!--                            <a href="#">-->
<!--                                <i class="fa fa-user"></i>-->
<!--                                <span class="menu-title">-->
<!--                                    스튜디오-->
<!--                                </span>-->
<!--                                <i class="fa arrow"></i>-->
<!--                            </a>-->
<!--                            <ul class="collapse --><?php //if($page_name=="center" || $page_name=="center_category"){ echo 'in'; } ?><!--" >-->
<!--                                <!--Menu list item-->-->
<!--                                <li --><?php //if($page_name=="center_category"){?><!-- class="active-link" --><?php //} ?><!-- >-->
<!--                                    <a href="--><?php //echo base_url(); ?><!--admin/center_category/">-->
<!--                                        <i class="fa fa-circle fs_i"></i>-->
<!--                                        센터 카테고리-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li --><?php //if($page_name=="center"){?><!-- class="active-link" --><?php //} ?><!-- >-->
<!--                                    <a href="--><?php //echo base_url(); ?><!--admin/center/">-->
<!--                                        <i class="fa fa-circle fs_i"></i>-->
<!--                                        센터 보기-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                        <li --><?php //if($page_name=="online" || $page_name=="online_category" ){?>
<!--                            class="active-sub"-->
<!--                        --><?php //} ?><!-- >-->
<!--                            <a href="#">-->
<!--                                <i class="fa fa-user"></i>-->
<!--                                <span class="menu-title">-->
<!--                                    온라인 클래스-->
<!--                                </span>-->
<!--                                <i class="fa arrow"></i>-->
<!--                            </a>-->
<!--                            <ul class="collapse --><?php //if($page_name=="online" || $page_name=="online_category"){ echo 'in'; } ?><!--" >-->
<!--                                <!--Menu list item-->-->
<!--                                <li --><?php //if($page_name=="center_category"){?><!-- class="active-link" --><?php //} ?><!-- >-->
<!--                                    <a href="--><?php //echo base_url(); ?><!--admin/online_category/">-->
<!--                                        <i class="fa fa-circle fs_i"></i>-->
<!--                                        온라인 클래스 카테고리-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li --><?php //if($page_name=="center"){?><!-- class="active-link" --><?php //} ?><!-- >-->
<!--                                    <a href="--><?php //echo base_url(); ?><!--admin/online/">-->
<!--                                        <i class="fa fa-circle fs_i"></i>-->
<!--                                        온라인 클래스 보기-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </li>-->
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