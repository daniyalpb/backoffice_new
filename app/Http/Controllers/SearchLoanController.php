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
class SearchLoanController extends CallApiController
{
	public function SearchLoan()
	{
		return view('SearchLoan');
	}
	public function SearchLoancallapi(Request $req)
	{
		//print_r($req[1]['value']);exit();		
		try{
			//print_r($req->txtsearch);
   	$data=array("searchText"=>$req->txtsearch,"empCode"=>"RB40000068","pgNo"=>"1"); 
   	 $post_data=json_encode($data);
   	 //print_r($post_data); exit();
	      	    $result=$this->call_json_data_api('http://services.rupeeboss.com/LoginDtls.svc/xmlservice/dsplySearchResult',$post_data);
	            $http_result=$result['http_result'];
	            $error=$result['error'];
	            $st=str_replace('"{', "{", $http_result);
	            $s=str_replace('}"', "}", $st);
	            $m=$s=str_replace('\\', "", $s);
	            $update_user='';
	            $obj = json_decode($m);
	            //print_r($m); exit();      
	            //print_r($obj);      
               if($obj->status =='success'){
                    	return json_encode(["data"=>$obj->result]);
                    }else{
                    	//$arr = new array();
                     	return json_encode(["data"=>[]]);
                    }
	            //print_r($obj); exit();
                    
	}
	catch (Exception $e){
        return $e;    
     } 
	}

}