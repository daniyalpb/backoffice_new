<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use PHPExcel;
use PHPExcel_IOFactory;
use Redirect;

class PoscdemoController extends Controller
{
  public function getposc()
  {
  	return view('Posclogin');
  }
  public function login(Request $req)
  {
  	$data=DB::select("call spValidateLogin('$req->txtusername','$req->txtpassword','','','','')");
  	if (!empty($data)&& $data[0]->SuccessStatus!='0') {
  		return redirect('http://bo.magicfinmart.com/insurance_repository/page.html');
  	}else{
  		 Session::flash('msg', "Invalid email or password. Please Try again! ");
  		return redirect::back();
  	}
  	
  }
}