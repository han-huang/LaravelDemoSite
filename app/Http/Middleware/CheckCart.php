<?php

namespace App\Http\Middleware;

use Closure;
use Gloudemans\Shoppingcart\Facades\Cart;
use Log;

class CheckCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Log::info('$request->route()->getName(): '.$request->route()->getName()." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        // Log::info('$request->path(): '.$request->path()." ".__FILE__." ".__FUNCTION__." ".__LINE__);

        $count = Cart::instance('shopping')->count();
        if (!$count) return redirect()->route('bookstore.shoppingcart')->withErrors('購物車內尚無商品，無法繼續進行!');

        // if (!strcmp($request->path(), "bookstore/confirm")) {
        if (!strcmp($request->route()->getName(), "bookstore.confirm")) {
            $keys = ['deliver', 'payment_methond', 'invoice_type', 'name', 'phone',
                     'email', 'addr_city', 'addr_area', 'addr_street', 'zipcode'];
            foreach ($keys as $key) {
                if (!session()->has($key))
                    return redirect()->route('bookstore.deliver')->withErrors('請輸入付款方式及寄送資訊!');
            }
        }

        return $next($request);
    }
}
