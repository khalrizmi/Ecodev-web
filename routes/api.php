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

Route::group(['prefix'=>'slide'],function(){
	Route::get('list','SlideController@list_api')->name('slider.api');
});

Route::group(['prefix'=>'category'],function(){
	Route::get('list','CategoryController@list_api')->name('slider.api');
});

Route::group(['prefix'=>'member'],function(){
	Route::get('register','MemberController@register')->name('member.index');
	Route::post('login','MemberController@login')->name('member.api.login');
	Route::get('check/{id}','MemberController@check');
});

Route::group(['prefix'=>'objek'],function(){
	Route::post('add','ObjekController@store');
	Route::get('list/{id}','ObjekController@list');
	Route::get('list_survey/{id}','ObjekController@list_survey');
	Route::get('verified/{id}','ObjekController@verified');
	Route::get('delete/{id}','ObjekController@delete_api');
});

Route::group(['prefix'=>'survey'],function(){
	Route::get('list_maps/{as}/{string_data}','SurveyController@list_maps_user');
	Route::get('list/{id}','SurveyController@list_api');
	Route::post('add','SurveyController@store');
});

Route::group(['prefix'=>'website'],function(){
	Route::post('add','WebsiteController@add');
	Route::get('list/{id}','WebsiteController@list_api');
	Route::get('delete/{id}','WebsiteController@delete');
});


