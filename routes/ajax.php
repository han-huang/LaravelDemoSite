<?php

Route::group([
    'as'     => 'ajax.',
    'prefix' => 'ajax',
], function () {
    Route::group([
            'as'     => 'shopping.',
            'prefix' => 'shopping',
        ], function () {
            Route::post('addCart', 'ShoppingCartController@addCart')->name('addCart');
            Route::match(['PUT', 'PATCH'],'updateCart/{id}', 'ShoppingCartController@updateCart')
                ->name('updateCart');
            Route::delete('deleteCart/{id}', 'ShoppingCartController@deleteCart')->name('deleteCart');
            Route::delete('deleteCartMultiple/', 'ShoppingCartController@deleteCartMultiple')
                ->name('deleteCartMultiple');
            Route::get('establishOrder', 'ShoppingCartController@establishOrder')->name('establishOrder');
    });

    Route::group([
            'as'     => 'order.',
            'prefix' => 'order',
        ], function () {
            Route::get('details/{id}', 'OrderController@details')->name('details');
    });

});
