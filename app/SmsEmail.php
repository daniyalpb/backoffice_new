<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmsEmail extends Model{
    
    public function send_sms($param){

	$ch = curl_init();
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: text/plain") );
        curl_setopt($ch, CURLOPT_URL, $param['url']);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $http_result = curl_exec($ch);
        $error = curl_error($ch);
        $http_code = curl_getinfo($ch ,CURLINFO_HTTP_CODE);
        curl_close($ch);
        $result=array('http_result' =>$http_result ,'error'=>$error );

		return $result;
	}

	public function get_sms_url($param){
		$url = "http://sms.cell24x7.com:1111/mspProducerM/sendSMS?user=rupee&pwd=apirupee&sender=FINMRT&mobile=".$param['mobile_no']."&msg=".urlencode($param['msg_text'])."&mt=0";
		return $url;
	}
}
