<?php

namespace App\Http\Middleware;

use Closure;
use App\Book;
use Gloudemans\Shoppingcart\Facades\Cart;
use EllipseSynergie\ApiResponse\Contracts\Response;

class CheckBookStock
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
        $errors = [];
        foreach (Cart::instance('shopping')->content() as $row) {
            $bookModel = new Book();
            $book = $bookModel->getBook($row->id);
            if ($row->qty > $book->stock) {
                $errors[] = $row->name."： 庫存不足，請重新更改數量！";
            }
        }
        if (count($errors)) {
            $json = json_encode([
                       'redirectTo' => '/bookstore/shoppingcart',
                       'msg'        => $errors
                    ], JSON_NUMERIC_CHECK | JSON_UNESCAPED_UNICODE);
            return $this->response->errorWrongArgs($json);
        }

        return $next($request);
    }
}
