<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClickCounter extends Model
{
    protected $table = 'click_counter';

    protected $fillable = [
        'url', 'session_id', 'client_ip', 'count',
    ];
}
