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
         		$empprofile=DB::select("call get_fba_crm_profile()");
				//echo json_encode($stateview);
			return view('state-wise-profile',['stateview'=>$stateview,'empprofile'=>$empprofile]);
            	}


				public function state_city(){
         		$stateview2 = DB::select("call usp_load_state_list()");
				echo json_encode($stateview2);
				//return view('state-wise-profile');
            	}

         		public function profilecity(Request $req){
         		$profilrcity = DB::select('call get_crm_mapping_city(?)',array($req->state));
          	 	return $profilrcity;
 		  }  

  			   public  function profilecity_pincode(Request $req){
               $profilrcity2 = DB::select('call get_pincode_on_city_id(?)',array($req->cityid));
          	 	return $profilrcity2;

    }
			// print_r($req->pincode);exit;

	

				public function get_profile_name($Profile){
				$pname = DB::select("call pincode_wise_profile_name(?)",array($Profile) );
				echo json_encode($pname);

 
	    }

		public function updateuid(Request $req){
		// print_r($req->all);exit;
		if(isset($req->mapfba)){
           $post_array = $req->all();
		   $PinCode_array = $post_array['PinCode'];
		foreach($PinCode_array as $PinCode){
	DB::select('call update_override_fba_crm_new(?,?,?)',array($post_array['eprofile'],$PinCode,$post_array['pname']));

	// DB::select('call update_override_fba_crm_new(?,?,?)',array($post_array['eprofile'],$PinCode,$post_array['pname']));
	}
			 }else{
             $post_array = $req->all();
		$PinCode_array = $post_array['PinCode'];
		foreach($PinCode_array as $PinCode){
	DB::select('call update_non_override_fba_crm(?,?,?)',array($post_array['eprofile'],$PinCode,$post_array['pname']));

	}
			 }
Session::flash('message', 'Record Updated successfully');
		 //print_r($req->all());exit;
		return redirect('state-city-profile');
       
 }  




	// 	public function updateuid(Request $req){
			
	// 	if(isset($req->mapfba)){
 //                echo "1";
	// 		 }else{
 //                echo "0";
	// 		 }exit();
	// 	 //print_r($req->all());exit;
	// 	$post_array = $req->all();
	// 	$PinCode_array = $post_array['city'];
	// 	foreach($PinCode_array as $PinCode){
	// DB::select('call update_pincode_wise_profile(?,?,?)',array($post_array['eprofile'],$PinCode,$post_array['pname']));

	// DB::select('call update_override_fba_crm(?,?,?)',array($post_array['eprofile'],$PinCode,$post_array['pname']));
	// }
	// 	return redirect('state-city-profile');
       
 // }  



  }
