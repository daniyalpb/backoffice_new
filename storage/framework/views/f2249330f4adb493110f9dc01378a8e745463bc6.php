<?php $__env->startSection('content'); ?>


<style type="text/css">

h3.mrg-btm {
  font-style: italic;
}

</style>

   <div class="col-md-12"><h3 class="mrg-btm">Pincode CRM FBA Mapping  </h3>

<form id="updateempdtl" name="updateempdtl" method="POST" action="<?php echo e(url('empuidupdate')); ?>" >

    <?php echo e(csrf_field()); ?>

     <hr>
     </div>



<!--      <div class="form-group col-md-6">
        <div class="col-md-5">
           <button type="button" class="btn btn-default btn-sm dropdown-toggle form-control" data-toggle="dropdown">--SELECT --</button>
          <ul class="dropdown-menu" style="min-width: 24rem;   height: 250px; overflow: auto;">
             <?php $__currentLoopData = $stateview; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li style="font-size: 17px;"><a href="#" class="small" data-value="option1" tabIndex="-1"><input type="checkbox" name="state[]" id="state" value="<?php echo e($val->state_id); ?>" style="margin: 4px 7px 0;" /><?php echo e($val->state_name); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </div>
        </div> -->


   <div class="col-md-4 col-sm-4 col-xs-12">
     <h4 style="margin-left: 45%;">State</h4>
               <ul class="dropdown-menu" style="min-width: 24rem;   height: 250px; overflow: auto;"> </ul>

     <div class="form-group">
     <select multiple="multiple" class="form-control select-sty" name="state[]" id="state" >    
     </select>
     </div>
     </div>


<!--      <div class="form-group col-md-6">
        <div class="col-md-5">
           <button type="button" class="btn btn-default btn-sm dropdown-toggle form-control" data-toggle="dropdown">--SELECT --</button>
          <ul class="dropdown-menu" style="min-width: 24rem;   height: 250px; overflow: auto;">
           <?php if(isset($profilrcity)): ?>
             <?php $__currentLoopData = $profilrcity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li style="font-size: 17px;"><a href="#" class="small" data-value="option1" tabIndex="-1"><input type="checkbox" name="city[]" id="city" value="<?php echo e($val->PinCode); ?>" style="margin: 4px 7px 0;" /><?php echo e($val->cityname); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
          </ul>
        </div>
         </div>
 -->


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


<!--      <div class="form-group col-md-6">
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
         </div> -->
<div class="form-group col-md-6"> 
        <div class="col-md-5">
    <select name="eprofile" id="eprofile"  class="text-primary form-control" onchange="getprofilename(this.value,document.getElementById ('PinCode').value)" value="<?php echo e($val->Profile); ?>" >
     <option value="">--Select Profile--</option>
      <?php $__currentLoopData = $empprofile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <!-- ($val->Profile->Profile) -->{
    <option value="<?php echo e($val->role_id); ?>"><?php echo e($val->Profile); ?>,<?php echo e($val->role_id); ?></option>
    }
  
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
          </div>
          </div>




      <!-- <div class="button-group"> -->
<!--        <div class="form-group col-md-6">
        <div class="col-md-5">
           <button type="button" class="btn btn-default btn-sm dropdown-toggle form-control" data-toggle="dropdown">--SELECT PROFILE--</button>
          <ul class="dropdown-menu" style="min-width: 24rem;   height: 250px; overflow: auto;">
             <?php $__currentLoopData = $empprofile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li style="font-size: 17px;"><a href="#" class="small" data-value="option1" tabIndex="-1"><input type="checkbox" name="eprofile" onclick="getprofilename(this.value,document.getElementById('PinCode').value)" value="<?php echo e($val->Profile); ?>" style="margin: 4px 7px 0;" /><?php echo e($val->Profile); ?>,<?php echo e($val->role_id); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
           
        </div>
         </div> -->



 <!--     <div class="col-md-4 col-sm-4 col-xs-12" style="margin-left: -499px">
     <h4 style="margin-left: 45%;">Name</h4>
     <div class="form-group"> -->
     <div class="form-group col-md-6" style="margin-left: -409px"> 
        <div class="col-md-5">
     <select class="form-control select-sty" name="pname" id="pname">
     </select>
     </div>
     </div> 

        <div class="col-md-6" style="margin-left:-383px;margin-top: 7px;">
        <input type="checkbox" name="mapfba" id="mapfba" value="1"> Override FBA Mapping
          </div>


<div class="col-md-12">
      <div class="overflow-scroll">
      <div class="table-responsive" >
 <!--    <table class="datatable-responsive table table-striped table-bordered nowrap" id="example">

                     <thead>
                  </thead>
                <tbody>
             </tbody>
       </table> -->
           
           <input type="Submit" name="statussub" id="statussub" value="submit" class="btn btn-success">

    </div>
   </div>
 </div>
   </form>


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
   $('#city').append('<option value="'+value.cityid+'">'+value.cityname+'</option>');   
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
  // $('#PinCode').append(arr); 

 
 
    var v_token ="<?php echo e(csrf_token()); ?>";
   $.ajax({  
    type: "POST",  
    url: "<?php echo e(URL::to('get-city-pincode')); ?>",
    data : {'_token': v_token,'cityid':array},
    success: function(msg){
   
    if(msg)
    {  $.each(msg, function( index, value ) {
   $('#PinCode').append('<option value="'+value.pincode+'">'+value.pincode+'</option>');   
    }); 
     }else{
      $('#PinCode').empty().append('No Result Found');
      }
      }  
      });
      });
  </script>




<script>
  var options = [];
$( '.dropdown-menu a' ).on( 'click', function( event ) {

   var $target = $( event.currentTarget ),
       val = $target.attr( 'data-value' ),
       $inp = $target.find( 'input' ),
       idx;

   if ( ( idx = options.indexOf( val ) ) > -1 ) {
      options.splice( idx, 1 );
      setTimeout( function() { $inp.prop( 'checked', false ) }, 0);
   } else {
      options.push( val );
      setTimeout( function() { $inp.prop( 'checked', true ) }, 0);
   }

   $( event.target ).blur();
      
   //console.log( options );
   return false;
});
</script>


<script type="text/javascript">
  function getprofilename(Profile){
   $("#pname").empty();
    //console.log(Profile);
        $.ajax({ 
        //url: 'profile-name/'+Profile+'/'+PinCode,
          url: 'profile-name/'+Profile,
        method:"GET",
        success: function(data){
          var msg = JSON.parse(data);
          //$("#pname").val("");
          $.each(msg, function(index) {
      $("#pname").append('<option value="'+msg[index].UId+'">'+msg[index].EmployeeName+'</option');
            //alert(msg[index].EmployeeName);
       });

          //console.log(data);
 }
        });
  }


</script>

 










  <script type="text/javascript">
 
//   $(document).ready(function(){
//     //alert('test');
//       $('#statussub').onclick(function () {
//       alert('test');
//    ($('#updateempdtl').valid()){
//    $.ajax({ 
//    url: "<?php echo e(URL::to('update-uid')); ?>",
//    method:"POST",
//    data: $('#updateempdtl').serialize(),
//    success: function(msg)  
//    {
//     //alert('Update Successfully');
//     //window.location.reload();
    
    
//    }

// });
//  }

// });

//       });




  </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>