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
use excle;
class RndController extends Controller
{
  public function datatablernd()
  {
  	return view('datatablernd');
  }
}