@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            Basic job info
            {{$job->title}}
            {{$job->description}}

            Users applied
            @foreach($applies as $apply)
              {{$apply->user_id}}
              {{$apply->userFirstAndLastName}}
              {{$apply->status}}
            @endforeach
        </div>
    </div>
</div>
@endsection
