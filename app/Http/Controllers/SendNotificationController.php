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

class SendNotificationController extends Controller
{
public function Sendnotification(){
  $state = DB::select("call usp_load_state_list()");
  return view('dashboard.send-notification',['state'=>$state]);
 }
public function SendnotificationApprove(){ 
$query=DB::select("call usp_load_fba_Notification()");
return view ('dashboard.send-notification-approve',['query'=>$query]);
}
public function approvenotification($msgid,$value){
DB::select("call sp_notification_update($msgid,$value)");
}
public function notificationApprove(){ 
$query=DB::select("call usp_load_notification()");
return view ('dashboard.approve-notification',['query'=>$query]);
}
public function sendnotificationsubmit(Request $req){
   $upload_folder='upload/notification/';
   $newsms = urlencode($req->sms);
   $image = $req->file('notify_image');
   $name = time().'.'.$image->getClientOriginalName();
   $destinationPath = public_path($upload_folder); //->save image folder 
   $image->move($destinationPath, $name); 
   $name=$upload_folder.$name;
   //print_r($name);exit();
   $fbaid=Session::get('fbaid');
   $msgid=DB::select('call sp_insert_notifications(?,?,?,?,?,?,?)',array(
   $req->notificationtitle,
   $req->txtmessage,
   $name,
   $req->LeadType,
   $req->weburl,
   $req->webtitle,
   $fbaid));    
     if ($msgid){
       return Response::json(array('data' => true,));
      }else{
       return Response::json(array('data' => false,));
      }
    }
 public function getcity($id)
  {
  $cities = DB::table("city_master")
  ->where("stateid",$id)
  ->orderBy('city_master.cityname', 'asc')
  ->pluck("cityname","city_id");
    return json_encode($cities);
  }
   public function getfba($flag,$value)
  {
   $fbalist = DB::select("call usp_loadnotificationfba($flag,$value)");
   return json_encode($fbalist);
  }
  public function getnotifymaster(){
    $notifydata= DB::select("call notification_master_data()");
   // print_r($noifydata);exit();
    return view('dashboard.NotificationMaster',['notifydata'=>$notifydata]);
  }
   public function getnotifydata($id){
    $noifydata=DB::select("call edit_notification_data($id)");
    return json_encode($noifydata);
  }
  public function updatenotify(Request $req){
    //print_r($req->all());exit();   
   // print_r($file);exit();
    $filenotify=$this->fileupload_fn($req->file('txtfile'));
    $fbaid=Session::get('fbaid');
    DB::select('call update_notification_data(?,?,?,?,?,?,?,?)',array(
   $req->txtnotifybody,
   $req->txtnotifytitle,
   $filenotify,
   $req->ddlnotifytype,
   $req->txtweburl,
   $req->txtwebTitle,
   $req->notifyid,
   $fbaid));
    //print_r($filenotify);exit();
    return Redirect('notification-master');
  }
  public  function fileupload_fn($image){           
            if($image!=''){
            $name = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('upload/notification/'); //->save image folder 
            $image->move($destinationPath, $name);
            $declva='upload/notification/'.$name;
           }else
           {
              $declva=0;
           }            
             return $declva;
  }
 }

  
