<?php $__env->startSection('content'); ?>
<div class="container-fluid white-bg">
	<div class="col-md-12"><h3 class="mrg-btm">My Alerts</h3></div>
	<table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" data-sort-name="stargazers_count"
	data-sort-order="desc" id="tblmyalerts">
	<thead>
		<tr>  
			<th>ID</th>
			<th>Notification Title</th>
			<th>Notifiaction</th>
			<th>Created Date</th>
		</tr>
	</thead>
	<tbody>
		<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr>
			<td><?php echo e($val->id); ?></td>
			<td><?php echo e($val->Notification_Title); ?></td>
			<td><textarea readonly><?php echo e($val->Notification_Body); ?></textarea></td>
			<td><?php echo e($val->created_date); ?></td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>
</table>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#tblmyalerts').dataTable({
			"ordering": false
		});

	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>