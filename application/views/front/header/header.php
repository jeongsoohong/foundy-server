<?php
$find_url = '';
$life_url = '';
$earth_url = '';
$shop_url = '';

$category_names = array('find', 'life', 'earth', 'shop');
foreach ($category_names as $category_name) {
    $category_info = $this->db->get_where('blog_category', array('name' => $category_name, 'activate' => 1))->row();
    if (empty($category_info)) {
        ${"{$category_name}_url"} = base_url();
    } else {
        $this->db->order_by('blog_id', 'desc');
        $this->db->limit(1);
        $shop_info = $this->db->get_where('blog', array('blog_category' => $category_info->blog_category_id))->row();
        ${"{$category_name}_url"} = base_url() . "home/blog_view/" . $shop_info->blog_id;
    }
}

?>
<!-- HEADER -->
<header class="header header-logo-left">
    <div class="header-wrapper">
        <div class="container">
            <div class="flex-row">
                <div class="flex-col-12" style="text-align: center;">
                    <!-- Logo -->
                    <a href="<?php echo base_url();?>">
                        <img src="<?php echo base_url(); ?>uploads/logo_image/logo_180x30.jpg" alt="foit"/>
                    </a>
                    <!-- /Logo -->
                </div>
            </div>
        </div>
    </div>
    <div class="navigation-wrapper" id="navbar">
        <div class="container" style="height: 40px;">
            <!-- Navigation -->
            <nav class="navigation clearfix">
                <ul class="nav sf-menu">
                    <li class="find">
                        <a href="<?php echo $find_url; ?>">FIND</a>
                    </li>
                    <li class="life">
                        <a href="<?php echo $life_url; ?>">LIFE</a>
                    </li>
                    <li class="earth">
                        <a href="<?php echo $earth_url; ?>">EARTH</a>
                    </li>
                    <li class="shop">
                        <a href="<?php echo $shop_url; ?>">SHOP</a>
                    </li>
                    <li class="<?php if ($this->session->userdata('user_login') == 'yes') { echo ('user'); } else { echo ('login'); } ?>">
                        <a href="<?php echo base_url(); if ($this->session->userdata('user_login') == 'yes') { echo ('home/user'); } else { echo ('home/login'); } ?>">
                            <?php if ($this->session->userdata('user_login') == 'yes') { echo ('USER'); } else { echo ('LOGIN'); } ?>
                       </a>
                    </li>
                </ul>
            </nav>
            <!-- /Navigation -->
        </div>
    </div>
</header>

<script type="text/javascript">

    window.onscroll = function() {
        var navbar = document.getElementById("navbar");
        var sticky = navbar.offsetTop;

        //console.log('sticky : ' + sticky + ', pageYOffset : ' + window.pageYOffset);

        if (window.pageYOffset > sticky) {
            navbar.classList.add("navigation-sticky");
        } else {
            navbar.classList.remove("navigation-sticky");
        }
    }

</script>

<style>
    .navigation-sticky {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 100;
    }
/*    .navigation-sticky + .content {
        padding-top: 60px;
    }*/
</style>
<!-- /HEADER -->
