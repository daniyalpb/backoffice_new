<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
</style>
</head>
<p>Dear User,</p>
<?php $__currentLoopData = $maildata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<p>You have assigned Followup From <b><?php echo e($val->EmployeeName); ?></b>(<?php echo e($val->MobileNo); ?>-<?php echo e($val->EmployeeCategory); ?>) on <?php echo e($val->followup_date); ?> for <?php echo e($val->disposition); ?></p>
<table>	
	<tr>
		<th>FBAID</th>
		<td><?php echo e($val->FBAID); ?></td>
	</tr>
	<tr>
		<th>FBA Name</th>
		<td><?php echo e($val->FullName); ?></td>
	</tr>
	<tr>
		<th>FBA Phone No.</th>
		<td><?php echo e($val->MobiNumb1); ?></td>
	</tr>
	<tr>
		<th>FBA Email</th>
		<td><?php echo e($val->EmailID); ?></td>
	</tr>
	<tr>
		<th>Disposition</th>
		<td><?php echo e($val->disposition); ?></td>
	</tr>
	<tr>
		<th>Remark</th>
		<td><?php echo e($val->remark); ?></td>
	</tr>
		<tr>
		<th>Followup Date</th>
		<td><?php echo e($val->followup_date); ?></td>
	</tr>
	<tr>
		<th>Created Date</th>
		<td><?php echo e($val->create_at); ?></td>
	</tr>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<div>
	<p>Thanks & Regards</p>
	<p>Team Magic Finmart</p>
	<img src="http://bo.magicfinmart.com/images/logo.png"/>
</div>
</html>	