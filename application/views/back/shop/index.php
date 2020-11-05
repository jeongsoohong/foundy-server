<?php
$system_name	 =  "Foundy Shop";
$system_title	 =  "Foundy Shop";
?>
<?php include 'includes_top.php'; ?>
<body class="activeit-ready">
<div id="container" class="effect mainnav-md">
  <!--NAVBAR-->
  <?php include 'header.php'; ?>
  <!--END NAVBAR-->
  <div class="boxed" id="fol">
    <!--CONTENT CONTAINER-->
    <div>
      <?php include $page_name.'.php' ?>
    </div>
    <!--END CONTENT CONTAINER-->
  </div>
  <!-- FOOTER -->
<!--  --><?php //include 'footer.php'; ?>
  <!-- END FOOTER -->
</div>
<!-- END OF CONTAINER -->
<div id="loading_set"style="display:none;text-align:center;width:100%;height:100%;position:fixed;top:0;left:0;z-index:5000;background-color:rgba(20,20,20,0.5)">
  <i class="fa fa-refresh fa-spin fa-5x fa-fw" style="position:relative;top:50%"></i>
</div>
<?php include 'javascript.php'; ?>
</body>
</html>

