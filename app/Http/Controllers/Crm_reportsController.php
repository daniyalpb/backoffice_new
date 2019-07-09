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
class Crm_reportsController extends CallApiController
{
	public function getcrmreport()
	{
		
            return view('Crm_report');     
	}
	public function crm_report($fromdate,$todate)
	{        
           $crmrpdata = DB::select('call Crm_report_details(?,?)',[$fromdate,$todate]);   
           //print_r($crmrpdata); exit();
           return json_encode($crmrpdata);
	}
	public function getcrminteraction($uid,$fdate,$tdate){
		
		 $crmdata = DB::select('call crm_interactions_details(?,?,?)',[$uid,$fdate,$tdate]);
		 if (!empty($crmdata)) {
		 	return view('Crm_interaction',['crmdata'=>$crmdata]);
		 }
		return Redirect::back()->withErrors(['msg', 'No Data Found']); 
	}
	/*public function exportexcel($uid,$fdate,$tdate){
		 $query=[];
		 $query = DB::select('call crm_interactions_details(?,?,?)',[$uid,$fdate,$tdate]);
              //$query=DB::select('call fbaList_export()');
		$data = json_decode( json_encode($query), true);
		return Excel::create('Crm_interaction', function($excel) use ($data) {
			$excel->sheet('Crm_interaction', function($sheet) use ($data)
			{

				$sheet->fromArray($data);
			});
		})->download('xls');
	}*/
	public function exportcrm(Request $req){	
		$query=DB::select("call export_crm_calling_data('$req->txtfromdate','$req->txttodate')");
		$data = json_decode( json_encode($query), true);
		return Excel::create('Crm_calling_data', function($excel) use ($data){
			$excel->sheet('Crm_calling_data', function($sheet) use ($data){
				$sheet->fromArray($data);
			});
		})->download('xls');
	}
	public function exportcrmall(Request $req){	
		$query=DB::select("call export_crm_calling_data_all('$req->txtfromdate','$req->txttodate')");
		$data = json_decode( json_encode($query), true);
		return Excel::create('Crm_calling_data', function($excel) use ($data){
			$excel->sheet('Crm_calling_data', function($sheet) use ($data){
				$sheet->fromArray($data);
			});
		})->download('xls');
	}
}