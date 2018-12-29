
<?php $__env->startSection('content'); ?>
<style>
.error_class{
  color:red;
}
.success_class{
  color:green;
}
</style>

<div class="container-fluid white-bg">
  <div class="col-md-12">
    <div class="panel panel-primary">
      <div class="panel-heading"><b>SMS Template</b></div>
        <div class="panel-body">
          <?php if(Session::has('message')): ?>
          <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <p class="alert alert-success"><?php echo e(Session::get('message')); ?></p>
          </div>
          <?php endif; ?>
         <form class="form-horizontal" name="sms_template" id="sms_template"  method="post">
           <?php echo e(csrf_field()); ?>



         <div class="col-md-3 col-xs-12">
         </div>
          <div class="col-md-2 col-xs-12">
            <label>Heading:</label>
          </div>
         <div class="col-md-4 col-xs-6">
          <input type="text" class="selectpicker select-opt form-control" id="hname" name="hname" value=""  required="">
          </div>
          <br><br><br>

         <!--  <div class="col-md-12 col-xs-12">
          </div>


          <div class="col-md-12 col-xs-12">
          </div>
 -->
          <div class="col-md-3 col-xs-12">
         </div>
          <div class="col-md-2 col-xs-12">
            <label>SMS:</label>
          </div>
          <div class="col-md-4 col-xs-6">
          <textarea type="text" class="selectpicker select-opt form-control" id="txtmesg" name="txtmesg"  required=""></textarea>          
          </div>
          <br><br><br><br>  
             <div class="col-sm-12 error_class" style="text-align: center;" id="error_response">
                        
                      </div>
                      <div class="col-sm-12 success_class" style="text-align: center;" id="success_response">
                        
                      </div>

         
         <div class="col-md-12 col-xs-12">
          <center>
          <input type="submit" name="attn_submit"  id="attn_submit" value="submit" class="btn btn-primary">
          </center>
       </div>

      </form>
    </div>
  </div>
 </div>
</div>
<script type="text/javascript">
   window.setTimeout(function() {
       $(".alert").fadeTo(500, 0).slideUp(500, function(){
           $(this).remove(); 
       });
     }, 1000);
</script>
  <?php $__env->stopSection(); ?> 

<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>