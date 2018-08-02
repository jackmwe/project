<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('missions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name');
            $table->string('phone');
            $table->string('email');
            $table->string('regNo');
            $table->integer('yos');
            $table->string('et');
            $table->string('pstName');
            $table->string('pstPhone');
            $table->string('church');
            $table->integer('missioners');
            $table->string('county');
            $table->string('area');
            $table->integer('distance');
            $table->integer('fare');
            $table->string('substations');
            $table->string('rate');
            $table->string('facilities');
            $table->string('description');
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
        Schema::dropIfExists('missions');
    }
}
