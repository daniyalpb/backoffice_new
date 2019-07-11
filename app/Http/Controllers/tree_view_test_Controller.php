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
   class tree_view_test_Controller extends CallApiController {

   	public function tree_view(){
   		return view('tree-view-test');
   	}
   }