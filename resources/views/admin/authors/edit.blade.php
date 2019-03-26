@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Редакирование автора id {{$author->id}}</h1>
                @include('layouts.partials.errors')
                <form method="POST" action = '{{action('Admin\AuthorController@update', $author->id)}}'>
                    <input name="_method" type="hidden" value="PATCH">

                    @include('admin.authors.partials.form', ['name'=> $author->name,
                                                             'books' => $author->books,
                                                             'submitButText' => 'Редактировать'
                                                              ])
                </form>
            </div>
        </div>
    </div>
@endsection