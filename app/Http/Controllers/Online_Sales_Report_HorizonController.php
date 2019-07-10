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
class Online_Sales_Report_HorizonController extends Controller
{
	public function get_Online_Sales_data()
	{
		return view('Online_Sales_Report_Horizon');
	}
	public function importsalesdata(Request $req)
	{
		$req->validate([
			'import_file' => 'required'
		]);

		$path = $req->file('import_file')->getRealPath();
		$data = Excel::load($path)->get();

       //print_r($data);exit();
		if(!empty($data)){
			$fbaid=Session::get('fbaid');
			foreach ($data as $key => $value){ 
				if (isset($value->pb_crn)&&$value->pb_crn!=''){                          
					DB::select('call import_horizon_salse_data(?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array(
						$value->product,
						$value->erp_id,
						$value->fbaid,
						$value->agent,
						$value->insurer,
						$value->pb_crn,
						$value->erp_cs,
						$value->reg_no,
						$value->premium ,
						$value->customer,
						$value->policy_type,
						$value->entry_date,
						$fbaid,
					    $value->transaction_date)); 
				}else{
					Session::flash('msg', "Please Select Correct File");
					return Redirect::back();  
				}   
			}        
		}else{
			Session::flash('msg', "Something went Wrong");
			return Redirect::back();    
		}
		Session::flash('msg', "Data imported successfully.");
		return Redirect::back();  

	}

}