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
			class hierarchy_rrm_data_Controller extends CallApiController{

	  		public function rrm_fba_view($rrmuid){
         	$data= DB::select('call get_hierarchy_cluster_fba_data(?)',array($rrmuid));
           return view('hierarchy_cluster_rrm_data',['data'=>$data]); 
        }


    	public function fieldsales_fba_view($uid){
       $fieldfbadata= DB::select('call get_hierarchy_fieldsales_fba_data(?)',array($uid));
        //print_r( $fieldfbadata[0]);exit();
       //    return json_encode($fieldfbadata);
           return view('hierarchy_fieldsalesuid_data',['fieldfbadata'=>$fieldfbadata]); 
        }

          public function state_fba_view($uid){
          $stateheaddta= DB::select('call get_hierarchy_state_fba_data(?)',array($uid));
        return view('hierarchy_state_data',['stateheaddta'=>$stateheaddta]); 
        }


    // 	public function tree_view_model(){
    // 	return view('tree-view-test');
    // }
}