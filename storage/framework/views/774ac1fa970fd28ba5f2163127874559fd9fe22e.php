
<?php $__env->startSection('content'); ?>
<?php if(Session::has('message')): ?>
<div class="alert alert-success alert-dismissible">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<p class="alert alert-success"><?php echo e(Session::get('message')); ?></p>
</div>
<?php endif; ?>
<?php if(Session::has('error')): ?>
<div class="alert alert-danger alert-dismissible">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<p class="alert alert-danger"><?php echo e(Session::get('error')); ?></p>
</div>
<?php endif; ?>
<div class="container-fluid white-bg">
  <div class="col-md-12"><h3>Import Sales Data</h3></div>
  <br>
  <br>
      <div class="col-md-12">
         <div class="overflow-scroll">
         	<div class="container">
            <div class="col-md-4">
              <label>Select file Type <b style="color: red; font-size: 15px;">*</b></label>
              <select class="form-control" id="ddlproducttype">
                <option value="0">--select--</option>
                <option value="1">Health-Data</option>
                <option value="2">Motor-Data</option>
              </select>
            </div>
         	<form  id="frmhealth" method="post" enctype="multipart/form-data" action="<?php echo e(URL::to('gethealthdata')); ?>" style="display: none;">       
              <?php echo e(csrf_field()); ?>

              <div class="col-md-4">
              	<label>Sales Data file <b style="color: red; font-size: 15px;">*</b></label>
              	<input type="file" name="import_file_health" id="import_file_health" class="form-control" required accept=".xlsx,.xls">                       	
              </div>
              <div class="col-md-4">
              	<input class="btn btn-primary" type="submit" name="submit" style="margin-top: 19px;">
              </div>
          </form>
          <form  id="frmmotor" method="post" enctype="multipart/form-data" action="<?php echo e(URL::to('getmotordata')); ?>" style="display: none;">       
              <?php echo e(csrf_field()); ?>

              <div class="col-md-4">
                <label>Sales Data file <b style="color: red; font-size: 15px;">*</b></label>              
                <input type="file" name="import_file_Motor" id="import_file_Motor" class="form-control" required accept=".xlsx,.xls">               
              </div>
              <div class="col-md-4">
                <input class="btn btn-primary" type="submit" name="submit" style="margin-top: 19px;">
              </div>
          </form>
      </div>
  </div>
</div>
</div>
<script type="text/javascript">
  $("#ddlproducttype").change(function() {
  if($("#ddlproducttype").val()==1)
  {
    $("#frmmotor").hide();
    $("#frmhealth").show();
  }else if($("#ddlproducttype").val()==2){
    $("#frmhealth").hide();
    $("#frmmotor").show();
  }else{
    $("#frmhealth").hide();
    $("#frmmotor").hide();
  }
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>