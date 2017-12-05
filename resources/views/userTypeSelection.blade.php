@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
  <div class="col-s-12 col-md-6">
      <a href="{{route($action.'.user')}}"><button type="button" name="button">user</button></a>
    </div>
    <div class="col-s-12 col-md-6">
      <a href="{{route($action.'.company')}}"><button type="button" name="button">company</button></a>
    </div>
  </div>
</div>
@endsection
