@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
        Prosim potrdite vaš epoštni račun. <br>
        Aktivacijska koda je bila poslana na <strong>{{$email}}</strong>
        <br>
        <a href="{{route('verify.send')}}">ponovno pošlji</a>
        <br>
        <a href="{{route('change.email')}}">spremeni elektronski naslov</a>
      </div>
    </div>
</div>
@endsection
