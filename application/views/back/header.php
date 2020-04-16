<header id="navbar">
    <div id="navbar-container" class="boxed">
        <!--Brand logo & name-->
        <div class="navbar-header">
            <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('title'); ?>" class="navbar-brand">
                <img src="<?php echo base_url(); ?>uploads/logo_image/logo_46.png" alt="<?php echo $system_name;?>" class="brand-icon" style="padding:8px;">
                <div class="brand-title">
                    <span class="brand-text"><?php echo $system_name;?></span>
                </div>
            </a>
        </div>
        <!--End brand logo & name-->

        <!--Navbar Dropdown-->
        <div class="navbar-content clearfix">
            <ul class="nav navbar-top-links pull-left">
                <!--Navigation toogle button-->
                <li class="tgl-menu-btn">
                    <a class="mainnav-toggle">
                        <i class="fa fa-navicon fa-lg"></i>
                    </a>
                </li>
                <!--End Navigation toogle button-->
            </ul>

            <ul class="nav navbar-top-links pull-right">
                <li>
                    <div class="lang-selected" style="margin-top:10px;">
                        <?php
                        if($this->session->userdata('title') == 'admin'){
                            ?>
                            <a href="<?php echo base_url(); ?>" target="_blank" class="btn btn-default">
                                <i class="fa fa-desktop"></i>  홈페이지 바로가기
                            </a>
                            <?php
                        } elseif ($this->session->userdata('title') == 'vendor') {
                            ?>
                            <a href="<?php echo $this->crud_model->vendor_link($this->session->userdata('vendor_id')); ?>" target="_blank" class="btn btn-default">
                                <i class="fa fa-desktop"></i>  <?php echo ('visit_my_homepage');?>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                </li>
                <li id="dropdown-user" class="dropdown">
                    <a href="<?php echo base_url(); ?>template/back/#" data-toggle="dropdown" class="dropdown-toggle text-right">
                        <span class="pull-right">
                            <?php
                            if($this->session->userdata('title') == 'admin'){
                                ?>
                                <img class="img-circle img-user media-object" src="<?php echo base_url(); ?>template/back/img/av1.png" alt="Profile Picture">
                                <?php
                            } elseif ($this->session->userdata('title') == 'vendor') {
                                if(file_exists("uploads/vendor_logo_image/logo_".$this->session->userdata('vendor_id').".png")){
                                    ?>
                                    <img class="img-circle img-user media-object" src="<?php echo base_url(); ?>uploads/vendor_logo_image/logo_<?php echo $this->session->userdata('vendor_id'); ?>.png" alt="Profile Picture">
                                    <?php
                                }else{
                                    ?>
                                    <img class="img-circle img-user media-object" src="<?php echo base_url(); ?>uploads/vendor_logo_image/logo_0.png" alt="Profile Picture">
                                    <?php
                                }
                            }
                            ?>
                        </span>
                        <div class="username hidden-xs">
                            <?php
                            if($this->session->userdata('title') == 'admin'){
                                echo $this->session->userdata('admin_name');
                            } elseif ($this->session->userdata('title') == 'vendor') {
                                echo $this->session->userdata('vendor_name');
                            }
                            ?>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right with-arrow panel-default">
                        <!-- User dropdown menu -->
                        <ul class="head-list">
                            <li>
                                <?php
                                if($this->session->userdata('title') == 'admin'){
                                    $url = base_url().'admin/manage_admin/';
                                } elseif ($this->session->userdata('title') == 'vendor') {
                                    $url = base_url().'vendor/manage_vendor/';
                                }
                                ?>
                                <a href="<?php echo $url; ?>">
                                    <i class="fa fa-user fa-fw fa-lg"></i>프로필
                                </a>
                            </li>
                        </ul>

                        <!-- Dropdown footer -->
                        <div class="pad-all text-center">
                            <a href="<?php echo base_url() . $this->session->userdata('title'); ?>/logout/" class="btn btn-primary">
                                <i class="fa fa-sign-out fa-fw"></i>로그아웃
                            </a>
                        </div>
                    </div>
                </li>
                <!--End user dropdown-->
            </ul>
        </div>
    </div>
</header>
