<?php $__env->startSection('content'); ?>
<?php if(Session::has('message')): ?>
<div class="alert alert-success alert-dismissible">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<p class="alert alert-success"><?php echo e(Session::get('message')); ?></p>
</div>
<?php endif; ?>

<div class="container-fluid white-bg">
  <div class="col-md-12"><h3>Offline Sales Record</h3></div>
<br/>
<br/>
  <p> All <b style="color: red; font-size: 15px;">*</b> Marked field are Compulsory</p>
    <div><a href="<?php echo e(url('offlinecs-dashboard')); ?>" class="btn btn-primary pull-right">Show my Entries</a></div>
      <div class="col-md-12">
         <div class="overflow-scroll">
         	<div class="container">
         	<form  id="frmofflinecs" method="post" enctype="multipart/form-data" action="<?php echo e(url('offlinecs')); ?>">            
              <?php echo e(csrf_field()); ?>

              <div class="row col-md-12" style="padding-left: 0px;">
                <input type="hidden" name="txtofflinecsid" id="txtofflinecsid">
                 <div class="col-md-4">
                  <label>Product: <b style="color: red; font-size: 15px;">*</b></label>
                  <select class="form-control" onchange="pageview()" id="ddproduct" name="ddproduct">
                  <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($val->id); ?>"><?php echo e($val->product_name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                  
                 </select>  
                 </div> 
                <div class="col-md-4">
                   <label> Why Offline: <b style="color: red; font-size: 15px;">*</b></label>
                  <select class="form-control" id="ddlwhyoffline" onchange="showotherdiv()" name="ddlwhyoffline" required>
                    <option value="">--select--</option>
                    <?php $__currentLoopData = $reason; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <option value="<?php echo e($val->id); ?>"><?php echo e($val->Reason); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                 
                 </select>  
                </div>
                 <div class="col-md-4" id="divother" style="display: none;">
                       <label>Other Reason for Offline-cs: <b style="color: red; font-size: 15px;">*</b></label>  
                       <textarea id="txtReason" name="txtReason"  class="form-control" placeholder="Specify Other Reason"></textarea>                  
                 </div>               
                 <div class="col-md-4 otherproduct" style="display: none;">
                  <label>Other Product <b style="color: red; font-size: 15px;">*</b>  </label>
                    <input type="text" name="txtotherproduct" id="txtotherproduct" class="form-control" placeholder="Other Product">
                 </div>                
              </div>           
              <br>
              <div class="row">
                 <div class="col-md-4">
                 	<label>Name of Customer: <b style="color: red; font-size: 15px;">*</b></label><input id="txtcstname" name="txtcstname" type="text" class="form-control txtonly" placeholder="Name of Customer" required>                    
                 </div>
                 <div class="col-md-4">
                 	<label>Address of Customer : <b style="color: red; font-size: 15px;">*</b></label><textarea id="txtadd" name="txtadd" class="form-control" placeholder="Address of Customer" required></textarea>            
                </div>
                <div class="col-md-4">
                	<label>City: <b style="color: red; font-size: 15px;">*</b></label>
                	<select onchange="getstate()" class="form-control" id="ddlcity" name="ddlcity" required>
                		   <option value="">--select--</option>
                       <?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <option value="<?php echo e($val->city_id); ?>"><?php echo e($val->cityname); ?></option>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                	</select>
                </div>              
              </div>
              <div class="row">
                  <div class="col-md-4">
                  <label>Map City:</label>
                  <select class="form-control" id="ddlmapcity" name="ddlmapcity" >
                    <option>--select--</option>                    
                  </select>
                </div>
                 <div class="col-md-4">
                 	<label>State</label>
                 	<select id="ddlstate" name="ddlstate" class="form-control" >
                 		<option>--select--</option>
                 	</select>                  
                 </div>
                 <div class="col-md-4">
                 	<label>Zone</label>
                 	<select id="ddlzone" name="ddlzone" class="form-control" >
                 		<option>--select--</option>
                 	</select>
                </div>
                <div class="col-md-4">
                	<label>Region:</label>
                	<select class="form-control" id="ddlregion" name="ddlregion" >
                		<option value="1">--select--</option>
                	</select>
                </div>
                <div class="col-md-4">
                  <label>Mobile no: <b style="color: red; font-size: 15px;">*</b></label>                   
                   <input id="txtmobno" name="txtmobno" class="form-control numericonly" oninput="javascript: if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" maxlength = "10"  required>             
                </div>
                <div class="col-md-4">
                  <label>Telephone No:</label>
                <input type="number" class="form-control numericonly" name="txttelno" id="txttelno" oninput="javascript: if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "10">              
                </div>             	
              	<div class="col-md-4">
              		<label> Email Id: <b style="color: red; font-size: 15px;">*</b></label>
              		<input type="Email" class="form-control" name="txtemail" id="txtemail" required>           		
              	</div>
               	<div class="col-md-4">
              		<label> Posp Name: <b style="color: red; font-size: 15px;">*</b></label>
              		<select onchange="getpospname();" class="form-control" id="ddlfbaname" name="ddlfbaname" required>
                    <option value="">--Select--</option>
                    <?php $__currentLoopData = $fba; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              			<option value="<?php echo e($val->FBAID); ?>"><?php echo e($val->POSPName); ?> (<?php echo e($val->FBAID); ?>)</option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              		</select>           		
              	</div>
                <div class="col-md-4">
                  <label>Premium Amount: <b style="color: red; font-size: 15px;">*</b></label>
                <input type="number" class="form-control numericonly" name="txtpremiumamt" id="txtpremiumamt" required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "8">        
                </div>
              	<div class="col-md-4">
              		<label>ERP ID:</label>
              		<input type="text" class="form-control" name="txterpid" id="txterpid" readonly>           		
              	</div>

              	<div class="col-md-4">
              		<label>QT No:</label>
              		<input type="text" class="form-control" name="txtqtno" id="txtqtno">           		
              	</div>
                <div class="col-md-4">
                  <label>Date of Expiry: <b style="color: red; font-size: 15px;">*</b></label>
                  <input type="Date" class="form-control" name="txtexpdate" id="txtexpdate" required>            
                </div>
                <div class="col-md-4">
                  <label>Payment Mode: <b style="color: red; font-size: 15px;">*</b></label>
                  <select id="ddlpayment" name="ddlpayment" class="form-control" required>
                    <option value="">--select--</option>
                    <option value="Online">Online</option>
                    <option value="Offline">Offline</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label>UTR No / Cheque No: <b style="color: red; font-size: 15px;">*</b></label>
                  <input type="text" name="txtutrnomotor" class="form-control" id="txtutrnomotor" required>
                </div> 
                <div class="col-md-4">
                  <label>Bank: <b style="color: red; font-size: 15px;">*</b></label>
                  <input type="text" name="txtbankmotor" id="txtbankmotor" class="form-control" required>
                </div>  
              </div>            
            <br>
            <div class="Motor" id="Motor">
            <div class="row">
              	<div class="col-md-4">
              		<label>Vehicle No: <b style="color: red; font-size: 15px;">*</b></label>  
                  <input type="text" name="txtvehicalno" id="txtvehicalno" class="form-control Vehicleno" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "10">        		
              	</div>              	
              	<div class="col-md-4">
              		<label> Break In: <b style="color: red; font-size: 15px;">*</b></label>
              		<label class="checkbox-inline">YES  <input class="Breakinyes" type="radio" name="txtbreakin" id="txtbreakin" value="YES"></label>
              		<label class="checkbox-inline">No  <input class="Breakinno" type="radio" name="txtbreakin" id="txtbreakin" value="No"></label>              		           		
              	</div>              
              	<div class="col-md-4">
              		<label> Insurer: <b style="color: red; font-size: 15px;">*</b></label>
              		<select id="ddlInsurermotor" name="ddlInsurermotor" class="form-control" >
              			<option value="">--select---</option>
              			<?php $__currentLoopData = $Genins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              			<option value="<?php echo e($val->GeneralInsuranceCompanyMasterId); ?>"><?php echo e($val->CompanyName); ?></option>
              			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              		</select>             		
              	</div> 
               </div>
              </div>           
             <div id="divhealth">           
             <div class="row">
             	<div class="col-md-4">
              		<label> Insurer: <b style="color: red; font-size: 15px;">*</b></label>
              		<select id="ddlInsurerhealth" name="ddlInsurerhealth" class="form-control" >
                    <option value="">--select---</option>
                    <?php $__currentLoopData = $health; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              			<option value="<?php echo e($val->id); ?>"><?php echo e($val->companyname); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              		</select>              		
              	</div>  
                <div class="productother">      	
              	<div class="col-md-4">
              		<label> Preexisting: <b style="color: red; font-size: 15px;">*</b></label>
              		<label class="checkbox-inline">YES  <input class="Preexistingyes" type="radio" name="txtPreexisting" id="txtPreexisting" value="YES"></label>
              		<label class="checkbox-inline">No  <input class="Preexistingno" type="radio" name="txtPreexisting" id="txtPreexisting" value="No"></label>             		           		
              	</div>   
              	<div class="col-md-4">
              		<label> Medical Report: <b style="color: red; font-size: 15px;">*</b></label>
              		<label class="checkbox-inline">YES  <input type="radio" class="Medicalyes" name="txtmedicalrp" id="txtmedicalrp" value="YES"></label>
              		<label class="checkbox-inline">No  <input type="radio" class="Medicalno" name="txtmedicalrp" id="txtmedicalrp" value="No"></label>             		           		
              	</div>                 
              	</div>             	                           	
               </div>
               <div class="row productother">
               <div class="col-md-4">
                  <label> Premium Year/s: <b style="color: red; font-size: 15px;">*</b></label>
                  <select id="dllpremium" name="dllpremium" class="form-control" >
                    <option value="">--select--</option>
                    <option value="1 year">1 year</option>
                    <option value="2 year">2 year</option>
                    <option value="3 year">3 year</option>
                  </select>
                </div>
                </div>
               </div>          
             <div id="divlife">
             <div class="row">
             	<div class="col-md-4">
             		<label> Type of Policy: <b style="color: red; font-size: 15px;">*</b></label>
             		<select id="ddlnoofpolicy" name="ddlnoofpolicy" class="form-control" >
             			<option value="">--select--</option>
             			<option value="Term">Term</option>
             			<option value="Other">Other</option>
             		</select>
             	</div>             
             	<div class="col-md-4">
              		<label> Medical case: <b style="color: red; font-size: 15px;">*</b></label>
              		<label class="checkbox-inline">YES <input type="radio" class="Medicalcaseyes" name="txtmedicalcase" id="txtmedicalcase" value="YES"></label>
              		<label class="checkbox-inline">No  <input type="radio" class="Medicalcaseno" name="txtmedicalcase" id="txtmedicalcase" value="No"></label>              		           		
              	</div>             
              	<div class="col-md-4">
              		<label> Insurer: <b style="color: red; font-size: 15px;">*</b></label>
              		<select id="ddlInsurerlife" name="ddlInsurerlife" class="form-control" >
                    <option value="">--select---</option>
                    <?php $__currentLoopData = $lifeins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              			<option value="<?php echo e($val->LifeInsurerCompanyMasterId); ?>"><?php echo e($val->CompanyName); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              		</select>              		
              	</div>             	    	
              </div>
              </div>
              <div class="row">
              	<div class="col-md-4">
              		<label> Executive Name: <b style="color: red; font-size: 15px;">*</b></label>             
                  <select id="txtexecutivename" name="txtexecutivename" class="form-control" required>
                    <option value="">--select--</option >
                    <?php $__currentLoopData = $Executive; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($val->UId); ?>"><?php echo e($val->EmployeeName); ?>-<?php echo e($val->UId); ?></option>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
              	</div>
              	<div class="col-md-4">
              		<label> Executive 1 Name: <b style="color: red; font-size: 15px;">*</b></label>              		
                  <select id="txtexecutivename1" name="txtexecutivename1" class="form-control">
                    <option value="">--select--</option>
                    <?php $__currentLoopData = $Executive1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($val->UId); ?>"><?php echo e($val->EmployeeName); ?>-<?php echo e($val->UId); ?></option>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
              	</div>
              	<div class="col-md-4">
              		<label> Product Executive: <b style="color: red; font-size: 15px;">*</b></label>              		
                  <select id="txtexeProductname" name="txtexeProductname" class="form-control">
                    <option value="">--select--</option>
                    <?php $__currentLoopData = $productexe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($val->UId); ?>"><?php echo e($val->EmployeeName); ?>-<?php echo e($val->UId); ?></option>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
              	</div>
              	<div class="col-md-4">
              		<label> Product Manager: <b style="color: red; font-size: 15px;">*</b></label>              		
                  <select id="txtmgrProductname" name="txtmgrProductname" class="form-control" required>
                    <option value="">--select--</option>
                    <?php $__currentLoopData = $productmgr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($val->UId); ?>"><?php echo e($val->EmployeeName); ?>-<?php echo e($val->UId); ?></option>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
              	</div>              	
              </div>
              <br>  
              <div class="divnewdocs row">
               <div class="col-md-4">
                <label>Quotation</label>
               <input type="file" name="filequotation" id="filequotation" class="form-control files" accept=".png,.jpeg,.jpg,.pdf">
                <span><a id="spnquotation" target="_blank"></a></span>              
              </div>
              <div class="col-md-4">
                <label>Previous Year Policy Copy</label>
               <input type="file" name="filepyp" id="filepyp" class="form-control files" accept=".png,.jpeg,.jpg,.pdf">
                <span><a id="spnpyp" target="_blank"></a></span>              
              </div>  
               <div class="col-md-4">
                <label>New Policy Copy</label>
               <input type="file" name="filepy" id="filepy" class="form-control files" accept=".png,.jpeg,.jpg,.pdf">
                <span><a id="spnpy" target="_blank"></a></span>              
              </div> 
              <div class="col-md-4">
                <label>Other:</label>
                <input type="file" name="fileother" id="fileother" class="form-control files" accept=".png, .jpg, .jpeg .pdf"> 
                <span ><a id="spnother" target="_blank"></a></span>
              </div>          
               
             </div>   


             <div class="row Motor" id="divMotor">              
             	<div class="col-md-4">
             		<label>RC Copy:</label>
             		<input type="file" name="filerc" id="filerc" class="form-control files" accept=".png, .jpg, .jpeg .pdf">  
                <span><a id="spnrccopy" target="_blank"></a></span>                         		
             	</div>
             	<div class="col-md-4">
             		<label>Fitness:</label>
             		<input type="file" name="fileFitness" id="fileFitness" class="form-control files" accept=".png, .jpg, .jpeg .pdf"> 
                <span><a id="spnfitness" target="_blank"></a></span>             		
             	</div>
             	<div class="col-md-4">
             		<label>PUC:</label>
             		<input type="file" name="filePUC" id="filePUC" class="form-control files" accept=".png, .jpg, .jpeg .pdf">    
                 <span><a id="spnPUC" target="_blank"></a></span>         		
             	</div>
             	<div class="col-md-4">
             		<label>Break in Report:</label>
             		<input type="file" name="filebreakrp" id="filebreakrp" class="form-control files" accept=".png, .jpg, .jpeg .pdf"> 
                 <span><a id="spnbreakrp" target="_blank"></a></span>           
             	</div>
              </div> 
              <div class="otherproductdoc health">
               <div class="row"> 
             	<div class="col-md-4">
             		<label>Cheque / Online Payment Receipt Copy:</label>
             		<input type="file" name="fileCheque" id="fileCheque" class="form-control files" accept=".png, .jpg, .jpeg .pdf"> 
                <span><a id="spnCheque" target="_blank"></a></span>           
             	</div>             	 
              </div>                  
             <br>
             <div class="Proposal row" id="Health">                               
             	<div class="col-md-4">
             		<label>Proposal Form:</label>
             		<input type="file" name="fileProposalForm" id="fileProposalForm" class="form-control files" accept=".png, .jpg, .jpeg .pdf">
                <span><a id="spnproposaform" target="_blank"></a></span>
             	</div>  
              <div class="col-md-4">
                <label>KYC:</label>
                <input type="file" name="fileKYC" id="fileKYC" class="form-control files" accept=".png, .jpg, .jpeg .pdf">   
                <span><a id="spnKYC" target="_blank"></a></span>             
              </div>               
              <!-- <div class="col-md-4">
                <label>Previous Year Policy Copy 1:</label>
                <input type="file" name="filepyp1" id="filepyp1" class="form-control" accept=".png, .jpg, .jpeg .pdf">   
                <span><a id="spnpyp1" target="_blank"></a></span>             
              </div>   -->
              <div class="col-md-4">
                <label>Previous Year Policy Copy 2:</label>
                <input type="file" name="filepyp2" id="filepyp2" class="form-control files" accept=".png, .jpg, .jpeg .pdf">   
                <span><a id="spnpyp2" target="_blank"></a></span>             
              </div> 
              <div class="col-md-4">
                <label>Previous Year Policy Copy 3:</label>
                <input type="file" name="filepyp3" id="filepyp3" class="form-control files" accept=".png, .jpg, .jpeg .pdf">   
                <span><a id="spnpyp3" target="_blank"></a></span>             
              </div> 
              <div class="col-md-4">
                <label>Previous Year Policy Copy 4:</label>
                <input type="file" name="filepyp4" id="filepyp4" class="form-control files" accept=".png, .jpg, .jpeg .pdf">   
                <span><a id="spnpyp4" target="_blank"></a></span>             
              </div>   	
             </div> 
             <br>
             </div> 
             <div class="divotherproductdoc row" style="display: none;">
              <div class="col-md-4">
                <label>Document 1</label>
                <input type="file" name="doc1" id="doc1" class="form-control files" accept=".png,.jpeg,.jpg,.pdf"> 
                <span><a id="spndoc1" target="_blank"></a></span>               
              </div>
              <div class="col-md-4">
                <label>Document 2</label>
                <input type="file" name="doc2" id="doc2" class="form-control files" accept=".png,.jpeg,.jpg,.pdf">
                <span><a id="spndoc2" target="_blank"></a></span>                
              </div>
              <div class="col-md-4">
                <label>Document 3</label>
                <input type="file" name="doc3" id="doc3" class="form-control files" accept=".png,.jpeg,.jpg,.pdf">  
                <span><a id="spndoc3" target="_blank"></a></span>              
              </div>
               <div class="col-md-4">
                <label>Document 4</label>
                <input type="file" name="doc4" id="doc4" class="form-control files" accept=".png,.jpeg,.jpg,.pdf">
                <span><a id="spndoc4" target="_blank"></a></span>                
              </div>
              <div class="col-md-4">
                <label>Document 5</label>
                <input type="file" name="doc5" id="doc5" class="form-control files" accept=".png,.jpeg,.jpg,.pdf">  
                <span><a id="spndoc5" target="_blank"></a></span>              
              </div>
               
             </div>                              
             </div>
             <br>
             <br>
             <div class="col-md-12" style="text-align: center;">
               <span id="spnerpid" style="color:red"></span>
              <div id="btnsavediv">

                <button id="saveofflinecs" class="btn btn-primary" >Save</button>
                <input type="submit" id="btnsaveandsendmail" name="save" class="btn btn-primary" value="Save & Send Email"> 
               </div>
               <div id="btnupdatediv">
                 <button id="btnupdate" class="btn btn-primary" >Update</button>
                 <input id="btnupdateandsendmail" type="submit" name="save" class="btn btn-primary" value="Update & Send Email">                 
               </div>             
             </div>            
            </form>            
        </div>
         </div>
      </div>
 </div>
 <script type="text/javascript">
$( document ).ready(function() {
      $("#life").hide();
     	$(".health").hide();
      $(".life").hide();
      $("#Health").hide();
     	$("#divlife").hide();
     	$("#divhealth").hide();
     	$(".Motor").show();
      $('#txtvehicalno').attr('required', true);
      $('#txtbreakin').attr('required', true);
      $('#ddlInsurermotor').attr('required', true);
      

if (window.location.href.indexOf('?id=') > 0) {
        var id = window.location.href.split('?id=')[1];  
         $("#txtofflinecsid").val(id);
         $("#btnsavediv").hide();
         $("#btnupdatediv").show();
         $('#ddproduct').attr('disabled', true);
        //alert(id)
    $.ajax({  
         type: "GET",  
         url:'offlinecsedit/'+id,
         success: function(offlinecsdt)
         {
           var data=  JSON.parse(offlinecsdt);
           $("#ddlwhyoffline").val(data[0].reason);
           $("#txtReason").val(data[0].otherreason);
           showotherdiv();
           $("#ddproduct").val(data[0].Product);
           pageview();
           $("#txtcstname").val(data[0].CustomerName);
           $("#txtadd").val(data[0].CustomerAddress);
           $("#ddlcity").val(data[0].City);
           getstate();
           $("#txtmobno").val(data[0].MobileNo);
           $("#txttelno").val(data[0].TelephoneNo);
           $("#txtemail").val(data[0].EmailId);
           $("#ddlfbaname").val(data[0].FBAID);
           $("#txterpid").val(data[0].ERPID);
           var ERPID=data[0].ERPID;   
           //alert(ERPID) ;          
                if (ERPID=='') {                  
                  $("#btnupdateandsendmail").hide();
                  $("#spnerpid").text("You cannot send email as ERPID is not available. Please contact your floor cordinator.");
                 } 
                 else{                   
                   $("#btnupdateandsendmail").show();
                   $("#spnerpid").text("");
                 }
           //getpospname();
           $("#txtpremiumamt").val(data[0].PremiumAmount);
           $("#txtqtno").val(data[0].QTNo);
           $("#txtexpdate").val(data[0].DateofExpiry);
           $("#ddlpayment").val(data[0].PaymentMode);
           $("#txtutrnomotor").val(data[0].UTRNo);
           $("#txtbankmotor").val(data[0].Bank);
           $("#txtvehicalno").val(data[0].VehicleNo);
           if(data[0].BreakIn=='YES')
           {
            $(".Breakinyes").attr('checked', 'checked');
           }
           else{
            $(".Breakinno").attr('checked', 'checked');
           }
           $("#ddlInsurermotor").val(data[0].Insurermotor);
           $("#txtexecutivename").val(data[0].ExecutiveName);
           $("#txtexecutivename1").val(data[0].ExecutiveName1);
           $("#txtexeProductname").val(data[0].ProductExecutive);
           $("#txtmgrProductname").val(data[0].ProductManager);
           $("#ddlInsurerlife").val(data[0].Insurerlife);
           $("#ddlnoofpolicy").val(data[0].TypeofPolicy);
           $("#txtotherproduct").val(data[0].otherproductname); 
           if(data[0].RCCopy!=0){
           $("#spnrccopy").append(data[0].RCCopy);
           $('#spnrccopy').attr('href','<?php echo e(url('/upload/offlinecs')); ?>/'+data[0].RCCopy);
           }
           if(data[0].Fitness!=0){
           $("#spnfitness").append(data[0].Fitness);
           $('#spnfitness').attr('href','<?php echo e(url('/upload/offlinecs')); ?>/'+data[0].Fitness);
           }
           if(data[0].PUC!=0){
           $("#spnPUC").append(data[0].PUC);
           $('#spnPUC').attr('href','<?php echo e(url('/upload/offlinecs')); ?>/'+data[0].PUC);
           }
           if(data[0].BreakinReport!=0){
           $("#spnbreakrp").append(data[0].BreakinReport);
           $('#spnbreakrp').attr('href','<?php echo e(url('/upload/offlinecs')); ?>/'+data[0].BreakinReport);
           }
           if(data[0].ChequeCopy!=0){
           $("#spnCheque").append(data[0].ChequeCopy);
           $('#spnCheque').attr('href','<?php echo e(url('/upload/offlinecs')); ?>/'+data[0].ChequeCopy);
           }
           if(data[0].Other!=0){
           $("#spnother").append(data[0].Other);
           $('#spnother').attr('href','<?php echo e(url('/upload/offlinecs')); ?>/'+data[0].Other);
           }
           if(data[0].ProposalForm!=0){
           $("#spnproposaform").append(data[0].ProposalForm);           
           $('#spnproposaform').attr('href','<?php echo e(url('/upload/offlinecs')); ?>/'+data[0].ProposalForm);
           }
           if(data[0].KYC!=0){
           $("#spnKYC").append(data[0].KYC);
           $('#spnKYC').attr('href','<?php echo e(url('/upload/offlinecs')); ?>/'+data[0].KYC);
           }
           if(data[0].otherproductdoc1!=0){
           $("#spndoc1").append(data[0].otherproductdoc1);
           $('#spndoc1').attr('href','<?php echo e(url('/upload/offlinecs')); ?>/'+data[0].otherproductdoc1);
           }
           if(data[0].otherproductdoc2!=0){
           $("#spndoc2").append(data[0].otherproductdoc2);
           $('#spndoc2').attr('href','<?php echo e(url('/upload/offlinecs')); ?>/'+data[0].otherproductdoc2);
           }
           if(data[0].otherproductdoc3!=0){
           $("#spndoc3").append(data[0].otherproductdoc3);
           $('#spndoc3').attr('href','<?php echo e(url('/upload/offlinecs')); ?>/'+data[0].otherproductdoc3);
           }
           if(data[0].otherproductdoc4!=0){
           $("#spndoc4").append(data[0].otherproductdoc4);
           $('#spndoc4').attr('href','<?php echo e(url('/upload/offlinecs')); ?>/'+data[0].otherproductdoc4);
           }
           if(data[0].otherproductdoc5!=0){
           $("#spndoc5").append(data[0].otherproductdoc5);
           $('#spndoc5').attr('href','<?php echo e(url('/upload/offlinecs')); ?>/'+data[0].otherproductdoc5);
           }
           if(data[0].Quotation!=0){
           $("#spnquotation").append(data[0].Quotation);
           $('#spnquotation').attr('href','<?php echo e(url('/upload/offlinecs')); ?>/'+data[0].Quotation);
           }
           if(data[0].pyp!=0){
           $("#spnpyp").append(data[0].pyp);
           $('#spnpyp').attr('href','<?php echo e(url('/upload/offlinecs')); ?>/'+data[0].pyp);
           }
           if(data[0].newpolicycopy!=0){
           $("#spnpy").append(data[0].newpolicycopy);
           $('#spnpy').attr('href','<?php echo e(url('/upload/offlinecs')); ?>/'+data[0].newpolicycopy);
           }
           if(data[0].pyp2!=0){
           $("#spnpyp2").append(data[0].pyp2);
           $('#spnpyp2').attr('href','<?php echo e(url('/upload/offlinecs')); ?>/'+data[0].pyp2);
           }
           if(data[0].pyp3!=0){
           $("#spnpyp3").append(data[0].pyp3);
           $('#spnpyp3').attr('href','<?php echo e(url('/upload/offlinecs')); ?>/'+data[0].pyp3);
           }
           if(data[0].pyp4!=0){
           $("#spnpyp4").append(data[0].pyp4);
           $('#spnpyp4').attr('href','<?php echo e(url('/upload/offlinecs')); ?>/'+data[0].pyp4);
           }
           if (data[0].Insurerhealth!=0){
           $("#ddlInsurerhealth").val(data[0].Insurerhealth);
           } 
           if (data[0].Preexisting=='YES') {
             $(".Preexistingyes").attr('checked', 'checked');
            }
             if (data[0].Preexisting=='NO'){
              $(".Preexistingno").attr('checked', 'checked');
            }
            if (data[0].MedicalReport=='YES'){
              $(".Medicalyes").attr('checked', 'checked');
            }
             if (data[0].MedicalReport=='NO') {
               $(".Medicalno").attr('checked', 'checked');
            }
             if (data[0].Medicalcase=='NO') {
               $(".Medicalcaseno").attr('checked', 'checked');
            } 
            if (data[0].Medicalcase=='YES') {
               $(".Medicalcaseyes").attr('checked', 'checked');
            } 
            $("#dllpremium").val(data[0].PremiumYears); 

            }

        });   
      } 
      else{
        $("#btnupdatediv").hide();
      }
});
 	function pageview(){
     if($("#ddproduct").val()==1){
     	$(".Motor").show();
     	$("#life").hide();
     	$("#Health").hide();
     	$("#divlife").hide();
     	$("#divhealth").hide();
      $(".health").hide();
      $(".life").hide();
      $(".otherproduct").hide();
      $(".divotherproductdoc").hide();
      $('#txtvehicalno').attr('required', true);
      $('#txtbreakin').attr('required', true);
      $('#ddlInsurermotor').attr('required', true); 
      $('#txtotherproduct').removeAttr("required"); 
      $('#ddlInsurerhealth').removeAttr("required");
      $('#dllpremium').removeAttr("required");
      $('#txtotherproduct').removeAttr("required");
      $('#ddlnoofpolicy').removeAttr("required");
      $('#ddlInsurerlife').removeAttr("required");

     }
     else if($("#ddproduct").val()==2){
      $(".Motor").show();
      $("#life").hide();
      $("#Health").hide();
      $("#divlife").hide();
      $("#divhealth").hide();
      $(".health").hide();
      $(".life").hide();
      $(".otherproduct").hide();
      $(".divotherproductdoc").hide();
      $('#txtvehicalno').attr('required', true);
      $('#txtbreakin').attr('required', true);
      $('#ddlInsurermotor').attr('required', true);  
      $('#txtotherproduct').removeAttr("required");  
      $('#ddlInsurerhealth').removeAttr("required");
      $('#dllpremium').removeAttr("required");
      $('#txtotherproduct').removeAttr("required");  
      $('#ddlnoofpolicy').removeAttr("required");
      $('#ddlInsurerlife').removeAttr("required");
     }
     else if($("#ddproduct").val()==3){
      $(".Motor").show();
      $("#life").hide();
      $("#Health").hide();
      $("#divlife").hide();
      $("#divhealth").hide();
      $(".health").hide();
      $(".life").hide();
      $(".otherproduct").hide();
      $(".divotherproductdoc").hide();
      $('#txtvehicalno').attr('required', true);
      $('#txtbreakin').attr('required', true);
      $('#ddlInsurermotor').attr('required', true);
      $('#txtotherproduct').removeAttr("required");
      $('#ddlInsurerhealth').removeAttr("required");
      $('#dllpremium').removeAttr("required");
      $('#txtotherproduct').removeAttr("required");
      $('#ddlnoofpolicy').removeAttr("required");
      $('#ddlInsurerlife').removeAttr("required");
      
     }
     else if($("#ddproduct").val()==4){
     	$("#life").hide();
     	$("#Health").show();
     	$("#divlife").hide();
     	$("#divhealth").show();
      $(".Proposal").show();
     	$(".Motor").hide();
      $(".health").show();
      $(".life").hide();
      $(".productother").show();
      $(".otherproduct").hide();
      $(".divotherproductdoc").hide();
      $('#ddlInsurerhealth').attr('required', true);
      $('#dllpremium').attr('required', true);      
      $('#txtvehicalno').removeAttr("required"); 
      $('#txtbreakin').removeAttr("required");
      $('#ddlInsurermotor').removeAttr("required");
      $('#filerc').removeAttr("required");
      $('#fileFitness').removeAttr("required");
      $('#filePUC').removeAttr("required");
      $('#filebreakrp').removeAttr("required");
      $('#txtotherproduct').removeAttr("required");
     }
     else if($("#ddproduct").val()==5){
      $("#life").hide();
      $("#Health").show();
      $("#divlife").hide();
      $("#divhealth").show();
      $(".Proposal").show();
      $(".Motor").hide();
      $(".health").show();
      $(".life").hide();
      $(".productother").show();
      $(".otherproduct").hide();
      $(".divotherproductdoc").hide();
      $('#ddlInsurerhealth').attr('required', true);
      $('#dllpremium').attr('required', true);      
      $('#txtvehicalno').removeAttr("required"); 
      $('#txtbreakin').removeAttr("required");
      $('#ddlInsurermotor').removeAttr("required");
      $('#filerc').removeAttr("required");
      $('#fileFitness').removeAttr("required");
      $('#filePUC').removeAttr("required");
      $('#filebreakrp').removeAttr("required");
      $('#txtotherproduct').removeAttr("required");
     }
     else if($("#ddproduct").val()==6){   	
      $("#life").show();
     	$("#Health").hide();
     	$("#divlife").show();
      $(".Proposal").show();
     	$("#divhealth").hide();
     	$(".Motor").hide();
      $(".health").show();
      $(".life").show();
      $(".otherproduct").hide();
      $(".divotherproductdoc").hide();
      $('#ddlnoofpolicy').attr('required', true);
      $('#ddlInsurerlife').attr('required', true);      
      $('#txtvehicalno').removeAttr("required"); 
      $('#txtbreakin').removeAttr("required");
      $('#ddlInsurermotor').removeAttr("required");
      $('#filerc').removeAttr("required");
      $('#fileFitness').removeAttr("required");
      $('#filePUC').removeAttr("required"); 
      $('#filebreakrp').removeAttr("required");
      $('#dllpremium').removeAttr("required");     
      $('#txtotherproduct').removeAttr("required"); 
     }
    else if($("#ddproduct").val()==7){
      $("#life").hide();
      $("#Health").show();
      $("#divlife").hide();
      $("#divhealth").show();
      $(".Proposal").show();
      $(".Motor").hide();
      $(".health").show();
      $(".life").hide();
      $(".productother").hide();
      $(".otherproduct").show();
      $(".otherproductdoc").hide();
      $(".divotherproductdoc").show();
      $('#ddlInsurerhealth').attr('required', true);
      $('#txtotherproduct').attr('required', true);      
      $('#txtvehicalno').removeAttr("required"); 
      $('#txtbreakin').removeAttr("required");
      $('#ddlInsurermotor').removeAttr("required");
      $('#filerc').removeAttr("required");
      $('#fileFitness').removeAttr("required");
      $('#filePUC').removeAttr("required");
      $('#filebreakrp').removeAttr("required");
      $('#ddlnoofpolicy').removeAttr("required");
      $('#ddlInsurerlife').removeAttr("required");
     } else{
      $(".Motor").show();
      $("#life").hide();
      $("#Health").hide();
      $("#divlife").hide();
      $("#divhealth").hide();
      $(".health").hide();
      $(".life").hide();
      $(".otherproduct").hide();
      $(".divotherproductdoc").hide();
      $('#txtvehicalno').attr('required', true);
      $('#txtbreakin').attr('required', true);
      $('#ddlInsurermotor').attr('required', true);
      $('#ddlInsurerhealth').removeAttr("required");
      $('#dllpremium').removeAttr("required");
      $('#txtotherproduct').removeAttr("required");
      $('#ddlnoofpolicy').removeAttr("required");
      $('#ddlInsurerlife').removeAttr("required");
      
      
      
     }
    }
function getpospname()
{

  var fbaid=$("#ddlfbaname").val();  
  if (fbaid!='') {
   $.ajax({
             url: 'get_ERPID_offlinecs/'+fbaid,
             type: "GET",             
             success:function(data) 
             {      
              var erpid=  JSON.parse(data);                  
               var ERPID=erpid[0].ERPID;              
                if (ERPID=='') {
                  $("#btnsaveandsendmail").hide();
                  $("#btnupdateandsendmail").hide();
                  $("#spnerpid").text("You cannot send email as ERPID is not available. Please contact your floor cordinator.");
                 } 
                 else{
                   $("#btnsaveandsendmail").show();
                   $("#btnupdateandsendmail").show();
                   $("#spnerpid").text("");
                 }     
               $("#txterpid").val(erpid[0].ERPID);
               $("#txtexecutivename").val(erpid[0].fieldmanageruid);
               $("#txtexecutivename1").val(erpid[0].rrmuid);
                 
                     
             }
         });   
 }
 else{

 }


}

   
  $(".txtonly").keypress(function (e) {
    if (String.fromCharCode(e.keyCode).match(/[^ a-zA-Z]/g)) return false;
    });
  $(".Vehicleno").keypress(function (e) {
    if (String.fromCharCode(e.keyCode).match(/[^0-9a-zA-Z]/g)) return false;
  });
  $(".numericonly").keypress(function (e) {
    if (String.fromCharCode(e.keyCode).match(/[^0-9]/g)) return false;
});





$("#saveofflinecs" ).click(function() { 
  
  /*//filequtition
  if (window.File && window.FileReader && window.FileList && window.Blob)
    {
        //get the file size and file type from file input field
        var fsize = $('#filequotation')[0].files[0].size;
        
        if(fsize>15000000) //do something if file size more than 1 mb (1048576)
        {
            alert(fsize +" bites\nToo big!");
        }else{
            alert(fsize +" bites\nYou are good to go!");
        }
    }
    ///2
     if (window.File && window.FileReader && window.FileList && window.Blob)
    {
        //get the file size and file type from file input field
        var fsize = $('#filepyp')[0].files[0].size;
        
        if(fsize>15000000) //do something if file size more than 1 mb (1048576)
        {
            alert(fsize +" bites\nToo big!");
        }else{
            alert(fsize +" bites\nYou are good to go!");
        }
    }
    //3
     if (window.File && window.FileReader && window.FileList && window.Blob)
    {
        //get the file size and file type from file input field
        var fsize = $('#filepy')[0].files[0].size;
        
        if(fsize>15000000) //do something if file size more than 1 mb (1048576)
        {
            alert(fsize +" bites\nToo big!");
        }else{
            alert(fsize +" bites\nYou are good to go!");
        }
    }
     //4
     if (window.File && window.FileReader && window.FileList && window.Blob)
    {
        //get the file size and file type from file input field
        var fsize = $('#fileother')[0].files[0].size;
        
        if(fsize>15000000) //do something if file size more than 1 mb (1048576)
        {
            alert(fsize +" bites\nToo big!");
        }else{
            alert(fsize +" bites\nYou are good to go!");
        }
    }
    //5
    if (window.File && window.FileReader && window.FileList && window.Blob)
    {
        //get the file size and file type from file input field
        var fsize = $('#filerc')[0].files[0].size;
        
        if(fsize>15000000) //do something if file size more than 1 mb (1048576)
        {
            alert(fsize +" bites\nToo big!");
        }else{
            alert(fsize +" bites\nYou are good to go!");
        }
    }
    //6
     if (window.File && window.FileReader && window.FileList && window.Blob)
    {
        //get the file size and file type from file input field
        var fsize = $('#fileFitness')[0].files[0].size;
        
        if(fsize>15000000) //do something if file size more than 1 mb (1048576)
        {
            alert(fsize +" bites\nToo big!");
        }else{
            alert(fsize +" bites\nYou are good to go!");
        }
    }
    //7
     if (window.File && window.FileReader && window.FileList && window.Blob)
    {
        //get the file size and file type from file input field
        var fsize = $('#filePUC')[0].files[0].size;
        
        if(fsize>15000000) //do something if file size more than 1 mb (1048576)
        {
            alert(fsize +" bites\nToo big!");
        }else{
            alert(fsize +" bites\nYou are good to go!");
        }
    }
    //8
    if (window.File && window.FileReader && window.FileList && window.Blob)
    {
        //get the file size and file type from file input field
        var fsize = $('#filebreakrp')[0].files[0].size;
        
        if(fsize>15000000) //do something if file size more than 1 mb (1048576)
        {
            alert(fsize +" bites\nToo big!");
        }else{
            alert(fsize +" bites\nYou are good to go!");
        }
    }*/
    $("#frmofflinecs").attr('action', '<?php echo e(url('saveofflinecs')); ?>');
});
$("#btnupdate" ).click(function() {
  $("#frmofflinecs").attr('action', '<?php echo e(url('offlinecsupdate')); ?>');
});
$("#btnupdateandsendmail" ).click(function() {
  $("#frmofflinecs").attr('action', '<?php echo e(url('offlinecsupdateandsendmail')); ?>');
});

function getstate()
{
  var cityid=$("#ddlcity").val();
   $.ajax({
             url: 'get_state_offlinecs/'+cityid,
             type: "GET",             
             success:function(data) 
             {
              //alert(data);
              var state=  JSON.parse(data);
              $('#ddlstate').empty();  
              $('#ddlzone').empty();
              $('#ddlregion').empty();  
              $('#ddlmapcity').empty();                     
              $('#ddlstate').append('<option value="'+ state[0].state_id +'">'+ state[0].state_name +'</option>');
              $('#ddlzone').append('<option value="'+ state[0].state_id +'">'+ state[0].zone +'</option>');
              $('#ddlregion').append('<option value="'+ state[0].state_id +'">'+ state[0].region +'</option>'); 
              $('#ddlmapcity').append('<option value="'+ state[0].mapcity +'">'+ state[0].mapcity +'</option>');          
             }
         });
}

function showotherdiv(){
 if($("#ddlwhyoffline").val()==9)
 {
   $("#divother").show();
   $('#txtReason').attr('required', true);
 }
 else
 {
   $("#divother").hide();
   $('#txtReason').removeAttr("required");
 }
}



</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>