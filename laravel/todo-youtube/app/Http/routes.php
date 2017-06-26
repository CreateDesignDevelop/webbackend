<?php
use App\Item;
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
|'as' is an allias
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
		'middleware' => 'guest' to make sure a logged in person is staying logged in
*/

Route::group(['middleware' => ['web']], function () {

	Route::bind('task', function($value, $route){
		//return the correct item to delete where id equals value, and return the first
		return Item::where('id', $value)->first();
		//we return an object Item and give it to the getDelete function
	});

    Route::get('/', array('as' => 'home', 'uses' => 'HomeController@getIndex'));
    Route::post('/', array('uses' => 'HomeController@postIndex'));

    Route::get('/new', array('as' => 'new', 'uses' => 'HomeController@getNew'));
    Route::post('/new', array('uses' => 'HomeController@postNew'));

    Route::get('/delete/{task}', array('as' => 'delete', 'uses' => 'HomeController@getDelete'));

	Route::get('/login', array('as' => 'login', 'middleware' => 'guest', 'uses' => 'AuthController@getLogin'));
	Route::post('/login', array('uses' => 'AuthController@postLogin'));
});
