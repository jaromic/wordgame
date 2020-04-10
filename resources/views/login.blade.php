@extends('base')

@section('title', 'Anmeldung')

@section('main')

    <h1>Login</h1>
    {{--    @error--}}
    {{--    <div class="alert-danger">Anmeldung fehlgeschlagen.</div>--}}
    {{--    @enderror--}}
    <form method="post" action="{{ route('authenticate') }}">
        <div class="login-box">
            @csrf
            <div class="email-box"><label for="password">E-Mail</label>
                <input id="email" name="email" type="text"></input></div>
            <div class="password-box"><label for="password">Kennwort</label>
                <input id="password" name="password" type="password"></input></div>
            <div class="button-box">
                <label>x</label>
                <button type="submit">Anmelden</button>
            </div>
            <div class="links-box">
                <a href="{{ route('register') }}">Registrieren</a> <a href="{{ route('resetpassword') }}">Kennwort
                    vergessen</a>
            </div>
        </div>
    </form>

@endsection
