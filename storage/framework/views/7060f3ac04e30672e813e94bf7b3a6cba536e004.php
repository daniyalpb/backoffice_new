 <?php $__env->startSection('content'); ?>
       <form id= "rm_form" name="rm_form" method="GET"> 
<?php echo e(csrf_field()); ?>

       <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">FBA Details</h3></div>
<div class="col-md-12">
			 <div class="overflow-scroll">
			 <div class="table-responsive" >
			 <table id="rrm-details-id" class="table table-bordered table-striped tbl" >
                 <thead>
                  <tr>
                   <th>FBA ID</th>
                   <th>Name</th>
                   <th>Mobile No</th>
                   <th>Email </th>
                   <th>City </th>
              
                   
                 </tr>
                </thead>
                <tbody>
  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
        <td><?php echo $val->fba_id; ?></td>
        <td><?php echo $val->FullName; ?></td> 
        <td><?php echo $val->MobiNumb1; ?></td>
        <td><?php echo $val->EmailID; ?></td> 
        <td><?php echo $val->City; ?></td>
        
      
      </tr>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      
      </tbody>
      </table>
			</div>
			</div>
			</div>
      </div>
      </form>

<!--       <script type="text/javascript">
       
    function getrrmdata(rrmuid){
         $.ajax({  
         type: "GET",  
         // url: 'hierarchy_cluster_data/'+fbaid+'/'+rrmuid,
         url:'hierarchy_cluster_data/'+rrmuid,//"<?php echo e(URL::to('Fsm-Details')); ?>",
         success: function(mmsg){
      console.log(data);
        var data = JSON.parse(mmsg);
 
        }  
      });
}

</script> -->


      <script type="text/javascript">
$(document).ready(function() {
    $('#rrm-details-id').DataTable( {
        "order": [[ 2, "desc" ]]
    } );
} );

      </script>
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>