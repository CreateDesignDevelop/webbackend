<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Session;

//zelf geschreven authcontroller

class AuthController extends Controller{
	
	public function getLogin(){
		return view('login');
	}
	
	public function postLogin(){
		$rules = array('email'=>'required', 'password'=>'required|min:4|max:16');
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('login')->withErrors($validator);
		}

		//laravel will detect that it needs to be hashed and does it automatically
		//the false property is if you have a 'remember me' select button, but we don't have that
		$auth = Auth::attempt(array(
			'email' => Input::get('email'),
			'password' => Input::get('password')
		), false);

		//error message
		if (!$auth) {
			return Redirect::to('login')->withErrors(array(
				'Invalid credentials were provided'
			));
		}
		//make a flash messagen and delete session
		Session::flash('success', 'You have been successfully logged in!');
		return Redirect::route('dashboard');
	}

	public function getLogout(){
		Auth::logout();
		Session::flash('success', 'You have been successfully logged out!');
		return Redirect::route('home');
	}

	public function getRegister(){
		return view('register');
	}

	public function postRegister(){
		//make up rules, email required and unique within users table, and needs to be a email
		$rules = array('email'=>'required|unique:users|email', 'password'=>'required|min:4|max:16');
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::route('register')->withErrors($validator);
		}

		//make new user
		$user = new User;
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		$user->save();

		//emediatly login
		$auth = Auth::attempt(array(
			'email' => Input::get('email'),
			'password' => Input::get('password')
		), false);

		return Redirect::route('dashboard');
	}
}