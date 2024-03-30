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
                    $(location).attr('href', '/games/' + game.id + '/worlds');
                }
            });
        }
    </script>

    <div>

        <div class="card-deck">
            <div class="card">
                <img class="card-img-top" src="/img/worlds/+world.id+.jpg'" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">world.id. world.name World</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                        content.</p>
                    <div class="btn-group btn-group-sm" role="group" aria-label="World Actions">
                        <button type="button" class="btn btn-secondary" onclick="$emit('update-world', world)">Edit
                        </button>
                        <a class="btn btn-primary" href="/worlds/+world.id">Play</a>
                        <button type="button" class="btn btn-danger" onclick="$emit('destroy-world', world)">Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-2">
            <label for="new_world_name">Create new World</label>
            <form action="/worlds" class="form-inline" method="POST">
                <input class="form-control form-control-sm mr-2" id="new_world_name" placeholder="New world's name"
                       v-model="new_world.name">
                <button class="btn btn-sm btn-success" v-on:click.prevent="storeWorld()">Create</button>
            </form>
        </div>

    </div>
@endsection
