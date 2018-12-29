
<?php $__env->startSection('content'); ?>
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">All Quick Lead</h3></div>
   <div class="col-md-12">
      <div class="overflow-scroll">
         <div class="table-responsive" >
	<table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="example">
		 <thead>
                  <tr>
                  	<th>Lead ID</th>
                  	<th>Lead Name</th>
                  	<th>Lead Email</th>
                  	<th>Lead Mobile</th>
                  	<th>Lead Status</th>
                  	<th>Product</th>                  	
                  	<th>FBA Name</th>
                  	<th>FBAID</th>
                  	<th>FBA Mobile Number</th>
                  	<th>FBA City</th>
                  	<th>User Name</th>
                  </tr>
         </thead>
         <tbody>
         	<?php $__currentLoopData = $query; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         	<tr>
         		<td><?php echo e($val->Req_Id); ?></td>
         		<td><?php echo e($val->LeadName); ?></td>
         		<td><?php echo e($val->LeadEmail); ?></td>
         		<td><?php echo e($val->LeadMobile); ?></td>
         		<td><?php echo e($val->Lead_Status); ?></td>
         		<td><?php echo e($val->Product_Name); ?></td>         		
         		<td><?php echo e($val->Fullname); ?></td>
         		<td><?php echo e($val->FBAID); ?></td>
         		<td><?php echo e($val->MobiNumb1); ?></td>
         		<td><?php echo e($val->MobiNumb1); ?></td>
         		<td><?php echo e($val->UserName); ?></td>
         	</tr>
         	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </tbody>
<!-- 
  <div id="myDIV" >
  <a href="<?php echo e(url('export')); ?>" class="qry-btn" id="pospbtn">Export</a>

</div> -->

 </table>
 <!--   <div id="myDIV" >
   <a href="<?php echo e(url('exportlead')); ?>" class="qry-btn" id="pospbtn">Export</a>
   </div> -->
       </div>
   </div>
 </div>
</div>
<?php $__env->stopSection(); ?>

<!-- Export to Excel Code -->

<script type="text/javascript">
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
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>