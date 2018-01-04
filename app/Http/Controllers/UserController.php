<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Job;
use App\Company;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth:web');
    }

    public function applies(){
      $user = Auth::guard('web')->user();
      $applies = $user->applies();
      return view('user-applies')->with(['user' => $user, 'applies' => $applies]);
    }
}
