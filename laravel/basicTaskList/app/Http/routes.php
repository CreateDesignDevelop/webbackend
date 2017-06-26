<?php

use App\Task;
use Illuminate\Http\Request;

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

/*
Route::get('/', function () {
    return view('welcome');
});
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
*/

Route::group(['middleware' => ['web']], function () {
    //We'll wrap all of these routes in the web middleware so they have session state and CSRF protection
	Route::get('/', function () {

        //The view function accepts a second argument which is an array of data that will be made available to the view,
	    $tasks = Task::orderBy('created_at', 'asc')->get();

        return view('tasks', [
            'tasks' => $tasks
        ]);
	    // resources/views/layouts/app.blade.php
	    // resources/views/tasks.blade.php
	});

    Route::post('/task', function(Request $request){
    	$validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
                //->withErrors($validator) call will flash the errors from the given validator instance into the session so that they can be accessed via the $errors variable in our view.
        }
        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return redirect('/');

    });

    Route::delete('/task/{task}', function(Task $task){
    	$task->delete();
        return redirect('/');
    });
});
