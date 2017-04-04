<?php

Route::group([
    'as'     => 'bookstore.',
    'prefix' => 'bookstore',
], function () {
    Route::get('/', ['uses' => 'BookstoreController@home', 'as' => 'home']);

    // Book Page
    Route::get('book/{id}', ['uses' => 'BookstoreController@book', 'as' => 'book']);

    Route::get('shoppingcart', 'BookstoreController@shoppingcart')->name('shoppingcart');
    Route::get('deliver', 'BookstoreController@deliver')->name('deliver');

    Route::get('tempcart', function () {
        return view('site.bookstore.temp.bookstore_cart_static');
    });

    Route::get('template', function () {
        return view('site.bookstore.temp.bookstore_template_static');
    });

    Route::get('tempdeliver', function () {
        return view('site.bookstore.temp.bookstore_deliver_static');
    });

    Route::get('tempconfirm', function () {
        return view('site.bookstore.temp.bookstore_confirm_static');
    });
});
