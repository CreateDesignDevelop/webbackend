<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Input;
use App\Item;
use Redirect;
use Validator;

class TodoController extends BaseController{

	public function getIndex(){

		//if there is no user signed in
		if (!Auth::user()) {
			return Redirect::route('login');
		}

		$items = Auth::user()->items;

		return view('todo', array(
			'items' => $items
		));
	}

	public function postIndex(){
		$id = Input::get('id');

		//findOrFail is a method provided by Eloquent (in item model)
		$item = Item::findOrFail($id);

		if ($item->owner_id == Auth::user()->id) {
			//only mark it when the logged in user is the owner
			$item->mark();
		}		
		return Redirect::route('todo');
	}

	public function getNew(){
		return view('new');
	}

	public function postNew(){
		$rules = array(
			//name is required and minimum characters is 3 and max characters is 255
			'name' => 'required|min:3|max:255'
		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::route('new')->withErrors($validator);
		}

		//make new item and save new values to database
		$item = new Item;
		$item->name = Input::get('name');
		$item->owner_id = Auth::user()->id;
		$item->save();

		return Redirect::route('todo');
	}
	
	public function getDelete(Item $task){
		//echo $task;
		//security, make sure that the correct user deletes this task
		if ($task->owner_id == Auth::user()->id) {
			$task->delete();
		}
		return Redirect::route('todo');
	}
}