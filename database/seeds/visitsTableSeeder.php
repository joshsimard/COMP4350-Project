<?php

use Illuminate\Database\Seeder;

class visitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('visits')->insert([
            'userid' => '2',
            'email' => 'jane@doe.com',
            'symptoms' => 'Mild headache',
            'allergies' => 'nuts',
            'height' => '170',
            'weight' => '250',
            'date' => '2016-02-25',
            'time' => '13:00:00',
            'end_time' => '13:30:00',
        ]);

        DB::table('visits')->insert([
            'userid' => '6',
            'email' => 'mohamed@nassar.com',
            'symptoms' => 'Back pain',
            'allergies' => 'fruits',
            'height' => '190',
            'weight' => '550',
            'date' => '2016-02-21',
            'time' => '13:00:00',
            'end_time' => '14:30:00',
        ]);

        DB::table('visits')->insert([
            'userid' => '7',
            'email' => 'maria@velasquez.com',
            'symptoms' => 'Rashes',
            'allergies' => 'vaccine',
            'height' => '120',
            'weight' => '150',
            'date' => '2016-02-24',
            'time' => '13:00:00',
            'end_time' => '13:30:00',
        ]);
    }
}
