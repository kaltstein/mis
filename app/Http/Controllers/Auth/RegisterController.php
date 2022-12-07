<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
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

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'date', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'religion' => ['required', 'string', 'max:255'],
            'civil_status' => ['required', 'string', 'max:255'],
            'educational_attainment' => ['required', 'string', 'max:255'],
            'contact_no' => ['required', 'string', 'min:11', 'max:11'],
            'enrolled' => ['required', 'string', 'max:255'],
            'employment_status' => ['required', 'string', 'max:255'],
            'pwd' => ['required', 'string', 'max:255'],
            'lgbtq' => ['required', 'string', 'max:255'],
            'youth_member' => ['required', 'string', 'max:255'],
            'emergency_contact_name' => ['required', 'string', 'max:255'],
            'emergency_contact_address' => ['required', 'string', 'max:255'],
            'emergency_contact_no' => ['required', 'min:11', 'max:11'],
            'emergency_contact_relationship' => ['required', 'string', 'max:255'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        return User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'last_name' => strtoupper($data['last_name']),
            'first_name' => strtoupper($data['first_name']),
            'middle_name' => strtoupper($data['middle_name']),
            'address' => strtoupper($data['address']),
            'birthday' => $data['birthday'],
            'gender' => $data['gender'],
            'religion' => strtoupper($data['religion']),
            'civil_status' => strtoupper($data['civil_status']),
            'educational_attainment' => strtoupper($data['educational_attainment']),
            'contact_no' => $data['contact_no'],
            'enrolled' => $data['enrolled'],
            'employment_status' => strtoupper($data['employment_status']),
            'solo_parent' => $data['solo_parent'],
            'pwd' => $data['pwd'],
            'disability' => strtoupper($data['disability']),
            'lgbtq' => $data['lgbtq'],
            'youth_member' => $data['youth_member'],
            'youth_org' => strtoupper($data['youth_org']),
            'emergency_contact_name' => strtoupper($data['emergency_contact_name']),
            'emergency_contact_address' => strtoupper($data['emergency_contact_address']),
            'emergency_contact_no' => $data['emergency_contact_no'],
            'emergency_contact_relationship' => strtoupper($data['emergency_contact_relationship']),


        ]);
    }
}
