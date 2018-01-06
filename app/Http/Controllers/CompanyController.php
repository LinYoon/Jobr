<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Job;
use App\Company;
use App\User;
use App\Message;
use App\Apply;
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
      $job = Job::create([
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

      // send mail to users if subscribed
      $users = User::all();

      //TODO change region based on post
      $region = 1;
      $category = $data['category'];
      $type = $data['job_type'];

      foreach ($users as $user) {
        if($user->isSubbedRegion($region) &&
          $user->isSubbedCategory($category) &&
          $user->isSubbedType($type)){
            Mail::send('email.subscribe', ['job' => $job, 'user' => $user], function($message) use ($user) {
              $message->subject("Novo delovno mesto za vas");
              $message->from('noreply@jobr.linyoon.com', 'Jobr');
              $message->to($user->email);
            });
          }
      }

      // Redirect to company view/edit of job
      return redirect(route('company.job', $job));
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

    public function applyYes(Request $request){
      $apply = Apply::getApplyFromJobAndUser($request->input('job_id'), $request->input('user_id'));
      $apply->status = 1;
      $apply->save();

      Mail::send('email.apply-yes', ['apply' => $apply], function($message) use ($apply) {
        $message->subject("Bili ste sprejeti na delovno mesto");
        $message->from('noreply@jobr.linyoon.com', 'Jobr');
        $message->to($apply->user->email);
      });

      return redirect()->back();
    }

    public function applyNo(Request $request){
      $apply = Apply::getApplyFromJobAndUser($request->input('job_id'), $request->input('user_id'));
      $apply->status = 2;
      $apply->save();

      Mail::send('email.apply-no', ['apply' => $apply], function($message) use ($apply) {
        $message->subject("Niste bili sprejeti na delovno mesto");
        $message->from('noreply@jobr.linyoon.com', 'Jobr');
        $message->to($apply->user->email);
      });

      return redirect()->back();
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
