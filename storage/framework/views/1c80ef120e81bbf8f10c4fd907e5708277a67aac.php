 
 <?php $__env->startSection('content'); ?>
 <div id="content" style="overflow:scroll;">
  <div class="container-fluid white-bg">
    <div class="col-md-12"><h3 class="mrg-btm">Pincode Mapping</h3></div>
    <div class="col-md-12">
      <div class="overflow-scroll">
        <div class="table-responsive" >
          <table id="example" class="table table-bordered table-striped tbl" >
            <thead>
              <tr>
                <th>Pincode</th>
                <th>RRM</th>
                <th>FieldManager</th>
                <th>Recruiter</th>
                <th>TrainingOps</th>
                <th>Loan</th>
                <th>Motor</th>
                <th>Health</th>
                <th>OnBoarding</th>
                <th>FieldSales</th>
                <th>ClusterHead</th>
                <th>StateHead</th>
                <th>ZonalHead</th>
              </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $smdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($val->pincode); ?></td>                
                <td><?php echo e($val->RRM); ?></td>                
                <td><?php echo e($val->FieldManager); ?></td>                
                <td><?php echo e($val->Recruiter); ?></td>                
                <td><?php echo e($val->TrainingOps); ?></td>                
                <td><?php echo e($val->ProductLoan); ?></td>                
                <td><?php echo e($val->ProductMotor); ?></td>                
                <td><?php echo e($val->ProductHealth); ?></td>                
                <td><?php echo e($val->OnBoarding); ?></td>                
                <td><?php echo e($val->FieldSales); ?></td>                
                <td><?php echo e($val->ClusterHead); ?></td>                
                <td><?php echo e($val->StateHead); ?></td>                
                <td><?php echo e($val->ZonalHead); ?></td>
              </tr>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
           </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>