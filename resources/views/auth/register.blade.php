@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
  <div class="col-s-12 col-md-6">
      @include('inc.register-user')
    </div>
    <div class="col-s-12 col-md-6">
      @include('inc.register-company')
    </div>
  </div>
</div>
@endsection
