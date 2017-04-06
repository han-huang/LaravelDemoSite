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

    /**
     * show Stock of Book.
     *
     * @param  integer  $stock
     * @return string
     */
    public function showBookStock($stock)
    {
        if($stock > 10) {
            $span = '<span>&nbsp;&gt;&nbsp;</span><span class="deeporange-color">10</span>';
        } elseif($stock <= 10) {
            $span = "<span >&nbsp;&equals;&nbsp;</span><span class='deeporange-color'>".$stock."</span>";
        }
        return $span;
    }

    /**
     * show Session
     *
     * @param  integer  $name
     * @return string
     */
    public function showSession($name)
    {
		$str = "";
        if (session()->has($name))
			$str = session()->get($name);

		if(!is_null(old($name)))
			$str = old($name);

        return $str;
    }
}
