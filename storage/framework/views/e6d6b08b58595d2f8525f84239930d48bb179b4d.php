<?php $__env->startSection('content'); ?>
<?php if($errors->any()): ?>
<div class="alert alert-info fade in alert-dismissible show">
 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true" style="font-size:20px">×</span>
  </button><strong>No Intraction!</strong><?php echo e($errors->first()); ?>

</div>
<?php endif; ?>
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">FBA Business Report</h3></div>
   <div class="col-md-12">
      <div class="overflow-scroll">
 <br/>
<br/>
    <div class="table-responsive" id="divcrmtable" >	
      <table class='datatable-responsive table table-striped table-bordered dt-responsive nowrap' id='tblbusiness'>
        <thead>
          <tr>
            <th>EntryNo</th>
            <th>Region</th>
            <th>BusinessLockAt</th>
            <th>InsCompany</th>
            <th>ProductName</th>
            <th>PolicyCategory</th>
            <th>ODPremium</th>
            <th>Premium</th>
            <th>AddOnPremium</th>
            <th>Source</th>
            <th>DSAName</th>
            <th>NextStage</th>
            <th>BusinessGroup</th>
            <th>ClientType</th>
            <th>Model</th>
            <th>EntryDate</th>
            <th>NoClaimBonus</th>            
          </tr>
        </thead>
        <tbody> 
          <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($val->EntryNo); ?></td>
            <td><?php echo e($val->Region); ?></td>
            <td><?php echo e($val->BusinessLockAt); ?></td>
            <td><?php echo e($val->InsCompany); ?></td>
            <td><?php echo e($val->ProductName); ?></td>
            <td><?php echo e($val->PolicyCategory); ?></td>
            <td><?php echo e($val->ODPremium); ?></td>
            <td><?php echo e($val->Premium); ?></td>
            <td><?php echo e($val->AddOnPremium); ?></td>
            <td><?php echo e($val->Source); ?></td>
            <td><?php echo e($val->DSAName); ?></td>
            <td><?php echo e($val->NextStage); ?></td>
            <td><?php echo e($val->BusinessGroup); ?></td>
            <td><?php echo e($val->ClientType); ?></td>
            <td><?php echo e($val->Model); ?></td>
            <td><?php echo e($val->EntryDate); ?></td>
            <td><?php echo e($val->NoClaimBonus); ?></td>
          </tr>  
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        </tbody>
      </table> 
	 </div>
	</div>
</div>
</div>
<script type="text/javascript"> 
$(document).ready(function(){
   $("#tblbusiness").DataTable();
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>