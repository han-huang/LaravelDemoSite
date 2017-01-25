<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsArticleContent extends Model
{
    protected $table = 'news_articles_content';

    protected $fillable = [
        'news_article_id', 'title', 'type', 'img', 'url',, 'text', 'video', 'active', 'order',
    ];
    
    /**
     * Get newsArticle.
     */
    public function newsArticle()
    {
        return $this->belongsTo('App\NewsArticle', 'news_article_id');
    }
}
