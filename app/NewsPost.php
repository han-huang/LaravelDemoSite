<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use DB;
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
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished(Builder $query)
    {
        return $query->where('status', '=', static::PUBLISHED);
    }

    /**
     * Scope a query to only active scopes.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive(Builder $query)
    {
        return $query->where('active', 1);
    }

    /**
     * Scope a query to only breaking_news=1 scopes.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBreakingnews(Builder $query)
    {
        return $query->where('breaking_news', 1);
    }

    /**
     * Scope a query to only carousel=1 scopes.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCarousel(Builder $query)
    {
        return $query->where('carousel', 1);
    }

    /**
     * Scope a query to find id.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  integer $id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFindid(Builder $query, $id)
    {
        return $query->where('id', '=', $id);
    }

    /**
     * Scope a query to select brief index.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSelectbrief(Builder $query)
    {
        return $query->select('id', 'news_category_id', 'title', 'updated_at');
    }

    /**
     * Scope a query to select image.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSelectimage(Builder $query)
    {
        return $query->select('id', 'image', 'title', 'updated_at');
    }

    /**
     * Scope a query to order by updated_at desc.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUpdatedtimedesc(Builder $query)
    {
        return $query->orderBy('updated_at', 'desc');
    }

    /**
     * Scope a query to order by updated_at asc.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUpdatedtimeasc(Builder $query)
    {
        return $query->orderBy('updated_at', 'asc');
    }

    /**
     * Scope a query to get limited rows.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  integer $offset
     * @param  integer $limit
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeGetlimit(Builder $query, $offset = 0, $limit = 10)
    {
        return $query->offset($offset)->limit($limit);
    }

    /**
     * Scope a query to get news page.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  integer $offset
     * @param  integer $limit
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNewspage(Builder $query, $offset = 0, $limit = 10)
    {
        return $query->selectbrief()->active()->published()
                   ->updatedtimedesc()->getlimit($offset, $limit);
    }

    /**
     * Scope a query to get news article.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  integer $id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNewsarticle(Builder $query, $id)
    {
        return $query->joinnewscategories()->where('news_posts.id', '=', $id)
               ->active()->published()->articleselectjoined();
    }

    /**
     * Scope a query to get brief news.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  integer $id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNewsarticlebrief(Builder $query, $id)
    {
        return $query->selectbrief()->active()->published()->find($id);
    }

    /**
     * Scope a query to get latest news.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  integer $offset
     * @param  integer $limit
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLatestnews(Builder $query, $offset = 0, $limit = 8)
    {
        return $query->selectbrief()->active()->published()
                   ->updatedtimedesc()->getlimit($offset, $limit);
    }

    /**
     * Scope a query to select joined columns for article.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return integer
     */
    public function scopeArticleselectjoined(Builder $query)
    {
        return $query->select(
            'news_posts.*',
            'news_categories.title as cate_title',
            'news_categories.label_class',
            'news_categories.color'
        );
    }

    /**
     * Scope a query to count news article.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return integer
     */
    public function scopeNewscount(Builder $query)
    {
        return $query->active()->published()->count();
    }

    /**
     * Scope a query to Join news categories.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return integer
     */
    public function scopeJoinnewscategories(Builder $query)
    {
        return $query->join('news_categories', 'news_posts.news_category_id', '=', 'news_categories.id');
    }

    /**
     * Scope a query to select joined columns.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return integer
     */
    public function scopeSelectjoined(Builder $query)
    {
        return $query->select(
            'news_posts.id',
            'news_posts.news_category_id',
            'news_posts.title',
            'news_posts.updated_at',
            'news_categories.title as cate_title',
            'news_categories.label_class',
            'news_categories.color'
        );
    }

    /**
     * Get NewsCategory.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function newsCategory()
    {
        return $this->belongsTo('App\NewsCategory', 'news_category_id');
    }

    /**
     * NewsPost Join NewsCategory.
     *
     * @param  integer $offset
     * @param  integer $limit
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function newsPostJoinNewsCategory($offset = 0, $limit = 10)
    {
        return $this->joinnewscategories()
                   ->active()->published()->updatedtimedesc()
                   ->selectjoined()
                   ->getlimit($offset, $limit);
    }

    /**
     * Get news of ids.
     *
     * @param  array $ids
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getIDsnews($ids)
    {
        $ids_str = implode(",", $ids);
        return $this->selectbrief()->whereIn('id', $ids)->active()
                   ->published()->orderByRaw(DB::raw("FIELD(id, $ids_str)"));
    }

    /**
     * Get breaking news.
     *
     * @param  integer $limit
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getBreakingnews($limit = 10)
    {
        return $this->selectbrief()->breakingnews()
                   ->active()->published()
                   ->updatedtimedesc()->offset(0)->limit($limit);
    }

    /**
     * Get carousel.
     *
     * @param  integer $limit
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getCarousel($limit = 10)
    {
        return $this->selectimage()->carousel()
                   ->active()->published()
                   ->updatedtimedesc()->offset(0)->limit($limit);
    }

    /**
     * Get next id of news.
     *
     * @param  $updated_at
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getNext($updated_at)
    {
        return $this->selectbrief()->where('updated_at', '>', $updated_at)->active()
                   ->published()->updatedtimeasc()->offset(0)->limit(1);
    }

    /**
     * Get previous id of news.
     *
     * @param  $updated_at
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getPrevious($updated_at)
    {
        return $this->selectbrief()->where('updated_at', '<', $updated_at)->active()
                   ->published()->updatedtimedesc()->offset(0)->limit(1);
    }
}
