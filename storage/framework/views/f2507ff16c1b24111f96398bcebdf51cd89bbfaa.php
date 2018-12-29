<?php $__env->startSection('content'); ?>



 
       <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">User Lead  Assignment  </h3></div>
       <div class="col-md-12">

        <?php if($message = Session::get('msg')): ?>
    <div class="alert alert-info alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <strong><?php echo e($message); ?></strong> 
      </div>
  <?php endif; ?>

       
        
 <form class="form-horizontal" method="post"   action="<?php echo e(url('assign-task-save')); ?>" > <?php echo e(csrf_field()); ?>

      
       

 
        <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-1">Users</label>
            <div class="col-xs-6">
            <select class="form-control" name="user_id" >
               <option value="0" >--SELECT--</option>
               
               <?php $__currentLoopData = $userlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <option value="<?php echo e($lty->FBAUserId); ?>" ><?php echo e($lty->UserName); ?></option>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </select>
                    <?php if($errors->has('user_id')): ?><label class="control-label" for="inputError"> <?php echo e($errors->first('user_id')); ?></label><?php endif; ?>
            </div>
        </div>



  <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-1">Assign Task</label>
            <div class="col-xs-6">
            <select class="form-control " name="lead_id[]"   multiple="" style="height:250px;" >
               <option value="0" >--SELECT--</option>
               
               <?php $__currentLoopData = $assign_task; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <option value="<?php echo e($val->id); ?>" > 
                       <?php if($val->name): ?>
                          <?php echo e($val->name); ?>

                        <?php else: ?>
                          <?php echo e($val->mobile); ?>

                        <?php endif; ?>

                   </option>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

         </select>
                  <?php if($errors->has('lead_id')): ?><label class="control-label" for="inputError"> <?php echo e($errors->first('lead_id')); ?></label><?php endif; ?>
            </div>
 </div>

 <div class="form-group">
  <div class="col-xs-3">
  <label for="inputEmail" class="control-label col-xs-5"> </label>
  <input type="submit" name="submit" value="submit" class="btn btn-primary">
</div>
  
</div>      
      </form>


     
      </div>
      </div>


 

<?php $__env->stopSection(); ?>



 
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>