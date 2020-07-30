<?php
foreach($center_data as $row)
{
  ?>
  <div id="content-container" style="padding-top:0px !important;">
    <div class="text-center pad-all">
      <div class="pad-ver">
        <?php
        if(file_exists('uploads/vendor_logo_image/logo_'.$row['center_id'].'.png')){
          ?>
          <img class="img-sm img-border"
               src="<?php echo base_url(); ?>uploads/vendor_logo_image/logo_<?php echo $row['center_id']; ?>
                    .png" />
          <?php
        } else {
          ?>
          <img class="img-sm img-border"
               src="<?php echo base_url(); ?>uploads/vendor_logo_image/default.jpg" alt="">
          <?php
        }
        ?>
      </div>
      <h4 class="text-lg text-overflow mar-no"><?php echo $row['center_id']?></h4>
      <p class="text-sm"><?php echo ('center');?></p>
      <div class="pad-ver btn-group">
        <!--                --><?php //if($row['facebook'] != ''){ ?>
        <!--                    <a href="--><?php //echo $row['facebook'];?><!--" target="_blank" class="btn btn-icon btn-hover-primary fa fa-facebook icon-lg"></a>-->
        <!--                --><?php //} if($row['skype'] != ''){ ?>
        <!--                    <a href="--><?php //echo $row['skype'];?><!--" target="_blank" class="btn btn-icon btn-hover-info fa fa-twitter icon-lg"></a>-->
        <!--                --><?php //} if($row['google_plus'] != ''){ ?>
        <!--                    <a href="--><?php //echo $row['google_plus'];?><!--" target="_blank" class="btn btn-icon btn-hover-danger fa fa-google-plus icon-lg"></a>-->
        <!--                --><?php //} ?>
        <!--                <a href="mailto:--><?php //echo $row['email']; ?><!--" class="btn btn-icon btn-hover-mint fa fa-envelope icon-lg"></a>-->
      </div>
      <hr>
    </div>


    <div class="row">
      <div class="col-sm-12">
        <div class="panel-body">
          <table class="table table-striped" style="border-radius:3px;">
            <tr>
              <th class="custom_td"><?php echo ('센터명');?></th>
              <td class="custom_td"><?php echo $row['title'];?></td>
            </tr>
            <tr>
              <th class="custom_td"><?php echo ('전화번호');?></th>
              <td class="custom_td"><?php echo $row['phone']; ?></td>
            </tr>
            <tr>
              <th class="custom_td"><?php echo ('주소');?></th>
              <td class="custom_td"><?php echo $row['address']; ?></td>
            </tr>
            <tr>
              <th class="custom_td"><?php echo ('지도');?></th>
              <td class="custom_td"></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php
}
?>

<style>
  .custom_td{
    border-left: 1px solid #ddd;
    border-right: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
  }
</style>
<script type="text/javascript">
  $(document).ready(function(){
    $('.enterer').hide();
  });
</script>
