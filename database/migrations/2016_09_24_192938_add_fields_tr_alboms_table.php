<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsTrAlbomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alboms', function (Blueprint $table) {
            $table->string('tr_type')->after('albom_type');
            $table->string('tr_name')->after('albom_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alboms', function (Blueprint $table) {
            //
        });
    }
}
