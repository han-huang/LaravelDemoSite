<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsArticles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('author');
            $table->unsignedInteger('news_category_id');
            $table->string('tag')->nullable();
            $table->string('title')->nullable();
            $table->foreign('news_category_id')->references('id')->on('news_categories')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('active')->default(1);
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
        Schema::dropIfExists('news_articles');
    }
}
