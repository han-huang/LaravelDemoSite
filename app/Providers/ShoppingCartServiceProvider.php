<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\ShoppingCartController;
use EllipseSynergie\ApiResponse\Laravel\Response;
use League\Fractal\Manager;

class ShoppingCartServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('shoppingcart', function () {
            return new ShoppingCartController(new Response(new Manager()));
        });
    }
}
