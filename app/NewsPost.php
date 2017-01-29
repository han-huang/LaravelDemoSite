<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class NewsPost extends Model
{
    const PUBLISHED = 'PUBLISHED';

    protected $guarded = [];

    protected $table = 'news_posts';

    public function save(array $options = [])
    {
        // If no author has been assigned, assign the current user's id as the author of the post
        if (!$this->author_id && Auth::user()) {
            $this->author_id = Auth::user()->id;
        }

        parent::save();
    }

    public function author_id()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope a query to only published scopes.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished(Builder $query)
    {
        return $query->where('status', '=', static::PUBLISHED);
    }

    /**
     * Get NewsCategory.
     */
    public function newsCategory()
    {
        return $this->belongsTo('App\NewsCategory', 'news_category_id');
    }
}
