<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\CustomValidation;
use App\SmsEmail;

class TrainingController extends Controller{

    public function training_modes(){
        return array('create','update','repeat');
    }
    
    public function schedule_training($mode = null , $training_id = null){

        $training_modes = $this -> training_modes();
        $user = Session::get('fbaid');

        if(in_array($mode , $training_modes)){

            if($mode == "create"){
                return view('dashboard.Schedule-training',['mode' => $mode,'training_id' => $training_id]);
            }
            if(($mode == "update") or ($mode == "repeat")){

                if(($training_id == null) or ($training_id == '')){
                    return view('404');
                }else{
                    $result_data = DB::select('call id_training_details(?)',array($training_id));

                    if($user == $result_data[0] -> createdby){
                        return view('dashboard.Schedule-training',['mode' => $mode,'training_id' => $training_id,'result_data' => $result_data]);
                    }else{
                        return view('RestrictedAccess');
                    }
                }
            }
        }else{
            return view('404');
        }
    }

    public function validate_schedule_training($mode , Request $request){

    	$validator = new CustomValidation;

    	$data = array();
        $error = array();
        $post_array = $request->all();
        $fbaid = Session::get('fbaid');


        $parameters['REQUEST'] = $request->all();
        $parameters['VALIDATIONS'] = array(
            'REQUIRED_VALIDATIONS'=>array('training_type'=>'Please Select Training Type',
						            	  'training_name'=>'Please Select Training Name',
						            	  'training_date'=>'Please Enter Training Date',
						            	  'description'=>"Please Enter Training Description",
                                          'start_time_hour'=>'Enter Hours',
                                          'start_time_minutes'=>'Enter Minutes',
						            	  'start_time_am_pm'=>'Enter AM/PM',
						            	  /*'sms_email'=>'Please Enter SMS/Email Content'*/
                                        ),
            'NUMERIC_VALIDATIONS'=>array('duration'=>'Please Enter Duration(In Minutes)'),
            'CHAR_VALIDATIONS' => array('trainer_name'=>'Please Select Trainer Name')
        );


        if(($parameters['REQUEST']['training_type'] == "1") or ($parameters['REQUEST']['training_type'] == "")){
        	$parameters['VALIDATIONS']['REQUIRED_VALIDATIONS']['location'] = "Please Enter Location Details";
        }else{
        	$parameters['VALIDATIONS']['REQUIRED_VALIDATIONS']['location'] = "Please Enter WebX Details";
        }
                                          
        extract($validator->validate_required($parameters));
        extract($validator->validate_numeric($parameters));
        extract($validator->validate_char($parameters));

        if(count($error) === 0){

        $exploded_date = explode('/',$post_array['training_date']);
        $formatted_date = $exploded_date[2]."-".$exploded_date[0]."-".$exploded_date[1];

        if($post_array['start_time_am_pm'] == "PM" and $post_array['start_time_hour'] != '12'){
            $hours = str_pad(($post_array['start_time_hour'] + 12),2,"0",STR_PAD_LEFT);
        }
        if($post_array['start_time_am_pm'] == "PM" and $post_array['start_time_hour'] == '12'){
            $hours = str_pad(($post_array['start_time_hour']),2,"0",STR_PAD_LEFT);
        }
        if($post_array['start_time_am_pm'] == "AM" and $post_array['start_time_hour'] != '12'){
            $hours = str_pad(($post_array['start_time_hour']),2,"0",STR_PAD_LEFT);
        }
        if($post_array['start_time_am_pm'] == "AM" and $post_array['start_time_hour'] == '12'){
            $hours = str_pad(($post_array['start_time_hour'] - 12),2,"0",STR_PAD_LEFT);
        }

        $start_time = $hours.':'.$post_array['start_time_minutes'].':00';


        if(($mode == "create") or ($mode == "repeat")){
            $result_insert = DB::select("call insert_training_details(?,?,?,?,?,?,?,?,?,?,?)",array($post_array['training_type'],$post_array['training_name'],$post_array['trainer_name'],$formatted_date,$post_array['description'],$start_time,$post_array['sms_email'],$post_array['duration'],$post_array['agenda'],$post_array['location'],$fbaid));

            $msg = array("status"=>"success","messege"=>"Successfully Created Training Session","redirectURL"=>"/schedule-training/create");
        }


        if($mode == "update"){
            $result_update = DB::select('call update_training_details(?,?,?,?,?,?,?,?,?,?,?,?)',array($post_array['hidden_training_id'],$post_array['training_type'],$post_array['training_name'],$post_array['trainer_name'],$formatted_date,$post_array['description'],$start_time,$post_array['sms_email'],$post_array['duration'],$post_array['agenda'],$post_array['location'],$fbaid));

            if($post_array['hidden_form_changed_status'] == "changed"){

            //// SMS Send Start
                $training_result = DB::select("call id_training_details(?)" ,array($post_array['hidden_training_id']));
                $result_mapped_fba = DB::select("call getMappedFBA(?)" , array($post_array['hidden_training_id']));  

                if(count($result_mapped_fba) > 0){         //if FBAs are assigned to training then send them training cancelled msg

                    $param['training_type'] = $training_result[0] -> training_type;
                    $param['training_event'] = 'reschedule existing training';
                    $param['training_id'] = $post_array['hidden_training_id'];
                    $param['training_name'] = $training_result[0] -> training_name;
                    $param['training_date'] = $training_result[0] -> training_date;
                    $param['training_start_time'] = $training_result[0] -> start_time;
                    $param['training_location_webx'] = $training_result[0] -> location;
                    $param['training_result_mapped_fba'] = $result_mapped_fba;
                    
                    $this -> create_notification_log_insert_array($param);

                    $m_param['training_id'] = $post_array['hidden_training_id'];
                    $m_param['mode'] = 'sms';
                    $m_param['training_event'] = 'reschedule existing training';

                    $this -> send_training_notification($m_param);
                }
            //// SMS Send End
            }

            $msg = array("status"=>"success","messege"=>"Successfully Updated Training Session","redirectURL"=>"/schedule-training/update/".$post_array['hidden_training_id']);
        }
 	
        echo json_encode($msg);
        }else{
        	echo json_encode($error);
    	}

    }


    public function update_repeat_training_schedule(){

        $result = DB::select('call ListUpdateOrRepeatTraining()');
        return view('dashboard.update_repeat_training_schedule',[ 'result' => $result]);
    }


    public function assign_training_to_fba(){

        $states = DB::select("call usp_load_state_list()");
        $training_schedule = DB::select("call get_active_training_schedules()");
        return view('dashboard.assign-training-to-fba',['states'=>$states,'training_schedule' => $training_schedule]);
    }


    public function validate_assign_training_to_fba(Request $request){

        $validator = new CustomValidation;

        $data = array();
        $error = array();
        $post_array = $request->all();

        $parameters['REQUEST'] = $request->all();
        $parameters['VALIDATIONS'] = array(
            'REQUIRED_VALIDATIONS'=>array('training_name'=>'Please Select Training Name'));
                             
        extract($validator->validate_required($parameters));

        if(!isset($post_array['state']) and empty($post_array['state'])){
            $error['state'] = "Please select atleast 1 State";
        }

        if(!isset($post_array['city']) and empty($post_array['city'])){
            $error['city'] = "Please select atleast 1 City";
        }


        if(count($error) === 0){

            $text_cities_array = [];

            foreach($post_array['city'] as $city_id){
                $result_city = DB::select("call get_IDwise_city(?)",array($city_id));
                $text_cities_array[] = $result_city[0] -> cityname;
            }
            $text_cities = "'".implode("','",$text_cities_array)."'";            
            
            //$city_result = DB::select("call get_training_citiwise_fba(?,?)",array($text_cities,$post_array['training_name']));
            $city_result = DB::select("select FBAID,FirsName,MiddName,LastName,FullName,Gender,MobiNumb1,EmailID,city FROM FBAMast where city in (".$text_cities.") and FBAID NOT IN (select fbaid from training_fba_mapping where trainingscheduleid = '".$post_array['training_name']."' and is_removed='0')");

            $table_data = "<table class='table table-bordered' id='tbl_training_fba'>
                <thead>
                  <th class='text-center'><input type='checkbox' name='check_all_fba' id='check_all_fba' onclick='p_check_all_fba(this.id)'><input type='hidden' name='ajax_training_name' id='ajax_training_name' readonly value='" . $post_array['training_name'] . "'></th>
                  <th class='text-center'>FBAID</th>
                  <th class='text-center'>FullName</th>
                  <th class='text-center'>Gender</th>
                  <th class='text-center'>MobiNumb1</th>
                  <th class='text-center'>EmailID</th>
                  <th class='text-center'>City</th>
                </thead>

                <tbody>";

            foreach($city_result as $result){

                $table_data .= "<tr>";
                $table_data .= "<td><input type='checkbox' class='fba_individual' name='fba_chk[]' id='fba_chk_". $result -> FBAID . "' value='". $result -> FBAID . "' onclick='get_fba_id(this.id)'></td>";
                $table_data .= "<td>". $result -> FBAID . "</td>";
                $table_data .= "<td>". $result -> FullName . "</td>";
                $table_data .= "<td>". $result -> Gender . "</td>";
                $table_data .= "<td>". $result -> MobiNumb1 . "</td>";
                $table_data .= "<td>". $result -> EmailID . "</td>";
                $table_data .= "<td>". $result -> city . "</td>";
                $table_data .= "</tr>";
            }
            
            $table_data .= "</tbody></table>";

            $table_data .= "<script> $('#tbl_training_fba').DataTable(); </script>";

            $msg = array("status"=>"success", "table_data" => $table_data);
            
            echo json_encode($msg);
        }else{
            echo json_encode($error);
        }
    }


    public function validate_training_fba_list(Request $request){

        $error = [];
        $post_array = $request->all();
        $user = Session::get('fbaid');
        $mapped_fba_array = [];
        $p_mapped_array = [];       

        if(trim($post_array['cs_fbaid']) == ""){
            $error['error_panel'] = "Please Select atleast 1 FBA";
        }

        if(count($error) === 0){

            $exp_cs_fbaid = explode(',',$post_array['cs_fbaid']);            
            $unique_exp_cs_fbaid = array_unique($exp_cs_fbaid); 

            foreach($unique_exp_cs_fbaid as $chk_fbaid){

                $result_check_assigned_fba_exist = DB::select('call check_assigned_fba_exist(?,?)',array($post_array['ajax_training_name'],$chk_fbaid));

                if(count($result_check_assigned_fba_exist) > 0){   //Update if fba exist
                    DB::select("call upd_training_fba_remove_status(?,?,?)",array($post_array['ajax_training_name'],$chk_fbaid,"0"));
                }else{                                             //Insert if fba does not exist
                    DB::select("call assign_fba_to_training(?,?,?)" ,array($post_array['ajax_training_name'],$chk_fbaid,$user));
                }

                
                $result_fba_info = DB::select("call getFBAIDDetails(?)",array($chk_fbaid));

                $p_mapped_array['MobiNumb1'] = $result_fba_info[0] -> MobiNumb1;
                $p_mapped_array['EmailID'] = $result_fba_info[0] -> EmailID;
                $p_mapped_array['FBAID'] = $result_fba_info[0] -> FBAID;

                $mapped_fba_array[] = (object)$p_mapped_array;
            }

///////////////Start 'SMS / Email Sending'
            $training_result = DB::select("call id_training_details(?)" ,array($post_array['ajax_training_name']));

            if(count($mapped_fba_array) > 0){         //if FBAs are assigned to training then send them msg

                $param['training_type'] = $training_result[0] -> training_type;
                $param['training_event'] = 'create training';
                $param['training_id'] = $post_array['ajax_training_name'];
                $param['training_name'] = $training_result[0] -> training_name;
                $param['training_date'] = $training_result[0] -> training_date;
                $param['training_start_time'] = $training_result[0] -> start_time;
                $param['training_location_webx'] = $training_result[0] -> location;
                $param['training_result_mapped_fba'] = $mapped_fba_array;
                
                $this -> create_notification_log_insert_array($param);

                $m_param['training_id'] = $post_array['ajax_training_name'];
                $m_param['mode'] = 'sms';
                $m_param['training_event'] = 'create training';

                $this -> send_training_notification($m_param);
            }
///////////////End 'SMS / Email Sending'


            $msg = array("status"=>"success", "alert_msg" => "FBA Assigned Successfully to the training");
            echo json_encode($msg);
        }else{
            echo json_encode($error);
        }
    }


    public function get_statewise_training_cities(Request $request){
        $post_array = $request->all();
        $city_options = [];
        $opt = "<select name='city[]' id='city' class='form-control' multiple='multiple'>";

        foreach($post_array['state'] as $state_id){
            $city_data = DB::select("call usp_load_cities($state_id)");

            foreach($city_data as $city_val){
                $city_options[$city_val -> city_id] = $city_val -> cityname;
            }
        }

        asort($city_options);
        foreach($city_options as $city_id => $cityname) {
            $opt .= "<option value='" . $city_id . "'>" . $cityname . "</option>";
        }

        $opt .= "</select>";
        $opt .= "<script>$(function() { $('#city').multiselect({includeSelectAllOption: true, maxHeight: 250 }); });</script>";

        $msg = array('city_data'=>$opt);
        echo json_encode($msg);
    }

    public function remove_assigned_fba(){
        $training_schedule = DB::select("call get_all_training_schedules()");
        return view('dashboard.remove-assigned-fba',['training_schedule'=>$training_schedule]);
    }

    public function get_assigned_fba(Request $request){

        $post_array = $request->all();
        $checked_array = [];
        $unchecked_array = [];

        $training_result = DB::select("call get_assigned_fba(?)",array($post_array['training_name'])); 

        $data_count = count($training_result);

    if($data_count > 0){
        $remove_btn_show = "Y";

        $table_data = "<table class='table table-bordered' id='tbl_training_fba'>
                <thead>
                  <th class='text-center'><input type='hidden' name='ajax_training_name' id='ajax_training_name' readonly value='" . $post_array['training_name'] . "'></th>
                  <th class='text-center'>FBAID</th>
                  <th class='text-center'>FullName</th>
                  <th class='text-center'>Gender</th>
                  <th class='text-center'>MobiNumb1</th>
                  <th class='text-center'>EmailID</th>
                  <th class='text-center'>City</th>
                  <th class='text-center'>Is Accepted?</th>
                </thead>

                <tbody>";

            foreach($training_result as $result){

                if($result -> is_removed == "1"){
                    $checked_array[] = $result -> f_FBAID;
                    $checked_status = "";
                }else{
                    $unchecked_array[] = $result -> f_FBAID;
                    $checked_status = "checked";
                }

                $table_data .= "<tr>";
                $table_data .= "<td><input type='checkbox' name='fba_chk[]' id='fba_chk_". $result -> f_FBAID . "' value='". $result -> f_FBAID . "' onclick='get_fba_id(this.id)'></td>";
                $table_data .= "<td>". $result -> f_FBAID . "</td>";
                $table_data .= "<td>". $result -> FullName . "</td>";
                $table_data .= "<td>". $result -> Gender . "</td>";
                $table_data .= "<td>". $result -> MobiNumb1 . "</td>";
                $table_data .= "<td>". $result -> EmailID . "</td>";
                $table_data .= "<td>". $result -> city . "</td>";

                if($result -> is_accepted == "1"){
                    $table_data .= "<td>Accepted</td>";
                }elseif($result -> is_accepted == "0"){
                    $table_data .= "<td>Rejected</td>";
                }else{
                    $table_data .= "<td></td>";
                }
                
                $table_data .= "</tr>";
            }
            
            $table_data .= "</tbody></table>";

            $table_data .= "<script> $('#tbl_training_fba').DataTable(); </script>";

            $cs_text_checked = implode(",",$checked_array);
            $cs_text_unchecked = implode(",",$unchecked_array);

    }else{
        $remove_btn_show = "N";
        $table_data = "No Records Found";
        $cs_text_checked = "";
        $cs_text_unchecked = "";
    }

    $msg = array("table_data" => $table_data , 'cs_text_checked' => $cs_text_checked , 'cs_text_unchecked' => $cs_text_unchecked , 'remove_btn_show' => $remove_btn_show);
    
    echo json_encode($msg);

    }


    public function update_training_fba_cancel_status(Request $request){

        $post_array = $request -> all();
        $user = Session::get('fbaid');

        if(trim($post_array['cs_fbaid_checked']) == ""){
            $error['error_panel'] = "Please select atleast 1 FBA to remove";
            echo json_encode($error);
        }else{
            $checked_array = explode(',',$post_array['cs_fbaid_checked']);
            $unchecked_array = explode(',',$post_array['cs_fbaid_unchecked']);

            if(count($checked_array) > 0){
                foreach($checked_array as $checked_fbaid){
                    DB::select("call update_training_fba_cancel_status(?,?,?,?)",array($post_array['training_name'],$checked_fbaid,'1',$user));
                }
            }

            /*if(count($unchecked_array) > 0){
                foreach($unchecked_array as $unchecked_fbaid){
                    DB::select("call update_training_fba_cancel_status(?,?,?,?)",array($post_array['training_name'],$unchecked_fbaid,'0',$user));
                }
            }*/   
        
            $msg = array("status" => "success","alert_msg" => "Removal Of FBA is successful.");
            echo json_encode($msg);
        }
    }


    public function canceltraining(){
        $data=DB::select("call get_cancelled_training_schedules()");
        return view('dashboard.cancel-training',['data'=>$data]);
    }

    public function get_training_details($id){
        $data=DB::select("call id_training_details(?)",array($id));
        return json_encode($data);
    }

    public function cancel_training_sp(Request $req){

        $user = Session::get('fbaid');

        //// SMS Send Start
        $training_result = DB::select("call id_training_details(?)" ,array($req -> training_name));
        $result_mapped_fba = DB::select("call getMappedFBA(?)" , array($req -> training_name));  

        if(count($result_mapped_fba) > 0){         //if FBAs are assigned to training then send them training cancelled msg

            $param['training_type'] = $training_result[0] -> training_type;
            $param['training_event'] = 'cancel training';
            $param['training_id'] = $req -> training_name;
            $param['training_name'] = $training_result[0] -> training_name;
            $param['training_date'] = $training_result[0] -> training_date;
            $param['training_start_time'] = $training_result[0] -> start_time;
            $param['training_location_webx'] = $training_result[0] -> location;
            $param['training_result_mapped_fba'] = $result_mapped_fba;
            
            $this -> create_notification_log_insert_array($param);

            $m_param['training_id'] = $req -> training_name;
            $m_param['mode'] = 'sms';
            $m_param['training_event'] = 'cancel training';

            $this -> send_training_notification($m_param);
        }   
        //// SMS Send End
       
        DB::select("call update_cancel_training(?,?,?)",array($req -> training_name,'1',$user));

        $msg = array('status' => 'success', 'messege' => 'Training Cancelled Successfully');
        echo json_encode($msg);
    }


    public function create_notification_log_insert_array($param){

        $response_modes = $this -> get_communication_modes($param);

    foreach($response_modes as $key => $value){

    $p_param['pattern_array'] = array('/##TrainingSubject##/', '/##TrainingDate##/' , '/##TrainingTime##/', '/##TrainingLocation##/');
    $p_param['replace_array'] = array($param['training_name'], $param['training_date'], $param['training_start_time'] ,$param['training_location_webx']);
    $p_param['template_body'] = $value['template_body'];
    $p_param['template_subject'] = $value['template_sub'];
    
    $communication_modes[$value['comm_mode']] = array('template_body' => $this -> set_dynamic_template_body($p_param), 'template_sub' => $this -> set_dynamic_template_subject($p_param));
    }

        foreach($communication_modes as $comm_mode => $comm_values){
            foreach ($param['training_result_mapped_fba'] as $data) {
                $insert_array[$comm_mode][$data -> FBAID]['MobiNumb1'] = $data -> MobiNumb1;
                $insert_array[$comm_mode][$data -> FBAID]['email'] = $data -> EmailID;
                $insert_array[$comm_mode][$data -> FBAID]['training_id'] = $param['training_id'];
                $insert_array[$comm_mode][$data -> FBAID]['event'] = $param['training_event'];
                $insert_array[$comm_mode][$data -> FBAID]['training_type'] = $param['training_type'];
                $insert_array[$comm_mode][$data -> FBAID]['subject'] = $comm_values['template_sub'];
                $insert_array[$comm_mode][$data -> FBAID]['body'] = $comm_values['template_body'];
                $insert_array[$comm_mode][$data -> FBAID]['comm_mode'] = $comm_mode;
            }
        } 
    
    $this -> insert_training_notification_log($insert_array);

    }

    public function get_communication_modes($param){

        $template_data = DB::select("call sms_email_template(?,?)",array($param['training_event'],$param['training_type']));

        foreach($template_data as $data){
            $response[$data -> id]['comm_mode'] = $data -> comm_mode;
            $response[$data -> id]['template_sub'] = $data -> template_sub;
            $response[$data -> id]['template_body'] = $data -> template_body;
            $response[$data -> id]['event'] = $data -> event;
            $response[$data -> id]['training_type'] = $data -> training_type;
        }

        return $response;
    }


    public function set_dynamic_template_body($param){
        $body = preg_replace( $param['pattern_array'], $param['replace_array'], $param['template_body'] );
        return $body;
    }

    public function set_dynamic_template_subject($param){
        $body = preg_replace( $param['pattern_array'], $param['replace_array'], $param['template_subject'] );
        return $body;
    }

    public function max_batch_size(){
        return $max_batch_size = 50;
    }


    public function insert_training_notification_log($param){

        $user = Session::get('fbaid');

    foreach($param as $comm_mode => $fbaid_n_values){
        foreach($fbaid_n_values as $fbaid => $values){
            DB::select('call insert_training_notification_log(?,?,?,?,?,?,?,?,?,?)',array($fbaid, $values['MobiNumb1'], $values['email'], $values['training_id'], $values['training_type'], $values['subject'], $values['body'], $values['comm_mode'], $values['event'], $user));  
        }
    }
    }


    public function send_training_notification($param){

    $obj_sms_email = new SmsEmail;
    $count_result = DB::select("call count_training_notify(?,?,?)" , array($param['training_id'],$param['mode'],$param['training_event']));

        $numBatches = intval($count_result[0] -> num_count / $this->max_batch_size()) + 1; // Number of while-loop calls to perform

        for($b = 1; $b <= $numBatches; $b++){
            $limit = $this->max_batch_size();
            $result = DB::select("call data_training_notify(?,?,?,?)" , array($param['training_id'],$param['mode'],$param['training_event'],$limit));

            if($param['mode'] == 'sms'){
                $mobile_no = array();

                if(count($result) > 0){
                    foreach($result as $data){
                        $mobile_no[] = $data -> mobile_no;
                        $sms_body =  $data -> template_body;
                        $id = $data -> id;
                        DB::select("call upd_notify_is_send(?)" , array($id));
                    }

                    $mobile_nos = implode(",",$mobile_no);

                    $p_param['mobile_no'] = $mobile_nos;
                    $p_param['msg_text'] = $sms_body;

                    $param['url'] = $obj_sms_email -> get_sms_url($p_param);

                    $delivery_result = $obj_sms_email -> send_sms($param);
                }
            }  
        }   
    }


    public function training_schedule_calendar($fbaid){

        $upcoming_array = [];
        $past_array = [];
        $today_array = [];

        //Upcoming Training Records
        $upcoming_training = DB::select("call UpcomingTraining(?)",array($fbaid));
        $upcoming_array = $this -> get_training_data($upcoming_training);
        
        //Past Training Records
        $past_training = DB::select("call PastTraining(?)",array($fbaid));
        $past_array = $this -> get_training_data($past_training);

        //Todays Training Records
        $todays_training = DB::select("call TodaysTraining(?)",array($fbaid));
        $today_array = $this -> get_training_data($todays_training);

        return view('dashboard.training-schedule-calendar',['upcoming_array' => $upcoming_array , 'past_array' => $past_array , 'today_array' => $today_array , 'fbaid' => $fbaid ]);
    }
 

    public function get_month_array(){
        return array("1"=>"JANUARY","2"=>"FEBRUARY","3"=>"MARCH","4"=>"APRIL","5"=>"MAY","6"=>"JUNE","7"=>"JULY","8"=>"AUGUST","9"=>"SEPTEMBER","10"=>"OCTOBER","11"=>"NOVEMBER","12"=>"DECEMBER");
    }

    public function get_training_data($training_array){
        $month_array = $this -> get_month_array();
        $resp_array = [];

        foreach($training_array as $training_schedule){

            $resp_array[$month_array[$training_schedule -> training_month]][$training_schedule -> training_id]['training_name'] = $training_schedule -> training_name;

            $resp_array[$month_array[$training_schedule -> training_month]][$training_schedule -> training_id]['training_id'] = $training_schedule -> training_id;

            $resp_array[$month_array[$training_schedule -> training_month]][$training_schedule -> training_id]['training_date'] = $training_schedule -> training_date;

            $resp_array[$month_array[$training_schedule -> training_month]][$training_schedule -> training_id]['training_is_accepted'] = $training_schedule -> is_accepted;

            $resp_array[$month_array[$training_schedule -> training_month]][$training_schedule -> training_id]['training_start_time'] = $training_schedule -> start_time;

            $resp_array[$month_array[$training_schedule -> training_month]][$training_schedule -> training_id]['training_duration'] = $training_schedule -> duration;

            $resp_array[$month_array[$training_schedule -> training_month]][$training_schedule -> training_id]['training_is_attended'] = $training_schedule -> is_attended;
        }
        return $resp_array;
    }

    public function fill_modal_training_data(Request $request){

        $post_array = $request->all();
        $result = DB::select("call getUserAcceptedTraining(?,?)",array($post_array['training_id'],$post_array['fbaid']));

        $response['training_type'] = $result[0] -> training_type;
        $response['training_name'] = $result[0] -> training_name;
        $response['duration'] = $result[0] -> duration;
        $response['training_date'] = $result[0] -> training_date;
        $response['agenda'] = $result[0] -> agenda;
        $response['start_time'] = $result[0] -> start_time;
        $response['is_accepted'] = $result[0] -> is_accepted;
        $response['is_attended'] = $result[0] -> is_attended;

        echo json_encode($response);
    }

    public function upd_training_rejected_status(Request $request){

        $post_array = $request->all();

        DB::select("call upd_training_accepted_status(?,?,?,?)",array($post_array['training_id'],$post_array['reject_reason'],$post_array['fbaid'],'0'));

        $response = array('status'=>'success','alert_msg'=>'<font color="red">You Rejected this Training Invitation.</font>','resp_is_accepted'=>"<font color='red'><b>Rejected</b></font>");

        echo json_encode($response);
    }


    public function upd_training_accepted_status(Request $request){

        $post_array = $request->all();

        //// SMS Send Start
        $training_result = DB::select("call id_training_details(?)" ,array($post_array['training_id']));
        $result_mapped_fba = DB::select("call getFBAIDDetails(?)" , array($post_array['fbaid']));  

        if(count($result_mapped_fba) > 0){         //if FBAs are assigned to training then send them msg

            $param['training_type'] = $training_result[0] -> training_type;
            $param['training_event'] = 'confirmation of training';
            $param['training_id'] = $post_array['training_id'];
            $param['training_name'] = $training_result[0] -> training_name;
            $param['training_date'] = $training_result[0] -> training_date;
            $param['training_start_time'] = $training_result[0] -> start_time;
            $param['training_location_webx'] = $training_result[0] -> location;
            $param['training_result_mapped_fba'] = $result_mapped_fba;
            
            $this -> create_notification_log_insert_array($param);

            $m_param['training_id'] = $post_array['training_id'];
            $m_param['mode'] = 'sms';
            $m_param['training_event'] = 'confirmation of training';

            $this -> send_training_notification($m_param);
        }
        //// SMS Send End

        DB::select("call upd_training_accepted_status(?,?,?,?)",array($post_array['training_id'],'',$post_array['fbaid'],'1'));

        $response = array('status'=>'success','alert_msg'=>'<font color="green">You Accepted this Training Invitation</font>','resp_is_accepted'=>"<font color='green'><b>Accepted</b></font>");

        echo json_encode($response);
    }

    public function upd_training_attendance(Request $request){

        $post_array = $request->all();

         DB::select("call upd_training_attendance_status(?,?,?)",array($post_array['training_id'],$post_array['fbaid'],'1'));

        $response = array('status'=>'success','alert_msg'=>'<font color="green">Attendance Marked as "Present" Successfully.</font>');

        echo json_encode($response);
    }
}