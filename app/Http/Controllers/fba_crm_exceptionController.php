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
use Excel;
class fba_crn_details_Controller extends CallApiController{
	public function fba_crn_details_view(Request $req){
		if (Session::get('Location')=='All_India') {
			$data=DB::select("call insurance_report()");
		}else{
			$data=DB::select('call insurance_report_mappedarea(?)',array(Session::get('UId')));
		}
		$lo=Session::get('Location');
//print_r($lo);exit();
// return json_encode($data);
		return json_encode(["data"=>$data]);
 //return view('fba-crn-detail',['data'=>$data]);
		

	}


	public function fba_crn_view(){

		return view('fba-crn-detail');
	}

	
}