<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use PHPExcel;
use PHPExcel_IOFactory;

class Mis4SystemController extends Controller{

	public function mis_system(){
		if(Session::exists('username')){
			return view('dashboard.mis_system');
		}else{
			return redirect('/');
		}
	}

	public function mis_update(Request $request){
    	//print_r($request->all());exit();

		$response = array();

		if($request->hasFile('file_excel_data')){

			$extension = pathinfo($request->file('file_excel_data')->getClientOriginalName(), PATHINFO_EXTENSION);
			//print_r($extension);exit();
			if($extension == "xls" || $extension == "xlsx"){	

				if($extension == "xls"){
					$file_value_reader = 'Excel5';
				}	
				if($extension == "xlsx"){
					$file_value_reader = 'Excel2007';
				}		
				$objReader = PHPExcel_IOFactory::createReader($file_value_reader);
				$objPHPExcel = $objReader->load($request->File('file_excel_data'));
				$active_sheet = $objPHPExcel->setActiveSheetIndex(0);
				$response['A1'] = $this-> check_excel_headings('A1' , $active_sheet-> getCell( 'A1' )->getValue());  
				$response['B1'] = $this-> check_excel_headings('B1' , $active_sheet-> getCell( 'B1' )->getValue());  
				$response['C1'] = $this-> check_excel_headings('C1' , $active_sheet-> getCell( 'C1' )->getValue());  
				$response['D1'] = $this-> check_excel_headings('D1' , $active_sheet-> getCell( 'D1' )->getValue());  
				$response['E1'] = $this-> check_excel_headings('E1' , $active_sheet-> getCell( 'E1' )->getValue());  
				$response['F1'] = $this-> check_excel_headings('F1' , $active_sheet-> getCell( 'F1' )->getValue());  
				$response['G1'] = $this-> check_excel_headings('G1' , $active_sheet-> getCell( 'G1' )->getValue());  
				$response['H1'] = $this-> check_excel_headings('H1' , $active_sheet-> getCell( 'H1' )->getValue());  
				$response['I1'] = $this-> check_excel_headings('I1' , $active_sheet-> getCell( 'I1' )->getValue());  
				$response['J1'] = $this-> check_excel_headings('J1' , $active_sheet-> getCell( 'J1' )->getValue());  
				$response['K1'] = $this-> check_excel_headings('K1' , $active_sheet-> getCell( 'K1' )->getValue());  
				$response['L1'] = $this-> check_excel_headings('L1' , $active_sheet-> getCell( 'L1' )->getValue());  
				$response['M1'] = $this-> check_excel_headings('M1' , $active_sheet-> getCell( 'M1' )->getValue());  
				$response['N1'] = $this-> check_excel_headings('N1' , $active_sheet-> getCell( 'N1' )->getValue());  
				$response['O1'] = $this-> check_excel_headings('O1' , $active_sheet-> getCell( 'O1' )->getValue());  
				$response['P1'] = $this-> check_excel_headings('P1' , $active_sheet-> getCell( 'P1' )->getValue());  
				$response['Q1'] = $this-> check_excel_headings('Q1' , $active_sheet-> getCell( 'Q1' )->getValue());  
				$response['R1'] = $this-> check_excel_headings('R1' , $active_sheet-> getCell( 'R1' )->getValue());  
				$response['S1'] = $this-> check_excel_headings('S1' , $active_sheet-> getCell( 'S1' )->getValue());  
				$response['T1'] = $this-> check_excel_headings('T1' , $active_sheet-> getCell( 'T1' )->getValue());  
				$response['U1'] = $this-> check_excel_headings('U1' , $active_sheet-> getCell( 'U1' )->getValue());  
				$response['V1'] = $this-> check_excel_headings('V1' , $active_sheet-> getCell( 'V1' )->getValue());  
				$response['W1'] = $this-> check_excel_headings('W1' , $active_sheet-> getCell( 'W1' )->getValue());  
				$response['X1'] = $this-> check_excel_headings('X1' , $active_sheet-> getCell( 'X1' )->getValue());  
				$response['Y1'] = $this-> check_excel_headings('Y1' , $active_sheet-> getCell( 'Y1' )->getValue());  
				$response['Z1'] = $this-> check_excel_headings('Z1' , $active_sheet-> getCell( 'Z1' )->getValue());  
				$response['AA1'] = $this-> check_excel_headings('AA1' , $active_sheet-> getCell( 'AA1' )->getValue());
				$response['AB1'] = $this-> check_excel_headings('AB1' , $active_sheet-> getCell( 'AB1' )->getValue());
				$response['AC1'] = $this-> check_excel_headings('AC1' , $active_sheet-> getCell( 'AC1' )->getValue());
				$response['AD1'] = $this-> check_excel_headings('AD1' , $active_sheet-> getCell( 'AD1' )->getValue());
				$response['AE1'] = $this-> check_excel_headings('AE1' , $active_sheet-> getCell( 'AE1' )->getValue());
				$response['AF1'] = $this-> check_excel_headings('AF1' , $active_sheet-> getCell( 'AF1' )->getValue());
				$response['AG1'] = $this-> check_excel_headings('AG1' , $active_sheet-> getCell( 'AG1' )->getValue());
				$response['AH1'] = $this-> check_excel_headings('AH1' , $active_sheet-> getCell( 'AH1' )->getValue());
				$response['AI1'] = $this-> check_excel_headings('AI1' , $active_sheet-> getCell( 'AI1' )->getValue());
				$response['AJ1'] = $this-> check_excel_headings('AJ1' , $active_sheet-> getCell( 'AJ1' )->getValue());
				$response['AK1'] = $this-> check_excel_headings('AK1' , $active_sheet-> getCell( 'AK1' )->getValue());
				$response['AL1'] = $this-> check_excel_headings('AL1' , $active_sheet-> getCell( 'AL1' )->getValue());
				$response['AM1'] = $this-> check_excel_headings('AM1' , $active_sheet-> getCell( 'AM1' )->getValue());
				$response['AN1'] = $this-> check_excel_headings('AN1' , $active_sheet-> getCell( 'AN1' )->getValue());
				$response['AO1'] = $this-> check_excel_headings('AO1' , $active_sheet-> getCell( 'AO1' )->getValue());
				$response['AP1'] = $this-> check_excel_headings('AP1' , $active_sheet-> getCell( 'AP1' )->getValue());
				$response['AQ1'] = $this-> check_excel_headings('AQ1' , $active_sheet-> getCell( 'AQ1' )->getValue());
				$response['AR1'] = $this-> check_excel_headings('AR1' , $active_sheet-> getCell( 'AR1' )->getValue());
				$response['AS1'] = $this-> check_excel_headings('AS1' , $active_sheet-> getCell( 'AS1' )->getValue());
				$response['AT1'] = $this-> check_excel_headings('AT1' , $active_sheet-> getCell( 'AT1' )->getValue());
				$response['AU1'] = $this-> check_excel_headings('AU1' , $active_sheet-> getCell( 'AU1' )->getValue());
				$response['AV1'] = $this-> check_excel_headings('AV1' , $active_sheet-> getCell( 'AV1' )->getValue());
				$response['AW1'] = $this-> check_excel_headings('AW1' , $active_sheet-> getCell( 'AW1' )->getValue());
				$response['AX1'] = $this-> check_excel_headings('AX1' , $active_sheet-> getCell( 'AX1' )->getValue());
				$response['AY1'] = $this-> check_excel_headings('AY1' , $active_sheet-> getCell( 'AY1' )->getValue());
				$response['AZ1'] = $this-> check_excel_headings('AZ1' , $active_sheet-> getCell( 'AZ1' )->getValue());
				$response['BA1'] = $this-> check_excel_headings('BA1' , $active_sheet-> getCell( 'BA1' )->getValue());
				$response['BB1'] = $this-> check_excel_headings('BB1' , $active_sheet-> getCell( 'BB1' )->getValue());
				$response['BC1'] = $this-> check_excel_headings('BC1' , $active_sheet-> getCell( 'BC1' )->getValue());
				$response['BD1'] = $this-> check_excel_headings('BD1' , $active_sheet-> getCell( 'BD1' )->getValue());
				$response['BE1'] = $this-> check_excel_headings('BE1' , $active_sheet-> getCell( 'BE1' )->getValue());
				$response['BF1'] = $this-> check_excel_headings('BF1' , $active_sheet-> getCell( 'BF1' )->getValue());
				$response['BG1'] = $this-> check_excel_headings('BG1' , $active_sheet-> getCell( 'BG1' )->getValue());
				$response['BH1'] = $this-> check_excel_headings('BH1' , $active_sheet-> getCell( 'BH1' )->getValue());
				$response['BI1'] = $this-> check_excel_headings('BI1' , $active_sheet-> getCell( 'BI1' )->getValue());
				$response['BJ1'] = $this-> check_excel_headings('BJ1' , $active_sheet-> getCell( 'BJ1' )->getValue());
				$response['BK1'] = $this-> check_excel_headings('BK1' , $active_sheet-> getCell( 'BK1' )->getValue());
				$response['BL1'] = $this-> check_excel_headings('BL1' , $active_sheet-> getCell( 'BL1' )->getValue());
				$response['BM1'] = $this-> check_excel_headings('BM1' , $active_sheet-> getCell( 'BM1' )->getValue());
				$response['BN1'] = $this-> check_excel_headings('BN1' , $active_sheet-> getCell( 'BN1' )->getValue());
				$response['BO1'] = $this-> check_excel_headings('BO1' , $active_sheet-> getCell( 'BO1' )->getValue());


if(count(array_filter($response)) === 0){

	foreach ($active_sheet->getRowIterator() as $row) {
		if( $row->getRowIndex() > 1 ){
			//echo '    Row number - ' , $row->getRowIndex() ,'<br>' ;
			$cellIterator = $row->getCellIterator();
			$cellIterator->setIterateOnlyExistingCells(true); // Loop all cells, even if it is not set
			foreach ($cellIterator as $cell) {
				if (!is_null($cell)) {
					//echo '        Cell - ' ,$cell->getCoordinate() , ' - ' , $cell->getFormattedValue() ,'<br>';
					$all_rows['row_'.$row->getRowIndex()][$cell->getCoordinate()] = $cell->getFormattedValue();
				}
			}
		}
	}
}
	//echo count($all_rows);exit();

if(count($all_rows) <= 3000){
	$data_row_count = 2;
	$fbaid=Session::get('fbaid');
	foreach($all_rows as $row => $value){

		if(!empty($value['A'.$data_row_count])){

			$exploded_entry_date = explode("-",trim($value['U'.$data_row_count]));
			$entry_date = $exploded_entry_date[0]."-".$exploded_entry_date[1]."-".$exploded_entry_date[2];
         // print_r($value['H'.$data_row_count]);exit();
			$sp_query = DB::select("call update_mis_system('".$value['A'.$data_row_count]."', '".$value['B'.$data_row_count]."', '".$value['C'.$data_row_count]."', '".$value['D'.$data_row_count]."', '".$value['E'.$data_row_count]."', '".$value['F'.$data_row_count]."', '".$value['G'.$data_row_count]."', '".$value['H'.$data_row_count]."', '".$value['I'.$data_row_count]."', '".$value['J'.$data_row_count]."', '".$value['K'.$data_row_count]."', '".$value['L'.$data_row_count]."', '".$value['M'.$data_row_count]."', '".$value['N'.$data_row_count]."', '".$value['O'.$data_row_count]."', '".$value['P'.$data_row_count]."', '".$value['Q'.$data_row_count]."', '".$value['R'.$data_row_count]."', '".$value['S'.$data_row_count]."', '".$value['T'.$data_row_count]."', '".$entry_date."', '".$value['V'.$data_row_count]."', '".$value['W'.$data_row_count]."', '".$value['X'.$data_row_count]."', '".$value['Y'.$data_row_count]."', '".$value['Z'.$data_row_count]."', '".$value['AA'.$data_row_count]."', '".$value['AB'.$data_row_count]."', '".$value['AC'.$data_row_count]."', '".$value['AD'.$data_row_count]."', '".$value['AE'.$data_row_count]."', '".$value['AF'.$data_row_count]."', '".$value['AG'.$data_row_count]."', '".$value['AH'.$data_row_count]."', '".$value['AI'.$data_row_count]."', '".$value['AJ'.$data_row_count]."', '".$value['AK'.$data_row_count]."', '".$value['AL'.$data_row_count]."', '".$value['AM'.$data_row_count]."', '".$value['AN'.$data_row_count]."', '".$value['AO'.$data_row_count]."', '".$value['AP'.$data_row_count]."', '".$value['AQ'.$data_row_count]."', '".$value['AR'.$data_row_count]."', '".$value['AS'.$data_row_count]."', '".$value['AT'.$data_row_count]."', '".$value['AU'.$data_row_count]."', '".$value['AV'.$data_row_count]."', '".$value['AW'.$data_row_count]."', '".$value['AX'.$data_row_count]."', '".$value['AY'.$data_row_count]."', '".$value['AZ'.$data_row_count]."', '".$value['BA'.$data_row_count]."', '".$value['BB'.$data_row_count]."', '".$value['BC'.$data_row_count]."', '".$value['BD'.$data_row_count]."', '".$value['BE'.$data_row_count]."', '".$value['BF'.$data_row_count]."', '".$value['BG'.$data_row_count]."', '".$value['BH'.$data_row_count]."', '".$value['BI'.$data_row_count]."', '".$value['BJ'.$data_row_count]."', '".$value['BK'.$data_row_count]."', '".$value['BL'.$data_row_count]."', '".$value['BM'.$data_row_count]."', '".$value['BN'.$data_row_count]."', '".$value['BO'.$data_row_count]."','".$fbaid."')");

			$success_array[] = $sp_query[0]->result;

			$data_row_count++;

		}

		$arr_success = json_encode($success_array);
		$response = array("messege"=>"success","arr_success"=>$arr_success);
		
	}

}else{
	$response['file_excel_data'] = "Can not Upload.Rows are more than 3000";
}

}else{
	$response['file_excel_data'] = "Invalid File Type.(Only 'xsl' or 'xslx' File Types are allowed)";
}

}else{
	$response['file_excel_data'] = "Please Select Excel File";
}
echo json_encode($response);	   
}


public function check_excel_headings($cell_index , $cell_value){

	$headings_array = $this->all_headings();

	if($headings_array[$cell_index] != $cell_value){
		return "Invalid Column at $cell_index. Invalid Format.";
	}
}


public function all_headings(){
	return $headings_array = array('A1'=>'EntryNo',
		'B1'=>'Region',
		'C1'=>'BusinessLockAt',
		'D1'=>'InsCompany',
		'E1'=>'TarrifRate',
		'F1'=>'ProductName',
		'G1'=>'PolicyCategory',
		'H1'=>'BussClass',
		'I1'=>'ODPremium',
		'J1'=>'Premium',
		'K1'=>'AddOnPremium',
		'L1'=>'Source',
		'M1'=>'DSAName',
		'N1'=>'InceptionDate',
		'O1'=>'NextStage',
		'P1'=>'BusinessGroup',
		'Q1'=>'ClientType',
		'R1'=>'Expr1017',
		'S1'=>'VehicleMake',
		'T1'=>'Model',
		'U1'=>'EntryDate',
		'V1'=>'ExpiryDate',
		'W1'=>'NoClaimBonus',
		'X1'=>'Annulized Premium',
		'Y1'=>'ServiceTax',
		'Z1'=>'CSNo',
		'AA1'=>'CS Date',
		'AB1'=>'Qt No',
		'AC1'=>'LastYrNCB',
		'AD1'=>'Executive',
		'AE1'=>'Executive_UID',
		'AF1'=>'Total_OD',
		'AG1'=>'Total_LM_Dis',
		'AH1'=>'NextStage_Status',
		'AI1'=>'Online_Status',
		'AJ1'=>'Product_Name',
		'AK1'=>'Fuel_Type',
		'AL1'=>'Policy',
		'AM1'=>'Policy_with_Add-on',
		'AN1'=>'Vertical',
		'AO1'=>'Process',
		'AP1'=>'Sub Vertical',
		'AQ1'=>'Reporting_Month',
		'AR1'=>'NCB',
		'AS1'=>'LastYrInsCompany',
		'AT1'=>'GWP',
		'AU1'=>'Source-1',
		'AV1'=>'Business_Vertical',
		'AW1'=>'Business_Sub_Vertical',
		'AX1'=>'Policy_Status',
		'AY1'=>'FY_Year',
		'AZ1'=>'State',
		'BA1'=>'AddOn_Y/N',
		'BB1'=>'TP_Premium',
		'BC1'=>'WOD',
		'BD1'=>'MfgYear',
		'BE1'=>'TL_Name',
		'BF1'=>'ALM_Name',
		'BG1'=>'LM_Name',
		'BH1'=>'BH_Name',
		'BI1'=>'RH_Name',
		'BJ1'=>'Vertical_Head',
		'BK1'=>'CC',
		'BL1'=>'POSP',
		'BM1'=>'POSP_ID',
		'BN1'=>'POSPSource',
		'BO1'=>'Data_Considration');
}



}