@extends('include.master')
@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <style>
table, th, td {
    border: 1px solid #D3D3D3 !important;
    border-collapse: collapse;
    background-color: white;
}
th,td {
    padding: 5px;
    text-align: left;
}
.card .card-body {
    padding: 1.88rem 1.81rem;
    box-shadow: 1px 5px 5px 1px rgb(128,128,128); 
    
}
.stretch-card{
  margin-bottom:25px !important;
  transition: transform .2s;     
  
}
.stretch-card:hover {
  transform: scale(1.1); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
.card-body {
    flex: 1 1 auto;
    padding: 1.25rem;
}
.btn, .btn-group.open .dropdown-toggle, .btn:active, .btn:focus, .btn:hover, .btn:visited, a, a:active, a:checked, a:focus, a:hover, a:visited, body, button, button:active, button:hover, button:visited, div, input, input:active, input:focus, input:hover, input:visited, select, select:active, select:focus, select:visited, textarea, textarea:active, textarea:focus, textarea:hover, textarea:visited {
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
}
a, div, h1, h2, h3, h4, h5, p, span {
    text-shadow: none;
}
*, *::before, *::after {
    box-sizing: border-box;
}
* {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
user agent stylesheet
div {
    display: block;
}
.card {
    background: #3b5998  !important;
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.125);
    border-radius: 0.25rem;
}
a, div, h1, h2, h3, h4, h5, p, span {
    text-shadow: none;
}
a, div, h1, h2, h3, h4, h5, p, span {
    text-shadow: none;
}
a, div, h1, h2, h3, h4, h5, p, span {
    text-shadow: none;
}
a, div, h1, h2, h3, h4, h5, p, span {
    text-shadow: none;
}
a, div, h1, h2, h3, h4, h5, p, span {
    text-shadow: none;
}
a, div, h1, h2, h3, h4, h5, p, span {
    text-shadow: none;
}
a, div, h1, h2, h3, h4, h5, p, span {
    text-shadow: none;
}
body {
    font-family: 'Noto Sans', sans-serif;
    background: #f1f1f1;
    color: #676a6d;
}
:root, body {
    font-size: 1rem;
    font-family: "Poppins", sans-serif;
}
body {
    margin: 0;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: left;
    background-color: #fff;
}
body {
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 14px;
    line-height: 1.42857143;
    color: #333;
    background-color: #fff;
}
:root, body {
    font-size: 1rem;
    font-family: "Poppins", sans-serif;
}
:root {
    --blue: #00aeef;
    --indigo: #6610f2;
    --purple: #ab8ce4;
    --pink: #E91E63;
    --red: #ff0017;
    --orange: #fb9678;
    --yellow: #ffd500;
    --green: #3bd949;
    --teal: #58d8a3;
    --cyan: #57c7d4;
    --white: #ffffff;
    --gray: #6c757d;
    --gray-dark: #292b2c;
    --blue: #00aeef;
    --indigo: #6610f2;
    --purple: #ab8ce4;
    --pink: #E91E63;
    --red: #ff0017;
    --orange: #fb9678;
    --yellow: #ffd500;
    --green: #3bd949;
    --teal: #58d8a3;
    --cyan: #57c7d4;
    --white: #ffffff;
    --white-smoke: #f3f5f6;
    --gray: #6c757d;
    --gray-light: #8ba2b5;
    --gray-lightest: #f7f7f9;
    --primary: #308ee0;
    --secondary: #e5e5e5;
    --success: #00ce68;
    --info: #8862e0;
    --warning: #ffaf00;
    --danger: #e65251;
    --light: #f3f5f6;
    --dark: #424964;
    --breakpoint-xs: 0;
    --breakpoint-sm: 576px;
    --breakpoint-md: 768px;
    --breakpoint-lg: 992px;
    --breakpoint-xl: 1200px;
    --font-family-sans-serif: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
}
html {
    font-family: sans-serif;
    line-height: 1.15;
    -webkit-text-size-adjust: 100%;
    -ms-text-size-adjust: 100%;
    -ms-overflow-style: scrollbar;
    -webkit-tap-highlight-color: transparent;
}
html {
    font-size: 10px;
    -webkit-tap-highlight-color: rgba(0,0,0,0);
}
html {
    font-family: sans-serif;
    -webkit-text-size-adjust: 100%;
    -ms-text-size-adjust: 100%;
}
*, *::before, *::after {
    box-sizing: border-box;
}
:after, :before {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
*, *::before, *::after {
    box-sizing: border-box;
}
:after, :before {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
::-webkit-scrollbar {
    width: 5px;
}
::-webkit-scrollbar-thumb {
    background: #1c82ae;
}
::-webkit-scrollbar-track {
    background: #f1f1f1;
}
.text-right {
    text-align: right !important;
    color: white;
    font-style:bold;
}
.mb-0, .my-0 {
    margin-bottom: 0 !important;
}
.font-weight-medium {
    font-weight: 500;
}
.text-right {
    text-align: right !important;
}
.mb-0, .my-0 {
    margin-bottom: 0 !important;
}

</style>          
<div class="container-fluid white-bg">
    @if(Session::get('usergroup')!='50')
   <div class="col-md-12"><h3 class="mrg-btm text-center"><span class="glyphicon glyphicon-user"></span> My Information</h3></div>
     <div class="col-md-12">
       <div class="overflow-scroll">
           <div class="table-responsive" >
						<!-- <div class="brdr text-center white-bg">
						<img src="images/registration.png" class="img-responsive center-img img-circle-cs" />
						<h4>FSM Details</h4>
						<br/>
						<a href="{{'Fsm-Details'}}"><button class="common-btn center-obj">View More</button></a>
						</div>
						</div>
						<div class="col-md-3 col-xs-12">
						<div class="brdr text-center white-bg">
						<img src="images/leader-detail.png" class="img-responsive center-img img-circle-cs" />
						<h4>Lead Details</h4>
						<br/>
						<a href="{{'lead-up-load'}}"><button class="common-btn center-obj">View More</button></a>
						</div>
						</div>
						<div class="col-md-3 col-xs-12">
						<div class="brdr text-center white-bg">
						<img src="images/query.png" class="img-responsive center-img img-circle-cs" />
						<h4>User Query</h4>
						<br/>
						<a href="{{'queries'}}"><button class="common-btn center-obj">View More</button></a>
						</div>
						</div>
						<div class="col-md-3 col-xs-12">
						<div class="brdr text-center white-bg">
						<img src="images/register-fba-img.png" class="img-responsive center-img img-circle-cs" />
						<h4>FBA Registration</h4>
						<br/>
						<a href="{{'fba-list'}}"><button class="common-btn center-obj">View More</button></a>
						</div> -->

                        <table class="table-bordered col-md-6 col-md-offset-3">
                        	 @foreach($basicinfo as $val)                        
                        	<tr>
                        		<th>FBAID</th>
                        		<td>{{$val->FBAID}}</td>
                        	</tr>
                            <tr>
                                <th>UID</th>
                                <td>{{$val->UID}}</td>
                            </tr>
                        	<tr>
                        		<th>Profile</th>
                        		<td><p style="color: #39FF14"><b>{{$val->profile}}</b></p></td>
                        	</tr>
                        	<tr>
                        		<th>User Type</th>
                        		<td>{{$val->usertype}}</td>
                        	</tr>
                        	<tr>
                        		<th>Name</th>
                        		<td>{{$val->FullName}}</td>
                        	</tr>
                        	<tr>
                        		<th>Mobile Number</th>
                        		<td>{{$val->MobiNumb1}}</td>
                        	</tr>
                        	<tr>
                        		<th>Email ID</th>
                        		<td>{{$val->EmailID}}</td>
                        	</tr>                        	
                        	<tr>
                        		<th>DOB</th>
                        		<td>{{$val->DOB}}</td>
                        	</tr> 
                            <tr>
                                <th>Access</th>
                                <td>{{$val->Location}}</td>
                            </tr>                       	
                        	@endforeach
                        </table>              
						</div>
                         <br/>                   
				</div>
		</div>
@else
        <div id="divinfo">
            <br>
            <br>
           <!--  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-cube text-danger icon-lg"></i>
                    </div>
                    <div class="float-right" >
                      <p class="mb-0 text-right">Total FBA</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">65,650</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> 65% lower growth
                  </p>
                </div>
              </div>
            </div>        -->     
          </div>   
@endif
</div>
<script type="text/javascript">
 $(document).ready(function() {
    checkusersat();
  getdashboarddata();  
   animation();
});
  function getdashboarddata() {
     $.ajax({
             url: '{{url('Dash-board-data')}}',
             type: "GET",             
             success:function(data) 
             {      
              var ndata = JSON.parse(data); 
             // alert(ndata) 
              $("#divinfo").empty();             
              for (var i = 0; i < ndata.length; i++) 
              {
                if (ndata[i].Type=='int') {
                    Value="<span class='count'>"+ndata[i].Value+"</span>";
                }else{
                    Value=ndata[i].Value;
                }
                $("#divinfo").append("<div class='col-xl-3 col-lg-3 col-md-8 col-sm-6 grid-margin stretch-card'><div class='card card-statistics'><div class='card-body'><div class='clearfix'><div class='float-left'><i class='mdi mdi-cube text-danger'></i></div><div class='float-right'><p class='mb-0 text-right'>"+ndata[i].Title+"</p><div class='fluid-container'><h3 class='font-weight-medium text-right mb-0'>"+Value+"</h3></div></div></div></div></div></div>");    

             }
             animation();
           }
         });
      }
      function animation() {
       $('.count').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 1000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
   }
 function checkusersat() {
  $.ajax({
             url: '{{url('Check-user-sat')}}',
             type: "GET",             
             success:function(data) 
             {     
             // alert('test');
             }
         });
}
</script>

@endsection		

   