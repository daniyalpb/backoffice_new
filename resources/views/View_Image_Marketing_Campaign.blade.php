@extends('include.master')
@section('content')

<div class="container-fluid white-bg">
	<div class="col-md-12"><h3 class="mrg-btm">Doc Gallery</h3></div>
 		<br>
		<br>
		<form id="uploadimg" name="uploadimg" method="post" action="{{url('Add-Image-Marketing-Campaign')}}" enctype="multipart/form-data">
	    {{csrf_field()}}
	    @if (Session::has('message1'))
	    	<div class="alert alert-info alert">{{ Session::get('message1') }}</div>
		@endif
			<div class="row">
				 <div class="form-group col-md-3">
				 </div>
				 <div class="form-group col-md-6">
				 	<div class="col-md-2">
				 		<label>Upload :</label>
				 	</div>
				 	<div class="col-md-10">
				 		<input type="file" class="text-primary form-control" name="file_upload" id="file_upload" required="true">
				 	</div>
				 </div>
				 <div class="form-group col-md-3">
				 	<input type="Submit" name="statussub" id="statussub" value="Upload" class="btn btn-success">
				 </div>
			</div>
		</form>
		<br>
		<div class="col-md-12">
			 <div class="overflow-scroll">
			 	<div class="table-responsive" >
					<table id="tbldateil" class="table table-bordered table-striped tbl" >
                 		<thead>
                 		<tr>
                 			<th>ID</th>
                   			<th>Image Path</th>
                   			<th>View Image</th>
              			</tr>
          			</thead>
	       			<tbody>
	       			@foreach($getimg as $val)
		       			<tr>
		       				<td>{{ $val->mdoc_id }}</td>
		       				<td>{{ URL::to($val->doc_path) }}</td>
		       				<td><a href="{{ URL::to($val->doc_path) }}">View Image</a></td>
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