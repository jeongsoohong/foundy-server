<?php
$system_name	 =  "Foundy Center";
$system_title	 =  "Foundy Center";
?>
<?php include 'includes_top.php'; ?>
<body id="allwrap">
<div id="whole">
  <!--NAVBAR-->
  <?php include 'header.php'; ?>
  <!--END NAVBAR-->
  <section class="boxwrap">
    <!--CONTENT CONTAINER-->
    <?php include $page_name.'.php' ?>
    <!--END CONTENT CONTAINER-->
  </section>
</div>
<!-- END OF CONTAINER -->
<div id="loading_set"style="display:none;text-align:center;width:100%;height:100%;position:fixed;top:0;left:0;z-index:5000;background-color:rgba(20,20,20,0.5)">
  <i class="fa fa-refresh fa-spin fa-5x fa-fw" style="position:relative;top:50%"></i>
</div>
<?php include 'javascript.php'; ?>
</body>
</html>

