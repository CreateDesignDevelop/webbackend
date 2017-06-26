<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    // task Routes...
	Route::auth();
	Route::get('/tasks', 'TaskController@index');
	Route::post('/task', 'TaskController@store');
	Route::delete('/task/{task}', 'TaskController@destroy');

	// Registration Routes...
	Route::get('/register', 'Auth\AuthController@getRegister');
	Route::post('/register', 'Auth\AuthController@postRegister');
});
