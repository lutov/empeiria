@extends('layouts.game')

@section('title', 'Game '.$id)

@section('sidebar')
    @parent

    <!--p>This is appended to the master sidebar.</p-->
@endsection

@section('content')
    <script>
        const endpoint = '/api/games/{{ $id }}';
        $(function() {
            let game = [];
            $.ajax({
                url: endpoint,
                type: 'GET',
                data: {},
                success: function(result) {
                    game = result;
                    console.log(game);
                }
            });
        });
    </script>

    <div>



    </div>
@endsection
