<?php

Route::group([
    'as'     => 'bookstore.',
    'prefix' => 'bookstore',
], function () {
    Route::get('/', ['uses' => 'BookstoreController@home', 'as' => 'home']);

    // Book Page
    Route::get('book/{id}', ['uses' => 'BookstoreController@book', 'as' => 'book']);
});
