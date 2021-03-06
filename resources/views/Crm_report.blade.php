@extends('include.master')
@section('content')
@if($errors->any())
<div class="alert alert-info fade in alert-dismissible show">
 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true" style="font-size:20px">×</span>
  </button><strong>No Intraction!</strong>{{$errors->first()}}
</div>
@endif
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">CRM Report</h3></div>

<div class="col-md-12">
	<form id="Frmcrmrp" method="post" action="{{url('crm_export')}}">
     {{ csrf_field() }}
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
  <div class="col-md-2">    
    <button onclick="getallexpcon()" id="btnexport" class="btn btn-primary" style="margin-top: 25px;">Export Only Connected</button>
  </div>
  <div class="col-md-3">    
    <button onclick="getallexp();" id="btnexportall" class="btn btn-primary" style="margin-top: 25px;">Export All</button>
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
        var fdate=$("#txtfromdate").val();
        var tdate=$("#txttodate").val();
        var str = "<table class='datatable-responsive table table-striped table-bordered dt-responsive nowrap' id='crmtable'><thead><tr><th>UID</th><th>Employee Name</th><th>Profile</th><th>New</th><th>Open</th><th>Closed</th><th>Interactions</th</tr></thead><tbody>";
       for (var i = 0; i < data.length; i++) 
       {
         str = str + "<tr style='height:30px;margin:5px;'><td>"+data[i].UID+"</td><td>"+data[i].EmployeeName+"</td><td>"+data[i].Profile+"</td><td>"+data[i].New+"</td><td>"+data[i].Open+"</td><td>"+data[i].Closed+"</td><td><a href='get_crm_interaction/"+data[i].UID+"/"+fdate+"/"+tdate+"' target='_blank'>"+data[i].Interactions+"</a></td></tr>";
        }     
         str = str + "</tbody></table>";
           $('#divcrmtable').html(str);  
           $('#crmtable').DataTable(); 
     }  
     

});
}
}
/*function getcrminteraction(UID){
  var fdate=$("#txtfromdate").val();
  var tdate=$("#txttodate").val();
  $.ajax({ 
     url: 'get_crm_interaction/'+UID+'/'+fdate+'/'+tdate,
     dataType : 'json',
     method:"GET",
     success: function(msg)
     {



      window.location.href="{{url('hgshq')}}/"+msg;
      $("#divcrmtable" ).empty();
        var newdata = JSON.stringify(msg);
        var data=JSON.parse(newdata);
        var str = "<table class='datatable-responsive table table-striped table-bordered dt-responsive nowrap' id='crmtable'><thead><tr><th>UID</th><th>Employee Name</th><th>Profile</th><th>New</th><th>Open</th><th>Closed</th><th>Interactions</th</tr></thead><tbody>";
       for (var i = 0; i < data.length; i++) 
       {
         str = str + "<tr style='height:30px;margin:5px;'><td>"+data[i].UID+"</td><td>"+data[i].EmployeeName+"</td><td>"+data[i].Profile+"</td><td>"+data[i].New+"</td><td>"+data[i].Open+"</td><td>"+data[i].Closed+"</td><td><a onclick='getcrminteraction("+data[i].UID+")'>"+data[i].Interactions+"</a></td></tr>";
        }     
         str = str + "</tbody></table>";
           $('#divcrmtable').html(str);  
           $('#crmtable').DataTable(); 
     }  
     

});

}*/
function getallexpcon() {
 $("#Frmcrmrp").attr('action','{{url('crm_export')}}');
}
function getallexp() {
 $("#Frmcrmrp").attr('action','{{url('crm_export_all')}}');
}
</script>
@endsection