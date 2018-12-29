<!DOCTYPE html>
<html>
<head>
</head>
@foreach($maildata as $val) 
<p>Dear {{$val->FullName}},</p>
<p>{{$val->message}}</p>
@endforeach
<div>
	<p>Thanks & Regards</p>
	<p>Team Magic Finmart</p>
	<img src="http://bo.magicfinmart.com/images/logo.png"/>
</div>
</html>
