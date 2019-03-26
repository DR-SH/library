@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if($authors->isNotEmpty())
                    <h1>Список авторов</h1>
                    @foreach($authors as $author)
                        <div class="m-2">
                            <h5><a href="{{ action('Admin\AuthorController@edit', [$author->id])}}">{{$author->name}}</a></h5>

                        </div>
                    @endforeach
                    <div>{{ $authors->links() }}</div>
                @endif

            </div>
        </div>
    </div>
@endsection