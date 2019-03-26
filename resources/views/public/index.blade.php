@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 row justify-content-between">
                @if($books->isNotEmpty())
                    <h1 class="col-12">Список книг</h1>
                    @foreach($books as $book)
                        <div class="row mb-3 p-0 col-10 bookItem">
                            <div class="bookImageOuter col-auto p-0 mr-5">
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
                            <div class="bookInfo col-auto">
                                <h3><a href="{{ action('BookController@show', [$book->id]) }}">{{$book->title}}</a></h3>
                                <ul class="list-group m-3">
                                    @foreach($book->authors as $author)
                                        {{--<li class="list-group-item"><a href="{{ action('AuthorController@edit', [$author->id]) }}">{{ $author->name }}</a></li>--}}
                                        <li> {{$author->name}}</li>
                                    @endforeach
                                </ul>
                                @if($book->genre()->exists())
                                    <p><i>{{$book->genre->genre}}</i></p>
                                @endif
                                @if (Auth::check() && Auth::user()->isAdmin())
                                    <a href="{{action('Admin\BookController@edit', $book->id)}}">EDIT</a>
                                @endif

                            </div>

                        </div>
                    @endforeach
                    <div>{{ $books->links() }}</div>
                @endif

            </div>
        </div>
    </div>
@endsection