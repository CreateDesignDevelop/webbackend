<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
	public function run(){
		DB::table('users')->delete();

		//seed data in table
		$users = array(
			array(
				'name' => 'TestPersoon1',
				'password' => Hash::make('testpersoon1'),
				'email' => 'TestPersoon1@test.be'
			)
		);

		DB::table('users')->insert($users);
	}
}