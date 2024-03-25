@extends('layouts.game')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <script>
        const endpoint = '/api/games';
        const method = 'GET';
        const parameters = {};
        $(function() {
            let games = [];
            let buttons = [];
            $.ajax({
                url: endpoint,
                type: method,
                data: parameters,
                success: function(result) {
                    games = result;
                    console.log(games);
                }
            });
        });
    </script>

    <div>

        <ul>
            <li>Continue</li>
            <li>New Game</li>
            <li>Load Game</li>
        </ul>

    </div>
@endsection
