@extends('include.master')
@section('content')



             <div class="container-fluid white-bg">
             <div class="col-md-12"><h3 class="mrg-btm">FBA List</h3>

        <hr>
       </div>
      <div class="col-md-3">
      <div class="form-group">
      <p>From Date</p>
         <div id="datepicker" class="input-group date" data-date-format="mm/dd/yyyy">
               <input class="form-control date-range-filter" type="text" placeholder="From Date" name="fdate" id="min"  />
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
            </div>
           </div>
       <div class="col-md-3">
       <div class="form-group">
       <p>To Date</p>
       <div id="datepicker1" class="input-group date" data-date-format="mm/dd/yyyy">
               <input class="form-control date-range-filter" type="text" placeholder="To Date" name="todate"  id="max"/>
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              </div>
            </div>
           </div>
       <div class="col-md-4">
       <div class="form-group"> <input type="submit" name="btndates" id="btndates"  class="mrg-top common-btn" value="SHOW">  </div>
       </div>
    
 
   <select  id="msds-select">
   <option value="0">Posp Type</option>
  <option value="1">POSP Yes</option>
  <option value="2">POSP No</option>
  </select>

             <div class="col-md-12">
             <div class="overflow-scroll">
             <div class="table-responsive" >
             <table class="datatable-responsive table table-striped table-bordered nowrap" id="fba-list-table">
                                       <thead>
                                       <tr>
                                       <th>FBA ID</th> 
                                       <th>Full Name</th>                                    
                                       <th>Created Date</th>
                                       <th>Mobile No</th>
                                       <th>Email ID</th>
                                       <th>Payment Link</th>
                                       <th>Password</th>
                                       <th>City</th>
                                       <th>Pincode</th>
                                       <th>FSM Details</th>
                                       <th>POSP No</th>
                                       <th>Loan ID</th>
                                       <th>Posp Name</th>
                                       <th>Partner Info</th>
                                       <th>Documents</th>
                                       <th>Bank Account</th>
                                       <th>SMS</th>
                                       <th>sales code</th>
                                        <th>Created Date1</th>
                                     </tr>
                                    </thead>
            </table>
            </div>
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



<!--  <div class="fbadoc modal fade" role="dialog">   
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
        </form>
      </div>
    </div>
  </div>
</div>

 -->


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



 <!-- fab document -->
 <!-- <div class="fbadoc modal fade" role="dialog">   
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
            <label class="control-label" for="Document-Type">Document Type: </label>
            <select class="form-control">
              <option selected="selected">select Document Type</option>
              @foreach($doctype as $val)
             <option value="{{$val->id}}">{{$val->name}}</option>
              @endforeach

            </select>
          </div>
           div class="form-group">
            <label class="control-label" for="Document">Document</label>
            <input type="file" name="document" class="form-control"> 
          </div>
        </form>
        <div class="modal-footer"> 
          <button class="btn btn-primary" id="btnupload" type="button">Upload</button>
          <input id="docfbaid" type="hidden" name="docfbaid"/>
        </div>
      </div>
    </div>
  </div>
</div> -->

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




<!-- update Loan -->
<div class="updateLoan modal fade" role="dialog">   
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">UPDATE LOAN</h4>
      </div>
      <div class="modal-body">
        <form name="update_loan" id="update_loan">
         {{ csrf_field() }}
         <div class="form-group">
            <input type="hidden" name="fba_id" id="fba_id" value=" ">
            <label class="control-label" for="remark">Enter Remark : </label>
            <input type="text" class="recipient-name form-control" id="remark" name="remark" required="" />
          </div>
        </form>
        <div class="modal-footer"> 
          <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
          <a id="loan_update" class="btn btn-primary" type="button">Update</a><b class="alert-success primary" id=""></b>          
        </div>
      </div>
    </div>
    </div>
  </div>
</div>

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
         <img id="imgdoc" style="min-height:100%; min-width:100%; overflow-y: scroll;">
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
      <div class="modal-body">
    <div style="color: blue;" id="divpartnertable_payment" class="divpartnertable_payment">
       
    </div>
      </div>
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


@endsection

<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">

  $(document).ready(function() {

    $('#fba-list-table').DataTable({

      "createdRow": function(row, data, dataIndex ) {
      if ( data.PayStat=="S" ) {
        $(row).css({backgroundColor: 'LightGreen'});
      }
    },
        "order": [[ 18, "desc" ]],
        "ajax": "get-fba-list",
        "columns": [
             { "data": "fbaid"},
            { "data": "FullName"},            
            { "data": "createdate" },
            { "data": "MobiNumb1" },
            { "data": "EMaiID" },
            { "data": "Link",
              "render": function ( data, type, row, meta ) {
                return '<a id="btnviewhistory" data-toggle="modal" data-target="#paylink_payment" onclick="getpaymentlink('+row.fbaid+')">Payment link</a>';
              }
             }, 

            {"data":"pwd" ,
           
             "render": function ( data, type, row, meta ) {
              
                return '<a id="btnshowpassword" data-toggle="modal" data-target="#spassword" onclick="getpassword('+"'"+ data+"'"+')">*****</a>';
              }

       },         
            {"data":"City"},
            {"data":"Pincode"},
            {"data":null  ,
             "render": function ( data, type, row, meta ) {
                return '<a href="#" style="" data-toggle="modal" data-target=".fsmdetails">Fsm details</a>';
              }
            },
            {"data":"POSPNo"  ,
             "render": function ( data, type, row, meta ) {
              return data==""?('<a id="posp_'+row.fbaid+'" class="checkPosp" data-toggle="modal" data-target="#updatePosp" onclick="POSP_UPDATE('+row.fbaid+')">update</a>'):data;
              }
            },  

            {"data":"LoanID"  ,
             "render": function ( data, type, row, meta ) {
                return data==""?('<a id="loan_'+row.fbaid+'" class="checkloan" data-toggle="modal" data-target="#updateLoan" onclick="LoanID_UPDATE('+row.fbaid+')">update</a>'):data;
              }
            },  
            {"data":"pospname"},  
            {"data":null  ,
             "render": function ( data, type, row, meta ) {
                return '<a href="" data-toggle="modal" data-target="#partnerInfo" onclick="getpartnerinfo('+row.fbaid+')">partner info</a>';
              }
            },  

       {"data":"fdid" ,
             "render": function ( data, type, row, meta ) {
      return data == 1?'<a href="" style="" data-toggle="modal"  data-target="#docviwer" onclick="docview('+row.fbaid+')" >uploaded</a>':'pending';
       }
        },
    

            {"data":"bankaccount"} ,
            {"data":"MobiNumb1" ,
             "render": function ( data, type, row, meta ) {
                return '<a href="#" data-toggle="modal" data-target="#sms_sent_id" onclick="SMS_FN(1,'+data+')"><span class="glyphicon glyphicon-envelope"></span></a>';
              }
            },
            {"data":"salescode" ,
             "render": function ( data, type, row, meta ) {
             
            return data=="Update"?('<a  id="update_'+row.fbaid+'" onclick="sales_update_fn('+row.fbaid+')" >'+data+'</a>'):data;
              }
   
},
            { "data": "createdate1","visible":false }
            
        ],

    });//.column('0:visible').order('desc').draw();


});  






// from date to date start

$(document).ready(function(e) {
  // Bootstrap datepicker
  $('.input-daterange input').each(function() {
    $(this).datepicker('clearDates');
  });

// Re-draw the table when the a date range filter changes
  $('#btndates').click(function() { 
    
   $.fn.dataTableExt.afnFiltering.push(

function (oSettings, aData, iDataIndex) {
    if (($('#min').length > 0 && $('#min').val() !== '') || ($('#max').length > 0 && $('#max').val() !== '')) {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth();
        var yyyy = today.getFullYear();
//console.log(today+"-- "+dd+" --"+mm+" --"+yyyy);
        if (dd < 10) dd = '0' + dd;

        if (mm < 10) mm = '0' + mm;

        today = mm + '/' + dd + '/' + yyyy;
        var minVal = $('#min').val();
        var maxVal = $('#max').val();
        //alert(minVal+"   ----   "+maxVal);
        if (minVal !== '' || maxVal !== '') {
            var iMin_temp = minVal;
            if (iMin_temp === '') {
                iMin_temp = '01/01/1980';
            }

            var iMax_temp = maxVal;
            var arr_min = iMin_temp.split("/");

            var arr_date = aData[2].split("/");
 //console.log(arr_min[2]+"-- "+arr_min[0]+" --"+arr_min[1]);
             var iMin = new Date(arr_min[2], arr_min[0]-1, arr_min[1]);
          //  console.log(iMin);
           // console.log(" --"+yyy);
           

            var iMax = '';
            if (iMax_temp != '') {
                var arr_max = iMax_temp.split("/");
                iMax = new Date(arr_max[2], arr_max[0]-1, arr_max[1], 0, 0, 0, 0);
            }




            var iDate = new Date(arr_date[2], arr_date[0]-1, arr_date[1], 0, 0, 0, 0);
            //alert(iMin+" -- "+iMax);
      //  console.log("Test data "+iMin+" -- "+iMax+"-- "+iDate+" --"+(iMin <= iDate && iDate <= iMax));
            if (iMin === "" && iMax === "") {
                return true;
            } else if (iMin === "" && iDate < iMax) {
                // alert("inside max values"+iDate);
                return true;
            } else if (iMax === "" && iDate >= iMin) {
                // alert("inside max value is null"+iDate);                    
                return true;
            } else if (iMin <= iDate && iDate <= iMax) {
              //  alert("inside both values"+iDate);
                return true;
            }
            return false;
        }
    }
    return true;
});

  var table = $('#fba-list-table').DataTable();
    table.draw();
  });

  $('.date-range-filter').datepicker();
});
</script>
<!-- from date to date end -->  