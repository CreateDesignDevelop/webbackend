<?php

namespace App;
use Eloquent;

//Item Model
class Item extends Eloquent{
	public function mark(){
		//toggle if this is done and false, mark it as true, otherwise false
		$this->done = $this->done ? false : true;
		
		//save to database
		$this->save();
	}
}