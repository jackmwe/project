<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Kalnoy\Nestedset\Nestedset;

class CreateLibrariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libraries', function (Blueprint $table) {
             $table->increments('id');
            $table->string('name');
            $table->string('phone');
            $table->string('title');
            $table->string('author');
            $table->integer('category_id');
            $table->text('description');
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
        // NestedSet::dropColumns($table);
        Schema::drop('libraries');
    }
}
