<?php

use Illuminate\Http\Request;
use Dingo\Api\Routing\Router;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/user', function (Request $request) {
    // return $request->user();
// })->middleware('auth:api')->name('user');

// Route::get('article/{id}', ['uses' => 'NewsController@newsArticleApi', 'as' => 'article']);

// Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    // Route::post('signup', '\App\\Api\\V1\\Controllers\\SignUpController@signUp')->name('signup');
    // Route::post('login', '\App\\Api\\V1\\Controllers\\LoginController@login')->name('login');

    // Route::post('recovery', '\App\\Api\\V1\\Controllers\\ForgotPasswordController@sendResetEmail')->name('recovery');
    // Route::post('reset', '\App\\Api\\V1\\Controllers\\ResetPasswordController@resetPassword')->name('reset');
// });

// Route::group(['middleware' => 'jwt.auth'], function () {
    // Route::get('protected', function() {
        // return response()->json([
            // 'message' => 'Access to this item is only for authenticated user. Provide a token in your request!'
        // ]);
    // })->name('protected');

    // Route::get('refresh', [
        // 'middleware' => 'jwt.refresh',
        // function() {
            // return response()->json([
                // 'message' => 'By accessing this endpoint, you can refresh your access token at each request. Check out this response headers!'
            // ]);
        // }
    // ])->name('refresh');
// });

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->get('test', function () {
        return 'It is ok';
    });

    // https://github.com/dingo/api/issues/1212 If you still have that $request->user in your api routes you should delete that.
    // $api->get('/user', ['middleware' => 'auth:api', function (Request $request) {
        // return $request->user();
    // }]);

    $api->get('/user', ['middleware' => 'auth:api', 'uses' => 'App\\Http\\Controllers\\UserController@showProfile']);

    $api->get('article/{id}', [
        'middleware' => 'cors',
        'uses'       => 'App\\Http\\Controllers\\NewsController@newsArticleApi',
        'as'         => 'article'
    ]);

    $api->group(['prefix' => 'auth', 'as' => 'auth.'], function (Router $api) {
        $api->post('signup', 'App\\Api\\V1\\Controllers\\SignUpController@signUp');
        $api->post('login', 'App\\Api\\V1\\Controllers\\LoginController@login');

        $api->post('recovery', 'App\\Api\\V1\\Controllers\\ForgotPasswordController@sendResetEmail');
        $api->post('reset', 'App\\Api\\V1\\Controllers\\ResetPasswordController@resetPassword');
    });

    $api->group(['middleware' => 'jwt.auth'], function (Router $api) {
        $api->get('protected', function () {
            return response()->json([
                'message' => 'Access to this item is only for authenticated user. Provide a token in your request!'
            ]);
        });

        $api->get('refresh', [
            'middleware' => 'jwt.refresh',
            function () {
                return response()->json([
                    'message' => 'By accessing this endpoint, you can refresh your access token at each request. Check out this response headers!'
                ]);
            }
        ]);
    });
});
