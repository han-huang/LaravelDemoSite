<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsArticle extends Model
{
    protected $table = 'news_articles';

    protected $fillable = [
        'author', 'tag', 'title', 'news_category_id', 'active',
    ];

    /**
     * Get NewsArticleContent.
     */
    public function newsArticleContent()
    {
        return $this->hasMany('App\NewsArticleContent', 'news_article_id');
    }

    /**
     * Get NewsCategory.
     */
    public function newsCategory()
    {
        return $this->belongsTo('App\NewsCategory', 'news_category_id');
    }
}
