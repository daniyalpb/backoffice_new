Dear [Developer],
<br>
A Ticket has been assigned to you,Kindly find the details below.
<br>
<br>
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
FBA ID:<?php echo e($val->FBAID); ?>

<br>
Ticket ID:<?php echo e($val->TicketRequestId); ?>

<br>
Category:<?php echo e($val->CateName); ?>

<br>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<br>
Ticket Summary
<br>
<br>
<br>
Attachment:If any';
