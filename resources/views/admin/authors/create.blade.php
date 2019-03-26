@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Создание нового автора</h1>
                @include('layouts.partials.errors')
                <form method="POST" action = '{{action('Admin\AuthorController@store')}}'>
                    @include('admin.authors.partials.form', ['name'=> '',
                                                             'books' => '',
                                                             'submitButText' => 'Создать'
                                                             ])
                </form>
            </div>
        </div>
    </div>
@endsection