<?php $__env->startSection('content'); ?>
   <div class="col-md-12"><h3 class="mrg-btm">FBA CRM Exception Mapping</h3>


    <form  id="leadquick" name="leadquick" action="<?php echo e(url('fba-exception-update')); ?>" method="post"> 
    <?php echo e(csrf_field()); ?>

     <hr>
     </div>
     <!-- <table class="table table-responsive table-hover" cellspacing="0" id="example"> -->

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

      <div class="form-group"> <input type="Submit" name="qlead" id="qlead"  class="mrg-top common-btn pull-left"  value="SHOW">
      <!-- style=" margin-top: 11%; margin-left: -237px"  -->
      </div>
 <!--  </form> -->
  <br>
     
      <div class="col-md-12 hidden" id="tablediv">
      <div class="overflow-scroll">
      <div class="table-responsive" >
    <!-- <th><input type="checkbox" name="chekfba" id="chekfba" class="select-checkall-header"></th> 
    <input name="select_all" id="checkAll" type="checkbox" />-->
      <!-- <form method="post" id="fbdatail-table-from">
        <?php echo e(csrf_field()); ?> -->
      <input type="hidden" name="txtfid" id="txtfid">
       
    <!--  -->


         </div> 
<div class="form-group col-md-6"> 
        <div class="col-md-5">
    <select name="eprofile" id="eprofile"  class="text-primary form-control" onclick="getprofilename(this.value,document.getElementById ('pname').value)" >
     <option value="">--Select Profile--</option>
      <?php $__currentLoopData = $empprofile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($val->role_id); ?>"><?php echo e($val->Profile); ?>,<?php echo e($val->role_id); ?></option>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
          </div>
          </div>

        <div class="form-group col-md-6" style="margin-left: -409px"> 
        <div class="col-md-5">
     <select class="form-control select-sty" name="pname" id="pname">
     </select>
     </div>
     </div> 




       <table class="datatable-responsive table table-striped table-bordered nowrap" id="example">

           <thead>
           <tr>
           <th><input name="select_all" value="1" id="example-select-all" type="checkbox" /></th>       
           <th>FBA ID</th> 
           <th>FBA Name</th>                                
           </tr>
           </thead>
           </table>
           <div>
           <input type="text" name="hiddenid" id="hiddenid" > 
        <input type="Submit" name="fbdatail" id="fbdatail" value="submit" class="btn btn-success">
<!-- 
           <a id="fbdatail" name="fbdatail" class="btn btn-success">Submit</a> -->
           </div>

       </form> 
    </div>
   </div>
 </div>

  <script type="text/javascript">

$(document).ready(function(){

$('#qlead').on('click', function(e){
  e.preventDefault(); 
  getLoanData();

 });


function getLoanData(){
  $.ajax({
  url: 'fba-exception-data',
  type: "POST",           
  data:  $('#leadquick').serializeArray(),
  success:function(data) {
    var json = JSON.parse(data);
    console.log(json);
    if(json.length>0){

     $('#tablediv').removeClass('hidden');
    table = $('#example').DataTable({         
    "data":json,
    "order": [[ 1, "desc" ]],
    "destroy": true,
    "searching": true,
     
        "columns": [
           {"data":"FBAID" ,

             "render": function ( data, type, row, meta ) {
        return '<input type="checkbox" name="p_fbaid" id="p_fbaid_'+ $('<div/>').text(data).html() + '" onclick="stausupdate(this.id)" value="'+ $('<div/>').text(data).html() + '">';              }
            },
            { "data": "FBAID"},
            { "data": "FullName"},
            
             ]
    
        });
  }
  else{
   $('#tablediv').addClass('hidden');
    alert('No data available');
  }
  },
  error: function(XMLHttpRequest, textStatus, errorThrown) {
    $('#tablediv').addClass('hidden');
     alert("Please select state and city");
  }
});     
}
})

 $.ajax({ 
 url: "<?php echo e(URL::to('get-fba-exception')); ?>",
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
    url: "<?php echo e(URL::to('fbaexception-city')); ?>",
    data : {'_token': v_token,'state':array},
    success: function(msg){
    console.log(msg);
    if(msg)
    {  $.each(msg, function( index, value ) {
   $('#city').append('<option value="'+value.cityname+'">'+value.cityname+'</option>');   
    }); 
     }else{
      $('#city').empty().append('No Result Found');
      }
      }  
      });
      });

  </script>

  <script type="text/javascript">
  function getprofilename(Profile){
   $("#pname").val("");
    //console.log(Profile);
        $.ajax({ 
          url: 'crm-profile-name/'+Profile,
        method:"GET",
        success: function(data){
          var msg = JSON.parse(data);
          $.each(msg, function(index) {
          $("#pname").append('<option value="'+msg[index].UId+'">'+msg[index].EmployeeName+'</option');
          
       });

          //console.log(data);
 }
        });
  }


</script>

<script type="text/javascript">
/*  function stausupdate(FBAID){
 //alert(id);
 $("#hiddenid").val(FBAID);
 var FBAID = $("#hiddenid").val()
};*/


function stausupdate(this_id){

  //$("#check_all_fba").prop("checked",false);

  if($("#hiddenid").val() == ""){
    var fbaid_array = [];
  }else{
    var fbaid_array = $("#hiddenid").val().split(',');
  }


  if($("#" + this_id).is(":checked")){            //if checkbox is checked
     //push element in fbaid_array
     fbaid_array.push($("#" + this_id).val());

}else{                                         //if checkbox is unchecked
  //remove element from fbaid_array
   var index = fbaid_array.indexOf($("#" + this_id).val());
   if(index > -1){
    fbaid_array.splice(index , 1);
   }
}

$("#hiddenid").val(fbaid_array.join(","));
}
</script>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>