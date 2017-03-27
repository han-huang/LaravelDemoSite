<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Order extends Model
{
    protected $guarded = [];

    protected $table = 'orders';

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_order');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function receiver()
    {
        return $this->belongsTo('App\Receiver');
    }
}
