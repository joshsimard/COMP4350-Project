<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userid');
            $table->string('firstName');
            $table->string('lastName');
            $table->date('dob');
            $table->string('email')->unique();
            $table->String('gender');
            $table->integer('height');
            $table->integer('weight');
            $table->String('mobileNum');
            $table->String('homeNum');
            $table->String('address');
            $table->String('city');
            $table->String('postalCode');
            $table->String('state');
            $table->String('country');
            $table->String('occupation');
            $table->String('maritalStatus');
            $table->String('nextOfKin');
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
        //
        Schema::drop('clients');
    }
}
