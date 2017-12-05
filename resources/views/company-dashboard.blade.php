@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Company dashboard - {{ Auth::guard('company')->user()->name}}</div>

                <div class="panel-body">
                    <h1>Place to edit your shit job offers and add new shitty offer</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
