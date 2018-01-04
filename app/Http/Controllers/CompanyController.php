<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Job;
use App\Company;
use App\User;
use App\Message;
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
        $company_id = Auth::guard('company')->user()->id;
        $company = Company::find($company_id);
        $jobs = $company->getCompanyJobs();
        return view('company-dashboard')->with('jobs', $jobs);
    }

    public function showNewJobForm(){
      return view('job-new');
    }

    public function userProfile($id){
      $user = User::find($id);
      return view('user-profile')->with('user', $user);
    }

    public function newJob(Request $request){
      $this->newJobValidator($request->all())->validate();
      $data = $request->input();
      // Create new job
      $jobID = Job::create([
          'company_id' => Auth::guard('company')->user()->id,
          'job_type_id' => $data['job_type'],
          'category_id' => $data['category'],
          'post_id' => ($data['post']),
          'degree_id' => $data['degree'],
          'title' => $data['title'],
          'description' => $data['description'],
          'position' => $data['position'],
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
      return redirect(route('company.job', $jobID));
    }

    public function showJobStats($id){;
      $job = Job::find($id);

      $companyID = Auth::guard('company')->user()->id;

      if($companyID == $job->company_id){
        $applied = $job->applies;
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
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1024',
            'position' => 'required|string|max:1024',
            'terms' => 'nullable|string|max:1024',
            'duration' => 'nullable|string|max:4',
            'hourly_wage' => 'required|max:5',
            'work_time' =>'required|max:2',
            'address' => 'required|string|max:100'
        ]);
    }

}
