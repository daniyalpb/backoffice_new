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

class ViewSyncContactSmsLogController extends Controller
{
    public function ViewSyncContactSmsLog(){
    	$getdata = DB::select('call View_SyncLeadDataSendSms_Log');
    	return view('ViewSyncContactSmsLog',['getdata'=>$getdata]);
    }
}
