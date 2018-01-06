@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h1>O oglasu</h1>
          <div class="panel panel-info">
            <div class="panel-heading"><h2>{{$job->title}}</h2></div>
            <div class="panel-body row">
              <div class="col-md-6">
                <p>desc:{{$job->description}}</p>
                <p>category:{{$job->category_id}}</p>
                <p>job:{{$job->job_type_id}}</p>

                <p>pos:{{$job->position}}</p>
                <p>terms: {{$job->terms}}</p>
                <p>duration: {{$job->duration}}</p>
                <p>hourly_wage: {{$job->hourly_wage}}</p>

              </div>
              <div class="col-md-6">
                <p>home: {{$job->home}}</p>
                <p>trial: {{$job->trial}}</p>
                <p>work time: {{$job->work_time}}</p>
                <p>weekends: {{$job->weekends}}</p>
                <p>address: {{$job->address}}</p>
                <p>status: {{$job->status}}</p>
              </div>
            </div>
          </div>


            <h1>Prijavljeni uporabniki</h1>
            @if(sizeof($applies) > 0)
              @foreach($applies as $apply)
                @include('inc.job-user-applies')
              @endforeach
            @else
              Na oglas še ni nihče prijavil.
            @endif
        </div>
    </div>
</div>
@endsection
