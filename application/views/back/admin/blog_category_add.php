<div>
  <?php
  echo form_open(base_url() . 'admin/blog_category/do_add/', array(
    'class' => 'form-horizontal',
    'method' => 'post',
    'id' => 'blog_category_add',
    'enctype' => 'multipart/form-data'
  ));
  ?>
  <div class="panel-body">
    <div class="form-group">
      <label class="col-sm-4 control-label" for="demo-hor-1">
        name
      </label>
      <div class="col-sm-6">
        <input type="text" name="name" id="demo-hor-1"
               class="form-control required" placeholder="name" >
      </div>
      <label class="col-sm-4 control-label" for="demo-hor-1">
        desc
      </label>
      <div class="col-sm-6">
        <input type="text" name="desc" id="demo-hor-1"
               class="form-control required" placeholder="desc" >
      </div>
    </div>
  </div>
  </form>
</div>

<script>
  $(document).ready(function() {
    $("form").submit(function(e){
      event.preventDefault();
    });
  });
</script>