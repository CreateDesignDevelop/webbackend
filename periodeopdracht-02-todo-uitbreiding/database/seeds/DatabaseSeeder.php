<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use database\seeds\UsersTableSeeder;
use database\seeds\ItemsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
        * does not work properly, instead copy run method from users- itemstable in here
        *
        * 
        */
        //$this->call('UsersTableSeeder');
        //$this->call('ItemsTableSeeder');
/*
        DB::table('items')->delete();
        $items = array(
            array(
                'owner_id' => 1,
                'name' => 'Pick up milk',
                'done' => false
            ),
            array(
                'owner_id' => 1,
                'name' => 'Walk the dogs',
                'done' => true
            ),
            array(
                'owner_id' => 1,
                'name' => 'Cook dinner',
                'done' => false
            )
        );
        DB::table('items')->insert($items);
*/
/*
        DB::table('users')->delete();
        //seed data in table
        $users = array(
            array(
                'email' => 'TestPersoon1@test.be',
                'password' => Hash::make('testpersoon1'),                
            )
        );
        DB::table('users')->insert($users);        
*/    
    }
}


