<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class CheckactiveemployeeController extends CallApiController
{
	public function checkemployeelist()
	{
		try{
			$data='';
			$post_data=json_encode($data);
   	// print_r($post_data); exit();
			$result=$this->call_json_data_api('http://landmarktimes.policyboss.com/eis/json_test/active_employees.php?key=K!R:|A*J$P*',$post_data);
			$http_result=$result['http_result'];
			$error=$result['error'];
			$st=str_replace('"{', "{", $http_result);
			$s=str_replace('}"', "}", $st);
			$m=$s=str_replace('\\', "", $s);
			$update_user='';
			$obj = json_decode($m, true);	
		    $dbdata=DB::select("call emp_uid()");
		    $arr1=[];
		   foreach ($dbdata as $key => $value) {
				$arr1[]=$value->UId;				
			}
            
            $arr2=[];
			foreach ($obj as $key => $value) {
				$arr2[]=$value['UID'];  
			}

           $resultdata=array_diff($arr2,$arr1);	
		   $uidstring = implode(',', $resultdata);
		   $msg=DB::select("call update_employee_status(?)",[$uidstring]);
			 	print_r($msg);exit();
		}
		catch (Exception $e){
			return $e;    
		}
	}
}