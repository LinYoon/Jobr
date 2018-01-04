<div class="panel panel-default">
  <div class="panel-heading">{{$msg->title}}</div>
  <div class="panel-body">{{$msg->message}}</div>

  <div class="panel-footer">

    @if(Auth::guard('web')->check())
      @if($msg->sender == 'user')
        To: {{$msg->company->name}}
      @else
        From: {{$msg->company->name}}
      @endif
    @else
      @if($msg->sender == 'company')
        To: {{$msg->user->first_name . ' ' . $msg->user->last_name}}
      @else
        From: {{$msg->user->first_name . ' ' . $msg->user->last_name}}
      @endif
    @endif
</div>
</div>
