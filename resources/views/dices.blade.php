@extends('base')

@section('title', 'Würfel')

@section('main')

    <h1>Würfel</h1>
    <div class="dice-field">
        @foreach($dices as $dice)
            <div class="dice-row">
                @foreach($dice->getLetters() as $letter)
                    <div class="dice-side">{{$letter}}</div>
                @endforeach
            </div>
        @endforeach
    </div>

@endsection
