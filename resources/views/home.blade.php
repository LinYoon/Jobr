@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-2">
        <div class="panel panel-default">
          <div class="panel-body">
            regions <br>categories<br>wages
          </div>
        </div>
      </div>

      <div class="col-md-10">

        <!-- foreach job offer -->
        <!-- TEMP -->
        @for($i = 0 ; $i <  5 ; $i++)
          @include('inc.job')
        @endfor
    </div>
</div>
@endsection
