@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
        Elektronski naslov <strong>{{$email}}</strong> je bil uspešno potrjen.

        <a href="{{route('home')}}"><button class="btn btn-primary">Domov</button></a>
      </div>
    </div>
</div>
@endsection
