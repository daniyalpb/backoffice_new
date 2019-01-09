<?php $__env->startSection('content'); ?>
<!--  <body onload="currentrecort();"> -->
 <div class="container-fluid white-bg">
   <div class="col-md-12"><h3 class="mrg-btm">System MIS</h3></div>
   
   <div class="col-md-2">
     <input type="submit" name="btnarea" id="btnarea"  class="mrg-top common-btn pull-left" value="Apply Filters" onclick="getarea()">
   </div>
<!-- <div class="col-md-2">
  <input type="submit" name="btnprofile" id="btnprofile"  class="mrg-top common-btn pull-left" value="Select Profile" onclick="getprofile()">
</div> -->
<div class="form-group">  
 <div class="col-md-12"><h3 class="mrg-btm">Insurance</h3></div>
 <div class="col-md-12">
  <div class="overflow-scroll">
    <div class="table-responsive" >
      <table id="tblreport" class="table table-bordered table-striped tbl" style="margin-right: " >
        <thead>
          <tr>
            <th>Product</th>
            <th>POSP Source</th>           
            <th>Premium</th> 
            <th>Policies</th>
            <th>Active Posp</th> 
            <th>Total GWP</th>   
            <th>Total OD</th>
            <th>Avg NOP </th> 
            <th>Avg Ticket</th> 
            <th>Avg Productivity per Posp</th>         
          </tr>
        </thead>
        <tbody id="misreport">
        </tbody>               
      </table>
    </div>
  </div>
</div>
</div>
<hr>
</div>
</div>
</div>
</div>
<input  type="hidden" id="txtproduct" name="txtproduct" >
<input type="hidden" name="txtallzone" id="txtallzone">    
<input type="hidden" name="txtzone" id="txtzone">

<input type="hidden" name="txtstateall" id="txtstateall">  
<input type="hidden" name="txtstate" id="txtstate">

<input type="hidden" name="txtallprofile" id="txtallprofile">
<input type="hidden" name="txtprofile" id="txtprofile">

<input type="hidden" name="txtuserall" id="txtuserall">
<input type="hidden" name="txtuser" id="txtuser">
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
        <div class="col-md-4">
          <div class="form-group">
            <p>From Date</p>
            <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd">
             <input class="form-control date-range-filter" type="text" placeholder="From Date" name="fdate" id="min" readonly />
             <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
           </div>
         </div>
       </div>
       <div class="col-md-4">
        <div class="form-group">
          <p>To Date</p>
          <div id="datepicker1" class="input-group date" data-date-format="yyyy-mm-dd">
            <input class="form-control date-range-filter" type="text" placeholder="To Date"  name="ldate"  id="max" readonly/>
            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
          </div>
        </div>
      </div>  
      <table class="col-md-12">
        <tr>        
          <td class="col-md-4">   
            <label>Product:</label>
            <input type="checkbox" name="btnselectallproduct" id="btnselectallproduct" class="btnselectallproduct" value="1"> <b>Select all</b>
            <div style="overflow-y:scroll;height:270px;">                           
              <table> 
                <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                        
                <tr>
                  <td>
                    <input type="checkbox" name="btnproductname" id="btnproductname" class="btnproductname" value="<?php echo e($val->ProductName); ?>"> <?php echo e($val->ProductName); ?>

                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </table>   
            </div>
          </td>   
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
       </tr>         
     </table>         
   </div>        
   <!-- Modal footer -->
   <div class="modal-footer">
    <input type="submit" name="btndate" id="btndate"  class="common-btn" value="SHOW">     
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  </div>
</div>
</div>
</div>
<!-- The Modal profile-->
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
                <?php $__currentLoopData = $profile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="profile">
                  <td>
                    <input type="checkbox" name="btnprofile" id="btnprofile" class="btnprofile" value="<?php echo e($val->role_id); ?>"> <?php echo e($val->Profile); ?>

                  </td>
                </tr>     
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                     
              </table>   
            </div>
          </td>
          <td class="col-md-4">
            <label>User`s:</label>   
            <input type="checkbox" name="btnselectalluser" id="btnselectalluser" class="btnselectalluser"> <b>Select all</b>  
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

    $('#btndate').on("click", function(){
     $('#misreport>tbody').empty();
     var startdate = $('#min').val();
     var enddate = $('#max').val();
     if(startdate =="" || enddate==""){
      alert("Please select date Range");
      return false;
    }  
      if(($("#txtstate").val()!='' && $("#txtproduct").val()==='')){          
       $('#misreport>tbody').empty();
       getmmisdatawithstate();
     }else if( $("#txtproduct").val()!='' && $("#txtstate").val()===''){
      //getmisdataonprofile();
      getmisreportonproduct();
    }else if($("#txtstate").val()!='' && $("#txtproduct").val()!=''){
      getmisrepowithstatenproduct();
    }
    else{ 
     $('#misreport>tbody').empty();
     var startdate = $('#min').val();
     var enddate = $('#max').val();
     if(startdate =="" || enddate==""){
      alert("Please select date Range");
      return false;
    }else{
      $.ajax({ 
       url: 'mis-report-with-date/'+startdate+'/'+enddate,
       dataType : 'json',
       method:"GET",
       success: function(msg){  
    $('#misreport').empty();
    if(msg!='' && msg!=null){     

     arr=Array();
     $.each(msg, function(index,val){ 

       arr.push("<tr><td>" + val.ProductName+"</td><td>" + val.POSPSource +"</td><td>" + val.Premium +"</td><td>" + val.Policy + "</td><td>" + val.ActivePOSP +"</td><td>" + val.TotalGWP +"</td><td>" + val.Total_OD +"</td><td>" + val.AvgNOP +"</td><td>" + val.AvgTicket +"</td><td>" + val.AvgProduct +"</td></tr>");
     });

     $('#misreport').append(arr); 
     $("#Areamodal").modal('hide');
  }else{
   $('#misreport>tbody').empty()
   $('#misreport').append("<tr><td colspan=10>Record not found</td></tr>")
   $("#Areamodal").modal('hide');
 }

}
});

    }
  }
});

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
        
      }

    });
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
     var statecount=$(".btnstate:checked:checked").length;
     // alert(state);
     $("#txtstate").val('');
     $("#txtstate").val(state);            
   });

  });  

  function getarea()
  { 
    $('#Areamodal').modal('show');       
  }
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
                  arr.push('<tr><td><input type="checkbox" id="btnstate" onclick="getstatevalue();" name="btnstate" class="btnstate" value="'+val.state_id+'" >  '+val.state_name+'</td></tr>'); 
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
  function getstatevalue(){
 // alert('click');
 var state = [];
 $.each($("input[class='btnstate']:checked"), function(){            
  state.push($(this).val());
});   
 var statecount=$(".btnstate:checked:checked").length;
 $("#txtstate").val('');
 $("#txtstate").val(state); 
}
function getmmisdatawithstate(){
 if ($("#txtstate").val()!=''){
  var state=$("#txtstate").val();
}else if($("#txtstateall").val()!=''){
  var state=$("#txtstateall").val();
}else{
  alert('select state');
}

if (state!=''&&$("#min").val()!=''&&$("#max").val()!=''){
    //alert($('#max').val());
    $.ajax({ 
     url: 'mis-report-with-date-state/'+$('#min').val()+'/'+$('#max').val()+'/'+state,
     dataType : 'json',
     method:"GET",
     success: function(msg){
    //$('#misreportf').empty();
    $('#misreport').empty();
    if(msg!='' && msg!=null){     

     arr=Array();
     $.each(msg, function( index, val ){ 

       arr.push("<tr><td>" + val.ProductName+"</td><td>" + val.POSPSource +"</td><td>" + val.Premium +"</td><td>" + val.Policy + "</td><td>" + val.ActivePOSP +"</td><td>" + val.TotalGWP +"</td><td>" + val.Total_OD +"</td><td>" + val.AvgNOP +"</td><td>" + val.AvgTicket +"</td><td>" + val.AvgProduct +"</td></tr>");
     });
     $("#Areamodal").modal('hide');
     $('#misreport').append(arr); 
      /*$('#tblreport').dataTable({
        "ordering": false,
         "paging": false
       }); */ 
     //$('#misreport tr:last').css({'background-color':'#8cc9e2 ','font-size':'20px'});
    // $('#misreport tr:last').prev().find("tr").css({'background-color':'#8cc9e2 ','font-size':'20px'});

  }else{
   $('#misreport>tbody').empty()
   $('#misreport').append("<tr><td colspan=10>Record not found</td></tr>")
   $("#Areamodal").modal('hide');
 }

}
});
  }
}
function getprofile(){
  if ($("#min").val()!=''&&$("#max").val()!='') {
    $('#profilemodal').modal('show');   
  }else{
   alert("Please select date Range");
 }   
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

function getuser(){
 var user = [];
 $.each($("input[class='btnuser']:checked"), function(){            
  user.push($(this).val());
});
   // alert(user);
   $("#txtuser").val('');
   $("#txtuser").val(user);
   if ($(".btnuser").is(':checked')){           
         // getempfba(user);
       }else{
        $('#sendsms_id').empty();       
      }
      var empcount=$(".btnuser:checked:checked").length;
      if (empcount!=0){
        $("#btnprofile").val('Selected Employee # '+empcount);
      }
    }
    $("#btnselectalluser").click(function(){
  //alert('test');
  $('.btnuser').not(this).prop('checked', this.checked);
  $(".btnuser:checkbox:checked");
  var user = [];    
  $.each($("input[class='btnuser']:checked"), function(){            
    user.push($(this).val());
  });      
      //alert(profile);

      $("#txtuserall").val('');
      $("#txtuserall").val(user);
      $("#btnprofile").val()
      var empcount=$(".btnuser:checked:checked").length;
      if (empcount!=0){
        $("#btnprofile").val('Selected Employee # '+empcount);
      }



    });
    function getmisdataonprofile(){
      if ($("#txtuserall").val()!='') {
        var uid=$("#txtuserall").val();
      }else if($("#txtuser").val!=''){
        var uid=$("#txtuser").val();
      }else{
        alert('select profile');
      }
      var startdate=$("#min").val();
      var enddate=$("#max").val();
      if (uid!=''&&startdate!=''&&enddate!=''){
        var v_token = "<?php echo e(csrf_token()); ?>";
        $.ajax({
         url:"<?php echo e(URL::to('get-mis-data-on-profile')); ?>",
         dataType : 'json', 
         type: "POST", 
         data:{"_token":v_token,"startdate":startdate,"enddate":enddate,"Uids":uid},        
         success:function(msg) 
         {  
    //$('#misreportf').empty();
    $('#misreport').empty();
    if(msg!='' && msg!=null){     

     arr=Array();
     $.each(msg, function( index, val ){ 

       arr.push("<tr><td>" + val.ProductName+"</td><td>" + val.POSPSource +"</td><td>" + val.Premium +"</td><td>" + val.Policy + "</td><td>" + val.ActivePOSP +"</td><td>" + val.TotalGWP +"</td><td>" + val.Total_OD +"</td><td>" + val.AvgNOP +"</td><td>" + val.AvgTicket +"</td><td>" + val.AvgProduct +"</td></tr>");
     });
     $("#Areamodal").modal('hide');
     $('#misreport').append(arr); 
      /*$('#tblreport').dataTable({
        "ordering": false,
         "paging": false
       }); */ 
     //$('#misreport tr:last').css({'background-color':'#8cc9e2 ','font-size':'20px'});
    // $('#misreport tr:last').prev().find("tr").css({'background-color':'#8cc9e2 ','font-size':'20px'});

  }else{
   $('#misreport>tbody').empty()
   $('#misreport').append("<tr><td colspan=10>Record not found</td></tr>")
 }
}
});
      }
    }
    function getproduct(){
      $("#modalproduct").modal('show');

    }
    $("#btnselectallproduct").click(function(){
     $(".btnproductname").not(this).prop('checked', this.checked);
     $(".btnproductname:checkbox:checked");
     var product = [];    
     $.each($("input[class='btnproductname']:checked"), function(){            
      product.push($(this).val());
    });      
      //alert(zone);
      $("#txtproduct").val('');
      $("#txtproduct").val(product);
      if ($(".btnproductname").is(':checked')){           
        //getstate(zone);
      }
    });
    $(".btnproductname").click(function(){
      var product = [];
      $.each($("input[class='btnproductname']:checked"), function(){            
        product.push($(this).val());
      });
    //alert(zone);
    $("#txtproduct").val('');
    $("#txtproduct").val(product);
    if ($(".txtproduct").is(':checked')){           
      //getstate(zone);
    }
  });


    function getmisreportonproduct(){
     if ($("#txtproduct").val()!=''){
      var product=$("#txtproduct").val();
    }else if($("#txtproductall").val()!=''){
      var product=$("#txtproductall").val();
    }else{
      alert('Select Product');
    }

    if (product!=''&&$("#min").val()!=''&&$("#max").val()!=''){
    //alert($('#max').val());
    $.ajax({ 
     url: 'mis-report-with-date-product/'+$('#min').val()+'/'+$('#max').val()+'/'+product,
     dataType : 'json',
     method:"GET",
     success: function(msg){
    //$('#misreportf').empty();
    $('#misreport').empty();
    if(msg!='' && msg!=null){     

     arr=Array();
     $.each(msg, function( index, val ){ 

       arr.push("<tr><td>" + val.ProductName+"</td><td>" + val.POSPSource +"</td><td>" + val.Premium +"</td><td>" + val.Policy + "</td><td>" + val.ActivePOSP +"</td><td>" + val.TotalGWP +"</td><td>" + val.Total_OD +"</td><td>" + val.AvgNOP +"</td><td>" + val.AvgTicket +"</td><td>" + val.AvgProduct +"</td></tr>");
     });
     $("#Areamodal").modal('hide');
     $('#misreport').append(arr); 
      /*$('#tblreport').dataTable({
        "ordering": false,
         "paging": false
       }); */ 
     //$('#misreport tr:last').css({'background-color':'#8cc9e2 ','font-size':'20px'});
    // $('#misreport tr:last').prev().find("tr").css({'background-color':'#8cc9e2 ','font-size':'20px'});

  }else{
   $('#misreport>tbody').empty()
   $('#misreport').append("<tr><td colspan=10>Record not found</td></tr>")
   $("#Areamodal").modal('hide');
 }

}
});
  }
}
function getmisrepowithstatenproduct(){
    var state=$("#txtstate").val(); 
    var product=$("#txtproduct").val();
  //alert(product);
  var startdate=$("#min").val();
  var enddate=$("#max").val();
  if (state!=''&& startdate!='' && enddate!=''&& product!=''){
    var v_token = "<?php echo e(csrf_token()); ?>";
    $.ajax({
     url:"<?php echo e(URL::to('get-mis-data-on-product-state')); ?>",
     dataType : 'json', 
     type: "POST", 
     data:{"_token":v_token,"startdate":startdate,"enddate":enddate,"state":state,"product":product},        
     success:function(msg) 
     {  
     // alert(msg);
    //$('#misreportf').empty();
    $('#misreport').empty();
    if(msg!='' && msg!=null){     
  
     arr=Array();
     $.each(msg, function( index, val ){ 

       arr.push("<tr><td>" + val.ProductName+"</td><td>" + val.POSPSource +"</td><td>" + val.Premium +"</td><td>" + val.Policy + "</td><td>" + val.ActivePOSP +"</td><td>" + val.TotalGWP +"</td><td>" + val.Total_OD +"</td><td>" + val.AvgNOP +"</td><td>" + val.AvgTicket +"</td><td>" + val.AvgProduct +"</td></tr>");
     });
     $("#Areamodal").modal('hide');
     $('#misreport').append(arr); 
      /*$('#tblreport').dataTable({
        "ordering": false,
         "paging": false
       }); */ 
     //$('#misreport tr:last').css({'background-color':'#8cc9e2 ','font-size':'20px'});
    // $('#misreport tr:last').prev().find("tr").css({'background-color':'#8cc9e2 ','font-size':'20px'});

  }else{
   $('#misreport>tbody').empty();
   $('#misreport').append("<tr><td colspan=10>Record not found</td></tr>");
   $("#Areamodal").modal('hide');
 }
}
});
  }
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>