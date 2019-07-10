@extends('include.master')
@section('content')
<head>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
</head>
<div class="container-fluid white-bg">
 <div class="col-md-12"><h3 class="mrg-btm">Payment Hisory New</h3></div>
<div class="col-md-12">
  <div class="col-md-4"></div>
  <div class="col-md-4"> 
   @foreach($data as $val)
 <h3>Payment History Upto</h3><h4 class="mrg-btm">{{$val->updateddate}}</h4> 
 @endforeach
 </div>
 <div class="col-md-4"></div>
</div>
 <div class="col-md-12">  
  <div class="overflow-scroll">
    <div class="table-responsive" >
      <table class="datatable-responsive table table-striped table-bordered nowrap" id="tblpaymenthistory">
       <thead>
        <tr>
          <th>id</th>
          <th>Amount</th>
          <th>City</th>
          <th>CustId</th>
          <th>FBAID</th>
          <th>CustName</th>
          <th>Email</th>
          <th>InvoStatus</th>
          <th>Mobile</th>
          <th>PaymDate</th>
          <th>PaymRefNo</th>
          <th>PaymStatus</th>
          <th>PaymType</th>
          <th>ProdName</th>
          <th>SalesID</th>
          <th>SalesName</th>
          <th>State</th>
          <th>RecruiteruId</th>
        </tr>
      </thead>
      <tbody>         
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
<script type="text/javascript"> 
  $(document).ready(function() {
    $('#tblpaymenthistory').DataTable({
     "ajax": "{{ URL::to('paymenthistorydb')}}",
     "columns": [       
     {"data": "id"},
     {"data": "Amount"},            
     {"data":"City" },
     { "data": "CustId"},  
     {"data":"FBAID"},
     {"data":"CustName"},
     {"data":"Email"},
     {"data":"InvoStatus"},
     {"data":"Mobile"},
     {"data":"PaymDate"},
     {"data":"PaymRefNo"},
     {"data":"PaymStatus"},
     {"data":"PaymType"},
     {"data":"ProdName"},
     {"data":"SalesID"},
     {"data":"SalesName"},
     {"data":"State"},
     {"data":"RecruiteruId"},
     ]     
   });    
  });
</script>
@endsection
