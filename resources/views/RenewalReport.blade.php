@extends('include.master')
@section('content')
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">RENEWAL REPORT</h3></div>
<div class="form-group">
 <div class="col-md-12">
  <div class="overflow-scroll">
    <div class="table-responsive" >
 <table class='datatable-responsive table table-striped table-bordered dt-responsive nowrap' id='tblrenewal'>
    <thead>
        <tr>
            <th>FBAID</th>
            <th>FBA NAME</th>
            <th>COUNT</th>            
        </tr>
    </thead>
    <tbody>
        @foreach($data as $val)
        <tr>
            <td>{{$val->FBAID}}</td>
            <td>{{$val->FullName}}</td>    
            <td><a href="#" onclick="getrenewaldetails({{$val->FBAID}})">{{$val->count}}</a></td>          
        </tr>
        @endforeach
    </tbody>
 </table>
</div>
<div id="divcrmtable">
    
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
    $( document ).ready(function() {
       $("#tblrenewal").DataTable();
});
function getrenewaldetails(fbaid){
    $.ajax({
       url:'get_renewal_details/'+fbaid,
       dataType : 'json',
       method:"GET",
       sucsess:function(idata){
        alert('test');
            var newdata = JSON.stringify(idata);
            var data=JSON.parse(newdata);
            $("#divcrmtable").empty();
           var str = "<table class='datatable-responsive table table-striped table-bordered dt-responsive nowrap' id='crmtable'><thead><tr><th>FBAID</th><th>EntryNo</th><th>InsCompany</th><th>ProductName</th><th>PolicyCategory</th><th>ExpiryDate</th><th>VehicleMake</th><th>Model</th><th>Model</th>Premium</tr></thead><tbody>";
       for (var i = 0; i < data.length; i++) 
       {
         str = str + "<tr style='height:30px;margin:5px;'><td>"+data[i].FBAID+"</td><td>"+data[i].EntryNo+"</td><td>"+data[i].InsCompany+"</td><td>"+data[i].ProductName+"</td><td>"+data[i].PolicyCategory+"</td><td>"+data[i].ExpiryDate+"</td><td>"+data[i].VehicleMake+"</td><td>"+data[i].Model+"</td><td>"+data[i].Premium+"</td></tr>";
        }     
         str = str + "</tbody></table>";
           $('#divcrmtable').html(str);  
           $('#crmtable').DataTable();
       }
    });
}

</script>
@endsection