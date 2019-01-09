@extends('include.master')
@section('content')
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">CRM Interaction</h3></div>

<div class="col-md-12">
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
 		</tr>
 		@endforeach
 	</tbody>
 </table>
</div>
</div>
<script type="text/javascript">
$( document ).ready(function() {
       $("#crmineractiontable").DataTable();
});
</script>
@endsection