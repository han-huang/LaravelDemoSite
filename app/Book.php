<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
