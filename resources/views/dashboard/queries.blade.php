@extends('include.master')
@section('content')

<style>
.qry-btn1 {
    border-radius: 10px;
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    display: inline-block;
    margin-bottom: 5px !important;
    font-weight: normal;
    text-transform: uppercase;
    font-size: 12px !important;
    padding: 7px 16px;
    background: #337ab7;
    color: #d1e2f1;
}
.error_class{
  color : red;
}
</style>

       <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">Queries</h3></div>
<div id="myDIV">
  <a href="{{url('queries')}}?queries=1" class="qry-btn" id="pospbtn">POSP Transaction</a>
  <a href="{{url('queries')}}?queries=2"  class="qry-btn">Not POSP</a>
  <a href="{{url('queries')}}?queries=3" class="qry-btn">Policy Sold</a>
  <a href="{{url('queries')}}?queries=4" class="qry-btn">FBA Never Logged In</a>
  <a href="{{url('queries')}}?queries=5" class="qry-btn">Inactive POSP </a>
  <a href="{{url('queries')}}?queries=6" class="qry-btn">POSP Without POSP No</a>
  <a href="{{url('queries')}}?queries=7" class="qry-btn">POSP Without Payment</a>
  <a data-toggle="modal" data-target="#daily_transaction_nodal"  class="qry-btn1">Daily Transactions</a>
  <a href="{{url('queries')}}?queries=9"  class="qry-btn">Not Posp but sold policy</a>
</div>

<br>
 <div id="export_id"></div>
<br>

 
   <div class="col-md-12">
       <div class="overflow-scroll">
       <div class="table-responsive" >
<div id="divinfo">
  <table style="float: right;">
  <tr>
  <td style="padding:0 15px 0 15px;">
  <p style="color: #3379b7"><strong>Q = Quote</strong></p>
  </td>
  <td style="padding:0 15px 0 15px;">
  <p style="color: #3379b7"><strong>MS = Mail send</strong></p>
  </td>
  <td style="padding:0 15px 0 15px;">
  <p style="color: #3379b7"><strong> PS = Payment successful</strong></p>
  </td>
  </tr>
  </table>
</div>
<br>


        <table id="example" class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" >
                 <thead >
                 <tr class="thead_cl">

                 </tr>

                </thead>
                <tbody>
                @foreach($query as $val)
              <tr>
                @if($status==3 or $status==9 )
                <td> {{$val->created_date}}</td>
                <td> {{$val->FBAId}}</td>
                <td> {{$val->FBAName}}</td>
                <td> {{$val->Mobile}}</td>
                <td> {{$val->Email}}</td>
                @else
               <td> {{$val->FBAId}}</td>
               <td> {{$val->FBAName}}</td>
               <td> {{$val->Mobile}}</td>
               <td> {{$val->Email}}</td>
                @endif

                @if($status==1)                
                <td>{{$val->City}}</td> 
                <td>{{$val->Life}}</td>  

            <!--     @if($val->HEALTH[2]!=0)
                <td>    
                <a href="queries-health/{{$val->FBAId}}?{{explode(' ',$val->HEALTH)[0]}}" target="_blank" > {{explode(' ',$val->HEALTH)[0]}}</a>
                <a href="queries-health/{{$val->FBAId}}?{{explode(' ',$val->HEALTH)[1]}}" target="_blank" > {{explode(' ',$val->HEALTH)[1]}}</a>
                <a href="queries-health/{{$val->FBAId}}?{{explode(' ',$val->HEALTH)[2]}}" target="_blank" > {{explode(' ',$val->HEALTH)[2]}}</a>
                 </td>                 
                @else
                <td>{{$val->HEALTH}}</td>
                @endif -->
                
                @if($val->MOTOR[2]!=0)
                <td>
                <a href="queries-motor/{{$val->FBAId}}?{{explode(' ',$val->MOTOR)[0]}}" target="_blank" > {{explode(' ',$val->MOTOR)[0]}}</a>
                <a href="queries-motor/{{$val->FBAId}}?{{explode(' ',$val->MOTOR)[1]}}" target="_blank" > {{explode(' ',$val->MOTOR)[1]}}</a>
                <a href="queries-motor/{{$val->FBAId}}?{{explode(' ',$val->MOTOR)[2]}}" target="_blank" > {{explode(' ',$val->MOTOR)[2]}}</a>
                @else
                <td>{{$val->MOTOR}}</td>
                @endif
               <td> {{$val->HOME_LOAN}}</td>
               <td> {{$val->PL}}</td>
                 @if($val->TWO_WHEELER[2]!=0)
                <td>  
                <a href="queries-two-wheeler/{{$val->FBAId}}?{{explode(' ',$val->TWO_WHEELER)[0]}}" target="_blank" > {{explode(' ',$val->TWO_WHEELER)[0]}}</a>
                <a href="queries-two-wheeler/{{$val->FBAId}}?{{explode(' ',$val->TWO_WHEELER)[1]}}" target="_blank" > {{explode(' ',$val->TWO_WHEELER)[1]}}</a>
                <a href="queries-two-wheeler/{{$val->FBAId}}?{{explode(' ',$val->TWO_WHEELER)[2]}}" target="_blank" > {{explode(' ',$val->TWO_WHEELER)[2]}}</a>
                @else
                <td>{{$val->TWO_WHEELER}}</td>                
                @endif

               @elseif($status==2)
               <td> {{$val->City}}</td>
               <!-- <td> {{$val->HEALTH}}</td> -->
               <td> {{$val->MOTOR}}</td>
               <td> {{$val->HOME_LOAN}}</td>
               <td> {{$val->PL}}</td>
               <td> {{$val->TWO_WHEELER}}</td>
                
               @elseif($status==3 or $status==9)
               <td> {{$val->City}}</td>
               <td> {{$val->pcount}}</td>
               <td> {{$val->TName}}</td>
               @elseif($status==4)
               <td> {{$val->City}}</td>
                <td> {{$val->CreaOn}}</td>
               @elseif($status==5)
               <td> {{$val->City}}</td>
                 <td> {{$val->created_date}}</td>
                  <!-- <td> {{$val->HEALTH}}</td> -->
               <td> {{$val->MOTOR}}</td>
               
               <td> {{$val->TWO_WHEELER}}</td>
               @elseif($status==6)

               <td> {{$val->Created_Date}}</td>
                <td>{{$val->PospName}}</td>
               @elseif($status==7)
               <td> {{$val->City}}</td>
                 <td> {{$val->Created_Date}}</td>
                <td> {{$val->POSPName}}</td>
               @elseif($status==8)
               <td> {{$val->City}}</td>
              <!--  <td> {{$val->HEALTH}}</td> -->
               <td> {{$val->MOTOR}}</td>                           
               <td> {{$val->HOME_LOAN}}</td>                           
               <td> {{$val->TWO_WHEELER}}</td>
               <td>{{$val->Life}}</td>
               <td>{{$val->PL}}</td> 
               <td>{{$val->RRM_Name}}</td>   
               <td>{{$val->Date}}</td>   
               <td>{{$val->Source_name}}</td>   
               @else  
               <td> not found</td>
                 <?php  break; ?>
               @endif



              </tr>
              @endforeach

                 </tbody>
      </table>
      </div>
      </div>
      </div>
      </div>


{{-- DAILY TRANSACTION SELECT DATE MODAL WINDOW --}}
<div class="salesupdate modal fade" role="dialog" id="daily_transaction_nodal">   
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"  >
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Daily Transactions</h4>
      </div>
      <div class="modal-body">
        <form name="form_daily_transactions" id="form_daily_transactions">
         {{ csrf_field() }}

      <div class="form-group">
       <p>Select Date</p>
       <div id="pm_datepicker" class="input-group date" data-date-format="yyyy-mm-dd">
          <input class="form-control date-range-filter" type="text" readonly="readonly" placeholder="Select Date" name="daily_trans_date" id="daily_trans_date"/>
          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
       </div>
       <div><span class='error_class' id='err_daily_trans_date'></span></div>
      </div>


      <div class="form-group">
       <p>Select Source</p>
       <select class='form-control' name='app_source' id='app_source'>
        <option value=''>Select Source</option>
        @foreach($app_source_master as $val)
          <option value='{{ $val -> ID }}'>{{ $val -> Source_name }}</option>
        @endforeach
       </select>
      </div>

        </form>
        <div class="modal-footer"> 
          <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="button" id='btn_submit_daily_transactions'>Submit</button>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- DAILY TRANSACTION SELECT DATE MODAL WINDOW --}}


<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{ url('javascripts/bootstrap-datepicker.js') }}"></script>

<script type="text/javascript">
  $("#btn_submit_daily_transactions").on('click',function(){

    if($("#daily_trans_date").val() == '' || $("#daily_trans_date").val() == null){
      $("#err_daily_trans_date").text('Please Select Date');
      return false;
    }else{
      window.location.href = '{{ url('queries?queries=8') }}&daily_trans_date=' + $("#daily_trans_date").val() + '&app_source=' + $("#app_source").val();
    }
  });


  $("#pm_datepicker").datepicker({ 
    autoclose: true, 
    todayHighlight: true,
    endDate: new Date(),
  }).datepicker("getDate");

</script>
    
  <script>
// Add active class to the current button (highlight it)
var header = document.getElementById("myDIV");
var btns = header.getElementsByClassName("qry-btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}


</script>
 @endsection