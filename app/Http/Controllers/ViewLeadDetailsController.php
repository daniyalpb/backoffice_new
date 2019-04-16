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

class ViewLeadDetailsController extends Controller
{
	public function viewleaddetails(Request $req){
		$getdata = DB::select('call Get_Lead_details_count()');
		return view('view_lead_details',['getdata'=>$getdata]);
	}

	public function viewleaddetailsrecord($assing_to_uid,$type){
		$getallleaddata = DB::select('call get_lead_records(?,?)',array($assing_to_uid,$type));
		return view('view_lead_details_record',['getallleaddata'=>$getallleaddata]);
	}

	public function getleaddetails(Request $req){
		$getlead = DB::select('call Get_lead_details_view(?)',array($req->leadid));
		return $getlead;
	}
}
