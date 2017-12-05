<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth:company');
    }


    public function index(){
        return view('company-dashboard');
    }

    public function new(){
      return view('job-new');
    }
}
