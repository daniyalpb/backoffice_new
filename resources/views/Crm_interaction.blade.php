@extends('include.master')
@section('content')
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">CRM Interaction</h3></div>
<div class="form-group">
 <div class="col-md-12">
  <div class="overflow-scroll">
    <div class="table-responsive" >
 <table class='datatable-responsive table table-striped table-bordered dt-responsive nowrap' id='crmineractiontable'>
    <thead>
        <tr>
            <th>History Id</th>
            <th>Disposition</th>
            <th>Remark</th>
            <th>Followup Date</th>
            <th>FBAID</th>
            <th>FBA Name</th>
            <th>Status</th>
            <th>source</th>
            <th>call Duration</th>
        </tr>
    </thead>
    <tbody>
        @foreach($crmdata as $val)
        <tr>
            <td>{{$val->history_id}}</td>
            <td>{{$val->disposition}}</td>
            <td><textarea readonly>{{$val->remark}}</textarea></td>
            <td>{{$val->followup_date}}</td>
            <td>{{$val->FBAID}}</td>
            <td>{{$val->FullName}}</td>
            @if($val->action=='y')
            <td ><p style="color:green">Open</p></td>
            @else
            <td><p style="color: red">Close</p></td>
            @Endif
            @if($val->source=='')
            <td>WEB</td>
            @else
            <td>App</td>
            @endif
            <td>{{$val->callDuration}}</td>
        </tr>
        @endforeach
    </tbody>
 </table>
</div>
</div>
</div>
</div>
</div>
<div>
    <a href="#" class="btn btn-primary" onclick="fnExcelReport();">Export Excel</a>
</div>
</div>
<script type="text/javascript">
$( document ).ready(function() {
       $('#crmineractiontable').DataTable( {
        "paging":   false,        
    });
});
function fnExcelReport()
{
    $('#crmineractiontable').DataTable( {
        "paging":   false,        
    });
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('crmineractiontable'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params
    tab_text= tab_text.replace(/<textarea[^>]*>|<\/textarea>/gi, "");

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}
</script>
@endsection