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

}