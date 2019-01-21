<?php $__env->startSection('content'); ?>
<div class="container-fluid white-bg">
<div class="col-md-12"><h3 class="mrg-btm">CRM Interaction</h3></div>

<div class="col-md-12">
 <table class='datatable-responsive table table-striped table-bordered dt-responsive nowrap' id='crmineractiontable'>
 	<thead>
 		<tr>
 			<th>History Id</th>
 			<th>Disposition</th>
 			<th>Remark</th>
 			<th>Followup Date</th>
 			<th>FBAID</th>
 			<th>FBA Name</th>
 			<th>Status</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $__currentLoopData = $crmdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 		<tr>
 			<td><?php echo e($val->history_id); ?></td>
 			<td><?php echo e($val->disposition); ?></td>
 			<td><textarea readonly><?php echo e($val->remark); ?></textarea></td>
 			<td><?php echo e($val->followup_date); ?></td>
 			<td><?php echo e($val->FBAID); ?></td>
 			<td><?php echo e($val->FullName); ?></td>
 			<?php if($val->action=='y'): ?>
 			<td ><p style="color:green">Open</p></td>
 			<?php else: ?>
 			<td><p style="color: red">Close</p></td>
 			<?php endif; ?>
 		</tr>
 		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 	</tbody>
 </table>
</div>
<div>
	<a href="#" class="btn btn-primary" onclick="fnExcelReport();">Import Excle</a>
</div>
</div>
<script type="text/javascript">
$( document ).ready(function() {
       $("#crmineractiontable").DataTable();
});
function fnExcelReport()
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('crmineractiontable'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>