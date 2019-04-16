<?php $__env->startSection('content'); ?>

<div class="container-fluid white-bg">
	<div class="col-md-12"><h3 class="mrg-btm">Contact Sync SMS Log</h3></div>
		<br>
		<div class="col-md-12">
			 <div class="overflow-scroll">
			 	<div class="table-responsive" >
					<table id="tbldateil" class="table table-bordered table-striped tbl" >
                 		<thead>
                 		<tr>
                 			<th>FBAID</th>
                   			<th>Name</th>
                   			<th>Log Date</th>
                   			<th>Contact Sync Count</th>
              			</tr>
          			</thead>
	       			<tbody>
	       			<?php $__currentLoopData = $getdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		       			<tr>
		       				<td><?php echo e($val->FBAID); ?></td>
		       				<td><?php echo e($val->FullName); ?></td>
		       				<td><?php echo e($val->created_date); ?></td>
		       				<td><?php echo e($val->count); ?></td>
		    			</tr>
		    		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
      			</table>
			</div>
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