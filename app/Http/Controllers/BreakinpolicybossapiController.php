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
class BreakinpolicybossapiController extends ApiController
{
	public function sendnotification(Request $req)
	{
		//print_r($req->all());exit();
		if (isset($req->FBAID)&&isset($req->Notification_Title)){
			$data=DB::select("call policyboss_Break_in_infromation_for_mail_notify($req->FBAID,'$req->Vehical_id','$req->Registration_no','$req->Notification_Title')");
		//print_r($data);exit();
		}else{
			$data=[];
			$data1=$this->send_failure_response('No Data Found','failure',$data);
			return 	$data1;	
		}
		if (!empty($data)){	
		//print_r($data[0]->TokeId);exit();	
			if ($req->Notification_Title='Port-Request') {
				$Notification_Body='User('.$data[0]->FBAID.')was searching for health insurance with company porting option.';
			}else{
				$Notification_Body=$data[0]->Notification_Body;
			}
			$TokeId=$data[0]->TokeId;			
			$Notification_Title=$data[0]->Notification_Title;	
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS =>"{\"to\":\"$TokeId\",\"data\":{\"body\":\"$Notification_Body\",\"title\":\"$Notification_Title\"}}",
				CURLOPT_HTTPHEADER => array("Content-Type:application/json",
					"Authorization:key=AAAAS_NxFJ0:APA91bHaDvrs7g_ezcnzlMX-oM21lcR9quuKll2ISo6QwcL1gESfavPUA7sRcnBanttfJjDHaaiWdPQ_ykEyjLKySdKk8Zyll-SN6PnvY--UXWqq8IfFuEYSvkDKoZPsrIEOX-h9D0sD",
					"Sender:326206821533",
					"Cache-Control:no-cache"),
			));
			$response = curl_exec($curl);
			//print_r($response);exit();
			$err = curl_error($curl);
			curl_close($curl);
			if ($err){
				$myJSONerr = json_decode($err);		        
			}else{
				$myJSON = json_decode($response);			
				if ($myJSON->success==1){
					$fba_id=$req->FBAID;
					$Vehical_id=$req->Vehical_id;
					$Registration_no=$req->Registration_no;
					$SSID=$req->SSID;
					$Product_Name=$req->Product_Name;
					$Notification_Title=$data[0]->Notification_Title;
					if ($req->Notification_Title='Port-Request') {
						$Notification_Body='User('.$data[0]->FBAID.')was searching for health insurance with company porting option.';
					}else{
						$Notification_Body=$data[0]->Notification_Body;
					}
					//$Notification_Body=$data[0]->Notification_Body;
					if ($req->Notification_Title='Port-Request') {
						$Email_Subject='Port-Request';
					}else{	
						$Email_Subject=$data[0]->Email_Subject;
					}
					if ($req->Notification_Title='Port-Request') {
						$Email_Body='User was searching for health insurance with company porting option.';
					}else{
						$Email_Body=$data[0]->Email_Body;
					}
					//$Email_Body=$data[0]->Email_Body;
					$UID=$data[0]->UID;
					$Receiver_name=$data[0]->Receiver_name;
					$Email_To=$data[0]->Email_To;
					$Email_CC=$data[0]->Email_CC;//'shubhamkhandekar2@gmail.com';
					$TokeId=$data[0]->TokeId;					
					//print_r($TokeId);exit();
					DB::select('call save_policyboss_notification_log(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',[
						$fba_id,
						$Vehical_id,
						$Registration_no,
						$SSID,
						$Product_Name,
						$Notification_Title,
						$Notification_Body,
						$Email_Subject,
						$Email_Body,
						$UID,
						$Receiver_name,
						$Email_To,
						$Email_CC,
						$TokeId,
						'1',
						'null']);
				}else{	
				//print_r($data[0]->fba_id);exit();
					$fba_id=$req->FBAID;
					$Vehical_id=$req->Vehical_id;
					$Registration_no=$req->Registration_no;
					$SSID=$req->SSID;
					$Product_Name=$req->Product_Name;
					$Notification_Title=$data[0]->Notification_Title;
					if ($req->Notification_Title='Port-Request') {
						$Notification_Body='User('.$data[0]->FBAID.')was searching for health insurance with company porting option.';
					}else{
						$Notification_Body=$data[0]->Notification_Body;
					}
					//$Notification_Body=$data[0]->Notification_Body;
					if ($req->Notification_Title='Port-Request') {
						$Email_Subject='Port-Request';
					}else{	
						$Email_Subject=$data[0]->Email_Subject;
					}
					if ($req->Notification_Title='Port-Request') {
						$Email_Body='User('.$data[0]->FBAID.')was searching for health insurance with company porting option.';
					}else{
						$Email_Body=$data[0]->Email_Body;
					}
					//$Email_Body=$data[0]->Email_Body;
					$UID=$data[0]->UID;
					$Receiver_name=$data[0]->Receiver_name;
					$Email_To=$data[0]->Email_To;
					$Email_CC=$data[0]->Email_CC;// 'shubhamkhandekar2@gmail.com';//
					$TokeId=$data[0]->TokeId;					
					//print_r($TokeId);exit();
					DB::select('call save_policyboss_notification_log(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',[
						$fba_id,
						$Vehical_id,
						$Registration_no,
						$SSID,
						$Product_Name,
						$Notification_Title,
						$Notification_Body,
						$Email_Subject,
						$Email_Body,
						$UID,
						$Receiver_name,
						$Email_To,
						$Email_CC,
						$TokeId,
						'0',
						'null']);
				//print_r($fba_id);exit();
				}		
				if ($req->Notification_Title='Port-Request') {
					$Email_Subject='Port-Request';
				}		
				$mail = Mail::send('mailViews.Breakinmail',['data' => $data],function($message)use($Email_To,$Email_CC,$Email_Subject){
					$message->from('OfflineCS@magicfinmart.com','Fin-Mart');
					$message->to($Email_To);                   
					$message->cc($Email_CC);          
					$message->subject($Email_Subject);
				});
				 //print_r($mail);exit();
				if(Mail::failures())
				{
					$error=3;
					echo $error;
				}else{
					DB::table('policyboss_notification_n_mail_log')->where('FBAID','=',$fba_id)->update(['ismail_send'=>'1']);
				}
			}
			$data1=[];
			$data1=$this->send_success_response('Process Done','success',$data1);	
			return 	$data1;			
		}else{
			$data=[];
			$data1=$this->send_failure_response('No Data Found','failure',$data);
			return 	$data1;	
		}
		
	}
	
}