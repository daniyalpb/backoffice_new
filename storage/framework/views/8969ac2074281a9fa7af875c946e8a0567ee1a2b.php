 <?php $__env->startSection('content'); ?>
       <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">OTP Details</h3></div>
<div class="col-md-12">
			 <div class="overflow-scroll">
			 <div class="table-responsive" >
				<table id="otp-details-id" class="table table-bordered table-striped tbl" >
                 <thead>
                  <tr>
                   <th>Mobile No</th>
                   <th>OTP</th>
                   <th>Created Date</th>
                 </tr>
                </thead>
                <tbody>

        <?php $__currentLoopData = $query; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   

       <td><?php echo $val->ValidData; ?></td> 
       <td><?php echo $val->OTP; ?></td>
       <td><?php echo $val->CreaDate; ?></td>
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
    $('#otp-details-id').DataTable( {
        "order": [[ 2, "desc" ]]
    } );
} );

      </script>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>