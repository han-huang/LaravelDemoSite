<?php

namespace App\Http\Middleware;

use Closure;
use Gloudemans\Shoppingcart\Facades\Cart;
use Log;
use EllipseSynergie\ApiResponse\Contracts\Response;

class CheckCart
{
    /**
     * Constructor
     *
     * @return void
     */
    public function __construct(Response $response)
    {
        $this->response = $response;
    }

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
        $keys = ['deliver', 'payment_methond', 'invoice_type', 'name', 'phone',
                 'email', 'addr_city', 'addr_area', 'addr_street', 'zipcode'];
        $return = false;
        if ($request->ajax()) {
            if (!$count) return $this->response->errorNotFound('購物車內尚無商品，無法繼續進行!');
            // if (!strcmp($request->path(), "bookstore/confirm")) {
            if (!strcmp($request->route()->getName(), "ajax.shopping.establishOrder")) {
                // for test
                // session()->forget('zipcode');
                // session()->forget('addr_city');
                // session()->forget('addr_area');
                // session()->forget('addr_street');
                // session()->forget('deliver');
                // session()->forget('payment_methond');
                // session()->forget('invoice_type');

                foreach ($keys as $key) {
                    if (!session()->has($key)) {
                        // return $this->response->errorNotFound(trans('validation.attributes.'.$key).'資訊不完整，訂單無法成立!');
                        $errors[] = trans('validation.attributes.'.$key).'資訊不完整!';
                        $return = true;
                    }
                }
                if ($return) return $this->response->errorNotFound($errors);
            }
        } else {
            if (!$count) return redirect()->route('bookstore.shoppingcart')->withErrors('購物車內尚無商品，無法繼續進行!');
            // if (!strcmp($request->path(), "bookstore/confirm")) {
            if (!strcmp($request->route()->getName(), "bookstore.confirm")) {
                foreach ($keys as $key) {
                    if (!session()->has($key)) {
                        // return redirect()->route('bookstore.deliver')->withErrors('請輸入'.trans('validation.attributes.'.$key).'資訊!');
                        // $errors[] = '請輸入'.trans('validation.attributes.'.$key).'資訊!';
                        $errors[] = trans('validation.attributes.'.$key).'資訊不完整!';
                        $return = true;
                    }
                }
                if ($return) return redirect()->route('bookstore.deliver')->withErrors($errors);
            }
        }

        return $next($request);
    }
}
