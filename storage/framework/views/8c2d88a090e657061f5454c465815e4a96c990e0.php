<?php $__env->startSection('content'); ?>
 <div class="container-fluid white-bg">
   <div class="col-md-12"><h3 class="mrg-btm">All India Fbalist</h3></div>   
   <div class="col-md-2">
     <input type="submit" name="btnarea" id="btnarea"  class="mrg-top common-btn pull-left" value="Apply Filters" onclick="getarea()">
   </div>
</div>
<input type="hidden" name="txtallzone" id="txtallzone">    
<input type="hidden" name="txtzone" id="txtzone">

<input type="hidden" name="txtstateall" id="txtstateall">  
<input type="hidden" name="txtstate" id="txtstate">
<input type="hidden" name="txtcity" id="txtcity">
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
            <input type="checkbox" name="btnselectallcity" id="btnselectallcity" class="btnselectallcity" value="1"> <b>Select all</b>   
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
    <input type="submit" name="btnshow" id="btnshow"  class="common-btn" value="SHOW">     
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  </div>
</div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#btnshow').on("click", function(){
     $('#misreport>tbody').empty();
     var startdate = $('#min').val();
     var enddate = $('#max').val();
     if(startdate =="" || enddate==""){
      alert("Please select date Range");
      return false;
    }else{
    	getallindiafbalist();
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
     getcity(state);         
   });

$("#btnselectallcity").click(function(){
     $('.btncity').not(this).prop('checked', this.checked);
     $(".btncity:checkbox:checked");
     var city = [];    
     $.each($("input[class='btncity']:checked"), function(){            
      city.push($(this).val());
    }); 
     var citycount=$(".btncity:checked:checked").length;
     // alert(state);
     $("#txtcity").val('');
     $("#txtcity").val(city);   
     //getcity(state);         
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
 getcity(state);
}
function getcity(state){
	$.ajax({
     url: 'get-city-on-state/'+state,
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
                if(val.City!=null && val.City!='0')
                {
                  arr.push('<tr><td><input type="checkbox" id="btncity" onclick="getcityvalue();" name="btncity" class="btncity" value="'+val.City+'" >  '+val.City+'</td></tr>'); 
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
function getcityvalue(){
 // alert('click');
 var city = [];
 $.each($("input[class='btncity']:checked"), function(){            
  city.push($(this).val());
});   
 var citycount=$(".btncity:checked:checked").length;
 $("#txtcity").val('');
 $("#txtcity").val(city); 

}
function getallindiafbalist(){ 
 var startdate=$("#min").val();
 var enddate=$("#max").val();
 var city=$("#txtcity").val();
 //alert(city);
 var state=$("#txtstate").val();
 //alert(state);
 var zone=$("#txtzone").val();
 var v_token = "<?php echo e(csrf_token()); ?>";
        $.ajax({
         url:"<?php echo e(URL::to('get-all-india-fbalist')); ?>",
         dataType : 'json', 
         type: "POST", 
         data:{"_token":v_token,"startdate":startdate,"enddate":enddate,"zone":zone,"state":state,"city":city},        
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
      $('#tblreport').dataTable({
        "ordering": false,
         "paging": false
       });  
     //$('#misreport tr:last').css({'background-color':'#8cc9e2 ','font-size':'20px'});
    // $('#misreport tr:last').prev().find("tr").css({'background-color':'#8cc9e2 ','font-size':'20px'});

  }else{
   $('#misreport>tbody').empty()
   $('#misreport').append("<tr><td colspan=10>Record not found</td></tr>")
 }
}
});
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>