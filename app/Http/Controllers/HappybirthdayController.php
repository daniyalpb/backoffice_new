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
class HappybirthdayController extends Controller
{
	 public function getbirthday()
	{
		return view('Temp_1');
	}
	 public function getbirthday1()
	{
		return view('Temp_2');
	}
	 public function getbirthday2()
	{
		return view('Temp_3');
	}
	 public function getbirthday3()
	{
		return view('Temp_4');
	}
	 public function getbirthday4()
	{
		return view('Temp_5');
	}
}
