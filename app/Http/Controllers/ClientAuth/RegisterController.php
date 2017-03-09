<?php

namespace App\Http\Controllers\ClientAuth;

use App\Client;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    /**
     * Messages for Validator.
     *
     * @var array
     */
    private $messages = [
        'required' => ':attribute 的欄位不能留空。',
        'name.required' => '姓名的欄位不能留空。',
        'email.required' => '電子郵件的欄位不能留空。',
        'password.required' => '密碼的欄位不能留空。',
        'birthday.required' => '生日的欄位不能留空。',
        'gender.required' => '性別的欄位不能留空。',
        'agree_edm.required' => '請勾選是否同意獲得本站提供之相關活動訊息',
        'g-recaptcha-response.required' => '請勾選驗證服務',
    ];

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    // protected $redirectTo = '/client/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('client.guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:clients',
            'password' => 'required|min:6|confirmed',
            'birthday' => 'required|date',
            'gender' => array('required', 'regex:/^(M|F)$/'),
            'agree_edm' => 'required|boolean',
            'g-recaptcha-response' => 'required|captcha',
        ], $this->messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Client
     */
    protected function create(array $data)
    {
        return Client::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'birthday' => $data['birthday'],
            'gender' => $data['gender'],
            'agree_edm' => (int)$data['agree_edm'],
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        // return view('client.auth.register');
        return view('site.auth.register');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('client');
    }
}
