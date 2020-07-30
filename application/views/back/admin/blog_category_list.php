<div class="panel-body" id="demo_s">
  <table id="demo-table" class="table table-striped"  data-pagination="true" data-show-refresh="true" data-ignorecol="0,2" data-show-toggle="true" data-show-columns="false" data-search="true" >

    <thead>
    <tr>
      <th>no</th>
      <th>name</th>
      <th>desc</th>
      <th class="text-right">options</th>
    </tr>
    </thead>

    <tbody >
    <?php
    $i = 0;
    foreach($all_categories as $row){
      $i++;
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['desc']; ?></td>
        <td class="text-right">
          <?php if ($row['type'] == BLOG_TYPE_DEFAULT) { ?>
          <a class="btn btn-edit btn-xs btn-labeled fa fa-wrench" data-toggle="tooltip"
             onclick="ajax_modal('edit','<?php echo ('edit_blog_category'); ?>','<?php echo ('successfully_edited!'); ?>','blog_category_edit','<?php echo $row['category_id']; ?>')"
             data-original-title="Edit" data-container="body">
            <?php echo ('edit');?>
          </a>
          <a onclick="delete_confirm('<?php echo $row['category_id']; ?>','<?php echo ('really_want_to_delete_this?'); ?>')" class="btn btn-danger btn-xs btn-labeled fa fa-trash" data-toggle="tooltip"
             data-original-title="Delete" data-container="body">
            <?php echo ('delete');?>
          </a>
          <?php } ?>
        </td>
      </tr>
      <?php
    }
    ?>
    </tbody>
  </table>
</div>

<div id='export-div'>
  <h1 style="display:none;"><?php echo ('blog_category'); ?></h1>
  <table id="export-table" data-name='blog_category' data-orientation='p' style="display:none;">
    <thead>
    <tr>
      <th>no</th>
      <th>name</th>
      <th>desc</th>
    </tr>
    </thead>

    <tbody >
    <?php
    $i = 0;
    foreach($all_categories as $row){
      $i++;
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['desc']; ?></td>
      </tr>
      <?php
    }
    ?>
    </tbody>
  </table>
</div>

