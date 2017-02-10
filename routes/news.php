<?php

Route::get('/news', ['uses' => 'NewsController@newsIndex', 'as' => 'news']);

Route::group([
    'as'     => 'news.',
    'prefix' => 'news',
], function () {
    try {
        foreach (\App\NewsCategory::all() as $categories) {
            Route::resource($categories->str, 'NewsController', ['only' => [
                'index', 'show'
            ],'names' => [
                'show' => $categories->str.'.page'
            ]]);
        }
    } catch (\InvalidArgumentException $e) {
        throw new \InvalidArgumentException("Custom routes hasn't been configured because: ".$e->getMessage(), 1);
    } catch (\Exception $e) {
        // do nothing, might just be because table not yet migrated.
    }

    // News Article
    Route::group([
        'as'     => 'article.',
        'prefix' => 'article',
    ], function () {
        Route::get('{id}', ['uses' => 'NewsController@newsArticle', 'as' => 'content']);
    });

    // News Page
    Route::get('page/{id}', ['uses' => 'NewsController@newsPage', 'as' => 'page']);
});
