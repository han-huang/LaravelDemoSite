<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('pulbisher_name');
            $table->string('series')->nullable();
            $table->string('image')->nullable();
            $table->unsignedInteger('list_price');
            $table->tinyInteger('discount')->nullable();
            $table->unsignedInteger('stock')->nullable();
            $table->unsignedInteger('sold')->nullable();
            $table->unsignedInteger('page_numbers');
            $table->bigInteger('isbn-10')->default(0)->nullable();
            $table->bigInteger('isbn-13')->default(0)->nullable();
            $table->date('publishing_date')->nullable();
            $table->text('briefcontent')->nullable();
            $table->text('index')->nullable();
            $table->text('promote')->nullable();
            $table->text('probation')->nullable();
            $table->boolean('suggest_new')->default(0);
            $table->boolean('suggest_hits')->default(0);
            $table->boolean('editor_promotion')->default(0);
            $table->boolean('marketing_promotion')->default(0);
            $table->boolean('active')->default(1);
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
        Schema::dropIfExists('books');
    }
}
