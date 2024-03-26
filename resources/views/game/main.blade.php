@extends('layouts.game')

@section('title', 'Page Title')

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
            $.ajax({
                url: endpoint,
                type: 'POST',
                data: {},
                success: function(result) {

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
