<?php $__env->startSection('content'); ?>
<style type="text/css">
	.txtarea{
		width:190px;
		background-color: #f9f9f9;
		cursor: pointer;
	}
</style>
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">FBA List</h3></div>
   <div class="col-md-12">
      <div class="overflow-scroll">
         <div class="table-responsive" >
	      <table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="example">
	        	<thead>
	        		<tr>
             
	        						   <th>FBA ID</th> 
                                       <th>Full Name</th> 
                                       <th>Created Date</th>
                                       <th>Mobile No</th>                                   
                                       <th>Email ID</th>
                                       <th>Payment Status</th>
                                     
                                       <th>City</th>
                                       <th>State</th>
                                       <th>Zone</th>
                                       <th>Pincode</th>

                                       <th>POSP No(SSID)</th>
                                       <th>Loan ID</th> 
                                       <th>Posp Name</th> 
                                       <th>Posp Status</th> 
                                       <th>Bank Account</th>
                                       <th>Sales code</th>
                                       <th>Documents</th> 
                                         <th>Payment Link</th>
                                      
                                       <!-- <th>Created Date1</th -->
						</tr>
	        	   	   </thead>
	             	   <tbody>

	              <?php if(isset($usermaping)): ?>
				  <?php $__currentLoopData = $usermaping; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
					<td><?php echo $val->fbaid; ?></td> 
       				<td><?php echo $val->FullName; ?></td>
       				<td><?php echo $val->createdate1; ?></td>   
       				<td><?php echo $val->MobiNumb1; ?></td> 
       				<td><?php echo $val->EMaiID; ?></td>
       				<td><?php echo $val->PayStat; ?></td>
       				
       				<td><?php echo $val->City; ?></td>
       				<td><?php echo $val->statename; ?></td>
       				<td><?php echo $val->zone; ?></td> 
       				<td><?php echo $val->Pincode; ?></td>
       				<td><?php echo $val->POSPNo; ?></td>
       				<td><?php echo $val->LoanID; ?></td> 
       				<td><?php echo $val->pospname; ?></td>
       				<td><?php echo $val->pospstatus; ?></td>
       				<td><?php echo $val->bankaccount; ?></td> 
              <?php if($val->salescode =='Update'): ?>
              <td></td>
              <?php else: ?>
              <td><?php echo $val->salescode; ?></td>
              <?php endif; ?>
       				<td><?php echo $val->fdid; ?></td>  
       	<td><?php echo $val->Link; ?></td> 

       			</tr>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

	<?php $__env->stopSection(); ?>



<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>