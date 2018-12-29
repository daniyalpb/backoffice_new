

<?php $__env->startSection('content'); ?>
<div>
    <img src="<?php echo e(url('images/images1.png')); ?>" style="width: 140px; margin: 0 auto; display: block;">
</div>

<style>
.button{
	background-color: #302438;
	border-radius:5px;
	color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
}
.button:hover
{
	color: white;

}
</style>

<center>
	<br>
	<h3>You are not allowed to access this page</h3>
	<br><br>
	<a class="button" href="/">HOME</a>
</center>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>