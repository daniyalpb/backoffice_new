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
class finmart_offline_newrequestController extends CallApiController 
{

	public function display_offline_request_new(){
     //$fbaid=Session::get('fbaid');
    $Quotes = DB::select("call usp_get_offline_quotes_new()");
    return view('offline-request-new',['Quotes'=>$Quotes]); 
	}

    public function getmotorcarrierdata(){
     //$fbaid=Session::get('fbaid');
    $Quotes= DB::select("call get_motor_carrier_data()");
    //return json_encode($Quotes);
    return view('offline-request-new',['Quotes'=>$Quotes]); 
  }


     public function gethealthdata(){
     //$fbaid=Session::get('fbaid');
     $Quotes= DB::select("call get_health_data()");
//print_r($Quotes);
    return view('offline-request-new',['Quotes'=>$Quotes]); 
  }


  public function getlifedata(){
     //$fbaid=Session::get('fbaid');
    $Quotes= DB::select("call get_life_data()");
    //return json_encode($Quotes);
    return view('offline-request-new',['Quotes'=>$Quotes]); 
  }


  // public function display_offline_motor($product_name){
  //       //print_r($req->all()); exit();
  // $Quotesmotor = DB::select("call ofline_quote_motor_data(?)",array($product_name));
  //  return json_encode($Quotesmotor);
  //    //return view('offline-request-new',['Quotesmotor'=>$Quotesmotor]); 
  // }


        
   		public function insert_offline_status(Request $req){			        	
		  //print_r($req->all()); exit();
		DB::select('call usp_update_status_details(?,?,?)',array(
	    $req->hiddenid,		
		  $req->ddltype,  
   	 	$req->statuscomment,  
));
      //  Session::flash('message', 'Record has been saved successfully');
      //return Redirect::back(); 
	      //return redirect('finmart_offline_request');
        
}

      public function new_insert_offline_status(Request $req){                
      //print_r($req->all()); exit();
    DB::select('call usp_new_update_status_details(?,?,?)',array(
      $req->hiddenid,   
      $req->ddltype,  
      $req->statuscomment,  
));
        
}


      public function new_updte_offline_amt_date(Request $req){                
      //print_r($req->all()); exit();
    DB::select('call usp_new_update_amt_date(?,?,?,?)',array(
    $req->hiddenidamt,  
    $req->Amount,
    $req->ddltype,  
    $req->convertdate, 
));
         
}


			
// Update amount and Date
		public function updte_offline_amt_date(Request $req){	
		//print_r($req->all()); exit();		        	
		DB::select('call usp_update_amt_date(?,?,?,?)',array(
		$req->hiddenidamt,	
		$req->Amount,
    $req->ddltype,  
	  $req->convertdate,  
   	 	  
));

	  //return redirect('finmart_offline_request');
}
public function newinsertoflinedoc(Request $req){ 

	//print_r($req->all());exit();
        foreach($_FILES as $doc_name =>  $value_array){
          if(!empty($value_array['name'])){
            $doc_path = $this->fileupload_fn($req->file($doc_name));
             $dname = DB::select("call get_document_name()"); 
            DB::select('call usp_update_doc_path(?,?,?)',array($req->hidedenquote,$doc_path,$doc_name));
          } 
        }

        Session::flash('message','Document Uploded successfully');
   			return redirect('offline-request-new');
}


      public function fileupload_fn($image){
         // print_r($image);
        // print_r($_FILES);
        // exit;
  
            $declva='';
            if($image!=''){
            $name = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('upload/offlinedocs/'); //->save image folder 
            $image->move($destinationPath, $name);
            $declva=$name;
           }else
           {
              $declva='0';
           } 
             
             return $declva;
  }

 //public function getdocoffline($id,$type){
    public function getdocofflinenew($id){ 
      $Response_array = [];
    //print_r($req->all()); exit();  
     $viewimg= DB::select('call get_offline_doc_new_two(?)',array($id));
//print_r($viewimg);exit();

 foreach($viewimg as $val ){
    $Response_array[$val -> PkId][$val -> Doc_type] = $val -> document_path;
    $Response_array[$val -> PkId]['Type'] = $val -> Type;
  }
  
    //return json_encode($Response_array);
     return json_encode($viewimg);
}


        public function getcurrentstatus($PkId){
           //print_r($PkId); exit();
            $data=[];
          $data= DB::select('call get_offline_current_status(?)',array($PkId));
          return json_encode($data);
           //return view('offline-request-new',['data'=>$data]); 
        }



    public function getnewcurrentstatus($PkId){
           //print_r($PkId); exit();
          $data=[];
          $data= DB::select('call get_offline_status_new(?)',array($PkId));
          return json_encode($data);
           //return view('offline-request-new',['data'=>$data]); 
        }




    public function getdocofflineonenew($id){ 
      $Response_array = [];
    //print_r($req->all()); exit(); 
    // $viewimgone= DB::select('call get_offline_doc_one (?)',array($id)); 
     $viewimgone= DB::select('call get_offline_doc_one_new (?)',array($id)); 

     
     
//print_r($viewimgone);exit();

foreach($viewimgone as $val ){
    $Response_array[$val -> PkId][$val -> Doc_type] = $val -> document_path;
    $Response_array[$val -> PkId]['Type'] = $val -> Type;
  }

  return json_encode($Response_array);
}


        public function getnnewquotediscription($PkId){ 
        //print_r($PkId); exit();
        //$quotedisc= DB::select('call get_quote_description(?)',array($PkId));
           $quotedisc= DB::select('call Discription_new_offline(?)',array($PkId));
           //print_r($quotedisc); exit();
         return json_encode($quotedisc);
           return view('offline-request-new',['data'=>$data]); 
        }

     public function getquotediscriptionnew($PkId,$product_name){
              //echo $PkId; 
              //echo $product_name; exit();
        $quotedisc= DB::select('call get_quote_description_new(?,?)',array($PkId,$product_name));
         return json_encode($quotedisc);
           //return view('offline-request-new',['data'=>$data]); 
        }


     public function insert_offline_remark(Request $req){

    //print_r($req->all()); exit();
   DB::select('call usp_update_offline_remark(?,?,?)',array(
      $req->hiddenidremark,   
      $req->rmkupdte,
      session::get('fbaid'),  
      
));
    
       //return redirect('finmart_offline_request');
        
}


            public function getofflineremark($quote_request_id){
            //print_r($quote_request_id);exit();
            //$data=[];
          $data= DB::select('call get_offline_remark(?)',array($quote_request_id));
          return json_encode($data);
           //return view('offline-request-new',['data'=>$data]); 
        }
}