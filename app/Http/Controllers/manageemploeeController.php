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
class manageemploeeController extends CallApiController{


	public function finemployeeview(){

  return view('dashboard.finmartemployee-details');
}

	public function allemployeedata(){
		  //$query=[];
	$query=DB::select("call get_finmartemployeemaster_data()");
	 
  return view('dashboard.finmartemployee-details',['query'=>$query]);

}
 

 		public function viewmaageemployy($uid){

    $currentsource_array = array();
 		$data=DB::select("call get_employee_by_uid('$uid')");
 		$catgory=DB::select("call get_finmartemployeemaster_Category()");
    $catgoryupdtetl=DB::select("call update_Employee_Category_tl()");
    $catgoryupdtealm=DB::select("call update_Employee_Category_alm()");
    $allheadupdt=DB::select("call get_rrm_heaad()");

    $alldata=DB::select ("call manage_emp_all_data()"); 
    $digngtion=DB::select("call get_finmartemployeemaster_Designation()");     
    $role=DB::select("call get_finmartemployeemaster_roal_id()"); 
    $profilesave=DB::select("call get_finmartemployeemaster_profile()");
    $status=DB::select("call get_Employee_Status()");
    $source=DB::select ("call employee_source_mapping()");

    $state_head=DB::select("call get_profile_State_Head()");
    $zonal_head=DB::select("call get_profile_Zonal_Head()");
    $cluster_Head=DB::select("call get_profile_Cluster_Head()");

    $currentsource=DB::select ("call get_current_source('$uid')"); 

  foreach ($currentsource as $value) {
       $currentsource_array[] = $value -> Source_name;
     }

		return view('dashboard.manage-employee',['data'=>$data,'catgory'=>$catgory,'catgoryupdtetl'=>$catgoryupdtetl,'catgoryupdtealm'=>$catgoryupdtealm, 'allheadupdt'=>$allheadupdt,'alldata'=>$alldata,'digngtion'=>$digngtion,'role'=>$role,'profilesave'=>$profilesave,'status'=>$status,'source'=>$source,'state_head'=>$state_head,'zonal_head'=>$zonal_head,'cluster_Head'=>$cluster_Head,'currentsource_array'=>$currentsource_array]);
}


         public function update_emp_details(Request $req){
        
     $fbauser=Session::get('username');
      $post_array = $req->all();
      //print_r( $post_array);exit();
      //$post_array = explode(',',$post_array['esource']);exit();
 //foreach($post_array['esource'] as $esource){
    if(isset($post_array['esource'])){
 DB::select('call update_employee_campign_mapping(?,?,?,?)',array(
   $fbauser,
   $req->efbid,
   $req->euid,implode(',', $post_array['esource'])));
} 
     
//}

  DB::select('call usp_update_emp_details(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array(
		  $req->sfbaid, 
		  $req->euid,   
		  $req->efbid, 
		  $req->eroleid,
   	 	$req->ename, 
    	$req->emobile,  
    	$req->eemail,
    	$req->offclmob,
    	$req->offclemail, 
   	 	$req->eprofile,
   	 	$req->edesignation,
   	 	$req->ecatgory,   		
   		$req->estatus,
      $req->boaccess, 
      $req->pospaccess, 
      $req->paysystem,
      $req->emptype, 
      $req->emolocation,
      $req->ugropid,
      $req->joindate,
      $req->cclocation,
      $req->tlname,
      $req->emplanguage,
      $req->secondlanguage,
      $req->clusterhead,
      $req->statehead,
      $req->zonalhead

 ));

		 return redirect('emp-details');
}


		public function addfbaemp(){
    $profileadd=DB::select("call get_finmartemployeemaster_profile()"); 
 		$catgoryadd=DB::select("call get_finmartemployeemaster_Category()");
 		$digngtionadd=DB::select("call get_finmartemployeemaster_Designation()");
 		//$roleadd=DB::select("call get_finmartemployeemaster_roal_id()"); 
 		$statusadd=DB::select("call get_Employee_Status()"); 
    $empsource=DB::select ("call employee_source_mapping");
    $catgoryupdtealmadd=DB::select("call update_Employee_Category_alm()");
    $catgoryupdtetladd=DB::select("call update_Employee_Category_tl()");
    $allhead=DB::select("call get_rrm_heaad()");

     $state_head_add=DB::select("call get_profile_State_Head()");
     $zonal_head_add=DB::select("call get_profile_Zonal_Head()");
     $cluster_Head_add=DB::select("call get_profile_Cluster_Head()");


   
return view('dashboard.add-employee',['profileadd'=>$profileadd,'catgoryadd'=>$catgoryadd,'digngtionadd'=>$digngtionadd,'statusadd'=>$statusadd,'empsource'=>$empsource,'catgoryupdtealmadd'=>$catgoryupdtealmadd,'catgoryupdtetladd'=>$catgoryupdtetladd,'allhead'=>$allhead,'state_head_add'=>$state_head_add,'zonal_head_add'=>$zonal_head_add,'cluster_Head_add'=>$cluster_Head_add]);
}

      public function getroleid($id){
      $roleid=DB::select("call usp_get_role_id('$id')");
       return json_encode($roleid);

   }

      public function getugroupid($id){
    $usgroupid=DB::select("call usp_user_group_id('$id')");
      return json_encode($usgroupid);
  }

public function new_emp_add(Request $req){
$fbauser=Session::get('username');
   $post_array = $req->all();
 if(isset($post_array['esource']))
  foreach($post_array['esource'] as $esource){
  DB::select('call insert_employee_source(?,?,?,?)',array(
    $fbauser,
    $post_array['efbid'],
    $post_array['euid'],$esource));

  }

  DB::select('call usp_insert_new_finemployee(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array(
   	 	$req->euid,  
   	 	$req->efbid,  
   	 	$req->eroleid,    
   	 	$req->ename, 
    	$req->emobile,  
    	$req->eemail,
    	$req->offclmob,
    	$req->offclemail, 
   	 	$req->eprofile,
   	 	$req->ecatgory,
   		$req->edesignation,
   		$req->estatus,
      $req->boaccess, 
      $req->pospaccess, 
      $req->paysystem, 
      $req->emolocation,
      $req->emptype,
      $req->ugropid,
      $req->joindate,
      $req->cclocation,
      $req->tlname,
      $req->emplanguage,
      $req->almname,
      $req->secondlanguage,
      $req->clusterhead,
      $req->statehead,
      $req->zonalhead
    	
));
Session::flash('message', 'Record Insert Successfully');
	  return redirect('emp-details');
}

  public function getfbadata(Request $req){ 
         $data = DB::select("call get_finemp_fba_data(?)",array($req->id));
         return response()->json($data);
   }  

  public function getuiddata(Request $req){ 
      $data = DB::select("call get_finemp_uid_data (?)",array($req->id));
 
     $uid=$this->veryfyuid("http://landmarktimes.policyboss.com/EIS/JSON_Test/Validate_UID_For_BO.php?unm=$req->id");

      if($data[0]->UId == $req->id){
        $existed_local_db_flag = "1";
      }
      else{
        $existed_local_db_flag = "0";
      }

      $response['existed_db'] = $existed_local_db_flag;
      $response['api_db'] = $uid;

      return response()->json($response);
         
   }  


   public function veryfyuid($url){
  $curl = curl_init();
  curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
 
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
  return  $err;
} else {
 return  $response;
}
}

        public function tl_category_name($EmployeeCategory){
          // $tlname = DB::select("call user_list_tl_name()");
          $tlname = DB::select("call user_list_tl_name(?)",array($EmployeeCategory) );
            echo json_encode($tlname);
      }


        public function rrm_tl_name($Profile){
          $rrmtlname = DB::select("call get_RRM_TL(?)",array($Profile) );
            echo json_encode($rrmtlname);
      }


          public function export_user_list(){
          $query=[];
          $query=DB::select('call get_finmartemployeemaster_data()');
          $data = json_decode( json_encode($query), true) ;
          return Excel::create('User-list', function($excel) use ($data) {
          $excel->sheet('User list', function($sheet) use ($data)
     {
     $sheet->fromArray($data);
      });
          })->download('xls');
    }


}






    



