<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookAuthor extends Model
{
    protected $guarded = [];

    protected $table = 'bookauthors';

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_bookauthor');
    }
}
