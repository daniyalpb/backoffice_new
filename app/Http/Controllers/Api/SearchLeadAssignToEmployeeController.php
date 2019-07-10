<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use DB;
use Response;
use Validator;
use Redirect;
use Session;
use URL;
use Mail;

class SearchLeadAssignToEmployeeController extends ApiController
{
    public function searchleadassigntoemployee(Request $req){
    	if (isset($req->UID)){
			$data=DB::select("call Get_search_lead_to_assign_employee($req->UID)");
			//print_r($data); exit();
			}else{
				$data=[];
            	$data1=$this->send_failure_response('UID does not find','failure',$data);
				return 	$data1;	
			}
			if (!empty($data)){
				$history=DB::select("call Get_search_lead_to_assign_employee_history($req->UID)");
				$finaldata['call'] = $data;
				$finaldata['history'] = $history;
				$data1=$this->send_success_response('Data Has Been Feachted Successfully','success',$finaldata);	
				return 	$data1;
		}else{
			$data1=$this->send_failure_response('No Data Found','failure',$data);
			return 	$data1;	
		}
    }


    public function saveLeadcrmhistory(Request $req){

    	if (isset($req->lead_id) && isset($req->disposition_id)){
    		if($req->disposition_id == '1' || $req->disposition_id == '2' || $req->disposition_id == '6' || $req->disposition_id == '7' || $req->disposition_id == '9' || $req->disposition_id == '10'){
    			if (isset($req->followup_date) && isset($req->followup_time)){
    				$data=DB::select("call save_Lead_crm_history_1(?,?,?,?,?,?,?,?,?,?,?)",array($req->lead_id,$req->remark,$req->disposition_id,$req->source,$req->call_duration,$req->followup_date,$req->followup_time,$req->is_call_done,$req->status,$req->fbaid,$req->lead_followup_id));
    				if (!empty($data)){
						$data1=$this->send_success_response('Data saved Successfully','success',$data);	
						return 	$data1;
					}else{
						$data1=$this->send_failure_response('Data save faild','failure',$data);
						return 	$data1;	
					}
    			}else{
					$data=[];
	            	$data1=$this->send_failure_response('Please enter followup date or followup time','failure',$data);
					return 	$data1;	
				}
    		}else if($req->disposition_id == '5'){
    			if (isset($req->status) && isset($req->fbaid)){
    				$checkfba=DB::select("call Get_FBA_Exiests_or_Not(?)",array($req->fbaid));
	    			if($checkfba[0]->id == '0'){
	    				$data=DB::select("call save_Lead_crm_history(?,?,?,?,?,?,?,?,?,?,?)",array($req->lead_id,$req->remark,$req->disposition_id,$req->source,$req->call_duration,$req->followup_date,$req->followup_time,$req->is_call_done,$req->status,$req->fbaid,$req->lead_followup_id));
		    			if (!empty($data)){
							$data1=$this->send_success_response('Data saved Successfully','success',$data);	
							return 	$data1;
						}else{
							$data1=$this->send_failure_response('Data save faild','failure',$data);
							return 	$data1;	
						}
					}else{
						$data1=$this->send_failure_response('FBAID Does Not Exists.','failure',$checkfba);
						return 	$data1;	
					}
    			}else{
					$data=[];
	            	$data1=$this->send_failure_response('Please enter status or fbaid','failure',$data);
					return 	$data1;	
				}
    		}else if($req->disposition_id == '3' || $req->disposition_id == '4' || $req->disposition_id == '8'){
    			if (isset($req->status)){
    				$data=DB::select("call save_Lead_crm_history(?,?,?,?,?,?,?,?,?,?,?)",array($req->lead_id,$req->remark,$req->disposition_id,$req->source,$req->call_duration,$req->followup_date,$req->followup_time,$req->is_call_done,$req->status,$req->fbaid,$req->lead_followup_id));
	    			if (!empty($data)){
						$data1=$this->send_success_response('Data saved Successfully','success',$data);	
						return 	$data1;
					}else{
						$data1=$this->send_failure_response('Data save faild','failure',$data);
						return 	$data1;	
					}
    			}else{
					$data=[];
	            	$data1=$this->send_failure_response('Please enter status','failure',$data);
					return 	$data1;	
				}
    		}
		}else{
			$data=[];
            $data1=$this->send_failure_response('Please enter lead id or disposition id','failure',$data);
			return 	$data1;	
		}
    }

  //   public function saveleadcrmfollowup(Request $req){
  //   	if (isset($req->lead_id)){
		// 	$data=DB::select("call save_lead_crm_follow_up(?,?,?,?)",array($req->lead_id,$req->followup_date,$req->followup_time,$req->is_call_done));
		// 	}else{
		// 		$data=[];
  //           	$data1=$this->send_failure_response('Please enter lead id','failure',$data);
		// 		return 	$data1;	
		// 	}
		// 	if (!empty($data)){
		// 		$data1=$this->send_success_response('Data saved Successfully','success',$data);	
		// 		return 	$data1;
		// }else{
		// 	$data1=$this->send_failure_response('Data save faild','failure',$data);
		// 	return 	$data1;	
		// }
  //   }

     public function getleadcrmdisposition(Request $req){
			$data=DB::select("call Get_Lead_Crm_Disposition()");
			if (!empty($data)){
				$data1=$this->send_success_response('Data Has Been Feachted Successfully','success',$data);	
				return 	$data1;
			}else{
				$data1=$this->send_failure_response('No Data Found','failure',$data);
				return 	$data1;	
			}
    }

    public function saveleadcrmtypehistory(Request $req){
    	if (isset($req->lead_id) && isset($req->type)){
    		$data=DB::select("call save_Lead_crm_type_history(?,?,?,?)",array($req->lead_id,$req->type,$req->lead_followup_id,$req->call_duration));
		    if (!empty($data)){
				$data1=$this->send_success_response('Data saved Successfully','success',$data);	
				return 	$data1;
			}else{
				$data1=$this->send_failure_response('Data save faild','failure',$data);
				return 	$data1;	
			}
		}else{
			$data=[];
	        $data1=$this->send_failure_response('Please enter lead id or type','failure',$data);
			return 	$data1;	
		}
    }

   public function getfollowupleadcrm(Request $req){
    	if (isset($req->UID) && isset($req->count)){
			$data=DB::select("call Get_Followup_History_Lead_crm(?,?)",array($req->UID,$req->count));
			}else{
				$data=[];
            	$data1=$this->send_failure_response('Please enter UID or count','failure',$data);
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

    public function getfollowupcloseleadcrm(Request $req){
    	if (isset($req->UID) && isset($req->count)){
			$data=DB::select("call Get_Followup_Close_Lead_crm(?,?)",array($req->UID,$req->count));
			}else{
				$data=[];
            	$data1=$this->send_failure_response('Please enter UID or count','failure',$data);
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
