<input type="hidden" name="_token" value="{{ csrf_token() }}">
@if($books)
    <span>Книги автора:</span>
    <ul>
        @foreach($books as $book)
            <li><a href = {{action('Admin\BookController@edit', $book->id)}}>{{$book->title}}</a></li>
        @endforeach
    </ul>
@endif
<div class="form-group">
    <label for="name">Имя автора</label>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp"
           placeholder="ФИО Автора" value = "{{$name}}">
</div>


<button type="submit" class="btn btn-primary" >{{$submitButText}}</button>