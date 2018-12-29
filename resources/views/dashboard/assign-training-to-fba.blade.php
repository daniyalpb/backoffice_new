@extends('include.master')
@section('content')

<style>
.error_class{
  color:red;
}
.compulsory_asterick{
  color:red;
}
.multiselect-container>li>a>label {
  padding: 4px 20px 3px 20px;
}
.text-center{
  text-align:center;
}
</style>

<form name="assigning_training_form" id="assigning_training_form" enctype="multipart/form-data">  
{{ csrf_field() }} 
     
<div class="container-fluid">

    <div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading"><b>Assign Training to FBA</b></div>
        <div class="panel-body">

        <div class="row">
            <div class="col-md-3">
              <label>Select Training Name <sup class="compulsory_asterick">*</sup></label>
            </div>
            <div class="col-md-4">
              <select name="training_name" id="training_name" class="form-control">
                <option value="">Select Training Name</option>
                  @foreach($training_schedule as $schedule)
                    <option value="{{ $schedule -> training_id }}">{{ $schedule -> training_name }}</option>
                  @endforeach
              </select>
              <span class="error_class" id="err_training_name"></span>
            </div>
        </div>


        <div class="row">
            <div class="col-md-2">
              &nbsp;
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
              <label>Select state <sup class="compulsory_asterick">*</sup></label>
            </div>
            <div class="col-md-4">
              <select name="state[]" id="state" class="form-control" multiple="multiple">
                  @foreach($states as $state)
                    <option value={{ $state -> state_id }}>{{ $state -> state_name }}</option>
                  @endforeach
              </select>
              <span class="error_class" id="err_state"></span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
              &nbsp;
            </div>
        </div>


        <div class="row">
            <div class="col-md-3">
              <label>Select City <sup class="compulsory_asterick">*</sup></label>
              <br>
              <span class="error_class" id="err_city"></span>
              {{-- <label><font color='red'>Note</font> : Please select 1 city at a time.</label> --}}
            </div>
            <div class="col-md-4" id="city_div">
  
            </div>
        </div>


        <div class="row">
            <div class="col-md-2">
              &nbsp;
            </div>
        </div>

        <div class="row">
            <div class="col-md-offset-5">
              <input type="button" name="btn_submit" id="btn_submit" value="Show FBA" class="btn btn-primary">
            </div>
        </div>

        </div>
      </div>
  </div>
</div>
</form>

  <div class="col-lg-12">


<form name='form_load_training_fba_list' id='form_load_training_fba_list' enctype='multipart/form-data' method='post'>
  {{ csrf_field() }}
    <div class="panel panel-primary" id="panel_fba_list" style="display:none">
        <div class="panel-heading"><b>Assign Training to FBA</b></div>
        <div class="panel-body">

        <div class="col-md-12">
          <div class="row" id="response_fba_list">
            
          </div>

        <div class="row">
            <div class="col-md-2">
              <span class="error_class" id="error_panel"></span>
            </div>
        </div>


        <div class="row">
            <div class="col-md-offset-5">
              <input type="hidden" name="cs_fbaid" id="cs_fbaid" readonly="readonly">
              <input type="button" name="btn_assign_fba" id="btn_assign_fba" value="Assign" class="btn btn-primary">
            </div>
        </div>


        </div>
        </div>
    </div>

  </div>
</form>

</div>


<script>
$("#training_name").on('change',function(){
  $(".error_class").empty();
  $("#response_fba_list").empty();
  $("#panel_fba_list").hide();
  $("#cs_fbaid").val('');
});


$(function() {
  $('#state').multiselect({
    includeSelectAllOption: true,
    maxHeight: 250
  });
});

$('#state').on('change',function(){

  $(".error_class").empty();
  $("#response_fba_list").empty();
  $("#panel_fba_list").hide();
  $("#cs_fbaid").val('');
  $('#city').empty();
  var state_id = $(this).val();
  var formdata = new FormData($("#assigning_training_form")[0]);

  if(state_id == ""){
    $('#city').empty();
    $("#err_state").text("Please Select at least 1 State");
  }else{
  $.ajax({
      type : 'post',
      url : '{{ URL::to('/get_statewise_training_cities') }}',
      data : formdata,
      contentType :false,
      processData : false,
      success : function(response){
        var data = JSON.parse(response);
        $("#city_div").html(data.city_data);
      }
  });
  }
});


$("#btn_submit").on('click',function(evt){

  evt.preventDefault();
  $(".error_class").empty();
  var formdata = new FormData($("#assigning_training_form")[0]);
  $("#panel_fba_list").hide();

  $.ajax({
    type : 'post',
    url : '{{ URL::to('/validate_assign_training_to_fba') }}',
    data : formdata,
    contentType :false,
    processData : false,
    success : function(response){
      var data = JSON.parse(response);

      if(data.status == "success"){
        $("#panel_fba_list").show();
        $("#response_fba_list").html(data.table_data);
      }else{
        $.each(data , function(key ,value){
            $("#err_" + key).text(value);
        });
      }
    }
  });
});


$("#btn_assign_fba").on('click',function(){

  var formdata = new FormData($("#form_load_training_fba_list")[0]);

  $.ajax({
    type : 'post',
    url : '{{ URL::to('/validate_training_fba_list') }}',
    data : formdata,
    processData : false,
    contentType : false,
    success : function(response){
      var data = JSON.parse(response);

      if(data.status == "success"){
        alert(data.alert_msg);
        window.location.reload();
      }else{
        $.each(data , function(key ,value){
          
            $("#error_panel").text(value);
          
        });
      }
    }
  });
  
});


function get_fba_id(this_id){

  $("#check_all_fba").prop("checked",false);

  if($("#cs_fbaid").val() == ""){
    var fbaid_array = [];
  }else{
    var fbaid_array = $("#cs_fbaid").val().split(',');
  }


  if($("#" + this_id).is(":checked")){            //if checkbox is checked
     //push element in fbaid_array
     fbaid_array.push($("#" + this_id).val());

}else{                                         //if checkbox is unchecked
  //remove element from fbaid_array
   var index = fbaid_array.indexOf($("#" + this_id).val());
   if(index > -1){
    fbaid_array.splice(index , 1);
   }
}

$("#cs_fbaid").val(fbaid_array.join(","));

}

function p_check_all_fba(this_id){
  var fbaid_array = [];
  // Handle click on "Select all" control
  var table = $('#tbl_training_fba').DataTable();

  // Get all rows with search applied
  var rows = table.rows({ 'search': 'applied' }).nodes();

    if($("#" + this_id).is(":checked")){            //if checkbox is checked

      $.each($('input[type="checkbox"]', rows) , function(key , input_checkbox){
        fbaid_array.push(input_checkbox.value);
        $(input_checkbox).prop('checked', true);
      });
      $("#cs_fbaid").val(fbaid_array.join(","));
    }
    else{                                           //if checkbox is unchecked
      $.each($('input[type="checkbox"]', rows) , function(key , input_checkbox){
        $(input_checkbox).prop('checked', false);
      });
      $("#cs_fbaid").val("");
    }
}   
</script>
@endsection 