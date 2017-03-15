<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('/user');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware'=>'HQ'], function(){
	Route::post('/updateAjax', ['uses'=>'UserController@updateAjax']);
	Route::resource('/user', 'UserController');

});

Route::group(['middleware'=>'franchiseeMW'], function(){

	#Custom route
	Route::post('/changeFranchisee', ['uses'=>'StudentController@changeFranchisee']);
	Route::delete('/bulkDelete', ['uses'=>'StudentController@bulkDelete']);

	Route::post('/spamStudent', ['uses'=>'StudentController@spamStudent']);

	Route::resource('/student', 'StudentController');

});