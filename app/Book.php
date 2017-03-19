<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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
     * Scope a query to only active scopes.
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
     * Get active book.
     *
     * @param  integer $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getBook($id)
    {
        // Log::info('get Latestnews '." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        // return $this->active()->id($id);
        return $this->active()->find($id);
    }
}
