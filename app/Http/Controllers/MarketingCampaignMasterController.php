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
class MarketingCampaignMasterController extends Controller
{
    public function MarketingCampaignMaster(){
    	$getdata = DB::select('call Get_marketingcampaignmaster()');
    	return view('Marketing_Campaign_Master',['getdata'=>$getdata]);
    }

    public function AddMarketingCampaignMasterView(){
    	return view('Add_Marketing_Campaign_Master');
    }

    public function AddMarketingCampaignMaster(Request $req){
    	$id=Session::get('fbauserid');
    	$savedata = DB::select('call save_marketingcampaignmaster(?,?,?,?,?,?)',array($req->mtitle,
 		$req->mtype,
    	$req->ldescription,
		$req->sdescription,
		$id,
		$req->enddate));
		if(count($savedata)>0){
			Session::flash('message1', 'Record Saved Successfully.');
			return Redirect::to('Marketing-Campaign-Master');
		}else{
			Session::flash('message1', 'Record Save Failed.');
			return Redirect::to('Marketing-Campaign-Master');
		}
		
    }

    public function ViewImageMarketingCampaign(){
    	$getimg = DB::select('call Get_marketingcampaignmasterdoc()'); 
    	return view('View_Image_Marketing_Campaign',['getimg'=>$getimg]);
    }

    public function AddImageMarketingCampaign(Request $request){
	        $image = $request->file('file_upload');
	        $name = time().'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('/MarketingCampaignImage');
	        $image->move($destinationPath, $name);
	        $saveimg = DB::select('call save_marketingcampaignmasterdoc(?)',array('MarketingCampaignImage/'.$name));
	        if(count($saveimg)>0){
				Session::flash('message1', 'Doc Saved Successfully.');
				return Redirect::to('View-Image-Marketing-Campaign');
			}else{
				Session::flash('message1', 'Doc Save Failed.');
				return Redirect::to('View-Image-Marketing-Campaign');
			}
    }

    public function deletemarketingcampaignmaster($id){
    	$del = DB::delete('call delete_campaign_master(?)',array($id));
    	Session::flash('message1', 'Record Delete Successfully.');
		return Redirect::to('Marketing-Campaign-Master');
    }

    public function editmarketingcampaignmaster($id){
    	$getupdatedata = DB::select('call get_update_campaign_master(?)',array($id));
    	return view('Edit_marketing_campaign_master',['getupdatedata'=>$getupdatedata]);
    }

    public function subeditmarketingcampaignmaster(Request $req){
    	$updatedata = DB::update('call update_marketingcampaignmaster1(?,?,?,?,?,?)',array($req->eid,$req->etitle,
 			$req->etype,
    		$req->eldescription,
			$req->esdescription,
			$req->enddate));
		 	Session::flash('message1', 'Record Updated Successfully.');
		 	return Redirect::to('Marketing-Campaign-Master');
		
    }
}
