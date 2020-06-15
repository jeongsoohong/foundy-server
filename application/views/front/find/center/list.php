<?php
foreach ($center_data as $center) {
  $cat = '';
  $categories = $this->db->get_where('center_category', array('center_id' => $center->center_id))->result();
  foreach($categories as $category) {
    $cat .= $category->category . '/';
  }
  $cat[strlen($cat) - 1] = "\0";
  ?>
    <li style="padding: 10px 0 10px 0 !important;">
      <div class="col-md-12 " style="padding: 0 10px 0 10px !important;">
        <table class="col-md-12" style="background-color: white; width: 100%">
          <tbody>
          <tr style="height: 25px">
            <td style="width: 85%">
              <a href="<?php echo base_url(); ?>home/center/profile/<?php echo $center->center_id; ?>">
              <h5 class="center-title"><?php echo $center->title; ?></h5>
              </a>
            </td>
            <td rowspan="3" style="text-align: center">
              <?php echo $this->crud_model->sns_func_html('bookmark', 'center', false, $center->center_id, 20, 20); ?>
            </td>
          </tr>
          <tr style="height: 25px">
            <td style="width: 85%">
              <?php echo "{$center->address} {$center->address_detail}"; ?>
            </td>
          </tr>
          <tr style="height: 25px">
            <td style="width: 85%">
              <span style="color: saddlebrown;"><?php echo $cat; ?></span><br>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </li>
<?php } ?>
