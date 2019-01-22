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
class FbadetailsapiController extends ApiController
{
    	
  //fbalist api
	public function getfbadata(Request $req)
	{ 
		//print_r($req->search_parameter);exit();
		if (isset($req->Fbaid)){
		$data=DB::select("call fbaListapp($req->Fbaid,$req->count,'$req->search_parameter')");
		}else{
			$data=[];
            $data1=$this->send_failure_response('No Data Found','failure',$data);
			return 	$data1;	
		}		
	   if (!empty($data)){
			$data1=$this->send_success_response('Data Has Been Feachted Successfully','success',$data);	
			return 	$data1;
		}else{
			$data1=$this->send_failure_response('No Data Found','failure',$data);
			return 	$data1;	
		}	
		
	}
//my followup
   public function getcrmhistory(Request $req){
     if (isset($req->Uid)&&isset($req->fbacrmid)){
		$data=DB::select("call Crm_history_app($req->fbacrmid,'$req->Uid')");
		}else{
			$data=[];
            $data1=$this->send_failure_response('No Data Found','failure',$data);
			return 	$data1;	
		}
		if (!empty($data)){
			$data1=$this->send_success_response('Data Has Been Feachted Successfully','success',$data);	
			return 	$data1;
		}else{
			$data1=$this->send_failure_response('No Data Found','failure',$data);
			return 	$data1;	
		}
   	

   }
   //others followup
   public function getothersfollowup(Request $req){
   	if (isset($req->Uid)&&isset($req->fbacrmid)){
		$data=DB::select("call Crm_all_history_app($req->fbacrmid,'$req->Uid')");
		}else{
			$data=[];
            $data1=$this->send_failure_response('No Data Found','failure',$data);
			return 	$data1;	
		}
		if (!empty($data)){
			$data1=$this->send_success_response('Data Has Been Feachted Successfully','success',$data);	
			return 	$data1;
		}else{
			$data1=$this->send_failure_response('No Data Found','failure',$data);
			return 	$data1;	
		}
   }
   //crm comment
   public function getcrmcomment(Request $req){
   		if (isset($req->fbacrmid)){
		$data=DB::select("call Fba_crm_comment_app($req->fbacrmid)");
		}else{
			$data=[];
            $data1=$this->send_failure_response('No Data Found','failure',$data);
			return 	$data1;	
		}
		if (!empty($data)){
			$data1=$this->send_success_response('Data Has Been Feachted Successfully','success',$data);	
			return 	$data1;
		}else{
			$data1=$this->send_failure_response('No Data Found','failure',$data);
			return 	$data1;	
		}
   }

	public function getcrmfollowup(Request $req)
	{
       //print_r($req->all());exit();
		if (isset($req->disposition_id)&&isset($req->remark)){
		 $data=DB::select('call crm_insert_from_app(?,?,?,?,?,?,?,?,?)',array(
              $req->disposition_id,
              $req->Uid,
              $req->crm_id,
              $req->fbamappin_id,             
              $req->followup_date,
              $req->remark,
              $req->action,
              $req->ch_id,
               $req->followup_assign_id
            
              ));
		}else{
			$data=[];
            $data1=$this->send_failure_response('No Data Found','failure',$data);
			return 	$data1;	
		}      
        if (!empty($data)){
			$data1=$this->send_success_response('Data Has Been Saved Successfully','success',$data);
				
			DB::select('call crm_insert_followup_app(?,?,?,?)',array(              
              $req->Uid,                                   
              $req->followup_assign_id,
              $req->fbamappin_id,
              $data[0]->history_id 
              ));
			return 	$data1;
		}else{
			$data1=$this->send_failure_response('No Data Found','failure',$data);
			return 	$data1;	
		}
	}
	public function insertcrmcomment(Request $req){
		//print_r($req->Comment);exit();
		if (isset($req->Comment)){
		 $data=DB::select('call insert_fba_comment_crm_app(?,?,?)',array(
              $req->Fbacrmid,
              $req->Comment,
              $req->Created_by                        
              ));
		}else{
			$data=[];
            $data1=$this->send_failure_response('No Data Found','failure',$data);
			return 	$data1;	
		}if (!empty($data)){
			$data1=$this->send_success_response('Data Has Been Saved Successfully','success',$data);	
			return 	$data1;
		}else{
			$data1=$this->send_failure_response('No Data Found','failure',$data);
			return 	$data1;	
		}
	}
	
 
}

