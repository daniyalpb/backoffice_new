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
class FbabusinessController extends CallApiController
{
	public function showbusiness($fbaid,$fromdate,$todate)
	{
			$data = DB::select("call Fba_business_data('$fbaid','$fromdate','$todate')"); //print_r($data);exit();
		return view('Fbabusiness',['data'=>$data]); 
	}
    
}