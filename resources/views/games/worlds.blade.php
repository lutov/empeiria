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
            //
        });
        function getRandomName() {
            $.ajax({
                url: '/api/names/random',
                type: 'GET',
                data: {
                    types: ['world']
                },
                success: function (result) {
                    $('#name').val(result);
                    $('#seed').val(result);
                    $('#octaves').val(6);
                }
            });
        }
        function getMap() {
            let name = $('#name').val();
            let seed = $('#seed').val();
            let octaves = $('#octaves').val();
            $.ajax({
                url: '/api/maps/preview',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    name: name,
                    seed: seed,
                    octaves: octaves
                },
                success: function (result) {
                    let preview = 'data:image/png;base64,' + result;
                    $('#preview').attr('src', preview);
                }
            });
        }
        function createWorld() {
            let name = $('#name').val();
            let seed = $('#seed').val();
            let octaves = $('#octaves').val();
            $.ajax({
                url: '/api/worlds',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    gameId: {{ $gameId }},
                    name: name,
                    seed: seed,
                    octaves: octaves
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
            @foreach($worlds as $world)
            <div class="card mb-3">
                <img class="card-img-top" src="/img/worlds/{{ $world->id }}/map.png" alt="Card image cap">
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

        <div id="">
            <div class="input-group mb-3">
                <input type="text" class="form-control"  id="name" placeholder="Name" aria-label="Name" autocomplete="off">
                <button class="btn btn-outline-secondary" type="button" onclick="getRandomName()">Random</button>
                <button class="btn btn-outline-secondary" type="button" onclick="getMap()">Preview</button>
                <button class="btn btn-outline-secondary" type="button" onclick="createWorld()">Create</button>
            </div>

            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <input type="text" id="seed" class="form-control" placeholder="Seed" aria-label="Seed">
                    </div>
                </div>
                <div class="col">
                    <input type="text" id="octaves" class="form-control" placeholder="Octaves" aria-label="Octaves">
                </div>
            </div>

            <div class="text-center">
                <img id="preview" src="" alt="">
            </div>
        </div>

    </div>
@endsection
