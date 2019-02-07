 <?php $__env->startSection('content'); ?>

       <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">Queries</h3></div>
<div id="myDIV">
  <a href="<?php echo e(url('queries')); ?>?queries=1" class="qry-btn" id="pospbtn">POSP Transaction</a>
  <a href="<?php echo e(url('queries')); ?>?queries=2"  class="qry-btn">Not POSP</a>
  <a href="<?php echo e(url('queries')); ?>?queries=3" class="qry-btn">Policy Sold</a>
  <a href="<?php echo e(url('queries')); ?>?queries=4" class="qry-btn">FBA Never Logged In</a>
  <a href="<?php echo e(url('queries')); ?>?queries=5" class="qry-btn">Inactive POSP </a>
  <a href="<?php echo e(url('queries')); ?>?queries=6" class="qry-btn">POSP Without POSP No</a>
  <a href="<?php echo e(url('queries')); ?>?queries=7" class="qry-btn">POSP Without Payment</a>
  <a href="<?php echo e(url('queries')); ?>?queries=8"  class="qry-btn">Transaction Today</a>
  <a href="<?php echo e(url('queries')); ?>?queries=9"  class="qry-btn">Not Posp but sold policy</a>
</div>

<br>
 <div id="export_id"></div>
<br>

 
   <div class="col-md-12">
       <div class="overflow-scroll">
       <div class="table-responsive" >
<div id="divinfo">
  <table style="float: right;">
  <tr>
  <td style="padding:0 15px 0 15px;">
  <p style="color: #3379b7"><strong>Q = Quote</strong></p>
  </td>
  <td style="padding:0 15px 0 15px;">
  <p style="color: #3379b7"><strong>MS = Mail send</strong></p>
  </td>
  <td style="padding:0 15px 0 15px;">
  <p style="color: #3379b7"><strong> PS = Payment successful</strong></p>
  </td>
  </tr>
  </table>
</div>
<br>
        <table id="example" class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" >
                 <thead >
                 <tr class="thead_cl">

                 </tr>

                </thead>
                <tbody>
                <?php $__currentLoopData = $query; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <?php if($status==3 or $status==9 ): ?>
                <td> <?php echo e($val->created_date); ?></td>
                <td> <?php echo e($val->FBAId); ?></td>
                <td> <?php echo e($val->FBAName); ?></td>
                <td> <?php echo e($val->Mobile); ?></td>
                <td> <?php echo e($val->Email); ?></td>
                <?php else: ?>
               <td> <?php echo e($val->FBAId); ?></td>
               <td> <?php echo e($val->FBAName); ?></td>
               <td> <?php echo e($val->Mobile); ?></td>
               <td> <?php echo e($val->Email); ?></td>
                <?php endif; ?>

                <?php if($status==1): ?>                
                <td><?php echo e($val->City); ?></td> 
                <td><?php echo e($val->Life); ?></td>  

            <!--     <?php if($val->HEALTH[2]!=0): ?>
                <td>    
                <a href="queries-health/<?php echo e($val->FBAId); ?>?<?php echo e(explode(' ',$val->HEALTH)[0]); ?>" target="_blank" > <?php echo e(explode(' ',$val->HEALTH)[0]); ?></a>
                <a href="queries-health/<?php echo e($val->FBAId); ?>?<?php echo e(explode(' ',$val->HEALTH)[1]); ?>" target="_blank" > <?php echo e(explode(' ',$val->HEALTH)[1]); ?></a>
                <a href="queries-health/<?php echo e($val->FBAId); ?>?<?php echo e(explode(' ',$val->HEALTH)[2]); ?>" target="_blank" > <?php echo e(explode(' ',$val->HEALTH)[2]); ?></a>
                 </td>                 
                <?php else: ?>
                <td><?php echo e($val->HEALTH); ?></td>
                <?php endif; ?> -->
                
                <?php if($val->MOTOR[2]!=0): ?>
                <td>
                <a href="queries-motor/<?php echo e($val->FBAId); ?>?<?php echo e(explode(' ',$val->MOTOR)[0]); ?>" target="_blank" > <?php echo e(explode(' ',$val->MOTOR)[0]); ?></a>
                <a href="queries-motor/<?php echo e($val->FBAId); ?>?<?php echo e(explode(' ',$val->MOTOR)[1]); ?>" target="_blank" > <?php echo e(explode(' ',$val->MOTOR)[1]); ?></a>
                <a href="queries-motor/<?php echo e($val->FBAId); ?>?<?php echo e(explode(' ',$val->MOTOR)[2]); ?>" target="_blank" > <?php echo e(explode(' ',$val->MOTOR)[2]); ?></a>
                <?php else: ?>
                <td><?php echo e($val->MOTOR); ?></td>
                <?php endif; ?>
               <td> <?php echo e($val->HOME_LOAN); ?></td>
               <td> <?php echo e($val->PL); ?></td>
                 <?php if($val->TWO_WHEELER[2]!=0): ?>
                <td>  
                <a href="queries-two-wheeler/<?php echo e($val->FBAId); ?>?<?php echo e(explode(' ',$val->TWO_WHEELER)[0]); ?>" target="_blank" > <?php echo e(explode(' ',$val->TWO_WHEELER)[0]); ?></a>
                <a href="queries-two-wheeler/<?php echo e($val->FBAId); ?>?<?php echo e(explode(' ',$val->TWO_WHEELER)[1]); ?>" target="_blank" > <?php echo e(explode(' ',$val->TWO_WHEELER)[1]); ?></a>
                <a href="queries-two-wheeler/<?php echo e($val->FBAId); ?>?<?php echo e(explode(' ',$val->TWO_WHEELER)[2]); ?>" target="_blank" > <?php echo e(explode(' ',$val->TWO_WHEELER)[2]); ?></a>
                <?php else: ?>
                <td><?php echo e($val->TWO_WHEELER); ?></td>                
                <?php endif; ?>

               <?php elseif($status==2): ?>
               <td> <?php echo e($val->City); ?></td>
               <td> <?php echo e($val->HEALTH); ?></td>
               <td> <?php echo e($val->MOTOR); ?></td>
               <td> <?php echo e($val->HOME_LOAN); ?></td>
               <td> <?php echo e($val->PL); ?></td>
               <td> <?php echo e($val->TWO_WHEELER); ?></td>
                
               <?php elseif($status==3 or $status==9): ?>
               <td> <?php echo e($val->City); ?></td>
               <td> <?php echo e($val->pcount); ?></td>
               <td> <?php echo e($val->TName); ?></td>
               <?php elseif($status==4): ?>
               <td> <?php echo e($val->City); ?></td>
                <td> <?php echo e($val->CreaOn); ?></td>
               <?php elseif($status==5): ?>
               <td> <?php echo e($val->City); ?></td>
                 <td> <?php echo e($val->created_date); ?></td>
                  <td> <?php echo e($val->HEALTH); ?></td>
               <td> <?php echo e($val->MOTOR); ?></td>
               
               <td> <?php echo e($val->TWO_WHEELER); ?></td>
               <?php elseif($status==6): ?>

               <td> <?php echo e($val->Created_Date); ?></td>
                <td><?php echo e($val->PospName); ?></td>
               <?php elseif($status==7): ?>
               <td> <?php echo e($val->City); ?></td>
                 <td> <?php echo e($val->Created_Date); ?></td>
                <td> <?php echo e($val->POSPName); ?></td>
               <?php elseif($status==8): ?>
               <td> <?php echo e($val->City); ?></td>
               <td> <?php echo e($val->HEALTH); ?></td>
               <td> <?php echo e($val->MOTOR); ?></td>                           
               <td> <?php echo e($val->TWO_WHEELER); ?></td>
               <td><?php echo e($val->Life); ?></td>
               <td><?php echo e($val->PL); ?></td> 
               <td><?php echo e($val->RRM_Name); ?></td>   
               <?php else: ?>  
               <td> not found</td>
                 <?php  break; ?>
               <?php endif; ?>



              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                 </tbody>
      </table>
      </div>
      </div>
      </div>
      </div>




<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">

  
</script>
    
  <script>
// Add active class to the current button (highlight it)
var header = document.getElementById("myDIV");
var btns = header.getElementsByClassName("qry-btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}


</script>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>