<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
    <label for="genre">Название жанра</label>
    <input type="text" class="form-control" id="genre" name="genre" aria-describedby="emailHelp"
           placeholder="Жанр" value = "{{$genre}}">
</div>

<button type="submit" class="btn btn-primary" >{{$submitButText}}</button>