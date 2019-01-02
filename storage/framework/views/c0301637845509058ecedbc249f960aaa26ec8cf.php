<?php $__env->startSection('content'); ?>


<form id="updateempdtl" name="updateempdtl" method="POST" action="<?php echo e(url('update_detailsemp')); ?>" onsubmit="alertSuccess()" >
    <?php echo e(csrf_field()); ?>

<div id="content" style="overflow:scroll; height: 5px;">
             <div class="container-fluid white-bg">
             <div class="col-md-12"><h3 class="mrg-btm">Update Employee Details</h3></div>
             <div class="col-md-12">
             <div class="overflow-scroll">
             <div class="table-responsive" >
       
  </div>

    <table id="example" class="table table-bordered table-striped tbl" >
    <thead>

    <input type="hidden" name="sfbaid" id="sfbaid" value="<?php echo e($data[0]->employeeid); ?>">
        <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>UID :</label>
        </div>
        <div class="col-md-7">
       <input type="text" class="text-primary form-control" name="euid" id="euid"  value="<?php echo e($data[0]->UId); ?>" readonly="">
       </div>
        </div>

		 <div class="form-group col-md-6">
          <div class="col-md-5">
          <label>FBA ID:</label>
          </div>
          <div class="col-md-7">
       <input type="text" class="text-primary form-control" name="efbid" id="efbid" maxlength="6" value="<?php echo e($data[0]->fba_id); ?>" readonly="">
          </div>
          </div>

	<div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Role ID:</label>
        </div>
        <div class="col-md-7">
        <input type="text" class="text-primary form-control" name="eroleid" id="eroleid" readonly  value="<?php echo e($data[0]->role_id); ?>">
        </div>
        </div>

	<div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Employee Name :</label>
        </div>
        <div class="col-md-7">
         <input type="text" class="text-primary form-control" name="ename" id="ename" value="<?php echo e($data[0]->EmployeeName); ?>">
        </div>
        </div>

         </div>


		 <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Mobile No:</label>
        </div>
        <div class="col-md-7">
     
        <input type="text" class="text-primary form-control" name="emobile" id="emobile" maxlength="10" value="<?php echo e($data[0]->MobileNo); ?>">
		 </div>
        </div>

       	<div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Email:</label>
        </div>
        <div class="col-md-7">
        <input type="email" class="text-primary form-control" name="eemail" id="eemail" value="<?php echo e($data[0]->EmailId); ?>">
        </div>
        </div>


	<div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Offical Mobile:</label>
        </div>
        <div class="col-md-7">
        <input type="text" class="text-primary form-control" name="offclmob" id="offclmob" maxlength="10" value="<?php echo e($data[0]->official_phone_no); ?>">
        </div>
        </div>


<div class="form-group col-md-6">
        <div class="col-md-5">
        <label>offical Email:</label>
        </div>
        <div class="col-md-7">
        <input type="email" class="text-primary form-control" name="offclemail" id="offclemail" value="<?php echo e($data[0]->official_emailid); ?>">
        </div>
        </div>


	<div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Profile:</label>
        </div>
         <div class="col-md-7">
        <select name="eprofile" id="eprofile"  class="text-primary form-control">
			<?php $__currentLoopData = $profilesave; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			 <?php if($val->Profile==$data[0]->Profile): ?>{
		<option selected="selected" value="<?php echo e($val->Profile); ?>"><?php echo e($val->Profile); ?></option>
		}
		<?php else: ?>
         <option value="<?php echo e($val->Profile); ?>"><?php echo e($val->Profile); ?></option>

           <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
          </div>
         </div>


		<div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Select Employee Category:</label>
        </div>
         <div class="col-md-7">
        <select name="ecatgory" id="ecatgory" class="text-primary form-control">
         <?php $__currentLoopData = $catgory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php if($val->EmployeeCategory==$data[0]->EmployeeCategory): ?>{
		<option selected="selected" value="<?php echo e($val->EmployeeCategory); ?>"><?php echo e($val->EmployeeCategory); ?></option> 
	    }
		<?php else: ?>
         <option value="<?php echo e($val->EmployeeCategory); ?>"><?php echo e($val->EmployeeCategory); ?></option>
        <?php endif; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </select>
          </div>
         </div>


          <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Designation:</label>
        </div>
         <div class="col-md-7">
       	<select name="edesignation" id="edesignation" class="text-primary form-control">
		<?php $__currentLoopData = $digngtion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

		<?php if($val->Designation==$data[0]->Designation): ?>{
		<option selected="selected" value="<?php echo e($val->Designation); ?>"><?php echo e($val->Designation); ?></option> 
	 }
		<?php else: ?>
            <option value="<?php echo e($val->Designation); ?>"><?php echo e($val->Designation); ?></option>
            <?php endif; ?>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
          </div>
         </div>

		<div class="form-group col-md-6">                
        <div class="col-md-5">
        <label>Emp-Status:</label>
        </div>
         <div class="col-md-7">
        <select name="estatus" id="estatus"  class="text-primary form-control">
		<?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php if($val->Employee_Status==$data[0]->Employee_Status): ?>{
		<option selected="selected" value="<?php echo e($val->Employee_Status); ?>"><?php echo e($val->Employee_Status); ?></option> 
		}
		<?php else: ?>
		<option value="<?php echo e($val->Employee_Status); ?>"><?php echo e($val->Employee_Status); ?></option>
		   <?php endif; ?>
		  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</select>
          </div>
         </div>


<div class="form-group col-md-6">
        <div class="col-md-5">
        <label>BO-Access :</label>
        </div>
        <div class="col-md-7"> 
        <?php if($data[0]->BOAccess=='Read'): ?>
        <input type="radio" name="boaccess" id="Read" value="Read" checked> Read
        <input type="radio" name="boaccess" id="Read/Write"  value="Read/Write"> Read/Write
        <input type="radio" name="boaccess" id="No Access"  value="No Access"> No Access
        <?php endif; ?>

        <?php if($data[0]->BOAccess=='Read/Write'): ?>
        <input type="radio" name="boaccess" id="Read" value="Read"> Read
        <input type="radio" name="boaccess" id="Read/Write"  value="Read/Write" checked> Read/Write
        <input type="radio" name="boaccess" id="No Access"  value="No Access"> No Access
        <?php endif; ?>

        <?php if($data[0]->BOAccess=='No Access'): ?>
        <input type="radio" name="boaccess" id="Read" value="Read"> Read
        <input type="radio" name="boaccess" id="Read/Write"  value="Read/Write"> Read/Write
        <input type="radio" name="boaccess" id="No Access"  value="No Access" checked> No Access
        <?php endif; ?> 
        
        </div>
        </div>


<!--  <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>BO-Access:</label>
        </div>
        <div class="col-md-7">
     <input type="text" class="text-primary form-control" name="boaccess" id="boaccess" value="<?php echo e($data[0]->BOAccess); ?>">
     </div>
   </div>
 -->
<!-- 
<div class="form-group col-md-6">
        <div class="col-md-5">
        <label>POSP-Access :</label>
        </div>
        <div class="col-md-7"> 
        <?php if($data[0]->POSPAccess=='Read'): ?>
         <input type="radio" name="pospaccess" id="Read" value="Read" checked> Read
        <input type="radio" name="pospaccess" id="Read/Write"  value="Read/Write"> Read/Write
         <input type="radio" name="pospaccess" id="No Access"  value="No Access"> No Access
        <?php endif; ?>

         <?php if($data[0]->POSPAccess=='Read/Write'): ?>
         <input type="radio" name="pospaccess" id="Read" value="Read"> Read
        <input type="radio" name="pospaccess" id="Read/Write"  value="Read/Write" checked> Read/Write
         <input type="radio" name="pospaccess" id="No Access"  value="No Access"> No Access
        <?php endif; ?>

         <?php if($data[0]->POSPAccess=='No Access'): ?>
         <input type="radio" name="pospaccess" id="Read" value="Read"> Read
        <input type="radio" name="pospaccess" id="Read/Write" value="Read/Write"> Read/Write
         <input type="radio" name="pospaccess" id="No Access" value="No Access" checked> No Access
        <?php endif; ?>

        </div>
        </div> -->




<!--       <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>POSP-Access:</label>
        </div>
        <div class="col-md-7">
     <input type="text" class="text-primary form-control" name="pospaccess" id="pospaccess" value="<?php echo e($data[0]->POSPAccess); ?>">
     </div>
   </div> -->


<div class="form-group col-md-6">
        <div class="col-md-5">
        <label>POSP-Access :</label>
        </div>
        <div class="col-md-7"> 
      
        <?php if($data[0]->POSPAccess=='Read'): ?>
        <input type="radio" name="pospaccess" id="Read" value="Read" checked> Read
        <input type="radio" name="pospaccess" id="Read/Write"  value="Read/Write"> Read/Write
        <input type="radio" name="pospaccess" id="No Access"  value="No Access"> No Access
        <?php endif; ?>

        <?php if($data[0]->POSPAccess=='Read/Write'): ?>
        <input type="radio" name="pospaccess" id="Read" value="Read"> Read
        <input type="radio" name="pospaccess" id="Read/Write"  value="Read/Write" checked> Read/Write
        <input type="radio" name="pospaccess" id="No Access"  value="No Access"> No Access
        <?php endif; ?>

        <?php if($data[0]->POSPAccess=='No Access'): ?>
        <input type="radio" name="pospaccess" id="Read" value="Read"> Read
        <input type="radio" name="pospaccess" id="Read/Write"  value="Read/Write"> Read/Write
        <input type="radio" name="pospaccess" id="No Access"  value="No Access" checked> No Access
        <?php endif; ?>

        </div>
        </div>


<div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Payout-System :</label>
        </div>
        <div class="col-md-7"> 
        <?php if($data[0]->PayoutSystem=='Read'): ?>
        <input type="radio" name="paysystem" id="Read" value="Read" checked> Read
        <input type="radio" name="paysystem" id="Read/Write"  value="Read/Write"> Read/Write
        <input type="radio" name="paysystem" id="No Access"  value="No Access"> No Access
        <?php endif; ?>

        <?php if($data[0]->PayoutSystem=='Read/Write'): ?>
        <input type="radio" name="paysystem" id="Read" value="Read"> Read
        <input type="radio" name="paysystem" id="Read/Write"  value="Read/Write" checked> Read/Write
        <input type="radio" name="paysystem" id="No Access"  value="No Access"> No Access
        <?php endif; ?>

        <?php if($data[0]->PayoutSystem=='No Access'): ?>
        <input type="radio" name="paysystem" id="Read" value="Read"> Read
        <input type="radio" name="paysystem" id="Read/Write"  value="Read/Write"> Read/Write
        <input type="radio" name="paysystem" id="No Access"  value="No Access" checked> No Access
        <?php endif; ?>

        </div>
        </div>



<!--     <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Payout-System:</label>
        </div>
        <div class="col-md-7">
     <input type="text" class="text-primary form-control" name="paysystem" id="paysystem" value="<?php echo e($data[0]->PayoutSystem); ?>">
     </div>
   </div> -->
   
     <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Employee Tpye  :</label>
        </div>
        <div class="col-md-7">
        <input type="text" class="text-primary form-control" name="emptype" id="emptype" value="Employee" readonly="">
        </div>
        </div>

  <!-- <div class="form-group col-md-6">
          <div class="col-md-5">
        <label>Location Access :</label>
        </div>
        <div class="col-md-7">
        <input type="radio" name="emolocation" id="mapcity" value="Mapped_Area" checked> Mapped_City
  		<input type="radio" name="emolocation" id="allindia" value="All_India"> All India<br>
        </div>
        </div> -->
        <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Location Access :</label>
        </div>
        <div class="col-md-7"> 
        <?php if($data[0]->Location=='Mapped_Area'): ?>
         <input type="radio" name="emolocation" id="Mapped_Area" value="Mapped_Area" checked> Mapped_Area
        <input type="radio" name="emolocation" id="All_India"  value="All_India"> All_India
        <?php else: ?>
        <input type="radio" name="emolocation" id="Mapped_Area" value="Mapped_Area" > Mapped_Area
        <input type="radio" name="emolocation" id="All_India"  value="All_India" checked> All_India
        <?php endif; ?>;
        
        </div>
        </div>




         <div class="form-group col-md-6">
          <div class="col-md-5">
          <label>User grp id</label>
          </div>
          <div class="col-md-7">
       <input type="hidden" class="text-primary form-control" name="ugropid" id="ugropid" value="<?php echo e($data[0]->usergroup); ?>" >
          </div>
          </div>


		<div class="form-group col-md-12">
        <div class="col-md-4">
        <input type="Submit" name="statussub" id="statussub" value="submit" class="btn btn-success">
        </div>
        </div>
         </thead>
           <tbody>
            <tbody>
                </tbody>
              </tbody>
            </table>
           </div>
          </div>
        </div>
      </div>
 </div>
  





<!-- <script type="text/javascript">
	
$("#statussub").click(function(){ 
 if ($('#updateempdtl').valid()){
   //console.log($('#updateempdtl').serialize());
   $.ajax({ 
   url: "<?php echo e(URL::to('update_detailsemp')); ?>",
   method:"POST",
   data: $('#updateempdtl').serialize(),  
   success: function(msg)  
   {
  alert("Record has been saved successfully");
  
    $("#updateempdtl").trigger('reset');
        window.location.reload();

     // location.reload();

    
  }
 }); 
 } 
 });

</script> -->





  <script type="text/javascript">
 
  $(document).ready(function(){
    //alert('test');
      $('#statussub').onclick(function () {
      alert('test');
   ($('#updateempdtl').valid()){
   $.ajax({ 
   url: "<?php echo e(URL::to('update_detailsemp')); ?>",
   method:"POST",
   data: $('#updateempdtl').serialize(),
   success: function(msg)  
   {
   	//alert('Update Successfully');
   	//window.location.reload();
    
    
   }

});
 }

});

      });




  </script>


  </script>
<script type="text/javascript">
  
function getloneid(){

  var roleid = $("#eprofile").val();  
  
   $.ajax({
             url: '../get-role-id/'+roleid,
             type: "get",             
             success:function(data) 
             {
            //alert(data);
               var role=  JSON.parse(data); 
               $("#eroleid").val(role[0].role_id);

             }
         });
}

$("#eprofile").change(function(){
  getloneid();
});


</script>

<script type="text/javascript">
   $(function(){
   $('#euid').keyup(function(){    
   var yourInput = $(this).val();
   re = /[A-Za-z]?[A-Za-z `~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi;
   var isSplChar = re.test(yourInput);
    if(isSplChar)
    {
    var no_spl_char = yourInput.replace(/[A-Za-z]?[A-Za-z `~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
    $(this).val(no_spl_char);
    }
  });
 
});
</script>

<script type="text/javascript">
   $(function(){
   $('#ename').keyup(function(){    
   var yourInput = $(this).val();
   re = /[1-91-1]?[1-91-1`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi;
   var isSplChar = re.test(yourInput);
    if(isSplChar)
    {
    var no_spl_char = yourInput.replace(/[1-91-1]?[1-91-1`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
    $(this).val(no_spl_char);
    }
  });
 
});
</script>

 <script type="text/javascript">
   $(function(){
   $('#emobile').keyup(function(){    
   var yourInput = $(this).val();
   re = /[A-Za-z]?[A-Za-z `~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi;
   var isSplChar = re.test(yourInput);
    if(isSplChar)
    {
    var no_spl_char = yourInput.replace(/[A-Za-z]?[A-Za-z `~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
    $(this).val(no_spl_char);
    }
  });
 
});
</script>

<script type="text/javascript">
   $(function(){
   $('#offclmob').keyup(function(){    
   var yourInput = $(this).val();
   re = /[A-Za-z]?[A-Za-z `~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi;
   var isSplChar = re.test(yourInput);
    if(isSplChar)
    {
    var no_spl_char = yourInput.replace(/[A-Za-z]?[A-Za-z `~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
    $(this).val(no_spl_char);
    }
  });
 
});
</script>
<script type="text/javascript">
   $(function(){
   $('#boaccess').keyup(function(){    
   var yourInput = $(this).val();
   re = /[1-91-1]?[1-91-1 `~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi;
   var isSplChar = re.test(yourInput);
    if(isSplChar)
    {
    var no_spl_char = yourInput.replace(/[1-91-1]?[1-91-1 `~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
    $(this).val(no_spl_char);
    }
  });
 
});
</script>
<script type="text/javascript">
   $(function(){
   $('#pospaccess').keyup(function(){    
   var yourInput = $(this).val();
   re = /[1-91-1]?[1-91-1 `~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi;
   var isSplChar = re.test(yourInput);
    if(isSplChar)
    {
    var no_spl_char = yourInput.replace(/[1-91-1]?[1-91-1 `~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
    $(this).val(no_spl_char);
    }
  });
 
});
</script>



<script type="text/javascript">
   $(function(){
   $('#efbid').keyup(function(){    
   var yourInput = $(this).val();
   re = /[A-Za-z]?[A-Za-z `~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi;
   var isSplChar = re.test(yourInput);
    if(isSplChar)
    {
    var no_spl_char = yourInput.replace(/[A-Za-z]?[A-Za-z `~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
    $(this).val(no_spl_char);
    }
  });
 
});
</script>



<script type="text/javascript">
  
function getusergrpeid(){

  var usgrpeid = $("#eprofile").val();  
  //alert(usgrpeid);
   $.ajax({
             url: '../get-ugroup-id/'+usgrpeid,
             type: "GET",             
             success:function(data) 
             {
              //alert(data);
               var role=  JSON.parse(data); 
               $("#ugropid").val(role[0].id);

             }
         });
}

$("#eprofile").change(function(){
  getusergrpeid();
});


</script>























<script>
function alertSuccess() {
alert('Update Successfully');
}
</script>
     


<?php $__env->stopSection(); ?>
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>