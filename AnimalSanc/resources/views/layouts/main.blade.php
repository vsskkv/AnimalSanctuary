<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LaravelSite - @yield('title')</title>

        @include('Partials._stylesheet')
        
    </head>
    <body>

            @include('Partials._sidebar')

                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            @yield('content')
                        </div >
                    </div>
                </div>


            @include('Partials._scripts')
            
    </body>
</html>
