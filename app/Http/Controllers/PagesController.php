<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Job;
use App\User;
use App\Company;
use App\Apply;


class PagesController extends Controller
{
  public function showJobs(Request $request){
        return view('home')->with('jobs', $this->getJobs($request));
    }

    private function getJobs(Request $request){
      // TODO apply filters, and order by
      return Job::orderBy('updated_at', 'desc')->get();
    }

    public function showCompanies(){
      $companies = Company::orderBy('name', 'desc')->get();
      return view('companies')->with('companies', $companies);
    }

    public function job($id){
      $job = Job::find($id);
      if(Auth::guard('web')->check()){
        $applied = $job->isApplied(Auth::guard('web')->user()->id);
      }
      else{
        $applied = false;
      }
      return view('job-details')->with(['job' => $job, 'applied' => $applied]);
    }

    public function jobApply($job_id){
      $job = Job::find($job_id);
      if(Auth::guard('web')->check()){
        $user_id = Auth::guard('web')->user()->id;
        $applied = $job->isApplied($user_id);
        if(!$applied){
          Apply::create([
            'user_id' => $user_id,
            'job_id' => $job_id,
          ]);
        }else{
          $apply = Apply::where('user_id', '=', $user_id)->where('job_id', '=', $job_id);
          $apply->delete();
        }
        return view('job-details')->with(['job' => $job, 'applied' => !$applied]);
      }
      return redirect(route('login.user'));
    }

    public function companyProfile($id){
      $company = Company::find($id);
      return view('company-profile')->with('company', $company);
    }
}
