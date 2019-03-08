<!DOCTYPE html>
<html>
<head>
</head>
@foreach($data as $val) 
<p>Hello,</p>
@if($val->Notification_Title='Port-Request')
<p>User ({{$val->FBAID}}) was searching for health insurance with company porting option.</p>
@else
<p>{{$val->Email_Body}}</p>
@endif
@endforeach
<div>
	<p>Thanks & Regards</p>
	<p>Team Magic Finmart</p>
	<img src="http://bo.magicfinmart.com/images/logo.png"/>
</div>
</html>
