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
class allsalesreportController extends CallApiController{


	public function allreport(){
		$sreport=DB::select("call getAllSalesReport('31-01-2017','31-01-2020')");
		return view('all-sales-report',['sreport'=>$sreport]);     
	}

	public function salesreportfdateldate($startdate,$enddate){
				//print_r($fdate);exit();
		$fdate = $startdate;
		$tdate = $enddate;
		 		 //$fdate = str_replace('-', '/',$startdate);
		 		 //$tdate = str_replace('-', '/',$enddate);
		$sreport=DB::select("call getAllSalesReport('$fdate','$tdate')");
		return $sreport;
		
	}

	public function salesreportlone($startdate,$enddate){
				//print_r($fdate);exit();
		$fdate = $startdate;
		$tdate = $enddate;
		 		//$fdate = str_replace('-', '/',$startdate);
		 		//$tdate = str_replace('-', '/',$enddate);
		$sreport=DB::select("call  getAllSalesReportLoan('$fdate','$tdate')");
		return $sreport;
		
	}


	
	public function allMISreport(){
		$misreport=DB::select("call getAllBusinessMISReport('31-01-2017','31-01-2020')");
		return view('all-mis-report',['misreport'=>$misreport]);     
	}

	public function misreportfdateldate($startdate,$enddate){
				// print_r($startdate);exit();
		$fdate = $startdate;
		$tdate = $enddate;

			        //$fdate = str_replace('-', '/',$startdate); 	
		 		//$tdate = str_replace('-', '/',$enddate);
		$misreport=DB::select("call getAllBusinessMISReport('$fdate','$tdate')");
		return $misreport;
		
	}

	public function creditcardreport($startdate,$enddate){
				//print_r($fdate);exit();
		$fdate = $startdate;
		$tdate = $enddate;
		 		// $fdate = str_replace('-', '/',$startdate);
		 		// $tdate = str_replace('-', '/',$enddate);
		$ccreport=DB::select("call  getAllSalesReportCreditCard('$fdate','$tdate')");
		return $ccreport;
		
	}



//shubham
	public function getview(){
		$profile=DB::select("call profile_and_roleid()");
		return view('all-mis-report-with-filter',['profile'=>$profile]);     
	}
	public function misreportfdateldate1($startdate,$enddate){
				// print_r($startdate);exit();
		$fdate = $startdate;
		$tdate = $enddate;

			        //$fdate = str_replace('-', '/',$startdate); 	
		 		//$tdate = str_replace('-', '/',$enddate);
		$misreport=DB::select("call getAllBusinessMISReportwithfiltersnostate('$fdate','$tdate')");
		return $misreport;

	}
	public function misreportfdateldatestate($startdate,$enddate,$state){
				 //print_r($state);exit();
		$fdate = $startdate;
		$tdate = $enddate;
		$misreport=DB::select("call getAllBusinessMISReportwithfilters('$fdate','$tdate','$state')");
		return $misreport;
		print_r($misreport);exit();

	}

	public function getdataonprofile(Request $req){
		$data=DB::select("call mis_rep_by_emp('$req->Uids','$req->startdate','$req->enddate')");
		return json_encode($data);
	}





}