<?php
foreach($blog_category_data as $row){
  ?>
  <div class="tab-pane fade active in" id="edit">
    <?php
    echo form_open(base_url() . 'admin/blog_category/update/' . $row['category_id'], array(
      'class' => 'form-horizontal',
      'method' => 'post',
      'id' => 'blog_category_edit',
      'enctype' => 'multipart/form-data'
    ));
    ?>
    <div class="panel-body">
      <div class="form-group">
        <label class="col-sm-4 control-label" for="demo-hor-1">
          name
        </label>
        <div class="col-sm-6">
          <input type="text" name="name"
                 value="<?php echo $row['name'];?>" id="demo-hor-1"
                 class="form-control required" placeholder="name" >
        </div>
        <label class="col-sm-4 control-label" for="demo-hor-1">
          desc
        </label>
        <div class="col-sm-6">
          <input type="text" name="desc"
                 value="<?php echo $row['desc'];?>" id="demo-hor-1"
                 class="form-control required" placeholder="desc" >
        </div>
      </div>
    </div>
    </form>
  </div>
  <?php
}
?>

<script>
  $(document).ready(function() {
    $("form").submit(function(e) {
      return false;
    });
  });
</script>