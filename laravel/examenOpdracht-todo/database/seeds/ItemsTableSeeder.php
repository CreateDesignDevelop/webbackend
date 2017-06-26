<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder{
	public function run(){
		DB::table('items')->delete();

		$items = array(
			array(
				'owner_id' => 1,
				'name' => 'Pick up milk',
				'done' => 0
			),
			array(
				'owner_id' => 1,
				'name' => 'Walk the dogs',
				'done' => 1
			),
			array(
				'owner_id' => 1,
				'name' => 'Cook dinner',
				'done' => 0
			)
		);

		DB::table('items')->insert($items);
	}
}