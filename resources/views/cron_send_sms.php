<?php
$servername = "35.154.72.18";
$username = "finmart_user";
$password = "finmart@0909";
$dbname = "BackOffice";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM SMSLog  where issent='9920298619'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    print_r($result) ;


} else {
    echo "0 results";
}





  function call_json($url,$data){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_VERBOSE, 1);
  curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json','token:1234567890'));
  curl_setopt($ch, CURLOPT_URL, $url);curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_FAILONERROR, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
 $http_result = curl_exec($ch);
  $error = curl_error($ch);
  $http_code = curl_getinfo($ch ,CURLINFO_HTTP_CODE);
  curl_close($ch);
  $result=array('http_result' =>$http_result ,'error'=>$error );
  return $result;
  }

 $data='{"group_id":"'.$uniqid.'"}';
call_json($url.'/api/send-sms',$data);


$conn->close();




?>