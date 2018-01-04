@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <a href="{{route('messages')}}">Vsa sporočila</a>
        <a href="{{route('messages.filter', 'poslana')}}">Poslana sporočila</a>
        <a href="{{route('messages.filter', 'prejeta')}}">Prejeta sporočila</a>

        @if(sizeof($messages) > 0)
          @foreach($messages as $msg)
            @include('inc.message')
          @endforeach
        @else
          Ni sporočil.
        @endif

      </div>
    </div>
</div>
@endsection
