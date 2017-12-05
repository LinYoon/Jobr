@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Company dashboard - {{ Auth::guard('company')->user()->name}}</div>

                <div class="panel-body">
                    <h1>Add new jobr offer</h1>

                    <a href="{{route('job.new')}}">
                      <button type="button" class="btn btn-primary">New offer</button>
                    </a>

                    <h1>Your job offers</h1>
                    <!-- foreach job where company -->

                    <!-- just to fill, TEMP -->
                    @for($i = 0 ; $i <  5 ; $i++)
                      @include('inc.company-job')
                    @endfor
                    <!-- endforeach -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
