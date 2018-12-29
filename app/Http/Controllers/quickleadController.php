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
class quickleadController extends CallApiController
{
          public function showlead (){

            $fbascity = DB::select('call getquick_city_state(0,0)'); 
            $userfb=DB::select("call get_fba_fbauser()"); 

          return view('quick_lead_assignment',['fbascity'=>$fbascity,'userfb'=>$userfb]);
 }

          public function quicklead(){
          $state = DB::select("call usp_load_state_list()");
          echo json_encode($state);
 }

          public function quickleadcity(Request $req){
          $city = DB::select('call usp_city_master(?)',array($req->state));
          return $city;
 }  

          public function statecityfba (Request $req){

         $fbascity = DB::select('call getquick_city_state(?,?)',[implode(',',$req->state),implode(',',$req->city)]);

       // $userfb=DB::select("call get_fba_fbauser()"); 
 
    return json_encode($fbascity);
 
        //  return view ('quick_lead_assignment',['fbascity'=>$fbascity,'userfb'=>$userfb]);
 }

      public function Insertquicklead(Request $req){

               $id=Session::get('fbauserid');
               $fbatotal = explode(",",  $req->txtfid);
                $fid = "";
               for ($i=1; $i < count($fbatotal)+1; $i++) { 
                    if($i%50==0){              
                         $fid=$fid.','.$fbatotal[$i-1];
                         $fid = ltrim($fid, ',');
                         // print_r("8**************");
                         // print_r($fid);
                           DB::statement('call sp_quickleaduserfbamapping(?,?,?)',array(
                               $fid,
                               $req->ddlstatus,              
                               $id
                           ));
                         $fid = "";
                    }
                    else{        
                         $fid=$fid.','.$fbatotal[$i-1];
                    }
               }

               if($fid!=""){    
                    $fid = ltrim($fid, ',');
                    //print_r("----".$fid);
                     DB::statement('call sp_quickleaduserfbamapping(?,?,?)',array(
                               $fid,
                               $req->ddlstatus,              
                               $id
                           ));
               }
       return "successfully";   
        
  }


public function quicklead_ql()
  {
   $id=Session::get('fbauserid');
     $query = DB::select("call Usp_get_quicklead($id)");
     $status=DB::select("call Usp_get_quick_lead_status()");
     $product=DB::select("call GET_Quick_lead_product()");
     return view('QuickLead',['query'=>$query,'status'=>$status,'product'=>$product]);  
  }
  
  public function insertquickleadstatus(Request $req)
  {
  $id=Session::get('fbauserid');
  DB::statement('call Usp_insert_update_quickleadstatus(?,?,?,?)',array(
      $req->txtleadid,
           $req->ddlstatus,  
          $req->txtremark,
          $id
         )
       );

  }

  public function gethistory($leadid)
  {  
    $history = DB::select("call Usp_get_quick_lead_history($leadid)");
     return json_encode($history);
       
  }

/*public function getAssignedFBAToUserQuickLead()
  {
    $id=Session::get('fbauserid');
     $query = DB::select("call getAssignedFBAToUserQuickLead(12821)"); 
     return json_encode($query); 
  }

public function assignedfbalead()
  {    
    return view('assignedfbalead');
  }*/

  public function editlead($Leadid)
  {
    $getlead=DB::select("call GET_lead_data_to_edit($Leadid)");
    return json_encode($getlead);
  }
  public function updatelead(Request $req)
  {
    DB::statement('call Usp_update_qucik_lead(?,?,?,?,?,?,?,?,?)',array(
          $req->txtleadname,
          $req->txtemail,
          $req->txtmobileno,
          $req->txtstatus,
          $req->txtproduct,
          $req->txtMonthlyIncome,
          $req->txtRemark,        
          $req->txtLeadid,
          $req->txtloanamt
                              
         )
       );
  }

  public function assignedfbaleadnew()
  {
    $id=Session::get('fbauserid');
    $query = DB::select("call getAssignedFBAToUserQuickLead($id)"); 
    //print_r($query);exit();
    return view('assignedfbaleadnew',['query'=>$query]);
  }

  public function insertstatus(Request $req)
  {
    $id=Session::get('fbauserid');
    DB::statement('call insert_fba_assigment_lead_status(?,?,?,?)',array(
           $req->txtfbaid,
           $req->ddlstatus,  
           $req->txtremark,
           $id
         )
       );
  }

  public function gethistoryfba($fbaid)
  {
     $fbahistory = DB::select("call get_fba_assignment_history($fbaid)");
    // print_r($fbahistory);exit(); 
     return json_encode($fbahistory);
  }

 }