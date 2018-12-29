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

class Crm_reportsController extends CallApiController
{
	public function getcrmreport()
	{
		
            return view('Crm_report');     
	}
	public function crm_report($fromdate,$todate)
	{        
           $crmrpdata = DB::select('call Crm_report_details(?,?)',[$fromdate,$todate]);   
           //print_r($crmrpdata); exit();
           return json_encode($crmrpdata);
	}

}