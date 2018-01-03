<div class="panel panel-default">
  <div class="panel-heading"><h3>{{$job->title}}<h3></div>
  <div class="panel-body">
    <p>{{$job->description}}</p>
    <?php $c = new Carbon\Carbon($job->created_at); $date = $c->format('d.m.Y'); ?>
    <p><i class="fa fa-fw fa-clock-o"></i> {{$date}}</p>
    <p>status: {{$job->status}}</p>
    <p>Poeple applied: {{sizeof($job->applies)}}</p>
    <a href="{{route('company.job', $job->id)}}"><button type="button" class="btn btn-info">Več informacij <i class="fa fa-fw fa-angle-double-right"></i></button></a>
  </div>
</div>
