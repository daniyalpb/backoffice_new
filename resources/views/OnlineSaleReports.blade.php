@extends('include.master')
@section('content')
<div class="container-fluid white-bg">
	<div class="col-md-12"><h3 class="mrg-btm">Online Sale Entry</h3></div>
	<br>
	<br>

	<form id="addonlinesalereport" name="addonlinesalereport" method="post" action="{{url('save-online-sale-report')}}">
		{{csrf_field()}}
		@if (Session::has('message1'))
		<div class="alert alert-info alert">{{ Session::get('message1') }}</div>
		@endif

		<div class="row">
			<div class="form-group col-md-3">
			</div>
			<div class="form-group col-md-6">
				<div class="col-md-2">
					<label>Sale Date :</label>
				</div>
				<div class="col-md-10">
					<input type="date" class="text-primary form-control" name="saledate" id="saledate" required="true" max=<?php echo date('Y-m-d');?> value='<?php echo date('Y-m-d');?>'>
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
					<label>CRN No :</label>
				</div>
				<div class="col-md-10">
					<input type="text" class="text-primary form-control" name="crnno" id="crnno" required="true" onfocusout="checkcrn()" value="">
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
					<label>CS No :</label>
				</div>
				<div class="col-md-10">
					<input type="text" class="text-primary form-control" name="csno" id="csno" value="" onfocusout="checkcsno()">
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
					<label>Product :</label>
				</div>
				<div class="col-md-10">
					<select type="text" class="text-primary form-control" name="product" id="product" required="true">
						<option value="" selected disabled="true">-- Select Product --</option>
						@foreach($getproduct as $val)
						<option value="{{ $val->Product_Id }}">{{ $val->Product_Name }}</option>
						@endforeach
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
					<label>FBA ID :</label>
				</div>
				<div class="col-md-10">
					<select type="text" class="text-primary form-control" name="fbaid" id="fbaid" required="true">
						<option value="" selected disabled="true">-- Select FBAID --</option>
						@foreach($getfba as $v)
						<option value="{{ $v->fba_id }}">{{ $v->fname }}</option>
						@endforeach
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
					<label>Policy Status :</label>
				</div>
				<div class="col-md-10">
					<label class="radio-inline">
						<input type="radio" name="pstatus" id="pstatus" value="Yes" onclick="addticketno()" checked>Yes
					</label>
					<label class="radio-inline">
						<input type="radio" name="pstatus" id="pstatus" onclick="addticket()" value="No">No
					</label>
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
					<label>Ticket No :</label>
				</div>
				<div class="col-md-8">
					<input type="number" class="text-primary form-control" name="ticketno" id="ticketno" required="true" disabled="true">
				</div>
				<div class="form-group col-md-2">
					<a href="{{url('RaiseaTicket')}}" target="_blank"><input type="button" name="add_ticket" id="add_ticket" value="Add Ticket" class="btn btn-info" disabled="true"></a>
				</div>
			</div>
			<div class="form-group col-md-3">
			</div>
		</div>

	<!-- <div class="row">
		<div class="form-group col-md-3">
		</div>
			<div class="form-group col-md-6">
				<div class="col-md-2">
					<label>Ticket Status :</label>
				</div>
				<div class="col-md-10">
					<input type="text" class="text-primary form-control" name="ticketstatus" id="ticketstatus" required="true">
				</div>
			</div>
		<div class="form-group col-md-3">
		</div>
	</div> -->

	<div class="row">
		<div class="form-group col-md-8">
		</div>
		<div class="form-group col-md-1">
			<input type="submit" name="save_sale" id="save_sale" value="Submit" class="btn btn-success" disabled="true">
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

	function addticket(){
		$("#ticketno").removeAttr("disabled");
		$("#add_ticket").removeAttr("disabled");
	}

	function addticketno(){
		$('#ticketno').val('');
		$("#ticketno").attr("disabled", "disabled"); 
		$("#add_ticket").attr("disabled", "disabled"); 
	}

	function checkcrn(){
		var crnno = $('#crnno').val();
		$.ajax({
			url:'check-crn-online-sales-reports/{crnno}',
			type:'get',
			data:{crnno:crnno},
			success:function(chekcrn){
				if(chekcrn[0].id == '1'){
					alert(chekcrn[0].Message);
					$('#crnno').val("");
				}
			}
		})
	}

	function checkcsno(){
		var csno = $('#csno').val();
		$.ajax({
			url:'check-cs-online-sales-reports/{csno}',
			type:'get',
			data:{csno:csno},
			success:function(chekcs){
				if(chekcs[0].id == '1'){
					alert(chekcs[0].Message);
					$('#csno').val("");
				}else{
					$("#save_sale").removeAttr('disabled');
				}
			}
		})
	}
</script>
</div>
@endsection