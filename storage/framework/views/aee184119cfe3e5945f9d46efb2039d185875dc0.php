<?php $__env->startSection('content'); ?>
<?php if(Session::has('message')): ?>
<div class="alert alert-success alert-dismissible">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<p class="alert alert-success"><?php echo e(Session::get('message')); ?></p>
</div>
<?php endif; ?>
<style type="text/css">

h3.mrg-btm {
  font-style: italic;
}

</style>
<div class="col-md-12"><h3 class="mrg-btm">Manual Bank Details Entry Form </h3>
<!--  <input type="button" class="btn pull-right" value="X" onclick="self.close()"></h3>
 -->  
  <form id="addifscform" name="addifscform" method="POST" action="<?php echo e(url('insert-ifsc-code')); ?>"> 

    <?php echo e(csrf_field()); ?>

    <hr>
  </div>
 <table class="datatable-responsive table table-striped table-bordered nowrap" id="example">
    <tr>
      <th><h4>Select City</h4></th>
      <th><h4>Select Bank</h4></th>
      <th><h4>IFSC</h4></th>
      <th><h4>MICR Code</h4></th>
      <th><h4>Bank Branch</h4></th>
    </tr>

      <td style="width: 100px;">
            <div align="right">
          <a id="manuallyadd" data-toggle="modal" data-target="#appsourcemodel"><span class="glyphicon glyphicon-plus" title="Add City"></span></a>
          </div>

        <select class="form-control select-sty" name="City" id="City">
        <option value="">--Select City--</option>
        <?php $__currentLoopData = $ifsc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 		<option value="<?php echo e($val->CityID); ?>"><?php echo e($val->CityName); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <input type="hidden" name="hidden_state_name" id="hidden_state_name" readonly="readonly">
      </td>

      <td style="width: 100px;">
       	

    <select required class="form-control select-sty" name="Bank" id="Bank">
        <option value="">--Select Bank--</option>
        <?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <option value="<?php echo e($val->BankID); ?>"><?php echo e($val->BankName); ?></option>
 <!--  <input type="text" name="hiddenbank_id" name="hiddenbank_id" value="<?php echo e($val->BankID); ?>"> -->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        </select>

</td>

       <td style="width: 100px;">
         <input type="text" class="text-primary form-control" name="ifsccode" id="ifsccode" required="required"  placeholder="Add IFSC Code Manually"></td>

      <td style="width: 100px;">
      <input type="text" class="text-primary form-control" name="microde" id="microde"  placeholder="Add MICR Code Manually">
      </td>
          
         <td style="width: 100px;">
          <input type="text" class="text-primary form-control" name="bankbranch" id="bankbranch" placeholder="Add Branch Manually">
       </td>
       
      </div>
      </tr>
    </table>

    <div align=center colspan=4><input type="Submit" name="statussub" id="statussub" value="submit" class="btn btn-success">
    </div>
   </form>

        <!-- Add City Model Start -->
<div class="modal" id="appsourcemodel">
  <div class="modal-dialog">
    <div class="modal-content">      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add City</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>        
      <!-- Modal body -->
      <div class="modal-body">
        <form id="manuallypincodefrom" name="manuallypincodefrom" method="post" action="<?php echo e(url('insert-ifsc-code')); ?>">
        <?php echo e(csrf_field()); ?>

        <label>Add City:</label>
 		    <input type="text" class="text-primary form-control" name="addcity" id="addcity" required="required" placeholder="Add City Manually">
     </div>
     <input type="hidden" name="manuallyadd" id="manuallyadd1" readonly="readonly">
     <!-- Modal footer -->
     <div class="modal-footer">
       <input type="Submit" name="btn_manual" id="btn_manual" value="submit" class="btn btn-success"> 
     </form>
     <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
   </div>
 </div>
</div>
</div>
</div>
<!-- 
<script type="text/javascript">
   function get_bank_id(BankID){
    //alert(BankID);
    $("#hiddenbank_id").val(BankID);
    
  }

</script> -->
<script type="text/javascript">
  
  $('#manuallyadd').click(function(){
          
 $('#manuallyadd1').val(1);
      
});
</script>
<script type="text/javascript">
          
   $('#addcity').keyup(function(){    
   var yourInput = $(this).val();
   re = /[1-91-1]?[1-91-1`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi;
   var isSplChar = re.test(yourInput);
    if(isSplChar)
    {
    var no_spl_char = yourInput.replace(/[1-91-1]?[1-91-1`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
    $(this).val(no_spl_char);
    }
  });
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>