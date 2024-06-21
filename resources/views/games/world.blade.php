@extends('layouts.game')

@section('title', 'Games')

@section('sidebar')
    @parent
    <script>
        $(function() {
            $( "#sortable" ).sortable({
                items: '> div',
                cursor: "move",
                update: function( event, ui ) {
                    let sortedIDs = $( "#sortable" ).sortable( "toArray" );
                    //console.log(sortedIDs);

                    let squadId = sortedIDs[0].split('-');
                    squadId = squadId[0].split('_')[1];
                    //console.log(squadId);

                    let data = [];
                    $(sortedIDs).each(function(key, value) {
                        let characterId = value.split('-');
                        characterId = characterId[1].split('_')[1];
                        data.push(characterId);
                    });

                    $.ajax({
                        url: '/api/squads/' + squadId + '/characters/sort',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            sort: data
                        },
                        success: function (result) {
                            console.log(result);
                        }
                    });
                },
                revert: true
            });
            $( "#draggable" ).draggable({
                connectToSortable: "#sortable",
                helper: "clone",
                revert: "invalid"
            });
            $( "ul, li" ).disableSelection();
        });
    </script>

    <style>
        #sortable li {
            list-style: none;
            display: inline-block;
            width: 49%;
        }
    </style>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Characters</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">

            <div class="accordion accordion-flush" id="factions">

                @foreach($world->factions as $key => $faction)
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faction_{{ $faction->id }}" aria-expanded="false" aria-controls="faction_{{ $faction->id }}">
                            <span @if($faction->player_faction) class="text-success" @endif>{{ $faction->name }} Faction</span>
                        </button>
                    </h2>
                    <div id="faction_{{ $faction->id }}" class="accordion-collapse collapse" data-bs-parent="#factions">
                        <div class="accordion-body p-0">
                            {{ $faction->description }}

                            <div class="accordion accordion-flush" id="accordionExample">
                            @foreach($faction->squads as $squad)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                {{ $squad->name }} Squad
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">

                                                <!--ul>
                                                    <li id="draggable" class="ui-state-highlight">Drag me down</li>
                                                </ul-->

                                                <div id="sortable" class="row">
                                                    @foreach($squad->characters as $characterKey => $character)
                                                    <div id="squad_{{ $squad->id }}-character_{{ $character->id }}" class="ui-state-default col-sm-6 mb-3">

                                                        <div class="card h-100">
                                                            <img src="/img/characters/avatars/female/00{{ $characterKey + 1 }}.jpg" class="card-img-top" alt="...">
                                                            <div class="card-body">
                                                                <h5 class="card-title">{{ $character->first_name }} {{ $character->last_name }}</h5>
                                                                <h6 class="card-subtitle mb-2 text-body-secondary">{{ $character->nickname }}</h6>
                                                                <!--p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p-->
                                                            </div>
                                                        </div>

                                                    </div>
                                                    @endforeach
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                            </div>

                            @if($faction->player_faction)
                            <button class="btn btn-primary">Add Squad</button>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            <!--div class="mb-3">
                Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
            </div-->
            <a class="btn btn-outline-secondary" href="/games/{{ $gameId }}/worlds/{{ $world->id }}/characters">Create Main Character</a>

        </div>
    </div>
@endsection

@section('content')
    <script>
        $(function() {
            const mapWidth = 1200;
            const mapHeight = 1200;
            const tileSize = 6;
            const map = document.getElementById("canvas");
            const context = map.getContext('2d');

            let structures = [];

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

            let structureImage = new Image();
            structureImage.src = '/img/map/structures.png';

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

                        $.ajax({
                            url: '/api/worlds/{{ $world->id }}/structures',
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function (result) {
                                //console.log(result);
                                structures = result;

                                render(x, y);
                            }
                        });
                    }
                });
            }

            function render(x, y)
            {
                context.drawImage(mapImage, 0, 0);
                context.drawImage(rulersImage, 0, 0);

                $(structures).each(function(index, element) {
                    let sx = element.start_x;
                    let sy = element.start_y;
                    let sw = element.size_x;
                    let sh = element.size_y;
                    let dx = element.pivot.position_x;
                    let dy = element.pivot.position_y;
                    let dw = element.size_x;
                    let dh = element.size_y;
                    context.drawImage(structureImage, sx, sy, sw, sh, (dx * tileSize), (dy * tileSize), dw, dh);
                });

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
