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

Route::get('main','mainController@index');

//Route::get('welcome','WelcomeController@index');







Route::get('test','testController@daa');

Route::get('taskAssign','taskAssignController@index');







Route::post('taskAssign','taskAssignController@add');
Route::get('taskAssign','taskAssignController@abc');




//Form request:: POST action will trigger to controller



//////rahu

Route::get('taskAssign','taskAssignController@index');
Route::get('taskAssign','taskAssignController@abc');
Route::post('taskAssign','taskAssignController@add');
Route::post('taskAssign','taskAssignController@addtask');
Route::post('LostFound','LostFoundController@addlost');
Route::get('LostFound','LostFoundController@lostview');



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
