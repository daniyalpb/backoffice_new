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
class Crm_lead_history_exportController extends CallApiController
{ 
  public function getleaddata()
  {
  	  $crmdata = DB::select('call export_lead_calling_history()');  
  	  return view('Crm_lead_export',['crmdata'=>$crmdata]);
  	
  }
  public function exportcrmleadcallig(){	
		$query=DB::select("call export_lead_calling_history()");
		$data = json_decode( json_encode($query), true);
		return Excel::create('Crm_lead_calling_data', function($excel) use ($data){
			$excel->sheet('Crm_lead_calling_data', function($sheet) use ($data){
				$sheet->fromArray($data);
			});
		})->download('xls');
	}
}