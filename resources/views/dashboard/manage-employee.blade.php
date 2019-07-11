@extends('include.master')
@section('content')

<form id="updateempdtl" name="updateempdtl" method="POST" action="{{url('update_detailsemp')}}" onsubmit="alertSuccess()" >
  {{csrf_field()}}
  <div id="content" style="overflow:scroll; height: 5px;">
   <div class="container-fluid white-bg">
     <div class="col-md-12"><h3 class="mrg-btm">Update Employee Details</h3></div>
     <div class="col-md-12">
       <div class="overflow-scroll">
         <div class="table-responsive" >
           
         </div>

         <table id="example" class="table table-bordered table-striped tbl" >
          <thead>

            <input type="hidden" name="sfbaid" id="sfbaid" value="{{$data[0]->employeeid}}">
            <div class="form-group col-md-6">
              <div class="col-md-5">
                <label>UID :</label>
              </div>
              <div class="col-md-7">
               <input type="text" class="text-primary form-control" name="euid" id="euid"  value="{{$data[0]->UId}}" readonly="">
             </div>
           </div>

           <div class="form-group col-md-6">
            <div class="col-md-5">
              <label>FBA ID:</label>
            </div>
            <div class="col-md-7">
             <input type="text" class="text-primary form-control" name="efbid" id="efbid" maxlength="6" value="{{$data[0]->fba_id}}" readonly="" required="">
           </div>
         </div>

         <div class="form-group col-md-6">
          <div class="col-md-5">
            <label>Role ID:</label>
          </div>
          <div class="col-md-7">
            <input type="text" class="text-primary form-control" name="eroleid" id="eroleid" readonly  value="{{$data[0]->role_id}}">
          </div>
        </div>

        <div class="form-group col-md-6">
          <div class="col-md-5">
            <label>Employee Name :</label>
          </div>
          <div class="col-md-7">
           <input type="text" class="text-primary form-control" name="ename" id="ename" value="{{$data[0]->EmployeeName}}">
         </div>
       </div>

     </div>


     <div class="form-group col-md-6">
      <div class="col-md-5">
        <label>Mobile No:</label>
      </div>
      <div class="col-md-7">
       
        <input type="text" class="text-primary form-control" name="emobile" id="emobile" maxlength="10" value="{{$data[0]->MobileNo}}">
      </div>
    </div>

    <div class="form-group col-md-6">
      <div class="col-md-5">
        <label>Email:</label>
      </div>
      <div class="col-md-7">
        <input type="email" class="text-primary form-control" name="eemail" id="eemail" value="{{$data[0]->EmailId}}">
      </div>
    </div>


    <div class="form-group col-md-6">
      <div class="col-md-5">
        <label>Offical Mobile:</label>
      </div>
      <div class="col-md-7">
        <input type="text" class="text-primary form-control" name="offclmob" id="offclmob" maxlength="10" value="{{$data[0]->official_phone_no}}">
      </div>
    </div>


    <div class="form-group col-md-6">
      <div class="col-md-5">
        <label>offical Email:</label>
      </div>
      <div class="col-md-7">
        <input type="email" class="text-primary form-control" name="offclemail" id="offclemail" value="{{$data[0]->official_emailid}}">
      </div>
    </div>


    <div class="form-group col-md-6">
      <div class="col-md-5">
        <label>Profile:</label>
      </div>
      <div class="col-md-7">
        <select name="eprofile" id="eprofile"  class="text-primary form-control">
         @foreach($profilesave as $val)
         @if($val->Profile==$data[0]->Profile){
         <option selected="selected" value="{{$val->Profile}}">{{$val->Profile}}</option>
       }
       @else
       <option value="{{$val->Profile}}">{{$val->Profile}}</option>

       @endif
       @endforeach
     </select>
   </div>
 </div>


 <div class="form-group col-md-6">
  <div class="col-md-5">
    <label>Select Employee Category:</label>
  </div>
  <div class="col-md-7">
    <select name="ecatgory" id="ecatgory" class="text-primary form-control">
     @foreach($catgory as $val)
     @if($val->EmployeeCategory==$data[0]->EmployeeCategory){
     <option selected="selected" value="{{$val->EmployeeCategory}}">{{$val->EmployeeCategory}}</option> 
   }
   @else
   <option value="{{$val->EmployeeCategory}}">{{$val->EmployeeCategory}}</option>
   @endif
   @endforeach
 </select>
</div>
</div>


<div class="form-group col-md-6">
  <div class="col-md-5">
    <label>Designation:</label>
  </div>
  <div class="col-md-7">
    <select name="edesignation" id="edesignation" class="text-primary form-control">
      @foreach($digngtion as $val)

      @if($val->Designation==$data[0]->Designation){
      <option selected="selected" value="{{$val->Designation}}">{{$val->Designation}}</option> 
    }
    @else
    <option value="{{$val->Designation}}">{{$val->Designation}}</option>
    @endif
    @endforeach
  </select>
</div>
</div>

<div class="form-group col-md-6">                
  <div class="col-md-5">
    <label>Emp-Status:</label>
  </div>
  <div class="col-md-7">
    <select name="estatus" id="estatus"  class="text-primary form-control">
      @foreach($status as $val)
      @if($val->Employee_Status==$data[0]->Employee_Status){
    <option selected="selected" value="{{$val->Employee_Status}}">{{$val->Employee_Status}}</option> 
    }
    @else
    <option value="{{$val->Employee_Status}}">{{$val->Employee_Status}}</option>
    @endif
    @endforeach
  </select>
</div>
</div>


        <div class="form-group col-md-6" id="cluster_hide">
          <div class="col-md-5">
           <label>Select Cluster Head:</label>
         </div>
         <div class="col-md-7">
          <select name="clusterhead" id="clusterhead" class="text-primary form-control" required="">
            @foreach($cluster_Head as $val)
           @if($val->Cluster_Head==$data[0]->Cluster_Head){
         <option selected="selected" value="{{$val->Cluster_Head}}">{{$val->Cluster_Head}}</option>
         }                                          
         @else
        <option value="{{$val->Cluster_Head}}">{{$val->Cluster_Head}}</option>
       @endif
       @endforeach

          </select>
        </div>
      </div>


<div class="form-group col-md-6" id="state_hide">
        <div class="col-md-5">
         <label>Select State Head /ALM:</label>
       </div>
       <div class="col-md-7">
        <select selected="selected" name="statehead" id="statehead" class="text-primary form-control" required="">
          @foreach($state_head as $val)
          @if($val->State_Head==$data[0]->State_Head){
          <option selected="selected" value="{{$val->State_Head}}">{{$val->State_Head}}</option>
          }
          @else
          <option value="{{$val->State_Head}}">{{$val->State_Head}}</option>

          @endif
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
        @foreach($zonal_head as $val)
        @if($val->Zonal_Head==$data[0]->Zonal_Head){
        <option selected="selected" value="{{$val->Zonal_Head}}">{{$val->Zonal_Head}}</option>
        }
        @else
        <option value="{{$val->Zonal_Head}}"{{$val->Zonal_Head}}></option>
        @endif
        @endforeach

      </select>
    </div>
  </div>

<div class="form-group col-md-6">
  <div class="col-md-5">
    <label>Recruiter T.L:</label>
  </div>
  <div class="col-md-7">
    <select name="tlname" id="tlname" class="text-primary form-control">
      @foreach($catgoryupdtetl as $val)
      <option selected="selected" value="{{$val->empname}}">{{$val->empname}}</option>
      
    
   
    @endforeach
  </select>
</div>
</div>





<div class="form-group col-md-6 ">
 <div class="col-md-5">
  <label>Campion Source:</label>
</div>
<div class="col-md-7">
  <div class="button-group">

   <button type="button" class="btn btn-default btn-sm dropdown-toggle form-control" data-toggle="dropdown">SELECT --</button>
   <ul class="dropdown-menu" style="min-width: 24rem; height:164px;margin-left:14px; overflow: auto;">
     @foreach($source as $val)
     @if(in_array($val->ID,$currentsource_array))
     <li style="font-size: 17px;"><a href="#" class="small" tabIndex="1" data-value='{{$val->ID}}'><input type="checkbox" checked name="esource[]" id="esource_{{$val->ID}}" value="{{$val->ID}}" style="margin: 4px 7px 0;" />{{$val->Source_name}}</a></li>
     @else
     <li style="font-size: 17px;"><a href="#" class="small" tabIndex="1" data-value='{{$val->ID}}'><input type="checkbox" name="esource[]" id="esource_{{$val->ID}}" value="{{$val->ID}}" style="margin: 4px 7px 0;" />{{$val->Source_name}}</a></li>
     @endif
     @endforeach
   </ul>
 </div>
</div>
</div>

<!-- <div class="form-group col-md-6">
            <div class="col-md-5">
              <label>Date :</label>
            </div>
            <div class="col-md-7">
              <input type="date" value="{{$data[0]->JoinDate}}" class="text-primary form-control" name="joindate" id="joindate" required="" >
            </div>
          </div> -->
      <div class="form-group col-md-6">
            <div class="col-md-5">
            <label> Finmart Joining Date :</label>
            </div>
             <div class="col-md-7">
          <div id="datepicker" class="input-group date " data-date-format="mm-dd-yyyy">
               <input class="form-control date-range-filter" value="{{$data[0]->JoinDate}}" type="text" name="joindate" id="joindate"/>
          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
               </div>
               </div>
               </div>


          <div class="form-group col-md-6">
          <div class="col-md-5">
             <label>C.C.Location :</label>
          </div>
          <div class="col-md-7">
      <select  name="cclocation" id="cclocation" class="text-primary form-control">
      @foreach($data as $val)
         @if($val->CClocation==$data[0]->CClocation){
         <option selected="selected" value="{{$val->CClocation}}">{{$val->CClocation}}</option>
         }
<!--               <option value="">--Select-Location--</option>
 -->              <option value="Mumbai">Mumbai</option>
              <option value="Delhi">Delhi</option>
              <option value="Bangalore">Bangalore</option>
              <option value="Na">Na</option>

                @endif
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
              <!-- <option value="">--Select-language--</option> -->
              <option <?php if($data[0]->language=='English'){echo "selected";}?> value="English">English</option>
              <option <?php if($data[0]->language=='Hindi'){echo "selected";}?> value="Hindi">Hindi</option>
              <option <?php if($data[0]->language=='Marathi'){echo "selected";}?> value="Marathi">Marathi</option>
              <option <?php if($data[0]->language=='Tamil'){echo "selected";}?> value="Tamil">Tamil</option>
              <option <?php if($data[0]->language=='Kannada'){echo "selected";}?> value="Kannada">Kannada</option>
              <option <?php if($data[0]->language=='Telgu'){echo "selected";}?> value="Telgu">Telgu</option>
              <option <?php if($data[0]->language=='Malyalam'){echo "selected";}?> value="Malyalam">Malyalam</option>
              <option <?php if($data[0]->language=='Bengali'){echo "selected";}?> value="Bengali">Bengali</option>
              <option <?php if($data[0]->language=='Oriya'){echo "selected";}?> value="Oriya">Oriya</option>
              <option <?php if($data[0]->language=='Assamese'){echo "selected";}?> value="Assamese">Assamese</option>
              <option <?php if($data[0]->language=='Punjabi'){echo "selected";}?> value="Punjabi">Punjabi</option>
              <option <?php if($data[0]->language=='Gujrati'){echo "selected";}?> value="Gujrati">Gujrati</option>
              <option <?php if($data[0]->language=='Bhojpuri'){echo "selected";}?> value="Bhojpuri">Bhojpuri</option>
              <option <?php if($data[0]->language=='Haryanvi'){echo "selected";}?> value="Haryanvi">Haryanvi</option>
         </select>
       </div>
    </div>

     <div class="form-group col-md-6">
        <div class="col-md-5">
          <label>Secondary Language :</label>
             </div>
               <div class="col-md-7">
         <select name="secondlanguage" id="secondlanguage" class="text-primary form-control">
              <option <?php if($data[0]->Secondary_language=='English'){echo "selected";}?> value="English">English</option>
              <option <?php if($data[0]->Secondary_language=='Hindi'){echo "selected";}?> value="Hindi">Hindi</option>
              <option <?php if($data[0]->Secondary_language=='Marathi'){echo "selected";}?> value="Marathi">Marathi</option>
              <option <?php if($data[0]->Secondary_language=='Tamil'){echo "selected";}?> value="Tamil">Tamil</option>
              <option <?php if($data[0]->Secondary_language=='Kannada'){echo "selected";}?> value="Kannada">Kannada</option>
              <option <?php if($data[0]->Secondary_language=='Telgu'){echo "selected";}?> value="Telgu">Telgu</option>
              <option <?php if($data[0]->Secondary_language=='Malyalam'){echo "selected";}?> value="Malyalam">Malyalam</option>
              <option <?php if($data[0]->Secondary_language=='Bengali'){echo "selected";}?> value="Bengali">Bengali</option>
              <option <?php if($data[0]->Secondary_language=='Oriya'){echo "selected";}?> value="Oriya">Oriya</option>
              <option <?php if($data[0]->Secondary_language=='Assamese'){echo "selected";}?> value="Assamese">Assamese</option>
              <option <?php if($data[0]->Secondary_language=='Punjabi'){echo "selected";}?> value="Punjabi">Punjabi</option>
              <option <?php if($data[0]->Secondary_language=='Gujrati'){echo "selected";}?> value="Gujrati">Gujrati</option>
              <option <?php if($data[0]->Secondary_language=='Bhojpuri'){echo "selected";}?> value="Bhojpuri">Bhojpuri</option>
              <option <?php if($data[0]->Secondary_language=='Haryanvi'){echo "selected";}?> value="Haryanvi">Haryanvi</option> 

         </select>
       </div>
    </div>




<div class="form-group col-md-6">
  <div class="col-md-5">
    <label>BO-Access :</label>
  </div>
  <div class="col-md-7"> 
    @if($data[0]->BOAccess=='Read')
    <input type="radio" name="boaccess" id="Read" value="Read" checked> Read
    <input type="radio" name="boaccess" id="Read/Write"  value="Read/Write"> Read/Write
    <input type="radio" name="boaccess" id="No Access"  value="No Access"> No Access
    @endif

    @if($data[0]->BOAccess=='Read/Write')
    <input type="radio" name="boaccess" id="Read" value="Read"> Read
    <input type="radio" name="boaccess" id="Read/Write"  value="Read/Write" checked> Read/Write
    <input type="radio" name="boaccess" id="No Access"  value="No Access"> No Access
    @endif

    @if($data[0]->BOAccess=='No Access')
    <input type="radio" name="boaccess" id="Read" value="Read"> Read
    <input type="radio" name="boaccess" id="Read/Write"  value="Read/Write"> Read/Write
    <input type="radio" name="boaccess" id="No Access"  value="No Access" checked> No Access
    @endif 
    
  </div>
</div>


<!--  <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>BO-Access:</label>
        </div>
        <div class="col-md-7">
     <input type="text" class="text-primary form-control" name="boaccess" id="boaccess" value="{{$data[0]->BOAccess}}">
     </div>
   </div>
 -->
<!-- 
<div class="form-group col-md-6">
        <div class="col-md-5">
        <label>POSP-Access :</label>
        </div>
        <div class="col-md-7"> 
        @if($data[0]->POSPAccess=='Read')
         <input type="radio" name="pospaccess" id="Read" value="Read" checked> Read
        <input type="radio" name="pospaccess" id="Read/Write"  value="Read/Write"> Read/Write
         <input type="radio" name="pospaccess" id="No Access"  value="No Access"> No Access
        @endif

         @if($data[0]->POSPAccess=='Read/Write')
         <input type="radio" name="pospaccess" id="Read" value="Read"> Read
        <input type="radio" name="pospaccess" id="Read/Write"  value="Read/Write" checked> Read/Write
         <input type="radio" name="pospaccess" id="No Access"  value="No Access"> No Access
        @endif

         @if($data[0]->POSPAccess=='No Access')
         <input type="radio" name="pospaccess" id="Read" value="Read"> Read
        <input type="radio" name="pospaccess" id="Read/Write" value="Read/Write"> Read/Write
         <input type="radio" name="pospaccess" id="No Access" value="No Access" checked> No Access
        @endif

        </div>
      </div> -->




<!--       <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>POSP-Access:</label>
        </div>
        <div class="col-md-7">
     <input type="text" class="text-primary form-control" name="pospaccess" id="pospaccess" value="{{$data[0]->POSPAccess}}">
     </div>
   </div> -->


   <div class="form-group col-md-6">
    <div class="col-md-5">
      <label>POSP-Access :</label>
    </div>
    <div class="col-md-7"> 
      
      @if($data[0]->POSPAccess=='Read')
      <input type="radio" name="pospaccess" id="Read" value="Read" checked> Read
      <input type="radio" name="pospaccess" id="Read/Write"  value="Read/Write"> Read/Write
      <input type="radio" name="pospaccess" id="No Access"  value="No Access"> No Access
      @endif

      @if($data[0]->POSPAccess=='Read/Write')
      <input type="radio" name="pospaccess" id="Read" value="Read"> Read
      <input type="radio" name="pospaccess" id="Read/Write"  value="Read/Write" checked> Read/Write
      <input type="radio" name="pospaccess" id="No Access"  value="No Access"> No Access
      @endif

      @if($data[0]->POSPAccess=='No Access')
      <input type="radio" name="pospaccess" id="Read" value="Read"> Read
      <input type="radio" name="pospaccess" id="Read/Write"  value="Read/Write"> Read/Write
      <input type="radio" name="pospaccess" id="No Access"  value="No Access" checked> No Access
      @endif

    </div>
  </div>


  <div class="form-group col-md-6">
    <div class="col-md-5">
      <label>Payout-System :</label>
    </div>
    <div class="col-md-7"> 
      @if($data[0]->PayoutSystem=='Read')
      <input type="radio" name="paysystem" id="Read" value="Read" checked> Read
      <input type="radio" name="paysystem" id="Read/Write"  value="Read/Write"> Read/Write
      <input type="radio" name="paysystem" id="No Access"  value="No Access"> No Access
      @endif

      @if($data[0]->PayoutSystem=='Read/Write')
      <input type="radio" name="paysystem" id="Read" value="Read"> Read
      <input type="radio" name="paysystem" id="Read/Write"  value="Read/Write" checked> Read/Write
      <input type="radio" name="paysystem" id="No Access"  value="No Access"> No Access
      @endif

      @if($data[0]->PayoutSystem=='No Access')
      <input type="radio" name="paysystem" id="Read" value="Read"> Read
      <input type="radio" name="paysystem" id="Read/Write"  value="Read/Write"> Read/Write
      <input type="radio" name="paysystem" id="No Access"  value="No Access" checked> No Access
      @endif

    </div>
  </div>



<!--     <div class="form-group col-md-6">
        <div class="col-md-5">
        <label>Payout-System:</label>
        </div>
        <div class="col-md-7">
     <input type="text" class="text-primary form-control" name="paysystem" id="paysystem" value="{{$data[0]->PayoutSystem}}">
     </div>
   </div> -->
   
   <div class="form-group col-md-6">
    <div class="col-md-5">
      <label>Employee Tpye  :</label>
    </div>
    <div class="col-md-7">
      <input type="text" class="text-primary form-control" name="emptype" id="emptype" value="Employee" readonly="">
    </div>
  </div>

  <!-- <div class="form-group col-md-6">
          <div class="col-md-5">
        <label>Location Access :</label>
        </div>
        <div class="col-md-7">
        <input type="radio" name="emolocation" id="mapcity" value="Mapped_Area" checked> Mapped_City
  		<input type="radio" name="emolocation" id="allindia" value="All_India"> All India<br>
        </div>
      </div> -->
      <div class="form-group col-md-6">
        <div class="col-md-5">
          <label>Location Access :</label>
        </div>
        <div class="col-md-7"> 
          @if($data[0]->Location=='Mapped_Area')
          <input type="radio" name="emolocation" id="Mapped_Area" value="Mapped_Area" checked> Mapped_Area
          <input type="radio" name="emolocation" id="All_India"  value="All_India"> All_India
          @else
          <input type="radio" name="emolocation" id="Mapped_Area" value="Mapped_Area" > Mapped_Area
          <input type="radio" name="emolocation" id="All_India"  value="All_India" checked> All_India
          @endif;
          
        </div>
      </div>




      <div class="form-group col-md-6">
        <div class="col-md-5">
          <!-- <label>User grp id</label> -->
        </div>
        <div class="col-md-7">
         <input type="hidden" class="text-primary form-control" name="ugropid" id="ugropid" value="{{$data[0]->usergroup}}" >
       </div>
     </div>


     <div class="form-group col-md-12">
      <div class="col-md-4">
        <input type="Submit" name="statussub" id="statussub" value="submit" class="btn btn-success">
      </div>
    </div>
  </thead>
  <tbody>
    <tbody>
    </tbody>
  </tbody>
</table>
</div>
</div>
</div>
</div>
</div>






<!-- <script type="text/javascript">
	
$("#statussub").click(function(){ 
 if ($('#updateempdtl').valid()){
   //console.log($('#updateempdtl').serialize());
   $.ajax({ 
   url: "{{URL::to('update_detailsemp')}}",
   method:"POST",
   data: $('#updateempdtl').serialize(),  
   success: function(msg)  
   {
  alert("Record has been saved successfully");
  
    $("#updateempdtl").trigger('reset');
        window.location.reload();

     // location.reload();

    
  }
 }); 
 } 
 });

</script> -->





<script type="text/javascript">
 
  $(document).ready(function(){
    //alert('test');
    $('#statussub').onclick(function () {
      alert('test');
      ($('#updateempdtl').valid()){
       $.ajax({ 
         url: "{{URL::to('update_detailsemp')}}",
         method:"POST",
         data: $('#updateempdtl').serialize(),
         success: function(msg)  
         {
   	//alert('Update Successfully');
   	//window.location.reload();
    
    
   }

 });
     }

   });

  });




</script>


</script>
<script type="text/javascript">
  
  function getloneid(){
    var roleid = $("#eprofile").val();  
    $.ajax({
     url: '../get-role-id/'+roleid,
     type: "get",             
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
  
  function getusergrpeid(){

    var usgrpeid = $("#eprofile").val();  
  //alert(usgrpeid);
  $.ajax({
   url: '../get-ugroup-id/'+usgrpeid,
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
// $(document).ready(function() {
// var language_array=["English","Hindi","Marathi","Tamil","Kannada","Telgu","Malyalam","Bengali","Oriya","Assamese","Punjabi","Gujrati","Bhojpuri","Haryanvi"];
  
//     var primary_opt_val = "<option value=''>Select Primary Language</option>";

//     $.each(language_array , function(index , value){
//       primary_opt_val += "<option value='"+ value +"'>"+ value +"</option>";
//     });

//     $("#emplanguage").html(primary_opt_val);
//   });

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


















<script>
  function alertSuccess() {
    alert('Update Successfully');
  }
</script>



@endsection