<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Book;
use EllipseSynergie\ApiResponse\Contracts\Response;
use Gloudemans\Shoppingcart\Facades\Cart;
use Log;

class ShoppingCartController extends Controller
{
    protected $response;

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
     * addCart
     *
     * @param  Request $request
     * @return
     */
    public function addCart(Request $request)
    {
        $book = Book::selectprice()->find($request->bookid);
        if (!$book) {
            return $this->response->errorNotFound('Book Not Found');
        }

        // $price = round($book->discount * $book->list_price / 100);

        //check authentication
        if (Auth::guard('client')->check()) {
            // $this->checkTempCart($book);
            // add to 'shopping' cart if this record does not exist
            $this->addToCart("shopping", $book);
            return response()->json(['status' => 'done']);
        } else {
            //add to 'temp' cart if unauthorized and no record
            // $rows = Cart::instance('temp')->content();
            // if (!$rows->where('id', $book->id)->count())
                // Cart::instance('temp')->add($book->id, $book->title, 1, $price);

            // $count = $this->findInCart("temp", $book->id);
            // if (!$count)
                // Cart::instance('temp')->add($book->id, $book->title, 1, $price);

            $this->addToCart("temp", $book);            

            $redirectTo = "/login"."?redirectTo=".$request->current_url;
            // Log::info('$redirectTo: '.$redirectTo." ".__FILE__." ".__FUNCTION__." ".__LINE__);
            // return response()->json(['status' => 'unauthorized']);
            return response()->json(['status' => 'unauthorized',
                       'message' => '請先登入會員', 'redirectTo' => $redirectTo]);
            // return redirect($redirectTo);
        }

        // $res = array('id' => $request->bookid, 'status' => 'done');
        // return $res;
    }

    /**
     * check temp Cart and move to shopping Cart if client is authenticated
     *
     * @return
     */
    public function checkTempCart()
    {
		if (Auth::guard('client')->check()) {
            // check 'temp' cart
            if (Cart::instance('temp')->count()) {
                foreach(Cart::instance('temp')->content() as $row) {
                    Cart::instance('shopping')->add($row->id, $row->name, $row->qty, $row->price);
                }
                Cart::instance('temp')->destroy();
            }
        }
        // add to 'shopping' cart if this record does not exist
        // $this->addToCart("shopping", $book);
        
        // $count = $this->findInCart("shopping", $book->id);
        // if (!$count)
            // Cart::instance('shopping')->add($book->id, $book->title, 1, $price);

        // $rows = Cart::instance('shopping')->content();
        // if (!$rows->where('id', $book->id)->count())
            // Cart::instance('shopping')->add($book->id, $book->title, 1, $price);
    }

    /**
     * add to Cart
     *
     * @param  string  $whichCart
     * @param  Illuminate\Database\Eloquent\Model $book
     * @return
     */
    public function addToCart($whichCart, $book)
    {
        $count = $this->findInCart($whichCart, $book->id);
        if (!$count) {
            $price = $this->SalePrice($book);
            Cart::instance($whichCart)->add($book->id, $book->title, 1, $price);
        }
        // add to 'shopping' cart if this record does not exist
        // $count = $this->findInCart("shopping", $book->id);
        // if (!$count)
            // Cart::instance('shopping')->add($book->id, $book->title, 1, $price);
        
        // $rows = Cart::instance('shopping')->content();
        // if (!$rows->where('id', $book->id)->count())
            // Cart::instance('shopping')->add($book->id, $book->title, 1, $price);
    }   
    
    /**
     * Sale Price
     *
     * @param  Illuminate\Database\Eloquent\Model $book
     * @return integer
     */
    public function SalePrice($book)
    {
        return round($book->discount * $book->list_price / 100);
    }

    /**
     * check temp Cart and move to shopping Cart
     *
     * @param  string  $whichCart
     * @param  integer $id
     * @return
     */
    public function findInCart($whichCart, $id)
    {
        $rows = Cart::instance($whichCart)->content();
        return $rows->where('id', $id)->count();
    }

    /**
     * updateCart
     *
     * @param  Request $request
     * @return
     */
    public function updateCart(Request $request)
    {

    }

    /**
     * deleteCart
     *
     * @param  Request $request
     * @return
     */
    public function deleteCart(Request $request)
    {

    }
}
