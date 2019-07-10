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
class vintagereportController extends Controller
{
	public function getvintagedata()
	{   
		 $data=DB::select("call reportcaller_target_by_vintage('111944')");
		 return view('vintagereport',['data'=>$data]);
	}
}