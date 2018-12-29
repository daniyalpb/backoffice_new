<?php $__env->startSection('content'); ?>
 <div id="content" style="overflow:scroll;">
			 <div class="container-fluid white-bg">
			 <div class="col-md-8 col-md-offset-2">
			 <img src="<?php echo e(url('images/swr.png')); ?>" style="margin:0 auto; display:block;"/>
			 <h2 class="mrg-btm text-center"><span class="text-danger">Oops!</span>&nbsp;Something Went Wrong</h2>
			<h4> <p class="text-center" style="padding:10px; 100px;">Please Contact Customer Support</p></h4>
			 <br>
			 </div>
			
			
			
			
            </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>