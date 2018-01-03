@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h1>{{$company->name}}</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p>what we do</p>
        <p>Our website</p>
        <p>some other stuff</p>

        @if (Auth::guard('company')->check())
          @if($company->id === Auth::guard('company')->user()->id)
            edit
          @endif
        @endif
      </div>
    </div>
</div>
@endsection
