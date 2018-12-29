@extends('include.master')
@section('content')

<style>
.error_class{color:red;}
</style>

<div class="container-fluid white-bg">
  <div class="col-md-12">
    <div class="panel panel-primary">
      <div class="panel-heading"><b>Cancel Training Schedule</b></div>
        <div class="panel-body">

          <form name="training_cancel_form" id="training_cancel_form" enctype="multipart/form-data">
           {{ csrf_field() }}

          <div class="col-md-2 col-xs-12">
            <label>Select Training Name:</label>
          </div>
         <div class="col-md-4 col-xs-12">
          <select class="form-control" id="training_name" name="training_name">
              <option value="">Select Training</option>
              @foreach($data as $val)
                <option value="{{$val->training_id}}">{{$val->training_name}}</option>
              @endforeach
          </select>
          <span class='error_class' id='err_training_name'></span>
          </div><br><br><br><br>

          <div id="cancel_form" style="display: none;">

          <div class="row">
            <div class="col-md-2">
              <label>Training Name:</label>
            </div>
            <div class="col-md-4">
              <span id="resp_training_name"></span>
            </div>

            <div class="col-md-2">
              <label>Duration:</label>
            </div>
            <div class="col-md-4">
              <span id="resp_duration"></span><span> Minutes</span>
            </div>
          </div>


          <div class="row">
            <div class="col-md-2">
              &nbsp;
            </div>
          </div>


          <div class="row">
            <div class="col-md-2">
              <label>Training Type:</label>
            </div>
            <div class="col-md-4">
                <span id="resp_training_type"></span>
            </div>

            <div class="col-md-2">
              <label>Training Date:</label>
            </div>
            <div class="col-md-4">
                <span id="resp_training_date"></span>
            </div>
          </div>


          <div class="row">
            <div class="col-md-2">
              &nbsp;
            </div>
          </div>

          <div class="row">
            <div class="col-md-2">
              <label>Agenda:</label>
            </div>
            <div class="col-md-4">
                <span id="resp_agenda"></span>
            </div>  

            <div class="col-md-2">
              <label>Trainer Name</label>
            </div>
            <div class="col-md-4">
                <span id="resp_trainer_name"></span>
            </div>
          </div>

          <div class="row">
            <div class="col-md-2">
              &nbsp;
            </div>
          </div>

          <div class="row">
            <div class="col-md-2">
              <label>Start Time:</label>
            </div>
            <div class="col-md-4">
                <span id="resp_start_time"></span>
            </div>  

            <div class="col-md-2">
              <label>Description</label>
            </div>
            <div class="col-md-4">
                <span id="resp_description"></span>
            </div>
          </div>

          <div class="row">
            <div class="col-md-2">
              &nbsp;
            </div>
          </div>

          <div class="row">
            <div class="col-md-offset-5">
              <input type="button" name="btn_cancel" id="btn_cancel" value="Cancel Training" class="btn btn-primary">
            </div>
          </div>
      </div>
     </form>
    </div>
  </div>
 </div>
</div>

<script type="text/javascript">
$('#training_name').on('change',function() {

var id = $('#training_name').val();

if(id != ""){
  $('#cancel_form').show();
  $('.error_class').empty();

    $.ajax({
        url: 'get-training-details/'+id,               
        type: 'GET',
        success: function(response){
          var data = JSON.parse(response);
  
          if(data[0].training_type == "1"){
            $("#resp_training_type").text("Classroom Training");
          }else if(data[0].training_type == "2"){
            $("#resp_training_type").text("Online Training");
          }else{
            $("#resp_training_type").text(data[0].training_type);
          }
          $("#resp_training_name").text(data[0].training_name);                  
          $("#resp_duration").text(data[0].duration);
          $("#resp_training_date").text(data[0].training_date);
          $("#resp_agenda").text(data[0].agenda);
          $("#resp_trainer_name").text(data[0].trainer_id);
          $("#resp_start_time").text(data[0].start_time);
          $("#resp_description").text(data[0].description);
      }
    });
}else{
  $("#err_training_name").text('Please select Training Name');
  $('#cancel_form').hide();
}

  }); 
</script>

  <script type="text/javascript">
    $('#btn_cancel').on('click',function(){ 
      var data = confirm('Are you sure you want to cancel this training schedule?');
      if(data){   
          $.ajax({  
           type: "POST",  
           url: "{{URL::to('cancel-training-sp')}}",
           data : $('#training_cancel_form').serialize(),
           success: function(response){
              var data = JSON.parse(response);
              if(data.status == "success"){
                alert(data.messege);
                window.location.reload();
              }else{
                alert('Something went wrong');
              }
            }  
        }); 
      }else{
        return false;
      }    
    });
  </script>
@endsection 