<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        👤 {{ Auth()->user()->email }}
                        <a href="{{ url('/logout') }}">Logout</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    @yield('title')
                </div>

                <div class="links">
                    <a href="{{ route('home') }}">Home</a>
                    <a href="{{ route('dices') }}">Würfel</a>
                    <a href="{{ route('games') }}">Spiele</a>
                </div>

                <main>
                    @yield('main')
                </main>
            </div>
        </div>
    </body>
</html>
