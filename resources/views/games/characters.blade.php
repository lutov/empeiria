@extends('layouts.game')

@section('title', 'Characters')

@section('sidebar')
    @parent

    <!--p>This is appended to the master sidebar.</p-->
@endsection

@section('content')
    <script>
        $(function() {
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

            let qualitiesChartData = {
                labels: ['{!! implode("', '", $qualities->pluck('name')->toArray()) !!}'],
                datasets: [{
                    label: 'Character Qualities',
                    data: [{!! implode(", ", $qualities->pluck('default_value')->toArray()) !!}],
                    fill: true,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgb(255, 99, 132)',
                    pointBackgroundColor: 'rgb(255, 99, 132)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgb(255, 99, 132)'
                }]
            };
            let qualitiesChartConfig = {
                type: 'radar',
                data: qualitiesChartData,
                options: {
                    elements: {
                        line: {
                            borderWidth: 2
                        }
                    },
                    scales: {
                        r: {
                            startAngle: 0,
                            ticks: {
                               count: 5
                            },
                            suggestedMin: 0,
                            suggestedMax: 20
                        }
                    }
                },
            };
            new Chart($('#qualitiesChart'), qualitiesChartConfig);
        });

        let maxQualityPoints = 40;
        let availableQualityPoints = 10;
        let minPointsPerQuality = 3;
        let maxPointsPerQuality = 20;
        function updateQualityPoints(operation, quality, index)
        {
            let availableQualityPointsField = $('#availableQualityPoints');
            let qualityPointsField = $('#'+quality);
            let qualityPoints = Number(qualityPointsField.val());
            let updatedQualityPoints = qualityPoints;
            if('+' === operation) {
                if(0 < availableQualityPoints) {
                    updatedQualityPoints = qualityPoints + 1;
                    if(updatedQualityPoints <= maxPointsPerQuality) {
                        qualityPointsField.val(updatedQualityPoints);
                        availableQualityPoints -= 1;
                    } else {
                        alert('Quality value can not be higher than ' + maxPointsPerQuality + ' points');
                    }
                } else {
                    alert('No Quality points available');
                }
            } else {
                updatedQualityPoints = qualityPoints - 1;
                if(updatedQualityPoints >= minPointsPerQuality) {
                    qualityPointsField.val(updatedQualityPoints);
                    availableQualityPoints += 1;
                } else {
                    alert('Quality value can not be lower than ' + minPointsPerQuality + ' points');
                }
            }
            availableQualityPointsField.val(availableQualityPoints);
            let qualitiesChart = Chart.getChart($('#qualitiesChart'));
            if(qualitiesChart) {
                qualitiesChart.data.datasets[0].data[index] = updatedQualityPoints;
                qualitiesChart.update();
            }
        }

        // TODO refactor
        function getRandomName() {
            $.ajax({
                url: '/api/names/random',
                type: 'GET',
                data: {
                    types: ['first_name']
                },
                success: function (result) {
                    $('#first_name').val(result);
                }
            });
            $.ajax({
                url: '/api/names/random',
                type: 'GET',
                data: {
                    types: ['nickname']
                },
                success: function (result) {
                    $('#nickname').val(result);
                }
            });
            $.ajax({
                url: '/api/names/random',
                type: 'GET',
                data: {
                    types: ['last_name']
                },
                success: function (result) {
                    $('#last_name').val(result);
                }
            });
        }

        function setAge(age)
        {
            $('#age').val(age);
            $('#displayAge').html(age);
        }

        let availablePerks = 3;
        let perks = {
        @foreach($perks as $perk)
        '{{ $perk->slug }}': false,
        @endforeach
        };
        function togglePerk(perkSlug)
        {
            let perk = $('#' + perkSlug);
            let perkCard = $('#' + perkSlug + '-perk-card');
            if((0 < availablePerks) && (false === perks[perkSlug])) {
                perk.prop('checked', true);
                perks[perkSlug] = true;
                availablePerks -= 1;
                perkCard.removeClass('border-success');
                perkCard.addClass('text-bg-success');
            } else if(true === perks[perkSlug]) {
                perk.prop('checked', false);
                perks[perkSlug] = false;
                availablePerks += 1;
                perkCard.removeClass('text-bg-success');
                perkCard.addClass('border-success');
            }
            $('#availablePerks').val(availablePerks);
        }

        function toggleHybridSpecies(slug)
        {
            let hybridSpeciesSelect = $('#hybridSpeciesSelect');
            if(('hybrid' === slug) && 'disabled' === hybridSpeciesSelect.attr('disabled')) {
                hybridSpeciesSelect.removeAttr('disabled');
                hybridSpeciesSelect.focus();
            } else {
                hybridSpeciesSelect.attr('disabled', 'disabled');
            }
        }

        function createCharacter()
        {
            let characterForm = $('#newCharacterForm');
            let character = characterForm.serializeArray();
            //console.log(character);
            character.push({name: '_token', value: '{{ csrf_token() }}'});
            $.ajax({
                url: '/api/characters',
                type: 'POST',
                data: character,
                success: function (result) {
                    //console.log(result);
                    if(result.id) {
                        $(location).attr('href', '/games/{{ $gameId }}/worlds/{{ $worldId }}');
                    }
                }
            });
        }
    </script>

    <style>
        .tmp {}
            .tmp img {width: 3em !important; height: 3em !important;}

        .perk-card {
            cursor: pointer;
        }
    </style>

    <div>

        <div id="newCharacterComponent">
            <form method="POST" id="newCharacterForm">
            <input class="d-none" type="text" value="{{ $worldId }}" name="world_id" autocomplete="off">

            <div class="row mb-3">
                <div class="col">

                    <div class="mb-3">
                        @foreach($species as $key => $value)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="species_id" id="species{{ $key }}"
                                       value="{{ $value->id }}"
                                       autocomplete="off"
                                       onchange="toggleHybridSpecies('{{ $value->slug }}')">
                                <label class="form-check-label" for="species{{ $key }}"
                                       data-bs-toggle="tooltip"
                                       data-bs-placement="left"
                                       data-bs-title="{{ $value->description }}"
                                >{{ $value->name }}</label>
                            </div>
                            @if(count($value->children))
                                <div class="form-check-inline">
                                    <select name="species_id" id="hybridSpeciesSelect" class="form-select"
                                            aria-label="{{ $value->name }}"
                                            autocomplete="off"
                                            disabled="disabled">
                                        @foreach($value->children as $childKey => $childValue)
                                            <option value="{{ $childValue->id }}">{{ $childValue->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sex" id="male" value="male" checked="checked">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sex" id="female" value="female">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name"
                               aria-label="First Name">
                        <input type="text" id="nickname" name="nickname" class="form-control" placeholder="Nickname"
                               aria-label="Nickname">
                        <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last Name"
                               aria-label="Last Name">
                        <button class="btn btn-outline-secondary" type="button" onclick="getRandomName()">Random
                        </button>
                    </div>

                    <div class="mb-3">
                        <label for="age" class="form-label">Age: <span id="displayAge">25</span></label>
                        <input type="range" class="form-range" min="25" max="50" step="5" name="age" id="age" value="25"
                               onchange="setAge($(this).val())" autocomplete="off">
                    </div>

                </div>
                <div class="col">

                    <div id="carouselExampleIndicators" class="carousel slide">
                        <!--div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div-->

                        <div class="carousel-inner rounded">
                            <div class="carousel-item active">
                                <img src="/img/characters/avatars/newmale/01.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="/img/characters/avatars/newmale/02.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="/img/characters/avatars/newmale/03.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="/img/characters/avatars/newmale/04.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="/img/characters/avatars/newmale/05.png" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>

                        <div class="carousel-indicators tmp">
                            <img src="/img/characters/avatars/newmale/01.png" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="rounded-circle border border-2 border-white active" aria-current="true" aria-label="Slide 1">
                            <img src="/img/characters/avatars/newmale/02.png" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="rounded-circle border border-2 border-white" aria-label="Slide 2">
                            <img src="/img/characters/avatars/newmale/03.png" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="rounded-circle border border-2 border-white" aria-label="Slide 3">
                            <img src="/img/characters/avatars/newmale/04.png" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" class="rounded-circle border border-2 border-white" aria-label="Slide 4">
                            <img src="/img/characters/avatars/newmale/05.png" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" class="rounded-circle border border-2 border-white" aria-label="Slide 5">
                        </div>

                    </div>

                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text border border-success text-success w-75" id="basic-addon1">Available Quality points</span>
                        <input class="form-control border border-success" id="availableQualityPoints" type="text"
                               placeholder="" value="10" autocomplete="off" readonly>
                    </div>

                    @foreach($qualities as $key => $quality)
                        <div class="input-group mb-3">
                            <span class="input-group-text w-75" id="basic-addon{{ $key }}"
                                  data-bs-toggle="tooltip"
                                  data-bs-placement="left"
                                  data-bs-title="{{ $quality->description }}">{{ $quality->name }}</span>
                            <button class="btn btn-danger" type="button" id="button-addon{{ $key }}"
                                    onclick="updateQualityPoints('-', '{{ $quality->slug }}', {{ $key }})">&minus;
                            </button>
                            <input type="text" class="form-control input-number" id="{{ $quality->slug }}"
                                   name="qualities[{{ $quality->id }}]" placeholder="{{ $quality->name }}"
                                   aria-label="{{ $quality->name }}" aria-describedby="basic-addon{{ $key }}"
                                   value="{{ $quality->default_value }}" autocomplete="off">
                            <button class="btn btn-success" type="button" id="button-addon{{ $key }}"
                                    onclick="updateQualityPoints('+', '{{ $quality->slug }}', {{ $key }})">&plus;
                            </button>
                        </div>
                    @endforeach
                </div>

                <div class="col">
                    <div class="mb-3">
                        <canvas id="qualitiesChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                                <span class="input-group-text border border-success text-success w-75" id="basic-addon1">
                                    Available Perks
                                </span>
                        <input class="form-control border border-success" id="availablePerks" type="text"
                               placeholder="" value="3" autocomplete="off" readonly>
                    </div>
                </div>
                <div class="col">

                </div>
            </div>
            <div class="row">
                @foreach($perks as $perk)
                    <input class="d-none" type="checkbox" value="{{ $perk->id }}" id="{{ $perk->slug }}" name="perks[]"
                           autocomplete="off">
                    <div class="col-sm-3 mb-3">
                        <div id="{{ $perk->slug }}-perk-card" class="card h-100 perk-card border-success"
                             onclick="togglePerk('{{ $perk->slug }}')">
                            <div class="card-header">
                                {{ $perk->name }}
                            </div>
                            <div class="card-body">
                                <p class="card-title">{!! $perk->icon !!}</p>
                                <p class="card-text fw-light fs-6">{{ $perk->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-12 mb-3">
                    <button class="btn btn-success w-100" type="button" id="createCharacterButton"
                            onclick="createCharacter()">Create Character
                    </button>
                </div>
            </div>

            </form>
        </div>

    </div>
@endsection
