<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                @if(Auth()->user()->game)
                    🎲 <a href="{{ route('game', Auth()->user()->game) }}">{{ Auth()->user()->game->name }}</a>
                @else
                    Not in a game.
                @endif

                👤 {{ Auth()->user()->name }}
                <a href="{{ url('/logout') }}">Abmelden</a>
            @else
                <a href="{{ route('login') }}">Anmelden</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Registrieren</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        @auth
            <div class="title m-b-md">
                @yield('title')
            </div>

            <div class="links">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('dices') }}">Würfel</a>
                <a href="{{ route('games') }}">Spiele</a>
                @yield('customlinks')
            </div>
        @endif
        <main>
            @yield('main')
        </main>
    </div>
</div>
</body>
</html>
