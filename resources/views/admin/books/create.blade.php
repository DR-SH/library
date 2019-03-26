@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Создание новой книги</h1>
                @include('layouts.partials.errors')
                <form method="POST" action = '{{action('Admin\BookController@store')}}' enctype="multipart/form-data" >
                    @include('admin.books.partials.form', ['title'=> '',
                                                     'about' => '',
                                                     'authorsIds' => [],
                                                     'authors' => $authors,
                                                     'genre' => $genres,
                                                     'genreId' => '',
                                                     'file' => '',
                                                     'cover' => '',
                                                     'amount' => '',
                                                     'submitButText' => 'Создать'
                                                      ])
                </form>
            </div>
        </div>
    </div>
@endsection