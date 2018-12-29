<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Response;
use Validator;
use Redirect;
use Session;
use URL;
use Mail;

class SendnotificationapiController extends ApiController
{
  public function testapi(Request $req){
     //print_r($req->all());exit();
     return $this::send_success_json_encode($req->all());
      
  }
  public function senddbnotification(){
		$query = DB::select('call user_db_notification()');
		//print_r($query);exit();
		if(!empty($query)){		
		foreach ($query as $key => $val){			
		  $curl = curl_init();
		  curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS =>"{\"to\":\"$val->TokeId\",\"data\":{\"notifyFlag\":\"$val->MessageType\",\"img_url\":\"$val->ImagePath\",\"body\":\"$val->Message\",\"title\":\"$val->NotificationTitle\"}}",
		  CURLOPT_HTTPHEADER => array("Content-Type:application/json",
            "Authorization:key=AAAAS_NxFJ0:APA91bHaDvrs7g_ezcnzlMX-oM21lcR9quuKll2ISo6QwcL1gESfavPUA7sRcnBanttfJjDHaaiWdPQ_ykEyjLKySdKk8Zyll-SN6PnvY--UXWqq8IfFuEYSvkDKoZPsrIEOX-h9D0sD",
            "Sender:326206821533",
            "Cache-Control:no-cache"),
		  ));
		  $response = curl_exec($curl);
		  $err = curl_error($curl);
		  curl_close($curl);
		 if ($err){
		  $myJSONerr = json_decode($err);
		  return $this::send_success_json_encode($myJSONerr);
		}else{
			$myJSON = json_decode($response);			
			 if ($myJSON->success==1){
				DB::select('call update_notification_send(?,?)',array(
					$val->UserNotificationRequestId,
				    $myJSON->results[0]->message_id));
			return $this::send_success_json_encode("Notification Send Successfully".$response);
			}
		  // return $this::send_success_json_encode($myJSON);
		}

		}
		
		}else{
	return $this::send_success_json_encode("there is no Notification is Pending");
		}
		
	}
	/*public function sendnotification(Request $req)
	{
		//print_r($req->all());exit();
		$to=$req->to;
		$notifyFlag=$req->notifyflag;
		$imgurl=$req->imgurl;
		$body=$req->body;
		$title=$req->title;
		$notifyid=$req->notifyid;
		$order_id=$req->order_id;
        
         //print_r($header);exit();
		  $curl = curl_init();
		  curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS =>"{\"to\":\"$to\",\"data\":{\"notifyFlag\":\"$notifyFlag\",\"img_url\":\"$imgurl\",\"body\":\"$body\",\"title\":\"$title\"}}",
		  CURLOPT_HTTPHEADER => array("Content-Type:application/json",
            "Authorization:key=key=AAAAS_NxFJ0:APA91bHaDvrs7g_ezcnzlMX-oM21lcR9quuKll2ISo6QwcL1gESfavPUA7sRcnBanttfJjDHaaiWdPQ_ykEyjLKySdKk8Zyll-SN6PnvY--UXWqq8IfFuEYSvkDKoZPsrIEOX-h9D0sD",
            "Sender:326206821533",
            "Cache-Control:no-cache"),
		  ));
		  $response = curl_exec($curl);
		  $err = curl_error($curl);
		  curl_close($curl);
		 if ($err){
		  $myJSONerr = json_decode($err);
		  return $this::send_success_json_encode($myJSONerr);
		}else {
			$myJSON = json_decode($response);			
			if ($myJSON->success==1&&$notifyid==0){
				DB::select('call insert_notifinaction_request(?,?,?,?,?,?,?,?)',array(
					$req->title,
                    $req->body,
                    $req->imgurl,
                    $req->userid,
                    $req->isagentapp,
                    $req->notifyflag,
                    $myJSON->results[0]->message_id,
			        $req->order_id));
			}else if($myJSON->success!=1&&$notifyid==0){
				DB::select('call insert_notifinaction_notsendrequest(?,?,?,?,?,?,?)',array(
					$req->title,
                    $req->body,
                    $req->imgurl,
                    $req->userid,
                    $req->isagentapp,
                    $req->notifyflag,
                    $req->order_id));
			}else if ($myJSON->success==1&&$notifyid!=0){
				DB::select('call update_notification_send(?,?)',array(
					$notifyid,
				    $myJSON->results[0]->message_id));
			}
		   return $this::send_success_json_encode($myJSON);
		}

	}*/
}