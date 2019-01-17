<!DOCTYPE html>
<html>
<link rel="manifest" href="/manifest.json">
         <?php echo $__env->make('include.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body>
 
 
             <?php echo $__env->make('include.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

             <div class="wrapper">
             <?php echo $__env->make('include.sidebars', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
             <div id="content">
              <?php echo $__env->yieldContent('content'); ?>
             </div>
             </div>
 
  

   <div id="loading" style="position: absolute;z-index: 1000;left: 44%;top: 40%; ">
   <img src="<?php echo e(url('loading.gif')); ?>" width="100" />

  </div>  
</body>
 <?php echo $__env->make('include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 <?php echo $__env->make('include.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php echo $__env->make('include.bankjs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
   <?php echo $__env->make('include.leadjs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
   <?php echo $__env->make('include.menujs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 
</html>
 