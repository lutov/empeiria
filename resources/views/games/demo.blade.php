@extends('layouts.game')

@section('title', 'Games')

@section('sidebar')
    @parent

    <!--p>This is appended to the master sidebar.</p-->
@endsection

@section('content')
    <div>

        <h1>{{ $seed }}</h1>

        <img src="{{ $fullPath }}?t={{ time() }}">

    </div>
@endsection
