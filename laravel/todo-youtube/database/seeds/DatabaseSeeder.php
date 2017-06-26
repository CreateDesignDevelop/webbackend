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
        $this->call('UsersTableSeeder');
        $this->call('ItemsTableSeeder');
    }
}


