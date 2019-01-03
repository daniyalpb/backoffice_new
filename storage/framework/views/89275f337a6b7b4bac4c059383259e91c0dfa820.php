<?php $__env->startSection('content'); ?>

<style>
.error_class{
  color:red;
}
.success_class{
  color:green;
}
</style>

<form name="mis_system_update" id="mis_system_update" enctype="multipart/form-data" method="POST">  
<?php echo e(csrf_field()); ?>  
     
<div class="container-fluid">

    <div class="col-lg-12">
		<div class="panel panel-primary">
	      <div class="panel-heading">Select Excel File to Update data</div>
	      <div class="panel-body">
	      	<div class="row">
		      	<div class="col-md-1">
		      		<label>Select File</label>
		      	</div>
		      	<div class="col-md-4">
		      		<input type="file" name="file_excel_data" id="file_excel_data" accept=".xls,.xlsx">
		      		<span class="error_class" id="err_file_excel_data"></span>
		      	</div>
		      	<div class="col-md-3">
		      		<input type="button" name="btn_submit" id="btn_submit" value="Submit" class="btn btn-primary">
		      	</div>
		      	<div class="col-md-3">
		      		<a href="<?php echo e(URL::to("upload/MIs_excle_file.xls")); ?>" class="btn btn-primary">Download File Format</a>		      		
		      	</div>
		    </div>

		    <div class="row">
		    	<div class="col-md-12">
		    		<span id="other_errors" class="error_class"></span>
		    	</div>
		    </div>
<p style="color: red;">Note: You can uploade file with less than #3000 records in given format only i.e(.xls,xlsx)and Entry Date in format of (YYYY-MM-DD)</p>
		    <div class="row">
		    	<div class="col-md-12">
		    		<span id="success_response" class="success_class"></span>
		    	</div>
		    </div>

	      </div>
	    </div>
	</div>

</div>
</form>

<script type="text/javascript">
$("#btn_submit").on('click',function(evt){
evt.preventDefault();
$(".error_class").empty();
$(".success_class").empty();
var formdata = new FormData($("#mis_system_update")[0]);
$.ajax({
      type : 'POST',
      url : "<?php echo e(URL::to("/mis-system-update")); ?>",
      data : formdata,
      processData : false,
      contentType : false,
      success : function(response){
        var response = JSON.parse(response);

        if(response.messege == "success"){
          console.log(response.arr_success);
          console.log(JSON.parse(response.arr_success));

          var success_response = $("#success_response").text();
          $.each(JSON.parse(response.arr_success) , function(key , value){
          	success_response += value + "<br>";
          	$("#success_response").html(success_response);
          	success_response += "";
          });
          $("#file_excel_data").val('');
        alert("File Imported Successfully");      
        }else{

        	var other_errors = $("#other_errors").text();
			$.each(response , function(key , value){
				if($("#err_" + key).length == 0 && value != null) {
				  other_errors += value + "<br>";
				  $("#other_errors").html(other_errors);
				  other_errors += "";
				}else{
					$("#err_" + key).text(value);
				}  
	        });

        }

      }  
      });
});
</script>
<?php $__env->stopSection(); ?>	
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>