<?php

use Illuminate\Database\Seeder;

class MedicationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('medication')->insert([
            'quantity' => '10',
            'name' => 'Cialis',
        ]);

        DB::table('medication')->insert([
            'quantity' => '5',
            'name' => 'Ibuprofen',
        ]);

        DB::table('medication')->insert([
            'quantity' => '15',
            'name' => 'Lasix',
        ]);

        DB::table('medication')->insert([
            'quantity' => '20',
            'name' => 'Morphine',
        ]);

        DB::table('medication')->insert([
            'quantity' => '14',
            'name' => 'OxyContin',
        ]);

        DB::table('medication')->insert([
            'quantity' => '2',
            'name' => 'Prozac',
        ]);

        DB::table('medication')->insert([
            'quantity' => '8',
            'name' => 'Valium',
        ]);

        DB::table('medication')->insert([
            'quantity' => '18',
            'name' => 'Xanax',
        ]);
    }
}
