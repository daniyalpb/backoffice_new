<link type="text/css" rel="stylesheet" href="<?php echo e(url('/stylesheets/bootstrap.min.css')); ?>">
<style>
.box-shadow {box-shadow:0px 4px 10px -2px #eaeaea; border:1px solid #f6f6f6; padding:15px;}
.blu-bg {background:#1c82ae;padding:10px; color:#fff;font-size:13px;margin-bottom:5px;box-shadow: 1px 8px 8px 1px #ccc;}
.text-clr {color:#cdd3d6;}
.blu-bg ul li {border-bottom:1px dashed #5b97b1;;padding:2px;}
.blu-bg a {color:#fff;}
.blu-bg a:hover {color:#fff;}
.tab-content {padding:15px;border:1px solid #f5f5f5;}
.months ul {padding:0px;padding-left: 20px; font-size:14px;}
.months ul li {color:#1c82ae;border-bottom: 1px dashed #e2e2e2;padding: 2px 5px;margin-bottom: 5px;transition:all 0.3s linear;-moz-transition:all 0.3s linear; -webkit-transition:all 0.3s linear;}
.months ul li:hover {background:#ddd;}
.months ul li a:hover {text-decoration:none;}
.nav-tabs a {font-size:13px;}
.nav-tabs.nav-justified>.active>a, .nav-tabs.nav-justified>.active>a:focus, .nav-tabs.nav-justified>.active>a:hover{background:#878787;color:#fff;}
}
.nav-tabs {background:#ccc;}
.nav-tabs.nav-justified>li>a {color:#666;}
h4 {color:#878787;}
.text-muted1{color:white;}
.error_class{color:red;}
.circle_accepted{display:inline-block;border-radius:60px;box-shadow:0px 0px 2px #888;padding:0.5em 0.6em;color:rgb(140, 211, 98);}
.circle_rejected{display:inline-block;border-radius:60px;box-shadow:0px 0px 2px #888;padding:0.5em 0.6em;color:rgb(213, 30, 34);}

@media  only screen and (max-width: 768px) {
 .container-fluid {padding-left:0px;padding-right:0px;}
}
</style>

<?php
function check_attn_time($training_duration , $training_start_time, $training_date, $is_accepted){

	if($is_accepted == '1'){
		date_default_timezone_set('Asia/Kolkata');
		$now = time();
		$current_time = date("Y-m-d H:i:s", $now);
		$start_time = date("$training_date $training_start_time");
		$total_duration = strtotime(date("Y-m-d $training_start_time")) + ($training_duration * 60);
		$end_time = date('Y-m-d H:i:s', $total_duration);
		if($start_time <= $current_time and $current_time <= $end_time){
			return 'Y';
		}else{
			return 'N';
		}
	}else{
		return 'N';
	}
}
?>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
<form name="form_reject_training" id="form_reject_training" enctype="multipart/form-data">
	<?php echo e(csrf_field()); ?>

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Training Details</h4>
          <p><input type="hidden" name="hidden_modal" id="hidden_modal" readonly="readonly"></p>
        </div>
        <div class="modal-body">

	    <div class="row">
	      <div class="col-lg-3">
	      	<label>Training Type : </label>
	      </div>
	      <div class="col-lg-3">
	      	<span id="span_training_type"></span>
	      </div>
	      <div class="col-lg-3">
	      	<label>Training Name : </label>
	      </div>
	      <div class="col-lg-3">
	      	<span id="span_training_name"></span>
	      </div>
	    </div>

	    <div class="row">
	      <div class="col-lg-3">
	      	<label>Duration : </label>
	      </div>
	      <div class="col-lg-3">
	      	<span id="span_duration"></span> Minutes
	      </div>
	      <div class="col-lg-3">
	      	<label>Training Date : </label>
	      </div>
	      <div class="col-lg-3">
	      	<span id="span_training_date"></span>
	      </div>
	    </div>

	    <div class="row">
	      <div class="col-lg-3">
	      	<label>Agenda : </label>
	      </div>
	      <div class="col-lg-3">
	      	<span id="span_agenda"></span>
	      </div>
	      <div class="col-lg-3">
	      	<label>Start Time : </label>
	      </div>
	      <div class="col-lg-3">
	      	<span id="span_start_time"></span>
	      </div>
	    </div>

	    <div class="row">
	      <div class="col-lg-12" id="attendance_response"></div>
	    </div>

	    <div class="row">
	      <div class="col-lg-12" id="invitation_response"></div>
	    </div>

	    <div class="row" style="display:none" id="reject_reason_div">
	      <div class="col-lg-2">
	      	<label>Reason : </label>
	      </div>
	      <div class="col-lg-10">
	      	<input type="text" name="reject_reason" id="reject_reason" class="form-control">
	      	<span id="err_reject_reason" class="error_class"></span>
	      </div>
	    </div>

        </div>
        <div class="modal-footer">
          <span id="btn_show_hide_attendance"></span>
          <span id="btn_show_hide_accept_training"></span>
          <span id="btn_show_hide_reject_training"></span>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- End Modal content-->
</form>
   </div>
</div>
<!-- END Modal -->

<div class="container-fluid white-bg">
	<h3 class="text-center">Training Schedule</h3>
<div class="col-md-8 col-md-offset-2">
			 
<div class="col-md-8 col-md-offset-2 box-shadow">
	<div class="blu-bg effect5">
		<h3>Today</h3>
	<ul>

	<?php if(count($today_array) > 0): ?>
		<?php $__currentLoopData = $today_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<ul>
			<?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $training_id => $training_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<li id="li_upcoming_<?php echo e($training_id); ?>" data-attn="<?php echo e(check_attn_time($training_value['training_duration'], $training_value['training_start_time'],  $training_value['training_date'], $training_value['training_is_accepted'])); ?>" data-val="<?php echo e($training_id); ?>" data-toggle="modal" data-target="#myModal" onclick="show_modal(this.id)">
				<b><p class="text-muted1"><?php echo e($training_value['training_name']); ?></p></b>
			</li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php else: ?>
    	No Training Scheduled Today
	<?php endif; ?>
	</ul>
	</div>
							
	<ul class="nav nav-tabs nav-justified">
	    <li class="active"><a data-toggle="tab" href="#home">UPCOMING</a></li>
	    
	</ul>

  <div class="tab-content">

    <div id="home" class="tab-pane fade in active">
    <?php if(count($upcoming_array) > 0): ?>
    <?php $__currentLoopData = $upcoming_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="months">
		<h4></h4>
		<ul>
		<?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $training_id => $training_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<li style="list-style-type:none" id="li_upcoming_<?php echo e($training_id); ?>" data-attn="<?php echo e(check_attn_time($training_value['training_duration'], $training_value['training_start_time'], $training_value['training_date'], $training_value['training_is_accepted'])); ?>" data-val="<?php echo e($training_id); ?>" data-toggle="modal" data-target="#myModal" onclick="show_modal(this.id)">
			<b><?php echo e($training_value['training_date']); ?></b>
			<p class="text-muted"><?php echo e($training_value['training_name']); ?></p>
			<?php if($training_value['training_is_accepted'] == "1"): ?>
		        <font color='black'>Accepted Status</font> = <span id="span_accepted_status_<?php echo e($training_id); ?>"><font color='green'><b>Accepted</b></font></span>
			<?php elseif($training_value['training_is_accepted'] == "0"): ?>
	            <font color='black'>Accepted Status</font> = <span id="span_accepted_status_<?php echo e($training_id); ?>"><font color='red'><b>Rejected</b></font></span>
			<?php elseif($training_value['training_is_accepted'] == "" or $training_value['training_is_accepted'] == null): ?>
				<font color='black'>Accepted Status</font> = <span id="span_accepted_status_<?php echo e($training_id); ?>"><font color='blue'><b>Pending</b></font></span>
			<?php else: ?>
				<font color='black'>Accepted Status</font> = <span id="span_accepted_status_<?php echo e($training_id); ?>"></span>
			<?php endif; ?>
		</li>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
	  </div>
	  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	  <?php else: ?>
    	No Upcoming Training Scheduled
	  <?php endif; ?>
    </div>

   

  </div>
			
</div>
</div>
</div>

<script src="<?php echo e(url('/javascripts/jquery_v3.3.1.min.js')); ?>"></script> 
<script src="<?php echo e(url('/javascripts/bootstrap/bootstrap.min.js')); ?>"></script> 
<script>
function show_modal(this_id){

	$("#hidden_modal").val($("#" + this_id).attr("data-val"));

	var training_id = $("#hidden_modal").val();
	$("#btn_show_hide_reject_training").html('');
	$("#btn_show_hide_accept_training").html('');
	$("#invitation_response").html('');

	var data_attn = $("#" + this_id).attr("data-attn");
	$("#btn_show_hide_attendance").html('');
	$("#attendance_response").html('');

	$.ajax({
		type : 'get',
		data : {'training_id':training_id , 'fbaid' : <?php echo e($fbaid); ?> },
		url : "<?php echo e(URL::to('/fill-modal-training-data')); ?>",
		success : function(response){
			var data = JSON.parse(response);

			$.each(data ,function(key , value){
				if(key == "training_type" && value == "1"){
					$("#span_" + key).text("Classroom Training");
				}else if(key == "training_type" && value == "2"){
					$("#span_" + key).text("Online Training");
				}else{
					$("#span_" + key).text(value);
				}


				if((key == "is_accepted") && (value == "" || value == null) && (data.training_date != "<?php echo e(date("Y-m-d")); ?>")){
					/*$("#btn_show_hide_reject_training").html('<button type="button" name="btn_reject_training_' + training_id + '" id="btn_reject_training_' + training_id + '" class="btn btn-danger" onclick="upd_training_rejected_status('+ training_id +')">Reject Invitation</button>');*/

					$("#btn_show_hide_accept_training").html('<button type="button" name="btn_accept_training_' + training_id + '" id="btn_accept_training_' + training_id + '" class="btn btn-success" onclick="upd_training_accepted_status('+ training_id +')">Accept Invitation</button>');
				}
				if(key == "is_accepted" && value == "0" && (data.training_date != "<?php echo e(date("Y-m-d")); ?>")){
					$("#btn_show_hide_reject_training").html('');
					$("#invitation_response").html('<font color="red">You Rejected this Training Invitation.</font>');
				}
				if(key == "is_accepted" && value == "1" && (data.training_date != "<?php echo e(date("Y-m-d")); ?>")){
					$("#btn_show_hide_accept_training").html('');
					$("#invitation_response").html('<font color="green">You Accepted this Training Invitation</font>');
				}

				if(data_attn == "Y" && data.is_attended !='1'){
					$("#btn_show_hide_attendance").html('<input type="button" name="btn_mark_attendance_' + training_id + '" id="btn_mark_attendance_' + training_id + '" class="btn btn-warning" onclick="upd_training_attendance(' + training_id + ')" value="Mark Attendance">');
				}
				if(data_attn == "N"){
					$("#btn_show_hide_attendance").html('');
				}

				if(data.is_attended =='1'){
					$("#attendance_response").html('<font color="green">Your Attendance Marked as Present</font>');
				}else if(data.is_attended =='0'){
					$("#attendance_response").html('<font color="red">Your Attendance Marked as Absent</font>');
				}else{
					$("#attendance_response").html('');
				}
			});
		}
	});
}

function upd_training_rejected_status(training_id){

if(!($("#reject_reason_div").is(":visible"))){
	$("#reject_reason_div").show();
	$("#err_reject_reason").text("Please Enter Reason For Rejecting Training Invitation");
	$("#reject_reason").focus();
}else{
	if($("#reject_reason").val() == ""){
		$("#err_reject_reason").text("Please Enter Reason For Rejecting Training Invitation");
		$("#reject_reason").focus();
	}
	else{
		var reject_reason = $("#reject_reason").val();
		var sure = confirm("Are You Sure, You want to Cancel Training?");
	    if(sure){

	    	$.ajax({
	    		type : 'get',
				data : {'training_id':training_id,'reject_reason':reject_reason , 'fbaid' : <?php echo e($fbaid); ?> },
				url : "<?php echo e(URL::to('/upd-training-rejected-status')); ?>",
				success : function(response){
					var data = JSON.parse(response);
					$("#invitation_response").html(data.alert_msg);
					$("#btn_show_hide_reject_training").html('');
					$("#span_accepted_status_" + training_id).html(data.resp_is_accepted);
				}
	    	});
	    }else{
	    	return false;
	    }
	}
}
}


function upd_training_accepted_status(training_id){
	$.ajax({
		type : 'get',
		data : {'training_id':training_id , 'fbaid' : <?php echo e($fbaid); ?> },
		url : "<?php echo e(URL::to('/upd-training-accepted-status')); ?>",
		success : function(response){
			var data = JSON.parse(response);
			$("#invitation_response").html(data.alert_msg);
			$("#btn_show_hide_accept_training").html('');
			$("#span_accepted_status_" + training_id).html(data.resp_is_accepted);
		}
	});
}


function upd_training_attendance(training_id){
	$.ajax({
		type : 'get',
		data : {'training_id':training_id, 'fbaid' : <?php echo e($fbaid); ?> },
		url : "<?php echo e(URL::to('/upd-training-attendance')); ?>",
		success : function(response){
			var data = JSON.parse(response);
			$("#attendance_response").html(data.alert_msg);
			$("#btn_show_hide_attendance").html('');
		}
	});
}
</script>