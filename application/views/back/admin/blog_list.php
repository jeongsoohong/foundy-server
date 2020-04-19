<div class="panel-body" id="demo_s">
    <table id="demo-table" class="table table-striped"  data-pagination="true" data-show-refresh="true" data-ignorecol="0,6" data-show-toggle="true" data-show-columns="false" data-search="true" >
        <thead>
            <tr>
                <th><?php echo ('제목');?></th>
                <th><?php echo ('작성일');?></th>
                <th class="text-right"><?php echo ('옵션');?></th>
            </tr>
        </thead>

        <tbody >
        <?php
            $i=0;
            foreach($all_blogs as $row){
                $i++;
        ?>
        <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td class="text-right">
                <a class="btn btn-success btn-xs btn-labeled fa fa-wrench" data-toggle="tooltip" 
                    onclick="ajax_set_full('edit','<?php echo ('edit_blog'); ?>','<?php echo ('정상적으로 수정되었습니다!'); ?>','blog_edit','<?php echo $row['blog_id']; ?>');proceed('to_list');" data-original-title="Edit" data-container="body">
                        <?php echo ('수정');?>
                </a>
                <a onclick="delete_confirm('<?php echo $row['blog_id']; ?>','<?php echo ('정말 삭제하시겠습니까?'); ?>')"
                    class="btn btn-danger btn-xs btn-labeled fa fa-trash" data-toggle="tooltip" data-original-title="Delete" data-container="body">
                        <?php echo ('삭제');?>
                </a>
            </td>
        </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>


