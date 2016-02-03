<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstName' => 'John',
            'lastName' => 'Doe',
            'email' => 'john@doe.com',
            'password' => bcrypt('password'),
            'admin' => '1',
            'firstEdit' => '0',
        ]);

        DB::table('users')->insert([
            'firstName' => 'Jane',
            'lastName' => 'Doe',
            'email' => 'jane@doe.com',
            'password' => bcrypt('password'),
            'admin' => '0',
            'firstEdit' => '0',
        ]);
    }
}
