@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new job offer</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-4 control-label">Job category</label>

                            <div class="col-md-6">

                                @include('inc.categories-dropdown')

                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Job description</label>

                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control" name="description" required>{{old('description')}}</textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                            <label for="position" class="col-md-4 control-label">Job position</label>

                            <div class="col-md-6">

                                  <input id="position" type="text" class="form-control" name="position" value="{{old('position')}}" required>

                                @if ($errors->has('position'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('position') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('hourly_wage') ? ' has-error' : '' }}">
                            <label for="hourly_wage" class="col-md-4 control-label">Job hourly_wage</label>

                            <div class="col-md-6">

                                  <input id="hourly_wage" type="text" class="form-control"  name="hourly_wage" value="{{old('hourly_wage')}}" required>

                                @if ($errors->has('hourly_wage'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hourly_wage') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('job_type') ? ' has-error' : '' }}">
                            <label for="job_type" class="col-md-4 control-label">Job type</label>

                            <div class="col-md-6">

                              <select id="job_type" type="text" class="form-control" name="job_type" value="{{old('job_type')}}" required>
                                @foreach(App\JobType::all() as $type)
                                  <option value="{{$type->id}}">{{$type->type}}</option>
                                @endforeach
                              </select>

                                @if ($errors->has('job_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('job_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        if job type = redno, določen čas
                        <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                            <label for="duration" class="col-md-4 control-label">Job duration</label>

                            <div class="col-md-6">

                                  <input id="duration" type="text" class="form-control" name="duration" value="{{old('duration')}}">

                                @if ($errors->has('duration'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('duration') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('trial') ? ' has-error' : '' }}">
                            <label for="trial" class="col-md-4 control-label">Job trial period</label>

                            <div class="col-md-6">

                                  <input id="trial" type="text" class="form-control" name="trial" value="{{old('trial')}}">

                                @if ($errors->has('trial'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('trial') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!--terms and requirements-->
                        <div class="form-group{{ $errors->has('degree') ? ' has-error' : '' }}">
                            <label for="degree" class="col-md-4 control-label">Minimal degree required</label>

                            <div class="col-md-6">

                              @include('inc.degrees-dropdown')

                                @if ($errors->has('degree'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('degree') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('terms') ? ' has-error' : '' }}">
                            <label for="terms" class="col-md-4 control-label">Terms</label>

                            <div class="col-md-6">

                              <textarea id="terms" type="text" class="form-control" name="terms">{{old('terms')}}</textarea>

                                @if ($errors->has('terms'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('terms') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- location -->
                        <div class="form-group{{ $errors->has('post') ? ' has-error' : '' }}">
                            <label for="post" class="col-md-4 control-label">Post</label>

                            <div class="col-md-6">

                              <input id="post" type="text" class="form-control" name="post" value="{{old('post')}}">

                                @if ($errors->has('post'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('post') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">

                              <input id="address" type="text" class="form-control" name="address" value="{{old('address')}}">

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('work_time') ? ' has-error' : '' }}">
                            <label for="work_time" class="col-md-4 control-label">Daily work hours</label>

                            <div class="col-md-6">

                              <input id="work_time" type="number" class="form-control" name="work_time" value="{{$errors->has('address') ? old('work_time'): 8}}" >

                                @if ($errors->has('work_time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('work_time') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('weekends') ? ' has-error' : '' }}">
                            <label for="weekends" class="col-md-4 control-label">Weekends</label>

                            <div class="col-md-6">

                              <input type="radio" class="form-control" name="weekends" value="1">Yes
                              <input type="radio" class="form-control" name="weekends" value="0">No

                                @if ($errors->has('weekends'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('weekends') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('home') ? ' has-error' : '' }}">
                            <label for="home" class="col-md-4 control-label">Work from home</label>

                            <div class="col-md-6">
                              <input type="radio" class="form-control" name="home" value="1">Yes
                              <input type="radio" class="form-control" name="home" value="0">No

                                @if ($errors->has('home'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('home') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Dodaj
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
