<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use DB;

class ClickCounter extends Model
{
    protected $table = 'click_counter';

    protected $fillable = [
        'url', 'session_id', 'client_ip', 'count',
    ];

    /**
     * Get max count of url.
     *
     * @param  string $url
     * @return integer
     */
    public function getURLcount($url)
    {
        return $this->where('url', '=', $url)->max('count');
    }

    /**
     * Scope a query to get limited rows.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  $offset
     * @param  $limit
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeGetlimit(Builder $query, $offset = 0, $limit = 10)
    {
        // Log::info('get limited rows '.__FILE__." ".__FUNCTION__." ".__LINE__);
        return $query->offset($offset)->limit($limit);
    }

    /**
     * Get max count of url.
     *
     * @param  string $url
     * @return integer
     */
    public function getHotNews()
    {
        return $this->select(DB::raw('url, MAX(count) as max_count'))
                   ->groupBy('url')->orderBy('max_count', 'desc')->getlimit(0, 8);
    }
}
