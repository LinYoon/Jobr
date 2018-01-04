<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Message;


class MessagesController extends Controller
{
    public function newMessageToUser(Request $request){
      Message::create([
        'user_id' => $request->input('user_id'),
        'company_id' => Auth::guard('company')->user()->id,
        'sender' => 'company',
        'title' => $request->input('title'),
        'message' => $request->input('message'),
      ]);

      return redirect()->back();
    }

    public function newMessageToCompany(Request $request){
      Message::create([
        'user_id' => $request->input('company_id'),
        'company_id' => Auth::guard('web')->user()->id,
        'sender' => 'user',
        'title' => $request->input('title'),
        'message' => $request->input('message'),
      ]);

      return redirect()->back();
    }

    public function messages(){
        if(Auth::guard('web')->check()){
          $user = Auth::guard('web')->user();
          //$sent = $user->sentMessages();
          //$received = $user->receivedMessages();
          $messages = $user->messages();
          // Notifications ?
          return view('messages')->with(['user' => $user, 'messages' => $messages]);
        }
        else if(Auth::guard('company')->check()){
          $company = Auth::guard('company')->user();
          //$sent = $company->sentMessages();
          //$received = $company->receivedMessages();
          $message = $company->messages();
          return view('messages')->with(['company' => $company, 'messages' => $messages]);
        }
        return redirect(route('home'));
    }

}
