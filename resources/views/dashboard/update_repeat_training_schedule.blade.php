@extends('include.master')
@section('content')

<link href="{{ url('stylesheets/bootstrap/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<style>
.text-center{text-align:center;}
.text-wrap{white-space:normal;} 
.width-set{width:500px;} 
.txtarea {border: none; background: transparent; width: 200px; height: 70px; } 
</style>

<div class="container-fluid">

    <div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading"><b>Training Schedules</b></div>
        <div class="panel-body">

        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                <table class='table table-bordered' id='tbl_training_schedules'>
                    <thead>
                      <th class='text-center'>Update</th>
                      <th class='text-center'>Training Type</th>
                      <th class='text-center'>Training Name</th>
                      <th class='text-center'>Trainer Name</th>
                      <th class='text-center'>Duration(mins)</th>
                      <th class='text-center'>Training Date(dd/mm/yyyy)</th>
                      <th class='text-center text-wrap width-set'>Agenda</th>
                      <th class='text-center text-wrap width-set'>Location / Web X Details</th>
                      <th class='text-center text-wrap width-set'>SMS / Email</th>
                      <th class='text-center'>Start Time</th>
                      <th class='text-center text-wrap width-set'>Description</th>
                      <th class='text-center text-wrap width-set'>Created By</th>
                      <th class='text-center text-wrap width-set'>Created Date</th>
                      <th class='text-center text-wrap width-set'>Updated By</th>
                      <th class='text-center text-wrap width-set'>Updated Date</th>
                      {{-- <th class='text-center'>Repeat</th> --}}
                    </thead>

                    <tbody>
                        @foreach($result as $data)
                        <tr>
                            <?php 
                                $training_id = $data -> training_id;
                                $exploded_date = explode('-',$data -> training_date);
                                $formatted_date = $exploded_date[2].'/'.$exploded_date[1].'/'.$exploded_date[0];
                            ?>

                            @if($data -> update_btn_visible == "1")
                            <td><a href='{{ url("/schedule-training/update/$training_id") }}' target='_blank'>Update</a></td>
                            @endif
                            
                            @if($data -> update_btn_visible == "0")
                            <td></td>
                            @endif
                            
                            @if($data -> training_type == "1")
                            <td>Classroom Training</td>
                            @endif

                            @if($data -> training_type == "2")
                            <td>Online Training</td>
                            @endif

                            <td class='text-wrap width-set'>{{ $data -> training_name }}</td>
                            <td class='text-wrap width-set'>{{ $data -> trainer_id }}</td>
                            <td>{{ $data -> duration }}</td>
                            <td>{{ $formatted_date }}</td>
                            <td class='text-wrap width-set'><textarea class="txtarea" name="agenda_textarea_{{ $training_id }}" id="agenda_textarea_{{ $training_id }}" readonly="readonly">{{ $data -> agenda }}</textarea></td>

                            <td class='text-wrap width-set'><textarea class="txtarea" name="location_textarea_{{ $training_id }}" id="location_textarea_{{ $training_id }}" readonly="readonly">{{ $data -> location }}</textarea></td>

                            <td class='text-wrap width-set'><textarea class="txtarea" name="sms_textarea_{{ $training_id }}" id="sms_textarea_{{ $training_id }}" readonly="readonly">{{ $data -> sms_email_content }}</textarea></td>

                            <td>{{ $data -> start_time }}</td>

                            <td class='text-wrap width-set'><textarea class="txtarea" name="desc_textarea_{{ $training_id }}" id="desc_textarea_{{ $training_id }}" readonly="readonly">{{ $data -> description }}</textarea></td>

                            <td>{{ $data -> createdby }}</td>
                            <td>{{ $data -> createddate }}</td>
                            <td>{{ $data -> updatedby }}</td>
                            <td>{{ $data -> updateddate }}</td>

                            {{-- <td><a href='{{ url("/schedule-training/repeat/$training_id") }}' target='_blank'>Repeat</a></td> --}}
                        </tr>
                         @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>

        </div>
        </div>
      </div>
</div>

<script src="{{ url('stylesheets/table/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('stylesheets/table/vendor/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ url('stylesheets/table/vendor/datatables-responsive/dataTables.responsive.js') }}"></script>
<script type="text/javascript">
$("#tbl_training_schedules").DataTable({
  "order": false
});
</script>
@endsection 