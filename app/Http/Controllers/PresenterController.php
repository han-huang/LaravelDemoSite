<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

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
     * find Stock of Book.
     *
     * @param  integer  $book_id
     * @return string
     */
    public function findBookStock($book_id)
    {
        $book = Book::find($book_id);
        return $this->showBookStock($book->stock);
    }

    /**
     * find Stock of Book.
     *
     * @param  integer  $book_id
     * @return string
     */
    public function findBookStockVal($book_id)
    {
        $book = Book::find($book_id);
        return $book->stock;
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
            $span = '<p><span>庫存</span><span aria-label="大於">&nbsp;&gt;&nbsp;</span><span class="deeporange-color">10</span></p>';
        } elseif($stock <= 10 && $stock > 0) {
            $span = '<p><span>庫存</span><span aria-label="等於">&nbsp;&equals;&nbsp;</span><span class="deeporange-color">'.$stock.'</span></p>';
        } else {
            $span = '<p><span class="deeporange-color">目前已無庫存</span></p>';
        }
        return $span;
    }

    /**
     * show Session
     *
     * @param  string
     * @return string
     */
    public function showSession()
    {
        $args = func_get_args();
        $str = "";
        $strs = "";
        if (func_num_args()) {
            foreach ($args as $arg) {
                if (session()->has($arg))
                    $str = session()->get($arg);
                if (!is_null(old($arg)))
                    $str = old($arg);
                $strs .= $str;
            }
        }

        return $strs;
    }

    /**
     * show twzipcode
     *
     * @param  string
     * @return string
     */
    public function twzipcode()
    {
        $strs = "$('#twzipcode').twzipcode('set', {";
        if (!empty($this->showSession("zipcode"))) {
            $strs .= '"zipcode": "'.$this->showSession("zipcode").'",';
            if (!empty($this->showSession("addr_city")))
                $strs .= '"county": "'.$this->showSession("addr_city").'",';
            if (!empty($this->showSession("addr_area")))
                $strs .= '"district": "'.$this->showSession("addr_area").'",';
        } else
            return;

        $strs .= "});";
        return $strs;
    }

    /**
     * convert deliver to String
     *
     * @param  string  $val
     * @return string
     */
    public function deliver_str($val)
    {
        switch ($val) {
            case 'Home_Delivery':
                $str = "宅配";
                break;
            default:
                $str = "";
        }
        return $str;
    }

    /**
     * convert payment_methond to String
     *
     * @param  string  $val
     * @return string
     */
    public function payment_methond_str($val)
    {
        switch ($val) {
            case 'COD':
                $str = "貨到付款";
                break;
            default:
                $str = "";
        }
        return $str;
    }

    /**
     * convert invoice_type to String
     *
     * @param  string  $val
     * @return string
     */
    public function invoice_type_str($val)
    {
        switch ($val) {
            case 'paper':
                $str = "紙本發票";
                break;
            default:
                $str = "";
        }
        return $str;
    }

    /**
     * Show Order Status
     *
     * @param  string  $val
     * @return string
     */
    public function showOrderStatus($val)
    {
        switch ($val) {
            case 'pending':
                $str = "待處理";
                break;
            case 'processing':
                $str = "處理中";
                break;
            case 'shipped':
                $str = "已出貨";
                break;
            case 'returned':
                $str = "已退貨";
                break;
            case 'canceled':
                $str = "已取消";
                break;
            default:
                $str = "";
        }
        return $str;
    }

    /**
     * convert timestamp to array $ymd
     *
     * @param  string  $val
     * @return string
     */
    public function showDay($val)
    {
        $ymd = $this->timestampToDay($val);
        $str = $ymd[0].'年'.$ymd[1].'月'.$ymd[2].'日';
        return $str;
    }

    /**
     * convert timestamp to array $ymd
     *
     * @param  string  $val
     * @return array   $ymd
     */
    public function timestampToDay($val)
    {
        $date = substr($val, 0, 10);
        $ymd = explode("-", $date);
        return $ymd;
    }

    /**
     * get YMD
     *
     * @param  string  $val
     * @return string   $ymd
     */
    public function getYMD($val)
    {
        $ymd = substr($val, 0, 10);
        return $ymd;
    }

    /**
     * radio checked
     *
     * @param  string  $val
     * @param  string  $match
     * @return
     */
    public function radioCheck($val, $match)
    {
        if (strcmp($val, $match))
            return;
        else
            return 'checked';
    }
}
