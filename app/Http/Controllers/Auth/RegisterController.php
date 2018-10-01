<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
    protected $redirectTo = '/';//home

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
            'Apellidos' => 'required|string|max:100', 
            'Nombres' => 'required|string|max:100', 
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6|confirmed', 
            'permite_ver' => 'boolean', 
            'permite_modif' => 'boolean', 
            'permite_agregar' => 'boolean', 
            'admin' => 'boolean',
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
            'Apellidos' => $data['Apellidos'], 
            'Nombres' => $data['Nombres'], 
            'email' => $data['email'],
            'password' => Hash::make($data['password']), 
            'permite_ver' => 1, 
            'permite_modif' => 0, 
            'permite_agregar' => 0, 
            'admin' => 0,
        ]);
    }

    protected function create_admin(array $data)
    {
        return User::create([
            'Apellidos' => $data['Apellidos'], 
            'Nombres' => $data['Nombres'], 
            'email' => $data['email'],
            'password' => Hash::make($data['password']), 
            'permite_ver' => $data['permite_ver'], 
            'permite_modif' => $data['permite_modif'], 
            'permite_agregar' => $data['permite_agregar'], 
            'admin' => $data['admin'],
        ]);
    }


}
