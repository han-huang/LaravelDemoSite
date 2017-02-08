<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Log;

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
     * Scope a query to only active scopes.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive(Builder $query)
    {
        // Log::info('active '.__FILE__." ".__FUNCTION__." ".__LINE__);
        return $query->where('active', 1);
    }

    /**
     * Scope a query to find id.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFindid(Builder $query, $id)
    {
        // Log::info('active '.__FILE__." ".__FUNCTION__." ".__LINE__);
        return $query->where('id', '=', $id);
    }

    /**
     * Scope a query to select brief index.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSelectbrief(Builder $query)
    {
        // Log::info('select brief index '.__FILE__." ".__FUNCTION__." ".__LINE__);
        return $query->select(['id', 'news_category_id', 'title', 'updated_at']);
    }

    /**
     * Scope a query to order by updated_at desc.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUpdatedtimedesc(Builder $query)
    {
        // Log::info('order by updated_at desc '.__FILE__." ".__FUNCTION__." ".__LINE__);
        return $query->orderBy('updated_at', 'desc');
    }

    /**
     * Scope a query to get limited rows.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeGetlimit(Builder $query, $offset = 0, $limit = 10)
    {
        // Log::info('get limited rows '.__FILE__." ".__FUNCTION__." ".__LINE__);
        return $query->offset($offset)->limit($limit);
    }

    /**
     * Scope a query to get news page.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNewspage(Builder $query, $offset = 0, $limit = 10)
    {
        // Log::info('get news page '.__FILE__." ".__FUNCTION__." ".__LINE__);
        return $query->selectbrief()->active()->published()
		           ->updatedtimedesc()->getlimit($offset, $limit);
    }

    /**
     * Scope a query to get news article.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param $id
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNewsarticle(Builder $query, $id)
    {
        // Log::info('get news article, $id: '.$id." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        return $query->findid($id)->active()->published();
    }

    /**
     * Scope a query to count news article.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNewscount(Builder $query)
    {
        // Log::info('count news article '.__FILE__." ".__FUNCTION__." ".__LINE__);
        return $query->active()->published()->count();
    }

    /**
     * Get NewsCategory.
     */
    public function newsCategory()
    {
        return $this->belongsTo('App\NewsCategory', 'news_category_id');
    }
}
