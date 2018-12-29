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

$sql = "SELECT distinct( group_id) as group_id  FROM SMSLog where issent is null limit 0,10";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    

$url1='http://api.magicfinmart.com';  

while($row=$result->fetch_assoc())
{
	  $uniqid=$row['group_id'];
//	echo $uniqid."--group id--";
	//  $data='{"group_id":"'.$uniqid.'"}';
 	$data='{"group_id":"'.$uniqid.'"}';
//	var_dump($data);
	call_json($url1.'/api/send-sms',$data);
}
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

echo "\n\n".$error."\n";
echo $http_result."\n";
  $result=array('http_result' =>$http_result ,'error'=>$error );
  return $result;
  }

 //$data='{"group_id":"'.$uniqid.'"}';
//call_json($url.'/api/send-sms',$data);


$conn->close();




?>
