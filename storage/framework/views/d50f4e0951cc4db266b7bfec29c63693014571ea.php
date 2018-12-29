
<?php $__env->startSection('content'); ?>

<link href="<?php echo e(url('stylesheets/bootstrap/dataTables.bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
<style>
.text-center{text-align:center;}
.text-wrap{white-space:normal;} 
.width-set{width:500px;} 
.txtarea {border: none; background: transparent; width: 200px; height: 70px; } 
</style>

<div class="container-fluid">

    <div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading"><b>Training Schedules</b></div>
        <div class="panel-body">

        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                <table class='table table-bordered' id='tbl_training_schedules'>
                    <thead>
                      <th class='text-center'>Update</th>
                      <th class='text-center'>Training Type</th>
                      <th class='text-center'>Training Name</th>
                      <th class='text-center'>Trainer Name</th>
                      <th class='text-center'>Duration(mins)</th>
                      <th class='text-center'>Training Date(dd/mm/yyyy)</th>
                      <th class='text-center text-wrap width-set'>Agenda</th>
                      <th class='text-center text-wrap width-set'>Location / Web X Details</th>
                      <th class='text-center text-wrap width-set'>SMS / Email</th>
                      <th class='text-center'>Start Time</th>
                      <th class='text-center text-wrap width-set'>Description</th>
                      <th class='text-center text-wrap width-set'>Created By</th>
                      <th class='text-center text-wrap width-set'>Created Date</th>
                      <th class='text-center text-wrap width-set'>Updated By</th>
                      <th class='text-center text-wrap width-set'>Updated Date</th>
                      
                    </thead>

                    <tbody>
                        <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <?php 
                                $training_id = $data -> training_id;
                                $exploded_date = explode('-',$data -> training_date);
                                $formatted_date = $exploded_date[2].'/'.$exploded_date[1].'/'.$exploded_date[0];
                            ?>

                            <?php if($data -> update_btn_visible == "1"): ?>
                            <td><a href='<?php echo e(url("/schedule-training/update/$training_id")); ?>' target='_blank'>Update</a></td>
                            <?php endif; ?>
                            
                            <?php if($data -> update_btn_visible == "0"): ?>
                            <td></td>
                            <?php endif; ?>
                            
                            <?php if($data -> training_type == "1"): ?>
                            <td>Classroom Training</td>
                            <?php endif; ?>

                            <?php if($data -> training_type == "2"): ?>
                            <td>Online Training</td>
                            <?php endif; ?>

                            <td class='text-wrap width-set'><?php echo e($data -> training_name); ?></td>
                            <td class='text-wrap width-set'><?php echo e($data -> trainer_id); ?></td>
                            <td><?php echo e($data -> duration); ?></td>
                            <td><?php echo e($formatted_date); ?></td>
                            <td class='text-wrap width-set'><textarea class="txtarea" name="agenda_textarea_<?php echo e($training_id); ?>" id="agenda_textarea_<?php echo e($training_id); ?>" readonly="readonly"><?php echo e($data -> agenda); ?></textarea></td>

                            <td class='text-wrap width-set'><textarea class="txtarea" name="location_textarea_<?php echo e($training_id); ?>" id="location_textarea_<?php echo e($training_id); ?>" readonly="readonly"><?php echo e($data -> location); ?></textarea></td>

                            <td class='text-wrap width-set'><textarea class="txtarea" name="sms_textarea_<?php echo e($training_id); ?>" id="sms_textarea_<?php echo e($training_id); ?>" readonly="readonly"><?php echo e($data -> sms_email_content); ?></textarea></td>

                            <td><?php echo e($data -> start_time); ?></td>

                            <td class='text-wrap width-set'><textarea class="txtarea" name="desc_textarea_<?php echo e($training_id); ?>" id="desc_textarea_<?php echo e($training_id); ?>" readonly="readonly"><?php echo e($data -> description); ?></textarea></td>

                            <td><?php echo e($data -> createdby); ?></td>
                            <td><?php echo e($data -> createddate); ?></td>
                            <td><?php echo e($data -> updatedby); ?></td>
                            <td><?php echo e($data -> updateddate); ?></td>

                            
                        </tr>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>

        </div>
        </div>
      </div>
</div>

<script src="<?php echo e(url('stylesheets/table/vendor/datatables/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(url('stylesheets/table/vendor/datatables-plugins/dataTables.bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(url('stylesheets/table/vendor/datatables-responsive/dataTables.responsive.js')); ?>"></script>
<script type="text/javascript">
$("#tbl_training_schedules").DataTable({
  "order": false
});
</script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>