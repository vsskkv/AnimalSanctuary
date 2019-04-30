<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <link href="{{ asset('css/Table.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/Pets.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/waterBack.css') }}" rel="stylesheet" type="text/css">

    @yield('head')
<!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    @yield('css')


    <!--Bootstrap-->
    @include('Partials._stylesheet')

     {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

</head>
    <body>
        <canvas>
    <nav class="navbar navbar-expand-lg navbar-dark indigo">
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#"><i class="fas fa-paw">AnimalSanc</i>
        </a>
      </li>

            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li> 
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else      
                <!-- If theuser is admin do Part 1 ELSE Part 2 -->
                @if (auth()->user()->isAdmin == 0)
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ Auth::user()->first_name }}</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ Auth::user()->first_name }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-user-cog"></i> Admin Panel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/allPets') }}">Pets Panel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('postview') }}">Pets Adopt Panel</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/allPets') }}">Pets </a>
                </li>
                <!-- Logout -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/logout') }}">
                        <i class="fas fa-sign-out-alt"></i> Logout 
                    </a>
                </li>

            @endguest
    </ul>
  </div>
</nav>
</canvas>

    @include('Partials._scripts')
    @yield('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
@yield('js')

</body>
</html>
