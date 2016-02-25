<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('visits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('symptoms');
            $table->string('allergies');
            $table->string('height');
            $table->string('weight');
            $table->date('date');
            $table->time('time');
            $table->time('end_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('visits');
    }
}
