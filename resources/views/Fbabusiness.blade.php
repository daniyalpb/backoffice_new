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
<div class="col-md-12"><h3 class="mrg-btm">FBA Business Report</h3></div>
   <div class="col-md-12">
      <div class="overflow-scroll">
 <br/>
<br/>
    <div class="table-responsive" id="divcrmtable" >	
      <table class='datatable-responsive table table-striped table-bordered dt-responsive nowrap' id='tblbusiness'>
        <thead>
          <tr>
            <th>EntryNo</th>
            <th>Region</th>
            <th>BusinessLockAt</th>
            <th>InsCompany</th>
            <th>ProductName</th>
            <th>PolicyCategory</th>
            <th>ODPremium</th>
            <th>Premium</th>
            <th>AddOnPremium</th>
            <th>Source</th>
            <th>DSAName</th>
            <th>NextStage</th>
            <th>BusinessGroup</th>
            <th>ClientType</th>
            <th>Model</th>
            <th>EntryDate</th>
            <th>NoClaimBonus</th>            
          </tr>
        </thead>
        <tbody> 
          @foreach($data as $val)
          <tr>
            <td>{{$val->EntryNo}}</td>
            <td>{{$val->Region}}</td>
            <td>{{$val->BusinessLockAt}}</td>
            <td>{{$val->InsCompany}}</td>
            <td>{{$val->ProductName}}</td>
            <td>{{$val->PolicyCategory}}</td>
            <td>{{$val->ODPremium}}</td>
            <td>{{$val->Premium}}</td>
            <td>{{$val->AddOnPremium}}</td>
            <td>{{$val->Source}}</td>
            <td>{{$val->DSAName}}</td>
            <td>{{$val->NextStage}}</td>
            <td>{{$val->BusinessGroup}}</td>
            <td>{{$val->ClientType}}</td>
            <td>{{$val->Model}}</td>
            <td>{{$val->EntryDate}}</td>
            <td>{{$val->NoClaimBonus}}</td>
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
   $("#tblbusiness").DataTable();
});
</script>
@endsection