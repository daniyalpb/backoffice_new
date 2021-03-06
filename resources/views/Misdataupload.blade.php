@extends('include.master')
@section('content')
@if(Session::has('msg'))
<div class="alert alert-success alert-dismissible">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<p class="alert alert-success">{{ Session::get('msg') }}</p>
</div>
@endif
<form name="mis_system_update" id="mis_system_update" enctype="multipart/form-data" method="POST" action="{{url('upload-mis-data')}}">  
{{ csrf_field() }}      
<div class="container-fluid">
    <div class="col-lg-12">
		<div class="panel panel-primary">
	      <div class="panel-heading">Select Excel File to Update data</div>
	      <div class="panel-body">
	      	<div class="row">
		      	<div class="col-md-1">
		      		<label>Select File</label>
		      	</div>
		      	<div class="col-md-3">
		      		<input type="file" name="import_file" id="import_file" accept=".xls,.xlsx" required>		      	
		      	</div>
		      	<div class="col-md-2">
		      		<input type="Submit" name="btn_submit" id="btn_submit" value="Submit" class="btn btn-primary">
		      	</div>		      
		      	@foreach($data as $val)
		      	@if($val->fbanotavaliable!='0')
		      	<div class="col-md-3">
		      		<a href="{{URL::to("update_state_is_fbaid")}}" class="btn btn-primary">Update Fbaid & stateid</a>		      		
		      	</div>
		      	@endif
		      	@endforeach		    
		      	<div class="col-md-3">
		      		<a href="{{URL::to("upload/Report- POSP.xlsx")}}" class="btn btn-primary" target="_blank">Download File Format</a>		      		
		      	</div>
		    </div>		 
<p style="color: red;">Note: You can uploade file with less than #3000 records in given format only i.e(.xlsx)</p>
		    <div class="row">
		    	<div class="col-md-12">
		    		<span id="success_response" class="success_class"></span>
		    	</div>
		    </div>

	      </div>
	    </div>
	</div>

</div>
</form>
@endsection 