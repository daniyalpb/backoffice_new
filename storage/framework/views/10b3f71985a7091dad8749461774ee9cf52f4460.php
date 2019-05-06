<?php $__env->startSection('content'); ?>
<?php if($errors->any()): ?>
<div class="alert alert-info fade in alert-dismissible show">
 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true" style="font-size:20px">×</span>
  </button><strong>No Intraction!</strong><?php echo e($errors->first()); ?>

</div>
<?php endif; ?>
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">Recruitment Caller Target by Vintage</h3></div>

<div class="col-md-12">
	<table class="table-responsive table table-striped table-bordered dt-responsive nowrap">
  <tr>
    <th><b>Vintage</b></th>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <th><?php echo e($val->month); ?></th>  
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tr>
  <tr>
    <th><b>Certified POSP Target</b></th>
     <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <td><b><?php echo e($val->target); ?></b></td>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tr>
  <tr>
    <th><b>Achieved</b></th>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <td><b><?php echo e($val->businesscount); ?></b></td>   
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
  </tr>
</table>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>