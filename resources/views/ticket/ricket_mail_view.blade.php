Dear [Developer],
<br>
A Ticket has been assigned to you,Kindly find the details below.
<br>
<br>
@foreach($data as $val)
FBA ID:{{$val->FBAID}}
<br>
Ticket ID:{{$val->TicketRequestId}}
<br>
Category:{{$val->CateName}}
<br>
@endforeach
<br>
Ticket Summary
<br>
<br>
<br>
Attachment:If any';
