@if($apply->status == 0)
<div class="panel panel-info">
  <div class="panel-heading row">
    <div class="col-xs-11">
      <a class="apply-name" href="{{route('job.details', $apply->job_id)}}"> {{$apply->job->title}}</a>
    </div>

    <div class="col-xs-1">
      <div class="btn"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
    </div>

  </div>
</div>
@elseif($apply->status == 1)
<div class="panel panel-success">
  <div class="panel-heading row">
    <div class="col-xs-11">
      <a class="apply-name" href="{{route('job.details', $apply->job_id)}}"> {{$apply->job->title}}</a>
    </div>
    <div class="col-xs-1">
      <div class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></div>
    </div>
  </div>
</div>
@else
<div class="panel panel-danger">
  <div class="panel-heading row">
    <div class="col-xs-11">
      <a class="apply-name" href="{{route('job.details', $apply->job_id)}}"> {{$apply->job->title}}</a>
    </div>

    <div class="col-xs-1">
      <div class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></div>
    </div>
  </div>
</div>
@endif
