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
class FbacommunicationController extends CallApiController
{
  public function getfbacommunication(){
  	  $profile=DB::select("call profile_and_roleid()");
      $header=DB::select("call sms_header()");  
      $mailsub=DB::select("call mail_subject()");  
      $notification=DB::select("call notification_title()");   
  	  return view('Fbacommunication',['profile'=>$profile,'header'=>$header,'mailsub'=>$mailsub,'notification'=>$notification]);
  }
  public function getstateonzone($zone){
  	$data=DB::select("call state_name_on_zone('$zone')");
	//	print_r($data); exit();
		 return json_encode($data);
  }
  public function getposp(){
  	$data=DB::select("call posp_done_fba()");
  	return json_encode($data);
  }
  public function getcityonstate($stateid){
       $data=DB::select("call city_name_on_state('$stateid')");
      //  print_r($data); exit();
       return json_encode($data);
  }
  public function getfbaoncity(Request $req){
  //  print_r($cityname);exit();
        $data=DB::select("call fba_on_city('$req->cityname','$req->todate','$req->fromdate')");
        return json_encode($data);
  }
  public function getempdata($roleid){
    $data=DB::select("call get_employe_by_role('$roleid')");
    return json_encode($data);

  }
  public function getfbadatabydate($todate,$fromdate){
    $data=DB::select("Call get_fba_data_by_createddate('$todate','$fromdate')");
    return json_encode($data);

  }
  public function getpaidfba($todate,$fromdate){    
    $data=DB::select("call Get_paid_fba_in_date('$fromdate','$todate')");
    return json_encode($data);
  }
  public function getpaidfbabycity(Request $req){
      $data=DB::select("call get_paid_fba_by_city_date('$req->cityname','$req->todate','$req->fromdate')");
      return json_encode($data);
  }
  public function getempfba($user){
      $data=DB::select("call fba_on_employee('$user')");
      return json_encode($data);
  }
  public function getsmsbody($smstampid){
    $data=DB::select("call sms_body($smstampid)");
      return json_encode($data);
  }
  public function getmailbody($mailtampid){
    $data=DB::select("call mail_body($mailtampid)");
      return json_encode($data);
  }

   public function save_sms(Request $req)
    {  
     // print_r($req->all());exit();
    if(isset($req->txtFBAID)){
   //print_r($req->txtFBAID);exit();
        $arc=array_chunk($req->txtFBAID,50);      
      //print_r($arc);exit();
        foreach ($arc as $key => $value){       
                     $this->chankfba($value,$req->txtsms,$req->txtscheduledatetime,$req->txtmail,$req->txtscheduledatetimemail,$req->ddlnotfiy,$req->txtscheduledatetimnot);                         
        }
        } 
        if ($req->txtsms!=''||$req->txtmail!=''||$req->ddlnotfiy!=''||$req->txtFBAID!=''){        
            Session::flash('message', "we have captured youour information system will send it to respective on schedule");
             return Redirect::back();
             }else{
              Session::flash('message1', "you have to select at least one FBA and any option from sms,mail or notification");
             return Redirect::back();
             }
        }
    public function chankfba($value,$txtsms,$txtscheduledatetime,$txtmail,$txtscheduledatetimemail,$ddlnotfiy,$txtscheduledatetimnot){
              $fid1=implode(',', $value);
            //  print_r($fid1);exit();
              $uniqid=uniqid();
            // print_r($uniqid);exit();
              $fbauser=Session::get('UId');
            //print_r($fbauser);exit();
            if ($txtsms!=''){
              $query=DB::select("call insert_send_later_sms_log(?,?,?,?,?,?,?)",[$fid1,$txtsms,$uniqid,date('Y-m-d H:i:s'),$uniqid,$fbauser,$txtscheduledatetime]);
               }
           //print_r($query);exit(); 
           if ($txtmail!=''){                         
            $querymail=DB::select("call insert_send_later_mail_log(?,?,?,?,?,?,?)",[$fid1,$txtmail,$uniqid,date('Y-m-d H:i:s'),$uniqid,$fbauser,$txtscheduledatetimemail]);
              }  
              if ($ddlnotfiy!=''){
              DB::select("call insert_notification_data(?,?,?,?,?)",[$fid1,date('Y-m-d H:i:s'),$fbauser,$txtscheduledatetimnot,$ddlnotfiy]); 
              }
    }
    public function getnotifydata($id){
      $data=DB::select("call notification_Message_data($id)");
      return json_encode($data);
    }
    public function getpospdonefbaoncity(Request $req){
      //print_r($req->all());exit();
      $data=DB::select("call posp_done_fba_with_city('$req->cityname')");
      //print_r($data);exit();
      return json_encode($data);
    }
    
}