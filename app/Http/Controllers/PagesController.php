<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
  public function index(){
        return view('home');
    }

    public function job($id){
      // TODO get Job with id $id
      return view('job-details');
    }

    public function userProfile($id){
      // TODO get User with id $id
      return view('user-profile');
    }

    public function companyProfile($id){
      // TODO get Company with id $id
      return view('company-profile');
    }
}
