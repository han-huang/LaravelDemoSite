<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('author_id');
            $table->string('author');
            $table->unsignedInteger('news_category_id');
            $table->string('tag')->nullable();
            $table->string('title');
            $table->string('seo_title')->nullable();
            $table->text('excerpt')->nullable();
            $table->mediumText('body');
            $table->string('image')->nullable();
            $table->string('slug')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->enum('status', ['PUBLISHED', 'DRAFT', 'PENDING'])->default('DRAFT');
            $table->unsignedInteger('active')->default(1);
            $table->boolean('featured')->default(0);
            $table->timestamps();
            $table->foreign('news_category_id')->references('id')->on('news_categories')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_posts');
    }
}
