<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller{
	
	public function getLogin(){
		return view('login');
	}
	public function postLogin(){
		$rules = array('username'=>'required', 'password'=>'required');
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('login')->withErrors($validator);
		}

		//laravel will detect that it needs to be hashed and does it automatically
		//the false property is if you have a 'remember me' select button, but we don't have that
		$auth = Auth::attempt(array(
			'name' => Input::get('username'),
			'password' => Input::get('password')
		), false);

		//error message
		if (!$auth) {
			return Redirect::to('login')->withErrors(array(
				'Invalid credentials were provided'
			));
		}

		return Redirect::route('home');
	}
}