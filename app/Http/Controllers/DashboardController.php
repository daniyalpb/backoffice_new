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

class DashboardController extends InitialController
{
      public function dashboard()
      {
             $username=Session::get('username');
             $data=DB::select("call check_is_active('$username')");
          // print_r($data);exit();
           if ($data[0]->Employee_Status=='Inactive'||$data[0]->IsBlocked=='1'||$data[0]->isactive=='0'){
             session()->flush();
                Session::flash('msg', "As You Are Not Active You Can`t Ascess The Finmart Back Office kindly Contact Support !");
                return redirect('/');
          }else{
      	 $fbaid=Session::get('fbaid');
             $basicinfo=DB::select("call login_basic_info($fbaid)");   
      }	      return view('dashboard.index',['basicinfo'=>$basicinfo]);
      }
      public function getdata()
      { 
               
                $data=DB::select("call getDashboardDataForAdmin()");
                return json_encode($data);
          
      	
      }
      public function checkisactive()
      {
           $username=Session::get('username');
           $data=DB::select("call check_is_active('$username')");
          // print_r($data);exit();
           if ($data[0]->Employee_Status=='Inactive'||$data[0]->IsBlocked=='1'||$data[0]->isactive=='0'){
             session()->flush();
                Session::flash('msg', "As You Are Not Active You Can`t Ascess The Finmart Back Office kindly Contact Support !");
                return redirect('/');
          }  
      }
}
