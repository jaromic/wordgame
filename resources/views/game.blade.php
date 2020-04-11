@extends('base')

@section('title')
    Spiel {{ $game->name }}
@endsection

@section('main')
    <h2>Spieler</h2>
    <ul id="users" style="list-style-type: none">
    </ul>
    @if($user->game && $user->game->id == $game->id)
        <form method="post" action="{{route('leave')}}">@csrf
            <button type="submit">Verlassen</button>
        </form>
    @elseif($user->game)
        Du bist bereits in einem anderen Spiel und kannst daher nicht beitreten.
    @else
        <form method="post" action="{{route('enter', $game->id)}}">
            @csrf
            <button type="submit">Beitreten</button>
        </form>
    @endif

    @if($user->game && $user->game->id == $game->id)
        @if($currentRound)
            <h2>Runde <span id="round">{{ $currentRound->number }}</span></h2>
            <h3>Verbleibende Zeit: <span id="remaining-time"></span></h3>
        @endif
        <form method="post" action="{{route('newround', $game->id)}}">
            @csrf
            <button type="button" onclick="newRound()">Neue Runde</button>
        </form>
        <div id="field-container">
        </div>
    @endif

    <script type="text/javascript">

        function newRound() {
            $.post({
                url: '{{ route('newround', $game) }}',
                data: {
                    "_token": "{{ csrf_token() }}",
                }
            })
        }

        var isInGame = true;
        var currentRound = 0;
        var intervalId = setInterval(function () {
                $.get({
                    url: '/game/{{ $game->id }}/status',
                    dataType: 'json',
                    success: function (data) {

                        if (data.round != currentRound) {
                            $('#round').html(data.round);
                            currentRound = data.round;

                            $.get({
                                url: '{{ route('field', $game) }}',
                                dataType: 'html',
                                success: function (data) {
                                    $("#field-container").html(data);
                                }
                            });

                            $('field-container').html
                        }

                        /* display remaining settings and field as long as the round is active: */
                        remainingSeconds = data.remainingTime;
                        if (remainingSeconds >= 0) {
                            if (!isInGame) {
                                isInGame = true;
                            }
                            $('#remaining-time').html(remainingSeconds);
                        } else {
                            if (isInGame) {
                                isInGame = false;
                            }
                        }

                        /* maintain player list: */
                        data.users.forEach(function ($u) {
                            if ($("#users li:contains(" + $u + ")").length < 1) {
                                $("#users").append("<li>👤 " + $u + "</li>");
                            }
                        });
                    }
                });
            },
            900
            )
        ;
    </script>

@endsection
