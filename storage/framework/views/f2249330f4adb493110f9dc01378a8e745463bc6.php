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

<div class="col-md-12"><h3 class="mrg-btm">Pincode CRM FBA Mapping  </h3>
  <?php if(Session::get('usergroup')==50): ?>
  <form id="updateempdtl" name="updateempdtl" method="POST" action="<?php echo e(url('empuidupdate')); ?>"> 

    <?php echo e(csrf_field()); ?>

    <hr>
  </div>

      <table class="datatable-responsive table table-striped table-bordered nowrap" id="example">
      <tr>
      <th><h4>Select</h4></th>
       <th><h4>State</h4></th>
      <th><h4>City</h4></th>
      <th><h4>Pincode</h4></th>
       </tr>
        <td><input type="radio" name="chekpin" id="yes" checked="" value="1"></td>
       <tr id="TrSection1">
       <td></td>
      
       <div id="Section1" name="Section1">

          <td><select multiple="multiple" class="form-control select-sty" name="state[]" id="state" >    
         </select></td><td>
           <select  multiple="multiple" class="form-control select-sty" name="city[]" id="city">
           </select></td>
           <td>
           <select  multiple="multiple" class="form-control select-sty" name="PinCode[]" id="PinCode">
           </select></td></div></tr>
            <td><input type="radio" name="chekpin" id="no" value="0"></td>
           <tr id="TrSection2" style="display: none">
          
           <div id="Section2" name="Section2">
           <td colspan=3><textarea rows="4" name="txtpincode" id="txtpincode" placeholder="Enter Comma Seperated Pin Codes Here..."></textarea></td></div></tr>
           <tr><td></td><td>
           <?php $__currentLoopData = $empprofile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <select name="eprofile" id="eprofile"  class="text-primary form-control" onchange="getprofilename(this.value,document.getElementById ('PinCode').value)" value="<?php echo e($val->Profile); ?>" >
             <option value="">--Select Profile--</option>
             <?php $__currentLoopData = $empprofile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <option value="<?php echo e($val->role_id); ?>"><?php echo e($val->Profile); ?></option>           
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </select></td><td><select class="form-control select-sty" name="pname" id="pname">
         </select></td><td><input type="checkbox" name="mapfba" id="mapfba" value="1"> Override FBA Mapping</td></tr><tr><td align=center colspan=4><input type="Submit" name="statussub" id="statussub" value="submit" class="btn btn-success"></td></tr>
    </table>
   </form>
<?php endif; ?>

   <script type="text/javascript">
     $.ajax({ 
       url: "<?php echo e(URL::to('state-wise-profile')); ?>",
       method:"GET",
       success: function(datas)  
       {
         var data=$.parseJSON(datas);

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

   var state=$('#city').find(":selected").val();
   var array = "";
   var i=0;
   
   var arr=Array();
   $('#city  option:selected').each(function() {
     arr.push('<option value="'+$(this).val()+'">'+$(this).val()+'</option>');
     array+= $(this).val()+",";
   });
   console.log(array);


  
  
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

   return false;
 });
</script>


<script type="text/javascript">
  function getprofilename(Profile){
   $("#pname").empty();

    $.ajax({ 

        url: 'profile-name/'+Profile,
        method:"GET",
        success: function(data){
          var msg = JSON.parse(data);
          $("#pname").append('<option value="Null">No Mapping</option');

          $.each(msg, function(index) {
            $("#pname").append('<option value="'+msg[index].UId+'">'+msg[index].EmployeeName+'</option');

          });


        }
      });
  }


</script>
<script type="text/javascript">
 $(function() {
   $("input[name='chekpin']").click(function() {
     if ($("#yes").is(":checked")) {
       $("#TrSection1").show();
      $("#TrSection2").hide();
     } else {
       $("#TrSection1").hide();
        $("#TrSection2").show();
     }
   });
 });
</script>

<script type="text/javascript">
   
   $(function(){
   $('#txtpincode').keyup(function(){    
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




<?php $__env->stopSection(); ?>
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>