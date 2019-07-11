<?php $__env->startSection('content'); ?>
<head>
 <style type="text/css">
 .stretch-card {
    margin-bottom: 25px !important;
    transition: transform .2s;
}

  /* Style the counter cards */
  .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    padding: 16px;
    text-align: center;
    background-color: #ffe6e6;
  }
</style>
</head>
<div  class="container-fluid">
 <div class="col-md-12"><h3 class="mrg-btm">FBA Transaction History</h3></div>
 <div class="col-md-12">
   <div class="overflow-scroll">
    <?php if(isset($Response)): ?>    
    <?php $__currentLoopData = $Response; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-xl-3 col-lg-3 col-md-8 col-sm-6 grid-margin stretch-card">
      <div class="card card-statistics">
        <div  class="card-body">
          <div class="clearfix">
            <div class="float-right">
             <p>Entry No : <?php echo e($val->EntryNo); ?></p> 
             <p>Ins Company : <?php echo e($val->InsCompany); ?></p>
             <p>Product Name : <?php echo e($val->ProductName); ?></p>
             <p>OD Premium : <?php echo e($val->ODPremium); ?></p>
             <p>Premium : <?php echo e($val->Premium); ?></p>
             <p>Add On Premium : <?php echo e($val->AddOnPremium); ?></p>
             <p>Entry Date : <?php echo e($val->EntryDate); ?></p>
             <p>QT.No : <?php echo e($val->QT_No); ?></p>
             <p>Total.OD : <?php echo e($val->Total_OD); ?></p>
             <p>POSP ID : <?php echo e($val->POSP_ID); ?></p>
             <p>CS.No : <?php echo e($val->CSNo); ?></p>
           </div>
         </div>
       </div>
     </div>
   </div>

 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
 <?php endif; ?> 
</div> 
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>