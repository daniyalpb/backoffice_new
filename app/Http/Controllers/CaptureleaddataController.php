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
class CaptureleaddataController extends Controller
{
  public function getleaddata()
  {
    return view('Captureleaddata');
  }
  public function importleaddata(Request $req)
  {
  	$req->validate([
            'import_file' => 'required'
        ]);
 
        $path = $req->file('import_file')->getRealPath();
        $data = Excel::load($path)->get();
        
       // print_r($data);exit();
        if(!empty($data)){
        	$fbaid=Session::get('fbaid');
            foreach ($data as $key => $value) { 
            if (($value->mobile!='')&&isset($value->mobile)&&isset($value->full_name)&&isset($value->recruiter_uid)){                                        
DB::select('call import_lead_data(?,?,?,?,?,?,?,?,?,?,?)',array(
              $value->mobile,
              $value->full_name,
              $value->city,             
              $value->custid,
              $value->recruiter_uid,
              $value->city,
              $value->state,
              $value->zone,
              $value->pl_available,
              $value->language_skill_required,
              $fbaid)); 
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