@extends('include.master')
@section('content')
@if($errors->any())
<div class="alert alert-info fade in alert-dismissible show">
 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true" style="font-size:20px">×</span>
  </button><strong>No Intraction!</strong>{{$errors->first()}}
</div>
@endif
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">Recruitment Caller Target by Vintage</h3></div>

<div class="col-md-12">
	<table class="table-responsive table table-striped table-bordered dt-responsive nowrap">
  <tr>
    <th><b>Vintage</b></th>
    @foreach($data as $val)
     <th>{{$val->month}}</th>  
    @endforeach
  </tr>
  <tr>
    <th><b>Certified POSP Target</b></th>
     @foreach($data as $val)
      <td><b>{{$val->target}}</b></td>
     @endforeach
  </tr>
  <tr>
    <th><b>Achieved</b></th>
    @foreach($data as $val)
      <td><b>{{$val->businesscount}}</b></td>   
     @endforeach 
  </tr>
</table>
</div>
</div>
@endsection