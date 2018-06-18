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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['prefix'=>'admin'],function(){
    Route::get('/','WelcomeController@index');
    Route::get('/test','WelcomeController@test');
    //sys
    Route::get('/sys/func_list', 'SysController@func_list');
    Route::get('/sys/func_op/{app_id}', 'SysController@func_op');
    Route::any('/sys/func_post', 'SysController@func_post');
    Route::get('/sys/app_op/{id?}', 'SysController@app_op');
    Route::any('/sys/app_post', 'SysController@app_post');
    Route::any('/sys/app_edit/{id}', 'SysController@app_edit');
    Route::any('/sys/admin_list', 'SysController@admin_list');
});