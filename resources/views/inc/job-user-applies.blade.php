@if($apply->status == 0)
<div class="panel panel-info">
  <div class="panel-heading row">
    <div class="col-xs-8 col-md-10">
      <a class="apply-name" href="{{route('user.profile.company', $apply->user_id)}}"> {{$apply->user->first_name . ' ' . $apply->user->last_name}}</a>
    </div>
    <div class="col-xs-2 col-md-1">
      <a href="{{route('apply.yes', ['job_id' => $apply->job_id, 'user_id' =>$apply->user_id])}}">
        <button type="button" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
      </a>
    </div>
    <div class="col-xs-2 col-md-1">
      <a href="{{route('apply.no', ['job_id' => $apply->job_id, 'user_id' =>$apply->user_id])}}">
        <button type="button" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
      </a>
    </div>
  </div>
</div>
@endif

@if($apply->status == 1)
<div class="panel panel-success">
  <div class="panel-heading row">
    <div class="col-xs-11">
      <a class="apply-name" href="{{route('user.profile.company', $apply->user_id)}}"> {{$apply->user->first_name . ' ' . $apply->user->last_name}}</a>
    </div>
    <div class="col-xs-1">
      <a href="{{route('apply.no', ['job_id' => $apply->job_id, 'user_id' =>$apply->user_id])}}">
        <button type="button" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
      </a>
    </div>
  </div>
</div>
@endif

@if($apply->status == 2)
<div class="panel panel-danger">
  <div class="panel-heading row">
    <div class="col-xs-11">
      <a class="apply-name" href="{{route('user.profile.company', $apply->user_id)}}"> {{$apply->user->first_name . ' ' . $apply->user->last_name}}</a>
    </div>
    <div class="col-xs-1">
      <a href="{{route('apply.yes', ['job_id' => $apply->job_id, 'user_id' =>$apply->user_id])}}">
        <button type="button" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
      </a>
    </div>
  </div>
</div>
@endif
