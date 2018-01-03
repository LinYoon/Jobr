<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Job;
use App\Company;

class UserAndCompanyController extends Controller
{
    public function messages(){
        if(Auth::guard('web')->check()){
          //TODO get user messages
          return view('user-messages')->with('user', Auth::guard('web')->user());
        }
        else if(Auth::guard('company')->check()){
          //TODO get company messages
          return view('company-messages')->with('company', Auth::guard('company')->user());
        }
        return redirect(route('home'));
    }

    public function profile(){
        if(Auth::guard('web')->check()){
          //TODO get user
          return view('user-profile')->with('user', Auth::guard('web')->user());
        }
        else if(Auth::guard('company')->check()){
          //TODO get company 
          return view('company-profile')->with('company', Auth::guard('company')->user());
        }
        return redirect(route('home'));
    }


}
