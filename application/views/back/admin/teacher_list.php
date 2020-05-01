<div class="panel-body" id="demo_s">
    <table id="demo-table" class="table table-striped"  data-pagination="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" >
        <thead>
            <tr>
                <th><?php echo ('로고');?></th>
                <th><?php echo ('유저아이디');?></th>
                <th><?php echo ('강사아이디');?></th>
                <th><?php echo ('소개글');?></th>
                <th><?php echo ('상태');?></th>
                <th class="text-right"><?php echo ('옵션');?></th>
            </tr>
        </thead>
        <tbody >
<?php
$i = 0;
foreach($all_teachers as $row){
    $i++;
    ?>
    <tr>
        <td>
            <?php
            if(file_exists('uploads/vendor_logo_image/logo_'.$row['teacher_id'].'.png')){
                ?>
                <img class="img-sm img-border"
                     src="<?php echo base_url(); ?>uploads/vendor_logo_image/logo_<?php echo $row['teacher_id']; ?>
                     .png" />
                <?php
            } else {
                ?>
                <img class="img-sm img-border"
                     src="<?php echo base_url(); ?>uploads/vendor_logo_image/default.jpg" alt="">
                <?php
            }
            ?>

        </td>
        <td><?php echo $row['user_id']; ?></td>
        <td><?php echo $row['teacher_id']; ?></td>
        <td><?php echo $row['introduce']; ?></td>
        <td>
            <div class="label label-<?php if($row['activate'] == 1){ ?>purple<?php } else { ?>danger<?php }
            ?>">
                <?php echo $row['activate'] ? '승인' : '미승인'; ?>
            </div>
        </td>
        <td class="text-right">
            <a class="btn btn-dark btn-xs btn-labeled fa fa-user" data-toggle="tooltip"
               onclick="ajax_modal('view','<?php echo ('view_profile'); ?>','<?php echo ('successfully_viewed!');
               ?>','teacher_view','<?php echo $row['teacher_id']; ?>')" data-original-title="View"
               data-container="body">
                <?php echo ('프로필');?>
            </a>
            <a class="btn btn-success btn-xs btn-labeled fa fa-check" data-toggle="tooltip"
               onclick="ajax_modal('approval','<?php echo ('teacher_approval'); ?>','<?php echo ('successfully_viewed!'); ?>','teacher_approval','<?php echo $row['teacher_id']; ?>')" data-original-title="View" data-container="body">
                <?php echo ('승인');?>
            </a>
            <a onclick="delete_confirm('<?php echo $row['teacher_id']; ?>','<?php echo ('정말 삭제하시겠습니까?');
            ?>')" class="btn btn-xs btn-danger btn-labeled fa fa-trash" data-toggle="tooltip"
               data-original-title="Delete" data-container="body">
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
<div id="vendr"></div>
<div id='export-div' style="padding:40px;">
    <h1 id ='export-title' style="display:none;"><?php echo ('teachers'); ?></h1>
    <table id="export-table" class="table" data-name='vendors' data-orientation='p' data-width='1500' style="display:none;">
        <colgroup>
            <col width="50">
            <col width="50">
            <col width="50">
            <col width="150">
            <col width="50">
            <col width="50">
        </colgroup>
        <thead>
        <tr>
            <th><?php echo ('번호');?></th>
            <th><?php echo ('유저아이디');?></th>
            <th><?php echo ('강사아이디');?></th>
            <th><?php echo ('소개글');?></th>
            <th><?php echo ('승인상태');?></th>
            <th><?php echo ('이메일');?></th>
        </tr>
        </thead>



        <tbody >
        <?php
        $i = 0;
        foreach($all_teachers as $row){
            $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['introduce']; ?></td>
                <td><?php echo $row['activate'] ? '승인' : '미승인'; ?></td>
                <td><?php echo $row['email']; ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>

