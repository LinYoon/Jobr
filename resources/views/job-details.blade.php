@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading">{{$job->title}}</div>
                <div class="panel-body">
                  <a href="{{route('company.profile', $job->company['id'])}}"><p>{{$job->company['name']}}</p></a>
                  <p>{{$job->description}}</p>
                  <p> {{$job->terms}}</p>

                  <br>
                  Where we at
                  <p> {{$job->post_id}}</p>
                  <p> {{$job->address}}</p>

                  <iframe
                    width="50%"
                    height="300px"
                    frameborder="0" style="border:0"
                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyD1FTv2w-CRh-ykqfuYpG6zsDJasqwcFdY
                      &q={{$job->address}}, 1000 Ljubljana" allowfullscreen>
                  </iframe>
                  <form method="POST" action="{{route('apply', $job->id)}}">
                    {{ csrf_field() }}
                    @if($applied)
                      <input type="submit" class="btn btn-danger" value="Odjavi se od delovnega mesta">
                    @else
                      <input type="submit" class="btn btn-primary" value="Prijavi se na delovno mesto">
                    @endif
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
