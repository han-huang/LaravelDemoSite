<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Facades\ShoppingCart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Log;

class BookstoreController extends Controller
{
    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('clicktrack', ['only' => [
            'book',
        ]]);

        $this->middleware('client', ['only' => [
            'shoppingcart',
            'deliver',
            'SaveDeliver',
            'confirm'
        ]]);
    }

    /**
     * Home of Bookstore
     *
     * @param  Request $request
     * @return
     */
    public function home(Request $request)
    {
        $bookModel = new Book();
        $newarrivals = $bookModel->newarrival()->get();
        $marketings = $bookModel->marketing()->get();
        $hits = $bookModel->hits()->get();
        $editors = $bookModel->editor()->get();
        $todaysale = $bookModel->selectprice()->discount(66)->first();
        $rankingnew = $bookModel->getRankingNew();
        $rankingsold = $bookModel->getRankingSold();

        ShoppingCart::checkTempCart();
        $PutInCart = ShoppingCart::findInCart("shopping", $todaysale->id);

        $view = 'site.bookstore.home';
        return view($view, compact('newarrivals', 'marketings', 'hits', 'editors'
                   , 'todaysale', 'rankingnew', 'rankingsold', 'PutInCart'));
    }

    /**
     * go to Home of Bookstore
     *
     * @return
     */
    public function gohome()
    {
        return redirect()->route('bookstore.home');
    }

    /**
     * Show book information
     *
     * @param  Request $request
     * @param  $id
     * @return
     */
    public function book(Request $request, $id)
    {
        //verify $id
        $match = preg_match("/^[1-9][0-9]*$/", $id); ;
        if (!$match) {
            // Log::info('!$match: $id: '.$id." ".__FILE__." ".__FUNCTION__." ".__LINE__);
            return $this->gohome();
        }

        // Log::info('$request->path(): '.$request->path()." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        // Log::info('$request->url(): '.$request->url()." ".__FILE__." ".__FUNCTION__." ".__LINE__);

        $bookModel = new Book();
        // $book = $bookModel->active()->find($id);
        $book = $bookModel->getBook($id);

        if (!count($book)) {
            return $this->gohome();
        }

        ShoppingCart::checkTempCart();
        $PutInCart = ShoppingCart::findInCart("shopping", $book->id);

        $current = array(
                       "id" => $book->id,
                       "title" => $book->title,
                       "image" => $book->image
                   );
        $name = "ckbooks";
        $browsed = $this->getBrowsedCookie($request, $book->id, $current, 10, $name);

        $randoms = $bookModel->getRandom(6);

        $authors = $book->bookauthors()->get();
        $translators = $book->booktranslators()->get();

        $view = 'site.bookstore.book';
        // return compact('book', 'authors', 'translators', 'randoms', 'name', 'PutInCart');
        // return view($view, compact('book', 'authors', 'translators', 'randoms', 'name', 'PutInCart'));
        return response()->view($view, compact('book', 'authors', 'translators', 'randoms', 'name', 'PutInCart'))
                   ->withCookie(cookie()->forever($name, $browsed));
    }

    /**
     * Get Cookie of Browsed record
     *
     * @param  Request $request
     * @param  integer $id
     * @param  array   $current
     * @param  integer $remain - remaining count
     * @param  string  $cname  - cookie name
     * @return array   $browsed
     */
    public function getBrowsedCookie(Request $request, $id, $current, $remain = 8, $cname = 'browsed')
    {
        $browsed = [];
        if ($cookie_data = $request->cookie($cname)) {

            $browsed = $cookie_data;
            $repeat = false;
            // Log::info('$cookie_data '.collect($cookie_data)." ".__FILE__." ".__FUNCTION__." ".__LINE__);
            foreach ($cookie_data as $data) {
                if(in_array($id, $data)) {
                    $repeat = true;
                    // Log::info('in_array '.__FILE__." ".__FUNCTION__." ".__LINE__);
                }
            }
            // if it's greater or equal to remaining count and no repeated record, remove the first record
            if (count($browsed) >= $remain && !$repeat) {
                // Log::info('before array_shift($browsed) '.'count($browsed): '.count($browsed).__FILE__." ".__FUNCTION__." ".__LINE__);
                array_shift($browsed);
                // Log::info('array_shift($browsed) '.'count($browsed): '.count($browsed).__FILE__." ".__FUNCTION__." ".__LINE__);
            }
            if (!$repeat) $browsed[] = $current;

        } else {
            $browsed[] = $current;
            // Log::info('else '." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        }
        // Log::info('$current: '.collect($current)." ".'count($browsed): '.count($browsed).' $browsed: '.collect($browsed)." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        return $browsed;
    }

    /**
     * shoppingcart
     *
     * @param  Request $request
     * @return
     */
    public function shoppingcart(Request $request)
    {
        ShoppingCart::checkTempCart();
        $count = Cart::instance('shopping')->count();
        $total = Cart::instance('shopping')->total();
        $total = (int)str_replace(",", "", $total);
        $shipping_fee = ($total >= 500 || $total == 0) ? 0 : 60;
        $sum = $shipping_fee + $total;
        $view = 'site.bookstore.shoppingcart';
        // return compact('count', 'total', 'shipping_fee', 'sum');
        return view($view, compact('count', 'total', 'shipping_fee', 'sum'));
    }

    /**
     * deliver
     *
     * @param  Request $request
     * @return
     */
    public function deliver(Request $request)
    {
        $count = Cart::instance('shopping')->count();
        if (!$count) return redirect()->back()->withErrors(['deliver' => '購物車無商品，請先選購商品!']);
        Log::info('gettype($count): '.gettype($count)." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        Log::info('$count: '.$count." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        // Log::info('$request: '.$request." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        // Log::info('$request->user(): '.$request->user()." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        // Log::info('$request->user("client"): '.$request->user("client")." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        // Log::info('get_class($request->user("client")): '.get_class($request->user("client"))." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        // $client = ["name" => $request->user("client")->name, "email" => $request->user("client")->email];
        $user = ["name" => $request->user("client")->name, "email" => $request->user("client")->email];
        $client = $request->user("client");

        $view = 'site.bookstore.deliver';
        // return compact('client');
        return view($view, compact('client', 'user'));
    }

    /**
     * confirm
     *
     * @param  Request $request
     * @return
     */
    public function confirm(Request $request)
    {
        $count = Cart::instance('shopping')->count();
        if (!$count) return redirect()->back()->withErrors(['confirm' => '購物車無商品，無訂單資料!']);

        $view = 'site.bookstore.confirm';
        // return compact('client');
        // return view($view, compact('client', 'user'));
        return view($view);
    }

    /**
     * Save Deliver to Session
     *
     * @param  Request $request
     * @return
     */
    public function SaveDeliver(Request $request)
    {
        $count = Cart::instance('shopping')->count();
        if (!$count) return redirect('/bookstore')->withErrors(['save' => '購物車無商品，無法儲存!']);
        // if (!$count) return redirect()->back()->withInput()->withErrors(['save' => '購物車無商品，無法儲存!']);
        // return "SaveDeliver";
        // $view = 'site.bookstore.confirm';
        // return compact('client');
        // return view($view, compact('client', 'user'));
        // return view($view);
    }
}
