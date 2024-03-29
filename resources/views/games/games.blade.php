@extends('layouts.game')

@section('title', 'Games')

@section('sidebar')
    @parent

    <!--p>This is appended to the master sidebar.</p-->
@endsection

@section('content')
    <script>
        const endpoint = '/api/games';
        $(function() {
            let games = [];
            $.ajax({
                url: endpoint,
                type: 'GET',
                data: {},
                success: function(result) {
                    games = result;
                    console.log(games);
                    let gamesCount = games.length;
                    if(gamesCount) {
                        let lastGame = games[gamesCount-1];
                        console.log(lastGame);
                        $('#continueLink').attr('href', '/games/' + lastGame.id);
                        $('#continueLink').append(lastGame.name);

                        $(games).each(function (index) {
                            let game = this;
                            $('#gamesList').append(
                                $('<li>').append(
                                    $('<a>').attr('href','/games/'+ game.id).append(
                                        $('<span>').attr('class', 'tab').append(game.name)
                                    )
                                )
                            );
                        });
                    } else {
                        $('#continueButton').hide();
                        $('#loadGameButton').hide();
                    }
                }
            });
            $('#newGameLink').click(function(event) {
                event.preventDefault();
                newGame();
            });
        });
        function newGame() {
            let game = {};
            $.ajax({
                url: endpoint,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    game = result;
                    $(location).attr('href', '/games/' + game.id);
                }
            });
        }
    </script>

    <div>

        <ul>
            <li id="continueButton"><a href="#" id="continueLink">Continue </a></li>
            <li id="newGameButton"><a href="#" id="newGameLink">New Game</a></li>
            <li id="loadGameButton">
                <a href="#" id="loadGameLink">Load Game</a>
                <ul id="gamesList"></ul>
            </li>
        </ul>

    </div>
@endsection
