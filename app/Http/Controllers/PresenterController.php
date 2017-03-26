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

    /**
     * replace path to medium image.
     *
     * @param  string  $path
     * @return string
     */
    public function mediumimg($path)
    {
        return str_replace('.jpg', '-medium.jpg', $path);
    }

    /**
     * replace path to small image.
     *
     * @param  string  $path
     * @return string
     */
    public function smallimg($path)
    {
        return str_replace('.jpg', '-small.jpg', $path);
    }
}
