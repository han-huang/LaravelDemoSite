<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Book;
use EllipseSynergie\ApiResponse\Contracts\Response;
use Gloudemans\Shoppingcart\Facades\Cart;
use TCG\Voyager\Facades\Voyager;
use App\Facades\Presenter;
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
        $this->middleware('client', ['only' => [
            'updateCart',
            'deleteCart',
            'deleteCartMultiple',
            'establishOrder',
        ]]);

        $this->middleware('checkcart', ['only' => [
            'establishOrder'
        ]]);

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
        $book = Book::find($request->bookid);
        if (!$book) {
            return $this->response->errorNotFound('無此商品資料');
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

            // $redirectTo = "/login"."?afterLoginPath=".$request->current_url;
            // Log::info('$redirectTo: '.$redirectTo." ".__FILE__." ".__FUNCTION__." ".__LINE__);
            // return response()->json(['status' => 'unauthorized']);

            $redirectTo = "/login";

            // Log::info('$request->checkout: '.$request->checkout." ".__FILE__." ".__FUNCTION__." ".__LINE__);
            // if (is_string($request->checkout))
                // Log::info('is_string($request->checkout): '.is_string($request->checkout)." ".__FILE__." ".__FUNCTION__." ".__LINE__);
            // Log::info('empty($request->checkout): '.empty($request->checkout)." ".__FILE__." ".__FUNCTION__." ".__LINE__);
            // Log::info('$request->current_url: '.$request->current_url." ".__FILE__." ".__FUNCTION__." ".__LINE__);

            // save url to session, pay attention to $request->checkout is string not boolean
            if (preg_match("/^true$/", $request->checkout)) {
                session()->put('afterLoginPath', '/bookstore/shoppingcart');
                // Log::info('if ($request->checkout): '." ".__FILE__." ".__FUNCTION__." ".__LINE__);
            } else {
                session()->put('afterLoginPath', $request->current_url);
                // Log::info('if ($request->checkout): '."else"." ".$request->current_url." ".__FILE__." ".__FUNCTION__." ".__LINE__);
            }

            return response()->json([
                       'status'     => 'unauthorized',
                       'message'    => '請先登入會員',
                       'redirectTo' => $redirectTo
                   ]);
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
                    Cart::instance('shopping')->add($row->id, $row->name, $row->qty, $row->price, [
                        'image'      => $row->options->image,
                        'list_price' => $row->options->list_price,
                        'discount'   => $row->options->discount,
                        'stock'      => $row->options->stock
                    ]);
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
    public function addToCart($whichCart, $book, $qty = 1)
    {
        $count = $this->findInCart($whichCart, $book->id);
        if (!$count) {
            $price = $this->SalePrice($book);
            Cart::instance($whichCart)->add($book->id, $book->title, $qty, $price, [
                'image'      => $book->image,
                'list_price' => $book->list_price,
                'discount'   => $book->discount,
                'stock'      => $book->stock
            ]);
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
     * find id In Cart and return count()
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
     * find rowId In Cart
     *
     * @param  string  $whichCart
     * @param  integer $id
     * @return
     */
    public function findRowIdInCart($whichCart, $id)
    {
        if (!$this->findInCart($whichCart, $id))
            return null;
        $rows = Cart::instance($whichCart)->content();
        return $rows->where('id', $id)->first()->rowId;
    }

    /**
     * updateCart
     *
     * @param  Request $request
     * @param  integer $id
     * @return
     */
    public function updateCart(Request $request, $id)
    {
        $book = Book::find($id);
        if (!$book) {
            return $this->response->errorNotFound('無此商品資料');
        }

        if (!ctype_digit($request->qty)) {
            return $this->response->errorWrongArgs('商品數量需為數字，請重新確認更改的數量！');
        }
        // Log::info('gettype($book->stock): '.gettype($book->stock)." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        // Log::info('gettype($request->qty): '.gettype($request->qty)." ".__FILE__." ".__FUNCTION__." ".__LINE__);
        if ((int)$request->qty > $book->stock) {
            return $this->response->errorWrongArgs('庫存不足，請重新更改數量！');
        }

        $this->checkTempCart();

        $rowId = $this->findRowIdInCart('shopping', $id);
        if ($rowId) {
            $item = Cart::get($rowId);
            $options = $item->options->merge(['stock' => $book->stock]);

            // must update $book->stock first then update $request->qty
            // error happen if update $request->qty first and $rowId is deleted when $request->qty is 0
            // (InvalidRowIDException in Cart.php line 188: The cart does not contain rowId)
            Cart::instance('shopping')->update($rowId, ['options' => $options]);
            Cart::instance('shopping')->update($rowId, ['qty' => $request->qty]);
        } else {
            // return $this->response->errorNotFound('購物車內無此商品！');

            //add to shopping cart if no rowId
            $this->addToCart("shopping", $book, $request->qty);
        }
        // $count = Cart::instance('shopping')->count();
        // if ($count) {
            // $empty = false;
            // $tbody = "";
            // foreach (Cart::instance('shopping')->content() as $row) {
                // $tbody .= "<tr>";
                // $tbody .= "<input type='hidden' name='id' value='$row->id'>";
                // $tbody .= "<td><div class='form-group'><input name='cartCheck[]' id='check".$row->id."' type='checkbox' value='$row->id' ></div></td>";
                // $img = Presenter::smallimg(Voyager::image($row->options->image));
                // $tbody .= "<td><a href='".url('bookstore/book/'.$row->id)."' target='_blank'><img class='img-thumbnail' src='$img' alt='$row->name' style='width:100px'></a></td>";
                // $tbody .= "<td><a href='".url('bookstore/book/'.$row->id)."' target='_blank'>$row->name</a></td>";
                // $tbody .= "<td>".$row->options->list_price."元</td>";
                // $tbody .= "<td><span class='deeporange-color'>".$row->options->discount."折</span><br>".$row->price."元</td>";
                // $tbody .= "<td><div class='form-group'><input name='book_quanity[]' data-id='$row->id' type='text' value='$row->qty' style='width:50px'></div></td>";
                // $subtotal = $row->price * $row->qty;
                // $tbody .= "<td>".$subtotal."元</td>";
                // $tbody .= "<td><button type='button' id='del_$row->id' data-id='$row->id' class='btn' onclick=''>刪除</button></td>";
                // $tbody .= "</tr>";
            // }
        // } else {
            // $tbody = "<tr><td colspan='8'><div class='text-center'><b>購物車無商品</b></div></td></tr>";
            // $empty = true;
        // }
        $array = $this->get_tbody();
        // $count = $array['count'];
        // $tbody = $array['tbody'];
        // $empty = $array['empty'];
        extract($array);

        // $total = Cart::instance('shopping')->total();
        // $total = (int)str_replace(",", "", $total);
        // $shipping_fee = ($total >= 500 || $total == 0) ? 0 : 60;
        // $sum = $shipping_fee + $total;
        // $summary = "<p>共&nbsp;<span class='deeporange-color'>$count</span>&nbsp;項商品&#xFF0C;處理費&nbsp;NT$&nbsp;<span class='deeporange-color'>$shipping_fee</span>&nbsp;元&#xFF0C;訂單金額&nbsp;NT$&nbsp;<span class='deeporange-color'>$sum</span>&nbsp;元</p>";

        $summary = $this->get_summary($count);

        return response()->json([
                   'status'  => 'done',
                   'tbody'   => $tbody,
                   'summary' => $summary,
                   'empty'   => $empty
               ]);
    }

    /**
     * get html of summary from Cart::instance('shopping')
     *
     * @return array
     */
    public function get_summary($count)
    {
        $total = Cart::instance('shopping')->total();
        $total = (int)str_replace(",", "", $total);
        $shipping_fee = ($total >= 500 || $total == 0) ? 0 : 60;
        $sum = $shipping_fee + $total;
        $summary = "<p>共&nbsp;<span class='deeporange-color' id='count'>$count</span>&nbsp;項商品&#xFF0C;處理費".
                   "&nbsp;NT$&nbsp;<span class='deeporange-color'>$shipping_fee</span>&nbsp;元&#xFF0C;".
                   "訂單金額&nbsp;NT$&nbsp;<span class='deeporange-color'>$sum</span>&nbsp;元</p>";
        return $summary;
    }

    /**
     * get html of tbody from Cart::instance('shopping')
     *
     * @return array
     */
    public function get_tbody()
    {
        $count = Cart::instance('shopping')->count();
        if ($count) {
            $empty = false;
            $tbody = "";
            foreach (Cart::instance('shopping')->content() as $row) {
                $tbody .= "<tr>";
                $tbody .= "<input type='hidden' name='id[]' value='$row->id'>";
                $tbody .= "<td><div class='form-group'><input name='cartCheck[]' id='check".$row->id."' type='checkbox' value='$row->id'></div></td>";
                $img = Presenter::smallimg(Voyager::image($row->options->image));
                $tbody .= "<td><a href='".url('bookstore/book/'.$row->id)."' target='_blank'><img class='img-thumbnail' src='$img' alt='$row->name' style='width:100px'></a></td>";
                $tbody .= "<td><a href='".url('bookstore/book/'.$row->id)."' target='_blank'>$row->name</a></td>";
                $tbody .= "<td>".$row->options->list_price."元</td>";
                $tbody .= "<td><span class='deeporange-color'>".$row->options->discount."折</span><br>".$row->price."元</td>";
                $tbody .= "<td><div class='form-group'><input name='book_quanity[]' data-id='$row->id' type='text' value='$row->qty' style='width:100px'>";
                $tbody .= "<span>庫存</span>";
                if($row->options->stock > 10) {
                    $tbody .= "<span>&nbsp;&gt;&nbsp;</span><span class='deeporange-color'>10</span>";
                } elseif($row->options->stock <= 10) {
                    $tbody .= "<span >&nbsp;&equals;&nbsp;</span><span class='deeporange-color'>".$row->options->stock."</span>";
                }
                $tbody .= "<input type='hidden' id='stock_".$row->id."' value='".$row->options->stock."'>";
                $tbody .= "</div></td>";
                $subtotal = $row->price * $row->qty;
                $tbody .= "<td>".$subtotal."元</td>";
                $tbody .= "<td><button type='button' id='del_$row->id' data-id='$row->id' class='btn'>刪除</button></td>";
                $tbody .= "</tr>";
            }
        } else {
            $tbody = "<tr><td colspan='8'><div class='text-center'><b>購物車無商品</b></div></td></tr>";
            $empty = true;
        }

        return compact('count', 'tbody', 'empty');
    }

    /**
     * deleteCart
     *
     * @param  Request $request
     * @param  integer $id
     * @return
     */
    public function deleteCart(Request $request, $id)
    {
        $book = Book::selectprice()->find($id);
        if (!$book) {
            return $this->response->errorNotFound('無此商品資料');
        }

        $this->checkTempCart();

        $rowId = $this->findRowIdInCart('shopping', $id);
        if ($rowId)
            Cart::instance('shopping')->remove($rowId);
        else {
            // return $this->response->errorNotFound('購物車內無此商品！');
            // Do not return errorNotFound if no $rowId , return done to update tbody and summary
        }

        $array = $this->get_tbody();
        extract($array);
        $summary = $this->get_summary($count);

        return response()->json([
                   'status'  => 'done',
                   'tbody'   => $tbody,
                   'summary' => $summary,
                   'empty'   => $empty
               ]);
    }

    /**
     * deleteCart
     *
     * @param  Request $request
     * @param  integer $id
     * @return
     */
    public function deleteCartMultiple(Request $request)
    {
        $check_count = count($request->cartCheck);
        if ($check_count) {
            foreach ($request->cartCheck as $id) {
                $book = Book::selectprice()->find($id);
                if (!$book) {
                    return $this->response->errorNotFound('無勾選商品資料');
                }
            }
        } else {
            // return $this->response->errorNotFound('No book(s) selected');
            return $this->response->errorNotFound('未勾選刪除項目');
        }

        $this->checkTempCart();
        foreach ($request->cartCheck as $id) {
            $rowId = $this->findRowIdInCart('shopping', $id);
            if ($rowId)
                Cart::instance('shopping')->remove($rowId);
            else {
                // return $this->response->errorNotFound('購物車內無此商品！');
                // Do not return errorNotFound if no $rowId , return done to update tbody and summary
            }
        }

        $array = $this->get_tbody();
        extract($array);
        $summary = $this->get_summary($count);

        return response()->json([
                   'status'  => 'done',
                   'tbody'   => $tbody,
                   'summary' => $summary,
                   'empty'   => $empty
                   // 'cartCheck'  => $request->cartCheck
               ]);
    }

    /**
     * establish order
     *
     * @param  Request $request
     * @return
     */
    public function establishOrder(Request $request)
    {
        return "establishOrder";
    }
}
