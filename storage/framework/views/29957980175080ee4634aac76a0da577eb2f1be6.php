<?php $__env->startSection('content'); ?>

<div class="container-fluid white-bg">
	 <?php if(Session::has('message1')): ?>
    	<div class="alert alert-info alert"><?php echo e(Session::get('message1')); ?></div>
	 <?php endif; ?>
	<div class="col-md-12"><h3 class="mrg-btm">Marketing Campaign Master</h3></div>
		<a href="<?php echo e(url('Add-Marketing-Campaign-Master-View')); ?>" class="qry-btn" id="pospbtn">Add New Marketing Campaign Master</a> <br>
		<br>
		<div class="col-md-12">
			 <div class="overflow-scroll">
			 	<div class="table-responsive" >
					<table id="tbldateil" class="table table-bordered table-striped tbl" >
                 		<thead>
                 		<tr>
                 			<th>ID</th>
                   			<th>Title</th>
                   			<th>Type</th>
                   			<th>Short Discription</th>
                   			<th>Discription</th>
                     		<th>End Date</th>
                     		<th>Edit</th>
                   			<th>Delete</th>
              			</tr>
          			</thead>
	       			<tbody>
	       			<?php $__currentLoopData = $getdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		       			<tr>
		       				<td><?php echo e($val->id); ?></td>
		       				<td><?php echo e($val->Title); ?></td>
		       				<td><?php echo e($val->type); ?></td>
		       				<td><?php echo e($val->shortdescription); ?></td>
		       				<td><?php echo e($val->Description); ?></td>
		       				<td><?php echo e($val->enddate); ?></td>
		       				<td><a href="<?php echo e(url('Edit-marketing-campaign-master/'.$val->id)); ?>" class="btn btn-info" role="button">Edit</a></td>
		       				<td><a href="<?php echo e(url('delete-marketing-campaign-master/'.$val->id)); ?>" class="btn btn-danger" role="button">Delete</a></td>
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

<script type="text/javascript">
	$("document").ready(function(){
		setTimeout(function(){
		    $("div.alert").remove();
		}, 2000 ); // 5 secs
    });
</script>
<?php $__env->stopSection(); ?>		
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>