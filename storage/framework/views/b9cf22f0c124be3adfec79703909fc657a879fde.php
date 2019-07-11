 <?php $__env->startSection('content'); ?>
       <form id= "rm_form" name="rm_form" method="GET"> 
<?php echo e(csrf_field()); ?>

       <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">FBA Details</h3></div>
<div class="col-md-12">
			 <div class="overflow-scroll">
			 <div class="table-responsive" >
			 <table id="fieldsales-details-id" class="table table-bordered table-striped tbl" >
                 <thead>
                  <tr>
                   <th>FBA ID</th>
                   <th>Name</th>
                   <th>Mobile No</th>
                   <th>Email </th>
                   <th>City </th>
              
                   
                 </tr>
                </thead>
                <tbody>
                  <?php if(isset($fieldfbadata)): ?>
  <?php $__currentLoopData = $fieldfbadata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
        <td><?php echo $val->fba_id; ?></td>
        <td><?php echo $val->FullName; ?></td> 
        <td><?php echo $val->MobiNumb1; ?></td>
        <td><?php echo $val->EmailID; ?></td> 
        <td><?php echo $val->City; ?></td>
        
      
      </tr>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <?php endif; ?>
      
      </tbody>
      </table>
			</div>
			</div>
			</div>
      </div>
      </form>



      <script type="text/javascript">
$(document).ready(function() {
    $('#fieldsales-details-id').DataTable( {
        "order": [[ 2, "desc" ]]
    } );
} );

      </script>
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>