<?php

use Illuminate\Database\Seeder;

class calendarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$date = new Date();
        DB::table('calendar')->insert([
            'event_id' => '1456245067391',
            'title' => 'Seminar - John Doe',
            'start_time' => 'Wed Feb 24 2016 11:30:00 GMT+0000',
            'end_time' => 'Wed Feb 24 2016 12:30:00 GMT+0000',
            'client_id' => 'john@doe.com',
            'client_name' => 'John Doe',
        ]);

        DB::table('calendar')->insert([
            'event_id' => '1456245067401',
            'title' => 'Checkup - Jane Doe',
            'start_time' => 'Wed Feb 25 2016 9:30:00 GMT+0000',
            'end_time' => 'Wed Feb 25 2016 12:30:00 GMT+0000',
            'client_id' => 'jane@doe.com',
            'client_name' => 'Jane Doe',
        ]);

        DB::table('calendar')->insert([
            'event_id' => '1456245067501',
            'title' => 'x-Ray - Jane Doe',
            'start_time' => 'Thu Feb 25 2016 13:30:00 GMT+0000',
            'end_time' => 'Thu Feb 25 2016 14:30:00 GMT+0000',
            'client_id' => 'jane@doe.com',
            'client_name' => 'Jane Doe',
        ]);

    }
}
