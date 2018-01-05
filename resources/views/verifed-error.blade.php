@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
        Aktivacijska koda <strong>{{$token}}</strong> je potekla.
        <br>
        <a href="{{route('verify.send')}}"><button class="btn btn-primary">Ponovno pošlji</button></a>
        

      </div>
    </div>
</div>
@endsection
