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
class motorleaddetailsController extends CallApiController
{

			public function view_motor_leads($FBAID){
			//print_r($req->FBAID);exit();
			$motorlead=DB::select("call usp_load_moter_lead_details($FBAID)");
			//$fccount=DB::select("call motor_lead_From_Contacts_count($FBAID)");

			 //print_r($motorlead);exit();
			 return view('motor-lead-details',['motorlead'=>$motorlead]);
		 }


      	 	 public function getleadata(Request $req){
     		//
      	 	 	//print_r($req->all()); exit();


     		$leaddata=DB::select("call usp_get_motor_lead_data(?,?)",array($req->FBAID,$req->month_no));
     		//print_r($leaddata); exit();
     			//var_dump($leaddata); exit();
			return view('motor-lead-all-details',['leaddata'=>$leaddata]);

        }

        // public function count_from_contacts(){
        // $fccount=DB::select("call motor_lead_From_Contacts_count()");
        // return view('motor-lead-details',['fccount'=>$fccount]);
        // }


}