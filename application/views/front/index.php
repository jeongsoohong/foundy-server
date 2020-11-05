<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo strtoupper($page_title); ?> | FOUNDY</title>
    <?php
    include 'includes/top/index.php';
    ?>
</head>
<body id="home" class="wide">
<!-- PRELOADER -->
<?php
include 'preloader.php';
?>
<!-- WRAPPER -->
<div class="wrapper">

    <!-- HEADER -->
    <?php
    include 'header/header.php';
    ?>
    <!-- /HEADER -->

    <!-- CONTENT AREA -->
    <div class="content-area" page_name="<?= $page_name?>">
        <?php
        include $page_name.'/index.php';
        ?>
    </div>
    <!-- /CONTENT AREA -->

    <!-- FOOTER -->
    <?php
    if ($page_title == 'home') {
      include 'footer/footer.php';
    }
    ?>
    <!-- /FOOTER -->

    <div id="to-top" class="to-top" style="bottom:100px !important; display: none;"><i class="fa fa-angle-up" style="font-family: FontAwesome !important;"></i></div>

</div>
<!-- /WRAPPER -->
<?php
include 'script_texts.php';
?>
<?php
include 'includes/bottom/index.php';
?>
<div id="loading_set"style="display:none;text-align:center;width:100%;height:100%;position:fixed;top:0;left:0;z-index:5000;background-color:rgba(20,20,20,0.5)">
  <i class="fa fa-refresh fa-spin fa-5x fa-fw" style="position:relative;top:50%"></i>
</div>

</body>
</html>
