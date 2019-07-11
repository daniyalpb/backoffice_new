 <?php $__env->startSection('content'); ?>


    <div id="content" style="overflow:scroll;">
       <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">Payment History</h3></div>
       <!-- Date Start -->
<!-- <div class="container">
  <div class="col-md-4 pull-right">
    <div class="input-group input-daterange">

      <input type="text" id="min-date" class="form-control date-range-filter" data-date-format="mm/dd/yyyy" placeholder="From:">

      <div class="input-group-addon">to</div>

      <input type="text" id="max-date" class="form-control date-range-filter" data-date-format="mm/dd/yyyy" placeholder="To:">

    </div>
  </div>
</div>
 -->
            
          <?php 

           $fromdate='';
           $todate='';
            if(isset($_GET['fdate']) && isset($_GET['todate'])){
                 $fromdate=$_GET['fdate'];
                 $todate=$_GET['todate'];
           }else{
                 
                 $fromdate= Date('m-d-Y', strtotime('-28 days'));
                 $todate=Date('m-d-Y');
           }


           ?>
  
 
        <form  method="get" action="<?php echo e(url('payment-history')); ?>" >
       <div class="col-md-4">
      <div class="form-group">
      <p>From Date</p>
         <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
               <input class="form-control date-range-filter" value="<?php echo e($fromdate); ?>" type="text" placeholder="From Date" name="fdate" id="min-date"  />
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              </div>
            </div>
           </div>
       <div class="col-md-4">
       <div class="form-group">
       <p>To Date</p>
       <div id="datepicker1" class="input-group date" data-date-format="mm-dd-yyyy">
               <input class="form-control date-range-filter " value="<?php echo e($todate); ?>" type="text"  placeholder="To Date"  name="todate"  id="max-date"   />
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              </div>
            </div>
           </div>
       <div class="col-md-4">
       <div class="form-group"> <input type="submit" name=""  class="mrg-top common-btn" value="SHOW">  </div>
       </div>
       </form>
       <!-- Date End -->
<div class="col-md-12">
       <div class="overflow-scroll">
       <div class="table-responsive" >
        <table id="payment-history-tabel" class="table table-bordered table-striped tbl " >
                 <thead>
                  <tr>
                   <th> Customer ID</th>
                   <th>Customer Name</th>
                   <th>Mobile</th>
                   <th>Email</th>
                    <th>  Payment Date</th>
                     <th>Amount</th>
                      <th>Payment Type</th>
                       <th> Payment Status</th>
                       <th> City</th>
                       <th>Sales Name</th>
                 </tr>
                </thead>
                <tbody>
               
               <?php $sum=0;    ?>
               <?php if(isset($respon)): ?>
                 <?php $__currentLoopData = $respon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <tr>   
                   <?php   //$customer_id =preg_split('/-/', $val->CustName); ?>
                   <td><?php echo e($val->CustID); ?></td>
                    <td><?php echo e($val->CustName); ?></td>
                    <td><?php echo e($val->Mobile); ?></td>
                   <td><?php echo e($val->Email); ?></td>
                     <?php $dt = new DateTime($val->PaymDate);
                      $date = $dt->format('m/d/Y'); ?>
                   <td><?php echo e($date); ?></td>
                   <td><?php echo e($val->Amount); ?></td>
                   <?php $sum+=$val->Amount;?>
                    <td><?php echo e($val->PaymType); ?></td>
                    <td><?php echo e($val->PaymStatus); ?></td>
                    <td><?php echo e($val->City); ?></td>
                    <td><?php echo e($val->SalesName); ?></td>
                    
                     
                 </tr>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 <?php endif; ?>
        
                
      </tbody>
      <thead>
                  <tr>
                   <th> </th>
                   <th> </th>
                   <th> </th>
                   <th> </th>
                    <th>  </th>
                     <th>TOTAL AMOUNT: <i class="fa fa-rupee"></i> <?php echo e($sum); ?> </th>
                      <th> </th>
                       <th>  </th>
                       <th>  </th>
                       <th>  </th>
                 </tr>
                </thead>

      </table>
      </div>
      </div>
      </div>
      </div>
      </div>
   <script type="text/javascript">
        
     $(document).ready(function() {
    $('#payment-history-tabel').DataTable( {
     paging: true,
      "order": [[ 4, "desc" ]]
});

} );

      </script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>