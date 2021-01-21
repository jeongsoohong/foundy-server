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
  h3 {
    text-align: center;
  }
  .panel-title {
    color: white;
  }
</style>
<div id="content-container">
  <div id="page-title">
    <h1 class="page-header text-overflow">대시보드</h1>
  </div>
  <div id="page-content">
    <div class="row">
      <div class="col-md-3 col-lg-3">
        <div class="panel panel-bordered panel-dark">
          <div class="panel-heading">
            <h3 class="panel-title">오늘 가입자수</h3>
          </div>
          <div class="panel-body">
            <div class="text-center">
              <h3><?php echo $today_register; ?></h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-lg-3">
        <div class="panel panel-bordered panel-dark">
          <div class="panel-heading">
            <h3 class="panel-title">금주 가입자수</h3>
          </div>
          <div class="panel-body">
            <div class="text-center">
              <h3>
                <?php echo $this_week_register; ?>
              </h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-lg-3">
        <div class="panel panel-bordered panel-dark">
          <div class="panel-heading">
            <h3 class="panel-title">이번달 가입자수</h3>
          </div>
          <div class="panel-body">
            <div class="text-center">
              <h3><?php echo $this_month_register; ?></h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-lg-3">
        <div class="panel panel-bordered panel-dark">
          <div class="panel-heading">
            <h3 class="panel-title">총 가입자수</h3>
          </div>
          <div class="panel-body">
            <div class="text-center">
              <h3>
                <?php echo $total_register; ?>
              </h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-lg-3">
        <div class="panel panel-bordered panel-dark">
          <div class="panel-heading">
            <h3 class="panel-title">오늘 회원 접속자수</h3>
          </div>
          <div class="panel-body">
            <div class="text-center">
              <h3><?php echo $today_member_au; ?></h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-lg-3">
        <div class="panel panel-bordered panel-dark">
          <div class="panel-heading">
            <h3 class="panel-title">오늘 총 접속자수</h3>
          </div>
          <div class="panel-body">
            <div class="text-center">
              <h3>
                <?php echo $today_au; ?>
              </h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-lg-3">
        <div class="panel panel-bordered panel-dark">
          <div class="panel-heading">
            <h3 class="panel-title">이번달 회원 접속자수</h3>
          </div>
          <div class="panel-body">
            <div class="text-center">
              <h3><?php echo $this_month_member_au; ?></h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-lg-3">
        <div class="panel panel-bordered panel-dark">
          <div class="panel-heading">
            <h3 class="panel-title">이번달 총 접속자수</h3>
          </div>
          <div class="panel-body">
            <div class="text-center">
              <h3>
                <?php echo $this_month_au; ?>
              </h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-lg-6">
        <div class="panel panel-bordered panel-dark">
          <div class="panel-heading">
            <h3 class="panel-title">주문완료/배송준비중 상품수/매출</h3>
          </div>
          <div class="panel-body">
            <div class="text-center">
              <h3>
                <?= $shipping_status_1_count; ?>
                /
                <?= $this->crud_model->get_price_str($shipping_status_1_balance); ?>원
              </h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-6">
        <div class="panel panel-bordered panel-dark">
          <div class="panel-heading">
            <h3 class="panel-title">배송중 상품수/매출</h3>
          </div>
          <div class="panel-body">
            <div class="text-center">
              <h3>
                <?= $shipping_status_2_count; ?>
                /
                <?= $this->crud_model->get_price_str($shipping_status_2_balance); ?>원
              </h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-6">
        <div class="panel panel-bordered panel-dark">
          <div class="panel-heading">
            <h3 class="panel-title">배송완료 상품수/매출</h3>
          </div>
          <div class="panel-body">
            <div class="text-center">
              <h3>
                <?= $shipping_status_3_count; ?>
                /
                <?= $this->crud_model->get_price_str($shipping_status_3_balance); ?>원
              </h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-6">
        <div class="panel panel-bordered panel-dark">
          <div class="panel-heading">
            <h3 class="panel-title">구매확정/교환 상품수/매출</h3>
          </div>
          <div class="panel-body">
            <div class="text-center">
              <h3>
                <?= $shipping_status_4_count; ?>
                /
                <?= $this->crud_model->get_price_str($shipping_status_4_balance); ?>원
              </h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-6">
        <div class="panel panel-bordered panel-dark">
          <div class="panel-heading">
            <h3 class="panel-title">주문취소 상품수/매출</h3>
          </div>
          <div class="panel-body">
            <div class="text-center">
              <h3>
                <?= $shipping_status_5_count; ?>
                /
                <?= $this->crud_model->get_price_str($shipping_status_5_balance); ?>원
              </h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-6">
        <div class="panel panel-bordered panel-dark">
          <div class="panel-heading">
            <h3 class="panel-title">반품 상품수/매출</h3>
          </div>
          <div class="panel-body">
            <div class="text-center">
              <h3>
                <?= $shipping_status_6_count; ?>
                /
                <?= $this->crud_model->get_price_str($shipping_status_6_balance); ?>원
              </h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-lg-3">
        <div class="panel panel-bordered panel-dark">
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
        <div class="panel panel-bordered panel-dark">
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
        <div class="panel panel-bordered panel-dark">
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
        <div class="panel panel-bordered panel-dark">
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


