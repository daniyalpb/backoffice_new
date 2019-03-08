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
use Excel;
class SendtodaysmsandmailController extends CallApiController
{
	public function getsmsview()
	{
		$maildata=DB::select("call todaysmaildata()");
		$smsdata=DB::select("call todayssmsdata()");

        foreach ($maildata as  $val)
        {
            $EmailID=$val->EmailID;   
            $FBAID=$val->fbaid; 
            if ($EmailID!=''){             
        	$mail = Mail::send('mailViews.Sendmail',['maildata'=>$maildata],function($message)use($EmailID){
                  $message->from('OfflineCS@magicfinmart.com', 'Magicfinmart');
                  $message->to($EmailID)->subject('Mail From Finmart');       	 
             
               });
        	} 
        	if (Mail::failures()){
                
           }else{
           	DB::select('call update_mail_sent(?)',array($FBAID));
           }

        }
        foreach ($smsdata as $val){
          $smsid=$val->smsid;
          if ($val->message=='Dear {{name}}, welcome to magic finmart.') {
             $newsms=urlencode('Dear '.$val->FullName.', welcome to magic finmart.');
          }else if($val->message=='Dear {{name}}, please register to POPS.'){
            $newsms=urlencode('Dear '.$val->FullName.', please register to POPS.');
          }else{
        	 $newsms=urlencode($val->message);
          } 
        	//$mono=$val->MobiNumb1;
        	//print_r($mono);exit();
        	$post_data="";
                
        	$result=$this->call_json_data_api('http://sms.cell24x7.com:1111/mspProducerM/sendSMS?user=rupee&pwd=apirupee&sender=FINMRT&mobile='.$val->MobiNumb1.'&msg='.$newsms.'&mt=0',$post_data);
          $http_result=$result['http_result'];
  	      $error=$result['error'];
          $st=str_replace('"{', "{", $http_result);
          $s=str_replace('}"', "}", $st);
          $m=$s=str_replace('\\', "", $s);
          $obj = json_decode($m);
     
     // print_r($obj);exit();
       if ($http_result!=''){
          DB::select('call update_sms_status(?,?)',array($http_result,$smsid));
       }
        }
        //return view('Sendtodayssmsandmail',['maildata'=>$maildata]);

	}


}