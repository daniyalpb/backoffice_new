@extends('include.master')
@section('content')
<div class="container-fluid white-bg">
  <div class="col-md-12">
    <div class="panel panel-primary">
      <div class="panel-heading"><b>Attendance Schedule</b></div>
        <div class="panel-body">
         @if(Session::has('message'))
          <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <p class="alert alert-success">{{ Session::get('message') }}</p>
          </div>
          @endif         
          <form name="attendance_sche_form" id="attendance_sche_form"  method="post">
           {{csrf_field()}}
          <div class="col-md-2 col-xs-12">
            <label>Select Name:</label>
          </div>
         <div class="col-md-4 col-xs-12">
          <select class="selectpicker select-opt form-control" id="attn_name" name="attn_name"  required>
              <option selected disabled value="">Select Name</option>
              @foreach($data as $val)
              <option value="{{$val->training_id}}">{{$val->training_name}}</option>
            @endforeach
           </select>
          </div><br><br><br><br>
          <div id="divhistory">          	
          </div>
            <div class="row" id="button_hide" style="display: none;">
            <div class="col-md-offset-5" >
              <input type="button" name="attn_submit" id="attn_submit" value="Attendence Schedule" class="btn btn-primary">
            </div>
          </div>
        </form>
    </div>
  </div>
 </div>
</div>
    
  <script type="text/javascript">
    $(document).ready(function(){
       $('#attn_name').change(function() { 
        $('#button_hide').show();
        var id = $('#attn_name').val();
        //alert(id);
            $.ajax({
                url: 'attendance-schedule/'+id,               
                type: 'GET',
                data: "",
                success: function(response){
                  //console.log(response);
           var data = JSON.parse(response);
           var str ='<table id="attn_table" class="table table-bordered table-striped"><tr><th><input type="checkbox" onclick="selectallfunction()" class="chkfba"  id="checkAll" name="check_all[]" value="1" style=" zoom: 1.5;"> Select All</th><th>Fba Id</th><th>Name</th></tr><tbody>';
       for (var i = 0; i < data.length; i++) 
       {         
         if (data[i].is_attended == '1') {
            str = str + '<tr><td><input class="chkfba" name="check['+data[i].fbaid+']" id="selectall" type="checkbox"  value="0" style="zoom: 1.5;" checked="true"></td><td>'+data[i].fbaid+'</a></td><td>'+data[i].FullName+'</td></tr>';
         }else{
            str = str + '<tr><td><input class="chkfba" name="check['+data[i].fbaid+']" id="selectall" type="checkbox"  value="1" style=" zoom: 1.5;"></td><td>'+data[i].fbaid+'</a></td><td>'+data[i].FullName+'</td></tr>';
          }
       }
         str = str + "</tbody></table>";
           $('#divhistory').html(str);
           $('#attn_table').DataTable();
         }
     });
     });
   }); 
  </script>

  <script type="text/javascript">
    $('#attn_submit').click(function(){ 
      //var data = confirm('Are you sure to checkbox checked ?');
      //if(data){    
          $.ajax({  
           type: "POST",  
           url: "{{URL::to('attendance-schedule-sp')}}",
           data : $('#attendance_sche_form').serialize(),
           success: function(msg){
           console.log(msg);
              location.reload();
            }
        }); 
      //}    
    });
  </script>


  <script type="text/javascript">
      function selectallfunction(){
        $("#checkAll").click(function () {
        $('.chkfba').prop('checked', this.checked); 
        });
      }

      window.setTimeout(function() {
       $(".alert").fadeTo(500, 0).slideUp(500, function(){
           $(this).remove(); 
       });
     }, 1000);
  </script>
  @endsection 
