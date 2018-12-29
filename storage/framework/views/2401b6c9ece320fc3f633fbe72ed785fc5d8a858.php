


<?php $__env->startSection('content'); ?>



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
         <th>Payment Link</th>

       </tr>
     </thead>
     <tbody > 

     <tr>
       <td><?php echo e($data->fbaid); ?></td>
       <td><?php echo e($data->FullName); ?></td>
       <td><?php echo e($data->EMaiID); ?></td>

       <td> <?php if($data->PayStat=="S"): ?>
       <span class="glyphicon glyphicon-blank"></span> 
        <?php else: ?>                    
       <a onclick="getpaymentlink(<?php echo e($data->fbaid); ?>,<?php echo e($data->MobiNumb1); ?>)" id="btnviewhistory" data-toggle="modal" data-target="#paylink_payment" onclick="getpaylinknew('<?php echo e($data->fbaid); ?>','<?php echo e($data->MobiNumb1); ?>')">Payment link</a>
   <?php endif; ?>
   <!--   <span class="glyphicon glyphicon-envelope"></span> -->
       </td>

     </tr>

     <tr>
      <th>Password</th>
      <th>Pincode</th>
      <th>POSP No(SSID)</th>
      <th>Loan ID</th> 

    </tr>
    <tr>

      <td><a id="btnshowpassword" data-toggle="modal" data-target="#spassword" onclick="getpassword('<?php echo e($data->pwd); ?>')">*****</a>
      </td>
      <td><?php echo e($data->Pincode); ?></td>
      <td>
       <?php if($data->POSPNo==''): ?>
       <a id="posp_<?php echo e($data->fbaid); ?>" class="checkPosp" data-toggle="modal" data-target="#updatePosp" onclick="updateposp('<?php echo e($data->fbaid); ?>')">update</a>
       <?php else: ?>
       <span id="posp_<?php echo e($data->fbaid); ?>" class="checkPosp" href="#" ><?php echo e($data->POSPNo); ?></span>
       <?php endif; ?>
     </td> 
     <!-- <td><a id="btnviewid <?php echo e($data->fbaid); ?>" onclick="getloanid(this,'<?php echo e($data->fbaid); ?>')">Update</a></td>  -->

  <td>
        <?php if($data->LoanID==''): ?>
        <a id="btnviewid<?php echo e($data->fbaid); ?>" onclick="getloanid(this,'<?php echo e($data->fbaid); ?>')">Update</a>
        <?php else: ?>
        <span id="btnviewid<?php echo e($data->fbaid); ?>"><?php echo e($data->LoanID); ?></span>
        <?php endif; ?>
       </td>
     

   </tr>

   <tr>
    <th>Posp Status</th> 
    <th>Bank Account</th>
    <th>Partner Info</th> 
    <th>Referer Code</th> 


  </tr>
  <tr>

    <td><?php echo e($data->pospstatus); ?></td>  
    <td><?php echo e($data->bankaccount); ?></td>  
    <td><a href="" data-toggle="modal" data-target="#partnerInfo"onclick="getpartnerinfo('<?php echo e($data->fbaid); ?>')">partner info</a>

      <td><?php echo e($data->Refcode); ?></td> 
    </tr>  
    <tr>
      <th>Referedby Code</th>   
      <th>Sales code</th>
      <th>FSM Details</th>  
      <th>Customer ID</th> 

    </tr>  
    <tr>
      <td><?php echo e($data->Refbycode); ?></td>   

      <td>
       <?php if($data->salescode=='' || $data->salescode=='Update'): ?>
        <a id="update_<?php echo e($data->fbaid); ?>" onclick="sales_update_fn('<?php echo e($data->fbaid); ?>'),('<?php echo e($data->fbaid); ?>')">Update</a>
        <?php else: ?>
        <a id="update_<?php echo e($data->fbaid); ?>" onclick="sales_update_fn('<?php echo e($data->fbaid); ?>',<?php echo e($data->salescode); ?>)">  <?php echo e($data->salescode); ?></a>
        <?php endif; ?>
      </td>

      <td><a href="#" style="" data-toggle="modal" data-target=".fsmdetails">Fsm details</a></td>


      <td>
        <?php if($data->CustID==''): ?>
        <a id="btnviewcid<?php echo e($data->fbaid); ?>" onclick="getcustomerid(this,'<?php echo e($data->fbaid); ?>')">Update</a>
        <?php else: ?>
        <span id="btnviewcid<?php echo e($data->fbaid); ?>"><?php echo e($data->CustID); ?></span>
        <?php endif; ?>
       </td>
       </tr>
      <tr>
      <th>Type</th> 
      <th>Erp Id</th>    
      <th>AppSource</th> 
      <th>State</th>  

  
      
    </tr>
    <tr>


      <td>
         <?php if($data->Type==''): ?>
     <span id="bind_updated_type_<?php echo e($data->fbaid); ?>"><a id="type<?php echo e($data->fbaid); ?>" data-toggle="modal" onclick="Gettype('<?php echo e($data->fbaid); ?>',this)" data-target="#myModal">Update</a><span id="bind_updated_type_<?php echo e($data->fbaid); ?>"></span>  
        <?php else: ?>
      <span id="type<?php echo e($data->fbaid); ?>"><?php echo e($data->Type); ?></span>
       <?php endif; ?>
      </td> 
       <td><?php echo e($data->erpid); ?></td>
       <td><?php echo e($data->AppSource); ?></td>
      <td><?php echo e($data->statename); ?></td>
    
    </tr>

        <tr>
      <th>Document</th>
      <th>RRM Name</th> 
      <th>Field sales</th>
       <th></th>
    </tr>
      <tr>

     <td>
              
       <?php if($data->isdocupload=='Uploaded'): ?>
    <a href="" style="" data-toggle="modal"  data-target="#docviwer" onclick="docview('<?php echo e($data->fbaid); ?>')"> uploaded</a>
       <?php else: ?>
      <a data-target="#docviwer"<?php echo e($data->fbaid); ?>">Pending</a>      
      <?php endif; ?>
     
      </td>
          
       <td><?php echo e($data->RRM); ?></td>
      <td><?php echo e($data->Field_Manger); ?></td>
       
    </tr>
</tbody>
</table>
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
          <?php echo e(csrf_field()); ?>

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
         <?php echo e(csrf_field()); ?>

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
         <?php echo e(csrf_field()); ?>

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
              <?php echo e(csrf_field()); ?>

                  <label>Select Type:</label>
                  <select class="form-control" required id="ddltype" name="ddltype">
                   <option value="">---Select---</option>
                     <option value="1">FBA</option>
                     <option value="2">POSP</option> 
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
<?php echo e(csrf_field()); ?>

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
<?php $__env->stopSection(); ?>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
 $(document).ready(function() {

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
    url: "<?php echo e(URL::to('get-type')); ?>",
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

<script>
    function Gettype(fbaid){
    //alert(fbaid);
    $("#txtfbaid").val(fbaid);
    
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
     url: "<?php echo e(URL::to('pmesgsend')); ?>",
     method:"POST",
     data: $('#modelpaylink').serialize(),
     success: function(msg)  
      {
     console.log(msg);

      }
    });
  }

</script>
























<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>