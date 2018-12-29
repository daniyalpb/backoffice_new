<?php $__env->startSection('content'); ?>
 
 <div class="container-fluid white-bg">


<form class="form-horizontal"  method="post" action="<?php echo e(url('menu-list-add')); ?>" ><?php echo e(csrf_field()); ?>

  <div class="form-group">
       <input type="hidden" name="parent_id" id="parent_id">     
  </div>

 <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Parent Menu  </label>
            <div class="col-xs-6">
              
               <select class="control-label"  name="parent_id"> 
               <option value="0">--Parent Level--</option>
<?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

  <option value="<?php echo e($val->id); ?>" > <?php echo e($val->name); ?> </option>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 </select>
 
            </div>
</div>


 <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Menu Name</label>
            <div class="col-xs-6">
            <input type="text" name="menu_name" id="menu_name"  class="form-control" >

    <?php if($errors->has('menu_name')): ?><label class="control-label" for="inputError"> <?php echo e($errors->first('menu_name')); ?></label><?php endif; ?>
            </div>
</div>

   <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Level </label>
            <div class="col-xs-6">
            <input type="text" name="level_name"  onkeypress="return Numeric(event)"  class="form-control" >
            </div>
  </div>

   <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Sequence </label>
            <div class="col-xs-6">
            <input type="text" name="sequence"  onkeypress="return Numeric(event)"  class="form-control" >
            </div>
  </div>



     <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">URL LINK</label>
            <div class="col-xs-6">
            <input type="text" name="url_link"    class="form-control" >
             <?php if($errors->has('url_link')): ?><label class="control-label" for="inputError"> <?php echo e($errors->first('url_link')); ?></label><?php endif; ?>
            </div>
  </div>




<div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2"></label>
            <div class="col-xs-6">
             <button type="submit" class="btn btn-default">Submit</button>
            </div>
</div>


</form>

</div>
</div>

<?php $__env->stopSection(); ?>




 
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>