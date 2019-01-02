<?php $__env->startSection('content'); ?>

   <div class="col-md-12"><h3 class="mrg-btm">State_City_Wise_Profile  </h3>

  <form  id="statecityshow" name="statecityshow" method="post"> 
    <?php echo e(csrf_field()); ?>

     <hr>
     </div>




  <div class="col-md-4 col-sm-4 col-xs-12">
     <h4 style="margin-left: 45%;">State</h4>
     <div class="form-group">
     <select multiple="multiple" class="form-control select-sty" name="state[]" id="state" >    
     </select>
     </div>
     </div>

     <div class="col-md-4 col-sm-4 col-xs-12">
     <h4 style="margin-left: 45%;">City</h4>
     <div class="form-group">
     <select  multiple="multiple" class="form-control select-sty" name="city[]" id="city">
     </select>
     </div>
     </div>

     <div class="col-md-4 col-sm-4 col-xs-12">
     <h4 style="margin-left: 45%;">Pin Code</h4>
     <div class="form-group">
     <select  multiple="multiple" class="form-control select-sty" name="PinCode[]" id="PinCode">
     </select>
     </div>
     </div>





     <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Profile:</label>
        </div>
         <div class="col-md-7">
        <select name="eprofile" id="eprofile"  class="text-primary form-control">
             <?php if(isset($empprofile)): ?>
      <?php $__currentLoopData = $empprofile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($val->Profile); ?>"><?php echo e($val->Profile); ?></option>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <?php endif; ?>
          </select>
          </div>
         </div>



<!--      <div class="form-group"> <input type="submit" name="qlead" id="qlead"  class="mrg-top common-btn pull-left" value="SHOW"> 
     </div> -->

<div class="col-md-12">
      <div class="overflow-scroll">
      <div class="table-responsive" >
    <table class="datatable-responsive table table-striped table-bordered nowrap" id="example">

                     <thead>
                  </thead>
                <tbody>
             </tbody>
       </table>
             </form>
         <!--     <div>
             <button id="fbdatail" name="fbdatail" class="btn btn-success">Submit</button>
             </div> -->

    </div>
   </div>
 </div>


 <script type="text/javascript">
 $.ajax({ 
 url: "<?php echo e(URL::to('state-wise-profile')); ?>",
 method:"GET",
 success: function(datas)  
 {
 var data=$.parseJSON(datas);
 // console.log(data);
 if(data)
 { $.each(data, function( index, value ) {
 $('#state').append('<option value="'+value.state_id+'">'+value.state_name+'</option>');
 }); 
 }else{
  $('#state').empty().append('No Result Found');
  }
  },
  });

    $('#state').on('change', function() {
  $("#city").empty().append('');
   // alert('okae');
  var state=$('#state').find(":selected").val();
  var array = "";
  var i=0;
   $('#state  option:selected').each(function() {
    array+= $(this).val()+",";
    });
   console.log(array);
    var v_token ="<?php echo e(csrf_token()); ?>";
   $.ajax({  
    type: "POST",  
    url: "<?php echo e(URL::to('get-city')); ?>",
    data : {'_token': v_token,'state':array},
    success: function(msg){
    console.log(msg);
    if(msg)
    {  $.each(msg, function( index, value ) {
   $('#city').append('<option value="'+value.PinCode+'">'+value.cityname+'</option>');   
    }); 
     }else{
      $('#city').empty().append('No Result Found');
      }
      }  
      });
      });


    ///////////////////////////


    $('#city').on('change', function() {
  $("#PinCode").empty();
   // alert('okae');
  var state=$('#city').find(":selected").val();
  var array = "";
  var i=0;

 var arr=Array();
   $('#city  option:selected').each(function() {
     arr.push('<option value="'+$(this).val()+'">'+$(this).val()+'</option>');
    array+= $(this).val()+",";
    });
   console.log(array);
   $('#PinCode').append(arr); 

return  false;
 
    var v_token ="<?php echo e(csrf_token()); ?>";
   $.ajax({  
    type: "POST",  
    url: "<?php echo e(URL::to('get-city-pincode')); ?>",
    data : {'_token': v_token,'pincode':array},
    success: function(msg){
    console.log(msg);
    if(msg)
    {  $.each(msg, function( index, value ) {
   $('#PinCode').append('<option value="'+value.PinCode+'">'+value.PinCode+'</option>');   
    }); 
     }else{
      $('#PinCode').empty().append('No Result Found');
      }
      }  
      });
      });



















  </script>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>