@extends('include.master')
@section('content')

<div class="container-fluid white-bg">
	<div class="col-md-12"><h3 class="mrg-btm">Contact Sync SMS Log</h3></div>
		<br>
		<div class="col-md-12">
			 <div class="overflow-scroll">
			 	<div class="table-responsive" >
					<table id="tbldateil" class="table table-bordered table-striped tbl" >
                 		<thead>
                 		<tr>
                 			<th>FBAID</th>
                   			<th>Name</th>
                   			<th>Log Date</th>
                   			<th>Contact Sync Count</th>
              			</tr>
          			</thead>
	       			<tbody>
	       			@foreach($getdata as $val)
		       			<tr>
		       				<td>{{ $val->FBAID }}</td>
		       				<td>{{ $val->FullName }}</td>
		       				<td>{{ $val->created_date }}</td>
		       				<td>{{ $val->count }}</td>
		    			</tr>
		    		@endforeach
					</tbody>
      			</table>
			</div>
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