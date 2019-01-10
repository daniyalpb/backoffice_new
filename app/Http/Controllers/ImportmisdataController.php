<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Excel;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;
use Validator;
class ImportmisdataController extends Controller {
    public function importmisdata(){
        return view('Importmisdata');
    }
     public function importExcelmis(Request $request)
  {   
    //print_r($request->all());exit();
  
        if($request->hasFile('filemisdata'))
        {
            $err1= $this->miserror($request->file('filemisdata'));    
            // print_r($err1);exit();
            if($err1==1){
             Session::flash('error', 'Your is File incorrect');           
             return Redirect('ImportMisdata'); 
            }else if($err1==0){
                Session::flash('message', 'Your File Imported Successfully');           
             return Redirect('ImportMisdata'); 
            }
        }
    
  }
  public function miserror($excel)
{ 
   // print_r($excel->getRealPath());exit();
      $error='';
     //ini_set('memory_limit','512M');print_r($reader);exit(); 
    Excel::load($excel->getRealPath(), function ($reader)use($error){
         
       if(!empty($reader->toArray()) && array_key_exists('EntryNo', $reader->toArray()[0])){
                       foreach ($reader->toArray() as $key => $row)  { 

                         if(isset($row['EntryNo'])){ 
                         print_r($row);exit();                           
                         $this->importdata($row); 
                         }

                       }
          $this->err=0;
         }else{
          $this->err=1;
         }         
    });
 return $this->err;
}
public function importdata($Data)
 {

 print_r($Data);exit();
   /*$fbaid=Session::get('fbaid');
    DB::select('call insert_motor_sales_data(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array(
      $motor['source'],
      $motor['product'],
      $motor['agent'],
      $motor['reporting'],
      $motor['insurer'],
      $motor['pb_crn'],
      $motor['erp_cs'],
      $motor['reg_no'],
      $motor['premium'],
      $motor['od_addon'],
      $motor['disc'],
      $motor['transact_on'],
      $motor['fbaid'],
      $motor['erp_id'],
      $fbaid ));*/
    
  }

}