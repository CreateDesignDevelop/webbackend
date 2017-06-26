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
				'email' => 'TestPersoon1@test.be',
				'password' => Hash::make('testpersoon1'),
			)
		);

		DB::table('users')->insert($users);
	}
}