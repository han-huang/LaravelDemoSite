<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsArticlesContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_articles_content', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('news_article_id');
            $table->foreign('news_article_id')->references('id')->on('news_articles')
                ->onDelete('cascade')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->string('type');
            $table->string('img')->nullable();
            $table->string('url')->nullable();
            $table->mediumText('text')->nullable();
            $table->string('video')->nullable();
            $table->unsignedInteger('active')->default(1);
            $table->unsignedInteger('order');
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
        Schema::dropIfExists('news_articles_content');
    }
}
