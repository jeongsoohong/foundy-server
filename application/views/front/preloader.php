<link href="<?php echo base_url(); ?>template/front/preloader/css/Icomoon/style.css" rel="stylesheet" type="text/css" />
<?php
if(isset($from_admin)){
  ?>
  <!--jQuery [ REQUIRED ]-->
  <script src="<?php echo base_url(); ?>template/back/js/jquery-2.1.1.min.js"></script>
  <style>
    #loading{
      zoom:.4;
    }
    body{
      margin-left:0px !important;
    }
  </style>
  <?php
} else {
  ?>
  <script type="text/javascript">
    //$(window).load(function() {
    $(document).ready(function(e) {
      $("#loading").delay(500).fadeOut(500);
      $("#loading-center").click(function() {
        $("#loading").fadeOut(500);
      });
      // setTimeout(function(){ load_iamges(); }, 1000);
    });
  </script>
  
  <?php
}
?>
<?php
include 'preloader/13.php';
?>
<style>
  #loading{
    /*background-color: rgba(150,147,150,1);*/
    background-color: rgba(241,238,232,1);
    height: 100%;
    width: 100%;
    position: fixed;
    z-index: 1050;
    margin-top: 0px;
    top: 0px;
  }
</style>
