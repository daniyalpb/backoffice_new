<!DOCTYPE html>
<html>
<head>
</head>
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
<p>Hello,</p>
<?php if($val->Notification_Title='Port-Request'): ?>
<p>User (<?php echo e($val->FBAID); ?>) was searching for health insurance with company porting option.</p>
<?php else: ?>
<p><?php echo e($val->Email_Body); ?></p>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<div>
	<p>Thanks & Regards</p>
	<p>Team Magic Finmart</p>
	<img src="http://bo.magicfinmart.com/images/logo.png"/>
</div>
</html>
