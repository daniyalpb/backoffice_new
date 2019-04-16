 <?php $__env->startSection('content'); ?>
<div class="container-fluid white-bg">
	<div class="col-md-12"><h3 class="mrg-btm">View Lead Details</h3></div>
	<div class="col-md-12">
		<div class="overflow-scroll">
			<div class="table-responsive" >
				<table id="tbldateil" class="table table-bordered table-striped tbl" >
	                <thead>
	                 	<tr>
	                 		<th>Lead Id</th>
							<th>Phone No</th>
							<th>Name</th>
							<th>Location</th>
							<th>Cust Id</th>
							<th>Campaign Name</th>
							<th>Assing To Uid</th>
							<th>Fba Converted Id</th>
							<th>Created Date</th>
							<th>Converted Date</th>
							<th>Priority</th>
							<th>Status</th>
							<th>Call Send</th>
							<th>City</th>
							<th>State</th>
							<th>Zone</th>
							<th>PL Available</th>
							<th>Language Skill Required</th>
							<th>Created By</th>
	              		</tr>
	          		</thead>
		       		<tbody>
		       		<?php $__currentLoopData = $getallleaddata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
		       			<tr>
			       			<td><button type="button" class="btn btn-link" onclick="getleaddetails(<?php echo e($val->lead_id); ?>)"><?php echo e($val->lead_id); ?></button></td>
							<td><?php echo e($val->phone_no); ?></td>
							<td><?php echo e($val->name); ?></td>
							<td><?php echo e($val->location); ?></td>
							<td><?php echo e($val->cust_id); ?></td>
							<td><?php echo e($val->campaignname); ?></td>
							<td><?php echo e($val->assing_to_uid); ?></td>
							<td><?php echo e($val->fba_converted_id); ?></td>
							<td><?php echo e($val->created_date); ?></td>
							<td><?php echo e($val->converted_date); ?></td>
							<td><?php echo e($val->priority); ?></td>
							<td><?php echo e($val->status); ?></td>
							<td><?php echo e($val->callsend); ?></td>
							<td><?php echo e($val->City); ?></td>
							<td><?php echo e($val->State); ?></td>
							<td><?php echo e($val->Zone); ?></td>
							<td><?php echo e($val->PL_Available); ?></td>
							<td><?php echo e($val->Language_Skill_Required); ?></td>
							<td><?php echo e($val->Created_by); ?></td>
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

<script type="text/javascript">
	function getleaddetails(leadid){
		$('#dispo').html('');
		$('#rema').html('');
		$('#datetime').html('');
		$.ajax({
			type:'GET',
			url:"<?php echo e(URL::to('get-lead-details/leadid')); ?>",
			dataType: 'JSON',
			data:{leadid:leadid},
			success: function(data){
				if(data != '' && data != null){
					 $('#myModal').modal('show');
					 $('#dispo').append(data[0].disposition);
					 $('#rema').append(data[0].remark);
					 $('#datetime').append(data[0].created_date);
				}else{
					alert("Details Does Not Found!");
				}	
			}
		});
	}
</script>

 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title">Lead Details</h4></center>
        </div>
        <div class="modal-body">
          <label><b><u>Disposition</u> : </b></label>&nbsp&nbsp<label id="dispo"></label><br><br>
          <label><b><u>Remark</u> : </b></label>&nbsp&nbsp<label id="rema"></label><br><br>
          <label><b><u>Date Time</u> : </b></label>&nbsp&nbsp<label id="datetime"></label>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->

 <?php $__env->stopSection(); ?>


<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>