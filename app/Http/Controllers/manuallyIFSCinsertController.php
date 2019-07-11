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
class manuallyIFSCinsertController extends CallApiController{
	public function insert_ifsc_details(){
		$ifsc = DB::select("call bank_name_ifsc()");
		$city = DB::select("call get_city_add_ifsc()");
		return view('manually-ifsc-codeinsert',['ifsc'=>$ifsc,'city'=>$city]);

	}

	public function insert_ifsc_code(Request $req){
		if(isset($req->manuallyadd)){
				//print_r($req->all);exit;
			$data = DB::select('call insert_ifsc_city(?)',array(
				$req->addcity,  
				));
		}else{

			$data = DB::select('call insert_manually_ifsc_code(?,?,?,?,?)',array(
				$req->Bank,  
				$req->ifsccode,
				$req->microde,
				$req->bankbranch,
				$req->City
				
				));
		}
		$msg=$data[0]->Message;
		 // print_r($msg);exit();
		Session::flash('message',"$msg");
		return redirect('manually-ifsc-code');
	}
	
}










		// public function getbank(){
   //       	$ifsc = DB::select("call bank_name_ifsc()");
   //        	echo json_encode($ifsc);

 		// }

 		// 	public function get_city_ifsc(Request $req){
 		// 		//print_r($req->all);exit;
   //          $city = DB::select('call get_city_add_ifsc(?)',array($req->ifsc));
   //        	  return $city;
   //  } 