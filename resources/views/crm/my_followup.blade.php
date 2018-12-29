@extends('include.master')
@section('content')   
<div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">My Followup</h3></div> 
       <div class="col-md-12">
       <div class="overflow-scroll">
       <div class="table-responsive" >
   <table id="classTable" class="table table-bordered">
          <thead>
          <tr>
            <th>Id</th>
            <th>FBAID</th>
            <th>FBA Name</th>
            <th>FBA Mobile No</th>           
            <th>Follow up Date</th>
            <th>Remark</th>            
            <th>Disposition</th>
            <th>Created Date</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
     @foreach($query as $key=>$val)
        <tr>
        <td>{{$val->history_id}}</td> 
        <td>{{$val->FBAID}}</td>
        <td>{{$val->FullName}}</td>
        <td>{{$val->MobiNumb1}}</td>        
        <td>{{$val->followup_date}}</td>
        <td><textarea readonly style="width: 100%;height: 30px;border: none; cursor: default;">{{$val->remark}}</textarea></td>
        <td>{{$val->disposition}}--{{$val->sub_disposition}}</td>
        <td>{{$val->create_at}}</td>
         <?php $class =($val->action=="n")? 'color: #00C851': ' color:#ff4444'; ?>
        @if($val->action=="n")
        <td ><a style="{{$class}}" href="#" id="close_action">{{$val->action==="n"?"close":"open"}}</a></td>
           @else
        <td ><a style="{{$class }}" href="{{url('crm-followup')}}/{{$val->fbamappin_id}}/{{$val->crm_id}}/{{$val->history_id}}">{{$val->action==="n"?"close":"open"}}</a></td>
           @endif
        </tr>  
     @endforeach
     </tbody>
   </table>
  </div>
</div>
</div>
</div>
<script type="text/javascript">
   $( document ).ready(function(){       
        $('#classTable').DataTable({
         "ordering": false
    });
    });
</script> 
@endsection
 



