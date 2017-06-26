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
		using middleware group for security reasons
*/

Route::group(['middleware' => ['web']], function () {

	Route::bind('task', function($value, $route){
		//return the correct item to delete where id equals value, and return the first
		return Item::where('id', $value)->first();
		//we return an object Item and give it to the getDelete function
	});

    Route::get('/', array('as' => 'home', 'uses' => 'HomeController@getIndex'));

    Route::get('/dashboard', array('as' => 'dashboard', 'uses' => 'dashBoardController@getIndex'));

    Route::get('/todo', array('as' => 'todo', 'uses' => 'TodoController@getIndex'));
    Route::post('/todo', array('uses' => 'TodoController@postIndex'));

    Route::get('/new', array('as' => 'new', 'uses' => 'todoController@getNew'));
    Route::post('/new', array('uses' => 'todoController@postNew'));

    Route::get('/delete/{task}', array('as' => 'delete', 'uses' => 'todoController@getDelete'));

	Route::get('/login', array('as' => 'login', 'middleware' => 'guest', 'uses' => 'AuthController@getLogin'));
	Route::post('/login', array('uses' => 'AuthController@postLogin'));

	Route::get('/logout', array('as' => 'logout','uses' => 'AuthController@getLogout'));

	Route::get('/register', array('as' => 'register', 'middleware' => 'guest', 'uses' => 'AuthController@getRegister'));
	Route::post('/register', array('uses' => 'AuthController@postRegister'));
});
