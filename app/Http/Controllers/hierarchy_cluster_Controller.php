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
class hierarchy_cluster_Controller extends CallApiController{


   public function cluster_hierarchy_view(Request $req){
   	  //$id=Session::get('FBAUserId');
   	  // print_r($id);exit();
   	//print_r($req->aell());exit();

   	  	  $alldata=[];
   	  	  $fieldsdata=[];
          $data=[];
          $fielddata=[];
          $statedata=[];
		$alldata=DB::select('call get_hierarchy_rrm_clusterhead(?)',array(Session::get('UId')));
		  //print_r($alldata);exit();
		$fieldsdata=DB::select('call get_hierarchy_rrm_fieldsales(?)',array(Session::get('UId')));
		$data= DB::select('call get_rrm_count_hierarchy(?)',array(Session::get('UId')));
    $fielddata= DB::select('call get_hierarchy_fieldsalesuid_count(?)',array(Session::get('UId')));
    $statedata= DB::select('call get_hierarchy_stateheaduid_count(?)',array(Session::get('UId')));
  	$allstatedata= DB::select('call get_hierarchy_cluster_state_head_data(?)',array(Session::get('UId')));

    return view('hierarchy_cluster',['data'=>$data,'fielddata'=>$fielddata,'alldata'=>$alldata,'fieldsdata'=>$fieldsdata,'statedata'=>$statedata,'allstatedata'=>$allstatedata]); 
          
        }



         	public function get_fba_details($uid){
         		//print_r($rrmuid);exit();
	      // print_r($req->all());exit()
			 $data= DB::select('call get_hierarchy_cluster_fba_data(?)',array($uid));
       return view('hierarchy_cluster_rrm_data',['data'=>$data]); 
        }

    // public function fieldsales_fba($uid){
    //    $fieldfbadata= DB::select('call get_hierarchy_fieldsales_fba_data(?)',array($uid));
    //       return json_encode($fieldfbadata);
    //        //return view('hierarchy_cluster_rrm_data',['fieldfbadata'=>$fieldfbadata]); 
    //     }


}

















