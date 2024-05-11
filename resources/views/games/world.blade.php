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
        $(function() {
            const mapWidth = 1200;
            const mapHeight = 1200;
            const map = document.getElementById("canvas");
            const context = map.getContext('2d');

            let mapImage = new Image();
            mapImage.src = '/img/worlds/{{ $world->id }}/map.png';
            mapImage.onload = function() {
                context.drawImage(mapImage, 0, 0);
            }

            let rulersImage = new Image();
            rulersImage.src = '/img/map/rulers.png';
            rulersImage.onload = function() {
                context.drawImage(rulersImage, 0, 0);
            }

            let playerSquadImageWidth = 64;
            let playerSquadImageHeight = 64;
            let x = ((mapWidth / 2) - (playerSquadImageWidth / 2));
            let y = ((mapHeight / 2) - (playerSquadImageHeight / 2));
            let movePath = [];
            let moveDistance = 0;
            let moveEnergy = 0;
            let playerSquadImage = new Image();
            playerSquadImage.src = '/img/squads/emblems/001.png';
            playerSquadImage.onload = function() {
                context.drawImage(playerSquadImage, x, y);
            }

            function update(event)
            {
                let mouseX = parseInt(event.offsetX);
                let mouseY = parseInt(event.offsetY);

                let newX = (mouseX - (playerSquadImageWidth / 2));
                let newY = (mouseY - (playerSquadImageHeight / 2));

                let a = x - newX;
                let b = y - newY;

                moveDistance = parseInt(Math.sqrt((a * a) + (b * b)));

                $.ajax({
                    url: '/api/worlds/{{ $world->id }}/path',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        x: x,
                        y: y,
                        mouseX: newX,
                        mouseY: newY
                    },
                    success: function(result) {
                        // console.log(result);
                        movePath = result.path;
                        moveEnergy = result.energy;

                        x = newX;
                        y = newY;

                        render(x, y);
                    }
                });
            }

            function render(x, y)
            {
                context.drawImage(mapImage, 0, 0);
                context.drawImage(rulersImage, 0, 0);

                renderPath(movePath);

                context.drawImage(playerSquadImage, x, y);

                context.fillStyle = '#ffffff';
                context.fillRect(x + 74, y, 128, 64);

                let lineHeight = 20;
                let text = "Travel distance: " + moveDistance;
                context.fillStyle = 'black';
                context.font = '12px Arial';
                context.fillText(text, x + 84, y + lineHeight);
                text = "Energy cost: " + moveEnergy;
                context.fillText(text, x + 84, y + (lineHeight * 2));
            }

            function renderPath(path)
            {
                let tileSize = 6;
                let shift = (playerSquadImageWidth / 2);
                let dirY = 1;
                let dirX = 1;
                let posY = 0;
                let posX = 0;
                let lastY = 0;
                let lastX = 0;
                console.log(path);
                context.fillStyle = 'red';
                $(path).each(function(index, element) {
                    // TODO fix moves backwards
                    posY = (element[0] * tileSize);
                    if(posY < lastY) {dirY = -1;} else {dirY = 1;}
                    posX = (element[1] * tileSize);
                    if(posX < lastX) {dirX = -1;} else {dirX = 1;}
                    context.fillRect((posX * dirX) + (shift * dirX), (posY * dirY) + (shift * dirY), tileSize, tileSize);
                    lastY = posY;
                    lastX = posX;
                });
            }

            $(map).mousedown(function(event) {
                update(event);
            });
        });
    </script>

    <style>
        #canvas {
            border:1px solid black;
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
            <canvas id="canvas" width="1200" height="1200"></canvas>
        </div>

    </div>
@endsection
