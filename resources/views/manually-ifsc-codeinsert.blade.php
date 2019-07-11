@extends('include.master')
@section('content')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <p class="alert alert-success">{{ Session::get('message') }}</p>
</div>
@endif
<style type="text/css">

  h3.mrg-btm {
    font-style: italic;
  }

</style>
<div class="col-md-12"><h3 class="mrg-btm">Manual Bank Details Entry Form </h3>
<!--  <input type="button" class="btn pull-right" value="X" onclick="self.close()"></h3>
-->  
<form id="addifscform" name="addifscform" method="POST" action="{{url('insert-ifsc-code')}}"> 

  {{ csrf_field() }}
  <hr>
</div>
<table class="datatable-responsive table table-striped table-bordered nowrap" id="example">
  <tr>
    <th><h4>Select City</h4></th>
    <th><h4>Select Bank</h4></th>
    <th><h4>IFSC</h4></th>
    <th><h4>MICR Code</h4></th>
    <th><h4>Bank Branch</h4></th>
  </tr>

  <td style="width: 100px;">
    <div align="right">
      <a id="manuallyadd" data-toggle="modal" data-target="#appsourcemodel"><span class="glyphicon glyphicon-plus" title="Add City"></span></a>
    </div>

    <select class="form-control select-sty" name="City" id="City">
      <option value="">--Select City--</option>
      @foreach($ifsc as $val)
      <option value="{{$val->CityID}}">{{$val->CityName}}</option>
      @endforeach
    </select>
    <input type="hidden" name="hidden_state_name" id="hidden_state_name" readonly="readonly">
  </td>

  <td style="width: 100px;">
    

    <select required class="form-control select-sty" name="Bank" id="Bank">
      <option value="">--Select Bank--</option>
      @foreach($city as $val)

      <option value="{{$val->BankID}}">{{$val->BankName}}</option>
      <!--  <input type="text" name="hiddenbank_id" name="hiddenbank_id" value="{{$val->BankID}}"> -->
      @endforeach
      
    </select>

  </td>

  <td style="width: 100px;">
   <input type="text" class="text-primary form-control" name="ifsccode" id="ifsccode" required="required"  placeholder="Add IFSC Code Manually"></td>

   <td style="width: 100px;">
    <input type="text" class="text-primary form-control" name="microde" id="microde"  placeholder="Add MICR Code Manually">
  </td>
  
  <td style="width: 100px;">
    <input type="text" class="text-primary form-control" name="bankbranch" id="bankbranch" placeholder="Add Branch Manually">
  </td>
  
</div>
</tr>
</table>

<div align=center colspan=4><input type="Submit" name="statussub" id="statussub" value="submit" class="btn btn-success">
</div>
</form>

<!-- Add City Model Start -->
<div class="modal" id="appsourcemodel">
  <div class="modal-dialog">
    <div class="modal-content">      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add City</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>        
      <!-- Modal body -->
      <div class="modal-body">
        <form id="manuallypincodefrom" name="manuallypincodefrom" method="post" action="{{url('insert-ifsc-code')}}">
          {{ csrf_field() }}
          <label>Add City:</label>
          <input type="text" class="text-primary form-control" name="addcity" id="addcity" required="required" placeholder="Add City Manually">
        </div>
        <input type="hidden" name="manuallyadd" id="manuallyadd1" readonly="readonly">
        <!-- Modal footer -->
        <div class="modal-footer">
         <input type="Submit" name="btn_manual" id="btn_manual" value="submit" class="btn btn-success"> 
       </form>
       <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
     </div>
   </div>
 </div>
</div>
</div>
<!-- 
<script type="text/javascript">
   function get_bank_id(BankID){
    //alert(BankID);
    $("#hiddenbank_id").val(BankID);
    
  }

</script> -->
<script type="text/javascript">
  
  $('#manuallyadd').click(function(){
    
   $('#manuallyadd1').val(1);
   
 });
</script>
<script type="text/javascript">
  
 $('#addcity').keyup(function(){    
   var yourInput = $(this).val();
   re = /[1-91-1]?[1-91-1`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi;
   var isSplChar = re.test(yourInput);
   if(isSplChar)
   {
    var no_spl_char = yourInput.replace(/[1-91-1]?[1-91-1`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
    $(this).val(no_spl_char);
  }
});
</script>


@endsection
