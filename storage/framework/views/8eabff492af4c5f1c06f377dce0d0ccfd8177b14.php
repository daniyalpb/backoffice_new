<!DOCTYPE html>
<html>
<head>
</head>
<?php $__currentLoopData = $maildata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
<p>Dear <?php echo e($val->FullName); ?>,</p>
<p><?php echo e($val->message); ?></p>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<div>
	<p>Thanks & Regards</p>
	<p>Team Magic Finmart</p>
	<img src="http://bo.magicfinmart.com/images/logo.png"/>
</div>
</html>
