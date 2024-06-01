@extends('layouts.game')

@section('title', 'Games')

@section('sidebar')
    @parent

    <!--p>This is appended to the master sidebar.</p-->
@endsection

@section('content')
    <div>

        <ul>
            <li id="newGameButton"><a href="#" id="newGameLink">New Game</a></li>
        </ul>

    </div>
@endsection
