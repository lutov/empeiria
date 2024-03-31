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
                        let lastWorlds = lastGame.worlds;
                        let worldsCount = lastWorlds.length;
                        if(worldsCount) {
                            let lastWorld = lastWorlds[worldsCount-1];
                            $('#continueLink').attr('href', '/games/' + lastGame.id + '/worlds/' + lastWorld.id);
                            $('#continueLink').append(lastGame.name + ' | ' + lastWorld.name);
                        } else {
                            $('#continueLink').attr('href', '/games/' + lastGame.id + '/worlds');
                            $('#continueLink').append(lastGame.name);
                        }
                        $(games).each(function (index) {
                            let game = this;
                            $('#gamesList').append(
                                $('<li>').append(
                                    $('<a>').attr('href','/games/'+ game.id + '/worlds').append(
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
        function newWorld() {
            let game = {};
            $.ajax({
                url: endpoint,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    game = result;
                    $(location).attr('href', '/games/' + game.id + '/worlds');
                }
            });
        }
        function getRandomName() {
            $.ajax({
                url: '/api/names/random',
                type: 'GET',
                data: {
                    types: ['world']
                },
                success: function (result) {
                    $('#newWorldName').val(result);
                }
            });
        }
    </script>

    <div>

        <div class="card-deck">
            @foreach($worlds as $world)
            <div class="card mb-3">
                <img class="card-img-top" src="/img/worlds/{{ $world->id }}.jpg'" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $world->id }}. {{ $world->name }} World</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                        content.</p>
                    <div class="btn-group btn-group-sm" role="group" aria-label="World Actions">
                        <button type="button" class="btn btn-secondary" onclick="$emit('update-world', world)">Edit
                        </button>
                        <a class="btn btn-primary" href="/worlds/{{ $world->id }}">Play</a>
                        <button type="button" class="btn btn-danger" onclick="$emit('destroy-world', world)">Delete
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="input-group">
            <input type="text" class="form-control"  id="newWorldName" placeholder="New world's name" aria-label="New world's name" autocomplete="off">
            <button class="btn btn-outline-secondary" type="button" onclick="getRandomName()">Random</button>
            <button class="btn btn-outline-secondary" type="button">Create</button>
        </div>

    </div>
@endsection
