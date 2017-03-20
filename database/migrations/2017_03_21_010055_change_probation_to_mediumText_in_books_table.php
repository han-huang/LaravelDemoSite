<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeProbationToMediumTextInBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            // $table->mediumText('probation')->change(); //not work
            DB::statement('ALTER TABLE `books` CHANGE `probation` `probation` MEDIUMTEXT NULL DEFAULT NULL;');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            DB::statement('ALTER TABLE `books` CHANGE `probation` `probation` TEXT NULL DEFAULT NULL;');
        });
    }
}
