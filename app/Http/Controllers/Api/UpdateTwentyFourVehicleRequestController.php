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

class UpdateTwentyFourVehicleRequestController extends ApiController
{
    public function UpdateTwentyFourVehicleRequest(Request $req){
    	$data=DB::select("call updateTwentyfourVehicleRequest()");
		if (!empty($data)){
			$data1=$this->send_success_response('Updated successfully','success',$data);	
				return 	$data1;
		}else{
			$data1=$this->send_failure_response('Failed','failure',$data);
				return 	$data1;	
		}
    }
}
