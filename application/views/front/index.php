<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $page_title; ?> | fivendime </title>
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
    include 'footer/footer.php';
    ?>
    <!-- /FOOTER -->

    <div id="to-top" class="to-top"><i class="fa fa-angle-up"></i></div>

</div>
<!-- /WRAPPER -->
<?php
include 'script_texts.php';
?>
<?php
include 'includes/bottom/index.php';
?>

</body>
</html>