
<?php $__env->startSection('content'); ?>   
<div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">Assigned Follow up</h3></div> 
       <div class="col-md-12">
       <div class="overflow-scroll">
       <div class="table-responsive" >
   <table id="classTable" class="table table-bordered">
          <thead>
               <tr>
                 <th>Follow up Id</th>
                 <th>FBAID</th>
                 <th>FBA Name</th>   
                 <th>FBA Mobile No</th>
                <!--  <th>History_id</th> -->
                 <th>Followup Date</th>
                 <th>Remark</th>
                 <th>Disposition</th>
                 <th>Created Date</th>
                 <th>Action</th>
               </tr>
          </thead>
          <tbody   >
     
     <!-- <?php //print_r($query);exit; ?> -->

     <?php $__currentLoopData = $query; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr> 
        <td><?php echo e($val->history_id); ?></td>
        <td><?php echo e($val->FBAID); ?></td>
        <td><?php echo e($val->FullName); ?></td>   
        <td><?php echo e($val->MobiNumb1); ?></td>
       <!--  <td><?php echo e($val->history_id); ?></td> -->
        <td><?php echo e($val->followup_date); ?></td>
        <td><textarea readonly style="width: 100%;height: 30px;border: none; cursor: default;"><?php echo e($val->remark); ?></textarea></td>
        <td><?php echo e($val->disposition); ?></td> 
        <td><?php echo e($val->create_at); ?></td>        
        <?php if($val->followup_assign_id!=null || $val->followup_assign_id!=0): ?>
        <td><a id="close_action" style="color: red">close</a></td>
           <?php else: ?>
        <td><a href="<?php echo e(url('crm-new')); ?>/<?php echo e($val->fbamappin_id); ?>?assign_id=<?php echo e($val->assignment_id); ?>&history_id=<?php echo e($val->history_id); ?>">new</a></td>
           <?php endif; ?>
        </tr>  
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     </tbody>
</table>
</div>
</div>
</div>
</div>
<script type="text/javascript">
   $( document ).ready(function() {
        $("#classTable").DataTable();
    });
</script>  
<?php $__env->stopSection(); ?>
 




<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>