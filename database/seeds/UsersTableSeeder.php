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

        DB::table('users')->insert([
            'firstName' => 'Leonard',
            'lastName' => 'McCoy',
            'email' => 'leonard@mccoy.com',
            'password' => bcrypt('password'),
            'admin' => '1',
            'firstEdit' => '0',
        ]);

        DB::table('users')->insert([
            'firstName' => 'Gregory',
            'lastName' => 'House',
            'email' => 'gregory@house.com',
            'password' => bcrypt('password'),
            'admin' => '1',
            'firstEdit' => '0',
        ]);

        DB::table('users')->insert([
            'firstName' => 'Kenzo',
            'lastName' => 'Tenma',
            'email' => 'kenzo@tenma.com',
            'password' => bcrypt('password'),
            'admin' => '1',
            'firstEdit' => '0',
        ]);

        DB::table('users')->insert([
            'firstName' => 'Mohamed',
            'lastName' => 'Nassar',
            'email' => 'mohamed@nassar.com',
            'password' => bcrypt('password'),
            'admin' => '0',
            'firstEdit' => '0',
        ]);

        DB::table('users')->insert([
            'firstName' => 'Maria',
            'lastName' => 'Velasquez',
            'email' => 'maria@velasquez.com',
            'password' => bcrypt('password'),
            'admin' => '0',
            'firstEdit' => '0',
        ]);

        DB::table('users')->insert([
            'firstName' => 'Alfred',
            'lastName' => 'Butterworth',
            'email' => 'alfred@butterworth.com',
            'password' => bcrypt('password'),
            'admin' => '0',
            'firstEdit' => '0',
        ]);

        DB::table('users')->insert([
            'firstName' => 'Yuka',
            'lastName' => 'Kinoshita',
            'email' => 'yuka@kinoshita.com',
            'password' => bcrypt('password'),
            'admin' => '0',
            'firstEdit' => '0',
        ]);

        DB::table('users')->insert([
            'firstName' => 'Shizuo',
            'lastName' => 'Heiwajima',
            'email' => 'shizuo@heiwajima.com',
            'password' => bcrypt('password'),
            'admin' => '0',
            'firstEdit' => '0',
        ]);

        DB::table('users')->insert([
            'firstName' => 'Koyomi',
            'lastName' => 'Araragi',
            'email' => 'koyomi@araragi.com',
            'password' => bcrypt('password'),
            'admin' => '0',
            'firstEdit' => '0',
        ]);

        DB::table('users')->insert([
            'firstName' => 'Ladd',
            'lastName' => 'Russo',
            'email' => 'ladd@russo.com',
            'password' => bcrypt('password'),
            'admin' => '0',
            'firstEdit' => '0',
        ]);

        DB::table('users')->insert([
            'firstName' => 'Asuka',
            'lastName' => 'Langley',
            'email' => 'asuka@langley.com',
            'password' => bcrypt('password'),
            'admin' => '0',
            'firstEdit' => '0',
        ]);

        DB::table('users')->insert([
            'firstName' => 'Fuko',
            'lastName' => 'Ibuki',
            'email' => 'fuko@ibuki.com',
            'password' => bcrypt('password'),
            'admin' => '0',
            'firstEdit' => '0',
        ]);

        DB::table('users')->insert([
            'firstName' => 'Misato',
            'lastName' => 'Katsuragi',
            'email' => 'misato@katsuragi.com',
            'password' => bcrypt('password'),
            'admin' => '0',
            'firstEdit' => '0',
        ]);
    }
}
