
<?php $__env->startSection('content'); ?>

<div class="container">
         <table   class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" >
         	<thead><tr>
         	<th>FBA ID</th>
         	<th>Full Name</th>
         	<th>Phone Number</th>
         	<th>Email ID</th>
         	<th>state</th>
         	<th>City</th>
         	</tr></thead>
         	<tbody><tr>
         	<td><?php echo e($fba_details->FBAID); ?></td>
         	<td><?php echo e($fba_details->FullName); ?></td>
         	<td><?php echo e($fba_details->MobiNumb1); ?></td>
         	<td><?php echo e($fba_details->EmailID); ?></td>
         	<td><?php echo e($fba_details->state_name); ?></td>
         	<td><?php echo e($fba_details->City); ?></td>
         	</tr></tbody>
         </table>

 
</div>




<div class="container">
         <table   class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" >
         	<thead><tr>
         <!-- 	<th> FBA ID</th> -->
           <th>PB Status</th>
         	<th>CRN</th>
         	<th>Contact Name</th>
         	<th>Sum Insured</th>
         	<th>Date</th>
         	<th>Pincode</th>
            

            
         	</tr></thead>
         	<tbody>
            <?php $__currentLoopData = $health; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
             <!--  <td><?php echo e($val->fba_id); ?></td> -->
              <td><?php echo e($val->PBStatus); ?></td>
               <td><?php echo e($val->crn); ?></td>
               <td><?php echo e($val->ContactName); ?></td>
                <td><?php echo e($val->SumInsured); ?></td>
                 <td><?php echo e($val->ApplDate); ?></td>
                  <td><?php echo e($val->pincode); ?></td>

         	  </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
         </table>

 
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>