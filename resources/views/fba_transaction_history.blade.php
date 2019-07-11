@extends('include.master')
@section('content')
<head>
 <style type="text/css">
 .stretch-card {
    margin-bottom: 25px !important;
    transition: transform .2s;
}

  /* Style the counter cards */
  .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    padding: 16px;
    text-align: center;
    background-color: #ffe6e6;
  }
</style>
</head>
<div  class="container-fluid">
 <div class="col-md-12"><h3 class="mrg-btm">FBA Transaction History</h3></div>
 <div class="col-md-12">
   <div class="overflow-scroll">
    @isset($Response)    
    @foreach($Response as $val)
    <div class="col-xl-3 col-lg-3 col-md-8 col-sm-6 grid-margin stretch-card">
      <div class="card card-statistics">
        <div  class="card-body">
          <div class="clearfix">
            <div class="float-right">
             <p>Entry No : {{$val->EntryNo}}</p> 
             <p>Ins Company : {{$val->InsCompany}}</p>
             <p>Product Name : {{$val->ProductName}}</p>
             <p>OD Premium : {{$val->ODPremium}}</p>
             <p>Premium : {{$val->Premium}}</p>
             <p>Add On Premium : {{$val->AddOnPremium}}</p>
             <p>Entry Date : {{$val->EntryDate}}</p>
             <p>QT.No : {{$val->QT_No}}</p>
             <p>Total.OD : {{$val->Total_OD}}</p>
             <p>POSP ID : {{$val->POSP_ID}}</p>
             <p>CS.No : {{$val->CSNo}}</p>
           </div>
         </div>
       </div>
     </div>
   </div>

 @endforeach   
 @endisset 
</div> 
</div>
</div>
@endsection