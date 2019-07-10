@extends('include.master')
@section('content')

<div class="container-fluid white-bg">
 <div class="col-md-12"><h3 class="mrg-btm">Insurance Report</h3></div>

 
<!--  <select id="msds-select" class="form-control" style="width:15%;margin: 10px;
 margin-left:551px;margin-top: 0px;display: -webkit-inline-box;" name="selectproduct" id="selectproduct" onchange="selectIndex(this)">
 <option value="">--Select--</option>
 <option value="Health">Health</option>
 <option value="Two Wheeler">Two Wheeler</option>
</select> -->
<div class="col-md-12">  
 <div class="col-md-2">
  <div class="form-group">

   <p>From Date</p>
   <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd">
     <input class="form-control date-range-filter" type="text" placeholder="From Date" name="fdate" id="min"/>
     <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
   </div>
 </div>
</div>
<div class="col-md-2">
 <div class="form-group">
   <p>To Date</p>
   <div id="datepicker1" class="input-group date" data-date-format="yyyy-mm-dd">
     <input class="form-control date-range-filter" type="text" placeholder="To Date"  name="todate"  id="max"/>
     <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
   </div>
 </div>
</div>
<div class="form-group col-md-6">
 <input type="submit" name="btndate" id="btndate"  class="mrg-top common-btn pull-left" value="SHOW">
</div>
</div>
<div class="col-md-12">  
  <div class="overflow-scroll">
    <div class="table-responsive" >
      <table class="datatable-responsive table table-striped table-bordered nowrap" id="fba-crn-tbl">
       <thead>
        <tr>
         <th>FBA ID</th>
         <th>Full Name</th>
         <th>CRN</th>
         <th>PB Status</th> 
         <th>Product</th> 
         <th>Created Date</th>
         <th>PB Status Date</th>
       </tr>
     </thead>
     <tbody>         
     </tbody>
   </table>
 </div>
</div>
</div>
  <a href="{{ URL::to('Export-fbacrnreport')}}" class="btn btn-primary">Export</a>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#fba-crn-tbl').DataTable({

     "ajax": "{{ URL::to('fba-crn-detail')}}",
     "columns": [       
     { "data": "FBAID"},
     { "data": "FullName"},            
     {"data":"crn" },
     { "data": "PBStatus"},  
     {"data":"product_id"},
     {"data":"created_date"},
     {"data":"PBStatusDate"},
     ]
     
   } );
  } );


</script> 

<script type="text/javascript">
  $(document).ready(function() {

  // Bootstrap datepicker
  $('.input-daterange input').each(function() {
    $(this).datepicker('clearDates');
  });

  // Extend dataTables search

 // alert('test');
 $.fn.dataTable.ext.search.push(
  function(settings, data, dataIndex) {
    var min = $('#min').val();
    var max = $('#max').val();
   // console.log(max);
    var createdAt = data[5] || 5; // Our date column in the table
    
    if (
      (min == "" || max == "") ||
      (moment(createdAt).isSameOrAfter(min) && moment(createdAt).isSameOrBefore(max,'day'))
      ) 

    {

     return true;
   }
   return false;
 }
 );

 // Re-draw the table when the a date range filter changes
 $('#btndate').on("click", function(){
  var table = $('#fba-crn-tbl').DataTable();
  table.draw();
});

 $('.date-range-filter').datepicker();
});
</script>

<!-- <script type="text/javascript">
  function searchdata()
{
  var index = $('#msds-select').val();
  }else if(index=='Health'){colsearch(7);}
  else if(index == 'Two Wheeler'){colsearch(6);}
 
}
</script>

<script type="text/javascript">
  function selectIndex(dd) {
alert("test"); 
var table = $('#fba-crn-tbl').DataTable(); 
  table.draw();
}

</script>
<script type="text/javascript">
  function colsearch(index)
{
  table1 = $('#fba-crn-tbl').DataTable();
    if ($('#txtfbasearch').val()!= '') {
    table1.columns(index).search('^'+ $('#txtfbasearch').val() + '$', true, true).draw(); 
 }
    else
    table1.columns(index).search($('#txtfbasearch').val(), true, true).draw(); 
}
</script> -->
@endsection
