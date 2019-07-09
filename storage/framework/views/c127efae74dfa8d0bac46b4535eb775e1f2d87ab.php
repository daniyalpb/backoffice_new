<?php $__env->startSection('content'); ?>
<div class="container-fluid white-bg">
 <div class="col-md-12"><h3 class="mrg-btm">OTP Details</h3></div>
 <div class="col-md-12">
  <form id="Frmcrmrp" method="post">
     <?php echo e(csrf_field()); ?>

   <div class="col-md-2">
      <div class="form-group"> 
         <label>From Date</label>
         <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd">
               <input class="form-control date-range-filter" type="text" placeholder="From Date" name="txtfromdate" id="txtfromdate" required  value="<?php echo date("Y-m-d")?>">
          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
         </div>
      </div>
   </div>
   <div class="col-md-2">
      <div class="form-group">
        <label>To Date</label>
        <div id="datepicker1" class="input-group date" data-date-format="yyyy-mm-dd">
             <input class="form-control date-range-filter" type="text" placeholder="To Date"  name="txttodate"  id="txttodate" required value="<?php echo date("Y-m-d")?>">
          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
        </div>
      </div>
  </div>

  <div class="col-md-1">    
    <a id="btncrmreport" class="btn btn-primary" style="margin-top: 25px;" onclick="getcrmrp();">SHOW</a>
  </div> 
  </form>
</div>
  <div class="col-md-12">
      <div class="overflow-scroll">
 <br/>
<br/>
    <div class="table-responsive" id="divcrmtable" >       
   </div>
  </div>
</div>
</div>
</div>
</div>
<script type="text/javascript">

  $(document).ready(function(){
    $('#otp-details-id').DataTable({
      "order": [[ 2, "desc" ]]
    });
    getcrmrp();
  });


function getcrmrp(){
  var startdate=$("#txtfromdate").val();
  var enddate=$("#txttodate").val();
$.ajax({ 
     url: 'otp-info/'+startdate+'/'+enddate,
     dataType : 'json',
     method:"GET",
     success: function(msg)
     {
      $("#divcrmtable" ).empty();
        var newdata = JSON.stringify(msg);
        var data=JSON.parse(newdata);
        var fdate=$("#txtfromdate").val();
        var tdate=$("#txttodate").val();
        var str = "<table class='datatable-responsive table table-striped table-bordered dt-responsive nowrap' id='crmtable'><thead><tr><th>Mobile No</th><th>OTP</th><th>Created Date</th></tr></thead><tbody>";
       for (var i = 0; i < data.length; i++) 
       {
         str = str + "<tr style='height:30px;margin:5px;'><td>"+data[i].ValidData+"</td><td>"+data[i].OTP+"</td><td>"+data[i].OTP+"</td></tr>";
        }     
         str = str + "</tbody></table>";
           $('#divcrmtable').html(str);  
           $('#crmtable').DataTable(); 
     }  
     

});
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>