<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/welcome';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => 'required|string|max:255',
            'regNo' => 'required|regex:/[a-zA-Z]{1,2}+\d{2,3}+[\/]+\d{5}+[\/]+\d{2}$/|unique:users',
            'phone' => 'required|regex:/(07)[0-9]{8}/',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'yos' => 'integer',
            'yoa' => 'integer',
            'gender' => 'string',
            'et'=>'required|string|max:255',
            'in_session'=>'required|string|max:5',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'regNo' => $data['regNo'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'yos' => $data['yos'],
            'yoa' => $data['yoa'],
            'gender' => $data['gender'],
            'et' => $data['et'],
            'ministry' => $data['ministry'],
            'in_session' => $data['in_session'],
            'password' => $data['password'],
            'type' => User::DEFAULT_TYPE,
        ]);
    }
}
