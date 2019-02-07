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
   class newfbaController extends CallApiController {

          public function nonfbalist(){
             $fbaid=Session::get('fbaid');

          $query = DB::select("call new_fba_fbaList($fbaid)"); 
             //return view('dashboard.non_fba_list',["data"=>$query]);    
           return json_encode(["data"=>$query]);

        }

          public function getnonfba(){
          // page load
          return view('dashboard.non_fba_list');
        }

              public function nonfbaexportexcel(){
              $query=[];
              $query=DB::select('call fbaList_export(0)');
              $data = json_decode( json_encode($query), true) ;
              return Excel::create('Fbalist', function($excel) use ($data) {
              $excel->sheet('mySheet', function($sheet) use ($data)
          {
              $sheet->fromArray($data);
          });
              })->download('xls');

}

           
           public function update_fba_list($fbaid){
                 //$fbid=Session::get('fbaid');
                 //print_r($pwd);exit();
                //echo "call update_new_fba_fbaList($fbaid)";
                 $subfba = DB::select("call parrent_fba_data($fbaid)");
                 $update = DB::select("call update_new_fba_fbaList($fbaid)");
                if(count($update) > 0){
                      return view('dashboard.update-fba-list',['data'=>$update[0],'subfba'=>$subfba]);
                    }
           else{

        $update[0] = (object) array('fbaid' => '','FullName' => '','MobiNumb1' => '','EMaiID' => '','City' => '','Zone' => '','pospname' => '','pwd' => '','Pincode' => '','POSPNo' => '' ,'pospstatus' => '','bankaccount' => '','Refcode' => '','Refbycode' => '','salescode' => '','CustID' => '','Type' => '','erpid' => '','AppSource' => '','statename' => '','RRM' => '','Field_Manger' => '');

 // print_r($update);
  //exit;
}
         return view('dashboard.update-fba-list',['data'=>$update[0]]);

        }

          public function UpdatePospnonew($id)
{
   try{
    $data= array("FBAID"=>"$id");
    $token=array("cache-control: no-cache","content-type: application/json", "token: 1234567890");

     $post_data=json_encode($data);
     
     $type=$token;
     $result=$this->call_other_data_api($this::$api_url.'/api/backoffice-posp-registration',$post_data,$type);
     $pospno=$result['http_result']; 
     $pospno_new= $pospno;
     

     return $pospno;
     
}
  catch (Exception $e){

       
   }        
         
}


 
    public function update_type(Request $req){ 

    $FBAID = $req->txtfbaid; 
    $fba_type = $req->ddltype;
    $types = array("1"=>"FBA","2"=>"POSP");
   DB::select('call usp_update_type(?,?)',array($req->txtfbaid,
    $req->ddltype));
    $arr = array("field"=>"bind_updated_type_$FBAID","show_field_data"=>$types[$fba_type],"alert_msg"=>"FBA Type Updated Successfully");

      echo json_encode($arr);
}

public function uploadpaygrid(Request $req){  
  $fbauser=Session::get('fbauserid');
  $filepaymentgrid=$this->fileupload_fn($req->file('filepaymentgrid'));
  if (isset($req->txtolddoc)){    
    DB::select('call payment_grid_update(?,?,?,?)',array(
              $req->txtpayfbaid,
              $filepaymentgrid,
              $fbauser,
              $req->txtolddoc));
    Session::flash('message', 'Payment Grid Has Been updated Successfully');
    return Redirect('load-update-fba-list/'.$req->txtpayfbaid);    
  }else{      
    DB::select('call payment_grid_insert(?,?,?)',array(
              $req->txtpayfbaid,
              $filepaymentgrid,
              $fbauser));
    Session::flash('message', 'Payment Grid Has Been Uploaded Successfully');
    return Redirect('load-update-fba-list/'.$req->txtpayfbaid);
  }
}

public  function fileupload_fn($image)
  {
    $declva='';
    if($image!=''){
      $name = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('upload/paygrid/'); //->save image folder 
            $image->move($destinationPath, $name);
            $declva=$name;
          }else
          {
            $declva='0';
          } 

          return $declva;
  }
  public function getpaygriddoc($fbaid){    
    $data = DB::select("call payment_grid_doc_path($fbaid)"); 
    return json_encode($data);
  }
}




