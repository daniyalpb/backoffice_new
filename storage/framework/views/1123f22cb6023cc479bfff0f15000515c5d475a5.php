<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
</style>
</head>
<p>Dear Sir/Madam,</p>
<?php $__currentLoopData = $offlinecsdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
<p>Please find enclosed details for CS  <?php echo e($val->product_name); ?> for <?php echo e($val->CustomerName); ?>. Details of the case are as under:</p>
<table>		  
	    <tr>
	     <th>ID</th>
		 <td><?php echo e($val->ID); ?></td>
	    </tr>
	    <tr>
	    <th>Product Name</th>	
		<td><?php echo e($val->product_name); ?></td>
		</tr>
		<?php if($val->otherproductname!=''): ?>
		<tr>
	    <th>Other Product Name</th>	
		<td><?php echo e($val->otherproductname); ?></td>
		</tr>
		<?php endif; ?>
		<tr>
		<th>Customer Name</th>
		<td><?php echo e($val->CustomerName); ?></td>	
		</tr>
		<tr>
		<th>Customer Address</th>	
		<td><?php echo e($val->CustomerAddress); ?></td>
		</tr>
		<tr>
		<th>City</th>
		<td><?php echo e($val->cityname); ?></td>
		</tr>
		<tr>
		<th>State</th>
		<td><?php echo e($val->state_name); ?></td>
		</tr>
		<tr>
		<th>Zone</th>
		<td><?php echo e($val->Zone); ?></td>
		</tr>
		<tr>
		<th>Region</th>	
		<td><?php echo e($val->Region); ?></td>
		</tr>
		<tr>
		<th>Mobile No</th>
		<td><?php echo e($val->MobileNo); ?></td>
		</tr>
		<tr>
		<th>Telephone No</th>
		<td><?php echo e($val->TelephoneNo); ?></td>
		</tr>
		<tr>
		<th>Email Id</th>	
		<td><?php echo e($val->EmailId); ?></td>
		</tr>
		<tr><th>POSP Name</th><td><?php echo e($val->POSPName); ?></td></tr>
		<tr><th>Premium Amount</th><td><?php echo e($val->PremiumAmount); ?></td></tr>
		<tr><th>ERPID</th><td><?php echo e($val->ERPID); ?></td></tr>
		<tr><th>QTNo</th><td><?php echo e($val->QTNo); ?></td></tr>
		<?php if($val->VehicleNo!=''): ?>
		<tr><th>Vehicle No</th><td><?php echo e($val->VehicleNo); ?></td></tr>
		<?php endif; ?>		
		<tr>
		<th>Date of Expiry</th>
		<td><?php echo e($val->DateofExpiry); ?></td>
		</tr>
		<?php if($val->BreakIn!=''): ?>
		<tr><th>Break In</th><td><?php echo e($val->BreakIn); ?></td></tr>
		<?php endif; ?>	
		<?php if($val->motorInsurer!=''): ?>
		<tr>
		<th>Insurer motor</th>
		<td><?php echo e($val->motorInsurer); ?></td>
		</tr>
		<?php endif; ?>
		<tr>
		<th>Payment Mode</th>
		<td><?php echo e($val->PaymentMode); ?></td>
		</tr>
		<tr>
		<th>UTR No</th>
		<td><?php echo e($val->UTRNo); ?></td>
		</tr>
		<tr>
		<th>Bank</th>
		<td><?php echo e($val->Bank); ?></td>
		</tr>
		<tr>
		<th>Executive Name</th>
		<td><?php echo e($val->ExecutiveName); ?></td>
		</tr>
		<tr>
		<th>Executive Name 1</th>
        <td><?php echo e($val->ExecutiveName1); ?></td>
		</tr>
		<tr>
		<th>Product Executive</th>
		<td><?php echo e($val->ProductExecutive); ?></td>
		</tr>
		<tr>
		<th>Product Manager</th>
		<td><?php echo e($val->ProductManager); ?></td>
		</tr>		
        <?php if($val->Preexisting!=''): ?>
		<tr>
			<th>Preexisting</th>
			<td><?php echo e($val->Preexisting); ?></td>
		</tr>
		<?php endif; ?>
        <?php if($val->MedicalReport!=''): ?>
		<tr>
			<th>Medical Report</th>
			<td><?php echo e($val->MedicalReport); ?></td>
		</tr>
		<?php endif; ?>
        <?php if($val->PremiumYears!=''): ?>
		<tr>
			<th>Premium Years</th>
			<td><?php echo e($val->PremiumYears); ?></td>
		</tr>
		<?php endif; ?>
        <?php if($val->TypeofPolicy!=''): ?>
		<tr>
			<th>Type of Policy</th>
			<td><?php echo e($val->TypeofPolicy); ?></td>
		</tr>
		<?php endif; ?>
        <?php if($val->Insurerhealth!=''): ?>
		<tr>
			<th>Insurer Health</th>
			<td><?php echo e($val->Insurerhealth); ?></td>
		</tr>
		<?php endif; ?>
        <?php if($val->Insurerlife!=''): ?>
		<tr>
			<th>Insurer Life</th>
			<td><?php echo e($val->Insurerlife); ?></td>
		</tr>
		<?php endif; ?>
		 <?php if($val->CSID!=''): ?>
		<tr>
			<th>CSID</th>
			<td><?php echo e($val->CSID); ?></td>
		</tr>
		<?php endif; ?>
		<?php if($val->RCCopy!=''): ?>
		<tr>
		<th>RC Copy</th>
		<td><?php echo e($val->RCCopy); ?></td>
		</tr>
		<?php endif; ?>
		<?php if($val->Fitness!=''): ?>
		<tr>
		<th>Fitness</th>
		<td><?php echo e($val->Fitness); ?></td>
		</tr>
		<?php endif; ?>
		<?php if($val->PUC!=''): ?>
		<tr>
		<th>PUC</th>
		<td><?php echo e($val->PUC); ?></td>
		</tr>
		<?php endif; ?>
		<?php if($val->BreakinReport!=''): ?>
		<tr>
		<th>Breakin Report</th>
		<td><?php echo e($val->BreakinReport); ?></td>
		</tr>
		<?php endif; ?>
		<?php if($val->ChequeCopy!=''): ?>
		<tr>
		<th>Cheque Copy</th>
		<td><?php echo e($val->ChequeCopy); ?></td>
		</tr>
		<?php endif; ?>
		<?php if($val->Other!=''): ?>
		<tr>
		   <th>Other</th>
		   <td><?php echo e($val->Other); ?></td>
		</tr>
		<?php endif; ?>
		<?php if($val->ProposalForm!=''): ?>
		<tr>
        	<th>Proposal Form</th>
        	<td><?php echo e($val->ProposalForm); ?></td>
        </tr>
        <?php endif; ?>
        <?php if($val->KYC!=''): ?>
		<tr>
			<th>KYC</th>
			<td><?php echo e($val->KYC); ?></td>
		</tr>
		<?php endif; ?>
		<?php if($val->Document1!=''): ?>
		<tr>
			<th>Document 1</th>
			<td><?php echo e($val->Document1); ?></td>
		</tr>
		<?php endif; ?>
		<?php if($val->Document2!=''): ?>
		<tr>
			<th>Document 2</th>
			<td><?php echo e($val->Document2); ?></td>
		</tr>
		<?php endif; ?>
		<?php if($val->Document3!=''): ?>
		<tr>
			<th>Document 3</th>
			<td><?php echo e($val->Document3); ?></td>
		</tr>
		<?php endif; ?>
		<?php if($val->Document4!=''): ?>
		<tr>
			<th>Document 4</th>
			<td><?php echo e($val->Document4); ?></td>
		</tr>
		<?php endif; ?>
		<?php if($val->Document5!=''): ?>
		<tr>
			<th>Document 5</th>
			<td><?php echo e($val->Document5); ?></td>
		</tr>
		<?php endif; ?>
		<tr>
		<th>Created date</th>
		<td><?php echo e($val->createddate); ?></td>
		</tr>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
</html>
