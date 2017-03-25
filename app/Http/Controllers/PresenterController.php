<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresenterController extends Controller
{
    /**
     * truncate string.
     *
     * @param  string  $str
     * @param  integer $length
     * @return string
     */
    public function truncate($str, $length = 15)
    {
        return mb_strlen($str, 'UTF-8') > $length ? mb_substr($str, 0, $length, 'UTF-8')." ..." : $str;
    }
}
