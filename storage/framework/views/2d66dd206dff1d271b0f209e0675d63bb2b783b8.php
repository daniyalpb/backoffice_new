<?php $__env->startSection('content'); ?>   

<div id="content" style="overflow:scroll;">
			 <div class="container-fluid white-bg">
			 <div class="col-md-12"><h3 class="mrg-btm">FBA Block List</h3></div>
			 <div class="col-md-12">
			 <div class="overflow-scroll">
			 <div class="table-responsive" >

				<table id="example" class="table table-bordered table-striped tbl" >
                 <thead>
                  <tr>
                   <th>Full Name</th>
                   <th>Created Date</th>
                   <th>Mobile No</th>
                   <th>Email ID</th>
				           <th>City</th>
				           <th>Pincode</th>
                   <th>BLOCK</th>
                   
                  </tr>
                 </thead>
                 <tbody>
                 <tr>
            
       <?php $__currentLoopData = $query; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 

       <td><?php echo $val->FullName; ?></td> 
       <td><?php echo $val->createdate; ?></td>
       <td><?php echo $val->MobiNumb1; ?></td> 
       <td><?php echo $val->EMaiID; ?></td>  
       <td><?php echo $val->City; ?></td> 
       <td><?php echo $val->Pincode; ?></td>
       <td>

      <?php if($val->IsBlocked=="" || $val->IsBlocked=="0"){?>
      <button id="btnblock" class="btn btn-default block">Block </button>
      <button id="btnunblock" class="btn btn-danger unblock" style="display:none;">Unblock</button>
      <?php } else { ?>
      <button id="btnblock" class="btn btn-default block" style="display:none;">Block </button>
      <button id="btnunblock" class="btn btn-danger unblock" >Unblock</button>
      <?php } ?>
      
      <input type="hidden" name="txtfbaid" id="blocksame" value="<?php echo $val->fbaid; ?>"></td>
      </tr>
     </tr>

       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
      </table>
			</div>
			</div>
			</div>
		  </div>
      </div>
<?php $__env->stopSection(); ?>









<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>