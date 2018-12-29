@extends('include.master')
 @section('content')
<div class="container-fluid white-bg">
 <div class="col-md-12"><h3 class="mrg-btm">Save Notification</h3></div>
 <form class="form-horizontal"  id="sendnotification"  name="sendnotification"  enctype="multipart/form-data" method="POST">
  <div class="col-md-8">
  {{ csrf_field() }}
    <div class="col-md-8 col-xs- 12">
    <div class="mrg-btmm">
      <div class="form-group">
<label class="control-label" for="message-text">Notification Type:</label>
    <select id="LeadType" name="LeadType" class="selectpicker select-opt form-control" required >
    <option  value="" >Notification Type</option>
    <option value="HL" >HL</option>
    <option  value="WB">WB</option>
    </select>
    </div>
    </div>
  </div>    
<div class="col-md-8 col-xs-12"  >
  <div class="form-group"  >
<label class="control-label" id="webtitlelabel" for="message-text" style="display: none;" >Web Url</label>
    <div class="mrg-btmm" id="first_nm" style="display: none;" >
    <input  type="text" class="form-control" oninput="mail('weburl')" name="weburl" id="weburl" maxlength="40" required>
    <div id="email" style="display:none; color:red;font-size:10px">Kindly Enter Correct URL</div>
    </div>
    </div>
  </div>
      

    <div class="col-md-8 col-xs- 12">
     <div class="form-group"  >
<label class="control-label" id="webtitlelabelnew" for="message-text" style="display: none;">WebTitle</label>
    <div class=" mrg-btmm"  id="last_nm" style="display: none;">
    <input  type="text" class="form-control" name="webtitle" id="webtitle" maxlength="40" required>
    </div>
    </div>
  </div>

    <div class="col-md-8 col-xs-12">
            <div class="form-group" id="notificationt" style="display:none;">
   <label class="control-label"  for="message-text">Notification Title</label>
    <div class="mrg-btmm" id="notificationttl" style="display: none;">
    <input type="text" name="notificationtitle" id="notificationtitle" 
    class="form-control"  required />
   </div>
 </div>
   </div>
  <div class="col-md-8 col-xs-12">
 <div class="form-group" id="fileup" style="display: none;">
<label class="control-label"  for="message-text">File Upload</label>
  <div class="form-control mrg-btmm border-none" id="fileupload" style="display: none;">
 <input type="file" name="notify_image" id="notify_image" required>
 </div>
 </div>
</div>
  <div class="col-md-8 col-xs-12">
 <div class="text-area padding" >
           <div class="form-group">
   <label class="control-label"  for="message-text">Message</label>
 <textarea id="txtmessage" name="txtmessage" style="background-color:white;" required></textarea>
</div>
</div>
</div>

<div class="col-md-8 col-xs-12">
 <div class="center-obj center-multi-obj">      
 <a class="common-btn" id="notificsubmitbtn" name="notificsubmitbtn">Submit</a>
  </div>
  </div>
</div>
 </form>
  </div>
  </div>  
  </div>
<style type="text/css">
.form-horizontal .control-label {
    padding-top: 7px;
    margin-bottom: 0;
    padding:2%;
    text-align: left;
}
.col-md-4 {
    width: 33.33333333%;
    padding:2%;
    padding-top: 2%;
    padding-right: 2%;
    padding-bottom: 2%;
    padding-left:2%;
}


</style>
<script type="text/javascript"> 
$('#LeadType').on('change',function(){
  var LeadType=$('#LeadType').find(":selected").val();
  if ( LeadType == 'WB')
      {
      $("#weburl").show();
      $("#last_nm").show();
      $("#notificationttl").hide();
      $("#wetitle").show();
      $("#webtitlelabel").show();
      $("#first_nm").show();
      $("#webtitlelabelnew").show();
      $("#notificationttl").show();
      $("#fileupload").show();
      $("#notificationt").show();
      $("#fileup").show();
      }
     else{        
      $("#weburl").hide();
      $("#last_nm").hide();
      $("#wetitle").hide();
      $("#wetitle").hide();
      $("#webtitlelabel").hide();
      $("#first_nm").hide();  
      $("#webtitlelabelnew").hide();
      $("#notificationttl").show();
      $("#fileupload").show();
      $("#notificationt").show();
      $("#fileup").show(); 
      }
      });
     </script>
<script type="text/javascript">
  $('#notificsubmitbtn').click(function(){
  if ($('#sendnotification').valid()){
    $.ajax({
 url:"{{URL::to('send-notification-submit')}}" ,  
          data:new FormData($("#sendnotification")[0]),
          dataType:'json',
          async:false,
          type:'POST',
          processData: false,
          contentType: false,
          success: function(msg){

            console.log(msg.data);
            if (msg.data==true) 
              {
                alert('Data has been saved successfully');
                 $("#sendnotification").trigger('reset');
                 location.reload();

              } else {
                    alert('Oops!! Could not insert successfully');
              }
                 }
        });

   }
  
  });

</script>
@endsection
