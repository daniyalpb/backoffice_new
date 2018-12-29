<?php $__env->startSection('content'); ?>



       <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">  User Rights </h3></div>
       
     
 

<p class="col-md-12 pad mrg-btm"> <a href="#" class="menu_group_id_model btn btn-info"> Add   User Rights </a></p>
 
       <div class="col-md-12">
       <div class="overflow-scroll">
       <div class="table-responsive" >


      <table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="example">

                                    <thead>
                                       <tr>
                                       <th>ID</th>
                                      <th>Name</th>
                                      <th>Edit</th>
                                  
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <!-- <?php $__currentLoopData = $menu_group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <tr>
                                      <td><?php echo e($vl->id); ?></td>
                                      <td  ><a href="<?php echo e(url('menu-mapping')); ?>?id=<?php echo e($vl->id); ?>"> <?php echo e($vl->name); ?> </a></td>

                                      <td><a href="url"><input type='submit' name='submit' value='Edit'/></a></td>
                                      </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 -->
 
                                    <?php $__currentLoopData = $menu_group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <tr>
                                      <td><?php echo e($vl->id); ?></td>
                                      <td> <?php echo e($vl->name); ?> </td>
                                      <td>
                             <a href="<?php echo e(url('menu-mapping')); ?>?id=<?php echo e($vl->id); ?>" class="btn btn-info">Edit</a>
                                     </td>
                                   </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </tbody>
                                     </td>


         </table>

      </div>
      </div>
      </div>
      </div>

 

 <div class="modal fade" id="menu-group-id-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Rights</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" method="post"  id="menu_group_id_from" > <?php echo e(csrf_field()); ?>

    
        
   <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2"> Name</label>
            <div class="col-xs-10">
            <input type="text" name="menu_group" id="menu__group"  class="form-control" >
            </div>
  </div> 


 
        
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="menu_group_id_">Save changes</button>
      </div>
    </div>
  </div>
</div>



<?php $__env->stopSection(); ?>




 
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>