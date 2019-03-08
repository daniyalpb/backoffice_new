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
class SendbreakinnotificationController extends ApiController
{
	public function sendnotification(Request $req)
	{
		//print_r($req->all());exit();
		if (isset($req->VehicleRequestID)){
			$data=DB::select("call Break_in_infromation_for_mail_notify('$req->VehicleRequestID')");
		//print_r($req->all());exit();
		}else{
			$data=[];
			$data1=$this->send_failure_response('No Data Found','failure',$data);
			return 	$data1;	
		}
		if (!empty($data)){	
		//print_r($data[0]->TokeId);exit();	
			$TokeId=$data[0]->TokeId;
			$Notification_Body=$data[0]->Notification_Body;
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
			        $fba_id=$data[0]->fba_id;
					$EmployeeName=$data[0]->Receiver_name;
					$Uid=$data[0]->UID;
					$Notification_Title=$data[0]->Notification_Title;
					$Notification_Body=$data[0]->Notification_Body;
					$Email_To=$data[0]->Email_To;
					$Email_CC=$data[0]->Email_CC;//'shubhamkhandekar2@gmail.com';
					$Email_Subject=$data[0]->Email_Subject;
					$Email_Body=$data[0]->Email_Body;
					//print_r($fba_id);exit();
					DB::select('call save_break_in_log(?,?,?,?,?,?,?,?,?,?,?)',[
						$fba_id,
						$EmployeeName,
						$Uid,
						$Notification_Title,
						$Notification_Body,
						$Email_To,
						$Email_CC,
						$Email_Subject,
						$Email_Body,
						'1',
						'null']);
				}else{	
				//print_r($data[0]->fba_id);exit();
					$fba_id=$data[0]->fba_id;
					$EmployeeName=$data[0]->Receiver_name;
					$Uid=$data[0]->UID;
					$Notification_Title=$data[0]->Notification_Title;
					$Notification_Body=$data[0]->Notification_Body;
					$Email_To=$data[0]->Email_To;
					$Email_CC=$data[0]->Email_CC;//'shubhamkhandekar2@gmail.com';//$data[0]->Email_CC;
					$Email_Subject=$data[0]->Email_Subject;
					$Email_Body=$data[0]->Email_Body;
					//print_r($fba_id);exit();
					DB::select('call save_break_in_log(?,?,?,?,?,?,?,?,?,?,?)',[
						$fba_id,
						$EmployeeName,
						$Uid,
						$Notification_Title,
						$Notification_Body,
						$Email_To,
						$Email_CC,
						$Email_Subject,
						$Email_Body,
						'0',
						'null']);
				//print_r($fba_id);exit();
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
                  DB::table('break_in_notification_mail_log')->where('FBAID','=',$fba_id)->update(['ismailsend'=>'1']);
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
	public function getinappnotificationdata($fbaid){
	$data=DB::select("call breakin_notification_data($fbaid)");
	 return view('Breakinappnotification',['data'=>$data]);
	}
	public function webnotification(){
	 $fbaid=Session::get('fbaid');	 	
		$data=DB::select("call breakin_notification_data(45906)");		
	   return json_encode($data);	

	}	
	public function updateisread($id){
		DB::select("call break_in_update_isread('$id')");
		return Redirect::back();
	}
	 public function showmyalerts()
	{ 
		$fbaid=Session::get('fbaid');	 	
		$data=DB::select("call breakin_notification_all_data(45906)");
		return view('Myalerts',['data'=>$data]);
	}
	
}