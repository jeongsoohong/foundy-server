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
      <a href="<?php echo base_url(); ?>home/center/profile/<?php echo $center->center_id; ?>">
        <div class="col-md-12 " style="padding: 0 20px 0 20px !important;">
          <table class="col-md-12" style="background-color: white; width: 100%">
            <tbody>
            <tr style="height: 25px">
              <td style="width: 85%">
                <h5 class="center-title" style="margin: 0 !important;"><b><?php echo $center->title; ?></b></h5>
              </td>
              <td style="text-align: right">
                <?php echo $this->crud_model->sns_func_html('bookmark', 'center', false, $center->center_id, 20, 20); ?>
              </td>
            </tr>
            <tr style="height: 23px">
              <td style="width: 85%; padding-top: 8px;">
                <?php echo "{$center->address} {$center->address_detail}"; ?>
              </td>
              <td></td>
            </tr>
            <tr style="height: 23px">
              <td style="width: 85%">
                <span style="color: saddlebrown;"><?php echo $cat; ?></span><br>
              </td>
              <td></td>
            </tr>
            </tbody>
          </table>
        </div>
      </a>
    </li>
<?php } ?>
