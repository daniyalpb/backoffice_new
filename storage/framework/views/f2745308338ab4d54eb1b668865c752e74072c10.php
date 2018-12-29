
<?php $__env->startSection('content'); ?>
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">CRM Report</h3></div>

<div class="col-md-12">
	<form id="Frmcrmrp">
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
</form>
	<div class="col-md-3">		
		<button id="btncrmreport" class="btn btn-primary" style="margin-top: 25px;" onclick="getcrmrp();">SHOW</button>
	</div>
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
<script type="text/javascript">
	$( document ).ready(function() {
    getcrmrp();
});
	function getcrmrp(){
	var startdate=$("#txtfromdate").val();
	var enddate=$("#txttodate").val();
if ($('#Frmcrmrp').valid()){
$.ajax({ 
     url: 'getcrmreport/'+startdate+'/'+enddate,
     dataType : 'json',
     method:"GET",
     success: function(msg)
     {
      $("#divcrmtable" ).empty();
        var newdata = JSON.stringify(msg);
        var data=JSON.parse(newdata);
        var str = "<table class='datatable-responsive table table-striped table-bordered dt-responsive nowrap' id='crmtable'><thead><tr><th>UID</th><th>Employee Name</th><th>Profile</th><th>New</th><th>Open</th><th>Closed</th><th>Interactions</th</tr></thead><tbody>";
       for (var i = 0; i < data.length; i++) 
       {
         str = str + "<tr style='height:30px;margin:5px;'><td>"+data[i].UID+"</td><td>"+data[i].EmployeeName+"</td><td>"+data[i].Profile+"</td><td>"+data[i].New+"</td><td>"+data[i].Open+"</td><td>"+data[i].Closed+"</td><td>"+data[i].Interactions+"</td></tr>";
        }     
         str = str + "</tbody></table>";
           $('#divcrmtable').html(str);  
           $('#crmtable').DataTable(); 
     }  
     

});
}
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>