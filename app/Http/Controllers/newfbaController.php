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

              //$data = json_decode( json_encode($query), true) ;
              /////////////////
              $headers = array(
        "Content-type" => "text/csv",
        "Content-Disposition" => "attachment; filename=fbalist.csv",
        "Pragma" => "no-cache",
        "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
        "Expires" => "0"
    );

    $reviews = $query ;//Reviews::getReviewExport($this->hw->healthwatchID)->get();

     $columns = array('FBAID','FullName','CreatedDate','City','State','Zone','CustID','PospStatus','RRM','FieldSales','ERPID','AppSource','POSPNo','PospName');
   // $columns = array('FBAID','FullName','createdate','statename','CustID','Zone','pospstatus','RRM_Name','Field_Sales','ERPID','AppSource','POSPNo','pospname');
    //print_r($reviews);

    $callback = function() use ($reviews, $columns)
    {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach($reviews as $review) {          
            // fputcsv($file, array($review->fbaid,
            //                      $review->FullName,
            //                      $review->createdate,
            //                      $review->statename,
            //                      $review->CustID,
            //                      $review->Zone,
            //                      $review->pospstatus,
            //                      $review->RRM_Name,
            //                      $review->Field_Sales,
            //                      $review->ERPID,
            //                      $review->AppSource,
            //                      $review->POSPNo,
            //                      $review->pospname));

           fputcsv($file, array($review->fbaid,
                                 $review->FullName,
                                 $review->createdate,
                                 $review->City,
                                 $review->statename,
                                 $review->Zone,
                               $review->CustID,
                                 
                                 $review->pospstatus,
                               $review->RRM_Name,
                               $review->Field_Sales,
                                 $review->erpid,
                               $review->AppSource,
                                 $review->POSPNo,
                                 $review->pospname
));


        }
        fclose($file);
    };
    return Response::stream($callback, 200, $headers);

    ////////////////
              /*return Excel::create('Fbalist', function($excel) use ($data) {
              $excel->sheet('mySheet', function($sheet) use ($data)
          {
              $sheet->fromArray($data);
          });
              })->download('xls');*/

}


public function export($data)
{
    $headers = array(
        "Content-type" => "text/csv",
        "Content-Disposition" => "attachment; filename=file.csv",
        "Pragma" => "no-cache",
        "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
        "Expires" => "0"
    );

    $reviews = $data ;//Reviews::getReviewExport($this->hw->healthwatchID)->get();
    $columns = array('FBAID');

    $callback = function() use ($reviews, $columns)
    {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach($reviews as $review) {
            fputcsv($file, array($review->fbaid));
        }
        fclose($file);
    };
    return Response::stream($callback, 200, $headers);
}

           
           public function update_fba_list($fbaid){
                  $loggedinfbaid=Session::get('fbaid');
                 //$fbid=Session::get('fbaid');
                 //print_r($pwd);exit();
                //echo "call update_new_fba_fbaList($fbaid)";
                  $checkexcess = DB::select("call check_ifloggedin_fba_hassearchedfba($fbaid,$loggedinfbaid)");
                if($checkexcess[0]->GiveAccess=='1'){
                        $update = DB::select("call update_new_fba_fbaList($fbaid,$loggedinfbaid)");

                       $lastbuss = DB::select("call Last_business_done_by_fba($fbaid)");
                       $calllogs = DB::select("call fba_call_logs($fbaid)"); 
                      $subfba = DB::select("call parrent_fba_data($fbaid)");
                      $Hierarchy = DB::select("call Hierarchy_profile_data($fbaid)");
                      $hierarchypr=DB::select("call get_Hierarchy_rrmuid(?)",array($fbaid));
                      $recruiter=DB::select("call get_Hierarchy_recruiteruid(?)",array($fbaid));
                      $trainingopsuid=DB::select("call get_Hierarchy_trainingopsuid(?)",array($fbaid));
                      $fieldsalesuid=DB::select("call get_Hierarchy_fieldsalesuid(?)",array($fbaid));
                      $clusterheaduid=DB::select("call get_Hierarchy_clusterheaduid(?)",array($fbaid));
                      $stateheaduid=DB::select("call get_Hierarchy_stateheaduid(?)",array($fbaid));
                      $recruitertluid=DB::select("call get_Hierarchy_recruitertluid(?)",array($fbaid));

                      $zonalheaduid=DB::select("call get_Hierarchy_zonalheaduid(?)",array($fbaid));
                      
                      $sourceupdate=DB::select ("call employee_source_mapping()");
                       $refererby_recruiter=DB::select ("call get_recruiter_refererby_code()");
                      if(count($update) > 0){
                            return view('dashboard.update-fba-list',['data'=>$update[0],'subfba'=>$subfba,'Hierarchy'=>$Hierarchy,'hierarchypr'=>$hierarchypr,'recruiter'=>$recruiter,'trainingopsuid'=>$trainingopsuid,'fieldsalesuid'=>$fieldsalesuid,'clusterheaduid'=>$clusterheaduid,'stateheaduid'=>$stateheaduid,'zonalheaduid'=>$zonalheaduid,'sourceupdate'=>$sourceupdate,'lastbuss'=>$lastbuss,'calllogs'=>$calllogs,'refererby_recruiter'=>$refererby_recruiter,'recruitertluid'=>$recruitertluid]);
                          }
                 else{

              $update[0] = (object) array('fbaid' => '','FullName' => '','MobiNumb1' => '','EMaiID' => '','City' => '','Zone' => '','pospname' => '','pwd' => '','Pincode' => '','POSPNo' => '' ,'pospstatus' => '','bankaccount' => '','Refcode' => '','Refbycode' => '','salescode' => '','CustID' => '','Type' => '','erpid' => '','AppSource' => '','statename' => '','RRM' => '','Field_Manger' => '');

       // print_r($update);
        //exit;
}
         return view('dashboard.update-fba-list',['data'=>$update[0]]);
       }
       else{
        return view('RestrictedAccess');
       }

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
       public function get_app_source($AppSource){
       // print_r($AppSource);exit();
        //echo "call get_app_source($AppSource)";
        $result=DB::select("call get_app_source($AppSource)");
            echo json_encode($result);
        //return view('dashboard.new-fba-list',['appsource'=>$appsource]); 
  
 }

          public function get_hierarchy_profile(){
          $query=[];
          $hierarchypr=DB::select("call get_fba_crm_profile()");
             return view('dashboard.update-fba-list',['hierarchypr'=>$hierarchypr]);
              }


      public function updateHierarchyprofile(Request $req){                
      //print_r($req->all()); exit();
       $fbauser=Session::get('username');
        $req_array = $req->all();
    DB::select('call profile_update_Hierarchy(?,?,?,?,?,?,?,?,?,? )',array(
      $req_array['profilehidden'],
      $req_array['rrmuid'], 
      $req_array['recruiteruid'],
      $req_array['trainingops'],
      $req_array['fieldsalesuid'],
      $req_array['clusterheaduid'],
      $req_array['stateheaduid'], 
      $req_array['zonalheaduid'], 
      $fbauser ,
      $req_array['recruitertluid']
));
        
}


        public function get_refresh_data_new($fbaid){
              $id=Session::get('fbaid');
              $refresh=DB::select("call getnewaddedfba('$id',$fbaid)");
              return json_encode($refresh);
         }



            public function get_fba_count_new($fbaid){
            $loggedinfba=Session::get('fbaid');
            $count=DB::select("call getfba_count('$loggedinfba','$fbaid')");
             // print_r($count); exit();
             return json_encode($count);
         }

          public function activeisactivefba(Request $req){  
           $FBAID = $req->hiddenactivefba; 
           $fba_type = $req->activefba;
           return $FBAID | $fba_type;
           exit();
           $types = array("1"=>"Active","0"=>"isactive");
           DB::select('call update_active_isactive_fba(?,?)',array($req->hiddenactivefba,
           $req->activefba));
           $arr = array("field"=>"bind_updated_status_$FBAID","show_field_status"=>$types[$fba_type],"alert_msg"=>"Updated Successfully");

           echo json_encode($arr);
}



          public function update_app_source(Request $req){  
          $FBAID = $req->hidedenapsourcefba; 
           //$fba_type = $req->apsource;
           DB::select('call update_fba_app_source(?,?)',array($req->hidedenapsourcefba,
           $req->apsource));

}


    public function fba_transaction_history($fbaid){ 
           $data= json_encode(array("fbaid"=>"$fbaid","pageno"=>"1"));
           $token=array("cache-control: no-cache","content-type: application/json", "token: 1234567890");

 
     $post_data=json_encode($data);
     $type=json_encode($token);
     $type=$token;
     $result=$this->call_other_data_api($this::$api_url.'/api/get-transaction-history',$data,$type);
     $Response=$result['http_result'];
//print_r($Response);exit();
$resdata=json_decode($Response);
//print_r($resdata->MasterData[0]->EntryNo);exit();
     //return $Response;
     return view('fba_transaction_history',['Response'=>$resdata->MasterData]);
    }

   public function updte_refer_by_code(Request $req){
              $msg='';
           //print_r($req->all()); exit();  
           $data=DB::select('call referer_code_update(?,?)',array($req->fbaid,
           $req->txtRefererby));

          if (isset($data[0]->Message)){
              $msg=$data[0]->Message;
          }else{
             $msg='';

          }
          return $msg;
      }
        public function update_alternate_mobile(Request $req){
           //print_r($req->all()); exit();  
           $data=DB::select('call contact_number_two_update(?,?)',array($req->fbaid,
           $req->mobiletwo));

      }

}




