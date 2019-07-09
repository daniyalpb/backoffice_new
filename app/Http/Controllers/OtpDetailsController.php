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
class OtpDetailsController extends InitialController
{
	
	public function otp_details(){     
		return view('dashboard.otp-details');
	}
	
	public function getotpdetails($fromdate,$todate)
	{
		$query=DB::select("call usp_loadotp_details(?,?)",[$fromdate,$todate]);	
		return json_encode($query);
	}
}

