<?php

namespace App\Policies;

use App\Client;
use App\Order;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the given post can be viewed by the client.
     *
     * @param  \App\User   $user
     * @param  \App\Order  $order
     * @return bool
     */
    public function view(Client $client, Order $order)
    {
        // additional condition : active - 1
        return $client->id === $order->client_id ? $order->active == 1 : false ;
    }
}
