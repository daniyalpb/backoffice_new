@extends('include.master')
@section('content')
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">CRM Lead Interaction</h3></div>
<a class="btn btn-primary" href="{{url('Lead-export')}}" style="float: right;">Export Excel</a>
<div class="form-group">
 <div class="col-md-12">
  <div class="overflow-scroll">
    <div class="table-responsive" >
 <table class='datatable-responsive table table-striped table-bordered dt-responsive nowrap' id='crmineractiontable'>
    <thead>
        <tr>
            <th>History Id</th>
            <th>Customer Name</th>
            <th>Disposition</th>
            <th>Remark</th>           
            <th>Call Duration</th>
            <th>Employee Name</th>    
             <th>Created Date</th>          
        </tr>
    </thead>
    <tbody>
        @foreach($crmdata as $val)
        <tr>
            <td>{{$val->lead_history_id}}</td>
            <td>{{$val->name}}</td>
            <td>{{$val->disposition}}</td>
            <td><textarea readonly>{{$val->remark}}</textarea></td>
            <td>{{$val->call_duration}}</td>
            <td>{{$val->EmployeeName}}</td>
            <td>{{$val->created_date}}</td>          
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
</div>
<script type="text/javascript">
$( document ).ready(function() {
       $("#crmineractiontable").DataTable();
});
</script>
@endsection