<!DOCtype html>
<html>
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<title>Birthday wishes</title>
</head>
<body>
	<table  width="600" cellpadding="0" cellspacing="0" border="0" align="center" bgcolor="#2959A3" style="border:1px solid #2959A3;">
		<tr>
			<td><img src="<?php echo e(url('images/Template-3.jpg')); ?>"/></td>
		</tr>
		<tr>
			<td style="padding:5px 50px; text-align:justify; color:#fff; font-family:Calibri,Arial;">
				<p>Dear <span id="txtfbaname"></span></p>
				<p>Magic Finmart would like to wish you a truly wonderful birthday, May this year bring even more success and abundance of happiness. We also appreciate your association with Magic Finmart. Let the earning engine steam ahead with multitude of products at Magic Finmart.</p>
				<p>Wishing you a Very Happy Birthday once again….</p>
			</td>
		</tr>
		<tr>
			<td style="padding-left:415px;padding-bottom:10px;color:#fff;font-family:Calibri,Arial;">Warm Regards,<br/>
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