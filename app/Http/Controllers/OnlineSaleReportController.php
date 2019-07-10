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

class OnlineSaleReportController extends Controller
{
    public function onlinesalereport(){
    	$fba_id=Session::get('fbaid');
    	$getproduct = DB::select('call get_product_online_sale_report()');
    	$getfba = DB::select('call Get_Fba_Online_Sale_Report(?)',array($fba_id));
    	return view('OnlineSaleReports',['getproduct'=>$getproduct,'getfba'=>$getfba]);
    }

    public function saveonlinesalereport(Request $req){
        $fba_id=Session::get('fbaid');
    	$SaveData = DB::select('call Save_Online_Sales_Reports(?,?,?,?,?,?,?,?)',array($req->saledate,
    		$req->crnno,
    		$req->csno,
    		$req->product,
			$req->fbaid,
            $fba_id,
			$req->pstatus,
			$req->ticketno));
	    	if($SaveData[0]->id > 0){
				Session::flash('message1', 'Record Saved Successfully.');
				return Redirect::to('online-sale-report');
			}else{
				Session::flash('message1', 'Record Save Failed.');
				return Redirect::to('online-sale-report');
			}
    }

    public function viewonlinesalereport(){
        $fba_id=Session::get('fbaid');
    	$getdata = DB::select('call Get_Online_Sale_Reports(?)',array($fba_id));
    	return view('ViewOnlineSaleReports',['getdata'=>$getdata]);
    }

    public function deleteonlinesalereport($id){
    	$del = DB::update('call Delete_Online_Sale_Reports(?)',array($id));
    	Session::flash('message1', 'Record Delete Successfully.');
		return Redirect::to('view-online-sale-report');
    }

    public function editonlinesalereport(Request $req){
    	$GetDataUpdate = DB::select('call Get_Update_Online_Sale_Report(?)',array($req->id));
    	return $GetDataUpdate;
    }

    public function editsaveonlinesalereport(Request $req){
    	$udata = DB::select('call Update_Online_Sale_Report(?,?)',array($req->pid,$req->ucsno));
    	Session::flash('message1', 'Record Update Successfully.');
		return Redirect::to('view-online-sale-report');
    }

    public function exportonlinesalesreports(){
        $fba_id=Session::get('fbaid');
        $query=[];
        $query=DB::select('call Get_Online_Sale_Reports(?)',array($fba_id));
        $data = json_decode( json_encode($query), true);
        return Excel::create('OnlineSalesReports', function($excel) use ($data) {
            $excel->sheet('OnlineSalesReportsData', function($sheet) use ($data){
                $sheet->fromArray($data);
            });
        })->download('xls');
    }

    public function checkcrnonlinesalesreports(Request $req){
        $chkcrn = DB::select('call check_crnno_online_sales_reports(?)',array($req->crnno));
        return $chkcrn;
    }

    public function checkcsonlinesalesreports(Request $req){
        $csno = DB::select('call check_csno_online_sales_reports(?)',array($req->csno));
        return $csno;
    }
}
