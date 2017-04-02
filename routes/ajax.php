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
            Route::put('updateCart', 'ShoppingCartController@updateCart')->name('updateCart');
            Route::delete('deleteCart', 'ShoppingCartController@updateCart')->name('deleteCart');
    });
});
