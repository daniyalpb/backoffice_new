<?php
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.magicfinmart.com/api/user-constant",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"fbaid\":\"37292\"}",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "Postman-Token: 0e7c57d0-4a3b-4483-890e-17066e6e9f89",
    "cache-control: no-cache",
    "token: 1234567890"
  ),
));
$response = curl_exec($curl);
$val = json_decode($response);
if($val->Message=="Success"){  
}
else{
     send_sms();
}
curl_close($curl);

function send_sms(){
    $mobileno = array("7387863187","8355992808","9375166823"); 
    $mob = implode(',', $mobileno);
    $msg = "Fin-Mart API down please check and fix.";
    $msg1 = str_replace(' ', '%20', $msg);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://sms.cell24x7.com:1111/mspProducerM/sendSMS?user=rupee&pwd=apirupee&sender=FINMRT&mobile=".$mob."&msg=".$msg1."&mt=0");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch);
    curl_close($ch);
}
?>
