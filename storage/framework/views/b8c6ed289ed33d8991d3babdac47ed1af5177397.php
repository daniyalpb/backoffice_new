<?php $__env->startSection('content'); ?>
<div class="col-md-12"><p >  
<div class="col-md-12">
<div class="overflow-scroll">
<div class="table-responsive" >
<table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="example">
<thead>
<tr>
<th>ID</th>
<th>Category Name</th>
<th>Sub Category Name</th>
<th>Classification Name </th>
<th>Message</th>
<th>Status</th>
<th>Raised By</th>
<th>Fba Email Id</th>
<th>Assigned To</th>
<th>Assigned Date</th>
</tr>
</thead>
<tbody>

 <?php $__currentLoopData = $query; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $va): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <?php  
  $class =($va->user_fba_id!=null)? 'background: #97ecb9': '';
  ?>
  <tr style='<?php echo e($class); ?> '>
  <?php if($va->user_fba_id!=null): ?>
<td><a href="#"  ><?php echo e($va->TicketRequestId); ?></a>
</td>
<?php else: ?>
<td><a href="#" onclick="TicketRequest_fn('<?php echo e($va->TicketRequestId); ?>','<?php echo e($va->toemailid); ?>','<?php echo e($va->toemailid); ?>')" ><?php echo e($va->TicketRequestId); ?></a>
 </td>
   <?php endif; ?>
  <td><?php echo e($va->CateName); ?></td>
  <td><?php echo e($va->QuerType); ?></td>
  <td><?php echo e($va->Description); ?></td>
  <td><textarea readonly style='<?php echo e($class); ?>'><?php echo e($va->Message); ?></textarea></td>
  <td><?php echo e($va->Status); ?></td>
  <td><?php echo e($va->RaisedByName); ?></td>
  <td><?php echo e($va->RaisedByEmail); ?></td>
  <td><?php echo e($va->UserName); ?></td>
 <td><?php echo e($va->assigned_date); ?></td>
  </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>  
  </table>
  </div>
  </div>
  </div>
  </div>
  <div class="modal fade" id="Ticket-Request-Id-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">User</h5>


  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
 </button>
 </div>
 <div class="modal-body">
 <form class="form-horizontal" method="post"  id="TicketRequest_Id_from" > 
  <?php echo e(csrf_field()); ?>

 <input type="hidden" name="TicketRequestId" id="TicketRequest_Id" >
 <div class="form-group">
 <label for="inputEmail" class="control-label col-xs-2">Select</label>
  <div class="col-xs-10">
  <select name="FBAUserId"class="form-control"  id="FBAUserId">
  <option value="0">select</option>
  <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <option value="<?php echo e($v->FBAUserId); ?>"><?php echo e($v->UserName); ?></option>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select>
  </div>
  </div> 
 
  <div class="form-group">
  <label for="inputEmail" class="control-label col-xs-2"> To mail</label>
  <div class="col-xs-10">
  <input type="text" name="toemailid"  class="form-control"  id="toemailid">  
  </div>
  </div>

   <div class="form-group">
  <label for="inputEmail" class="control-label col-xs-2"> CC mail</label>
  <div class="col-xs-10">
  <input type="text" name="ccemailid"  class="form-control"  id="ccemailid">  
  </div>
  </div>
  
  </form>
  </div>
  <div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <button type="button" class="btn btn-primary" name="TicketRequest_Id_save" id="TicketRequest_Id_save">Save changes</button>
  </div>
  </div>
  </div>
  </div>
  <div class="modal fade" id="Ticket-comment-Id-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">Comment</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>
  <div class="modal-body">
  <table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="example">
  <thead><tr><th>Comment</th></tr></thead>
  <tbody id="get_comment_id"></tbody>
  </table>
  </div>
  <div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <button type="button" class="btn btn-primary" id="TicketRequest_Id_save0">Save changes</button>
  </div>
  </div>
  </div>
  </div>
  <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.12.2/semantic.min.css" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.12.2/semantic.min.js"></script>

  <script type="text/javascript">
  function TicketRequest_fn(ID,toemailid,ccemailid){  
   $('#TicketRequest_Id').val(ID);
   $('#toemailid').val(toemailid);
   $('#ccemailid').val(ccemailid);
   $('#Ticket-Request-Id-Modal').modal('show');}
  $(document).on('click','#TicketRequest_Id_save',
    function(e){ e.preventDefault();
 ceckemail=checkEmails();

 if($('#FBAUserId').val()==0){
  alert("Please select user");
 }
 else if(ceckemail!=0){
  alert("Please add email");
 }

 else{
     $.post("<?php echo e(url('ticket-request-save')); ?>",
      $('#TicketRequest_Id_from').serialize())
             .done(function(data){ 
              console.log(typeof(data));
              console.log(data);
                 if(data==0){
                  alert('Ticket successfully assigned to '+$("#FBAUserId").children("option").filter(":selected").text());  
              window.location.href = "<?php echo e(url('ticket-request')); ?>";
                 }else{
                  console.log("error");
                 }
          }).fail(function(xhr, status, error) {
            console.log("error");
                 alert('Something went wrong');  
            });
        }
   })



 function view_comment_fn(ID){  
 $('#Ticket-comment-Id-Modal').modal('show');
  $.get("<?php echo e(url('ticket-request')); ?>",{'TicketRequestId':ID})
  .done(function(data){
    arr=Array();
   $('#get_comment_id').empty();
  $.each(data, function(key, value) {                  
 arr.push('<tr><td>'+value.comment+'</td></tr>');
  });             
 $('#get_comment_id').append(arr);
 }).fail(function(xhr, status, error) {
console.log(error);
 });
 }
 $(function() {
  var scntDiv = $('#p_scents');
  var i =  1;     
    $('#addScnt').on('click', function() {   
     if( i<=3) {
    $('<p><label for="inputEmail" class="control-label col-xs-2"> CC mail</label> <input type="text" name="toemailid[]"  class="form-control  " style="width: 495px;"  id="toemailid'+i+'" required> <label for="inputEmail" class="control-label col-xs-2"> CC mail</label> <input type="text" name="ccemailid[]"  class="form-control  " style="width: 495px;"  id="ccemailid'+i+'" required>  <a href="#" id="remScnt" class="remScnt">Remove</a></p>').appendTo(scntDiv);
  i++;
  }
   return false;
  });
        
  $(document).on('click','.remScnt', function() {  
   if( i > 1 ) {
   $(this).parents('p').remove();
  i--;
   }
 return false;
});
});

</script> 
<script language="javascript">
function checkEmail(email) {
//var regExp = /(^[a-z0-9]([a-zA-Z0-9_\.\-]*)@([a-z_\.]*)([.][a-z]{3})$)|(^[a-z]([a-zA-Z0-9\-]*)@([a-z_\.]*)(\.[a-z]{3})(\.[a-z]{2})*$)/i;

 regExp =/[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/igm;
return regExp.test(email);
}

function checkEmails(){
  var emails = document.getElementById("ccemailid").value;
  var emailArray = emails.split(",");
  var invEmails = "";
  var tru=1;
  for(i = 0; i <= (emailArray.length - 1); i++){
    if(checkEmail(emailArray[i])){
      //Do what ever with the email.
        tru=0;
    }else{
      invEmails += emailArray[i] + "\n";
      tru=1;
    }
  }
  if(invEmails != ""){
    //alert("Invalid emails:\n" + invEmails);
  }

  return tru;
}
</script>
<?php $__env->stopSection(); ?>




 
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>