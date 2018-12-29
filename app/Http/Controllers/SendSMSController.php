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
use api_url;
class SendSMSController extends InitialController{
public function sendsmsren(){
$state = DB::select("call usp_load_state_list()");
  echo json_encode($state);
 }
public function sendsmscity(Request $req){
   //print_r($req->all());exit();
$city = DB::select('call usp_city_master("'.$req["state"].'")');
  return $city;

  
 }  
public function ViewSendSMSDetails(Request $req){           
  try{
  $SMSTemplate=DB::table('SMSTemplate')->get();                    
   if(isset($req->ID)){
  $query=DB::select('call sp_fba_sentSMS(?,?,?,?)',[0,0,0,0]);
 return response()->json(array('sms_data' =>$query));
  } 
  if(isset($req->ID)){ 
  $query=DB::select('call sp_fba_sentSMS(?,?,?,?)',[2,$req->FBAID,0,0]);
  return response()->json(array('sms_data' =>$query));
  } 
  if(isset($req->city)){ 
  $query=DB::select('call sp_fba_sentSMS(?,?,?,?)',[1,$req->city,0,0]);
   return response()->json(array('sms_data' =>$query));
  } 

  if(isset($req->state)){ 
  $query=DB::select('call sp_fba_sentSMS(?,?,?,?)',[3,$req->state,0,0]);
 // print_r($query);exit();
   return response()->json(array('sms_data' =>$query));
  } 

  if(isset($req->fDate) && isset($req->tDate)  ){
  $query=DB::select('call sp_fba_sentSMS(?,?,?,?)',[2,0,$req->fDate,$req->tDate]);
  return response()->json(array('sms_data' =>$query));
 } 
 if(isset($req->smstemplate_id)){
foreach ($SMSTemplate as $key => $value) {
 if($value->SMSTemplateId==$req->smstemplate_id){
 return $value->Template;
 break;
}
} 
}               
  return view('dashboard/send-sms',['SMSTemplate'=>$SMSTemplate]);
}catch (Exception $e){
return 0;               
}  
}
 public function getfbalist(Request $req){
//print_r(count($req->city));
if(isset($req->city) && count($req->city)>0){
$city = implode($req->city,',');
}
else{ 
$city = '';
}
if(isset($req->state) && count($req->state)>0){
$state = implode($req->state,',');
}
else{ 
$state = '';
}
//print_r($city);exit();
if(isset($req->state)){ $state = implode($req->state,',');}else{ $state = null;}
if(isset($req->fdate)){$fdate = $req->fdate;}else{$fdate='';}
if(isset($req->todate)){$tdate = $req->todate;}else{$tdate = '';}
$query=DB::select('call smsdata(?,?,?,?,?)',[$req->smslist,$city,$state,$fdate,$tdate]);
//print_r([$req->smslist,$,$state,$fdate,$tdate]);
return json_encode($query);
}

//public function getfbalist(Request $req){
// if(isset($req->city_name)){ $city = $req->city_name;}else{ $city = '';}
// if(isset($req->fdate)){$fdate = $req->fdate;}else{$fdate='';}
// if(isset($req->todate)){$tdate = $req->todate;}else{$tdate = '';}
// $query=DB::select('call sp_fba_sentSMS(?,?,?,?)',[$req->smslist,$city,$fdate,$tdate]);
// return json_encode($query);
// }
 public function send_sms_save(Request $req){  
   //   $parentgroupid=uniqid();
   //    $error='';
   //    $url=$this::$api_url;
   //    $fbauserid=Session::get('fbauserid');

   // $fid = "";
  




 
    if(isset($req->fba))
 

        $arc=array_chunk($req->fba,50);
        foreach ($arc as $key => $value) {

              
           $this->chankfba( $value,$req->sms_text);
        }

//   $isdirectsend=1;//DB::select('call get_isdirectsned(?)',[$fbauserid]);

//   for ($i=1; $i <= count($req->fba); $i++) { 

//    if($i%50==0){
//       $uniqid=uniqid(); //$this->call_json($url.'/api/send-sms',$data);        
//         $fid=$fid.','.$req->fba[$i-1];
//         $fid = ltrim($fid, ',');
//            $j=$i;
//          $query=DB::select('call usp_insert_smslog(?,?,?,?,?,?)',[$fid,$req->sms_text,$uniqid,date('Y-m-d H:i:s'),$parentgroupid,$fbauserid]);
      
//           $fid = "";
//  //        $data='{"group_id":"'.$uniqid.'"}';
//  // if($isdirectsend==1){
        
//  //    }

//       } 
//       else
//       {
//         $fid=$fid.','.$req->fba[$i-1];
//         $fid = ltrim($fid, ',');
//          $j=$i;
//       }

 


//     //   else{        
//     //     $fid=$fid.','.$req->fba[$i-1];




        
//     // }


//   }


// //9967202591
 


// $fid1 = "";
 
//   for ($k=$j;$k<=count($req->fba);$k++) {
   
 
//         $uniqid=uniqid(); //$this->call_json($url.'/api/send-sms',$data);        
        
//         $fid1=$fid1.','.$req->fba[$k-1];
        
//         $fid1 = ltrim($fid1, ',');
       
        
    

// }

// if($j<count($req->fba)){
       
 
//          $query=DB::select('call usp_insert_smslog(?,?,?,?,?,?)',[$fid1,$req->sms_text,$uniqid,date('Y-m-d H:i:s'),$parentgroupid,$fbauserid]);
//  }


 

 
    
 
 //  if($fid!=""){
 //    $uniqid=uniqid();
 //    $fid = ltrim($fid, ',');
 //    $query=DB::select('call usp_insert_smslog(?,?,?,?,?,?)',[$fid,$req->sms_text,$uniqid,date('Y-m-d H:i:s'),$parentgroupid,$fbauserid]);  
 //     $data='{"group_id":"'.$uniqid.'"}';
 // if($isdirectsend==1){
 //    //$this->call_json($url.'/api/send-sms',$data);
 //  }
 //  }
           
           Session::flash('msg', "message  successfully send...");;
           return Redirect::back();
                

    }



    public function chankfba($value,$sms_text){

             $fid1=implode(',', $value);
 //print_r($fid1);exit();
             $uniqid=uniqid();
             $fbauserid=Session::get('fbauserid');

             $query=DB::select('call usp_insert_smslog(?,?,?,?,?,?)',[$fid1,$sms_text,$uniqid,date('Y-m-d H:i:s'),$uniqid,$fbauserid]);
//print_r($query);exit();

             
    }
 
 public function sentsms($mob,$text,$fba_id,$SMSTemplateId){
 $arr=array('fbaid'=>$fba_id,'mobileno'=>$mob,'message'=>$text,'
 create_date'=>date('Y-m-d H:i:s') );
  DB::table('SMSLog')->insert($arr);
  }
  // public function getsmscity($id)
  // {
  // $cities = DB::table("city_master")
  //->where("stateid",$id)
  ////  ->orderBy('cityname', 'asc')
  //->pluck("cityname","cityname")
  //return json_encode($cities);
  //}
   public function sendsmsrea ()
   {
  $state = DB::select("call usp_load_state_list()");
  return view('dashboard.send-sms',['state'=>$state]);
  }
  public function call_json($url,$data){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_VERBOSE, 1);
  curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json','token:1234567890'));
  curl_setopt($ch, CURLOPT_URL, $url);curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_FAILONERROR, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
 $http_result = curl_exec($ch);
  $error = curl_error($ch);
  $http_code = curl_getinfo($ch ,CURLINFO_HTTP_CODE);
  curl_close($ch);
  $result=array('http_result' =>$http_result ,'error'=>$error );
  return $result;
  }

 
    

    function get_sms_senderlist(){
              
              //$query=DB::table('SMSLog')->whereNull('issent')->get();

               //$query=DB::table('SMSLog')->where('issent','=','9920298619')->get();

     
           //   print_r( $query);
    

        return  1;

    }

public function getpaymentdonefba()
{
  $query=DB::select('call payment_done_fba_data()');
//print_r([$req->smslist,$,$state,$fdate,$tdate]);
      return json_encode($query);

}


  }


