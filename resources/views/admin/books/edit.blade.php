@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Редактирование книги "{{$book->title}}"</h1>
                @include('layouts.partials.errors')
                <form method="POST" action = '{{action('Admin\BookController@update', $book->id)}}' enctype="multipart/form-data" >
                    <input name="_method" type="hidden" value="PATCH">
                    @include('admin.books.partials.form', ['title'=> $book->title,
                                                     'about' => $book->about,
                                                     'authorsIds' => $book->authorsIds(),
                                                     'authors' => $authors,
                                                     'genre' => $genres,
                                                     'genreId' => $book->genre->id,
                                                     'file' => $book->file,
                                                     'cover' => $book->cover,
                                                     'amount' => ($book->store()->exists())? $book->store->amount : '',
                                                     'submitButText' => 'Редактировать'
                                                      ])
                </form>
            </div>
        </div>
    </div>
@endsection