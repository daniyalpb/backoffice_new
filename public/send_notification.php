
<?php
       $service_url_Notification = 'bo.magicfinmart.com/api/send-db-notification';
       $curl = curl_init($service_url_Notification);
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_POST, false);
       curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
       $curl_response = curl_exec($curl);
       curl_close($curl);
       $json_Notification=json_decode($curl_response);
       echo $curl_response;

?>