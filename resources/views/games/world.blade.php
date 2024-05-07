@extends('layouts.game')

@section('title', 'Games')

@section('sidebar')
    @parent

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Characters</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="mb-3">
                Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
            </div>
            <a class="btn btn-outline-secondary" href="/games/{{ $gameId }}/worlds/{{ $world->id }}/characters">Create Main Character</a>
        </div>
    </div>
@endsection

@section('content')
    <script>
        const endpoint = '/api/games';

        function draw(x, y)
        {
            let map = document.getElementById("canvas");
            let ctx = map.getContext('2d');

            let mapImage = new Image();
            mapImage.src = '/img/worlds/{{ $world->id }}/map.png';
            mapImage.onload = function() {
                ctx.drawImage(mapImage, 0, 0);
            }

            let playerSquadImage = new Image();
            playerSquadImage.src = '/img/squads/emblems/001.png';
            playerSquadImage.onload = function() {
                ctx.drawImage(playerSquadImage, x, y);
            }
        }

        $(function() {
            draw(564, 564);
        });
    </script>

    <style>
        #canvas {
            border:1px solid red;
        }
    </style>

    <div>

        <ul class="nav justify-content-center mb-3">
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                    Characters
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
            </li>
        </ul>

        <div class="text-center">
            <canvas id="canvas" width="1200" height="1200" onclick="draw(256, 256)"></canvas>
        </div>

    </div>
@endsection
