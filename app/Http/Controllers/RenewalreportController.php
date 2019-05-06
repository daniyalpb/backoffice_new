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
class RenewalreportController extends Controller
{
	public function getrenewalrp()
	{   
		$Location=Session::get('Location'); 
		//print_r($Location);exit();
		//$users=DB::select('call sp_assign_list()');
		if ($Location=='Mapped_Area') {
			$uid=Session::get('uid'); 
			//$data=DB::select('call renewal_report_summary_mapped_area(?)',[$uid]);
			$data=DB::select('call renewal_report_summary_all_india()'); 
		}else{
			$data=DB::select('call renewal_report_summary_all_india()'); 
		}
		return view('RenewalReport',['data'=>$data]);
	}
	public function getmoredetails($fbaid)
	{
	   $data=DB::select('call renewal_report(?)',[$fbaid]);
	   //print_r($data);exit();
	   return json_encode($data);
	}
}