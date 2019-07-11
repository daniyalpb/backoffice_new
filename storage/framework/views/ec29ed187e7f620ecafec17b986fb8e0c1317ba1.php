
<!DOCTYPE html>
<html>
<head>

	<title>Marketing Campaign</title>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div style ="margin:0 auto; background-color:#482fb1;padding-bottom:10px;">
		<div><img style="width:100%; height:100%;" src="<?php echo e(url('images/head_.jpg')); ?>"/></div>  

		<?php $__currentLoopData = $campignimagedata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<a href="<?php echo e($val->Description); ?>" target="_blank">
		<div style="width:80%;background-color:#ffffff;padding:10px; margin:10px auto;border:2px solid #cccaca;border-radius:5px;box-shadow:0 0 8px 0px #131212;">
			<h4><?php echo e($val->Title); ?></h4>
			<p><?php echo e($val->shortdescription); ?></p>
		</div></a>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		<?php $__currentLoopData = $campignurldata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
		<a href="<?php echo e($val->Description); ?>" target="_blank">
		<div style="width:80%;background-color:#ffffff;padding:10px; margin:10px auto;border:2px solid #cccaca;border-radius:5px;box-shadow:0 0 8px 0px #131212;">
			<h4><?php echo e($val->Title); ?></h4>
			<?php echo e($val->shortdescription); ?> 
			<!-- <a href="<?php echo e($val->Description); ?>" >Short Description</a>  -->
		</div>
		</a>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		<?php $__currentLoopData = $campignpdfdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
		<a href="<?php echo e($val->Description); ?>" target="_blank">
		<div style="width:80%;background-color:#ffffff;padding:10px; margin:10px auto;border:2px solid #cccaca;border-radius:5px;box-shadow:0 0 8px 0px #131212;">
			<h4><?php echo e($val->Title); ?></h4>
			<?php echo e($val->shortdescription); ?>

			<!-- <a href="<?php echo e($val->Description); ?>" >Short Description</a> -->
		</div>
		</a>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		<?php $__currentLoopData = $campignhtmldata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<a href="#" data-toggle="modal" data-target="#Description_model">
		<div style="width:80%;background-color:#ffffff;padding:10px; margin:10px auto;border:2px solid #cccaca;border-radius:5px;box-shadow:0 0 8px 0px #131212;">
			<h4><?php echo e($val->Title); ?></h4>
			<p><?php echo e($val->shortdescription); ?></p>

			<!-- <a href="#" data-toggle="modal" data-target="#Description_model" >Short Description</a> -->
		</div>
		</a> 
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
</body>
</html>

<!-- Description VIEW MODEL STATRT -->
<div class="modal" id="Description_model">
	<div class="modal-dialog modal-lg modal_extra_width">
		<div class="modal-content">      
			<!-- Modal Header -->
			<div  class="modal-header" >
				<h4 class="modal-title">Description</h4>
				<!-- Modal body -->
				<div class="modal-body">
					<body>
						<div class="col-md-12">
							<div class="overflow-scroll">
								<div class="table-responsive">
									<!-- <div id="overflowTest">  -->
									<div style="overflow-y: auto; height: 245px;">
										<table id="tblrrm"  class="table table-bordered table-striped tbl">
											<span style="font-size: 15px"><?php echo $val->Description; ?></span>
										
								</table>
							</div>
						</div>
					</div>
				</div> 
			</div>

		</body>
	</div>      
	<!-- Modal footer -->
	<div class="modal-footer">
		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> 
	</div>
</div>
</div>
</div>
  <!-- Description VIEW MODEL END -->
