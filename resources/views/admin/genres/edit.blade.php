@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Редактирование жанра "{{$genre->genre}}"</h1>
                @include('layouts.partials.errors')
                <form method="POST" action = '{{action('Admin\GenreController@update', $genre->id)}}'>
                    <input name="_method" type="hidden" value="PATCH">
                    @include('admin.genres.partials.form', ['genre'=> $genre->genre,
                                                             'submitButText' => 'Редактировать'
                                                            ])
                </form>
            </div>
        </div>
    </div>
@endsection