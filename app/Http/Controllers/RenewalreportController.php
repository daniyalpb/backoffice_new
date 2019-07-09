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
		return view('RenewalReport');
	}
	public function getmoredetails($fbaid,$fromdate,$todate)
	{
	   $data=DB::select('call renewal_report(?,?,?)',[$fbaid,$fromdate,$todate]);
	   //print_r($data);exit();
	   return json_encode($data);
	}

	public function getrenwaldata(Request $req)
	{
		
		$Location=Session::get('Location'); 
		//print_r($Location);exit();
		//$users=DB::select('call sp_assign_list()');
		if ($Location=='Mapped_Area'){
			$uid=Session::get('uid'); 
			//$uid='101873';
			//print_r($uid);exit();
			$data=DB::select('call renewal_report_summary_mapped_area(?,?,?)',[$uid,$req->fdate,$req->todate]);
			//print_r($data);exit();
			//$data=DB::select('call renewal_report_summary_all_india()'); 
		}else{
			$data=DB::select('call renewalreportallindia(?,?)',[$req->fdate,$req->todate]); 
		} 
		if (!empty($data)) {
			$date = array('fromdate' =>$req->fdate , 'todate'=>$req->todate );		
			return view('RenewalReport',['data'=>$data,'date'=>$date]);
		}else{
			return Redirect('Renewal_Report');
		}
	
	}
	public function newrenewaldata(Request $req)
	{
		$Location=Session::get('Location'); 
		//print_r($Location);exit();
		//$users=DB::select('call sp_assign_list()');
		if ($Location=='Mapped_Area'){
			$uid=Session::get('uid'); 
			//$uid='101873';
			//print_r($uid);exit();
			$data=DB::select('call renewal_report_summary_mapped_areanew(?,?,?)',[$uid,$req->fdate,$req->todate]);
			//print_r($data);exit();
			//$data=DB::select('call renewal_report_summary_all_india()'); 
		}else{
			$data=DB::select('call renewalreportallindianew(?,?)',[$req->fdate,$req->todate]); 
		} 
		if (!empty($data)) {
			$date = array('fromdate' =>$req->fdate , 'todate'=>$req->todate );		
			return view('RenewalReport',['data'=>$data,'date'=>$date]);
		}else{
			return Redirect('Renewal_Report');
		}
	
	}
}