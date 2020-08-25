<!DOCTYPE html>
<html lang="en">
<head>
  <title>배송조회</title>
  <?php
//  include 'includes/top/index.php';
  ?>
</head>
<style>
  table {
    width: 100%;
  }
  .shipping-invoice {
    width: 100%;
    margin-bottom: 20px;
  }
  .shipping-time, .shipping-position, .shipping-detail {
    width: 33.3%;
  }
  .shipping-table {
    text-align: center;
    font-size: 24px;
  }
  .shipping-table tr {
    height: 50px;
    border-bottom: 1px solid grey;
  }
</style>
<body id="home" class="wide">
<!-- WRAPPER -->
<div class="wrapper">
  <div class="content-area" page_name="shipping-status">
    <div class="shipping_status">
      <div class="shipping-invoice" style="text-align: center; font-size: 24px;">
        <h1><?php echo $shipping_data->shipping_company_name; ?></h1>
        <?php echo $shipping_data->shipping_code; ?>
      </div>
      <div class="shipping-table">
        <table>
          <thead>
          <tr>
            <th class="shipping-time">시간</th>
            <th class="shipping-position">현재위치</th>
            <th class="shipping-detail">배송상태</th>
          </tr>
          </thead>
          <tbody>
          <?php foreach ($shipping_data->data as $data) { ?>
            <tr>
              <td class="shipping-time"><?php echo $data->timeString; ?></td>
              <td class="shipping-position"><?php echo $data->where; ?></td>
              <td class="shipping-detail"><?php echo $data->kind; ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</body>
</html>