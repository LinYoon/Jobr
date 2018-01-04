@if($apply->status == 0)
<div class="panel panel-info">
  <div class="panel-heading row">
    <div class="col-xs-8 col-md-10">
      <a class="apply-name" href="{{route('user.profile.company', $apply->user_id)}}"> {{$apply->user->first_name . ' ' . $apply->user->last_name}}</a>
    </div>
    <div class="col-xs-2 col-md-1">
      <button type="button" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
    </div>
    <div class="col-xs-2 col-md-1">
      <button type="button" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
    </div>
  </div>
</div>
@endif
