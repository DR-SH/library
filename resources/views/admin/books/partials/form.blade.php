<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
    <label for="title">Название книги</label>
    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp"
           placeholder="Название книги" value = "{{$title}}">
</div>
<div class="form-group">
    <label for="about">Описание</label>
    <textarea class="form-control" id="about" name="about" aria-describedby="emailHelp"
              placeholder="Описание книги">{{$about}}</textarea>
</div>
<div class="form-group form-authors">
    <label for="formAuthors">Авторы:</label>
    <select multiple class="form-control" id="formAuthors"  name="authors[]">
        @foreach($authors as $author)
            <option value="{{$author->id}}"
                @if(in_array($author->id, $authorsIds))selected="selected"@endif>
                {{$author->name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group form-genres">
    <label for="formGenre">Жанр:</label>
    <select class="form-control" id="formGenre" name="genre">
        @foreach($genres as $genre)
            <option value="{{$genre->id}}"
                @if($genre->id == $genreId)selected="selected"@endif>
                {{$genre->genre}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="amount">Количество на складе</label>
    <input type="text" class="form-control" id="amount" name="amount"
           placeholder="Введите количество" value = "{{$amount}}">
</div>
<p>Обложка книги:</p>
<div id="cover">
    @if($cover)
        <div class = "showCover">
            <img src="{{Storage::url($cover->filename)}}" class="img-fluid" alt="{{$title}}">
            <button type="submit" class="btn btn-outline-danger btn-sm m-5"
                    data-filename="{{$cover->filename}}" data-id ="{{$cover->id}}"
                    id="delCover">Отвязать обложку (необратимо)</button>
        </div>
    @endif
        <div class="form-group uploadCover"  style="display:@if($cover) none @else block @endif">
            <label for="loadCover">Загрузить обложку</label>
            <input type="file" name="loadCover" class="form-control-file" id="loadCover">
        </div>
</div>
<p class = 'mt-4'>Файл книги:</p>
<div id="file">
    @if($file)
        <div class = "showFile">
            <a href="{{Storage::url($file->filename)}}" class = "mr-2">{{$title}}</a>
            <button type="submit" class="btn btn-outline-danger btn-sm"
                    data-filename="{{$file->filename}}" data-id ="{{$file->id}}"
                    id="delFile">Отвязать файл (необратимо)
            </button>
        </div>
    @endif
    <div class="form-group uploadFile mt-2" style="display:@if($file) none @else block @endif">
        <label for="loadFile">Загрузить файл</label>
        <input type="file" name="loadFile" class="form-control-file" id="loadFile">
    </div>
</div>
<button type="submit" class="btn btn-primary mt-4 btn-block" >{{$submitButText}}</button>