<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use DB;

class Book extends Model
{
    protected $guarded = [];

    protected $table = 'books';

    public function bookauthors()
    {
        return $this->belongsToMany(BookAuthor::class, 'book_bookauthor');
    }

    public function booktranslators()
    {
        return $this->belongsToMany(BookTranslator::class, 'book_booktranslator');
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
     * Scope a query to specific id scopes.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  integer $id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeId(Builder $query, $id)
    {
        return $query->where('id', $id);
    }

    /**
     * Scope a query to specific discount scopes.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  integer $id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDiscount(Builder $query, $discount)
    {
        return $query->where('discount', $discount)->updatedtimedesc();
    }

    /**
     * Scope a query to only suggest_new scopes.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNewarrival(Builder $query)
    {
        return $query->where('suggest_new', 1)
                   ->active()->getlimit(0, 8)
                   ->selectbrief()->updatedtimedesc();
    }

    /**
     * Scope a query to only suggest_hits scopes.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeHits(Builder $query)
    {
        return $query->where('suggest_hits', 1)
                   ->active()->getlimit(0, 8)
                   ->selectbrief()->updatedtimedesc();
    }

    /**
     * Scope a query to only editor_promotion scopes.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeEditor(Builder $query)
    {
        return $query->where('editor_promotion', 1)
                   ->active()->getlimit(0, 8)
                   ->selectbrief()->updatedtimedesc();
    }

    /**
     * Scope a query to only marketing_promotion scopes.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeMarketing(Builder $query)
    {
        return $query->where('marketing_promotion', 1)
                   ->active()->getlimit(0, 8)
                   ->selectbrief()->updatedtimedesc();
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
     * Scope a query to order by sold desc.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSold(Builder $query)
    {
        return $query->orderBy('sold', 'desc');
    }

    /**
     * Scope a query to order by publishing_date desc.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublishing(Builder $query)
    {
        return $query->orderBy('publishing_date', 'desc');
    }

    /**
     * Scope a query to select brief columns.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSelectbrief(Builder $query)
    {
        return $query->select('id', 'title', 'image');
    }

    /**
     * Scope a query to select sold column.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSelectsold(Builder $query)
    {
        return $query->select('id', 'title', 'image', 'publishing_date', 'sold');
    }

    /**
     * Scope a query to select brief columns.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSelectprice(Builder $query)
    {
        return $query->select('id', 'title', 'image', 'list_price', 'discount');
    }

    /**
     * Get active book.
     *
     * @param  integer $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getBook($id)
    {
        return $this->active()->find($id);
    }

    /**
     * Get Random book.
     *
     * @param  integer $count
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getRandom($count = 6)
    {
        return $this->selectbrief()->active()
                   ->orderBy(DB::raw('RAND()'))->take($count)->get();
    }

    /**
     * Get Ranking of New Arrival.
     * (order by publishing_date due to few sample data.
     *  The query period should be near term actually. -> use 'between and')
     *
     * @param  integer $count
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getRankingNew($count = 10)
    {
        return $this->selectsold()->active()
                   ->publishing()->sold()->take($count)->get();
    }

    /**
     * Get Ranking of Sold.
     *
     * @param  integer $count
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getRankingSold($count = 10)
    {
        return $this->selectsold()->active()
                   ->sold()->take($count)->get();
    }
}
