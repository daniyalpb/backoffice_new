<?php $__env->startSection('content'); ?>
<?php if(Session::has('message')): ?>
<div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <p class="alert alert-success"><?php echo e(Session::get('message')); ?></p>
</div>
<?php endif; ?>


<style type="text/css">
  .modal_extra_width{width: 700px}
  .flt-lft{float:left;margin:3px}
</style>

<div class="container-fluid white-bg">
 <div class="col-md-12"><h3 class="mrg-btm">Offline-Request-New</h3></div>
 <?php if(Session::get('usergroup')==50): ?>
 <div id="myDIV">
  <a href="<?php echo e('offline-request-new'); ?>" class="qry-btn">All</a>
  <a href="<?php echo e('get-motor-data'); ?>"  class="qry-btn">Motor </a>
  <a href="<?php echo e('get-health-data'); ?>"  class="qry-btn">Health </a>
  <a href="<?php echo e('get-life-data'); ?>" class="qry-btn">Life</a>
  
</div>
<?php endif; ?>
<div class="col-md-12">
 <div class="overflow-scroll">
   <div class="table-responsive" >
    <table id="offline_Quotes" class="table table-bordered table-striped tbl" >
     <thead>
      <tr>
       <th>#</th>
       <th>Trans Id</th>
       <th>Name</th>
       <th>RRM Name</th>
       <th>Product Name</th>
       <th>Quote Description</th>
       <th>Doc Links</th>
       <th>Current Status</th>
       <th>Remarks</th>
       <th>Created Date</th>
       <th>Converted Date</th>
       <th>Action</th>

     </tr>
   </thead>
   <tbody>


     <?php $__currentLoopData = $Quotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
     <tr>
       <td><?php echo $val->PkId; ?></td>
       <td><?php echo $val->TransId; ?></td>   
       <td><?php echo $val->FullName.'<br>'.$val->MobiNumb1;?></td>
       <td> <?php echo $val->RRM_Name; ?></td>
       <td> <?php echo $val->ProductName; ?></td>
       <td><a data-toggle="modal" data-target="#Quotedescription" onclick="viewdiscription('<?php echo e($val->PkId); ?>','<?php echo e($val->ProductName); ?>')">View Requirement</a></td>
       <td align=center>   
        <a href="" style="" data-toggle="modal"  data-target="#docviwer" onclick="offlinedocview('<?php echo e($val->PkId); ?>')">Uploaded Quote (<?php echo e($val->totaldocs); ?>)</a>
        <!-- <?php if($val->Type==1): ?> -->

        <!-- <?php else: ?> -->
        <!-- <span class="glyphicon glyphicon-blank"></span>  -->
        <!-- <?php endif; ?> -->
        <br><a type="button" id="hidetype1" onclick="viewImage('<?php echo e($val->PkId); ?>')">View User Doc</a>
        (<?php echo e($val->userupload); ?>)

      </td>
      <td align="center"> 
        <?php if($val->Status=='Lost' || $val->Status=='Converted' ): ?>
        <a href="" style="" data-toggle="modal" data-target="#statusdetails" onclick="newstatusviewoffline('<?php echo e($val->PkId); ?>')"><?php echo e($val->Status); ?></a>
        <?php else: ?> 

        <br>
        <a href="" style="" data-toggle="modal"  onclick="Gettype('<?php echo e($val->PkId); ?>')">Update</a>

        <?php endif; ?>
        <td><a data-toggle="modal" data-target="#updateremark" onclick="Getremarkhiddenid('<?php echo e($val->PkId); ?>')">Remarks</a></td>
      </td>
      <td><?php echo $val->CreatedDate; ?></td>
      <td><?php echo $val->Converted_Date; ?></td>  
      <td><a onclick="updatecs(<?php echo e($val->PkId); ?>)">Update CS.No And View Doc.</a></td>


    </tr>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

  </tbody>

</table>



<div class="modal" id="statusdetails">
  <div class="modal-dialog">
    <div class="modal-content">      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Current Status</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>        
      <!-- Modal body -->
      <div class="modal-body">
        <div class="table-responsive" >

          <div id="divstatus"> </div>

        </div> 
<div class="form-group">
<!--                 <label>Image 1:</label>
 -->                <!-- <input type="file" class="form-control" id="txtfile1" name="txtfile1"> -->
                <span id="spandocviewcs1" onclick="viewdocument(this.id)" style='color:;position: absolute;right: 75;margin-top: -11px;margin-left:1px;'>View Document 1</span>
              </div>
              <div class="form-group">
                <!-- <label>Image 2:</label> -->
                <!-- <input type="file" class="form-control" id="txtfile2" name="txtfile2"> -->
                <span id="spandocviewcs2" onclick="viewdocument(this.id)" style='color:;position: absolute;right: 75;margin-top: -25px;margin-left: 145px;'>View Document 2</span>  
                 </div>
                 <br><br>

                <div class="form-group">
<!--                 <label>Image 3:</label>
 -->                <!-- <input type="file" class="form-control" id="txtfile3" name="txtfile3"> -->
                <span id="spandocviewcs3" onclick="viewdocument(this.id)" style='color:;position: absolute;right: 75;margin-top: -1px;margin-left: 2px;'>View Document 3</span>
              </div>

              <div class="form-group">
                <!-- <label>Image 4:</label> -->
               <!--  <input type="file" class="form-control" id="txtfile4" name="txtfile4"> -->
              <span id="spandocviewcs4" onclick="viewdocument(this.id)" style='color:;position: absolute;right: 75;margin-top: -16px;margin-left: 144px;'>View Document 4</span>                
              </div>
              <div>
        <iframe id="ncaimagefile" frameborder="0" allowfullscreen
        style="width: 870px;height:550px;margin-top: 15px"></iframe>
      </div>

              <!-- <div class="form-group">
                <label>Policy Status:</label>
                <label><input class="txtpolsatyes" type="radio" name="txtpolsat" id="txtpolsat" value="1">YES</label>
                 <label><input class="txtpolsatno" type="radio" name="txtpolsat" id="txtpolsat" value="0">NO</label>
              </div>  
               --><div class="form-group" id="divticket" style="display: none;">
                <label>Ticket No</label>
                <input type="text" name="txtticketno" id="txtticketno">
                <a href="<?php echo e('RaiseaTicket'); ?>" class="btn btn-primary">ADD TICKET</a>
              </div>       </div>      
      <!-- Modal footer -->
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
      </div>
    </div>
  </div>
</div>
</div>





<!-- Update status model Start -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Status</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>        
      <!-- Modal body -->
      <div class="modal-body">
        <form id="statustype" name="statustype" method="post">
         <input type="hidden" name="hiddenid" id="hiddenid" >

         <?php echo e(csrf_field()); ?>

         <label>Select Status:</label>
         <select class="form-control" required id="ddltype" name="ddltype" onchange="getdate();">
           <option id="statusConverted" value="1">Lost</option>
           <option  value="2">Converted</option>


         </select><br>
         <textarea name="statuscomment" id="statuscomment" rows="4" cols="50" placeholder="Write a Comment" required=""></textarea>

      
         
          <div class="form-group">
                <label>Image 1:</label>
                <input type="file" class="form-control" id="txtfile1" name="txtfile1">
                <span id="spandocviewcs1" onclick="viewdocument(this.id)" style='color:;position: absolute;right: 75;margin-top: -31px;margin-left: 254px;'>Doc1</span>
              </div>
              <div class="form-group">
                <label>Image 2:</label>
                <input type="file" class="form-control" id="txtfile2" name="txtfile2">
                <span id="spandocviewcs2" onclick="viewdocument(this.id)" style='color:;position: absolute;right: 75;margin-top: -31px;margin-left: 254px;'>Doc2</span>  
                 </div>

                <div class="form-group">
                <label>Image 3:</label>
                <input type="file" class="form-control" id="txtfile3" name="txtfile3">
                <span id="spandocviewcs3" onclick="viewdocument(this.id)" style='color:;position: absolute;right: 75;margin-top: -31px;margin-left: 254px;'>Doc3</span>
              </div>

              <div class="form-group">
                <label>Image 4:</label>
                <input type="file" class="form-control" id="txtfile4" name="txtfile4">
              <span id="spandocviewcs4" onclick="viewdocument(this.id)" style='color:;position: absolute;right: 75;margin-top: -31px;margin-left: 254px;'>Doc4</span>                
              </div>




       </div>    

       <!-- Modal footer -->
       <div class="modal-footer">
        <input type="button" name="btn_submit" id="btn_submit" class="btn btn-primary" onclick="newstatussubmit()"  value="Submit"> 
      </form>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>

  </div>
</div>
</div>

</div>

<!-- QUOTES STATUS VIEW MODEL STATRT -->

<div class="modal" id="Quotedescription">
  <div class="modal-dialog modal-lg modal_extra_width">
    <div class="modal-content">      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Quote Description</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>        
      <!-- Modal body -->
      <div class="modal-body">

       <div class="table"></div>
       <div id="loadproduct"> </div>
       <!--            <span id="txtdiscription"></span>  -->
       <textarea id="txtdiscription" readonly class="form-control" style="height: 218px;"></textarea>              
     </div>      
     <!-- Modal footer -->
     <div class="modal-footer">
       <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> 
     </div>
   </div>


 </div>
</div>
<!-- QUOTES STATUS VIEW MODEL END -->

<!-- Update Remark model Start -->

<div class="modal" id="updateremark">
  <div class="modal-dialog">
    <div class="modal-content">      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Remark</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>        
      <!-- Modal body -->
      <div class="modal-body">
        <div class="table-responsive" >


        </div>
        <form id="remarkupdate" name="remarkupdate" enctype="multipart/form-data" method="post">
         <input type="hidden" name="hiddenidremark" id="hiddenidremark" >
         <?php echo e(csrf_field()); ?>

         <br>
         <textarea name="rmkupdte" id="rmkupdte" rows="4" cols="50" placeholder="Write a Remark" required></textarea>
         <div id="loadremark"> </div>
       </div>        
       <!-- Modal footer -->
       <div class="modal-footer">
        <input type="button" name="btn_submit" id="btn_submit" class="btn btn-primary" onclick="updatremark(document.getElementById('hiddenidremark').value)" value="Submit"> 
      </form>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>

  </div>
</div>
</div>

</div>

<!-- Update Remark model End -->



<!-- Update status model end -->

<!-- DOCUMENT VIEW MODEL SHOW -->

<div id="docviewModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
   <div class="modal-content" style="width: 1050px; height: 650px;">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">View Document</h4>
    </div>
    <!--  <div style="width: 10 " class="modal-body"> -->
      <div style="background: #fff;display: -webkit-box;" class="modal-body">
       <input type="hidden" name="viewdochidden" id="viewdochidden"> 

       <div id="divdocvieweroffline" name="divdocvieweroffline">

        <table>
          <tr>




            <td> <input id="docview1" class="btn btn-default flt-lft" style="margin:2px" type="button" onclick="docdisplay(this.id)" ></td> 

            <td><input id="docview2" class="btn btn-default flt-lft" style="margin:2px" type="button" onclick="docdisplay(this.id)"></td>

            <td><input id="docview3" class="btn btn-default flt-lft" style="margin:2px" type="button" onclick="docdisplay(this.id)"></td>

            <td> <input   id="docview4" class="btn btn-default flt-lft" style="margin:2px" type="button" onclick="docdisplay(this.id)"></td>
          </tr>
        </table>

        <div>
          <div>
            <a  style="display: none;" id="downloaddoc">Download </a>
            <br>
            <iframe id="imagefile" frameborder="0" allowfullscreen
            style="width: 870px;height:550px;float:left; margin-top: 15px"></iframe>
          </div>


        </div>
      </div>

    </div>
     <!--  <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div> -->
    </div>

  </div>
</div>

<!-- DOCUMENT VIEW MODEL END -->



<!-- NRE DOC VIEW START -->


<!-- NEW DOC.VIEW END -->







<!-- DOCUMENT VIEW MODEL Start -->
<div id="docviwer" class="modal fade" role="dialog"> 
  <div class="modal-dialog modal-lg">
   <!-- Modal content-->
   <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" style="text-align:center;">Attachment</h4>
    </div><br>
    <div class="modal-body">
      <form  method="post" enctype="multipart/form-data" action="<?php echo e(url('new-upload-doc')); ?>">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="hidedenquote" id="hidedenquote">
        <table class="table table-striped ">
          <tr>
            <td style="text-align: right;line-height: 39px;">Quote1</td>
            <td><input type="file" class="btn btn-default" name="Quote1" id="Quote1" style="width:216px;margin-left: 2px" accept=".png, .jpg, .jpeg .pdf" >
              <a href='#'><span id="spandocview1" onclick="viewdocone(this)" style='margin-top: -31px;'></span></a></td>
            </tr>  

            <tr>
              <td style="text-align: right;line-height: 39px;">Quote2</td>
              <td><input type="file" class="btn btn-default" name="Quote2" id="Quote2" style="width:216px;margin-left: 2px" accept=".png, .jpg, .jpeg .pdf" ><a href='#'><span id="spandocview2" onclick="viewdocone(this)" style='margin-top: -31px;'></span></a></td>
            </tr>


            <tr>
              <td style="text-align: right;line-height: 39px;">Quote3</td>
              <td><input type="file" class="btn btn-default" name="Quote3" id="Quote3" style="width:216px;margin-left: 2px" accept=".png, .jpg, .jpeg .pdf" ><a href='#'><span id="spandocview3" onclick="viewdocone(this)" style='margin-top: -31px;'></span></a></td>
            </tr>

            <tr>
              <td style="text-align: right;line-height: 39px;">Quote4</td>
              <td><input type="file" class="btn btn-default" name="Quote4" id="Quote4" style="width:216px;margin-left: 2px" accept=".png, .jpg, .jpeg .pdf" ><a href='#'><span id="spandocview4" onclick="viewdocone(this)" style='margin-top: -31px;'></span></a></td>
            </tr>

          </table>
          <!--  <div class="modal-body"> -->

            <input type="submit"  id="btn_submit_doc" class="btn btn-primary" value="submit"> 
          </form>
          <!-- <iframe id="imagefileone"></iframe> -->
          <!-- <iframe id="imagefileone" style="width: 550px;max-height: 500px"></iframe> -->
          <div>
            <iframe id="imagefileone" frameborder="0" allowfullscreen
            style="width: 870px;height:550px;margin-top: 15px"></iframe>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- DOCUMENT MODEL END -->

</div>
</div>
</div>
</div>

<div id="divdate" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Amount</h4>
      </div>
      <table>
       <tr>
         <form id="amtupdate" name="amtupdate" method="POST">
          <input type="hidden" name="hiddenidamt" id="hiddenidamt" >
          <?php echo e(csrf_field()); ?>

          <div style="width: 80;height:20px;"  class="modal-body">


           <td><label>Date:</label></td>
           <td><input class="btn btn-default" type="date" name="convertdate" id="convertdate"></td>

           <td><label>Amount:</label></td>
           <td><input class="btn btn-default" type="text" name="Amount" id="Amount"></td>

         </div>
       </tr>
     </table> <br>
     <div class="modal-footer">
       <input type="button" name="btn_submit_amt" id="btn_submit_amt" class="btn btn-primary" onclick="newupdateamt()" data-dismiss="modal" value="submit"> 
     </from> 
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>

 </div>
</div>
</div>




<div id="divloss" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">View Document</h4>
      </div>
      <div style="width: 10 "  class="modal-body">
        <p>Test doc</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
  <div class="modal fade" id="csmodal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update status</h4>
        </div>
        <div class="modal-body">
          <div class="container">  
          <div class="col-md-6">
            <form name="form_update_cs_no" id="form_update_cs_no">
              <?php echo e(csrf_field()); ?>

              <div class="form-group">
                <input type="hidden" name="txttransid" id="txttransid">

                <label>CS NO:</label>

                <input type="text" class="form-control" id="txtcsno" name="txtcsno">

              </div>
                        
            
            </div>   
          </div>
        </div>

        <div class="modal-footer">
           <input type="button" name="txtsubmit" id="txtsubmit" onclick="update_cs_no()" value="Submit">
           </form>
             
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">

  function update_cs_no(){

    var formdata = new FormData($("#form_update_cs_no")[0]);
    formdata.append('txttransid',$("#txttransid").val());
    formdata.append('txtcsno',$("#txtcsno").val());
    formdata.append('txtpolsat',$("#txtpolsat").val());
    formdata.append('txtticketno',$("#txtticketno").val());
    // formdata.append('txtfile1', $('#txtfile1')[0].files[0]); 
    // formdata.append('txtfile2', $('#txtfile2')[0].files[0]); 
    // formdata.append('txtfile3', $('#txtfile3')[0].files[0]); 
    // formdata.append('txtfile4', $('#txtfile4')[0].files[0]); 
    // //alert(formdata);

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
    },
      type : 'POST',
      url : '<?php echo e(url("update-status-offline-quotes")); ?>',
      data : formdata,
      contentType : false,
      processData : false,
      success : function(response){
     $('#csmodal').modal('hide');

        console.log(response);
      }
    });
  }


   function updatecs(transid){
    alert(transid);
    $("#txttransid").val(transid);


 $('#csmodal').modal('show');

   var id = $("#txttransid").val();
 $.ajax({
   url: 'view-uplod-doc-cs/'+id,
   type: "GET",                  
   success:function(data){
    var jsondata = JSON.parse(data);
   /* console.log(jsondata);
    var i=0;
    $("#spandocviewcs1").text("Document Not Uploaded");
    $("#spandocviewcs2").text("Document Not Uploaded");
    $("#spandocviewcs3").text("Document Not Uploaded");
    $("#spandocviewcs4").text("Document Not Uploaded");*/

    $("#spandocviewcs1").attr("data-imagepath",jsondata[0].image1);
    $("#spandocviewcs2").attr("data-imagepath",jsondata[0].image2);
    $("#spandocviewcs3").attr("data-imagepath",jsondata[0].image3);
    $("#spandocviewcs4").attr("data-imagepath",jsondata[0].image4);


    /*$.each(jsondata, function( key, value ) {
      i++;
      if(i==1){
        if(value.txtfile1 == "" || value.txtfile1 == null){
          var p_txtfile1 = 'Document Not Uploaded';
        }else{
          var p_Doc1 = value.Doc1;
        }
        $("#spandocviewcs1").text(p_txtfile1);
        $("#spandocviewcs1").attr("data-val",p_txtfile1);

      }
      else if(i==2)
      {
        if(value.txtfile2 == "" || value.txtfile2 == null){
          var p_txtfile2 = '';
        }else{
          var p_txtfile2 = value.txtfile2;
        }
        $("#spandocviewcs2").text(p_txtfile2);
        $("#spandocviewcs2").attr("data-val",p_txtfile2);

      }
      else if(i==3){
        if(value.txtfile3 == "" || value.txtfile3 == null){
          var p_txtfile3 = 'Document Not Uploaded';
        }else{
          var p_txtfile3 = value.txtfile3;
        }
        $("#spandocviewcs3").text(p_txtfile3);
        $("#spandocviewcs3").attr("data-val",p_txtfile3);
     
      }
      else if(i==4){
        if(value.txtfile4 == "" || value.txtfile4 == null){
          var p_txtfile4 = 'Document Not Uploaded';
        }else{
          var p_txtfile4 = value.txtfile4;
        }
        $("#spandocviewcs4").text(p_txtfile4);
        $("#spandocviewcs4").attr("data-val",p_txtfile4);
    
      }                       
    }); */

  }

});
 }

$(".txtpolsatno").click(function(){
 $("#divticket").show();
});
$(".txtpolsatyes").click(function(){
 $("#divticket").hide();
});


</script>

<script type="text/javascript">
  function viewdocument(this_id){
   // alert("test");


  $("#ncaimagefile").attr('src','<?php echo e(url('/upload/offlinecs')); ?>/'+ $("#" + this_id).attr('data-imagepath'));
  //$("#imagefileone").attr('src','<?php echo e(url('/upload/offlinedocs')); ?>/' + this_data_val.innerText);
  }
</script>

</script>
<script type="text/javascript">
 var hiddenid='';

 function offlinedocview(fbaid){
  //alert(fbaid);
  $('#imagefile').attr('src', '');
  $('#imagefileone').attr('src', '');
  $("#spandocview1").text(''); 
  $("#spandocview2").text(''); 
  $("#spandocview3").text('');
  $("#spandocview4").text('');
  $("#docviwer").val(""); 
  $("#hidedenquote").val(fbaid);

  var id = $("#hidedenquote").val();


  $.ajax({
   url: 'view-upload-doc-one-new/'+id,
   type: "GET",                  
   success:function(data){
    var jsondata = JSON.parse(data);
//alert(jsondata);
$.each(jsondata, function( key, value ) {
//if (value.Type=='1') {

  if(value.Quote1 == "" || value.Quote1 == null){
    var p_Quote1 = 'Document Not Uploaded';
  }else{
    var p_Quote1 = value.Quote1;
  }

  if(value.Quote2 == "" || value.Quote2 == null){
    var p_Quote2 = 'Document Not Uploaded';
  }else{
    var p_Quote2 = value.Quote2;
  }

  if(value.Quote3 == "" || value.Quote3 == null){
    var p_Quote3 = 'Document Not Uploaded';
  }else{
    var p_Quote3 = value.Quote3;
  }

  if(value.Quote4 == "" || value.Quote4 == null){
    var p_Quote4 = 'Document Not Uploaded';
  }else{
    var p_Quote4 = value.Quote4;
  }


  $("#spandocview1").text(p_Quote1);
  $("#spandocview2").text(p_Quote2);
  $("#spandocview3").text(p_Quote3);
  $("#spandocview4").text(p_Quote4);







  //}else{


  //}                              
}); 

}

});
}



</script>

<script>
  function Gettype(fbaid){
    $("#statuscomment").val("");
    alert(fbaid);
    hiddenid=fbaid;

    $('#myModal').modal('show');
    $('#hiddenid').val(fbaid);

  }
  function getdate(){  
  //alert($('#hiddenid').val());



  $('#hiddenidamt').val($('#hiddenid').val());

  if ($("#ddltype").val()==2){
    $("#statustype").trigger('reset');
    $("#divdate").modal('show');
    $("#myModal").modal('hide');
    $("#divloss").modal('hide');
  }else if($("#ddltype").val()==3){
   $("#divloss").modal('show');
   $("#divdate").modal('hide');
   $("#myModal").modal('hide');
 }else{
   $("#myModal").modal('show');
   $("#divloss").modal('hide');
   $("#divdate").modal('hide');
 }
}
</script>

<!-- ///////////////////////////////// -->

<script type="text/javascript">

  function statussubmit(){
    alert(hiddenid);
    if(!$('#statustype').valid()){
      return false;
    }else{
     //alert('Test');
     $.ajax({ 
       url: "<?php echo e(URL::to('update-status')); ?>",
       method:"GET",
       data: $('#statustype').serialize(),
       success: function(msg){
        console.log(msg);
        alert("save successfully");
        $('#myModal').modal('hide');
        location.reload();
  // window.location.reload(true);
     // alert('successfully...')


   }
 });
   }

 };   
</script>
<!-- <script type="text/javascript">
 
function statussubmit(){
     //alert('Test');
     $.ajax({ 
   url: "<?php echo e(URL::to('update-status')); ?>",
   method:"GET",
   data: $('#statustype').serialize(),
   success: function(msg){
  // window.location.reload(true);
     // alert('successfully...')

  
 }
  });

};   

 
</script> -->

<script type="text/javascript">

  function updateamt(){ 
    if($('#convertdate').val() == "" || $('#Amount').val() == ""){
//hiddenidremark=id;
alert('Please Enter Date and Amount');
return false;
}else{
  //alert(hiddenid);
  $.ajax({ 
   url: "<?php echo e(URL::to('update-amount-date')); ?>",
   method:"GET",
   data: $('#amtupdate').serialize(),
   success: function(msg){
    alert("Data Save Successfully");
    $('#divdate').modal('hide');
    location.reload();
  }
});
}

};   
</script>

<script type="text/javascript">
  function viewImage(id){

    $('#imagefile').attr('src', '');
    $('#imagefileone').attr('src', '');

    $("#docview1").attr('data-val','');  
    $("#docview2").attr('data-val','');  
    $("#docview3").attr('data-val',''); 
    $("#docview4").attr('data-val','');   
 //alert(id);
 $.ajax({
 // url: 'view-upload-doc/'+id, 

 url: 'view-upload-doc-two-new/'+id,   
 type: "GET",                  
 success:function(data){
  console.log(data);
  var jsondata = JSON.parse(data);
  var i=0;
  var quotename1 ="";
  var quotename2 ="";
  var quotename3 ="";
  var quotename4 ="";
  var quotepath1 ="";
  var quotepath2 ="";
  var quotepath3 ="";
  var quotepath4 ="";

  console.log(jsondata);
  $.each(jsondata, function( key, value ) {
    i++;
    if (value.Type=='2') {
      if(i==1){
        if(value.document_path == "" || value.document_path == null){
          quotename1 = '';
          quotepath1 = '';
        }
        else{     
          quotename1 = value.Document_name;
          quotepath1 = value.document_path;
        }
      }
      else
       if(i==2)
       {
         if(value.document_path == "" || value.document_path == null){
          quotename2 = '';
          quotepath2 = '';
        }
        else{     
          quotename2 = value.Document_name;
          quotepath2 = value.document_path;
        }

      }
      if(i==3)
      {
       if(value.document_path == "" || value.document_path == null){
        quotename3 = '';
        quotepath3 = '';
      }
      else{     
        quotename3 = value.Document_name;
        quotepath3 = value.document_path;
      }

    }
    if(i==4)
    {
     if(value.document_path == "" || value.document_path == null){
      quotename4 = '';
      quotepath4 = '';
    }
    else{     
      quotename4 = value.Document_name;
      quotepath4 = value.document_path;
    }

  }








}else{

}  



}); 


  if(quotename1!=''){
    $("#docviewModal").modal('show');
    $("#docview1").attr('data-val',"http://api.magicfinmart.com/"+quotepath1);  
    $("#docview1").val(quotename1);
    if(quotename2!=''){
      $("#docview2").attr('data-val',"http://api.magicfinmart.com/"+quotepath2);   
      $("#docview2").val(quotename2);
    }
    if(quotename3!=''){
      $("#docview3").attr('data-val',"http://api.magicfinmart.com/"+quotepath3);   
      $("#docview3").val(quotename3);
    }
    if(quotename4!=''){
      $("#docview4").attr('data-val',"http://api.magicfinmart.com/"+quotepath4);   
      $("#docview4").val(quotename4);
    }


  }
  


  $("#docview1").val(quotename1);  
  $("#docview2").val(quotename2);  
  $("#docview3").val(quotename3); 
  $("#docview4").val(quotename4);


}

});

}

function docdisplay(this_id){
  $("#docviewModal").val('');
        // $("#docview1").val('');
   //    $("#docview2").val('');
   //    $("#docview3").val('');
   //    $("#docview4").val(''); 
 // alert(this_id); exit();
 var path = $("#"+this_id).attr("data-val");

 alert(path);
// var altdata = $("#imagefile").attr('src',path);
$("#imagefile").attr('src',path);
//$("#downloaddoc").attr('href',path);
$("#downloaddoc").attr('href','#');
$("#downloaddoc").attr('onclick',"forceDownload('"+path+"','Download')");
$("#downloaddoc").show();

}
</script>




<!-- <script type="text/javascript">
function statusviewoffline(PkId){
alert(PkId);
        $.ajax({ 
         url: 'quotestatus/'+PkId,
        method:"get",
        data: $('#statusfrom').serialize(), 
        success: function(msg){             

        var data = JSON.parse(msg);
        if (data[0].Status==1) {
            var str = "<table class='table' id='example'><tr style='height:30px;margin:5px;'><th>Status</th><th>Comment</th></tr>";
            for (var i = 0; i < data.length; i++){ 
     str = str + "<tr style='height:60px;margin:5px;'><td>Loss</td><td>"+data[i].Comment+"</td></tr>";
       }
         str = str + "</table>";
        }else{
          var str = "<table class='table' id='example'><tr style='height:30px;margin:5px;'><th>Status</th><th>Amount</th><th>Converted Date</th></tr>";
            for (var i = 0; i < data.length; i++){ 
     str = str + "<tr style='height:60px;margin:5px;'><td>converted</td><td>"+data[i].Amount+"</td><td>"+data[i].Converted_date+"</td></tr>";
       }
         str = str + "</table>";
        }
       
           $('#divstatus').html(str); 

       } 

      
 });
};
    

</script> -->


<script type="text/javascript">
  function viewdocone(this_data_val){

    $("#imagefileone").attr('src','<?php echo e(url('/upload/offlinedocs')); ?>/' + this_data_val.innerText);
  }

</script>


<script type="text/javascript">
 $(document).ready(function(){
  $('#offline_Quotes').DataTable({
    "ordering": false
  });    
});


</script>


<script type="text/javascript">

  function viewdiscription(PkId,product_name){ 
  //alert(product_name);
  //alert(hiddenid);
 //alert('test2');

 $.ajax({ 
  url: 'getnewquotediscription/'+PkId,

         //url: 'getquotediscription/'+id+'/'+product_name,
         method:"GET",   
         success: function(msg){
          $("#txtdiscription").val('');

          var data= JSON.parse(msg);
    //alert(data[0].Quote_description);
    //alert(data.length);
    if (data.length>=0) {
      $("#txtdiscription").val(data[0].comment);
    }else{

      $("#txtdiscription").val('No Data Found');
    }

  }
});


 $.ajax({  
   type: "GET",  
         //url:'<?php echo e(URL::to('getproductdata')); ?>/'+product_name,
         url: 'getproductdata/'+PkId+'/'+product_name,  
         success: function(mmsg){
         //alert(PkId);
         var data = JSON.parse(mmsg);
         console.log(data);

         if(product_name=="Motor"){
          var str = "<div class='table-responsive'><table class='table '><tr style='height:20px;margin:5px;'></tr>";

          for (var i = 0; i < data.length; i++) {
         //   if(data[i].product_name==){
          str = str + "<tr style='height:10px;margin:5px;'><tr><th>Customer Name</th><td>"+data[i].first_name+"</td></tr><tr><th>Vehicle No</th><td>"+data[i].registration_no+"</td></tr><tr><th>Insurance Subtype  </th><td>"+data[i].vehicle_insurance_subtype+"</td></tr><tr><th>Mfg Date</th><td>"+data[i].vehicle_manf_date+"</td></tr></tr><tr><th>Expiry Date</th><td>"+data[i].policy_expiry_date+"</td></tr><tr><th>Fuel Type</th><td>"+data[i].fueloffline+"</td></tr><tr><th>Mobile No</th><td>"+data[i].mobile+"</td></tr></tr><tr><th>Registration Date</th><td>"+data[i].vehicle_registration_date+"</td></tr></tr><tr><th> Existing NCB</th><td>"+data[i].vehicle_ncb_current+"</td></tr></tr><tr><th>Claim In This Year</th><td>"+data[i].is_claim_exists+"</td></tr></tr><tr><th>RTO Name</th><td>"+data[i].RTO_City+"</td></tr></tr><tr><th>Present Insurer</th><td>"+data[i].Bank_name+"</td></tr></tr></tr><tr><th>Model</th><td>"+data[i].Model_Name+"</td></tr></tr></tr><tr><th>Make Name</th><td>"+data[i].Make_Name+"</td></tr></tr></tr><tr><th>Variant Name</th><td>"+data[i].Variant_Name+"</td></tr></tr></tr><tr><th>Created Date</th><td>"+data[i].created_date+"</td></tr></tr></tr>";

// str = str + "<tr style='height:30px;margin:5px;'><td>"+data[i].first_name+"</td><td>"+data[i].registration_no+"</td><td>"+data[i].vehicle_insurance_subtype+"</td><td>"+data[i].vehicle_manf_date+"</td><td>"+data[i].policy_expiry_date+"</td><td>"+data[i].fueloffline+"</td><td>"+data[i].mobile+"</td><td>"+data[i].vehicle_registration_date+"</td><td>"+data[i].vehicle_ncb_current+"</td><td>"+data[i].is_claim_exists+"</td><td>"+data[i].RTO_City+"</td><td>"+data[i].Bank_name+"</td><td>"+data[i].Model_Name+"</td><td>"+data[i].Make_Name+"</td><td>"+data[i].Variant_Name+"</td><td>"+data[i].created_date+"</td></tr>";
         // }
       }

     }

     else if(product_name=="MOTOR COMMERCIAL - Goods Carrying" || product_name=="MOTOR COMMERCIAL - Passenger Carrying"){
      var str = "<div class='table-responsive'><table class='table '><tr style='height:30px;margin:5px;'></tr>"; 

      for (var i = 0; i < data.length; i++) {
         //   if(data[i].product_name==){


          str = str + "<tr style='height:10px;margin:5px;'><tr><th>Customer Name</th><td>"+data[i].first_name+"</td></tr><tr><th>Vehicle No</th><td>"+data[i].registration_no+"</td></tr><tr><th>Insurance Subtype</th><td>"+data[i].vehicle_insurance_subtype+"</td></tr><tr><th>Mfg Date</th><td>"+data[i].vehicle_manf_date+"</td></tr></tr><tr><th>Expiry Date</th><td>"+data[i].policy_expiry_date+"</td></tr><tr><th>Fuel Type</th><td>"+data[i].fueloffline+"</td></tr><tr><th>Mobile No</th><td>"+data[i].mobile+"</td></tr></tr><tr><th>Registration Date</th><td>"+data[i].vehicle_registration_date+"</td></tr></tr><tr><th> Existing NCB</th><td>"+data[i].vehicle_ncb_current+"</td></tr></tr><tr><th>Claim In This Year</th><td>"+data[i].is_claim_exists+"</td></tr></tr><tr><th>RTO Name</th><td>"+data[i].RTO_City+"</td></tr></tr><tr><th>Present Insurer</th><td>"+data[i].Bank_name+"</td></tr></tr></tr><tr><th>Model</th><td>"+data[i].modeloffline+"</td></tr></tr></tr><tr><th>Make Name</th><td>"+data[i].fueloffline+"</td></tr></tr></tr><tr><th>Variant Name</th><td>"+data[i].varientoffline+"</td></tr></tr></tr><tr><th>Usage</th><td>"+data[i].usage+"</td></tr></tr><tr><th>Gross vehicle weight</th><td>"+data[i].grossvehicleweight+"</td></tr></tr></tr><tr><tr><th>Seatingcapacity</th><td>"+data[i].seatingcapacity+"</td></tr></tr></tr><tr><tr><th>Created Date</th><td>"+data[i].created_date+"</td></tr></tr></tr>";



         // str = str + "<tr style='height:30px;margin:5px;'><td>"+data[i].first_name+"</td><td>"+data[i].registration_no+"</td><td>"+data[i].vehicle_insurance_subtype+"</td><td>"+data[i].vehicle_manf_date+"</td><td>"+data[i].policy_expiry_date+"</td><td>"+data[i].fueloffline+"</td><td>"+data[i].mobile+"</td><td>"+data[i].vehicle_registration_date+"</td><td>"+data[i].vehicle_ncb_current+"</td><td>"+data[i].is_claim_exists+"</td><td>"+data[i].RTO_City+"</td><td>"+data[i].Bank_name+"</td><td>"+data[i].modeloffline+"</td><td>"+data[i].fueloffline+"</td><td>"+data[i].varientoffline+"</td><td>"+data[i].usage+"</td><td>"+data[i].grossvehicleweight+"</td><td>"+data[i].seatingcapacity+"</td><td>"+data[i].created_date+"</td></tr>";
         // }
       }

     }else if(product_name=='Health'){

      var str = "<div class='table-responsive'><table class='table'><tr style='height:30px;margin:5px;'><td>Customer Name</td><td>Mobile</td><td>Product Name</td><td>Policy For</td><td>Cover Required</td><td>Policy Term Year</td><td>Pincode</td><td>Created Date</td><td>Member DOB</td><td>Member Gender</td><td>Member Type</td></tr>";
      for (var i = 0; i < data.length; i++) {

        str = str + "<tr style='height:30px;margin:5px;'><td>"+data[i].ContactName+"</td><td>"+data[i].ContactMobile+"</td><td>"+data[i].ProductName+"</td><td>"+data[i].PolicyFor+"</td><td>"+data[i].SumInsured+"</td><td>"+data[i].PolicyTermYear+"</td><td>"+data[i].pincode+"</td><td>"+data[i].created_date+"</td><td>"+data[i].MemberDOB+"</td><td>"+data[i].MemberGender+"</td><td>"+data[i].MemberType+"</td></tr>";

         // str = str + "<tr style='height:30px;margin:5px;'><tr><th>Customer Name</th><td>"+data[i].ContactName+"</td></tr><tr><th>Mobile</th><td>"+data[i].ContactMobile+"</td></tr><tr><th>Product Name</th><td>"+data[i].ProductName+"</td></tr><tr><th>Policy For</th><td>"+data[i].PolicyFor+"</td></tr><tr><th>Cover Required</th><td>"+data[i].SumInsured+"</td></tr><tr><th>Policy Term Year</th><td>"+data[i].PolicyTermYear+"</td></tr><tr><th>Pincode</th><td>"+data[i].pincode+"</td></tr><tr><th>Created Date</th><td>"+data[i].created_date+"</td></tr><tr><th>Member DOB</th><td>"+data[i].MemberDOB+"</td></tr><tr><th>Member Gender</th><td>"+data[i].MemberGender+"</td></tr><tr><th>Member Type</th><td>"+data[i].MemberType+"</td></tr></tr></tr>";
       }


     }else if(product_name=='Life'){

      var str = "<div class='table-responsive'><table class='table'><tr style='height:30px;margin:5px;'></tr>";

      for (var i = 0; i < data.length; i++){
        str = str + "<tr style='height:30px;margin:5px;'><tr><th>Customer Name</th><td>"+data[i].ContactName+"</td></tr><tr><th>Mobile</th><td>"+data[i].ContactMobile+"</td></tr><tr><th>Insured DOB</th><td>"+data[i].InsuredDOB+"</td></tr><tr><th>Gender</th><td>"+data[i].InsuredGender+"</td></tr><tr><th>Policy Term</th><td>"+data[i].PolicyTerm+"</td></tr><tr><th>Frequency</th><td>"+data[i].Frequency+"</td></tr><tr><th>Sum Assured</th><td>"+data[i].SumAssured+"</td></tr><tr><th>City Name</th><td>"+data[i].CityName+"</td></tr><tr><th>Created Date</th><td>"+data[i].created_date+"</td></tr><tr><th>Pincode</th><td>"+data[i].pincode+"</td></tr><tr><th>Premium Term</th><td>"+data[i].PPT+"</td></tr></tr></tr>";
      }  

 // str = str + "<tr style='height:30px;margin:5px;'><td>"+data[i].ContactName+"</td><td>"+data[i].ContactMobile+"</td><td>"+data[i].InsuredDOB+"</td><td>"+data[i].InsuredGender+"</td><td>"+data[i].PolicyTerm+"</td><td>"+data[i].Frequency+"</td><td>"+data[i].SumAssured+"</td><td>"+data[i].CityName+"</td><td>"+data[i].created_date+"</td><td>"+data[i].pincode+"</td><td>"+data[i].PPT+"</td></tr>";


}
str = str + "</table></div><br>";
$('#loadproduct').html(str);   
}

});

};   
</script>
<!-- Update Remark start -->
<script type="text/javascript">
  function Getremarkhiddenid(PkId){
   $("#rmkupdte").val("");
   alert(PkId);
   hiddenidremark=PkId;
   $('#hiddenidremark').val(PkId);

   getremarkoffline(PkId);


 }
</script>

<!-- Update Remark start -->
<script type="text/javascript">
 function updatremark(PkId){
  alert(PkId);
  $('#hiddenidremark').val(hiddenidremark);
  if(!$('#remarkupdate').valid()){
//hiddenidremark=id;
return false;
}else{
 $.ajax({ 
   url: "<?php echo e(URL::to('update-remark')); ?>",
   method:"GET",
   data: $('#remarkupdate').serialize(),
   success: function(msg){
    alert("Data Save Successfully");
    $('#updateremark').modal('hide');
  }
});
}

};   
</script>
<!-- Update Remark End -->


<!-- <script type="text/javascript">
 
function updatremark(id){
 
  //alert(id);
//hiddenidremark=id;
 $('#hiddenidremark').val(hiddenidremark);
 //alert('test2');
     $.ajax({ 
   url: "<?php echo e(URL::to('update-remark')); ?>",
   method:"GET",
   data: $('#remarkupdate').serialize(),
   success: function(msg){
  
 }
  });

};   
</script>
-->

<script type="text/javascript">

  function getremarkoffline(quote_request_id){
    $.ajax({  
     type: "GET",  
         url:'get-remark/'+quote_request_id,//"<?php echo e(URL::to('Fsm-Details')); ?>",
         success: function(mmsg){
          console.log(data);
          var data = JSON.parse(mmsg);

          var str = "<table class='table'><tr style='height:30px;margin:5px;'><td>Quote ID</td><td>Remark</td><td>Created date</td><td>Updated_by</td></tr>";
          for (var i = 0; i < data.length; i++) {
           str = str + "<tr style='height:30px;margin:5px;'><td>"+data[i].quote_request_id+"</td><td><textarea  readonly style='height: 65px; !important' class='txtarea'>"+data[i].remark+"</textarea></td><td>"+data[i].Created_date+"</td><td>"+data[i].Created_by+"</td></tr>";
         }
              // console.log(msg[0].Result);
              str = str + "</table>";
              $('#loadremark').html(str);   
            }  
          });
  }

  function forceDownload(url, fileName){
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);
    xhr.responseType = "blob";
    xhr.onload = function(){
      var urlCreator = window.URL || window.webkitURL;
      var imageUrl = urlCreator.createObjectURL(this.response);
      var tag = document.createElement('a');
      tag.href = imageUrl;
      tag.download = fileName;
      document.body.appendChild(tag);
      tag.click();
      document.body.removeChild(tag);
    }
    xhr.send();
  }

</script>
<!-- Update Remark End --> 
<!-- <script type="text/javascript">
        function motordata(){
       $.ajax({ 
        url: "<?php echo e(URL::to('get-health-data')); ?>",
        method:"GET",
        success: function(msg)  
         {
           // var data= JSON.parse(msg);
          console.log(msg);

         }
});
      }

    </script> -->

    <script type="text/javascript">
      function newstatusviewoffline(PkId){
//alert(PkId);
$.ajax({ 
 url: 'offline-status-new/'+PkId,
 method:"get",
 data: $('#statusfrom').serialize(), 
 success: function(msg){   
  var data = JSON.parse(msg);

 
    $("#spandocviewcs1").attr("data-imagepath",data[0].image1);
    $("#spandocviewcs2").attr("data-imagepath",data[0].image2);
    $("#spandocviewcs3").attr("data-imagepath",data[0].image3);
    $("#spandocviewcs4").attr("data-imagepath",data[0].image4);
          


  if (data[0].Status==1) {
    var str = "<table class='table' id='example'><tr style='height:30px;margin:5px;'><th>Status</th><th>Comment</th></tr>";
    for (var i = 0; i < data.length; i++){ 
     str = str + "<tr style='height:60px;margin:5px;'><td>Loss</td><td>"+data[i].Comment+"</td></tr>";
   }
   str = str + "</table>";
 }else{
  var str = "<table class='table' id='example'><tr style='height:30px;margin:5px;'><th>Status</th><th>Amount</th><th>Converted Date</th></tr>";

  for (var i = 0; i < data.length; i++){ 
   str = str + "<tr style='height:60px;margin:5px;'><td>converted</td><td>"+data[i].Amount+"</td><td>"+data[i].Converted_Date+"</td></tr>";
 }
 str = str + "</table>";
}

$('#divstatus').html(str); 

} 


});

};

</script>


<script type="text/javascript">

  function newupdateamt(){ 
    if($('#convertdate').val() == "" || $('#Amount').val() == ""){
//hiddenidremark=id;
alert('Please Enter Date and Amount');
return false;
}else{
  //alert(hiddenid);
  $.ajax({ 
   url: "<?php echo e(URL::to('insert-new-status')); ?>",
   method:"GET",
   data: $('#amtupdate').serialize(),
   success: function(msg){
    alert("Data Save Successfully");
    $('#divdate').modal('hide');
    location.reload();
  }
});
}

};   
</script>


<script type="text/javascript">

  function newstatussubmit(){

     var formdata = new FormData($("#statustype")[0]);
    formdata.append('txtfile1', $('#txtfile1')[0].files[0]); 
    formdata.append('txtfile2', $('#txtfile2')[0].files[0]); 
    formdata.append('txtfile3', $('#txtfile3')[0].files[0]); 
    formdata.append('txtfile4', $('#txtfile4')[0].files[0]); 
    alert();
   
  //alert(hiddenid);
  // if(!$('#statustype').valid()){
  //   return false;
  // }else{
     //alert('Test');
     $.ajax({ 
       url: "<?php echo e(URL::to('new-update-status')); ?>",
       method:"post",
       data: formdata,
       processData: false,
       contentType: false,
       success: function(msg){
        console.log(msg);
        alert("save successfully");
        $('#myModal').modal('hide');
        location.reload();
  // window.location.reload(true);
     // alert('successfully...')


  // }
 }
   });

 }
</script>







<?php $__env->stopSection(); ?>


<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>