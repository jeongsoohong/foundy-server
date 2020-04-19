
<?php
$system_name	 =  "Foit Admin";
$system_title	 =  "Foit Admin";
?>
<?php include 'includes_top.php'; ?>
<body>
<div id="container" class="
<?php
//if($page_name=='blog' || $page_name=='blog_category' || $page_name=='display_settings' || $page_name=='product_bundle') {
//    echo 'effect mainnav-sm';
//} else {
//    echo 'effect mainnav-lg';
//}
    echo 'effect mainnav-sm';
?>
">

    <!--NAVBAR-->
    <?php include 'header.php'; ?>
    <!--END NAVBAR-->

    <div class="boxed" id="fol">
        <!--CONTENT CONTAINER-->
        <div>
            <?php include $this->session->userdata('title').'/'.$page_name.'.php' ?>
        </div>
        <!--END CONTENT CONTAINER-->

        <!--MAIN NAVIGATION-->
        <?php include $this->session->userdata('title').'/navigation.php' ?>
        <!--END MAIN NAVIGATION-->
    </div>

    <!-- FOOTER -->
    <?php include 'footer.php'; ?>
    <?php include 'script_texts.php'; ?>
    <!-- END FOOTER -->
    <!-- SCROLL TOP BUTTON -->
    <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
</div>
<!-- END OF CONTAINER -->

<!-- SETTINGS - DEMO PURPOSE ONLY -->
<?php include 'includes_bottom.php'; ?>

