 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

<style>
  .month1 {height:100px; border:1px solid #f1efef;background:#f5f5f5; text-align:center;font-size:16px; padding:14px;}
  .month1:hover {background:#fff;}
  .title11 {text-transform:uppercase;background: #337bb7;padding: 10px;margin: 0px;color: #fff;}
  .box-shadow {box-shadow:1px 1px 3px 1px #ccc; padding-left:0px; padding-right:0px;}
  h3 {font-size:18px;}
  .count {font-size:13px; color:#888;}
  .efefef {background: #efefef;}
  .box-shadow a {text-align:center;}
  
  @media  only screen and (max-width: 768px) {
  .efefef {background: #f5f5f5;}
  .box-shadow {float:left;}
  }
</style>


<div class="container-fluid white-bg">
            <div class="col-md-12"><h3 class="mrg-btm" style="margin-left: 90px;font-size: 27px;"></h3></div>
<!-- 
          <div class="col-md-12">
          <div class="overflow-scroll">
          <div class="table-responsive" >

       <table class="table table-bordered table-striped tbl" id="tbl-motor-lead-details"> 
      <thead>
      <tr>

          <th></th><th></th><th></th><th></th>
      </tr>
      </thead>
      <tbody>

<?php $i=1;?><tr>
                  <?php $__currentLoopData = $motorlead; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($i==9) {echo "<tr>"; }?>  
                  <td><?php echo e($val->Month_Name); ?>

                  <span>
                  <a href="<?php echo e(url('motor-lead-alldetails')); ?>/<?php echo e($val->FBAID); ?>/<?php echo e($val->month_no); ?>" onclick="getmonthcount()">(<?php echo e($val->Count); ?>)
                  </a>
               </span>
               </td>
                  <?php if($i==4) {echo "</tr>"; }?>   
                  <?php $i++;?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
             </tr>                   
</tbody>
</table>
                             </div>
                         </div>
                      </div>
                   -->


<!-- <div id="content" style="overflow:scroll;"> -->


<div id="spassword" class="modal fade spassword" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Alert</h4>
      </div>
      <div class="modal-body" style="font-weight: bolder">
      You have (<span id='modal_span_count'></span>) leads in this month. However these leads will be visible 45 days prior to expiry .
        <div style="color: blue;" id="show_password" class="show_password">
        </div>
      </div>
    </div>
  </div>
</div>

       <div class="container-fluid white-bg">
        
       <div class="offset-2 box-shadow">
           <div class="col-md-6 col-md-offset-2 box-shadow" style="padding-left:0px; padding-right:0px;margin-left:7.666667%;margin-top: 50px">
       <h3 style="margin-top: -7%;" class="text-center title11">My Leads <img src="../images/calendar_white.png" style="width: 19px;margin-top: -5px;" /></h3>

<?php
  $p_mod = 1;
?>
<?php $__currentLoopData = $motorlead; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
  if((($p_mod % 2) == 1) and ($p_mod <6)){ $set_class = 'efefef'; }
  if((($p_mod % 2) == 0) and ($p_mod <= 6)){ $set_class = ''; }

  if((($p_mod % 2) == 0) and ($p_mod > 6)){ $set_class = 'efefef'; }
  if((($p_mod % 2) == 1) and ($p_mod >= 6)){ $set_class = ''; }
?>

<?php if($val->Count!='0' and $val->url!=''): ?>
      
      <a href="#">
       <div class="col-md-2 month1 col-xs-6 col-sm-6 <?php echo e($set_class); ?>">
       <span class="count">
       <a href="<?php echo e(url('motor-lead-alldetails')); ?>/<?php echo e($val->FBAID); ?>/<?php echo e($val->month_no); ?>"><?php echo e($val->Month_Name); ?> <br>(<?php echo e($val->Count); ?>)
       </a>
       </span>
       </div>
      </a> 
       <?php else: ?>

      <a href="#">
        <div class="col-md-2 month1 col-xs-6 col-sm-6 <?php echo e($set_class); ?>">
          <a href="#" data-toggle="modal" data-target="#spassword" onclick='load_modal("count_<?php echo e($val->Month_Name); ?>")'><?php echo e($val->Month_Name); ?> <br>(<span id="count_<?php echo e($val->Month_Name); ?>"><?php echo e($val->Count); ?></span>)
          </a>
        </div>
      </a> 

<?php endif; ?>
<?php $p_mod++;?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

  </div> 
       </div>
          </div>

       
          
<div style="margin-left:12.4%;margin-top: 32px;font-weight: bolder;">Leads generated from Syncing of contacts: <?php echo e($val->Contactscount); ?> leads from <?php echo e($val->newcount); ?> contacts synced</div>
<div style="margin-left:12.4%;margin-top: 13px;font-weight: bolder;">Manual leads generated: <?php echo e($val->manullycount); ?></div>


<script type='text/javascript'>

function load_modal(span_id){
  var p_count = $('#' + span_id).text();

  $('#modal_span_count').text(p_count);
}
</script>