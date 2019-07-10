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
	                 		<th>Lead Id</th>
							<th>Phone No</th>
							<th>Name</th>
							<th>Location</th>
							<th>Cust Id</th>
							<th>Campaign Name</th>
							<th>Assing To Uid</th>
							<th>Fba Converted Id</th>
							<th>Created Date</th>
							<th>Converted Date</th>
							<th>Priority</th>
							<th>Status</th>
							<th>Call Send</th>
							<th>City</th>
							<th>State</th>
							<th>Zone</th>
							<th>PL Available</th>
							<th>Language Skill Required</th>
							<th>Created By</th>
	              		</tr>
	          		</thead>
		       		<tbody>
		       		@foreach($getallleaddata as $val)	
		       			<tr>
			       			<td><button type="button" class="btn btn-link" onclick="getleaddetails({{$val->lead_id}})">{{ $val->lead_id }}</button></td>
							<td>{{ $val->phone_no }}</td>
							<td>{{ $val->name }}</td>
							<td>{{ $val->location }}</td>
							<td>{{ $val->cust_id }}</td>
							<td>{{ $val->campaignname }}</td>
							<td>{{ $val->assing_to_uid }}</td>
							<td>{{ $val->fba_converted_id }}</td>
							<td>{{ $val->created_date }}</td>
							<td>{{ $val->converted_date }}</td>
							<td>{{ $val->priority }}</td>
							<td>{{ $val->status }}</td>
							<td>{{ $val->callsend }}</td>
							<td>{{ $val->City }}</td>
							<td>{{ $val->State }}</td>
							<td>{{ $val->Zone }}</td>
							<td>{{ $val->PL_Available }}</td>
							<td>{{ $val->Language_Skill_Required }}</td>
							<td>{{ $val->Created_by }}</td>
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

<script type="text/javascript">
	function getleaddetails(leadid){
		$('#dispo').html('');
		$('#rema').html('');
		$('#datetime').html('');
		$.ajax({
			type:'GET',
			url:"{{URL::to('get-lead-details/leadid')}}",
			dataType: 'JSON',
			data:{leadid:leadid},
			success: function(data){
				if(data != '' && data != null){
					 $('#myModal').modal('show');
					 $('#dispo').append(data[0].disposition);
					 $('#rema').append(data[0].remark);
					 $('#datetime').append(data[0].created_date);
				}else{
					alert("Details Does Not Found!");
				}	
			}
		});
	}
</script>

 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title">Lead Details</h4></center>
        </div>
        <div class="modal-body">
          <label><b><u>Disposition</u> : </b></label>&nbsp&nbsp<label id="dispo"></label><br><br>
          <label><b><u>Remark</u> : </b></label>&nbsp&nbsp<label id="rema"></label><br><br>
          <label><b><u>Date Time</u> : </b></label>&nbsp&nbsp<label id="datetime"></label>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->

 @endsection

