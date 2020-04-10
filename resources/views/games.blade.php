@extends('base')

@section('title', 'Spiele')

@section('main')

    <table>
        <thead>
        <th>Name</th>
        </thead>
        <tbody>
        @foreach($games as $game)
            <tr>
                <td>
                    <a href="{{ route('game', $game->id)     }}">{{ $game->name }}</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
