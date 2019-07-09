<?php $__env->startSection('content'); ?>
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">RENEWAL REPORT</h3></div>
<marquee><p style="color: red">Select The Date And click SHOW Button to get Report</p></marquee>
<div class="col-md-2">
  <div class="form-group">
<form method="Post" action="<?php echo e(url('Renewal-report')); ?>"> 
  <?php echo e(csrf_field()); ?>

   <p>From Date</p>
   <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd">
     <input class="form-control date-range-filter" type="text" placeholder="From Date" name="fdate" id="min" required/>
     <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
   </div>
 </div>
</div>
<div class="col-md-2">
 <div class="form-group">
   <p>To Date</p>
   <div id="datepicker1" class="input-group date" data-date-format="yyyy-mm-dd">
     <input class="form-control date-range-filter" type="text" placeholder="To Date"  name="todate"  id="max" required />
     <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
   </div>
 </div>
</div>
<div class="form-group"> <input type="submit" name="btndate" id="btndate"  class="mrg-top common-btn pull-left" value="SHOW"></div>
</form>
<div class="form-group">
 <div class="col-md-12">
  <div class="overflow-scroll">
    <div class="table-responsive" id="divmain">

 <table class='datatable-responsive table table-striped table-bordered dt-responsive nowrap' id='tblrenewal'>
    <thead>
        <tr>
            <th>FBAID</th>
            <th>FBA NAME</th>
            <th>RRM NAME</th>
            <th>COUNT</th>            
        </tr>
    </thead>
    <tbody>
      <?php if(isset($data)): ?>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($val->FBAID); ?></td>
            <td><?php echo e($val->FullName); ?></td>  
             <td><?php echo e($val->EmployeeName); ?></td>
            <td><a onclick="getrenewaldetails(<?php echo e($val->FBAID); ?>)"><?php echo e($val->count); ?></a></td>        
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </tbody>
 </table> 
</div>
</div>
</div>
</div>
</div>
<!-- Modal -->
  <div class="modal fade" id="moredetails" role="dialog">
    <div class="modal-dialog modal-lg" style="width: 1240px;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Renewal Details</h4>
        </div>
        <div class="modal-body">
       <div id="divcrmtable" class="table-responsive">           
       </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
     <?php if(isset($date)): ?>
<input type="hidden" name="fromdate" id="fromdate" value="<?php echo e($date['fromdate']); ?>">
<input type="hidden" name="todatee" id="todatee" value="<?php echo e($date['todate']); ?>">

<?php endif; ?>
  </div>
<script type="text/javascript">
    $( document ).ready(function(){
       $("#tblrenewal").DataTable();
        $("#min").val($("#fromdate").val());
        $("#max").val($("#todatee").val());
});
function getrenewaldetails(fbaid){ 
    $.ajax({
             url: 'get_renewal_details/'+fbaid+'/'+$("#fromdate").val()+'/'+$("#todatee").val(),
             type: "GET",             
             success:function(csdata) 
             {      
               var data = JSON.parse(csdata);
                $('#divcrmtable').empty();              
         for (var i = 0; i < data.length; i++) 
           {
               var str = "<table class='datatable-responsive table table-striped table-bordered dt-responsive nowrap' id='crmtable'><thead><tr><th>FBAID</th><th>EntryNo</th><th>InsCompany</th><th>ProductName</th><th>PolicyCategory</th><th>ExpiryDate</th><th>VehicleMake</th><th>Model</th><th>Premium</th></tr></thead><tbody>";
       for (var i = 0; i < data.length; i++) 
       {
         str = str + "<tr style='height:30px;margin:5px;'><td>"+data[i].FBAID+"</td><td>"+data[i].EntryNo+"</td><td>"+data[i].InsCompany+"</td><td>"+data[i].ProductName+"</td><td>"+data[i].PolicyCategory+"</td><td>"+data[i].ExpiryDate+"</td><td>"+data[i].VehicleMake+"</td><td>"+data[i].Model+"</td><td>"+data[i].Premium+"</td></tr>";
        }     
         str = str + "</tbody></table>";
           $('#divcrmtable').html(str);  
           $('#crmtable').DataTable();


           } 
             
            str = str + "</table>";
           $('#divcsdetais').html(str);
            $("#moredetails").modal('show');
             }
         });
}
function getrenewaldata() {
  $.ajax({
             url: 'get_renewal_details/'+fbaid,
             type: "GET",             
             success:function(csdata) 
             {      
               var data = JSON.parse(csdata);
                $('#divmain').empty();              
         for (var i = 0; i < data.length; i++) 
           {
               var str = "<table class='datatable-responsive table table-striped table-bordered dt-responsive nowrap' id='maintbl'><thead><tr><th>FBAID</th><th>FBA NAME</th><th>COUNT</th></tr></thead><tbody>";
       for (var i = 0; i < data.length; i++) 
       {
         str = str + "<tr style='height:30px;margin:5px;'><td>"+data[i].FBAID+"</td><td>"+data[i].FullName+"</td><td>"+data[i].count+"</td></tr>";
        }     
         str = str + "</tbody></table>";
           $('#divmain').html(str);  
           $('#maintbl').DataTable();


           } 
             
            str = str + "</table>";
           $('#divmain').html(str);           
             }
         });
}

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>