
<?php $__env->startSection('content'); ?>
 <div class="container-fluid white-bg">
  <div class="col-md-12"> 
    <div class="panel panel-primary">
      <div class="panel-heading"><b>SMS DATA</b></div><br><br>
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
            <th>SMS ID</th>
            <th>SMS Head</th>
            <th>SMS Body</th>
            <th>Created By</th>
            <th>Created Date</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
         <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($val->SMSTemplateId); ?></td>
            <td><?php echo e($val->Header); ?></td>
            <td><textarea readonly><?php echo e($val->Template); ?></textarea></td>
            <td><?php echo e($val->FullName); ?></td>
            <td><?php echo e($val->CreatedDate); ?></td> 

            <td><button type="button" id="modelbutton" class="btn btn-success"  onclick="demo('<?php echo e($val->SMSTemplateId); ?>')">Edit</button></td>

            <td><a href="delete-sms-table/<?php echo e($val->SMSTemplateId); ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this recored ?')">Delete</a></td>
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
        <form name="sms_template" id="sms_template"  method="post" action="<?php echo e(url('update_view_templete')); ?>">
           <?php echo e(csrf_field()); ?>

           <input type="hidden" class="form-control" id="id" name="id" value="" >
          <div class="col-md-2 col-xs-12">
            <label>Heading:</label>
          </div>
         <div class="col-md-10 col-xs-12">
          <input type="text" class="form-control" id="hname" name="hname" value="">
          </div>

          <br><br><br>
          <div class="col-md-2 col-xs-12">
            <label>SMS:</label>
          </div>
          <div class="col-md-10 col-xs-12">
          <textarea type="text" class="form-control" id="txtmesg" name="txtmesg" value="" ></textarea>
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
</div>

  <script type="text/javascript">
   function demo(SMSTemplateId){
    $.ajax({
      url: 'sms-table-model/'+SMSTemplateId,
      type: "GET",
      success:function(user)
      {
        var data=  JSON.parse(user);
        $('#myModal').modal('show');                   
        $('#id').val('');  
        $('#hname').val('');
        $('#txtmesg').val('');
        $('#id').val(data[0].SMSTemplateId);
        $('#hname').val(data[0].Header);
        $('#txtmesg').val(data[0].Template);
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