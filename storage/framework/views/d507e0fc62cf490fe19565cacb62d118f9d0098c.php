<?php $__env->startSection('content'); ?>
  <style>
table, th, td {
    border: 1px solid #D3D3D3 !important;
    border-collapse: collapse;
    background-color: white;
}
th,td {
    padding: 5px;
    text-align: left;
}
</style>          
<div class="container-fluid white-bg">
   <div class="col-md-12"><h3 class="mrg-btm text-center"><span class="glyphicon glyphicon-user"></span> My Information</h3></div>
     <div class="col-md-12">
       <div class="overflow-scroll">
           <div class="table-responsive" >
						<!-- <div class="brdr text-center white-bg">
						<img src="images/registration.png" class="img-responsive center-img img-circle-cs" />
						<h4>FSM Details</h4>
						<br/>
						<a href="<?php echo e('Fsm-Details'); ?>"><button class="common-btn center-obj">View More</button></a>
						</div>
						</div>
						<div class="col-md-3 col-xs-12">
						<div class="brdr text-center white-bg">
						<img src="images/leader-detail.png" class="img-responsive center-img img-circle-cs" />
						<h4>Lead Details</h4>
						<br/>
						<a href="<?php echo e('lead-up-load'); ?>"><button class="common-btn center-obj">View More</button></a>
						</div>
						</div>
						<div class="col-md-3 col-xs-12">
						<div class="brdr text-center white-bg">
						<img src="images/query.png" class="img-responsive center-img img-circle-cs" />
						<h4>User Query</h4>
						<br/>
						<a href="<?php echo e('queries'); ?>"><button class="common-btn center-obj">View More</button></a>
						</div>
						</div>
						<div class="col-md-3 col-xs-12">
						<div class="brdr text-center white-bg">
						<img src="images/register-fba-img.png" class="img-responsive center-img img-circle-cs" />
						<h4>FBA Registration</h4>
						<br/>
						<a href="<?php echo e('fba-list'); ?>"><button class="common-btn center-obj">View More</button></a>
						</div> -->

                        <table class="table-bordered col-md-6 col-md-offset-3">
                        	 <?php $__currentLoopData = $basicinfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- 	<tr>
                        		<th>FBAUserId</th>
                        		<td><?php echo e($val->FBAUserId); ?></td>
                        	</tr> -->
                        	<tr>
                        		<th>FBAID</th>
                        		<td><?php echo e($val->FBAID); ?></td>
                        	</tr>
                            <tr>
                                <th>UID</th>
                                <td><?php echo e($val->UID); ?></td>
                            </tr>
                        	<tr>
                        		<th>Profile</th>
                        		<td><p style="color: #39FF14"><b><?php echo e($val->profile); ?></b></p></td>
                        	</tr>
                        	<tr>
                        		<th>User Type</th>
                        		<td><?php echo e($val->usertype); ?></td>
                        	</tr>
                        	<tr>
                        		<th>Name</th>
                        		<td><?php echo e($val->FullName); ?></td>
                        	</tr>
                        	<tr>
                        		<th>Mobile Number</th>
                        		<td><?php echo e($val->MobiNumb1); ?></td>
                        	</tr>
                        	<tr>
                        		<th>Email ID</th>
                        		<td><?php echo e($val->EmailID); ?></td>
                        	</tr>                        	
                        	<tr>
                        		<th>DOB</th>
                        		<td><?php echo e($val->DOB); ?></td>
                        	</tr> 
                            <tr>
                                <th>Access</th>
                                <td><?php echo e($val->Location); ?></td>
                            </tr>                       	
                        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>              
						</div>
                         <br/>                       
				</div>
		</div>
</div>

<?php $__env->stopSection(); ?>		
            
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>