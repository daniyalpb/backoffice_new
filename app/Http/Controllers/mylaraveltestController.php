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
class mylaraveltestController extends CallApiController{
	public function droup_down_with_checkbox(){
		return view('my_laravel_test');
	}
}