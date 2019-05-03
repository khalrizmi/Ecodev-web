<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('example.dashboard');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'slider','middleware'=>'auth'],function(){
	Route::get('/','SlideController@index')->name('slide.index');
	Route::view('add','slides.add')->name('slide.add');
	Route::post('store','SlideController@store')->name('slide.store');
	Route::get('delete/{id}','SlideController@delete')->name('slide.delete');
	Route::get('edit/{id}','SlideController@edit')->name('slide.edit');
	Route::patch('update/{id}','SlideController@update')->name('slide.update');
});

Route::group(['prefix'=>'category','middleware'=>'auth'],function(){
	Route::get('/','CategoryController@index')->name('category.index');
	Route::view('add','category.add')->name('category.add');
	Route::post('store','CategoryController@store')->name('category.store');
	Route::get('delete/{id}','CategoryController@delete')->name('category.delete');
	Route::get('edit/{id}','CategoryController@edit')->name('category.edit');
	Route::patch('update/{id}','CategoryController@update')->name('category.update');
});

Route::group(['prefix'=>'words','middleware'=>'auth'],function(){
	Route::get('/','WordsController@index')->name('words.index');
	Route::view('add','words.add')->name('words.add');
	Route::post('store','WordsController@store')->name('words.store');
	Route::get('delete/{id}','WordsController@delete')->name('words.delete');
});

Route::group(['prefix'=>'member','middleware'=>'auth'],function(){
	Route::get('/','MemberController@index')->name('member.index');
});

Route::group(['prefix'=>'survey','middleware'=>'auth'],function(){
	Route::get('/','SurveyController@index')->name('survey.index');
	Route::get('/list/{id}','SurveyController@objek_list')->name('survey.objek');
});

Route::group(['prefix'=>'announcement','middleware'=>'auth'],function(){
	Route::get('/','AnnouncementController@index')->name('announcement.index');
	Route::view('add','announcement.add')->name('announcement.add');
	Route::post('store','AnnouncementController@store')->name('announcement.store');
});


