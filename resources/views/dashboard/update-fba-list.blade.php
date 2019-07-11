@extends('include.master')
@section('content')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <p class="alert alert-success">{{ Session::get('message') }}</p>
</div>
@endif
<style type="text/css">

  .hide {
    display:  none;}
  }
</style>
<div class="container-fluid white-bg">
 <div class="col-md-12"><h3 class="mrg-btm">Update FBA Details
  <input type="button" class="btn pull-right" value="X" onclick="self.close()"></h3>
  <hr>      
</div> 
<div class="col-md-2">
  <div class="form-group">
    <form name="myform">
     <input type="text" class="form-control" id="txtfbasearch"  name="txtfbasearch" placeholder="Search" onkeyup="searchdata()" style="display:none; display:margin-top:2px; width:26%;margin-right: 70px;float:right;"/>
   </form>
 </div> 
</div>
<!-- Date End -->
<div class="col-md-12">
  <div class="overflow-scroll">
    <table id="fba-list-table" class="table" style="border:1px solid #8cc9e2" width="100%">
     <thead>
       <tr>
         <th>FBA ID</th> 
         <th>Full Name</th> 
         <th>Email ID</th>
         <th>Alternate Mobile</th>
         <th>Payment Link</th>
         
       </tr>
     </thead>
     <tbody> 
       <tr>
         <td>{{$data->fbaid}}</td>
         <td>{{$data->FullName}}</td>
         <td>{{$data->EMaiID}}</td>
         <td>
          @if($data->MobiNumb2=='')

  <a href="" data-toggle="modal"  data-target="#mobilenotwo" onclick="get_alternat_mobi_fbid('{{$data->fbaid}}')" >Update Alternate Mobile</a>
 @else
 <a href="" data-toggle="modal"  data-target="#mobilenotwo" onclick="get_alternat_mobi_fbid('{{$data->fbaid}}','{{$data->MobiNumb2}}')">{{$data->MobiNumb2}}</a>
 @endif
 </td>

         <td> @if($data->PayStat=="S")

           <span class="glyphicon glyphicon-blank"></span> 
           @else                    
           <a onclick="getpaymentlink({{$data->fbaid}},{{$data->MobiNumb1}})" id="btnviewhistory" data-toggle="modal" data-target="#paylink_payment" onclick="getpaylinknew('{{$data->fbaid}}','{{$data->MobiNumb1}}')">Payment link</a>
           @endif
           <!--   <span class="glyphicon glyphicon-envelope"></span> -->
         </td>

      
       </tr>

       <tr>
       <th>Password</th>
        <th>Pincode</th>
        <th>POSP No(SSID)</th>
        <th>Loan ID</th>
        <th>Posp Status</th> 
          
      </tr>
      <tr>
         <td><a id="btnshowpassword" data-toggle="modal" data-target="#spassword" onclick="getpassword('{{$data->pwd}}')">*****</a>
        </td>
         <td>{{$data->Pincode}}</td>
      <td>
         @if($data->POSPNo=='')
         <a id="posp_{{$data->fbaid}}" class="checkPosp" data-toggle="modal" data-target="#updatePosp" onclick="updateposp('{{$data->fbaid}}')">update</a>
         @else
         <span id="posp_{{$data->fbaid}}" class="checkPosp" href="#" >{{$data->POSPNo}}</span>
         @endif
      </td> 
       <!-- <td><a id="btnviewid {{$data->fbaid}}" onclick="getloanid(this,'{{$data->fbaid}}')">Update</a></td>  -->
       <td>
        @if($data->LoanID=='')
        <a id="btnviewid{{$data->fbaid}}" onclick="getloanid(this,'{{$data->fbaid}}')">Update</a>
        @else
        <span id="btnviewid{{$data->fbaid}}">{{$data->LoanID}}</span>
        @endif
      </td>
      <td>{{$data->pospstatus}}</td>  
        
    </tr>
    <tr>
    <th>Bank Account</th>
      <th>Partner Info</th> 
      <th>Referer Code</th>
      <th>Referedby Code</th>   
      <th>Sales code</th>
      
    </tr>
    <tr>
    <td>{{$data->bankaccount}}</td>
           <td><a href="" data-toggle="modal" data-target="#partnerInfo"onclick="getpartnerinfo('{{$data->fbaid}}')">partner info</a>
        <td>{{$data->Refcode}}</td> 

   <td>@if($data->Refbycode=='')
        <a href="" data-toggle="modal" data-target="#referer_code_update"onclick="Gettype2('{{$data->fbaid}}',this)">Update Ref.Code</a>
            @else
        <span id="btnviewcid{{$data->fbaid}}">{{$data->Refbycode}}</span>
        @endif
   </td>
     <td>
         @if($data->salescode=='' || $data->salescode=='Update')
         <a id="update_{{$data->fbaid}}" onclick="sales_update_fn('{{$data->fbaid}}'),('{{$data->fbaid}}')">Update</a>
         @else
         <a id="update_{{$data->fbaid}}" onclick="sales_update_fn('{{$data->fbaid}}',{{$data->salescode}})">  {{$data->salescode}}</a>
         @endif
    </td>
  
      </tr>  
      <tr>

        <th>FSM Details</th> 
       <th>Customer ID</th> 
      <th>Type</th> 
      <th>Erp Id</th>    
      <th>AppSource</th> 
     
      </tr>  
      <tr>

          <td>
        <a href="#" style="" data-toggle="modal" data-target=".fsmdetails">Fsm details</a>
    </td>
      <td>
        @if($data->CustID=='')
        <a id="btnviewcid{{$data->fbaid}}" onclick="getcustomerid(this,'{{$data->fbaid}}')">Update</a>
        @else
        <span id="btnviewcid{{$data->fbaid}}">{{$data->CustID}}</span>
        @endif
      </td>
      
       <td>
       @if($data->Type=='')
       <span id="bind_updated_type_{{$data->fbaid}}"><a id="type{{$data->fbaid}}" data-toggle="modal" onclick="Gettype('{{$data->fbaid}}',this)" data-target="#myModal">Update</a><span id="bind_updated_type_{{$data->fbaid}}"></span>  
       @else
       <span id="type{{$data->fbaid}}">{{$data->Type}}</span>
       @endif
     </td> 
     <td>{{$data->erpid}}</td>

      <td>
       <a href="" style="" data-toggle="modal"  data-target="#appsourcemodel" onclick="Gettype('{{$data->fbaid}}','{{$data->AppSource}}')">{{$data->AppSource}}</a>
     </td>

    </tr>
    <tr>
<!--      <td>    
     @if($data->AppSource=='AppSource')
  <a id="type{{$data->fbaid}}" data-toggle="modal" onclick="Gettype('{{$data->fbaid}}',this)" data-target="#appsourcemodel">{{$data->AppSource}}</a>
  @else
  <a id="type{{$data->fbaid}}" data-toggle="modal" onclick="Gettype('{{$data->fbaid}}',this)" data-target="#appsourcemodel">{{$data->AppSource}}</a>
    @endif
  </td> -->
  
</tr>
<tr>
 <th>State</th>
  <th>Zone</th>
  <th>RRM Name</th> 
  <th>Field sales</th>
  <th>Upload Payment GRID</th>
</tr>

<tr>
<td>{{$data->statename}}</td>
 <td>{{$data->zone}} </td>
 <td>{{$data->RRM}}</td>
 <td>{{$data->Field_Manger}}</td>
 
  <td> @if($data->isdocupload=='Uploaded')
   <a href="" style="" data-toggle="modal" data-target="#docviwer" onclick="docview('{{$data->fbaid}}')">uploaded</a>
   @else
   <a data-target="#docviwer"{{$data->fbaid}}">Pending</a>      
   @endif
 </td>
</tr>

<tr>
  <th>Document</th>
  <th>FBA Status</th> 
  <th>View SMS</th>
  <th>Transaction History</th>
  <th></th>
</tr>

<tr>
  <td>
      <a onclick="uploadpaymentgrid('{{$data->fbaid}}',this)">View/Upload</a>
  </td>
 <td>
    <a href="" style="" data-toggle="modal"  data-target="#activefbamodel" onclick="Gettype('{{$data->fbaid}}','{{$data->isactive}}')">{{$data->isactive}}</a>
 </td>

 <td>
    @if($data->POSPNo=='')
   <span></span> 
   @else
   <a href="http://d3j57uxn247eva.cloudfront.net/Health_Web/sms_list.html?ss_id={{$data->POSPNo}}&fba_id={{$data->fbaid}}" target="_blank">View All SMS</a>
   @endif
 </td>  

 <td>
    <a href="{{url('fba-transection-history')}}/{{$data->fbaid}}" target="_blank">Transaction History</a> 
 </td>
  <td></td>
</tr>


</tbody>
</table>
<br>
<h3>Sub FBA Details</h3>
<hr/>
<br>
<div>
  <table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="tblsubfba">
    <thead>
      <tr>
        <th>FBAID</th>
        <th>FBA Name</th>
        <th>Mobile No</th>
        <th>Email</th>      
      </tr>
    </thead>
    <tbody>
      @foreach($subfba as $val)
      <tr>
        <td>{{$val->FBAID}}</td>
        <td>{{$val->FullName}}</td>
        <td>{{$val->MobiNumb1}}</td>
        <td>{{$val->EmailID}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<br>
<h3>FBA Call Log Details</h3>
<hr/>
<br>
<div id="divfbacalllogs">
  <table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="tblfbacalllogs">
    <thead>
      <tr>
        <th>History Id</th>
        <th>Remark</th>
        <th>Created Date</th>
        <th>Followup Date</th>             
        <th>Employee Name</th>
        <th>Profile</th>
        <th>call Duration</th>   
        <th>Source</th> 
      </tr>
    </thead>
    <tbody>
      @foreach($calllogs as $val)
      <tr>
        <td>{{$val->history_id}}</td>
        <td><textarea readonly>{{$val->remark}}</textarea></td>
        <td>{{$val->create_at}}</td>
        <td>{{$val->followup_date}}</td>        
        <td>{{$val->EmployeeName}}</td>
        <td>{{$val->Profile}}</td>
        <td>{{$val->callDuration}}</td>
        @if($val->source!='app')
        <td>WEB</td>
        @else
        <td>{{$val->source}}</td>
        @endif
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<br>
<h3>Last Business Done By FBA</h3>
<div class="col-md-2">
  <div class="form-group"> 
   <label>From Date</label>
   <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
     <input class="form-control " type="text" placeholder="From Date" name="txtfromdate" id="txtfromdate" readonly>
     <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
   </div>
 </div>
</div>
<div class="col-md-2">
  <div class="form-group">
    <label>To Date</label>
    <div id="datepicker1" class="input-group date" data-date-format="mm-dd-yyyy">
     <input class="form-control " type="text" placeholder="To Date"  name="txttodate"  id="txttodate" readonly >
     <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
   </div>
 </div>
</div>
<a class="btn btn-primary" style="margin-top: 25px;" id="btnshowbusiness" onclick="passvalue()">See Detail Business</a>
<br>
<hr/>
<br>
<div id="divBusiness">
  <table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" id="tblfbaBusiness">
    <thead>
      <tr>
        <th>Entry No</th>
        <th>Entry Date</th>
        <th>Ins Company</th>
        <th>Product Name</th>             
        <th>Policy Category</th>
        <th>POSP Source</th>
        <th>Premium</th>         
      </tr>
    </thead>
    <tbody>
      @foreach($lastbuss as $val)
      <tr>
        <td>{{$val->EntryNo}}</td>
        <td>{{$val->EntryDate}}</td>
        <td>{{$val->InsCompany}}</td>
        <td>{{$val->ProductName}}</td>        
        <td>{{$val->PolicyCategory}}</td>
        <td>{{$val->POSPSource}}</td>
        <td>{{$val->Premium}}</td>        
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<br>
<h3>Profile Update</h3>
<hr/>
<br>
<div class="table-responsive col-md-12">
  <table class="table table-striped table-bordered" id="profileupdate">
    <thead>
      <tr>
        <th>RRM</th>
        <th>Recruiter</th>
        <th>Training</th>
        <th>Field Sales</th>
        <th>Cluster Head</th> 
        <th>State Head</th> 
        <th>Zonal Head</th>
        <th>Action</th>

        
      </tr>
    </thead>

    <tbody>
     @isset($Hierarchy)
     @foreach($Hierarchy as $val)
     <tr>
      <td>{{$val->rrmuid}}</td>
      <td>{{$val->recruiteruid}}</td>
      <td>{{$val->trainingopsuid}}</td>
      <td>{{$val->fieldsalesuid}}</td>
      <td>{{$val->clusterheaduid}}</td>
      <td>{{$val->stateheaduid}}</td>
      <td>{{$val->zonalheaduid}}</td>
      
      @endforeach
      @endisset
      @if(Session::get('usergroup')=='13'||Session::get('usergroup')=='50'||Session::get('usergroup')=='51' )
      <td><a href="#" id="btnupdte" class="qry-btn" style="" data-toggle="modal" data-target=".updateprofile" onclick="Gettype2('{{$data->fbaid}}',this)" name="btnupdte" class="btn btn-default">Update</a></td>
      @endif
      
    </tbody>
  </table>

</div>
</div>
</div>
</div>
<!-- send sms -->
<div class="sms_sent_id id modal fade" role="dialog">   
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">SEND SMS</h4>
      </div>
      <div class="modal-body">
        <form id="message_sms_from" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label class="control-label" for="recipient-name">Mobile Nubmer:</label>
            <input class="form-control Mobile_ID" id="recipient" type="text" name="mobile_no" readonly=""/>
          </div>
          <div class="form-group">
            <label class="control-label" for="message-text">SMS :</label>
            <textarea class="form-controll sms_id" id="message-text" name="sms"></textarea>
          </div>
        </form>
        <div class="modal-footer">
          <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
          <button class="btn btn-primary message_sms_id" type="button">Send</button><b class="alert-success primary" id="strong_id"></b>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- fsm details -->
<div class="fsmdetails modal fade" role="dialog">   
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">FSM Details</h4>
      </div>
      <div class="modal-body">
        <form id="posp_from_id">
          <div class="form-group">
          </div>
          <div class="form-group">
           <label class="control-label" for="message-text">FSM Email Id : </label>
         </div>
         <div class="form-group">
           <label class="control-label" for="message-text">FSM Mobile No : </label>
         </div>
       </form>
       <div class="modal-footer"> 
        <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
<div class="pageloader modal fade" role="dialog" id="pageloader">   
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <form id="posp_from_id">

        </form>
      </div>
    </div>
  </div>
</div>
<!-- sales update -->
<div class="salesupdate modal fade" role="dialog" id="salesupdate_modal_fade">   
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"  >
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Sales Code</h4>
      </div>
      <div class="modal-body">
        <form name="update_remark" id="update_remark">
         {{ csrf_field() }}
         <div class="form-group">
          <input type="hidden" name="p_fbaid" id="p_fbaid" value="">
          <label class="control-label" for="message-text">Enter Sales Code : </label>
          <input type="text" class="recipient-name form-control" id="p_remark" name="p_remark" required="" />
        </div>
      </form>
      <div class="modal-footer"> 
        <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
        <a id="sales_update" class="btn btn-primary" type="button">Update</a><b class="alert-success primary" id=""></b>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Mobile Number 2 model Start -->
<div class="salesupdate modal fade" role="dialog" id="mobilenotwo">   
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"  >
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Alternate Mobile Number</h4>
      </div>
      <div class="modal-body">
        <form name="update_mobile_two" id="update_mobile_two">
         {{ csrf_field() }}
         <div class="form-group">
          <input type="hidden" name="mobile_fbaid" id="mobile_fbaid" value="">
          <label class="control-label" for="message-text">Enter Mobile Number : </label>
          <input type="text" class="recipient-name form-control" id="mobiletwo" name="mobiletwo" required="required" maxlength="10" onkeypress="return isNumber(event)"/>
        </div>
      </form>
       <div class="modal-footer"> 
        <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
        <input type="button" name="mobile2_update" id="mobile2_update" class="btn btn-primary" onclick="update_alternate_mobile(document.getElementById('mobile_fbaid').value)" value="Submit">
      </div>
    </div>
  </div>
</div> 
</div>


<!-- Mobile Number 2 model End -->
<!-- update posp -->
<div class="updatePosp modal fade" role="dialog">   
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">UPDATE POSP</h4>
      </div>
      <div class="modal-body">
        <form name="update_posp" id="update_posp">
         {{ csrf_field() }}
         <div class="form-group">
          <input type="hidden" name="fbaid" id="fbaid" value=" ">
          <label class="control-label" for="message-text">Enter POSP : </label>
          <input type="text" class="recipient-name form-control" id="posp_remark" name="posp_remark" required="" />
        </div>
      </form>
      <div class="modal-footer"> 
        <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
        <a id="posp_update" class="btn btn-primary" type="button">Update</a><b class="alert-success primary" id=""></b>

      </div>
    </div>
  </div>
</div>
</div>

<!-- UPDATE PROFILE START -->
<div class="updateprofile modal fade" role="dialog">   
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Update Profile</h4>
       </div>
      <div class="modal-body" style="height:417px;width: 700;">
        <form id="pupdate">
          {{csrf_field()}}
          <input type="hidden" name="profilehidden" id="profilehidden" value="" readonly>
          <div class="form-group">
          </div>

          <tr>
            <!-- <td style="text-align: center;line-height: 39px;">RRM</td>  -->
            <label style="margin-left:7%;margin-top:0%;">RRM</label>
            <td><select style="width: 36%" name="rrmuid" id="rrmuid" class="text-primary form-control" required="">
              <option value="">--No RRM--</option>
              @foreach($hierarchypr as $val)
              <option {{$val->selected_status}} value="{{$val->UId}}">{{$val->EmployeeName}}</option>
              @endforeach

            </select>
          </td>
        </tr> <br>

        <tr>
          
          <!-- <td id="name" name="namea" style="margin-bottom:10%;">Recruiter</td> -->
          <!-- <td style="margin-left: 20%;">Recruiter</td> -->
          <label style="margin-left:55%;margin-top: -13%;">Recruiter</label>
          <td><select style="width:36%;margin-bottom: 30px;margin-left: 309px;margin-top:-56px;" name="recruiteruid" id="recruiteruid" class="text-primary form-control" required="">
           <option  value="">--NO Recruiter--</option>
           @foreach($recruiter as $val)
           <option {{$val->selected_status}}  value="{{$val->UId}}">{{$val->EmployeeName}}</option>
           @endforeach
         </select>
       </td>

     </tr><br>

     <tr>
       <label style="margin-left:55%;margin-top: -5%;">Training OPS</label>
       <!-- <td style="text-align: right;line-height: 39px;">Training gopsuid</td> -->
       <td><select style="width:36%;margin-left: 309px;margin-top: -5px;"  name="trainingops" id="trainingops" class="text-primary form-control" required="">
        <option value="">--NO Training OPS--</option>
        @foreach($trainingopsuid as $val)
        <option {{$val->selected_status}} value="{{$val->UId}}">{{$val->EmployeeName}}</option>
        @endforeach
      </select>
    </td>
  </tr> <br>
  <tr>
   <label style="margin-left:7%;margin-top: -13%;">Field Sales</label>
   <!-- <td style="text-align: right;line-height: 39px;">Fieldsales Uid</td> -->
   <td><select style="width:36%;margin-top: -56px;" name="fieldsalesuid" id="fieldsalesuid" class="text-primary form-control" required="">
    <option value="">--NO Field Sales--</option>
    @foreach($fieldsalesuid as $val)
    <option {{$val->selected_status}}  value="{{$val->UId}}">{{$val->EmployeeName}}</option>
    @endforeach
  </select>
</td>
</tr> <br>
<tr>
 <label style="margin-left:7%;margin-top: -1%;">Cluster Head</label>
 <!-- <td style="text-align: right;line-height: 39px;">Clusterhead Uid</td> -->
 <td><select style="width:36%"  name="clusterheaduid" id="clusterheaduid" class="text-primary form-control" required="">
  <option value="">--NO Cluster Head--</option>
  @foreach($clusterheaduid as $val)
  <option {{$val->selected_status}}  value="{{$val->UId}}">{{$val->EmployeeName}}</option> 
  @endforeach 
</select>
</td>
</tr> <br>
<tr>
  <!-- <td style="text-align: right;line-height: 39px;">State Uid</td> -->
  <label style="margin-left:55%;margin-top: -12%;">State Head</label>
  <td><select style="width:36%;margin-top: -56px;margin-left: 309px;"  name="stateheaduid" id="stateheaduid" class="text-primary form-control" required="">
    <option value="">--NO State Head--</option>
    @foreach($stateheaduid as $val)
    <option {{$val->selected_status}} value="{{$val->UId}}">{{$val->EmployeeName}}</option>
    @endforeach
  </select>
</td>
</tr> <br>

<!--  <td style="margin-left: 50px;"><b>zonalhead Uid</b></td> -->
<label style="margin-left:7%;margin-top:0%;">Zonal Head</label>
<td><select style="width:36%"  name="zonalheaduid" id="zonalheaduid" class="text-primary form-control" required="">
  <option value="">--NO Zonal Head--</option>
  @foreach($zonalheaduid as $val)
  <option {{$val->selected_status}} value="{{$val->UId}}">{{$val->EmployeeName}}</option>
  @endforeach
</select>
</td>
</tr><br>
<div>
  <input type="button" name="btn_submitprofile" id="btn_submitprofile" class="btn btn-primary" value="Submit" onclick='profile_update_hierarchy();'>
  <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
</form>
</div>

</div>
</div>
</div>
</div>

<!-- UPDATE PROFILE END -->
<!-- Document Upload Start -->
<div id="docviwer" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Attachment</h4>
          </div>
          <div class="modal-body">
          <div class="table-responsive">
          <div id="divdocviewer" name="divdocviewer">
          </div>
          <div>
           <img id="imgdoc" style="height:100%; width:100%;">
         </div>
       </div>
     </div>
   </div>
 </div>
</div>
<!-- update TYPE -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Type</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>        
      <!-- Modal body -->
      <div class="modal-body">
       <form id="frmtype" name="frmtype" method="post">
        {{ csrf_field() }}
        <label>Select Type:</label>
        <select class="form-control" required id="ddltype" name="ddltype">
         <option value="">---Select---</option>
         <option value="1">FBA</option>
         <option value="2">POSP</option>
         <option value="3">T-POS</option> 
 
       </select>
       <input type="hidden" name="txtfbaid" id="txtfbaid">
     </div>        
     <!-- Modal footer -->
     <div class="modal-footer">
       <input type="button" name="btn_submit" id="btn_submit" class="btn btn-primary" value="submit" onclick="update_fba_type(this.id)"> 
     </form>
     <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
   </div>
 </div>
</div>
</div>
</div>

<!-- App Sourcee Update Start -->
@if((Session::get('usergroup')== '13') || (Session::get('usergroup')=='50'))
<div class="modal" id="appsourcemodel">
  <div class="modal-dialog">
    <div class="modal-content">      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update App Source</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>        
      <!-- Modal body -->
      <div class="modal-body">
       <form id="appsourcefrom" name="appsourcefrom" method="post">
        {{ csrf_field() }}
        <label>Select:</label>
        <select name="apsource" id="apsource" class="text-primary form-control" required="">
          <option value="">{{$data->AppSource}}</option>
          @foreach($sourceupdate as $val)
          <option value="{{$val->ID}}">{{$val->Source_name}}</option>
          @endforeach
        </select>
        
        <input type="hidden" name="hidedenapsourcefba" id="hidedenapsourcefba">
      </div>        
      <!-- Modal footer -->
      <div class="modal-footer">
       <input type="button" name="btn_source" id="btn_source" class="btn btn-primary" value="submit" onclick="update_app_source(this.id)"> 
     </form>
     <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
   </div>
 </div>
</div>
</div>
</div>
@endif

        <!-- Refered Code Model Start -->
@if((Session::get('usergroup')== '13') || (Session::get('usergroup')=='50'))
<div class="salesupdate modal fade" role="dialog" id="referer_code_update">   
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"  >
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Referedby_Code</h4>
      </div>
      <div class="modal-body">
        <form name="update_refrbycode" id="update_refrbycode">
         {{ csrf_field() }}
           <div class="form-group col-md-6">
          <div class="col-md-5">
          <input type="hidden" name="ref_fbaid" id="ref_fbaid" value="">
          </div>
          <div class="form-group">
            <select  name="txtRefererby" id="txtRefererby" class="text-primary form-control">
              <option value="">--Select--</option>
              @foreach($refererby_recruiter as $val)  
              <option value="{{$val->referer_code}}">{{$val->Profile}}</option>
              @endforeach
            </select>
          </div>
        </div>
      </form>
      <div class="modal-footer"> 
        <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
        <input type="button" name="btn_submit" id="btn_submit" class="btn btn-primary" onclick="update_refercode(document.getElementById('ref_fbaid').value)" value="Submit">
      </div>
    </div>
  </div>
</div>
</div>
@endif
<!-- Refered Code Model End
 -->

<!-- FBA ACTIVE INACTIVE -->
@if((Session::get('usergroup')== '13') || (Session::get('usergroup')=='50'))
<div class="modal" id="activefbamodel">
  <div class="modal-dialog">
    <div class="modal-content">      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Active FBA</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>        
      <!-- Modal body -->
      <div class="modal-body">
       <form id="fbaactivefrom" name="fbaactivefrom" method="post">
        {{ csrf_field() }}
        <label>Select:</label>
        <select class="form-control" required id="activefba" name="activefba"  >
          <!--  <option value="  ">-- Update FBA Status --</option> -->
          
          <option value="1">Active </option>
          <option value="0">Inactive</option> 
        </select>
        <input type="hidden" name="hiddenactivefba" id="hiddenactivefba">
      </div>        
      <!-- Modal footer -->
      <div class="modal-footer">
       <input type="button" name="btn_status" id="btn_status" class="btn btn-primary" value="submit" onclick="update_fba_status(this.id)"> 
     </form>
     <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
   </div>
 </div>
</div>
</div>
</div>
@endif

<!-- Partner Info Start -->
<div id="partnerInfo" class="modal fade" role="dialog">
  <div class="modal-dialog">
   <!-- Modal content-->
   <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Partner Info</h4>
    </div>
    <div class="modal-body">
      <div class="table-responsive">
        <div id="divpartnertable" name="divpartnertable">
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Partner Info End -->
<div id="docviwer" class="modal fade" role="dialog">
  <div class="modal-dialog">
   <!-- Modal content-->
   <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" style="text-align:center;">Attachment</h4>
    </div>
    <div class="modal-body">
      <div class="table-responsive">
        <div id="divdocviewer" name="divdocviewer">
        </div>
        <div>
         <img id="imgdoc" style="height:100%; width:100%;">
       </div>
     </div>
   </div>
 </div>
</div>
</div>
<!--Filter -->
<div class="Filter modal fade" id="Filter" role="dialog">   
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Filter</h4>
      </div>
      <div class="modal-body">
        <form id="posp_from_id">
          <div class="form-group">
          </div>
          <div class="form-group">
            <select class="recipient-name form-control" > 
              <option>FBA</option>
              <option>POSP</option>
              <option>FBA</option>
            </select>
            <input type="text" class="recipient-name form-control" id="" name="" required="yes" />
          </div>
        </form>
        <div class="modal-footer"> 
          <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
          <button id="" class="btn btn-primary" type="button">search</button>          
        </div>
      </div>
    </div>
  </div>
</div>
<!-- paymentlink -->
<div id="paylink_payment" class="modal fade paylink_payment" role="dialog">
  <div class="modal-dialog">
   <!-- Modal content-->
   <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Payment link</h4>
    </div>
    <div class="col-md-12"> <br>
      <form method="POST" id="modelpaylink">
        {{ csrf_field() }}
        <textarea type="text" rows="3" id="divpartnertable_payment" name="divpartnertable_payment" class="divpartnertable_payment form-control">
        </textarea>      
        <br>
      </div> 
      <div class="col-md-12"> 
        <button type="button" style="margin-left:20px;" class="btn btn-info" name="paysub" id="paysub" onclick="getpaylinknew()" >Genrate Payment link</button> &nbsp;&nbsp;
        <button type="button" name="smspayment" id="smspayment" class="btn btn-success" data-dismiss="modal" style="padding-left:5px; " onclick="pmesgsend()">Send SMS</button>
      </div>
      <!-- <form id="modelpaylink" name="modelpaylink"> -->
      <div id="divlink" class="modal-body">
      </div>
      <div class="modal-footer">
       <input type="hidden" name="fba" id="fba">
       <input type="hidden" name="txtmono" id="txtmono">
       <input type="hidden" name="txtlink" id="txtlink">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     </div>
     <div class="modal-body">
     </div>
   </form>
 </div>
</div>
</div>
<!-- password -->
<div id="spassword" class="modal fade spassword" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Password</h4>
      </div>
      <div class="modal-body">
        <div style="color: blue;" id="show_password" class="show_password">
        </div>
      </div>
    </div>
  </div>
</div>
<!--  paymen grid upload-->
<div id="paymentgrid" class="modal fade spassword" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload Payment GRID</h4>
      </div>
      <div class="modal-body">
        <div class="">
          <form enctype="multipart/form-data" action="{{url('upload-paygrid')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">           
              <a id="olddocpath" target="_blank"><img id="olddocpath1" style="height:100px;width: 100px;"></a> 
              <br> 
              <br> 
              <label>Payment GRID:</label>
              <input class="form-control" type="file" name="filepaymentgrid" id="filepaymentgrid" required accept=".png,.jpeg,.jpg,.pdf" placeholder="Payment Grid">                   
              <input type="hidden" name="txtpayfbaid" id="txtpayfbaid">
              <input type="hidden" name="txtolddoc" id="txtolddoc">
            </div>
            <div class="modal-footer">
             <input type="submit" name="btnuploadpaymentgird" id="btnuploadpaymentgird" value="Upload" class="btn btn-primary">
           </div>
         </form>
       </div>
     </div>
   </div>
 </div>
</div>



@endsection
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
 $(document).ready(function() {
   $("#tblsubfba").DataTable();   
   $(document).ready(function() {
  // Bootstrap datepicker
  $('.input-daterange input').each(function() {
    $(this).datepicker('clearDates');
  });

 // Re-draw the table when the a date range filter changes
 $('#btndate').on("click", function(){
  var table = $('#fba-list-table').DataTable();
  table.draw();
});

 $('.date-range-filter').datepicker();
});
 });
</script>





<!-- from date to date end -->  


<!-- Search Pospno and Fbaid start -->

<script type="text/javascript">
 $(function(){
   $('#posp_remark').keyup(function(){    
     var yourInput = $(this).val();
     re = /[A-Za-z]?[A-Za-z `~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi;
     var isSplChar = re.test(yourInput);
     if(isSplChar)
     {
      var no_spl_char = yourInput.replace(/[A-Za-z]?[A-Za-z `~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
      $(this).val(no_spl_char);
    }
  });

 });
</script>

<!-- GET TYPE SCRIPT -->
<script type="text/javascript">
 function update_fba_type(this_id){

  if($("#ddltype").val() == ""){
    alert("Please Select Type");
  }else{

    var formdata = new FormData($("#frmtype")[0]);

    $.ajax({ 
      url: "{{URL::to('get-type')}}",
      method:"POST",
      data: formdata,
      contentType:false,
      processData:false,
      success: function(response)  {
        var resp = JSON.parse(response);
        alert(resp.alert_msg);
        $("#" + resp.field).html(resp.show_field_data);
        $('.close').click(); 
      }
    });

  }
  
} 
</script> 

<!-- AVTIVE IS ACTIVE FBA START -->
<script type="text/javascript">
 function update_fba_status(this_id){
  if (confirm("Are you sure to Submit this Record"))
    if($("#activefba").val() == ""){
      alert("Please Select at least one option");
    }else{

      var formdata = new FormData($("#fbaactivefrom")[0]);

      $.ajax({ 
        url: "{{URL::to('fba-status')}}",
        method:"POST",
        data: formdata,
        contentType:false,
        processData:false,
        success: function(response)  {

          var resp = JSON.parse(response);
          alert(resp.alert_msg);
          $("#" + resp.field).html(resp.show_field_status);
          $('.close').click();
          location.reload();
          
        }
      });

    }
    
  } 
</script> 



<!-- 
<script type="text/javascript">
function transection_history(text,fbaid){
  alert('test');
  // alert(data);
  $.ajax({
               url: 'fba-transection-history/'+fbaid,
               type: "GET",                  
               success:function(data) {
                var json = JSON.parse(data);
                      console.log(json);
                      if(json.StatusNo==0){
   
                      $(text).closest('td').text(json.MasterData.CreateCustomerResult.EntryNo);

                    }
                   
                    }
                }); 

}
</script> -->


<script type="text/javascript">
 function update_app_source(this_id){
  if (confirm("Are you sure to Submit this Record"))

    if($("#apsource").val() == ""){
      alert("Please Select Source");
    }else{

      var formdata = new FormData($("#appsourcefrom")[0]);

      $.ajax({ 
        url: "{{URL::to('fba-source-update')}}",
        method:"POST",
        data: formdata,
        contentType:false,
        processData:false,
        success: function(response) {
          alert("Update Successfully");
        // var resp = JSON.parse(response);
        // alert(resp.alert_msg);
        // $("#" + resp.field).html(resp.show_field_status);
        $('.close').click(); 
        location.reload();
      }
    });

    }
  } 
</script> 

<script>
  function Gettype(fbaid,value){
    if (value=='Active') {
      var intval=1;
    }else{
      var intval=0;
    }
    //alert(value);
    $("#activefba").val(intval);
    $("#txtfbaid").val(fbaid);
    $("#hiddenactivefba").val(fbaid);
    $("#hidedenapsourcefba").val(fbaid);
    

  }

</script>

<script>
  function Gettype2(fbaid){
    //alert(fbaid);
    $("#profilehidden").val(fbaid);
    $("#ref_fbaid").val(fbaid);

    
    
  }

</script>

<!-- 
<script type="text/javascript">
  function getpaylinknew(){
    $.ajax({
      url: 'getpaylinknew/'+$('#fba').val(),
      type: "GET",                  
      success:function(data) {
        var json = JSON.parse(data);
        if(json.StatusNo==0){
          $('#divpartnertable_payment').html(json.MasterData.PaymentURL);
          $('#txtlink').val(json.MasterData.PaymentURL);
        }
      }

    });
  }


</script> -->
<!-- 
  CLOSE BUTTON SCRIPT -->
  <script language="javascript" type="text/javascript">
    function windowClose() {
      window.open('','_parent','');
      window.close();
    }
  </script>



  <script type="text/javascript">
    function getpaylinknew(){

      $.ajax({
        url: '../getpaylinknew/'+$('#fba').val(),
        type: "GET",                  
        success:function(data) {
          console.log(data);
          var json = JSON.parse(data);
          if(json.StatusNo==0){
            $('#divpartnertable_payment').html(json.MasterData.PaymentURL);
            $('#divpartnertable_payment').val(json.MasterData.PaymentURL);

          }

        }
      });
      alert("Payment Link Genrate successfully..");
    }

    function pmesgsend(){
     alert("SMS Send successfully..");
     $.ajax({ 
       url: "{{URL::to('pmesgsend')}}",
       method:"POST",
       data: $('#modelpaylink').serialize(),
       success: function(msg)  
       {
         console.log(msg);

       }
     });
   }
   function uploadpaymentgrid(fbaid){
    $("#paymentgrid").modal('show');  
    $("#txtpayfbaid").val('');
    $("#txtpayfbaid").val(fbaid);  
    $.ajax({
      url: '../get-paygrid-doc/'+fbaid,
      type: "GET",                  
      success:function(data){       
        var json = JSON.parse(data);          
        $("#olddocpath").attr('src','');
        if (json.length > 0){
          if(json[0].doc_path!=0){   
            $("#txtolddoc").val('');        
            $("#txtolddoc").val(json[0].doc_path);              
            $("#olddocpath1").attr('src','{{url('/upload/paygrid')}}/'+json[0].doc_path);
            $("#olddocpath").attr('href','{{url('/upload/paygrid')}}/'+json[0].doc_path);
          }
        }
      }
    });
  }



  function profile_update_hierarchy(){
  //alert("Testt");

  $.ajax({ 
   url: "{{URL::to('update-profile')}}",
   method:"POST",
   data: $('#pupdate').serialize(),
   success: function(msg){
     alert("Update Successfully");
     $('.close').click(); 
     $('#updateprofile').modal('hide');
     location.reload();
   }
 });


} 
function passvalue(){
  var fromdate=$("#txtfromdate").val();
  var todate=$("#txttodate").val();
  if (fromdate!=''&&todate!='') {
    $("#btnshowbusiness").attr("href", "{{URL::to('FBA-Business-Report')}}/{{$data->fbaid}}/"+fromdate+"/"+todate);
    $("#btnshowbusiness").attr("target","_blank");
  }else{ 
    alert("Select Proper Date Rage");  
  }
}

</script>
<script type="text/javascript">     
  $(document).ready(function() {
    $('#profileupdate').DataTable( {
      "order": [[ 2, "desc" ]]
    } );
  } );
</script>

<!-- Refer Code Update script start -->

<script type="text/javascript">
   function update_refercode(this_id){
    //alert(this_id);
    // $("#referer_code_update").val("");
   $('#ref_fbaid').val(ref_fbaid);
   $.ajax({ 
   url: "{{URL::to('update-Referedby-code')}}",
   method:"GET",
   data: {fbaid:this_id,'txtRefererby':$("#txtRefererby").val()},
   success: function(msg){
    console.log(msg);
    if(msg){
      alert(msg);
     $("#txtRefererby").val("");

    }else{
  alert("Data Save Successfully");
}
  $('.close').click(); 
  location.reload();
 }
  });   
 };   
</script>
<!-- Refer Code Update script End
 -->

<!-- Update Alternat Mobile Script Start -->
<script type="text/javascript">
  function get_alternat_mobi_fbid(fbaid,value){
    $("#mobile_fbaid").val(fbaid);
     $('#mobiletwo').val(value);
  }

</script>
 <script type="text/javascript">
   function update_alternate_mobile(this_id){
    //alert(this_id);
   $('#mobile_fbaid').val(mobile_fbaid);
   $.ajax({ 
   url: "{{URL::to('update-alternate-mobile')}}",
   method:"GET",
   data: {fbaid:this_id,'mobiletwo':$("#mobiletwo").val()},
   success: function(msg){
    console.log(msg);
   
  alert("Data Save Successfully");
  $('.close').click(); 
  //location.reload();
 }
  });   
 };   
</script>

<script type="text/javascript">
  function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>
<!-- Update Alternat Mobile Script End
 -->