<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('notes')->insert([
            'doctor_id' => '1',
            'subject' => 'Large Growth',
            'body' => 'Client #23584 has a large growth which I was unable to identify. I gave him some T3\'s and sent him on his way.',
        ]);

        DB::table('notes')->insert([
            'doctor_id' => '1',
            'subject' => 'Cancer',
            'body' => 'Client #23584 has cancer. I don\'t know how to tell him. He just started a family. It would ruin him.',
        ]);

        DB::table('notes')->insert([
            'doctor_id' => '1',
            'subject' => 'Cancer',
            'body' => 'I told client #23584 he has cancer. He seemed to take it well. Almost too well...He left without saying much.',
        ]);

        DB::table('notes')->insert([
            'doctor_id' => '1',
            'subject' => 'Cancer',
            'body' => 'Client #23584 came with a gun today. He was shouting for me, but I hid from him in my office until the police took him down. Poor guy.',
        ]);

        DB::table('notes')->insert([
            'doctor_id' => '1',
            'subject' => 'Stress',
            'body' => 'The stress of this job is killing me. It weighs down on me like a crushing boulder. I don\'t think I can continue this much longer without going mad.',
        ]);

        DB::table('notes')->insert([
            'doctor_id' => '1',
            'subject' => 'Quote of the Day',
            'body' => '"I would rather die a meaningful death than to live a meaningless life." - Corazon Aquino',
        ]);

        DB::table('notes')->insert([
            'doctor_id' => '1',
            'subject' => 'Client #85748',
            'body' => 'A young boy I saved in the ER last week came to me today. He thanked me and gave me a hug. Maybe I am doing the right thing.',
        ]);

        DB::table('notes')->insert([
            'doctor_id' => '4',
            'subject' => 'Patient Thought',
            'body' => 'If her DNA was off by one percentage point, she\'d be a dolphin.',
        ]);

        DB::table('notes')->insert([
            'doctor_id' => '3',
            'subject' => 'Captain\'s Log #4239',
            'body' => 'He\'s dead Jim.',
        ]);

        DB::table('notes')->insert([
            'doctor_id' => '5',
            'subject' => '@!*#^@*$',
            'body' => 'HOW CAN I BE CALM WHEN I HOLD ANOTHER PERSON\'S LIFE IN MY HANDS!?',
        ]);
    }
}
