@extends('layouts.app')
@section('content')

<a href="{{route($action.'.user')}}"><button type="button" name="button">user</button></a>
<a href="{{route($action.'.company')}}"><button type="button" name="button">company</button></a>

@endsection
