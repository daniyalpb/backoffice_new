
<?php $__env->startSection('content'); ?>
<style type="text/css">
  .textarea{
    width: 250px !important;
  }
</style>
 <div class="container-fluid white-bg">
  <div class="col-md-12"> 
    <div>
      <div><b>Notification Data</b></div><br><br>
        <div>
          <div class="overflow-scroll">
            <div class="table-responsive">
          <?php if(Session::has('message')): ?>
          <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <p class="alert alert-success"><?php echo e(Session::get('message')); ?></p>
          </div>
          <?php endif; ?>
      <table class="table table-bordered table-striped" id="noifydatatbl">
        <thead>
          <tr>
            <th>Notification Id</th>
            <th>Title</th>
            <th>Body</th>            
            <th>Image</th>
            <th>Type</th>
            <th>Web Url</th>
            <th>Web Title</th>
            <th>Created Date</th>
            <th>Created By</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $notifydata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($val->MessageId); ?></td>
            <td><?php echo e($val->NotificationTitle); ?></td>
            <td><textarea readonly class="textarea"><?php echo e($val->Message); ?></textarea></td>
            <?php if($val->ImagePath!='0'): ?>
             <td><a href="<?php echo e($val->ImagePath); ?>" class=" btn btn-primary" target="_blank">Show</a></td>
             <?php else: ?>           
            <td>Nothing To Show</td>
            <?php endif; ?>
            <td><?php echo e($val->MessageType); ?></td>
            <td><?php echo e($val->WebUrl); ?></td>
            <td><?php echo e($val->WebTitle); ?></td>
            <td><?php echo e($val->CreatedDate); ?></td>
            <td><?php echo e($val->FullName); ?></td>
            <td><a class="btn btn-success" onclick="Editnotification(<?php echo e($val->MessageId); ?>);">Edit</a></td>               
            <td><a class="btn btn-danger">Delete</a></td>
            </td>
          </tr>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </tbody>
</table>
</div>
</div>
</div>
</div>
<!-- Modal -->
  <div class="modal fade" id="editmodal" role="dialog">
    <div class="modal-dialog modal-md">    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Notification Template</h4>
        </div>
        <div class="modal-body">
        <form name="notify_template" id="notify_template"  method="post" action="<?php echo e(url('update-notification')); ?>" enctype="multipart/form-data">
           <?php echo e(csrf_field()); ?>

           <input type="hidden" class="form-control" id="notifyid" name="notifyid" requried>
          <div class="col-md-2 col-xs-12">
            <label>Noification Title:</label>
          </div>
         <div class="col-md-10 col-xs-12">
          <input type="text" class="form-control" id="txtnotifytitle" name="txtnotifytitle" requried>
          </div>       
          <br><br><br>
          <div class="col-md-2 col-xs-12">
            <label>Notification Body:</label>
          </div>
          <div class="col-md-10 col-xs-12">
          <textarea type="text" class="form-control" id="txtnotifybody" name="txtnotifybody" requried></textarea>
          </div>
          <br><br><br>
          <div class="col-md-2 col-xs-12">
            <label>Notification Image:</label>
          </div>
          <div class="col-md-10 col-xs-12">
          <input type="file" name="txtfile" id="txtfile" accept=".jpeg,.img,.png" class="form-control">
          <a href="" id="filepath" target="_blank"><span id="spnfilepath"></span></a>
          </div>
          <br><br><br>
          <div class="col-md-2 col-xs-12">
            <label>Notification Type:</label>
          </div>
          <div class="col-md-10 col-xs-12">
         <select id="ddlnotifytype" name="ddlnotifytype" class="form-control" onchange="chknotifytype()" requried> 
           <option value="">--select--</option>
           <option value="WB">WB</option>
           <option value="HL">HL</option>
         </select>
          </div>
          <br><br><br>
          <div id="divwb" style="display: none;">
          <div class="col-md-2 col-xs-12">
            <label>Web Url:</label>
          </div>
         <div class="col-md-10 col-xs-12">         
           <input type="text" class="form-control" id="txtweburl" name="txtweburl">
          </div> 
          <br><br><br>
          <div class="col-md-2 col-xs-12">
            <label>Web Title:</label>             
          </div>
         <div class="col-md-10 col-xs-12">
         <input type="text" class="form-control" id="txtwebTitle" name="txtwebTitle">
          </div>
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
  $( document ).ready(function(){       
        $('#noifydatatbl').DataTable({
         "ordering": false
    });
    });
  function Editnotification(id)
  {
    //alert(id);
   $("#editmodal").modal('show');
    $.ajax({
        url: 'edit-notification/'+id,
        type: "GET",                  
        success:function(data){
            var jsondata = JSON.parse(data);
            if (jsondata[0].MessageId!=0){
            $("#notifyid").val(jsondata[0].MessageId);
            $("#txtnotifytitle").val(jsondata[0].NotificationTitle);
            $("#txtnotifybody").val(jsondata[0].Message);
            $("#txtweburl").val(jsondata[0].WebUrl);
            $("#txtwebTitle").val(jsondata[0].WebTitle);
            if (jsondata[0].ImagePath!=0){
            $("#spnfilepath").text(jsondata[0].ImagePath);
            $("#filepath").attr("href",jsondata[0].ImagePath);
            }
            $('#ddlnotifytype').val(jsondata[0].MessageType);
            if (jsondata[0].MessageType=='WB'){
              $("#divwb").show();
            }else{
              $("#divwb").hide();
            }            
          }
        }

        });
  }
  function chknotifytype(){
    if ($('#ddlnotifytype').val()=='WB'){
      $("#divwb").show();
      $("#txtweburl").attr("requried", true);
      $("#txtwebTitle").attr("requried", true);     
    }else{
      $("#divwb").hide();
    }   
  }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>