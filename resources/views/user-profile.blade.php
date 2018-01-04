@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h1>{{$user->first_name . ' ' . $user->last_name}}</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p>what I do</p>
        <p>references</p>
        <p>some other stuff</p>

        @if (Auth::guard('web')->check())
          <button class="btn btn-primary">Uredi</button>
        @elseif(Auth::guard('company')->check())
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Pošlji sporočilo</button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Novo sporočilo</h4>
              </div>
              <div class="modal-body">
                <p>Uporabniku {{$user->first_name . ' ' . $user->last_name}} napišite novo sporočilo</p>
                <form method="post" action="{{route('new.message.to.user')}}">
                  {{ csrf_field() }}

                  <input type="hidden" id="user_id" class="form-control" name="user_id" value="{{$user->id}}"/>

                  <div class="form-group">
                      <input type="text" id="title" class="form-control" name="title" placeholder="Naslov" required/>
                  </div>

                  <div class="form-group">
                      <textarea id="message" class="form-control" name="message" placeholder="Sporočilo" required></textarea>
                  </div>

                  <div class="form-group">
                        <input type="submit" class="btn btn-primary form-control" value="Pošlji">
                  </div>

                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Zapri</button>
              </div>
            </div>

          </div>
        @endif

      </div>
    </div>
</div>
@endsection
