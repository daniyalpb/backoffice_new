@extends('include.master')
 @section('content')
<div class="container-fluid white-bg">
	<div class="col-md-12"><h3 class="mrg-btm">View Lead Details</h3></div>
	<div class="col-md-12">
		<div class="overflow-scroll">
			<div class="table-responsive" >
				<table id="tbldateil" class="table table-bordered table-striped tbl" >
	                <thead>
	                 	<tr>
	                 		<th>UID-Name</th>
	                   		<th>Lead Assigned</th>
	                   		<th>Close</th>
	                   		<th>Convert</th>
	              		</tr>
	          		</thead>
		       		<tbody>
		       			@foreach($getdata as $val)
		       			<tr>
			       			<td>{{ $val->UIDName }}</td>
			       			<td><a href="{{url('view-lead-details-record/'.$val->assing_to_uid.'/1')}}">{{ $val->lead_id }}</a></td>
			       			<td><a href="{{url('view-lead-details-record/'.$val->assing_to_uid.'/2')}}">{{ $val->Closed }}</a></td>
			       			<td><a href="{{url('view-lead-details-record/'.$val->assing_to_uid.'/3')}}">{{ $val->Converted }}</a></td>
			    		</tr>
			    		@endforeach
					</tbody>
	      		</table>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
   $("#tbldateil").DataTable();
   });
</script>

 @endsection