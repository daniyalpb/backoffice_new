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
class MisdatauploadController extends Controller
{
	public function get_mid_data_view()
	{
		$data=DB::select('call check_fbaid_statid_updates_mis_rp()');
		//print_r($data);exit();
		return view('Misdataupload',['data'=>$data]);
	}
	public function uploadmisdata(Request $req)
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
			//	print_r($value->sub_vertical);exit();
				if (isset($value->entryno)&&$value->entryno!=''){                          
					DB::select('call import_mis_data(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array(
						$value->entryno,
						$value->region,
						$value->businesslockat,
						$value->inscompany,
						$value->tarrifrate,
						$value->productname,
						$value->policycategory,
						$value->bussclass,
						$value->odpremium,
						$value->premium,
						$value->addonpremium,
						$value->source,
						$value->dsaname,
						$value->inceptiondate,
						$value->nextstage,
						$value->businessgroup,
						$value->clienttype,
						$value->expr1017,
						$value->vehiclemake,
						$value->model,
						$value->entrydate,
						$value->expirydate,
						$value->noclaimbonus,
						$value->annulized_premium,
						$value->servicetax,
						$value->csno,
						$value->cs_date,
						$value->qt_no,
						$value->lastyrncb,
						$value->executive,
						$value->executive_uid,
						$value->total_od,
						$value->total_lm_dis,
						$value->nextstage_status,
						$value->online_status,
						$value->product_name,
						$value->fuel_type,
						$value->policy,
						$value->policy_with_add_on,
						$value->vertical,
						$value->process,
						$value->sub_vertical,
						$value->reporting_month,
						$value->ncb,
						$value->lastyrinscompany,
						$value->gwp,
						$value->source_1,
						$value->business_vertical,
						$value->business_sub_vertical,
						$value->policy_status,
						$value->fy_year,
						$value->state,
						$value->addon_yn,
						$value->tp_premium,
						$value->mfgyear,
						$value->tl_name,
						$value->alm_name,
						$value->lm_name,
						$value->bh_name,
						$value->rh_name,
						$value->vertical_head,
						$value->cc,
						$value->pospsource,
						$value->posp,
						$value->posp_id,
						$value->data_considration,						
						$fbaid)); 
				}else{
					Session::flash('msg', "Please Select Correct File");d
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
	public function updatestatidfbaid()
	{
		DB::select('call mis_report_data_update_fbaid_statid()');		
		return Redirect::back();
	}
}
