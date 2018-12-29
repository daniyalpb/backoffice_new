
<?php $__env->startSection('content'); ?>

<style>
.error_class{color:red;} 
.compulsory_asterick{color:red;} 
.no-padding {padding:0px 2px;}
</style>

<form name="schedule_training_form" id="schedule_training_form" enctype="multipart/form-data">  
<?php echo e(csrf_field()); ?> 

<?php 
if($mode == "update" or $mode == "repeat"){
  $fetched_date = date('H:i:s A', strtotime($result_data[0] -> start_time));
  $exploded_time = explode(' ',$fetched_date);
  $p_exp_time = explode(':',$exploded_time[0]);

  if($exploded_time[1] == "PM" and $p_exp_time[0] == "12"){
    $hour_value = $p_exp_time[0];
  }
  if($exploded_time[1] == "PM" and $p_exp_time[0] != "12"){
    $hour_value = $p_exp_time[0] - 12;
  }
  if($exploded_time[1] == "AM" and $p_exp_time[0] == "00"){
    $hour_value = 12;
  }
  if($exploded_time[1] == "AM" and $p_exp_time[0] != "00"){
    $hour_value =  $p_exp_time[0];
  }

  $min_value = $p_exp_time[1];
  $am_pm_value = $exploded_time[1];

  $exploded_training_date = explode('-',$result_data[0]->training_date);
  $modified_training_date = $exploded_training_date[1].'/'.$exploded_training_date[2].'/'.$exploded_training_date[0];
?>
<input type='hidden' name='hidden_training_id' id='hidden_training_id' value='<?php echo e($training_id); ?>' readonly='readonly'>
<?php
}
?>
     
<div class="container-fluid">

    <div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading"><b><?php echo e(ucfirst($mode)); ?> Training Schedule</b></div>
        <div class="panel-body">

        <div class="row">

            <div class="col-md-2">
              <label>Training Type <sup class="compulsory_asterick">*</sup></label>
            </div>
            <div class="col-md-4">
              <?php if($mode == "create"): ?>
              <select name="training_type" id="training_type" class="form-control">
                <option value="">Select Training type</option>
                <option value="1">Classroom Training</option>
                <option value="2">Online Training</option>
              </select>
              <?php endif; ?>

              <?php if($mode == "update" or $mode == "repeat"): ?>
              <select name="training_type" id="training_type" class="form-control">
                <option value="">Select Training type</option>
                <option <?php if($result_data[0]->training_type == "1"){echo "selected";}?> value="1">Classroom Training</option>
                <option <?php if($result_data[0]->training_type == "2"){echo "selected";}?> value="2">Online Training</option>
              </select>
              <?php endif; ?>

              <span class="error_class" id="err_training_type"></span>
            </div>

            <div class="col-md-2">
              <label>Training Name <sup class="compulsory_asterick">*</sup></label>
            </div>
            <div class="col-md-4">

              <?php if($mode == "create"): ?>
              <input type="text" name="training_name" id="training_name" class="form-control" placeholder="Enter Training Name">
              <?php endif; ?>

              <?php if($mode == "update" or $mode == "repeat"): ?>
              <input type="text" name="training_name" id="training_name" class="form-control" placeholder="Enter Training Name" value='<?php echo $result_data[0]->training_name;?>'>
              <?php endif; ?>

              <span class="error_class" id="err_training_name"></span>
            </div>

        </div>


        <div class="row">
            <div class="col-md-2">
              &nbsp;
            </div>
        </div>


        <div class="row">

            <div class="col-md-2">
              <label>Trainer Name <sup class="compulsory_asterick">*</sup></label>
            </div>
            <div class="col-md-4">

              <?php if($mode == "create"): ?>
              <input type="text" name="trainer_name" id="trainer_name" placeholder="Enter Trainer Name" class="form-control">
              <?php endif; ?>

              <?php if($mode == "update" or $mode == "repeat"): ?>
              <input type="text" name="trainer_name" id="trainer_name" placeholder="Enter Trainer Name" class="form-control" value="<?php echo $result_data[0]->trainer_id;?>">
              <?php endif; ?>

              <span class="error_class" id="err_trainer_name"></span>
            </div>

            <div class="col-md-2">
              <label>Training Date <sup class="compulsory_asterick">*</sup></label>
            </div>
            <div class="col-md-4">

              <?php if($mode == "create"): ?>
              <input type="text" name="training_date" id="training_date" placeholder="Enter Training Date" readonly="readonly" class="form-control">
              <?php endif; ?>

              <?php if($mode == "update" or $mode == "repeat"): ?>
              <input type="text" name="training_date" id="training_date" placeholder="Enter Training Date" readonly="readonly" class="form-control" value="<?php echo $modified_training_date;?>">
              <?php endif; ?>

              <span class="error_class" id="err_training_date"></span>
            </div>

        </div>


        <div class="row">
            <div class="col-md-2">
              &nbsp;
            </div>
        </div>


        <div class="row">

            <div class="col-md-2">
              <label>Starting Time <sup class="compulsory_asterick">*</sup></label>
            </div>
            <div class="col-md-4">
             <div class="col-md-4 no-padding">

              <?php if($mode == "create"): ?>
              <select name="start_time_hour" id="start_time_hour" class="form-control">
                <option value="">Hour</option>
                  <?php for($i = 1; $i <= 12; $i++): ?>
                    <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                  <?php endfor; ?>
              </select>
              <span class="error_class" id="err_start_time_hour"></span>
              </div>
              <?php endif; ?>

              <?php if($mode == "update" or $mode == "repeat"): ?>
              <select name="start_time_hour" id="start_time_hour" class="form-control">
                <option value="">Hour</option>
                  <?php for($i = 1; $i <= 12; $i++): ?>
                    <option <?php if($hour_value == $i){echo 'selected';}?> value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                  <?php endfor; ?>
              </select>
              <span class="error_class" id="err_start_time_hour"></span>
              </div>
              <?php endif; ?>

              <div class="col-md-4 no-padding">

              <?php if($mode == "create"): ?>
              <select name="start_time_minutes" id="start_time_minutes" class="form-control" >
                <option value="">Minutes</option>
                  <?php for($i = 0; $i <= 59; $i+=15): ?>
                    <option value="<?php echo e(str_pad($i,2,'0',STR_PAD_LEFT)); ?>"><?php echo e(str_pad($i,2,'0',STR_PAD_LEFT)); ?></option>
                  <?php endfor; ?>
              </select>
              <?php endif; ?>

              <?php if($mode == "update" or $mode == "repeat"): ?>
              <select name="start_time_minutes" id="start_time_minutes" class="form-control" >
                <option value="">Minutes</option>
                  <?php for($i = 0; $i <= 59; $i+=15): ?>
                    <option <?php if($min_value == str_pad($i,2,'0',STR_PAD_LEFT)){echo 'selected';}?> value="<?php echo e(str_pad($i,2,'0',STR_PAD_LEFT)); ?>"><?php echo e(str_pad($i,2,'0',STR_PAD_LEFT)); ?></option>
                  <?php endfor; ?>
              </select>
              <?php endif; ?>

              <span class="error_class" id="err_start_time_minutes"></span>
              </div>
              
              <div class="col-md-4 no-padding">

              <?php if($mode == "create"): ?>
              <select name="start_time_am_pm" id="start_time_am_pm" class="form-control">
                <option value="">AM/PM</option>
                 <option value="AM">AM</option>
                 <option value="PM">PM</option>
              </select>
              <?php endif; ?>


              <?php if($mode == "update" or $mode == "repeat"): ?>
              <select name="start_time_am_pm" id="start_time_am_pm" class="form-control">
                <option value="">AM/PM</option>
                 <option <?php if($am_pm_value == "AM"){echo 'selected';}?> value="AM">AM</option>
                 <option <?php if($am_pm_value == "PM"){echo 'selected';}?> value="PM">PM</option>
              </select>
              <?php endif; ?>

              <span class="error_class" id="err_start_time_am_pm"></span>
              </div>

            </div>

            <div class="col-md-2">
              <label>Duration (In Minutes) <sup class="compulsory_asterick">*</sup></label>
            </div>
            <div class="col-md-4">

              <?php if($mode == "create"): ?>
              <input type="text" name="duration" id="duration" class="form-control" placeholder="Enter Duration in minutes">
              <?php endif; ?>

              <?php if($mode == "update" or $mode == "repeat"): ?>
              <input type="text" name="duration" id="duration" class="form-control" placeholder="Enter Duration in minutes" value="<?php echo $result_data[0]->duration;?>">
              <?php endif; ?>

              <span class="error_class" id="err_duration"></span>
            </div>

        </div>


        <div class="row">
            <div class="col-md-2">
              &nbsp;
            </div>
        </div>


        <div class="row">

            <div class="col-md-2">
              <label>Agenda</label>
            </div>
            <div class="col-md-4">

              <?php if($mode == "create"): ?>
              <textarea name="agenda" id="agenda" class="form-control" placeholder="Enter Agenda" rows="4" cols="50"></textarea>
              <?php endif; ?>

              <?php if($mode == "update" or $mode == "repeat"): ?>
              <textarea name="agenda" id="agenda" class="form-control" placeholder="Enter Agenda" rows="4" cols="50"><?php echo $result_data[0]->agenda;?></textarea>
              <?php endif; ?>

              <span class="error_class" id="err_agenda"></span>
            </div>

            <div class="col-md-2">
              <label><span id="location_webx">Location</span> <sup class="compulsory_asterick">*</sup></label>
            </div>
            <div class="col-md-4">

              <?php if($mode == "create"): ?>
              <textarea name="location" id="location" class="form-control" rows="4" cols="50" placeholder="Enter Location"></textarea>
              <?php endif; ?>

              <?php if($mode == "update" or $mode == "repeat"): ?>
              <textarea name="location" id="location" class="form-control" rows="4" cols="50" placeholder="Enter Location"><?php echo $result_data[0]->location;?></textarea>
              <?php endif; ?>

              <span class="error_class" id="err_location"></span>
            </div>

        </div>

        <div class="row">
            <div class="col-md-2">
              &nbsp;
            </div>
        </div>

        <div class="row">

             <div class="col-md-2">
              <label>Training Description <sup class="compulsory_asterick">*</sup></label>
            </div>
            <div class="col-md-4">

              <?php if($mode == "create"): ?>
              <textarea name="description" id="description" class="form-control" rows="4" cols="50" placeholder="Enter Training Description"></textarea>
              <?php endif; ?>

              <?php if($mode == "update" or $mode == "repeat"): ?>
              <textarea name="description" id="description" class="form-control" rows="4" cols="50" placeholder="Enter Training Description"><?php echo $result_data[0]->description;?></textarea>
              <?php endif; ?>

              <span class="error_class" id="err_description"></span>
            </div>

            <div class="col-md-2">
              <label>SMS/Email Content </label>
            </div>
            <div class="col-md-4">

              <?php if($mode == "create"): ?>
              <textarea name="sms_email" id="sms_email" class="form-control" placeholder="Enter SMS/Email Content" rows="4" cols="50"></textarea>
              <?php endif; ?>

              <?php if($mode == "update" or $mode == "repeat"): ?>
              <textarea name="sms_email" id="sms_email" class="form-control" placeholder="Enter SMS/Email Content" rows="4" cols="50"><?php echo $result_data[0]->sms_email_content;?></textarea>
              <?php endif; ?>

              <span class="error_class" id="err_sms_email"></span>
            </div>

        </div>


        <div class="row">
            <div class="col-md-2">
              &nbsp;
            </div>
        </div>


        <div class="row">
            <div class="col-md-4 col-xs-12 col-md-offset-5">
              <input type="button" name="btn_submit" id="btn_submit" value="<?php echo e(ucfirst($mode)); ?>" class="btn btn-primary"> 
            </div>
        </div>

        </div>
      </div>
  </div>

</div>
</form>

<input type='hidden' name='hidden_form_changed_status' id='hidden_form_changed_status' readonly='readonly'>

<script type="text/javascript">
var initialState = $("#schedule_training_form").serialize();

$("#btn_submit").on('click',function(evt){

  evt.preventDefault();
  $(".error_class").empty();
  var formdata = new FormData($("#schedule_training_form")[0]);

  if (initialState === $("#schedule_training_form").serialize()) {
    $("#hidden_form_changed_status").val('unchanged');
  } else {
    $("#hidden_form_changed_status").val('changed');
  }

  formdata.append('hidden_form_changed_status', $("#hidden_form_changed_status").val());

  $.ajax({
    type : 'post',
    url : '<?php echo e(URL::to("validate-schedule-training/$mode")); ?>',
    data : formdata,
    processData : false,
    contentType : false,
    success : function(response){
      var data = JSON.parse(response);

      if(data.status == "success"){
        alert(data.messege);
        window.location.href = data.redirectURL;
      }
      else{
        $.each(data , function(key ,value){
          $("#err_" + key).text(value);
        });
      }
    }
  });
}); 

$("#duration").keydown(function (e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
         // Allow: Ctrl+A, Command+A
        (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
         // Allow: home, end, left, right, down, up
        (e.keyCode >= 35 && e.keyCode <= 40)) {
             // let it happen, don't do anything
             return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
});

$("#training_type").on('change',function(){
 var training_type = $("#training_type").val();

 if(training_type == "1"){
  $("#location_webx").text("Location");
  $("#location").attr("placeholder", "Enter Location");
 }else if(training_type == "2"){
  $("#location_webx").text("WebX Details");
  $("#location").attr("placeholder", "Enter WebX Details");
 }else{
  $("#location_webx").text("Location");
  $("#location").attr("placeholder", "Enter Location");
 }

});
</script>

<script type="text/javascript" src="<?php echo e(url('/javascripts/bootstrap-datepicker.js')); ?>"></script>
<script type="text/javascript">
    var dateToday = new Date();
    dateToday.setDate(dateToday.getDate()+1); 
    var year = dateToday.getFullYear() ;
    var minYear = parseInt(year) - parseInt(100);
    var maxYear = parseInt(year) + parseInt(100);

    $("#training_date").datepicker({ 
      dateFormat: "yy-mm-dd",
      changeMonth: true,
      changeYear: true,
      yearRange: minYear + ':' + maxYear,
      autoclose: true,
      startDate: dateToday
    });
</script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>