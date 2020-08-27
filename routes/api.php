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

Route::post('/getUpazila','AjaxController@getUpazila')->name('getUpazila');
Route::post('/getUnion','AjaxController@getUnion')->name('getUnion');
Route::post('/checkemail','AjaxController@checkEmail')->name('checkEmail');
Route::post('/imgremove','AjaxController@oldImageRemove')->name('imgRemove');