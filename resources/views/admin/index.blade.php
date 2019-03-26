@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('layouts/partials/flash')
                <table class="table table-striped table-bordered">
                    <tr>
                        <td>Книга</td>
                        <td><a href="{{action('Admin\BookController@create')}}">Создать</a></td>
                        <td><a href="{{action('BookController@index')}}">Список</a></td>
                    </tr>
                    <tr>
                        <td>Автор</td>
                        <td><a href="{{action('Admin\AuthorController@create')}}">Создать</a></td>
                        <td><a href="{{action('Admin\AuthorController@index')}}">Список</a></td>
                    </tr>
                    <tr>
                        <td>Жанр</td>
                        <td><a href="{{action('Admin\GenreController@create')}}">Создать</a></td>
                        <td><a href="{{action('Admin\GenreController@index')}}">Список</a></td>
                    </tr>
                    {{--<tr><td>Администратор</td>--}}
                        {{--<td></td>--}}
                        {{--<td></td>--}}
                    {{--</tr>--}}
                </table>
            </div>
        </div>
    </div>
@endsection