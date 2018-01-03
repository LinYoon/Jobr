<div class="panel panel-info">
  <div class="panel-heading row">
    <div class="col-xs-8 col-md-11">
      <a class="apply-name" href="{{route('job.details', $apply->job_id)}}"> {{$apply->job->title}}</a>
    </div>
    @if($apply->status == 0)
    <div class="col-xs-2 col-md-1">
      <div class="btn btn-default"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
    </div>
    @elseif($apply->status == 1)
    <div class="col-xs-2 col-md-1">
      <div class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></div>
    </div>
    @else
    <div class="col-xs-2 col-md-1">
      <div class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></div>
    </div>
    @endif
  </div>
</div>
