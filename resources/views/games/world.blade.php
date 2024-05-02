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
        $(function() {
            let canvas = document.getElementById("canvas");
            let ctx = canvas.getContext("2d");

            let canvasOffset = $("#canvas").offset();
            let offsetX = canvasOffset.left;
            let offsetY = canvasOffset.top;

            // animation variables
            let currentX = 10;
            let currentY = 10;
            let frameCount = 60;
            let timer;
            let points;
            let currentFrame;

            function animate() {
                let point = points[currentFrame++];
                draw(point.x, point.y);

                // refire the timer until out-of-points
                if (currentFrame < points.length) {
                    timer = setTimeout(animate, 1000 / 60);
                }
            }

            function linePoints(x1, y1, x2, y2, frames) {
                let dx = x2 - x1;
                let dy = y2 - y1;
                let length = Math.sqrt(dx * dx + dy * dy);
                let incrementX = dx / frames;
                let incrementY = dy / frames;
                let a = [];

                a.push({
                    x: x1,
                    y: y1
                });
                for (let frame = 0; frame < frames - 1; frame++) {
                    a.push({
                        x: x1 + (incrementX * frame),
                        y: y1 + (incrementY * frame)
                    });
                }
                a.push({
                    x: x2,
                    y: y2
                });
                return (a);
            }

            function draw(x, y) {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                ctx.beginPath();
                ctx.fillStyle = "skyblue";
                ctx.strokeStyle = "gray";
                ctx.rect(x, y, 30, 20);
                ctx.fill();
                ctx.stroke();
            }

            function handleMouseDown(e) {
                mouseX = parseInt(e.clientX - offsetX);
                mouseY = parseInt(e.clientY - offsetY);
                $("#downlog").html("Down: " + mouseX + " / " + mouseY);

                // Put your mousedown stuff here
                points = linePoints(currentX, currentY, mouseX, mouseY, frameCount);
                currentFrame = 0;
                currentX = mouseX;
                currentY = mouseY;
                animate();
            }

            $("#canvas").mousedown(function(e) {
                handleMouseDown(e);
            });

            draw(10, 10);
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
            <img src="/img/worlds/{{ $world->id }}/map.png" class="" alt="...">
        </div>

        <p>Click to move the rectangle to the mouseclick</p>
        <p id="downlog">Down</p>
        <canvas id="canvas" width=300 height=300></canvas>

    </div>
@endsection
