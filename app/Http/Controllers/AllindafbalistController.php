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
class AllindafbalistController extends CallApiController
{
	public function getallindafbalit()
	{
		return view('Allindiafbalist');
	}
	public function getallindafbalist(Request $req)
	{
		//print_r($req->all());exit();
		$data= DB::select("call All_india_fbalist(?,?,?,?,?)",[$req->startdate,$req->enddate,$req->zone,$req->state,$req->city]);
		print_r($data);exit();
	}

}
