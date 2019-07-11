<?php $__env->startSection('content'); ?>


<div class="container-fluid white-bg">
	<div class="col-md-12"><h3 class="mrg-btm"> Campaign Description</h3></div>
	<div class="col-md-12">
		<div class="overflow-scroll">
			<div class="table-responsive" >
				<table id="tbl-marketing-campaign" class="table table-bordered table-striped tbl">
					<thead>
						<tr>
							<th>ID</th>
							<th>Title</th>
							<th>Short Description</th>
							
						</tr>
					</thead>
					<tbody>
						<?php $__currentLoopData = $datacampign; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
						<td><?php echo $val->id; ?></td> 
						<td><?php echo $val->Title; ?></td>
						<td><?php echo $val->shortdescription; ?></td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>

<script type="text/javascript">
	
	$(document).ready(function() {
		$('#tbl-marketing-campaign').DataTable( {
			"order": [[ 2, "desc" ]]
		} );
	} );

</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>