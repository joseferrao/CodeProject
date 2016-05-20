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
    return view('welcome');
});

Route::get('client', 			'ClientController@index');
Route::post('client', 			'ClientController@store');
Route::get('client/{id}', 		'ClientController@show');
Route::put('client/{id}', 		'ClientController@update');
Route::delete('client/{id}', 	'ClientController@destroy');

Route::get('project/{id}/note', 			'ProjectNotesController@index');
Route::post('project/{id}note', 			'ProjectNotesController@store');
Route::get('project/{id}/note/{noteId}', 	'ProjectNotesController@show');
Route::put('project/note/{id}', 			'ProjectNotesController@update');
Route::delete('project/note/{id}', 			'ProjectNotesController@destroy');

Route::get('project/{id}/tastks', 			'ProjectTaskController@index');
Route::post('project/{id}tastks', 			'ProjectTaskController@store');
Route::get('project/{id}/tastks/{taskId}', 	'ProjectTaskController@show');
Route::put('project/tastks/{id}', 			'ProjectTaskController@update');
Route::delete('project/tastks/{id}', 		'ProjectTaskController@destroy');

Route::get('project/', 			'ProjectController@index');
Route::post('project/', 			'ProjectController@store');
Route::get('project/{id}', 		'ProjectController@show');
Route::put('project/{id}', 		'ProjectController@update');
Route::delete('project/{id}', 	'ProjectController@destroy');


Route::get('user', function(){
	return \VulpeProject\Entities\User::all();
});

