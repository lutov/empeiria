@extends('layouts.game')

@section('title', 'Game Start')

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
                    if(games.length) {

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
            <li id="continueButton"><a href="#" id="continueLink">Continue</a></li>
            <li id="newGameButton"><a href="#" id="newGameLink">New Game</a></li>
            <li id="loadGameButton"><a href="#" id="loadGameLink">Load Game</a></li>
        </ul>

    </div>
@endsection
