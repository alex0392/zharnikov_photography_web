<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alboms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('albom_name');
            $table->string('albom_type');
            $table->string('avatar');
            $table->string('number_of_photos');
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
        Schema::drop('alboms');
    }
}
