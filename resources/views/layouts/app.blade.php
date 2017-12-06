<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Jobr') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/homepage.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
            <nav class="navbar navbar-default navbar-fixed-top templatemo-nav" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon icon-bar"></span>
                        <span class="icon icon-bar"></span>
                        <span class="icon icon-bar"></span>
                    </button>

                    <a class="brand" href="{{ url('/') }}"><img src="{{ asset("images/brand.svg") }}" /> {{ config('app.name', 'Jobr') }}</a>
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav text-uppercase blue">
                        <li class="active"><a href="{{ url('/') }}"><i class="fa fa-home fa-fw"></i> Domov</a></li>
                        <li><a href="features"><i class="fa fa-fw fa-list" aria-hidden="true"></i> Delovna mesta</a></li>
                        <li><a href="about"><i class="fa fa-building-o  fa-fw"></i> Podjetja</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right text-uppercase">
                        <!-- Authentication Links -->
                        @if ( !Auth::guard('web')->check() && !Auth::guard('company')->check())
                            <li class="login-li"><a href="{{ route('login') }}"><i class="fa fa-sign-in fa-fw"></i> Prijava</a></li>
                            <li><a href="{{ route('register') }}"><i class="fa fa-user-plus fa-fw"></i> Registracija</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                  @if(Auth::guard('company')->check())
                                    {{Auth::guard('company')->user()->name}}
                                  @elseif(Auth::guard('web')->check())
                                  <i class="fa fa-user fa-fw"></i> {{Auth::user()->first_name}} {{Auth::user()->last_name}}
                                  @endif
                                  <!-- elseif guard = admin -->
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">

                                  @if(Auth::guard('company')->check())
                                    <li>
                                      <a href="{{ route('company.profile', Auth::guard('company')->user()->id) }}">
                                          Profile
                                      </a>
                                    </li>
                                    <li>
                                      <a href="{{ route('company.dashboard')}}">Dashoard</a>
                                    </li>
                                  @else
                                    <li>
                                      <a href="{{ route('user.profile', Auth::user()->id) }}">
                                          Profile
                                      </a>
                                    </li>
                                  @endif

                                  <li>
                                      <a href="{{ route('logout') }}"
                                          onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                          Logout
                                      </a>

                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          {{ csrf_field() }}
                                      </form>
                                  </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script>
        new WOW().init();
    </script>
</body>
</html>
