@extends('base')

@section('title', 'Spiele')

@section('main')

    <table>
        <thead>
        <th>Name</th>
        <th>Spieler</th>
        </thead>
        <tbody>
        @foreach($games as $game)
            <tr>
                <td>
                    <a href="{{ route('game', $game->id) }}">{{ $game->name }}</a>
                </td>
                <td>
                    {{ $game->users()->count() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
