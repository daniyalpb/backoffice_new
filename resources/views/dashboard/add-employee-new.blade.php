@extends('include.master')
@section('content')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <p class="alert alert-success">{{ Session::get('message') }}</p>
</div>
@endif
</script>

<form id="addnewemp" name="addnewemp" method="POST" action="{{url('add-new-emp')}}">
  {{csrf_field()}}
  <div id="content" style="overflow:scroll; height: 5px;">
   <div class="container-fluid white-bg">
     <div class="col-md-12"><h3 class="mrg-btm"> Add New Employee</h3></div>
     <div class="col-md-12">
       <div class="overflow-scroll">
         <div class="table-responsive" >
           
         </div>

         

         <table id="example" class="table table-bordered table-striped tbl" >
          <thead>

            <input type="hidden" name="sfbaid" id="sfbaid" value=""/>
            <div class="form-group col-md-6">
              <div class="col-md-5">
                <label>UID :</label>
              </div>
              <div class="col-md-7">
               <input type="text" class="text-primary form-control" name="euid" id="euid"  maxlength="7" required="">
             </div>
           </div>
           <div class="form-group col-md-6">
            <div class="col-md-5">
              <label>FBA ID:</label>
            </div>
            <div class="col-md-7">
              <input type="text" class="text-primary form-control" name="efbid" id="efbid" maxlength="6" required="yes">
            </div>
          </div>




          <div class="form-group col-md-6">
            <div class="col-md-5">
              <label>Role ID:</label>
            </div>
            <div class="col-md-7">
              <input type="text" class="text-primary form-control" name="eroleid" id="eroleid" readonly="">
            </div>
          </div>

          <div class="form-group col-md-6">
            <div class="col-md-5">
              <label>Employee Name :</label>
            </div>
            <div class="col-md-7">
              <input type="text" class="text-primary form-control" name="ename" id="ename" required="">
            </div>
          </div>

        </div>


        <div class="form-group col-md-6">
          <div class="col-md-5">
            <label>Mobile No:</label>
          </div>
          <div class="col-md-7">
            <input type="text" class="text-primary form-control" name="emobile" id="emobile" maxlength="10" required="">
          </div>
        </div>

        <div class="form-group col-md-6">
          <div class="col-md-5">
            <label>Email:</label>
          </div>
          <div class="col-md-7">
            <input type="email" class="text-primary form-control" name="eemail" id="eemail" required="">
          </div>
        </div>

        <div class="form-group col-md-6">
          <div class="col-md-5">
            <label>Official Mobile:</label>
          </div>
          <div class="col-md-7">
            <input type="text" class="text-primary form-control" name="offclmob" id="offclmob" maxlength="10" required="">
          </div>
        </div>



        
        <div class="form-group col-md-6">
          <div class="col-md-5">
            <label>Official Email:</label>
          </div>
          <div class="col-md-7">
            <input type="email" class="text-primary form-control" name="offclemail" id="offclemail" required="">
          </div>
        </div>

          <div class="form-group col-md-6" id="sel" onchange="hide_show_droup_down()">
          <div class="col-md-5">
            <label>Profile:</label>
          </div>
          <div class="col-md-7">
          <select  name="eprofile" id="eprofile" class="text-primary form-control" onchange="get_rrm_tl_name(this.value,document.getElementById ('selecttl').value)" required="">
              <option value="">--Select Employee Profile--</option>
              @foreach($profileadd as $val)
              <option value="{{$val->Profile}}">{{$val->Profile}}</option>
              @endforeach
              
            </select>
          </div>
        </div>
<!-- NEW Devolpment start
-->            <div class="form-group col-md-6" id="cont" style="display:none;">
<div class="col-md-5">
  <label>Select TL:</label>
</div>
<div class="col-md-7">
 <select  class="form-control select-sty " name="selecttl" id="selecttl">
 </select>
</div>
</div>

        <div class="form-group col-md-6" id="cluster_hide">
          <div class="col-md-5">
           <label>Select Cluster Head:</label>
         </div>
         <div class="col-md-7">
          <select name="clusterhead" id="clusterhead" class="text-primary form-control" required="">
            <option value="">--Select Cluster Head --</option>
            @foreach($allhead as $val)
            <option value="{{$val->Cluster_Head}}">{{$val->Cluster_Head}}</option>
            @endforeach

          </select>
        </div>
      </div>


      <div class="form-group col-md-6" id="state_hide">
        <div class="col-md-5">
         <label>Select State Head /ALM:</label>
       </div>
       <div class="col-md-7">
        <select name="statehead" id="statehead" class="text-primary form-control" required="">
          <option value="">--Select State Head/ALM--</option>
          @foreach($allhead as $val)
          <option value="{{$val->State_Head}}">{{$val->State_Head}}</option>
          @endforeach

        </select>
      </div>
    </div>



    <div class="form-group col-md-6" id="zonal_hide">
      <div class="col-md-5">
       <label>Select Zonal Head/LM:</label>
     </div>
     <div class="col-md-7">
      <select name="zonalhead" id="zonalhead" class="text-primary form-control" required="">
        <option value="">--Select Zonal Head/LM --</option>
        @foreach($allhead as $val)
        <option value="{{$val->Zonal_Head}}">{{$val->Zonal_Head}}</option>
        @endforeach

      </select>
    </div>
  </div>

<!-- NEW Devolpment End
 -->


        <div class="form-group col-md-6">
          <div class="col-md-5">
            <label>Select Employee Category:</label>
          </div>
          <div class="col-md-7">
            <select name="ecatgory" id="ecatgory" class="text-primary form-control" required="">
              <option value="">--Select Employee category--</option>
              @foreach($catgoryadd as $val)
              <option value="{{$val->EmployeeCategory}}">{{$val->EmployeeCategory}}</option>
              @endforeach
              
            </select>
          </div>
        </div>


        <div class="form-group col-md-6">
          <div class="col-md-5">
            <label>Designation:</label>
          </div>
          <div class="col-md-7">
            <select name="edesignation" id="edesignation" class="text-primary form-control" required="">
              <option value="">--Select Designation--</option>
              @foreach($digngtionadd as $val)
              <option value="{{$val->Designation}}">{{$val->Designation}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="form-group col-md-6">
          <div class="col-md-5">
            <label>Emp-Status:</label>
          </div>
          <div class="col-md-7">
            <select name="estatus" id="estatus" class="text-primary form-control" required="">
              <option value="">--Select-Emp-Status--</option>
              @foreach($statusadd as $val)
              <option value="{{$val->Employee_Status}}">{{$val->Employee_Status}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="form-group col-md-6">
          <div class="col-md-5">
            <label>Employee Type  :</label>
          </div>
          <div class="col-md-7">
            <input type="text" class="text-primary form-control" name="emptype" id="emptype" value="Employee" readonly="">
          </div>
        </div>

        <div class="form-group col-md-6 ">
          <div class="col-md-5">
            <label>Campion Source:</label>
          </div>

          <div class="col-md-7">
             <div class="button-group">
             <button type="button" name="sourceupdate" id="sourceupdate" class="btn btn-default btn-sm dropdown-toggle form-control" data-toggle="dropdown">SELECT --</button>
             <ul class="dropdown-menu" style="min-width: 24rem; height: 152px;margin-left: 15px; overflow: auto;">
               @foreach($empsource as $val)
               <li style="font-size: 17px;"><a href="#" class="small" tabIndex="1" data-value='{{$val->ID}}'><input type="checkbox" name="esource[]" id="esource_{{$val->ID}}" value="{{$val->ID}}" style="margin: 4px 7px 0;" />{{$val->Source_name}}</a></li>
               @endforeach
             </ul>
           </div>
         </div>
       </div>

    <div class="form-group col-md-6">
        <div class="col-md-5">
          <label> Finmart Joining Date :</label>
            </div>
             <div class="col-md-7">
               <div id="datepicker" class="input-group date " data-date-format="mm-dd-yyyy">
               <input class="form-control date-range-filter" type="text" placeholder="Select Date" name="joindate" id="joindate"/>
          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
        </div>
  </div>

  
    <div class="form-group col-md-6">
        <div class="col-md-5">
          <label>C.C.Location :</label>
             </div>
               <div class="col-md-7">
              <select name="cclocation" id="cclocation" class="text-primary form-control" required="">
              <option value="">--Select-Location--</option>
              <option value="Mumbai">Mumbai</option>
              <option value="Delhi">Delhi</option>
              <option value="Bangalore">Bangalore</option>
              <option value="Na">Na</option>
         </select>
       </div>
    </div>


       <div class="form-group col-md-6">
          <div class="col-md-5">
             <label>T.L.Name :</label>
          </div>
          <div class="col-md-7">
        <select name="tlname" id="tlname" class="text-primary form-control">
        <option value="">--Select--</option>
        @foreach($catgoryupdtetladd as $val)
        <option value="{{$val->EmployeeName}}">{{$val->EmployeeName}}</option>
          @endforeach
        </select>
      </div>
  </div>

    <div class="form-group col-md-6">
          <div class="col-md-5">
             <label>ALM Name :</label>
          </div>
          <div class="col-md-7">
        <select name="almname" id="almname" class="text-primary form-control">
        <option value="">--Select--</option>
        @foreach($catgoryupdtealmadd as $val)
         <option value="{{$val->EmployeeName}}">{{$val->EmployeeName}}</option>
          @endforeach
        </select>
          </div>
        </div>


  <div class="form-group col-md-6">
        <div class="col-md-5">
          <label>Primary Language :</label>
             </div>
               <div class="col-md-7">
              <select name="emplanguage" id="emplanguage" class="text-primary form-control">
              <option value="">--Select-Language--</option>
              <option value="English">English</option>
              <option value="Hindi">Hindi</option>
              <option value="Marathi">Marathi</option>
              <option value="Tamil">Tamil</option>
              <option value="Kannada">Kannada</option>
              <option value="Telgu">Telgu</option>
              <option value="Malyalam">Malyalam</option>
              <option value="Bengali">Bengali</option>
              <option value="Oriya">Oriya</option>
              <option value="Assamese">Assamese</option>
              <option value="Punjabi">Punjabi</option>
              <option value="Gujrati">Gujrati</option>
              <option value="Bhojpuri">Bhojpuri</option>
              <option value="Haryanvi">Haryanvi</option>
         </select>
       </div>
    </div>

    <div class="form-group col-md-6">
        <div class="col-md-5">
          <label>Secondary Language :</label>
             </div>
               <div class="col-md-7">
            <select name="secondlanguage" id="secondlanguage" class="text-primary form-control">
              <option value="">--Select-Language--</option>
              <option value="English">English</option>
              <option value="Hindi">Hindi</option>
              <option value="Marathi">Marathi</option>
              <option value="Tamil">Tamil</option>
              <option value="Kannada">Kannada</option>
              <option value="Telgu">Telgu</option>
              <option value="Malyalam">Malyalam</option>
              <option value="Bengali">Bengali</option>
              <option value="Oriya">Oriya</option>
              <option value="Assamese">Assamese</option>
              <option value="Punjabi">Punjabi</option>
              <option value="Gujrati">Gujrati</option>
              <option value="Bhojpuri">Bhojpuri</option>
              <option value="Haryanvi">Haryanvi</option>
         </select>
       </div>
    </div>

 <!--  <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Campion Source:</label>
        </div>
         <div class="col-md-7">
        <select name="estatus" id="estatus" class="text-primary form-control" required="">
          <option value="">--Select-Campion Source--</option>
           @foreach($empsource as $val)
            <option value="{{$val->Source_name}}">{{$val->Source_name}}</option>
             @endforeach
          </select>
          </div>
        </div> -->

          <div class="form-group col-md-6">
          <div class="col-md-5">
            <label>BO-Access :</label>
          </div>
          <div class="col-md-7">
            <input type="radio" name="boaccess" id="Read" value="Read" checked> Read
            <input type="radio" name="boaccess" id="Read/Write"  value="Read/Write"> Read/Write
            <input type="radio" name="boaccess" id="No Access"  value="No Access"> No Access
          </div>
        </div>



<!--     <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>BO-Access  :</label>
        </div>
        <div class="col-md-7">
        <input type="text" class="text-primary form-control" name="boaccess" id="boaccess" required="">
        </div>
      </div> -->

      <div class="form-group col-md-6">
        <div class="col-md-5">
          <label>POSP-Access :</label>
        </div>
        <div class="col-md-7">
          <input type="radio" name="pospaccess" id="Read" value="Read" checked> Read
          <input type="radio" name="pospaccess" id="Read/Write" value="Read/Write"> Read/Write
          <input type="radio" name="pospaccess" id="No Access"  value="No Access"> No Access
        </div>
      </div>




      <div class="form-group col-md-6">
        <div class="col-md-5">
          <label>Payout-System :</label>
        </div>
        <div class="col-md-7">
          <input type="radio" name="paysystem" id="Read" value="Read" checked> Read
          <input type="radio" name="paysystem" id="Read/Write" value="Read/Write"> Read/Write
          <input type="radio" name="paysystem" id="No Access" value="No Access"> No Access
          <br>
        </div>
      </div>


 <!-- <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Payout-System  :</label>
        </div>
        <div class="col-md-7">
        <input type="text" class="text-primary form-control" name="paysystem" id="paysystem" required="">
        </div>
      </div> -->

  <!--        <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Employee Tpye  :</label>
        </div>
        <div class="col-md-7">
        <input type="text" class="text-primary form-control" name="emptype" id="emptype" value="Employee" readonly="">
        </div>
      </div> -->

      <div class="form-group col-md-6">
        <div class="col-md-5">
          <label>Location Access  :</label>
        </div>
        <div class="col-md-7">
          <input type="radio" name="emolocation" id="mapcity" value="Mapped_Area" checked> Mapped_City
          <input type="radio" name="emolocation" id="allindia"  value="All_India"> All India<br>
        </div>
      </div>

      <div class="form-group col-md-6">
        <div class="col-md-5">

        </div>
        <div class="col-md-7">
         <input type="hidden" class="text-primary form-control" name="ugropid" id="ugropid">
       </div>
     </div>

     <div class="form-group col-md-12">
      <div class="col-md-4">
        <input type="Submit" name="statussub" id="statussub" value="submit" class="btn btn-success">
      </div>
    </div>
  </thead>
  <tbody>
  </tbody>
</table>
</div>
</div>
</div>
</div>
</div>

<script type="text/javascript">


    //alert('test');
    $('#statussub').on("click",function(){
        //alert('test');
        if (!$('#addnewemp').valid()){
           // if($("#addnewemp").val() == ""){
            alert("Please Select Mandatory fields ");
          }else{
           $.ajax({ 
             url: "{{URL::to('add-new-emp')}}",
             method:"GET",
             data: $('#addnewemp').serialize(),
             success: function(msg){
              alert("Update Successfully");

            }
          });
         }


       });    
     </script>

<!-- VIKAS NEW -->
<!-- <script type="text/javascript">
 $('#statussub').on("click",function(){
    if($("#addnewemp").val() == ""){
      alert("Please Select Source");
    }else{

      $.ajax({ 
        url: "{{URL::to('add-new-emp')}}",
        method:"Get",
       data: $('#addnewemp').serialize(),
        success: function(response) {
          alert("Update Successfully");
      
      }
    });

    }
  }) 
</script>  -->

<!-- VIKAS NEW -->
<script type="text/javascript">
  
  function getloneid(){

    var roleid = $("#eprofile").val();  
  //alert(roleid);
  $.ajax({
   url: 'get-role-id/'+roleid,
   type: "GET",             
   success:function(data) 
   {
              //alert(data);
              var role=  JSON.parse(data); 
              $("#eroleid").val(role[0].role_id);

            }
          });
}

$("#eprofile").change(function(){
  getloneid();
});


</script>

<script type="text/javascript">
 $(function(){
   $('#euid').keyup(function(){    
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

<script type="text/javascript">
 $(function(){
   $('#emobile').keyup(function(){    
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

<script type="text/javascript">
 $(function(){
   $('#offclmob').keyup(function(){    
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

<script type="text/javascript">
 $(function(){
   $('#efbid').keyup(function(){    
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



<script type="text/javascript">
 $(function(){
   $('#ename').keyup(function(){    
     var yourInput = $(this).val();
     re = /[1-91-1]?[1-91-1`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi;
     var isSplChar = re.test(yourInput);
     if(isSplChar)
     {
      var no_spl_char = yourInput.replace(/[1-91-1]?[1-91-1`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
      $(this).val(no_spl_char);
    }
  });
   
 });
</script>
<script type="text/javascript">
 $(function(){
   $('#boaccess').keyup(function(){    
     var yourInput = $(this).val();
     re = /[1-91-1]?[1-91-1 `~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi;
     var isSplChar = re.test(yourInput);
     if(isSplChar)
     {
      var no_spl_char = yourInput.replace(/[1-91-1]?[1-91-1 `~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
      $(this).val(no_spl_char);
    }
  });
   
 });
</script>
<script type="text/javascript">
 $(function(){
   $('#pospaccess').keyup(function(){    
     var yourInput = $(this).val();
     re = /[1-91-1]?[1-91-1 `~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi;
     var isSplChar = re.test(yourInput);
     if(isSplChar)
     {
      var no_spl_char = yourInput.replace(/[1-91-1]?[1-91-1 `~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
      $(this).val(no_spl_char);
    }
  });
   
 });
</script>


<script type="text/javascript">
  $(document).ready(function(){
  });
  $("#efbid").on("change",function(){              
    if($("#efbid").val()!=''){
      $.ajax({
        url: "{{url('fba-data')}}",
        type: 'get',
        data:{'id':$("#efbid").val()},
        success: function(data){
            // console.log(data);
            (data.length<=0) 
            if (data.length>0) 
            {
              
              $('#ename').val(data[0].FullName);
              $('#eemail').val(data[0].emailID); 
              $('#emobile').val(data[0].MobiNumb1);
              $('#efbid').val(data[0].FBAID);

            }else{            
              alert("FBA ID Does Not Exists");
              $('#ename').val('');
              $('#eemail').val(''); 
              $('#emobile').val('');
              $('#efbid').val('');
            }
          }                                
        });
    }
  });

</script>

<!--  <script type="text/javascript">
        $(document).ready(function(){
          });
            $("#euid").on("change",function(){              
            if($("#euid").val()!=''){
            $.ajax({
           url: "{{url('uid-data')}}",
           type: 'get',
           data:{'id':$("#euid").val()},
            success: function(data){
            console.log(data);
              (data.length<=0) 
                if (data[0].UId!="0") 
                {
                   alert("UID Already Exists");
               $('#euid').val('');
          }
                }                                
            });
             }
        });

      </script> -->



      <script type="text/javascript">
        $(document).ready(function(){


        });

        $("#euid").on("change",function(){  

          if($("#euid").val()!=''){

            $.ajax({
             url: "{{url('uid-data')}}",
             type: 'get',
             data:{'id':$("#euid").val()},
             success: function(data){
              
               
              if(data.api_db=="0" ){
                alert("UID Does Not Exists");
                $('#euid').val('');
                return false;
              }  else{
                if(data.existed_db == "1"){
                 $('#euid').val('');
                 
                 alert("UID Already Exists");

               }
             }                                          
           }

         });
          }
        });

      </script>

 <!-- <script type="text/javascript">
        $(document).ready(function(){
          });
            $("#euid").on("change",function(){              
            if($("#euid").val()!=''){
              $.ajax({
                url: "{{url('fba-data')}}",
              type: 'get',
              data:{'id':$("#euid").val()},
              success: function(data){
            // console.log(data);
              (data.length<=0) 
                if (data.length>0) 
                {
                  
              $('#euid').val(data[0].UID);
          

              }else{            
                alert("Not Exists");
             
               $('#euid').val('');
                    }
                }                                
            });
             }
        });

</script>

-->




<script type="text/javascript">
  
  function getusergrpeid(){

    var usgrpeid = $("#eprofile").val();  
  //alert(usgrpeid);
  $.ajax({
   url: 'get-ugroup-id/'+usgrpeid,
   type: "GET",             
   success:function(data) 
   {
              //alert(data);
              var role=  JSON.parse(data); 
              $("#ugropid").val(role[0].id);

            }
          });
}

$("#eprofile").change(function(){
  getusergrpeid();
});


</script>

</script>
<!-- Get Loan ID Start -->

<script>
  var options = [];
  $( '.dropdown-menu a' ).on( 'click', function( event ) {

   var $target = $( event.currentTarget ),
   val = $target.attr( 'data-value' ),
   $inp = $target.find( 'input' ),
   idx;

   if ( ( idx = options.indexOf( val ) ) > -1 ) {
    options.splice( idx, 1 );
    setTimeout( function() { $inp.prop( 'checked', false ) }, 0);
  } else {
    options.push( val );
    setTimeout( function() { $inp.prop( 'checked', true ) }, 0);
  }

  $( event.target ).blur();
  
   //console.log( options );
   return false;
 });
</script>


<script type="text/javascript">
$(document).ready(function() {
var language_array=["English","Hindi","Marathi","Tamil","Kannada","Telgu","Malyalam","Bengali","Oriya","Assamese","Punjabi","Gujrati","Bhojpuri","Haryanvi"];
  
    var primary_opt_val = "<option value=''>Select Primary Language</option>";

    $.each(language_array , function(index , value){
      primary_opt_val += "<option value='"+ value +"'>"+ value +"</option>";
    });

    $("#emplanguage").html(primary_opt_val);
  });

  $("#emplanguage").on('change' , function(){
    var language_array=["English","Hindi","Marathi","Tamil","Kannada","Telgu","Malyalam","Bengali","Oriya","Assamese","Punjabi","Gujrati","Bhojpuri","Haryanvi"];
    var primary_language = $(this).val();
    var secondary_opt_val = "<option value=''>Select Secondary Language</option>";

    $.each(language_array , function(index , value){
      if(value != primary_language){
        secondary_opt_val += "<option value='"+ value +"'>"+ value +"</option>";
      }
    });

    $("#secondlanguage").html(secondary_opt_val);
  });
</script>




<script type="text/javascript">
  function get_rrm_tl_name(Profile){
    //alert(Profile);
    $("#selecttl").empty();
    //console.log(Profile);

    if(Profile == "RRM"){
      var select_label = "Select RRM TL/Cluster Head";
    }else if(Profile == "Recruiter"){
      var select_label = "Select Recruiter TL";
    }else if(Profile == "Field_Sales"){
      var select_label = "Select Field_Sales tl";
    }else{
      var select_label = "Select";
    }

    $.ajax({ 
      url: 'rrm-tl-name/'+Profile,
      
      method:"GET",
      success: function(data){
        var msg = JSON.parse(data);

       $("#selecttl").append('<option value="">'+select_label+'</option');
        $.each(msg, function(index) {
          $("#selecttl").append('<option  value="'+msg[index].RRM_TL_NAME+'">'+msg[index].RRM_TL_NAME+'</option');
              // $("#almname").append('<option  value="'+msg[index].EmployeeName+'">'+msg[index].EmployeeName+'</option');
          
        });
 }
      });
  }


</script>


<!-- <script>
    function hide_show_droup_down() {
        var cont = document.getElementById('cont');
        if (cont.style.display == 'block') {
            cont.style.display = 'none';
        }
        else {
            cont.style.display = 'block';
        }
    }
</script> -->

<script type="text/javascript">

   function hide_show_droup_down() {
  //alert('okae');
  var cont=$('#eprofile').find(":selected").val();
  console.log(cont);
  if ( cont == 'RRM' || cont == 'Recruiter'|| cont == 'Field_Sales')
  {
        // $("#EmpType option[value='1']").show();
        $("#cont").show();
      }
      else{
        // $("#EmpType option[value='1']").hide();
        // $("#EmpType option[value='2']").show();
        $("#cont").hide();
        
      } 
      if(cont == 'Zonal_Head/LM')
      {
        $("#zonal_hide").hide();
        $("#state_hide").hide();
        $("#cluster_hide").hide();

      }if(cont == 'State_Head/ALM'){
        $("#state_hide").hide();
        $("#cluster_hide").hide();

      }if (cont == 'Cluster_Head'){
         $("#cluster_hide").hide();


      }
    
    };

  </script>




<!-- <script>
    else if (cont == 'Zonal_Head/LM'){
        
        $("#zonal_hide").hide();
        $("#state_hide").hide();
        $("#cluster_hide").hide();

      }
</script> -->


















<!-- <script>
  function alertSuccess() {
    alert('New Employee Added Successfully');
  }
</script> -->


@endsection