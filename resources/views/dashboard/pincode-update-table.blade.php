 @extends('include.master')
 @section('content')
 <div id="content" style="overflow:scroll;">
  <div class="container-fluid white-bg">
    <div class="col-md-12"><h3 class="mrg-btm">Pincode Mapping</h3></div>
    <div class="col-md-12">
      <div class="overflow-scroll">
        <div class="table-responsive" >
          <table id="example" class="table table-bordered table-striped tbl" >
            <thead>
              <tr>
                <th>Pincode</th>
                <th>RRM</th>
                <th>FieldManager</th>
                <th>Recruiter</th>
                <th>TrainingOps</th>
                <th>Loan</th>
                <th>Motor</th>
                <th>Health</th>
                <th>OnBoarding</th>
                <th>FieldSales</th>
                <th>ClusterHead</th>
                <th>StateHead</th>
                <th>ZonalHead</th>
              </tr>
            </thead>
            <tbody>
            @foreach($smdata as $val)
              <tr>
                <td>{{$val->pincode}}</td>                
                <td>{{$val->RRM}}</td>                
                <td>{{$val->FieldManager}}</td>                
                <td>{{$val->Recruiter}}</td>                
                <td>{{$val->TrainingOps}}</td>                
                <td>{{$val->ProductLoan}}</td>                
                <td>{{$val->ProductMotor}}</td>                
                <td>{{$val->ProductHealth}}</td>                
                <td>{{$val->OnBoarding}}</td>                
                <td>{{$val->FieldSales}}</td>                
                <td>{{$val->ClusterHead}}</td>                
                <td>{{$val->StateHead}}</td>                
                <td>{{$val->ZonalHead}}</td>
              </tr>
               @endforeach
            </tbody>
           </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
