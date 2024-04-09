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
        });
        // TODO refactor
        function getRandomName() {
            $.ajax({
                url: '/api/names/random',
                type: 'GET',
                data: {
                    types: ['first_name']
                },
                success: function (result) {
                    $('#firstName').val(result);
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
                    $('#lastName').val(result);
                }
            });
        }
        function setAge(age)
        {
            $('#displayAge').html(age);
        }
    </script>

    <style>
        .tmp {position: relative; clear: both;}
            .tmp img {width: 5em !important; height: 5em !important;}
    </style>

    <div>

        <div id="newCharacterComponent">

            <div class="row">
                <div class="col">

                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sex" id="inlineRadio1" value="male" checked="checked">
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sex" id="inlineRadio2" value="female">
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" id="firstName" class="form-control" placeholder="First Name" aria-label="First Name">
                        <input type="text" id="nickname" class="form-control" placeholder="Nickname" aria-label="Nickname">
                        <input type="text" id="lastName" class="form-control" placeholder="Last Name" aria-label="Last Name">
                        <button class="btn btn-outline-secondary" type="button" onclick="getRandomName()">Random</button>
                    </div>

                    <div>
                        <label for="customRange2" class="form-label">Age: <span id="displayAge">25</span></label>
                        <input type="range" class="form-range" min="25" max="50" step="5" id="customRange2" onchange="setAge($(this).val())">
                    </div>

                    <div>

                        Available points: 10

                        @foreach($qualities as $quality)
                        <div class="input-group mb-3">
                            <span class="input-group-text w-75" id="basic-addon1" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="{{ $quality->description }}">{{ $quality->name }} </span>
                            <button class="btn btn-danger" type="button" id="button-addon1">&minus;</button>
                            <input type="text" class="form-control input-number" name="{{ $quality->slug }}" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="{{ $quality->default_value }}">
                            <button class="btn btn-success" type="button" id="button-addon1">&plus;</button>
                        </div>
                        @endforeach

                    </div>

                </div>
                <div class="col">

                    <div id="carouselExampleIndicators" class="carousel slide">
                        <!--div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div-->

                        <div class="carousel-inner">
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
                            <img src="/img/characters/avatars/newmale/01.png" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                            <img src="/img/characters/avatars/newmale/02.png" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2">
                            <img src="/img/characters/avatars/newmale/03.png" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3">
                            <img src="/img/characters/avatars/newmale/04.png" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4">
                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
