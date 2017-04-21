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
     * validate session
     *
     * @param  array  $keys
     * @return mixed
     */
    public function validate($keys)
    {
        $errors = [];
        $terminate = false;
        foreach ($keys as $key) {
            if (!session()->has($key)) {
                $errors[] = trans('validation.attributes.'.$key).'資訊不完整!';
                $terminate = true;
            }
        }
        return compact('terminate', 'errors');
    }

    /**
     * session clear for test
     *
     * @return mixed
     */
    public function sessionClear()
    {
        session()->forget('zipcode');
        session()->forget('addr_city');
        session()->forget('addr_area');
        session()->forget('addr_street');
        session()->forget('deliver');
        session()->forget('payment_method');
        session()->forget('invoice_type');
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
        $count = Cart::instance('shopping')->count();
        $keys = ['deliver', 'payment_method', 'invoice_type', 'name', 'phone',
                 'email', 'addr_city', 'addr_area', 'addr_street', 'zipcode'];
        if ($request->ajax()) {
            if (!$count) {
                return $this->response->errorNotFound('購物車內尚無商品，無法繼續進行!');
            }
            // if (!strcmp($request->path(), "bookstore/confirm")) {
            if (!strcmp($request->route()->getName(), "ajax.shopping.establishOrder")) {
                // for test
                // $this->sessionClear();

                $array = $this->validate($keys);
                extract($array);
                if ($terminate) {
                    return $this->response->errorNotFound($errors);
                }
            }
        } else {
            if (!$count) {
                return redirect()->route('bookstore.shoppingcart')
                       ->withErrors('購物車內尚無商品，無法繼續進行!');
            }
            if (!strcmp($request->route()->getName(), "bookstore.confirm")) {
                $array = $this->validate($keys);
                extract($array);
                if ($terminate) {
                    return redirect()->route('bookstore.deliver')->withErrors($errors);
                }
            }
        }

        return $next($request);
    }
}
