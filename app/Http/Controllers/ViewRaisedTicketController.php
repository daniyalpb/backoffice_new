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
class ViewRaisedTicketController extends 
Controller
{
	
	public function getraisedticket()
	{
	 $id=Session::get('fbaid');
	// print_r($id);exit();
     $query = DB::select("call Usp_viewraisedticket($id)");     
	 return view('dashboard.ViewRaisedTicket',['query'=>$query]);	
	}
	public function deleteticket($ticketid)
	{
	DB::select("call Usp_deleteticket($ticketid)");
     return redirect('View-Raised-Ticket');
 }
}
