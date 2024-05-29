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
                    $('#octaves').val('3, 6, 12, 24');
                    $('#size').val(100);
                    $('#tile_size').val(6);
                    $('#scale').val(12);
                }
            });
        }
        function getMap() {
            let name = $('#name').val();
            let seed = $('#seed').val();
            let octaves = $('#octaves').val();
            let size = $('#size').val();
            let tile_size = $('#tile_size').val();
            let scale = $('#scale').val();
            $.ajax({
                url: '/api/worlds/preview',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    name: name,
                    seed: seed,
                    octaves: octaves,
                    size: size,
                    tile_size: tile_size,
                    scale: scale
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
            let size = $('#size').val();
            let tile_size = $('#tile_size').val();
            let scale = $('#scale').val();
            $.ajax({
                url: '/api/worlds',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    gameId: {{ $gameId }},
                    name: name,
                    seed: seed,
                    octaves: octaves,
                    size: size,
                    tile_size: tile_size,
                    scale: scale
                },
                success: function(result) {
                    game = result;
                    $(location).attr('href', '/games/' + game.id + '/worlds');
                }
            });
        }
    </script>

    <div>

        <div class="row row-cols-1 row-cols-md-3 g-3 mb-5">
        @foreach($worlds as $world)
            <div class="col">
                <div class="card">
                    <img src="/img/worlds/{{ $world->id }}/map.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $world->name }}</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="/games/{{ $gameId }}/worlds/{{ $world->id }}" class="btn btn-primary">Play</a>
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
                        <input type="text" id="octaves" class="form-control" placeholder="Octaves" aria-label="Octaves">
                        <input type="text" id="size" class="form-control" placeholder="Size" aria-label="Size">
                        <input type="text" id="tile_size" class="form-control" placeholder="Tile Size" aria-label="Tile Size">
                        <input type="text" id="scale" class="form-control" placeholder="Scale" aria-label="Scale">
                    </div>
                </div>
                <div class="col">
                </div>
            </div>

            <div class="text-center">
                <img id="preview" src="" alt="">
            </div>
        </div>

    </div>
@endsection
