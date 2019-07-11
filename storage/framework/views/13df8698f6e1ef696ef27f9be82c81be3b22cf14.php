<?php $__env->startSection('content'); ?>
<?php if(Session::has('message')): ?>
<div class="alert alert-success alert-dismissible">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<p class="alert alert-success"><?php echo e(Session::get('message')); ?></p>
</div>
<?php endif; ?>

<?php if(Session::get('usergroup')=='13'||Session::get('usergroup')=='50'): ?>
<div class="container-fluid white-bg">
  <div class="form group">
           	 <div class="col-md-4 col-xs-12">
              <h4>Update FBA Details</h4>
           

            </div>
          </div>

<!--     <input type="text" name="search_fba" id="search_fba" maxlength="6" onkeypress="return fnAllowNumeric(event)" required>
    <button type="submit" id="sub" name="sub" class="btn btn-primary">
    <span class="glyphicon glyphicon-search"></span> Search</button>
 placeholder="Enter FBA ID"  -->
<!-- <form id="demo_form" name="demo_form" class="form-horizontal" method="POST" action="<?php echo e(url('update_fbamaster')); ?>"> 
  <?php echo e(csrf_field()); ?>  --> 
 <div> <a href="<?php echo e(url('manually-ifsc-code')); ?>" class="qry-btn" style="margin-top:-2px;margin-left:545px;" name="udtbankdetails" id="udtbankdetails" target="_blank" >Update Bank Details</a>

 <a href="<?php echo e(url('manually-pincode')); ?>" class="qry-btn"  name="udtbankdetails" id="udtbankdetails" target="_blank" >Update Pin Code</a>
 </div>

<form id="demo_form" name="demo_form" class="form-horizontal" method="POST" action="<?php echo e(url('update_fbamaster')); ?>"> 
 <?php echo e(csrf_field()); ?> 


      <div class="form-group">
      <div class="col-lg-4">
      <input type="text" class="form-control numericOnly" id="search_fba" name="search_fba"  placeholder="Enter FBA ID" required="yes">
      </div>
      <div class="col-lg-2">
      <button type="submit" id="sub" name="sub" class="btn btn-primary">
      <span class="glyphicon glyphicon-search"></span> Search</button>
      </div>
      </div><br><br>
<!-- <form id="demo_form" name="demo_form" class="form-horizontal" method="POST" action="<?php echo e(url('update_fbamaster')); ?>"> 
           <?php echo e(csrf_field()); ?>  -->

      <div class="form-group">
      <label for="name" class="col-lg-4 control-label">Fba Id</label>
      <div class="col-lg-5">
      <input type="text" class="form-control" id="fba_id" name="fba_id" readonly="" required>
      </div>
      </div>

 
      <div class="form-group">
      <label for="name" class="col-lg-4 control-label">First Name:</label>
      <div class="col-lg-5">
      <input type="text" class="form-control" id="f_name" name="f_name" required>
      </div>
      </div>

      <div class="form-group">
      <label for="name" class="col-lg-4 control-label">Middle Name:</label>
      <div class="col-lg-5">
      <input type="text" class="form-control" id="midname" name="midname">
      </div>
      </div>
    
      <div class="form-group">
      <label for="address1" class="col-lg-4 control-label"><b>Last Name:</b></label>
      <div class="col-lg-5">
      <input type="text" id="l_name" name="l_name" class="form-control input-md" required>
      </div>
      </div>


      <div class="form-group">
      <label for="email" class="col-lg-4 control-label">Email:</label>
      <div class="col-lg-5">
      <input type="email" class="form-control" id="work_email"  name="work_email" required>
      </div>
      </div>

      <div class="form-group">
      <label for="mobile" class="col-lg-4 control-label">Mobile No:</label>
      <div class="col-lg-5">
      <input type="text" class="form-control" id="mobile" name="mobile" maxlength="10" required>
      </div>
      </div>

      <div class="form-group">
      <label for="DOB" class="col-lg-4 control-label">DOB:</label>
      <div class="col-lg-5">
      <input type="date" class="form-control" id="dbirth" name="dbirth" required>
      </div>
      </div>
  
      <div class="form-group">
      <div class="col-lg-5 col-lg-offset-6">
      <button type="submit" id="updtefba" onclick="userValid()" name="updtefba" class="btn btn-primary">Update</button>
      </div>
      </div>

</form>
</div>


  <script type="text/javascript">
        $(document).ready(function(){
         $("#sub").click(function(){
               if( $("#search_fba").val()==''){

                  return  false;
             }

               $.ajax({
                url: "<?php echo e(url('fbaid-view')); ?>",
                type: 'get',
                data:{'id':$("#search_fba").val()},

                success: function(data){
               console.log(data);
               // var date=data[0].DOB;
               // var newdate=date.toString('dd-MM-yy');
               //alert(newdate);
                if (data.length<=0) 
                {
                  alert("no data found");
                  window.location.replace("fbamaster-edit"); 
                 }else{            
                      $('#f_name').val(data[0].FirsName);
                      $('#midname').val(data[0].MiddName); 
                      $('#l_name').val(data[0].LastName);
                      $('#work_email').val(data[0].emailID);
                      $('#mobile').val(data[0].MobiNumb1);
                      $('#fba_id').val(data[0].FBAID);
                      $('#dbirth').val(data[0].DOB);  
                    }

                }                                
            });
        });

    $("#search_fba").keydown(function(){
                     $('#f_name').val('');
                      $('#midname').val(''); 
                      $('#l_name').val('');
                      $('#work_email').val('');
                      $('#mobile').val('');
                      $('#fba_id').val('');
                      $('#dbirth').val('');

    });
    });
          
  </script>


<!--   <script type="text/javascript">

          function fnAllowNumeric(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {

              return false;
            }
            return true;
          }
 </script>
 -->
<script type="text/javascript">
 function userValid(){
 
 var txtsearch = document.getElementById("search_fba").value;
  if (txtsearch == "") {
  alert("Please fill all mandatory details");
  }
}
</script>



<?php $__env->stopSection(); ?>
<?php endif; ?>
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>