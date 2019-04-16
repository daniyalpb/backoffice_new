<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('test','UserController@data');
Route::post('sales-material','ApiController@sales_material');
//shubham start
Route::post('send-notification','SendnotificationapiController@sendnotification');
Route::get('send-db-notification','SendnotificationapiController@senddbnotification');
Route::get('capture-loan-data','CaptureloandataController@getloandata');
route::get('send-todays-sms','SendtodaysmsandmailController@getsmsview');
route::get('send-todays-mail','SendtodaysmsandmailController@sendtodaysmail');
Route::post('Fbadetails','FbadetailsapiController@getfbadata');
Route::post('updat-fba-data','update_fba_dataController@update_fba_data');
Route::post('Crmfollowup','FbadetailsapiController@getcrmfollowup');
Route::post('Crm_my_follow_up','FbadetailsapiController@getcrmhistory');
Route::post('Crm_others_follow_up','FbadetailsapiController@getothersfollowup');
Route::post('Crm_comment','FbadetailsapiController@getcrmcomment');
Route::post('Crm_comment_insert','FbadetailsapiController@insertcrmcomment');
Route::post('Crm_child_followup','FbadetailsapiController@getchildfolloup');
Route::post('Check_disposition','FbadetailsapiController@checkdisposition');
route::post('My_follow_up','FbadetailsapiController@getmyfollowup');
Route::post('get-crm-role','getcrmroleController@crm_role');
Route::post('crm_disposition','getcrmroleController@get_crm_disposition');
Route::post('Send_break_in_mail_n_notification','SendbreakinnotificationController@sendnotification');
Route::post('Break_in_notification','BreakinpolicybossapiController@sendnotification');
Route::post('Break_In_Notification_Count','FbadetailsapiController@Break_in_notification_count');
Route::post('Break_in_all_notification','FbadetailsapiController@get_all_notification');
Route::post('update_is_read','FbadetailsapiController@updateisread');
//shubham end
//---------------------Nitin start--------------------------
Route::post('search-lead-assign-to-employee','Api\SearchLeadAssignToEmployeeController@searchleadassigntoemployee');
Route::post('save-Lead-crm-history','Api\SearchLeadAssignToEmployeeController@saveLeadcrmhistory');
Route::post('save-lead-crm-follow-up','Api\SearchLeadAssignToEmployeeController@saveleadcrmfollowup');
Route::post('get-lead-crm-disposition','Api\SearchLeadAssignToEmployeeController@getleadcrmdisposition');
Route::post('update-twenty-four-vehicle-request','Api\UpdateTwentyFourVehicleRequestController@UpdateTwentyFourVehicleRequest');
Route::post('save-lead-crm-type-history','Api\SearchLeadAssignToEmployeeController@saveleadcrmtypehistory');

Route::post('get-followup-lead-crm','Api\SearchLeadAssignToEmployeeController@getfollowupleadcrm');

Route::post('get-followup-close-lead-crm','Api\SearchLeadAssignToEmployeeController@getfollowupcloseleadcrm');
//---------------------Nitin end--------------------------