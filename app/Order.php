<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class Order extends Model
{
    protected $guarded = [];

    protected $table = 'orders';

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_order')
                   ->withPivot('book_quantity', 'sales_discount', 'sale_price');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function receiver()
    {
        return $this->belongsTo('App\Receiver');
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
    public function scopeClientid(Builder $query, $id)
    {
        return $query->where('client_id', $id);
    }

    /**
     * Scope a query to specific id scopes.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  integer $id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastmonth(Builder $query)
    {
        return $query->where('created_at', '>=', Carbon::now()->subMonth());
    }

    /**
     * Scope a query to select brief columns.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSelectbrief(Builder $query)
    {
        return $query->select(
            'id',
            'order_no',
            'created_at',
            'deliver',
            'payment_method',
            'amount',
            'status'
        );
    }

    /**
     * Get orders of last month.
     *
     * @param  integer $client_id
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function lastMonthOrders($client_id)
    {
        return $this->selectbrief()->clientid($client_id)->active()
                   ->lastmonth()->get();
    }

    /**
     * Get Details of order.
     *
     * @param  integer $order_id
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getDetails($order_id)
    {
        return $this->find($order_id)->books()->get();
    }
}
