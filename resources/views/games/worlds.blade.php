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
            $('#mapPreviewLoader').hide();
            $('#createWorldLoader').hide();
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
                }
            });
        }
        function getMapPreview() {
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
                beforeSend: function() {
                    $("#mapPreviewLoader").show();
                },
                success: function (result) {
                    $('#mapPreviewLoader').hide();
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
                beforeSend: function() {
                    $("#createWorldLoader").show();
                },
                success: function(result) {
                    $("#createWorldLoader").hide();
                    let world = result;
                    if(world.id) {
                        $(location).attr('href', '/games/{{ $gameId }}/worlds/' + world.id);
                    }
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
                        <p class="card-text">
                            Seed: {{ $world->seed }}<br/>
                            Octaves: {{ implode(', ', $world->octaves) }}<br/>
                            Size: {{ $world->size }}<br/>
                            Title Size: {{ $world->title_size }}<br/>
                            Scale: {{ $world->scale }}<br/>
                        </p>
                        <a href="/games/{{ $gameId }}/worlds/{{ $world->id }}" class="btn btn-primary">Play</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>

        <div id="">
            <h2>New World</h2>

            <div class="input-group mb-3">
                <input type="text" class="form-control"  id="name" placeholder="Name" aria-label="Name" autocomplete="off">
                <button class="btn btn-outline-secondary" type="button" onclick="getRandomName()">Random</button>
                <button class="btn btn-outline-secondary" type="button" onclick="getMapPreview()">
                    <span id="mapPreviewLoader" class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                    Preview
                </button>
                <button class="btn btn-outline-secondary" type="button" onclick="createWorld()">
                    <span id="createWorldLoader" class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                    Create
                </button>
            </div>

            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <div class="form-floating">
                            <input type="text" id="seed" class="form-control" placeholder="Seed" aria-label="Seed">
                            <label for="seed">Seed</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" id="octaves" class="form-control" placeholder="Octaves"
                                   aria-label="Octaves" value="3, 6, 12, 24">
                            <label for="octaves">Octaves</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" id="size" class="form-control" placeholder="Size" aria-label="Size"
                                   value="100">
                            <label for="size">Size</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" id="tile_size" class="form-control" placeholder="Tile Size"
                                   aria-label="Tile Size" value="6">
                            <label for="tile_size">Tile Size</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" id="scale" class="form-control" placeholder="Scale" aria-label="Scale"
                                   value="12">
                            <label for="scale">Scale</label>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center mb-3">
                        <img id="preview" src="" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
