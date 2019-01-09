<?php $__env->startSection('content'); ?>
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">CRM Interaction</h3></div>

<div class="col-md-12">
 <table class='datatable-responsive table table-striped table-bordered dt-responsive nowrap' id='crmineractiontable'>
 	<thead>
 		<tr>
 			<th>History Id</th>
 			<th>Disposition</th>
 			<th>Remark</th>
 			<th>Followup Date</th>
 			<th>FBAID</th>
 			<th>FBA Name</th>
 			<th>Status</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $__currentLoopData = $crmdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 		<tr>
 			<td><?php echo e($val->history_id); ?></td>
 			<td><?php echo e($val->disposition); ?></td>
 			<td><?php echo e($val->remark); ?></td>
 			<td><?php echo e($val->followup_date); ?></td>
 			<td><?php echo e($val->FBAID); ?></td>
 			<td><?php echo e($val->FullName); ?></td>
 			<?php if($val->action=='y'): ?>
 			<td ><p style="color:green">Open</p></td>
 			<?php else: ?>
 			<td><p style="color: red">Close</p></td>
 			<?php endif; ?>
 		</tr>
 		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 	</tbody>
 </table>
</div>
</div>
<script type="text/javascript">
$( document ).ready(function() {
       $("#crmineractiontable").DataTable();
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>