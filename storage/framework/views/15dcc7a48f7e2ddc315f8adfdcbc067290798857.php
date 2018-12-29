 
    <?php $__env->startSection('content'); ?>

<?php if(Session::has('message')): ?>
<div class="alert alert-success alert-dismissible">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<p class="alert alert-info"><?php echo e(Session::get('message')); ?></p>
</div>
<?php endif; ?>
 <!-- Body Content Start -->

			 <div class="container-fluid white-bg">
			 <div class="col-md-12"><h3 class="mrg-btm">Register Form</h3></div>
			 <div class="col-md-12">
			 <form id="fsmregister" name="fsmregister" method="post">
			 	 <?php echo e(csrf_field()); ?>

			  <ul class="nav nav-tabs nav-justified">
                <li class="active"><a data-toggle="tab" href="#home">FSM Basic Info -  &nbsp;<span class="badge">Step 1</span></a></li>
                <li><a data-toggle="tab" href="#menu1">Pincode Mapping - &nbsp;<span class="badge">Step 2</a></span></li>
                <li><a data-toggle="tab" href="#menu2">Banking Info - &nbsp;<span class="badge">Step 3</span></a></li>
              </ul>
             <div class="tab-content">
              <div id="home" class="tab-pane fade in active">
              <h4 class="text-center fsm-reg-heading">FSM Basic Info</h4>
			  <div class="col-md-4 col-xs-12">

			  	<input id="fsmid" type="hidden" value="0">
				<div class="form-group">
				 <select id="txttitle" name="txttitle" class="selectpicker select-opt form-control">
			     <option selected="selected" value="0">--Title--</option>
		         <option value="MR">Mr</option>
		         <option value="MRS">Mrs</option>
				 <option value="MS">Ms</option>
		         </select>
				</div>
				</div>
              <div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input id="txtFname" name="FirstName" type="text" class="form-control" placeholder="First Name">
				<?php if($errors->has('FirstName')): ?><label class="control-label" for="inputError"> <?php echo e($errors->first('FirstName')); ?></label>  <?php endif; ?>
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input id="txtLname" name="LastName" type="text" class="form-control" placeholder="LastName">
				<?php if($errors->has('LastName')): ?><label class="control-label" for="inputError"> <?php echo e($errors->first('LastName')); ?></label>  <?php endif; ?>
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input id="txtCname" name="txtCname" type="text" class="form-control" placeholder="Company Name">
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input id="txtemail" name="EmailId" type="email" class="form-control" placeholder="Email Id">
				<?php if($errors->has('EmailId')): ?><label class="control-label" for="inputError"> <?php echo e($errors->first('EmailId')); ?></label>  <?php endif; ?>
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input id="txtMobile" name="MobileNo" type="number" class="form-control" placeholder="Mobile No.">
				<?php if($errors->has('MobileNo')): ?><label class="control-label" for="inputError"> <?php echo e($errors->first('MobileNo')); ?></label>  <?php endif; ?>
				</div>
				</div>
				
			    <div class="col-md-4">
			    <div class="form-group">
			    <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
                 <input id="txtdate" name="txtdate" class="form-control" type="text" placeholder="From Date">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
               </div>
               </div>
              </div>
			  <div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input id="txtpan" name="txtpan" type="text" class="form-control" placeholder="Pan Card">
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input id="txtAadhar" name="txtAadhar" type="number" class="form-control" placeholder="Aadhar No.">
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input id="txtPincode" name="Pincode" type="number" class="form-control" placeholder="Pincode"><?php if($errors->has('Pincode')): ?><label class="control-label" for="inputError"> <?php echo e($errors->first('Pincode')); ?></label>  <?php endif; ?>
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input id="txtCity" name="txtCity" type="text" class="form-control" placeholder="City">
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<select id="txtstate" name="txtstate" class="selectpicker select-opt form-control">
			     <option selected="selected" value="0">--Select State--</option>
				 <?php $__currentLoopData = $state; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			     <option value="<?php echo e($val->state_id); ?>"><?php echo e($val->state_name); ?></option>
		          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<select id="txtmanager" name="txtmanager" class="selectpicker select-opt form-control">
					<option>--SELECT MANAGER--</option>
			   <?php $__currentLoopData = $manager; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		         <option value="<?php echo e($val->mgid); ?>"><?php echo e($val->fullname); ?></option>
	             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>
				</div>
				</div>
				
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<div class="form-control">is Lead Recipient &nbsp; &nbsp; <input type="radio" id="txtyes" name="rdo"/>&nbsp;Yes   <input value="OFF" type="radio" id="txtno" name="rdo"/>&nbsp;No</div>
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<select id="txtfsmtype" name="txtfsmtype" class="selectpicker select-opt form-control">
			     <option>--SELECT FSM TYPE--</option>
	             <option>Employee</option>
	             <option>Paid Employee</option>
	             <option>Unpaid Employee</option>
				</select>
				</div>
				</div>
				</div>
			  <div id="menu1" class="tab-pane fade">
             <h4 class="fsm-reg-heading text-center">Pincode Mapping</h4>
			
              <div class="col-md-4 col-xs-12">
				<div class="form-group">
				<select name="State"  id="txtmapstate" class="selectpicker select-opt form-control">
			     <option selected="selected" value="0">--Select State--</option>
		          <?php $__currentLoopData = $state; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			     <option value="<?php echo e($val->state_id); ?>"><?php echo e($val->state_name); ?></option>
		          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<select name="city" id="txtmapcity" class="selectpicker select-opt form-control">
			     <option>--Select City--</option>
		         <!-- <option>Mumbai</option> -->
				</select>
				</div>
				</div>
                <div class="col-md-8 col-xs-12">
				<div class="input-group">
                <input type="number" name="txtmappincode" id="txtmappincode" class="form-control" placeholder="Pincodes">
                <span class="input-group-addon btn btn-info" id="basic-addon2">Select Pincodes</span>
                </div>
				 </div>
				 <br>
				 <div class="col-md-12"><div class="well well-sm mrg-top text-center map-pin">Map Pincodes</div></div>
				 
				 <div class="col-md-12 form-padding" id="StatesV" style="overflow-y:scroll;height:270px;">
							
                                              <div>
	                                          <table id="tblpincode" class="table table-responsive table-hover" cellspacing="0">
		                                       <tbody>
											   <tr class="headerstyle" align="center">
			                                    <th scope="col">
                                                <input  type="checkbox" class="used" id="chkselectall">
                                                <span>Select All</span>
                                                </th>
		                                       </tr>
											
		                                  
										    </tbody>
									 </table>
                                     </div>
									</div>									
              </div>
			  
			  
			  
              <div id="menu2" class="tab-pane fade">
              <h4 class="text-center fsm-reg-heading">Banking Info</h4>
			  
			  <div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input id="txtbankacno" name="txtbankacno" type="text" class="form-control" placeholder="Bank Ac No.">
				</div>
				</div>
               <div class="col-md-4 col-xs-12">
				<div class="form-group">
				<select id="txtactype" name="txtactype" class="selectpicker select-opt form-control">
			     <option selected="selected" value="0">Account Type</option>
		         <option value="1">Saving Account</option>
		         <option value="2">Current Account</option>
		 
				</select>
				</div>
				</div>
              <div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input id="txtifsc" name="txtifsc" type="text" class="form-control" placeholder="IFSC Code">
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input id="txtmicr" name="txtmicr" type="text" class="form-control" placeholder="MICR Code">
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input id="txtbankname" name="txtbankname" type="text" class="form-control" placeholder="Bank Name">
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input id="txtbankbrach" name="txtbankbrach" type="text" class="form-control" placeholder="Bank Branch">
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				<input id="txtbankcity" name="txtbankcity" type="text" class="form-control" placeholder="Bank City">
				</div>
				</div>
              </div>
              
            </div>
			<div class="col-md-12 col-xs-12">
				<br>
				<div class="center-obj center-multi-obj">
				<a href="Fsm-Details" class="common-btn">Back</a>
				 <button id="btnsubmit" onclick="Validate()" class="common-btn">Submit</button>
				 </div>
				</div>
			    </form>
            </div>
			</div>
			
            </div>
<script>
$(document).ready(function(){

if (window.location.href.indexOf('?smid=') > 0) {
        var smid = window.location.href.split('?smid=')[1];  
		$.ajax({  
         type: "GET",  
         url:'FsmRegister/'+smid,//"<?php echo e(URL::to('Fsm-Details')); ?>",
         success: function(fsmmsg){
        
        var data = JSON.parse(fsmmsg);
        $('#fsmid').val(data[0].SMId);
        $('#txttitle').val(data[0].Salutation);
        $('#txtFname').val(data[0].FName);
        $('#txtLname').val(data[0].LastName);
        $('#txtCname').val(data[0].CompanyName);
        $('#txtemail').val(data[0].Email);
        $('#txtMobile').val(data[0].MobileNo);
        $('#txtdate').val(data[0].DateOfBirth);
        $('#txtpan').val(data[0].PancardNo);
        $('#txtCity').val(data[0].City);
        $('#txtstate').val(data[0].State);
        $('#txtmanager').val(data[0].ManagerMap);
        $('#txtAadhar').val(data[0].AdhardNo);
        $('#txtPincode').val(data[0].Pincode);
        if(data[0].IsLeadRecipient == "Yes"){
        	$('#txtyes').val("ON");
        	$('#txtno').val("OFF");
        }
        else if(data[0].IsLeadRecipient == "No"){
        	$('#txtyes').val("OFF");
        	$('#txtno').val("ON");
        }

        $('#txtmapstate').val(data[0].FSMType);
        $('#txtbankacno').val(data[0].BankAccoNo);
        $('#txtactype').val(data[0].BankAccoType);
        $('#txtifsc').val(data[0].BankIFSCCode);
        $('#txtmicr').val(data[0].BankMICRCode);
        $('#txtbankname').val(data[0].BankName);
        $('#txtbankbrach').val(data[0].BankBranch);
        $('#txtbankcity').val(data[0].BankCity);

     	

        }  
      });
    }
});
</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>