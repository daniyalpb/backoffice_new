@extends('include.master')
@section('content')
<div class="container-fluid white-bg">
	<div class="col-md-12"><h3 class="mrg-btm">My Alerts</h3></div>
	<table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" data-sort-name="stargazers_count"
	data-sort-order="desc" id="tblmyalerts">
	<thead>
		<tr>  
			<th>ID</th>
			<th>Notification Title</th>
			<th>Notifiaction</th>
			<th>Created Date</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $val)
		<tr>
			<td>{{$val->id}}</td>
			<td>{{$val->Notification_Title}}</td>
			<td><textarea readonly>{{$val->Notification_Body}}</textarea></td>
			<td>{{$val->created_date}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#tblmyalerts').dataTable({
			"ordering": false
		});

	});
</script>
@endsection