@extends('include.master')
 @section('content')
       <form id= "rm_form" name="rm_form" method="GET"> 
{{csrf_field()}}
       <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">Details</h3></div>
<div class="col-md-12">
			 <div class="overflow-scroll">
			 <div class="table-responsive" >
			 <table id="rrm-details-id" class="table table-bordered table-striped tbl" >
                 <thead>
                  <tr>
                   <th>FBA ID</th>
                   <th>Name</th>
                   <th>Mobile No</th>
              
                   
                 </tr>
                </thead>
                <tbody>

      
      </tbody>
      </table>
			</div>
			</div>
			</div>
      </div>
      </form>



      <script type="text/javascript">
$(document).ready(function() {
    $('#rrm-details-id').DataTable( {
        "order": [[ 2, "desc" ]]
    } );
} );

      </script>
 @endsection
