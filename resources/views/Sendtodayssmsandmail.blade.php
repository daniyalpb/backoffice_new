@extends('include.master')
@section('content')
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">Mail And SMS Data</h3></div>
<div class="col-md-12">
 <div class="overflow-scroll">
 <div class="table-responsive" >
<table class="datatable-responsive table table-striped table-bordered dt-responsive" id="tblmaildata">
	<thead>
      <tr>
      	<th>ID</th>
      	<th>FBAID</th>
      	<th>Name</th>
        <th>Mobile No</th>
      	<th>Email</th>      	
        <th>Message</th>
        <th>msgtime</th>
      	<th>schedule_date_time</th>
        <th>Is sent</th>  
        <th>Created BY</th>    
        <th>Created Date</th>	
      </tr>
    </thead>   
          <tbody>
             @foreach($maildata as $val)
            <tr>
              <td>{{$val->mailid}}</td>
              <td>{{$val->fbaid}}</td>
              <td>{{$val->FullName}}</td>
              <td>{{$val->MobiNumb1}}</td>
              <td>{{$val->EmailID}}</td>
              <td>{{$val->message}}</td>
              <td>{{$val->msgtime}}</td>             
              <td>{{$val->schedule_date_time}}</td>
              <td>{{$val->issent}}</td>
              <td>{{$val->created_by}}</td>
              <td>{{$val->create_date}}</td>
            </tr>
            @endforeach
          </tbody>   
  </table>
</div>
</div>
</div>
</div>
<script type="text/javascript">
  $( document ).ready(function() {
  $("#tblmaildata").DataTable();
});
</script>
@endsection