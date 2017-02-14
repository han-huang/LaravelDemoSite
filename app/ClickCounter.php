<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
