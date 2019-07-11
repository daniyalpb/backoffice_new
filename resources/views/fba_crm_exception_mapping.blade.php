@extends('include.master')
@section('content')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <p class="alert alert-success">{{ Session::get('message') }}</p>
</div>
@endif

<style type="text/css">

  h3.mrg-btm {
    font-style: italic;
  }

</style>

<div class="col-md-12"><h3 class="mrg-btm">FBA CRM Exception Mapping</h3>


  <form  id="leadquick" name="leadquick" action="{{url('fba-exception-update')}}" method="post"> 
    {{ csrf_field() }}
    <hr>
  </div>
  <!-- <table class="table table-responsive table-hover" cellspacing="0" id="example"> -->

  <div class="col-md-4 col-sm-4 col-xs-12">
   <h4 style="margin-left: 45%;">State</h4>
   <div class="form-group">
     <select multiple="multiple" class="form-control select-sty" name="state[]" id="state" >    
     </select>
   </div>
 </div>

 <div class="col-md-4 col-sm-4 col-xs-12">
   <h4 style="margin-left: 45%;">City</h4>
   <div class="form-group">
     <select  multiple="multiple" class="form-control select-sty" name="city[]" id="city">
     </select>
   </div>
 </div>

 <div class="form-group"> <input type="Submit" name="qlead" id="qlead"  class="mrg-top common-btn pull-left" style="margin-top: 56px;
  "  value="SHOW">
  <!-- style=" margin-top: 11%; margin-left: -237px"  -->
</div>
<!--  </form> -->
<br>

<div class="col-md-12 hidden" id="tablediv">
  <div class="overflow-scroll">
    <div class="table-responsive" >
    <!-- <th><input type="checkbox" name="chekfba" id="chekfba" class="select-checkall-header"></th> 
    <input name="select_all" id="checkAll" type="checkbox" />-->
      <!-- <form method="post" id="fbdatail-table-from">
      {{ csrf_field() }} -->
      <input type="hidden" name="txtfid" id="txtfid">
      
      <!--  -->


    </div> 
    <div class="form-group col-md-6"> 
      <div class="col-md-5">
        <select name="eprofile" id="eprofile"  class="text-primary form-control" onchange="getprofilename(this.value,document.getElementById ('pname').value)" >
         <option value="">--Select Profile--</option>
         @foreach($empprofile as $val)
         <option value="{{$val->role_id}}">{{$val->Profile}}</option>
         @endforeach
       </select>
     </div>
   </div>

   <div class="form-group col-md-6" style="margin-left: -409px"> 
    <div class="col-md-5">
     <select  class="form-control select-sty " name="pname" id="pname">
     </select>
   </div>
 </div> 




 <table class="datatable-responsive table table-striped table-bordered nowrap" id="example">

   <thead>
     <tr>
       <th><input name="select_all" id="example-select-all" type="checkbox" onclick="p_check_all_fba(this.id)"/></th>       
       <th>FBA ID</th> 
       <th>FBA Name</th>                                
     </tr>
   </thead>
   

   <div>
     <input type="hidden" name="hiddenid" id="hiddenid" readonly="readonly"> 
     <input type="Submit" name="fbdatail" id="fbdatail" value="submit" class="btn btn-success"
     style="margin-left: 108px;margin-top: -145px;">
     <!--   style="margin-left: 575px;margin-top:-1040px;" -->

<!-- 
 <a id="fbdatail" name="fbdatail" class="btn btn-success">Submit</a> -->
</div>
</form> 
</table>
</div>
</div>
</div>

<script type="text/javascript">

  $(document).ready(function(){

    $('#qlead').on('click', function(e){
      e.preventDefault(); 
      getLoanData();

    });


    function getLoanData(){
      $.ajax({
        url: 'fba-exception-data',
        type: "POST",           
        data:  $('#leadquick').serializeArray(),
        success:function(data) {
          var json = JSON.parse(data);
          console.log(json);

          if(json.length>0){

           $('#tablediv').removeClass('hidden');
           table = $('#example').DataTable({         
            "data":json,
            "order": [[ 1, "desc" ]],
            "destroy": true,
            "searching": true,
            
            "columns": [
            {"data":"FBAID" ,

            "render": function ( data, type, row, meta ) {
              return '<input type="checkbox" name="p_fbaid" id="p_fbaid_'+ $('<div/>').text(data).html() + '" onclick="stausupdate(this.id)" value="'+ $('<div/>').text(data).html() + '">';              }
            },
            { "data": "FBAID"},
            { "data": "FullName"},
            
            ]
            
          });
         }
         else{
           $('#tablediv').addClass('hidden');
           alert('No data available');
         }
       },
       error: function(XMLHttpRequest, textStatus, errorThrown) {
        $('#tablediv').addClass('hidden');
        alert("Please select state and city");
      }
    });     
    }
  })

  $.ajax({ 
   url: "{{URL::to('get-fba-exception')}}",
   method:"GET",
   success: function(datas)  
   {
     var data=$.parseJSON(datas);
 // console.log(data);
 if(data)
   { $.each(data, function( index, value ) {
     $('#state').append('<option value="'+value.state_id+'">'+value.state_name+'</option>');
   }); 
}else{
  $('#state').empty().append('No Result Found');
}
},
});

  $('#state').on('change', function() {
    $("#city").empty().append('');
   // alert('okae');
   var state=$('#state').find(":selected").val();
   var array = "";
   var i=0;
   $('#state  option:selected').each(function() {
    array+= $(this).val()+",";
  });
   console.log(array);
   var v_token ="{{csrf_token()}}";
   $.ajax({  
    type: "POST",  
    url: "{{URL::to('fbaexception-city')}}",
    data : {'_token': v_token,'state':array},
    success: function(msg){
      console.log(msg);
      if(msg)
        {  $.each(msg, function( index, value ) {
         $('#city').append('<option value="'+value.cityname+'">'+value.cityname+'</option>');   
       }); 
    }else{
      $('#city').empty().append('No Result Found');
    }
  }  
});
 });

</script>

<script type="text/javascript">
  function getprofilename(Profile){
    $("#pname").empty();
    //console.log(Profile);
    $.ajax({ 
      url: 'crm-profile-name/'+Profile,
      method:"GET",
      success: function(data){
        var msg = JSON.parse(data);
        $("#pname").append('<option value="">No Mapping</option');
        $.each(msg, function(index) {
          $("#pname").append('<option  value="'+msg[index].UId+'">'+msg[index].EmployeeName+'</option');
          
        });



          //console.log(data);
        }
      });
  }


</script>

<script type="text/javascript">
/*  function stausupdate(FBAID){
 //alert(id);
 $("#hiddenid").val(FBAID);
 var FBAID = $("#hiddenid").val()
};*/


function stausupdate(this_id){

  $("#example-select-all").prop("checked",false);

  if($("#hiddenid").val() == ""){
    var fbaid_array = [];
  }else{
    var fbaid_array = $("#hiddenid").val().split(',');
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

$("#hiddenid").val(fbaid_array.join(","));
}
</script>
<script type="text/javascript">
  function p_check_all_fba(this_id){
    var fbaid_array = [];
  // Handle click on "Select all" control
  var table = $('#example').DataTable();
  // Get all rows with search applied
  var rows = table.rows({ 'search': 'applied' }).nodes();
  if($("#" + this_id).is(":checked")){            //if checkbox is checked

   $.each($('input[type="checkbox"]', rows) , function(key , input_checkbox){
     fbaid_array.push(input_checkbox.value);
     $(input_checkbox).prop('checked', true);
   });
   $("#hiddenid").val(fbaid_array.join(","));
 }
     else{                                           //if checkbox is unchecked
      $.each($('input[type="checkbox"]', rows) , function(key , input_checkbox){
        $(input_checkbox).prop('checked', false);
      });
      $("#hiddenid").val("");
    }
  }



</script>





@endsection