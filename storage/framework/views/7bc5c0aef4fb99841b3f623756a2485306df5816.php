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
<div class="col-md-12"><h3 class="mrg-btm">Manual Pincode Entry Form </h3>
  
  <form id="addpincodefom" name="addpincodefom" method="POST" action="<?php echo e(url('insert-pincode')); ?>"> 

    <?php echo e(csrf_field()); ?>

    <hr>
  </div>
  <table class="datatable-responsive table table-striped table-bordered nowrap" id="example">
    <tr>
      <th><h4>State</h4></th>
      <th><h4>City</h4></th>
      <th><h4>Pincode</h4></th>
    </tr>

    <td style="width: 350px;">

      <select class="form-control select-sty" name="state" id="state" onchange="set_state_name(this.id)">
        <option value="">--Select State--</option>
        <?php $__currentLoopData = $state; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($val->StatID); ?>"><?php echo e($val->State); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
      <input type="hidden" name="hidden_state_name" id="hidden_state_name" readonly="readonly">
    </td>

    <td style="width: 350px;">
     <div align="right">
       <a id="manuallyadd" onchange="set_state_name(this.id)"><span class="glyphicon glyphicon-plus" title="Add City And Pincode"></span></a>
     </div>

     <select required="required" class="form-control select-sty" name="city" id="city" onchange="set_city_name(this.id)">
      <option value="">--Select City --</option>
      <option value=""></option>
    </select>
    <input type="hidden" name="hidden_city_name" id="hidden_city_name" readonly="readonly"></td>

    <td style="width: 350px;">
     <input type="text" class="text-primary form-control" name="pincode" id="pincode" required="required" maxlength="6" placeholder="Add Manually Pin Code">
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
        <h4 class="modal-title">Add City And PinCode</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>        
      <!-- Modal body -->
      <div class="modal-body">
        <form id="manuallypincodefrom" name="manuallypincodefrom" method="post" action="<?php echo e(url('insert-pincode')); ?>">
          <?php echo e(csrf_field()); ?>

          <label>Add City:</label>
          <input type="text" class="text-primary form-control" name="addcity" id="addcity" required="required">
          <label>Add PinCode:</label>
          <input type="text" class="text-primary form-control" name="addpincode" id="addpincode" required="required" maxlength="6">
        </div>
        <input type="text" name="cityid" id="cityid" readonly="readonly">
        <input type="hidden" name="manuallyadd" id="manuallyadd1" readonly="readonly">
        <input type="hidden" name="hiddenstatename" id="hiddenstatename" readonly="readonly">
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


<script type="text/javascript">

 $('#manuallyadd').click(function(){
   $('#manuallyadd1').val(1);
   $('#appsourcemodel').modal('show');
   
 });

 $.ajax({ 
   url: "<?php echo e(URL::to('get-manually-pincode')); ?>",
   method:"GET",
   success: function(datas)  
   {
     var data=$.parseJSON(datas);
 // console.log(data);
 if(data)
   { $.each(data, function( index, value ) {
     $('#state').append('<option value="'+value.StatID+'">'+value.State+'</option>');
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
   // console.log(array);
   var v_token ="<?php echo e(csrf_token()); ?>";
   $.ajax({  
    type: "POST",  
    url: "<?php echo e(URL::to('get-manually-city')); ?>",
    data : {'_token': v_token,'state':array},
    success: function(msg){
      console.log(msg);
      if(msg)
        {  $.each(msg, function( index, value ) {
         $('#city').append('<option value="'+value.DCCityID+'">'+value.cityname+'</option>');   
       }); 
    }else{
      $('#city').empty().append('No Result Found');
    }
  }  
});
 });


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
    url: "<?php echo e(URL::to('manually-pincode')); ?>",
    data : {'_token': v_token,'DCCityID':array},
    success: function(msg){
     
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

 function set_state_name(this_id){
 	//alert(this_id.value);
 	$("#hidden_state_name").val($("#" + this_id + " option:selected").text())
 	$("#hiddenstatename").val($("#" + this_id + " option:selected").text())	
 }

 function set_city_name(this_id){
 	$("#hidden_city_name").val($("#" + this_id + " option:selected").text())
 }
</script>

<script type="text/javascript">
 $(function(){
   $('#pincode').keyup(function(){    
     var yourInput = $(this).val();
     re = /[A-Za-z]?[A-Za-z `~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi;
     var isSplChar = re.test(yourInput);
     if(isSplChar)
     {
      var no_spl_char = yourInput.replace(/[A-Za-z]?[A-Za-z `~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
      $(this).val(no_spl_char);
    }
  });

   $('#addpincode').keyup(function(){    
     var yourInput = $(this).val();
     re = /[A-Za-z]?[A-Za-z `~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi;
     var isSplChar = re.test(yourInput);
     if(isSplChar)
     {
      var no_spl_char = yourInput.replace(/[A-Za-z]?[A-Za-z `~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
      $(this).val(no_spl_char);
    }
  });

   
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
 });
</script>

<script type="text/javascript">
 function get_city_id(DCCityID){
    //alert(BankID);
    $("#cityid").val(DCCityID);
  }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>