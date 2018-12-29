
<?php $__env->startSection('content'); ?>
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">View Assigned Ticket</h3></div>
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
<th>Assigned Date</th> 
<th>Comment</th>
</tr>   
</thead>
<tbody>
<?php $__currentLoopData = $query; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td><a href="#" style="color: black;" onclick="Ticket_comment_fn('<?php echo e($val->TicketRequestId); ?>')" ><?php echo e($val->TicketRequestId); ?></a></td>
<td><?php echo $val->CateName; ?></td>
<td><?php echo $val->QuerType; ?></td>
<td><?php echo $val->Description; ?></td>
<td><?php echo $val->Message; ?></td>
<td><?php echo $val->Status;?></td>
<td><?php echo $val->CreatedDate;?></td>
<td><a href="#" onclick="view_comment_fn_user('{{ <?php echo $val->TicketRequestId;?>}}')">View</a></td>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                           
</tbody>
</table>
</div>
</div>
</div>
</div>
<div class="modal fade" id="Ticket-comment-Id-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">User</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form class="form-horizontal" method="post"  id="Ticket_comment_Id_form" > 
  <?php echo e(csrf_field()); ?>

<input type="hidden" name="TicketRequestId" id="TicketRequest_Id" >
<div class="form-group">
<label for="inputEmail" class="control-label col-xs-2"> Select</label>
<div class="col-xs-10">
<select name="status"  id="commentstatus_id" class="form-control" >
<option value="0">select</option>
<?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($v->TicketStatusId); ?>"><?php echo e($v->StatusName); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div>
</div> 
<div class="form-group">
<label for="inputEmail" class="control-label col-xs-2">Comment</label>
<div class="col-xs-10">
<textarea name="comment" id="comment_id"  class="form-control"></textarea>
</div>
</div> 
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="button" class="btn btn-primary" id="Ticket_comment_Id_save">Save</button>
</div>
</div>
</div>
</div>
<div class="modal fade" id="Ticket-comment-user-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">History</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="example">
<thead><tr><th>Comment</th><th>Status</th><th>Date</th></tr></thead>
<tbody id="get_comment_id"></tbody>
</table>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>

<script type="text/javascript">
function Ticket_comment_fn(ID){
$('#TicketRequest_Id').val(ID);
$('#Ticket-comment-Id-Modal').modal('show');
}
$(document).on('click','#Ticket_comment_Id_save',function(e)
{ e.preventDefault();
if($('#commentstatus_id').val()!=0 && $('#comment_id').val()!=''){
$.post("<?php echo e(url('ticket-user-comment')); ?>",
$('#Ticket_comment_Id_form').serialize())
.done(function(data){ 
if(data==0){
window.location.href ="<?php echo e(url('ticket-request-user-list')); ?>";
}else{
console.log("error");
}
}).fail(function(xhr, status, error) {
console.log(error);
});
}else{
alert("please file  input...");
}
})
function view_comment_fn_user(ID){  
$('#Ticket-comment-user-Modal').modal('show');
$.get("<?php echo e(url('ticket-request')); ?>",{'TicketRequestId':ID})
.done(function(data){
arr=Array();
$('#get_comment_id').empty();
$.each(data, function(key, value) {
arr.push('<tr><td>'+value.comment+'</td><td>'+value.StatusName+'</td><td>'+value.created_date+'</td></tr>');
}); 
console.log(arr);
$('#get_comment_id').append(arr);
}).fail(function(xhr, status, error) {
console.log(error);
});
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>