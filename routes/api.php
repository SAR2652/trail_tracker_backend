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
Route::post('register', 'UserAPIController@register');
Route::post('login', 'UserAPIController@authenticate');

Route::get('stream',  'APIController@streamVideo')->name('stream');
Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user', 'UserAPIController@getAuthenticatedUser');
    Route::get('getCameraList', 'APIController@getCameraList');
});
