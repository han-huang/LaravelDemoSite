<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::group(['prefix' => 'client'], function () {
  //Route::get('/login', 'ClientAuth\LoginController@showLoginForm');
  Route::get('/login', 'ClientAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'ClientAuth\LoginController@login');
  // Route::post('/logout', 'ClientAuth\LoginController@logout');
  Route::post('/logout', 'ClientAuth\LoginController@logout')->name('logout');

  // Route::get('/register', 'ClientAuth\RegisterController@showRegistrationForm');
  Route::get('/register', 'ClientAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'ClientAuth\RegisterController@register');

  Route::post('/password/email', 'ClientAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'ClientAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'ClientAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'ClientAuth\ResetPasswordController@showResetForm');
});

Route::get('contact', function() {
    return View::make('contact');
});
Route::post('contact', 'EnquiryController@index');

Route::any('captcha-test', function(\Illuminate\Http\Request $request)
{
    if ($request->method() == 'POST')
    {
        $rules = ['captcha' => 'required|captcha'];
        //$validator = Validator::make(array('captcha'=>$request->input('captcha')), $rules);
        $data = $request->all();
        $validator = Validator::make($data, $rules);
        if ($validator->fails())
        {
            echo '<p style="color: #ff0000;">Incorrect!</p>';
        }
        else
        {
            echo '<p style="color: #00ff30;">Matched :)</p>';
        }
    }

    //origin
    // $form = '<form method="post" action="captcha-test">';
    // $form .= '<input type="hidden" name="_token" value="' . csrf_token() . '">';
    // $form .= '<p>' . captcha_img() . '</p>';
    // $form .= '<p><input type="text" name="captcha"></p>';
    // $form .= '<p><button type="submit" name="check">Check</button></p>';
    // $form .= '</form>';
    // return $form;

    //add button to reload captcha
    $form = '<!DOCTYPE html><html><script>';
    $form .= 'function reload_captcha(){';
    $form .= 'var date = new Date();';
    $form .= 'var obj = document.getElementsByTagName("img")[0];';
    $form .= 'obj.src = "'.url('captcha/default?').'" + date.getTime();';
    $form .= 'console.log(obj.src);';
    $form .= 'return false;}</script><body>';

    $form .= '<form method="post" action="captcha-test">';
    $form .= '<input type="hidden" name="_token" value="' . csrf_token() . '">';
    $form .= '<p>' . captcha_img() . '<button type="button" name="reload" onclick="return reload_captcha();">Reload</button></p>';
    $form .= '<p><input type="text" name="captcha"></p>';
    $form .= '<p><button type="submit" name="check">Check</button></p>';

    $form .= '</form></body></html>';
    return $form;

});

Route::get('/', 'IndexController@getIndexView');
