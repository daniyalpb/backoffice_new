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

   public function getcrmhistory(Request $req){
     if (isset($req->fbaid)&&isset($req->fbacrmid)){
		$data=DB::select("call Crm_history_app($req->fbacrmid,'$req->fbaid')");
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
       $data=DB::select('call crm_insert_from_app(?,?,?,?,?,?,?,?,?)',array(
              $req->disposition_id,
              $req->user_id,
              $req->crm_id,
              $req->fbamappin_id,             
              $req->followup_date,
              $req->remark,
              $req->action,
              $req->ch_id,
              $req->followup_assign_id,
              ));
        print_r($data);exit();
	}
 
}