<?php $__env->startSection('content'); ?>

<div class="container-fluid white-bg">
	<div class="col-md-12"><h3 class="mrg-btm"> Add New Marketing Campaign Master</h3></div>
	<br>
	<br>
	<form id="addmarketing" name="addmarketing" method="post" action="<?php echo e(url('Add-Marketing-Campaign-Master')); ?>">
    <?php echo e(csrf_field()); ?>

    <?php if(Session::has('message1')): ?>
    	<div class="alert alert-info alert"><?php echo e(Session::get('message1')); ?></div>
	<?php endif; ?>
		<div class="row">
			 <div class="form-group col-md-3">
			 </div>
			 <div class="form-group col-md-6">
			 	<div class="col-md-2">
			 		<label>Title :</label>
			 	</div>
			 	<div class="col-md-10">
			 		<input type="text" class="text-primary form-control" name="mtitle" id="mtitle" required="">
			 	</div>
			 </div>
			 <div class="form-group col-md-3">
			 </div>
		</div>

		<div class="row">
			 <div class="form-group col-md-3">
			 </div>
			 <div class="form-group col-md-6">
			 	<div class="col-md-2">
			 		<label>Type :</label>
			 	</div>
			 	<div class="col-md-10">
			 		<select type="text" class="text-primary form-control" name="mtype" id="mtype" required="">
			 			<option value="" selected disabled="true">--Select--</option>
			 			<option value="Html">Html</option>
			 			<option value="Url">Url</option>
			 			<option value="Image">Image</option>
			 			<option value="Pdf">Pdf</option>
			 		</select>
			 	</div>
			 </div>
			 <div class="form-group col-md-3">
			 </div>
		</div>

		<div class="row">
			 <div class="form-group col-md-3">
			 </div>
			 <div class="form-group col-md-6">
			 	<div class="col-md-2">
			 		<label>Short Description:</label>
			 	</div>
			 	<div class="col-md-10">
			 		<input type="text" class="text-primary form-control" name="sdescription" id="sdescription" required="">
			 	</div>
			 </div>
			 <div class="form-group col-md-3">
			 </div>
		</div>

		<div class="row">
			 <div class="form-group col-md-3">
			 </div>
			 <div class="form-group col-md-6">
			 	<div class="col-md-2">
			 		<label>Description:</label>
			 	</div>
			 	<div class="col-md-10">
			 		<textarea type="text" class="text-primary form-control" name="ldescription" id="ldescription" required=""></textarea>
			 	</div>
			 </div>
			 <div class="form-group col-md-3">
			 </div>
		</div>

		<div class="row">
			 <div class="form-group col-md-3">
			 </div>
			 <div class="form-group col-md-6">
			 	<div class="col-md-2">
			 		<label>Gallery :</label>
			 	</div>
			 	<div class="col-md-10">
			 		<a href="<?php echo e(url('View-Image-Marketing-Campaign')); ?>" target="_blank">Doc Gallery</a>
			 	</div>
			 </div>
			 <div class="form-group col-md-3">
			 </div>
		</div>

		<div class="row">
			 <div class="form-group col-md-3">
			 </div>
			 <div class="form-group col-md-6">
			 	<div class="col-md-2">
			 		<label>End Date :</label>
			 	</div>
			 	<div class="col-md-10">
			 		<input type="date" class="text-primary form-control" name="enddate" id="enddate">
			 	</div>
			 </div>
			 <div class="form-group col-md-3">
			 </div>
		</div>

		<div class="row">
			 <div class="form-group col-md-8">
			 </div>
			 <div class="form-group col-md-1">
			 		<input type="submit" name="statussub" id="statussub" value="Submit" class="btn btn-success">
			 </div>
			 <div class="form-group col-md-3">
			 </div>
		</div>
	</form>

	<script type="text/javascript">
		$("document").ready(function(){
		    setTimeout(function(){
		       $("div.alert").remove();
		    }, 2000 ); // 5 secs

		});
	</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>