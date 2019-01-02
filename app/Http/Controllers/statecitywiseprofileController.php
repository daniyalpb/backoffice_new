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
         class statecitywiseprofileController extends CallApiController 
         {
         		public function show_state_city(){
         		$stateview = DB::select("call usp_load_state_list()");
         			$empprofile=DB::select("call get_finmartemployeemaster_profile()");
				//echo json_encode($stateview);

         		return view('state-wise-profile',['empprofile'=>$empprofile]);
         	}


			public function state_city(){
         		$stateview2 = DB::select("call usp_load_state_list()");
				echo json_encode($stateview2);
				//return view('state-wise-profile');
         	}

         	public function profilecity(Request $req){
          $profilrcity = DB::select('call usp_city_master(?)',array($req->state));
          return $profilrcity;
 }  

  		
public  function profilecity_pincode(Request $req){
// print_r($req->pincode);exit;

}


         }
