<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TermsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('terms')->insert([
            'name' => 'Cancer',
            'description' => 'Cancer is a group of diseases invloving abnormal cell growth with the potential to invade or spread to other parts of the body.',
        ]);

        DB::table('terms')->insert([
            'name' => 'HIV/AIDS',
            'description' => 'Numan immunodeficiency virus infection and acquired immune deficiency syndrome (HIV/AIDS), is a spectrum of conditions caused by infection with the human immunodeficiency virus.',
        ]);

        DB::table('terms')->insert([
            'name' => 'Asphyxia',
            'description' => 'Too little oxygen and too much carbon dioxide in the blood of the foetus or baby.',
        ]);

        DB::table('terms')->insert([
            'name' => 'Blood Pressure',
            'description' => 'The pressure generated in the bodys arteries by the pumping of the heart.',
        ]);

        DB::table('terms')->insert([
            'name' => 'ECG (Electrocardiogram)',
            'description' => 'A graph showing the hearts electrical activity.',
        ]);

        DB::table('terms')->insert([
            'name' => 'EEG (Electroencephalogram)',
            'description' => 'A graph showing the brains electrical activity.',
        ]);

        DB::table('terms')->insert([
            'name' => 'Glucose Monitor',
            'description' => 'A machine that can measure the amount of glucose (sugars) in the blood.',
        ]);

        DB::table('terms')->insert([
            'name' => 'Hypoglycaemia',
            'description' => 'Abnormaly low blood glucose level.',
        ]);

        DB::table('terms')->insert([
            'name' => 'Hypothermia',
            'description' => 'When the body temperature drops below 35.5C (95F).',
        ]);

        DB::table('terms')->insert([
            'name' => 'Hypoxia',
            'description' => 'Abnormally low amount of oxygen in the body tissues.',
        ]);

        DB::table('terms')->insert([
            'name' => 'Incubator',
            'description' => 'A heated bed covered by a clear plastic box that allows the baby to be kept warm without clothes so that they can be monitored.',
        ]);

        DB::table('terms')->insert([
            'name' => 'Intravenous (IV) lines',
            'description' => 'The fine tubes that are sometimes inserted into a blood vessel to give fluid or medicine directly.',
        ]);

        DB::table('terms')->insert([
            'name' => 'Morphine',
            'description' => 'A drug used to reduce discomfort and stress, but mainly as a pain relief.',
        ]);
    }
}