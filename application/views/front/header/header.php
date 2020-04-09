
<!-- HEADER -->
<header class="header header-logo-left">
    <div class="header-wrapper">
        <div class="container">
            <div class="flex-row">
                <div class="flex-col-6 flex-col-lg-auto">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="<?php echo base_url();?>">
                            <img src="<?php echo base_url(); ?>uploads/logo_image/logo_350x60.jpg" alt="SuperShop"/>
                        </a>
                    </div>
                    <!-- /Logo -->
                </div>
                <div class="flex-col flex-order-last flex-order-lg-0">
                    <!-- Header search -->
                    <div class="header-search mt-4 mt-lg-0 px-xl-5">
                        <?php
                            echo form_open(base_url() . 'home/text_search/', array(
                                'method' => 'post',
                                'accept-charset' => "UTF-8"
                            ));
                        ?>
                            <div class="d-flex position-relative">
                                <div class="flex-grow-1">
                                    <input class="form-control" type="text" name="query"  accept-charset="utf-8"
                                           placeholder="위치를 수정하세요"/>
                                </div>
                                <button class="shrc_btn"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <!-- /Header search -->
                </div>
                <div class="flex-col-6 flex-col-lg-auto text-right">
                    <!-- Header shopping cart -->
                    <div class="header-cart">
                        <div class="cart-wrapper">
                            <a href="#" class="btn btn-theme-transparent">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="hidden-xs">
                                    <span class="cart_num"></span>
                                    item(s)
                                </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <!-- Mobile menu toggle button -->
                            <a href="#" class="menu-toggle btn btn-theme-transparent"><i class="fa fa-bars"></i></a>
                            <!-- /Mobile menu toggle button -->
                        </div>
                    </div>
                    <!-- Header shopping cart -->
                </div>
            </div>
        </div>
    </div>
    <div class="navigation-wrapper">
        <div class="container">
            <!-- Navigation -->
            <nav class="navigation closed clearfix">
                <a href="#" class="menu-toggle-close btn"><i class="fa fa-times"></i></a>
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
                </ul>
            </nav>
            <!-- /Navigation -->
        </div>
    </div>
</header>
<!-- /HEADER -->
