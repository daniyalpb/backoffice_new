 <?php $__env->startSection('content'); ?>
<div class="container-fluid white-bg">
	<div class="col-md-12"><h3 class="mrg-btm">View Lead Details</h3></div>
	<div class="col-md-12">
		<div class="overflow-scroll">
			<div class="table-responsive" >
				<table id="tbldateil" class="table table-bordered table-striped tbl" >
	                <thead>
	                 	<tr>
	                 		<th>UID-Name</th>
	                   		<th>Lead Assigned</th>
	                   		<th>Close</th>
	                   		<th>Convert</th>
	              		</tr>
	          		</thead>
		       		<tbody>
		       			<?php $__currentLoopData = $getdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		       			<tr>
			       			<td><?php echo e($val->UIDName); ?></td>
			       			<td><a href="<?php echo e(url('view-lead-details-record/'.$val->assing_to_uid.'/1')); ?>"><?php echo e($val->lead_id); ?></a></td>
			       			<td><a href="<?php echo e(url('view-lead-details-record/'.$val->assing_to_uid.'/2')); ?>"><?php echo e($val->Closed); ?></a></td>
			       			<td><a href="<?php echo e(url('view-lead-details-record/'.$val->assing_to_uid.'/3')); ?>"><?php echo e($val->Converted); ?></a></td>
			    		</tr>
			    		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
	      		</table>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
   $("#tbldateil").DataTable();
   });
</script>

 <?php $__env->stopSection(); ?>
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>