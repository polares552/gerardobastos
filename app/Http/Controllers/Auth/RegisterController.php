<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use DateTime;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name'         => ['required', 'string', 'max:255'],
            'gender'       => ['required', 'numeric'],
            'cpf_cnpj'     => ['required', 'string', 'max:45', 'unique:users'],
            'rg'           => ['string', 'max:25'],
            'birth_date'   => ['string', 'max:12'],
            'phone'        => ['required', 'string', 'max:45'],
            'mobile'       => ['string', 'max:45'],
            'email'        => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'zipcode'      => ['required', 'string', 'max:12'],
            'state'        => ['required', 'string', 'max:4'],
            'city'         => ['required', 'string', 'max:100'],
            'district'     => ['required', 'string', 'max:100'],
            'address'      => ['required', 'string', 'max:255'],
            'number'       => ['required', 'string', 'max:10'],
            'complement'   => ['required', 'string', 'max:100'],
            'password'     => ['required', 'string', 'min:8', 'confirmed'],
            'g-recaptcha-response' => 'required|captcha'
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
            'name'              => $data['name'],
            'gender'            => $data['gender'],
            'cpf_cnpj'          => $data['cpf_cnpj'],
            'rg'                => $data['rg'],
            'birth_date'        => DateTime::createFromFormat('d/m/Y', $data['birth_date'])->format("Y-m-d"),
            'phone'             => $data['phone'],
            'mobile'            => $data['mobile'],
            'email'             => $data['email'],
            'zipcode'           => $data['zipcode'],
            'state'             => $data['state'],
            'county'            => $data['city'],
            'district'          => $data['district'],
            'address'           => $data['address'],
            'number'            => $data['number'],
            'complement'        => $data['complement'],
            'password'          => Hash::make($data['password']),
        ]);
    }
}
