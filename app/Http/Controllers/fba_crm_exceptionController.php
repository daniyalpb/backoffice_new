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
         class fba_crm_exceptionController extends CallApiController 
         {


				public function show_state_city(){
					$query=[];
         		 $state = DB::select("call usp_load_state_list()");
         		 $empprofile=DB::select("call get_fba_crm_profile()");
         		 return view('fba_crm_exception_mapping',['state'=>$state,'empprofile'=>$empprofile]);
            	}


					public function fba_exception_city(Request $req){
         			$city = DB::select('call usp_city_master(?)',array($req->state));
          	        return $city;
    }  

					public function getstateexceptionfba(){
         			$state = DB::select("call usp_load_state_list()");
          			echo json_encode($state);
 			}
 					public function get_profile_uid($Profile){
					$pname = DB::select("call pincode_wise_profile_name(?)",array($Profile) );
				    echo json_encode($pname);
			}


	public function statecityfbaexception (Request $req){

		$city_string = "'";
		$city_string .= implode("','",$req->city);
		$city_string .= "'";
		$state_string = "'";
		$state_string .= implode("','",$req->state);
		$state_string .= "'";

		

	$fbascity = DB::select("select FBAID,FullName from FBAMast where StatID in ($state_string) and City in($city_string) and AppSource = 1");
	return json_encode($fbascity);
}

		// 			 public function statecityfbaexception (Request $req){
		// 			 $fbascity = DB::select('call get_fba_exception_fba(?,?)',[implode(',',$req->state),implode(',',$req->city)]);
  //   				return json_encode($fbascity);
 	// }


// 					public function updatecrm_fba_exception_updatedate(Request $req){
// 					//print_r($req->all());
// 					$post_array = $req->all();
// 					$fbaid_array = explode(",",$post_array['hiddenid']);
// 					//print_r($fbaid_array);exit();
					
// 		  			$PinCode_array = $post_array['city'];
// 					foreach($PinCode_array as $PinCode){
// 					DB::select('call update_fba_exception_mapping(?,?,?)',array($post_array['eprofile'],$fbaid_array,$post_array['pname']));
// }
// 					return redirect('fba-crm-exception');
// }
      
					public function updatecrm_fba_exception_updatedate(Request $req){
					//print_r($req->all());
					$post_array = $req->all();
					$fbaid_array = explode(",",$post_array['hiddenid']);
					//print_r($fbaid_array);exit();
					$PinCode_array = $post_array['city'];
					foreach($fbaid_array as $PinCode){
					DB::select('call update_fba_exception_mapping(?,?,?)',array($post_array['eprofile'],$PinCode,$post_array['pname']));
}
			Session::flash('message', 'Record Updated successfully');
						return redirect('fba-crm-exception');

}
      
         
    }