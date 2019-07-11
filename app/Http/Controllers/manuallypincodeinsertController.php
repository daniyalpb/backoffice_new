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
class manuallypincodeinsertController extends CallApiController{

			public function insert_pincode_details(){
			$state = DB::select("call load_state_list_add_pincode()");
			return view('manually-pincode-insert',['state'=>$state]);
		}


			public function getstate(){
         	$state = DB::select("call load_state_list_add_pincode()");
          	echo json_encode($state);

 		}

 			public function get_city_pincode(Request $req){
            $city = DB::select('call get_city_add_pincode(?)',array($req->state));
          	  return $city;
    }  

    // 		 public  function get_pincode(Request $req){
    // 		 		//print_r($req->all);exit;
    //           $PinCode = DB::select('call get_pincode_manually(?)',array($req->DCCityID));
    //       	 	return $PinCode;

    // }

   			 public function insert_pincod_data(Request $req){
    		//print_r($req->all);exit;
    		 if(isset($req->manuallyadd)){
         $data=DB::select('call add_manuallu_city_pincode(?,?,?,?)',array(
   	 		 $req->hiddenstatename,  
   	 		 $req->addcity,  
   	 		 $req->addpincode,
         $req->city  
   	 		  
   	 ));
		}else{
		
        $data=DB::select('call insert_pincode_city_state_list(?,?,?,?,?)',array(
   	 		$req->hidden_state_name,  
   	 		$req->hidden_city_name,  
   	 		$req->pincode,
   	 		$req->state,
   	 		$req->city	 		  
   	 ));
		 }
		
		 $msg=$data[0]->Message;
		 // print_r($msg);exit();
		 Session::flash('message',"$msg");
		return redirect('manually-pincode');
}

		
}