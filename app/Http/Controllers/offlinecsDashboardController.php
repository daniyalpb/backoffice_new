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
class OfflinecsDashboardController extends Controller
{
	public function getofflinecsdata()
	{
		$fbauser=Session::get('fbauserid');
		$data=DB::select("call Usp_get_offlinecs_data_view($fbauser)");
		//print_r($data); exit();
		 return view('offlinecsDashboard',['data'=>$data]);
	}
  public function getofflinecsalldata()
  {
   // $fbauser=Session::get('fbauserid');
    $data=DB::select("call Usp_get_offlinecs_all_data()");
    //print_r($data); exit();
     return view('OfflinecsallEntry',['data'=>$data]);
  }

	public function sendemail($ID)
	{
               
       $offlinecsdata = DB::select("call Usp_get_motor_data($ID)"); 
       foreach ($offlinecsdata as $val) {
         $fba_id=$val->Createdby_FBAID;
        // print_r($fba_id);exit();
       }

      if ($offlinecsdata[0]->Product==1||$offlinecsdata[0]->Product==2||$offlinecsdata[0]->Product==3) 
              {             
               $FBAID=Session::get('fbaid');
               if ($FBAID!=$fba_id) {
                  $emailids=DB::select("call getTOCCEmailIdForOfflineCS($fba_id,1)"); 
               }
               else{
                $emailids=DB::select("call getTOCCEmailIdForOfflineCS($FBAID,1)"); 
               }
               
              
              foreach ($emailids as $val){                
               $tomail= $val->To_mail_id;
               $ccemail = explode(',',$val->CC_mail_id);               
              }
            
                
                $sub='SNo.'.$offlinecsdata[0]->ID.' '.$offlinecsdata[0]->product_name.'  Entry details for '.$offlinecsdata[0]->CustomerName.' - '.$offlinecsdata[0]->POSPName;
                
            if($emailids!='')
            {                
                  $mail = Mail::send('mailViews.sendmailofflinecs',['offlinecsdata' => $offlinecsdata], function($message)use($tomail,$ccemail,$sub){
                  $message->from('OfflineCS@magicfinmart.com', 'Fin-Mart');
                  $message->to($tomail);
                   foreach ($ccemail as $key => $cc) 
                   {
                     $message->cc($cc);
                    }
                  $message->subject($sub);                 

                  });
               if(Mail::failures())
                {
                   $error=3;
                   echo $error;
                }
              DB::table('offlinecs')->where('ID','=',$ID)->update(['ismailsend'=>1]);
             }
           }

      if ($offlinecsdata[0]->Product==4||$offlinecsdata[0]->Product==5) 
              {             
               $FBAID=Session::get('fbaid');
               if ($FBAID!=$fba_id) {
                  $emailids=DB::select("call getTOCCEmailIdForOfflineCS($fba_id,4)"); 
               }
               else{
                $emailids=DB::select("call getTOCCEmailIdForOfflineCS($FBAID,4)"); 
               }
                
              foreach ($emailids as $val){                
               $tomail= $val->To_mail_id;
               $ccemail = explode(',',$val->CC_mail_id);               
              }
            
                
                $sub='SNo.'.$offlinecsdata[0]->ID.' '.$offlinecsdata[0]->product_name.'  Entry details for '.$offlinecsdata[0]->CustomerName.' - '.$offlinecsdata[0]->POSPName;
                
            if($emailids!='')
            {                
                  $mail = Mail::send('mailViews.sendmailofflinecs',['offlinecsdata' => $offlinecsdata], function($message)use($tomail,$ccemail,$sub){
                  $message->from('OfflineCS@magicfinmart.com', 'Fin-Mart');
                  $message->to($tomail);
                   foreach ($ccemail as $key => $cc) 
                   {
                     $message->cc($cc);
                    }
                  $message->subject($sub);

                  });
               if(Mail::failures())
                {
                   $error=3;
                   echo $error;
                }
              DB::table('offlinecs')->where('ID','=',$ID)->update(['ismailsend'=>1]);
             }
           }

     if ($offlinecsdata[0]->Product==6) 
              {             
               $FBAID=Session::get('fbaid');
               if ($FBAID!=$fba_id) {
                  $emailids=DB::select("call getTOCCEmailIdForOfflineCS($fba_id,6)"); 
               }
               else{
                $emailids=DB::select("call getTOCCEmailIdForOfflineCS($FBAID,6)"); 
               }
              foreach ($emailids as $val){                
               $tomail= $val->To_mail_id;
               $ccemail = explode(',',$val->CC_mail_id);               
              }
            
                
                $sub='SNo.'.$offlinecsdata[0]->ID.' '.$offlinecsdata[0]->product_name.'  Entry details for '.$offlinecsdata[0]->CustomerName.' - '.$offlinecsdata[0]->POSPName;
                
            if($emailids!='')
            {                
                  $mail = Mail::send('mailViews.sendmailofflinecs',['offlinecsdata' => $offlinecsdata], function($message)use($tomail,$ccemail,$sub){
                  $message->from('OfflineCS@magicfinmart.com', 'Fin-Mart');
                  $message->to($tomail);
                   foreach ($ccemail as $key => $cc) 
                   {
                     $message->cc($cc);
                    }
                  $message->subject($sub);

                  });
               if(Mail::failures())
                {
                   $error=3;
                   echo $error;
                }
              DB::table('offlinecs')->where('ID','=',$ID)->update(['ismailsend'=>1]);
             }
           }
 if ($offlinecsdata[0]->Product==7) 
              {             
               $FBAID=Session::get('fbaid');
               $emailids=DB::select("call getTOCCEmailIdForOfflineCS($FBAID,7)"); 
              foreach ($emailids as $val){                
               $tomail= $val->To_mail_id;
               $ccemail = explode(',',$val->CC_mail_id);               
              }
            
                
                $sub='SNo.'.$offlinecsdata[0]->ID.' '.$offlinecsdata[0]->product_name.'  Entry details for '.$offlinecsdata[0]->CustomerName.' - '.$offlinecsdata[0]->POSPName;
                
            if($emailids!='')
            {                
                  $mail = Mail::send('mailViews.sendmailofflinecs',['offlinecsdata' => $offlinecsdata], function($message)use($tomail,$ccemail,$sub){
                  $message->from('OfflineCS@magicfinmart.com', 'Fin-Mart');
                  $message->to($tomail);
                   foreach ($ccemail as $key => $cc) 
                   {
                     $message->cc($cc);
                    }
                  $message->subject($sub);

                  });
               if(Mail::failures())
                {
                   $error=3;
                   echo $error;
                }
              DB::table('offlinecs')->where('ID','=',$ID)->update(['ismailsend'=>1]);
             }
           }    
             
    }
    public function showdetails($ID)
    {
       $offlinecsdata = DB::select("call Usp_get_motor_data($ID)");
       return json_encode($offlinecsdata);
    }
    public function updatecsid(Request $req)
    {
       $fbauser=Session::get('fbauserid');
       DB::select('call Usp_update_csid_offlinecs(?,?,?)',array(
        $req->txtcsid,
        $fbauser,
        $req->txtID));
       
    }

    public function exportexcel()
    {
               
              $query=[];
              $query=DB::select("call Usp_Export_to_excle_offlinecs()");
              $data = json_decode( json_encode($query), true) ;

              return Excel::create('Offlinecsdata', function($excel) use ($data) {
            $excel->sheet('Offlinecsdata', function($sheet) use ($data)
            {

              $sheet->fromArray($data);
          });
              })->download('xls');

  }
 
}

