<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Exception;
use DB;
class PaymentHistoryController extends CallApiController
{
     

      public function payment_history(Request $req){

      	    try{
                
                if(isset($req->fdate) && isset($req->todate)){
	      	     $data=array("FromDate"=>$req->fdate,"ToDate"=>$req->todate);
	      	 }else{
                 $data=array("FromDate"=>Date('m-d-Y', strtotime("-28 days")),"ToDate"=>Date('m-d-Y'));
                
	      	 }

	      	    $post_data=json_encode($data);
	      	    $result=$this->call_json_data_api('http://mswebapi.magicsales.in/api/CommonAPI/GETPaymTrackDeta',$post_data);
	            $http_result=$result['http_result'];
	            $error=$result['error'];
	            $st=str_replace('"{', "{", $http_result);
	            $s=str_replace('}"', "}", $st);
	            $m=$s=str_replace('\\', "", $s);
	            $update_user='';
	            $obj = json_decode($m);
             if($obj->message->Status='1'){

                    	 $respon=($obj->message->lstPaymTrackDeta);
                    	 return view('dashboard/payment-history',['respon'=>$respon]);
           }                  
	}catch (Exception $e){
     
    return view('500');
   
   }


                 
      	 
      }


       public function payment_history_all(Request $req){

      	    try{
                
                
                 $data=array("FromDate"=>Date('m-d-Y', strtotime("0 days")),"ToDate"=>Date('m-d-Y'));                
	      	    $post_data=json_encode($data);
	      	    $result=$this->call_json_data_api('http://mswebapi.magicsales.in/api/CommonAPI/GETPaymTrackDeta',$post_data);
	            $http_result=$result['http_result'];
	            $error=$result['error'];
	            $st=str_replace('"{', "{", $http_result);
	            $s=str_replace('}"', "}", $st);
	            $m=$s=str_replace('\\', "", $s);
	            $update_user='';
	            $obj = json_decode($m);
             if($obj->message->Status='1'){
             	$query=DB::select("call deletetodayspaymentdata()");
                    	

                    	 $respon=($obj->message->lstPaymTrackDeta);
                    	 //print_r($respon);exit();
                    	 foreach ($respon as $key => $value) {


                    	 	$query1=DB::select("call insertpaymentdata_dc('$value->Amount',
                    	 												  '$value->City',
                    	 												  '$value->CustID',
                    	 												  '$value->CustName',
                    	 												  '$value->Email',
                    	 												  '$value->InvoStatus',
                    	 												  '$value->Mobile',
                    	 												  '$value->PaymDate',
                    	 												  '$value->PaymRefNo',
                    	 												  '$value->PaymStatus',
                    	 												  '$value->PaymType',
                    	 												  '$value->ProdName',
                    	 												  '$value->SalesID',
                    	 												  '$value->SalesName',
                    	 												  '$value->State')");
                    	 }
						$query2=DB::select("call insertpaymentdata_updatedlog()");
						return "success";

                    	 //$respon=($obj->message->lstPaymTrackDeta);

                    	 //return $respon;//view('dashboard/payment-history',['respon'=>$respon]);
           }                  
	}catch (Exception $e){
     
    return "Fialed";
   
   }


                 
      	 
      }
public function getpaymenthistorynew()
{  
  $data=DB::select("call payment_history_log()");
  return view('Payment_history',['data'=>$data]);
}
public function payment_history_DB(Request $req)
{
 $data=DB::select("call payment_history()");
 //print_r($data);exit();
 return json_encode(["data"=>$data]);
}
}
