<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Log;

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

    /**
     * Get NewsPost.
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function newsPost()
    {
        return $this->hasMany('App\NewsPost', 'news_category_id');
    }

    /**
     * Get active NewsPost.
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getNewsPostActive()
    {
        return $this->newsPost()->active();
    }

    /**
     * Get active and published NewsPost .
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getNewsPostActivePublished()
    {
        return $this->newsPost()->active()->published();
    }

    /**
     * Get index of active NewsPost .
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getNewsPostIndexActive()
    {
        return $this->newsPost()->selectbrief()
                   ->active();
    }

    /**
     * Get index of active and published NewsPost .
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getNewsPostIndexActivePublished()
    {
        return $this->newsPost()->selectbrief()
                   ->active()->published();
    }

    /**
     * Get index of active, published and limited NewsPost .
     *
     * @param  $offset
     * @param  $limit
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getNewsPostLimitIndexActivePublished($offset, $limit)
    {
        return $this->newsPost()->selectbrief()
                   ->active()->published()->updatedtimedesc()
                   ->getlimit($offset, $limit)->get();
    }

    /**
     * Get index of active, published and limited NewsPost and Join NewsCategory.
     *
     * @param  $offset
     * @param  $limit
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getNewsPostJoinNewsCategory($offset, $limit)
    {
        return $this->newsPost()
                   ->joinnewscategories()
                   ->selectjoined()
                   ->active()->published()->updatedtimedesc()
                   ->getlimit($offset, $limit)->get();
    }

    /**
     * count active and published NewsPost .
     *
     * @return integer
     */
    public function countNewsPostActivePublished()
    {
        return $this->newsPost()->active()
                   ->published()->count();
    }

    /**
     * Get an active row of specific id in NewsPost.
     *
     * @param  $id
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getNewsPostActiveId($id)
    {
        return $this->newsPost()->active()->where('id', '=', $id);
    }

    /**
     * Get an active and published row of specific id in NewsPost.
     *
     * @param  $id
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getNewsPostActivePublishedId($id)
    {
        return $this->newsPost()->active()->published()->where('id', '=', $id);
    }

    /**
     * Scope a query to Exclude Null color.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeExcludenullcolor(Builder $query)
    {
        return $query->select('label_class', 'color', 'title')->whereNotNull('color');
    }
}
