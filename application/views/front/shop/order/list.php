<?php foreach ($purchase_infos as $info) { ?>
  <li>
    <a href="<?php echo base_url().'home/shop/order/detail?c='.$info->purchase_code; ?>">
      <div>
        <span style="color: grey; font-size: 10px; ">
          <?php echo $info->payment_info->purchased_at.' '.$this->crud_model->get_purchase_status_str($info->status); ?>
        </span><br>
        <h6 style="font-size:14px; margin: 5px 0 !important;"><?php echo $info->payment_info->item_name; ?>
          <span class="pull-right">바로가기 <span class="fa fa-angle-right"></span>
        </h6>
      </div>
    </a>
  </li>
<?php }?>