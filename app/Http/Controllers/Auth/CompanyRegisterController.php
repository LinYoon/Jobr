<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Company;


class CompanyRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new companies as well as their
    | validation and creation.
    |
    */

    public function __construct(){
      $this->middleware('guest:company');
    }

    public function showRegistrationForm(){
      return view('auth.register-company');
    }

    public function register(Request $request){
      $this->validator($request->all())->validate();

      //Create seller
      $company = $this->create($request->all());

      //Authenticates seller
      $this->guard()->login($company);

      //TODO redirect to verify email page
      return redirect(route('verify.send'));
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
            'email' => 'required|string|email|max:255|unique:companies',
            'password' => 'required|string|min:6|confirmed',
            'expertise_area' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:12',
            'address' => 'nullable|string|max:255',
            'davcna' => 'required|string|max:12',
            'spletna' => 'nullable|string|max:255',
            'opis' => 'nullable|string|max:1024'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Company
     */
    protected function create(array $data)
    {
        return Company::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'expertise_area' => $data['expertise_area'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'davcna' => $data['davcna'],
            'spletna' => $data['website'],
            'opis' => $data['desc']
        ]);
    }

    //Get the guard to authenticate Seller
   protected function guard()
   {
       return Auth::guard('company');
   }
}
