<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookTranslator extends Model
{
    protected $guarded = [];

    protected $table = 'booktranslators';

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_booktranslator');
    }
}
