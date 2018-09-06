<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNominationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nominations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('chair');
            $table->string('viceChair');
            $table->string('secretary');
            $table->string('viceSecretary');
            $table->string('treasurer');
            $table->string('prayerSecretary');
            $table->string('missionCordinator');
            $table->string('bsCordinator');
            $table->string('musicDirector');
            $table->string('technicalCordinator');
            $table->string('librarian');
            $table->string('orgSecretary');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('nominations');
    }
}
