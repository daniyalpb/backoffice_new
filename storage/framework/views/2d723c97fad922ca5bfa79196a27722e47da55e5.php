  
  <?php $__env->startSection('content'); ?>


  <ul class="tree">

    <li class="tree__item">
      <span>
       <h3>Cluster View</h3>
     </span>
   </li>

   <li class="tree__item hasChildren">
    <span>
      <!-- <div class="icon"></div> -->
      <a class="icon" href="#">Cluster_Head</a> 
    </span>

    <ul>
      <li>
       <span> 
         <?php if(isset($data)): ?>
         <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <!--   <div class="icon"></div> -->
         <a data-toggle="modal" data-target="#Quotedescription" href="#">RRM (<?php echo e($val->count); ?>)</a>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
         <?php endif; ?>
       </span>

       <span>
         <?php if(isset($fielddata)): ?>
         <?php $__currentLoopData = $fielddata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <!--  <div class="icon"></div> -->
         <a data-toggle="modal" data-target="#fieldsales" href="#">Field_Sales (<?php echo e($val->field_count); ?>)</a>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
         <?php endif; ?>
       </span>

<!--  <ul>
      <li>
      <span>
              <?php if(isset($fielddata)): ?>
     <?php $__currentLoopData = $fielddata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="icon"></div>
          <a data-toggle="modal" data-target="#fieldsales" href="#">Field_Sales (<?php echo e($val->field_count); ?>)</a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
     <?php endif; ?>
     </span>
         <ul>
    
      <li>
    </li>
     
    </ul>
       </li>
     </ul> -->
      <!--   <ul>
           <?php if(isset($alldata)): ?>
       <?php $__currentLoopData = $alldata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="servicetable">
          <a data-toggle="modal" data-target="#Quotedescription" href="#"><?php echo e($val->FullName); ?> - <?php echo e($val->fba_id); ?></a>
         </li>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
       <?php endif; ?>
     </ul> -->
   </li>
     <!--  <li>

       <span>
             <?php if(isset($fielddata)): ?>
     <?php $__currentLoopData = $fielddata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="icon"></div>
          <a href="#">Field_Sales (<?php echo e($val->field_count); ?>)</a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
     <?php endif; ?>
        </span>

    <ul>
    
      <li>
          <span><a href="#">Link</a></span>
      </li>
     
    </ul>
  </li> -->
</ul>
</li>

  <li class="tree__item hasChildren">
    <span>
        <div class="icon"></div>
      <a  href="#">Zone</a>
    </span>
        <ul>
      <li>
        <span>
        <?php if(isset($statedata)): ?>
         <?php $__currentLoopData = $statedata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <div class="icon"></div>
        <a data-toggle="modal" data-target="#stateheadmodel" href="#">State_Head (<?php echo e($val->state_count); ?>)</a>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
         <?php endif; ?>
        </span>
     
       </li>
     </ul>
   </li>
 </ul>
 <script type="text/javascript">
  
  $('.tree .icon').click( function() {
    $(this).parent().toggleClass('expanded').
    closest('li').find('ul:first').
    toggleClass('show-effect');
  });
</script>

<style type="text/css">
  body {

    font-family: Helvetica, sans-serif;
    font-size:15px;
  }

  a {
    text-decoration:none;
  }
  ul.tree, .tree li {
    list-style: none;
    margin:0;
    padding:0;
    cursor: pointer;
  }

  .tree ul {
    display:none;
  }

  .tree > li {
    display:block;
    background:#eee;
    margin-bottom:2px;
  }

  .tree span {
    display:block;
    padding:10px 12px;

  }

  .icon {
    display:inline-block;
  }

  .tree .hasChildren > .expanded {
    background:#999;
  }

  .tree .hasChildren > .expanded a {
    color:#fff;
  }

  .icon:before {
    content:"+";
    display:inline-block;
    min-width:20px;
    text-align:center;
  }
  .tree .icon.expanded:before {
    content:"-";
  }

  .show-effect {
    display:block!important;
  }



  .headingsmall
  {
    color: #3a4355;
    font-weight:bold;
    
    -webkit-text-shadow: 0px 0px 1px #119af2;
    -moz-text-shadow: 0px 0px 1px #119af2;
    -o-text-shadow: 0px 0px 1px #119af2;
    font: 400 24px/1.4 'Cutive', Helvetica, Verdana, Arial, sans-serif;
    text-shadow: 0px 0px 1px #119af2;
    text-transform:uppercase;

  }

  .servicetable
  {
    border:1px solid #000;
    list-style:none;
    padding:2px;
    width:49%;
    display:inline-block;

  }

  .table {
  /* width:150px;
  height:200px;*/
  background-color: lightblue;
  /*overflow-y: hidden;*/
}

/*#overflowTest {
 
  color: white;
  padding: 15px;
  width: 550%;
  height: 100px;
  overflow: scroll;
  border: 1px solid #ccc;
}*/
</style>
</style>

<!-- terstssssssssssssssssssssssssssssss -->
<!-- QUOTES STATUS VIEW MODEL STATRT -->

<div class="modal" id="Quotedescription">
  <div class="modal-dialog modal-lg modal_extra_width">
    <div class="modal-content">      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"> RRM Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>        
      <!-- Modal body -->
      <div class="modal-body">
       <div class="table-responsive" >
        <body>
          <div class="col-md-12">
            <div class="overflow-scroll">
              <div class="table-responsive">
                <!-- <div id="overflowTest">  -->
                <input type="text" id="txtserach" onkeyup="search()" placeholder="Search for names and FBA id.." title="Type in a name" class="form-control" style="width: 50%;">
                <hr>
                <div style="overflow-y: auto; height: 325px;">
                  <table id="tblrrm"  class="table table-bordered table-striped tbl">
                    <thead> 
                      <tr>
                        <th>Full Name</th>
                        <th>FBA ID</th>
                      </tr>
                    </thead>
                    <tbody> 

                     <?php if(isset($alldata)): ?>
                     <?php $__currentLoopData = $alldata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr id="myUL">
                      <td><a onclick="hidden_fba_id('<?php echo e($val->UId); ?>')" href="hierarchy_rrm_fba/<?php echo e($val->UId); ?>" target="_blank"><?php echo e($val->FullName); ?></a></td> 
                      <td><?php echo $val->fba_id; ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                    <?php endif; ?>

                  </tbody>
                </div>
              </table>
            </div>
          </div>
        </div>
      </div>

    </body>
    </html>
       <!--       <ul>
             <input type="hidden" name="hiddenfbaid" id="hiddenfbaid" >
         <?php if(isset($alldata)): ?>
     <?php $__currentLoopData = $alldata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="servicetable">
        <a onclick="hidden_fba_id('<?php echo e($val->UId); ?>')" href="hierarchy_rrm_fba/<?php echo e($val->UId); ?>" ><?php echo e($val->FullName); ?> - <?php echo e($val->fba_id); ?> </a>               
       </li>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
     <?php endif; ?>
   </ul>  --> 
 </div>   
 <!-- Modal footer -->
 <div class="modal-footer">
   <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> 
 </div>
</div>
</div>
</div>
</div>
<!-- QUOTES STATUS VIEW MODEL END  -->

<!-- STATE HEAD VIEW MODEL STATRT -->

<div class="modal" id="stateheadmodel">
  <div class="modal-dialog modal-lg modal_extra_width">
    <div class="modal-content">      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"> State Head Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>        
      <!-- Modal body -->
      <div class="modal-body">
       <div class="table-responsive" >
        <body>
          <div class="col-md-12">
            <div class="overflow-scroll">
              <div class="table-responsive">
                <!-- <div id="overflowTest">  -->
                <input type="text" id="txtserachstate" onkeyup="search()" placeholder="Search for names and FBA id.." title="Type in a name" class="form-control" style="width: 50%;">
                <hr>
                <div style="overflow-y: auto; height: 325px;">
                  <table id="tblstate"  class="table table-bordered table-striped tbl">
                    <thead> 
                      <tr>
                        <th>Full Name</th>
                        <th>FBA ID</th>
                      </tr>
                    </thead>
                    <tbody> 

                     <?php if(isset($allstatedata)): ?>
                     <?php $__currentLoopData = $allstatedata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr id="myUL">
                      <td><a onclick="hidden_fba_id('<?php echo e($val->UId); ?>')" href="hierarchy_state_data/<?php echo e($val->UId); ?>" target="_blank"><?php echo e($val->FullName); ?></a></td> 
                      <td><?php echo $val->fba_id; ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                    <?php endif; ?>

                  </tbody>
                </div>
              </table>
            </div>
          </div>
        </div>
      </div>

    </body>
    </html>
 </div>   
 <!-- Modal footer -->
 <div class="modal-footer">
   <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> 
 </div>
</div>
</div>
</div>
</div>

<!-- STATE HEAD VIEW MODEL END -->

<!-- QUOTES STATUS VIEW MODEL STATRT -->

<div class="modal" id="fieldsales">
  <div class="modal-dialog modal-lg modal_extra_width">
    <div class="modal-content">      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"> Field Sales Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>        
      <!-- Modal body -->
      <div class="modal-body">
       <div class="table-responsive" >
        <body>
          <div class="col-md-12">
            <div class="overflow-scroll">
              <div class="table-responsive">
                <!-- <div id="overflowTest">  -->
                <input type="text" id="txtserach" onkeyup="search()" placeholder="Search for names and FBA id.." title="Type in a name" class="form-control" style="width: 50%;">
                <hr>
                <div style="overflow-y: auto; height: 325px;">
  <!-- <table id="tblrrm" class="table table-bordered table-striped tbl">
    <thead> 
      <tr>
        <th>FBA ID</th>
        <th>Full Name</th>
        </tr>
    </thead>
    <tbody>
         <?php if(isset($fieldsdata)): ?>
     <?php $__currentLoopData = $fieldsdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr >
     <tr style='height:30px;margin:5px;'>
   <td><a onclick="hidden_fba_id('<?php echo e($val->UId); ?>')" href="hierarchy_fieldsales_data/<?php echo e($val->UId); ?>" target="_blank" ><?php echo e($val->fba_id); ?> </a></td> 
     <td><?php echo e($val->FullName); ?></td>
    </tr>
    </tr>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
     <?php endif; ?>
  </tbody>
  </div>
</table> -->

<table id="tblrrm"  class="table table-bordered table-striped tbl">
  <thead> 
    <tr>
      <th>Full Name</th>
      <th>FBA ID</th>
    </tr>
  </thead>
  <tbody>
   <?php if(isset($fieldsdata)): ?>
   <?php $__currentLoopData = $fieldsdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <tr id="myUL">
    <td><a onclick="hidden_fba_id('<?php echo e($val->UId); ?>')" href="hierarchy_fieldsales_data/<?php echo e($val->UId); ?>" target="_blank" ><?php echo e($val->FullName); ?> </a></td> 
    <td><?php echo $val->fba_id; ?></td>
  </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
  <?php endif; ?>
</tbody>
</div>
</table>
</div>
</div>
</div>
</div>

</body>
</html>

</div>   
<!-- Modal footer -->
<div class="modal-footer">
 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> 
</div>
</div>
</div>
</div>
</div>
<!-- QUOTES STATUS VIEW MODEL END -->


<!-- FIELD SALES VIEW MODEL STATRT -->
<!-- <div class="modal" id="fieldsales">
    <div class="modal-dialog modal-lg modal_extra_width">
      <div class="modal-content">      
    
         <div class="modal-header">
            <h4 class="modal-title"> Details</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>        
     
             <div class="modal-body">
             <div class="table-responsive" >
            <div class="table"></div>
                    <table class='table'><tr style='height:30px;margin:5px;'>
                    <td>Name </td>
                    <td>FBA ID</td></tr> 
      <ul>
         <?php if(isset($fieldsdata)): ?>
     <?php $__currentLoopData = $fieldsdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  
       <li >
<tr style='height:30px;margin:5px;'>
  <td><?php echo e($val->FullName); ?></td>
    <td><?php echo e($val->fba_id); ?></td></tr>
     </li>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
     <?php endif; ?>
        </ul>  
      </div>  
      </table>    
    
        <div class="modal-footer">
       <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> 
        </div>
       </div>
      </div>
      </div>
  </div>
</div> -->



<!-- FIELD SALES VIEW MODEL END -->


<script type="text/javascript">
  jQuery(function ($) {
    $("#treeview").shieldTreeView();
  });
</script>

<script>
  function search() {
  // Declare variables 
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("txtserach");
  input = document.getElementById("txtserachstate");

  
  filter = input.value.toUpperCase();
  table = document.getElementById("tblrrm");
  table = document.getElementById("tblstate");

  
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>


<script type="text/javascript">
  function hidden_fba_id(UId){
      //alert(UId);
 //   $("#hiddenfbaid").val("");
 //     $.ajax({ 
 //        url: 'fba_details/'+UId,
 //        method:"GET",   
 //   success: function(msg){
 //    var data= JSON.parse(msg);
 // }
 //  });
 
}
</script>




<style>
  .container
  {
    max-width: 400px;
    margin: auto;
  }
  .treeview-icon
  {
    width: 16px;
    height: 16px;
    /* background-image: url("/Content/img/file/file-icons-sprite.png");*/
  }
  .icon-folder
  {
    background-position: 0px 0px;
  }
  .icon-png
  {
    background-position: -16px 0px;
  }
  .icon-txt
  {
    background-position: -32px 0px;
  }
  .icon-pdf
  {
    background-position: -48px 0px;
  }
  .icon-doc
  {
    background-position: -64px 0px;
  }
  .icon-xls
  {
    background-position: -80px 0px;
  }
</style>
</body>
</html>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>