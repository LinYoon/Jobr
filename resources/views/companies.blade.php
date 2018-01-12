@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-11 col-md-offset-1 pt-30">
		  <div class="row">
        @foreach($companies as $company)
            <div class="col-xs-12 col-md-4">
                <h3><a class="company-links" href="{{route('company.profile', $company->id)}}">{{$company->name}}</h3></a>
            </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
