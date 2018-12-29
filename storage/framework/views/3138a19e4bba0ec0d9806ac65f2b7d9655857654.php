
<?php $__env->startSection('content'); ?>
 <div class="container-fluid white-bg">
  <div class="col-md-12"> 
    <div class="panel panel-primary">
      <div class="panel-heading"><b>MAIL DATA</b></div><br><br>
        <div class="panel-body">
          <div class="overflow-scroll">
            <div class="table-responsive">
          <?php if(Session::has('message')): ?>
          <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <p class="alert alert-success"><?php echo e(Session::get('message')); ?></p>
          </div>
          <?php endif; ?>
      <table class="table table-bordered table-striped" id="example">
        <thead>
          <tr>
            <th>Mail ID</th>
            <th>Mail Subject</th>
            <th>Mail Body</th>
            <th>Created By</th>
            <th>Created Date</th>            
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
         <?php $__currentLoopData = $smsdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($val->mail_tamplate_id); ?></td>
            <td><?php echo e($val->subject); ?></td>
            <td><textarea readonly><?php echo e($val->mail_body); ?></textarea></td>
            <td><?php echo e($val->FullName); ?></td>
            <td><?php echo e($val->created_date); ?></td> 

            <td><button type="button" id="modelbutton" class="btn btn-success"  onclick="demo('<?php echo e($val->mail_tamplate_id); ?>')">Edit</button></td>
                    
            <td><a href="delete-mail-table/<?php echo e($val->mail_tamplate_id); ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this recored ?')">Delete</a></td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 </tbody>
</table>
</div>
</div>
</div>
</div>




<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update SMS Template</h4>
        </div>
        <div class="modal-body">      

        <form name="sms_template" id="sms_template"  method="post" action="<?php echo e(url('update_view_mail_templete')); ?>">
           <?php echo e(csrf_field()); ?>

           <input type="hidden" class="form-control" id="id" name="id" value="">

          <div class="col-md-2 col-xs-12">
            <label>Mail Subject:</label>
          </div>
         <div class="col-md-10 col-xs-12">
          <input type="text" class="form-control" id="mail" name="mail" value="">
          </div>
      
          <br><br><br>
          <div class="col-md-2 col-xs-12">
            <label>Mail Body:</label>
          </div>
          <div class="col-md-10 col-xs-12">
          <textarea type="text" class="form-control" id="Body" name="Body" value=""></textarea>
          </div>
          <br><br><br><br>
          
      <center>
          <input type="submit" name="attn_submit" id="attn_submit" value="submit" class="btn btn-primary">
       </center>
      </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>    
</div>
</div>
</div>
</div></div>
</div>
  <script type="text/javascript">
   function demo(mail_tamplate_id){ 
   $.ajax({
    url: 'mail-table-model/'+mail_tamplate_id,
    type: "GET",
    success:function(user)
    {
      var data=  JSON.parse(user);
      $('#myModal').modal('show');                   
      $('#id').val('');  
      $('#mail').val('');
      $('#Body').val('');
      $('#id').val(data[0].mail_tamplate_id);
      $('#mail').val(data[0].subject);
      $('#Body').val(data[0].mail_body);
    }
  });
 } 
  </script>
  <script type="text/javascript">
   window.setTimeout(function() {
       $(".alert").fadeTo(500, 0).slideUp(500, function(){
           $(this).remove(); 
       });
     }, 1000);
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>