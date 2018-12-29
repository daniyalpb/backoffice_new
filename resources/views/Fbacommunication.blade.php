@extends('include.master')
@section('content')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<p class="alert alert-success">{{ Session::get('message') }}</p>
</div>
@endif
@if(Session::has('message1'))
<div class="alert alert-danger alert-dismissible">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<p class="alert alert-danger">{{ Session::get('message1') }}</p>
</div>
@endif
<style type="text/css">
  .profile {
    height: 30px;           
    overflow-y: auto;   
    overflow-x: hidden; 
}
</style>
<div class="container-fluid white-bg">
  <div class="col-md-12"><h3>FBA Communication</h3></div>
<br/>
<br/>
<div class="col-md-12">
  <p> All <b style="color: red; font-size: 15px;">*</b> Marked field are Compulsory and you have to select at least one option from sms,mail or notification </p>
</div>

    <input type="hidden" name="txtcityall" id="txtcityall">
    <input type="hidden" name="txtcity" id="txtcity">

    <input type="hidden" name="txtallzone" id="txtallzone">    
    <input type="hidden" name="txtzone" id="txtzone">
    <input type="hidden" name="txtstateall" id="txtstateall">
  
    <input type="hidden" name="txtstate" id="txtstate">
 
    <input type="hidden" name="txtallprofile" id="txtallprofile">
    <input type="hidden" name="txtprofile" id="txtprofile">
    <input type="hidden" name="txtuserall" id="txtuserall">
    <input type="hidden" name="txtuser" id="txtuser">  
    <input type="hidden" name="txtfbaid" id="txtfbaid">
    <input type="hidden" name="txtallfbaid" id="txtallfbaid"> 
  
  <div class="col-md-12">
    <div class="col-md-4">
      <label>Type:<b style="color: red; font-size: 15px;">*</b></label>
      <select class="form-control" id="dlltype" name="dlltype" onchange="pageview();">
        <option value="100">--Select--</option>
        <option value="1">Registration Date</option>
        <option value="2">Payment Date</option>
        <option value="3">Posp</option>
        <option value="4">Profile</option>        
      </select>     
    </div>  
    <div class="col-md-8" id="divpospcity" style="display: none;">   
    <div class="col-md-4">
    <button onclick="getareaposp();" class="btn btn-primary"  style="margin-top: 25px"> <span id="spancityposp">Select cities</span></button>  
    </div>     
   <div class="col-md-4" id="divpospcity">    
<button class="common-btn" id="btnshowpospcity" style="margin-top: 25px" onclick="getpospdonefbaoncity()">Show</button>    
   </div>
   </div>
  </div>  
  <div class="col-md-12" id="divfromdatetodate" style="display: none;">
     <div class="col-md-3">
      <div class="form-group"> 
         <label>From Date:<b style="color: red; font-size: 15px;">*</b></label>
         <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd">
               <input class="form-control date-range-filter" type="text" placeholder="From Date" name="txtfromdate" id="txtfromdate" required readonly>
          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
         </div>
      </div>
   </div>
   <div class="col-md-3">
      <div class="form-group">
        <label>To Date: <b style="color: red; font-size: 15px;">*</b></label>
        <div id="datepicker1" class="input-group date" data-date-format="yyyy-mm-dd">
             <input class="form-control date-range-filter" type="text" placeholder="To Date"  name="txttodate"  id="txttodate" required readonly>
          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
        </div>
      </div>
   </div>
   <div class="col-md-3"> 
    <!-- <label>Select Area:</label> -->
    <button onclick="getarea();" class="btn btn-primary"  style="margin-top: 25px"> <span id="spancity">Select cities</span></button>  

    <!-- <select class="form-control" id="dllarea" onchange="getarea()">
      <option>--Select--</option>
      <option value="1">Select Area</option>
    </select> -->
   </div>
   <div class="col-md-3" style="margin-top: 25px;">
    <button class="common-btn" id="btnshow">Show</button>
   </div>
  </div>   
  <form id="formsavefbalist" method="post" action="{{URL::to('insert-fba-communication')}}">
    {{csrf_field()}}
  <div id="divsendsms" style="display: none;">  
  <div class="col-md-12">
  <div class="col-md-12" id="divfba">
   <div style="overflow-y:scroll;height:270px;">
      <table class="table table-responsive table-hover" cellspacing="0" id="myTable">
         <thead>
            <tr class="headerstyle" align="center">
               <th scope="col">
                 <input type="checkbox" id="btnselectallfba" name="btnselectallfba" class="btnselectallfba" style="width: auto; float: left; display: inline-block; margin-right: 16px;">
                <span>RECIPIENTS<b style="color: red; font-size: 15px;">*</b></span>
                <input type="text"  style="margin: 0px 10px 10px 233px ; width: 250px;" id="myInput"  class="search_id" placeholder="Search for names or Mobile Number" title="Type in a name">                   
               </th>
            </tr>
     </thead>
     <tbody id="sendsms_id">
     </tbody>                   
      </table>
    </div>
      <h3 class="pull-left"><b>COUNT:</b><span id="msg_check">0/</span><span id="msg_count">0</span></h3>   
  </div>

  <div class="col-md-12" id="divsmstaplate" style="display: none;">
     <h3>SMS Body</h3>
  <div class="col-sm-6 col-xs-12 col-md-12 form-padding">  
    <label>SMS Header:</label>
     <select  name="SMSTemplate" class="form-control"  id="ddlsms" onchange="getsmsbody();">
     <option value="">--select--</option>
      <option value="other">Other</option>
     @foreach($header as $val)
     <option value="{{$val->SMSTemplateId}}">{{$val->Header}}</option>
     @endforeach    
     </select>
     <div id="divdate">
     <label>Schedule Date Time:</label>
     <input type="datetime-local" class="form-control date-range-filter" name="txtscheduledatetime" id="txtscheduledatetime"  min="<?php echo(date('Y-m-d\TH:i'))?>">
     </div>
   <label class="control-label" for="inputError" id="required2"> </label>
  <br>
  <textarea style="padding:10px; height:200px;"  id="txtsms"  name="txtsms" class="form-control"> </textarea>
      <label class="control-label" for="inputError" id="required3"> </label>   
    </div>
    </div>
  
     <div class="col-md-12" id="divmailtaplate" style="display: none;">
        <h3>Mail Body</h3>
    <div class="col-sm-6 col-xs-12 form-padding col-md-12">  
      <label>Mail Subject:</label>
     <select  name="mailtamplate" class="form-control"  id="dllmail" onchange="getmailbody()">
     <option value="" >--select--</option>
      <option value="other" >Other</option>
     @foreach($mailsub as $val)
     <option value="{{$val->mail_tamplate_id}}" >{{$val->subject}}</option>
    @endforeach
     </select>
      <div id="divdatemail">
     <label>Schedule Date Time:</label>
     <input type="datetime-local" class="form-control date-range-filter" name="txtscheduledatetimemail" id="txtscheduledatetimemail"  min="<?php echo(date('Y-m-d\TH:i'))?>">
     </div>
   <label class="control-label" for="inputError" id="required2"> </label>
  <br>
  <textarea style="padding:10px; height:200px;"  id="txtmail"  name="txtmail" class="form-control"> </textarea>
      <label class="control-label" for="inputError" id="required3"> </label>
   <!--  <div class="center-obj pull-left">
      <button class="common-btn" id="btnsendmail">SEND</button>
       <button class="common-btn" id="btnsenmaillater">SEND LATER</button>
     </div> -->
    </div>
  </div>
   <div class="col-md-12" id="Divpushnotify" style="display: none;">
        <h3>Push Notification</h3>
    <div class="col-sm-6 col-xs-12 form-padding col-md-12">  
      <label>Notification Titile:</label>
     <select class="form-control" name="ddlnotfiy" id="ddlnotfiy" onchange="getnotificationdata()">
     <option value="" >--select--</option>     
     @foreach($notification as $val)
     <option value="{{$val->MessageId}}" >{{$val->NotificationTitle}}</option>
    @endforeach
     </select>
     <label>Notification Message:</label>
     <textarea id="txtnotifymsg" name="txtnotifymsg" class="form-control"></textarea>
      <div id="divdatenot">
     <label>Schedule Date Time:</label>
     <input type="datetime-local" class="form-control date-range-filter" name="txtscheduledatetimnot" id="txtscheduledatetimnot"  min="<?php echo(date('Y-m-d\TH:i'))?>">
     </div>
   <label class="control-label" for="inputError" id="required2"> </label>
  <br>
 <!--  <textarea style="padding:10px; height:200px;"  id="txtmail"  name="txtmail" class="form-control"> </textarea> -->
      <label class="control-label" for="inputError" id="required3"> </label>
   <!--  <div class="center-obj pull-left">
      <button class="common-btn" id="btnsendmail">SEND</button>
       <button class="common-btn" id="btnsenmaillater">SEND LATER</button>
     </div> -->
    </div>
  </div>
  <div class="col-md-12" id="divbtnall" style="display: none !important">
   <div class="center-obj pull-left col-md-12">
      <button class="common-btn" id="btnsendsms">SEND NOW</button>
      <button class="common-btn" id="btnsendsmslater">SEND LATER</button>
    </div>
   </div>
  </form>
  <br/>
  <br/>  
  <div class="col-md-12" id="divsend" style="padding-top: 30px;">
    <table class="col-md-12">
      <tr class="col-md-6">
        <td class="col-md-2">
           <label>SMS</label>
               <input type="checkbox" id="btnsms">
           </td>
           <td class="col-md-2">
              <label>Email</label>
              <input type="checkbox" id="btnemail">
            </td>
           <td class="col-md-2">
             <label>Push Notification</label>
             <input type="checkbox" id="btnpushnot">
            </td>       
      </tr>
    </table>    
  </div>
</div>
</div>

<!-- The Modal -->
  <div class="modal fade" id="Areamodal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Select Area</h4>          
        </div>
        
        <!-- Modal body -->
        <div class="modal-body col-md-12">    
        <table class="col-md-12">
          <tr>        
              <td class="col-md-4">   
                      <label>Zone:</label>
                       <input type="checkbox" name="btnselectallzone" id="btnselectallzone" class="btnselectallzone" value="1"> <b>Select all</b>
                      <div style="overflow-y:scroll;height:270px;">                           
                        <table>                         
                          <tr>
                            <td>
                              <input type="checkbox" name="btnzone" id="btnzone" class="btnzone" value="South"> South
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <input type="checkbox" name="btnzone" id="btnzone" class="btnzone" value="West"> West
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <input type="checkbox" name="btnzone" id="btnzone" class="btnzone" value="North"> North
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <input type="checkbox" name="btnzone" id="btnzone" class="btnzone" value="East"> East
                            </td>
                          </tr>
                        </table>   
                    </div>
                 </td>
                 <td class="col-md-4">
                  <label>State:</label>   
                  <input type="checkbox" name="btnselectallstate" id="btnselectallstate" class="btnselectallstate" value="1"> <b>Select all</b>   
                  <div style="overflow-y:scroll;height:270px;">                   
                       <table>  
                       <div id="divstate">                   
                          
                        </div>                       
                       </table> 
                     </div>  
                </td>
                <td class="col-md-4">
                  <label>City:</label>
                    <input type="checkbox" name="btncityselectall" id="btncityselectall" class="btncityselectall" value="1"> <b>Select All</b>  
                  <div style="overflow-y:scroll;height:270px;">           
                       <table>                        
                        <div id="divcity">
                          
                        </div>                      
                       </table>  
                    </div> 
                </td>
               </tr>
        </table>  
        </div>        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="btnarasave" data-dismiss="modal">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  <!-- The Modal -->
  <div class="modal fade" id="Areamodalposp">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Select Area</h4>          
        </div>
        
        <!-- Modal body -->
        <div class="modal-body col-md-12">    
        <table class="col-md-12">
          <tr>        
              <td class="col-md-4">   
                      <label>Zone:</label>
                       <input type="checkbox" name="btnselectallzoneposp" id="btnselectallzoneposp" class="btnselectallzoneposp" value="1"> <b>Select all</b>
                      <div style="overflow-y:scroll;height:270px;">                           
                        <table>                         
                          <tr>
                            <td>
                              <input type="checkbox" name="btnzoneposp" id="btnzoneposp" class="btnzoneposp" value="South"> South
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <input type="checkbox" name="btnzoneposp" id="btnzoneposp" class="btnzoneposp" value="West"> West
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <input type="checkbox" name="btnzoneposp" id="btnzoneposp" class="btnzoneposp" value="North"> North
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <input type="checkbox" name="btnzoneposp" id="btnzoneposp" class="btnzoneposp" value="East"> East
                            </td>
                          </tr>
                        </table>   
                    </div>
                 </td>
                 <td class="col-md-4">
                  <label>State:</label>   
                  <input type="checkbox" name="btnselectallstateposp" id="btnselectallstateposp" class="btnselectallstateposp" value="1"> <b>Select all</b>   
                  <div style="overflow-y:scroll;height:270px;">                   
                       <table>  
                       <div id="divstateposp">                   
                          
                        </div>                       
                       </table> 
                     </div>  
                </td>
                <td class="col-md-4">
                  <label>City:</label>
                    <input type="checkbox" name="btncityselectallposp" id="btncityselectallposp" class="btncityselectallposp" value="1"> <b>Select All</b>  
                  <div style="overflow-y:scroll;height:270px;">           
                       <table>                        
                        <div id="divcityposp">
                          
                        </div>                      
                       </table>  
                    </div> 
                </td>
               </tr>
        </table>  
        </div>        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="btnarasave" data-dismiss="modal">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  <!-- The Modal -->
  <div class="modal fade" id="profilemodal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">      
        <!-- Modal Header -->
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Select Profile</h4>
         
        </div>        
        <!-- Modal body -->
        <div class="modal-body col-md-12">    
        <table class="col-md-12">
          <tr>        
              <td class="col-md-4">   
                      <label>Profile:</label> 
                      <input type="checkbox" name="btnselectallprofile" id="btnselectallprofile" class="selectall" value="1"> <b>Select all</b> 
                      <div style="overflow-y:scroll;height:270px;">         
                        <table>                         
                          @foreach($profile as $val)
                          <tr class="profile">
                            <td>
                              <input type="checkbox" name="btnprofile" id="btnprofile" class="btnprofile" value="{{$val->role_id}}"> {{$val->Profile}}
                            </td>
                          </tr>     
                          @endforeach                     
                        </table>   
                    </div>
                 </td>
                 <td class="col-md-4">
                  <label>User`s:</label>   
                    <input type="checkbox" name="btnselectalluser" id="btnselectalluser" class="btnselectalluser" value="1"> <b>Select all</b>  
                  <div style="overflow-y:scroll;height:270px;">                   
                       <table>                        
                        <div id="divuser">                          
                        </div> 
                       </table>  
                       </div> 
                </td>               
               </tr>
        </table>  
        </div>        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="btnsaveprofile" data-dismiss="modal">Save</button>
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
<script type="text/javascript">
$(document).ready(function(){   
   $("#btnselectallfba").click(function(){
     $('.check_list').not(this).prop('checked', this.checked);
     var len=$(".check_list:checkbox:checked").length;
          $('#msg_check').text(len+"/");  
          var fbaid = [];    
        $.each($("input[class='check_list']:checked"), function(){            
                fbaid.push($(this).val());
            });      
     // alert(fbaid);
       $("#txtfbaid").val('');
      $("#txtfbaid").val(fbaid); 
 });   
});
$(document).on('click','.check_list',function(){
len=$(".check_list:checkbox:checked").length;
$('#msg_check').text(len+"/");
});
  function pageview()
  { 
     $("#msg_count").text('');
     $("#msg_check").text('');
    if ($("#dlltype").val()==100){
      $("#divsendsms").hide();
    }
    if($("#dlltype").val()==1 || $("#dlltype").val()==2){
      $("#divfromdatetodate").show();     
      $("#divsendsms").show();
      $("#divpospcity").hide();
    }else{
      $("#divfromdatetodate").hide();      
    }
    if($("#dlltype").val()==4){
      $("#profilemodal").modal('show');
      $("#divsendsms").show();
      $("#divpospcity").hide();
    }else{
      $("#profilemodal").modal('hide');
    }
    if($("#dlltype").val()==3){
      $("#divsendsms").show();
      $("#divpospcity").show();      
      getposp();
    }else{
       $('#sendsms_id').empty();  
       $("#divpospcity").hide();     
    }
  }
  function getarea()
  { 
    $('#Areamodal').modal('show');       
  }
    function getareaposp()
  { 
    $('#Areamodalposp').modal('show');       
  }
$("#btnselectallzone").click(function(){
     $('.btnzone').not(this).prop('checked', this.checked);
    $(".btnzone:checkbox:checked");
    var zone = [];    
        $.each($("input[class='btnzone']:checked"), function(){            
                zone.push($(this).val());
            });      
      //alert(zone);
       $("#txtallzone").val('');
       $("#txtallzone").val(zone);
      if ($(".btnzone").is(':checked')){           
          getstate(zone);
        }else{
          $('#divstate').empty();
          $('#divcity').empty();
        }
       
 });
$("#btnselectallzoneposp").click(function(){
     $('.btnzoneposp').not(this).prop('checked', this.checked);
    $(".btnzoneposp:checkbox:checked");
    var zone = [];    
        $.each($("input[class='btnzoneposp']:checked"), function(){            
                zone.push($(this).val());
            });      
      //alert(zone);
       $("#txtallzone").val('');
       $("#txtallzone").val(zone);
      if ($(".btnzoneposp").is(':checked')){           
          getstateposp(zone);
        }else{
          $('#divstateposp').empty();
          $('#divcityposp').empty();
        }
       
 });
$("#btnselectalluser").click(function(){
     $('.btnuser').not(this).prop('checked', this.checked);
    $(".btnuser:checkbox:checked");
    var user = [];    
        $.each($("input[class='btnuser']:checked"), function(){            
                user.push($(this).val());
            });      
     // alert(user);
       $("#txtuserall").val('');
      $("#txtuserall").val(user);
      if ($(".btnuser").is(':checked')){           
          getempfba(user);
        }else{
          //$('#divuser').empty();    
          $('#sendsms_id').empty();     
        }
       
 });
function getuser(){
   var user = [];
    $.each($("input[class='btnuser']:checked"), function(){            
                user.push($(this).val());
            });
   // alert(user);
     $("#txtuser").val('');
     $("#txtuser").val(user);
      if ($(".btnuser").is(':checked')){           
          getempfba(user);
        }else{
        $('#sendsms_id').empty();       
        }
}
$(".btnzone").click(function(){
    var zone = [];
    $.each($("input[class='btnzone']:checked"), function(){            
                zone.push($(this).val());
            });
    //alert(zone);
     $("#txtzone").val('');
     $("#txtzone").val(zone);
      if ($(".btnzone").is(':checked')){           
          getstate(zone);
        }else{
          $('#divstate').empty();
          $('#divcity').empty();
        }
 });


$("#btnselectallstate").click(function(){
     $('.btnstate').not(this).prop('checked', this.checked);
    $(".btnstate:checkbox:checked");
    var state = [];    
        $.each($("input[class='btnstate']:checked"), function(){            
                state.push($(this).val());
            });      
     // alert(state);
       $("#txtstateall").val('');
       $("#txtstateall").val(state);
      if ($(".btnstate").is(':checked')){           
          getcity(state);
        }else{
          $('#divcity').empty();
        }
       
 });

$("#btncityselectall").click(function(){
     $('.btncity').not(this).prop('checked', this.checked);
    $(".btncity:checkbox:checked");
    var city = [];    
        $.each($("input[class='btncity']:checked"), function(){            
                city.push($(this).val());
            });     
     var citycount=$(".btncity:checked:checked").length;
     $("#spancity").text('');      
      $("#spancity").text("Selected Cities #"+citycount);
       $("#txtcityall").val('');
      $("#txtcityall").val(city);
      if ($(".btnstate").is(':checked')){          
        }else{
          $('#divcity').empty();
        }
       
 });
$(".btnzoneposp").click(function(){
    var zone = [];
    $.each($("input[class='btnzoneposp']:checked"), function(){            
                zone.push($(this).val());
            });
    //alert(zone);
     $("#txtzone").val('');
     $("#txtzone").val(zone);
      if ($(".btnzoneposp").is(':checked')){           
          getstate(zone);
        }else{
          $('#divstateposp').empty();
          $('#divcityposp').empty();
        }
 });


$("#btnselectallstateposp").click(function(){
     $('.btnstateposp').not(this).prop('checked', this.checked);
    $(".btnstateposp:checkbox:checked");
    var state = [];    
        $.each($("input[class='btnstateposp']:checked"), function(){            
                state.push($(this).val());
            });      
     // alert(state);
       $("#txtstateall").val('');
       $("#txtstateall").val(state);
      if ($(".btnstateposp").is(':checked')){           
          getcityposp(state);
        }else{
          $('#divcityposp').empty();
        }
       
 });

$("#btncityselectallposp").click(function(){
     $('.btncityposp').not(this).prop('checked', this.checked);
    $(".btncityposp:checkbox:checked");
    var city = [];    
        $.each($("input[class='btncityposp']:checked"), function(){            
                city.push($(this).val());
            });     
     var citycount=$(".btncityposp:checked:checked").length;
    // alert(citycount);
     $("#spancityposp").text('');      
      $("#spancityposp").text("Selected Cities #"+citycount);
       $("#txtcityall").val('');
      $("#txtcityall").val(city);
      if ($(".btnstateposp").is(':checked')){          
        }else{
          $('#divcityposp').empty();
        }
       
 });

function getstatevalue(){
 // alert('click');
    var state = [];
    $.each($("input[class='btnstate']:checked"), function(){            
                state.push($(this).val());
            });   
    $("#txtstate").val('');
     $("#txtstate").val(state);
      if ($(".btnstate").is(':checked')){           
          getcity(state);
        }else{
          $('#divcity').empty();
        }
}
function getstatevalueposp(){
 // alert('click');
    var state = [];
    $.each($("input[class='btnstateposp']:checked"), function(){            
                state.push($(this).val());
            });   
    $("#txtstate").val('');
     $("#txtstate").val(state);
      if ($(".btnstateposp").is(':checked')){           
          getcityposp(state);
        }else{
          $('#divcityposp').empty();
        }
}
function getcityvalue(){
 // alert('click');
    var city = [];
    $.each($("input[class='btncity']:checked"), function(){            
                city.push($(this).val());
            });
    //alert(city);
     $("#txtcity").val('');
     $("#txtcity").val(city);
      if ($(".btncity").is(':checked')){   
       var citycount=$(".btncity:checked:checked").length;     
       $("#spancity").text('');      
       $("#spancity").text("Selected City #"+citycount);
       $("#txtcityall").val('');
        }else{
          $('#divcity').empty();
        }
}
function getcityvalueposp(){
 // alert('click');
    var city = [];
    $.each($("input[class='btncityposp']:checked"), function(){            
                city.push($(this).val());
            });
    //alert(city);
     $("#txtcity").val('');
     $("#txtcity").val(city);
      if ($(".btncityposp").is(':checked')){   
       var citycount=$(".btncityposp:checked:checked").length;     
       $("#spancityposp").text('');      
       $("#spancityposp").text("Selected City #"+citycount);
       $("#txtcityall").val('');
        }else{
          $('#divcityposp').empty();
        }
}
function getfbaid(){
 // alert('click');
    var fbaid = [];
    $.each($("input[class='check_list']:checked"), function(){            
                fbaid.push($(this).val());
            });
    //alert(fbaid);
     $("#txtfbaid").val('');
     $("#txtfbaid").val(fbaid);     
}
$("#btnselectallprofile").click(function(){
     $('.btnprofile').not(this).prop('checked', this.checked);
    $(".btnzone:checkbox:checked");
    var profile = [];    
        $.each($("input[class='btnprofile']:checked"), function(){            
                profile.push($(this).val());
            });      
      //alert(profile);
      $("#txtallprofile").val(profile);
      if ($(".btnprofile").is(':checked')){           
          getempbyrole(profile);
        }else{
          $('#divuser').empty();
          $('#sendsms_id').empty();
        }       
 });
$(".btnprofile").click(function(){
    var profile = [];
    $.each($("input[class='btnprofile']:checked"), function(){            
                profile.push($(this).val());
            });
    //alert(profile);
     $("#txtprofile").val(profile);
     if ($(".btnprofile").is(':checked')){           
          getempbyrole(profile);
        }else{
          $('#divuser').empty();
          $('#sendsms_id').empty();
        }    
 });
function getstate(zone)
  {
      $.ajax({
             url: 'get-state-on-zone/'+zone,
             type: "GET",             
             success:function(state) 
             {      
              var data=  JSON.parse(state);                  
              // alert(State); 
               $('#divstate').empty();
               var arr=Array();              
              if(data.length > 0){
              $.each(data,function(index,val){ 
                //alert(val.FBAID);
              if(val.state_id!=null && val.state_id!='0')
              {
              arr.push('<tr><td><input type="checkbox" id="btnstate" onclick="getstatevalue();" name="state" class="btnstate" value="'+val.state_id+'" >  '+val.state_name+'</td></tr>'); 
               }
           });
              //alert(arr);
               $('#divstate').append(arr);
            }else{
               alert("No data found...");
                }                     
             }
         });  
  }
  function getcity(stateid)
  {
      $.ajax({
             url: 'get-city-on-state/'+stateid,
             type: "GET",             
             success:function(city) 
             {      
              var data=  JSON.parse(city);                  
              // alert(State); 
               $('#divcity').empty();
               var arr=Array();              
              if(data.length > 0){
              $.each(data,function(index,val){ 
                //alert(val.FBAID);
              if(val.City!=null && val.City!='')
              {
              arr.push('<tr><td><input type="checkbox" id="btncity" onclick="getcityvalue();" name="city" class="btncity" value="'+val.City+'" >  '+val.City+'</td></tr>'); 
               }
           });
              //alert(arr);
               $('#divcity').append(arr);
            }else{
               alert("No data found...");
                }                     
             }
         });  
  }
  function getcityposp(stateid)
  {
      $.ajax({
             url: 'get-city-on-state/'+stateid,
             type: "GET",             
             success:function(city) 
             {      
              var data=  JSON.parse(city);                  
              // alert(State); 
               $('#divcity').empty();
               var arr=Array();              
              if(data.length > 0){
              $.each(data,function(index,val){ 
                //alert(val.FBAID);
              if(val.City!=null && val.City!='')
              {
              arr.push('<tr><td><input type="checkbox" id="btncityposp" onclick="getcityvalueposp();" name="btncityposp" class="btncityposp" value="'+val.City+'" >  '+val.City+'</td></tr>'); 
               }
           });
              //alert(arr);
               $('#divcityposp').append(arr);
            }else{
               alert("No data found...");
                }                     
             }
         });  
  }
  function getstateposp(zone)
  {
      $.ajax({
             url: 'get-state-on-zone/'+zone,
             type: "GET",             
             success:function(state) 
             {      
              var data=  JSON.parse(state);                  
              // alert(State); 
               $('#divstate').empty();
               var arr=Array();              
              if(data.length > 0){
              $.each(data,function(index,val){ 
                //alert(val.FBAID);
              if(val.state_id!=null && val.state_id!='0')
              {
              arr.push('<tr><td><input type="checkbox" id="btnstateposp" onclick="getstatevalueposp();" name="btnstateposp" class="btnstateposp" value="'+val.state_id+'" >  '+val.state_name+'</td></tr>'); 
               }
           });
              //alert(arr);
               $('#divstateposp').append(arr);
            }else{
               alert("No data found...");
                }                     
             }
         });  
  }
  function getposp()
  {
      $.ajax({
             url: 'get-posp-done-fba',
             type: "GET",             
             success:function(DATA) 
             {      
              var data = JSON.parse(DATA);
             // alert(data);
              $('#sendsms_id').empty();
             var arr=Array();
              $('#msg_count').text(data.length);
              if(data.length > 0){
              $.each(data,function(index,val){ 
                //alert(val.FBAID);
              if(val.FBAID!=null && val.FBAID!='0')
              {
              arr.push('<tr><td><input  type="checkbox" id="txtFBAID" name="txtFBAID[]" onclick="getfbaid()" class="check_list" value="'+val.FBAID+'" >'+val.FullName  +':'+val.MobiNumb1+'</td> </tr>'); 
               }
           });
              //alert(arr);
               $('#sendsms_id').append(arr);
            }else{
               alert("No data found...");
                }
             }
         });  
  }
function getempbyrole(profile)
{
  $.ajax({
             url: 'get-emp-by-role/'+profile,
             type: "GET",             
             success:function(city) 
             {      
              var data=  JSON.parse(city);                  
              // alert(State); 
               $('#divuser').empty();
               var arr=Array();              
              if(data.length > 0){
              $.each(data,function(index,val){ 
                //alert(val.FBAID);
              if(val.UId!=null && val.UId!='')
              {
              arr.push('<tr><td><input type="checkbox" id="btnuser" onclick="getuser();" name="city" class="btnuser" value="'+val.UId+'" >  '+val.EmployeeName+'</td></tr>'); 
               }
            });
              //alert(arr);
               $('#divuser').append(arr);
            }else{
               alert("No data found...");
                }                     
             }
         }); 
}
  $(document).on("keyup",".search_id",function(){ 
         var input, filter, table, tr, td, i;
         input = document.getElementById("myInput");
         filter = input.value.toUpperCase();
         table = document.getElementById("myTable");
         tr = table.getElementsByTagName("tr");
         for (i = 0; i < tr.length; i++){
           td = tr[i].getElementsByTagName("td")[0];            
           if (td)
            {
             if (td.innerHTML.toUpperCase().indexOf(filter) > -1) 
             {
               tr[i].style.display = "";
             }else{
                tr[i].style.display = "none";
              }
            }       
           }
    });
    
$("#btnsms").click(function(){  
    if ($(this).is(':checked')){           
          $("#divsmstaplate").show();
          $("#divbtnall").show();
          $("#txtsms").prop('required',true);
          $("#ddlsms").prop('required',true);
        }else{
          $("#divsmstaplate").hide();
          $("#divbtnall").hide();
          $("#txtsms").prop('required',false);
          $("#ddlsms").prop('required',false);
        }
});
$("#btnemail").click(function(){  
    if ($(this).is(':checked')){           
          $("#divmailtaplate").show();
          $("#txtmail").prop('required',true);
          $("#dllmail").prop('required',true);
          $("#divbtnall").show();
        }else{
          $("#divmailtaplate").hide();
          $("#divbtnall").hide();
          $("#dllmail").prop('required',false);
          $("#txtmail").prop('required',false);
        }
});
$("#btnpushnot").click(function(){  
    if ($(this).is(':checked')){           
          $("#Divpushnotify").show();
          $("#ddlnotfiy").prop('required',true);
          $("#txtscheduledatetimnot").prop('required',true);
          $("#divbtnall").show();
        }else{
          $("#Divpushnotify").hide(); 
          $("#divbtnall").hide();              
          $("#dllmail").prop('required',false);
          $("#txtmail").prop('required',false);
        }
});

$("#btnshow").click(function(){
   if ($("#dlltype").val()==2){   
       if($("#txtcity").val()!=''){
        var cityname=$("#txtcity").val();
        getpaidfbabycitydate();
       }else if($("#txtcityall").val()!=''){
       var cityname=$("#txtcityall").val();
       getpaidfbabycitydate();
      }else{
        getpaidfba();
      }       
    }
    else if($("#dlltype").val()==1){
  if($("#txtcity").val()!=''){
 var cityname=$("#txtcity").val();
}else if($("#txtcityall").val()!=''){
   var cityname=$("#txtcityall").val();
}else{
  getfbaonregdate();
}
if ($("#txttodate").val()!='' && $("#txtfromdate").val()!='' && $("#txtcityall").val()!=''||$("#txtcity").val()!=''){
  var todate=$("#txttodate").val();
  var fromdate=$("#txtfromdate").val();
  var v_token = "{{csrf_token()}}";
     $.ajax({
             url:"{{URL::to('get-fba-by-city')}}",
             type: "POST", 
             data:{"_token":v_token,"todate":todate,"fromdate":fromdate,"cityname":cityname} ,           
             success:function(DATA) 
             {      
              var data = JSON.parse(DATA);
             // alert(data);
              $('#sendsms_id').empty();
             var arr=Array();
              $('#msg_count').text(data.length);
              if(data.length > 0){
              $.each(data,function(index,val){ 
                //alert(val.FBAID);
              if(val.FBAID!=null && val.FBAID!='0')
              {
              arr.push('<tr><td><input  type="checkbox" id="txtFBAID" name="txtFBAID[]" onclick="getfbaid()" class="check_list" value="'+val.FBAID+'" >'+val.FullName  +':'+val.MobiNumb1+'</td> </tr>'); 
               }
           });
              //alert(arr);
               $('#sendsms_id').append(arr);
            }else{
               alert("No data found...");
                }
             }
         });  
     }else if($("#txttodate").val()=='' && $("#txtfromdate").val()==''&& $("#dlltype").val()==1 &&$("#cityname").val()!=''){
      alert('Enter Correct Date');
     }
   }
});

function getfbaonregdate()
{
  if ($("#txttodate").val()!='' && $("#txtfromdate").val()!=''){
  var todate=$("#txttodate").val();
  var fromdate=$("#txtfromdate").val();
     $.ajax({
             url: 'get-fba-by-reg-date/'+todate+'/'+fromdate,
             type: "GET",             
             success:function(DATA) 
             {      
              var data = JSON.parse(DATA);
             // alert(data);
              $('#sendsms_id').empty();
             var arr=Array();
              $('#msg_count').text(data.length);
              if(data.length > 0){
              $.each(data,function(index,val){ 
                //alert(val.FBAID);
              if(val.FBAID!=null && val.FBAID!='0')
              {
              arr.push('<tr><td><input  class="check_list" type="checkbox" id="txtFBAID" name="txtFBAID[]" onclick="getfbaid()" value="'+val.FBAID+'" >'+val.FullName  +':'+val.MobiNumb1+'</td> </tr>'); 
               }
           });
              //alert(arr);
               $('#sendsms_id').append(arr);
            }else{
               alert("No data found...");
                }
             }
         });  
     }else if ($("#txttodate").val()=='' && $("#txtfromdate").val()=='' && $("#dlltype").val()==1){
      alert('Enter Correct Date');
     }

}
 
 function getpaidfba()
 {
  if ($("#txttodate").val()!='' && $("#txtfromdate").val()!=''){
  var todate=$("#txttodate").val();
  var fromdate=$("#txtfromdate").val();
     $.ajax({
             url: 'get-fba-by-pay-date/'+todate+'/'+fromdate,
             type: "GET",             
             success:function(DATA) 
             {      
              var data = JSON.parse(DATA);
             // alert(data);
              $('#sendsms_id').empty();
             var arr=Array();
              $('#msg_count').text(data.length);
              if(data.length > 0){
              $.each(data,function(index,val){ 
                //alert(val.FBAID);
              if(val.FBAID!=null && val.FBAID!='0')
              {
              arr.push('<tr><td><input  class="check_list" type="checkbox" id="txtFBAID" name="txtFBAID[]" onclick="getfbaid()" value="'+val.FBAID+'" >'+val.FullName  +':'+val.MobiNumb1+'</td> </tr>'); 
               }
           });
              //alert(arr);
               $('#sendsms_id').append(arr);
            }else{
               alert("No data found...");
                }
             }
         });  
     }else if($("#txttodate").val()=='' && $("#txtfromdate").val()=='' && $("#dlltype").val()==2){
      alert('Enter Correct Date');
     }    
 }

 function getpaidfbabycitydate()
 {
   if($("#txtcity").val()!='') {
 var cityname=$("#txtcity").val();
}else if($("#txtcityall").val()!=''){
   var cityname=$("#txtcityall").val();
}
  if ($("#txttodate").val()!='' && $("#txtfromdate").val()!='' && $("#txtcityall").val()!='' || $("#txtcity").val()!=''){
  var todate=$("#txttodate").val();
  var fromdate=$("#txtfromdate").val();
  var v_token = "{{csrf_token()}}";
     $.ajax({
             url: "{{URL::to('get-fba-by-city-paid-date')}}",
             type: "POST",    
             data:{"_token":v_token,"todate":todate,"fromdate":fromdate,"cityname":cityname},         
             success:function(DATA) 
             {      
              var data = JSON.parse(DATA);
             // alert(data);
              $('#sendsms_id').empty();
             var arr=Array();
              $('#msg_count').text(data.length);
              if(data.length > 0){
              $.each(data,function(index,val){ 
                //alert(val.FBAID);
              if(val.FBAID!=null && val.FBAID!='0')
              {
              arr.push('<tr><td><input  type="checkbox" id="txtFBAID" name="txtFBAID[]" onclick="getfbaid()" class="check_list" value="'+val.FBAID+'" >'+val.FullName  +':'+val.MobiNumb1+'</td> </tr>'); 
               }
           });
              //alert(arr);
               $('#sendsms_id').append(arr);
            }else{
               alert("No data found...");
                }
             }
         });  
     }else if($("#txttodate").val()=='' && $("#txtfromdate").val()==''&& $("#dlltype").val()==2 && $("#cityname").val()!=''){
      alert('Enter Correct Date');
     }
 }

 function getempfba(user)
 {
  if (user!=''){
     $.ajax({
             url: 'get-fba-by-emp/'+user,
             type: "GET",             
             success:function(DATA) 
             {      
              var data = JSON.parse(DATA);
             // alert(data);
              $('#sendsms_id').empty();
             var arr=Array();
              $('#msg_count').text(data.length);
              if(data.length > 0){
              $.each(data,function(index,val){ 
                //alert(val.FBAID);
              if(val.FBAID!=null && val.FBAID!='0')
              {
              arr.push('<tr><td><input  type="checkbox" id="txtFBAID" name="txtFBAID[]" onclick="getfbaid()" class="check_list" value="'+val.FBAID+'" >'+val.FullName  +':'+val.MobiNumb1+'</td> </tr>'); 
               }
           });
              //alert(arr);
               $('#sendsms_id').append(arr);
            }else{
               alert("No data found...");
                }
             }
         });  
     }else if($("#txttodate").val()=='' && $("#txtfromdate").val()==''){
      alert('Enter Correct Date');
     }
    
 }
 function getsmsbody(){
  $('#txtsms').val('');
 var smstampid= $("#ddlsms").val();
 if ($("#ddlsms").val()=='other'){
  $('#txtsms').val(''); 
  $('#txtsms').prop('readonly', false); 
 }else{
  $.ajax({
             url: 'get-sms-body/'+smstampid,
             type: "GET",             
             success:function(DATA) 
             {        
              $("#txtsms").val('');      
              var data = JSON.parse(DATA);      
              $('#txtsms').prop('readonly', true);       
              $("#txtsms").val(data[0].Template);
              
             }
        });
  }
 }
function getmailbody()
{
  $('#txtmail').val('');
 var mailtamppid= $("#dllmail").val();
  if ($("#dllmail").val()=='other'){
  $('#txtmail').val(''); 
  $('#txtmail').prop('readonly', false); 
 }else{
  $.ajax({
             url: 'get-mail-body/'+mailtamppid,
             type: "GET",             
             success:function(DATA) 
             {        
              $("#txtmail").val('');      
              var data = JSON.parse(DATA);   
                $('#txtmail').prop('readonly', true);           
              $("#txtmail").val(data[0].mail_body);
             }
        });
   }
 }
$("#btnsendsmslater").click(function(){
   if ($("#btnsms").is(':checked')){           
          $("#txtscheduledatetime").prop('required',true);
        }else{
           $("#txtscheduledatetime").prop('required',false);
        }  
  if ($("#btnemail").is(':checked')){           
          $("#txtscheduledatetimemail").prop('required',true);
        }else{
          $("#txtscheduledatetimemail").prop('required',false);
        }
        if ($("#btnpushnot").is(':checked')){           
          $("#txtscheduledatetimnot").prop('required',true);
        }else{
          $("#txtscheduledatetimnot").prop('required',false);
        }    
 if ($("#txtfbaid").val()==''){
    alert('FBA must Selected');
 }
});
$("#btnsendsms").click(function(){
  $("#divdate").hide();
  $("#divdatemail").hide();
  $("#divdatenot").hide();
  $("#txtscheduledatetime").prop('required',false);
  $("#txtscheduledatetimemail").prop('required',false);
    $("#txtscheduledatetimnot").prop('required',false);
 if ($("#txtfbaid").val()==''){
    alert('FBA must Selected');
    $("#btnselectallfba").focus();
 }
});

function getnotificationdata(){
  var id=$("#ddlnotfiy").val();
  //alert(id);
  $.ajax({
             url: 'get-notifydata/'+id,
             type: "GET",             
             success:function(DATA) 
             {        
              $("#txtnotifymsg").val('');      
              var data = JSON.parse(DATA);   
                $('#txtnotifymsg').prop('readonly', true);           
              $("#txtnotifymsg").val(data[0].Message);
             }
        });
}
function getpospdonefbaoncity(){
 // alert($("#txtcity").val());
if($("#txtcity").val()!=''){
 var cityname=$("#txtcity").val(); 
}else if($("#txtcityall").val()!=''){
   var cityname=$("#txtcityall").val();  

}
 if($("#txtcity").val()!='' || $("#txtcityall").val()!='')
  {
  
  var v_token = "{{csrf_token()}}";
  //alert(v_token);
      $.ajax({
           type: "POST",   
             url:"{{URL::to('get-posp-done-fba-on-city')}}",             
             data : {"_token":v_token,"cityname":cityname},                     
             success:function(DATA) 
             {      
              var data = JSON.parse(DATA);
             //alert(data);
              $('#sendsms_id').empty();
             var arr=Array();
              $('#msg_count').text(data.length);
              if(data.length > 0){
              $.each(data,function(index,val){ 
                //alert(val.FBAID);
              if(val.FBAID!=null && val.FBAID!='0')
              {
              arr.push('<tr><td><input  type="checkbox" id="txtFBAID" name="txtFBAID[]" onclick="getfbaid()" class="check_list" value="'+val.FBAID+'" >'+val.FullName  +':'+val.MobiNumb1+'</td> </tr>'); 
               }
           });             
               $('#sendsms_id').append(arr);
            }else{
               alert("No data found...");
                }
             }
         });  
  }else{
    alert('You have to must select city');
  }
}
</script>
@endsection