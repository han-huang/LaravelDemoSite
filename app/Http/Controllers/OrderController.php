<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use App\Order;

class OrderController extends Controller
{
    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('client', ['only' => [
            'order'
        ]]);
    }

    /**
     * get details of order
     *
     * @param  Request $request
     * @param  integer $id
     * @return
     */
    public function details(Request $request, $id)
    {
        $client = $request->user("client");
        $order = Order::find($id);
        // $this->authorize('view', $order);
        $this->authorizeForUser($client, 'view', $order);
        $details = $order->getDetails($id);
        $modal = $this->getModal($details, $order);
        return response()->json([
                   'status' => 'done',
                   'modal'  => $modal
               ]);
    }

    /**
     * get modal
     *
     * @param  Illuminate\Database\Eloquent\Collection $details
     * @param  App\Order $order
     * @return
     */
    public function getModal($details, $order)
    {
        $modal = "";
        if ($details->count()) {
            $modal .= "<!-- Modal -->";
            $modal .= "<div id='details-".$order->id."' class='modal fade' role='dialog' style=''>";
            $modal .= "<div class='modal-dialog'>";
            $modal .= "<!-- Modal content-->";
            $modal .= "<div class='modal-content'>";
            $modal .= "<table class='table table-hover '>";
            $modal .= "<thead>";
            $modal .= "<tr class='info'>";
            $modal .= "<th class='col-md-2'>商品名稱</th>";
            $modal .= "<th class='col-md-1'>定價(NT$)</th>";
            $modal .= "<th class='col-md-1'>售價(NT$)</th>";
            $modal .= "<th class='col-md-1'>數量</th>";
            $modal .= "<th class='col-md-1'>小計(NT$)</th>";
            $modal .= "</tr>";
            $modal .= "</thead>";
            $modal .= "<tbody>";
            foreach ($details as $detail) {
                $modal .= "";
                $modal .= "<tr>";
                $modal .= "<td class='col-md-2'><a href='".url('/bookstore/book/'.$detail->id)."' target='_blank'>".$detail->title."</a></td>";
                $modal .= "<td class='col-md-1'>".$detail->list_price."元</td>";
                $modal .= "<td class='col-md-1'><span class='deeporange-color'>".$detail->pivot->sales_discount."折</span><br>".$detail->pivot->sale_price."元</td>";
                $modal .= "<td class='col-md-1' style='width:100px'>".$detail->pivot->book_quantity."</td>";
                $modal .= "<td class='col-md-1'>".$detail->pivot->book_quantity * $detail->pivot->sale_price."元</td>";
                $modal .= "</tr>";
            }
        }
        $modal .= "</tbody>";
        $modal .= "</table>";
        $modal .= "<div class='text-right' style='margin:20px'>";
        $modal .= "<p>共&nbsp;<span class='deeporange-color' id='count'>".$order->count."</span>&nbsp;項商品，累計：NT$&nbsp;<span class='deeporange-color span-price'>".($order->amount - $order->shipping_fee)."</span>&nbsp;元</p>";
        $modal .= "<p>處理費：NT$&nbsp;<span class='deeporange-color span-price'>".$order->shipping_fee."</span>&nbsp;元</p>";
        $modal .= "<p>訂單金額：NT$&nbsp;<span class='deeporange-color span-price'>".$order->amount."</span>&nbsp;元</p>";
        $modal .= "</div>";

        return $modal;
    }
}
