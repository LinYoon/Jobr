<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;

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

    public function showNewJobForm(){
      return view('job-new');
    }


    public function newJob(Request $request){
      $this->validator($request->all())->validate();

      // Create new job
      $jobID = Job::create([
          'company_id' => Auth::guard('company')->id,
          'job_type_id' => $data['job_type'],
          'category_id' => $data['category'],
          'post_id' => bcrypt($data['post']),
          'degree_id' => $data['degree'],
          'title' => $data['title'],
          'description' => $data['description'],
          'position' => $data['postion'],
          'terms' => $data['terms'],
          'duration' => $data['duration'],
          'hourly_wage' => $data['hourly_wage'],
          'home' => $data['home'],
          'trial' => $data['trial'],
          'work_time' => $data['work_time'],
          'weekends' => $data['weekends'],
          'address' => $data['address']
      ]);

      // Redirect to company view/edit of job
      return redirect(route('company.job'));
    }

    public function showJobStats(Request $request){
      $jobID = $request->input('id');
      $job = Job::find($jobID);

      $companyID = Auth::guard('company')->user()->id;

      if($companyID == $job->company_id){

          return view('job-stats')->with(['job' => $job, 'applies' => $applied]);
      }
      else{
        return redirect(route('company.dashboard'));
      }
    }






    /**
     * Get a validator for an incoming new job request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function newJobValidator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'expertise_area' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'geo_area' => 'required|string|max:255'
        ]);
    }

}
