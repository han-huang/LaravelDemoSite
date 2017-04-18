<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Book;
use App\Receiver;
use App\Order;
use App\BookOrder;
use EllipseSynergie\ApiResponse\Contracts\Response;
use Gloudemans\Shoppingcart\Facades\Cart;
use TCG\Voyager\Facades\Voyager;
use App\Facades\Presenter;
use Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderEmail;
use DB;

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

        $this->middleware('checkbookstock', ['only' => [
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

        if ($book->stock == 0) {
            $json = json_encode([
                       'stock' => Presenter::showBookStock($book->stock),
                       'msg'   => '目前已無庫存'
                    ], JSON_NUMERIC_CHECK | JSON_UNESCAPED_UNICODE);
            // return $this->response->errorWrongArgs('目前已無庫存');
            return $this->response->errorWrongArgs($json);
        }

        //check authentication
        if (Auth::guard('client')->check()) {
            // add to 'shopping' cart if this record does not exist
            $this->addToCart("shopping", $book);
            return response()->json(['status' => 'done']);
        } else {
            $this->addToCart("temp", $book);            
            $redirectTo = "/login";

            // save url to session, pay attention to $request->checkout is string not boolean
            if (preg_match("/^true$/", $request->checkout)) {
                session()->put('afterLoginPath', '/bookstore/shoppingcart');
            } else {
                session()->put('afterLoginPath', $request->current_url);
            }

            return response()->json([
                       'status'     => 'unauthorized',
                       'message'    => '請先登入會員',
                       'redirectTo' => $redirectTo
                   ]);
        }
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
                        'discount'   => $row->options->discount
                        // 'stock'      => $row->options->stock
                    ]);
                }
                Cart::instance('temp')->destroy();
            }
        }
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
                'discount'   => $book->discount
                // 'stock'      => $book->stock
            ]);
        }
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
        if ((int)$request->qty > $book->stock) {
            $json = json_encode([
                       'stock'     => Presenter::showBookStock($book->stock),
                       'stock_val' => $book->stock,
                       'msg'       => '庫存不足，請重新更改數量！'
                    ], JSON_NUMERIC_CHECK | JSON_UNESCAPED_UNICODE);
            return $this->response->errorWrongArgs($json);
        }
        $this->checkTempCart();
        $rowId = $this->findRowIdInCart('shopping', $id);
        if ($rowId) {
            $item = Cart::get($rowId);
            Cart::instance('shopping')->update($rowId, ['qty' => (int)$request->qty]);
        } else {
            //add to shopping cart if no rowId
            $this->addToCart("shopping", $book, $request->qty);
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
     * get html of summary from Cart::instance('shopping')
     *
     * @param  integer $count
     * @return array
     */
    public function get_summary($count)
    {
        $array = $this->get_summary_items();
        extract($array);
        $summary = "<p>共&nbsp;<span class='deeporange-color' id='count'>$count</span>&nbsp;項商品&#xFF0C;處理費".
                   "&nbsp;NT$&nbsp;<span class='deeporange-color'>$shipping_fee</span>&nbsp;元&#xFF0C;".
                   "訂單金額&nbsp;NT$&nbsp;<span class='deeporange-color'>$amount</span>&nbsp;元</p>";
        return $summary;
    }

    /**
     * get summary items from Cart::instance('shopping')
     *
     * @param  integer $count
     * @return array
     */
    public function get_summary_items()
    {
        $total = Cart::instance('shopping')->total();
        $total = (int)str_replace(",", "", $total);
        $shipping_fee = ($total >= 500 || $total == 0) ? 0 : 60;
        $amount = $shipping_fee + $total;
        return compact('total', 'shipping_fee', 'amount');
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
                $tbody .= "<td><div id='quantity_".$row->id."' class='form-group'><input aria-label='數量' name='book_quantity[]' data-id='$row->id' type='text' value='$row->qty' style='width:100px'>";
                $tbody .= Presenter::findBookStock($row->id);
                $tbody .= "<input type='hidden' id='stock_".$row->id."' value='".Presenter::findBookStockVal($row->id)."'>";
                $tbody .= "<label class='sr-only'>".$row->name."</label>";
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
            return $this->response->errorNotFound('未勾選刪除項目');
        }

        $this->checkTempCart();
        $this->remove_shopping_rowId($request);

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
     * remove shopping rowId
     *
     * @param  Request $request
     * @return
     */
    public function remove_shopping_rowId(Request $request)
    {
        foreach ($request->cartCheck as $id) {
            $rowId = $this->findRowIdInCart('shopping', $id);
            if ($rowId)
                Cart::instance('shopping')->remove($rowId);
            else {
                // return $this->response->errorNotFound('購物車內無此商品！');
                // Do not return errorNotFound if no $rowId , return done to update tbody and summary
            }
        }
    }

    /**
     * establish order
     *
     * @param  Request $request
     * @return
     */
    public function establishOrder(Request $request)
    {
        $client = Auth::guard('client')->user();
        $client_id = $client->id;
        $receiver = $this->create_receiver($client_id);
        $order = $this->create_order($client_id, $receiver->id);
        $this->sync_book_order($order);

        Cart::instance('shopping')->destroy();
        $this->flush_sessions();

        $this->send_order_email($order, $client->email);
        $redirectTo = '/bookstore/order';
        return response()->json([
                   'status'     => 'done',
                   'redirectTo' => $redirectTo,
                   'title'      => '通知',
                   'message'    => '訂單成立，已寄出通知信!'
               ]);
    }

    /**
     * send order email
     *
     * @param  App\Order $order
     * @param  str $client_email
     * @return
     */
    public function send_order_email($order, $client_email)
    {
        $orderEmail = new OrderEmail($order);
        $orderEmail->subject("LaravelDemoSite 訂單通知信");
        Mail::to($client_email)->queue($orderEmail);
    }

    /**
     * sync table book_order
     *
     * @param  App\Order $order
     * @return
     */
    public function sync_book_order($order)
    {
        $data = [];
        foreach(Cart::instance('shopping')->content() as $row) {
            $data[$row->id] = [
                'book_quantity'  => $row->qty,
                'sales_discount' => $row->options->discount,
                'sale_price'     => $row->price
            ];
            // process stock and sold
            DB::transaction(function () use ($row) {
                $book = Book::lockForUpdate()->find($row->id);
                $book->stock = $book->stock - $row->qty;
                $book->sold = $book->sold + $row->qty;
                $book->save();
            });
        }
        $order->books()->sync($data);
    }

    /**
     * flush sessions
     *
     * @return
     */
    public function flush_sessions()
    {
        $keys = ['deliver', 'payment_methond', 'invoice_type', 'name', 'phone',
                 'email', 'addr_city', 'addr_area', 'addr_street', 'zipcode'];
        foreach ($keys as $key) {
            if (session()->has($key)) {
                session()->forget($key);
            }
        }
    }

    /**
     * create details
     *
     * @return array   $details
     */
    public function create_details()
    {
        foreach(Cart::instance('shopping')->content() as $row) {
            $details[] = [
                             'id'         => $row->id,
                             'qty'        => $row->qty,
                             'name'       => $row->name,
                             'list_price' => $row->options->list_price,
                             'discount'   => $row->options->discount,
                             'price'      => $row->price,
                         ];
        }
        return $details;
    }

    /**
     * create receiver
     *
     * @param  integer $client_id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create_receiver($client_id)
    {
        $receiver = Receiver::firstOrCreate([
            'name'        => session()->get('name'),
            'client_id'   => $client_id,
            'phone'       => session()->get('phone'),
            'email'       => session()->get('email'),
            'addr_city'   => session()->get('addr_city'),
            'addr_area'   => session()->get('addr_area'),
            'addr_street' => session()->get('addr_street'),
            'zipcode'     => session()->get('zipcode'),
        ]);
        return $receiver;
    }

    /**
     * create order
     *
     * @param  integer $client_id
     * @param  integer $receiver_id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create_order($client_id, $receiver_id)
    {
        // $order_no = date('YmdHis').substr(sprintf("%08d", $client_id), -8, 8).mt_rand(100000, 999999);
        $order_no = date('YmdHis').mt_rand(100000, 999999);
        $array = $this->get_summary_items();
        extract($array);

        $details = $this->create_details();
        $count = Cart::instance('shopping')->count();
        $order = Order::firstOrNew([
            'order_no'        => $order_no,
            'client_id'       => $client_id,
            'receiver_id'     => $receiver_id,
            'deliver'         => session()->get('deliver'),
            'payment_methond' => session()->get('payment_methond'),
            'invoice_type'    => session()->get('invoice_type'),
            'count'           => $count,
            'shipping_fee'    => $shipping_fee,
            'amount'          => $amount,
            'status'          => 'pending',
            'active'          => 1,
            'details'         => json_encode($details, JSON_NUMERIC_CHECK | JSON_UNESCAPED_UNICODE),
        ]);
        $order->save();
        return $order;
    }
}
