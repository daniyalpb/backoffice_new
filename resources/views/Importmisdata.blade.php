@extends('include.master')
@section('content')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<p class="alert alert-success">{{ Session::get('message') }}</p>
</div>
@endif

<div class="container-fluid white-bg">
	<div class="col-md-12"><h3>Upload Mis Data </h3></div>
	<br/>
	<br/>
	<p> All <b style="color: red; font-size: 15px;">*</b> Marked field are Compulsory</p>

	<div class="col-md-12">
		<div class="form-group">
			<form id="frmmisdata" name="frmmisdata" method="Post" action="{{url('Importmisfile')}}" enctype="multipart/form-data">
				 {{ csrf_field() }}
				<div class="col-md-2">
					<label>Mis File<b style="color: red; font-size: 15px;">*</b></label>
				</div>				
				<div class="col-md-4">		
					<input type="file" name="filemisdata" id="filemisdata"  class="form-control" required>
				</div>
				<div class="col-md-4">
					<input type="submit" name="btnsubmit" id="btnsubmit" value="Upload" class="btn btn-primary">
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
