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

class CaptureloandataController extends ApiController
{
	public function getloandata()
	{
		try{

			$post_data='';
            //print_r($post_data); exit();
			$result=$this->call_json_data_api("http://beta.services.rupeeboss.com/LoginDtls.svc/xmlservice/dsplyAllFBADisbursalLeadData",$post_data);
			$http_result=$result['http_result'];
			$error=$result['error'];
			$st=str_replace('"{', "{", $http_result);
			$s=str_replace('}"', "}", $st);
			$m=$s=str_replace('\\', "", $s);
			$update_user='';
			$obj = json_decode($m);
                //print_r($obj->result->lstfbaDisbursalLeads); exit(); 
			if (!empty($obj->result->lstfbaDisbursalLeads)) {
				$last_id=DB::select("call delete_loan_data()");
				foreach ($obj->result->lstfbaDisbursalLeads as $key => $value){
                     //$value->Product;
					//print_r($value->Product);exit();
					DB::select('call capture_loan_data(?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array(
						$value->leadId,
						$value->custName,
						$value->mobile,
						$value->emailId,
						$value->Product,
						$value->bankName,
						$value->createdDate,
						$value->lastUpdatedDate,
						$value->RMUID,
						$value->RMName,
						$value->leadStatus,
						$value->loanAmnt,
						$value->loanId,
						$value->fbaRegId));
				}	
				foreach ($last_id as $value){
					$lastid=$value->last_id;
				}
				$last_id=DB::select("call get_loan_data_log($lastid)");
				echo "Done";			  
			}
		}
		catch (Exception $e){
			return $e;    
		}

	}

}