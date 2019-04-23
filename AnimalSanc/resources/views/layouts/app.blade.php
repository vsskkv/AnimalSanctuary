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
    <link href="{{ asset('css/_Nav.css') }}" rel="stylesheet" type="text/css">



    <!--Bootstrap-->
    @include('Partials._stylesheet')

     {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

</head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark indigo">
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#"><i class="fas fa-paw">AnimalSanc</i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
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
                <?php if(auth()->user()->isAdmin == 1){?>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-user-cog"></i> Admin Panel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pets.index') }}">Pets Panel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pets.create') }}">Pets Create Panel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pet_adopts.index') }}">Pets Adopt Panel</a>
                </li>
                <?php } ?>

                <!-- Logout -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Logout 
                    </a>
                </li>
            @endguest
    </ul>
  </div>
</nav>
    <section class="home">

    </section>

    <div style="height: 1000px">
        @yield('content')
    </div>
</div>
</div>
</div>

    @include('Partials._scripts')

</body>
</html>
