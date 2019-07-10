@extends('include.master')
@section('content')

<div class="container-fluid white-bg">
	 @if (Session::has('message1'))
    	<div class="alert alert-info alert">{{ Session::get('message1') }}</div>
	 @endif
	<div class="col-md-12"><h3 class="mrg-btm">Marketing Campaign Master</h3></div>
		<a href="{{url('Add-Marketing-Campaign-Master-View')}}" class="qry-btn" id="pospbtn">Add New Marketing Campaign Master</a> <br>
		<br>
		<div class="col-md-12">
			 <div class="overflow-scroll">
			 	<div class="table-responsive" >
					<table id="tbldateil" class="table table-bordered table-striped tbl" >
                 		<thead>
                 		<tr>
                 			<th>ID</th>
                   			<th>Title</th>
                   			<th>Type</th>
                   			<th>Short Discription</th>
                   			<th>Discription</th>
                     		<th>End Date</th>
                     		<th>Edit</th>
                   			<th>Delete</th>
              			</tr>
          			</thead>
	       			<tbody>
	       			@foreach($getdata as $val)
		       			<tr>
		       				<td>{{ $val->id }}</td>
		       				<td>{{ $val->Title }}</td>
		       				<td>{{ $val->type }}</td>
		       				<td>{{ $val->shortdescription }}</td>
		       				<td>{{ $val->Description }}</td>
		       				<td>{{ $val->enddate }}</td>
		       				<td><a href="{{url('Edit-marketing-campaign-master/'.$val->id)}}" class="btn btn-info" role="button">Edit</a></td>
		       				<td><a href="{{url('delete-marketing-campaign-master/'.$val->id)}}" class="btn btn-danger" role="button">Delete</a></td>
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

<script type="text/javascript">
	$("document").ready(function(){
		setTimeout(function(){
		    $("div.alert").remove();
		}, 2000 ); // 5 secs
    });
</script>
@endsection		