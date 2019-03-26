@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-10 row justify-content-center mb-4">
            <div class="bookImageOuter p-0 mr-3">
                <div class="bookImageInner"
                     style="background-image:
                     @if($book->cover()->exists())
                             url({{asset(Storage::url($book->cover->filename))}})
                     @else
                             url({{asset('/storage/download/covers/default.jpg')}})
                     @endif"></div>
            </div>
            <div class="bookInfo p-0 col-12 col-md-8">
                <h1>{{$book->title}}</h1>
                @foreach($book->authors as $author)
                    <p>{{$author->name}}</p>
                @endforeach
                <p>{{$book->about}}</p>
                <hr>
                @if($book->genre()->exists())
                    <p><b>Жанр: </b>
                        <i><a href="{{action('BookController@genre', $book->genre->id )}}">
                                {{$book->genre->genre}}</a></i>
                    </p>
                @endif
                <hr>
                @if($book->store()->exists() && $book->store->amount>0)
                    <p>Бумажная версия в наличии!</p>
                @else
                    <p><i>Бумажной версии нет в наличии</i></p>
                @endif
                @if($book->file()->exists())
                    <a href="{{asset(Storage::url($book->file->filename))}}">Читать</a>
                @else
                    <p><i>Электронная версия недоступна</i></p>
                @endif
                <hr>
            </div>
        </div>
        <div class="input-group">
            <textarea class="form-control mb-3" aria-label="With textarea" id="commentText"></textarea>
        </div>
        <button class="btn btn-outline-dark btn-block" data-book="{{$book->id}}" id="commentButton">
            Оставить комментарий
        </button>
        <div class="comments">
            @if($comments)
                @foreach($comments as $comment)
                    <div class="comment">
                        <hr>
                        <p>{{$comment->user->name}}, {{$comment->created_at}}</p>
                        <p>{{$comment->message}}</p>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection