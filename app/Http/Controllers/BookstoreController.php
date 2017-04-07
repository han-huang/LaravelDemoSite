<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Facades\ShoppingCart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Log;
use Validator;

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

        $this->middleware('checkcart', ['only' => [
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
     * shoppingcart summary
     *
     * @return
     */
    public function cart_summary()
    {
        $count = Cart::instance('shopping')->count();
        $total = Cart::instance('shopping')->total();
        $total = (int)str_replace(",", "", $total);
        $shipping_fee = ($total >= 500 || $total == 0) ? 0 : 60;
        $sum = $shipping_fee + $total;
        return compact('count', 'total', 'shipping_fee', 'sum');
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
        // $count = Cart::instance('shopping')->count();
        // $total = Cart::instance('shopping')->total();
        // $total = (int)str_replace(",", "", $total);
        // $shipping_fee = ($total >= 500 || $total == 0) ? 0 : 60;
        // $sum = $shipping_fee + $total;
        $array = $this->cart_summary();
        extract($array);
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
        // $count = Cart::instance('shopping')->count();
        // if (!$count) return redirect()->back()->withErrors(['deliver' => '購物車無商品，請先選購商品!']);

        // Log::info('gettype($count): '.gettype($count)." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        // Log::info('$count: '.$count." ".__FILE__." ".__FUNCTION__." ".__LINE__);
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
            // ->withSuccess('deliver');
    }

    /**
     * confirm
     *
     * @param  Request $request
     * @return
     */
    public function confirm(Request $request)
    {
        // $count = Cart::instance('shopping')->count();
        // if (!$count) return redirect()->back()->withErrors(['confirm' => '購物車無商品，無訂單資料!']);
        $array = $this->cart_summary();
        extract($array);
        $client = $request->user("client");
        $view = 'site.bookstore.confirm';
        // return compact('count', 'total', 'shipping_fee', 'sum');
        return view($view, compact('count', 'total', 'shipping_fee', 'sum', 'client'));
    }

    /**
     * Save Deliver to Session
     *
     * @param  Request $request
     * @return
     */
    public function SaveDeliver(Request $request)
    {
        // $count = Cart::instance('shopping')->count();
        // if (!$count) return redirect('/bookstore')->withErrors(['save' => '購物車無商品，無法儲存!']);
        // if (!$count) return redirect()->back()->withInput()->withErrors(['save' => '購物車無商品，無法儲存!']);

        $ret = $this->deliverValidate($request);
        if(!empty($ret)) {
            // Log::info('get_class($ret) '.get_class($ret)." ".__FILE__." ".__FUNCTION__." ".__LINE__);
            return $ret;
        }

        // Log::info('collect($request->all()): '.collect($request->all())." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        $this->SaveToSession($request);
        // $view = 'site.bookstore.confirm';
        // return compact('client');
        // return view($view, compact('client', 'user'));
        // return view($view);
        return redirect()
            ->route("bookstore.confirm");
    }

    /**
     * SaveToSession
     *
     * @param  Request $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function SaveToSession(Request $request)
    {
        session()->put('deliver', $request->deliver);
        session()->put('payment_methond', $request->payment_methond);
        session()->put('invoice_type', $request->invoice_type);
        session()->put('name', $request->name);
        session()->put('phone', $request->phone);
        session()->put('email', $request->email);
        session()->put('addr_city', $request->addr_city);
        session()->put('addr_area', $request->addr_area);
        session()->put('addr_street', $request->addr_street);
        session()->put('zipcode', $request->zipcode);
        Log::info('session()->get("deliver"): '.session()->get("deliver")." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        Log::info('session()->get("payment_methond"): '.session()->get("payment_methond")." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        Log::info('session()->get("invoice_type"): '.session()->get("invoice_type")." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        Log::info('session()->get("name"): '.session()->get("name")." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        Log::info('session()->get("phone"): '.session()->get("phone")." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        Log::info('session()->get("email"): '.session()->get("email")." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        Log::info('session()->get("addr_city"): '.session()->get("addr_city")." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        Log::info('session()->get("addr_area"): '.session()->get("addr_area")." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        Log::info('session()->get("addr_street"): '.session()->get("addr_street")." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        Log::info('session()->get("zipcode"): '.session()->get("zipcode")." ".__FILE__." ".__FUNCTION__." ".__LINE__);
    }

    /**
     * Validate for requested data of deliver.
     *
     * @param  Request $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function deliverValidate(Request $request)
    {
        $rules = [
            'deliver' => 'required|max:255',
            'payment_methond' => 'required|max:255',
            'invoice_type' => 'required|max:255',
            'name' => 'required|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'addr_city' => 'required|max:12',
            'addr_area' => 'required|max:12',
            'addr_street' => 'required|max:255',
            'zipcode' => 'required|integer|min:100|max:983|digits:3',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()
                ->withErrors($validator);
        }
    }
}
