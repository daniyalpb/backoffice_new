<!DOCtype html>
<html>
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<title>Birthday wishes</title>	
</head>
<body>
	<table width="600" cellpadding="0" cellspacing="0" border="0" align="center" bgcolor="#fadd39" style="border:1px solid #fadd39;">
		<tr>
			<td><img src="{{url('images/Template-1.jpg')}}"/></td>
		</tr>
		<tr>
			<td style="padding:5px 50px; text-align:justify; color:#333333; font-family:Calibri,Arial;">
				<p>Dear <span id="txtfbaname"></span></p>
				<p>Magic Finmart would like to wish you Heartiest Greetings for your Birthday, May your birthday be extra special and May your dreams and Wishes come true because you deserve them. Your association with us is highly valued, we look forward for more engagement as the money making opportunity awaits you.</p>
				<p>Wishing you a Very Happy Birthday once again….</p>
			</td>
		</tr>
		<tr>
			<td style="padding-left:415px;padding-bottom:10px;color:#333333;font-family:Calibri,Arial;">Warm Regards,<br/>
				Magic Finmart Team
			</td>
		</tr>
		<tr>
			<td><p style="background-color:#fff;padding:10px;color:#333333;text-align:center;font-size:13px;font-family:Calibri,Arial;">www.magicfinmart.com</p>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
	</table>
</body>
</html>
<script type="text/javascript">
$( document ).ready(function() {
        if (window.location.href.indexOf('&fbaname=') > 0){
        var fbaname = window.location.href.split('&fbaname=')[1]; 
        //alert(fbaname);
        var fba=decodeURIComponent(fbaname);
       // alert(fba);
        $("#txtfbaname").text(fba);
      }
     });
	</script>