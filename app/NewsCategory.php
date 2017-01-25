<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $table = 'news_categories';

    protected $fillable = [
        'str', 'title', 'label_class', 'color',
    ];
	
    /**
     * Get NewsArticle.
     */
    public function newsArticle()
    {
        return $this->hasMany('App\NewsArticle', 'news_category_id');
    }
}
