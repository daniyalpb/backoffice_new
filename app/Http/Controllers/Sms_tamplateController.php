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
class Sms_tamplateController extends Controller
{
  public function smstemplate (){
    return view('dashboard.sms-template');
  }
  public function sms_template(Request $req){
    $user = Session::get('fbaid');
    DB::statement('call insert_sms_template(?,?,?)',array( $req->hname,$req->txtmesg,$user));
    Session::flash('message', 'SMSTemplate Add Successfully');
    return Redirect ('sms-template');
  }
  public function smstabletemplate()
  {
    $data=DB::select("call usp_getsmsdata()");
    return view('dashboard.sms-table-template',['data'=>$data]);
  }
  public function deletetabletemplate($id)
  {
    DB::delete('delete from SMSTemplate where SMSTemplateId= ?',[$id]);
    Session::flash('message', 'Record Delete Successfully');
   return Redirect('sms-table-template');
  }
  public function update_sms_table(Request $req){
    $user = Session::get('fbaid');
    DB::update("call update_sms_tbl_template(?,?,?,?)",array($req->id,$req->hname,$req->txtmesg,$user));
    Session::flash('message', 'SMSTemplate  Update Successfully');
      return Redirect('sms-table-template');
  }




  public function smstemplatemodel($id){
    $data=DB::select("call gte_smstemplateid($id)");
      return json_encode($data);
  }

  public function mailtemplate(){
    return view('dashboard.mail-template');
  }

  public function mail_template(Request $req){
    $user = Session::get('fbaid');
    DB::insert('call insert_mail_template(?,?,?)',array($req->mail,$req->mailmesg,$user));
    Session::flash('message', 'Mail Template Add Successfully');
    return Redirect('mail-template');
  }

   public function mailtabletemplate()
  {
    $smsdata=DB::select("call usp_getmaildata()");
    return view('dashboard.mail-table-template',['smsdata'=>$smsdata]);
  }

  public function mail_template_delete($id)
  {
    DB::delete('delete from mail_tamplate where mail_tamplate_id= ?',[$id]);
    Session::flash('message', 'Record Delete Successfully');
    return Redirect('mail-table-template');
  }

  public function update_mail_table(Request $req){
    $user = Session::get('fbaid');
    DB::update("call update_mail_tbl_template(?,?,?,?)",array($req->id,$req->mail,$req->Body,$user));
    Session::flash('message', 'Mail Template Update Successfully');
      return Redirect('mail-table-template');
 }

 public function mailtemplatemodel($id){
  $data=DB::select("call gte_mailtemplateid($id)");
  return json_encode($data);
}
}

