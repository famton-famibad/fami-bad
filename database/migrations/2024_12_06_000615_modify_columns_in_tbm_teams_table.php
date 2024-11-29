<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyColumnsInTbmTeamsTable extends Migration
{
    public function up()
    {
        Schema::table('tbm_teams', function (Blueprint $table) {
            $table->string('delegate', 30)->nullable()->change(); // varchar(10) → varchar(30)
            $table->string('sns1', 100)->nullable()->change();    // varchar(30) → varchar(100)
            $table->string('sns2', 100)->nullable()->change();    // varchar(30) → varchar(100)
            $table->string('sns3', 100)->nullable()->change();    // varchar(30) → varchar(100)
            $table->string('optional', 200)->nullable()->change(); // varchar(30) → varchar(200)
        });
    }

    public function down()
    {
        Schema::table('tbm_teams', function (Blueprint $table) {
            $table->string('delegate', 10)->nullable()->change(); // varchar(30) → varchar(10)
            $table->string('sns1', 30)->nullable()->change();    // varchar(100) → varchar(30)
            $table->string('sns2', 30)->nullable()->change();    // varchar(100) → varchar(30)
            $table->string('sns3', 30)->nullable()->change();    // varchar(100) → varchar(30)
            $table->string('optional', 30)->nullable()->change(); // varchar(200) → varchar(30)
        });
    }
}

