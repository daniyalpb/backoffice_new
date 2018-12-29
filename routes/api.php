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
Route::post('send-notification','SendnotificationapiController@sendnotification');
Route::get('send-db-notification','SendnotificationapiController@senddbnotification');
Route::get('capture-loan-data','CaptureloandataController@getloandata');
route::get('send-todays-sms','SendtodaysmsandmailController@getsmsview');
route::get('send-todays-mail','SendtodaysmsandmailController@sendtodaysmail');
Route::post('Fbadetails','FbadetailsapiController@getfbadata');
Route::post('updat-fba-data','update_fba_dataController@update_fba_data');
