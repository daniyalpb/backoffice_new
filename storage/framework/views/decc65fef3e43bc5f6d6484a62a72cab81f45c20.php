<?php $__env->startSection('content'); ?>
   <div class="col-md-12"><h3 class="mrg-btm">FBA Assignment for quicklead</h3>


    <form  id="leadquick" name="leadquick" action="<?php echo e(url('fbaquickleadcity')); ?>" method="post"> 
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

      <div class="form-group"> <input type="Submit" name="qlead" id="qlead"  class="mrg-top common-btn pull-left" value="SHOW"> 
      </div>
  </form>
  <br>
     
      <div class="col-md-12 hidden" id="tablediv">
      <div class="overflow-scroll">
      <div class="table-responsive" >
    <!-- <th><input type="checkbox" name="chekfba" id="chekfba" class="select-checkall-header"></th> 
    <input name="select_all" id="checkAll" type="checkbox" />-->
      <form method="post" id="fbdatail-table-from">
        <?php echo e(csrf_field()); ?>

      <input type="hidden" name="txtfid" id="txtfid">
      <div class="form-group">
                 <label class="control-label">Users:</label>
                <select name="ddlstatus" id="ddlstatus" class="form-control" style="width:30%" required >
                        <option value="">--Select --</option>
                        <?php $__currentLoopData = $userfb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>           
                        <option value="<?php echo e($val->fbauserid); ?>"><?php echo e($val->fbauserid); ?> <?php echo e($val->username); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
      </div>


       <table class="datatable-responsive table table-striped table-bordered nowrap" id="example">

           <thead>
           <tr>
           <th><input name="select_all" value="1" id="example-select-all" type="checkbox" /></th>       
           <th>FBA ID</th> 
           <th>FBA Name</th> 
           <th>Email id</th>
           <th>Mobile No</th> 
           <th>City</th>                                  
           </tr>
           </thead>
           </table>
           <div>
           <a id="fbdatail" name="fbdatail" class="btn btn-success">Submit</a>
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
 // $('#example-gried').DataTable({

 //        "order": [[ 0, "desc" ]],
 //        "ajax": "fbaquickleadcity",
 //        "data": $('#leadquick').serialize(),
 //        "columns": [

 //            { "data": "fbaid"},
 //            { "data": "fbaid"},
 //            { "data": "fbaid"},
 //            { "data": "fbaid"},
 //            { "data": "fbaid"}

 //        ],

 //    });

    //.column('0:visible').order('desc').draw();

 /*$.ajax({ 
   url: "<?php echo e(URL::to('fbaquickleadcity')); ?>",
   method:"POST",
   data: $('#leadquick').serialize(),
   success: function(msg)  
   {
            arr=Array();
            $('#append_id').empty();
           $.each(msg, function( index, value ) {
          arr.push('<tr><td><input value="" type="checkbox" class="chk" name="id"></td><td>'+value.FBAID+'</td><td>'+value.FullName+'</td><td>'+value.EmailID+'</td><td>'+value.MobiNumb1+'</td><td>'+value.City+'</td></tr>');



           });

           $('#append_id').append(arr);
   }

 });*/

 });


function getLoanData(){
  $.ajax({
  url: 'fbaquickleadcity',
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
            return '<input type="checkbox" name="id[]" value="'+ $('<div/>').text(data).html() + '">';              }
            },
            { "data": "FBAID"},
            { "data": "FullName"},
            { "data": "EmailID"},
            { "data": "MobiNumb1"},
            { "data": "City"} ,
            
             
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
 url: "<?php echo e(URL::to('quickleadassignment')); ?>",
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
    url: "<?php echo e(URL::to('quickleadcity')); ?>",
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

$(document).ready(function (){ 

  $('#example-select-all').on('click', function(){
    var table = $('#example').DataTable();
      // Check/uncheck all checkboxes in the table
     var rows = table.rows({ 'search': 'applied' }).nodes();
      $('input[type="checkbox"]', rows).prop('checked', this.checked);
   });

  $('#example tbody').on('change', 'input[type="checkbox"]', function(){
      // If checkbox is not checked
      if(!this.checked){
         var el = $('#example-select-all').get(0);
         // If "Select all" control is checked and has 'indeterminate' property
         if(el && el.checked && ('indeterminate' in el)){
            // Set visual state of "Select all" control 
            // as 'indeterminate'
            el.indeterminate = true;
         }
      }
   });
});


// $('.select-checkall-header').change(function() {
//         if($(this).is(":checked")) {
//             var all= $('.select-checkall:checked').map(function() {return this.value;}).get().join(',');
//             $('#txtfid').val(all);
//         }
//         else{
//           $('#txtfid').val("");
//         }
        
//     });




// $('.select-checkall').click(function(){
// var all= $('.select-checkall:checked').map(function() {return this.value;}).get().join(',');
//    if(!$('.select-checkall').is(':checked'))
//    {
//       alert('checked');
//       $('#txtfid').val(all);
//      $('#chekfba').prop('checked', false);
//    }
//     else{
//       alert('unchecked');
//   $('#txtfid').val(all);
//     }
//  });


   // $("#select_all").click(function(){
   //  if($('#select_all').is(':checked')){
   //          $('.select-checkall').prop('checked', true);                       
   //  }
   //  else{
   //    $('.select-checkall').prop('checked', false);
   //  }
   //   });


  $('#fbdatail').click(function(){

    if($('#ddlstatus').val()==""){
      alert('Please Select User');
      return false;
    }
    // if(! $("#fbdatail-table-from").valid()){
    //   return false;
    // }
  $('#txtfid').val("");
  var table = $('#example').DataTable();
  var rows = table.rows({ 'search': 'applied' }).nodes();
  var chkval="";
 for (var i = 0; i<rows.length; i++) {

  if($('input[type="checkbox"]', rows[i])[0].checked){

   chkval = chkval +","+$('input[type="checkbox"]', rows[i])[0].defaultValue;

  }
 }
$('#txtfid').val(chkval);
// alert(chkval);
if(chkval==""){
  alert('Please Select FBA');
  return false;
}
//alert($('#txtfid').val());

   if ($('#leadquick').valid()){
   $.ajax({ 
   url: "<?php echo e(URL::to('fbaquickleadcitysave')); ?>",
   method:"POST",
   data: $('#fbdatail-table-from').serialize(),
   success: function(msg)  
   {
    console.log(msg);
    alert('FBA Assigned Successfully');
    window.location.reload();
    //$('#leadquick').trigger("reset");
   
   }

});
 }
});




//   $(document).ready(function(){   
//    $("#checkAll").click(function () {
//      $('input:checkbox').not(this).prop('checked', this.checked);
//       len=$(".check_list:checkbox:checked").length;
//         //  $('#msg_check').text(len+"/");   
//  });
// });





 
</script>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>