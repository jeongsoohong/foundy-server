<div id="content-container">
	<div id="page-title">
		<h1 class="page-header text-overflow"><?php echo ('Manage Teachers');?></h1>
</div>
<div class="tab-base">
    <div class="panel">
        <div class="panel-body">
            <div class="tab-content">
                <div class="col-md-12"></div>
                <br>
                <!-- LIST -->
                <div class="tab-pane fade active in" id="list" style="border:1px solid #ebebeb; border-radius:4px;">
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    var base_url = '<?php echo base_url(); ?>'
    var user_type = 'admin';
    var module = 'teacher';
    var list_cont_func = 'list/<?php echo $list_type; ?>';
    var dlt_cont_func = 'delete';
</script>
<script src="https://checkout.stripe.com/checkout.js"></script>
