<link rel="stylesheet" href="<?php echo base_url(); ?>template/back//amcharts/style.css" type="text/css">
<script src="<?php echo base_url(); ?>template/back/amcharts/amcharts.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>template/back/amcharts/serial.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>template/back/plugins/morris-js/morris.min.js"></script>
<script src="<?php echo base_url(); ?>template/back/plugins/gauge-js/gauge.min.js"></script>
<style>
  .panel-bordered {
    height: 100px;
  }
  .panel-body {
    padding: 10px 10px;
    height: auto;
  }
  .panel-body h3 {
    margin: 0;
    line-height: 40px;
  }
</style>
<div id="content-container">
  <div id="page-title">
    <h1 class="page-header text-overflow">대시보드</h1>
  </div>
  <div id="page-content">
    <div class="row">
      <div class="col-md-3 col-lg-3">
        <div class="panel panel-bordered panel-grad2">
          <div class="panel-heading">
            <h3 class="panel-title">전체 스튜디오</h3>
          </div>
          <div class="panel-body">
            <div class="text-center">
              <h3><?php echo $total_center; ?></h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-lg-3">
        <div class="panel panel-bordered panel-dark">
          <div class="panel-heading">
            <h3 class="panel-title">승인 대기 스튜디오</h3>
          </div>
          <div class="panel-body">
            <div class="text-center">
              <h3>
                <?php echo $unapproved_center; ?>
              </h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-lg-3">
        <div class="panel panel-bordered panel-grad2">
          <div class="panel-heading">
            <h3 class="panel-title">전체 온라인 클래스</h3>
          </div>
          <div class="panel-body">
            <div class="text-center">
              <h3><?php echo $total_teacher; ?></h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-lg-3">
        <div class="panel panel-bordered panel-dark">
          <div class="panel-heading">
            <h3 class="panel-title">승인 대기 온라인 클래스</h3>
          </div>
          <div class="panel-body">
            <div class="text-center">
              <h3><?php echo $unapproved_teacher; ?></h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-lg-3">
        <div class="panel panel-bordered panel-grad2">
          <div class="panel-heading">
            <h3 class="panel-title">전체 샵</h3>
          </div>
          <div class="panel-body">
            <div class="text-center">
              <h3><?php echo $total_shop; ?></h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-lg-3">
        <div class="panel panel-bordered panel-dark">
          <div class="panel-heading">
            <h3 class="panel-title">승인 대기 샵</h3>
          </div>
          <div class="panel-body">
            <div class="text-center">
              <h3><?php echo $unapproved_shop; ?></h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-lg-3">
        <div class="panel panel-bordered panel-grad2">
          <div class="panel-heading">
            <h3 class="panel-title">판매중 상품</h3>
          </div>
          <div class="panel-body">
            <div class="text-center">
              <h3><?php echo $product_on_sale; ?></h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-lg-3">
        <div class="panel panel-bordered panel-dark">
          <div class="panel-heading">
            <h3 class="panel-title">승인 대기 상품</h3>
          </div>
          <div class="panel-body">
            <div class="text-center">
              <h3><?php echo $unapproved_product; ?></h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


