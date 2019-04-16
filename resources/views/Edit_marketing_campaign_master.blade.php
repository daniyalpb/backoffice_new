@extends('include.master')
@section('content')

<div class="container-fluid white-bg">
	<div class="col-md-12"><h3 class="mrg-btm"> Edit Marketing Campaign Master</h3></div>
	<br>
	<br>
	<form id="addmarketing" name="addmarketing" method="post" action="{{url('sub-Edit-marketing-campaign-master')}}">
    {{csrf_field()}}
		<div class="row">
			 <div class="form-group col-md-3">
			 </div>
			 <div class="form-group col-md-6">
			 	<div class="col-md-2">
			 		<label>Title :</label>
			 	</div>
			 	<div class="col-md-10">
			 		<input type="hidden" name="eid" id="eid" value="{{$getupdatedata[0]->id}}">
			 		<input type="text" class="text-primary form-control" name="etitle" id="etitle" required="true" value="{{$getupdatedata[0]->Title}}">
			 	</div>
			 </div>
			 <div class="form-group col-md-3">
			 </div>
		</div>

		<div class="row">
			 <div class="form-group col-md-3">
			 </div>
			 <div class="form-group col-md-6">
			 	<div class="col-md-2">
			 		<label>Type :</label>
			 	</div>
			 	<div class="col-md-10">
			 		<select type="text" class="text-primary form-control" name="etype" id="etype" required="">
			 			<option value="{{$getupdatedata[0]->type}}">{{$getupdatedata[0]->type}}</option>
			 			<option value="Html">Html</option>
			 			<option value="Url">Url</option>
			 			<option value="Image">Image</option>
			 			<option value="Pdf">Pdf</option>
			 		</select>
			 	</div>
			 </div>
			 <div class="form-group col-md-3">
			 </div>
		</div>

		<div class="row">
			 <div class="form-group col-md-3">
			 </div>
			 <div class="form-group col-md-6">
			 	<div class="col-md-2">
			 		<label>Short Description:</label>
			 	</div>
			 	<div class="col-md-10">
			 		<input type="text" class="text-primary form-control" name="esdescription" id="esdescription" required="" value="{{$getupdatedata[0]->shortdescription}}">
			 	</div>
			 </div>
			 <div class="form-group col-md-3">
			 </div>
		</div>

		<div class="row">
			 <div class="form-group col-md-3">
			 </div>
			 <div class="form-group col-md-6">
			 	<div class="col-md-2">
			 		<label>Description:</label>
			 	</div>
			 	<div class="col-md-10">
			 		<input type="text" class="text-primary form-control" name="eldescription" id="eldescription" required="" value="{{$getupdatedata[0]->Description}}">
			 	</div>
			 </div>
			 <div class="form-group col-md-3">
			 </div>
		</div>

		<div class="row">
			 <div class="form-group col-md-3">
			 </div>
			 <div class="form-group col-md-6">
			 	<div class="col-md-2">
			 		<label> Edit Gallery :</label>
			 	</div>
			 	<div class="col-md-10">
			 		<a href="{{url('View-Image-Marketing-Campaign')}}">Doc Gallery</a>
			 	</div>
			 </div>
			 <div class="form-group col-md-3">
			 </div>
		</div>

		<div class="row">
			 <div class="form-group col-md-3">
			 </div>
			 <div class="form-group col-md-6">
			 	<div class="col-md-2">
			 		<label>End Date :</label>
			 	</div>
			 	<div class="col-md-10">
			 		<input type="date" class="text-primary form-control" name="enddate" id="enddate" value="{{$getupdatedata[0]->enddate}}">
			 	</div>
			 </div>
			 <div class="form-group col-md-3">
			 </div>
		</div>

		<div class="row">
			 <div class="form-group col-md-8">
			 </div>
			 <div class="form-group col-md-1">
			 		<input type="submit" name="statussub" id="statussub" value="Update" class="btn btn-success">
			 </div>
			 <div class="form-group col-md-3">
			 </div>
		</div>
	</form>

	<script type="text/javascript">
		$("document").ready(function(){
		    setTimeout(function(){
		       $("div.alert").remove();
		    }, 2000 ); // 5 secs

		});
	</script>

@endsection