@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 row justify-content-between">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Поиск по названию книги"
                           aria-describedby="basic-addon1" id="searchInput">
                    <div class="input-group-append">
                        <button class="input-group-text" id="searchButton">Искать</button>
                    </div>
                </div>
                @if(empty($text))
                    <h3 class="col-9 offset-3">Список книг@if(!empty($genre)) в категории "{{$genre}}"@endif</h3>
                @else
                    <h5 class="col-9 offset-3">Книги, найденные по запросу: <i>{{$text}}</i></h5>
                @endif
                <div class="col-10 col-md-3 genresList">
                    <ul>
                        @if(!empty($genres))
                            @foreach($genres as $genre)
                               <li class="list-group-item list-group-item-action list-group-item-light">
                                   <a href="{{ action('BookController@genre', [$genre->id]) }}">{{$genre->genre}}</a>
                               </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="col-md-9">
                @if($books->isNotEmpty())
                    @foreach($books as $book)

                        <div class="mb-3 p-0 col-12  bookItem">
                            <div class="bookImageOuter ">
                                <div class="bookImageInner"
                                     style="background-image:
                                     @if($book->cover()->exists())
                                             url({{asset(Storage::url($book->cover->filename))}})
                                     @else
                                             url({{asset('/storage/download/covers/default.jpg')}})
                                     @endif
                                    ">
                                </div>
                            </div>
                            <div class="bookInfo">
                                <h5><a href="{{ action('BookController@show', [$book->id]) }}">{{$book->title}}</a></h5>
                                <ul class="list-group m-3">
                                    @foreach($book->authors as $author)
                                        <li> {{$author->name}}</li>
                                    @endforeach
                                </ul>
                                @if($book->genre()->exists())
                                    <p>
                                        <i><a href="{{action('BookController@genre', $book->genre->id )}}">
                                            {{$book->genre->genre}}</a></i>
                                    </p>
                                @endif
                                @if (Auth::check() && Auth::user()->isAdmin())
                                    <a href="{{action('Admin\BookController@edit', $book->id)}}">EDIT</a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                    <div>{{ $books->links() }}</div>
                @else
                    <p class = "m-5"><i>Книг не найдено</i></p>
                @endif
                </div>
            </div>
        </div>
    </div>
@endsection