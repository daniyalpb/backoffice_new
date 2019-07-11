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
class MarketingCampaignController extends Controller
{
	public function loadcampaign($referercode)
	{
		$data = DB::select("call getallmarketingcampaign_validatereferercode('$referercode')");
		$campignimagedata = DB::select("call campaign_description_image_view()");
		$campignurldata = DB::select("call campaign_description_url_view()");
		$campignpdfdata = DB::select("call campaign_description_pdf_view()");
		$campignhtmldata = DB::select("call campaign_description_html_view()");

		if($data[0]->Status=="1"){		 	
			return view('marketing-campaign',['query'=>$data,'campignimagedata'=>$campignimagedata,'campignurldata'=>$campignurldata,'campignpdfdata'=>$campignpdfdata,'campignhtmldata'=>$campignhtmldata]);	
		}
		else{		 	
			return view('invalidrequest');
		}		 		 
		
	}	
	public function campaign_discription(){
		$datacampign = DB::select("call campaign_description_view()");
		return view('marketing_campaign_data',['datacampign'=>$datacampign]);

	}
}

