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

class DashBoardController extends BaseController{

	public function getIndex(){
		
		return view('dashboard');
	}
}