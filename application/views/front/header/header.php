
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
                    <li class="">
                        <a href="<?php echo base_url(); ?>home">FIND</a>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url(); ?>home">LIFE</a>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url(); ?>home">EARTH</a>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url(); ?>home">SHOP</a>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url(); ?>home/login">LOGIN</a>
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

        console.log('sticky : ' + sticky + ', pageYOffset : ' + window.pageYOffset);

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
