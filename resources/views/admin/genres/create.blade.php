@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Создание нового жанра</h1>
                @include('layouts.partials.errors')
                <form method="POST" action = '{{action('Admin\GenreController@store')}}'>
                    @include('admin.genres.partials.form', ['genre'=> '',
                                                             'submitButText' => 'Создать'
                                                            ])
                </form>
            </div>
        </div>
    </div>
@endsection