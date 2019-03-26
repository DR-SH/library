@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if($genres->isNotEmpty())
                    <h1>Список жанров</h1>
                    @foreach($genres as $genre)
                        <div class="m-2">
                            <h5><a href="{{ action('Admin\GenreController@edit', [$genre->id])}}">{{$genre->genre}}</a></h5>

                        </div>
                    @endforeach
                    <div>{{ $genres->links() }}</div>
                @endif

            </div>
        </div>
    </div>
@endsection