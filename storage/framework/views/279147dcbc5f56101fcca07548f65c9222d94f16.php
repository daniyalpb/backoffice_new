
<?php $__env->startSection('content'); ?>

<style>
.error_class{color:red;} 
.text-center{text-align:center;}
 </style>

<form name="remove_assigned_fba_form" id="remove_assigned_fba_form" enctype="multipart/form-data">  
<?php echo e(csrf_field()); ?> 
     
<div class="container-fluid">

    <div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading"><b>Remove Assigned FBA From Training</b></div>
        <div class="panel-body">

        <div class="row">
            <div class="col-md-2">
              <label>Select Training Name</label>
            </div>
            <div class="col-md-4">
              <select name="training_name" id="training_name" class="form-control">
                <option value="">Select Training Name</option>
                  <?php $__currentLoopData = $training_schedule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($schedule -> training_id); ?>"><?php echo e($schedule -> training_name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              <span class="error_class" id="err_training_name"></span>
            </div>
        </div>


        <div class="row">
            <div class="col-md-2">
              &nbsp;
            </div>
        </div>

        <div class="col-md-12" id="div_resp_table" style="display:none">

          <div class="row" id="resp_table">

          </div>

        <div class="row">
            <div class="col-md-4">
              <span class="error_class" id="error_panel"></span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-offset-5">
              <input type="hidden" name="cs_fbaid_checked" id="cs_fbaid_checked" readonly="readonly">
              <input type="hidden" name="cs_fbaid_unchecked" id="cs_fbaid_unchecked" readonly="readonly">
              <input type="button" name="btn_submit" id="btn_submit" value="Remove" class="btn btn-primary">
            </div>
        </div>

        </div>

        </div>
      </div>
  </div>
</div>
</form>

<script>
$("#btn_submit").on('click',function(evt){

  evt.preventDefault();
  $(".error_class").empty();
  var formdata = new FormData($("#remove_assigned_fba_form")[0]);

  $.ajax({
    type : 'post',
    url : '<?php echo e(URL::to('/update_training_fba_cancel_status')); ?>',
    data : formdata,
    contentType : false,
    processData : false,
    success : function(response){
      var data = JSON.parse(response);

      if(data.status == "success"){
        alert(data.alert_msg);
        window.location.reload();
      }else{
        $.each(data , function(key , value){
          $("#" + key).text(value);
        });
      }
    }
  });
});


$("#training_name").on('change',function(){

  var training_name = $("#training_name").val();

  if(training_name == ""){
    $("#div_resp_table").hide();
  }else{
    $("#div_resp_table").show();

    $.ajax({
      type : 'get',
      url : '<?php echo e(URL::to('/get_assigned_fba')); ?>',
      data : {'training_name':training_name},
      success : function(response){
        var data = JSON.parse(response);
        $("#resp_table").html(data.table_data);
        $("#cs_fbaid_checked").val(data.cs_text_checked);
        $("#cs_fbaid_unchecked").val(data.cs_text_unchecked);

        if(data.remove_btn_show == "Y"){
          $("#btn_submit").show();
        }
        if(data.remove_btn_show == "N"){
          $("#btn_submit").hide();
        }
      }
    });
  }
   
});


function get_fba_id(this_id){


// set fbaid_array_checked array
  if($("#cs_fbaid_checked").val() == ""){
    var fbaid_array_checked = [];
  }else{
    var fbaid_array_checked = $("#cs_fbaid_checked").val().split(',');
  }

// set fbaid_array_unchecked array
  if($("#cs_fbaid_unchecked").val() == ""){
    var fbaid_array_unchecked = [];
  }else{
    var fbaid_array_unchecked = $("#cs_fbaid_unchecked").val().split(',');
  }


  if($("#" + this_id).is(":checked")){            //if checkbox is checked
     //push element in fbaid_array_checked
     fbaid_array_checked.push($("#" + this_id).val());


     //remove element from fbaid_array_unchecked
     var index1 = fbaid_array_unchecked.indexOf($("#" + this_id).val());
     if(index1 > -1){
      fbaid_array_unchecked.splice(index1 , 1);
     }

}else{                                         //if checkbox is unchecked

  //push element in fbaid_array_unchecked
     fbaid_array_unchecked.push($("#" + this_id).val());


  //remove element from fbaid_array_checked
   var index = fbaid_array_checked.indexOf($("#" + this_id).val());
   if(index > -1){
    fbaid_array_checked.splice(index , 1);
   }
}

$("#cs_fbaid_checked").val(fbaid_array_checked.join(","));
$("#cs_fbaid_unchecked").val(fbaid_array_unchecked.join(","));

}
</script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>